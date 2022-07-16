<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        $tables = array_reverse($tables, false); // OPTIONAL
        
        return view('dashboard.dashboard', ['tables' => $tables] );
    }
}
