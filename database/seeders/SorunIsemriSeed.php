<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SorunIsemriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('sorunisemri')->insert(
                [
                    'isemriid' => rand(1,10),
                    'sorunmetni' => $faker->text,
                    'created_at' => date("Y-m-d H:i:s"),                    
                ]
            );
        }
    }
}
