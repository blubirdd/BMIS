<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{

    protected $fillable = [
        'barangay_id',
        'lastname',
        'firstname',
        'middlename',
        'address',
        'email',
    ];

    use HasFactory;

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
