<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pets
 * @package App\Models
 * @version March 14, 2022, 10:17 pm UTC
 *
 * @property integer $client_profile_id
 * @property string $pet_type
 * @property string $pet_breed
 * @property string $pet_age
 * @property boolean $has_medical_condition
 */
class Pets extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_profile_id',
        'pet_type',
        'pet_breed',
        'pet_age',
        'has_medical_condition'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_profile_id' => 'integer',
        'pet_type' => 'string',
        'pet_breed' => 'string',
        'pet_age' => 'datetime',
        'has_medical_condition' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'client_profile_id' => 'required',
        'pet_type' => 'required',
        'pet_breed' => 'required',
        'pet_age' => 'required',
        'has_medical_condition' => 'required'
    ];

    
}
