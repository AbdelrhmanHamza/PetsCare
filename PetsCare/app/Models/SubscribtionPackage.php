<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SubscribtionPackage
 * @package App\Models
 * @version March 16, 2022, 2:30 pm UTC
 *
 * @property string $id
 * @property string $subscribtion_package_name
 * @property string $subscribtion_package_description
 * @property integer $activation_period
 * @property number $subscribtion_package_price
 */
class SubscribtionPackage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subscribtion_packages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'subscribtion_package_name',
        'subscribtion_package_description',
        'activation_period',
        'subscribtion_package_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'subscribtion_package_name' => 'string',
        'activation_period' => 'integer',
        'subscribtion_package_price' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subscribtion_package_name' => 'required',
        'subscribtion_package_description' => 'required',
        'activation_period' => 'required',
        'subscribtion_package_price' => 'required'
    ];

    /**
     * The user that belong to the SubscribtionPackages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userSubsrcibtionPackage()
    {
        return $this->hasMany(UserSubsrcibtionPackage::class);
    }
    /**
     * The feature that belong to the SubscribtionPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function feature()
    {
        return $this->belongsToMany(Feature::class);
    }
}
