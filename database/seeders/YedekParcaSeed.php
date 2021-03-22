<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class YedekParcaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('tr_TR');
        $birim = ['Yok','Adet','Litre','Takım','Paket'];
        for ($i = 0; $i < 100; $i++) {
            $alis_fiyat =  rand(1000,50000)/100;
            DB::table('yedekparca')->insert(
                [
                    'ureticikodu' => sprintf("FR%c-%d", rand(65,90), rand(1000,5000)),
                    'stokkodu' => sprintf("%c-%d", rand(65,90), rand(1000,5000)),
                    'stokadi' => $faker->name,
                    'urungrup' => $faker->name,
                    'adet' => rand(1,500),
                    'uyari_adet' => rand(1,50),
                    'iskonto' => rand(1,50).'-'.rand(1,50),
                    'birim' => $birim[rand(0,4)],
                    'alisfiyati' =>$alis_fiyat,
                    'satisfiyati' => $alis_fiyat*1.1,
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
