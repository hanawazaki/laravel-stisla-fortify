<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 191);
			$table->string('slug', 191)->unique();
			$table->string('description', 191)->nullable();
            $table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}