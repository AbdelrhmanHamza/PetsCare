<?php

namespace Database\Seeders;
use App\Models\ClientProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         ;
        ClientProfile::create([
                'user_id'=> User::where('type','client')->get()->first()->id,
                'first_name'=>'Amr',
                'last_name'=>'Samy',
                'address'=>'6 october city',
                'phone_number'=>'01120623383'
        ]);

        ClientProfile::create([
            'user_id'=> User::where('type','client')->get()->first()->id,
            'first_name'=>'Boody',
            'last_name'=>'Hamza',
            'address'=>'maadi city',
            'phone_number'=>'01064829620'
    ]);


    }
}
