<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    protected $table = 'service_records';

    protected $fillable = [
        'passenger_id',
        'service_id',
        'details',
        'notes',
        'record_date',
        'cost'
    ];

    protected $casts = [
        'record_date' => 'datetime',
        'cost' => 'decimal:2',
    ];

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
