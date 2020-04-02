<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function cleanURL($textURL) {
  $URL = strtolower(preg_replace( array('/[^a-z0-9\- ]/i', '/[ \-]+/'), array('', ' '), $textURL));
            return $URL;
     }
/*



CREATE BY : WASEEM AFZAL



EMAIL     : waseemafzal31@gmail.com







|-------------------------------------------------------



| 



get_by_status($tableName)



select_from_where($this,$table,$field,$val)



get_table_by_user_id($tableName,$id) 



get_field_where($id,$fields,$tableName)



get_where($id,$tableName)



get_All_by_fieldName($field,$tableName)



get_title_by_fieldName($id,$field,$tableName)



get_title($id,$tableName)



|-------------------------------------------------------
*/

   
  function bccNewsFeed(){

	$data = file_get_contents("http://feeds.bbci.co.uk/news/world/rss.xml");
	$data = simplexml_load_string($data);

	$articles = array();
	foreach ($data->channel->item as $item)
	{
		$media = $item->children('http://search.yahoo.com/mrss/');
		$image = array();
		foreach($media->thumbnail[0]->attributes() as $key => $value) 
		{
			$image[$key] = (string)$value;
		}        
		
		$articles[] = array(
			'title' => (string)$item->title,
			'description' => (string)$item->description,
			'link' => (string)$item->link,
			'image' => $image,
			'pubDate'=> (string) $item->pubDate 
		);    
	}
   return $articles;
 } 
   
   



 function createbuyer($data_array)
 {
 	if(is_array($data_array))
	{
		$CI =& get_instance(); 
		$CI->db->insert('freelancers', $data_array);
	}
	
}
 
 
 function uriv($data,$msg = 'Access denied...!')
 {  
   if(empty($data))
   {
	 exit ($msg);   
   }
   
    if(! is_numeric($data))
   {
	 exit ('Access denied ilegal chrachter');   
   }
   
  // is_numeric	 
 }

function lasturi(){
	$CI = &get_instance();
	return end($CI->uri->segment_array());
	}	
function prelasturi(){
	$refrerlink=$_SERVER['HTTP_REFERER'];
		$link_array = explode('/',$refrerlink);
		return end($link_array);
	}	
	function adminName(){
		$CI = &get_instance();
		$row=$CI->db->select('name,email')->where('id',get_session('user_id'))->get(TBL_USER)->row();
		if($row->name!=''){
		return ucfirst($row->name);
		}else{
		return $row->email;
		}
    }  
	function role(){
		$CI = &get_instance();
		return $CI->db->select('group_title as role')->where('id',get_session('user_type'))->get('users_rights')->row()->role;
    }   
    function roleID(){
		$CI = &get_instance();
		return $CI->db->select('id as role')->where('id',get_session('user_type'))->get('users_rights')->row()->role;
    }   
	
	function hello(){
		
		return ("admin/header");
    }   
function exchangeRate( $amount, $from, $to)
{
    switch ($from) {
        case "euro":
            $from_Currency = "EUR";
            break;
        case "naira":
            $from_Currency = "NGN";
            break;
        case "dollar":
            $from_Currency = "USD";
            break;
        case "pounds":
            $from_Currency = "GBP";
            break;
    }

    switch ($to) {
        case "euro":
            $to_Currency = "EUR";
            break;
        case "dollar":
            $to_Currency = "USD";
            break;
        case "pound":
            $to_Currency = "GBP";
        case "naira":
            $to_Currency = "NGN";
            break;
    }

  $amount = urlencode($amount);

  $from_Currency = urlencode($from_Currency);
  $to_Currency = urlencode($to_Currency);
  $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=" . $from_Currency . "&to=" . $to_Currency);

  $get = explode("<span class=bld>",$get);
  $get = explode("</span>",$get[1]);
  $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
  return round($converted_amount, 2);
}
function getServiceImage($id){

	$file=FCPATH.'uploads/';

	$default_image='assets/img/services/s1.jpg';

		$CI =& get_instance();

		$image =$CI->db->select('media as image')->from('tbl_services_media')->where('service_id',$id)->get()->row()->image;

		if($image!='' ){

			return base_url().'uploads/services/media/'.get_thumbnail($image);

		

			

		}else{

			return $default_image;

			}

		

	}
	
	function getServiceAllImages($id){
	$CI =& get_instance();
		$data =$CI->db->select('media as image')->from('tbl_services_media')->where('service_id',$id)->get();
		if($data->num_rows()>0 ){
		return $data;
		}else{
			return 0;
			}
	}



		function getlogo($default_image)
		{
			$file=FCPATH.'uploads/';
			$CI =& get_instance();
			$image =$CI->db->select('image')->from('setting')->get()->row()->image;
			if($image!='' ){
			$imagePath=$file.$image;
			if (file_exists($imagePath))
			{
				$image= base_url().'uploads/'.$image;
			
			}
				return $image;
			
			}
			else
			{
			
				return $default_image;
			
			}
		}
		
		function getMaxID($key,$table)
		{
			$CI =& get_instance();
			$result = $CI->db->query("SELECT MAX(".$key.") AS `maxid` FROM `".$table."` ")->row()->maxid;
			
			$data = 1;
			if(!empty($result))
			{
			 	return $data = $result +1;
			}
		return $data;
		}
		function getGalleryYear()
		{
			$CI =& get_instance();
			$data='';
			$result = $CI->db->query("SELECT year FROM `tbl_gallery` GROUP by year");
			if($result->num_rows()>0){
				foreach ($result->result() as $row){
				$data.='<li class="menu-item menu-item-type-post_type menu-item-object-page" >
                                            <a href="GalleryYear/view/'.$row->year.'">Gallery-'.$row->year.'</a>
                                        </li>';
				}
				}
		return $data;
		}
		
		
		function setUserimage($image)
		{
			$file=FCPATH.'uploads/';
			$default=base_url().'assets/noimg.png';
			$PATH =$file.$image;
			if (!file_exists($PATH))
			{
				return $default;
			}
			return base_url().'uploads/'.$image;
		
		}
		function setServiceMedia($image)
		{
			$default=base_url().'assets/service-default.jpg';
			$file=FCPATH.'uploads/';
			$PATH =$file.$image;
			if (!file_exists($PATH))
			{
				return $default;
			}
				return base_url().'uploads/'.$image;
			
		}
	
	
		function setBlogImage($image)
		{
			$default='https://i.imgur.com/rogRMWc.jpg';
			$file=FCPATH.'uploads/';
			$PATH =$file.$image;
			if (!file_exists($PATH))
			{
				return $default;
			}
			return base_url().'uploads/'.$image;

		
		}
	
	
