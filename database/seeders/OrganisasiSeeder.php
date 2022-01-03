<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('table_organisasi')->insert([
            "nama_organisasi"       => "Advo Jogja",
            "alamat"                => "Jl. Kp Ngadiwinatan no.5221, Ngampilan, Yogakarta",
            "telp"                  => "0274567897",
            "email"                 => "advojogja@gmail.com",
            "pengurus"              => "Moh Samanta, S.H, M.H"
        ]);
    }
}
