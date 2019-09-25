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
        DB::table('users')->truncate();
        DB::table('users')->insert([
        	'name' => 'Erickson Suero',
        	'email' => 'soporte@turinter.com',
        	'password' => bcrypt('shinobi'),
        ]);
    }
}
