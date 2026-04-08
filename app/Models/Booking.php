<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 
        'appointment_date', 
        'start_time', // Added
        'end_time',   // Added
        'total_price', 
        'status'
    ];

    // A booking belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A booking can have many services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service')
                    ->withPivot('employee_id', 'service_start_time', 'service_end_time');
    }
}
