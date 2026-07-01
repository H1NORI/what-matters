<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMemoryRequest extends FormRequest
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
        $method = $this->method();
        if ($method === 'PUT') {
            return [
                'contactId' => ['required', 'integer'],
                'content' => ['required'],
            ];
        }

        return [
            'contactId' => ['sometimes', 'required', 'integer'],
            'content' => ['sometimes', 'required'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->contactId) {
            $this->merge([
                'contact_id' => $this->contactId
            ]);
        }
    }
}
