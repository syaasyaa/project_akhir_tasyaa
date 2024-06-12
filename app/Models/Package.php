<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'weight', 'price'];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
}
