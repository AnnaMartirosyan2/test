<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserAccount;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->has(
            UserAccount::factory()->count(1)->has(
                Transaction::factory()->count(5),
                'transactions'
            ), 'userAccount'
        )->create();
    }
}
