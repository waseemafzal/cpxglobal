<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo  APP_NAME; ?></title>

  <base href="<?php echo base_url(); ?>">

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="assets/bower_components/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="assets/bower_components/dist/css/skins/_all-skins.min.css">

  <!-- Morris chart -->

  <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">

  <!-- jvectormap -->

  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Date Picker -->

  <link rel="stylesheet" href="assets/bower_components/jquery-confirm/confirm.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" href="assets/bower_components/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



  <!-- Google Font -->

<?php /*?>  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php */?>    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
   
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">



  <header class="main-header">

    <!-- Logo -->

    <a href="#" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b><?php echo  APP_NAME; ?></b></span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b><?php echo  APP_NAME; ?></b></span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        
<li class=" notifications-menu">
            <a href="order" >
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="unreadCounter"><?php echo  count_tbl_where('order','watched',0); ?></span>
            </a>
            
          </li>
          <!-- User Account: style can be found in dropdown.less -->
<?php /*?>          <?php 
		  $shop_label='Office is closed';
		  $shop_class='btn-danger';
		  if(get_session('shop_status')==1){
			  
			  $shop_label='Office is open';
			  $shop_class='btn-success';
		  }
		  ?>
<li id="div_status_1"> <a style="margin: 4px 0 5px 0;" href="javascript:void(0)" class="btn <?php echo $shop_class ?>" onClick="shopStatus('1','<?php echo get_session('shop_status')?>','setting')" id="btnShopStatus"><?php echo $shop_label ?> </a> </li>
<?php */?>
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->

              <span class="hidden-xs">
               
               
              <?php
			  echo $this->session->userdata('email');  
			  if($this->session->userdata('user_type') == 1)
			  {
				   	$image = get_id_by_key('image','id',$this->session->userdata('user_id'),'users');  
					$imag = base_url().'uploads/'.'noimg.png';
					if(! empty ($image) AND $image!='noimg.png') 
					{
						$imag = base_url().'uploads/'.$image;
					}// noimg.png
			  } 
			  ?>

              

              </span>

            </a>
             <?php 
			 
			 
			 
			  
			 
			 ?>
            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="<?php echo $imag;?>" class="img-circle" alt="User Image" height="160" width="160">



                <p>

                  <?php echo $this->session->userdata('name') ?>

                  <!--<small>Member since Nov. 2012</small>-->

                </p>

              </li>

              <!-- Menu Body -->

              <li class="user-body">

                <div class="row hidden">

                  <div class="col-xs-4 text-center">

                    <a href="#">Followers</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Sales</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Friends</a>

                  </div>

                </div>

                <!-- /.row -->

              </li>

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="pull-left  hidden">

                  <a href="#" class="btn btn-default btn-flat">Profile</a>

                </div>

                <div class="pull-right">

                  <a href="auth/logout" class="btn btn-default btn-flat">Sign out</a>

                </div>

              </li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          

        </ul>

      </div>

    </nav>

  </header>

    <style>

       

.centered {

  position: fixed;

  top: 50%;

  left: 50%; z-index: 9999;

  /* bring your own prefixes */

  transform: translate(-50%, -50%);

}

       </style> 

        <div id="loader" class="hidden">

    <div id="loading-img" class="centered"> 

    

    <img src="<?php echo base_url(); ?>assets/loader.gif">

    </div>

    </div>

  <!-- Left side column. contains the logo and sidebar -->

 <?php include"aside.php"; ?>