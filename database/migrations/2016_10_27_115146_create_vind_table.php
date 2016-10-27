<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVindTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vind', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('verstop_datum')->nullable();
			$table->string('verstop_user')->nullable();
			$table->string('vind_datum')->nullable();
			$table->string('vind_user')->nullable();
			$table->string('coord_lat')->nullable();
			$table->string('coord_lon')->nullable();
			$table->string('afstand')->nullable();
			$table->string('plaats_omschrijving')->nullable();
			$table->string('plaatsnaam')->nullable();
			$table->string('provincie')->nullable();
			$table->integer('duur')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vind');
	}

}
