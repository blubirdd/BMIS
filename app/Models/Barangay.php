<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'telephone',
        'image'

    ];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
