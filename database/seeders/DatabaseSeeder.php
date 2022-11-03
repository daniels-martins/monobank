<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->seedDB();
    }




    public function seedDB()
    {
         // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // prerequisites
        $this->call(CardKindSeeder::class); //defaults
        $this->call(CardTypeSeeder::class);//defaults
        $this->call(CardGroupSeeder::class);//defaults
        $this->call(AzaTypeSeeder::class);//defaults

        // human data
        $this->call(UserSeeder::class); //for testing
        $this->call(CardSeeder::class); //specific to first user
    }
}
