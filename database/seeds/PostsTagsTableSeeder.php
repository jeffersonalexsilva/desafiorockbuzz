<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use App\Model\Post;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_tags')->insert([
            //the relationships
            'posts_idposts' => Post::all()->last()->idposts,
            'tags_idtags' => Tag::all()->last()->idtags
        ]);
    }
}
