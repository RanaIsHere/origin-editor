<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['cash_code', 'client_id', 'vehicle_code', 'cash_date', 'cash_amount'];
}
