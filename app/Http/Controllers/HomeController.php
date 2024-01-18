<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role_id == 1) {
            return view('home');
        } elseif (Auth::user()->role_id ==2 ) {

            $folders = Folder::where('created_by_id', Auth::user()->id)->get();
            return view('customer_home', compact('folders'));
        }
        
    }
   
}
