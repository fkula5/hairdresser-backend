<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();
        $services = Service::all();
        $prices = [50, 100, 150];


        foreach ($employees as $employee){
            foreach ($services as $service) {
                DB::table('employees_services')->insert([
                    'employee_id' => $employee->id,
                    'service_id' => $service->id,
                    'price' => $prices[array_rand($prices)]
                    ]);
            }
        }
    }
}
