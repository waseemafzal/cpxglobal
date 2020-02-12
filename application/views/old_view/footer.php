<div class="clearfix"></div>
<div id="desktopNotification" class="alert alert-success" style="position: fixed;left: 0;bottom: 0; z-index:999;display:none;"> </div>
<footer class="footer">
   <style type="text/css">
		.br_red{ border:1px solid red !important; }
		.sbcms{ display:none;}
		.sbcms p {color: red;font-size: 12px;margin-bottom: 3px; margin-bottom: 0px;}
		.sbcmssuc {color: #11b719 !important;font-size: 12px;margin-bottom: 3px;}
		.sbcmssucalready {color:#03F !important;font-size: 12px;margin-bottom: 3px;}
		.ref_p{ color: #000;
font-size: 13px;
font-family: arial;}
		
		
		
	</style>
   <div class="row lg-menu ">
      <div class="container">
         <div class="col-md-4 col-sm-4">
<span style="color: #fff"> <img  src="<?=getlogo('assets/img/logo.png')?>" /></span>
          </div>
         <div class="col-md-8 co-sm-8 pull-right">
            <ul>
								<li><a href="<?php echo base_url();?>" title="">Home</a></li>
								<li><a href="<?php echo base_url();?>about-us" title="">About us</a></li>
								<li><a href="<?php echo base_url();?>blog" title="">Blog</a></li>
								<li><a href="<?php echo base_url();?>contact" title="">Contact Us</a></li>
							</ul>
         </div>
      </div>
   </div>
   <div class="row no-padding">
      <div class="container">
         <div class="col-md-3 col-sm-12">
            <div class="footer-widget">
               <h3 class="widgettitle widget-title">About SKILL SQUARED</h3>
               <div class="textwidget">
                 <?=$setting->description?>
                  
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="footer-widget">
               <h3 class="widgettitle widget-title">Quick Link</h3>
               <div class="textwidget">
                  <div class="textwidget">
                     <ul class="footer-navigation">
                            <li><a href="<?php echo base_url();?>about-us" title="">About Us</a></li>
                            <li><a href="news" title="">News</a></li>
                            <li><a href="blog" title="">Blog</a></li>
                            <li><a href="faq" title="">FAQ</a></li>
                             
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="footer-widget">
               <h3 class="widgettitle widget-title">Quick Link</h3>
               <div class="textwidget">
                  <div class="textwidget">
                     <ul class="footer-navigation">
                            <li><a href="contact" title="">Contact Us</a></li>
                            <li><a href="terms" title="">Terms</a></li>
                            <li><a href="waranty-desclaimer" title="">Waranty Disclaimer</a></li>
                            
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="footer-widget">
               <h3 class="widgettitle widget-title" style="font-size: 17px !important;">Subscribe To Our Newsletter</h3>
               <div class="textwidget">
                  <form id="form_subscribe" name="form_subscribe" class="footer-form">
                  <span class="sbcms"></span> 
                  <input type="email" id="sbcriber_id" name="sbcriber_id" class="form-control" placeholder="Email">
                  <button type="button" onclick="subscribe__()" class="btn btn-primary">Subscribe</button></form>
               </div>
              <div class="clearfix">&nbsp;</div>
               <ul class="footer-social">
                     <li><a href="https://business.facebook.com/SkillSquared-317670699187460/"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                     <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                     <li><a href="https://twitter.com/skillsquared" target="_blank"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="https://www.instagram.com/skillsquared/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="https://www.linkedin.com/in/skillsquared-inc-ab69a918a/"><i class="fa fa-linkedin"></i></a></li>
                  </ul> 
            </div>
         </div>
      </div>
   </div>
   <div class="row copyright">
      <div class="container">
         <p>Copyright Skill Squared © 2017. All Rights Reserved </p>
      </div>
   </div>
</footer>
<div class="clearfix"></div>
<div class="modal fade" id="linkgenerate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="z-index: 100000;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" >
          <div class="tab" role="tabpanel">
          <h3>Get your Refferal Link </h3>
           <p class="ref_p">Get your refferel link and reffer users to make instant money on their service.</p>
                <div class="form-group">
                <?php 
				  $referal_code = get_id_by_key('referal_code','id',$this->session->userdata('user_id'),'users');
				  $referal_url = base_url().'Userlogin/?referal='.$referal_code;
				
				?>
                	<span class="ctp"></span>
                    <textarea class="form-control" id="urlf" ><?php echo $referal_url;?></textarea>
                   	<button onclick="copyied()" class="btn btn-info btn-small">Copy refferal URL</button> 
                    <span class="notet">Note: Do not make any change in URL . Just copy and reffer.</span>
                </div>
             </div>
         </div>
      </div>
   </div>
</div>

<div class="clearfix"></div>
<div class="modal fade" id="linkcitynotfound" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true" style="z-index: 1000;">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body" >
          <div class="tab" role="tabpanel" style="padding: 15px;">
          <h4>Add City </h4>
           <p class="ref_p">Add your Desiered city</p>
                <div class="form-group">
                
                	<span class="ctp"></span>
                    
                    <input id="citynotfound" name="citynotfound" class="form-control" value=""
                    placeholder="Enter City Name" type="text" required="">
                    
                   	<button onclick="__addcityenttnoncenc___()" class="btn btn-warning">Save</button> 
                    <span class="loader_sss"></span>
                    
                </div>
             </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <div class="tab" role="tabpanel">
               <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a id="signinTab" href="#login" role="tab" data-toggle="tab">Sign In</a></li>
                  <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                  
               </ul>
               <style type="text/css">
			   
			  /* //#324356*/
			   
			    .form-inline  label{margin:0px;}
				.mendt{ color:red;}
				.jconfirm-red p{color: red;}
				.jconfirm-green p{ color:green;}
				#forgot_tab img {
					margin: 2px 0px 2px 5px;
					display: block;
					max-width: 100%;
					border: 1px solid #ccc;
					background-color: cornflowerblue;
					width: 40%;
					margin: 0px 0px 10px 16px;
					padding: 15px;
				}
				
               </style>
               <div class="tab-content" id="myModalLabel2">
                  <div role="tabpanel" class="tab-pane fade in active" id="login">
                  
                     <div class="subscribe wow fadeInUp">
                        <form class="form-inline" method="post" id="form_user_loggedin" >
                           <div class="col-sm-12">
                              <div class="form-group">
                              <label><i class="fa fa-envelope"></i>&nbsp;Email ID <span class="mendt">*</span></label>
                                 <input type="text" name="identity" class="form-control" placeholder="your@yahoo.com" >
                                 
                                <label><i class="fa fa-key"></i>&nbsp;Password <span class="mendt">*</span></label>  
                                 <input type="password" name="password" id="password" class="form-control" placeholder="********" >
                                 <div class="center">
                                    <button type="submit" id="login-btn" class="submit-btn"> Login </button>
                                    <a href="javascript:void(0);"  id="forgot_password">Forgot password .?</a>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="register">
                     <form class="form-inline" method="post" id="form_user" role="form" enctype="multipart/form-data">
                        <div class="col-sm-12">
                           <div class="form-group">
                            <div class="message-text-alert"></div>
                            <label><i class="fa fa-user"></i>&nbsp;Full Name <span class="mendt">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" autocomplete="off">
                            <label><i class="fa fa-envelope"></i>&nbsp;Email ID <span class="mendt">*</span></label>
                            <input type="text" name="email" class="form-control" placeholder="Email"  autocomplete="off">
                              <label><i class="fa fa-key"></i>&nbsp;Password <span class="mendt">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Password"  autocomplete="off">
                              <label><i class="fa fa-key"></i>&nbsp;Confirm Password <span class="mendt">*</span></label>
                            <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" autocomplete="off">
                            <label><i class="fa fa-phone"></i>&nbsp;Phone No <span class="mendt">*</span></label>
                            <input type="text" name="phone" class="form-control" placeholder="Phone No"  autocomplete="off"> 
                            
                            <div class="col-xs-12 col-md-6">
                                
                              <label><i class="fa fa-language"></i>&nbsp;Select Language</label>    
                                <select data-placeholder="Choose a Language..." name="lang">
                                	<option value="">Choose Language</option>
                               	 <?php echo launages();?>
                                </select>
                            </div>

							
                            <div class="col-xs-12 col-md-6">
                            <label><i class="fa fa-certificate"></i>&nbsp;CNIC/Driving Licence</label>
                            	
                            	<input type="file" name="identityfile" id="identityFile">
                            </div>
                            <div class="center"><button type="submit" id="subscribe" class="submit-btn"> submit </button>
                                                
                            </div>
                           </div>
                        </div>
                     </form>
                  </div> 
                  <div role="tabpanel" class="tab-pane fade " id="forgot_tab">
                    <img  src="<?=getlogo('assets/img/logo.png')?>" />
                     <div class="subscribe wow fadeInUp">
                        <form class="form-inline" method="post" id="form_user_forgot">
                           <div class="col-sm-12">
                              <div class="form-group">
                               <label><i class="fa fa-email"></i>&nbsp;Email ID <span class="mendt">*</span></label>
                                 <input type="text" name="email" class="form-control" placeholder="Enter email " >
                                 <div class="center"><button type="submit" id="login-btn" class="submit-btn"> Forgot Request</button>
                                 <a href="javascript:void(0);" id="forgot_tab_back">Back</a>
                                 
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
   <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
   <ul id="styleOptions" title="switch styling">
      <li><a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a></li>
      <li><a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a></li>
      <li><a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a></li>
   </ul>
</div>

<!-- Scripts==================================================-->

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/viewportchecker_min_file.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/wysihtml5-0.3.0_min_file.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/bootstrap-wysihtml5_min_file.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/loader_min_file.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/owl.carousel.min__min_file.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/js/jquery.easy-autocomplete.min__min_file.js"></script>
<script src="<?php echo base_url();?>assets/js/custom_min_file.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/jquery-confirm/confirm_min_file.js"></script>
<?php include_once "myscript.php"; ?>
<script>
$(".dropdown-large").hover(
     function() {
       $(this).addClass("open");
     },
	  function() 
	  {
       $(this).removeClass("open");
   });
function copyied() {
  /* Get the text field */
  var copyText = document.getElementById("urlf");
  $(".ctp").show();
  $(".ctp").html('copied...');
  copyText.select();
  document.execCommand("copy");
	setTimeout(function(){
		$(".ctp").html('');
	},2000);
 
} 


function openRightMenu(){
	document.getElementById("rightMenu").style.display="block";}
function closeRightMenu(){
	document.getElementById("rightMenu").style.display="none";
}
jQuery('#mogo-slider').carousel({
    interval: 5000
})
	</script>
    
		<!--<script>
        	$('#dob').dateDropper();
        </script>
        
        <script>
       	 $('#exp-start').dateDropper();
        </script>
        
        <script>
        	$('#exp-end').dateDropper();
        </script>
        
        <script>
        	$('#edu-start').dateDropper();
        </script>
        
        <script>
        	$('#edu-end').dateDropper();
        </script>-->
       <!-- <script src="assets/js/jQuery.style.switcher.js"></script>-->
        <script type="text/javascript">
       /* $(document).ready(function() {
        	$('#styleOptions').styleSwitcher();
       	 });*/
      
        
        
         
 function getsubcat(id)
	  {
		 
		   if(id !=0)
		   {    
		     $('#subcatdiv').html('');
			  $('#subacat_child_div').html('');
			  
				$.ajax({
				type: "POST",
				url: "<?php echo base_url().'buyer/getsubcat'; ?>",
					data: {id:id},
					dataType: 'JSON',
					beforeSend: function() {
					$('#loader').removeClass('hidden');
				},
				success: function(data) {
				$('#loader').addClass('hidden');
				
					if (data.status == 1)
					{ 
						$('#subcatdiv').html(data.options);
					}
					
				
				}
				});
		   }
	  }
	  
	  
 function getchild(id)
	  {
		   if(id !=0)
		   {
				$.ajax({
				type: "POST",
				url: "<?php echo base_url().'buyer/getchild'; ?>",
					data: {id:id},
					dataType: 'JSON',
					beforeSend: function() {
					$('#loader').removeClass('hidden');
				},
				success: function(data) {
				$('#loader').addClass('hidden');
				
				if (data.status == 1)
				{ 
					
					$('#subacat_child_div').show();
					$('#subacat_child_div').html(data.options);
				}
				
				
				}
				});
		   }
	  }

  
   function subscribe__()
   {
	
	  $("#sbcriber_id").removeClass('br_red');
	  if($("#sbcriber_id").val() =='')
	  {
		$("#sbcriber_id").addClass('br_red');
		return false;  
	  }
	  $(".sbcms").hide();
	  	  $(".sbcms").html('');

	   var sbcriber_id = $("#sbcriber_id").val();
	   
       $('#loader').removeClass('hidden');
		jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'Subscriber' ?>',
			data:{'sbcriber':sbcriber_id},
			success: function(response)
			{
				$('#loader').addClass('hidden');
				if(response!='')
				{ 
					$(".sbcms").show();
					$(".sbcms").append(response);
				}
				
			}
		});	
	}
          
        




