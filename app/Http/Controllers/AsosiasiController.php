<?php

namespace App\Http\Controllers;
use App\Models\Asosiasi;
use App\Models\organisasi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AsosiasiController extends Controller
{
    //index
    public function index(){
        $no = 1;
        $dataasosiasi = Asosiasi::orderBy('id', 'desc')->get();
        return view('administrator.asosiasi', compact('no', 'dataasosiasi'));
    }

    //autofill permohonan dari organisasi
    public function dataorganisasi(Request $request){
        $search = $request->cari;

        $dataorganisasi = DB::table('table_organisasi')
                            ->select('id','nama_organisasi','alamat','telp','pengurus');
        $search = !empty($request->cari) ? ($request->cari) : ('');

        if($search){
            $dataorganisasi->where('nama_organisasi','like','%' .$search . '%');
        }
        $data = $dataorganisasi->limit(5)->get();

        $response = array();
        foreach($data as $organisasi){
            $response[] = array(
                "value" => $organisasi->nama_organisasi,
                "nama_organisasi" => $organisasi->nama_organisasi,
                "alamat_organisasi" => $organisasi->alamat,
                "telp" => $organisasi->telp,
                "pengurus" => $organisasi->pengurus,
            );
        }
        return response()->json($response);
    }

    //tambah permohonan
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
        return Redirect('/asosiasi/organisasi');
    }

    public function delete_organisasi($id){
        $organisasi = organisasi::find($id);
        $organisasi->delete();

        toast('Data telah dihapus',  'warning');
        return redirect('/asosiasi/organisasi');
    }

    public function update_organisasi(Request $request, $id){
        $organisasi = organisasi::find($id);
        $organisasi->nama_organisasi = $request->nama;
        $organisasi->alamat     = $request->alamat;
        $organisasi->telp       = $request->telp;
        $organisasi->email      = $request->email;
        $organisasi->pengurus   = $request->pengurus;
        $organisasi->update();

        toast('Data berhasil diperbaharui');
        return redirect('asosiasi/organisasi');
    }
}
