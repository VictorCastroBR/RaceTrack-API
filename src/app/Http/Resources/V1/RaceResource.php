<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\PilotResource;
use App\Http\Resources\V1\TrackResource;

class RaceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'track' => new TrackResource($this->whenLoaded('track')),
            'date' => $this->date,
            'number_of_turns' => $this->number_of_turns,

            'pilots' => PilotResource::collection($this->whenLoaded('pilots'))
        ];
    }
}
