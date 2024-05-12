<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+1 month');
        $duration = [30, 60, 90];

        return [
            'employee_id' => Employee::factory(),
            'comments' => fake()->text(254),
            'customer_id' => Customer::factory(), // Assuming you have 50 customers
            'service_id' => Service::factory(), // Assuming you have 20 services
            'start_date' => $startDate,
            'end_date' => $startDate->modify('+'.fake()->randomElement($duration).'minutes'),
        ];
    }
}
