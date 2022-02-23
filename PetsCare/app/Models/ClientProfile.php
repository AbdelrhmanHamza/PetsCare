<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
          'first_name',
          'last_name',
          'address',
          'phone_number'

    ];



     /**
     * Get all of the businessProfile for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function pet(){
        return $this->hasMany(Pet::class);
    }

    public function clientRequest(){
        return $this->hasMany(ClientBusinessResquest::class);
    }

}
