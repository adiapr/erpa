@extends('administrator.pages.layouts')

@section('title')
    Verifikasi Peserta
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
                    <table class="table table-hover table-bordered" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Peserta</th>
                                <th>Status</th>
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
                                <th>Bukti Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $data)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>
                                    {{ $data->nama_pengurus }}
                                    <a href="/verifikasi/diterima/{{ $data->id }}" class="btn btn-primary btn-sm p-1 mb-1 pull-left"></i> <i class="fa fa-check"></i></a>
                                    <a href="" data-toggle="modal" data-target="#alasan{{ $data->id }}" class="btn btn-danger btn-sm p-1 mb-1 pull-right"></i> <i class="fa fa-times-circle"></i></a>
                                    <div class="modal fade" id="alasan{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Reject Peserta</h5>
                                              <button type="button" class="btn btn-sm" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                                            </div>
                                            <form action="/verifikasi/ditolak/{{ $data->id }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <label for="">Alasan Penolakan</label>
                                                  <input type="text" name="alasan" placeholder="Masukkan alasan penolakan" class="form-control form-control-sm">
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="submit" class="btn btn-primary btn-sm">Kirim Penolakan</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                {{-- status  --}}
                                <td>
                                    @if ($data->verifikasi == 'diterima')
                                        <font color="green"><b>Diterima</b></font>
                                    @endif
                                    @if ($data->verifikasi == 'ditolak')
                                        <font color="red"><b>Ditolak</b></font><br>
                                        <font size="-2"><i>( {{ $data->keterangan }} )</i></font>
                                    @endif
                                    @if ($data->verifikasi == '')
                                        Belum Terverifikasi
                                    @endif
                                </td>
                                {{-- ktp  --}}
                                <td>
                                    @if ($data->ktp == '')
                                    <button class="btn btn-light btn-sm p-1 mb-1"></i> Belum Diunggah</button>
                                    @else
                                        <a href="/download/ktp/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                    @endif
                                </td>
                                {{-- ijazah  --}}
                                <td>
                                    @if ($data->ijazah == '')
                                    <button data-toggle="modal" data-target="#ijazah{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/ijazah/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{-- KPA  --}}
                                <td>
                                    @if ($data->serdkpa == '')
                                    <button data-toggle="modal" data-target="#serdkpa{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/serdkpa/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{-- UPA  --}}
                                <td>
                                    @if ($data->serupa == '')
                                    <button data-toggle="modal" data-target="#serupa{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1">Belum Diunggah</button>
                                    @else
                                        <a href="/download/serupa/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{-- SK P  --}}
                                <td>
                                    @if ($data->sk_pengangkatan  == '')
                                    <button data-toggle="modal" data-target="#sk_pengangkatan{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1">Belum Diunggah</button>
                                    @else
                                        <a href="/download/sk_pengangkatan/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                       
                                    @endif
                                </td>
                                {{-- sk_menkumham   --}}
                                <td>
                                    @if ($data->sk_menkumham   == '')
                                    <button data-toggle="modal" data-target="#sk_menkumham{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/sk_menkumham/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{-- pas_foto   --}}
                                <td>
                                    @if ($data->pas_foto    == '')
                                    <button data-toggle="modal" data-target="#pas_foto{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/pas_foto/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	bas_advokat    --}}
                                <td>
                                    @if ($data->bas_advokat   == '')
                                    <button data-toggle="modal" data-target="#bas_advokat{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1">  Belum Diunggah</button>
                                    @else
                                        <a href="/download/bas_advokat/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	sk_magang    --}}
                                <td>
                                    @if ($data->bas_advokat   == '')
                                    <button data-toggle="modal" data-target="#sk_magang{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/sk_magang/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	surat_berderikasi    --}}
                                <td>
                                    @if ($data->surat_berderikasi   == '')
                                    <button data-toggle="modal" data-target="#surat_berderikasi{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/surat_berderikasi/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	sk_pidana    --}}
                                <td>
                                    @if ($data->sk_pidana   == '')
                                    <button data-toggle="modal" data-target="#sk_pidana{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1"> Belum Diunggah</button>
                                    @else
                                        <a href="/download/sk_pidana/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	sp_bknpns    --}}
                                <td>
                                    @if ($data->sp_bknpns   == '')
                                    <button data-toggle="modal" data-target="#sp_bknpns{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1">  Belum Diunggah</button>
                                    @else
                                        <a href="/download/sp_bknpns/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
                                </td>
                                {{--  	status    --}}
                                <td>
                                    @if ($data->status   == '')
                                    <button data-toggle="modal" data-target="#status{{ $data->id }}" class="btn btn-light btn-sm p-1 mb-1">  Belum Diunggah</button>
                                    @else
                                        <a href="/download/status/{{ $data->id }}" style="color:white" class="btn btn-success btn-sm p-1 mb-1"> <i class="fa fa-download"></i> Download</a>
                                        
                                    @endif
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
