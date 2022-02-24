<?php

namespace Database\Seeders;

use App\Models\ServicePackage;
use Illuminate\Database\Seeder;

class ServicePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServicePackage::create([
        'package_name'=>'monthly',
        'package_description'=>'buy one get 3 free',
        'package_price'=>'125.5'
    ]);

        ServicePackage::create([
        'package_name'=>'daily',
        'package_description'=>'buy one get 5 free',
        'package_price'=>'100.5'
    ]);
    }
}
