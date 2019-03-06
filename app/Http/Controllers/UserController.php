<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
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
      $this->middleware('admin');
      $users = User::where('id', '>', 1)->paginate(10);
      return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact ('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->middleware('auth');
        $this->validate($request, [
            'name' => 'required',
        ]);

        if (Auth::user()->id != $user->id)
        {
          return redirect()->back()->with('error', 'You cannot edit another users information');
        }
        $user->name = $request->input('name');
        $user->save();
        return redirect()->back()->with('success', 'You have updated your personal information.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);

      if (Auth::user()->role == 'admin')
      {
        $user->delete();
        return redirect('/users')->with('success', 'You have successfully deleted '.$user->email.' from the catalogue.');
      }

      if (Auth::user()->id == $user->id)
      {
        $user->delete();
        return redirect('/')->with('success', 'You have deleted your account.Feel free to return at any time!');
      }
      else
      {
        return redirect()->back()->with('error', 'You do not have permission to do that!');
      }

    }

    public function toggleSubscription(Request $request)
    {
      $id = $request->input('user_id');
      $user = User::find($id);
      if ($user->has_subscription == 0)
      {
        $user->has_subscription = 1;
        $user->save();
        return redirect()->back()->with('success', 'Thank you for subscribing to our Newsletter!');
      }
      else
      {
        $user->has_subscription = 0;
        $user->save();
        return redirect()->back()->with('success', 'You have successfully unsubscribed from our Newsletter. Feel free to return at any time!');
      }
    }
}
