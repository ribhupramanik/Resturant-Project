<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the table name (if different from the default 'clients')
    protected $table = 'clients'; 

    // Define which fields are mass assignable
    protected $fillable = [
        'email',
        'password',
    ];

    // Hide sensitive information like password when fetching data
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Cast fields like 'password' for hashing purposes (optional)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Add any custom methods if required
}
