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
                    'faturakodu' => sprintf("FA%d", rand(1000, 5000)),
                    'carikodu' => sprintf("testcari%d", rand(100,500)),
                    'faturatarih' => date("Y-m-d H:i:s"),
                    'faturatipi' => rand(1, 2),
                    'faturadurum' => rand(1, 2),
                    'gibno' => sprintf("G%c%d", rand(65, 90), rand(1000, 50000)),
                    'faturatoplam' => rand(1000, 5000)/10,
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
