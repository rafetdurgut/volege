<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ParcaIsemriSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('parcaisemri')->insert(
                [
                    'emirid' => rand(1,10),
                    'yedekparcaid' => rand(1,10),
                    'created_at' => date("Y-m-d H:i:s"),                    
                ]
            );
        }
    }
}
