<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = ['client_id', 'package_code', 'vehicle_code', 'credit_date', 'fotocopy_of_identity', 'fotocopy_of_family', 'fotocopy_of_salary'];

    public function instalments()
    {
        return $this->hasOne(Instalments::class, 'credit_code');
    }
}
