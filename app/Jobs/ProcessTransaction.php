<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Queue;
use App\Transaction;
use App\Services\TransactionService;

class ProcessTransaction implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $transaction;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TransactionService $service)
    {
        $service->transactionProcesing($this->transaction);
    }
}
