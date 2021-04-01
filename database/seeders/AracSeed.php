<?php

namespace Database\Seeders;

use App\Models\Musteri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AracSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markalar = array(
            'Mercedes',
            'Volvo',
            'Audi',
            'Volkswagen',
            'BMW',
            'Renault',
            'Citroen',
            'Skoda',
            'Cherry',
            'Opel',
            'Maserati',
            'Peugeot'
        );

        $len_marka = count($markalar);
        $musteri_sayisi = Musteri::select('*')->count();
        
        $startdate = strtotime("2015/01/01");
        $enddate = strtotime(date("Y-m-d H:i:s"));

        // Araclar tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 100; $i++) {
            //plaka uret
            $plaka = sprintf("%02d%s%s%03d", strval(rand(1, 81)), chr(rand(65, 90)), chr(rand(65, 90)), rand(100, 999));
            $model = sprintf("%c%d", rand(65, 90), rand(1, 9));
            $motor_no="";
            //30 olasılıkla motor no ekle
            if (rand(0,100) > 30){
                $motor_no = sprintf("%c%05d%05d", chr(rand(65,90)), rand(1,99999), rand(1,99999));
            }
            DB::table('araclar')->insert(
                [
                    'saseno' => sprintf("%c%04d%04d", chr(rand(65, 90)), rand(1, 9999), rand(1, 9999)),
                    'motorno' => $motor_no,
                    'plaka' => $plaka,
                    'marka' => $markalar[rand(0, $len_marka - 1)],
                    'model' => $model,
                    'yil' => rand(1990, 2021),
                    'created_at' => date("Y-m-d H:i:s", rand($startdate, $enddate)),
                    'musteriid' => rand(1, $musteri_sayisi - 1),
                ]
            );
        }
    }
}
