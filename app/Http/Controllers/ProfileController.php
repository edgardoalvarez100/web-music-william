<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

class ProfileController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function show()
     {
     	return view('admin.profile.index');
     }

    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('admin.profile')->with('success','Changed password successfully');
    }
}
