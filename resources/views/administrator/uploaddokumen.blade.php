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
                    <table id="basic-datatables" class="display table table-striped table-hover" >
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
                                <td></td>
                                <td></td>
                                <td></td>
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
