<?php

namespace Database\Seeders;

use App\Repositories\ServiceRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Beard Trimming',
                'description' => 'A quick trim for your beard',
                'gender' => 'male',
                'duration' => 30,
            ],
            [
                'name' => 'Hair Trimming',
                'description' => 'A stylish hair trim',
                'gender' => 'other',
                'duration' => 60,
            ],
            [
                'name' => 'Facial Treatment',
                'description' => 'A relaxing facial treatment',
                'gender' => 'female',
                'duration' => 120,
            ],
            [
                'name' => 'Full Body Massage',
                'description' => 'A full body massage session',
                'gender' => 'other',
                'duration' => 90,
            ],
            [
                'name' => 'Manicure',
                'description' => 'A professional manicure',
                'gender' => 'female',
                'duration' => 60,
            ],
        ];

        foreach ($services as $service) {
            $this->serviceRepository->create($service);
        }
    }
}
