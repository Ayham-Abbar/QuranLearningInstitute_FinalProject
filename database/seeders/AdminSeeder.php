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
     */
    public function run(): void
    {
        User::create([
            'name' => 'أيهم عبار',
            'email' => 'admin@example.com',
            'password' => Hash::make('123123123'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '123456789',
            'gender' => 'male',
            'image'=>'images/users/t1.jpeg'
        ]);
    }
}
