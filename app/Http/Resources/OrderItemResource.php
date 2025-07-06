<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'quantity' => $this->quantity,
            'unitPrice' => $this->unit_price,
            'subtotal' => $this->subtotal,
            'createdAt'   => $this->created_at,
            'updatedAt'   => $this->updated_at,
            'product' => new ProductResource($this->whenLoaded('product'))




        ];
    }
}
