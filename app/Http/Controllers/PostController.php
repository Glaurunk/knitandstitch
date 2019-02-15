<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckRole;
use App\Photo;
use App\Comment;
use DB;


class PostController extends Controller
{

    public function __construct()
     {
         $this->middleware('admin', ['except' => ['index','show']]);
     }


    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(10);
      return view('posts.index', compact('posts'));
    }



    public function create()
    {
      $photos = Photo::paginate(20);
      return view('posts.create', compact('photos'));
    }



    public function store(Request $request)
    {
      $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
      ]);

          if ($request->input('photo') == '')
          {
            $photoURL = 'noimage.png';
          }
          else {
            $photoURL = $request->input('photo');
          }

          $post = new Post;
          $post->title = $request->input('title');
          $post->body = $request->input('body');
          $post->synopsis = $request->input('synopsis');
          $post->user_id = auth()->user()->id;
          $post->cover_image = $photoURL;
          $post->category = $request->input('category');
          $post->save();

          return redirect('/admin/posts')
              ->with('success', 'Η δημοσίευση καταχωρήθηκε!');
    }


    public function show(Post $post)
    {
      $comments = Comment::where('post_id', $post->id)->get();
      // $users = User::where('')
      // dd($comments);

      return view('posts.show', compact(['post','comments']));
    }


    public function edit(Post $post)
    {
      $photos = Photo::paginate(20);
      return view('posts.edit', compact('post', 'photos'));
    }


    public function update(Request $request, Post $post)
    {
      $this->validate($request, [
          'title' => 'required',
          'body' => 'required',
      ]);

          if ($request->input('photo') == '')
          {
            $photoURL = $post->cover_image;
          }
          else {
            $photoURL = $request->input('photo');
          }

          $post->title = $request->input('title');
          $post->body = $request->input('body');
          $post->synopsis = $request->input('synopsis');
          $post->user_id = auth()->user()->id;
          $post->cover_image = $photoURL;
          $post->category = $request->input('category');
          $post->save();

          return redirect('/admin/posts')->with('success', 'Η δημοσίευση ενημερώθηκε.');
    }


    public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->back()->with('success', 'Η δημοσίευση διαγράφηκε');
    }

}
