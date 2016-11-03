<?php 
use Illuminate\Database\Seeder;
use App\Branch;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2; $i <10 ; $i++)
		{
			Branch::create
			(
				[
				'name' => "Branch 0$i",
				]
			);
		}
    }
}
