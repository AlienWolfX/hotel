<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_title',
        'image',
        'description',
        'wifi',
        'room_type',
        'has_video',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function isBooked()
    {
        return Booking::where('room_id', $this->id)->exists();
    }

}
