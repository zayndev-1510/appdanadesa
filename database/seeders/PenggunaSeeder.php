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

        // // insert data ke table pengguna

        DB::table('users')->insert([
        	'id_pengguna' => 0,
            'email'=>"kopralgamers1510@gmail.com",
            "role"=>"admin",
        	'username' => "admin",
            "name"=>"admin",
        	'password' => Hash::make("12345678"),
        	'remember_token' => Str::password(40),
        ]);

    }
}
