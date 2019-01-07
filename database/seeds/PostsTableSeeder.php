<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => str_random(5),
            'slug' => str_random(3),
            'body' => str_random(50),
            'image' => public_path('images') .'default.png',
            'published' => rand(0,1)
        ]);
    }
}
