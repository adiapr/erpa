@extends('administrator.pages.layouts')

@section('title')
    Biodata Peserta
@endsection

@section('menu')
    Pendaftaran
@endsection

@section('content')

@include('sweetalert::alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title pull-left">List data pendaftaran</h4>
            </div>
            <div class="card-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!!</strong> Ada kesalahan saat pada file yang anda upload
                    <ul style="list-style: none">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Peserta</th>
                                <th>KTP</th>
                                <th>Ijazah S1</th>
                                <th>Sertifikat DKPA/PKPA</th>
                                <th>Sertifikat UPA</th>
                                <th>SK Pengangkatan</th>
                                <th>SK MENKUMHAM</th>
                                <th>Pas Foto</th>
                                <th>BAS Advokat Pemdamping</th>
                                <th>SK Magang</th>
                                <th>Surat Berdedikasi Tinggi</th>
                                <th>SK Tidak Pernah Dipidana</th>
                                <th>SP Bukan PNS</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $data)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $data->nama_pengurus }}</td>
                                {{-- ktp  --}}
                                <td>
                                    @if ($data->ktp == '')
                                    <button data-toggle="modal" data-target="#ktp{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/ktp/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/ktp/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="ktp{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/ktp/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">KTP (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- ijazah  --}}
                                <td>
                                    @if ($data->ijazah == '')
                                    <button data-toggle="modal" data-target="#ijazah{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/ijazah/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/ijazah/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="ijazah{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/ijazah/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ijazah (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- KPA  --}}
                                <td>
                                    @if ($data->serdkpa == '')
                                    <button data-toggle="modal" data-target="#serdkpa{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/serdkpa/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/serdkpa/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="serdkpa{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/serdkpa/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">KPA (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- UPA  --}}
                                <td>
                                    @if ($data->serupa == '')
                                    <button data-toggle="modal" data-target="#serupa{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/serupa/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/serupa/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="serupa{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/serupa/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">UPA (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- SK P  --}}
                                <td>
                                    @if ($data->sk_pengangkatan  == '')
                                    <button data-toggle="modal" data-target="#sk_pengangkatan{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/sk_pengangkatan/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/sk_pengangkatan/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="sk_pengangkatan{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/sk_pengangkatan/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">UPA (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- sk_menkumham   --}}
                                <td>
                                    @if ($data->sk_menkumham   == '')
                                    <button data-toggle="modal" data-target="#sk_menkumham{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/sk_menkumham/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/sk_menkumham/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="sk_menkumham{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/sk_menkumham/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">SK MENKUMHAM (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{-- pas_foto   --}}
                                <td>
                                    @if ($data->pas_foto    == '')
                                    <button data-toggle="modal" data-target="#pas_foto{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/pas_foto/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/pas_foto/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="pas_foto{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/pas_foto/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">PAS FOTO (*.img maks 2MB)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	bas_advokat    --}}
                                <td>
                                    @if ($data->bas_advokat   == '')
                                    <button data-toggle="modal" data-target="#bas_advokat{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/bas_advokat/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/bas_advokat/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="bas_advokat{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/bas_advokat/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">BAS ADVOKAT (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	sk_magang    --}}
                                <td>
                                    @if ($data->bas_advokat   == '')
                                    <button data-toggle="modal" data-target="#sk_magang{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/sk_magang/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/sk_magang/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="sk_magang{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/sk_magang/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">BAS ADVOKAT (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	surat_berderikasi    --}}
                                <td>
                                    @if ($data->surat_berderikasi   == '')
                                    <button data-toggle="modal" data-target="#surat_berderikasi{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/surat_berderikasi/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/surat_berderikasi/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="surat_berderikasi{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/surat_berderikasi/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">BAS ADVOKAT (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	sk_pidana    --}}
                                <td>
                                    @if ($data->sk_pidana   == '')
                                    <button data-toggle="modal" data-target="#sk_pidana{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/sk_pidana/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/sk_pidana/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="sk_pidana{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/sk_pidana/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">SK PIDANA (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	sp_bknpns    --}}
                                <td>
                                    @if ($data->sp_bknpns   == '')
                                    <button data-toggle="modal" data-target="#sp_bknpns{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/sp_bknpns/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/sp_bknpns/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="sp_bknpns{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/sp_bknpns/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">SP Bukan PNS (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                {{--  	status    --}}
                                <td>
                                    @if ($data->status   == '')
                                    <button data-toggle="modal" data-target="#status{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-upload"></i> Belum Diunggah</button>
                                    @else
                                    <div style="width:150px;">
                                        <a href="/download/status/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Berhasil</a>
                                        <a href="/delete/status/{{ $data->id }}" style="color:white" class="btn btn-danger btn-sm p-1 mb-1"> <i class="fa fa-times"></i> </a>
                                    </div>
                                    @endif
                                    <div class="modal fade" id="status{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form id="fileUploadForm" action="/document/status/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">SP Bukan PNS (*.pdf)</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="hidden" name="nama" readonly value="{{ $data->nama_pengurus }}" class="form-control form-control-sm" id="">
                                                        <input type="file" required name="file" class="form-control form-control-sm" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-upload"></i> Upload</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-12">
                        Jumlah Data : {{ $total }}
                    </div>
                    <div class="col-md-12">
                        {{ $pendaftaran->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
