<?php

namespace App\Http\Controllers;
use Auth;
use Nexmo;
use Illuminte\Support\Facades\DB;
use Illuminate\Http\Request;

class nexmoController extends Controller
{
    public function show (){

        return view ('show');
    }

    public function verifikasi (Request $request){

        $this->validate($request, [

            'code' => 'size:4'
        ]);

        $request_id = session('nexmo_request_id');
        $verifikasi = new \Nexmo\Verify\Verification($request_id);

        Nexmo::verify()->check($verifikasi, $request->code);
        $date = date_create();
        DB::table('users')->where('id', Auth::id())->update(['no_hp_verified_at' => date_format($date, 'Y:m:d H:i:s')]);

        return redirect ('/home');
    }
}
