<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersImage extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'image_name',
        'image_path',
        'pet_id',
        'business_profile_id',

    ];

    /**
     * Get the businessProfile associated with the BusinessProfileImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function businessProfile()
    {
        return $this->hasOne(BusinessProfile::class );
    }

   /**
    * Get the pet associated with the PetsImage
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function pet()
   {
       return $this->hasOne(Pet::class);
   }
}