function getBtn_BecomeFreelancer(){
	$CI =& get_instance();
	
	$becomeafreelancer='';
	if(get_session('userlogin')!=true){
			return '';
			 }
$freelanverusertype = get_id_by_key('type','user_id',get_session('user_id'),'freelancers');
if(!empty($freelanverusertype) and $freelanverusertype =='buyer')
	 {
		 $becomeafreelancer='BECOME A FREELANCER';
		 }
		 
		 else{
			 $becomeafreelancer='GO TO YOUR FREELANCER PROFILE';
			 }
			$btn='<a  href="user/becomeafreelancer" style="font-size: 1.5em;margin: 1% 0 4% 0;" class="btn btn-effect-ripple btn-success">'.$becomeafreelancer.'</a>'; 
	return $btn;		 
	
	}	

		function getuserlocation($locid,$areareadable =false)

		{

			$CI =& get_instance();

			   if($areareadable)

			     {

					$query= $CI->db->query("

					SELECT *,

						(SELECT name FROM `tbl_countries` AS tc WHERE tc.id = location.country) AS country_name,

						(SELECT name FROM `tbl_states` AS ts WHERE ts.id = location.state) AS state_name,

						(SELECT name FROM `tbl_cities` AS tcc WHERE tcc.id = location.city) AS city_name

					FROM location WHERE id = '".$locid."'");

					$options.='<option  value="">Choose area of interest</option>';

					$location = array();

					if ($query->num_rows()>0){

						foreach($query->result() as $row)

						{

							$location =  $row;

						}

					}

				    return $location;	

			     }

			

			$locationrow =$CI->db->select('*')->from('location')->where('id',$locid)->get()->row();
			
			if (count($locationrow)>0)

			{

				return $locationrow;

			}

			else

			{

				return 0;

			}
   }
   
  
   function paypalsetting($mode)
   {
	
	 $aPaypalsetting = array();
	 if($mode=='admin')
	 {
		   $paypal_mode_admin  =  getSetting('','','paypal_mode_admin');  
			if($paypal_mode_admin==0) // local
			{
				$aPaypalsetting['env'] = 'sandbox'; 
				$aPaypalsetting['paypalbaseURL'] = 'https://api.sandbox.paypal.com/v1/'; 
				$aPaypalsetting['paypalclientID'] = 'AUSKO18cTv1h3Sf8ls3gAD_sQeJIvbz7_LGx8fXeSsK-oSodbqiAi0lfTy2OAY_PzHT1wyRCeb16HJM2'; 
				$aPaypalsetting['paypalSecret'] = 'EGD8oO_9YG5oNmUO4iPaUp0GECeAA2balbVFv1wTKLjr3yBLXVN6UkCIU_0AotUYFNDMWcWn3exlWvMX'; 	 
			
			}
			else
			if($paypal_mode_admin==1) // live
			{
				$aPaypalsetting = array();
				$aPaypalsetting['env'] = 'live'; 
				$aPaypalsetting['paypalbaseURL'] = 'https://api.paypal.com/v1/'; 
				$aPaypalsetting['paypalclientID'] = 'AbBKttvvya07luPDphvzLncn72NBSTE274lw9Mu8rvx_2I9piBluk51SzBjiU8f5q2_TxVN1WNIIJBgc'; 
				$aPaypalsetting['paypalSecret'] = 'EFQk-xCidhIUmPkii_3rKdsTwRU5y06XU51etiuQmrK_l65ojT8sR6kATkLfOYtBgNflg6_PESUqSsQg';   
			}
	 }
	 else
	 if($mode=='front')
	 {
		  
		  $paypal_mode_front  =  getSetting('','','paypal_mode_front');   
		   if($paypal_mode_front==0) // local
			{
				$aPaypalsetting['env'] = 'sandbox'; 
				$aPaypalsetting['paypalbaseURL'] = 'https://api.sandbox.paypal.com/v1/'; 
				$aPaypalsetting['paypalclientID'] = 'AdQJBq4-Cq74TG1-2kIOsfGRNY3DhCo8VHSRc_-qMEnjCmbbKttcVdUuDYn-hoRk0CJoB9_SDAQpNdUo'; 
				$aPaypalsetting['paypalSecret'] = 'EMF9Tbm8aGZ-bvWvBCrYXAXXwaXVZaV_h2cRXN5yTbqubIBKrFp9Mqi7lld5MoTonUbk9vvFKlJmUre-'; 	 
			 
			}
			else
			if($paypal_mode_front==1) // live
			{
				$aPaypalsetting = array();
				$aPaypalsetting['env'] = 'live'; 
				$aPaypalsetting['paypalbaseURL'] = 'https://api.paypal.com/v1/'; 
				$aPaypalsetting['paypalclientID'] = 'AWbhXRRfqFFsRuO4eo1oyqSifLloQAfUFELnLsgN7C7v4erCqb6n20ZGJh33h0XJg20aPy7T_La2g1YS'; 
				$aPaypalsetting['paypalSecret'] = 'EHyvmLRxWvUbj_mjq1xECDyIfOub02KO8cgQ3-XWMn1XQXQq3MHwHL8yBNKFPKDXsARdMvefAudIIWDw';   
			}
	 }
	 
		
		return $aPaypalsetting; 
   }
   
   

	//function getSetting($processing_fee='',$servicecharges ='')
  function getSetting($processing_fee='',$servicecharges ='',$settingcol='')
	{
   // servicecharges work here
		$CI =& get_instance();
		
		if(! empty($settingcol))
		{
		    $row  = $CI->db->select($settingcol)->from('setting')->where('id',1)->get()->row();	
			return $row->$settingcol;
		}
		
		
        if(! empty($processing_fee))
		{
		    $row  = $CI->db->select('*')->from('setting')->where('id',1)->get()->row();	
			return $row->service_fee;
		}
		
		//echo calculatepercentage(100);
		//die();
		
		return $CI->db->select('*')->from('setting')->where('id',1)->get()->row();
   }
  // old
   /*function calculatepercentage($price)
   {
		$servicefee = getSetting(true);
		$percentageprice = 0;
		if(!empty($servicefee) AND ($servicefee > 0) )
		{
		  
		  if(! empty($price))
		  {
		//	 $percentageprice =  ( (int) $price * (int)$servicefee)/100;   
			 $percentageprice =   (int)$servicefee;   
		  }
		  else
		  {
			return 0;  
		  }
	    }
	    return ceil(abs($percentageprice)) + (int)$price; 
	}*/
	
	
	// updated
	
	function calculatepercentage($price,$withoutpercentageprice = '')
    {
		$servicefee = getSetting(true);
		$percentageprice = 0;
		if( empty($withoutpercentageprice))
		{
			if(!empty($servicefee) AND ($servicefee > 0) )
			{
			
				if(! empty($price))
				{
					$percentageprice =  ( (int) $price * (int)$servicefee)/100;   
				//$percentageprice =   (int)$servicefee;   
				}
				else
				{
					return 0;  
				}
		   }
		   return $percentageprice + $price; 
	    }
		else
		{
		 return abs($percentageprice - $price); 	
		}
		
		//return ceil(abs($percentageprice)) + (int)$price; 
		
	    
	}
	  
	 function deductservicechargesamount($price)
		{
			$servicechargesfee = 10;//getSetting(true);
			$priceafterdeduction = 0;
			$percentageprice = 0;
			//$processingfee = calculatepercentage($price,true); // caluclate processing  fee
				
				if(!empty($servicechargesfee) AND ($servicechargesfee > 0) )
				{
				
					if(! empty($price) AND (int)$price > 0 )
					{
						//$price = abs((int) $price  -  (int)$processingfee); // minus processing fee
						$percentageprice =  ( (int)$price * (int)$servicechargesfee)/100; 
						
					}
					else
					{
						return 0;  
					}
					
					$priceafterdeduction =  abs(((int) $price ) - ((int) $percentageprice));
				}
				
				
				return $priceafterdeduction; 
			 
		}
	
    /**|||||||||||||||||||||||||||||||||||||Function calculation for USD|||||||||||||||||||||||||||||||||||||||||||**/
	   
	   function usercurrentcurrency($userid='')
	   {
		
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		if(!empty($userid))
		{
		 $user_id = $userid; 	 
		}
		
		 if(empty($user_id))
		 {
		   return 'USD';	 
		 }
		 
		$queryrow = $CI->db->query("SELECT  (IF(TC.currency_code='NGN','NGN','$')) AS currency_code   FROM `users` AS U INNER JOIN tbl_currency AS TC ON TC.currency_id = U.currency_id
WHERE U.id = ".$user_id."")->row();
		
		
		$currencycode = '$';
		if(! empty( $queryrow->currency_code))
		{
		 
			$currencycode =   $queryrow->currency_code;
		}
		
		return $currencycode;   
		   
	   }
	   
	   // convertpricetoUSD for save data check
	   function convertpricetoUSD($amount )
	   {
		
			$usercurrencyunit = usercurrentcurrency();
			$currencycurrentrate = getcurrencyrate($usercurrencyunit);
		    $convertedamounttoUSD =  $amount * (float)$currencycurrentrate;
		
			if($convertedamounttoUSD <= 2) // compared 5 USD min price
			{
				
				return 0;
			}
			else
			if($convertedamounttoUSD >= 5000) // 5000 USD max price
			{  
			  return 1;	
			} 
		    
		    return $convertedamounttoUSD;
	   }
	   
	   // for get exchange rate
	   function getcurrencyrate( $fromcurrency , $tocurrecny ='USD' ) // for only NGN rest remain same 
	   {
		
		// 361.00
		$url = "https://free.currencyconverterapi.com/api/v5/convert?q=".$fromcurrency."_".$tocurrecny."&&compact=ultra&apiKey=5a9b87f6d2ecb5da0ba6";
		$unit = $fromcurrency.'_USD';
		if($fromcurrency =='NGN' AND $tocurrecny =='USD')
		{
			return  0.0028;	
		}
		else
		if($fromcurrency =='USD' AND $tocurrecny =='NGN')
		{
			return  361.50;		
		}
		else
		if($fromcurrency =='USD' AND $tocurrecny =='USD')
		{
			return  1;		
		}
		
		
		
	//	return 0.0028;//number_format(0.006389, 4);
		
			/*$ch = curl_init();
			$timeout = 0;
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$rawdata = curl_exec($ch);
			curl_close($ch);
			$convertResult = json_decode($rawdata);
	    return $convertResult->$unit;*/
		
	   }
	   
	   function calculatefromtoconvertedprice($fromcurrency , $tocurrecny ,$amount )
	   {
		   $exchangerate =  getcurrencyrate($fromcurrency , $tocurrecny); 
		   return $amount * $exchangerate; 
	   }
	   
	
	/**|||||||||||||||||||||||||||||||||||||Function calculation for USD|||||||||||||||||||||||||||||||||||||||||||**/
	
	
	


	function get_row_by_key($col,$key,$value,$table)

	{

	  if(!empty($key))

	  {

		$CI =& get_instance();

		$result  = $CI->db->select($col)->from($table)->where($key,$value)->get()->row();

		return $result;

	  }

	}
   
   
   function get_row($col='*',$table,  $awhere = array() )

		{

			$CI =& get_instance();

			return  $row = $CI->db->select($col)->from($table )->where($awhere)->get()->row();

		}

   
   
   
   
   
	

	function get_id_by_key($col,$key,$value,$table,$multicoulmn = '')

	{

	  if(!empty($key))
	  {
       $CI =& get_instance();
       
			if(empty($multicoulmn))
			{
				$result  = $CI->db->select($col)->from($table)->where($key,$value)->get()->row();
				return $result->$col;
			
			}
			else
			{
				$result  = $CI->db->select($col)->from($table)->where($key,$value)->get()->row();
				
				return $result;
			}

	  }

	}

	 

		function get_row_all($col,$key='',$value='',$table,$userwherearray = '')

		{

		   $adata = array();

			$CI =& get_instance();
			if(! empty($userwherearray))
			{
			 $result  = $CI->db->select($col)->from($table)->where( $userwherearray )->get();	
				
			}
			else
			{
			

				if(empty($key) and empty($value))
	
				{
	
					$result  = $CI->db->select($col)->from($table)->get();
	
				}
				else
	
				{
	
					$result  = $CI->db->select($col)->from($table)->where($key,$value)->get();	
	
				}
			
			}
			if ($result->num_rows()>0){

				foreach($result->result() as $row)

				{

					$adata[] =  $row;

				}

			}

			

			return $adata;

		}

	  
	   // is exist
	  function is_exist($key,$value,$table,$aWhere='')
	  {
		  
		    $adata = array();
			$CI =& get_instance();
			if(is_array($aWhere) and count($aWhere)>0)
			{
			  
			  $result  = $CI->db->select('*')->from($table)->where($aWhere)->get();	 	
				
			}
			else
			{
			  $result  = $CI->db->select('*')->from($table)->where($key,$value)->get();		
				
			}
			
			
			
			$data = 0;
			if ($result->num_rows()>0)
			{
				
			 $data = 1 ;	
			}
			
			return $data;
		  
		    
	  }
	  

	  function getfreelancerskill($freelancerid)

		{

			

		if(empty($freelancerid))	

		{

		 exit;	

		}

			 $CI =& get_instance();

			$query= $CI->db->query("SELECT title  as skill FROM `skills`

			Inner join tbl_freelancer_skill ON skills.id =  tbl_freelancer_skill.skill_id

			WHERE tbl_freelancer_skill.freelancer_id ='".$freelancerid."'");

			

			$html = '';

		
			if(count($query->result()) >  0)

				{   

				$html .='<h5>Skills</h5>';

				$html .='<ul class="skills">';

					foreach ($query->result() as $row)

					{

						$html .='<li>'.$row->skill.'</li>';

					}

				$html .='</ul>';

				}

			

			return $html;

		}

	 

	  

	  

	  

	 

function getbanner($default_image){

	$file=FCPATH.'uploads/';

		$CI =& get_instance();

		$image =$CI->db->select('banner')->from('setting')->get()->row()->banner;

		if($image!='' ){

			$imagePath=$file.$image;

			if (file_exists($imagePath)){

			$image= IMG.$image;

			}

			return $image;

		}else{

			return $default_image;

			}

		

	}

function truncate($string,$length=40,$append="&hellip;") {

  $string = trim($string);



  if(strlen($string) > $length) {

    $string = wordwrap($string, $length);

    $string = explode("\n", $string, 2);

    $string = $string[0] . $append;

  }



  return $string;

}

function html_cut($text, $max_length)

{

    $tags   = array();

    $result = "";



    $is_open   = false;

    $grab_open = false;

    $is_close  = false;

    $in_double_quotes = false;

    $in_single_quotes = false;

    $tag = "";



    $i = 0;

    $stripped = 0;



    $stripped_text = strip_tags($text);



    while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)

    {

        $symbol  = $text{$i};

        $result .= $symbol;



        switch ($symbol)

        {

           case '<':

                $is_open   = true;

                $grab_open = true;

                break;



           case '"':

               if ($in_double_quotes)

                   $in_double_quotes = false;

               else

                   $in_double_quotes = true;



            break;



            case "'":

              if ($in_single_quotes)

                  $in_single_quotes = false;

              else

                  $in_single_quotes = true;



            break;



            case '/':

                if ($is_open && !$in_double_quotes && !$in_single_quotes)

                {

                    $is_close  = true;

                    $is_open   = false;

                    $grab_open = false;

                }



                break;



            case ' ':

                if ($is_open)

                    $grab_open = false;

                else

                    $stripped++;



                break;



            case '>':

                if ($is_open)

                {

                    $is_open   = false;

                    $grab_open = false;

                    array_push($tags, $tag);

                    $tag = "";

                }

                else if ($is_close)

                {

                    $is_close = false;

                    array_pop($tags);

                    $tag = "";

                }



                break;



            default:

                if ($grab_open || $is_close)

                    $tag .= $symbol;



                if (!$is_open && !$is_close)

                    $stripped++;

        }



        $i++;

    }



    while ($tags)

        $result .= "</".array_pop($tags).">";



    return strip_tags($result).' ...';

}

 	function checkExist($table,$where)

		{

		$CI =& get_instance();

		$data =$CI->db->select('*')->from($table)->where($where)->get();

		if ($data->num_rows()>0){

			return 1;
		}
		else{
			return 0;
		}

			

		}

 	function getRelatedPackages($id)

		{

		$CI =& get_instance();

		$package_type =$CI->db->select('package_type')->from('product')->where('id',$id)->get()->row()->package_type;

		

		$where=array('p.package_type'=>$package_type);

		$data =$CI->db->select('*')->from('product as p')->join('product_images as pi', 'p.id = pi.product_id')->where($where)->order_by('p.id',"desc")->limit(4)->get();

		

		if ($data->num_rows()>0){

			return $data;

		}

			else{

			return 0;

			}

			

		}

	

function get_cat()

	{

		$CI =& get_instance();

		 $query=$CI->db->query("SELECT * FROM categories");

		 return $query;

	}

function freelancerParentCategories()

	{

		$CI =& get_instance();

		 $query=$CI->db->query("SELECT * FROM categories where type_id=".FRERLANCER." and parent_id=0");

		 return $query;

	}

	

	function freelancerCatOptions($id='')

	{

		$CI =& get_instance();

		$where = '';

		if(!empty($id))

		{

		 $where = ' AND id='.$id;

		}

	   // $query=$CI->db->query("SELECT id,title FROM tbl_menu WHERE status=1 ".$where."");

		//die();

		$query=$CI->db->query("SELECT id,title FROM tbl_menu WHERE status=1 ");

		if(empty($where))

		{

			$options.='<option  value="">Choose area of interest</option>';

		}

		foreach($query->result() as $row)

		{

			

			$options.='<option value="'.$row->id.'"  '.(($row->id==$id) ? 'selected' : '').'  >'.$row->title.'</option>';

		}

		return $options;

	}



  function getYoutubeImage($e){



        //GET THE URL



        $url = $e;



        $queryString = parse_url($url, PHP_URL_QUERY);



        parse_str($queryString, $params);



        $v = $params['v'];  



        //DISPLAY THE IMAGE



        if(strlen($v)>0){



             $src ='http://i3.ytimg.com/vi/'.$v.'/default.jpg';



			return $src;



        }



    }



	



    function getHead(){



		$CI = &get_instance();



		return $CI->load->view("admin/header");



    }   



    function getFooter(){



		$CI = &get_instance();



		return $CI->load->view("admin/footer");



		



    }



	    function getMyscript(){



		$CI = &get_instance();



		return $CI->load->view("admin/myscript");



    }   











	function if_active($url){



	if (strpos($_SERVER['REQUEST_URI'], $url) !== false){



	echo  'active';



	}



	



	



	}



	if(!function_exists('view_loader')){



		function view_loader($view, $vars=array(), $output = false){



		$CI = &get_instance();



		return $CI->load->view($view, $vars, $output);



		}



	}



	
	function parse_custom_encyrpted_string( $key,$str)
	{
		
		//[sellerservicenonouce__] => 8235_nounce_NDI-skillsquard_nounce_1
		//[buyernonouce__] => buyer-request-list-ui21148_nounce_Mjc=_nounce_0
			if($key =='service_id')
			{
				$astr = explode("_nounce_",$str) ;
				$rawserviceid = $astr[1];
				$secodedserviceid = str_replace('-skillsquard','=',$rawserviceid);
				
				return $serviceid = base64_decode($secodedserviceid);
			
			}
			else
			if($key =='buyer_request_id')
			{
				$astr = explode("_nounce_",$str) ;
				$rawbuyerid = $astr[1];
				return $buyerid = base64_decode($rawbuyerid);
			
			}
	}

 
	/****/



function reset_pasword_if_email_exist($email){ 



		 $CI =& get_instance();



		 $arr=array('email'=>$email);



		 $data =$CI->db->select('*')->where($arr)->get('users');



		



		if ($data->num_rows()>0){



		  



		    $key = randomKey(6);



		    $password = md5($key);



		    $data_array = array('password' =>$password);



				$CI->db->where('email', $email);



				$result=$CI->db->update('truth_users',$data_array); 



		    if($result){  



		        return $key;



		    }



			



		}else{



			return 0;



		}



	}



	function randomKey($length) {



    $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));



$key='';



    for($i=0; $i < $length; $i++) {



        $key .= $pool[mt_rand(0, count($pool) - 1)];



    }



    return $key;



}





