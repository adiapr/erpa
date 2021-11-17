@extends('administrator.pages.layouts')

@section('title')
    User
@endsection

@section('menu')
    Management
@endsection

@section('content')

@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">List data user</h4>
                <button class="btn btn-warning btn-sm pull-right" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-download"></i>&nbsp;  Download</button>
                <button class="btn btn-success btn-sm pull-right mr-2" data-toggle="modal"  data-target="#importExcel"><i class="fa fa-file-excel"></i>&nbsp;  Import Excel</button>

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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="smallInput">Nama</label>
                                        <input type="text" required name="nama" class="form-control form-control-sm" id="smallInput" placeholder="Masukkan data karyawan">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="smallInput">Email</label>
                                        <input type="text" required name="email" class="form-control form-control-sm" id="smallInput" placeholder="ex. nama@mangrovecorp.id">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="smallInput">Password</label>
                                        <input type="text" required name="password" class="form-control form-control-sm" id="smallInput" placeholder="Masukkan password">
                                    </div>
                                </div>
                                <div class="col-md-3">
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datauser as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>*****</td>
                                <td>{{ $user->role}}</td>
                                <td>
                                    <form action="{{ route('user.delete', $user->id) }}" method="post">
                                    <a class="btn btn-primary btn-sm" style="color:white"><i class="fa fa-edit"></i> Edit</a>

                                        @csrf
                                        <button class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin hapus data?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
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
@endsection
