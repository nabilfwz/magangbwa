<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

