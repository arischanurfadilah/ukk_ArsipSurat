<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Aplikasi Pengarsipan Surat</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- <div align="center" style="color: white;">
          <h1>MAVIA</h1>
          <h3>Mail Archiving Application</h3>
        </div> -->
        
      <form class="form-login" style="margin-top:5px" action="<?php echo base_url(); ?>index.php/login/cek_user" method="post">

		        <h2 class="form-login-heading">sign in now</h2>
		        <?php
		        	$notif = $this->session->flashdata('notif');
		        	if ($notif != NULL) {
		        		echo '<div class="alert alert-danger">'.$notif.'</div>';
		        	}
		        ?>
		        <div class="login-wrap">
		            <input type="text" name="nip" class="form-control" placeholder="NIP" onkeypress="return event.charCode >= 48 && event.charCode <= 58" required>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password" required>
		            <br>
		            <input type="submit" name="submit" class="btn btn-theme btn-block" value="SIGN IN">
		         
		            
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>assets/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url(); ?>assets/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
