<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'user_id', 'balance',
    ];

    public static function getFavorites(int $userId)
    {
        return self::join('users', 'users.id', '=', 'wallets.user_id')
            ->select(['wallets.id', 'users.name'])
            ->where('users.id', '!=', $userId)
            ->get()
            ->pluck('name', 'id');
    }
}
