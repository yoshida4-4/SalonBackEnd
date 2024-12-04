<?php

namespace App\Http\Controllers;

// app/Http/Controllers/ReservationController.php
use App\Models\Reservation;
use App\Models\Stylist;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['stylist', 'service'])->get();
        // $reservations = Reservation::with(['user', 'stylist', 'service'])->get();
        return $reservations;
    }

    public function create()
    {
        $stylists = Stylist::all();
        $services = Service::all();
        return view('reservations.create', compact('stylists', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'stylist_id' => 'required|exists:stylists,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:today',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'stylist_id' => $request->stylist_id,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
        ]);

        return redirect()->route('reservations.index')->with('success', '予約が作成されました');
    }
}

