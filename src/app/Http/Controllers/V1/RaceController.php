<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RaceStoreRequest;
use App\Http\Requests\V1\RacePilotsStoreRequest;
use App\Http\Resources\V1\RaceResource;
use App\Http\Requests\V1\RaceUpdateRequest;
use App\Services\RaceService;
use App\Models\Race;

class RaceController extends Controller
{

    public function __construct(
        protected RaceService $service
    ) {}

    public function index(Request $request)
    {
        $perPage = min($request->input('per_page', 10), 20);
        $races = $this->service->allPaginated($perPage);

        return RaceResource::collection($races);
    }

    public function store(RaceStoreRequest $request)
    {
        $validtaed = $request->validated();

        $race = $this->service->create($validtaed);

        return (new RaceResource($race))->response()->setStatusCode(201);
    }

    public function update(Race $race, RaceUpdateRequest $request)
    {
        $validated = $request->validated();

        $this->service->update($race, $validated);

        return new RaceResource($race);
    }

    public function updateRacePilots(Race $race, RacePilotsStoreRequest $request)
    {
        $validated  = $request->validated();

        $race = $this->service->updateRacePilot($race, $validated);

        return (new RaceResource($race));
    }

    public function show(Race $race)
    {
        return new RaceResource($race->load(['track', 'pilots']));
    }

    public function startRace(Race $race)
    {
        $race = $this->service->startRace($race);

        return new RaceResource($race);
    }
}
