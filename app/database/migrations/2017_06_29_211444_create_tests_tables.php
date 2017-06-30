<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();


			$table->integer('num')->index();
			$table->integer('num2');
			$table->string('str')->index();
			$table->string('str2');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tests');
	}

}
