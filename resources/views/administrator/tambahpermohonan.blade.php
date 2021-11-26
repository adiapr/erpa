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
                <h4 class="card-title pull-left">List data permohonan</h4>
                {{-- <button class="btn btn-warning btn-sm pull-right" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-download"></i>&nbsp;  Download</button>
                <button class="btn btn-success btn-sm pull-right mr-2" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-file-excel"></i>&nbsp;  Import Excel</button> --}}

                {{-- tambah data  --}}
                <a href="" data-toggle="modal"  data-target="#modalTambah" class="btn btn-primary btn-sm pull-right  mr-2"><i class="fa fa-plus"></i> Tambah Data</a>
                <!-- Modal Input karyawan -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('user.add') }}" method="post">
                            {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data</b></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">{{ __('Nama Organisasi') }}</label>
                                        <input type="text" required name="nama" class="form-control form-control-sm" id="nama_organisasi">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Alamat Organisasi</label>
                                        <input type="text" required name="email" class="form-control form-control-sm" id="alamat_organisasi">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Telp</label>
                                        <input type="text" required name="password" class="form-control form-control-sm" id="telp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="smallInput">Nama Pengurus</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="smallInput">Jabatan</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Nomor Permohonan</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Kode Asosiasi</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Bulan</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Tahun</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Kota</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Tanggal</label>
                                        <input type="date" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Lampiran</label>
                                        <input type="number" maxlength="1" name="nama" class="form-control form-control-sm" id="smallInput">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Perihal</label>
                                        <input type="text" name="nama" class="form-control form-control-sm" id="smallInput">
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Organisasi</th>
                                <th>Nama Pengurus</th>
                                <th>Jabatan Pengurus</th>
                                <th>Kelola</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($dataasosiasi as $data) --}}
                            <tr>
                                <td></td>
                                <td>aaa</td>
                                <td>aa</td>
                                <td></td>
                                <td>
                                    <button class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-success btn-sm"><i class="fa fa-print"></i></button>
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
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
