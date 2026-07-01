<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreFactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'memoryId' => ['required', 'integer'],
            'type' => ['required'],
            'attribute' => ['required'],
            'value' => ['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'memory_id' => $this->memoryId,
        ]);
    }
}
