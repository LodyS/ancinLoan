<?php

namespace App\Http\Controllers;
use App\pinjam;
use DB;
use Illuminate\Http\Request;

class pinjamController extends Controller
{

    public function simulasiPinjaman (Request $request){

        $data['nominal'] = $request->nominal;
        $data['tenor']   = $request->tenor; 

        $bunga_satu_tahun = 0.05;
        $bunga_dua_tahun  = 0.08;
        $bunga_tiga_tahun = 0.11;

       if ($tenor = 12){
            $data['angsuran'] = ($data['nominal'] / $data['tenor'])  * $bunga_satu_tahun + ($data['nominal']  / $data['tenor']);
        } elseif($tenor = 24){
            $data['angsuran'] = (data['$nominal'] / $data['tenor'])  * $bunga_dua_tahun +  ($data['nominal']  / $data['tenor']);
        } elseif($tenor = 36) {
            $data['angsuran'] = ($data['nominal'] / $data['tenor'])  * $bunga_tiga_tahun + ($data['nominal']  / $data['tenor']);
        } 

        return view('simulasiPinjaman', ['data'=>$data]);
    }

    public function pengajuannPinjaman (Request $request){

        $pinjam = new pinjam;

        $pinjam->id_nasabah         = $request->id_nasabah;
        $pinjam->nominal            = $request->nominal;
        $pinjam->statusPeminjaman   = $request->statusPeminjaman;
        $pinjam->tanggal_pinjam     = $request->tanggal_pinjam;
        $pinjam->tenor              = $request->tenor;

        $pinjam->save();

        return "Pinjaman sedang ditinjau";
    }
}