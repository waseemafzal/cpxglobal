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
                    <h1>partners
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>

<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " >

            <div class="container">
            <h4> <?php echo strtoupper('Our Global  Partners');?></h4>
<!--<p>As the global leader in technical training and consulting, we have provided insights and increased bottom
line growth more than 1,000 leading printing, packaging and associated companies in more than five
regions. Clients across the value chain have come to value our trainings and consulting services.
</p>   -->      

  
          <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
       <?php
	  if($data->num_rows()>0){
	  foreach($data->result() as $row){
		  $src=base_url().'uploads/'.$row->image;
	  ?>
      <div class="col-md-4"><img class="img-responsive" src="<?=$src?>"></div>
      <?php  } }?>
      <div class="clearfix">&nbsp;</div>
   </section>


   </div>
        </section>

<?php include_once"footer.php"; ?>
