<?php 
include_once"header.php";
?>
    <style>
.column {
	margin-bottom:10px;
 
}

#main-features h2, #main-features_green h2 {
    text-transform: uppercase;
    color: #fff;
    font-size: 18px;
    font-weight: normal;
    margin-top: 8px;
    padding-top: 0;
   letter-spacing:0px;
   
}
@media screen and (max-width: 650px) {
  .column {
    width: 50%;
    
  }
}
.top-footer{ }
.card {
	text-align:center;

    border-radius: 20px;
    padding-bottom: 5px;}

.containerCard {text-align: center;
  padding: 0 16px;
}
.card img{
	
}
.containerCard::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
    margin: 10px 0 0 0;
    text-align: center;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
.column{ margin-bottom:50px;}
.follow_us li a {
    border-color: #f301008c !important;
}
.follow_us li a i:hover {
    color: #000 !important;
}
.follow_us li a i{color: #f301008c !important;}
.follow_us{}
</style>    
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
           

<section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>our team</h1></div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<div class="container">

<div class="row">
  <?php 
 	if($aTeams->num_rows()>0)
   {
	
	  foreach($aTeams->result() as $team)
	  {
		  explode('.',$team->post_banner);
		  $img  = base_url().'uploads/'.$team->post_banner;
		  
  ?>
        <div class="col-md-3 col-xs-6 col-sm-6 col-lg-3 column">
        <div class="card">
          <img src="<?php echo $img;?>" alt="<?php echo $team->title;?>" style="width:100%">
          <div class="containerCard">
            <h4><?php echo $team->title;?></h4>
            <p class="title"><?php echo $team->designation;?></p>
            <ul id="follow_us" class="follow_us">
                                    <li>
                                        <a href="mailto:info@cppexglobal.org"><i class="fa fa-envelope"></i></a>
                                    </li>
                                    <li>
                                        <a href="contact"><i class="fa fa-mobile"></i></a>
                                    </li>
                                    <li>
                                        <a href="contact"><i class="fa fa-phone"></i></a>
                                    </li><li>
                                        <a href="contact"><i class="fa fa-at"></i></a>
                                    </li>
                                </ul>
          </div>
          
        </div>
      </div>

  <?php
	 }
  }
  ?>
  
</div>
</div>
 
            <!--<div class="containerCard">
            <div class="row"><div class="wpb_column vc_column_containerCard vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  bottom-h4">
		<div class="wpb_wrapper">
			<h4>Our team</h4>
<p><img class="alignnone size-full wp-image-233" src="frontend/images/pic_1.jpg" alt="pic_1"  sizes="(max-width: 800px) 100vw, 800px"></p>
<p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.</p>

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_containerCard vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  bottom-h4">
		<div class="wpb_wrapper">
			<h4>Equiped classrooms</h4>
<p><img class="alignnone size-full wp-image-234" src="frontend/images/pic_2.jpg" alt="pic_2"sizes="(max-width: 800px) 100vw, 800px"></p>
<p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.</p>

		</div>
	</div>
</div></div></div><div class="wpb_column vc_column_containerCard vc_col-sm-4"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  bottom-h4">
		<div class="wpb_wrapper">
			<h4>Enjoy classroom mates</h4>
<p><img class="alignnone size-full wp-image-235" src="frontend/images/pic_3.jpg" alt="pic_3" sizes="(max-width: 800px) 100vw, 800px"></p>
<p>Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex.</p>

		</div>
	</div>
</div></div></div></div>
            </div>-->
            
        </section>
        
<?php include_once"footer.php"; ?>