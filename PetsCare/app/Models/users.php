<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class users
 * @package App\Models
 * @version March 14, 2022, 10:26 pm UTC
 *
 * @property string $user_name
 * @property string $email
 * @property string $type
 * @property string $password
 */
class users extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_name',
        'email',
        'type',
        'password'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_name' => 'string',
        'email' => 'string',
        'type' => 'string',
        'password' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_name' => 'required',
        'email' => 'required',
        'type' => 'required',
        'password' => 'required'
    ];

    
}
