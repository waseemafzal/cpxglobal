<?php 
include_once"header.php";
if(isset($row)){ 

$post_banner=base_url().'uploads/default_banner.jpg';}

?>
<style>
#tintBG{
	
   
}#title{
    background: #0000009e;
    display: inline-block;
    padding: 1% 5%;
}
.jobinfo>p{ margin-bottom:0px;}
</style>
        <section id="sub-header" style="background-size: 100%;background-position: 50%;" >
        <div id="tintBG">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1 id="title">Career</h1>

</div>
            </div><!-- End row -->
        </div><!-- End container -->
        </div>
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
            <div class="jobinfo">
            <p><b>Date </b> : <?php 
                if(isset($row)){ 
                echo date('F , j ,Y',strtotime($row->created_on));
                } 
                ?></p>
            <p><b>Location </b> :  <?php 
                if(isset($row)){ 
                echo $row->company_location;
                } 
                ?></p>
            <p><b>Company </b> : CPPEx Global</p>
            <p><b>Reporting </b> :  <?php 
                if(isset($row)){ 
                echo $row->post_title;
                } 
                ?></p>
            </div>
            <div class="clearfix">&nbsp;</div>
				<?php 
                if(isset($row)){ 
                echo $row->post_description;
                } 
                ?>
          <div class="clearfix">&nbsp;</div>
<a id="" class="btn btn-info pull-right">APPLY NOW</a>
              </div>
        </section>
        
        
<?php include_once"footer.php"; ?>
<script type="text/javascript">
$(document).ready(function(){

	$('table').addClass('table table-striped'); 
});

</script>