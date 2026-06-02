<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'name',
        'position',
        'phone',
        'department',
        'employee_id'
    ];

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