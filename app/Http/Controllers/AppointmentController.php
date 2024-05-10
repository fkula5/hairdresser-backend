<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use App\Http\Resources\AppointmentCollection;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Repositories\AppointmentRepository;

class AppointmentController extends Controller
{
    public function __construct(private AppointmentRepository $appointmentRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AppointmentCollection($this->appointmentRepository->getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentStoreRequest $request)
    {
        $validated = $request->validated();
        $this->appointmentRepository->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new AppointmentResource(Appointment::with('employee')->findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentUpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $this->appointmentRepository->update($validated, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->appointmentRepository->delete($id);
    }
}
