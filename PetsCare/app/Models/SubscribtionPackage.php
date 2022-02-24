<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscribtionPackage extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'subscribtion_package_name',
        'subscribtion_package_description',
        'activation_period',
        'subscribtion_package_price'
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
