<?php

namespace App\Http\Controllers;
use App\Models\Asosiasi;
use App\Models\organisasi;

use Illuminate\Http\Request;

class AsosiasiController extends Controller
{
    //index
    public function index(){
        $no = 1;
        $dataasosiasi = Asosiasi::orderBy('id', 'desc')->get();
        return view('administrator.asosiasi', compact('no', 'dataasosiasi'));
    }

    public function tambahpermohonan(){
        $no = 1;
        $dataasosiasi = Asosiasi::orderBy('id', 'desc')->get();

        return view('administrator.tambahpermohonan', compact('no', 'dataasosiasi'));
    }

    public function tambahpendaftaran(){
        $no = 1;
        $dataasosiasi = Asosiasi::orderBy('id', 'desc')->get();

        return view('administrator.tambahpendaftaran', compact('no', 'dataasosiasi'));
    }

    public function view_organisasi(){
        $no = 1;
        $dataorganisasi = organisasi::orderBy('id','desc')->get();
        return view('administrator.konfigurasi_organisasi', compact('no', 'dataorganisasi'));
    }

    public function add_organisasi(Request $request){
        $organisasi = new Organisasi;

        $organisasi->nama_organisasi       = $request->nama;
        $organisasi->alamat     = $request->alamat;
        $organisasi->telp       = $request->telp;
        $organisasi->email      = $request->email;
        $organisasi->pengurus   = $request->pengurus;
        $organisasi->save();

        toast('Data berhasil ditambahkan');
        return view('administrator.konfigurasi_organisasi');
    }

    public function delete_organisasi($id){
        $organisasi = organisasi::find($id);

        $organisasi->delete();
        toast('Data telah dihapus',  'warning');
        return view('administrator.konfigurasi_organisasi');
    }
}
