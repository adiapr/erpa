@extends('administrator.pages.layouts')

@section('title')
    Tambah Permohonan
@endsection

@section('menu')
    Asosiasi
@endsection

@section('content')

@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">Buat Permohonan</h4>
            </div>
            <div class="card-body">
                @if (count($errors) > 0 )
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li style="list-style: none;color:red">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('asosiasi.addpermohonan') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="smallInput">{{ __('Nama Organisasi') }}</label>
                                <input type="text" required value="{{ old('nama_organisasi') }}" name="nama_organisasi" class="form-control form-control-sm" id="nama_organisasi">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Alamat Organisasi</label>
                                <input type="text" required name="alamat" value="{{ old('alamat') }}" readonly class="form-control form-control-sm" id="alamat_organisasi">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Telp</label>
                                <input type="text" required name="telp" value="{{ old('telp') }}" readonly class="form-control form-control-sm" id="telp">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Nama Pengurus</label>
                                <input type="text" required name="namapengurus" value="{{ old('namapengurus') }}" readonly class="form-control form-control-sm" id="pengurus">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Jabatan</label>
                                <input type="text" required name="jabatan" value="{{ old('jabatan') }}"  class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div>
                        <hr>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Nomor Permohonan</label>
                                <input type="text" required name="nomorpermohonan" value="{{ old('nomorpermohonan') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Kode Asosiasi</label>
                                <input type="text" required name="kodeasosiasi" value="{{ old('kodeasosiasi') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Bulan</label>
                                <input type="number" required name="bulan" value="{{ old('bulan') }}" class="form-control form-control-sm" placeholder="01,02 dst" id="smallInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Tahun</label>
                                <input type="number" required name="tahun" value="{{ old('tahun') }}" placeholder="2020, 2019 dll" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Kota</label>
                                <input type="text" required name="kota" value="{{ old('kota') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Tanggal</label>
                                <input type="date" required name="tanggal" value="{{ old('tanggal') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Lampiran</label>
                                <input type="number" required maxlength="1" name="lampiran" value="{{ old('lampiran') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="smallInput">Perihal</label>
                                <input type="text" required name="perihal" value="{{ old('perihal') }}" class="form-control form-control-sm" id="smallInput">
                            </div>
                        </div>
                        <div class="col-md-4"><br><br>
                            <button class="btn btn-primary btn-sm pull-right" type="submit">Tambah Permohonan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">List data permohonan</h4>
                {{-- <button class="btn btn-warning btn-sm pull-right" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-download"></i>&nbsp;  Download</button>
                <button class="btn btn-success btn-sm pull-right mr-2" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-file-excel"></i>&nbsp;  Import Excel</button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <input type="text" required name="nama" class="form-control form-control-sm" id="nama_organisasi"> --}}
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Organisasi</th>
                                <th>Jabatan Pengurus</th>
                                <th>Nomor Permohonan</th>
                                <th>Kelola</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datapermohonan as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_organisasi }}</td>
                                <td>{{ $data->jabatan_pengurus }}</td>
                                <td>{{ $data->nomor_permohonan }}</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-primary btn-sm" >Cetak</button> --}}
                                    <button class="btn btn-success btn-sm" onclick="printContent('print{{ $data->id }}')"><i class="fa fa-print"></i></button>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $data->id }}"><i class="fa fa-eye"></i></button>
                                    {{-- view surat permohonan  --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            {{-- <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Surat Permohonan</h5>
                                            </div> --}}
                                            <div class="modal-body" id="print{{ $data->id }}">
                                            {{-- ================================================== surat permohonan ====================================================== --}}
                                            <div class="container" style="width:90%">
                                                <p align="center">
                                                <label for="" style="font-size: +6"><font size="+4"><strong>{{ $data->nama_organisasi }}</strong></font></label><br>
                                                <label for=""><strong>{{ $data->alamat_organisasi }}</strong></label><br>
                                                <label for=""><strong>{{ $data->telp_organisasi }}</strong></label><br>
                                                <hr style="height: 4px;"></p>
                                                <div style="float: left; width:100px">Nomor</div>
                                                <div style="float: left;">: {{ $data->id }}/erpa/{{ $data->kode_asosiasi }}/{{ $data->bulan }}/{{ $data->tahun }}</div>
                                                <div style="float: right;">{{ $data->nama_kota }}, {{ $data->tanggal_surat }}</div><br>
                                                <div style="float: left; width:100px">Lampiran</div>
                                                <div style="float: left;"> : {{ $data->lampiran }} Berkas </div><br>
                                                <div style="float: left; width:100px">Perihal</div>
                                                <div style="float: left;"> : {{ $data->perihal }} </div>

                                                <br>
                                                <br>

                                                Kepada Yth. <br>
                                                Ketua Pengadilan Tinggi Samarinda <br>
                                                di tempat <br>
                                                <br>
                                                Dengan hormat,
                                                <p align="justify" style="text-indent: 0.5in">Merujuk ketentuan pada Pasal 4 ayat (1)  Undang-Undang Nomor 18 Tahun 2003 tentang Advokat yang mensyaratkan bahwa
                                                    “ Sebelum menjalankan profesinya, Advokat wajib bersumpah menurut agamanya atau berjanji dengan sungguh-sungguh di
                                                    sidang terbuka Pengadilan Tinggi di wilayah domisili hukumnya serta berdasarkan Surat Ketua Mahkamah Agung Nomor:
                                                    073/KMA/HK.01/IX/2015, tentang Penyumpahan Advokat, maka bersama ini kami mengajukan Permohonan Pengambilan Sumpah/Janji
                                                    Advokat di wilayah hukum Pengadilan Tinggi Samarinda.</p>
                                                <p align="justify" style="text-indent: 0.5in">Adapun Advokat yang diajukan dalam permohonan ini telah memenuhi persyaratan sebagaimana diatur dalam pasal 2 dan
                                                    pasal 3 Undang-Undang Nomor 18 Tahun 2003 tentang Advokat serta telah mendapatkan persetujuan dari Pengurus Pusat
                                                    untuk dapat diikutsertakan dalam permohonan pengambilan sumpah/janji advokat ini (daftar nama terlampir).</p>
                                                <p align="justify" style="text-indent: 0.5in">Besar harapan kami, kiranya Yang Mulia Ketua Pengadilan Tinggi Samarinda dapat memenuhi Permohonan Pengambilan
                                                    Sumpah/Janji Advokat yang kami ajukan, sebelum dan sesudahnya kami ucapkan terima kasih.</p>

                                                <div style="float: right;text-align:center;width:200px;">
                                                    Hormat Kami,<br>
                                                    {{ $data->nama_organisasi }} <br>
                                                    {{ $data->jabatan_pengurus }} <br><br><br><br><br>
                                                    {{ $data->nama_pengurus }}

                                                </div>

                                            </div>

                                            {{-- ================================================== surat permohonan ====================================================== --}}

                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <form action="" method="post">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#modalTambah1" style="color:white"><i class="fa fa-edit"></i> Edit</a>

                                        @csrf
                                        <button class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin hapus data?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                    <div class="modal fade" id="modalTambah1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form action="" method="post">
                                                {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Data</b></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="smallInput">Nama</label>
                                                            <input type="text" required name="nama" value="" class="form-control form-control-sm" id="smallInput" placeholder="Masukkan data karyawan">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="smallInput">Email</label>
                                                            <input type="text" required name="email" value="" class="form-control form-control-sm" id="smallInput" placeholder="ex. nama@mangrovecorp.id">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="smallInput">Password</label>
                                                            <input type="text" required name="password" class="form-control form-control-sm" id="smallInput" placeholder="Masukkan Ulang">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="smallInput">Role</label>
                                                            <select name="role" required class="form-control form-control-sm" id="smallInput">
                                                                <option value="">-- Pilih Role --</option>
                                                                <option value="Administrator">Administrator</option>
                                                                <option value="Asosiasi">Asosiasi</option>
                                                                <option value="Ketua">ketua</option>
                                                                <option value="Hukum">Hukum</option>
                                                                <option value="Verifikator">Verifikator</option>
                                                            </select>
                                                            {{-- <input type="text" name="nama" class="form-control form-control-sm" id="smallInput"> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
@endsection
