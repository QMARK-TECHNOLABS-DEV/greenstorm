<?php

// use Illuminate\Database\Seeder;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email'=> 'green@greenstorm.green',
            'role' => 'admin',
            'password' => Hash::make('sUx99ot6-br@yasteC#a'),
        ]);
    }
}