function existInProductGroup($product_id,$group_id){



		

		

		 $CI =& get_instance();



		$CI->db->select('*')->from('product_extra_group')->where(array('product_id'=>$product_id,'group_id'=>$group_id));



		$data = $CI->db->get();



		if ($data->num_rows()>0){



			return 1;



		}else{



			return 0;



		}

		

		

		



	}





	function getProductGroupTitle($product_id){

		$CI =& get_instance();

		 $data=$CI->db->query("SELECT e.title FROM `product_extra_group` as pg  

join extras_group as e on e.id=pg.group_id

where product_id='".$product_id."'");

if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}

	function getExtraMenu($arr){

		$CI =& get_instance();

		 $data=$CI->db->query("SELECT * FROM `extras` where group_id IN(".$arr.") and status=1");

if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}

	function getExtraMenuById($group_id){

		$CI =& get_instance();

		 $data=$CI->db->query("SELECT * FROM `extras` where group_id='".$group_id."' and status=1");

if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}

	

	function getExtraoptions($arr){

		$CI =& get_instance();

		 $data=$CI->db->query("SELECT * FROM `extras` where id IN(".$arr.") and status=1");

if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}

	



		function getExtrasSelectbox($group_id,$product_id){

			$CI =& get_instance();

			$data=$CI->db->query("SELECT * FROM `extras` where group_id='".$group_id."' and status=1");

			

			if ($data->num_rows()>0){

			$html .='<select id="select_'.$product_id.'" name="select_box" class="form-control select_'.$product_id.'">';

			foreach($data->result() as $option){

			$price='';

			if($option->price>0){

			$price = '(€'.$option->price.')';

			}

			$html .='<option value="'.$option->id.'">'.$option->title.' '.$price.'</option>';

			}

			$html .='</select><br>';

			return  $html;

			}else{

			

			return 0;

			

			}

		

		}



	function getExtraMenu_by_id($arr){

		$CI =& get_instance();

		 $data=$CI->db->query("SELECT e.*,eg.title as extraType FROM `extras` as e

join extras_group as eg on eg.id=e.group_id 

where e.id IN(".$arr.") and e.status=1");

		 

	

if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}



	/**************************getting data from tables *******************************/



	function get_table($tableName)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT * FROM ".$tableName." ");



		 return $query;



	}



	



	function get_All_by_fieldName($field,$tableName)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT ".$field." as title FROM ".$tableName." ");



		 return $query->row()->title;



	}



	



	 function select_from_where($fields,$table,$field,$val){ 



		 $CI =& get_instance();



		$CI->db->select($fields)->from($table)->where($field,$val);



		$data = $CI->db->get();



		if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}



	



	



	



	function select_this($thisField,$table){



		 $CI =& get_instance();



		$CI->db->distinct();



		$CI->db->select($thisField)->from($table);



		$data = $CI->db->get();



	



		if ($data->num_rows()>0){



			return $data;



		}else{



			return 0;



		}



	}



	function get_where($id,$tableName,$col='*'){



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT ".$col." FROM ".$tableName." WHERE id ='".$id."'");



		 return $query->row();



	}

