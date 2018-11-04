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
				<img class="profile-user-img img-responsive img-circle" src="" alt="User profile picture">

				<h3 class="profile-username text-center"></h3>

				<p class="text-muted text-center">
				</p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item" style="text-align:center">
						<b>Nama</b><br><a>ululululu</a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Username</b><br><a>testtt yaaa</a>
					</li>
					<li class="list-group-item" style="text-align:center">
						<b>Jabatan</b><br><a>Bodo amatt Mbahh</a>
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
                	<form class="form-horizontal">
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Id Karyawan</label>
                    		  <div class="col-sm-10">
                      			<input type="email" readonly="readonly" class="form-control" id="inputName" placeholder="Name">
                    		  </div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputEmail" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Nama</label>
                    		 <div class="col-sm-10">
                               <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Hak Akses</label>
		                    <div class="col-sm-4">
		                      <select style="width:100%; border-radius: 0" class="form-control" id="hak-akses" name="akses" required="required">
		                        <option value="" disabled="disabled" selected="selected"> --Pilih Hak Akses-- </option>
		                        <?php foreach ( $akses as $k ): ?>
		                          <option value="<?php echo $k->id_hakakses?>"> <?php echo $k->hak_akses ?> </option>
		                        <?php endforeach;?>
		                      </select>
		                      <span class="help-block with-errors"></span>
		                    </div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >No. Telp</label>
                    		<div class="col-sm-10">
                      			<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Alamat</label>
                    		<div class="col-sm-10">
                      			<textarea class="form-control" rows="3" style="resize: vertical;" name="alamat"  placeholder = "masukan alamat" required oninvalid="this.setCustomValidity('Masukan Alamat')" oninput="setCustomValidity('')"></textarea>
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Username</label>
                    		<div class="col-sm-10">
                      			<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputSkills" class="col-sm-2 control-label" style="text-align: left; padding-left: 44px" >Email</label>
                    		<div class="col-sm-10">
                      			<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    		</div>
                  		</div>
                  		<div class="form-group">
                    		<div class="col-sm-offset-2 col-sm-10">
                      			<button type="submit" class="btn btn-danger">Submit</button>
                    		</div>
                  		</div>
                	</form>
              </div> <!-- /.tab-panel profil -->
              

              <div class="tab-pane" id="password"> <!-- /.tab-panel password -->
					<form class="form-horizontal" action="#?>" method="POST">
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-3 control-label"style="text-align: left; padding-left: 44px" >Password Lama</label>
                    		  <div class="col-sm-9">
                      			<input type="email" class="form-control" id="inputName" placeholder="Name">
                    		  </div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-3 control-label" style="text-align: left; padding-left: 44px" >Password Baru</label>
                    		  <div class="col-sm-9">
                      			<input type="email" class="form-control" id="inputName" placeholder="Name">
                    		  </div>
                  		</div>
                  		<div class="form-group">
                    		<label for="inputName" class="col-sm-3 control-label"style="text-align: left; padding-left: 44px" >Konfirmasi Password</label>
                    		  <div class="col-sm-9">
                      			<input type="email" class="form-control" id="inputName" placeholder="Name">
                    		  </div>
                  		</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-check-circle"></i> Simpan</button>
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