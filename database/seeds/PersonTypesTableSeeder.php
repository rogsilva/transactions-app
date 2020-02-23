<?php

use Illuminate\Database\Seeder;

class PersonTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person_types')->insert([
            'id' => 1,
            'name' => 'Pessoa Física',
        ]);

        DB::table('person_types')->insert([
            'id' => 2,
            'name' => 'Pessoa Jurídica',
        ]);
    }
}
