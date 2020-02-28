<?php 
include_once"header.php";
?>
        <section id="sub-header" style="background:url(frontend/blogs.jpg)">
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

        <?php 
		foreach($recentPost->result() as $rpost){
		?>
        <li>
            <i class="icon-calendar-empty"></i> <?=date('F , j Y',strtotime($rpost->created_on))?>            <div><a href="<?=$rpost->id?>"><?=$rpost->post_title?></a></div>
        </li>
        <?php } ?>
       
        
    </ul>
    </div>

<div id="tag_cloud-2" class="widget widget_tag_cloud">
</div>	</div>
            </aside>

            <div class="col-md-8">

                  

<?php 
if($data->num_rows()>0){
	foreach($data->result() as $row){
		//$banner=base_url().'uploads/'.$row->thumbnail;
		
?>
                    <div id="post-30" class="post-30 post type-post status-publish format-image hentry category-education category-school tag-snow post_format-post-format-image">
  <div class="post">
      <?php 
		if($row->post_type=='video'){
		?>
        <video id="my-video" controls preload="auto"  style="width:250px;"
  poster="<?php echo base_url().'uploads/'.$row->thumbnail; ?>" data-setup="{}">
    <source src="<?php echo base_url().'uploads/'.$row->video_url; ?>" type='video/mp4'>
   
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      
    </p>
  </video>
		<?php }
		else if($row->post_type=='image'){
		$src=base_url().'uploads/'.$row->image;
				echo '<img src="'.$src.'"   class="img-responsive" >';
				
		}
		else if($row->post_type=='embed url'){
		$arr = explode('=',$row->video_url);
		
		 ?>
         <iframe width="250" height="100" src="https://www.youtube.com/embed/<?php echo $arr[1]; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
<?php } ?>              
       
    <div class="post_info clearfix">
      <div class="post-left">
        <ul>
          <li><i class="icon-calendar-empty"></i>On <span><?=date('F , j Y',strtotime($row->created_on))?></span></li>
          <li><i class="icon-user"></i>By <a href="" title="Posts by Admin" rel="author">Admin</a></li>
          <li><i class="icon-tags"></i>Category  <a  rel="tag"><?php echo $row->category;?></a></li>
      </div>
      <div class="post-right"><i class="icon-comment"></i>0 comment</div>
    </div>
    <h4><a href="eblogs/detail/<?=$row->id;?>"><?php echo $row->post_title;?></a></h4>
    <p><?php 
		$post_description = strip_tags($row->post_description);
		//echo mb_substr($post_description,0,115,'UTF-8');
if (strlen($post_description) > 10)
   echo substr($post_description, 0, 150) . '...';		
		?></p>
    <a href="eblogs/detail/<?=$row->id;?>" class="button_medium ">Read more</a>
  </div>
</div>
<!-- end post -->
<div class="clearfix">&nbsp;</div>
<hr>
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
