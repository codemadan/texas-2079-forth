<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        //
         $posts = Post::all(); // Eloquent ORM (Object Relational Mapping)
        // view => resources/views/posts/index.blade.php
        return view('posts.index')->with('posts', $posts);

//        $posts = Post::where('created_at', null)->first();

/*        $posts = Post::where('created_at', null)
            ->where('updated_at', null)
            ->get();

        $posts = Post::query()
            ->where('created_at', '=', null)
            ->where('updated_at', '=', null)
            ->get();
        dd($posts);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     */
    public function show($post)
    {
        //
       $post = Post::where('slug', $post)->firstOrFail();
        return view('posts.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
//        dd('destroy: '.$id);
        //Post::destroy($id);
        //$post = Post::where('id', $id)->delete();


        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.deleted')->with('posts', $posts);
    }

    public function all(){
        $posts = Post::withTrashed()->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('posts.index');
    }

}
