<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit_packages extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['package_price', 'down_payment', 'package_instalment_quantity', 'interest', 'instalment_value'];

    public function credits()
    {
        return $this->belongsTo(Credits::class, 'package_code');
    }
}
