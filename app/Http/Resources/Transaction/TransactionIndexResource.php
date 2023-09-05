<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionIndexResource extends JsonResource
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
            'user_account_id' => $this->user_account_id,
            'amount' => (float) $this->amount,
            'type' => $this->type->title(),
            'transaction_id' => $this->transaction_id,
            'created_at' => $this->created_at->format('m/d/Y')
        ];
    }
}
