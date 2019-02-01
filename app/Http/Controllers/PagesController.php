<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PagesController extends Controller
{
    public function home()
              {
                $posts = Post::orderBy('id', 'desc')->take(6)->get();
                return view('pages.home', compact('posts'));
              }

    public function about()
              {
                return view('pages.about');
              }

    public function contact()
              {
                return view('pages.contact');
              }

      public function policy()
                {
                  return view('pages.policy');
                }

      public function tou()
                {
                  return view('pages.tou');
                }

      public function fashion()
                {
                  $posts = DB::table('posts')
                      ->orderBy('id', 'desc')
                      ->where('category', 'fashion')
                      ->paginate(10);
                  return view('posts.posts_category')
                      ->with('category', 'fashion')
                      ->with('posts', $posts);
                }

      public function self_care()
                {
                  return view('posts.posts_category')
                  ->with('category', 'self-care');
                }

      public function my_house()
                {
                  return view('posts.posts_category')
                  ->with('category', 'my house');
                }

      public function inspiration()
                {
                  return view('posts.posts_category')
                  ->with('category', 'inspiration');
                }

}
