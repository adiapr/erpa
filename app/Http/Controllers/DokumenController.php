<?php

namespace App\Http\Controllers;
use App\Models\Permohonan;
use File;

use Illuminate\Http\Request;

class DokumenController extends Controller
{
    // KTP 
    public function upload_ktp(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'KTP_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/KTP/'), $namafile);

        $permohonan->ktp = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_ktp($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/KTP/'.$file->ktp);
    }

    public function delete_ktp($id){
        $file = Permohonan::find($id);

        File::delete('document/KTP/'.$file->ktp);
        $file->ktp = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // ijazah 
    public function upload_ijazah(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'ijazah_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/ijazah/'), $namafile);

        $permohonan->ijazah = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_ijazah($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/ijazah/'.$file->ijazah);
    }

    public function delete_ijazah($id){
        $file = Permohonan::find($id);

        File::delete('document/ijazah/'.$file->ijazah);
        $file->ijazah = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }
}
