<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder inserçao altomatica no banco, codigo abaixo chama a seeder user tableSeeder
    	$this->call(UserTableSeeder::class);
    }
}
