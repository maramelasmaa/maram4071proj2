<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'maram1@gmail.com'],
            [
                'name' => 'Maram',
                'password' => Hash::make('123456'),
                'phoneNumber' => '01000000001',
            ]
        );
    }
}
