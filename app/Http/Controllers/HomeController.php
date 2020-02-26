<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $wallet = Auth::user()->wallet;
        $transactions = Transaction::getLastTransactions($wallet->id);

        return view('home')
            ->with([
                'wallet' => $wallet,
                'transactions' => $transactions,
            ]);
    }
}
