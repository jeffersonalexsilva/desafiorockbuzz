<?php

use Illuminate\Database\Seeder;
use App\Model\Author;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $author = Author::all()->last();
        // print_r($author);
        DB::table('posts')->insert([
            'title' => str_random(5),
            'slug' => str_random(3),
            'body' => str_random(10). ' ' .str_random(10). ' ' .str_random(5),
            'image' => public_path('images') .'default.png',
            'published' => rand(0,1),
            'authors_idauthors' => Author::all()->last()->idauthors //set the last author relationship
             //DB::table('authors')->orderBy('upload_time', 'desc')->first();
        ]);
    }
}
