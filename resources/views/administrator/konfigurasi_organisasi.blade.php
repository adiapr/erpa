@extends('administrator.pages.layouts')

@section('title')
    Organisasi
@endsection

@section('menu')
    Konfigurasi
@endsection

@section('content')

@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">List data organisasi</h4>


                {{-- tambah data  --}}
                <a href="" data-toggle="modal"  data-target="#modalTambah" class="btn btn-primary btn-sm pull-right  mr-2"><i class="fa fa-plus"></i> Tambah Data</a>
                <!-- Modal Input karyawan -->
                <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form action="{{ route('organisasi.add') }}" method="post">
                            {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data</b></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="smallInput">Nama Organisasi</label>
                                        <input type="text" required name="nama" class="form-control form-control-sm" id="smallInput" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="smallInput">Alamat</label>
                                        <input type="text" required name="alamat" class="form-control form-control-sm" id="smallInput" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">No Telp</label>
                                        <input type="text" required name="telp" class="form-control form-control-sm" id="smallInput" required >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm" id="smallInput" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallInput">Pengurus</label>
                                        <input type="text" name="pengurus" class="form-control form-control-sm" id="smallInput" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
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
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Pengurus</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataorganisasi as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_organisasi }}</td>
                                <td><div style="width:250px;"></div>{{ $data->alamat }}</td>
                                <td>{{ $data->telp }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->pengurus }}</td>
                                <td><div style="width:150px;"></div>
                                <form action="{{ route('asosiasi.organisasi.delete', $data->id) }}" method="post">
                                    <a class="btn btn-primary btn-sm" data-toggle="modal"  data-target="#modalEdit{{ $data->id }}" style="color:white"><i class="fa fa-edit"></i> Edit</a>

                                        @csrf
                                        <button class="btn btn-danger btn-sm" onClick="return confirm('Anda yakin hapus data?')"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
                                    <div class="modal fade" id="modalEdit{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <form action="{{ route('asosiasi.organisasi.update', $data->id) }}" method="post">
                                                {{ csrf_field() }}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><b>Edit Data</b></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="smallInput">Nama Organisasi</label>
                                                            <input type="text" required name="nama" value="{{ $data->nama_organisasi }}" class="form-control form-control-sm" id="smallInput" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="smallInput">Alamat</label>
                                                            <input type="text" required name="alamat" value="{{ $data->alamat }}" class="form-control form-control-sm" id="smallInput" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="smallInput">No Telp</label>
                                                            <input type="text" required name="telp" value="{{ $data->telp }}" class="form-control form-control-sm" id="smallInput" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="smallInput">Email</label>
                                                            <input type="email" name="email" value="{{ $data->email }}" class="form-control form-control-sm" id="smallInput" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="smallInput">Pengurus</label>
                                                            <input type="text" name="pengurus" value="{{ $data->pengurus }}" class="form-control form-control-sm" id="smallInput" required>
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
@endsection
