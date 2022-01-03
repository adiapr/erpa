<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //memasukkan data otomatis ke database
        DB::table('users')->insert([
            "name"      => "Administrator",
            "email"     => "adminstrator@gmail.com",
            "password"  => bcrypt("administrator"),
            "role"      => "administrator"
        ]);

        DB::table('users')->insert([
            "name"      => "asosiasi",
                "email"     => "asosiasi@gmail.com",
                "password"  => bcrypt("asosiasi"),
                "role"      => "asosiasi"
        ]);

        DB::table('users')->insert([
            "name"      => "ketua",
                "email"     => "ketua@gmail.com",
                "password"  => bcrypt("ketua"),
                "role"      => "ketua"
        ]);

        DB::table('users')->insert([
            "name"      => "hukum",
                "email"     => "hukum@gmail.com",
                "password"  => bcrypt("hukum"),
                "role"      => "hukum"
        ]);

        DB::table('users')->insert([
            "name"      => "verifikator",
                "email"     => "verifikator@gmail.com",
                "password"  => bcrypt("verifikator"),
                "role"      => "verifikator"
        ]);
    }
}
