<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class RacePilotsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'pilots_id' => 'required|array|min:1',
            'pilots_id.*' => 'required|integer|exists:pilots,id',
        ];
    }

    public function messages()
    {
        return [
            'pilots_id.required' => 'You need to select at least one pilot.',
            'pilots_id.*.exists' => 'One of the selected pilots is either invalid or does not exist.'
        ];
    }
}
