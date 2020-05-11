<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\pinjam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;

class userController extends Controller
{
    public function notifikasi (Request $request){

        $pinjam = DB::table('pinjam')
                ->join('users', 'users.id', '=', 'pinjam.id_nasabah')
                ->select('users.penghasilan','users.name','id_pinjam', 'id_nasabah', 'nominal', 'statusPeminjaman', 'tanggal_pinjam', 'tenor')     
                ->where('id_nasabah', $request->id)->get();
                
        return view ('notifikasi', ['pinjam'=>$pinjam]);
    }

    public function profil (Request $request){

        $profil = user::all();

        return view ('profil', ['profil'=>$profil]);
    }

    public function updateProfil (Request $request){

        $profil = DB::table('users')->where('id', $request->id)->get();

        return view('updateProfil', ['profil'=>$profil]);
    }

    public function prosesUpdateProfil (Request $request){

        $profil = User::where('id', '=', $request->id)->update([
           
                'name'        => $request->name,
                'no_hp'       => $request->no_hp,
                'email'       => $request->email,
                'alamat'      => $request->alamat,
                'pekerjaan'   => $request->pekerjaan,
                'penghasilan' => $request->penghasilan
                 ]);  
            
        return "Profil berhasil di update";
    }
}

        