<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

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
        if (auth()->user()->can('user.home')) {
            return view('Users.home');
        } else if(auth()->user()->can('admin.home')) {
            return view('Admin.home');
        }
//        return view('home');
    }

    public function profile() {
        if (auth()->user()->can('user.profile')) {
            return view('Users.profile');
        }
    }
}
