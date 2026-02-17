<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventPdt;
use Illuminate\Support\Carbon;
use App\Http\Controllers\DonationController;
use Illuminate\Validation\ValidationException;

class EventPdtController extends Controller
{
    public function create()
    {
        return view('events.createKegiatan');
    }
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'quota' => 'required|integer|min:0',
                'lokasi' => 'required',
                'waktu_mulai' => 'required|date|after_or_equal:' . Carbon::today(),
                'waktu_akhir' => 'required|date|after:waktu_mulai|after_or_equal:' . Carbon::today(),
            ]);

            $existingEvent = EventPdt::where(function ($query) use ($validatedData) {
                $query->where('waktu_mulai', $validatedData['waktu_mulai'])
                    ->orWhere('waktu_akhir', $validatedData['waktu_akhir']);
            })
                ->where(function ($query) use ($validatedData) {
                    $query->where('lokasi', $validatedData['lokasi']);
                })
                ->first();

            if ($existingEvent) {
                return redirect()->back()->withInput()->with('error', 'Error: Event with the same start or end time already exists.')->withErrors(['waktu_mulai' => 'Event already exists.']);
            }

            EventPdt::create($validatedData);

            return redirect()->route('events.berhasil')
                ->with('success', 'Kegiatan berhasil dibuat!');
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    
    public function berhasil()
    {
        $events = EventPdt::all();
        return view('events.berhasil', compact('events'));
    }

    public function edit($id)
    {
        $event = EventPdt::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function hapusKegiatan($id)
    {
        $event = EventPdt::findOrFail($id);
        $event->delete();
        return redirect()->route('events.berhasil')->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function viewDonasi()
    {
        $startOfDay = Carbon::today();
        $endOfDay = Carbon::tomorrow()->subSecond();

        $events = EventPdt::whereDate('waktu_mulai', '<=', now())
            ->whereDate('waktu_akhir', '>=', now())
            ->exists();

        return view('events.donasi', compact('events'));
    }

    public function donasi()
    {
        $startOfDay = Carbon::today();
        $endOfDay = Carbon::tomorrow()->subSecond();

        $events = EventPdt::where(function ($query) use ($startOfDay, $endOfDay) {
                $query->whereBetween('waktu_mulai', [$startOfDay, $endOfDay])
                    ->orWhereBetween('waktu_akhir', [$startOfDay, $endOfDay])
                    ->orWhere(function ($query) use ($startOfDay, $endOfDay) {
                        $query->where('waktu_mulai', '<', $startOfDay)
                            ->where('waktu_akhir', '>', $endOfDay);
                    });
            })
            ->get();

        $eventsAvailable = !$events->isEmpty();

        return view('events.donation', compact('eventsAvailable'));
    }
}
