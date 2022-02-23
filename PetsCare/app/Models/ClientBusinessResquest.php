<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientBusinessResquest extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_profile_id',
        'business_profile_id',
        'package_id',
        'description',
        'request_due_date',
        'is_read'

  ];


  public function client(){
      return $this->belongsTo(ClientProfile::class);
  }

  public function business(){
    return $this->belongsTo(BusinessProfile::class);
}
}
