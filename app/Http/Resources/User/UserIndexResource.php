<?php

namespace App\Http\Resources\User;

use App\Http\Resources\UserAccount\UserAccountResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userAccount = $this->userAccount;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'user_account' => [
                'id' => $userAccount->id,
                'balance' => (float) $userAccount->balance
            ]
        ];
    }
}
