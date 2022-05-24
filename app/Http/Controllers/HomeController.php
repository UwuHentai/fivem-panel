<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
        $tables = DB::select('SHOW TABLES');
        $vRPUsers = DB::table('vrp_users')->select('id')->get();
        return view('dashboard',['tables' => $tables, 'vRPUsers' => $vRPUsers] );
    }
}
