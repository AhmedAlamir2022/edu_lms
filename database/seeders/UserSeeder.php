<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ahmed Mostafa',
                'email' => 'ahmed521@gmail.com',
                'password' => bcrypt('ahmed521'),
                'role' => 'student',
                'approve_status' => 'approved'
            ],
            [
                'name' => 'Instructor',
                'email' => 'instructor@gmail.com',
                'password' => bcrypt('instructor'),
                'role' => 'instructor',
                'approve_status' => 'approved'
            ],
        ];

        User::insert($users);
    }
}
