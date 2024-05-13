<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalonStoreRequest;
use App\Http\Requests\SalonUpdateRequest;
use App\Http\Resources\GradeCollection;
use App\Http\Resources\GradeResource;
use App\Http\Resources\SalonCollection;
use App\Http\Resources\SalonResource;
use App\Repositories\SalonRepository;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function __construct(private SalonRepository $SalonRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salons = $this->SalonRepository->getAll();
        return new SalonCollection($salons);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SalonStoreRequest $request)
    {
        $validated = $request->validated();
        $this->SalonRepository->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salons = $this->SalonRepository->find($id);
        return new SalonResource($salons);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SalonUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->SalonRepository->update($validated, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->SalonRepository->delete($id);
    }
}
