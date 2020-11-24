<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_category_id_foreign');
		});
		Schema::table('comments', function(Blueprint $table) {
			$table->dropForeign('comments_post_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_tag_id_foreign');
		});
		Schema::table('post_tag', function(Blueprint $table) {
			$table->dropForeign('post_tag_post_id_foreign');
		});
	}
}