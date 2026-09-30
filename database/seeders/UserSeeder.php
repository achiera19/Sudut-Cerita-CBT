<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@ruangbk.test'],
            [
                'name' => 'Admin RuangBK',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'counselor@ruangbk.test'],
            [
                'name' => 'Counselor RuangBK',
                'password' => Hash::make('counselor123'),
                'role' => 'counselor',
            ]
        );
    }
}
