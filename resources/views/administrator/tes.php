<?php
	include('pages/head.php');
?>
<body>
	<div class="wrapper">
		<?php include("pages/header.php"); ?>
		<!-- Sidebar -->
		<?php include("pages/sidebar.php"); ?>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Raport</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Peminatan</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">List Data Raport</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <h4 class="card-title pull-left">List Data</h4>

								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-hover table-responsive table-bordered" >
											<thead>
												<tr>
													<th>#</th>
        											<th>Nama Siswa</th>
        											<th>Matematika</th>
        											<th>IPA</th>
        											<th>IPS</th>
        											<th>B.Indonesia</th>
                                                    <th>B.Inggris</th>
												</tr>
											</thead>
											<tbody>
											    <?php
											        include("database/koneksi.php");

											     //   $batas = 10;
                //                     				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                //                     				$aktif = $_GET['halaman'];
                //                     				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

                //                     				$previous = $halaman - 1;
                //                     				$next = $halaman + 1;

                //                     				$data = mysqli_query($koneksi,"select * from data_siswa");
                //                     				$jumlah_data = mysqli_num_rows($data);
                //                     				$total_halaman = ceil($jumlah_data / $batas);

                                    				$data_pegawai = mysqli_query($koneksi,"select * from data_siswa");
                                    				$nomor = $halaman_awal+1;
											        while($data = mysqli_fetch_array($data_pegawai)){


											    ?>
												<tr>
													<td><?php echo $nomor++; ?></td>
        											<td>
        											     <a href="#" data-toggle="modal" data-target="#editData<?php echo $data['id'] ?>">
        											         <?php echo $data['nama_lengkap'] ?>
        											     </a>
        											    <div class="modal fade" id="editData<?php echo $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <form action="controller/updateraport.php?id=<?php echo $data['id'] ?>">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $data['nama_lengkap'] ?></h5>
                                                                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button> -->
                                                                </div>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Nama Siswa</label>
                                                                                    <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_lengkap'] ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Matematika</label>
                                                                                    <input type="number" class="form-control" max="100" required name="mat" value="<?php echo $data['raportmat'] ?> ">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>IPA</label>
                                                                                    <input type="number" class="form-control" name="ipa" max="100" required value="<?php echo $data['raportipa'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>IPS</label>
                                                                                    <input type="number" class="form-control" name="ips" max="100" required value="<?php echo $data['raportips'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>B. Indonesia</label>
                                                                                    <input type="number" class="form-control" name="bindo" max="100" required value="<?php echo $data['raportbindo'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Raport B.Inggris</label>
                                                                                    <input type="text" class="form-control" name="binggris" max="100" required value="<?php echo $data['number'] ?>">
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
        											<td><?php echo $data['raportmat'] ?></td>
                                                    <td><?php echo $data['raportipa'] ?></td>
                                                    <td><?php echo $data['raportips'] ?></td>
        											<td><?php echo $data['raportbindo'] ?></td>
                                                    <td><?php echo $data['raportbing'] ?></td>
												</tr>
												<?php
											        }
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("pages/footer.php"); ?>
		</div>
	</div>
	<!--   Core JS Files   -->
	<?php include("pages/foot.php"); ?>
</body>
</html>
