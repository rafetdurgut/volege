<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        //php artisan db:seed 
        //veritabanini doldur
        $this->call(
            [
                AracSeed::class, 
                MusteriSeed::class,
                IsEmriSeed::class,
                OdemeSeed::class,
                FaturaSeed::class,
                FaturaDetaySeed::class,
                ParcaIsemriSeed::class,
                SorunIsemriSeed::class,
                YedekParcaSeed::class,


            ]
        );
    }
}
