<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddexistingtrackersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('addexistingtrackers', function($table) {

			# AI, PK
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			# created_at, updated_at columns
			$table->timestamps();
			
			# General data...
			$table->string('title');
		
			$table->string('image');
			$table->integer('price');
			$table->string('description');
			$table->string('purchase_link');
			


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addexistingtrackers');
	}

}
