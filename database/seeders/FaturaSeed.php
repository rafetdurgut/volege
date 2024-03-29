<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class FaturaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $musteri = DB::table('musteriler')->select('tc')->limit(100)->get();
        $l = count($musteri);
        
        $start_date = strtotime("2019/01/01");
        $end_date = strtotime(strval(date("Y-m-d H:i:s")));
        
        // fauralar tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 500; $i++) {
            
            $cari_kodu = strval($musteri[rand(0, $l-1)]->tc);
            $fatura_tarih = date("Y-m-d H:i:s", rand($start_date, $end_date));
            $vade_tarih = date("Y-m-d H:i:s", strtotime($fatura_tarih) + rand(0, 24*60*60*365)); //bir yıla kadar rasgele vade
            DB::table('faturalar')->insert(
                [
                    'faturakodu' => sprintf("FA%05d", rand(1000, 50000)),
                    'carikodu' => $cari_kodu,
                    'faturatarih' => $fatura_tarih,
                    'vade' => $vade_tarih,
                    'faturatipi' => rand(1, 2),
                    'faturadurum' => rand(1, 3), //açık kapalı iptal
                    'gibno' => sprintf("G%c%d", rand(65, 90), rand(1000, 50000)),
                    'faturatoplam' => rand(1000, 5000)/10,
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
