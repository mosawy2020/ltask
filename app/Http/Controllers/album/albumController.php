<?php

namespace App\Http\Controllers\album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\album;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class albumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for get album auth user only
        $albums = User::find(Auth::id())->album; 

        return view('user.index',compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = Auth::id();

        // function for save Album
        $request->validate([
            'name' => 'bail|required|min:4|max:30',
            'salary' => "required|numeric",
            'photo' => 'image|mimes:png,jpg,jpeg|max:3000',
        ]);
        $album = new album();
            
        $album->name = request('name');
        $album->old_salary = request('salary');
        $album->discount = request('discount');
        if($request->public != null){
            $album->public = request('public');
        }
        $now = date('ymdhms');
        $album->slug = str_replace(' ','-',strtolower($album->name)).'-'.$now;
        $album->user_id = $auth;

        // if statment for save photo if request have one
        if($request->hasFile('photo')){
            $photo = $request->photo;
            $filename = time().'-'. $photo->getClientOriginalName();
            $location = public_path('images');
            $photo->move($location,$filename);
            $album->photo = $filename;
        }

        $album->save();
        return  redirect('/')->with('success','Album created Sussessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $album = album::find($id);
        return view('user.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //for edit album
        $album = album::find($id);
        return view('user.edit',compact('album'));
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
        $request->validate([
            'name' => 'bail|required|min:4|max:30',
            'salary' => "required|numeric",
            'photo' => 'image|mimes:png,jpg,jpeg|max:3000',
        ]);

        $album = album::find($id);
            
        $album->name = request('name');
        $album->old_salary = request('salary');
        $album->discount = request('discount');

        // if statment for save photo if request have one
        
        if($request->hasFile('photo')){
            $photo = $request->photo;
            $filename = time().'-'. $photo->getClientOriginalName();
            $location = public_path('images');
            $photo->move($location,$filename);
            $album->photo = $filename;
        }

        $album->update();
        return  redirect()->route('album.show',$album->id)->with('success','Your post Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
        {
            //

            $album = album::find($id);
            $album->delete();
            return  redirect()->route('album.index')->with('success','Your post Delete Successfully');
        }
}
