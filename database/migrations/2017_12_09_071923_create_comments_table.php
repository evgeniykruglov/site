<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('author_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->string('text', 255);
			$table->softDeletes();
            $table->timestamps();
        });
		Schema::table('comments', function (Blueprint $table) {
			$table->foreign('author_id','FK_comments_author_id')->references('id')->on('users')->onDelete('cascade');			
			$table->foreign('post_id','FK_comments_posts_id')->references('id')->on('posts')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
