<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nomer_pegawai' => 'ATT123',
            'nama' => 'doni',
            'email' => 'doni@gmail.com',
            'password' => 'rahasia',
            'role' => 'kades'
        ]);
    }
}
