<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\album;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class adminController extends Controller
{
    //

  use  AuthenticatesUsers ;

    public function adminlogin(){
        return view('auth.adminlogin');
    }

    public function checkadminlogin(Request $request){

    //  validate for Login Admin form
          $request->validate([
             'email' => 'required|email',
              'password' => 'required|min:6'
             ]);

            //  if Admin is has guard Admin ( register in admins Table ) will lOgin in dashboard
            if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password])){
                return redirect()->route('dashboard');
            }
            else{
            return redirect('admin/login')->withInput($request->only('email'))->with('error','email or password error ');
            }}


             // for ADMIN dashborad data and manage admin 
             public function dashboard(){
              $roles =  DB::table('roles')->get();
                $users = User::all();
                $albums = album::all();
                $admins = Admin::orderBy('created_at','desc')->get();
                return view('admin.dashboard',compact('roles','users','albums','admins'));
        }

        // for layout admin dashboard
        public function layout(){
              
            $users = User::all();
            $albums = album::all();
            $admins = Admin::all();
            return view('admin.layout',compact('users','albums','admins'));
           }

        public function users(){
            $users = User::orderBy('id','desc')->get();
            $albums = album::all();
            $admins = Admin::all();
            return view('admin.users',compact('users','albums','admins'));
        }


        public function index()
        {
            //
            $users = User::all();
                $albums = album::all();
                $admins = Admin::all();
                
                return view('admin.dashboard',compact('users','albums','admins'));
        }


        
        public function showlabum($id){
                $users = User::all();
                $albums = album::all();
                $admins = Admin::all();


            $album = User::find($id)->album;
            return view('admin.showalbum',compact('album','users','albums','admins'));

        }

        public function edit($id){
            $users = User::all();
            $albums = album::all();
            $admins = Admin::all();

            $album = album::find($id);
            return view('admin.albumadminedit',compact('album','users','albums','admins'));
        }


        public function update(Request $request, $id){

            $request->validate([
                'name' => 'bail|required|min:4|max:30',
                'salary' => "required|numeric",
                'discount' => 'numeric',
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
            return  redirect()->route('layout')->with('success','Album user edit Successfully');

        }

        public function destroy($id)
        {
            $album = album::find($id);
            $album->delete();
            return  redirect()->route('users')->with('success','Album Delete Successfully');


        }



}
