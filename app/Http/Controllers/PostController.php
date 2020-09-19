<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'topic' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;

        $post->topic = $request->get('topic');
        $post->body = $request->get('body');
        $post->user_id = $request->user()->id;

        $post->save();

        // Handle Tags
        $this->handleTags($request, $post);

        return redirect()
        ->route('welcome')
        ->with('success', 'Du la till en post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = $post->load(['comments' => function($q){
            return $q->with('user');
        }, 'user']);
        
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    // Get the tags associated with this post and convert to a comma seperated string
    if ($post->has('tags')) {
        $tags = $post->tags->pluck('name')->toArray();
        $tags = implode(', ', $tags);
    } else {
        $tags = "";
    }

        return view('post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'topic' => 'required',
            'body' => 'required'
        ]);

        $post->topic = $request->get('topic');
        $post->body = $request->get('body');

        $post->update();

        // Handle Tags 
        $this->handleTags($request, $post);

        return redirect()
        ->route('welcome')
        ->with('success', 'Du ändrade en post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return redirect()
        ->route('welcome')
        ->with('success', 'Du raderade en post');
    }

    /**
     * Handle Tags for Post
     * https://stackoverflow.com/questions/50529715/a-solution-for-adding-tags-in-laravel
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Post $post
     * @return void
     */
    public function handleTags(Request $request, Post $post){

        /**
         * Once the post has been saved, we deal with the tag logic.
         * Grab the tag or tags from the field, sync them with the post
         */
        $tagsNames = explode(',', $request->get('tags'));
        
        $trimmedTags = [];
        foreach ($tagsNames as $key => $tag) {
            if(empty($tag)){
                continue;
            }
            array_push($trimmedTags, trim($tag));
        }

        // Create all tags (unassociet)
        foreach($trimmedTags as $tagName){
            Tag::firstOrCreate([
                'name' => $tagName
            ])->save();
        }

        // Once all tags are created we can query them
        $tags = Tag::whereIn('name', $trimmedTags)->get()->pluck('id');

        $post->tags()->sync($tags);
    }
}
