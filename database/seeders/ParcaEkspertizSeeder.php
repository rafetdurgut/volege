<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcaEkspertizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertiz = DB::table('ekspertiz')->select('id')->limit(100)->get();
        $expertiz_sayisi = count($expertiz);

        $yedekparca = DB::table('yedekparca')->select('id', 'satisfiyati')->limit(100)->get();
        $yedekparca_sayisi = count($yedekparca);

        for ($i = 0; $i < 100; $i++) {
            $yedekid = rand(0, $yedekparca_sayisi - 1);
            $adet = rand(1, 20);
            $toplamfiyat = $adet * $yedekparca[$yedekid]->satisfiyati;
            DB::table('parcaekspertiz')->insert(
                [
                    'ekspertizid' => $expertiz[rand(0, $expertiz_sayisi - 1)]->id,
                    'yedekparcaid' => $yedekid,
                    'satisfiyati' => $yedekparca[$yedekid]->satisfiyati,
                    'toplamfiyat' => $toplamfiyat,
                    'adet' => $adet,
                    'created_at' => date("Y-m-d H:i:s")
                ]
            );
        }
    }
}
