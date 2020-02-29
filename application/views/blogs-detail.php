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
  <div class="row">

            <aside class="col-md-4">
                	<div id="sidebar" class="sidebar box_style_1">
	<div id="search-2" class="widget widget_search">
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

	</div>
            </aside>

                        <div class="col-md-8">
              <!--<div class="post single-post">
                
                                                                                                                                                          <img src="http://demo.vegatheme.com/learn/wp-content/uploads/2015/08/blog-1-1.jpg" alt="">
                                                            
                
                <div class="post_info clearfix">
                  <div class="post-left">
                    <ul>
                      <li><i class="icon-calendar-empty"></i>On <span>August 3, 2015</span></li>
                      <li><i class="icon-user"></i>By <a href="http://demo.vegatheme.com/learn/author/admin/" title="Posts by John Smith" rel="author">John Smith</a></li>
                      <li><i class="icon-tags"></i>Tags  <a href="http://demo.vegatheme.com/learn/tag/book/" rel="tag">book</a>, <a href="http://demo.vegatheme.com/learn/tag/library/" rel="tag">library</a></li>                    </ul>
                  </div>
                  <div class="post-right"><i class="icon-comment"></i>0 comment</div>
                </div>

                <h2>Cum sociis natoque penatibus et magnis dis parturient montes</h2>

                <h4>Aenean volutpat aliquet diam</h4>
<p>Venenatis nisi faucibus sit amet. In hac habitasse platea dictumst. Integer vel sem est. Nulla pharetra, justo vitae placerat dapibus, dui massa pellentesque magna, a sagittis magna lorem a massa. Integer convallis augue eu felis euismod vel iaculis velit pretium. Nam et diam ut sem aliquet ultrices non eu ante.lectus. Nam blandit odio nisl, ac malesuada lacus fermentum sit amet. Vestibulum vitae aliquet felis, ornare feugiat elit. Nulla varius condimentum elit, sed pulvinar leo sollicitudin vel.</p>
<p>Morbi rutrum massa eget mi gravida, sit amet mollis magna gravida. Morbi sodales, ligula quis ornare bibendum, magna erat convallis ipsum, id posuere ligula massa vitae leo. Morbi laoreet dui ullamcorper massa pulvinar faucibus. Proin quis nisi viverra, laoreet enim sit amet, adipiscing tellus.</p>
<p>Curabitur libero diam, lacinia a eros a, molestie lobortis magna. Duis pulvinar mattis diam, ac condimentum felis euismod eu. Proin libero felis, malesuada eget fringilla ut, dapibus ut tellus. Nulla facilisi. Quisque hendrerit aliquet commodo. Nullam placerat commodo varius. Morbi egestas iaculis bibendum. Donec mauris felis, consectetur pulvinar est eu, accumsan auctor nunc. Pellentesque semper mi non est auctor, vel viverra risus dictum. Nulla nec ligula vitae ipsum</p>

                
              </div>-->
          
              
	<div class="post post-single">
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
				echo '<img src="'.$src.'"  class="img-responsive" >';
				
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
<!--          <li><i class="icon-user"></i>By <a href="" title="Posts by John Smith" rel="author">Admin</a></li>
-->      </div>
      <div class="post-right"><i class="icon-comment"></i>0 comment</div>
    </div>
    <h2><?php echo $row->post_title;?></h2><br>
    <?php 
		echo $row->post_description;	
		?>
  </div>
              <hr>

              <h4></h4>

              
<div class="commentsform">
    <div id="addcomments">
        <div id="respond" class="comment-respond">
                    	<div id="respond" class="comment-respond">
		<h3 id="reply-title" class="comment-reply-title">Leave a comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="/learn/cum-sociis-natoque-penatibus-et-magnis-dis-parturient-montes/#respond" style="display:none;">Cancel reply</a></small></h3><form action="http://demo.vegatheme.com/learn/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate=""><p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p><p class="comment-form-comment"><textarea id="comment" class="form-control" name="comment" placeholder="Message..." cols="45" rows="8"></textarea></p><p class="comment-form-author"><input id="author" class="form-control" name="author" type="text" value="" placeholder="Enter Name" size="30"></p>
<p class="comment-form-email"><input id="email" class="form-control" name="email" type="email" value="" placeholder="Enter Email" size="30"></p>
<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"> <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label></p>
<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="28" id="comment_post_ID">
<input type="hidden" name="comment_parent" id="comment_parent" value="0">
</p></form>	</div><!-- #respond -->
	        </div>
    </div>
</div><!-- //LEAVE A COMMENT -->
                
            </div>
            
        </div>

    </div>

</section>        
        
<?php include_once"footer.php"; ?>
