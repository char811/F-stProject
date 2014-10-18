<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
        $this->call('UsersTableSeeder');
        $this->call('ServicesTableSeeder');
		foreach(range(1, 3) as $index)
		{
			Order::create([
                'costumer'=>User::all()->first()['id'],
                'service'=>Service::all()[$index]->id,
                'comment'=>'sdka' . $index
			]);
		}
	}

}