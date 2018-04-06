<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Data Surat Keluar
              <a data-target="#modal_add" data-toggle="modal" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
            </h3> <br>

            <div class="col-md-12" id="status">
              <div class="col-lg-2">
                <a href="<?php echo base_url(); ?>index.php/surat_keluar/surat_proses">
                  <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Proses</h4>
                    <h1 align="center"><?php $this->db->where('status', 0); $this->db->from('surat_keluar'); echo $this->db->count_all_results(); ?></h1>
                  </div>
                </a>
              </div>
              <div class="col-lg-2">
                <a href="<?php echo base_url(); ?>index.php/surat_keluar/surat_selesai">
                  <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Selesai</h4>
                    <h1 align="center"><?php $this->db->where('status', 1); $this->db->from('surat_keluar'); echo $this->db->count_all_results(); ?></h1>
                  </div>
                </a>
              </div>
            </div>

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
	                  	  	  <!-- <h4><i class="fa fa-angle-right"></i> Data Surat Masuk</h4>
	                  	  	  <hr> -->
	                              <thead>
	                              <tr>
	                                  <th>No</th>
	                                  <th>Nomor Surat</th>
	                                  <th>Tanggal Kirim</th>
                                    <th>Penerima</th>
                                    <th>Perihal</th>
                                    <th>Status</th>
                                    <th></th>
	                              </tr>
	                              </thead>
	                              <tbody>
	                              <?php 
                                $no = 1;
                                  foreach ($surat_keluar as $data) {
                                    echo '
                                    <tr>
                                      <td>'.$no++.'</td>
                                      <td>'.$data->nomor_surat.'</td>
                                      <td>'.$data->tgl_kirim.'</td>
                                      <td>'.$data->penerima.'</td>
                                      <td>'.$data->perihal.'</td>
                                      <td>';
                                        if ($data->status == 0) {
                                          echo '<label class="label label-danger">Proses</label>';
                                        } else {
                                          echo '<label class="label label-success">Selesai</label>';
                                        }
                                      echo
                                      '</td>';
                                      if ($data->status == 0) {
                                          echo '
                                          <td>
                                            
                                              <a href="'.base_url().'file_keluar/'.$data->file_surat.'" class="btn btn-theme03" target="_blank"><i class="fa fa-search"></i></a>
                                              <a class="btn btn-theme02" data-target="#edit_'.$data->id_surat_keluar.'" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                              <a class="btn btn-primary" data-target="#file_'.$data->id_surat_keluar.'" data-toggle="modal"><i class="fa fa-image"></i></a>
                                              <a class="btn btn-danger" data-target="#hapus_'.$data->id_surat_keluar.'" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                                              <a class="btn btn-success" data-target="#selesai_'.$data->id_surat_keluar.'" data-toggle="modal"><i class="fa fa-check"></i></a>
                                            
                                          </td>';
                                        } else {
                                          echo '
                                          <td>
                                              <a href="'.base_url().'file_keluar/'.$data->file_surat.'" class="btn btn-theme03" target="_blank"><i class="fa fa-search"></i></a>
                                          </td>';
                                        }
                                      echo '
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
                        <form method="post" action="<?php echo base_url(); ?>index.php/surat_keluar/tambah_surat" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah Data Surat keluar</h4>
                          </div>
                          <div class="modal-body">
                              <label>Nomor Surat</label>
                              <input type="text" name="nomor_surat" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>Tanggal Kirim</label>
                              <input type="date" name="tgl_kirim" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>Tujuan Pengiriman</label>
                              <input type="text" name="penerima" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>Perihal</label>
                              <input type="text" name="perihal" class="form-control placeholder-no-fix" required>
                          </div>
                          <div class="modal-body">
                              <label>File Surat</label>
                              <input type="file" name="file_surat" class="form-control placeholder-no-fix" required>
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
foreach ($surat_keluar as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus_'.$data->id_surat_keluar.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content modal-sm">
                        <form method="post" action="'.base_url().'index.php/surat_keluar/hapus_surat/'.$data->id_surat_keluar.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Anda yakin ingin menghapus?</h4>
                              <input type="hidden" name="nama_surat" value="'.$data->file_surat.'" class="form-control placeholder-no-fix">
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
foreach ($surat_keluar as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit_'.$data->id_surat_keluar.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="'.base_url().'index.php/surat_keluar/edit_surat/'.$data->id_surat_keluar.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Edit Data Surat</h4>
                          </div>
                          <div class="modal-body">
                              <label>Nomor Surat</label>
                              <input type="text" name="nomor_surat" class="form-control placeholder-no-fix" value="'.$data->nomor_surat.'" required>
                          </div>
                          <div class="modal-body">
                              <label>Tanggal Kirim</label>
                              <input type="date" name="tgl_kirim" class="form-control placeholder-no-fix" value="'.$data->tgl_kirim.'" required>
                          </div>
                          <div class="modal-body">
                              <label>Pengirim</label>
                              <input type="text" name="penerima" class="form-control placeholder-no-fix" value="'.$data->penerima.'" required>
                          </div>
                          <div class="modal-body">
                              <label>Perihal</label>
                              <input type="text" name="perihal" class="form-control placeholder-no-fix" value="'.$data->perihal.'" required>
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


<?php 
foreach ($surat_keluar as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="file_'.$data->id_surat_keluar.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="'.base_url().'index.php/surat_keluar/edit_file/'.$data->id_surat_keluar.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Edit File Surat</h4>
                          </div>
                          <div class="modal-body">
                            <h6>Nama File : <a href="'.base_url().'file_keluar/'.$data->file_surat.'" target="_blank">'.$data->file_surat.'</a></h6>
                              <label>Nomor Surat</label>
                              <input type="file" name="file_surat" class="form-control placeholder-no-fix" required>
                              <input type="hidden" name="nama_surat" value="'.$data->file_surat.'" class="form-control placeholder-no-fix">
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

<?php 
foreach ($surat_keluar as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus_'.$data->id_surat_keluar.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content modal-sm">
                        <form method="post" action="'.base_url().'index.php/surat_keluar/hapus_surat/'.$data->id_surat_keluar.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Anda yakin ingin menghapus?</h4>
                              <input type="hidden" name="nama_surat" value="'.$data->file_surat.'" class="form-control placeholder-no-fix">
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
foreach ($surat_keluar as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="selesai_'.$data->id_surat_keluar.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content modal-sm">
                        <form method="post" action="'.base_url().'index.php/surat_keluar/update_status/'.$data->id_surat_keluar.'" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Apakah proses surat ini sudah selesai?</h4>
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