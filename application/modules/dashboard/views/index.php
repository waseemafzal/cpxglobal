<?php getHead(); ?>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <h1>

        Dashboard

        <small>Control panel</small>

      </h1>

            <ol class="breadcrumb">

                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Dashboard</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <!-- Small boxes (Stat box) -->

           
 <?php 
 

if($this->session->userdata('user_type')==STAFF){
	 include"staff_dashboard.php";
	 }
	  if($this->session->userdata('user_type')==ADMIN){
	 include"admin_dashboard.php";
	 }
  ?>
           
        </section>

        <!-- /.content -->

    </div>

    <!-- /.content-wrapper -->

    <?php  getFooter(); ?>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

        <script src="dist/js/pages/dashboard.js"></script>

        <!-- AdminLTE for demo purposes -->