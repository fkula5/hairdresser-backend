<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ServiceCollection($this->serviceRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $validated = $request->validated();
        $this->serviceRepository->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ServiceResource($this->serviceRepository->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->serviceRepository->update($validated, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->serviceRepository->delete($id);
    }
}
