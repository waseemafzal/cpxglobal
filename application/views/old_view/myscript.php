<script>

/***************************************************************************************/



$(document).ready(function(){

 
/**toggle***/
	
	$( "#g_info" ).click(function() {
		$( ".g_info_content" ).toggle( "slow", function() 
		{
		
		});
	});
	$( "#g_education" ).click(function() {
		$( ".g_education_content" ).toggle( "slow", function() 
		{
		
		});
	});
	$( "#g_social" ).click(function() {
		$( ".g_social_content" ).toggle( "slow", function() 
		{
		
		});
	});
	
	$( "#g_experience" ).click(function() {
		$( ".g_experience_content" ).toggle( "slow", function() 
		{
		
		});
	});
	$( "#g_skills" ).click(function() {
		$( ".g_skills_content" ).toggle( "slow", function() 
		{
		
		});
	});
   
   
   $('#forgot_tab_back').on("click",function(e) {

		e.preventDefault();

		$("#login").addClass('in active');

		$("#forgot_tab").removeClass('in active');

		$("#register").removeClass('in active');

		//$("#login").removeClass('in active');

		return false;

  }); 
   
   
   
  /**toggle***/ 

   $('#form_user').on("submit",function(e) {

		e.preventDefault();

		create_user();

		return false;
 });	
 
 
  $('#formusersignup_56_d4d352csfs83_4').on("submit",function(e) {

		e.preventDefault();

		createuserregular();

		return false;
 });	
// formusersignup_56_d4d352csfs83_4
   
    $('#formuserloggedin_56_dsadad443').on("submit",function(e) {

		e.preventDefault();

		loggedinuserpage();

		return false;

		

   });
   
   

   $('#form_user_loggedin').on("submit",function(e) {

		e.preventDefault();

		loggedin_user();

		return false;

		

   });
  
   $('#form_user_forgot_67676r_39892hfh').on("submit",function(e) {

		e.preventDefault();

		forgotuserpage();

		return false;

		

   });
  
  
   $('#form_user_forgot').on("submit",function(e) {

		e.preventDefault();

		forgot_user();

		return false;

		

   });

   $('#forgot_password').on("click",function(e) {

		e.preventDefault();

		$("#forgot_tab").addClass('in active');

		$("#register").removeClass('in active');

		$("#login").removeClass('in active');

		return false;

  }); 

		$(".btl").click(function (){
		
			$(".login-plane-sec .panel-title").html('Login Panel');
			$("#formuserloggedin_56_dsadad443").slideDown();  
			$("#form_user_forgot_67676r_39892hfh").slideUp(); 
			$("#formusersignup_56_d4d352csfs83_4").slideUp(); 
		
		})
		
		$(".fpb").click(function (){
			$(".login-plane-sec .panel-title").html('Reset Password Panel');
			$("#formuserloggedin_56_dsadad443").slideUp();  
			$("#form_user_forgot_67676r_39892hfh").slideDown(); 
			$("#formusersignup_56_d4d352csfs83_4").slideUp(); 
		
		})

        $(".signbbtn").click(function (){
			$(".login-plane-sec .panel-title").html('Registration Panel');
			$("#formuserloggedin_56_dsadad443").slideUp();  
			$("#form_user_forgot_67676r_39892hfh").slideUp(); 
			$("#formusersignup_56_d4d352csfs83_4").slideDown(); 
		
		})

  

  
   $(".categoryfreelancerbtn").click(function(){
	   
	  
	  $(".categoryfreelancerbtn").prop('disabled',true);
	  category_create('freelancer_create');  
   })
   
   
    $(".make-an-offer").click(function(){
	  $('.make-an-offer').prop('disabled',true);   
	  $(".errclas").html('');
	  place_customise_order();  
   })
   
    $(".btn-bankinfo_ps").click(function(){
	  $('.btn-bankinfo_ps').prop('disabled',true);
	  //$(".errclas").html('');
	  store_paysatcksetting();  
   })
   

    


    $(".make-an-offer-input-confirmation").click(function()
	{
		$(".errclas").html('');
		$(".make-an-offer-input-confirmation-box").slideDown('slow');
		$(".make-an-offer-input-confirmation").slideUp('slow');
	})
   
    
	
	 $(".place-your-customiseorder").click(function(){
		 $('.place-customise-order-class').modal('show');	
	})
	 $(".make-an-offer-cancel ").click(function(){
		  $(".errclas").html('');
		 $('.place-customise-order-class').modal('hide');	
	})
	
	
   
   $(".jobseekercreateprofile").click(function(){
	   
	
	   $(".jobseekercreateprofile").prop('disabled',true);
	   jobseeker_create();  
   })
   



/*$('select[name=usercategory]').on("change",function(e) 

	{

		

		$("#categorysavebtn").removeAttr('onclick');

		if($(this).val() =='freelancer')

		{

			$('#usercategoryModal .freelancer').show();

			$("#usercategoryModal .modal-title").html('Freelancer additional Information');

			$('#usercategoryModal').modal('show');

			setTimeout(function(){

				CKEDITOR.replace('editor1')

			},1000);

			

			$("#categorysavebtn").attr('onclick','category_create("freelancer_create")');

			

			

		}

		return false;

   });*/

    $('#educationsave').on("click",function(e) 

	 {

		e.preventDefault(); 

		

		$("#educationsave").html('save');

        education_create();

     }

	); 

	

	$('#certificatesave').on("click",function(e) 

	 {

		e.preventDefault(); 
		certificate_create();

     }

	); 

	$('#quickrequest').on("click",function(e) 

	 {

		e.preventDefault(); 
		quickrequest();

     }

	); 
	$('#buyerrequest').on("click",function(e) 

	 {

		e.preventDefault(); 
		buyerrequest();

     }

	); 
	

	$('input[id=certificate_file],input[id=require_doc]').on("change",function(e) 

	{

		$("#file_check").val(1);
		return false;

   });
   
   
   
   
  $('#freelancer_create input[id=usernamefree]').on("blur",function(e) 
	{
		if($(this).val() !='')
		{
			checkexistence( $(this).val());
		}
		return false;
   });
   
    $('#jobseekercreateprofile input[id=usernamefree]').on("blur",function(e) 
	{
		if($(this).val() !='')
		{
			checkexistencejobseekruser( $(this).val());
		}
		return false;
   });
   
   
    $('#ACTIVE .active_action,#UNAPPROVED .active_action,#PENDING .active_action').on('click','a', function () {
	   
	  //alert('herererr');
	   var casei = $(this).html(); 
	   var counter  = $(this).attr('id');
	   
	   removebuyerpostedrequest(counter, $(this).attr('class'),1);
	   
   }); 
   
         
   $('#WAITINGFORAPROVAL .service_active_action,#INACTIVE .service_active_action,#ACTIVE .service_active_action').on('click','a', function () {
	   
	   var casei = $(this).html(); 
	   var counter  = $(this).attr('id');
	   var casehtml = $("#"+counter).html();
	   selleraction(counter, $(this).attr('class'),casehtml);
	   
   }); 
   
   
          
   $('#Manageorder .buyer-order-action').on('click','a', function () {
	   
	   var casei = $(this).html(); 
	   var counter  = $(this).attr('id');
	  // var casehtml = $("#"+counter).html();
	   ochnagestatus(counter, $(this).attr('class'));
	   
   }); 
   
    $('#Manageorder_1 .buyer-order-action').on('click','a', function () {
	   
	   var casei = $(this).html(); 
	   var counter  = $(this).attr('id');
	  // var casehtml = $("#"+counter).html();
	   ochnagestatus(counter, $(this).attr('class'));
	   
   });  
   
    $('#manage-offers .request_active_action').on('click','a', function () {
	   
	   var casei = $(this).html(); 
	   var counter  = $(this).attr('id');
	   var casehtml = $("#"+counter).html();
	   buyeraction(counter, $(this).attr('class'),1);
	   
   }); 
   
   
   $('#buyerrequests').on('click','#remove-requsid', function () {
	   
	   var attrclass  = $(this).attr('class');
	   var counter  = $(this).attr('data-id');
	   if(attrclass !='')
	   {
	   	selleractionforrequest(attrclass,counter );
	   }
   }); 
   
   
   $("#price-ranges").on('click','input',function(){
	   
		var pricerange = $(this).val();
		var currentVal = $(this).attr('class');
		if(!$(this).is(':checked'))
		{
		  pricerange = '-1';
		}
		else
		{
			for(var i=1; i<=5; i++){
				document.getElementById("compensation_"+i).checked=false; 
				if(currentVal==i)
				{
					document.getElementById("compensation_"+i).checked=true; 
				
				}
			}
		 
		 }
				
			var catgeoresfiltervar = '-1';
			var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
				return $(this).val();
			}).get(); // <----
			
			
			
			
			if(catgeoresfilter!='')
			{
				catgeoresfiltervar = catgeoresfilter;	
			}
			
			var locationsfiltervar = '-1';
			var locationsfilter =  chooselocationlevel(); //$("#locations-filter #city_id").val();
			
			if(locationsfilter!='')
			{
				locationsfiltervar = locationsfilter;	
			}
			var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
			}).get();
			var shiftfiltervar ='-1';
			if(shiftfilter!='')
			{
				shiftfiltervar = shiftfilter;
			}
			
			
			var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
			}).get();
			var statusfiltervar ='-1';
			if(statusfilter!='')
			{
				statusfiltervar = statusfilter;
			}
			var radius_range = $("#radius_range").val();
			//alert('radius_range'+radius_range);
			get_filter_service( catgeoresfiltervar,pricerange,locationsfiltervar,shiftfiltervar,statusfiltervar,radius_range);
			
		 });
   
     
	 $("#categories-filter").on('click','input',function(){
   
       var pricerange = $("#price-ranges input:checkbox:checked").val();
	   var pricefilter = '-1';
	   if(pricerange!='' && pricerange!='undefined')
	   {
		  var pricefilter = pricerange;  
	   }
		
		var acatgeoresfilter = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		
		
		/*var locationsfilter = $("#locations-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); //*/
	   var locationsfilter =  chooselocationlevel(); //$("#locations-filter #city_id").val();
		
	   var locationsfiltervar = '-1';
	   if(locationsfilter!='')
	   {
		   locationsfiltervar = locationsfilter;  
	   }
		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get();
		var shiftfiltervar ='-1';
		if(shiftfilter!='')
		{
		 shiftfiltervar = shiftfilter;
		}
		
		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get();
		var statusfiltervar ='-1';
		if(statusfilter!='')
		{
			statusfiltervar = statusfilter;
		}
		
		var radius_range = $("#radius_range").val();
		get_filter_service(catgeoresfilter,pricefilter,locationsfiltervar,shiftfiltervar,statusfiltervar,radius_range);
    });
	
	
	// $("#locations-filter").on('change','#city_id',function(){
	 $("#locations-filter").on('change','select',function(){
		 
		 
		// alert(chooselocationlevel());
		// return false;	
		var locationsfilter =  chooselocationlevel() ; 
		
		//var locationsfilter = $(this).val() ;
		
		var pricerange = $("#price-ranges input:checkbox:checked").val();
		var pricefilter = '-1';
		if(pricerange!='')
		{
			var pricefilter = pricerange;  
		}
		
		
		var catgeoresfiltervar = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		if(catgeoresfilter!='')
		{
		 catgeoresfiltervar = catgeoresfilter;	
		}
		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get();
		var shiftfiltervar ='-1';
		if(shiftfilter!='')
		{
		 shiftfiltervar = shiftfilter;
		}
		
		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
			}).get();
			var statusfiltervar ='-1';
			if(statusfilter!='')
			{
				statusfiltervar = statusfilter;
			}
		var radius_range = $("#radius_range").val();
	   get_filter_service(catgeoresfiltervar,pricefilter,locationsfilter,shiftfiltervar,statusfiltervar,radius_range);
    });
	
	
	/* $("#locations-filter").on('click','input',function(){
		
		
		var locationsfilter = $("#locations-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); //
		
		var pricerange = $("#price-ranges input:checkbox:checked").val();
		var pricefilter = '-1';
		if(pricerange!='')
		{
			var pricefilter = pricerange;  
		}
		
		
		var catgeoresfiltervar = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		if(catgeoresfilter!='')
		{
		 catgeoresfiltervar = catgeoresfilter;	
		}
		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get();
		var shiftfiltervar ='-1';
		if(shiftfilter!='')
		{
		 shiftfiltervar = shiftfilter;
		}
		
		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
			}).get();
			var statusfiltervar ='-1';
			if(statusfilter!='')
			{
				statusfiltervar = statusfilter;
			}
		
	   get_filter_service(catgeoresfiltervar,pricefilter,locationsfilter,shiftfiltervar,statusfiltervar);
    });*/
	 
	 $("#shift-filter").on('click','input',function(){
		
		
		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); 
		
		
		/*var locationsfilter = $("#locations-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); //*/
		
		var locationsfilter =  chooselocationlevel(); //$("#locations-filter #city_id").val();
		
		var locationsfiltervar='-1';
		if(locationsfilter!='')
		{
		 locationsfiltervar = locationsfilter;	
		}
		
		var pricerange = $("#price-ranges input:checkbox:checked").val();
		var pricefilter = '-1';
		if(pricerange!='')
		{
			var pricefilter = pricerange;  
		}
		
		
		var catgeoresfiltervar = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		if(catgeoresfilter!='')
		{
		 catgeoresfiltervar = catgeoresfilter;	
		}
	    
		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
			}).get();
			var statusfiltervar ='-1';
			if(statusfilter!='')
			{
				statusfiltervar = statusfilter;
			}
		
		  var radius_range = $("#radius_range").val();
	
	   get_filter_service(catgeoresfiltervar,pricefilter,locationsfiltervar,shiftfilter,statusfiltervar,radius_range);
    });
	
	 $("#status-filter").on('click','input',function(){
		
		
		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); 
		
		
		/*var locationsfilter = $("#locations-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get(); //
		*/
		var locationsfilter =  chooselocationlevel(); //$("#locations-filter #city_id").val();
		
		var locationsfiltervar='-1';
		if(locationsfilter!='')
		{
		 locationsfiltervar = locationsfilter;	
		}
		
		var pricerange = $("#price-ranges input:checkbox:checked").val();
		var pricefilter = '-1';
		if(pricerange!='')
		{
			var pricefilter = pricerange;  
		}
		
		
		var catgeoresfiltervar = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		if(catgeoresfilter!='')
		{
		 catgeoresfiltervar = catgeoresfilter;	
		}
	    
		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get();
		var shiftfiltervar ='-1';
		if(shiftfilter!='')
		{
		 shiftfiltervar = shiftfilter;
		}
	   var radius_range = $("#radius_range").val();
	   get_filter_service(catgeoresfiltervar,pricefilter,locationsfiltervar,shiftfiltervar,statusfilter,radius_range);
    });
	
	  $(".btn-byname-search").click(function(){
	 
	   if($("#textsearchbyname").val()!='')
	   {
			var textfieldbyname = $("#textsearchbyname").val();  
			var catgeoresfilter ='-1';
			var pricerange ='-1';
			var locationsfilter ='-1';
			var shiftfiltervar   ='-1';
			var statusfilter   ='-1';
			var radius_range   ='-1';
			get_filter_service(catgeoresfilter,pricerange,locationsfilter,shiftfiltervar,statusfilter,radius_range,textfieldbyname);
	   }
	   
   })
	
	 $("#radius_range").click(function()
	 {
		var radius_range = $(this).val();
			
		var pricerange = $("#price-ranges input:checkbox:checked").val();
		var pricefilter = '-1';
		//alert('pricerange'+pricerange);
		if(pricerange!='' && pricerange!='undefined')
		{
			var pricefilter = pricerange;  
		}
		
		var locationsfiltervar = '-1';
		var locationsfilter =  chooselocationlevel(); //$("#locations-filter #city_id").val();
		
		if(locationsfilter!='')
		{
			locationsfiltervar = locationsfilter;	
		}


		var shiftfilter = $("#shift-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get();
		var shiftfiltervar ='-1';
		if(shiftfilter!='')
		{
			shiftfiltervar = shiftfilter;
		}


		var statusfilter = $("#status-filter input:checkbox:checked").map(function(){
			return $(this).val();
		}).get();
		var statusfiltervar ='-1';
		if(statusfilter!='')
		{
			statusfiltervar = statusfilter;
		}

		
		var catgeoresfiltervar = '-1';
		var catgeoresfilter = $("#categories-filter input:checkbox:checked").map(function(){
		return $(this).val();
		}).get(); // <----
		if(catgeoresfilter!='')
		{
		 catgeoresfiltervar = catgeoresfilter;	
		}
	   var textfieldbyname='';
	   	get_filter_service(catgeoresfilter,pricerange,locationsfilter,shiftfiltervar,statusfilter,radius_range,textfieldbyname); 
	 })
	 
	
/************************** edit user ***********************************/
   function chooselocationlevel()
   {
		var filterlocationval = '-1' ;
		var stringconcator= '--'
		if($("#locations-filter #city_id").val()!=null  && $("#locations-filter #city_id").val()!="")
		{
		 // alert('in city');
		  filterlocationval = 'cityid'+stringconcator + $("#locations-filter #city_id").val();
		 	 
		}
		else
		if($("#locations-filter #state_id").val()!=null && $("#locations-filter #state_id").val()!="")
		{
			//alert('in state');
			filterlocationval = 'stateid'+stringconcator + $("#locations-filter #state_id").val(); 	
		}
		else
			if($("#locations-filter #country_id").val()!=null && $("#locations-filter #country_id").val()!="")
			{
				//alert('in country');
			  filterlocationval = 'countryid'+stringconcator + $("#locations-filter #country_id").val();
			}
		
		return filterlocationval;
	 //return false;
	}
   
   
   
   
   
   
   
   function get_filter_service(catgeoresfilter,pricerange,locationsfilter,shiftfiltervar,statusfilter,radiusrange,textfbyname='')
   {
	   <?php 
	    $s= '';
	    if(isset($_GET['s']) AND !empty($_GET['s']))
		{
		 $s = '?s='.urlencode($_GET['s']);	
		}
		
	   
	   ?>
	   NProgress.start();
		jQuery.ajax({
			method:"GET",    
			url :'<?php echo base_url().'Freelancers/servicefilteration'.$s; ?>',
			data:{'pricerange':pricerange,'categoryfilter':catgeoresfilter,'locationsfilter':locationsfilter,'shiftfiltervar':shiftfiltervar
			,'statusfilter':statusfilter,'radiusrange':radiusrange,'textfbyname':textfbyname}, 
			success: function(response)
			{
			 //alert(response);	
				NProgress.done();
				if(response!='' && response==2 )
				{ 
					$("#services_list").html( '<h2 class="title">TOP RATED SELLERS</h2><p class="ntt">No data found against your search creiteria.</p>' );
				}
				else
				{
					 $("#services_list").html( response );
				}
			}
		});	
	}
   
   
   
  	function place_customise_order()
	{ 
               
			   $(".cus_order_loader").show();
			    $('#freelancer_create input[id=usernamefree]').removeClass('borderred'); 
				var key = $("input[name='nonocekey____']").val();
				var p =   $('.make-an-offer-input-confirmation-box input[name="custom-service-price"]').val();
				var d =   $('.make-an-offer-input-confirmation-box select[name="serviceduration"]').val();
			
				 var msg='';
				 if(isNaN(p))
				 {
						msg ='Enter only integer value';
						$(".errclas").html(msg);
							
						$('#loader').addClass('hidden');
						$('.make-an-offer').prop('disabled',false); 
					 $(".cus_order_loader").hide();
						return false; 
					 
				}else
				if(p=='')
				{
					//alert('Enter number only allowed.');
					msg ='Price Field can\'t be empty.';
					$(".errclas").html(msg);
						
					$('#loader').addClass('hidden');
				     $('.make-an-offer').prop('disabled',false); 
					 $(".cus_order_loader").hide();
					 
				    return false;
				}else
				if(p < 1)
				{
					//alert('Enter number only allowed.');
					msg ='Price can\'t be less then one';
					$(".errclas").html(msg);
					
					$('#loader').addClass('hidden');	
				     $('.make-an-offer').prop('disabled',false); 
					 $(".cus_order_loader").hide();
					 
				    return false;
				}
				if(d=='')
				{
				//alert('Enter number only allowed.');
					msg ='Work duration can\'t be empty. ';
					$(".errclas").html(msg);
					
					$('#loader').addClass('hidden');
					  $('.make-an-offer').prop('disabled',false); 
					  $(".cus_order_loader").hide();
				  
				    return false;
				}
	  
	 	var post_url;  
		var formData = new FormData();
		post_url = '<?php echo base_url().'orders/savecustomorder';?>'; 
		var other_data = $('.customise_custom_form').serializeArray();

			$.each(other_data,function(key,input)

			{

				formData.append(input.name,input.value);

			}
		);  
         formData.append("key", key);
	   
	   $.ajax({



			url: post_url,
			type: 'POST',
			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() 

			{

				$('#loader').removeClass('hidden');

			},
 		   
			success: function(data) {
				$(".cus_order_loader").hide();
			$('#loader').addClass('hidden');
			$(".page-alert").removeClass('error');
			$(".page-alert").removeClass('success');
			$('.make-an-offer').prop('disabled',false); 
			if (data.status ==0)
			{  
				showAlert(data.message,title='Error','red');
				return false;
			}
			else if (data.status ==3)
			{  
				window.location='<?php echo base_url().'orders/customiseorder/'; ?>'+data.message;
			}
			else if (data.status == "validation_error")
			{    
			   showAlert(data.message,title='Error','red');
			   return false;
			}
	 	  }
	  });
    }
   
  
     
	function store_paysatcksetting()
	{ 
              
			    $(".ps_setting_l").show();
			    var account_name =   $('#paysatcksetting_nonce__313_FS000_cvghiop input[name="account_name"]').val();
				var bank_name =   $('#paysatcksetting_nonce__313_FS000_cvghiop select[name="bank_name"]').val();
				var bank_code =   $('#paysatcksetting_nonce__313_FS000_cvghiop input[name="bank_code"]').val();
				var bank_account_no =   $('#paysatcksetting_nonce__313_FS000_cvghiop input[name="bank_account_no"]').val();
			
				var msg='';
				
				if((account_name=='') || (bank_name=='') || (bank_code=='') || (bank_account_no==''))
				{
					//alert('Enter number only allowed.');
					msg ='All Fields are Required!';
					$(".errclas").html(msg);
					$('.btn-bankinfo_ps').prop('disabled',false); 
					return false;
				}
				
	    $(".errclas").html('');
	 	var post_url;  
		var formData = new FormData();
		post_url = '<?php echo base_url().'Freelancers/psbanksetting';?>'; 
		var other_data = $('#paysatcksetting_nonce__313_FS000_cvghiop').serializeArray();

			$.each(other_data,function(key,input)

			{

				formData.append(input.name,input.value);

			}
		);  
         
	   
	   $.ajax({



			url: post_url,
			type: 'POST',
			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() 

			{

				$('#loader').removeClass('hidden');

			},
 		   
			success: function(data) {
				//$(".cus_order_loader").hide();
			$('#loader').addClass('hidden');
			$(".page-alert").removeClass('error');
			$(".page-alert").removeClass('success');
			
			$('.btn-bankinfo_ps').prop('disabled',false); 
			if (data.status ==0)
			{  
				showAlert(data.message,title='Error','red');
				return false;
			}
			else
			{
				if (data.status ==1)
				{  
					showAlert(data.message,title='Success','green');
					return false;
				}	
			}
			
	 	  }
	  });
    } 
	 
	 
   
   function disable(elem,mode)
   {
	 $(elem).prop('disabled',mode);   
   }
   
   
   
    function selleractionforrequest(attrclass,counter)
   {
	 
	 
	  $("#loader"+counter).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'seller/removebuyerrequest'; ?>',
				data:{'attrclass':attrclass},
				success: function(response){
						if(response=='1')
						{ 
							$("#loader"+counter).html('');
							$("#tr"+counter).hide('slow');
							
						}
				}
			});	
	 
	 
   }
   
   
   
   
    function removebuyerpostedrequest(counter,attrclass,casehtml)
   {
	
	 if(casehtml ==1)
	 {
		
		if(confirm('Do you really want to remove this Posted Request.?'))
		{
			$("#loader"+counter).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			jQuery.ajax({
			method:"POST",    
			url :'<?php echo base_url().'buyer/removesbuyerpostedrequest'; ?>',
			data:{'attrclass':attrclass},
			success: function(response){
				
				if(response==1)
				{ 
					$("#loader"+counter).html('');
					$("#tr_"+counter).hide('slow');
				}
			}
		});	
		}	
	 }
   }
  
   
   
   function buyeraction(counter,attrclass,casehtml)
   {
	
	 if(casehtml ==1)
	 {
		
		if(confirm('Do you really want to remove this Request.?'))
		{
			$("#loader"+counter).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'buyer/removesellerrequest'; ?>',
				data:{'attrclass':attrclass},
				success: function(response){
					if(response!='')
					{ 
						$("#loader"+counter).html('');
						$("#article-"+counter).hide('slow');
					}
				}
			});	
		}
	 }
   }
  
  
  
  function ochnagestatus(counter,attrclass)
   {
		   $("#loader"+counter).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
		 
				jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'buyer/ostatusc__'; ?>',
				data:{'attrclass':attrclass},
				success: function(response){
					if(response==1)
					{ 
						$("#loader"+counter).html('');
						location.reload();
						
					}
				}
			});	
			
		
   }
  
  
  
  
   function selleraction(counter,attrclass,casehtml)
   {
	 if(casehtml =='Delete')
	 {
	 if(confirm('Do you really want to remove this services.?')){
	  $("#loader"+counter).html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'seller/removesellerservice'; ?>',
				data:{'attrclass':attrclass},
				success: function(response){
						if(response==1)
						{ 
							$("#loader"+counter).html('');
							$("#tr_"+counter).hide('slow');
						}
					  
					  
					
				}
			});	
	 }
	 }
   }
   
   
   
   
   
 	function eidt_user(){



	//alert(id);



    $.ajax({



        url: "<?php echo base_url().'auth/get_user'; ?>",



        type: 'POST',



		 data: {email: $('#email').val(),password:$('#password').val(),



		 first_name:$('#first_name').val(),



		 last_name:$('#last_name').val()



		 },



		 beforeSend: function() {



    $('#loader').show();



  },



        success: function(response) {



            if (response == 'success')



            {   



			 $('#loader').hide();



				//show success message



				//$('#signup').removeClass("in");



				$('#loading').html("");



				 $('#submit').show();



				$('body').addClass("modal-open");



				$('#success').addClass("in");



				$("#success").css("display", "block");



				$("#success" ).attr( "aria-hidden", "true" );



				$('#success').delay(5000).fadeOut('slow');



				$('body').delay(5000).removeClass('modal-open');



				$(".modal-header").css("border-bottom", "0px");	



				$('.modal-backdrop').removeClass("in");			



				//$('#ErrorMessage').delay(5000).fadeOut('slow');



					$('#registerForm').find("input[type=text],input[type=email],input[type=password], textarea").val("");



				



            }



           else if (response == 'error')



            {   



		



			$('#loading').html("");



			 $('#submit').show();



			$('#signup_error_div').html('Error ! Some thing went wrong');



			$('#signup_error_div').removeClass('hide');



			$('#signup_error_div').addClass('show');



			$('.alert').hide('slow');



            }



			else if (response == 'exist')



            {   



			$('#loading').html("");



				//Erorr  message



				$('.alert-warning').removeClass('hide');



				 $('#submit').show();



				$('.alert-warning').html('User Aleady Exist !');



            }else  



            {   



			 $('#submit').show();



			$('#loading').html("");



				$('.alert-warning').html(response);



			$('#signup_error_div').removeClass('hide');



			}

		  }

		});

	 }

  });

     

	 function getop(id,hint,returnid) {alert('in getop');}

	

		function get_options(id,hint,returnid) {

			

			//$("#state_id").html('');
			$("#city_id").html('');
			  //alert(returnid);
			  if(returnid=='state_id')
			  {
				  $(".state_loader").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');  
				  // $(".city_loader").html(''); 
				  $("#city_id").html('');
			  }
			  else
			  if(returnid=='city_id')
			  {
				// $(".state_loader").html(''); 
				 $(".city_loader").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');    
			  }
			  else
			  {
				 $("#state_id").html('');  
				  
			  }

		 	$.ajax({

				method:"POST",     

				url : '<?php echo base_url().'user/get_options'; ?>',

				data:{id:id,hint:hint},

				success: function(response){
                      //  alert(response);                  
				  $(".state_loader").html(''); 
				   $(".city_loader").html('');    
				$("#"+returnid).html(response);

			 }

		  });	 

		}

    function get_coordinates(value){

		if(value !='')
		 {

		 	$.ajax({

				method:"POST",     

				url : '<?php echo base_url().'user/extract_coordinates_detail'; ?>',

				data:{val:value},

				dataType: 'JSON',

				success: function(response)

				{

					if(response!='')

					{ 

						$(".map_loader").html('');
						//$("#street").val(response.street);
						//$("#postal_zip_code").val(response.postal_address);
						
						$("#lattitude_span").html(response.lat);
						$("#longitude_span").html(response.lng);
						$("#latitude").val(response.lat);
						$("#longitude").val(response.lng);
						//$("#formatted_address").val(response.formatted_address);
						//$("#location_type").val(response.location_type);
					}

				}

		    });	

		 } 

	 }

	 // 

	 function resetf(adata){

		 

		for(index = 0 ; index < adata.length; index++)

		{

			$("#education_form #"+adata[index]).val('');

		

		} 

     }
     
	 
	function buyerrequest()

	 {

		
      $("#buyerrequest").prop('disabled',true);	
		var post_url; 

		var formData = new FormData();

		post_url = '<?php echo base_url().'buyer/buyerrequest'; ?>'; 

		

		var other_data = $('#form-buyer-request').serializeArray();

			$.each(other_data,function(key,input)

			{

			

				formData.append(input.name,input.value);

			

			}

		);  
		
 		formData.append("require_doc", document.getElementById('require_doc').files[0]);	
		  
		$.ajax({

			url: post_url,

			type: 'POST',

			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() {

				$('#loader').removeClass('hidden');

			},

		

			 success: function(data) {

			$('#loader').addClass('hidden');

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');

			if (data.status == 1)

            {   

			    showAlert(data.message,'Success','green');
				setTimeout(function(){

				 window.location='<?php echo base_url(); ?>buyer/manageRequest';

				},2000);

			}

           else if (data.status ==0)

            {  
 				$("#buyerrequest").prop('disabled',false);	
				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			     showAlert(data.message,'Success','green');
				setTimeout(function(){

				   window.location='<?php echo base_url(); ?>buyer/manageRequest';

				},2000);

				//resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    
  				$("#buyerrequest").prop('disabled',false);	
			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

     

		

		

	}
	 
	 
	 
	 function quickrequest()

	 {

		

		var post_url; 

		var formData = new FormData();

		post_url = '<?php echo base_url().'buyer/quickrequest'; ?>'; 

		

		var other_data = $('#form-quick-request').serializeArray();

			$.each(other_data,function(key,input)

			{

			

				formData.append(input.name,input.value);

			

			}

		);  
		
		formData.append("require_doc", document.getElementById('require_doc').files[0]);
		  
		$.ajax({

			url: post_url,

			type: 'POST',

			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() {

				$('#loader').removeClass('hidden');

			},

			

			 success: function(data) {

			$('#loader').addClass('hidden');

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');

			if (data.status == 1)

            {   

			    showAlert(data.message,'Success','green');
				setTimeout(function(){

				  location.reload();

				},2000);

			}

           else if (data.status ==0)

            {  

				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				$("#education_form .h_nouncef").html('');

				//resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    

			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

     

		

		

	}
	 
	 

	  function certificate_create()

	 {

		

		var post_url; 

		var formData = new FormData();

		post_url = '<?php echo base_url().'user/certificatecreate'; ?>'; 

		

		var other_data = $('#certificate_form').serializeArray();

			$.each(other_data,function(key,input)

			{

			

				formData.append(input.name,input.value);

			

			}

		);  

		   formData.append("image", document.getElementById('certificate_file').files[0]);	

		   // var f_ = ['country','institute'];

			$.ajax({

			url: post_url,

			type: 'POST',

			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() {

				$('#loader').removeClass('hidden');

			},

			

			 success: function(data) {

			$('#loader').addClass('hidden');

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');

			if (data.status == 1)

            {   

			    showAlert(data.message,'Success','green');

				$("#certificate_form .cerlisting").html(data.htmlrow);

				//resetf( f_ );

				

			}

           else if (data.status ==0)

            {  

				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				$("#education_form .h_nouncef").html('');

				//resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    

			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

     

		

		

	}

	 
      function checkexistence(key) {
			  
			 $(".username_loader").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 $('#freelancer_create input[id=usernamefree]').removeClass('borderred'); 
			  jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'user/checkexistence'; ?>',
				data:{'key':key},
				success: function(response){
					 if(response==1){ 
					   $(".username_loader").html('User with this name already exist');
					  	$('#freelancer_create input[id=usernamefree]').addClass('borderred');
						$('#freelancer_create input[name=username]').val('');
						//get_watch_list_count();
					  }else{$(".username_loader").html(''); $('#freelancer_create input[id=usernamefree]').removeClass('borderred'); }
					  
					
				}
			});	 
		
		}
	
	  
	  function checkexistencejobseekruser(key) {
			  
			 $(".username_loader").html('<i class="fa fa-cog fa-spin" style="font-size:24px"></i>');
			 $('#jobseekercreateprofile input[id=usernamefree]').removeClass('borderred'); 
			  jQuery.ajax({
				method:"POST",    
				url :'<?php echo base_url().'jobseekers/checkexistence'; ?>',
				data:{'key':key},
				success: function(response){
					 if(response==1){ 
					   $(".username_loader").html('User with this name already exist');
					  	$('#jobseekercreateprofile input[id=usernamefree]').addClass('borderred');
						$('#jobseekercreateprofile input[name=user_name]').val('');
						//get_watch_list_count();
					  }else{$(".username_loader").html(''); $('#jobseekercreateprofile input[id=usernamefree]').removeClass('borderred'); }
					  
					
				}
			});	 
		
		}

	 

	 function education_create()

	 {

		

		var post_url; freelancer_create

		var formData = new FormData();

		post_url = '<?php echo base_url().'user/educationcreate'; ?>'; 

		

		var other_data = $('#education_form').serializeArray();

			$.each(other_data,function(key,input)

			{

			

				formData.append(input.name,input.value);

			

			}

		);  	

		    var f_ = ['country','institute','degree_title','from_year','to_year'];

			$.ajax({

			url: post_url,

			type: 'POST',

			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() {

				$('#loader').removeClass('hidden');

			},

			

			 success: function(data) {

			$('#loader').addClass('hidden');

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');

			if (data.status == 1)

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				resetf( f_ );

				

			}

           else if (data.status ==0)

            {  

				showAlert(data.message,title='Error','red');

				

            }

			else if (data.status == 2) 

            {   

			    showAlert(data.message,'Success','green');

				$("#education_form .edulisting").html(data.htmlrow);

				$("#education_form .h_nouncef").html('');

				resetf( f_ );

			}

			else if (data.status == "validation_error")

            {    

			    showAlert(data.message,title='Error','red');

			}

			

           }

			

		   });

    }

	 
   function forgot_user()
   {

		var formData = new FormData();
		var other_data = $('#form_user_forgot').serializeArray();
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		});   

        $('#loader').removeClass('hidden');

	    $.ajax({
		url: "<?php echo base_url().'auth/forgot'; ?>",
		type: 'POST',
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function(response) {
			$('#loader').addClass('hidden'); 
		if (response.status == 1)
		{   
			showAlert(response.message,'Success','green');
		}
		else if (response.status ==0)
		{  
			showAlert(response.message,'Error','red');
		}
		else
		{
			showAlert(response.message,'Error','red');

		}

        }
	 });
   }
	 
	 
	 
   function forgotuserpage()
   {
        
		
		var formData = new FormData();
		var other_data = $('#form_user_forgot_67676r_39892hfh').serializeArray();
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		});   

        $('#loader').removeClass('hidden');

	    $.ajax({
		url: "<?php echo base_url().'auth/forgot'; ?>",
		type: 'POST',
		data: formData,
		dataType: "json",
		processData: false,
		contentType: false,
		success: function(response) {
			$('#loader').addClass('hidden'); 
		if (response.status == 1)
		{   
			//showAlert(response.message,'Success','green');
			$("#form_user_forgot_67676r_39892hfh #msg_box").show();
			$("#form_user_forgot_67676r_39892hfh #msg_box").addClass('s_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").removeClass('r_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").html(response.message);
			
			 setTimeout(function(){
					 $("#form_user_forgot_67676r_39892hfh #msg_box").html('');
				},2000);
		}
		else if (response.status ==0)
		{  
			//showAlert(response.message,'Error','red');
			$("#form_user_forgot_67676r_39892hfh #msg_box").show();
			$("#form_user_forgot_67676r_39892hfh #msg_box").removeClass('s_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").addClass('r_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").html(response.message);
			setTimeout(function(){
					 $("#form_user_forgot_67676r_39892hfh #msg_box").html('');
				},2000);
		}
		else
		{
			//showAlert(response.message,'Error','red');
			$("#form_user_forgot_67676r_39892hfh #msg_box").show();
			$("#form_user_forgot_67676r_39892hfh #msg_box").removeClass('s_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").addClass('r_msg');
			$("#form_user_forgot_67676r_39892hfh #msg_box").html(response.message);
			setTimeout(function(){
					 $("#form_user_forgot_67676r_39892hfh #msg_box").html('');
				},2000);

		}

        }
	 });
   }
   
   
   
   
   
	function category_create(category_id)

	 {

		var post_url;
		var formData = new FormData();

		if(category_id =='freelancer_create')
		{

			post_url = '<?php echo base_url().'user/freelancercreate'; ?>'; 
			var other_data = $('#freelancer_create').serializeArray();

				$.each(other_data,function(key,input)

				{
					formData.append(input.name,input.value);
				}

			);  	
		}

			formData.append("identityfile", document.getElementById('identityFile').files[0]);
			description = CKEDITOR.instances.editor1.getData();
			formData.append("description", description);

			

			$.ajax({

			url: post_url,

			type: 'POST',

			data: formData,

			dataType: "json",

			processData: false,

			contentType: false,

			beforeSend: function() {

				$('#loader').removeClass('hidden');

			},

			

			 success: function(data) {

			$('#loader').addClass('hidden');

		//	$('#form_add_update .btn_au').removeClass('hidden');

			//alert(data.status);

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');
 			var redirection ;
            if (data.status == 1)

            {   
                   $(".categoryfreelancerbtn").prop('disabled',false);
			    showAlert(data.message,'Success','green');
                
				redirection = 'user/becomeafreelancer/';   
				if(data.data_user!='')
				{
					redirection = 'freelancers/'+data.data_user+'/';   
				}
			   
			   
				setTimeout(function(){

				  window.location='<?php echo base_url(); ?>'+redirection;

				},2000);

			}

           else if (data.status ==0)

            {  
				$(".categoryfreelancerbtn").prop('disabled',false);
				var msg = '<div class="message">'+data.message+'</div>';

				$(".page-alert").show();

				$(".page-alert").addClass('error');

				$(".page-alert").html(msg);

				$(".page-alert").focus();

				setTimeout(function(){

				$(".page-alert").fadeOut().html('');

				},10000);

            }

			else if (data.status == 2) // updated case

            {   
                $(".categoryfreelancerbtn").prop('disabled',false);
			    showAlert(data.message,'Success','green');
               
				redirection = 'user/becomeafreelancer/';   
				if(data.data_user!='')
				{
					redirection = 'freelancers/'+data.data_user+'/';   
				} 
				 
				 
				setTimeout(function(){

				 window.location='<?php echo base_url(); ?>'+redirection;

				},10000);

            }

			else if (data.status == "validation_error")

            {  
			
				$(".categoryfreelancerbtn").prop('disabled',false);
			    var msg = '<div class="message">'+data.message+'</div>';

				$(".page-alert").show();

				$(".page-alert").addClass('error');

				$(".page-alert").html(msg);
				
				setTimeout(function(){

					$(".page-alert").html('');
						$(".page-alert").removeClass('error');

				},10000);

				
				

			}

			

           }

			

		   });

     

		

		

	}

 
 
 
   
   function jobseeker_create()

	 {

		var post_url;
		var formData = new FormData();
		//if(category_id =='freelancer_create')
		//{
			post_url = '<?php echo base_url().'jobseekers/jobseekercreate'; ?>'; 
			var other_data = $('#jobseekercreateprofile').serializeArray();
				$.each(other_data,function(key,input)
				{
					formData.append(input.name,input.value);
				}
			);  	
		//}

			//formData.append("identityfile", document.getElementById('identityFile').files[0]);
			//description = CKEDITOR.instances.editor1.getData();
			//formData.append("description", description);

			$.ajax({
			url: post_url,
			type: 'POST',
			data: formData,
			dataType: "json",
			processData: false,
			contentType: false,
			beforeSend: function() {
				$('#loader').removeClass('hidden');
			},

			success: function(data) {
			$('#loader').addClass('hidden');
			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');
 			var redirection ;
            if (data.status == 1)
			{   
              
			  $(".jobseekercreateprofile").prop('disabled',false);
			    
				showAlert(data.message,'Success','green');
                redirection = 'jobseekers/jobseekercreateprofile';   
				setTimeout(function(){

				  window.location='<?php echo base_url(); ?>'+redirection;

				},2000);

			}

           else if (data.status ==0)

            {  
				$(".jobseekercreateprofile").prop('disabled',false);
				var msg = '<div class="message">'+data.message+'</div>';

				$(".page-alert").show();

				$(".page-alert").addClass('error');

				$(".page-alert").html(msg);

				$(".page-alert").focus();

				/*setTimeout(function(){

				$(".page-alert").fadeOut().html('');

				},10000);*/

            }

			else if (data.status == 2) // updated case

            {   
				$(".jobseekercreateprofile").prop('disabled',false);
				showAlert(data.message,'Success','green');
				redirection = 'jobseekers/jobseekercreateprofile';  
				setTimeout(function(){
				
					window.location='<?php echo base_url(); ?>'+redirection;
				
				},2000);

            }

			else if (data.status == "validation_error")

            {    
				$(".jobseekercreateprofile").prop('disabled',false);
			    var msg = '<div class="message">'+data.message+'</div>';
				showAlert(data.message,'Error','red');
			}

			

           }

			

		   });

     

		

		

	}
 



	function changeUserStatus(id,status,tblName){



				var rowid= "div_status_"+id;



				var status;



				var tblName;



				var changed;



				if(status==1){



					changed=0;



					}



	else{



		changed=1;



		}



    $.ajax({



        url: "<?php echo base_url().'auth/changeUserStatus'; ?>",



        type: 'POST',



		 data: {id:id,status:status,tblName:tblName},



		dataType : "json",



        success: function(response) {



		   if(response.chaged == true){



			var q="'";



			 if(response.status=="Inactive"){



				 mehtml = '<a href="javascript:void(0);" onclick="changeUserStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-danger">Suspended</span></a>';



				 }



				 else{



					 mehtml = '<a href="javascript:void(0);" onclick="changeUserStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-success">Active</span></a>';



					 }



			 



			 $("#"+rowid).html(mehtml);



			 



			   }



          



           }



	 });



	  } 



function changeStatus(id,status,tblName){



				var id;



				var rowid= "div_status_"+id;



				var status;



				var tblName;



				var changed;



				if(status==1){



					changed=0;



					}



	else{



		changed=1;



		}



    $.ajax({



        url: "<?php echo base_url().'crud/changeStatus'; ?>",



        type: 'POST',



		 data: {id:id,status:status,tblName:tblName},



		dataType : "json",



        success: function(response) {



		   if(response.chaged == true){



			var q="'";



			 if(response.status=="Inactive"){



				 mehtml = '<a href="javascript:void(0);" onclick="changeStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-danger">Inactive</span></a>';



				 }



				 else{



					 mehtml = '<a href="javascript:void(0);" onclick="changeStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-success">active</span></a>';



					 }



			 



			 $("#"+rowid).html(mehtml);



			 



			   }



          



           }



	 });



	 } 

function changeOrderStatus(id,status,tblName){



				var id;



				var rowid= "div_status_"+id;



				var status;



				var tblName;



				var changed;



				if(status==1){



					changed=0;



					}



	else{



		changed=1;



		}



    $.ajax({



        url: "<?php echo base_url().'crud/changeStatus'; ?>",



        type: 'POST',



		 data: {id:id,status:status,tblName:tblName},



		dataType : "json",



        success: function(response) {



		   if(response.chaged == true){



			var q="'";



			 if(response.status=="Inactive"){



				 mehtml = '<a href="javascript:void(0);" onclick="changeOrderStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-warning">Pending</span></a>';



				 }



				 else{



					 mehtml = '<a href="javascript:void(0);" onclick="changeOrderStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-success">Delivered</span></a>';



					 }



			 



			 $("#order_body #"+rowid).html(mehtml);



			 



			   }



          



           }



	 });



	 } 



function changeFieldStatus(id,status,tblName){



				var id;



				var rowid= "validated_div_status_"+id;



				var status;



				var tblName;



				var changed;



				if(status==1){



					changed=0;



					}



	else{



		changed=1;



		}



    $.ajax({



        url: "<?php echo base_url().'crud/changeFieldStatus'; ?>",



        type: 'POST',



		 data: {id:id,status:status,tblName:tblName},



		dataType : "json",



        success: function(response) {



		   if(response.chaged == true){



			var q="'";



			 if(response.status=="Inactive"){



				 mehtml = '<a href="javascript:void(0);" onclick="changeFieldStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-danger">NO</span></a>';



				 }



				 else{



					 mehtml = '<a href="javascript:void(0);" onclick="changeFieldStatus(\''+id+'\',\''+changed+'\',\''+tblName+'\')"><span class="label label-success">YES</span></a>';



					 }



			 



			 $("#"+rowid).html(mehtml);



			 



			   }



          



           }



	 });



	 } 



function get_view(view){



	



		$.ajax({



        url: view,



        type: 'GET',



		beforeSend: function() {



		$('#loader').show();



		$('.tooltip').hide();



		},



        success: function(response) {



			App.init();



		FormsComponents.init();



			setTimeout(function(){



				$('#loader').hide();



				



				},100);  



			setTimeout(function(){



				$('#loader').hide();



				$('.mce-notification').addClass('hidden');



				},500);  



				



					







			if (response.message == 1)



            {   



			$('#page-content').html(response);



			



			App.init();



            }



           else if (response.message ==0)



            {   



			showAlert('error');



            }



			else  



            {   



			$('#page-content').html(response);



				//alert(response);



			



            }



           }



	 });







	}



/*



| -------------------------------------------------------------------------



| Users.



| -------------------------------------------------------------------------



| All user functions.



*/		



function getUser(user_id){



$.ajax({



url : "<?php echo base_url().'auth/get_user'; ?>",



type: 'POST',



data: {id: user_id},



dataType: "json",



success: function(response) {



var user_type = response.user.user_type;



var admin_selectd='';



var member_selectd='';



if(user_type == <?php echo ADMIN_USER; ?> ){



admin_selectd='selected="selected"';



member_selectd='';



}



else {



member_selectd='selected="selected"';



admin_selectd='';



}



if (response.message == 1){  







//populate in  user field 	



$('#first_name').val(response.user.first_name);



$('#last_name').val(response.user.last_name);



$('#email').val(response.user.email);







$('#title').val(response.user.title);



$('#password').val('');



$('#user_id').val(response.user.id);



$('#phone').val(response.user.phone);



$('#mobile').val(response.user.mobile);



$('#start_date').val(response.user.start_date);



$('#end_date').val(response.user.end_date);



$('#specialty').val(response.user.specialty);



$('#licence').val(response.user.licence);



$('#web').val(response.user.web);



$('#twitter').val(response.user.twitter);



$('#url').val(response.user.url);



$('#fb').val(response.user.fb);



$('#images_div').html(response.img_data);



$('#qrcode_div').html(response.qrcodeData);







//alert(response.qrcodeData);



$('#id').val(response.user.id);







$('#user_type_hidden').val(user_type);



$("#user_type .user_type"+response.user.user_type).attr("selected","selected");



$("#city_id .city_id"+response.user.city_id).attr("selected","selected");







$("#cat_id"+response.parent_id).attr("selected","selected");



$("#sub_cat_divs").html(response.option1);



//$(".machine_type_"+response.user.machine_type).attr("selected","selected");







//	var str = response.user.data_to_be_gathered; // a string of checkboxes



// call fucntion to checked all checkbox on base of their values



//get_checkbox_checked(str); //e.g str ='filters_only,hydraulic_oils';



//populate in  user location



/*	$('#address').val(response.location.address);



$('#zipcode').val(response.location.zipcode);



$('#country').val(response.location.country);



$('#city').val(response.location.city);



$('#state').val(response.location.state);



*/







$('#edit_user_Modal').modal('show');



}



else if (response.message == 0)



{   alert('Error : Some thing went wrong');







}



else  



{   



alert('Error : Some thing went wrong');



}



}



});











}                             



function validateForm() {







var allLetters = /^[a-zA-Z,.]+$/;



var letter = /[a-zA-Z]/;



var number = /[0-9]/;







var firstName = document.form_update_user.first_name.value;



var last_name = document.form_update_user.last_name.value;



var email = document.form_update_user.email.value;



var password = document.form_update_user.password.value;







var invalid = [];







/* if (!allLetters.test(firstName)) {



invalid.push("First name must me letter<br>");



}







if (!allLetters.test(last_name)) {



invalid.push("Last Name must me letter<br>");



}



*/



/*if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") + 2 || email.lastIndexOf(".") + 2 >= email.length) {



invalid.push("Please provide valid email<br>");



}*/







if(password!=''){



if (password.length < 8 ) {



invalid.push("Password  minimum length must be 8 <br>");



}if (password.length < 8 || !letter.test(password) || !number.test(password)) {



invalid.push("Password  must be contain letter and numbers ");



}



}







if (invalid.length != 0) {



//  alert("Please provide response: \n" + invalid.join("\n"));







$.alert({



title: 'Validation!',



content: 'Please provide the following: <br>'+invalid,



btnClass: 'btn-primary',



});        return false;



}







return true;}







function validateProfile(type) {



var allLetters = /^[a-zA-Z]+$/;



var letter = /[a-zA-Z]/;



var number = /[0-9]/;







var name = $('#name').val();



var email = $('#email').val();



var mobile = $('#mobile').val();

if(type!='update'){

	var password =$('#password').val();

var password_confirm =$('#password_confirm').val();



	}



var invalid = [];







if (!letter.test(name)) {



invalid.push("Name must me letter<br>");



}



if (!number.test(mobile)) {



invalid.push("phone must me number<br>");



}



if (password != password_confirm) {



invalid.push("Password Mismatch<br>");



}















if (email.indexOf("@") < 1 || email.lastIndexOf(".") < email.indexOf("@") + 2 || email.lastIndexOf(".") + 2 >= email.length) {



invalid.push("Please provide valid email<br>");



}







if(password!=''){



if (password.length < 8 ) {



invalid.push("Password  minimum length must be 8 <br>");



}if (password.length < 8 || !letter.test(password) || !number.test(password)) {



invalid.push("Password  must be contain letter and numbers ");



}



}







if (invalid.length != 0) {



//  alert("Please provide response: \n" + invalid.join("\n"));







$.alert({



title: 'Validation!',



content: 'Please provide the following: <br>'+invalid,



btnClass: 'btn-primary',



});        return false;



}







return true;



}















	function updateUser(){



		



	if(!validateForm()){



	return false;



	}



	



	else{



		var inputFile = $('input#file');



		 var filesToUpload = inputFile[0].files;



		 var formData = new FormData();



		// make sure there is file(s) to upload



		if (filesToUpload.length > 0) {



			// provide the form data



			// that would be sent to sever through ajax



			for (var i = 0; i < filesToUpload.length; i++) {



				var file = filesToUpload[i];



				formData.append("file[]", file, file.name);				



			}



	}



	formData.append("qrcode", document.getElementById('qrcode').files[0]);







	var other_data = $('#form_update_user').serializeArray();



    $.each(other_data,function(key,input){



        formData.append(input.name,input.value);



    });   



	formData.append('id',$('#id').val());



	$.ajax({



	url: "<?php echo base_url().'auth/updateUser'; ?>",



	type: 'POST',



	data: formData,



	dataType: "json",



	processData: false,



	contentType: false,



	success: function(response) {



	//alert(response.user.user_type);



	if (response.status == 1)



		{   



		if($('#action').val()=='user_acc_update'){



		$('#infoMessage').addClass('alert-success').removeClass('hidden');



		$('#images_div').html(response.images);



		$('#add_images_wrap').addClass('hidden');



		$('#infoMessage').html(response.message);



		setTimeout(function(){



		$('#infoMessage').addClass('hidden');



		},3000);



		}



		else{



		$('#infoMessage').addClass('alert-success').removeClass('hidden');



		$('#infoMessage').html(response.message);



		setTimeout(function(){



			$('#infoMessage').addClass('hidden');



		$('#edit_user_Modal').modal('hide');



		$('#'+response.row_id).html(response.rowdata);



		$('tr').removeClass('just_edited');



		$('#'+response.row_id).addClass('just_edited');



		



		



		},1000);



		/*setTimeout(function(){



		$('#edit_user_Modal').modal('hide');



		var user_type = $('#user_type').val();



		//alert(user_type);



		if(user_type==0){



			get_view('<?php echo base_url(); ?>auth/view_users');



		}



		else{



			get_user_view(user_type);



		}



		},2000);*/



		}



		



		}



	else if (response.status ==0)



	{   



	$('#infoMessage').addClass('alert-danger').removeClass('hidden');



	$('#infoMessage').html(response.message);



	document.getElementById("qrcode").value = "";



	setTimeout(function(){



	$('#infoMessage').addClass('hidden');



	},3000);



	}



	else  



	{   



	



	$('#infoMessage').addClass('alert-success').removeClass('hidden');



	$('#infoMessage').html(response.message);



	



	



	}



	}



	});



	



	}



	



	}                             



	function updateProfile(){ 

		//e.preventDefault();	
	var formData = new FormData();
	var other_data = $('#form_profile').serializeArray();
	$.each(other_data,function(key,input){
	
		formData.append(input.name,input.value);
	});   
	
	formData.append("image", document.getElementById('imageprfofile').files[0]);
	formData.append("cnic", document.getElementById('cnic_file').files[0]);

	$.ajax({

	type: "POST",

	url: "<?php echo base_url().'auth/updateUserProfile'; ?>",

	data: formData,

	cache: false,

	contentType: false,

	processData: false,

	dataType: 'JSON',
	beforeSend: function() {

				$('#loader').removeClass('hidden');

			},



	success: function(response) {

		
			$('#loader').addClass('hidden');

			$(".page-alert").removeClass('error');

			$(".page-alert").removeClass('success');
			if (response.status == 1)



            {   



			showAlert(response.message,'Success','green')

			setTimeout(function(){
			
			
			
			window.location="<?php base_url() ?>user/profile";
			
			
			
			},2000);







            }



			



           else if (response.status ==2)



            {  



			showAlert(response.message,title='Success','green');



			



			setTimeout(function(){



				window.location="<?php base_url() ?>user/profile";



				},2000);



			



			



			



            }



         else if (response.status ==0)



            {  



			showAlert(response.message,title='Error','red')



            }



        



			else  



            {   



			var text =  response.message;



				text = text.replace(/<[^>]+>/g, '');



			  showAlert(text,'validation Error','red')



			 }
		 }
		});
  }



     

	 function loggedin_user(){


	
		var formData = new FormData();

		var other_data = $('#form_user_loggedin').serializeArray();

		

		$.each(other_data,function(key,input){

		

			formData.append(input.name,input.value);

		});   

       

	    $.ajax({

		url: "<?php echo base_url().'auth/userlogin'; ?>",

		type: 'POST',

		data: formData,

		dataType: "json",

		processData: false,

		contentType: false,

		beforeSend: function() {

			$('#loader').removeClass('hidden');

		},

		success: function(response) {

		$('#loader').addClass('hidden');

         if (response.status == 1)

			{   

			   showAlert(response.message,'Success','green');

			   setTimeout(function(){

				window.location="<?php echo base_url() ?>";

				

				},2000);

			}

			else if (response.status ==0)

            {  

				 showAlert(response.message,'Error','red');
			}else

			{

			   showAlert(response.message,'Error','red');

			}

           }

       });

     }  
	 
	 

	 function loggedinuserpage(){




  
       $("#loginsbmbtn").prop('disabled',true);
		var formData = new FormData();

		var other_data = $('#formuserloggedin_56_dsadad443').serializeArray();

		

		$.each(other_data,function(key,input){

		

			formData.append(input.name,input.value);

		});   

       

	    $.ajax({

		url: "<?php echo base_url().'auth/userlogin'; ?>",

		type: 'POST',

		data: formData,

		dataType: "json",

		processData: false,

		contentType: false,

		beforeSend: function() {

			$('#loader').removeClass('hidden');

		},

		success: function(response) {

		$('#loader').addClass('hidden');
         
		 
		 if (response.status == 'special')
		 {
			   
			    $("#loginsbmbtn").prop('disabled',false);
			    $("#formuserloggedin_56_dsadad443 #msg_box").show();
				$("#formuserloggedin_56_dsadad443 #msg_box").addClass('s_msg');
				$("#formuserloggedin_56_dsadad443 #msg_box").removeClass('r_msg');
			    $("#formuserloggedin_56_dsadad443 #msg_box").html(response.message);
			    setTimeout(function(){
					window.location="<?php echo base_url().'user/becomeafreelancer'; ?>";
					 $("#loginsbmbtn").prop('disabled',false);
				},2000); 
		 }
		 else
		 if (response.status == 1)

			{   
 
			   
			    $("#formuserloggedin_56_dsadad443 #msg_box").show();
				$("#formuserloggedin_56_dsadad443 #msg_box").addClass('s_msg');
				$("#formuserloggedin_56_dsadad443 #msg_box").removeClass('r_msg');
			    $("#formuserloggedin_56_dsadad443 #msg_box").html(response.message);
			    setTimeout(function(){
					window.location="<?php echo base_url() ?>";
					 $("#loginsbmbtn").prop('disabled',false);
				},2000);

			}

			else if (response.status ==0)

            {   
			    $("#loginsbmbtn").prop('disabled',false);
                $("#formuserloggedin_56_dsadad443 #msg_box").show();
			    $("#formuserloggedin_56_dsadad443 #msg_box").html(response.message);
				$("#formuserloggedin_56_dsadad443 #msg_box").removeClass('s_msg');
				$("#formuserloggedin_56_dsadad443 #msg_box").addClass('r_msg');
				
				$("#loginsbmbtn").prop('disabled',false);
				 setTimeout(function(){
					 $("#formuserloggedin_56_dsadad443 #msg_box").html('');
				},2000);
				
			}else

			{
				$("#loginsbmbtn").prop('disabled',false);
				$("#formuserloggedin_56_dsadad443 #msg_box").show();
				$("#formuserloggedin_56_dsadad443 #msg_box").removeClass('s_msg');
				$("#formuserloggedin_56_dsadad443 #msg_box").addClass('r_msg');
				$("#formuserloggedin_56_dsadad443 #msg_box").html(response.message);
			     setTimeout(function(){
					 $("#formuserloggedin_56_dsadad443 #msg_box").html('');
				},2000);

			}

           }

       });

     }  


	 

		





	function create_user(){



		

		

		var formData = new FormData();

		

		var other_data = $('#form_user').serializeArray();

		

		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		}); 
		var refferal_key ='';
		if($("#rkey___423390").val()!='')
		{
		  
        	 refferal_key = $("#rkey___423390").val();
			 
		}
		
		formData.append("identityfile", document.getElementById('identityFile').files[0]);
		formData.append("refferal_key", refferal_key);

	    $.ajax({



        url: "<?php echo base_url().'auth/createaccount'; ?>",

		

		type: 'POST',

		

		data: formData,

		

		dataType: "json",

		

		processData: false,

		

		contentType: false,

        beforeSend: function() {

			$('#loader').removeClass('hidden');

			},

        success: function(response) {

			$('#loader').addClass('hidden');

        

			if (response.status == 1)

			{   

			    showAlert(response.message,'Success','green')

				setTimeout(function(){

				//	$('#form_user')[0].reset();

					$('#signinTab').click();

					

				//window.location="<?php base_url() ?>";

				},2000);

			}

			else if (response.status ==2)

            {  

				

				showAlert(response.message,title='Success','green');

				setTimeout(function(){

				  window.location="<?php base_url() ?>login";

				},2000);

			}



           else if (response.status ==0)



            {  

              showAlert(response.message,title='Error','red')

			}

			else  

			{   

				

				showAlert(response.message,title='Error','red');

				

			}

		 }

       });

     }                             

    
	
	function createuserregular(){

 
		var formData = new FormData();

		

		var other_data = $('#formusersignup_56_d4d352csfs83_4').serializeArray();

		
		$("#signupbtn__").prop('disabled',true);
		$.each(other_data,function(key,input){
			formData.append(input.name,input.value);
		}); 
		var refferal_key ='';
		if($("#rkey___423390").val()!='')
		{
		  
        	 refferal_key = $("#rkey___423390").val();
			 
		}
		
		//formData.append("identityfile", document.getElementById('identityFile').files[0]);
		formData.append("refferal_key", refferal_key);

	    $.ajax({



        url: "<?php echo base_url().'auth/createaccount'; ?>",

		

		type: 'POST',

		

		data: formData,

		

		dataType: "json",

		

		processData: false,

		

		contentType: false,

        beforeSend: function() {

			$('#loader').removeClass('hidden');

			},

        success: function(response) {

			$('#loader').addClass('hidden');
          
			if (response.status == 1)
			{   
                $("#formusersignup_56_d4d352csfs83_4 #msg_box").show();
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").addClass('s_msg');
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").removeClass('r_msg');
			    $("#formusersignup_56_d4d352csfs83_4 #msg_box").html(response.message);
			    setTimeout(function(){
					window.location="<?php echo base_url().'Userlogin' ?>";
					$("#signupbtn__").prop('disabled',false);
				},2000); 
			}
			else if (response.status ==2)
			{  
				
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").show();
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").html(response.message);
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").removeClass('s_msg');
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").addClass('r_msg');
				setTimeout(function(){
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").html('');
				$("#signupbtn__").prop('disabled',false);
				},1000);
				
            }
			else if (response.status ==0)
			{  
			    $("#signupbtn__").prop('disabled',false);
			    $("#formusersignup_56_d4d352csfs83_4 #msg_box").show();
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").html(response.message);
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").removeClass('s_msg');
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").addClass('r_msg');
				setTimeout(function(){
					
					$("#formusersignup_56_d4d352csfs83_4 #msg_box").html('');
				},3000);
			}
			else  
			{   
			    $("#signupbtn__").prop('disabled',false);
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").show();
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").html(response.message);
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").removeClass('s_msg');
				$("#formusersignup_56_d4d352csfs83_4 #msg_box").addClass('r_msg');
				$("#signupbtn__").prop('disabled',false);
				setTimeout(function(){
					$("#formusersignup_56_d4d352csfs83_4 #msg_box").html('');
				},3000);
			}
		  }

       });

     }   

	function passwordMatched(node) {



	 var password= document.getElementById("password").value;



	 var confirm_password= node;



	 if(password !=''){



		if(password!= confirm_password) {



return 0 ;



		}



		else{



			return 1;



		}	







  }



}



      



	  



 function get_checkbox_checked(str){



	var stringFromServer = str;



	var arrayOfValues = stringFromServer.split(",");



	var $checkboxes = $("input[type=checkbox]");



	$checkboxes.each(function(idx, element){



	if(arrayOfValues.indexOf(element.value) != -1){



	element.setAttribute("checked", "checked");



	}



	else{



	element.removeAttribute("checked");



	}



	});



}



 function language(lang_code){



	// alert(lang_code);



	 	    $.ajax({



        url: "<?php echo base_url().'crud/changeLang'; ?>",



        type: 'POST',



		 data:{id: lang_code},



		 dataType: "json",



        success: function(response) {



			;



			//alert(response.user.user_type);



			if (response.status == 1)



            {   



		



		window.location.href = "<?php echo base_url(); ?>dashboard";  



            }



          



			else  



            {   



			alert("Some Thing wrong");



			



            }



           }



	 });



 }



function copyToClipBoard(target){



	//Console.clear;



	



	var clipboard = new Clipboard('.copy-button', {



    target: function() {



        return document.querySelector('#'+target);



    }



});







clipboard.on('success', function(e) {



	document.getElementById('audioTag').play();



$("#alert-center").html('Coppied to Clipboard ! <i class="gi gi-bell"></i>' );



    //console.log(e);



});







clipboard.on('error', function(e) {



$("#alert-center").html(e);



});







$("#alert-center").show();



	setTimeout(function(){



$("#alert-center").hide('slow');



				},3000);		











	}



/*



*------------------------------------------------------



Generic functions



-------------------------------------------------------



**/



function is_valid_number(val) {



   var numbers = /^[0-9]+$/;  



      if(val.match(numbers))  



      {  



     



      return true;  



      }  



      else  



      {  



      return false;  



      }  



    



}





	

	function deleteCat(id){

	     $.confirm({

    title: 'Confirmation!',

    content: 'Are you sure to delete!',

	animation: 'zoom',

    closeAnimation: 'scale',

	autoClose: 'cancel|5000',

	type: 'red',

	buttons: {

        deleteUser: {

            text : 'Yes',

			btnClass: 'btn-primary',

            action: function () {

                // if user click ok the row will be deleted by the following code

				//ajax call to delete	

				$.ajax({

				url: "<?php echo base_url().'cat/delete'; ?>",

				type: 'POST',

				data: {id:id},

				dataType: "json",

				success: function(response) {

					$(".ui-item").hide();

				if (response.status == 1)

				{   

				

				$("#row_"+id).hide('slow');

				}

				else if (response.status ==0)

				{  

				$.alert('Error',':You could not delete');

				}

				else  

				{  

				$.alert('Error',response);

				

				}

				}

				});





            }

        },

        cancel: function () {

			text : 'Yes'

        },

    }

   

	});  

	} 

  

  

  

  

  



  function editaddional(id,nounce__)

  {

    $("#educationsave").html('update');

    $("#education_form #country").val($("#c_"+id).html()); 

	$("#education_form #institute").val( $("#i_"+id).html()); 

	$("#education_form #degree_title").val( $("#dg_"+id).html());

	

	var ft = $("#ft_"+id).html(); 

	 

	ft = ft.split('-');

	

	var f = ft[0]; 

	var t = ft[1];

	$("#education_form #from_year").val(f); 

	$("#education_form #to_year").val(t ); 

	

	var hiddeninput  = document.createElement("input");

	hiddeninput.setAttribute('id','nonouce___');

	hiddeninput.setAttribute('name','nonouce___');

	hiddeninput.setAttribute('type','hidden');

	hiddeninput.setAttribute('value',nounce__);

	$("#education_form .h_nouncef").html(hiddeninput);

  } 

function isNumberKeyc(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		
		return true;
	}

 function deleteaddional(target,id,key,div){



			$.ajax({

			url: "<?php echo base_url().'user/deleteaddional'; ?>",

			type: 'POST',

			data: {id:id,target:target},

			dataType: "json",

				success: function(response) 

				{

					$(".ui-item").hide();

					

					if (response.status == 1)

					{  

						$("#"+div+key).hide('slow');

					}

					else if (response.status ==0)

					{  

						$.alert('Error',':You could not delete');

					}

					else  

					{  

						$.alert('Error',response);

					}

				

				}

			});



	} 

 function deleteGetCash(id){



	     $.confirm({



    title: 'Confirmation!',



    content: 'Are you sure to delete!',



	animation: 'zoom',



    closeAnimation: 'scale',



	autoClose: 'cancel|5000',



	type: 'red',



	buttons: {



        deleteUser: {



            text : 'Yes',



			btnClass: 'btn-primary',



            action: function () {



                // if user click ok the row will be deleted by the following code



				//ajax call to delete	



				$.ajax({



				url: "<?php echo base_url().'order/deleteGetCash'; ?>",



				type: 'POST',



				data: {id:id},



				dataType: "json",



				success: function(response) {



					$(".ui-item").hide();



				if (response.status == 1)



				{   



				



				$("#row_"+id).hide('slow');



				}



				else if (response.status ==0)



				{  



				$.alert('Error',':You could not delete');



				}



				else  



				{  



				$.alert('Error',response);



				



				}



				}



				});











            }



        },



        cancel: function () {



			text : 'Yes'



        },



    }



   



	});  



	} 



	



function noData(Table)// This function will give no data message with number of column because datatable have issue and does not support colspan attribute



{ 



    var ColCount = 0;



    $('#'+Table).find("tr").eq(0).find("th,td").each(function ()



    {



        ColCount += $(this).attr("colspan") ? parseInt($(this).attr("colspan")) : 1;



    });



	



	$row = $('<tr><td>No data!</td>');



	for(var j=1; j<ColCount; j++)



	{



	$row.append("<td>&nbsp;</td>");



	}



	$row.append("</tr>");



	



	$('#'+Table +' tbody').html($row);



   



}







        function GetColumnCount(Table)



{



    var ColCount = 0;



    $('#'+Table).find("tr").eq(0).find("th,td").each(function ()



    {



        ColCount += $(this).attr("colspan") ? parseInt($(this).attr("colspan")) : 1;



    });







    return ColCount;



}



 function autoComplete(txt_elmnt,thisfields,table){



	 	    $.ajax({



        url: "<?php echo base_url().'crud/get'; ?>",



        type: 'POST',



		 data:{thisfields: thisfields,table: table},



		 dataType: "json",



        success: function(response) {



			



			if (response.status == 1)



            {  



			var dataArr = JSON.stringify(response.data);



			var arr = new Array();



			var sourceTags = new Array();



			



			var arr = JSON.parse(dataArr);



			 $.each(arr, function (field, val) {



				sourceTags.push(val.title);



				});



				



			$("#"+txt_elmnt).autocomplete({



			source: sourceTags,



			autoFocus:true



			});



			$('.ui-widget').show();	



		     }



          



			else  



            {   



			alert("Some Thing wrong");



			



            }



           }



	 });



 }



 function duplicate(tableName,primary_key_field,primary_key_val,view){



	 	   



	 



	 



	  $.confirm({



    title: 'Confirmation!',



    content: 'Are you sure to make a duplicate of this record!',



	animation: 'zoom',



    closeAnimation: 'scale',



	autoClose: 'cancel|5000',



	type: 'green',



	buttons: {



        deleteUser: {



            text : 'Yes',



			btnClass: 'btn-primary',



            action: function () {



                // if user click ok the row will be deleted by the following code



						 $.ajax({



        url: "<?php echo base_url().'crud/duplicate'; ?>",



        type: 'POST',



		 data:{table:tableName,primary_key_field: primary_key_field,primary_key_val: primary_key_val},



		 dataType: "json",



        success: function(response) {



			



			if (response.status == 1)



            {  



		     $.alert(' Successfully Duplicated!','Alert');



			 //get_view('<?php echo base_url(); ?>'+view);



		     }



          



			else  



            {   



			alert("Some Thing wrong");



			



            }



           }



	 });







            }



        },



        cancel: function () {



			text : 'No'



        },



    }



   



	});



 }



 /****************************************************************/



 function showAlert(msj,title,type)

 {



		msj = msj.replace(/<[^>]+>/g, '');

		

		$.alert({

		

			title: title,

			

			content: '<p>'+msj+'</p>',

			

			type: type,

			

			icon: 'glyphicon glyphicon-alert',

			

			closeIcon: true,
backgroundDismissAnimation: 'shake',
			backgroundDismiss: false,

			animation: 'zoom',

closeAnimation:'rotate'

		});



	}



function is_valid_number(val) {



   var numbers = /^[0-9]+$/;  



      if(val.match(numbers))  



      {  



     



      return true;  



      }  



      else  



      {  



      return false;  



      }  



    



}



 /****************************************************************/



 



  function deleteImage(id){



	 $.confirm({



		title: 'Confirmation!',



		content: 'Are you sure to delete!',



		animation: 'zoom',



		closeAnimation: 'scale',



		autoClose: 'cancel|5000',



		type: 'red',



		buttons: {



		deleteUser: {



		text : 'Yes',



		btnClass: 'btn-primary',



		action: function () {



		//ajax call to delete	



		$.ajax({



		url: "<?php echo base_url().'crud/deleteImage'; ?>",



		type: 'POST',



		data: {id:id},



		dataType: "json",



		success: function(response) {



		if (response.status == 1){   



			$(".img_wrap_"+id).hide('slow');



			}



		else if (response.status ==0){  



			showAlert('Error :You could not delete');



		}



		else{   



			showAlert(response);



		}



		}



		});



		}



		},



		cancel: function () {



		text : 'Yes'



		},



		}



		



		});  



	}                             

 	   function deleteImage(id,table){



	 $.confirm({



		title: 'Confirmation!',



		content: 'Are you sure to delete!',



		animation: 'zoom',



		closeAnimation: 'scale',



		autoClose: 'cancel|5000',



		type: 'red',



		buttons: {



		deleteUser: {



		text : 'Yes',



		btnClass: 'btn-primary',



		action: function () {



		//ajax call to delete	



		$.ajax({



		url: "<?php echo base_url().'crud/deleteImage'; ?>",



		type: 'POST',



		data: {id:id,table:table},



		dataType: "json",



		success: function(response) {



		if (response.status == 1){   



			$(".img_wrap_"+id).hide('slow');



			}



		else if (response.status ==0){  



			showAlert('Error :You could not delete');



		}



		else{   



			showAlert(response);



		}



		}



		});



		}



		},



		cancel: function () {



		text : 'Yes'



		},



		}



		



		});  



	}                             

	/*********************************************************/



 



/**************************************************************************/





/**************************************************************************/



function getImage(id,tbl){ 	// will get single entitty	and show its image in modal







	$('#edit_image_wrap').show('slow');



	$('#edit_image_wrap').addClass('shown');



		    $.ajax({



			url: "<?php echo base_url().'crud/edit'; ?>",



			type: 'POST',



			data: {id:id,table:tbl},



			dataType: "json",



			success: function(response) {



			if (response.status == 1)



            {   



			//populating data in form field



				var dataArr = response.data;



				$.each(dataArr, function (field, val) {



					$('#form_edit_image #'+field).val(val);



				});



				$('#edit_img_id').val(id);



				var src ='<?php echo base_url()?>uploads/'+response.data.image;



				



				$('#edit_small_image_div').html('<div class="col-xs-2"><img src="'+src+'" class="pull-left" width="100"></div>');



				$('#edit_image_hidden').val(response.data.image);



				



			}



			else  



			{   



			showAlert('response error');



			}



			}



		});







	



	



//}



	   



	}



	



	



	



/**************************************************************************/







function save_image(e){



	



		var inputFile = $('input#edit_image');



		 var filesToUpload = inputFile[0].files;



		 var formData = new FormData();



		 



		// make sure there is file(s) to upload



		if (filesToUpload.length > 0) {



			// provide the form data



			// that would be sent to sever through ajax



			for (var i = 0; i < filesToUpload.length; i++) {



				var file = filesToUpload[i];



				formData.append("file[]", file, file.name);				



			}



	}



	var other_data = $('#form_edit_image').serializeArray();



    $.each(other_data,function(key,input){



        formData.append(input.name,input.value);



    });   



	



	// ajax start



		    $.ajax({



			type: "POST",



			url: "<?php echo base_url().'crud/update_content_management_image'; ?>",



			data: formData,



			cache: false,



			contentType: false,



			processData: false,



			beforeSend: function() {



			$('#loader_box').removeClass('hidden');



			//$('#form_sample .btn_au').addClass('hidden');



			},



				success: function(data) {



				$('#loader_box').addClass('hidden');



				$('#form_sample #loader_box').removeClass('hidden');



				var obj = jQuery.parseJSON(data);



				if (obj.status == 1)



				{   



				var src  =obj.image;



				if (src!=0){



					var src ='<?php echo base_url()?>uploads/'+obj.image;



				$("#img_"+obj.id).attr("src",src);



				//alert(obj.description);



				$("#description"+obj.id).text(obj.description);



				$("#edit_small_image_div img").attr("src",src);



				}



					



				setTimeout(function(){



				$('#form_sample #loader_box').addClass('hidden');	



				$('#edit_image_wrap').hide('slow');



				},2000);



				}



				





				}



				



			//}



	 });











	}



	/////////////////////////////////////////////////////



 function hide_this(el){



					$("#"+el).hide('slow');



					}



					



				////////////////////////////////////////



		



function getSubCategories(parentId,level){



			if(parentId=='none')



				return false;



				else



					    



						var parentId;



						var level;



						 var newLevel = parseInt(level)+parseInt(1);



						var catLevel = document.getElementById('sub_category_level').value =newLevel;



						



		  $.ajax({



			url: "<?php echo base_url().'categories/getSubCategories'; ?>",



			type: 'POST',



			data: {id:parentId,level:level},



			dataType: "json",



			success: function(response) {



			if (response.status == 1)



            {   



			//populating data in form field



			if(level==0){



			$('#sub_cat_divs').html('<div id="sub_block"></div> ');



			$('#sub_block').append(response.data);



				



			}



			else{



				$('#sub_block').append(response.data);



				}



			}



			else  



			{   



			if(level==0){



			$('#sub_cat_divs').html('<div id="sub_block"></div> ');



			$('#sub_block').append(response.data);



				



			}



			else{



				$('#sub_block').append(response.data);



				}



			}



			}



		});


  }


function get_filter_data(id,type){
		
		NProgress.start();
		$("#loader").removeClass('hidden');
		jQuery.get(id).done(function (data) {
		NProgress.done();
			$("#loader").addClass('hidden');
		if(type==1)
		{
		  jQuery("#services_list").html( jQuery(data).find('#services_list').html() );	
		}
		else
		{
			jQuery("#services_list").html( data );
		}
		});
		
		var randomnumber = Math.floor((Math.random() * 100000) + 1)
		window.history.pushState({page: 'page_'+randomnumber}, "title_"+randomnumber,id);
		return false;
	}




    </script>