<?php

use Illuminate\Database\Seeder;
use App\{Comment,Post,Tag};

class ExampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $tag = new Tag();
        $tag->name = "Love";
        $tags [] = $tag->save();

        $tag = new Tag();
        $tag->name = "God";
        $tags [] = $tag->save();

        $tag = new Tag();
        $tag->name = "Church";
        $tags [] = $tag->save();

        $tag = new Tag();
        $tag->name = "Salvation";
        $tags [] = $tag->save();

        $post = new Post();
        $post->title = "Title for post";
        $post->body = "<p>Live for God</p>";
        $post->has_comments = true;
        $post->save();
        $post->tags()->sync($tags);

        $comentario = new Comment();
        $comentario->name = "Edgardo Alvarez";
        $comentario->email = "edgardo@livedesign.org";
        $comentario->ip = "190.30.3.3";
        $comentario->body = "<p>comment for testing</p>";
        $comentario->post_id = $post->id;
        $comentario->status_id = 1;
        $comentario->save();

        $comentario = new Comment();
        $comentario->name = "Shaira Alvarez";
        $comentario->email = "shaira@livedesign.org";
        $comentario->ip = "192.0.3.5";
        $comentario->body = "<p>comment for testing!! comment for testing</p>";
        $comentario->post_id = $post->id;
        $comentario->status_id = 2;
        $comentario->save();

        $post = new Post();
        $post->title = "Title for post #2 ";
        $post->body = "<p></p>";
        $post->has_comments = true;
        $post->save();
        $post->tags()->sync($tags);

        $comentario = new Comment();
        $comentario->name = "David Meriño";
        $comentario->email = "david@livedesign.org";
        $comentario->ip = "88.4.3.6";
        $comentario->body = "<p>comment for testing, comment for testing, comment for testing</p>";
        $comentario->post_id = $post->id;
        $comentario->status_id = 3;
        $comentario->save();

    }
}
