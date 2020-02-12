<?php include_once"header.php";

 ?>

<script src="https://js.stripe.com/v3/"></script>


    <!-- page title -->
    <section class="page-title centred" style="background-image: url(images/about/page-title.png);">
        <div class="container">
            <div class="content-box">
                <div class="title"><h1>Checkout</h1></div>
                <ul class="bread-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    
    <!-- checkout section -->
    <section class="checkout-section checkout-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 checkout-column">
<h2 class="type-uppercase color-gray text-center mb+">YOU’re a step away from a HAPPY HOME</h2>                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 checkout-column">
                    <div class="billing-info">
                        <div class="title"><h4>Billing Details</h4></div>
                        <?php
                        $name='';
                        $email='';
                        $phone='';
                        
                        if(isset($_SESSION['initial_form']))
						{
							$name=  $_SESSION['initial_form']['name'];
							$email= $_SESSION['initial_form']['email'];
							$phone= $_SESSION['initial_form']['phone'];
                        }
                        ?>
                        <form action="stripe/charge" id="payment-form" method="post" class="billing-form">
                            <div class="row">
                              <?php 
if($this->session->userdata('stripe_error')==1){
  $formE=$this->session->userdata('form_error');
if (strpos($formE, 'You cannot use a Stripe token') !== false) {
 $arr = explode(':',$formE);
 echo '<div class="alert alert-danger">'.$arr[0].'</div>';
 }
  else {
    echo '<div class="alert alert-danger">'.$formE.'</div>';
  }
}else{
  $this->session->unset_userdata('stripe_error');
 $this->session->unset_userdata('form_error');
}
                              ?>
                              <?php // echo validation_errors(); ?>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>First Name*</label>
                                    <input type="text" name="first-name" value="<?=$name?>" required>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>Last Name*</label>
                                    <input type="text" name="last-name" required>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>Company Name*</label>
                                    <input type="text" name="company" required>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>Email Address*</label>
                                    <input type="text" name="email" required value="<?=$email?>">
                                </div><hr>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>Phone Number*</label>
                                    <input type="text" name="phone" value="<?=$phone?>" required>
                                </div>
                                <hr>
                                <div class="col-xs-12">
                                <h3>Service Area</h3>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-6">
                                    <label>Country*</label>
                                    <div class="select-box">
                                        <select class="text-capitalize  form-control" id="country" name ="country">
                                          <option value="Ireland">Ireland</option>
                                          <option value="uk">Uk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-6">
                                    <label>City*</label>
                                    <div class="select-box">
                                        <select class="text-capitalize  form-control" name ="city" id ="city">
                                          <option value="dublin">dublin</option>
                                        <option value="YorkShire">YorkShire</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field-input col-md-12 col-sm-12 col-xs-12">
                                    <label>Address*</label>
                                    <input type="text" name="address" required>
                                </div>
                                <div class="field-input col-md-6 col-sm-6 col-xs-12">
                                    <label>Zip Code*</label>
                                    <input type="text" name="postal_code" required>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <article>
   <h4 >Choose Your Service</h4>
   <p class="color-gray-light type-small mb">Tell us about your home.</p>
   <div class="layout">
      <div class="col-sm-6">
         <span class="themestreet-custom-select service_id">
            <select id="service_id" name="bedroom" onChange="addCart('bedroom',this.value)"  class="form-control">
               <option value="0">Please Select Bedroom</option>
               <option value="1">1 bedroom</option>
               <option value="2">2 bedroom</option>
               <option value="3">3 bedroom</option>
               <option value="4">4 bedroom</option>
               <option value="5">5 bedroom</option>
               <option value="6">6 bedroom</option>
               <option value="7">7 bedroom</option>
            </select>
         </span>
      </div>
      <div id="bedroom-wrapper" class="col-sm-6">
         <span class="themestreet-custom-select service_id2">
            <select name="parameter" onChange="addCart('bathroom',this.value)" name="bathroom"  class="form-control">
               <option value="0">Please Select Bathrooms</option><option value="1">1 Bathroom</option>
               <option value="2">2 Bathrooms</option>
               <option value="3">3 Bathrooms</option>
               <option value="4">4 Bathrooms</option>
               <option value="5">5 Bathrooms</option>
               <option value="6">6 Bathrooms</option>
            </select>
         </span>
      </div>
      <br><br> <input type="hidden" name="hourly_service" id="hourly_service" value="0">
   </div>
