<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('status',false)->get();
        return view('admin.dashboard', compact('reservations'));

    }
}
