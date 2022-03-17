<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ClientProfile
 * @package App\Models
 * @version March 16, 2022, 9:53 pm UTC
 *
 * @property string $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $phone_number
 */
class ClientProfile extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'client_profiles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'user_id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'address' => 'string',
        'phone_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'phone_number' => 'required'
    ];

    
}
