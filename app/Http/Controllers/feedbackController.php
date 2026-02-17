<?php

namespace App\Http\Controllers;

use App\Models\testimoni_feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class feedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'id_user' => $request['id_user'],
            'feedback' => $request['feedback'],
            'testimoni' => $request['testimoni'],
        ];

        testimoni_feedback::create($data);

        return redirect(route('feedback.create'));
    }

    public function create()
    {
        return view('layouts.user.testimoni');
    }

    public function view()
    {
        $newView = testimoni_feedback::latest()->paginate(5);
        return view('layouts.admin.menuTestimoni', [
            'feedback' => $newView
        ]);
    }

    public function editview($id, Request $request)
    {
        // Query untuk mendapatkan data testimoni_feedback berdasarkan $id
        $feedback = testimoni_feedback::find($id);

        // Pastikan data ditemukan sebelum mengakses properti
        if ($feedback) {
            // Lakukan operasi pada $feedback
            $currentStatus = $feedback->status;
            $newStatus = ($currentStatus == 1) ? 0 : 1;

            // Update status pada testimoni_feedback
            $updateResult = $feedback->update(['status' => $newStatus]);

            // Teks untuk tombol
            $buttonText = ($newStatus == 1) ? 'Hide' : 'Show';

            if ($updateResult) {
                return redirect(route('feedback.view'))->with('success', "Berhasil mengubah status menjadi $buttonText");
            } else {
                return redirect(route('feedback.view'))->with('error', 'Gagal mengubah status. Silakan coba lagi.');
            }
        } else {
            // Handle jika data tidak ditemukan
            return redirect(route('admin'))->with('error', 'Data tidak ditemukan');
        }
    }

    public function hapusTestimoni($id)
    {
        // Temukan testimoni berdasarkan ID
        $feedback = testimoni_feedback::find($id);

        // Periksa apakah testimoni ditemukan
        if (!$feedback) {
            return response()->json(['message' => 'Testimoni tidak ditemukan'], 404);
        }

        // Hapus testimoni
        $feedback->delete();

        return Redirect::back()->with(['message' => 'Testimoni berhasil dihapus']);
    }
}