$(document).ready(function () {
    $("#txtSearch").keyup(function () {
		var t = $("#txtSearch").val();
		if(t.length==0)
		{
		  $('#DropdownSearch').hide();
		  
		  return false;	
		}
        $.ajax({
            type: "POST",
            url: "autocomplete/getSkills",
            data: {
                keyword: $("#txtSearch").val()
            },
            dataType: "json",
            success: function (data) {
				
                if (data.length > 0) 
				{
                   $('#DropdownSearch').show();
				    $('#DropdownSearch').empty();
                    $('#txtSearch').attr("data-toggle", "dropdown");
                    $('#DropdownSearch').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#txtSearch').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownSearch').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['title'] + '</a></li>');
                });
            }
        });
    });
	
	 $('ul.txtcountry').on('mouseover', 'li a', function () {
		$('#txtSearch').val($(this).text());
    });
	
	//$("ul.txtcountry li a").hover(function(){ alert('i am called by hover');});
	
	//ul.txtcountry
    $('ul.txtcountry').on('click', 'li a', function () {
		
		//$( "#btn-xs-search" ).trigger( "click" );
		$( "#searchform__" ).submit();
		
        $('#txtSearch').val($(this).text());
    });
	
	
	
	
});

/*window.onload = function() {
 const myInput = document.getElementById('password');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}*/
