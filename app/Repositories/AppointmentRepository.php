<?php

namespace App\Repositories;

use App\Models\Appointment;

class AppointmentRepository extends BaseRepository
{
    public function __construct(Appointment $model)
    {
        $this->model = $model;
    }
}