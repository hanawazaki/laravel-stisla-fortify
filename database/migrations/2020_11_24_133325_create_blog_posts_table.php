<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned()->index();
			$table->string('title', 191);
			$table->string('slug', 191)->unique();
			$table->string('description', 191)->nullable();
			$table->text('summary');
			$table->text('content');
			$table->enum('status', array('draft', 'publish'))->index();
			$table->boolean('comments')->index();
			$table->boolean('featured')->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}