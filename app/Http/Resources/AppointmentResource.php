<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'employee' => new EmployeeResource($this->employee),
            'customer' => $this->customer,
            'service' => new ServiceResource($this->service),
            'comments' => $this->comments,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
