<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use App\Models\ClientBusinessResquest;
use App\Models\ClientProfile;
use App\Models\ServicePackage;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientBusinessResquest::create([
            'client_profile_id'=>ClientProfile::get()->first()->id,
            'business_profile_id'=>BusinessProfile::get()->first()->id,
            'package_id'=>ServicePackage::get()->first()->id,
            'description'=>'i need groom my dog and shower him',
            'request_due_date'=>'2021-12-12'
        ]);

        ClientBusinessResquest::create([
            'client_profile_id'=>ClientProfile::get()->first()->id,
            'business_profile_id'=>BusinessProfile::get()->first()->id,
            'package_id'=>ServicePackage::get()->first()->id,
            'description'=>'i need groom my dog and shower him',
            'request_due_date'=>'2021-12-12'
        ]);
    }
}
