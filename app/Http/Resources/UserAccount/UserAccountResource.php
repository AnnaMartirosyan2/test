<?php

namespace App\Http\Resources\UserAccount;

use App\Http\Resources\Transaction\TransactionIndexResource;
use App\Http\Resources\User\UserShowResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAccountResource extends JsonResource
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
            'user' => new UserShowResource($this->user),
            'transactions' => TransactionIndexResource::collection($this->transactions),
            'balance' => (float) $this->balance
        ];
    }
}
