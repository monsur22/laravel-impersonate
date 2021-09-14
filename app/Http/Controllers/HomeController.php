<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', '!=', Auth::id())->get();
        return view('dashboard',compact('user'));
    }
    public function impersonate( $user_id ){
        if( $user_id != ' '){
            $user = User::find($user_id);
            Auth::user()->impersonate($user);
            return redirect('/home');
        }
        return redirect()->back();
    }
    public function impersonate_leave(){
            Auth::user()->leaveImpersonation();
            return redirect('/home');
    }
}
