<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'street' => $this->street,
            'local_number' => $this->localNumber,
            'city' => $this->city,
            'phone_number' => $this->phoneNumber,
          //  'opening_hours' =>

        ];
    }
}
