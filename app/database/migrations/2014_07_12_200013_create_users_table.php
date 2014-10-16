<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {

            $table->increments('id');

            $table->string('email')->unique();

            $table->string('password', 60);

            $table->string('username');
			
			$table->string('surname');
			
			$table->string('clikuha');
			
            $table->integer('mobile')->unique();
			
			$table->date('date');
			
			$table->string('service');
			
			$table->string('comment');
			
			$table->string('process');

			$table->string('remember_token')->nullable();

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
		Schema::drop('users');
	}

}