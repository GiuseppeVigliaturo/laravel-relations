<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(Tag::class,100) -> create() -> each(function($tag){
            $posts = Post::inRandomOrder() -> take(4)-> get();
            $tag -> posts() -> attach($posts);
         });

    }
}
