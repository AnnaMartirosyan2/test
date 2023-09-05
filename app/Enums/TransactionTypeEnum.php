<?php

namespace App\Enums;

enum TransactionTypeEnum: int
{
    case credit_balance = 1;
    case charge_off_balance = 2;

    public function title(): string
    {
        return match($this)
        {
            TransactionTypeEnum::credit_balance => 'Credit balance',
            TransactionTypeEnum::charge_off_balance => 'Charge off balance'
        };
    }
}
