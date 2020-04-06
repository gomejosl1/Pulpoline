<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\DB;
use App\User;
use App\Role;
use App\Beneficiarios;
use App\Http\Controllers\Controller;

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
        return view('home');
    }
     
     public function datos_personales()
    {
        $user = User::get();
        // dd($user);
        // dd($user->farmacia);
        // $user = Auth::user()->role;
        // dd($user[0]->roles->first()->name);
        // Con esto me traigo el usuario autenticado 
        // dd(Auth::user()->roles);
        return view('datos_personales',compact('user'));
    }
}
