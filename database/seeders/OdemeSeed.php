<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OdemeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('odeme')->insert(
                [
                    'faturakodu' => sprintf("FA%d", rand(1000, 5000)),
                    'carikodu' => sprintf("testcari%d", rand(100,500)),
                    'odemetarihi' => date("Y-m-d H:i:s"),
                    'odemetipi' => rand(1, 2),
                    'odenenmiktar' => rand(1000,5000) / 10,
                    'odemekanali' => rand(1, 3),
                    'created_at' => date("Y-m-d H:i:s"),
                ]
            );
        }
    }
}
