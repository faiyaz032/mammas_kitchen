<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('status', true)->get();
        return view('admin.reservations', compact('reservations'));
    }
    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status= true;
        $reservation->save();
        Notification::route('mail', $reservation->email)->notify(new ReservationConfirmed());
        Toastr::success('Reservation successfully confirmed.','Success');
        return redirect()->route('reservation.index');
    }
    public function destory($id)
    {
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted.','Success');
        return redirect()->back();
    }
}
