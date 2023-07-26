<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CalonKknSeeder extends Seeder
{

    /**
     * Summary of generateUserID
     * @return string
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
        $result=DB::table("users")->whereNot("id_pengguna",5)->select()->get();

        // insert data ke table mahasiswa
        for($i=1;$i<=110;$i++){
           DB::table('tbl_calon_kkn')->insert([
               'id_mhs' => $result[$i]->id_pengguna ,
               'kode_calon_kkn' => self::generateUserID(),
               'email' =>$result[$i]->email,
               'nomor_hp' => "082297886738",
               "ukuran_baju"=>"XL",
               "desa"=>"Wanci",
               "kecamatan"=>"Wangi-Wangi",
               "kabupaten"=>"KAB. WAKATOBI",
               "id_berkas_calon"=>0,
               "tgl_daftar"=>$faker->date(),
               "status"=>0,
               "id_periode_kkn"=>6
           ]);
        }
    }
}
