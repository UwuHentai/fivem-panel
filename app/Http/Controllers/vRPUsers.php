<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class vRPUsers extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function ban(Request $request)
    {
        $data = [
            'banned' => 1, 
            'banreason' => $request->input('reason'), 
            'banadmin' => Auth::user()->name
        ];

        DB::table('vrp_users')->where('id', $request->input('id'))->update($data);
        
        return redirect()->back();
    }

    public function unban(Request $request)
    {
        $data = [
            'banned' => 0, 
            'banreason' => $request->input('reason'), 
            'banadmin' => Auth::user()->name
        ];

        DB::table('vrp_users')->where('id', $request->input('id'))->update($data);
    
        return redirect()->back();
    }

    public function whitelist(Request $request)
    {
        $data = [
            'whitelisted' => 1
        ];

        DB::table('vrp_users')->where('id', $request->input('id'))->update($data);

        return redirect()->back();
    }

    public function unwhitelist(Request $request)
    {
        $data = [
            'whitelisted' => 0
        ];

        DB::table('vrp_users')->where('id', $request->input('id'))->update($data);

        return redirect()->back();
    }
}
