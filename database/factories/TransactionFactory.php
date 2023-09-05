<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = rand(0, 1000);
        return [
            'transaction_id' => Str::random(32),
            'amount' => (float) $amount,
            'type' => is_int($amount / 2) ? 1 : 2
        ];
    }
}
