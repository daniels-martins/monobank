<?php

namespace Database\Seeders;

use App\Models\CardKind;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardKind::create(
            [
                'name' => 'virtual'
            ]
        );

        CardKind::create(
            [
                'name' => 'physical'
            ]
        );
    }
}
