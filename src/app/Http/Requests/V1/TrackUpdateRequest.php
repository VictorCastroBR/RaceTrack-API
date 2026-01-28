<?php

namespace App\Http\Requests\V1;

class TrackUpdateRequest extends TrackStoreRequest
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
