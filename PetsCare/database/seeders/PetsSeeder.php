<?php

namespace Database\Seeders;

use App\Models\ClientProfile;
use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::create([
            'client_profile_id' => ClientProfile::get()->first()->id,
            'pet_type' => 'dogs',
            'pet_breed' => 'german',
            'pet_age' => '2021-12-12',
            'has_medical_condition' => false
        ]);

        Pet::create([
            'client_profile_id' => ClientProfile::get()->first()->id,
            'pet_type' => 'cats',
            'pet_breed' => 'siamy',
            'pet_age' => '2021-12-12',
            'has_medical_condition' => true
        ]);

        Pet::create([
            'client_profile_id' => ClientProfile::get()->first()->id,
            'pet_type' => 'cats',
            'pet_breed' => 'shrazy',
            'pet_age' => '2021-12-12',
            'has_medical_condition' => false
        ]);
    }
}
