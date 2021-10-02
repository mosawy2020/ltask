<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\album;
use App\Models\User;
use App\Models\Role;
class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //for pass role data
        $roles = Role::orderBy('id','desc')->get();
        $users = User::all();
        $albums = album::all();
        $admins = Admin::all();
        return view('admin.role',compact('roles','users','albums','admins'));

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
        $request->validate([
            'name' => 'bail|required|string|min:4',
            'display' => 'bail|required|string',
            'description' => 'bail|required'
        ]);

            $roles = new Role(); 
            $roles->name =str_replace(' ','_', request('name'));
            $roles->display_name = request('display');
            $roles->description = request('description');
            $roles->save();   
            return redirect()->route('roles.index')->with('success','Add new Role Successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
     
        $roles =Role::find($id);
        $users = User::all();
        $albums = album::all();
        $admins = Admin::all();
        return view('admin.editrole',compact('roles','users','albums','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'name'=>'string',
        ]);
            $roles = Role::find($id); 
            $roles->name =str_replace(' ','_', request('name'));
            $roles->display_name = request('display');
            $roles->description = request('description');
            $roles->update();   
            return redirect()->route('roles.index');
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
        $roles = Role::find($id); 
        $roles->delete();
        return  redirect()->route('roles.index')->with('success','Role is deleted');
    }
}