//  $( "#btn-xs-search" ).trigger( "click" );

/********************************/
(function ($) {

  $.fn.rating = function () {

    var element;

    // A private function to highlight a star corresponding to a given value
    function _paintValue(ratingInput, value) {
      var selectedStar = $(ratingInput).find('[data-value=' + value + ']');
      selectedStar.removeClass('glyphicon-star-empty').addClass('glyphicon-star');
      selectedStar.prevAll('[data-value]').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
      selectedStar.nextAll('[data-value]').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
    }

    // A private function to remove the selected rating
    function _clearValue(ratingInput) {
      var self = $(ratingInput);
      self.find('[data-value]').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
      self.find('.rating-clear').hide();
      self.find('input').val('').trigger('change');
    }

    // Iterate and transform all selected inputs
    for (element = this.length - 1; element >= 0; element--) {

      var el, i, ratingInputs,
        originalInput = $(this[element]),
        max = originalInput.data('max') || 5,
        min = originalInput.data('min') || 0,
        clearable = originalInput.data('clearable') || null,
        stars = '';

      // HTML element construction
      for (i = min; i <= max; i++) {
        // Create <max> empty stars
        stars += ['<span class="glyphicon glyphicon-star-empty" data-value="', i, '"></span>'].join('');
      }
      // Add a clear link if clearable option is set
      if (clearable) {
        stars += [
          ' <a class="rating-clear" style="display:none;" href="javascript:void">',
          '<span class="glyphicon glyphicon-remove"></span> ',
          clearable,
          '</a>'].join('');
      }

      el = [
        // Rating widget is wrapped inside a div
        '<div class="rating-input">',
        stars,
        // Value will be hold in a hidden input with same name and id than original input so the form will still work
        '<input type="hidden" name="',
        originalInput.attr('name'),
        '" value="',
        originalInput.val(),
        '" id="',
        originalInput.attr('id'),
        '" />',
        '</div>'].join('');

      // Replace original inputs HTML with the new one
      originalInput.replaceWith(el);

    }

    // Give live to the newly generated widgets
    $('.rating-input')
      // Highlight stars on hovering
      .on('mouseenter', '[data-value]', function () {
        var self = $(this);
        _paintValue(self.closest('.rating-input'), self.data('value'));
      })
      // View current value while mouse is out
      .on('mouseleave', '[data-value]', function () {
        var self = $(this);
        var val = self.siblings('input').val();
        if (val) {
          _paintValue(self.closest('.rating-input'), val);
        } else {
          _clearValue(self.closest('.rating-input'));
        }
      })
      // Set the selected value to the hidden field
      .on('click', '[data-value]', function (e) {
        var self = $(this);
        var val = self.data('value');
        self.siblings('input').val(val).trigger('change');
        self.siblings('.rating-clear').show();
        e.preventDefault();
        false
      })
      // Remove value on clear
      .on('click', '.rating-clear', function (e) {
        _clearValue($(this).closest('.rating-input'));
        e.preventDefault();
        false
      })
      // Initialize view with default value
      .each(function () {
        var val = $(this).find('input').val();
        if (val) {
          _paintValue(this, val);
          $(this).find('.rating-clear').show();
        }
      });

  };

  // Auto apply conversion of number fields with class 'rating' into rating-fields
  $(function () {
    if ($('input.rating[type=number]').length > 0) {
      $('input.rating[type=number]').rating();
    }
  });

}(jQuery));

