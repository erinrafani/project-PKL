<?php

namespace App\Http\Controllers;

// use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    // public function index()
    // {
    //     if (Auth::user()->hasRole('admin')) {
    //         return view('home');
    //     } else {
    //         return view('pengguna.index');
    //     }
    // }
}
