<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('id', 'desc')->paginate(10);
    return view('posts.index', compact('posts'));
  }
}