/*************************************/
// save ratingg

	
	
	/******************check for messages*******************/
	//var interval = 1000*10*1; 
	localStorage.clear();
//setInterval("checkMessages()",interval);
function checkMessages(){
	 $.ajax({
			type: "POST",
			url: "<?php echo base_url().'conversation/checkMessages'; ?>",
			dataType: 'JSON',
			success: function(data) {
			$('#loader').addClass('hidden');
            if (data.status == 1){ 
			if(data.unreadCounter>0){
				
				//if($('#messagesCounter>span').text()==''){
				$('#messagesCounter').html('<span class="badge">'+data.unreadCounter+'</span>');
				if(localStorage.getItem('sound')=== null)
				{
					var audio = new Audio('assets/sound.MP3');
					audio.play();
					$("#desktopNotification").html('<i class="fa fa-bell"></i><b>You have '+ data.unreadCounter+' unread messages</b>');
					$("#desktopNotification").show('slow');
				
				localStorage.setItem('sound',false);
				setTimeout(function(){
					$("#desktopNotification").hide('hide');
					},5000);
				}
				
				//}
				
			}
			$("#unreadCounter").text(data.unreadCounter);
            }
             else if (data.status ==0){  
			
             }
			
           }
	 });
}



$('#myModal').on('shown.bs.modal', function () {
  $('#video1')[0].play();
})
$('#myModal').on('hidden.bs.modal', function () {
  $('#video1')[0].pause();
})


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  
});

 $(document).on('click', function (event) {
  if (!$(event.target).closest('#searchform__').length) {
    $(".txtcountry").hide();
	$("#txtSearch").val('');
  }
  
   
  
  
});

