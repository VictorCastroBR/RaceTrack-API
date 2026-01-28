<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\V1\TrackStoreRequest;
use App\Http\Requests\V1\TrackUpdateRequest;
use App\Http\Resources\V1\TrackResource;
use App\Models\Track;
use App\Services\TrackService;

class TrackController extends Controller
{
    public function __construct(
        protected TrackService $service
    ) {}

    public function index(Request $request)
    {
        $perPage = min((int) $request->input('per_page', 10), 20);

        $tracks = $this->service->allPaginated($perPage);

        return TrackResource::collection($tracks);
    }

    public function store(TrackStoreRequest $request)
    {
        $validated = $request->validated();

        $track = $this->service->create($validated);

        return (new TrackResource($track))->response()->setStatusCode(201);
    }

    public function show(Track $track)
    {
        return new TrackResource($track);
    }

    public function update(Track $track, TrackUpdateRequest $request)
    {
        $validated = $request->validated();

        $track = $this->service->update($track, $validated);

        return (new TrackResource($track));
    }

    public function destroy(Track $track)
    {
        $this->service->destroy($track);

        return response()->noContent();
    }
}
