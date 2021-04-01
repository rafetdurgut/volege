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
        for ($i = 0; $i < 100; $i++) {

            $parca_sayisi = rand(1, 4);
            $fkodu = strval($faturalar[rand(0, $fatura_sayisi - 1)]->faturakodu);

            for ($j = 0; $j < $parca_sayisi; $j++) {
                $stoktandus = 0;
                if(rand(1,10) > 3 ){
                    //70 oranında stoktan düşülsün
                    $stoktandus = 1;
                }
                DB::table('faturadetay')->insert(
                    [
                        'faturakodu' => $fkodu,
                        'yedekparcaid' => rand(1, $yedek_sayisi),
                        'miktar' => rand(1, 50),
                        'fiyat' => rand(5000, 100000) / 100,
                        'iskonto' => sprintf("%d-%d-d", rand(0, 50), rand(0, 25), rand(0, 10)),
                        'stoktandusme' => $stoktandus,
                        'created_at' => date("Y-m-d H:i:s"),
                    ]
                );
            }
        }
    }
}
