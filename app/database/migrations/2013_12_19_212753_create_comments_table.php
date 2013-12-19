<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('review_id')->unsigned();
			$table->text('comment');
			$table->boolean('flagged_for_review');
			$table->boolean('status');
			$table->timestamps();
			$table->softDeletes();

			//Foreign Keys
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
