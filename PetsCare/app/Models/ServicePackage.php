<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_name',
        'package_description',
        'package_price'

    ];

    /**
     * The businessProfile that belong to the ServicePackage
     * must be attached to BusinessProfile in pivotTable
     * "business_profile_service_package" and column names
     * "business_profile_id" "service_package_id"
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function businessProfile()
    {
        return $this->belongsToMany(BusinessProfile::class);
    }
}
