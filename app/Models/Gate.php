<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;

    protected $table = 'gates';

    protected $fillable = [
        'gate_number',
        'terminal',
        'capacity',
        'status',
        'description',
    ];

    protected $casts = [
        'capacity' => 'integer',
    ];

    /**
     * Gate types: domestic, international, boarding, baggage, etc.
     */
    public const TYPES = [
        'domestic' => 'Domestic Gate',
        'international' => 'International Gate',
        'boarding' => 'Boarding Gate',
        'baggage' => 'Baggage Claim',
        'cargo' => 'Cargo Gate',
        'maintenance' => 'Maintenance Gate',
    ];

    /**
     * Gate status: available, occupied, maintenance, etc.
     */
    public const STATUSES = [
        'available' => 'Available',
        'occupied' => 'Occupied',
        'maintenance' => 'Under Maintenance',
        'cleaning' => 'Cleaning',
        'closed' => 'Closed',
    ];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
