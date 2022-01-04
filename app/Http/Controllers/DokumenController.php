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

    // serdkpa
    public function upload_serdkpa(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'KPA_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/KPA/'), $namafile);

        $permohonan->serdkpa = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_serdkpa($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/KPA/'.$file->serdkpa);
    }

    public function delete_serdkpa($id){
        $file = Permohonan::find($id);

        File::delete('document/KPA/'.$file->serdkpa);
        $file->serdkpa = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // serupa
    public function upload_serupa(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'UPA_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/UPA/'), $namafile);

        $permohonan->serupa = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_serupa($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/UPA/'.$file->serupa);
    }

    public function delete_serupa($id){
        $file = Permohonan::find($id);

        File::delete('document/UPA/'.$file->serupa);
        $file->serupa = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // sk_pengangkatan
    public function upload_sk_pengangkatan(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'sk_pengangkatan_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/sk_pengangkatan/'), $namafile);

        $permohonan->sk_pengangkatan = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_sk_pengangkatan($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/sk_pengangkatan/'.$file->sk_pengangkatan);
    }

    public function delete_sk_pengangkatan($id){
        $file = Permohonan::find($id);

        File::delete('document/sk_pengangkatan/'.$file->sk_pengangkatan);
        $file->sk_pengangkatan = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // sk_menkumham
    public function upload_sk_menkumham(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'sk_menkumham_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/sk_menkumham/'), $namafile);

        $permohonan->sk_menkumham = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_sk_menkumham($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/sk_menkumham/'.$file->sk_menkumham);
    }

    public function delete_sk_menkumham($id){
        $file = Permohonan::find($id);

        File::delete('document/sk_menkumham/'.$file->sk_menkumham);
        $file->sk_menkumham = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // pas_foto
    public function upload_pas_foto(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'pas_foto_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/pas_foto/'), $namafile);

        $permohonan->pas_foto = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_pas_foto($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/pas_foto/'.$file->pas_foto);
    }

    public function delete_pas_foto($id){
        $file = Permohonan::find($id);

        File::delete('document/pas_foto/'.$file->pas_foto);
        $file->pas_foto = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // bas_advokat
    public function upload_bas_advokat(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'bas_advokat_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/bas_advokat/'), $namafile);

        $permohonan->bas_advokat = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_bas_advokat($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/bas_advokat/'.$file->bas_advokat);
    }

    public function delete_bas_advokat($id){
        $file = Permohonan::find($id);

        File::delete('document/bas_advokat/'.$file->bas_advokat);
        $file->bas_advokat = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // bas_advokat
    public function upload_sk_magang(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'sk_magang_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/sk_magang/'), $namafile);

        $permohonan->sk_magang = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_sk_magang($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/sk_magang/'.$file->sk_magang);
    }

    public function delete_sk_magang($id){
        $file = Permohonan::find($id);

        File::delete('document/sk_magang/'.$file->sk_magang);
        $file->sk_magang = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // surat_berderikasi
    public function upload_surat_berderikasi(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'surat_berderikasi_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/surat_berderikasi/'), $namafile);

        $permohonan->surat_berderikasi = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_surat_berderikasi($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/surat_berderikasi/'.$file->surat_berderikasi);
    }

    public function delete_surat_berderikasi($id){
        $file = Permohonan::find($id);

        File::delete('document/surat_berderikasi/'.$file->surat_berderikasi);
        $file->surat_berderikasi = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // sk_pidana
    public function upload_sk_pidana(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'sk_pidana_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/sk_pidana/'), $namafile);

        $permohonan->sk_pidana = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_sk_pidana($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/sk_pidana/'.$file->sk_pidana);
    }

    public function delete_sk_pidana($id){
        $file = Permohonan::find($id);

        File::delete('document/sk_pidana/'.$file->sk_pidana);
        $file->sk_pidana = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

    // sp_bknpns
    public function upload_sp_bknpns(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'sp_bknpns_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/sp_bknpns/'), $namafile);

        $permohonan->sp_bknpns = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_sp_bknpns($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/sp_bknpns/'.$file->sp_bknpns);
    }

    public function delete_sp_bknpns($id){
        $file = Permohonan::find($id);

        File::delete('document/sp_bknpns/'.$file->sp_bknpns);
        $file->sp_bknpns = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }

     // status
     public function upload_status(Request $request, $id){
        $permohonan = Permohonan::find($id);

        $this->validate($request, [
            'file'=>'required|mimes:pdf|max:2048'
        ]);
        $nama = $request->nama;
        $file = $request->file;
        $namafile = 'status_'.$nama.'_'.time().'.'.$file->getClientOriginalExtension();

        $request->file->move(public_path('document/status/'), $namafile);

        $permohonan->status = $namafile;
        $permohonan->update();
        toast('Upload berhasil',  'success');
        return redirect('/pendaftaran/dokumen');
    }

    public function download_status($id){
        $file = Permohonan::find($id);
        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download('document/status/'.$file->status);
    }

    public function delete_status($id){
        $file = Permohonan::find($id);

        File::delete('document/status/'.$file->status);
        $file->status = '';
        $file->update();
        toast('Data telah dihapus',  'warning');
        return redirect('/pendaftaran/dokumen');
    }
}
