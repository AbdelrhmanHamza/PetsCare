<?php

namespace Database\Seeders;

use App\Models\SubscribtionPackage;
use App\Models\User;
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
        'user_id' => User::where('type','business')->get()->first()->id,
        'subscribtion_package_id' => SubscribtionPackage::get()->first()->id,
        'subscribtion_date' => '2021-10-10'
    ]);

    }
}
