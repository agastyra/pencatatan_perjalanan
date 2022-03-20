<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
use App\Models\Perjalanan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'nama' => 'Super admin'
        ]);

        Level::create([
            'nama' => 'Admin'
        ]);

        Level::create([
            'nama' => 'User'
        ]);

        User::create([
            'nik' => '1234567890123456',
            'nama' => 'Rangga Agastya',
            'password' => Hash::make('rangga'),
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2017-06-15',
            'telp' => '089123456789',
            'email' => 'rangga.agastya711@gmail.com',
            'alamat' => 'GPA',
            'id_level' => '3',
        ]);

        User::create([
            'nik' => '2222222222222222',
            'nama' => 'Admin',
            'password' => Hash::make('administrator'),
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2017-06-15',
            'telp' => '087098765431',
            'email' => 'admin@gmail.com',
            'alamat' => 'GPA',
            'id_level' => '2',
        ]);

        User::create([
            'nik' => '1111111111111111',
            'nama' => 'Super Admin',
            'password' => Hash::make('superadmin'),
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2017-06-15',
            'telp' => '087098765433',
            'email' => 'superadmin@gmail.com',
            'alamat' => 'GPA',
            'id_level' => '1',
        ]);

        \App\Models\User::factory(10)->create();
        Perjalanan::factory(10)->create();
    }
}
