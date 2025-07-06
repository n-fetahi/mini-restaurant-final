<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class OrderResource extends JsonResource
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
            'total' => $this->total_amount,
            'currency'     => 'RY',
            'quantity' => $this->items->sum('quantity'),
            'status'       => $this->status,
            $this->mergeWhen($request->routeIs('api.user.orders.show'),
            [
                'createdAt'   => $this->created_at,
                'updatedAt'   => $this->updated_at,
                'OrderItems' => OrderItemResource::collection($this->whenLoaded('items'))

            ]),


        ];




    }
}
