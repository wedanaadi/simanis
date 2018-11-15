<?php 
  $this->load->view('layouts/template-atas');
?>

<section class="content-header" >
    <h1>
      User Profile
    </h1>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          		<div class="box box-primary">
			<div class="box-body box-profile">
				<!-- <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/AdminLte/img/user2-160x160.jpg') ?>" alt="User profile picture"> -->

				<h3 class="profile-username text-center"></h3>

				<p class="text-muted text-center">
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Nama</b><br><a><?php echo $this->session->userdata('namauser')?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Username</b><br><a><?php echo $this->session->userdata('usernameuser')?></a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Jabatan</b><br><a><?php echo $this->session->userdata('hak_akses')?></a>
					</li>
				</ul>
			</div>
		</div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profil"  data-toggle="tab">Profil</a></li>
              <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="profil" ><!-- /.tab-panel profil  -->
                	<form class="form-horizontal" action="<?php echo base_url('index.php/Profil/update') ?>" method="POST" autocomplete="off" data-toggle="validator">
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Id Karyawan</label>
                    		  <div class="col-sm-10">
                      			<input type="text" readonly="readonly"  id="IdKaryawan" name="IdKaryawan" class="form-control" value="<?php echo $dataprofil->id_karyawan ?>" id="inputName">
                            <div class="help-block with-errors"></div>
                    		  </div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputEmail" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Nama</label>
                    		 <div class="col-sm-10">
                               <input type="text" readonly="readonly" id="NamaKaryawan" name="NamaKaryawan" class="form-control" value="<?php echo $dataprofil->nama_karyawan ?>"  id="inputEmail" >
                               <div class="help-block with-errors"></div>
                    		</div>
                  		</div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Hak Akses</label>
                         <div class="col-sm-10">
                               <input type="text" readonly="readonly"  class="form-control" value="<?php echo $this->session->userdata('hak_akses')?>" id="inputEmail" >
                               <div class="help-block with-errors"></div>
                               <input type="hidden" id="IdAkses" name="IdAkses" class="form-control" value="<?php echo $dataprofil->id_hakakses ?>" id="inputEmail" >
                               <input type="hidden" id="Pass" name="Pass" class="form-control" value="<?php echo $dataprofil->pass ?>" id="inputEmail" >
                               <div class="help-block with-errors"></div>
                        </div>
                      </div>
                  		  <div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >No. Telp</label>
                    		<div class="col-sm-10">
                      			<input type="text" id="NoTlp" name="NoTlp" class="form-control" id="inputSkills" value="<?php echo $dataprofil->notlp_kar ?>" required>
                            <div class="help-block with-errors"></div>
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Alamat</label>
                    		<div class="col-sm-10">
                      			<textarea class="form-control" id="Alamat" name="Alamat" rows="3" style="resize: vertical;" name="alamat" required><?php echo $dataprofil->alamat_kar ?></textarea>
                            <div class="help-block with-errors"></div>
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Username</label>
                    		<div class="col-sm-10">
                      			<input type="text" class="form-control" id="Username" name="Username" value="<?php echo $dataprofil->username ?>" readonly>
                            <div class="help-block with-errors"></div>
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Email</label>
                    		<div class="col-sm-10">
                      			<input type="text" class="form-control" id="Email" name="Email" value="<?php echo $dataprofil->email ?>" required>
                    		    <div class="help-block with-errors"></div>
                        </div>
                  		</div>
                  		<div class="form-group">
                    		<div class="col-sm-offset-2 col-sm-10">
                      			<button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
                    		</div>
                  		</div>
                	</form>
              </div> <!-- /.tab-panel profil -->
              

              <div class="tab-pane" id="password"> <!-- /.tab-panel password -->
					 <form class="form-horizontal" action="<?php echo base_url('index.php/Profil/updatepass') ?>" method="POST" autocomplete="off" data-toggle="validator">
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-3 control-label"style="text-align: left; padding-left: 44px" >Password Lama</label>
                    		  <div class="col-sm-9">
                            <input type="hidden" readonly="readonly"  id="IdKaryawan" name="IdKaryawan" class="form-control" value="<?php echo $dataprofil->id_karyawan ?>" id="inputName">
                      			<input type="password" class="form-control" placeholder="Password Lama" id="PassworLama" name="PassworLama" data-match="#PassworLam" data-match-error="Password Salah" required>
                            <input type="hidden" class="form-control" placeholder="Password Lama" id="PassworLam" name="PassworLam" value="<?php echo $dataprofil->pass?>" required>
                            <div class="help-block for_hb_password with-errors"></div>
                    		  </div>
                  		</div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-sm-3 control-label" class="control-label" style="text-align: left; padding-left: 44px" >Password Baru</label>
                          <div class=" col-sm-9">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password Baru" required>
                            <div class="help-block with-errors"></div>
                          </div>
                          <label for="inputPassword" class="col-sm-3 control-label" class="control-label" style="text-align: left; padding-left: 44px;     padding-top: 23px;" >Konfirmasi Password</label>
                          <div class=" col-sm-9" style="padding-top: 17px;">
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password Tidak Sama" placeholder="Konfirmasi Password" required >
                            <div class="help-block with-errors"></div>
                          </div>
                      </div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-danger btn-flat save disabled" id="tambah"><i class="fa fa-check-circle"></i> Simpan</button>
							</div>
						</div>
					</form>
				</div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>

<?php 
  $this->load->view('layouts/template-bawah');
?>


