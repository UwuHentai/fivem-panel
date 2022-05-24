<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class vRPUsersMoney extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vRPUsersMoney_addwallet(Request $request)
    {
        if (Auth::user()->administrator == 1) {

            $users = DB::table('vrp_user_moneys')->get();
 
            foreach ($users as $user) {
                $id = $request->input('id');
                $money = $request->input('money');
                $old_money = $user->wallet;
                $user = DB::table('vrp_user_moneys')->where('user_id', $id)->update(['wallet' => $money + $old_money]);
                return redirect()->back();
            }
        } else {
            return view('panel/home');
        }
    }

    public function vRPUsersMoney_removewallet(Request $request)
    {
        if (Auth::user()->administrator == 1) {

            $users = DB::table('vrp_user_moneys')->get();
 
            foreach ($users as $user) {
                $id = $request->input('id');
                $money = $request->input('money');
                $old_money = $user->wallet;
                $user = DB::table('vrp_user_moneys')->where('user_id', $id)->update(['wallet' => $old_money - $money]);
                return redirect()->back();
            }
        } else {
            return view('panel/home');
        }
    }

    public function vRPUsersMoney_addbank(Request $request)
    {
        if (Auth::user()->administrator == 1) {

            $users = DB::table('vrp_user_moneys')->get();
 
            foreach ($users as $user) {
                $id = $request->input('id');
                $money = $request->input('money');
                $old_money = $user->bank;
                $user = DB::table('vrp_user_moneys')->where('user_id', $id)->update(['bank' => $money + $old_money]);
                return redirect()->back();
            }
        } else {
            return view('panel/home');
        }
    }

    public function vRPUsersMoney_removebank(Request $request)
    {
        if (Auth::user()->administrator == 1) {

            $users = DB::table('vrp_user_moneys')->get();
 
            foreach ($users as $user) {
                $id = $request->input('id');
                $money = $request->input('money');
                $old_money = $user->bank;
                $user = DB::table('vrp_user_moneys')->where('user_id', $id)->update(['bank' => $old_money - $money]);
                return redirect()->back();
            }
        } else {
            return view('panel/home');
        }
    }
}
