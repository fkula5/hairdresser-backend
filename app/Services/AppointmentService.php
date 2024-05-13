<?php

namespace App\Services;

use App\Models\Appointment;
use App\Repositories\AppointmentRepository;
use App\Repositories\ServiceRepository;

class AppointmentService
{
    public function __construct(private AppointmentRepository $appointmentRepository, private ServiceRepository $serviceRepository)
    {
    }

    public function store(array $appointmentData): void
    {
        $service = $this->serviceRepository->find($appointmentData->service_id);

        $endTime = clone $appointmentData['start_date'];

        $endTime =

        $this->appointmentRepository-> create($appointmentData);
    }
}
