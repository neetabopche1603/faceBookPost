<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $register = new User();
        $register->name = 'Administrator';
        $register->email = 'admin@gmail.com';
        $register->is_admin = 1;
        $register->password= Hash::make(12345678);
        $register->save();   
    }
}
