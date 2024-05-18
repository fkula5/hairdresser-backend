<?php

namespace Database\Seeders;

use App\Models\Appointment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //        User::factory()->create([
        //            'name' => 'Test User',
        //            'email' => 'test@example.com',
        //        ]);
        $this->call(ServiceSeeder::class);
        Appointment::factory(50)->create();
        $this->call(EmployeeServiceSeeder::class);
    }
}
