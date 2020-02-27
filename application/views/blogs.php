<?php 
include_once"header.php";
?>
        <section id="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <h1>E Blogs
</h1>
</div>
            </div><!-- End row -->
        </div><!-- End container -->
      </section>
      <div class="clearfix">&nbsp;</div>
<section id="main_content">

    <div class="container">

        <ol class="breadcrumb"><li><a rel="v:url" property="v:title" href="http://demo.vegatheme.com/learn/">Home</a></li><li class="active">Learn Blog</li></ol>
        <div class="row">

            <aside class="col-md-4">
                	<div id="sidebar" class="sidebar box_style_1">
	<div id="search-2" class="widget widget_search">
    </div><div id="text-6" class="widget widget_text">		<div class="textwidget">
</div>
		</div><div id="recentpost_widget-2" class="widget widget_recentpost_widget"><h4 class="widget_title">Recent Posts</h4>
    <ul>

        
        <li>
            <i class="icon-calendar-empty"></i> 03rd Aug, 2015            <div><a href="http://demo.vegatheme.com/learn/morbi-rutrum-massa-eget-mi-gravida-sit-amet-mollis-magna-gravida/">Morbi rutrum massa eget mi gravida, sit amet mollis magna gravida</a></div>
        </li>
        
        
        <li>
            <i class="icon-calendar-empty"></i> 03rd Aug, 2015            <div><a href="http://demo.vegatheme.com/learn/cum-sociis-natoque-penatibus-et-magnis-dis-parturient-montes/">Cum sociis natoque penatibus et magnis dis parturient montes</a></div>
        </li>
        
        
        <li>
            <i class="icon-calendar-empty"></i> 03rd Aug, 2015            <div><a href="http://demo.vegatheme.com/learn/at-50-center-for-the-education-of-women-celebrates-a-wider-mission/">At 50, Center for the Education of Women celebrates a wider mission</a></div>
        </li>
        
        
    </ul>
    </div>

<div id="tag_cloud-2" class="widget widget_tag_cloud">
</div>	</div>
            </aside>

            <div class="col-md-8">

                  

<?php 
if($data->num_rows()>0){
	foreach($data->result() as $row){
		$banner=base_url().'uploads/'.$row->thumbnail;
?>
                    <div id="post-30" class="post-30 post type-post status-publish format-image hentry category-education category-school tag-snow post_format-post-format-image">
  <div class="post">
    <a href="http://demo.vegatheme.com/learn/morbi-rutrum-massa-eget-mi-gravida-sit-amet-mollis-magna-gravida/">
          
                        <img src="<?=$banner?>" class="img-responsive" alt="">
        </a>
    <div class="post_info clearfix">
      <div class="post-left">
        <ul>
          <li><i class="icon-calendar-empty"></i>On <span><?=date('F , j Y',strtotime($row->created_on))?></span></li>
          <li><i class="icon-user"></i>By <a href="" title="Posts by John Smith" rel="author">Admin</a></li>
      </div>
      <div class="post-right"><i class="icon-comment"></i>0 comment</div>
    </div>
    <?=$row->post_description?>
    <a href="" class="button_medium">Read more</a>
  </div>
</div>
<!-- end post -->
<?php }
}
 ?>

                                    <div class="text-center">
                    <ul class="pagination">
                        
<!--	<li><span aria-current="page" class="page-numbers current">1</span></li>
	<li><a class="page-numbers" href="http://demo.vegatheme.com/learn/blog/page/2/">2</a></li>
	<li><a class="page-numbers" href="http://demo.vegatheme.com/learn/blog/page/3/">3</a></li>
	<li><a class="next page-numbers" href="http://demo.vegatheme.com/learn/blog/page/2/"><i class="fa fa-angle-double-right"></i></a></li>
--></ul>
                    
                </div>

            </div>

        </div>

    </div>

</section>        
        
<?php include_once"footer.php"; ?>
