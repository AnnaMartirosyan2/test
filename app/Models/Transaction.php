<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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

    public static function boot(): void
    {
        parent::boot();
        self::creating(function ($transaction) {
            $transaction->transaction_id = Str::random(32);
        });
        self::created(function ($transaction) {
            if ($transaction->type == TransactionTypeEnum::charge_off_balance) {
                $transaction->userAccount->balance = (float) $transaction->userAccount->balance - (float) $transaction->amount;
            } else {
                $transaction->userAccount->balance = (float) $transaction->userAccount->balance + (float) $transaction->amount;
            }
            $transaction->userAccount->save();
        });
    }
}
