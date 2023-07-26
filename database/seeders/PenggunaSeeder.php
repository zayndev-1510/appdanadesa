<?php

namespace Database\Seeders;

use App\Models\mahasiswa\MahasiswaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PenggunaSeeder extends Seeder
{

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
        $result=DB::table("tbl_mahasiswa")->whereNot("id_mhs",5)->select()->get();

        // // insert data ke table pengguna

        for($i=0;$i<count($result);$i++){
        DB::table('users')->insert([
        	'id_pengguna' => $result[$i]->id_mhs,
            'email'=>$faker->email(),
            "role"=>"mahasiswa",
        	'username' => $faker->userName(),
        	'password' => Hash::make("12345678"),
        	'remember_token' => Str::password(40),
        ]);
        }

    }
}
