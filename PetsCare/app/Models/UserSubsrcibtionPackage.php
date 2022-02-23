<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubsrcibtionPackage extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'subscribtion_package_id',
        'is_expired',
        'subscribtion_date'
    ];

    /**
     * Get the user associated with the UserSubsrcibtionPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the subscribtionPackage associated with the UserSubsrcibtionPackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subscribtionPackage()
    {
        return $this->hasOne(SubscribtionPackage::class);
    }
}
