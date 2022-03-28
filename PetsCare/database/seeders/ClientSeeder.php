<?php

namespace Database\Seeders;
use App\Models\ClientProfile;
use App\Models\users;
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
                'user_id'=> users::where('type','client')->get()->first()->id,
                'first_name'=>'Amr',
                'last_name'=>'Samy',
                'address'=>'6 october city',
                'phone_number'=>'01120623383'
        ]);


    }
}
