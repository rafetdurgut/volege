<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
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

        $startdate = strtotime("2018/01/01");
        $enddate = strtotime(date("Y-m-d H:i:s"));

        for ($i = 0; $i < 100; $i++) {
            //plaka uret
            $plaka = sprintf("%02d%s%s%03d", strval(rand(1, 81)), chr(rand(65, 90)), chr(rand(65, 90)), rand(100, 999));
            $model = sprintf("%c%d", rand(65, 90), rand(1, 9));
            $saseno="";
            //70 olasılıkla sase no ekle
            if (rand(0,100) > 30){
                $saseno = sprintf("%c%04d%04d", chr(rand(65, 90)), rand(1, 9999), rand(1, 9999));
            }

            DB::table('ekspertiz')->insert(
                [
                    'aracgiristarihi' => date("Y-m-d H:i:s", rand($startdate, $enddate)),
                    'arackm' => rand(100, 250000),
                    'yakitdurumu' => rand(1, 10) / 10,
                    'tahminitutar' => rand(100, 1000) / 10 * 10,
                    'saseno' => $saseno,
                    //'plaka' => $plaka,
                    //'marka' => $markalar[rand(0, $len_marka - 1)],
                    //'model' => $model,
                    //'yil' => rand(1990, 2021),
                    'tc' => sprintf("%d%d%d", rand(1000, 9999), rand(1000, 9999), rand(100, 999)),
                    'resimurl' => sprintf("path/to/%s.jpg", $plaka),
                    //'created_at' => date("Y-m-d H:i:s", rand($startdate, $enddate)),
                    
                ]
            );
        }
    }
}
