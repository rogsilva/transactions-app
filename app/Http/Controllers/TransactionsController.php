<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransactionRequest;
use App\Wallet;
use App\Services\TransactionService;

class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formTransaction()
    {
        $wallets = Wallet::getFavorites(Auth::user()->id)->toArray();
        return view('transaction')
            ->with(['wallets' => $wallets]);
    }

    public function newTransaction(
        TransactionRequest $request,
        TransactionService $TransactionService
    ) {
        $TransactionService->newTransaction(
            Auth::user(),
            $request->all()
        );

        return redirect()
            ->route('home')
            ->with(['status' => 'Sua tranferência foi realizada com sucesso.']);
    }
}
