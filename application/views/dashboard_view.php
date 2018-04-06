<!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            <!-- BASIC FORM ELELEMNTS -->
            <!-- <div class="row mt"> -->
              <!-- <div class="col-lg-12  ">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Tampilkan Dashboard sesuai Tanggal</h4>
                      <form class="form-horizontal style-form" method="get" action="<?php echo base_url(); ?>index.php/dashboard">
                          <div class="form-group">
                              <label class="col-sm-5 col-sm-5 control-label">Tanggal Awal</label>
                              <div class="col-sm-2">
                                  <select name="tgl_awal" class="form-control">
                                    <?php for ($i=1; $i < 31 ; $i++) { 
                                      echo '<option value='.$i.'>'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select name="bln_awal" class="form-control">
                                    <?php for ($i=1; $i < 12 ; $i++) { 
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select name="thn_awal" class="form-control">
                                    <?php for ($i=2017; $i < 2099 ; $i++) { 
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <label class="col-sm-5 col-sm-5 control-label">Tanggal Akhir</label>
                              <div class="col-sm-2">
                                  <select name="tgl_akhir" class="form-control">
                                    <?php for ($i=1; $i < 31 ; $i++) { 
                                      echo '<option value='.$i.'>'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select name="bln_akhir" class="form-control">
                                    <?php for ($i=1; $i < 12 ; $i++) { 
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <select name="thn_akhir" class="form-control">
                                    <?php for ($i=2017; $i < 2099 ; $i++) { 
                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                    } ?>
                                  </select>
                              </div>
                              <div class="col-sm-2">
                                  <input type="submit" name="submit" class="form-control btn btn-theme02" value="Submit">
                              </div>
                          </div>
                          
                      </form>
                  </div>
              </div>   
            </div> -->

              <div class="row">
                  <div class="col-lg-12 main-chart">

                  	<div class="row mtbox">
                      
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <a href="<?php echo base_url(); ?>index.php/surat_masuk/data_surat_masuk">
                    			<div class="box1">
          					  			<span class="li_stack"></span>
          					  			<h3><?php echo $this->db->count_all_results('surat_masuk'); ?></h3>
                          </div>
          					  		<p>Data Surat Masuk</p>
                        </a>
                      </div>
                        <div class="col-md-2 col-sm-2 box0">
                          <a href="<?php echo base_url(); ?>index.php/surat_keluar">
                            <div class="box1">
          					  			  <span class="li_cloud"></span>
          					  			  <h3><?php echo $this->db->count_all_results('surat_keluar'); ?></h3>
                            </div>
        					  			  <p>Data Surat Keluar</p>
                          </a>
                        </div>
                          <div class="col-md-2 col-sm-2 box0">
                            <a href="<?php echo base_url(); ?>index.php/pegawai">
                            	<div class="box1">
          					  			    <span class="li_user"></span>
          					  			    <h3><?php echo $this->db->count_all_results('pegawai'); ?></h3>
                            	</div>
          					  			  <p>Data Pegawai</p>
                            </a>
                          </div>
                         
                  	</div><!-- /row mt -->	
                  
              
                  </div>
                </div>

              <div class="row mt">
                      <div class="col-md-12">
                          <div class="content-panel">
                             <h4><i class="fa fa-angle-right"></i> Grafik Surat Masuk dan Surat Keluar</h4>
                             <div>
                                <h6>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-square" style="color:rgba(220,220,220,1)"></i> Surat Masuk </h6>
                                <h6>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-square" style="color:rgba(151,187,205,1)"></i> Surat Keluar </h6>
                              </div>
                              <div class="panel-body text-center">
                                  <canvas id="bar" height="300" width="1200"></canvas>
                              </div>  
                          </div>
                      </div>
                  </div>

              </div>
          </section>
      </section>

<script type="text/javascript">
   var barChartData = {
        labels : ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","November","Desember"],
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                data : [
                <?php echo $januari->total.','.$februari->total.','.$maret->total.','.$april->total.','.$mei->total.','.$juni->total.','.$juli->total.','.$agustus->total.','.$september->total.','.$oktober->total.','.$november->total.','.$desember->total; ?>
                ]
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : [
                <?php echo $jan->total.','.$feb->total.','.$mar->total.','.$apr->total.','.$mei->total.','.$jun->total.','.$jul->total.','.$agu->total.','.$sep->total.','.$okt->total.','.$nov->total.','.$des->total; ?>
                ]
            }
        ]

    };

    new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
</script>