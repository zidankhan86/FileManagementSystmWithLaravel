<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
   public function customerHome(){
    return view('customerHome');
   }
}
