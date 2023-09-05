<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_account_id',
        'transaction_id',
        'amount',
        'type'
    ];

    protected $casts = [
        'type' => TransactionTypeEnum::class,
        'created_at' => 'datetime'
    ];

    public function userAccount(): BelongsTo
    {
        return $this->belongsTo(UserAccount::class);
    }
}
