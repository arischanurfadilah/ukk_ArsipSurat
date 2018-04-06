<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Disposisi Keluar
              <a data-target="#modal_add" data-toggle="modal" class="btn btn-warning pull-right" ><i class="fa fa-plus"></i> Tambah data</a>
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
	                  	  	  <!-- <h4><i class="fa fa-angle-right"></i> Disposisi  -->
                              <!-- <?php echo $surat_masuk->nomor_surat; ?> -->
                            <!-- </h4> -->
	                  	  	  <!-- <hr> -->
	                              <thead>
	                              <tr>
	                                  <th>No</th>
	                                  <th>Tujuan Unit</th>
	                                  <th>Penerima</th>
	                                  <th>Tanggal Disposisi</th>
                                    <th>Keterangan</th>
                                    <th></th>
	                              </tr>
	                              </thead>
	                              <tbody>
	                              <?php 
                                $no = 1;
                                  foreach ($disposisi as $data) {
                                    echo '
                                    <tr>
                                      <td>'.$no++.'</td>
                                      <td>'.$data->nama_jabatan.'</td>
                                      <td>'.$data->nama_pegawai.'</td>
                                      <td>'.$data->tgl_disposisi.'</td>
                                      <td>'.$data->keterangan.'</td>
                                      <td>
                                        <a href="'.base_url().'file_masuk/'.$data->file_surat.'" class="btn btn-theme03" target="_blank"><i class="fa fa-search"></i></a> &nbsp;

                                        <a class="btn btn-danger" data-target="#hapus_'.$data->id_disposisi.'" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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
                        <form method="post" action="<?php echo base_url('index.php/surat_masuk/tambah_disposisi/'.$this->uri->segment(3)); ?>" enctype="multipart/form-data">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Tambah Disposisi Surat</h4>
                              <!-- <input type="hidden" name="id_surat" value="<?php echo $this->uri->segment(3); ?>" > -->
                          </div>
                          <div class="modal-body">
                              <label>Tujuan Unit</label>
                              <select name="tujuan_unit" onchange="get_pegawai_by_jabatan(this.value)" class="form-control placeholder-no-fix" required>
                                <option value="">-- Pilih Salah Satu --</option>
                                <?php 
                                  foreach ($jabatan as $data) {
                                    if ($data->id_jabatan != $this->session->userdata('id_jabatan') && $data->id_jabatan > $this->session->userdata('id_jabatan')) {
                                      echo '<option value="'.$data->id_jabatan.'">'.$data->nama_jabatan.'</option>';
                                    }
                                    
                                  }
                                ?>
                              </select>
                          </div>
                          <div class="modal-body">
                              <label>Tujuan Pegawai</label>
                              <select name="tujuan_pegawai" id="tujuan_pegawai" class="form-control placeholder-no-fix" required>
                                
                              </select>
                          </div>
                          <div class="modal-body">
                              <label>Keterangan</label>
                              <textarea name="keterangan" class="form-control placeholder-no-fix" rows="5" required></textarea>
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
foreach ($disposisi as $data) {
  echo'
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus_'.$data->id_disposisi.'" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content modal-sm">
                        <form method="post" action="'.base_url().'index.php/surat_masuk/hapus_disposisi/'.$data->id_disposisi.'/'.$this->uri->segment(3).'" enctype="multipart/form-data">
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

<script type="text/javascript">
  function get_pegawai_by_jabatan(id_jabatan) {
    $('#tujuan_pegawai').empty();
    
    $.getJSON('<?php echo base_url() ?>index.php/surat_masuk/get_pegawai_by_jabatan/'+id_jabatan, function(data){
      $.each(data, function(index,value){
        $('#tujuan_pegawai').append('<option value="'+value.id_pegawai+'">'+value.nama_pegawai+'</option>');
      })
    });
  }
</script>