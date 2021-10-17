<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['vehicle_code', 'vehicle_brand', 'vehicle_type', 'vehicle_color', 'vehicle_price', 'vehicle_image', 'available'];
}
