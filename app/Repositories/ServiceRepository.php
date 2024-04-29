<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends BaseRepository
{
    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
