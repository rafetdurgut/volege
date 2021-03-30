<?php

namespace Database\Seeders;

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
        );

        // Araclar tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 10; $i++) {
            //plaka uret
            $plaka = sprintf("%02d%s%s%d", strval(rand(1, 81)), chr(rand(65, 90)), chr(rand(65, 90)), rand(100, 999));
            $model = sprintf("%c%d", rand(65, 90), rand(1, 9));
            DB::table('araclar')->insert(
                [
                    'saseno' => sprintf("%c%04d%04d", chr(rand(65, 90)), rand(1, 9999), rand(1, 9999)),
                    'plaka' => $plaka,
                    'marka' => $markalar[rand(0, 6)],
                    'model' => $model,
                    'yil' => rand(2000, 2021),
                    'created_at' => date("Y-m-d H:i:s"),
                    'musteriid' => rand(1, 20),
                ]
            );
        }
    }
}
