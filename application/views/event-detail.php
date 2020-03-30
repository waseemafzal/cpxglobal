<?php 
include_once"header.php";
if(isset($row)){ 

$post_banner=base_url().'uploads/'.$row->post_banner;}
if(!is_file($post_banner)){
	
	$post_banner=base_url().'uploads/defaultbanner.png';

	}

?>
<style>

#sub-header {
    padding: 110px 0 110px 0;
}
#title{
   background: #f301008c;
    display: inline-block;
    padding: 1% 5%;
    font-size: 50px;
}
</style>
        <section id="sub-header" style="background:url(<?=$post_banner?>);background-size: 100%;background-position: 50%; ">
        <div id="tintBG">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1 id="title"><?php if(isset($row)){ echo $row->title;} ?>
</h1>
<?php if(isset($row)){ 
if($row->short_heading!=''){
//	echo $row->short_heading;
	}
} 
//echo '<pre>';
 //print_r($row);exit;
?>

</div>
            </div><!-- End row -->
        </div><!-- End container -->
        </div>
      </section>
      <div class="clearfix">&nbsp;</div>
<section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " id="main-features">
            <div class="container">
   
           
<?php if(isset($row)){ echo $row->description;} ?>
<form name="" action="contact/registration" method="post">
<div class="col-xs-12"><input type="checkbox" required="required" value="1"> I have read, understand and agreed with all CPPEx Global terms and conditions.</div>
</br></br>
        <center>   <!--<a href="contact/registration" class="btnCustom">APPLY NOW</a>-->
         <button class="btnCustom" type="submit">APPLY NOW</button>
        </center> 
              </div>
        </section>
  </form>      
        
<?php include_once"footer.php"; ?>
