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
                    <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-user"></i>  Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-cogs"></i> Pengaturan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            {{-- profile --}}

                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Lengkap</label>
                                            <input id="Name" type="text" class="form-control" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input id="Name" type="text" class="form-control" value="aaaa"disabled placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tanggal Lahir    </label>
                                            <input id="Name" type="date" class="form-control" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>HP/Whatsapp</label>
                                            <input id="Name" type="date" class="form-control" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>- Pilih - </label>
                                                <select class="form-control" id="formGroupDefaultSelect">
                                                <option>Laki - Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Alamat</label>
                                            <input id="Name" type="text" class="form-control" placeholder="Fill Name">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-group-default">
                                            <label>Pilih Foto</label>
                                            <input type="file" class="form-control" id="preview_gambar">
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            {{-- setting --}}
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Reset Kata Sandi</label>
                                            <input id="Name" type="text" class="form-control" placeholder="Kata sandi lama">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>&nbsp;</label>
                                            <input id="Name" type="password" class="form-control" required placeholder="Kata sandi baru">
                                        </div>
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
                            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
                        <div class="view-profile">
                            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
