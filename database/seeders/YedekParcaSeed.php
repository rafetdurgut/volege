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
        for ($i = 0; $i < 5; $i++) {
            DB::table('yedekparca')->insert(
                [
                    'stokkodu' => sprintf("%c-%d", rand(65,90), rand(1000,5000)),
                    'stokadi' => $faker->name,
                    'adet' => rand(1,500),
                    'alisfiyati' => rand(1000,50000)/100,
                    'created_at' => date("Y-m-d H:i:s"),
                    
                ]
            );
        }
    }
}
