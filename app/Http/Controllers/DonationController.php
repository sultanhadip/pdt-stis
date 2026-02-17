<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donations;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationStatusUpdated;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Jobs\UpdatePemasukanJob;
use App\Jobs\UpdateLaporanJob;
use App\Models\EventPdt;

class DonationController extends Controller
{
    use WithPagination;
    public function create()
    {
        return view('donations.createDonasi');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'nullable',
                'nominal' => 'required|integer|min:0',
                'file' => 'required|mimes:jpg,png,jpeg|max:2048',
                'message' => 'nullable|string|max:500',
                'name' => 'nullable|string|max:500',
                'payment_method' => 'required'
            ]);

            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();

            if (!in_array($fileExtension, $allowedExtensions)) {
                throw new \Exception('Invalid file extension. Only JPG, JPEG, and PNG are allowed.');
            }

            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploads');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $fileName);
            $filePath = 'uploads/' . $fileName;

            $status = 'belum dikonfirmasi';
            $userId = Auth::id();

            Donations::create([
                'user_id' => $userId,
                'nominal' => $request->nominal,
                'link' => $filePath,
                'message' => $request->message,
                'nama' => $request->name,
                'status' => $status,
                'metode' => $request->payment_method
            ]);

            return redirect()->route('donations.berhasil')->with('success', 'Donation created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['file' => $e->getMessage()])->withInput();
        }
    }


    public function berhasilDonasi()
    {
        $donations = Donations::paginate(10);
        return view('donasi.berhasil', compact('donations'));
    }

    public function viewDonasi()
    {
        $donasiData = Donations::latest()->paginate(1); // Ubah 10 sesuai dengan jumlah item yang diinginkan per halaman
    return view('donasi.viewDonasi', ['donasiData' => $donasiData]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'new_status' => 'required|in:belum dikonfirmasi,disetujui,ditolak',
        ]);

        $donation = Donations::findOrFail($id);
        $oldStatus = $donation->status;

        $donation->status = $request->input('new_status');
        $donation->save();

        if ($oldStatus !== $donation->status) {
            Mail::to($donation->user)->send(new DonationStatusUpdated($donation));
        }
        UpdatePemasukanJob::dispatch($donation);
        dispatch(new UpdateLaporanJob($donation));
        return redirect()->route('donations.viewDonasi')->with('success', 'Donation status updated successfully.');
    }

    public function approvedDonationSum()
    {
        $approvedSum = DB::table('donations')->where('status', 'disetujui')->sum('nominal');
        return view('donasi.approvedDonationSum', compact('approvedSum'));
    }

    public function totalApprovedDonationPerMonth()
    {
        $totalPerMonth = Donations::where('status', 'disetujui')
            ->whereNotNull('created_at')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'), 'desc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'desc')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(nominal) as total')
            )
            ->get();

        return view('donasi.totalApprovedDonationPerMonth', compact('totalPerMonth'));
    }
}
