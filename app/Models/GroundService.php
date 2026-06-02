<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroundService extends Model
{
    protected $table = 'ground_services';

    protected $fillable = [
        'name',
        'description',
        'category',
        'price'
    ];

    public function serviceHistory()
    {
        return $this->hasMany(ServiceHistory::class);
    }
}
