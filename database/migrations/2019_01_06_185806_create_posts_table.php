<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('idposts');
            $table->string('title',100);
            $table->string('slug',100);
            $table->text('body');
            $table->string('image',100);
            $table->tinyInteger('published');
            //foreign key author table
            $table->unsignedInteger('authors_idauthors');
            $table->foreign('authors_idauthors')
                    ->references('idauthors')->on('authors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
