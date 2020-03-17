<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function reserve(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email',
           'phone' => 'required',
           'date_and_time' => 'required',
           'message' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->name = $request->input('name');
        $reservation->email = $request->input('email');
        $reservation->phone = $request->input('phone');
        $reservation->date_and_time = $request->input('date_and_time');
        $reservation->message = $request->input('message');
        $reservation->status = false;
        $reservation->save();
        Toastr::success('Reservation Request Send Successfully. We will confirm to you Shortly', 'Success');
        return redirect()->back();

    }

}
