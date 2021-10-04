<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalments extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['instalment_code', 'credit_code', 'instalment_date', 'instalment_quantity', 'instalment_of', 'instalment_remaining', 'instalment_remaining_price'];
}
