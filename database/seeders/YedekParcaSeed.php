<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YedekParcaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parca_listesi = array(
            'Balata',
            'Demir Lastiği',
            'Duster',
            'Rot Başlığı',
            'Far Sol',
            'Far Sağ',
            'Ön Tampon',
            'Arka Tampon',
            'Turbo Hortumu',
            'Takoz',
            'Silecek',
            'Ön Balata',
            'Arka Balata',
            'Ön Sinyal Lambası',
            'Arka Fren Aynası',
            'Fan Motoru',
            'Triger',
            'Motor Kayışı',
            'Polen Filtresi',
            'Yağ Filtresi',
            'Mazot Filtresi',
            'Depo',
            'Benzin Kapağı',
            'Direksiyon Simidi',
            'Vites Kolu',
            'Ekran',
            'Radyo',
            'Arka Cam Silecek',
            'Hava Filtresi',
            'Kızdırma Bujisi',
            'Debriyaj Seti',
            'Volan',
            'Diferensiyel',
            'Turbo Motoru',
            'Fan',
            'Torpido',
            'Bagaj Kapağı',
            'Anahtar',
            'Park Sensör'
        );

        $urun_grup = array(
            'Kaporta',
            'İç aksam',
            'Motor',
            'Akü',
            'Elektronik',
            'Mekanik'
        );

        $parca_sayisi = count($parca_listesi);

        for ($i = 0; $i < 100; $i++) {
            $alis_fiyat =  rand(1000, 100000) / 100;
            DB::table('yedekparca')->insert(
                [
                    'ureticikodu' => sprintf("FR%c-%d", rand(65, 90), rand(1000, 5000)),
                    'stokkodu' => sprintf("%c-%d", rand(65, 90), rand(1000, 5000)),
                    'stokadi' => $parca_listesi[rand(0, $parca_sayisi - 1)],
                    'urungrup' => $urun_grup[rand(0, count($urun_grup) - 1)],
                    'stokadet' => rand(1, 500),
                    'uyarimiktari' => rand(1, 50),
                    'birim' => rand(1, 5),
                    'alisfiyati' => $alis_fiyat,
                    'satisfiyati' => $alis_fiyat * rand(100, 170) / 100,
                    'kdv' => rand(1, 18),
                    'created_at' => date("Y-m-d H:i:s")
                ]
            );
        }
    }
}
