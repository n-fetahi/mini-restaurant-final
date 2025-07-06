<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'image' => asset($this->image),

            $this->mergeWhen($request->routeIs('api.*.products.show'),
            [
                'description' => $this->description,
                'createdAt'   => $this->created_at,
                'updatedAt'   => $this->updated_at,
            ]),

        ];
    }
}