function get_product_data($id){



		$CI =& get_instance();



		$data=$CI->db->select('*')->from('product')->where('id',$id)->get();



		if ($data->num_rows()>0){



			return $data->row();



		}else{



			return 0;



		}



	}



	function get_last_record($tableName){



		$CI =& get_instance();



	$last_row=$CI->db->select('*')->order_by('id',"desc")->limit(1)->get($tableName)->row();



		 return $last_row;



	}

function getTotalOrderCountOfService($serviceID){
	$CI =& get_instance();
	$q="SELECT count(o.seller_offer_request_id) total  FROM `tbl_seller_offer_to_request` as r
join `order` as o on o.seller_offer_request_id=r.id
where r.service_id=".$serviceID;
$res=$CI->db->query($q);
return $res->row()->total;
	}

	function count_where($tableName,$value)
	{
		$CI =& get_instance();
		return $CI->db->where($value)->count_all_results($tableName);
	}
function count_tbl_where($tableName,$condition,$value)
	{
		$CI =& get_instance();
		return $CI->db->where($condition, $value)->count_all_results($tableName);
	}

	function getActiveReqCount()
	{
		$CI =& get_instance();
		return $CI->db->query("SELECT count(*) as total FROM `tbl_buyer_request` where status=1 and buyer_id!='".get_session('user_id')."'")->row()->total;
	}



	



	function getcount($tableName)



	{



		$CI =& get_instance();



		return $CI->db->from($tableName)->count_all_results();



		  



	}



	



	



	



	



		function get_field_where($id,$fields,$tableName){



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT ".$fields." FROM ".$tableName." WHERE id ='".$id."'");



		 return $query->row();



	}



function getStatusType($status){

	$s='';

	if($status==0){

		$s='Submitted';

		}

		elseif($status==1){

			$s='In Process Stage 1/3';

			}

		elseif($status==2){

			$s='In Process Stage 2/3';

			}

		elseif($status==3){

			$s='In Process Stage 3/3';

			}

		elseif($status==4){

			$s='Sampling Stage';

			}

		elseif($status==5){

			$s='Published';

			}

		elseif($status==6){

			$s='Canceled';

			}

			return $s;

	

	}


function timeago($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "(s) ago ";
	   }
	}

function getReviewsByServiceID($service_id){
	$response=array();
	$response['averageRating']=0.0;
		 $CI =& get_instance();
		$data = $CI->db->query('SELECT r.*,u.name,u.image,u.username FROM `tbl_review_rating` as r
join users as u on u.id=r.user_id
where r.service_id='.$service_id);


		$averageRating = $CI->db->query('SELECT AVG(rating) as averageRating FROM tbl_review_rating where service_id='.$service_id)->row()->averageRating;

$response['averageRating']=$averageRating;
$response['reviews']=$data->result_array();
		if ($data->num_rows()>0){
			return $response;
		}
	}

    
	function getfreealncerservices($freelanveruseruserid )
	{
	   $CI =& get_instance();
        $query=$CI->db->query('select TS.*,(SELECT title from tbl_childmenu AS tcm WHERE TS.category_id = tcm.id) AS caetgory_name
		 from tbl_services AS TS WHERE  user_id = "'.$freelanveruseruserid.'" ' );
		
		return $query;
	
	}





	function get_by_where_array($array,$table){



		$CI =& get_instance();



		$query=$CI->db->select('*')->where($array)->get($table);



		return $query;



	}

function get_product_like($keyword){



		$CI =& get_instance();



		$query=$CI->db->query('select * from product where product_name like "%'.$keyword.'%" ' );



		return $query;



	}

	function get_field_by_where_array($field,$array,$table){



		$CI =& get_instance();



		$query=$CI->db->select($field)->where($array)->get($table);



		return $query;



	}



	



		



	function get_random_field_by_where_array($field,$array,$table){



		$CI =& get_instance();



		$query=$CI->db->select($field)->where($array)->order_by('rand()')->get($table);



		return $query;



	}



	







	/*********************************************************************************************/



	function get_tbl_users_rights()



	{



		$CI =& get_instance();



		$query=$CI->db->select('*')->get('users_rights');



		return $query;



	}



	



	function get_usersType_title($id)



	{



		$CI =& get_instance();



		$query=$CI->db->query("SELECT group_title FROM  users_rights WHERE id='".$id."' ");



		 return $query->row()->group_title;



	}



	



	function noData($colspan)



	{



		$row.= '<tr class="noData_row">';



		$row.='<td>'.this_lang("record not found ").'!</td>';



		for($i=1;$i<$colspan;$i++){



			$row.='<td>&nbsp;</td>';



			}



		$row.='</tr>';	



		



		 $row;



	}



		function get_session($variable)



		{



		 $CI =& get_instance();



		 return $CI->session->userdata($variable);



		}



		function this_lang($variable)



	{



		$CI =& get_instance();



		// making constant eg. From User Management to USER_MANAGEMENT



		$constant = $variable;



		$constant = strtoupper($constant); // constant to uppercase



		$constant = str_replace(' ', '_', $constant); // replace spaces with underscore



		$ucfirst_constant =ucfirst($constant); // constant in lo



 		/********************************************/	



		 if($CI->session->userdata($variable)){ 



		 // checking if constant exist in session as passed eg. USER_MANAGEMENT



			  return $CI->session->userdata($variable);



			 }



			



			 else if($CI->session->userdata($constant)){



		 // checking if created constant exist in session 



		 	   return $CI->session->userdata($constant);



				 }



			 else if($CI->session->userdata($ucfirst_constant)){



		 // checking if created constant exist in session 



		 	   return $CI->session->userdata($ucfirst_constant);



				 }



			 else{



				 // if nothing available then return in the form of text like 



				 // USER_MANAGEMENT to User Management 



					$str = str_replace('_', ' ', $variable); 



					$str =strtolower($str);



					$str =  ucwords($str);



					return $str ;



				 }



	}



	function get_unused_id($table,$field)



	{



		// Create a random user id unique_id_number



		



		



		// Make sure the random user_id isn't already in use



		$CI = & get_instance();



		$random_unique_int = izrand(6);



		$CI->db->where($field, $random_unique_int);



		$query = $CI->db->get_where($table);



		if ($query->num_rows() > 0)



		{



		$query->free_result();



		



		// If the random user_id is already in use, get a new number



		$this->get_unused_id();



		}



		



		return $random_unique_int;



	}



	



	function izrand($length = 10) {







                $random_string="";



                while(strlen($random_string)<$length && $length > 0) {



                        $randnum = mt_rand(0,61);



                        $random_string .= ($randnum < 10) ?



                                chr($randnum+48) : ($randnum < 36 ? 



                                        chr($randnum+55) : $randnum+61);



                 }



                return $random_string;



}











	



	function get_title($id,$tableName)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT title FROM ".$tableName." WHERE id ='".$id."'");



		 return $query->row()->title;



	}



	function get_user_type_title($id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT group_title FROM users_rights WHERE id ='".$id."'");



		 return $query->row()->group_title;



	}



	function get_page_content_image($id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT image FROM ".TBL_PAGES_CONTENT_IMAGES." WHERE page_content_id ='".$id."'");



		 return $query->row()->image;



	}



	function get_page_content_images($id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT * FROM ".TBL_PAGES_CONTENT_IMAGES." WHERE page_content_id ='".$id."'");



		 return $query;



	}



	



	

function get_group_name($id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT title   FROM extras_group WHERE id ='".$id."'");



		//echo  $CI->db->last_query(); die('L');



		 return $query->row()->title;



	}

	



	function get_title_by_fieldName($id,$field,$tableName)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT ".$field." as title FROM ".$tableName." WHERE id ='".$id."'");



		//echo  $CI->db->last_query(); die('L');



		 return $query->row()->title;



	}


