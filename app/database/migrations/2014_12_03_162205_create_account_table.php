<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function($table) {

			# AI, PK
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			# created_at, updated_at columns
			$table->timestamps();
			
			# General data...
			
			$table->string('yourname');		
			$table->string('youremail');
			$table->string('yourmobile');
			$table->string('youraddress');
			
			
			$table->string('devicetitle');		
			$table->string('deviceimage');
			$table->string('deviceprice');
			
			$table->string('purchasedate');
			$table->string('subscription');
			$table->string('renewaldate');
			
			$table->string('loginaddress');
			$table->string('username');
			$table->string('password');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trackers');
	}

}
