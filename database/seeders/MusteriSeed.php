<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MusteriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('tr_TR');

        $ticaridurum = array(
            'bireysel',
            'kamu',
            'tüzel',
            'şirket'
        );

        $startdate = strtotime("2015/01/01");
        $enddate = strtotime(date("Y-m-d H:i:s"));

        // Musteri tablosuna rastgele veri doldurur.
        for ($i = 0; $i < 100; $i++) {
            DB::table('musteriler')->insert(
                [
                    'tc' => sprintf("%d%d%d", rand(1000, 9999), rand(1000, 9999), rand(100, 999)),
                    'adsoyad' => $faker->firstName . " " . $faker->lastName,
                    'telefon' => $faker->phoneNumber,
                    'email' =>  $faker->email,
                    'adres' => $faker->address,
                    'adres2' => $faker->city,
                    'vergino' =>  sprintf("%d%d", rand(1000, 9999), rand(1000, 9999)),
                    'ticaridurum' => $ticaridurum[rand(0, 3)],
                    'created_at' => date("Y-m-d H:i:s", rand($startdate, $enddate)),
                ]
            );
        }
    }
}
