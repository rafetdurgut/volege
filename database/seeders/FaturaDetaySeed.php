<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaturaDetaySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // detaylı fatura tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 5; $i++) {
            DB::table('faturadetay')->insert(
                [
                    'cinsi' => 'Yedek Parça',
                    'Miktar' => rand(1,500),
                    'fiyat' => rand(5000,100000)/100,
                    'iskonto' => sprintf("%d-%d", rand(0,50), rand(0,25)),
                    'created_at' => date("Y-m-d H:i:s"),
                    'faturaid' => rand(1,5),
                ]
            );
        }
    }
}
