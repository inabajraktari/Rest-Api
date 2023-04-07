<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this -> id,
            'first_name'=>$this -> first_name,
            'last_name'=>$this -> last_name,
            'email'=>$this -> email,
            'phone_number'=>$this -> phone_number,
            'shipments'=>ShipmentsResource::collection($this->whenLoaded('shipments')),
        ];
    }
}
