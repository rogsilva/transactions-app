<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Transaction;
use App\Jobs\ProcessTransaction;

class TransactionService
{
    public function newTransaction(User $user, array $data)
    {
        return DB::transaction(function () use ($user, $data) {
            $transaction = Transaction::create([
                'from_wallet_id' => $user->wallet->id,
                'to_wallet_id' => $data['wallet'],
                'value' => $data['value'],
                'transaction_status_id' => 1,
            ]);

            ProcessTransaction::dispatch($transaction)
                ->onQueue('pending-transactions');

            return $transaction;
        });
    }

    private function sendToQueue(int $transactionId)
    {
        ProcessPodcast::dispatch($podcast);
    }
}