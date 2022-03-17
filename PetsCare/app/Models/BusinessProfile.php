<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BusinessProfile
 * @package App\Models
 * @version March 14, 2022, 10:41 pm UTC
 *
 * @property integer $user_id
 * @property string $business_type
 * @property string $business_name
 * @property string $address
 * @property string $phone_number
 * @property string $service_description
 * @property string $open_at
 * @property string $close_at
 */
class BusinessProfile extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'business_profiles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'business_type',
        'business_name',
        'address',
        'phone_number',
        'service_description',
        'open_at',
        'close_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'business_type' => 'string',
        'business_name' => 'string',
        'address' => 'string',
        'phone_number' => 'string',
        'open_at' => 'string',
        'close_at' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'business_type' => 'required',
        'business_name' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'service_description' => 'required',
        'open_at' => 'required',
        'close_at' => 'required'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
/**
 * The roles that belong to the BusinessProfile
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
 */
public function servicePackage()
{
    return $this->belongsToMany(ServicePackage::class);
}


    public function businessRequest(){
        return $this->hasMany(ClientBusinessResquest::class);
    }
    /**
     * Get all of the usersImage for the BusinessProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersImage()
    {
        return $this->hasMany(UsersImage::class);
    }
    
}
