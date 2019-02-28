<?php

namespace App\Http\Controllers;

use App\Knit;
use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class KnitController extends Controller
{

    public function __construct()
     {
         $this->middleware('admin', ['except' => ['index','show']]);
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $knits = Knit::paginate(10);
      return view('knits.index', compact('knits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $photos = Photo::paginate(20);
      return view('knits.create', compact('photos'));
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
          'title' => 'required',
          'body' => 'required',
          'photo' => 'required'
      ]);

      $knit = new Knit;
      $knit->user_id = Auth::user()->id;
      $knit->name = $request->input('title');
      $knit->description = $request->input('body');
      $knit->category = 'none';
      $knit->price = $request->input('price');
      $knit->photo = $request->input('photo');
      $knit->other = explode(',',$request->input('other');
      $knit->save();

      return redirect('/admin/knits')->with('You have added a new knit to your collection!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Knit  $knit
     * @return \Illuminate\Http\Response
     */
    public function show(Knit $knit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Knit  $knit
     * @return \Illuminate\Http\Response
     */
    public function edit(Knit $knit)
    {
        $photos = Photo::paginate(20);
        return view('knits.edit', compact('knit','photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Knit  $knit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knit $knit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Knit  $knit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knit $knit)
    {
        $comments = Comment::where('knit_id', $knit->id)->delete();
        $knit->delete();
        return redirect('/admin/knits')->with('success', 'The knit has been deleted.');
    }
}
