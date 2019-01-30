<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
              {
                  return view('pages.home');
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
}
