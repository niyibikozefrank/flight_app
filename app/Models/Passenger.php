<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passenger extends Model
{
    use HasFactory;
    protected $table = 'passengers';
    
    protected $fillable = [
        'name',
        'phone',
        'age',
        'gender',
        'address',
        'passport_number',
        'booking_reference'
    ];

    public function serviceRecords()
    {
        return $this->hasMany(ServiceRecord::class);
    }

    public function serviceHistory()
    {
        return $this->hasMany(ServiceHistory::class);
    }

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function email()
    {
        return $this->getAttribute('email') ?? 'N/A';
    }
}