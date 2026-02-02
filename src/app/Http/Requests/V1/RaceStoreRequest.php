<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class RaceStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'track_id' => 'required|exists:tracks,id',
            'date' => 'required|date_format:Y-m-d',
            'number_of_turns' => 'required|min:1'
        ];
    }
}
