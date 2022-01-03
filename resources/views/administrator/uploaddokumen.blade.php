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
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama_pengurus }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm p-1 mb-1">Belum Diunggah</button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">KTP</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                ...
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
