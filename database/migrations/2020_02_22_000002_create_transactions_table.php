<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('from_wallet_id');
            $table->foreign('from_wallet_id')->references('id')->on('wallets');
            $table->unsignedBigInteger('to_wallet_id');
            $table->foreign('to_wallet_id')->references('id')->on('wallets');
            $table->unsignedBigInteger('transaction_status_id');
            $table->foreign('transaction_status_id')->references('id')->on('transaction_status');
            $table->float('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
