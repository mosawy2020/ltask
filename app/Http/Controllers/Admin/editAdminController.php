<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\album;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class editAdminController extends Controller
{


    use  AuthenticatesUsers ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $users = User::orderBy('id','desc')->get();
            $albums = album::all();
            $admins = Admin::orderBy('id','desc')->get();
            return view('admin.admins',compact('users','albums','admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            // "name"=>"required|in:super_admin,admin",
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);
            

            $add_admin = new Admin();
            $add_admin->name = request('role');
            $add_admin->email = request('email');
            $add_admin->password = Hash::make(request('password'));
           
            $add_admin->save();

    
        return  redirect()->route('dashboard')->with('success','you Add new admin');
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
    public function edit(Admin $admin)
    {
        //
        $users = User::all();
        $albums = album::all();
        $admins = Admin::all();
        return view('admin.editadmin',compact('admin','users','albums','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //

        $request->validate([
            'roles'=>'array',
            'name'=>'string',
            'email'=>'email',
        ]);
// if (!$admin->hasRole('super_admin'))  return redirect()->route('dashboard')->with('error','for super admins  only !');;
             $requestdata = $request->all();
// echo $requestdata->role ;
            $admin->update($requestdata);
            //dd($request->roles) ;
$admin->syncRoles($request->roles);
          
            return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $admin->delete();
        return  redirect()->route('layout')->with('success','admin is deleted');
    }
}
