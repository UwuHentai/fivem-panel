<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        if (Auth::user()->administrator == 1) {
            $tables = DB::select('SHOW TABLES');
            $vRPUsers = DB::table('vrp_users')->select('id')->get();
            return view('admin/dashboard',['tables' => $tables, 'vRPUsers' => $vRPUsers] );
        } else {
            return view('panel/home');
        }
    }
}
