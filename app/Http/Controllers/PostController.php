<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

  // public function __construct()
  //    {
  //        $this->middleware('auth', ['except' => [
  //          'index', 'show'
  //          ]]);
  //
  //         $this->registerPolicies();
  //
  //         Gate::define('update-post', function ($user, $post) {
  //       return $user->id == $post->user_id;
  //
  //    }




    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('posts.index', compact('posts'));
    }



    public function create()
    {
      return view('posts.create');
    }



    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
          'cover_image' => ['image', 'nullable', 'max:2048', 'mimes:jpeg,jpg,png,gif']
      ]);


      if($request->hasFile('cover_image')) {

          $image = $request->file('cover_image');
          $filename = 'img-'.time().'.'.$image->getClientOriginalExtension();
          $path = $request->file('cover_image')->storeAs('public/cover_images', $filename);

      } else {
         $filename = 'noimage.png';
      }

          $post = new Post;
          $post->title = $request->input('title');
          $post->body = $request->input('body');
          $post->synopsis = $request->input('synopsis');
          $post->user_id = auth()->user()->id;
          $post->cover_image = $filename;
          $post->category = $request->input('category');
          $post->save();

          return redirect()
              ->route('posts.index', [$post])
              ->with('success', 'Stitch Created!');
    }



    public function show(Post $post)
    {
      return view('posts.show', compact('post'));
    }



    public function edit(Post $post)
    {
//check for correct user
    if (auth()->user()->role !== 'admin') {
      return redirect( '/posts')->with('error', 'Sorry friend, but you cant edit somebody elses stitch!');
    }
    return view('posts.edit', compact('post'));
    }



    public function update(Request $request, Post $post)
    {
      $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
          'cover_image' => ['image', 'nullable', 'max:2048', 'mimes:jpeg,jpg,png,gif']
      ]);


      if($request->hasFile('cover_image')) {

          $image = $request->file('cover_image');
          $filename = 'img-'.time().'.'.$image->getClientOriginalExtension();
          $path = $request->file('cover_image')->storeAs('public/cover_images', $filename);

      } else {
         $filename = $post->cover_image;
      }

          $post->title = $request->input('title');
          $post->body = $request->input('body');
          $post->synopsis = $request->input('synopsis');
          $post->user_id = auth()->user()->id;
          $post->cover_image = $filename;
          $post->category = $request->input('category');
          $post->save();

          return redirect()->route('posts.show', [$post])->with('success', 'Stitch Updated!');
    }



    public function destroy(Post $post)
    {

      if (auth()->user()->id !== $post->user_id) {
          return redirect( '/posts')->with('error', 'Sorry friend, but you cant delete somebody elses stitch!');
      }

      if ($post->cover_image != 'noimage.png') {
          Storage::delete('public/cover_images/'.$post->cover_image);
      }

      $post->delete();
      return redirect('/posts')->with('success', 'Post Deleted!');
    }

}
