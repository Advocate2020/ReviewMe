<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'test@test.com',
            'password' => Hash::make('Admin@123'),
            'name' => 'jane',
            'surname' => 'doe',
            'role_id' => 1
        ]);
    }
}
