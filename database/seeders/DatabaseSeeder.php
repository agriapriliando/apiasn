<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'apiuser',
            'email' => 'apiuser@iaknpky.ac.id',
            'password' => bcrypt('123'),
        ]);

        $this->call([
            EmployeeSeeder::class
        ]);
    }
}
