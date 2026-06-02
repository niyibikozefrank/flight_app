<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceHistory extends Model
{
    protected $table = 'service_history';

    protected $fillable = [
        'ground_service_id',
        'service_id',
        'passenger_id',
        'staff_id',
        'cost',
        'status',
        'service_date',
        'notes'
    ];

    protected $casts = [
        'service_date' => 'datetime',
        'cost' => 'decimal:2',
    ];

    const STATUS = [
        'pending' => 'Pending',
        'in-progress' => 'In Progress',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled'
    ];

    public function groundService()
    {
        return $this->belongsTo(GroundService::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
