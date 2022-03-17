<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ServicePackage
 * @package App\Models
 * @version March 16, 2022, 2:14 pm UTC
 *
 * @property string $id
 * @property string $package_name
 * @property string $package_description
 * @property number $package_price
 */
class ServicePackage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'service_packages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'package_name',
        'package_description',
        'package_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'package_name' => 'string',
        'package_price' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'package_name' => 'required',
        'package_description' => 'required',
        'package_price' => 'required'
    ];
    public function businessProfile()
    {
        return $this->belongsToMany(BusinessProfile::class);
    }
    
}
