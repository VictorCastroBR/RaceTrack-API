<?php

namespace App\Services;

use App\Models\Pilot;
use Illuminate\Pagination\LengthAwarePaginator;

class PilotService
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Pilot::paginate($perPage);
    }

    public function create(array $data): Pilot
    {
        $data['active'] = true;
        return Pilot::create($data);
    }

    public function update(Pilot $pilot, array $data): Pilot
    {
        $pilot->update($data);
        return $pilot;
    }

    public function destroy(Pilot $pilot): void
    {
        $pilot->delete();
    }
}
