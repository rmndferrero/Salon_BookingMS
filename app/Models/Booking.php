<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'appointment_date', 'total_price', 'status'];

    // A booking belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A booking can have many services
    public function services() {
        return $this->belongsToMany(Service::class);
    }
}