$("#lastt").removeClass('active');
function resetNotify(id)
 {
  	 jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'home/resetnotification'; ?>',
			data:{'key':id},
			success: function(response)
			{
			   // don nothing
			}
		});	
		
 }
 
 
</script>
 <?php 
 if(!empty($this->session->userdata('userlogin')) and  !empty($this->session->userdata('user_id')))
  {
	  $getNotify = getNotify();
	  if(! empty($getNotify))
	  {
	 ?>	
			<script type="text/javascript" src="<?php echo base_url();?>assets/dist/js/jquery.amaran.js"></script>
            <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/amaran.min.css">
            <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/animate.min.css">
        <?php
		 echo $getNotify;
       }
  } 

?>
<style type="text/css">

#location-seller-Modal .model-header-message
{
	background: #f7f7f7;
	padding: 8px 0px 8px 10px;
	border-radius: 6px;
	border-bottom: 1px #e5e5e5 solid;
}



#location-seller-Modal .model-header-message h4
{
	font-size: 18px; 
 	text-align:left;
}

.container_class{
	width: 100%; 
}






.container_class aside strong{font-size: 12px;



padding-left: 12px;}



.container_class aside figure{background: #fff;



border-radius: 85px;



margin-bottom: 9px;



height: 140px;}

.container_class aside figure img{border-radius: 50px;



margin: 20px 0px 0px 25px;



width: 99px;



height: 100px;



border: 4px solid #ddd;}

.seller-name{margin: 0px;



text-align: center;



font-size: 12px;}

.seller-status{font-size: 12px;



text-align: center;



color: #01c73d;



margin-bottom: 0px;}

.clear{ clear:both;}

#location-seller-Modal .controls {

height: 50px;



line-height: 50px;

padding: 0 20px;

width: inherit;

border-top: 1px solid #ddd; 

}



