<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
                'date' => ['required', 'date_format:Y-m-d'],
                'title' => ['required',],
                'description' => ['sometimes',],
                'isRecurring' => ['required', 'boolean'],
                'recurringRule' => ['sometimes', 'required',],
            ];
        }

        return [
            'contactId' => ['sometimes', 'required', 'integer'],
            'date' => ['sometimes', 'required', 'date_format:Y-m-d'],
            'title' => ['sometimes', 'required',],
            'description' => ['sometimes', 'required',],
            'isRecurring' => ['sometimes', 'required', 'boolean'],
            'recurringRule' => ['sometimes', 'required',],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->contactId) {
            $this->merge([
                'contact_id' => $this->contactId
            ]);
        }

        if ($this->isRecurring) {
            $this->merge([
                'is_recurring' => $this->isRecurring
            ]);
        }

        if ($this->recurringRule) {
            $this->merge([
                'recurring_rule' => $this->recurringRule
            ]);
        }
    }
}
