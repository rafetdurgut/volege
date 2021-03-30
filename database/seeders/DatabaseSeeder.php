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
                MusteriSeed::class,
                AracSeed::class,
                YedekParcaSeed::class,
                IsEmriSeed::class,
                FaturaSeed::class,
                FaturaDetaySeed::class,
                OdemeSeed::class,
                ParcaIsemriSeed::class,
                SorunIsemriSeed::class,

            ]
        );
    }
}
