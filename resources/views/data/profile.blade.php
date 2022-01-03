@extends('administrator.pages.layouts')

@section('title')
    Profile
@endsection

@section('menu')
    Data
@endsection

@section('content')

@include('sweetalert::alert')
<div class="row">

    <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Profile</h4>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            {{-- profile --}}

                            <form action="/user/profile/update/{{ Auth::user()->id }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Lengkap</label>
                                            <input id="Name" type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input id="Name" type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Role</label>
                                            <input id="Name" name="role" type="text" value="{{ Auth::user()->role }}" readonly class="form-control" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input id="Name" name="password" type="text" required  class="form-control" placeholder="Masukkan ulang">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>Pilih Foto</label>
                                            <input type="file" name="foto" class="form-control" id="preview_gambar">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img id="gambar_nodin" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" class="img-thumbnail" alt="...">

                                    </div>
                                    <div class="col-md-12 pull-right">
                                        <button type="submit" class="btn btn-primary mt-2">Perbaharui Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <img src="../profil/thumb/{{ Auth::user()->foto }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="job">{{ Auth::user()->role }}</div>
                        <div class="desc">{{ Auth::user()->email }}</div>
                        <div class="social-media">
                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#">
                                <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                            </a>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span>
                            </a>
                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#">
                                <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span>
                            </a>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#">
                                <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
