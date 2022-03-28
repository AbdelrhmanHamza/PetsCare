<?php

namespace Database\Seeders;

use App\Models\ClientBusinessResquest;
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
            'client_profile_id'=>1,
            'business_profile_id'=>1,
            'package_id'=>1,
            'description'=>'i need groom my dog and shower him',
            'request_due_date'=>'2021-12-12'
        ]);

        ClientBusinessResquest::create([
            'client_profile_id'=>1,
            'business_profile_id'=>2,
            'package_id'=>2,
            'description'=>'i need groom my dog and shower him',
            'request_due_date'=>'2021-12-12'
        ]);
    }
}
