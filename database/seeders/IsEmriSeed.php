<?php

namespace Database\Seeders;

use App\Models\IsEmri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IsEmriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('tr_TR');
        $startdate = strtotime("2019/01/01");
        $enddate = strtotime(date("Y-m-d H:i:s"));

        $teknisyenler = array(
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname,
            $faker->name . " " . $faker->lastname
        );
        
        $araclar = DB::table('araclar')->select('*')->limit(100)->get();
        $musteri = DB::table('musteriler')->select('*')->limit(100)->get();
        
        for ($i = 0; $i < 100; $i++) {
            $aracgiris = date("Y-m-d H:i:s", rand($startdate, $enddate));
        
            DB::table('isemirleri')->insert([
                'aracgiristarihi' => $aracgiris,
                'arackm' => rand(100, 250000),
                'yakitdurumu' => rand(1, 10) / 10,
                'tahminitutar' => rand(100, 2000),
                'teknisyen' => $teknisyenler[rand(0, count($teknisyenler)-1)],
                'saseno' => $araclar[rand(0, count($araclar)-1)]->saseno,
                'tc' => $musteri[rand(0, count($musteri)-1)]->tc,
                'teslimeden' =>  $faker->name . " " . $faker->lastname,
                'iscilik' => 'İşçi Notu',
                'yapilanlar' => 'Yapılanlar Listesi: 1)...',
                'talep' => 'Müşterinin talepleri: 1) ...',
                'emiraktif' => rand(0,1)
            ]);
        }
    }
}
