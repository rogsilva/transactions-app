<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'person_type_id' => 1,
            'document' => '17036893052',
            'name' => 'User Teste',
            'email' => 'user.teste@teste.com',
            'password' => '$2y$10$LNP/nF9gCW30YGAqjsAcWuu6FafFYhB26AJnDgTIHf4wUNoSi.Ly2',
            'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'person_type_id' => 2,
            'document' => '48299545072',
            'name' => 'User Teste Dois',
            'email' => 'user.teste2@teste.com',
            'password' => '$2y$10$LNP/nF9gCW30YGAqjsAcWuu6FafFYhB26AJnDgTIHf4wUNoSi.Ly2',
            'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => (new DateTime())->format('Y-m-d H:i:s'),
        ]);
    }
}
