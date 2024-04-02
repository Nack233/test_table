<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    protected $table = 'room_bookings';
    protected $fillable = ['user_name', 'room_name', 'start_time', 'end_time'];
    protected $dates = ['start_date', 'end_date'];
}
