<?php

namespace App\Http\Controllers;

use App\{Post,Tag};
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Carbon\Carbon;

class PostController extends Controller
{


      /**
         * Create a new controller instance.
         *
         * @return void
         */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->has_comments = false;
        $post->save();
        return redirect()->route('post.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();

        return view('admin.post.edit',compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = $request->get('slug');
        $post->title = $request->get('title');
        $post->iframe = $request->get('iframe');
        $post->published_at = ($request->get('published_at') !==  null ) ? Carbon::parse($request->get('published_at')) : null ;
        $post->has_comments = $request->get('has_comments') ? true : false;
        $post->update();

        $tags = [];

        foreach ($request->get('tags') as $tag) {
           $tags [] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag ])->id;
         }

        $post->tags()->sync($tags);

        return redirect()->route('post.edit', $post)->with('success','Post edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         $post->delete();
        return redirect()->route('post.index')->with('success','Post deleted successfully');
    }
}
