<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['client_id', 'client_name', 'client_address', 'client_phone'];
}
