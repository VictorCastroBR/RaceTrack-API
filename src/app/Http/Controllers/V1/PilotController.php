<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PilotCreateRequest;
use App\Http\Requests\V1\PilotUpdateRequest;
use App\Services\PilotService;
use App\Http\Resources\V1\PilotResource;
use App\Models\Pilot;

class PilotController extends Controller
{
    public function __construct(
        protected PilotService $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = min((int) $request->input('per_page', 10), 20);
        $pilots = $this->service->allPaginated($perPage);

        return PilotResource::collection($pilots);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PilotCreateRequest $request)
    {
        $validated = $request->validated();

        $pilot = $this->service->create($validated);

        return new PilotResource($pilot);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Pilot $pilot, PilotUpdateRequest $request)
    {
        $validated = $request->validated();

        $pilot = $this->service->update($pilot, $validated);

        return new PilotResource($pilot);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pilot $pilot)
    {
        $this->service->destroy($pilot);

        return response()->noContent();
    }
}
