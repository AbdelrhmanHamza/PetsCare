<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
            'pet_type',
            'pet_breed',
            'pet_age',
            'has_medical_condition'
    ];

    public function clientprofile (){
        return $this->belongsTo(ClientProfile::class);
    }
}
