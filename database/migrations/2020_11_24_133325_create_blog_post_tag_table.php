<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostTagTable extends Migration {

	public function up()
	{
		Schema::create('post_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tag_id')->unsigned();
			$table->integer('post_id')->unsigned()->index();
		});
	}

	public function down()
	{
		Schema::drop('post_tag');
	}
}