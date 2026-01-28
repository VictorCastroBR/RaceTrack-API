<?php

namespace App\Services;

use App\Models\Track;
use Illuminate\Pagination\LengthAwarePaginator;

class TrackService
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Track::paginate($perPage);
    }

    public function create(array $data): Track
    {
        return Track::create($data);
    }

    public function update(Track $track, array $data): Track
    {
        $track->update($data);
        return $track;
    }

    public function destroy(Track $track): void
    {
        $track->delete();
    }
}
