<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Illuminate\Pagination\Paginator;

class VerifikatorController extends Controller
{
    //
    // verifikator
    public function verifikasi_index(){
        Paginator::useBootstrap();
        $batas = 5;
        $total = Permohonan::count();
        $pendaftaran = Permohonan::orderBy('id', 'desc')->paginate($batas);
        $no = $batas*($pendaftaran->currentPage()-1);

        return view('verifikator.verifikasi', compact('no', 'pendaftaran', 'total'));
    }

    public function verifikasi_diterima(Request $request, $id){
        $data = Permohonan::find($id);
        $data->verifikasi = 'diterima';
        $data->update();

        toast('User diterima', 'success');
        return redirect('/verifikasi');
    }

    public function verifikasi_ditolak(Request $request, $id){
        $data = Permohonan::find($id);
        $data->verifikasi = 'ditolak';
        $data->keterangan = $request->alasan;
        $data->update();

        toast('User ditolak', 'success');
        return redirect('/verifikasi');
    }

    public function b_terverifikasi(){
        $no = 1;
        $pendaftaran = Permohonan::where('verifikasi',null)
                ->orderBy('id', 'desc')->get();

        return view('verifikator.b_terverifikasi', compact('no', 'pendaftaran'));
    }

    public function terverifikasi(){
        $no = 1;
        $pendaftaran = Permohonan::where('verifikasi','diterima')
                ->orderBy('id', 'desc')->get();

        return view('verifikator.terverifikasi', compact('no', 'pendaftaran'));
    }

    public function t_terverifikasi(){
        $no = 1;
        $pendaftaran = Permohonan::where('verifikasi','ditolak')
                ->orderBy('id', 'desc')->get();

        return view('verifikator.t_terverifikasi', compact('no', 'pendaftaran'));
    }
}
