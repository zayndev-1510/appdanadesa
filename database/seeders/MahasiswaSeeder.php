<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Str;

class MahasiswaSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */

     private function generateUserID() {
        // Generate a random string
        $randomString = bin2hex(random_bytes(20));

        // Get the current timestamp
        $timestamp = time();

        // Combine the random string and timestamp
        $userID = $randomString . $timestamp;

        return $userID;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
         // insert data ke table mahasiswa
         for($i=1;$i<=10;$i++){
            DB::table('tbl_mahasiswa')->insert([
                'nim_mhs' => ($i<10) ? "1597000".$i : "159700".$i ,
                'nama_mhs' => $faker->name,
                'tempat_lahir_mhs' =>"Baubau",
                'tgl_lahir_mhs' => "2000-01-01",
                "email_mhs"=>$faker->email(),
                "nomor_hp_mhs"=>"082297886738",
                "angkatan_mhs"=>"2015",
                "id_fakultas"=>5,
                "id_jurusan"=>3,
                "foto_mhs"=>"default.jpg"
            ]);
         }

    }
}
