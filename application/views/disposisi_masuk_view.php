<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Disposisi Masuk
              <!-- <a data-target="#modal_add" data-toggle="modal" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Tambah Data</a> -->
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
                           <!--  </h4>
	                  	  	  <hr> -->
	                              <thead>
	                              <tr>
	                                  <th>No</th>
	                                  <th>Nomor Surat</th>
	                                  <th>Unit Pengirim</th>
	                                  <th>Tanggal Disposisi</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Status</th> -->
                                    
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
                                      <td>'.$data->nomor_surat.'</td>
                                      <td>'.$data->nama_jabatan.'</td>
                                      <td>'.$data->tgl_disposisi.'</td>
                                      <td>'.$data->keterangan.'</td>';
                                      // <td>;
                                        // if ($data->status == 0) {
                                        //   echo '<label class="label label-danger">Proses</label>';
                                        // } else {
                                        //   echo '<label class="label label-success">Selesai</label>';
                                        // }
                                      echo '
                                      <td>';

                                        // if ($this->session->userdata('level') != 3 && $data->status != 1) {
                                          if ($this->session->userdata('level') != 3 && $data->status != 1) {
                                          echo '
                                          <a href="'.base_url().'file_masuk/'.$data->file_surat.'" class="btn btn-theme03" target="_blank"><i class="fa fa-search"></i></a>
                                          <a href="'.base_url().'index.php/surat_masuk/disposisi/'.$data->id_surat_masuk.'" class="btn btn-default"><i class="fa fa-mail-forward"></i></a>';
                                        } else {
                                          echo '<a href="'.base_url().'file_masuk/'.$data->file_surat.'" class="btn btn-theme03" target="_blank"><i class="fa fa-search"></i></a>';
                                        }
                                        echo '
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
