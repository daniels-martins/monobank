<?php

namespace Database\Seeders;

use App\Models\CardGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CardGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardGroup::create(
            [
                'name' => 'visa'
            ]
        );

        CardGroup::create(
            [
                'name' => 'master card'
            ]
        );
        CardGroup::create(
            [
                'name' => 'verve'
            ]
        );

        CardGroup::create(
            [
                'name' => 'american express'
            ]
        );

        CardGroup::create(
            [
                'name' => 'discover'
            ]
        );


    }
}
