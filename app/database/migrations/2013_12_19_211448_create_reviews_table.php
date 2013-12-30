<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->string('title', 70); // Character limit for review Title
			$table->integer('rating');
			$table->text('pros');
			$table->text('cons');
			$table->text('summary');
			$table->boolean('flagged_for_review');
			$table->boolean('bottom_line');
			$table->boolean('status');
			$table->integer('reviewer_skill_level');
			$table->integer('time_with_product');
			$table->boolean('was_gift');
			$table->timestamps();
			$table->softDeletes();

			//Foreign Keys
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
