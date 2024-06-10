<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Appointment;
use App\Repositories\ServiceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Schedule extends Controller
{
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(string $date, int $service): array
    {
//        $validated = $request->validated();

        $availableStart = [];

        $workStart = Carbon::parse($date)->setTime(9, 0);
        $workEnd = $workStart->copy()->setTime(17, 0);

        $appointments = Appointment::whereDate('start_date', $workStart)->get();

        $service = $this->serviceRepository->find($service);

        while ($workStart->lessThanOrEqualTo($workEnd->copy()->subMinutes($service->duration))) {
            $endTime = $workStart->copy()->addMinutes($service->duration);

            if ($endTime->greaterThan($workEnd)) {
                break;
            }

            $overlap = false;
            foreach ($appointments as $appointment) {

                if (
                    $workStart->between($appointment->start_date, $appointment->end_date, false) ||
                    $endTime->between($appointment->start_date, $appointment->end_date, false) ||
                    $workStart->equalTo($appointment->start_date) ||
                    $endTime->equalTo($appointment->end_date)
                ) {
                    $overlap = true;
                    break;
                }
            }

            if (!$overlap) {
                $availableStart[] = $workStart->toTimeString();
            }

            $workStart->addMinutes(30);
        }

        return $availableStart;
    }
}
