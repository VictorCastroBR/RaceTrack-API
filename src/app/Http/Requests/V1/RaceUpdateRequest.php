<?php

namespace App\Http\Requests\V1;

use App\Http\Requests\V1\RaceStoreRequest;

class RaceUpdateRequest extends RaceStoreRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return parent::rules();
    }
}
