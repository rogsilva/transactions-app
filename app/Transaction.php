<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'from_wallet_id', 'transaction_status_id', 'to_wallet_id', 'value',
    ];
}
