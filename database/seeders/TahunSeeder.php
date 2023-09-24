<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=12;$i++){
            DB::table('tahun_setting')->insert([
                "keterangan"=>$i." Minggu"
            ]);
        }

    }
}
