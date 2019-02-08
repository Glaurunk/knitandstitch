<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{


    public function __construct()
    {
         $this->middleware('auth');
  //
  //         $this->registerPolicies();
  //
  //         Gate::define('update-post', function ($user, $post) {
  //       return $user->id == $post->user_id;
  //
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::all();
        return view ('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('photos.index');
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
          'photo' => ['image', 'required', 'max:2048', 'mimes:jpeg,jpg,png,gif']
      ]);
// Create new filename and Store to disk
          $image = $request->file('photo');
          $filename = 'img-'.time().'.'.$image->getClientOriginalExtension();
          $path = $request->file('photo')->storeAs('public/photos', $filename);
// Create new photo instance
          $photo = new Photo;
          $photo->title = $request->input('title');
          $photo->description = $request->input('description');
          $photo->photo = $filename;
// put array of dimensions into a string
          $dimensions = getimagesize('storage/photos/'.$filename);
          $photo->dimensions = $dimensions[0].' πλάτος επί '.$dimensions[1].' υψος.';
// get filesize and save instance to db
          $photo->size = $image->getClientSize();
          $photo->save();

          return redirect()
              ->route('photos.index', [$photo])
              ->with('success', 'Η εικόνα προστέθηκε στη Συλλογή!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
      return view('photos.show', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        if ($request->input('title') == '')
        {
          $photo->title = $photo->title;
        } else {
          $photo->title = $request->input('title');
        }

        if ($request->input('description') == '')
        {
          $photo->description = $photo->description;
        } else {
        $photo->description = $request->input('description');
        }
        $photo->save();

        return redirect()
            ->back()
            ->with('success', 'Tα στοιχεία της εικόνας ενημερώθηκαν!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {

        $path = 'public/photos/'.$photo->photo;
        Storage::delete($path);
        $photo->delete();
        return redirect()->back()->with('success', 'Η εικόνα διαγράφηκε!');

    }
}
