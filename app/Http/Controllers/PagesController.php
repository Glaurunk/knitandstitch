<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Auth;

class PagesController extends Controller
{

// MAIN PAGES
    public function home()
              {
                $not_in_carousels = DB::table('photos')
                  ->where('in_carousel', 0)
                  ->get();
                $in_carousels = DB::table('photos')
                  ->where('in_carousel', 1)
                  ->get();
                $posts = Post::orderBy('id', 'desc')->take(6)->get();
                return view('pages.home', compact(['posts','not_in_carousels','in_carousels']));
              }

    public function about()
              {
                return view('pages.about');
              }

    public function contact()
              {
                return view('pages.contact');
              }


// PRIVACY POLICY & TOU
    public function policy()
                {
                  return view('pages.policy');
                }

      public function tou()
                {
                  return view('pages.tou');
                }


// CATEGORIES
      public function fashion()
                {

                  $posts = Post::orderBy('id', 'desc')
                      ->where('category', 'fashion')
                      ->paginate(10);
                  return view('posts.posts_category')
                      ->with('category', 'fashion')
                      ->with('posts', $posts);
                }

      public function self_care()
                {
                  $posts = Post::orderBy('id', 'desc')
                      ->where('category', 'self-care')
                      ->paginate(10);
                  return view('posts.posts_category')
                      ->with('category', 'self-care')
                      ->with('posts', $posts);
                }

      public function my_house()
                {
                  $posts = Post::orderBy('id', 'desc')
                      ->where('category', 'my house')
                      ->paginate(10);
                  return view('posts.posts_category')
                      ->with('category', 'my house')
                      ->with('posts', $posts);
                }

      public function inspiration()
                {
                  $posts = Post::orderBy('id', 'desc')
                      ->where('category', 'inspiration')
                      ->paginate(10);
                  return view('posts.posts_category')
                      ->with('category', 'inspiration')
                      ->with('posts', $posts);
                }

// SEARCH FUNCTIONALITY
      public function display_search()
                {
                  return view('pages.search');
                }

      public function search(Request $request)
                {
// put search terms in an array and perform query
                  $terms = explode(",", $request->input('search'));
                  $query = Post::query();
// run through search terms
                  foreach ($terms as $term)
                  {
                        $query->orWhere('title', 'LIKE', '%' . trim($term) . '%')
                              ->orWhere('body', 'LIKE', '%' . trim($term) . '%');
                  }

                  $posts = $query->get();

                  if(count($posts) > 0)

                  {
                    return view('pages.search')
                        ->with('posts', $posts)
                        ->with('terms', $terms);
                  }

                  else

                  {
                    $keys = $request->input('search');
                    return redirect('/search')
                        ->with('keys', $keys)
                        ->with('error', 'Found no results matching your search for: '.$keys);

                  }
                }

}
