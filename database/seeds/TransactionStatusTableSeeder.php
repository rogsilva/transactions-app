<?php

use Illuminate\Database\Seeder;

class TransactionStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_status')->insert([
            'id' => 1,
            'name' => 'Pendente',
        ]);

        DB::table('transaction_status')->insert([
            'id' => 2,
            'name' => 'Transferido',
        ]);
    }
}
