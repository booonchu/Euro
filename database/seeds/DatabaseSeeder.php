<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// $this->call(UserTableSeeder::class);
		
		Model::unguard();
        //$this->call(RoomsTableSeeder::class);
        $this->call('RoomsTableSeeder');
		// $this->call(UserTableSeeder::class);
		Model::reguard();

    }
}
