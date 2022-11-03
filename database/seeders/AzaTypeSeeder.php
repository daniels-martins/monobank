<?php

namespace Database\Seeders;

use App\Models\AzaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AzaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $azaTypes = ['savings', 'checking', 'joint', 'loan', 'fixed'];
        foreach ($azaTypes as $name) {
            AzaType::create([
                'name' => $name
            ]);
        }
    }
}
