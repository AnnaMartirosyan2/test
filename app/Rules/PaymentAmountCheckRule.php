<?php

namespace App\Rules;

use App\Enums\TransactionTypeEnum;
use App\Models\UserAccount;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PaymentAmountCheckRule implements ValidationRule
{
    public function __construct(
        private int $userAccountId,
        private int $type
    ){}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ((((float) UserAccount::find($this->userAccountId)?->balance - (float) $value) < 0)
            && $this->type == TransactionTypeEnum::charge_off_balance->value) {
            $fail('You don\'t have enough funds.');
        }
    }
}
