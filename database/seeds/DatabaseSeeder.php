<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create example of content
        factory(App\Model\Author::class, 5)->create()->each(function ($author) {
            $author->posts()->save(factory(App\Model\Post::class)->make());
        });
        // $this->call(UsersTableSeeder::class);
        // $this->call([
        //     AuthorsTableSeeder::class,
        //     PostsTableSeeder::class,
        //     TagsTableSeeder::class,
        //     PostsTagsTableSeeder::class,
        // ]);
    }
}
