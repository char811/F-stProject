<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicesTableSeeder extends Seeder {

	public function run()
	{
			foreach(array(1,2,3,4) as $id){
                Service::create(
                    array('name'=>'service' . $id)
                );
            }
	}

}