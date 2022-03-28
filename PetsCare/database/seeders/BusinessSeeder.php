<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BusinessProfile::create([
            'user_id'=> 2,
            'business_type'=>'vet',
            'business_name'=>'we care',
            'address'=>'6 october city',
            'phone_number'=>'01120623383',
            'service_description'=>'we care about all your pets',
            'open_at'=>'6:00',
            'close_at'=>'15:00'
    ]);

    BusinessProfile::create([
        'user_id'=>2,
        'business_type'=>'vet',
        'business_name'=>'we care',
        'address'=>'6 october city',
        'phone_number'=>'01120623383',
        'service_description'=>'we care about all your pets',
        'open_at'=>'6:00',
        'close_at'=>'15:00'
]);
    }
}
