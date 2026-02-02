<?php

namespace App\Services;

use App\Models\Race;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class RacePilotService
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Race::paginate($perPage);
    }

    public function create(Race $race, array $data): Race
    {
        $race->pilots()->syncWithoutDetaching($data['pilots_id']);
        return $race->load('pilots');
    }

    public function update(Race $track, array $data): Race
    {
        $track->update($data);
        return $track;
    }

    public function destroy(Race $track): void
    {
        $track->delete();
    }
}
