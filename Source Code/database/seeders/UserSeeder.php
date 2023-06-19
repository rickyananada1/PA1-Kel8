<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Lago Hotel',
            'email' => 'adminlagohotel@gmail.com',
            'password' => Hash::make('lagohoteljaya123'),
            'role' => 'admin',
        ]);
    }
}
