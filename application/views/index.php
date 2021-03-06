<?php 
include_once"header.php";

?>
       <style>
.sharethis-wrap{ display:none;}
.slick-slide {
    margin: 0px 20px;
}
.carousel-caption {
   top: 37%;
}
.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
.wpb_wrapper h2 {
    text-transform: uppercase;
    font-weight: 400;
    font-size: 36px;
    margin-top: 0;
}

.carousel-caption h3{line-height: 48px;
    letter-spacing: 0px;
    font-weight: 600;
    font-size: 48px;
	color: #fff !important;
	}
.carousel-caption p{
	line-height: 48px;
    font-size: 18px;
	text-align:center;
	color: #fff !important;
	}
.caption-animate .item.active .carousel-caption {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
.caption-animate  .item.active .carousel-caption.infinite {
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}

.caption-animate  .item.active .carousel-caption.hinge {
  -webkit-animation-duration: 2s;
  animation-duration: 2s;
}

.caption-animate .item.active .carousel-caption.flipOutX,
.caption-animate .item.active .carousel-caption.flipOutY,
.caption-animate .item.active .carousel-caption.bounceIn,
.caption-animate .item.active .carousel-caption.bounceOut {
  -webkit-animation-duration: .75s;
  animation-duration: .75s;
}
.caption-animate .item .carousel-caption.fadeIn,
.caption-animate .item .carousel-caption.fadeInDown,
.caption-animate .item .carousel-caption.fadeInDownBig,
.caption-animate .item .carousel-caption.fadeInLeft,
.caption-animate .item .carousel-caption.fadeInLeftBig,
.caption-animate .item .carousel-caption.fadeInRight,
.caption-animate .item .carousel-caption.fadeInRightBig,
.caption-animate .item .carousel-caption.fadeInUp,
.caption-animate .item .carousel-caption.fadeInUpBig{
  opacity:0;
}
 #HomeRoe {
	 } 
 #HomeRoe .topTitle{
	 text-align: center;
    text-transform: uppercase;
    color: #d8000b;
	 } 
  #HomeRoe  .bottomTitle{
	  }        
   #HomeRoe  .info{
	/* border-left: 10px solid #d8000b;
    border-right: 10px solid #d8000b;
  */  margin: 0;
    padding: 5px 5px;
    display: inline-block;
    width: 100%;
	   }
	   .prev{ lef:0;}
	   .next{right:0;}
	   .slider-callback_nav{
		   position: absolute;
    top: 50%;
    z-index: 3;
		   }       
		   #slider4 li img{ height:200px !important;}         
		   .sTitle{}
  .sDesc{}   
          .carousel-inner {}
          .carousel-inner .item{ z-index:1px;}
          .carousel-inner .active{z-index:2px;}
</style> 

