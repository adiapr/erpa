<div class="sidebar sidebar-style-2">

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                {{-- all --}}
                <li class="nav-item active">
                    <a  href="/home" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                {{-- asosiasi  --}}
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Pengurus Asosiasi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/asosiasi/tambahpermohonan">
                                    <span class="sub-item">Tambah Permohonan</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="/asosiasi/tambahpendaftaran">
                                    <span class="sub-item">Tambah Pendaftaran</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="/asosiasi/organisasi">
                                    <span class="sub-item">Konfigurasi Organisasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-pen-square"></i>
                        <p>Pendaftaran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/pendaftaran/biodata">
                                    <span class="sub-item">Biodata Peserta</span>
                                </a>
                            </li>
                            <li>
                                <a href="/pendaftaran/dokumen">
                                    <span class="sub-item">Upload Dokumen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- varifikator --}}
                <li class="nav-item">
                    <a href="/verifikasi">
                        <i class="fas fa-book"></i>
                        <p>Verifikasi Peserta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Daftar Peserta</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../sidebar-style-1.html">
                                    <span class="sub-item">Belum Terverifikasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="../overlay-sidebar.html">
                                    <span class="sub-item">Verifikasi</span>
                                </a>
                            </li>
                            <li>
                                <a href="../compact-sidebar.html">
                                    <span class="sub-item">Tidak Lulus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                
                <li class="nav-item">
                    <a data-toggle="collapse" href="#maps">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Maps</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="maps">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../maps/jqvmap.html">
                                    <span class="sub-item">JQVMap</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#charts">
                        <i class="fa fa-th"></i>
                        <p>Management</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/user">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            <li>
                                <a href="../charts/sparkline.html">
                                    <span class="sub-item">Asosiasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="../widgets.html">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
