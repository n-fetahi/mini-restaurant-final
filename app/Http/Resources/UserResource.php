<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
     /** @var \App\Models\User $this */

            'type' => 'user',
            'id'   => $this->id,
            'attributes' =>[
                'name' => $this->name,
                'email' => $this->email,
                $this->mergeWhen($request->routeIs('api.user.users.*'),[
                    'emailVerifiedAt' => $this->email_verified_at,
                    'createdAt' => $this->created_at,
                    'updatedAt' => $this->updated_at
                ])

            ]

        ];
    }
}
