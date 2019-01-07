<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            //foreign key to NM table Posts
            $table->unsignedInteger('posts_idposts');
            $table->foreign('posts_idposts')
            ->references('idposts')->on('posts')
            ->onDelete('cascade');
            //foreign key to NM table Tags
            $table->unsignedInteger('tags_idtags');
            $table->foreign('tags_idtags')
                    ->references('idtags')->on('tags')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
