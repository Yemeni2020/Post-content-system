<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->paginate(5);




        return view('admin.posts.index', ['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Posts::class);

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = request()->validate([
            'title' => 'required | min:3',
            'post_image' => 'file | required',
            'body' => 'required',
        ]);

        if(request('post_image')){
            $input['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($input);

        session()->flash('post-create-message', 'Post created successfully ');

        return redirect()->route('admin.posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        return view('blog-post', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        // $this->authorize('view', $post); -- this for authorization

//        if(auth()->user()->can('view', $post)){
//
//
//        }
        return view('admin.posts.edit', ['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(Posts $post){

        $inputs = request()->validate([
            'title'=> 'required|min:3|max:255',
            'post_image'=> 'file| requried_image',
            'body'=> 'required'
        ]);


        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        // $this->authorize('update', $post);


        $post->save();

        session()->flash('post-updated-message', 'Post with title was updated '. $inputs['title']);

        return redirect()->route('admin.posts');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post ,Request $request){

        // $this->authorize('delete', $post);


        $post->delete();

        $request->session()->flash('message', 'Post was deleted');

        return back();
    }
}