#location-seller-Modal  .modal-content{padding:0px;}




#location-seller-Modal  .modal-footer{ border-top:0px !important;}

#location-seller-Modal  .empty{border:1px solid #ddd; }






.seller-info-section{margin-top: 18px;}



.local-time-seller span{

	color: #b2b2b2;

	font-size: 13px;

}

.local-time-seller small{
	color: #ddd; 
}
.box11{
 font-weight:bold;}
.box11 .fa-arrow-right { float: right;
color: #11b719;
line-height: 21px;
font-size: 19px;}
.box11 .fa-arrow-down {
font-size: 35px;
}

.b1{

    padding:20px 10px 20px 59px;
    font-size: 15px;}
.b2{padding:20px 0px 20px 0px;



font-size: 15px;}
.b3{padding: 20px 14px 20px 10px;

font-size: 15px;}
.box112{ text-align:center; 
font-size: 35px;}
.box112 .fa-arrow-down {
  
  color:#11b719;
  font-weight:bold;

}

.btnloc{font-weight: bold !important;width: 117% !important;}
.object {
  animation: MoveUpDown 1s linear infinite;
  position: absolute;
  /*left: 0;
  bottom: 0;*/
}

@keyframes MoveUpDown {
  0%, 100% {
    top: 0;
  }
  50% {
    top: 10px;
  }
}
.seller-info-section p {  font-size:12px;}
</style>
</div>

<div id="location-seller-Modal" class="modal fade " role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header model-header-message">

      <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->

        <h4 class="modal-title"><i class="fa fa-map-marker" aria-hidden="true">  </i> Plese Update Your Location 
</h4>

      </div>

      <div class="modal-body">

         <div class="container container_class">

          <div class="col-md-12">

             <div class="seller-detail-sec">

             <div class="seller-info-section">
              	   <p>Choose your closest location by following simple steps to able to hire by your native/hometown Buyers.</p>
						<div class="col-md-12">
                            <div class="col-md-5 box11 b1">
                            Edit Your Profile
                            <i class="fa fa-arrow-right "></i>
                            </div>
                            <div class="col-md-4 box11 b2">
                            Search Your location
                            <i class="fa fa-arrow-right"></i>
                            </div>
                            <div class="col-md-3 box11 b3">
                            Add & Submit
                            </div>
                         </div>
                        
                        <div class="col-md-12">
                         <div class="col-md-3 box112">
                          
                           
                         </div>
                         
                         <div class="col-md-6  box112">
                           <i class="fa fa-arrow-down object"></i>
                           <p>&nbsp;</p>
                           <p>&nbsp;</p>
                          <?php $username = get_id_by_key('username','id',$this->session->userdata('user_id'),'users');?>
                           <a href="<?php echo base_url();?>user/profile/<?php echo $username;?>" class="btn btn-small btn-success btnloc"> 
                           Visit Profile Page Now
                           <i class="fa fa-arrow-right"></i></a>
                         
                         </div>
                          <div class="col-md-3 box112">
                          
                         </div>
                        </div>
 					 
                    </div>
				</div>

          </div>

           

         </div>

       

       

      </div>

      <div class="modal-footer">

        

      </div>

    </div>



  </div>

</div>

 <?php
if(!empty($this->session->userdata('userlogin')) and  !empty($this->session->userdata('user_id'))):
     
	 $aUsertype = get_id_by_key('latitude,longitude','id',$this->session->userdata('user_id'),'users',true);  
	 
	 if (strpos($_SERVER['REQUEST_URI'], 'profile') != true):
	   
	   if( (($aUsertype->latitude==0) or ($aUsertype->longitude==0)) ):
	 ?>
		<script type="text/javascript">
			$(document).ready(function(e){
				$('#location-seller-Modal').modal({
					backdrop: 'static',
					keyboard: false
				});
				$('#location-seller-Modal').modal('show');		 
			});
        </script>
	<?php 
	   endif; 
	 endif; 
endif;
		
?>
</body>
</html>
