<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Data Pegawai
              <a data-target="#modal_add" data-toggle="modal" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
            </h3> <br>
            <?php
              $notif = $this->session->flashdata('notif');
              if ($notif != NULL) {
                echo '<div class="alert alert-info">'.$notif.'</div>';
              }
            ?>
				<div class="row">
				
	                  <div class="col-md-12 mt">
	                  	<div class="content-panel">
	                          <table class="table table-hover dataTable js-exportable">
	                  	  	  <!-- <h4><i class="fa fa-angle-right"></i> Data Pegawai </h4>
	                  	  	  <hr> -->
	                              <thead>
	                              <tr>
	                                  <th>No</th>
	                                  <th>Nama</th>
	                                  <th>NIP</th>
	                                  <th>Jabatan</th>
                                    <th></th>
	                              </tr>
	                              </thead>
	                              <tbody>
	                              <?php 
                                $no = 1;
                                  foreach ($pegawai as $data) {
                                    echo '
                                      <tr>
                                        <td>'.$no++.'</td>
                                        <td>'.$data->nama_pegawai.'</td>
                                        <td>'.$data->nip.'</td>
                                        <td>'.$data->nama_jabatan.'</td>
                                        <td>
                                          <a class="btn btn-theme02" data-target="#edit_'.$data->id_pegawai.'" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                          <a class="btn btn-danger" data-target="#hapus_'.$data->id_pegawai.'" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                      </tr>
                                    ';
                                  }
                                ?>
	                              </tbody>
	                          </table>
	                  	  </div>
	                  </div><!-- /col-md-12 -->
				</div>

		</section>
      </section><!-- /MAIN CONTENT -->

<!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_add" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="<?php echo base_url(); ?>index.php/pegawai/tambah_pegawai" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah Data Pegawai</h4>
                          </div>
                          <div class="modal-body">
                              <label>Nama</label>
                              <input type="text" name="nama_pegawai" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>NIP</label>
                              <input type="text" name="nip" class="form-control placeholder-no-fix" onkeypress="return event.charCode >= 48 && event.charCode <= 58" required>
                          </div>
                          <div class="modal-body">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>Jabatan</label>

                              <select name="jabatan" class="form-control placeholder-no-fix" >
                                <?php 
                                  foreach ($jabatan as $data) {
                                    echo '<option value="'.$data->id_jabatan.'">'.$data->nama_jabatan.'</option>';
                                  }
                                ?>
                              </select>
                              
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <input type="submit" name="submit" class="btn btn-theme" value="Submit">
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
              <!-- modal -->

<?php 
foreach ($pegawai as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus_'.$data->id_pegawai.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content modal-sm">
                        <form method="post" action="'.base_url().'index.php/pegawai/hapus_pegawai/'.$data->id_pegawai.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Anda yakin ingin menghapus?</h4>
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Tidak</button>
                              <input type="submit" name="submit" class="btn btn-theme" value="Ya">
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
  ';
}
?>

<?php 
foreach ($pegawai as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit_'.$data->id_pegawai.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="'.base_url().'index.php/pegawai/edit_pegawai/'.$data->id_pegawai.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Edit Data Pegawai</h4>
                          </div>
                          <div class="modal-body">
                              <label>Nama</label>
                              <input type="text" name="nama_pegawai" class="form-control placeholder-no-fix" value="'.$data->nama_pegawai.'" required>
                          </div>
                          <div class="modal-body">
                              <label>NIP</label>
                              <input type="text" name="nip" class="form-control placeholder-no-fix" onkeypress="return event.charCode >= 48 && event.charCode <= 58" value="'.$data->nip.'" required>
                          </div>
                          <div class="modal-body">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>Jabatan</label>

                              <select name="jabatan" class="form-control placeholder-no-fix" >';
                                  foreach ($jabatan as $jabat) {
                                    echo '<option value="'.$jabat->id_jabatan.'" ';
                                      if ($jabat->id_jabatan == $data->id_jabatan) {
                                        echo 'selected';
                                      }
                                    echo ' >'.$jabat->nama_jabatan.'</option>';
                                  }
                                
                                echo '
                              </select>
                              
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <input type="submit" name="submit" class="btn btn-theme" value="Submit">
                          </div>
                        </form>
                      </div>
                  </div>
              </div>
  ';
}
?>
