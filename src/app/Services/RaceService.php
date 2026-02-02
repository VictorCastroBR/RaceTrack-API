<?php

namespace App\Services;

use App\Models\Race;
use Illuminate\Pagination\LengthAwarePaginator;

class RaceService
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Race::with(['track', 'pilots'])->paginate($perPage);
    }

    public function create(array $data): Race
    {
        return Race::create($data);
    }

    private function isEditable(Race $race)
    {
        return $race->date >= now()->format('Y-m-d') && $race->status !== 'in_progress';
    }

    public function startRace(Race $race): Race
    {
        if ($race->status !== 'scheduled')
            abort(422, 'You cannot start a race that is not scheduled.');

        $race->update(['status' => 'in_progress']);
        return $race;
    }

    public function updateRacePilot(Race $race, array $data)
    {
        if (!$this->isEditable($race))
            abort(422, 'It is not possible to change drivers for a race that has already taken place.');

        $race->pilots()->syncWithoutDetaching($data['pilots_id']);
        return $race->load('pilots');
    }

    public function update(Race $race, array $data): Race
    {
        $race->update($data);
        return $race;
    }

    public function destroy(Race $track): void
    {
        $track->delete();
    }
}
