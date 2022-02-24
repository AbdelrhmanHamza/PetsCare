<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'feature_name'
    ];

    /**
     * The subscribtionPackage that belong to the Features
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribtionPackage()
    {
        return $this->belongsToMany(SubscribtionPackage::class);
    }

}
