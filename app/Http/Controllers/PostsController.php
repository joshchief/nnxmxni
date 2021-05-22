<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return redirect('/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
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

        $post = Post::find($id);
        if( Auth::id() == $post->user_id){
            return view('posts.edit')->with('post', $post);
        }

        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd('update function');
        // dd($request->all());
            
        $post = Post::find($request->id);
        $post->title = $request->title;
        $post->body = $request->body;

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
            
            if($validator->fails()){
                return view('posts.edit')
                            ->with('post', $post)
                            ->withErrors($validator);
            }


        if(Auth::id() == $post->user_id)
        {
            $post->save();
            return redirect('/')->with('success', 'Post Updated!');
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(Auth::id() == $post->user_id)
        {
            $post->delete();
            return redirect('/')->with('success', 'Post Deleted');
        }
        return redirect('/')->with('error', 'Unauthorized action');
    }
}
