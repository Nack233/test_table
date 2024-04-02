<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    public function index()
    {
        $bookings = RoomBooking::all();
        return view('welcome', compact('bookings'));
    }

    public function approve(RoomBooking $booking)
    {
        // โค้ดสำหรับการอนุมัติการจอง
    }

    public function cancel(RoomBooking $booking)
    {
        // โค้ดสำหรับการยกเลิกการจอง
    }

    public function show(RoomBooking $booking)
    {
        return view('booking-detail', compact('booking'));
    }
}
