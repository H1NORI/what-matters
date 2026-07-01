<?php

namespace App\Http\Requests\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'ownerId' => ['required', 'integer'],            
            'userId' => ['integer', 'nullable'],            
            'name' => ['required'],
            'birthdate' => ['date_format:Y-m-d', 'nullable'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'owner_id' => $this->ownerId,
            'user_id' => $this->userId,
        ]);
    }
}
