<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;
use App\Repositories\ServiceRepository;
use Carbon\Carbon;

class AppointmentService
{
    public function __construct(
        private AppointmentRepository $appointmentRepository,
        private ServiceRepository $serviceRepository
    ) {
    }

    public function store(array $appointmentData): void
    {
        $service = $this->serviceRepository->find($appointmentData['service_id']);

        $startDate = Carbon::parse($appointmentData['start_date']);
        $serviceDuration = $service->duration;

        $endDate = $startDate->copy()->addMinutes($serviceDuration);

        $appointmentData['end_date'] = $endDate;

        $this->appointmentRepository->create($appointmentData);
    }
}
