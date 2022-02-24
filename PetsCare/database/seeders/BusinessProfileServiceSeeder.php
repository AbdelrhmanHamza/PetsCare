<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use App\Models\ServicePackage;
use DB;
use Illuminate\Database\Seeder;

class BusinessProfileServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_profile_service_package')->insert([
            'business_profile_id'=>BusinessProfile::get()->first()->id,
            'service_package_id'=>ServicePackage::get()->first()->id
        ]);
    }
}
