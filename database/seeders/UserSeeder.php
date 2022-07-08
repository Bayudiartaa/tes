<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'nis' => 'NIS-0001',
            'nama' => 'admin',
            'username' => 'admin',
            'email'  => 'admin@gmail.com',
            'tanggal_lahir' => '2002-12-12',
            'umur' => 20,
            'alamat' => 'Bandung Raya',
            'password' => bcrypt('password'),
        ]);
    }
}
