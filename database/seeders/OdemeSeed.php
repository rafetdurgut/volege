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
        $faturalar = DB::table('faturalar')->select('*')->limit(20)->get();
        $fatura_sayisi = count($faturalar);
        $cari = DB::table('musteriler')->select('tc')->limit(20)->get();
        $cari_sayisi = count($cari);

        for ($i = 0; $i < 500; $i++) {
            $tmpfatura = $faturalar[rand(0, $fatura_sayisi - 1)];

            $cari_odeyen = $cari[rand(0, $cari_sayisi - 1)]->tc;
            if (rand(1, 10) > 8) {
                //%80 kendi odesin
                $cari_odeyen = $tmpfatura->carikodu;
            }

            DB::table('odeme')->insert(
                [
                    'faturakodu' => $tmpfatura->faturakodu,
                    'carikodu' => $cari_odeyen,
                    'odemetarihi' => date("Y-m-d H:i:s", strtotime($tmpfatura->faturatarih) + rand(0, 24 * 60 * 60 * 365)),
                    'odemetipi' => rand(1, 2), // Borç, Alacak
                    'odenenmiktar' => rand(10, $tmpfatura->faturatoplam * 10) / 10,
                    'odemekanali' => rand(1, 3), // Nakit, Kredikarti, Banka
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
