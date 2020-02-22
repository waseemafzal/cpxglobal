<?php 
include_once"header.php";
?>
       <style>

.slick-slide {
    margin: 0px 20px;
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

</style> 

<section class="vc_rows wpb_rows vc_rows-fluid vc-row-full-width">
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="frontend/images/slide_1.jpg" alt="New York">
    </div>

    <div class="item">
      <img src="frontend/images/slide_5-2.jpg" alt="New York">
    </div>

    <div class="item">
      <img src="frontend/images/slide_6.jpg" alt="New York">
    </div>
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
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
            <div class="container">
                <h2 align="center">WHO WE ARE</h2>
                <p>CPPEx Global (Global Center of Printing & Packaging Excellence) strives for excellence because a training & consultancy provider is only as good as the training and consultancy services it offers. CPPEx Global endeavors to be known as a leader in technical training and consultancy services as an institution of excellence in vocational education throughout USA, operating with regional offices in Europe, South America, Middle East, and South Asia and planning to expand to other countries and continents in near future. 
</p>
                <p>CPPEx Global managed by a core team of professional trainers and experts who enable over 5,000 printing industrial professionals to enhance their technical skills in the field of manufacturing printing and packaging materials. We proudly bear the name of the preeminent from the institute's inception and today our experts helps to our global‘s clients to enhance their productivity and business performance by providing latest innovative solutions to keep clients plant at optimum efficiency. We offer a complete range of tailored training services and solutions that maximize your uptime, reduce your costs and help you reach and sustain your desired performance levels.
</p>
                <p>CPPEx Global also organizes international conferences, training workshops, consultancy services and technical seminars with strong support of the global printing & packaging Associations and industries. These technical events provide excellent opportunities for networking as well as informed discussion to industrial professionals on latest topics of colors, printing, packaging, digitalization and associated industries.
</p>
            </div>
        </section>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1456394083594" id="main_content_gray">
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
                                    <div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="news-detail.php"><img alt="" src="frontend/images/news1.jpg"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h4 class="black-color"><a href="news-detail.php">EuPIA Updates Suitability </a></h4>
                                                        <p>The European Printing Ink Association (EuPIA) updated its Suitability List of Photoinitiators and Photosynergists for Food Contact Materials</p>
                                                        
                                                        <div class="price pull-right">
                                                            <span class="course-price">1 jan 2020 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="news-detail.php"><img alt="" src="frontend/images/news2.jpg"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h4 class="black-color"><a href="news-detail.php">Industrial Wax Market Worth </a></h4>
                                                        <p>According to a study analysis by Persistence Market Research, ever-expanding end-use industries will give a push to the industrial wax market. </p>
                                                        
                                                        <div class="price pull-right">
                                                            <span class="course-price">3 jan 2020 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="news-detail.php"><img alt="" src="frontend/images/news3.jpg"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h4 class="black-color"><a href="news-detail.php">EuPIA Updates Suitability </a></h4>
                                                        <p>The European Printing Ink Association (EuPIA) updated its Suitability List of Photoinitiators and Photosynergists for Food Contact Materials</p>
                                                        
                                                        <div class="price pull-right">
                                                            <span class="course-price">1 jan 2020 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-course">
                                        <div class="col-item">
                                            <div class="photo">
                                                <a href="news-detail.php"><img alt="" src="frontend/images/news4.jpg"></a>
                                                
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="course_info col-md-12 col-sm-12">
                                                        <h4 class="black-color"><a href="news-detail.php">Sun Chemical owner to buy BASF pigments business </a></h4>
                                                        <p>DIC Corporation is to acquire BASF’s global pigments business and integrate it into subsidiary Sun Chemical in a deal worth €1.15bn (£1.04bn).</p>
                                                        
                                                        <div class="price pull-right">
                                                            <span class="course-price">1 jan 2020 </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                     <center>  <a class="button_medium_outline " href="news-detail.php">View all News</a></center> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
            <div class="container">
            <h2 style="text-align: center;">Clients Testimonials</h2>
        
            </div>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1464078186411" id="testimonials">
            <div class="container">
            
                <div class="row">
                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-md-offset-2 vc_col-md-8">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                
                                <div class="carousel slide quote-carousel" data-ride="carousel" id="quote-carousel">
                                    <!-- Bottom Carousel Indicators -->
                                    <ol class="carousel-indicators">
                                        <li class="active" data-slide-to="0" data-target="#quote-carousel"></li>
                                        <li class="" data-slide-to="1" data-target="#quote-carousel"></li>
                                        <li class="" data-slide-to="2" data-target="#quote-carousel"></li>
                                    </ol><!-- Carousel Slides / Quotes -->
                                    <div class="carousel-inner light">
                                        <div class="item active">
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center"><img alt="" class="img-circle" src="frontend/images/teacher_4_small.jpg"></div>
                                                    <div class="col-sm-9">
                                                        <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p><small>Someone famous</small>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                                        <div class="item">
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center"><img alt="" class="img-circle" src="frontend/images/teacher_3_small.jpg"></div>
                                                    <div class="col-sm-9">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor nec lacus ut tempor. Mauris.</p><small>Someone famous</small>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                                        <div class="item">
                                            <blockquote>
                                                <div class="row">
                                                    <div class="col-sm-3 text-center"><img alt="" class="img-circle" src="frontend/images/teacher_1_small.jpg"></div>
                                                    <div class="col-sm-9">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris.</p><small>Someone famous</small>
                                                    </div>
                                                </div>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404 " >
            <div class="container">
            
<div class="wpb_text_column wpb_content_element">
                                    <div class="wpb_wrapper">
                                        <h2 style="text-align: center;">Our  Partners</h2>
                                    </div>
                                </div>
                                <div class="clearfix">&nbsp;</div>
        <section class="customer-logos slider">
      <div class="slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
      <div class="slide"><img src="https://image.freepik.com/free-vector/retro-label-on-rustic-background_82147503374.jpg"></div>
   </section>
     </div>
        </section>
        
        <!-- content close -->
<?php include_once"footer.php"; ?>