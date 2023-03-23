<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AzaType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AzaController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = User::create([
            'name' => 'webdev587',
            'email' => 'webdev587@gmail.com',
            'password' => Hash::make('webdev587'),
        ]);

        // create and link a profile to authUser
        $user_profile_link_created = $new_user->profile()->create([
            'fname' =>  $new_user->name,
            // 'user_email' =>  $new_user->email
        ]);

        //  link a user to aza
        if ($user_profile_link_created) {
            $new_user->azas()->create([
                'num'         => AzaController::generateAzaNum(),
                'aza_type_id' => AzaType::where('name', 'savings')->first()->id
            ]);
        } else {
            return dd('danger', 'Error! User Profile could not be Created..');
        }
    }
}
