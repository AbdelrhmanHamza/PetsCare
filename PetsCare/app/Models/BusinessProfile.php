<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_type',
        'business_name',
        'address',
        'phone_number',
        'service_description',
        'open_at',
        'close_at'
    ];

    /**
     * Get the user that owns the BusinessProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
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
}
