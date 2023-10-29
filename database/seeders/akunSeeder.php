<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = User::all();
        $data -> insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
