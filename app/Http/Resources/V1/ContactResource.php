<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'ownerId' => $this->owner_id,
            'userId' => $this->user_id,
            'name' => $this->name,
            'birthdate' => $this->birthdate,
            'memories' => MemoriesResource::collection($this->whenLoaded('memories')),
        ];
    }
}