function getSubmenuTitle($id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT  title FROM tbl_childmenu WHERE id ='".$id."'");



		//echo  $CI->db->last_query(); die('L');



		 return $query->row()->title;



	}
	
 function launages ($selected='')
 {
		
		if(! empty($selected))
		{
		   $aselected = json_decode($selected);	
		}
		$lang = array();
		$lang["AF"]='Afrikanns';
		$lang["SQ"]='Albanian';
		$lang["AR"]='Arabic';
		$lang["HY"]='Armenian';
		$lang["EU"]='Basque';
		$lang["BN"]='Bengali';
		$lang["BG"]='Bulgarian';
		$lang["CA"]='Catalan';
		$lang["KM"]='Cambodian';
		$lang["ZH"]='Chinese (Mandarin)';
		$lang["HR"]='Croation';
		$lang["CS"]='Czech';
		$lang["DA"]='Danish';
		$lang["NL"]='Dutch';
		$lang["EN"]='English';
		$lang["ET"]='Estonian';
		$lang["FJ"]='Fiji';
		$lang["FI"]='Finnish';
		$lang["FR"]='French';
		$lang["KA"]='Georgian';
		$lang["DE"]='German';
		$lang["EL"]='Greek';
		$lang["GU"]='Gujarati';
		$lang["HE"]='Hebrew';
		$lang["HI"]='Hindi';
		$lang["HU"]='Hungarian';
		$lang["IS"]='Icelandic';
		$lang["ID"]='Indonesian';
		$lang["GA"]='Irish';
		$lang["IT"]='Italian';
		$lang["JA"]='Japanese';
		$lang["JW"]='Javanese';
		$lang["KO"]='Korean';
		$lang["LA"]='Latin';
		$lang["LV"]='Latvian';
		$lang["LT"]='Lithuanian';
		$lang["MK"]='Macedonian';
		$lang["MS"]='Malay';
		$lang["ML"]='Malayalam';
		$lang["MT"]='Maltese';
		$lang["MI"]='Maori';
		$lang["MR"]='Marathi';
		$lang["MN"]='Mongolian';
		$lang["NE"]='Nepali';
		$lang["NO"]='Norwegian';
		$lang["FA"]='Persian';
		$lang["PL"]='Polish';
		$lang["PT"]='Portuguese';
		$lang["PA"]='Punjabi';
		$lang["QU"]='Quechua';
		$lang["RO"]='Romanian';
		$lang["RU"]='Russian';
		$lang["SM"]='Samoan';
		$lang["SR"]='Serbian';
		$lang["SK"]='Slovak';
		$lang["SL"]='Slovenian';
		$lang["ES"]='Spanish';
		$lang["SW"]='Swahili';
		$lang["SV"]='Swedish';
		$lang["TA"]='Tamil';
		$lang["TT"]='Tatar';
		$lang["TE"]='Telugu';
		$lang["TH"]='Thai';
		$lang["BO"]='Tibetan';
		$lang["TO"]='Tonga';
		$lang["TR"]='Turkish';
		$lang["UK"]='Ukranian';
		$lang["UR"]='Urdu';
		$lang[" UZ"]='Uzbek';
		$lang["VI"]='Vietnamese';
		$lang["CY"]='Welsh';
		$lang["XH"]='Xhosa';
		$lang["YRBA"]='Yoruba';
		$lang["HAUS"]='Hausa';
		$lang["IGB"]='Igbo';
		
		
		$opt = ''; 
		
		foreach($lang as $key=>$value)
		{
			$s='';
			if(is_array($aselected) AND in_array($value,$aselected))
			{
				$s = 'selected="selected"';
			}
			
			
			$opt .='<option value="'.$value.'"  '.$s.'>'.$value.'</option>'; 	
		
		}
							 
		
		return $opt;
 
  	 
}
 


	function get_table_by_user_id($tableName,$id)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT * FROM ".$tableName." WHERE user_id =".$id."");



		 return $query;



	}	



	



	



	



	function get_by_status($tableName)



	{



		$CI =& get_instance();



		 $query=$CI->db->query("SELECT * FROM ".$tableName." where status = 1 ");



		 return $query;



	}


	function getcategoriesforfilter_old() // old work
	{

		$CI =& get_instance();
		
		$query=$CI->db->query("SELECT  DISTINCT TS.category_id,count(TS.category_id) AS data_count, (SELECT title FROM tbl_childmenu AS TCM WHERE TCM.id = TS.category_id) AS category_title FROM `tbl_services` AS TS WHERE TS.status = 1  GROUP BY TS.category_id ORDER BY  TS.category_id ASC");
//lq();
		if ($query->num_rows()>0){
		
		     return $query->result();
		}

		 return 0;
  }
  
  
  /* function getcategoriesforfilter()
	{

		$CI =& get_instance();
		
		$query=$CI->db->query("SELECT  TM.id AS category_id,TM.title as category_title,
sum((SELECT count(tbl_services.id) FROM  tbl_services 
     INNER JOIN users as U ON U.id = tbl_services.user_id
     
     WHERE tbl_services.category_id =TCM.id )) AS data_count FROM `tbl_childmenu` AS TCM LEFT JOIN `tbl_submenu` AS TSM ON TCM.sub_menu_id = TSM.id 
INNER JOIN `tbl_menu` AS TM ON TCM.menu_id = TM.id 
WHERE TM.status ='".ACTIVE."'AND TCM.status = '".ACTIVE."' 
 group by  category_id ORDER BY TM.`id` ASC");
 

		if ($query->num_rows()>0){
		
		     return $query->result();
		}
		return 0;
  }*/
  // 
  
   function getcategoriesforfilter() 
	{

		$CI =& get_instance();
		
		$query=$CI->db->query("SELECT id AS category_id,title as category_title  FROM `tbl_menu`");
 


		if ($query->num_rows()>0){
		
		     return $query->result();
		}
		return 0;
  }
  
  
  function getidsformainmenus($categoryids )
  {
	  
	  //echo "categoryids".$categoryids;
	  $categoryidsand = '';
	  if(!empty($categoryids))
	  {
		 $categoryidsand = ' AND TM.id  IN ('.$categoryids.')';  
	  }
	  
	 //echo '-->'.$categoryidsand;
	  //die();
	    $CI =& get_instance();
		$query=$CI->db->query("SELECT TM.id AS catergoy_id,TCM.id as child_id FROM `tbl_childmenu` AS TCM LEFT JOIN `tbl_submenu` AS TSM ON TCM.sub_menu_id = TSM.id INNER    JOIN `tbl_menu` AS TM ON TCM.menu_id = TM.id WHERE TM.status = '".ACTIVE."' AND TCM.status = '".ACTIVE."' ".$categoryidsand." 
		 
		 ORDER BY TM.`id` ASC");
		 
		
		 
		 

 		$childids = array();
		if ($query->num_rows()>0){
		     
			
		     foreach($query->result() as $row)
			 {
				$childids[] = $row->child_id;
			 }
		}
	  return implode(',',$childids);
	    
  }   
  
  
  
	
function getcountriescitiesforfilter()
	{

		$CI =& get_instance();
		$query=$CI->db->query("
			SELECT country as country_id,city as city_id,COUNT(country) as total_record,
			(SELECT name FROM tbl_countries AS TC WHERE TC.id = L.country ) AS country_name ,
			(SELECT name FROM tbl_cities AS TCC WHERE TCC.id = L.city ) AS city_name     
			
			FROM `location` AS L
			INNER JOIN freelancers AS F ON F.location_id = L.id 
			INNER JOIN tbl_services AS TS ON TS.user_id = F.user_id WHERE TS.status = 1
			group by city
		");
		
		
        $alocationFilter = array();

		if ($query->num_rows()>0){
		
				$totalrecord = array();
				foreach ($query->result() as $row)
				{ 
				    $counter = 0 ;	
					$alocationFilter[ $row->country_name]['city_name'][$row->city_id] = $row->city_name.'<span class="pull-right">'.$row->total_record.'</span>';
					
					
				}
		 
			 return $alocationFilter ;
		}

		 return 0;
  }

	 function getshifttimefilter() // changed
		{
	
				$CI =& get_instance();
				/*$query=$CI->db->query("SELECT F.availablity,count(F.availablity) as total_record FROM `tbl_services` AS TS
				INNER join freelancers AS F ON F.user_id = TS.user_id WHERE TS.status = 1
				group by F.availablity");
				lq();*/
				
				$query=$CI->db->query("SELECT F.availablity,(SELECT count(TS.id) FROM tbl_services AS TS WHERE F.user_id = TS.user_id) AS service_count FROM `freelancers` AS F Where F.type ='normal' ");
				
				$ashifting = array();
				if ($query->num_rows()>0)
				{
				  $parttimerservice_countresult = 0;
				  $fulltimerservice_countresult = 0;
				
				  foreach($query->result() as $row)
				  {
					 if($row->availablity =='full-time')
					 {
						 $fulltimerservice_countresult =   $fulltimerservice_countresult + $row->service_count ; 
					 }
					 else
					 {
						 $parttimerservice_countresult = $parttimerservice_countresult + $row->service_count;  
					 }
					  
					
				  }
					$ashifting['full-time'] =  $fulltimerservice_countresult; 
					$ashifting['part-time'] =  $parttimerservice_countresult;  
					
				}
				
				return $ashifting;
	    }
  
  
			function getstatusfilter()
			{
			
				$CI =& get_instance();
				$query=$CI->db->query("SELECT DISTINCT U.online AS online_status,count(U.online) as total_record FROM `tbl_services` AS TS
				INNER join  users AS U ON U.id = TS.user_id WHERE TS.status = 1
				GROUP by U.online");
				
				if ($query->num_rows()>0)
				{
				
					return $query->result();
				}
				
				return 0;
			}

	
      
	  

		function send_mail($to, $from, $from_heading, $subject, $htmlContent)
		{
			 $CI =& get_instance();
			 $CI->load->library('email');
			$config = Array(
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			);
			 $CI->email->initialize($config);
			 $CI->email->from($from, $from_heading);
			 $CI->email->to($to);
			 $CI->email->subject($subject);
			 $CI->email->message($htmlContent);
			if ( $CI->email->send()) {
				return 1;
			} else {
			return 0;
			}
		}

	 /* function send_mail($to, $from, $from_heading, $subject, $htmlContent)
    {
        $this->load->library('email');
        $config = Array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->email->initialize($config);
        $this->email->from($from, $from_heading);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        if ($this->email->send()) {
            return 1;
        } else {
            return 0;
        }
    }*/
      
	   function updatepaidstatus( $aStatus ,$aAmount,$eRmails )
	   {
		   
		  
		 $CI =& get_instance();
		 $apaypaltransactionhistory = array();
		 
		
		 $aselleremails = array();
		 if(is_array($eRmails))
		  {
			  
			 
			for($index = 0 ; $index  < count($eRmails) ; $index ++)
			{
				
				$user_id =  get_id_by_key('user_id','email',$eRmails[$index],'payment_requests');
				if($aStatus[$index] ==PAID)
				{
 				   
				   
				    $data = $CI->db->query(" UPDATE `tbl_seller_balance` 
					SET available_bal = available_bal - ".$aAmount[$index].", total_withdrwal = total_withdrwal + ".$aAmount[$index]." 
					WHERE seller_id = '".$user_id."'");
					
					$data = $CI->db->query("UPDATE  `payment_requests` AS PR SET PR.status = '".PAID."'  WHERE  PR.user_id = '".$user_id."'
					AND PR.status=".PENDING."");
					
					$to = $eRmails[$index];
					$content ='Your withdrawl request have been completed with amount of  $ '.$aAmount[$index].' '.$convertedAmount.'  sent to you Paypal Account.';
					$htmlContent = EmailTemplate(array('status'=>'Success','content'=>$content));
					send_mail($to, FROM, HEADING, 'PAYMENT WITHDRAWL STATUS COMPLETED', $htmlContent);
					
				}
				else
				if($aStatus[$index] ==CANCELLEDPAYPAL)
				{
 				 	
					$data = $CI->db->query("UPDATE  `payment_requests` AS PR SET PR.status = '".CANCELLEDPAYPAL."'  WHERE  PR.user_id = '".$user_id."'
					AND PR.status=".PENDING."");
					
					$statusText = 'Withdrawl Request Cancel';
					$to = $eRmails[$index];
					$content ='Your withdrawl request have been cancel with amount of  $  '.$aAmount[$index].'.Please Contact you Skillsqaurd Support Team.';
					$htmlContent = EmailTemplate(array('status'=>'Failed','content'=>$content));
					send_mail($to, FROM, HEADING, 'PAYMENT WITHDRAWL FAILED', $htmlContent);
				}
			}  
		 }
	 }
	 
	 
	 
	 
	   function updatepaidstatusPaystack( $aStatus ,$aAmount,$eRmails,$aUser_ids ,$aAmount_unit )
	   {
		   
		  
		 $CI =& get_instance();
		 $apaypaltransactionhistory = array();
		 
		
		 $aselleremails = array();
		 if(is_array($aUser_ids) AND (count($aUser_ids) >0))
		  {
		    $exchangerate  = getcurrencyrate('USD','NGN');  
			for($index = 0; $index  < count($aUser_ids) ; $index ++)
			{
				
				$convertedAmount = $aAmount[$index];
				if($aAmount_unit[$index]=='NGN')
				{
				   $convertedAmount = nmf($aAmount[$index]  * $exchangerate);	
				}
				
				
				if($aStatus[$index] ==PAID)
				{
 				   
				   
				    $data = $CI->db->query(" UPDATE `tbl_seller_balance` 
					SET available_bal = available_bal - ".$aAmount[$index].", total_withdrwal = total_withdrwal + ".$aAmount[$index]." 
					WHERE seller_id = '".$aUser_ids[$index]."'");
					
					$data = $CI->db->query("UPDATE  `payment_requests_paystack` AS PR SET PR.status = '".PAID."'  
					WHERE  PR.user_id = '".$aUser_ids[$index]."'
					AND PR.status=".PENDING."");
					

					$to = $eRmails[$index];
					$content ='Your withdrawl request have been completed with amount of  '.$aAmount_unit[$index].' '.$convertedAmount.' sent to your Bank Account';
					$htmlContent = EmailTemplate(array('status'=>'Success','content'=>$content));
					send_mail($to, FROM, HEADING, 'PAYMENT WITHDRAWL STATUS COMPLETED', $htmlContent);
					
				}
				else
				if($aStatus[$index] == CANCELLEDPAYPAL)
				{
 				 	
					$data = $CI->db->query("UPDATE  `payment_requests_paystack` AS PR SET PR.status = '".CANCELLEDPAYPAL."'  
					WHERE  PR.user_id = '".$aUser_ids[$index]."'
					AND PR.status=".PENDING."");
					
					$statusText = 'Withdrawl Request Cancel';
					$to = $eRmails[$index];
					$content ='Your withdrawl request have been cancel with amount of  '.$aAmount_unit[$index].' '.$convertedAmount.' ';
					$htmlContent = EmailTemplate(array('status'=>'Failed','content'=>$content));
					
					send_mail($to, FROM, HEADING, 'PAYMENT WITHDRAWL FAILED', $htmlContent);
				}
			}  
		 }
	 }
	 
	 
	 function EmailTemplate($aData =array())
	 {
	    
		 if(is_array($aData) AND (count($aData) > 0))
		 {
		 $template ='
				<!DOCTYPE html>
				<html lang="en">
				<head>
				  <title>Skillsqaurd </title>
				  <meta charset="utf-8">
				  <meta name="viewport" content="width=device-width, initial-scale=1">
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
				  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
					
				</head>
				<body>
				
				<div class="container" id="container_div" style="width:78%;
						background: #f1f1f1;
						opacity: 0.9; 
						border:1px dashed black;padding: 12px;">
					    '.TemplateHeader($aData).' 
				  <div class="row">
					<div class="col-sm-12" style="padding-left: 30px;">
					  
						  <p>Dear Skillsqaurd user,</p>
						  <p>'.$aData['content'].'</p>
						  <p>Regards,</p> 
						  </br>
						  <p>Skillsqaurd Team</p></br>
						   </br>
					</div>
				  </div>'.TemplateFooter().'</div> 
				  
				 </body>
				</html>

              '; 
	     return $template;	 	 
       }
	 }

		function TemplateHeader($aData = array())
		{
		   
		   $tempHeader = '
				<div id="heading_ss" class="jumbotron text-center " style="padding: 9px;
					background: #254c33ad !important;
					margin-top: 11px;border-radius: 4px;">
					<a href="'.base_url().'" target="_blank"><img src="'.getlogo('assets/img/logo.png').'"  style="float:left;
					margin: 6px 0px 0px 20px;"></a>
					<h1 style="font-size: 21px;
					text-align: right;
					color: #f4f4f4;padding: 0px 100px 0px 0px;">Withdrawal Response Status:'.$aData['status'].' </h1>
				</div>';
	
	        return $tempHeader;
		}
		
		
		function TemplateFooter()
		{
			
			$tempfooter = '
			<div id="footer_ss" class="jumbotron text-center " style="	background: #1c2733 !important;
			margin: 0 auto;
			border-radius: 0;
			padding: 30px 20px 10px 20px !important;">
			<p style="font-size: 12px;
			color: #ddd;
			font-family: arial;"><strong>Disclaimer</strong> : Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
			</nav>
			</div>
			<div id="footer_ss_sub" class="jumbotron text-center " style="background: #111922 !important;padding: 3px;margin: 0 auto;
			border-radius: 0;
			">
			<nav class="navbar navbar-default" style=" background:none !important;
			border:none !important;">
			<div class="container-fluid" style="border:none !important;">
			
			<ul class="nav navbar-nav" style="margin-left: 17%;">
			<li style="float:left;"><a href="'.base_url().'" style="background: none;
			color: white;
			font-size: 12px; 
			padding: 10px 10px 10px 10px; " target="_blank">Home</a></li>
			<li style="float:left;"><a href="'.base_url().'about-us" style="background: none;
			color: white;
			font-size: 12px; 
			padding: 10px 10px 10px 10px;" target="_blank">About us</a></li>
			<li style="float:left;"><a href="'.base_url().'terms" style="background: none;
			color: white;
			font-size: 12px; 
			padding: 10px 10px 10px 10px;">Privacy Policy</a></li> 
			<li style="float:left;"><a href="'.base_url().'freelancers" style="background: none;
			color: white;
			font-size: 12px; 
			padding: 10px 10px 10px 10px;" target="_blank">Freelacers</a></li> 
			<li style="float:left;"><a href="'.base_url().'contact" style="background: none;
			color: white;
			font-size: 12px; 
			padding: 10px 10px 10px 10px;" target="_blank">Contact us</a></li>
			</ul>
			
			</div>
			
			</nav>
			<div style="clear:both;"></div>
			<p style="padding: 0px;
			font-size: 11px; text-align: center;
			color: #ddd;">Copyright Skill Squared © 2017. All Rights Reserved </p>
			</div>';
	
	   return $tempfooter;
	}
		



   function newsdetailurl($title,$detailurl)
   {
	    $mainurl = base_url().'news/';
		if(! empty ($title) AND !empty($detailurl))
		{
			$mainurl  = $mainurl. base64_encode($detailurl);
		  //newslink	
		}
		
		return $mainurl;
	}
    
	function newsdetailurl_decode($urlstr)
   {
	    $mainurl ='';
		if(! empty ($urlstr))
		{
			$mainurl  = base64_decode($urlstr);
		  //newslink	
		}
		
		return $mainurl;
		
		     
   }

   
   /***Arslan***/
	
   
   function columncount($key,$value, $table)
	  {
		  
		    $adata = array();
			$CI =& get_instance();
			$data = 0;
			if(! empty($key))
			{
				$result = $CI->db->query("SELECT count(".$key.") AS total FROM  `".$table."` WHERE ".$key."=".$value."");	
				$row = $result->result_array();
				$data = $row[0]['total'] ;	
			}
			
			
			return $data;
		  
		    
	  }
     
	 function updatesellerbalance($sellerid,$amount)
	  {
		  
		    $adata = array();
			$CI =& get_instance();
			if(! empty($sellerid))
			{
				if(! empty($amount) AND $amount <=0)
				{
				 return 0;	
				}
				
				
				$data = $CI->db->query("UPDATE  `tbl_seller_balance` AS PR SET PR.available_bal =PR.available_bal + ".$amount."  
				WHERE  PR.seller_id = '".$sellerid."'");	
				
				return 1;
			}
			
		  return 0;
		    
	  }
	 
	 
	 
	function sellerbalancemaintaince($data_array)
	 {
		if(is_array($data_array) AND count($data_array) > 0 )
		{
			
				$CI =& get_instance(); 
				$CI->db->insert('tbl_seller_payment_account', $data_array); // add row to seller balcnec list
				setNotify(array('user_id'=>$data_array['seller_id'],'body'=>NEW_ORDER,'redirect_link'=>'','created_on'=>NOW,'type'=>ORDER));
		}
	  
	  }
	
     //
     function updatebalancewhenbuyermarkcomplete($data_array)
	 {
		  
			
			$CI =& get_instance();
			$colcount = columncount('seller_id',$data_array['seller_id'],'tbl_seller_balance');
		
			if($colcount > 0)
			{
				updatesellerbalance($data_array['seller_id'],$data_array['amount']  );
			}
			else
			{
				$asellerBalance = array('seller_id'=>$data_array['seller_id'] ,'available_bal'=>$data_array['amount'],'created_date'=>NOW);
				$CI->db->insert('tbl_seller_balance',$asellerBalance); // update the balance if exist... // insert into account                          
			}
	 }
  
  
  
	 
		function checksellerpreviosrequest($seller_id )
		{
		
			$adata = array();
			$CI =& get_instance();
			$checkintopaystack = 0;
			$result  = $CI->db->select('user_id')->from('payment_requests_paystack')->where(array('user_id'=>$seller_id,'status'=>PENDING))->get();
			if ($result->num_rows()>0)
			{
				$checkintopaystack = 1;	
			}
			
			$checkintopaypal = checksellerpreviosrequest_paypal($seller_id);
			
			$result =1;
			if(($checkintopaystack==0) AND  ($checkintopaypal==0))
			{
			   $result = 0;	
				
			}
			
			return $result;
		}
		
		
		function checksellerpreviosrequest_paypal($seller_id )
		{
		
			$adata = array();
			$CI =& get_instance();
			$data = 0;  
			$result  = $CI->db->select('user_id')->from('payment_requests')->where(array('user_id'=>$seller_id,'status'=>PENDING))->get();
			if ($result->num_rows()>0)
			{
				$data = 1 ;	
			}
			
			return $data;
		}
		
		
	  

 //arslan
	 
	 function transferbonuspercentageamounttorefferal($amount)
	 {
		
		$CI =& get_instance();
		if(! empty($amount) AND  (int) $amount > 0)
		{
		
			 	 $getreferalidquery = $CI->db->query("SELECT refferal_id FROM tbl_referals WHERE reffered_id='".get_session('user_id')."' LIMIT 0,1");	
			     if($getreferalidquery->num_rows() > 0 )
				 {
				 	$getreferalidqueryrow = $getreferalidquery->result_array();
				 	$referalid = $getreferalidqueryrow[0]['refferal_id'] ;	
					
					$colcount = columncount('seller_id',$referalid,'tbl_seller_balance');
				
					if($colcount > 0)
					{
					
						updatesellerbonusbalance($referalid ,$amount ); // 
					}
					else
					{
					  
						
						$bonuspercnetage =  calculatepercentagebonuspercentage($amount); 
						
						
						$asellerBalance = array('seller_id'=>$referalid ,'available_bal'=>$bonuspercnetage,'total_bonus'=>$bonuspercnetage,'created_date'=>NOW);
						$CI->db->insert('tbl_seller_balance',$asellerBalance); // update the balance if exist... // insert into account                          
					}
				 }
		}
	}
	  
	 function calculatepercentagebonuspercentage($price)
     {
		$servicefee = 2; // set balacne transfer to sender
		$percentageprice = 0;
		if(!empty($servicefee) AND ($servicefee > 0) )
		{
		  
		  if(! empty($price))
		  {
		 	 $percentageprice =  ( (int) $price * (int)$servicefee)/100;   
			 
		  }
		  else
		  {
			return 0;  
		  }
	    }
	    return ceil(abs($percentageprice)); 
	}
	   
	  function updatesellerbonusbalance($referalid,$amount)
	  {
		  
		    $adata = array();
			$CI =& get_instance();
			if(! empty($referalid))
			{   
			   $bonuspercnetage  = 0 ;
				if(! empty($amount) AND $amount <=0)
				{
				 return 0;	
				}
				
				$bonuspercnetage =  calculatepercentagebonuspercentage($amount);
				
				$data = $CI->db->query("UPDATE  `tbl_seller_balance` AS PR SET PR.available_bal =PR.available_bal + ".$bonuspercnetage." , 
				PR.total_bonus =PR.total_bonus + ".$bonuspercnetage."
				WHERE  PR.seller_id = '".$referalid."'");	
				
				return 1;
			}
			
		  return 0;
		    
	  } 
	 
	   
	   
	   
	  function transfercommissiontorefferralonsignup()
	   {
		$amount = (float)0.30;// 1 usd
		$CI =& get_instance();
			if(! empty($amount) AND  (float) $amount > 0)
			{
			
				$getreferalidquery = $CI->db->query("SELECT refferal_id FROM tbl_referals WHERE reffered_id='".get_session('user_id')."' LIMIT 0,1");	
				if($getreferalidquery->num_rows() > 0 )
				{
					$getreferalidqueryrow = $getreferalidquery->result_array();
					$referalid = $getreferalidqueryrow[0]['refferal_id'] ;	
					
					$colcount = columncount('seller_id',$referalid,'tbl_seller_balance');
					$bonusamount =  $amount;
					if($colcount > 0)
					{
						$data = $CI->db->query("UPDATE  `tbl_seller_balance` AS PR SET PR.available_bal =PR.available_bal + ".(float)$bonusamount." , 
						PR.total_bonus = PR.total_bonus + ".(float)$bonusamount."
						WHERE  PR.seller_id = '".$referalid."'");	
					
					}
					else
					{
					
						$asellerBalance = array('seller_id'=>$referalid ,'available_bal'=>$bonusamount,'total_bonus'=>$bonusamount,'created_date'=>NOW);
						$CI->db->insert('tbl_seller_balance',$asellerBalance); // update the balance if exist... // insert into account                          
					}
				}
			}
	  }
	   
     
	   function calculateprocessingformula($price,$withoutpercentagecharge='') // calculates processing fee
	  {
		  if(!empty($price) AND (int)$price > 0)
		  {
			$setting=getSetting();
			$processing_fee_type = $setting->processing_fee_type;
			if(empty($withoutpercentagecharge))
			{ 
				if($processing_fee_type ==0) // percentage price
				{
					$price = calculatepercentage($price);
				}
				else
				if($processing_fee_type ==1) // fixed price 
				{
					$price= $price + $setting->service_fee; 
				}
			}
			else
			{
			   if($processing_fee_type ==0) // percentage price
				{
					$price = calculatepercentage($price,true); // true for withour perceentage addition
				}
				else
				if($processing_fee_type ==1) // fixed price 
				{
					$price= abs($price - $setting->service_fee); 
				}
			   
			   	
			}
			
			  return $price;
		  }
		  return 0;
		  
		  
		  
	  } 
  
  
  function nmf($num)
  {
	 $number = 0;
	 if(! empty($num))
	 {
		$number = number_format($num,2); 
	 }  
	 return $number; 
  }
  
     // is user active
	  function isActiveUsers()
	  {
			if(! empty(get_session('user_id')))
			{
				$isActive =  get_id_by_key('active','id',get_session('user_id'),'users'); 
				if($isActive==SUSPENDED)
				{
				  return SUSPENDED;   
				}
			}
		  
	  }
 
 
   function customOrderCount($seller_id)
	{   
	
	    if(empty($seller_id))
		{
			return 0;	 
		}
		$CI =& get_instance();
		return $CI->db->query("SELECT count(O.custom_order_id) AS total_custom_order FROM `order` AS O INNER JOIN `tbl_custom_buyer_request`  AS TCBR ON O.custom_order_id = TCBR.id WHERE O.status = '".ACTIVE."' AND TCBR.seller_id='".$seller_id."'")->row()->total_custom_order;	
		
	}
	
	
	function normalOrderCount($seller_id)
	{
     
		if(empty($seller_id))
		{
			return 0;	 
		}
		$CI =& get_instance();
		return $CI->db->query("SELECT count(O.seller_offer_request_id) AS total_order FROM `order` AS O INNER JOIN tbl_seller_offer_to_request AS TSOTR ON  O.seller_offer_request_id = TSOTR.id
WHERE O.status = '".ACTIVE."' AND TSOTR.seller_id = '".$seller_id."'")->row()->total_order;	
	}
	
	
		function orderCount()
		{
		
			return customOrderCount(get_session('user_id')) + normalOrderCount(get_session('user_id'));
		
		}
 
   
      function get_thumbnail($image)
	  {
		  if(! empty($image))
		  {
			  $aImage = explode('.',$image); 
			  return   $aImage[0].'_thumb'.'.'.$aImage[1];
			   
		  } 
		  
		   return   0;
		  
	  }
   
    
	
	 function setNotify($data_array)
	   {
			if(is_array($data_array))
			{
				$CI =& get_instance(); 
				$CI->db->insert('tbl_notify', $data_array);
			}
		
		}
 
	  
	  
		function getNotify()
		{
		
			$adata = array();
			$CI =& get_instance();
			$script = '';  
			$getNotify  = $CI->db->select('id,body')->from('tbl_notify')->where(array('user_id'=>$CI->session->userdata('user_id')))->get();
		    
			if ($getNotify->num_rows()>0)
			{
				
				if($getNotify!=0)
				{
					foreach($getNotify->result() as $notify)
					{
					   
							$script .="<script>$.amaran({
							'message'           :'".$notify->body."',
							'cssanimationIn'    :'swing',
							'cssanimationOut'   :'bounceOut',
							'position'  :'bottom right',
							'sticky'    :true,
								'afterEnd'          :function()
								{
										resetNotify('".$notify->id."');
								}
							});</script>";
					   	
					}
				}
			
				
				
			}
			
			return $script;
		}
 
     
	 
	   function emailSenderEvent($sendto='')
	   {
		     
		 
		   $html .= ' <div class="modal fade" id="emailSender">
					  <div class="modal-dialog">
						<div class="modal-content">
					
						 
							 <div class="modal-header">
							<h4 class="modal-title">Send Email</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						  </div>
					
							  <div class="modal-body">
							  
							   <form id="emailsenderform" name="emailsenderform" role="form">
							      
						  <input type="hidden"  id="sendtotype" name="sendtotype" value="'.$sendto.'">
								   <div class="alert hidden"></div>
										<div class="form-group wrap_form">
										<div class="col-xs-12 col-md-12">
										  <label for="exampleInputEmail1"> Subject </label>
											<input type="text" class="form-control" id="email_subject"  placeholder="Subject" name="email_subject" value="">
					
										</div>
										
									
										  <div class="clearfix">&nbsp;</div> <div class="clearfix">&nbsp;</div>
									  <div class="col-xs-12 col-md-12">
										  <label>RAW HTML</label>
											
											<textarea class="form-control" rows="10" id="rawHTML" name="rawHTML"></textarea>
											
					
										</div>
										   <div class="clearfix">&nbsp;</div>
										<div class="col-xs-12 col-md-6">
										  <label for="exampleInputEmail1"> Add  Attachment</label>
										   <input type="file" name="attachmentt" id="attachmentt"  /><div class="clearfix">&nbsp;</div>
										   <div class="topBanner" style="background-color: rgb(0,0,0,0.7);">
										</div>
										 </div> 
										 <div class="clearfix">&nbsp;</div>
										 <div class="pagealert" style="display: block;"> </div>
									 </div>
							   
										<div class="col-xs-12 col-md-12">
											<button type="button" class="btn btn-info btnemail" id="emailSubmitButton">Submit</button>
										</div>
										<div class="clearfix">&nbsp;</div>
										
									</form>
							  </div>
							 <style type="text/css">
							   .btnemail{float: right;margin-right: 12%;}
							 </style>
					
						</div>
					  </div>
			  </div>
			   <style>
		    .btnemailbtn{ float:right; margin-right:15%;margin-top: 2%;}
			.pagealert .error 
			{
				color: #fff;
				margin: 0px;
				background: #C04848;
				font-weight: bold;
				font-size: 12px;
				padding:2px 0px 2px 10px;
				width: 100%;
				font-style: italic;
			}
			.pagealert .success   
			{
				color: #fff;
				margin: 0px;
				background: #00a65a;
				font-weight: bold;
				font-size: 12px;
				padding: 2px 0px 2px 10px;
				width: 100%;
				font-style: italic;
			}
			.pagealert p{ margin-bottom:0px;}
			
          </style>';
		   
		 
		   
		   
		   return $html;
		      
		   
       }
	 
	 
	 
	/*



	---------------



	Debuging



	*/



	function pre($data) {

if(is_array($data))
   {

   echo "<pre>";



      print_r($data);



   echo "</pre>";



   die('<===========>');

   }

	}



	



	 function lq() {



		 $CI =& get_instance();



   echo $CI->db->last_query();



   die(' <=====Last query exe======> ');



	}



	



	



