<?php
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $users = User::all();
     return response()->json($users);
    }
     public function create(Request $request)
     {
       $user = new User;
       $user->username= $request->username;
       $user->password= $request->password;
       $user->email= $request->email;
       $user->firstname= $request->firstname;
       $user->lastname= $request->lastname;
       $user->active= $request->active;
       $user->newsletter= $request->newsletter;
       
       $user->save();
       return response()->json($user);
     }
     public function show($id)
     {
        $user = User::find($id);
        return response()->json($user);
     }
     public function update(Request $request, $id)
     { 
        $user= User::find($id);
        
        if($request->input('username')) {
        	$user->username = $request->input('username');
        }
        if($request->input('password')) {
        	$user->username = $request->input('password');
        }
        if($request->input('email')) {
        	$user->username = $request->input('email');
        }
        if($request->input('firstname')) {
        	$user->username = $request->input('firstname');
        }
        if($request->input('lastname')) {
        	$user->username = $request->input('lastname');
        }
        if($request->input('active')) {
        	$user->username = $request->input('active');
        }
        if($request->input('newsletter')) {
        	$user->username = $request->input('newsletter');
        }

        $user->save();
        return response()->json($user);
     }
     public function destroy($id)
     {
        $user = User::find($id);
        $user->delete();
         return response()->json('user removed successfully');
     }
    }
    
