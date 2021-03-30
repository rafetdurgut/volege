<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdemeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faturalar = DB::table('faturalar')->select('faturakodu')->limit(20)->get();
        $fatura_sayisi = count($faturalar);
        $cari = DB::table('musteriler')->select('tc')->limit(20)->get();
        $cari_sayisi = count($cari);

        $start_date = strtotime("2020/01/01");
        $end_date = strtotime(strval(date("Y-m-d H:i:s")));

        for ($i = 0; $i < 500; $i++) {
            DB::table('odeme')->insert(
                [
                    'faturakodu' => strval($faturalar[rand(0, $fatura_sayisi - 1)]->faturakodu),
                    'carikodu' => strval($cari[rand(0, $cari_sayisi - 1)]->tc),
                    'odemetarihi' => date("Y-m-d H:i:s", rand($start_date, $end_date)),
                    'odemetipi' => rand(1, 2), // Borç, Alacak
                    'odenenmiktar' => rand(1000, 5000) / 10,
                    'odemekanali' => rand(1, 3), // Nakit, Kredikarti, Banka
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
