<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IsEmriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('isemirleri')->insert(
                [
                    'aracgiristarihi' => date("Y-m-d H:i:s"),
                    'isemriolusturmatarihi' => date("Y-m-d H:i:s"),
                    'arackm' => rand(0, 500000),
                    'yakitdurumu' => rand(10, 100) / 100,
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
