<?php

namespace Database\Seeders;

use App\Models\SubscribtionPackage;
use Illuminate\Database\Seeder;

class SubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscribtionPackage::create([
            'subscribtion_package_name'=>'monthly',
            'subscribtion_package_description'=>'we offer you 40 viewers per days and marketing you',
            'activation_period'=>'2',
            'subscribtion_package_price'=>'2000.5'
        ]);

        SubscribtionPackage::create([
            'subscribtion_package_name'=>'semi year',
            'subscribtion_package_description'=>'we offer you 1800 viewers per month , marketing you and bla bla blaaaa',
            'activation_period'=>'6',
            'subscribtion_package_price'=>'5000.5'
        ]);
    }
}
