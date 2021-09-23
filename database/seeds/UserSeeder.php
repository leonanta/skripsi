<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
Use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'no_induk' => '12345678910',
            'name' => 'Admin',
            'username' => 'adminskripsi',
            'password' => Hash::make('adminskripsi123'),
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'no_induk' => '0406107004',
            'name' => 'Ahmad Jazuli, M.Kom',
            'username' => '0406107004',
            'password' => Hash::make('12345678'),
            'role' => 'dosen',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
        DB::table('users')->insert([
            'no_induk' => '201851048',
            'name' => 'Leonanta Pramudya Kusuma',
            'username' => '201851048',
            'password' => Hash::make('12345678'),
            'role' => 'mahasiswa',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
