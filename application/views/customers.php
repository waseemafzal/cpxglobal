<?php 
include_once"header.php";
?>
<style>
#main-features .thumbnail {
    width: 15%;
    margin: 0 2% 2% 2%;
    display: inline-block;
}
</style>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>Customers
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>

<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " >

            <div class="container">
            <h2>Our  Customers</h2>
       

  
          <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
      <?php
	  if($data->num_rows()>0){
	  foreach($data->result() as $row){
		  $src=base_url().'uploads/'.$row->image;
	  ?>
      <div class="thumbnail "><img class="img-responsive" src="<?=$src?>"></div>
      <?php  } }?>
   </section>


   </div>
        </section>

<?php include_once"footer.php"; ?>
