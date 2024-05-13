<?php
namespace App\Repositories;

use App\Models\Salon;

class SalonRepository extends BaseRepository
{
    public function __construct(Salon $model)
    {
        $this->model = $model;
    }
}
