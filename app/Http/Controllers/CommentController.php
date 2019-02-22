<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class CommentController extends Controller
{

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
        return redirect('/admin/posts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->save();

        return redirect()->back()->with('success', 'Your comment has been published!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
      $this->validate($request, [
          'body' => 'required',
      ]);

      if (Auth::user()->id == $comment->user_id )
      {
        $comment->body = $request->input('body');
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->save();
        $post_id = $comment->post_id;
        $post = Post::find($post_id);
      }
      else
      {
        return redirect()->route('posts.show', $post)
        ->with('error', 'You can not edit another users comments!');
      }

      return redirect()->route('posts.show', $post)
        ->with('success', 'Your comment has ben updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      if (Auth::user()->id == $comment->user_id )
      {
        $comment->delete();
        return back()->with('success', 'The comment has been deleted.');

      } else {
        return back()->with('error', 'You can not delete another users comments!');
      }
    }


    public function toggleInappropriate(Request $request)
      {
          $id = $request->input('comment_id');
          $comment = Comment::find($id);

          if ($comment->state == 0)
          {
            $comment->state = 1;
            $comment->save();
            return back()->with('success', 'The comment has been marked as inappropriate and will be hidden from public view');
          }
          if ($comment->state == 1)
          {
            $comment->state = 0;
            $comment->save();
            return back()->with('success', 'The comment has been reinstated as appropriate and will be restored to public view');
          }
      }

      public function toggleHidden(Request $request)
        {
            $id = $request->input('comment_id');
            $comment = Comment::find($id);

            if ($comment->state == 0)
            {
              $comment->state = 2;
              $comment->save();
              return back()->with('success', 'The comment has now been  hidden from public view! You can return it to the convertation at any time.');
            }
            if ($comment->state == 2)
            {
              $comment->state = 0;
              $comment->save();
              return back()->with('success', 'The comment has been restored to public view!');
            }
        }



}
