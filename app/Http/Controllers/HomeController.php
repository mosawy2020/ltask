<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        return view('user.createalbum');
    }


    public function movies(){

        
      
        $albums_home = album::where('public',true)->get(); 
        
        return view('movies-demos',compact('albums_home'));
  
    }




   
}
