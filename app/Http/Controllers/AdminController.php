<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use App\Post;
use App\Photo;
use DB;


class AdminController extends Controller
{

   public function __construct()
     {
         $this->middleware('admin', ['except' => ['index','show']]);
     }


   public function dashboard()
     {
        return view('layouts.mainpanel');
     }

   public function posts()
     {
         //$photos = Photo::paginate(20);
         $posts = Post::orderBy('id', 'desc')->paginate(10);
         return view('admin.dash_posts', compact('posts'));
     }

   public function carousel()
     {
         $not_in_carousels = DB::table('photos')
           ->where('in_carousel', 0)
           ->get();
         $in_carousels = DB::table('photos')
           ->where('in_carousel', 1)
           ->get();
         return view('admin.dash_carousel', compact(['in_carousels','not_in_carousels']));
     }

    public function addToCarousel(Request $request)
     {
        $id = $request->input('not_carousel_id');
        $photo = Photo::find($id);
        $photo->in_carousel = 1;
        $photo->save();
        return redirect()->back()->with('success', 'The image has been added to the Carousel.');
     }

    public function removeFromCarousel(Request $request)
      {
          $id = $request->input('carousel_id');
          $photo = Photo::find($id);
          $photo->in_carousel = 0;
          $photo->save();
          return redirect()->back()->with('success', 'The image has been removed from the Carousel.');
      }

}
