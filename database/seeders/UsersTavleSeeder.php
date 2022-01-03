<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTavleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User;
        $user->name = "Administrator";
        $user->email = "administrator@mail.com";
        $user->password = bcrypt('ac180115');
        $user->role = "administrator"; 
        $user->save();
    }
}