<section class="vc_rows wpb_rows vc_rows-fluid vc-row-full-width">
           <div id="myCarousel" class="carousel slide caption-animate" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php
  if($slider!=0){
	 $sliderCount= count($slider->num_rows());
	  }
  ?>
  <?php
  for($i=0;$i<$sliderCount;$i++){
	  $active='';
	  if($i==0){
		   $active='active';
		  }
  ?>
    <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?=$active?>"></li>
    <?php } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner " role="listbox">
  <?php
  $j=0;
  foreach($slider->result() as $slide){
	  $activeClass='';
	  $sliderimage=base_url().'uploads/'.$slide->image;
	  if($j==0){
		   $activeClass='active';
		  }
		  {
  ?>
  
    <div class="item <?=$activeClass?> ">
      <img src="<?=$sliderimage?>"  style="width:100%" alt="<?=$slide->title?>">
      <div  class="carousel-caption" >
        <h3 class="sTitle"><?=$slide->title?></h3>
        
        <br>
        <?php 
		if($slide->btn_text!='' and $slide->link!=''){?>
        <a class="btn btn-info" href="<?=$slide->link?>"><?=$slide->btn_text?></a>
        <?php } ?>
        </p>
        
      </div>
    </div>
<?php 
$j++;
} 
  }?>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        </section>
        <section class="vc_rows wpb_rows vc_rows-fluid vc-row-full-width">
            <div class="row">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                            <div class="wpb_text_column wpb_content_element">
                                <div class="wpb_wrapper">
                                    <div class="divider_top_black"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1456394083594" id="main_content_gray">
            <div class="">
                <div class="row">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1460107674003">
                                    <div class="wpb_wrapper">
                                        <!--<h2 style="text-align: center;">ALL PAGES</h2>-->
                                        
                                    </div>
                                </div>
                                <div class="row" id="HomeRoe">
                                <?php $cat =array("WHO WE ARE?","TRAINING","CONSULTING","CERTIFICATIONS","AWARDS","GALLARY","NEWS") ;
								$box=1;
  foreach($cat as $key=>$cat){
	  
  ?>
 
 <div class="col-md-3 col-course">
                                    <h4 class="topTitle"><?php
                                    if($cat=='NEWS'){
										echo 'MEMBERSHIP';
										}else{
										echo $cat;
											
											}
									?></h4>
                                        
                                        <div class="col-item">
                                            <div class="photo">
                                               <div class="responsive-slider">
    <ul class="rslides"  >
    <?php
	$inner = get_by_where_array(array('status'=>1,'category'=>$cat),'homeboxes');
	foreach($inner->result() as $rsslides){
		$src=base_url().'uploads/'.$rsslides->image;
	?>
        <li><img src="<?=$src?>" alt="<?=$rsslides->title?>">
        <p class="info"><a href="<?=$rsslides->url?>"><?=$rsslides->title?></a></p>
           </li>
        <?php 
		
		} ?>
    </ul>
</div>
                                            </div>
                                            
                                        </div>
                                    </div>
  <?php 
  if($box/4==0){
	  echo '<div class="clearfix">&nbsp;</div>';
	  echo '<div class="clearfix">&nbsp;</div>';
	  }
  $box++;
  }
    $videohhome ='assets/homevideo.mp4';
	  if(!empty($sObj->videohhome)) 
	  {
		  $videohhome = base_url().'uploads/'.$sObj->videohhome;
	  }
  ?>
               <div class="col-md-3 col-course">
                                    <h4 class="topTitle">Video</h4>
                                        
                                        <div class="col-item">
                                            <div class="photo">
                                                <video style="width:100%"  height="200" controls>
                                                  <source src="<?php echo $videohhome;?>" type="video/mp4">
                                                	Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            
                                        </div>
                                    </div>                     
                               </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1456394083594" style="padding:   0 !important;" id="main_content_gray">
            <div class="container">
                <div class="row">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element vc_custom_1460107674003">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center;">LATEST NEWS</h2>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                     <?php
					 
								if($recentNews->num_rows()>0){
									foreach($recentNews->result() as $news){
										$src=	    setBlogImage($news->image);
	if($news->image==''){
	    $src=base_url().'uploads/defaultbanner.png';
	}
								?><div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="press_release/detail/<?=$news->id;?>"><img alt="" src="<?=$src?>"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h5 class="black-color"><a href="press_release/detail/<?=$news->id;?>"><?php $post_title = $news->post_title;
	if (strlen($post_title) > 10)
   echo substr($post_title, 0, 30) . '...';
														?> </a></h5>
                                                       
                                                        
                                                       
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php }}else{ ?>
                                    
                                    <h4>No data to show!</h4>
                                    <?php } ?>
                </div>
                <div class="item ">
                     <?php
								if($recentNews->num_rows()>0){
									foreach($recentNews->result() as $news){
							$src=	    setBlogImage($news->image);
	if($news->image==''){
	    $src=base_url().'uploads/defaultbanner.png';
	}
								?><div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="press_release/detail/<?=$news->id;?>"><img alt="" src="<?=$src?>"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h5 class="black-color"><a href="press_release/detail/<?=$news->id;?>"><?php 
														$post_title = $news->post_title;
	if (strlen($post_title) > 10)
   echo substr($post_title, 0, 30) . '...';
														?> </a></h5>
                                                      
                                                        
                                                       <?php /*?> <div class="price pull-right">
                                                            <span class="course-price"><?=date('F j Y',strtotime($news->created_on));?> </span>
                                                        </div><?php */?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php }}else{ ?>
                                    
<h4>No data to show!</h4>                                    <?php } ?>
                </div>
                
            </div>
        </div>
                               
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                     <center>  <a class="button_medium_outline " href="press_release">View all News</a></center> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
           
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1464078186411" style="padding:0 !important" id="testimonials">
            <div class="container">
            
                <div class="row">
                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-2 vc_col-md-8">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                 <h2 style="text-align: center; margin:15px 0 5px 0; color:#fff;font-size: 36px;">Clients Testimonials</h2>
        
                                <div class="carousel slide quote-carousel" data-ride="carousel" id="quote-carousel">
                                    <!-- Bottom Carousel Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php
  if($testimonial!=0){
	 $testimonialCount= count($testimonial->result());
	  
  ?>
  <?php
  
  for($k=0;$k<$testimonialCount;$k++){
	  $active='';
	  if($k==0){
		   $active='active';
		  }
  ?>
    <li data-target="#quote-carousel" data-slide-to="<?=$k?>" class="<?=$active?>"></li>
    <?php }
	
  }?>
                                        
                                        
                                    </ol><!-- Carousel Slides / Quotes -->
                                    <div class="carousel-inner light">
                                     <?php
									 $j=0;
  foreach($testimonial->result() as $slide){
	  $activeClass='';
	  $sliderimage=base_url().'uploads/'.$slide->image;
	  if($j==0){
		   $activeClass='active';
		  }
		  {
  ?>
    <div class="item <?=$activeClass?> ">
  
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center"><img alt="" class="img-circle" src="<?=$sliderimage?>"></div>
                                                    <div class="col-sm-9">
                                                        <p><?=$slide->description?>!</p><small><?=$slide->text?></small>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                                        <?php 
$j++;
} 
  }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " style="padding:10px 0 0 0 !important;" >
            <div class="container">
            
<div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center;">Our global clients</h2>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
        <section class="customer-logos slider">
        <?php
		if($partners->num_rows()>0){
		foreach($partners->result() as $partner){
		//$arr=	explode('.',$partner->image);
		//$img=$arr[0].'_thumb'.$arr[1];
			$img=base_url().'uploads/'.$partner->image;
		 ?>
      <div class="slide"><img width="200" height="150" src="<?=$img?>"></div>
      <?php }
	  
		}
	   ?>
         </section>
     </div>
        </section>
        
        <!-- content close -->
<?php include_once"footer.php"; ?>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
<script src="frontend/slider/responsiveslides.js"></script>
<script>
	$(function() {
		$(".rslides").responsiveSlides({
			auto : true,
			pager : false,
			nav : false,
			speed : 500,
			namespace : "slider-callback",
			maxwidth : "550px"
		});

	});
</script>