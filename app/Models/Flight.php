<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $fillable = [
        'passenger_id',
        'staff_id',
        'flight_number',
        'departure_time',
        'arrival_time',
        'destination',
        'price',
        'aircraft_type',
        'capacity',
        'duration_minutes',
        'booking_reference',
        'status',
        'gate_id'
    ];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
        'price' => 'decimal:2',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function gate()
    {
        return $this->belongsTo(Gate::class);
    }

    public static function isStaffAvailable($staffId, $departureTime, $arrivalTime)
    {
        return !self::where('staff_id', $staffId)
            ->where(function($query) use ($departureTime, $arrivalTime) {
                $query->whereBetween('departure_time', [$departureTime, $arrivalTime])
                      ->orWhereBetween('arrival_time', [$departureTime, $arrivalTime]);
            })
            ->whereIn('status', ['scheduled', 'confirmed'])
            ->exists();
    }
}