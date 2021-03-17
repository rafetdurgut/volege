<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FaturaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // fauralar tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 5; $i++) {
            DB::table('faturalar')->insert(
                [
                    'adsoyad' => $faker->name,
                    'adres' => $faker->address,
                    'faturatarih' => date("Y-m-d H:i:s"),
                    'gibno' => sprintf("%c%d", rand(65, 90), rand(1000, 50000)),
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
