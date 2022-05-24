<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class vRPUsers extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vRPUsers_ban(Request $request)
    {
        $id = $request->input('id');
        $reason = $request->input('reason');
        $ban = DB::table('vrp_users')->where('id', $id)->update(['banned' => 1]);
        $ban_reason = DB::table('vrp_users')->where('id', $id)->update(['banreason' => $reason . " [PANEL]"]);
        $admin = DB::table('vrp_users')->where('id', $id)->update(['banadmin' => Auth::user()->name]);
        return redirect()->back();
    }

    public function vRPUsers_unban(Request $request)
    {
        $id = $request->input('id');
        $reason = $request->input('reason');
        $unban = DB::table('vrp_users')->where('id', $id)->update(['banned' => 0]);
        $unban_reason = DB::table('vrp_users')->where('id', $id)->update(['banreason' => $reason . " [PANEL]"]);
        $admin = DB::table('vrp_users')->where('id', $id)->update(['banadmin' => Auth::user()->name]);
        return redirect()->back();
    }

    public function vRPUsers_whitelist(Request $request)
    {
        $id = $request->input('id');
        $whitelist = DB::table('vrp_users')->where('id', $id)->update(['whitelisted' => 1]);
        return redirect()->back();
    }

    public function vRPUsers_unwhitelist(Request $request)
    {
        $id = $request->input('id');
        $unwhitelist = DB::table('vrp_users')->where('id', $id)->update(['whitelisted' => 0]);
        return redirect()->back();
    }
}