</article>
                                    <div class="create-acc">
                                        <div class="clear-fix">&nbsp;</div>
                                        <h4>Select Visit time</h4>
                                        <div class='col-sm-6'>
                                        
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input  id="datepicker" style="border-radius:5px" name="date" placeholder="mm/dd/yyyyy" class="form-control" />
                    
                </div>
            </div>
        </div>
                       <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='time'name="time" id="timepicker"  value="16:32:55" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>  <hr>
        
        <div class="clear-fix">&nbsp;</div>
                            <div class="col-xs-12" id="extra_services">
											<?php
											$a_selected_services = array();
											foreach ($this->cart->contents() as $items){
											  if(trim($items['id'])=='sku_Bathroom' or trim($items['id'])=='sku_Bedroom')
											  {
											    // do nothing
											  }else
											  {
												 $a_itemid = explode("_",$items['id']);
												 $a_selected_services[] = $a_itemid[1]; 
												 $a_rowsid[] = $items['rowid']; 	 
											  }
											}
											
											foreach($data->result() as $row)
                                            {
                                            ?>
                                                <div class="col-md-5 col-xs-6" style="border:1px solid; padding:5px; margin:0 0 5px 5px; border-radius:5px">
                                                <p style="margin:0"><?php echo $row->title ?></p>
                                               		<input type="checkbox" name="extras"  value="<?php echo $row->id ?>" 
                                                   <?php if(in_array($row->id,$a_selected_services)){ echo 'checked';}?>>
                                                   <label> <b>$ <?php echo $row->price ?></b></label>
                                                </div>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                   <hr>
                <div class="col-xs-12">
                <h4>Payment details!</h4>
                <p>
Enter your card information below. You will be charged after service has been rendered.</p>
                <img src="images/cards.png" class="img-responsive"><div class="clear-fix">&nbsp;</div>
                <div id="card-element">
                      <!-- A Stripe Element will be inserted here. -->
                    </div><div class="clear-fix">&nbsp;</div>
                    <hr>
                    <p>By clicking the Book Now button you are agreeing to our Terms of Service and Privacy Policy</p>
                <button type="submit" class="submit-button btn-one" >BOOK NOW</button>
                </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 checkout-column">
                    <div class="order-info">
                        <div class="title"><h4>Booking Summary</h4></div>
                      <div  id="sidebar_cart" style="background-color: #E9E9E6; padding: 10px 12px 10px 12px;">
                <div class="theiaStickySidebar">
                <div id="cart_box">
                    <h3>Your order  
                    <a id="emptyCart"  title="Empty  Cart" class="pull-right"  href="javascript:void(0)" ><i class="glyphicon glyphicon-trash"></i> </a>
                    <i class="icon ereaders-shopping-bag"></i></h3>
                   <table class="table table-striped table_summary">
                    <tbody id="cart_body">
                    
                    <?php
					// pre($this->cart->contents());
					 //die();
                    $item='';
                    foreach ($this->cart->contents() as $items){
            $item.='<tr>
                        <td>
                            <a href="javascript:void(0)" id="'.$items['rowid'].'" onclick="remove(\''.$items['rowid'].'\')" class="remove_item"><i class="glyphicon glyphicon-remove-circle"></i></a> <strong>'.$items['qty'].'x</strong> '.$items['name'].'<p>'.$items['extraItems'].'
    </p>                        
                        </td>
                        <td>
                            <strong class="pull-right">$'.$items['subtotal'].'</strong>
                        </td>
                    </tr>';
            }
            echo $item;
                    ?>
                    </tbody>
                    </table>
                    <hr>
                    
                    <table class="table table_summary">
                    <tbody>
                    
                    <tr>
                        <td class="total">
                             TOTAL <span class="pull-right">$ <span id="total_price"><?php echo $this->cart->total() ?></span></span>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                        
                </div><!-- End cart_box -->
                </div><!-- End theiaStickySidebar -->
            </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- checkout section end -->

<?php include_once"footer.php"; ?>
<script>
 //   populateCountries("country", "state");
// Create a Stripe client.
var stripe = Stripe('<?php echo STRIPE_PUBLISH_KEY ?>');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      // 4242424242424242
      
     stripeTokenHandler(result.token);
    
    }
  });
});


