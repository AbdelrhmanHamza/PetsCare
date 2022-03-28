<?php

namespace Database\Seeders;

use App\Models\users;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::create([
            'user_name' => 'admin@admin',
            'email' => 'admin@admin.com',
            'type' => 'Admin',
            'password' => bcrypt('admin123'),
        ]);
        users::create([
            'user_name' => 'business@business',
            'email' => 'business@business.com',
            'type' => 'Business',
            'password' => bcrypt('business123'),
        ]);
        users::create([
            'user_name' => 'client@client',
            'email' => 'client@client.com',
            'type' => 'Client',
            'password' => bcrypt('client123'),
        ]);
    }
}
