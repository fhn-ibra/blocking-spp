<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nama' => 'Admin',
                'level' => 'admin',
            ], [
                'username' => 'ibra',
                'password' => bcrypt('ibra'),
                'nama' => 'Ibra',
                'level' => 'siswa',
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
