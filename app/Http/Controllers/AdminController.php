<?php

namespace App\Http\Controllers;
use App\Admin;
use App\pinjam;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function loginAdmin (){

        return view('loginAdmin');
    }

    public function registerAdmin (){
        
        return view('registerAdmin');
    }

    protected function create(Request $request){
            
        $admin = new Admin;

            $admin->name          = $request->name;
            $admin->email         = $request->email;
            $admin->password      = Hash::make($request->password);
            $admin->save();

            return "Berhasil daftar sebagai Admin";
    }

    protected function adminLogin (Request $request){

        $email     = $request->email;
        $password  = $request->password;

        $admin = admin::where('email', $email)->first();

        if ($admin){
            if (Hash::check($password, $admin->password)){

                Session::put('email', $admin->email);
                Session::put('password', $admin->password);
                Session::put('name', $admin->name);
            }
        }

        $ajuanPinjaman = DB::table('pinjam')
                        ->join('users', 'users.id', '=', 'pinjam.id_nasabah')
                        ->select('users.name', 'id_nasabah','id_pinjam', 'nominal', 'tanggal_pinjam', 'tenor', 'users.penghasilan')
                        ->get();

        return view ('admin', ['ajuanPinjaman' =>$ajuanPinjaman]);
    }

    public function detailAngsuran (Request $request){

        $data['penghasilan']   = $request->penghasilan;
        $data['nama_peminjam'] = $request->nama_peminjam;
        $data['nominal']       = $request->nominal;
        $data['tenor']         = $request->tenor;
        $data['id_pinjam']     = $request->id_pinjam;
        $data['id_nasabah']    = $request->id_nasabah;

       if ($tenor = 12){
            $data['angsuran'] = ($data['nominal'] / 12)  * 0.05 + ($data['nominal'] / 12);
        } elseif($tenor = 24){
            $data['angsuran'] = (data['$nominal'] / 24)  * 0.08  + ($data['nominal'] / 24);
        } elseif($tenor = 36) {
            $data['angsuran'] = ($data['nominal'] / 36)  * 0.11 + ($data['nominal'] / 36);
        } 

        $data['persentase_angsuran_dari_penghasilan'] = $data['angsuran'] / $data['penghasilan'] * 100 ;
        $data['angsuran_maksimal']                    = $data['penghasilan'] / 3;
        $data['total_pinjaman']                       = $data['angsuran'] * $data['tenor'];  

        return view ('detailAngsuran', ['data'=>$data]); 
    }    

    public function terimaPinjaman (Request $request){
        $id_nasabah = $request->id_nasabah;
        $id_pinjam  = $request->id_pinjam;
        $nominal    = $request->nominal;

       $pinjam = DB::table('pinjam')
       ->join('users', 'users.id', '=', 'pinjam.id_nasabah')
       ->where('id_nasabah', $id_nasabah)
       ->where('pinjam.id_pinjam', $id_pinjam)
       ->where('users.id', $id_nasabah)->update([
            'statusPeminjaman'       => 'Diterima',
            'users.jumlah_rekening'  => $request->nominal]);

       return "Pinjaman berhasil diterima";
    }

    public function hapusPinjaman (Request $request){

        $hapus_pinjam = pinjam::where('id_pinjam', '=', $request->id_pinjam)->delete();

        $ajuanPinjaman = DB::table('pinjam')
                        ->join('users', 'users.id', '=', 'pinjam.id_nasabah')
                        ->select('users.name', 'id_nasabah','id_pinjam', 'nominal', 'tanggal_pinjam', 'tenor', 'users.penghasilan')
                        ->get();

        return view ('admin', ['ajuanPinjaman' =>$ajuanPinjaman]);
    }
}