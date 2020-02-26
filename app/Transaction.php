<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $fillable = [
        'from_wallet_id', 'transaction_status_id', 'to_wallet_id', 'value',
    ];

    public static function getLastTransactions(int $walletId)
    {
        return self::select([
                DB::raw(sprintf('IF(t.from_wallet_id = %s, CONCAT(\'-\', t.value), t.value) as value', $walletId)),
                't.created_at',
                'ts.name as status',
            ])
            ->from('transactions as t')
            ->join('transaction_status as ts', 'ts.id', '=', 't.transaction_status_id')
            ->where('t.to_wallet_id', $walletId)
            ->orWhere('t.from_wallet_id', $walletId)
            ->orderBy('t.created_at', 'desc')
            ->limit(10)
            ->get()
            ->toArray();
    }
}