function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}


</script>

<script>
/********add item **********/
$(".add_to_basket").click(function(){
var id = $(this).attr('id');    
var formData = new FormData();
var extraIDs = $("#extras_"+id+" input:checkbox:checked").map(function(){
        return this.value;
    }).toArray();
    
    
    if (typeof extraIDs !== 'undefined' && extraIDs.length > 0) {
    // the array is defined and has at least one element
            formData.append("extraIDs",extraIDs);

}

var extraEdit = $("#extras_"+id+" input:text").map(function(){
        return this;
    }).toArray();


    $.each(extraEdit,function(key,input){

        formData.append(input.name,input.value);

    });   



formData.append('id', id);


        $.ajax({
            url: "cart/add",
            type: 'POST',
            data: formData,
            contentType:false,
            cache: false,
            processData:false,
            dataType: "json",
            
         beforeSend: function() {

    $('#loader').removeClass('hidden');

  },
            success: function(response) {
            $('#loader').addClass('hidden');
                if (response.status == 200){   
                //  alert(response.message);
                    $("#cart_body").html(response.items);
                    $("#total_price").html(response.total);
                    $("#total_price_nav").html(response.total);
                }
                
                else if (response.status == 2){   
                showAlert(response.message,'Alert','red');

                }
                else{   
                showAlert('Not added');
                }
            }
        });
});


		function addCart(product_type,qty,extra,clickid){
			
			extra = extra || '';
			clickid = clickid || '';
            //alert('extra'+extra);
			//alert('product_type'+product_type);
			
			var formData = new FormData();
			var extratype = '';
			if(extra!='')
			{
			  extratype =  extra;
			  formData.append('extratype', extratype);	
			}
			var clickedid = '';
			if(clickid!='')
			{
			clickedid =  clickid;
			formData.append('clickid', clickedid);	
			}
			
			formData.append('qty', qty);
			formData.append('product_type', product_type);
			formData.append('product_type', product_type);
			//formData.append("id",id);
			//console.log(searchIDs);
			$.ajax({
			url: "cart/add",
			type: 'POST',
			data: formData,
			contentType:false,
			cache: false,
			processData:false,
			dataType: "json",
			
			beforeSend: function() {
			
				$('#loader').removeClass('hidden');
			
			},
			success: function(response) {
				$('#loader').addClass('hidden');
				if (response.status == 200){   
				//  alert(response.message);
					$("#cart_body").html(response.items);
					$("#total_price").html(response.total);
				}
				
				else if (response.status == 2){   
					showAlert(response.message,'Alert','red');
				
				}
				else{   
					showAlert('Not added');
				}
			}
			});
		}
/*********remove item************/
function remove(id){
var rowid = id; 
var formData = new FormData();

formData.append('rowid', rowid);
        $.ajax({
            url: "cart/remove",
            type: 'POST',
            data: formData,
            contentType:false,
            cache: false,
            processData:false,
            dataType: "json",
            success: function(response) {
                if (response.status == 200){   
                    //alert(response.message);
                    $("#cart_body").html(response.items);
                    $("#total_price").html(response.total);
                }
                else{   
                alert('Not updated');
                }
            }
        });
}
/*$(".remove_item").click(function(){

});*/

/*********remove item************/
$("#emptyCart").click(function(){
    
        $.ajax({
            url: "cart/destroy",
            type: 'POST',
            contentType:false,
            cache: false,
            processData:false,
            dataType: "json",
            success: function(response) {
                if (response.status == 200){   
                    //alert(response.message);
                    $("#cart_body").html(response.items);
                    $("#total_price").html('0');
                    
                    
                }
                else{   
                alert('Error:Something went wrong');
                }
            }
        });
});


		$("#extra_services").on('click','input',function(){
			//alert('in herr');
			//var domain = $('#get_domain').val();
			//if($(this).attr('checked')==true)
			//{
			 	
			//}
		     var clickid  = $(this).attr('id');
			//if($(this).)
			//return false;
			var aRatingIds = '-1';
			var a_extra_services = $("#extra_services input:checkbox:checked").map(function(){
				return $(this).val();
			}).get(); // <----
			$(this).removeAttr('id');
			//console.log(a_extra_services);
			addCart(a_extra_services,1, true,clickid); // true clear that it is from extra
			
			
		 });





/******************/


</script>