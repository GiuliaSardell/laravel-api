<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Tag;

class TagsPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20; $i++){
            //estraggo random un post
            $post = Post::inRandomOrder()->first();

            //estraggo anche un id di un tag
            $tag_id = Tag::inRandomOrder()->first()->id;

            //equivalente di save() il dato vine salvato nella tabella ponte col metdoo attach
            $post->tags()->attach($tag_id); //il metodo attach richiede l'id

        }
    }
}
