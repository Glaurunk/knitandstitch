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
         // $this->middleware('admin', ['except' => ['create','update']]);
         $this->middleware('auth', ['except' => ['index','show']]);
     }

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

        return redirect()->back()->with('success', 'Το σχόλιο δημοσιεύτηκε!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
      return '123';
      if (Auth::user()->id == $comment->id )
      {
        $comment->delete();
        return back()->with('success', 'Το σχόλιο διαγράφηκε.');

      } else {
        return back()->with('error', 'Δεν μπορείτε να διαγράψετε σχόλια άλλου χρήστη.');
      }
    }
}
