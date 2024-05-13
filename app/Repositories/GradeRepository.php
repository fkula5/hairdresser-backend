<?php

namespace App\Repositories;

use App\Models\Grade;

class GradeRepository extends BaseRepository
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Grade::all();
    }

    public function getById($id)
    {
        return Grade::findOrFail($id);
    }

    public function create(array $data)
    {
        return Grade::create($data);
    }

    public function update(array $data, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($data);
        return $grade;
    }

    public function delete($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
    }
}