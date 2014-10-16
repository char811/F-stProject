<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('email')->unique();
            $table->string('password', 60);
			$table->text('comment');
            // Админ?
            $table->boolean('isAdmin');
            // Активирован?
            $table->boolean('isActive')->index();
            // Код активации аккаунта
            $table->string('activationCode');
            // Токен для возможности запоминания пользователя
            $table->string('remember_token')->nullable();
            // created_at, updated_at
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
		Schema::drop('comms');
	}

}
