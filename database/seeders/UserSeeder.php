<?php

namespace Database\Seeders;

use App\Models\Penyewa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
        ]);
        
    }
}
