<?php

namespace Database\Seeders;

use App\Models\CardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardType::create(
            [
                'name' => 'debit'
            ]
        );
        CardType::create(
            [
                'name' => 'credit'
            ]
        );
    }
}
