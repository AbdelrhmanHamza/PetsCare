<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->command->info('User table seeded!');
        // \App\Models\User::factory(10)->create();
        $this->call(ClientSeeder::class);
        $this->command->info('Client table seeded');

        $this->call(BusinessSeeder::class);
        $this->command->info('Business table seeded');

        $this->call(PetsSeeder::class);
        $this->command->info('pets table seeded');

        $this->call(ServicePackageSeeder::class);
        $this->command->info('service package table seeded');

        $this->call(RequestSeeder::class);
        $this->command->info('client request table seeded');

        $this->call(SubscriptionPackageSeeder::class);
        $this->command->info('subscription package table seeded');

        $this->call(UserSubscriptionPackageSeeder::class);
        $this->command->info('user subscription package table seeded');

        $this->call(BusinessProfileServiceSeeder::class);
        $this->command->info('business profile service table seeded');


    }
}
