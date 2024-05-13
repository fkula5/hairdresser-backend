<?php

namespace App\Http\Controllers;


use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\GradeUpgradeRequest;
use App\Http\Requests\SalonUpdateRequest;
use App\Http\Resources\GradeCollection;
use App\Http\Resources\GradeResource;
use App\Repositories\GradeRepository;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private GradeRepository $gradeRepository)
    {
    }
    public function index()
    {
        $grades = $this->gradeRepository->getAll();
        return new GradeCollection($grades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStoreRequest $request)
    {
        $validated = $request->validated();
        $this->gradeRepository->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $grades = $this->gradeRepository->find($id);
        return new GradeResource($grades);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeUpgradeRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->gradeRepository->update($validated,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->gradeRepository->delete($id);
    }
}
