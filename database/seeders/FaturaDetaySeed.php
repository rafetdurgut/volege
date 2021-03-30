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
        $faturalar = DB::table('faturalar')->select('faturakodu')->limit(20)->get();
        $yedek_sayisi = DB::table('yedekparca')->count();
        $fatura_sayisi = count($faturalar);
        // detaylı fatura tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 5; $i++) {
            $parca_sayisi = rand(1, 3);
            $fkodu = strval($faturalar[rand(0, $fatura_sayisi - 1)]->faturakodu);
            for ($j = 0; $j < $parca_sayisi; $j++) {
                DB::table('faturadetay')->insert(
                    [
                        'faturakodu' => $fkodu,
                        'yedekparcaid' => rand(1, $yedek_sayisi),
                        'miktar' => rand(1, 100),
                        'fiyat' => rand(5000, 100000) / 100,
                        'iskonto' => sprintf("%d-%d", rand(0, 50), rand(0, 25)),
                        'created_at' => date("Y-m-d H:i:s"),

                    ]
                );
            }
        }
    }
}
