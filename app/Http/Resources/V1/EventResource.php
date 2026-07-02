<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'contactId' => $this->contact_id,
            'date' => $this->date,
            'title' => $this->title,
            'description' => $this->description,
            'isRecurring' => $this->is_recurring,
            'recurringRule' => $this->recurring_rule,
        ];
    }
}
