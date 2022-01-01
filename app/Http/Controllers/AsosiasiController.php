<?php

namespace App\Http\Controllers;
use App\Models\Asosiasi;
use App\Models\organisasi;
use App\Models\Permohonan;

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

    //permohonan view
    public function tambahpermohonan(){
        $no = 1;
        $datapermohonan = Permohonan::orderBy('id', 'desc')->get();

        return view('administrator.tambahpermohonan', compact('no', 'datapermohonan'));
    }

    // permohonan add
    public function permohonan_add(Request $request){
        $this->validate($request,[
            'alamat'        => 'required|string',
            'telp'          => 'required|string',
            'namapengurus'  => 'required|string',
            'bulan'         => 'numeric|max:12|min:1',
            'tahun'         => 'numeric|max:9999|min:1998'
        ]);

        $permohonan = new Permohonan;

        $permohonan -> nama_organisasi      = $request->nama_organisasi;
        $permohonan -> alamat_organisasi    = $request->alamat;
        $permohonan -> telp_organisasi      = $request->telp;
        $permohonan -> nomor_permohonan     = null;
        $permohonan -> kode_asosiasi        = $request->kodeasosiasi;
        $permohonan -> bulan                = date('mm');
        $permohonan -> tahun                = date('y');
        $permohonan -> nama_kota            = $request->kota;
        $permohonan -> tanggal_surat        = date('d M Y');
        $permohonan -> lampiran             = $request->lampiran;
        $permohonan -> perihal              = $request->perihal;
        $permohonan -> jabatan_pengurus     = $request->jabatan;
        $permohonan -> nama_pengurus        = $request->namapengurus;

        $permohonan -> save();

        toast('Data berhasil ditambahkan', 'success');
        return Redirect('/asosiasi/tambahpermohonan');

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
