<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_attributes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('code')->unique();
			$table->boolean('visible_frontend');
			$table->boolean('use_in_search');
			$table->boolean('use_in_filter');
			$table->string('type');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_attributes');
	}

}
