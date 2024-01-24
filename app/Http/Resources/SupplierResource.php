<?php

namespace App\Http\Resources;

use App\Enums\StatusSupplierEnum;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            $statusValue = StatusSupplierEnum::getValuefromCase($this->status)->value;


        return [
            "id" => $this->id,
            "status" => $statusValue,
            "name" => $this->user->name,
            "email" => $this->user->email
        ];
    }
}
