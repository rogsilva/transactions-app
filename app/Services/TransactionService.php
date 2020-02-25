<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Transaction;
use App\Wallet;
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

    public function transactionProcesing(Transaction $transaction): void
    {
        DB::transaction(function () use ($transaction) {

            $fromWallet = Wallet::findOrFail($transaction->from_wallet_id);
            $toWallet = Wallet::findOrFail($transaction->to_wallet_id);

            if ($fromWallet->balance < $transaction->value) {
                $transaction->transaction_status_id = 3; // Transfer fail
                return $transaction->save();
            }

            $fromWallet->balance = $fromWallet->balance - $transaction->value;
            $fromWallet->save();

            $toWallet->balance = $toWallet->balance + $transaction->value;
            $toWallet->save();

            $transaction->transaction_status_id = 2; // Transfered
            return $transaction->save();
        });
    }
}