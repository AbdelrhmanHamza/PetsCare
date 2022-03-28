<?php

namespace Database\Seeders;


use App\Models\UserSubsrcibtionPackage;
use Illuminate\Database\Seeder;

class UserSubscriptionPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserSubsrcibtionPackage::create([
        'user_id' => 1,
        'subscribtion_package_id' => 1,
        'subscribtion_date' => '2021-10-10'
    ]);

    

    }
}
