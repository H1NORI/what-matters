<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method === 'PUT') {
            return [
                'memoryId' => ['required', 'integer'],
                'type' => ['required'],
                'attribute' => ['required'],
                'value' => ['required'],
            ];
        }

        return [
            'memoryId' => ['sometimes', 'required', 'integer'],
            'type' => ['sometimes', 'required'],
            'attribute' => ['sometimes', 'required'],
            'value' => ['sometimes', 'required'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->memoryId) {
            $this->merge([
                'memory_id' => $this->memoryId
            ]);
        }
    }
}
