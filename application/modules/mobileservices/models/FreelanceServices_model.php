<?php
class FreelanceServices_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
    }
	// define all used table    
    private $course_category = 'course_category';
    private $active = 1;
    private $course = 'course';
    private $tbl_course_include = 'tbl_course_include';
    private $tbl_childmenu = 'tbl_childmenu';
    private $tbl_menu = 'tbl_menu';
    private $tbl_submenu = 'tbl_submenu';
    private $freelancers = 'freelancers';
    private $tbl_services = 'tbl_services';
    private $tbl_services_media = 'tbl_services_media';
    private $tbl_review_rating = 'tbl_review_rating';
    private $users = 'users';
    private $location = 'location';
    private $tbl_countries = 'tbl_countries';
    private $tbl_buyer_request = 'tbl_buyer_request';
    private $tbl_cities = 'tbl_cities';
    private $skills = 'skills';
    private $tbl_seller_offer_to_request = 'tbl_seller_offer_to_request';
    private $tbl_freelancer_skill = 'tbl_freelancer_skill';
	private $tbl_order_payments = 'tbl_order_payments';
	private $order_card_detail = 'order_card_detail';
	private $order = 'order';
	private $tbl_custom_buyer_request = 'tbl_custom_buyer_request';
	private $order_files = 'order_files';
	private $tbl_removed_request_by_sellers = 'tbl_removed_request_by_sellers';
	private $tbl_seller_payment_account = 'tbl_seller_payment_account';
	private $tbl_seller_balance = 'tbl_seller_balance';
	private $tbl_wishlist = 'tbl_wishlist';
	private $user_id = USER_ID;
	private $tbl_currency = 'tbl_currency';

	private $tbl_dispute_issues_titles = 'tbl_dispute_issues_titles';

	private $tbl_dispute = 'tbl_dispute';

	private $tbl_dispute_conversation = 'tbl_dispute_conversation';

	


	

	
	  public function getservicesTest($category_id)

     {

        //freelancers
		
		if(isset($_GET["page"]))
			$page = (int)$_GET["page"];
		else
			$page = 1;

		$setLimit = 20;
		$pageLimit = ($page * $setLimit) - $setLimit;
		$sellerservicesidsstr = '';
		
           $query = $this->db->query("
					SELECT TS.id,TS.category_id,TS.title AS service_title,TS.description,TS.unique_id AS uniquekey,U.image AS freelancer_image,
					F.username AS freelancer_username,TS.service_keyword AS servicekeyword ,
					(SELECT TCR.currency_code FROM `".$this->tbl_currency."`  AS TCR WHERE TCR.currency_id = U.currency_id ) AS currency_unit,
					TS.price AS price ,TSM.media,
					(
						SELECT CONCAT( ROUND (sum(rating)/count(rating),1),'=>',count(service_id))    FROM `" . $this->tbl_review_rating . "` 
						WHERE TS.id = tbl_review_rating.service_id
					) 

					AS  service_rating
					FROM `" . $this->tbl_services . "` AS TS 
					INNER JOIN `" . $this->tbl_services_media . "` AS TSM  ON TS.id  = TSM.service_id
					INNER JOIN `" . $this->users . "` AS U  ON U.id  = TS.user_id
					INNER JOIN `" . $this->freelancers . "` AS F  ON F.user_id  = TS.user_id
					WHERE TS.status = ".$this->active."   
					LIMIT ".$pageLimit." , ".$setLimit." ");
					//lq();
		$object=array();
        if (count($query->result()) > 0) {
			foreach($query->result() as $service){
				$service->media=base_url().'uploads/services/media/'.get_thumbnail($service->media);
				$service->freelancer_image=base_url().'uploads/users/'.get_thumbnail($service->freelancer_image);
				$service->reviews=$this->getReviewsByServiceID($service->id);
				$object[]=$service;
				}
			
			return $object;
			}else{
				return null;
			}
		
	}

	
    /*||||||||Courses crasula module||||||||*/
    public function course_crousal_tabs()
    {
        $tabs            = '';
        $tabcraousal     = array();
        $alist           = array();
        $tablist         = '';
        $tablistcategory = array();
        $alist           = $this->db->query("SELECT cc.id,cc.title  FROM `course_category` AS cc,`course` WHERE cc.id 







                                    IN(







                                       SELECT course_category_id FROM course







                                      ) GROUP by cc.id  ORDER by  cc.title asc");
        if ($alist->num_rows() > 0) {
            if ($alist->result()) {
                $counter = 1;
                foreach ($alist->result() as $list) {
                    $tablist .= '<li class="' . (($counter == 1) ? 'active' : '') . '"><a href="courses#' . str_replace(" ", '-', strtolower($list->title)) . '">' . $list->title . '</a></li>';
                    $tablistcategory[] = $list->id;
                    $counter++;
                }
            }
            $tabquery = $this->db->query("SELECT CC.id as course_cat_id ,CC.title as course_category_title ,C.id AS course_id,C.post_title AS course_title,







                        C.short_description AS course_short_detail,C.price AS course_price,C.thumbnail







                        FROM `course` AS C







                        INNER JOIN course_category AS CC







                        ON CC.id  = C.course_category_id WHERE CC.id IN (" . implode(",", $tablistcategory) . ") 







                        ORDER by  course_category_title asc







                    ");
            if (!empty($tabquery->result())) {
                $tabsContent  = '';
                $aTabecontent = array();
                foreach ($tabquery->result() as $row) {
                    $aTabecontent[$row->course_category_title]['course_title'][]        = $row->course_title;
                    $aTabecontent[$row->course_category_title]['course_short_detail'][] = $row->course_short_detail;
                    $aTabecontent[$row->course_category_title]['course_price'][]        = $row->course_price;
                    $aTabecontent[$row->course_category_title]['course_id'][]           = $row->course_id;
                    $aTabecontent[$row->course_category_title]['thumbnail'][]           = $row->thumbnail;
                }
                $tabsContent = '';
                if (count($aTabecontent) > 0) {
                    $outercounter = 1;
                    foreach ($aTabecontent as $tabcontentkey => $tabcontentvalue):
                        $tabsContent .= ' <div id="' . strtolower($tabcontentkey) . '" class="tab-pane fade ' . (($outercounter == 1) ? 'in active' : '') . ' ">';
                        $tabsContent .= '<h3 class="tab-title">' . ucfirst($tabcontentkey) . '</h3>';
                        $sliderKey = $tabcontentkey . 'Slider';
                        $tabsContent .= '<div class="container-fluid">';
                        $tabsContent .= '<div class="row">';
                        $tabsContent .= '<div class="col-xs-12 col-sm-12 col-md-12">';
                        $tabsContent .= '<div class="carousel carousel-showmanymoveone slide itemslider" id="' . $sliderKey . '" >';
                        $tabsContent .= '<div class="carousel-inner">';
                        // inner loop start
                        if (count($tabcontentvalue['course_title']) > 0) {
                            $innercounter = 1;
                            for ($index = 0; $index < count($tabcontentvalue['course_title']); $index++):
                                $course_title        = $tabcontentvalue['course_title'][$index];
                                $course_short_detail = $tabcontentvalue['course_short_detail'][$index];
                                $course_price        = $tabcontentvalue['course_price'][$index];
                                $course_id           = $tabcontentvalue['course_id'][$index];
                                $tabsContent .= '<div class="item ' . $active . ' ' . (($innercounter == 1) ? 'active' : '') . '">';
                                $tabsContent .= '<div class="col-xs-12 col-sm-6 col-md-3">';
                                $tabsContent .= '<div class="thumbnail">';
                                $thumbnail = base_url() . 'uploads/noimg.png';
                                if (!empty($tabcontentvalue['thumbnail'][$index])) {
                                    $thumbnail = base_url() . 'uploads/' . $tabcontentvalue['thumbnail'][$index];
                                }
                                $tabsContent .= '<img src="' . $thumbnail . '" alt="" class="img-responsive">';
                                $tabsContent .= '<div class="caption">';
                                $tabsContent .= '<h4 class="pull-right">$' . $course_price . '</h4>';
                                $tabsContent .= '<h4><a href="#">' . $course_title . '</a></h4>';
                                $tabsContent .= '<p>' . $course_short_detail . '</p>';
                                $tabsContent .= '</div>';
                                $tabsContent .= '<div class="ratings">';
                                $tabsContent .= '<p>';
                                $tabsContent .= '<span class="glyphicon glyphicon-star"></span>';
                                $tabsContent .= '<span class="glyphicon glyphicon-star"></span>';
                                $tabsContent .= '<span class="glyphicon glyphicon-star"></span>';
                                $tabsContent .= '<span class="glyphicon glyphicon-star"></span>';
                                $tabsContent .= '<span class="glyphicon glyphicon-star"></span>';
                                $tabsContent .= '(15 reviews)';
                                $tabsContent .= '</p>';
                                $tabsContent .= '</div>';
                                $tabsContent .= '<div class="space-ten"></div>';
                                $tabsContent .= '<div class="btn-ground text-center">';
                                $tabsContent .= '<button type="button" class="btnCart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>';
                                $tabsContent .= '<button type="button" class="btnCart btnquick" data-toggle="modal" id="' . $course_id . '" >







                                        <i class="fa fa-search"></i> Quick View</button>';
                                $tabsContent .= '</div>';
                                $tabsContent .= '<div class="space-ten"></div>';
                                $tabsContent .= '</div>     ';
                                $tabsContent .= '  </div>';
                                $tabsContent .= '</div>';
                                $innercounter++;
                            endfor;
                        }
                        //inner loop end 
                        $tabsContent .= '</div>';
                        $tabsContent .= '<div id="slider-control">';
                        $tabsContent .= '<a class="left carousel-control" href="#' . $sliderKey . '" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
                        $tabsContent .= '<a class="right carousel-control" href="#' . $sliderKey . '" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';
                        $tabsContent .= '</div>';
                        $tabsContent .= ' </div>';
                        $tabsContent .= '</div>';
                        $tabsContent .= '</div>';
                        $tabsContent .= '</div>';
                        $tabsContent .= '</div>';
                        $outercounter++;
                    endforeach;
                }
            }
            $tabs .= '<ul class="nav nav-tabs">';
            $tabs .= $tablist;
            $tabs .= '</ul>';
            $tabs .= '<div class="tab-content">';
            $tabs .= $tabsContent;
            $tabs .= '</div>';
        }
        return $tabs;
    }
    /*||||||||Courses crasula module||||||||*/
    public function course_quick_detail($course_id)
    {
        $amainoutput       = array();
        $course_detail_row = $this->db->select('id,created_on,post_title as course_title,price,video_url,thumbnail')->from($this->course)->where('id ', $course_id)->order_by("id", "asc")->get();
        $course_detail     = array();
        if ($course_detail_row->num_rows() > 0) {
            $row                           = $course_detail_row->row();
            $course_title                  = $row->course_title;
            $created_on                    = strtotime($row->created_on);
            $course_detail['created_on']   = strtotime($row->created_on);
            $course_detail['course_title'] = $row->course_title;
            $course_detail['price']        = $row->price;
            $course_detail['id']           = $row->id;
            $course_detail['thumbnail']    = $row->thumbnail;
            $course_detail['video_url']    = $row->video_url;
        }
        $amainoutput['course_detail'] = $course_detail;
        $course_detail_include        = $this->db->select('included_list')->from($this->tbl_course_include)->where('course_id', $course_id)->order_by("id", "asc")->get();
        $course_detail                = array();
        $inlcludehtml                 = '';
        if ($course_detail_include->num_rows() > 0) {
            if (!empty($course_detail_include->result())) {
                foreach ($course_detail_include->result() as $inc) {
                    $inlcludehtml .= '<p class="col-xs-12 col-md-6"><span class="fa fa-list"></span> ' . $inc->included_list . '</p>';
                }
            }
        }
        $amainoutput['inlcludehtml'] = $inlcludehtml;
        $data                        = $this->db->query("SELECT cl.title as course_lecture_title,cld.title as lecture_video_title,cld.duration as lecture_video_duration,cld.video as lecture_video,







                cld.id as course_lectures_detail_id  







                FROM `course_lectures` AS cl







                INNER JOIN `course_lectures_detail` AS cld







                ON  cl.id = cld.course_lectures_id







                WHERE cl.course_id = " . $course_id . "");
        if (!empty($data->result())) {
            $alist = array();
            foreach ($data->result() as $row) {
                $alist[$row->course_lecture_title]['title'][]    = $row->lecture_video_title;
                $alist[$row->course_lecture_title]['duration'][] = $row->lecture_video_duration;
                $alist[$row->course_lecture_title]['video'][]    = $row->lecture_video;
                $alist[$row->course_lecture_title]['id'][]       = $row->course_lectures_detail_id;
            }
            if (count($alist) > 0) {
                $courselecturelist = '';
                $courselecturelist .= '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                $outercounter = 1;
                foreach ($alist as $coursetitle => $coursedetail):
                    if (!empty($coursetitle)):
                        $targetid  = 'collapse_id' . $outercounter;
                        $headingid = 'heading' . $outercounter;
                        $courselecturelist .= '<div class="panel panel-default">';
                        $courselecturelist .= '<div class="panel-heading" role="tab" id="' . $headingid . '">';
                        $courselecturelist .= '<h4 class="panel-title">';
                        $courselecturelist .= '<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#' . $targetid . '" aria-expanded="false" aria-controls="' . $targetid . '">';
                        $courselecturelist .= $coursetitle . ' <span class="pull-right lectureCount" > ' . count($coursedetail['title']) . ' lecture</span>';
                        $courselecturelist .= '</a>';
                        $courselecturelist .= '</h4>';
                        $courselecturelist .= '</div>';
                        $courselecturelist .= '<div id="' . $targetid . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' . $headingid . '">';
                        $courselecturelist .= '<div class="panel-body">';
                        for ($index = 0; $index < count($coursedetail['title']); $index++):
                            $id = $coursedetail['id'][$index];
                            $courselecturelist .= '<div class="leture_item">';
                            $courselecturelist .= '<div class="col-xs-6 col-md-6"><span class="fa  fa-play-circle"></span>







                                 ' . $coursedetail['title'][$index] . ' </div> ';
                            $courselecturelist .= '<div class="col-xs-6 col-md-6"> 







                                        ' . $coursedetail['duration'][$index] . '  







                                        <span class="pull-right">







                                        <a href="javascript:void(0);"  onclick="preview_video(\'' . $id . '\')"> Preview Lecture</a></span>';
                            $courselecturelist .= '</div>';
                            $courselecturelist .= '</div> ';
                            $courselecturelist .= '<span id="cvideo_' . $id . '" style="display:none;">' . $coursedetail['video'][$index] . '</span>';
                        endfor;
                        $courselecturelist .= '</div>';
                        $courselecturelist .= '</div>';
                        $courselecturelist .= '</div>';
                        $outercounter++;
                    endif;
                endforeach;
                $courselecturelist .= '</div>';
            }
        }
        $amainoutput['courselecturelist'] = $courselecturelist;
        return $amainoutput;
    }
    /**===============Freelancer menu====================**/
  public function  getCategories(){
	  $query="SELECT  TM.id as cat_id,TM.title,TM.page_banner FROM  
		`" . $this->tbl_menu . "` AS TM 
		WHERE TM.status = '" . $this->active . "' 
		ORDER BY TM.`id`   ASC";
	  if(isset($_REQUEST['cat_id']) and $_REQUEST['cat_id']!='' and is_numeric($_REQUEST['cat_id'])==true){
		  $query="SELECT  TM.id as cat_id,TM.title,TM.page_banner FROM  
		`" . $this->tbl_childmenu . "` AS TM 
		WHERE TM.status = '".$this->active."'
		AND TM.menu_id = '".$_REQUEST['cat_id']."' 
		ORDER BY TM.`id`   ASC";
		  }
		  
		 /* if(isset($_REQUEST['cat_id'])==1){
			  $ids=array(4,5,6);
		  $query="SELECT  TM.id as cat_id,TM.title,TM.page_banner FROM  
		`" . $this->tbl_menu . "` AS TM 
		WHERE TM.status = '".$this->active."'
		AND TM.menu_id IN ('$ids')
		ORDER BY TM.`id`   ASC";
		  }*/
		$menuquery = $this->db->query($query);
        //lq();
		$response  = array();
        if (count($menuquery->result() > 0)) {
			foreach($menuquery->result() as $menu){
			
				$file=FCPATH.'uploads/banner/'.$menu->page_banner;
						if(is_file($file)){
							$menu->page_banner=base_url().'uploads/banner/'.$menu->page_banner;
							}else{
								$menu->page_banner=base_url().'assets/img/banner-9.jpg';
								}
				$response[]=$menu;
				}
		}
		return $response;
		}
	public function getmenu($html = true)
    {
        
		$menuquery = $this->db->query("SELECT  TM.id as main_category_id,TM.title as menu,TSM.title as sub_menu,TCM.id as child_id,
		TCM.title as child_menu FROM  
		`" . $this->tbl_childmenu . "` AS TCM 
		LEFT JOIN `" . $this->tbl_submenu . "` AS TSM ON TCM.sub_menu_id = TSM.id
		INNER JOIN `" . $this->tbl_menu . "` AS TM ON TCM.menu_id = TM.id 
		WHERE TM.status = '" . $this->active . "'  AND TCM.status = '" . $this->active . "'
		ORDER BY TM.`id`   ASC");
        //lq();
		$menuHtml  = '';
        if (count($menuquery->result() > 0)) {
            $tabsContent  = '';
            $aMenucontent = array();
            $check        = true;
            foreach ($menuquery->result() as $row) {
                $submenu = 'submenu';
                if ($row->sub_menu != NULL) {
                    $check  = true;
                    $aMenucontent[$row->main_category_id.'_'.$row->menu][$row->sub_menu]['child_id'][]     = $row->child_id;
                    $aMenucontent[$row->main_category_id.'_'.$row->menu][$row->sub_menu]['child_menu_title'][] = $row->child_menu;
                } else {
                    $coun                                                     = 1;
                    $check                                                    = false;
                    $aMenucontent[$row->main_category_id.'_'.$row->menu][$submenu]['child_id'][]         = $row->child_id;
                    $aMenucontent[$row->main_category_id.'_'.$row->menu][$submenu]['child_menu_title'][] = $row->child_menu;
                    $coun++;
                }
            }
        }
		
        $menuHtml = array();
        if (is_array($aMenucontent) and count($aMenucontent) > 0) {
            foreach ($aMenucontent as $menutitle => $asubmenu) {
				$amenutitle = explode('_',$menutitle); // ' . $amenutitle[1] . '
                $menuHtml['menu']['url'][]= base_url().'Categoryfilter/?cs='.$amenutitle[0].'&pc=p_'.rand().'_'.uniqid().'_'.rand().rand();
				$menuHtml['menu']['title'][]= $amenutitle;
                
                $counter = 1;
                $achunk  = array();
                foreach ($asubmenu as $submenutitle => $childmenu) {
                    if ($submenutitle == 'submenu') {
                        $childID = $childmenu['child_id'];
                        if (count($childmenu['child_id']) > 9) {
                            $achunk[$submenutitle] = array_chunk($childmenu['child_menu_title'], 9);
                            $achunk['submenuid']   = array_chunk($childmenu['child_id'], 9);
                            $col                   = 3;
                        } else {
                            if (count($childmenu['child_id']) == 2) {
                                $col                   = 6;
                                $achunk[$submenutitle] = array_chunk($childmenu['child_menu_title'], 5);
                                $achunk['submenuid']   = array_chunk($childmenu['child_id'], 5);
                            } else {
                                $achunk[$submenutitle] = array_chunk($childmenu['child_menu_title'], 5);
                                $achunk['submenuid']   = array_chunk($childmenu['child_id'], 5);
                                $col                   = 12;
                            }
                        }
                        for ($mindex = 0; $mindex < count($achunk['submenu']); $mindex++) {
                            if (count($achunk['submenu']) == 2) {
                                $col = 6;
                            }
                           
                            $childcounter = 1;
                            for ($cindex = 0; $cindex < count($achunk['submenu'][$mindex]); $cindex++) {
								$menuHtml['menu']['submenu']['url'][]= base_url().'Categoryfilter/?cs=' . $achunk['submenuid'][$mindex][$cindex] . '">' . $achunk['submenu'][$mindex][$cindex];
								$menuHtml['menu']['submenu']['title'][]=$achunk['submenu'][$mindex][$cindex] ;
                                
                            }
                            
                        }
                    } else {
                        $column = abs(12 / count($asubmenu)); // calculate colums    
                       /* $menuHtml .= ' <li class="col-sm-' . $column . '">';
                        if ($submenutitle != 'submenu') {
                            $menuHtml .= ' <h4>' . $submenutitle . '</h4>';
                        }
                        $menuHtml .= ' <ul>';*/
                        $childcounter = 1;
                        for ($index = 0; $index < count($childmenu['child_id']); $index++) {
                           $menuHtml['menu']['submenu']['title'][]=$achunk['submenu'][$mindex][$cindex] ;
						   $menuHtml['menu']['submenu']['url'][]= base_url().'Categoryfilter/?cs=' . $achunk['submenuid'][$mindex][$cindex] . '">' . $achunk['submenu'][$mindex][$cindex];
                        }
                        
                    }
                    $counter++;
                }
                
            }
        }
        return $menuHtml;
    }
    /**===============Freelancer menu====================**/
    public function categoryname($category ,$optional='')
    {   
	    $tbl = $this->tbl_childmenu;
        if(! empty($optional))
		{
		  $tbl = $this->tbl_menu; 
		}
		$categoryname = $this->db->select('title AS categoryname')->from($tbl)->where('id', $category)->get()->row();
        return $categoryname->categoryname;
    }
	
	
	
	
    public function get_data_by_where($columns, $table, $key, $value)
    {
        $row = $this->db->select($columns)->from($table)->where($key, $value)->get()->row();
        return $row;
    }
	
	
	
   /**===============wishlist====================**/
	  public function checkwishlist($serviceid)
	  {
		 
		$where = array('user_id'=>USER_ID,'service_id'=>$serviceid);
		$result  = $this->db->select('id')->from($this->tbl_wishlist)->where( $where)->get();
		//lq();	
		$resut =  0;
		if ($result->num_rows()>0)
		{
		
		  $resut =  1;
		}
		return $resut;
	  }
	
    /**===============services====================**/
	
          public function getservices($category = '',$whereLike='',$filterdata='',$maincategory='')
     {
        //freelancers
		
		$filtersquerybaseurl = base_url().'Freelancers/servicefilteration?';
		$filterserachvar = false;
		
		if(isset($_GET["page"]))
		$page = (int)$_GET["page"];
		else
		$page = 1;
		
		$setLimit = 20;
		$pageLimit = ($page * $setLimit) - $setLimit;
	   
	   $sellerservicesidsstr = '';
	   $sellerservicesids = $this->sellerservicesids();
	   if(! empty($sellerservicesids))
	   {
		 $sellerservicesidsstr = ' AND TS.id NOT IN '.'('.$sellerservicesids.')';  
	   }
	  
	   $and = '';
	   $price_range = '';
	   $userids = array();
	   
	   $pricerangefilterquerystr = 'pricerange=-1';
		if(isset($filterdata['pricerange'])  AND !empty($filterdata['pricerange']) AND $filterdata['pricerange']!='-1')
		{
		
			if (strpos($filterdata['pricerange'], '-') !== false) 
			{
			
				$apricerange = explode('-',$filterdata['pricerange']);
				$fromrange = $apricerange[0];
				$torange = $apricerange[1];
			}
			$price_range = ' AND  (TS.price >= '.$fromrange.' and TS.price <='.$torange.') ';
			
			// querystr = '';
			 $pricerangefilterquerystr =  'pricerange='.$fromrange.'-'.$torange.'&';
			
		  $filterserachvar = true;	
		}
		$filtersquerybaseurl .= $pricerangefilterquerystr;
		
		
		$categoryfilter = '';
		$categoryfilterquerystr = '&categoryfilter=-1&';
		if(isset($filterdata['categoryfilter'])  AND !empty($filterdata['categoryfilter']) AND $filterdata['categoryfilter']!='-1')
		{
		
		    $categoryfilterquerystr = $this->makeserachquerystr($filterdata['categoryfilter'],'categoryfilter[]');
		   
			if(is_array($filterdata['categoryfilter']) AND count($filterdata['categoryfilter']))
			{
			
				$categoryfilterstr = implode(',',$filterdata['categoryfilter']); 
				$categoryids = getidsformainmenus($categoryfilterstr); // khan
				$categoryfilter = ' AND TS.category_id IN ('.$categoryids.')'; 
			
			}
			 $filterserachvar = true;	// check for filteration search
		}
	     
		 $filtersquerybaseurl .= $categoryfilterquerystr; // push querystr inro privious var
		 
		 $statsuseridand = '';
		 $statusfilterquerystr = '&statusfilter=-1&';
	   if(isset($filterdata['statusfilter'])  AND !empty($filterdata['statusfilter']) AND $filterdata['statusfilter']!='-1')
		{
			
			
			$statusfilterquerystr = $this->makeserachquerystr($filterdata['statusfilter'],'statusfilter[]');
			
			$statusfilterstr = implode(',',$filterdata['statusfilter']); 
			$statusfilterstr = '  U.online IN ('.$statusfilterstr.')'; 
				
			  $query = $this->db->query("SELECT U.id FROM `".$this->users."` AS U  WHERE ".$statusfilterstr."");
			  
				foreach ($query->result() as $row)
				{
					$statsuserid[] = $row->id;   
				}
		       
			   
				$statsuserid = implode(',',$statsuserid); 
				$statsuseridand = ' AND U.id IN ('.$statsuserid.')';
				
				$filterserachvar = true;	// check for filteration search
		}
		$filtersquerybaseurl .= $statusfilterquerystr; // push querystr inro privious var
		 
	    $locatioinstrand = '';
		$useridlocation = array();
		
		$locationsfilterquerystr = '&locationsfilter=';
	   if(isset($filterdata['locationsfilter'])  AND !empty($filterdata['locationsfilter']) AND $filterdata['locationsfilter']!='-1')
		{
			 
			$locationsfilterstr = $filterdata['locationsfilter'];
			$locationsfilter = '  location.city = '.$locationsfilterstr.''; 
			$query = $this->db->query("SELECT freelancers.user_id FROM `".$this->freelancers."` INNER JOIN   ".$this->location."
			ON location.id = freelancers.location_id WHERE ".$locationsfilter."");
			
			$userid = array();
			foreach ($query->result() as $row)
			{
				$useridlocation[] = $row->user_id;   
			}
			
			 $useridstr = implode(',',$useridlocation); 
			 if( ! empty ($useridstr))
			 {
			     $locatioinstrand = ' AND TS.user_id IN ('.$useridstr.')';
		     }
			 else
			 {
				
				 $locatioinstrand = ' AND TS.user_id =""'; 
			 }
			 // make query str
			$locationsfilterquerystr = '&locationsfilter='.$locationsfilterstr.'&'; 
			$filterserachvar = true;	// check for filteration search
		}
	    $filtersquerybaseurl .= $locationsfilterquerystr; // push querystr inro privious var
		
		$alocationandshift = '';
		$useridshift = array();
		$useridshiftand = '';
		$shiftfilterquerystr = '&shiftfiltervar=-1&';
		if(isset($filterdata['shiftfiltervar'])  AND !empty($filterdata['shiftfiltervar']) AND $filterdata['shiftfiltervar']!='-1')
		{
			$shiftfilterquerystr = $this->makeserachquerystr( $filterdata['shiftfiltervar'],'shiftfiltervar[]');
			
			$shiftfilterstr = implode(',',$filterdata['shiftfiltervar']);
			
			for($index = 0 ; $index < count($filterdata['shiftfiltervar']); $index++)
			{
				$shiftfiltervarstr .=  '"'.$filterdata['shiftfiltervar'][$index].'"'.',';	
			} 
			
			$shiftfiltervarstr = rtrim($shiftfiltervarstr,',');
			$shiftfiltervarstr = '  freelancers.availablity IN ('.$shiftfiltervarstr.')'; 
			
			
			  $querys = $this->db->query("SELECT DISTINCT tbl_services.user_id FROM `".$this->tbl_services."`   INNER JOIN ".$this->freelancers." 
			  ON freelancers.user_id = tbl_services.user_id
               WHERE ".$shiftfiltervarstr."");
			   
			  
		      $useridshift = array();
				foreach ($querys->result() as $row)
				{
					$useridshift[] = $row->user_id;   
				}
				
				$useridshift = implode(',',$useridshift); 
				$useridshiftand = ' AND F.user_id IN ('.$useridshift.')';
			$filterserachvar = true;	// check for filteration search	
				
		 }
		    $filtersquerybaseurl .= $shiftfilterquerystr; // push querystr inro privious var
			$wherifSearch='';
			if (!empty($category)) 
			{
				if(!empty($maincategory))
				{  
					$categoryids = getidsformainmenus($category); // khan
					$and = ' AND TS.category_id IN ('.$categoryids.')'; 
				  	
				}
				else
				{
				  $and = ' AND TS.category_id=' . $category;
				}
			}
		
			if (! empty($whereLike) )
			{
			    $category_id  = get_id_by_key('id','title',strtolower($whereLike),$this->tbl_childmenu);
				$wherifSearch .=" AND TS.title like '%".strtolower($whereLike)."%'
				 OR TS.service_keyword like '%".strtolower($whereLike)."%'";
				 if(! empty($category_id))
				 {
				 	$wherifSearch .=" OR TS.category_id like '%".trim($category_id)."%' ";
				 }
				
				$filterserachvar = true;
			}
			//echo '</br>';
//echo 'wherifSearch-->'.$wherifSearch;

		  $querycount = $this->db->query("SELECT count(TS.id) as total_rows_count
				FROM `" . $this->tbl_services . "` AS TS 
				INNER JOIN `". $this->users . "` AS U ON U.id = TS.user_id 
				INNER JOIN `".$this->freelancers."`  AS F ON F.user_id = TS.user_id 
				WHERE TS.status = ".$this->active."  AND TS.id  ".$sellerservicesidsstr."
				
				". $and . " 
				".$wherifSearch." 
				".$price_range." 
				".$categoryfilter." 
				".$locatioinstrand." 
				".$statsuseridand."
				".$useridshiftand."
			  ");
				
			//lq();
				if ($querycount->num_rows() > 0) 
				{
					$rowss = $querycount->result();
					$rowscount    = $rowss[0]->total_rows_count;
				}	

           $query = $this->db->query("
					SELECT TS.id,TS.category_id,TS.title AS service_title,TS.description,TS.unique_id AS uniquekey,CONCAT('".base_url()."uploads/users/',U.image) AS freelancer_image,F.username AS freelancer_username,
					TS.service_keyword AS servicekeyword ,CONCAT('$ ',TS.price) AS price ,
					CONCAT('".base_url()."uploads/services/media/noimage-colored.png') as media
					,
					(
						SELECT CONCAT( ROUND (sum(rating)/count(rating),1),'=>',count(service_id))    FROM `" . $this->tbl_review_rating . "` 
						WHERE TS.id = tbl_review_rating.service_id

                    ) 
					AS  service_rating,
					(SELECT username FROM  " . $this->freelancers . " AS F WHERE F.user_id = TS.user_id) AS freelancer_username
					FROM `" . $this->tbl_services . "` AS TS 
					INNER JOIN `" . $this->tbl_services_media . "` AS TSM  ON TS.id  = TSM.service_id
					INNER JOIN `" . $this->users . "` AS U  ON U.id  = TS.user_id
					INNER JOIN `" . $this->freelancers . "` AS F  ON F.user_id  = TS.user_id
					WHERE TS.status = ".$this->active."   ".$sellerservicesidsstr." "  
					. $and . " 
					".$wherifSearch." 
					".$price_range." 
					".$categoryfilter." 
					".$locatioinstrand." 
					".$statsuseridand."
					".$useridshiftand."
					ORDER BY service_rating DESC   LIMIT ".$pageLimit." , ".$setLimit." ");
				
		//lq();
		//$html  = '<div style="margin:0" class="main-heading"><h2 class="title">TOP RATED <span>SELLERS</span></h2></div>';
		
$object=array();
        if (count($query->result()) > 0) {
			foreach($query->result() as $service){
				$service->reviews=$this->getReviewsByServiceID($service->id);
				$object[]=$service;
				}
			
			return $object;
			}else{
				return 0;
				}
		
    }

	function getReviewsByServiceID($service_id){
	$response=array();
		$data = $this->db->query("SELECT r.review,r.rating,u.name,CONCAT('".base_url()."uploads/users/',u.image) AS image,u.username FROM `tbl_review_rating` as r
join users as u on u.id=r.user_id
where r.service_id=".$service_id);
		
$response=$data->result_array();
		if ($data->num_rows()>0){
			return $response;
		}
	}
	
	
	public function makeserachquerystr($arraydata,$arrayformat)
	{
		$filterqueryloop = '';
		for($statusf = 0 ; $statusf<count($arraydata);$statusf++)
		{
			$filterqueryloop  .= '&'.$arrayformat.'='.$arraydata[$statusf].'&';	
		}
		$querystr = $filterqueryloop;	
		
		return $querystr;
		
	}
	
	     public function getservicesForApp($category = '',$whereLike='',$filterdata='',$maincategory='')
     {
        //freelancers
		
		$filtersquerybaseurl = base_url().'Freelancers/servicefilteration?';
		$filterserachvar = false;
		
		if(isset($_GET["page"]))
		$page = (int)$_GET["page"];
		else
		$page = 1;
		
		$setLimit = 20;
		$pageLimit = ($page * $setLimit) - $setLimit;
	   
	   $sellerservicesidsstr = '';
	   $sellerservicesids = $this->sellerservicesids();
	   if(! empty($sellerservicesids))
	   {
		 $sellerservicesidsstr = ' AND TS.id NOT IN '.'('.$sellerservicesids.')';  
	   }
	  
	   $and = '';
	   $price_range = '';
	   $userids = array();
	   
	   $pricerangefilterquerystr = 'pricerange=-1';
		if(isset($filterdata['pricerange'])  AND !empty($filterdata['pricerange']) AND $filterdata['pricerange']!='-1')
		{
		
			if (strpos($filterdata['pricerange'], '-') !== false) 
			{
			
				$apricerange = explode('-',$filterdata['pricerange']);
				$fromrange = $apricerange[0];
				$torange = $apricerange[1];
			}
			$price_range = ' AND  (TS.price >= '.$fromrange.' and TS.price <='.$torange.') ';
			
			// querystr = '';
			 $pricerangefilterquerystr =  'pricerange='.$fromrange.'-'.$torange.'&';
			
		  $filterserachvar = true;	
		}
		$filtersquerybaseurl .= $pricerangefilterquerystr;
		
		
		$categoryfilter = '';
		$categoryfilterquerystr = '&categoryfilter=-1&';
		if(isset($filterdata['categoryfilter'])  AND !empty($filterdata['categoryfilter']) AND $filterdata['categoryfilter']!='-1')
		{
		
		    $categoryfilterquerystr = $this->makeserachquerystr($filterdata['categoryfilter'],'categoryfilter[]');
		   
			if(is_array($filterdata['categoryfilter']) AND count($filterdata['categoryfilter']))
			{
			
				$categoryfilterstr = implode(',',$filterdata['categoryfilter']); 
				$categoryids = getidsformainmenus($categoryfilterstr); // khan
				$categoryfilter = ' AND TS.category_id IN ('.$categoryids.')'; 
			
			}
			 $filterserachvar = true;	// check for filteration search
		}
	     
		 $filtersquerybaseurl .= $categoryfilterquerystr; // push querystr inro privious var
		 
		 $statsuseridand = '';
		 $statusfilterquerystr = '&statusfilter=-1&';
	   if(isset($filterdata['statusfilter'])  AND !empty($filterdata['statusfilter']) AND $filterdata['statusfilter']!='-1')
		{
			
			
			$statusfilterquerystr = $this->makeserachquerystr($filterdata['statusfilter'],'statusfilter[]');
			
			$statusfilterstr = implode(',',$filterdata['statusfilter']); 
			$statusfilterstr = '  U.online IN ('.$statusfilterstr.')'; 
				
			  $query = $this->db->query("SELECT U.id FROM `".$this->users."` AS U  WHERE ".$statusfilterstr."");
			  
				foreach ($query->result() as $row)
				{
					$statsuserid[] = $row->id;   
				}
		       
			   
				$statsuserid = implode(',',$statsuserid); 
				$statsuseridand = ' AND U.id IN ('.$statsuserid.')';
				
				$filterserachvar = true;	// check for filteration search
		}
		$filtersquerybaseurl .= $statusfilterquerystr; // push querystr inro privious var
		 
	    $locatioinstrand = '';
		$useridlocation = array();
		
		$locationsfilterquerystr = '&locationsfilter=';
	   if(isset($filterdata['locationsfilter'])  AND !empty($filterdata['locationsfilter']) AND $filterdata['locationsfilter']!='-1')
		{
			 
			$locationsfilterstr = $filterdata['locationsfilter'];
			$locationsfilter = '  location.city = '.$locationsfilterstr.''; 
			$query = $this->db->query("SELECT freelancers.user_id FROM `".$this->freelancers."` INNER JOIN   ".$this->location."
			ON location.id = freelancers.location_id WHERE ".$locationsfilter."");
			
			$userid = array();
			foreach ($query->result() as $row)
			{
				$useridlocation[] = $row->user_id;   
			}
			
			 $useridstr = implode(',',$useridlocation); 
			 if( ! empty ($useridstr))
			 {
			     $locatioinstrand = ' AND TS.user_id IN ('.$useridstr.')';
		     }
			 else
			 {
				
				 $locatioinstrand = ' AND TS.user_id =""'; 
			 }
			 // make query str
			$locationsfilterquerystr = '&locationsfilter='.$locationsfilterstr.'&'; 
			$filterserachvar = true;	// check for filteration search
		}
	    $filtersquerybaseurl .= $locationsfilterquerystr; // push querystr inro privious var
		
		$alocationandshift = '';
		$useridshift = array();
		$useridshiftand = '';
		$shiftfilterquerystr = '&shiftfiltervar=-1&';
		if(isset($filterdata['shiftfiltervar'])  AND !empty($filterdata['shiftfiltervar']) AND $filterdata['shiftfiltervar']!='-1')
		{
			$shiftfilterquerystr = $this->makeserachquerystr( $filterdata['shiftfiltervar'],'shiftfiltervar[]');
			
			$shiftfilterstr = implode(',',$filterdata['shiftfiltervar']);
			
			for($index = 0 ; $index < count($filterdata['shiftfiltervar']); $index++)
			{
				$shiftfiltervarstr .=  '"'.$filterdata['shiftfiltervar'][$index].'"'.',';	
			} 
			
			$shiftfiltervarstr = rtrim($shiftfiltervarstr,',');
			$shiftfiltervarstr = '  freelancers.availablity IN ('.$shiftfiltervarstr.')'; 
			
			
			  $querys = $this->db->query("SELECT DISTINCT tbl_services.user_id FROM `".$this->tbl_services."`   INNER JOIN ".$this->freelancers." 
			  ON freelancers.user_id = tbl_services.user_id
               WHERE ".$shiftfiltervarstr."");
			   
			  
		      $useridshift = array();
				foreach ($querys->result() as $row)
				{
					$useridshift[] = $row->user_id;   
				}
				
				$useridshift = implode(',',$useridshift); 
				$useridshiftand = ' AND F.user_id IN ('.$useridshift.')';
			$filterserachvar = true;	// check for filteration search	
				
		 }
		    $filtersquerybaseurl .= $shiftfilterquerystr; // push querystr inro privious var
			$wherifSearch='';
			if (!empty($category)) 
			{
				if(!empty($maincategory))
				{  
					$categoryids = getidsformainmenus($category); // khan
					$and = ' AND TS.category_id IN ('.$categoryids.')'; 
				  	
				}
				else
				{
				  $and = ' AND TS.category_id=' . $category;
				}
			}
		
			if (! empty($whereLike) )
			{
			    $category_id  = get_id_by_key('id','title',strtolower($whereLike),$this->tbl_childmenu);
				$wherifSearch .=" AND TS.title like '%".strtolower($whereLike)."%'
				 OR TS.service_keyword like '%".strtolower($whereLike)."%'";
				 if(! empty($category_id))
				 {
				 	$wherifSearch .=" OR TS.category_id like '%".trim($category_id)."%' ";
				 }
				
				$filterserachvar = true;
			}
			//echo '</br>';
//echo 'wherifSearch-->'.$wherifSearch;

		  $querycount = $this->db->query("SELECT count(TS.id) as total_rows_count
				FROM `" . $this->tbl_services . "` AS TS 
				INNER JOIN `". $this->users . "` AS U ON U.id = TS.user_id 
				INNER JOIN `".$this->freelancers."`  AS F ON F.user_id = TS.user_id 
				WHERE TS.status = ".$this->active."  AND TS.id  ".$sellerservicesidsstr."
				
				". $and . " 
				".$wherifSearch." 
				".$price_range." 
				".$categoryfilter." 
				".$locatioinstrand." 
				".$statsuseridand."
				".$useridshiftand."
			  ");
				
			//lq();
				if ($querycount->num_rows() > 0) 
				{
					$rowss = $querycount->result();
					$rowscount    = $rowss[0]->total_rows_count;
				}	

           $query = $this->db->query("
					SELECT TS.id,TS.category_id,TS.title AS service_title,TS.description,TS.unique_id AS uniquekey,U.image AS freelancer_image,F.username AS freelancer_username,
					TS.service_keyword AS servicekeyword ,CONCAT('$ ',TS.price) AS price ,TSM.media,
					(
						SELECT CONCAT( ROUND (sum(rating)/count(rating),1),'=>',count(service_id))    FROM `" . $this->tbl_review_rating . "` 
						WHERE TS.id = tbl_review_rating.service_id

                    ) 
					AS  service_rating,
					(SELECT username FROM  " . $this->freelancers . " AS F WHERE F.user_id = TS.user_id) AS freelancer_username
					FROM `" . $this->tbl_services . "` AS TS 
					INNER JOIN `" . $this->tbl_services_media . "` AS TSM  ON TS.id  = TSM.service_id
					INNER JOIN `" . $this->users . "` AS U  ON U.id  = TS.user_id
					INNER JOIN `" . $this->freelancers . "` AS F  ON F.user_id  = TS.user_id
					WHERE TS.status = ".$this->active."   ".$sellerservicesidsstr." "  
					. $and . " 
					".$wherifSearch." 
					".$price_range." 
					".$categoryfilter." 
					".$locatioinstrand." 
					".$statsuseridand."
					".$useridshiftand."
					ORDER BY service_rating DESC   LIMIT ".$pageLimit." , ".$setLimit." ");
				
		//lq();
		//$html  = '<div style="margin:0" class="main-heading"><h2 class="title">TOP RATED <span>SELLERS</span></h2></div>';
		

        if (count($query->result()) > 0) {
			return $query->result();
			}else{
				return 0;
				}
		
    }

	
   public function pagination_links($per_page,$page,$totalcount,$filterparam='')
   {
	    
		if(isset($_GET['cs']) AND !empty($_GET['cs']))
		{
			$more = '';
			if(isset($_GET['pc']) AND !empty($_GET['pc']))
			{
			  $more  ='&pc='.urlencode($_GET['pc']);
			
			}
		   
		   $page_url .= base_url()."Categoryfilter/?cs=".$_GET['cs'].$more; 
		   $and = '&';	
		   $type = 1;
		}
		else
		{ 
		 	$page_url=base_url()."freelancers?";
			$and = '';
			$type = 1;
			if(! empty($filterparam))
			{
				$page_url=  $filterparam;
				if(isset($_GET['s']) AND !empty($_GET['s']))
				{
					 $page_url .='&s='.urlencode(trim($_GET['s']));
				}
				
				$and = '&';
				$type = 0;
			}
		}
		
    	$total = $totalcount;//$rec['totalCount'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $setLastpage = ceil($total/$per_page);
    	$lpm1 = $setLastpage - 1;
    	$function = '';
		
		$function = 'onclick="return get_filter_data(this.id,\'' . $type . '\');"';
    	$setPaginate = "";
    	if($setLastpage > 1)
    	{	
    		$setPaginate .= "<ul class='setPaginate'>";
            if($prev > 0)
			{
			  $setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$prev."  ".$function."><strong><</strong></a></li>";	
			}
			
			if ($setLastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $setLastpage; $counter++)
    			{
    				if ($counter == $page)
					{
    					$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
					}else
					{
    					$setPaginate.= "<li><a href='javascript:void(0)'  id=".$page_url.''.$and.'page='.$counter."  ".$function.">$counter</a></li>";
						
					}
    			}
    		}
    		elseif($setLastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$counter."  ".$function.">$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>...</li>";
    				$setPaginate.= "<li><a href='javascript:void(0)'  id=".$page_url.''.$and.'page='.$lpm1." ".$function.">$lpm1</a></li>";
    				$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$setLastpage." ".$function.">$setLastpage</a></li>";		
    			}
    			elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
    				$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
    				$setPaginate.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$counter." ".$function.">$counter</a></li>";					
    				}
    				$setPaginate.= "<li class='dot'>..</li>";
    				$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$lpm1." ".$function.">$lpm1</a></li>";
    				$setPaginate.= "<li><a  href='javascript:void(0)' id=".$page_url.''.$and.'page='.$setLastpage." ".$function.">$setLastpage</a></li>";		
    			}
    			else
    			{
    				$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page=1'." ".$function.">1</a></li>";
    				$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page=2'." ".$function.">2</a></li>";
    				$setPaginate.= "<li class='dot'>..</li>";
    				for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<li><a class='current_page'  >$counter</a></li>";
    					else
    						$setPaginate.= "<li><a href='javascript:void(0)' id=".$page_url.''.$and.'page='.$counter."   ".$function.">$counter</a></li>";					
    				}
    			}
    		}
    		
			
			
    		if ($page < $counter - 1){ 
    			$setPaginate.= "<li><a  href='javascript:void(0)' id=".$page_url.''.$and.'page='.$next." ".$function."><strong>></strong></a></li>";
                $setPaginate.= "<li><a  href='javascript:void(0)' id=".$page_url.''.$and.'page='.$setLastpage." ".$function.">Last</a></li>";
    		}else{
    			$setPaginate.= "<li><a class='current_page' >Next</a></li>";
                $setPaginate.= "<li><a class='current_page' >Last</a></li>";
            }

    		$setPaginate.= "</ul>\n";		
    	}
    
    
        return $setPaginate;
    } 
	
	
	
	
	/**===============Seller Services================**/
	   
		public function sellerservicesids()
		{
			$sellerserviceid = '';
			$query         = $this->db->query("SELECT id  FROM `" . $this->tbl_services . "` AS TS
			WHERE status = " . $this->active . " AND TS.user_id = '" . get_session('user_id') . "'");
			$sellerservice = array();
			if (count($query->result()) > 0) {
			 foreach ($query->result() as $row) 
			 {
			    $sellerservice[] = $row->id;
			 }
			 
			  if(count($sellerservice) > 0)
			  {
				$sellerserviceid  =  implode(',',$sellerservice);  
			  }
			}
			return $sellerserviceid;
		}
	   
	
    /**===============services====================**/
    public function sellerservices($userid)
    {
        $query         = $this->db->query("SELECT id,title,(SELECT media from " . $this->tbl_services_media . " AS TBS WHERE TBS.service_id= TS.id ) AS service_image FROM `" . $this->tbl_services . "` AS TS
WHERE status = " . $this->active . " AND TS.user_id = '" . $userid . "'");
        $sellerservice = array();
        if (count($query->result()) > 0) {
            foreach ($query->result() as $row) {
                $sellerservice[] = $row;
            }
        }
        return $sellerservice;
    }
	
    public function getsellerservice($sellerid)
    {
        $query      = $this->db->query("SELECT TS.*,
                (SELECT CONCAT('".base_url()."uploads/services/media/',media) FROM  " . $this->tbl_services_media . "  AS TSM WHERE TSM.service_id = TS.id) AS service_image
                FROM  " . $this->tbl_services . " AS TS
                WHERE  TS.user_id = '" . $sellerid . "'");
        $aservice   = array();
        $inactive   = array();
        $unapproved = array();
        $pending    = array();
        if (count($query->result()) > 0) {
            //echo "------>";
            foreach ($query->result() as $row) {
				$row->total_clicks= count_tbl_where('tbl_services_stats','service_id',$row->id);
			 $row->total_orders=getTotalOrderCountOfService($row->id);
			 if(!is_file($row->service_image)){
				 $row->service_image=base_url()."uploads/services/media/noimage.png";
				 }
                if ($row->status == 0) {
                    $ainactive[] = $row;
                } else if ($row->status == 1) {
                    $aactive[] = $row;
                } else if ($row->status == 2) {
                    $apending[] = $row;
                }
            }
        }
		if(count($ainactive)< 1 and empty($ainactive)){
			$ainactive=NULL;
		}if(count($aactive)< 1 and empty($aactive)){
			$aactive=NULL;
		}if(count($apending)< 1 and empty($apending)){
			$apending=NULL;
		}
        $aservice['inactive_gigs_services'] = $ainactive;
        $aservice['active_gigs_services']   = $aactive;
        $aservice['pending_gigs_services']  = $apending; 
        return $aservice;
    }
    public function getFavouriteServices($user_id)
    {
        $query      = $this->db->query("SELECT TS.*,
                (SELECT CONCAT('".base_url()."uploads/services/media/',media) FROM  " . $this->tbl_services_media . "  AS TSM WHERE TSM.service_id = TS.id) AS service_image
                FROM  " . $this->tbl_services . " AS TS
				JOIN tbl_favourite_services as fs on fs.service_id=TS.id
                WHERE  fs.user_id = '".$user_id."'");
			//	lq();
        $aservice   = array();
        $inactive   = array();
        $unapproved = array();
        $pending    = array();
        if (count($query->result()) > 0) {
            //echo "------>";
            foreach ($query->result() as $row) {
				$row->total_clicks= count_tbl_where('tbl_services_stats','service_id',$row->id);
			 $row->total_orders=getTotalOrderCountOfService($row->id);
			 if(!is_file($row->service_image)){
				 $row->service_image=base_url()."uploads/services/media/noimage.png";
				 }
                if ($row->status == 0) {
                    $ainactive[] = $row;
                } else if ($row->status == 1) {
                    $aactive[] = $row;
                } else if ($row->status == 2) {
                    $apending[] = $row;
                }
            }
        }
        //$aservice['inactive_gigs_services'] = $ainactive;
        //$aservice['favourite_services']   = $aactive;
      //  $aservice['pending_gigs_services']  = $apending; 
        return $aactive;
    }
	
	
public function offerrequestdetail($id)
    {
        $query                       = $this->db->query("SELECT TSOTR.service_id,TSOTR.price AS request_price,

                 (SELECT CONCAT( TS.title,'==>',(SELECT media FROM " . $this->tbl_services_media . " AS TSM WHERE TSM.service_id = TS.id))

                  FROM " . $this->tbl_services . "  AS TS WHERE TS.id = TSOTR.service_id AND TS.status= 1) AS service_title_image,

				  (SELECT F.username FROM  " . $this->freelancers . " AS F WHERE F.user_id = TSOTR.seller_id) as seller_user_name

                 FROM `" . $this->tbl_seller_offer_to_request . "`  AS TSOTR WHERE TSOTR.id = '" . $id . "' AND TSOTR.status ='" . $this->active . "'");
        // lq();
        $adata['offerrequestdetail'] = array();
        if (count($query->result() > 0)) {
            foreach ($query->result() as $row) {
                $aservicedetail = $row;
            }
        }
        $adata['offerrequestdetail'] = $aservicedetail;
        return $adata;
    }	
	
  public function customiseorderdetail($id)
    {
        
				 
	$query  = $this->db->query("SELECT  service_id,TCBR.price, 
	(SELECT CONCAT(price,'==>', TS.title,'==>',(SELECT media FROM  " . $this->tbl_services_media . "  AS TSM WHERE TSM.service_id = TS.id))
	
                  FROM  " . $this->tbl_services . "  AS TS WHERE TS.id = TCBR.service_id AND TS.status= 1) AS service_title_image ,
				  (SELECT F.username FROM  " . $this->freelancers . " AS F WHERE F.user_id = TCBR.seller_id) as seller_user_name
                  
                  FROM `" .$this->tbl_custom_buyer_request . "` AS TCBR WHERE TCBR.id = '".$id."' AND TCBR.buyer_id ='".get_session('user_id')."'");		  
				 
				 
        $adata['offerrequestdetail'] = array();
        if (count($query->result() > 0)) {
            foreach ($query->result() as $row) 
			{
				
				$service_title_image_price = explode('==>',$row->service_title_image);
				$aservicedetail['service_id'] = $row->service_id;
				$aservicedetail['request_price'] = $row->price;//$service_title_image_price[0];
				$aservicedetail['seller_user_name'] = $row->seller_user_name;//$service_title_image_price[0];
				$aservicedetail['service_title_image'] = $service_title_image_price[1].'==>'.$service_title_image_price[2]; 
            }
        }
        
		$adata['offerrequestdetail'] = (object )$aservicedetail;
		return $adata;
    }
	
	 public function customorderprice($id)
    {
        
		 
	/* $query  = $this->db->query("SELECT  (SELECT price
                  FROM  " . $this->tbl_services . "  AS TS WHERE TS.id = TCBR.service_id AND TS.status= 1) AS price
                  
                  FROM `" .$this->tbl_custom_buyer_request . "` AS TCBR WHERE TCBR.id = '".$id."'");		 */
	   $query  = $this->db->query("SELECT  TCBR.price FROM `" .$this->tbl_custom_buyer_request . "` AS TCBR WHERE TCBR.id = '".$id."'");			 
				 
        if (count($query->result()) > 0 ) {
            foreach ($query->result() as $row) 
			{
				 $data = $row->price; 
				
            }
        }
        
		
		return $data;
    }
	
	
	
	
	
	
    public function servicedetail($service_key, $uniqueid)
    {
        $adata          = array();
        $query          = $this->db->query("SELECT TS.id,TS.category_id,TS.title AS service_title,F.id as freelancer_id,F.freelancer_title,TS.description,

                TS.service_keyword AS servicekeyword ,CONCAT('$',TS.price) AS price,F.username,

                F.availablity, F.portfolio,F.linked_in,F.facebbok,F.google_plus,

                F.twitter ,F.instagram,F.location_id,   

                (SELECT title FROM " . $this->tbl_childmenu . " AS CM WHERE CM.id = TS.category_id) AS category_name,

                (SELECT name FROM " . $this->tbl_countries . " AS TC WHERE L.country = TC.id) AS country_name,

                (SELECT image FROM  " . $this->users . "  AS U WHERE U.id = TS.user_id) AS user_image

                FROM  " . $this->tbl_services . " AS TS

                INNER JOIN  " . $this->freelancers . " as F  ON TS.user_id=.F.user_id 

                INNER JOIN  " . $this->location . "  as L  ON F.location_id= L.id    

                WHERE TS.service_keyword = '" . $service_key . "' AND TS.unique_id = '" . $uniqueid . "'");
        $aservicedetail = array();
        if (count($query->result() > 0)) {
            foreach ($query->result() as $row) {
                $aservicedetail = $row;
            }
        }
        $adata['aservicedetail'] = $aservicedetail;
        return $adata;
    }
    /**===============buyer request====================**/
    public function buyerrequests($id)
    {
        $query        = $this->db->select('*')->from($this->tbl_buyer_request)->where('buyer_id', $id)->get();
        $abuyerrequst = array();
        $apending     = array();
        $aapprove     = array();
        $unapproved   = array();
        $apaused      = array();
        $data         = array();
        if (count($query->result()) > 0) {
            foreach ($query->result() as $row) {
			$row->require_doc=$this->setDoc($row->require_doc);
                if ($row->status == 0) {
                    $apending[] = $row;
                } else if ($row->status == 3) {
                    $unapproved[] = $row;
                } else if ($row->status == 1) {
					$orderplacedcheck = $this->orderplacedcheck($row->id);
                    $data['id']           = $row->id;
                    $data['buyer_id']     = $row->buyer_id;
                    $data['category_id']  = $row->category_id;
                    $data['description']  = $row->description;
                    $data['budget']       = $row->budget;
                    $data['delievry']     = $row->delievry;
                    $data['require_doc']  = $row->require_doc;
                    $data['status']       = $row->status;
                    $data['created_date'] = $row->created_date;
					$data{'assign_to_seller_offer_request_id'}   = $orderplacedcheck[0]->seller_offer_request_id;
                    //$data{'totaloffer'}   = $this->offerrequestcount($row->id);
					$data{'totaloffer'}   = count_tbl_where('tbl_seller_offer_to_request','request_id',$row->id);
					
					
                    $aapprove[]           = (object) $data;
                }
            }
        }
        $abuyerrequst['approve']   = $aapprove;
        $abuyerrequst['unapproved'] =$unapproved;
        $abuyerrequst['pending']   = $apending;
      
        return $abuyerrequst;
    }
	
	public function ifnull($array){
		$response=NULL;
		if(is_array($array)){
			if(count($array)>0){
				$response=$array;
			}
		}
		return $response;
	}
	
	public function setDoc($require_doc){
		$response=false;
		$file=FCPATH.'uploads/buyer/'.$require_doc;
						if(is_file($file)){
							
							$response=base_url().'uploads/buyer/'.$require_doc;
							}
								return $response;
		}
	public  function paidRequesttberemovedforSeller()
	{
	 	  $query  =  $this->db->query("SELECT request_id FROM `tbl_seller_offer_to_request` AS TSOTR INNER JOIN ".$this->db->database.'.'.$this->order." AS O
		ON TSOTR.id = O.seller_offer_request_id	");
		
		if (count($query->result()) > 0 ) {
		
		foreach ($query->result() as $row) 
		{
		$aPaidIds[]= $row->request_id;
		}
		return $aPaidIds;
		}
		
       return 0;
	}
	

	
	 
	
	public function buyerrequestcountforseller($id)
    {
        
		$adata = array();
		$user_category_id =  get_id_by_key('category_id','user_id',$id,$this->freelancers); // get user category id
        $query  = $this->db->query("SELECT id  FROM `".$this->tbl_buyer_request."`  AS TBR
		WHERE status=".$this->active." AND TBR.buyer_id !='".$id ."' AND TBR.category_id ='".$user_category_id."'");

         $idscount = array();
        if (count($query->result()) > 0 ) {
           
			$paidRequesttberemovedforSeller = $this->paidRequesttberemovedforSeller();
			$acheckremovedrequestids = $this->checkremovedrequestids();
            foreach ($query->result() as $row) 
			{
				if( in_array($row->id,$paidRequesttberemovedforSeller) or  in_array($row->id,$acheckremovedrequestids))
				{
					continue;	
				}
						
				$idscount[] = $row->id;
			}
        }
		//echo count($idscount);
		//die('heheefff');
		 return count($idscount);
		 
    } 
	
	public function checkremovedrequestids()
    {
     
		$query  = $this->db->select('request_id')->from($this->tbl_removed_request_by_sellers )->where('seller_id',get_session('user_id'))->get();
		$requestids = array();
		if (count($query->result()) > 0 ) {
		
			foreach ($query->result() as $row) 
			{
				$requestids[] = $row->request_id;
			}
		}
		return $requestids;
		 
    } 
	
      
	  public function buyerrequestforseller($id)
	  {

        $adata = array();
		$sellerservicesids = $this->sellerservicescategoriesids();  // get seller services ids
        if( empty ($sellerservicesids))
		{
		   return $adata;
		}
		
		
		$query  = $this->db->query("SELECT TBR.id,TBR.description,TBR.budget,TBR.delievry,TBR.created_date,TBR.require_doc,TBR.category_id,
		(SELECT users.image from ".$this->users."  WHERE users.id = TBR.buyer_id) AS user_image,
		(SELECT F.username from  ".$this->freelancers." AS F WHERE F.user_id = TBR.buyer_id) AS user_name  
		FROM `".$this->tbl_buyer_request."`  AS TBR
		WHERE status=".$this->active." AND TBR.buyer_id !='".$id ."' AND TBR.category_id  IN (".$sellerservicesids.")   
		ORDER BY  TBR.created_date DESC");

       $aservicedetail = array();
        if (count($query->result()) > 0 ) {
            $buyerequest = array();
			$paidRequesttberemovedforSeller = $this->paidRequesttberemovedforSeller();
			$acheckremovedrequestids = $this->checkremovedrequestids();
            foreach ($query->result() as $row) 
			{
				if( in_array($row->id,$paidRequesttberemovedforSeller) or  in_array($row->id,$acheckremovedrequestids))
				{
					continue;	
				}
						$userImg=FCPATH.'uploads/users/'.$row->user_image;
						if(is_file($userImg)){
							
							$userImg=base_url().'uploads/users/'.$row->user_image;
							}else{
								$userImg=base_url().'assets/noimg.png';
								}
					$require_doc=FCPATH.'uploads/buyer/'.$row->require_doc;
						if(is_file($require_doc)){
							
							$require_doc=base_url().'uploads/buyer/'.$row->require_doc;
							}else{
								$require_doc=false;
								}
							
								
				$buyerequest{'id'}             = $row->id;
				$buyerequest{'offer_sent'}             = count_tbl_where('tbl_seller_offer_to_request','request_id', $row->id). ' offer sent';
				$buyerequest{'category'}       = $this->getCatTitleById($row->category_id);
				$buyerequest{'description'}    = $row->description;
				$buyerequest{'user_name'}      = $row->user_name;
				$buyerequest{'budget'}         = $row->budget;
				$buyerequest{'delievry'}       = $row->delievry;
				$buyerequest{'created_date'}   = $row->created_date;
				$buyerequest{'require_doc'}   = $require_doc;
				$buyerequest{'user_image'}     =$userImg;
				$buyerequest{'applide_or_not'} = $this->sellerappliedoffer($row->id);
				$buyerequest{'totaloffer'}     = $this->offerrequestcount($row->id);
				$adata['buyerequest'][]        = (object) $buyerequest;
            }
        }
		
		return $adata;
    }
	
	function getCatTitleById($id){
		$title="Important Job";
		$subCHildQuery =$this->db->select('title')->from($this->tbl_childmenu)->where('sub_menu_id',$id)->get();
		if($subCHildQuery->num_rows()>0){
			$title= $subCHildQuery->row()->title;
			}else {
				
				$subQuery=$this->db->select('id,title')->from($this->tbl_submenu )->where('menu_id',$id)->get();
				if ($subQuery->num_rows()>0){
					$title= $subQuery->row()->title;
					}
				}	
				return $title;
		}
	
	 public function sellerordersfrombuyers($id,$type = 'normal')
    {
        $adata  = array();
      	if($type=='custom')
		{
			$query  = $this->db->query("SELECT O.id,O.seller_offer_request_id,TCBR.seller_id,O.payment_id AS payment_order_id,O.status,TCBR.price,TCBR.work_duration,
			(SELECT TS.title FROM ".$this->tbl_services." AS TS WHERE TS.id = TCBR.service_id AND TS.status=1) AS seller_service_info,
			(SELECT CONCAT(U.username,'==>',U.image) FROM ".$this->users."  as U WHERE U.id = O.user_id) AS buyer_name_and_image
			
			FROM ".$this->db->database.'.'.$this->order." AS O INNER JOIN    ".$this->tbl_custom_buyer_request." AS TCBR ON O.custom_order_id = TCBR.id  
			WHERE O.type ='custom' and TCBR.seller_id =".$id." ORDER BY O.created_on DESC");
		}
		else
		{
		
		$query  = $this->db->query("SELECT TSOTR.duration AS user_duartion_qoute,O.seller_offer_request_id,TSOTR.seller_id,TSOTR.price AS request_price,O.payment_id AS payment_order_id,O.status,
			(SELECT title FROM ".$this->tbl_services." AS TS WHERE TS.id = TSOTR.service_id AND TS.status=1) AS service_title,
				(SELECT 
					(SELECT  CONCAT(F.username,'==>',(SELECT image FROM users AS U WHERE U.id  = F.user_id))
					 FROM ".$this->freelancers."  AS F WHERE F.user_id = TBR.buyer_id )
					FROM  ".$this->tbl_buyer_request." AS TBR WHERE TBR.id = TSOTR.request_id 
			  )
			  AS buyer_name_and_image
			FROM  ".$this->db->databse.".".$this->order." AS O INNER JOIN   ".$this->tbl_seller_offer_to_request."  AS TSOTR
			ON O.seller_offer_request_id = TSOTR.id WHERE TSOTR.seller_id = ".$id." AND  O.type ='normal' ORDER BY O.created_on DESC 
			 ");
		//lq();
			
		}
		if (count($query->result()) > 0 ) 
		{
            
			$aactive = array();
			$acompleted = array();
			$adelivered = array();
			$asellerorders = array();
			$arevsion = array();
			$adisputed = array();
			
			foreach ($query->result() as $row) 
			{
				$arr=explode('==>',$row->buyer_name_and_image);
				$row->buyer_name=$arr[0];
				$row->buyer_image=setUserImage('users/'.$arr[1]);
				unset($row->buyer_name_and_image);
				if ($row->status == ACTIVE) 
				{
					$aactive[]= $row; 
				}
				else
				if ($row->status == DELIVERED)
				{ // for deleiverd work
					$adelivered[]= $row; 
				}
				else
				if ($row->status == COMPLETED)
				{
					$acompleted[]= $row; 
				}
				else
				 if ($row->status == REVISION) {
					$arevsion[]= $row; 
				 }
				  else if ($row->status == DISPUTED) {
                    $adisputed[] = $row;
                }
			}
			
			$asellerorders['aactive']   = $aactive;
			$asellerorders['adelivered'] = $adelivered;
			$asellerorders['acompleted']   = $acompleted;
			$asellerorders['arevsion']   = $arevsion;
			 $asellerorders['adisputed']  = $adisputed;
		}
        return $asellerorders;
     }
	
	 // old function
	/*public function buyerordersmanagement($id,$type = 'normal')
    {
        $adata  = array();
      	if($type=='custom')
		{
			
			$query  = $this->db->query("SELECT O.id,O.seller_offer_request_id,TCBR.seller_id,O.payment_id AS payment_order_id,O.status,O.created_on,TCBR.work_duration,TCBR.price,
			(SELECT  file  FROM ".$this->order_files." AS OF WHERE OF.order_id = O.payment_id order by delivered_time desc LIMIT 0,1) AS sellerfiles,
			(SELECT CONCAT(TS.title,'==>',TS.price,'==>',TS.delivery_time,'==>',TS.service_keyword,'==>',TS.unique_id) FROM ".$this->tbl_services." AS TS WHERE TS.id = TCBR.service_id AND TS.status=1) AS seller_service_info,
			(SELECT CONCAT(U.username,'==>',U.image) FROM ".$this->users."  as U WHERE U.id = TCBR.seller_id) AS seller_name_and_image
			
			 FROM ".$this->db->databse.".order AS O INNER JOIN    ".$this->tbl_custom_buyer_request." AS TCBR ON O.custom_order_id = TCBR.id  
			 WHERE O.type ='custom' and O.user_id =".$id." ORDER BY O.created_on DESC");
			 
			
						
		}
		else
		{
		
		$query  = $this->db->query("SELECT TSOTR.duration AS user_duartion_qoute,O.seller_offer_request_id,TSOTR.seller_id,TSOTR.price AS request_price,O.payment_id AS payment_order_id,O.status,
		(SELECT  file  FROM ".$this->order_files." AS OF WHERE OF.order_id = O.payment_id order by delivered_time desc LIMIT 0,1) AS sellerfiles,
			(SELECT CONCAT(TS.title,'==>',TS.service_keyword,'==>',TS.unique_id) FROM ".$this->tbl_services." AS TS WHERE TS.id = TSOTR.service_id AND TS.status=1) AS seller_service_info,
				(SELECT 
					(SELECT  CONCAT(F.username,'==>',(SELECT image FROM users AS U WHERE U.id  = F.user_id))
					 FROM ".$this->freelancers."  AS F WHERE F.user_id = TSOTR.seller_id )
					FROM  ".$this->tbl_buyer_request." AS TBR WHERE TBR.id = TSOTR.request_id 
			  )
			  AS seller_name_and_image
			FROM  ".$this->db->databse.".".$this->order." AS O INNER JOIN   ".$this->tbl_seller_offer_to_request."  AS TSOTR
			ON O.seller_offer_request_id = TSOTR.id WHERE O.user_id = ".$id." AND  O.type ='normal'  ORDER BY O.created_on DESC 
			 ");
		}
		
     if (count($query->result()) > 0) 
		{
		   $aactive = array();
		   $amanage = array();
		   $arevsion = array();
		   $acompleted = array();
		   $abuyerorders = array();
			foreach ($query->result() as $row) 
			{
				 if ($row->status == ACTIVE) {
					$aactive[]= $row; 
				 }
				 else
				  if ($row->status == DELIVERED) { 
					$amanage[]= $row; 
				 }
				 else
				 if ($row->status == COMPLETED) {
					$acompleted[]= $row; 
				 }
				  else
				 if ($row->status == REVISION) {
					$arevsion[]= $row; 
				 }
			}
			
			$abuyerorders['aactive']   = $aactive;
			$abuyerorders['amanage'] = $amanage;
			$abuyerorders['arevsion']   = $arevsion;
			$abuyerorders['acompleted']   = $acompleted;
			
		}
		
        return $abuyerorders;
    }*/
	 
	public function buyerordersmanagement($id,$type = 'normal')

    {

        $adata  = array();

      	if($type=='custom')

		{

			

			$query  = $this->db->query("SELECT O.id,O.seller_offer_request_id,TCBR.seller_id,O.payment_id AS payment_order_id,O.status,O.created_on,TCBR.work_duration,TCBR.price,

			(SELECT  file  FROM ".$this->order_files." AS OF WHERE OF.order_id = O.id ) AS sellerfiles,

			(SELECT CONCAT(TS.title,'==>',TS.price,'==>',TS.delivery_time,'==>',TS.service_keyword,'==>',TS.unique_id) FROM ".$this->tbl_services." AS TS WHERE TS.id = TCBR.service_id AND TS.status=1) AS seller_service_info,

			(SELECT CONCAT(U.username,'==>',U.image) FROM ".$this->users."  as U WHERE U.id = TCBR.seller_id) AS seller_name_and_image

			

			 FROM ".$this->db->databse.".order AS O INNER JOIN    ".$this->tbl_custom_buyer_request." AS TCBR ON O.custom_order_id = TCBR.id  

			 WHERE O.type ='custom' and O.user_id =".$id." ORDER BY O.created_on DESC");

			

						

		}

		else

		{

		

		$query  = $this->db->query("SELECT TSOTR.duration AS user_duartion_qoute,O.seller_offer_request_id,TSOTR.seller_id,TSOTR.price AS request_price,O.payment_id AS payment_order_id,O.status,

		(SELECT  file  FROM ".$this->order_files." AS OF WHERE OF.order_id = O.id ) AS sellerfiles,

			(SELECT CONCAT(TS.title,'==>',TS.service_keyword,'==>',TS.unique_id) FROM ".$this->tbl_services." AS TS WHERE TS.id = TSOTR.service_id AND TS.status=1) AS seller_service_info,

				(SELECT 

					(SELECT  CONCAT(F.username,'==>',(SELECT image FROM users AS U WHERE U.id  = F.user_id))

					 FROM ".$this->freelancers."  AS F WHERE F.user_id = TSOTR.seller_id )

					FROM  ".$this->tbl_buyer_request." AS TBR WHERE TBR.id = TSOTR.request_id 

			  )

			  AS seller_name_and_image

			FROM  ".$this->db->databse.".".$this->order." AS O INNER JOIN   ".$this->tbl_seller_offer_to_request."  AS TSOTR

			ON O.seller_offer_request_id = TSOTR.id WHERE O.user_id = ".$id." AND  O.type ='normal'  ORDER BY O.created_on DESC 

			 ");

		}

		//lq();

     if (count($query->result()) > 0) 

		{

		  

			foreach ($query->result() as $row) 

			{
				
				if($row->seller_service_info!=NULL){
				$seller_service_infoARR=explode('==>',$row->seller_service_info);
				$sellerArr['title']=$seller_service_infoARR[0];
				$sellerArr['price']=$seller_service_infoARR[1];
				$sellerArr['delivery']=$seller_service_infoARR[2];
				$sellerArr['service_id']=$seller_service_infoARR[4];
				$row->seller_service_info=$sellerArr;
				}
				$arr=explode('==>',$row->seller_name_and_image);
				$row->seller_name=$arr[0];
				$row->seller_image=setUserImage('users/'.$arr[1]);
				unset($row->seller_name_and_image);
				$abuyerorders[]=$row;


			}

			

			

		}

		

        return $abuyerorders;

    } 
	
	 
	 // old fucntion
	 
	/* public function sellerorderdetail($id,$sellerid ='',$type = 'normal')
     {
        $adata   = array();
		  if($type =='custom')
		  {
		
				
			$query  = $this->db->query("SELECT O.orderNo,O.amount,O.created_on,O.payment_id,TCBR.buyer_id,TCBR.price,TCBR.work_duration,
				(SELECT username FROM  ".$this->users."  AS U WHERE U.id  = TCBR.buyer_id) AS payer_name,
				(SELECT CONCAT(title,'=>',price,'=>',delivery_time,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services." AS TS
				WHERE TS.id  = TCBR.service_id) AS service_detail
				
				FROM  ".$this->db->database.'.'.$this->order." AS O 
				INNER JOIN ".$this->tbl_custom_buyer_request." AS TCBR 
				ON TCBR.id = O.custom_order_id WHERE TCBR.seller_id = ".$sellerid."  AND TCBR.status = ".$this->active." AND O.payment_id =".$id." 
				AND O.type = 'custom'
				");
			}
			else
			{  
				$query  = $this->db->query("
				SELECT TOP.buyer_id,TSOTR.service_id,TSOTR.price,TSOTR.duration,
				O.orderNo ,O.amount,O.created_on,O.payment_id,TSOTR.description AS offer_description,
				(SELECT username FROM users  WHERE users.id  =TOP.buyer_id ) as payer_name,
				(SELECT CONCAT(title,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services."  AS TS 
				WHERE TS.id = TSOTR.service_id) AS service_detail
				FROM `order` AS O
				
				INNER JOIN  ".$this->tbl_seller_offer_to_request." AS TSOTR  ON TSOTR.id = O.seller_offer_request_id
				INNER JOIN  ".$this->tbl_buyer_request." AS TOP  ON TOP.id = TSOTR.request_id
				
				WHERE O.payment_id = ".$id."
				");
		}
		
		if (count($query->result()) > 0) 
		{
		
			foreach ($query->result() as $row) 
			{
				$adata[]  = $row;
			}
		}
        return $adata;
    }*/
	
	 // new function 
	 public function sellerorderdetail($id,$buyerorseller ='',$type = 'normal',$forbuyer='buyer')
     {
        $adata   = array();
		
		$andmoreparam = ' TOP.buyer_id='.$buyerorseller;
		 $buyerorpayername = 'TSOTR.seller_id ';
		if($forbuyer =='seller' AND $type =='normal')
		{
		  $andmoreparam = ' TSOTR.seller_id='.$buyerorseller;	
		  $buyerorpayername = 'TOP.buyer_id ';
		  
		}
		
		  if($type =='custom')
		  {  // O.id AS orderderid
				$query  = $this->db->query("SELECT  O.id AS orderderid,O.orderNo,O.amount,O.created_on,O.payment_id,TCBR.buyer_id,TCBR.price,TCBR.work_duration,
				(SELECT username FROM  ".$this->users."  AS U WHERE U.id  = TCBR.buyer_id) AS payer_name,
				(SELECT CONCAT(title,'=>',price,'=>',delivery_time,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services." AS TS
				WHERE TS.id  = TCBR.service_id) AS service_detail
				
				FROM  ".$this->db->database.'.'.$this->order." AS O 
				INNER JOIN ".$this->tbl_custom_buyer_request." AS TCBR 
				ON TCBR.id = O.custom_order_id WHERE TCBR.seller_id = ".$buyerorseller."  AND TCBR.status = ".$this->active." AND O.payment_id =".$id." 
				AND O.type = 'custom'
				");
				
			}
			else
			{  
				$query  = $this->db->query("
				SELECT O.id AS orderderid, TOP.buyer_id,TSOTR.service_id,TSOTR.price,TSOTR.duration,
				O.orderNo ,O.amount,O.created_on,O.payment_id,TSOTR.description AS offer_description,
				(SELECT username FROM users  WHERE users.id  =".$buyerorpayername." ) as payer_name,
				(SELECT CONCAT(title,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services."  AS TS 
				WHERE TS.id = TSOTR.service_id) AS service_detail
				FROM  ".$this->db->database.'.'.$this->order." AS O 
				
				INNER JOIN  ".$this->tbl_seller_offer_to_request." AS TSOTR  ON TSOTR.id = O.seller_offer_request_id
				INNER JOIN  ".$this->tbl_buyer_request." AS TOP  ON TOP.id = TSOTR.request_id
				
				WHERE O.payment_id = ".$id." AND ".$andmoreparam."
				");
				//lq();
		}
		
		if (count($query->result()) > 0) 
		{
		
			foreach ($query->result() as $row) 
			{
				$adata[]  = $row;
			}
		}
        return $adata;
    }
	 
	 // new added
	 
	  public function buyerorderdetail($id,$buyerorseller ='',$type = 'normal',$forbuyer='buyer')
     {
        $adata   = array();
		
		$andmoreparam = ' TOP.buyer_id='.$buyerorseller;
		 $buyerorpayername = 'TSOTR.seller_id ';
		if($forbuyer =='seller' AND $type =='normal')
		{
		  $andmoreparam = ' TSOTR.seller_id='.$buyerorseller;	
		  $buyerorpayername = 'TOP.buyer_id ';
		  
		}
		
		  if($type =='custom')
		  {  // O.id AS orderderid
				$query  = $this->db->query("SELECT  O.id AS orderderid,O.orderNo,O.amount,O.created_on,O.payment_id,TCBR.buyer_id,TCBR.price,TCBR.work_duration,TCBR.service_id,
				(SELECT username FROM  ".$this->users."  AS U WHERE U.id  = TCBR.seller_id) AS payer_name,
				(SELECT CONCAT(title,'=>',price,'=>',delivery_time,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services." AS TS
				WHERE TS.id  = TCBR.service_id) AS service_detail
				
				FROM  ".$this->db->database.'.'.$this->order." AS O 
				INNER JOIN ".$this->tbl_custom_buyer_request." AS TCBR 
				ON TCBR.id = O.custom_order_id WHERE TCBR.buyer_id = ".$buyerorseller."  AND TCBR.status = ".$this->active." AND O.payment_id =".$id." 
				AND O.type = 'custom'
				");
				//lq();
			}
			else
			{  
				$query  = $this->db->query("
				SELECT O.id AS orderderid, TOP.buyer_id,TSOTR.service_id,TSOTR.price,TSOTR.duration,
				O.orderNo ,O.amount,O.created_on,O.payment_id,TSOTR.description AS offer_description,
				(SELECT username FROM users  WHERE users.id  =".$buyerorpayername." ) as payer_name,
				(SELECT CONCAT(title,'=>',service_keyword,'=>',unique_id) FROM ".$this->tbl_services."  AS TS 
				WHERE TS.id = TSOTR.service_id) AS service_detail
				FROM  ".$this->db->database.'.'.$this->order." AS O 
				
				INNER JOIN  ".$this->tbl_seller_offer_to_request." AS TSOTR  ON TSOTR.id = O.seller_offer_request_id
				INNER JOIN  ".$this->tbl_buyer_request." AS TOP  ON TOP.id = TSOTR.request_id
				
				WHERE O.payment_id = ".$id." AND ".$andmoreparam."
				");
				//lq();
		}
		
		if (count($query->result()) > 0) 
		{
		
			foreach ($query->result() as $row) 
			{
				$adata[]  = $row;
			}
		}
        return $adata;
    }
	 
	 
	
	public function orderplacedcheck($requestid)
    {
        
		$adata = array();  
        $query  = $this->db->query("SELECT TOP.seller_offer_request_id,TSOTR.seller_id FROM `".$this->tbl_seller_offer_to_request."`AS TSOTR
        INNER JOIN ".$this->tbl_order_payments." AS TOP ON  TSOTR.id = TOP.seller_offer_request_id
		WHERE TSOTR.request_id = ".$requestid."");
		
		//lq();
		
        $adata = array();
		
        if (count($query->result()) > 0) 
        {
         
           $result = $query->result();
        }
		else
		
			$query  = $this->db->query("SELECT OCD.seller_offer_request_id,TSOTR.seller_id FROM `".$this->tbl_seller_offer_to_request."`AS TSOTR
			INNER JOIN ".$this->order_card_detail." AS OCD ON  TSOTR.id = OCD.seller_offer_request_id
			WHERE TSOTR.request_id = ".$requestid."");
			$adata = array();
			if (count($query->result()) > 0) 
			{
			 
				$result= $query->result();
			}
        
		return $result;

    }
	
	public function avgRatingByFreelance($user_id){
		
		$serviceids=$this->db->query('SELECT id FROM tbl_services where user_id='.$user_id)->result_array();
	$ids=array();
	if(count($serviceids)>0){
		foreach($serviceids as $key){
		$ids[]=$key['id'];	
			}
			$averageRating=0;
	$rating=	$this->db->select('AVG(rating) as averageRating')->from('tbl_review_rating')->where_in('service_id', $ids)->get()->row()->averageRating;
	if($rating>0){
		return $rating;
		}
		else{
			return $averageRating;
			}
	}else{
		return 0;
		}
		}
		public function avgSellingPrice($user_id){
		
		
			$averageSellingPrice=0;
	$avg=	$this->db->select('AVG(price) as averageSellingPrice')->from('tbl_services')->where('user_id', $user_id)->get()->row()->averageSellingPrice;
	if($avg>0){
		 $averageSellingPrice = round($avg,2);
		}
		return $averageSellingPrice;
	}
		
	
    public function buyerrecivedoffer($buyerid, $requestid)
    {
        $adata = array();
        $query = $this->db->query("SELECT TBR.buyer_id,TBR.id,TBR.description,TBR.budget,TBR.delievry,TBR.status , 

                (SELECT  image FROM  " . $this->users . "  AS U WHERE U.id = TBR.buyer_id ) AS buyerimage,

				(SELECT username FROM  " . $this->freelancers . "  AS F WHERE F.user_id = TBR.buyer_id ) AS buyer_username 

				 FROM " . $this->tbl_buyer_request . " AS TBR 

                WHERE TBR.id = " . $requestid . " AND TBR.buyer_id = " . $buyerid . " AND TBR.status = " . $this->active . "");
        if (count($query->result()) > 0) {
			$Request = $query->row();
			$Request->buyerimage=setUserimage('users/'.$Request->buyerimage);
            $abuyerrequest = $Request; // buyer request 
            //echo  $abuyerrequest[0]->id;
            $ordercheck    = $this->orderplacedcheck($Request->id);
            $adata         = array();
            $query         = $this->db->query("

                  SELECT F.id AS freelancer_id,F.user_id,F.username,F.freelancer_title ,TSOTR.id AS request_id,TSOTR.description,TSOTR.price AS price,TSOTR.service_id, 

                  (SELECT image FROM users AS U WHERE U.id = F.user_id ) AS freelancerimage, 

                  

                   IF(TSOTR.duration > 1, CONCAT(TSOTR.duration,' ','Days'), CONCAT(TSOTR.duration,' ','Day')) AS duration,

				   

                   (

                   SELECT CONCAT

                   (

                        (SELECT name FROM " . $this->tbl_countries . " AS TC WHERE TC.id = L.country ),' , ', 

                        (SELECT name FROM   " . $this->tbl_cities . " AS TCC WHERE TCC.id = L.city )

                   ) 

                    FROM location AS L WHERE L.id = F.location_id) as frellancer_location,

                    TSOTR.seller_id, 

                        (

                            SELECT GROUP_CONCAT(

                            (

                                SELECT S.title FROM   " . $this->skills . "  AS S WHERE TFS.skill_id = S.id)

                            ) 

                            FROM  " . $this->tbl_freelancer_skill . "   AS TFS WHERE TFS.freelancer_id = F.id

                        ) 

                       AS freelancer_skills FROM `" . $this->tbl_seller_offer_to_request . "` as TSOTR

                       INNER JOIN freelancers AS F ON F.user_id = TSOTR.seller_id

                       WHERE TSOTR.seller_id != " . $buyerid . " and TSOTR.request_id = " . $Request->id . "");
            $adata         = array();
            if (count($query->result() > 0)) {
                $asellerrequest = array();
                foreach ($query->result() as $row) {
					$row->freelancerimage=setUserimage('users/'.$row->freelancerimage); 
					$row->avgRating=$this->avgRatingByFreelance($row->user_id);
					//unset($row->user_id);
                    $asellerrequest[] = $row;
                }
            }
            $adata['abuyerrequest']         = $abuyerrequest;
            $adata['asellerrequest']        = $asellerrequest;
            $adata['ordercheck']            = count($ordercheck);
            $adata['job_awarded_seller_id'] = $ordercheck[0]->seller_id;
            //pre($adata);
        }
        return $adata;
    }
    public function sllersentoffers($id)
    {
        /*$adata = array();
        $query = $this->db->query("  SELECT id,description, CONCAT('$ ',price) AS price,duration,request_id 
            FROM `tbl_seller_offer_to_request`  WHERE status = 1 AND seller_id = " . $id . "");
        $adata = array();
        if (count($query->result() > 0)) {
            $buyerequest = array();
            foreach ($query->result() as $row) {
                $sellerrequestrow{'description'} = $row->description;
                $sellerrequestrow{'price'}       = $row->price;
                $sellerrequestrow{'duration'}    = $row->duration;
                //$sellerrequestrow{'totaloffer'} = $this->offerrequestcount($row->request_id ); 
                $adata['sellersentoffers'][]     = (object) $sellerrequestrow;
            }
        }
        return $adata;*/
		

        $adata = array();
		$sellerservicesids = $this->sellerservicescategoriesids();  // get seller services ids
        if( empty ($sellerservicesids))
		{
		   return $adata;
		}
		
		
		$query  = $this->db->query("SELECT TBR.id,TBR.description,TBR.budget,TBR.delievry,TBR.created_date,TBR.require_doc,TBR.category_id,
		(SELECT users.image from ".$this->users."  WHERE users.id = TBR.buyer_id) AS user_image,
		(SELECT F.username from  ".$this->freelancers." AS F WHERE F.user_id = TBR.buyer_id) AS user_name  
		FROM `".$this->tbl_buyer_request."`  AS TBR
		WHERE status=".$this->active." AND TBR.buyer_id !='".$id ."' AND TBR.category_id  IN (".$sellerservicesids.")   
		ORDER BY  TBR.created_date DESC");

       $aservicedetail = array();
        if (count($query->result()) > 0 ) {
            $buyerequest = array();
			$paidRequesttberemovedforSeller = $this->paidRequesttberemovedforSeller();
			$acheckremovedrequestids = $this->checkremovedrequestids();
            foreach ($query->result() as $row) 
			{
				if( in_array($row->id,$paidRequesttberemovedforSeller) or  in_array($row->id,$acheckremovedrequestids))
				{
					continue;	
				}
						$userImg=FCPATH.'uploads/users/'.$row->user_image;
						if(is_file($userImg)){
							
							$userImg=base_url().'uploads/users/'.$row->user_image;
							}else{
								$userImg=base_url().'assets/noimg.png';
								}
					$require_doc=FCPATH.'uploads/buyer/'.$row->require_doc;
						if(is_file($require_doc)){
							
							$require_doc=base_url().'uploads/buyer/'.$row->require_doc;
							}else{
								$require_doc=false;
								}
							
								
				$buyerequest{'id'}             = $row->id;
				$buyerequest{'offer_sent'}             = count_tbl_where('tbl_seller_offer_to_request','request_id', $row->id). ' offer sent';
				$buyerequest{'category'}       = $this->getCatTitleById($row->category_id);
				$buyerequest{'description'}    = $row->description;
				$buyerequest{'user_name'}      = $row->user_name;
				$buyerequest{'budget'}         = $row->budget;
				$buyerequest{'delievry'}       = $row->delievry;
				$buyerequest{'created_date'}   = $row->created_date;
				$buyerequest{'require_doc'}   = $require_doc;
				$buyerequest{'user_image'}     =$userImg;
				
				$buyerequest{'totaloffer'}     = $this->offerrequestcount($row->id);
				$applide = $this->sellerappliedoffer($row->id);
				$buyerequest{'applide_or_not'} = $this->sellerappliedoffer($row->id);
				if($applide){
				$adata['sellersentoffers'][]        = (object) $buyerequest;
				}
            }
        }
		
		return $adata;
    
		
		
    }
    function offerrequestcount($requestid)
    {
        $query  = $this->db->query("SELECT count(request_id) as totaloffer FROM `tbl_seller_offer_to_request` WHERE  request_id = " . $requestid . "");
        $result = 0;
        if ($query->num_rows() > 0) {
            $rowscount = $query->result();
            $result    = $rowscount[0]->totaloffer;
        }
        return $result;
    }
	
	
    function sellerappliedoffer($requestid)
    {
        if (USER_ID=='') {
            return 2;
        }
        $query  = $this->db->query("SELECT count(request_id) AS applide_or_not FROM tbl_seller_offer_to_request
        WHERE tbl_seller_offer_to_request.request_id=" . $requestid . " AND tbl_seller_offer_to_request.seller_id=" . USER_ID . "");
        $result = 0;
        if ($query->num_rows() > 0) {
            $rowscount = $query->result();
            $result    = $rowscount[0]->applide_or_not;
        }
        return $result;
    }
    /**===============buyer request====================**/
    function saveOrderDetail($order_id)
    {
        foreach ($this->cart->contents() as $items) {
            $proid      = $items['id'];
            $product_id = explode('sku_', $proid);
            $this->db->insert('order_product_detail', array(
                'qty' => $items['qty'],
                'order_id' => $order_id,
                'product_id' => $product_id[1]
            ));
            // insert into product extras detail
            $opd_id   = $this->db->insert_id();
            $extraIDs = explode(',', $items['extraIDs']);
            if (is_array($extraIDs) && !empty($extraIDs)) {
                foreach ($extraIDs as $key => $extra_id) {
                    if (!empty($extra_id)) {
                        $this->db->insert('order_product_extras', array(
                            'opd_id' => $opd_id,
                            'extra_item_id' => $extra_id
                        ));
                    }
                }
            }
        }
    }
    public function getprofileinfo($id)
    {
        if ($id=='') {
            $response['status'] = 204;
                        $response['message'] = 'seller id required!';
                        echo json_encode($response);
                        exit;
        }
        $profileinfo    = $this->db->select('username,freelancer_title,description,location_id,lang as language,created_on as memberSince')->from($this->freelancers)->where('user_id', $id)->get()->row();
        
		
        $online  = get_row_all('online,image,username', 'id', $id, $this->users);
        $freelancerinfo = array();
        $aLocation      = array();
        if (count($profileinfo) > 0) {
            $aLocation                             = getuserlocation($profileinfo->location_id, true);
			unset($profileinfo->location_id);
			$profileinfo->location=$aLocation->city_name.' ,'.$aLocation->country_name;
			$profileinfo->memberSince=date('F j, Y',strtotime($profileinfo->memberSince));
			$profileinfo->recent_delivery="2 weeks ago";
			$profileinfo->freelancer_image=setUserImage('users/'.$online[0]->image);
			//die('in ffffff');
            //$freelancerinfo['freelancer_location'] = $aLocation;
            $freelancerinfo['online'] = (int) $online[0]->online;
            $freelancerinfo['SellerProfileinfo'] = $profileinfo;
			$freelancerinfo['gigs'] = $this->getsellerservice($id);
			
            return $freelancerinfo;
        } else {
            return 0;
        }
    }
	
	function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
	
	 public function sellerInfoByFreelancerID($id)
    {
        if (empty($id)) {
            exit;
        }
        $profileinfo    = $this->db->select('username,user_id,freelancer_title,description,location_id,lang as language')->from($this->freelancers)->where('id', $id)->get()->row();
        
		
        $online  = get_row_all('online,image,username', 'id', $profileinfo->user_id, $this->users);
	    $freelancerinfo = array();
        $aLocation      = array();
        if (count($profileinfo) > 0) {
            $aLocation                             = getuserlocation($profileinfo->location_id, true);
			
			$profileinfo->avgRating=$this->avgRatingByFreelance($profileinfo->user_id);
			$profileinfo->location=$aLocation->country_name;
			$profileinfo->language=$profileinfo->language;
			 $profileinfo->userImage     = setUserImage('users/'.$online[0]->image);
           
			
			unset($profileinfo->location_id);
			unset($profileinfo->user_id);
			//die('in ffffff');
            $freelancerinfo['freelancer_info']     = $profileinfo;
           
            return $freelancerinfo;
        } else {
            return 0;
        }
    }
	
    /******************** ios noitifcation start****************************/
    function send_ios_notification($deviceToken, $message)
    {
        $response   = array();
        $passphrase = 'Bibliophile';
        $ctx        = stream_context_create();
        //stream_context_set_option($ctx, 'ssl', 'local_cert','certificates/pushCertificate.pem');
        stream_context_set_option($ctx, 'ssl', 'local_cert', 'certificates/pushCertificate.pem');
        stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
        //                $notificationUrl = 'ssl://gateway.sandbox.push.apple.com:2195';
        $notificationUrl = 'ssl://gateway.push.apple.com:2195';
        // Open a connection to the APNS server
        $fp              = stream_socket_client($notificationUrl, $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx);
        if (!$fp)
            exit("Failed to connect: $err $errstr" . PHP_EOL);
        $response['connection'] = 'Connected to APNS' . PHP_EOL;
        // Create the payload body
        $body['aps']            = array(
            'alert' => $message,
            'sound' => 'default'
        );
        // Encode the payload as JSON
        $payload                = json_encode($body);
        // Build the binary notification
        $msg                    = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
        // Send it to the server
        $result                 = fwrite($fp, $msg, strlen($msg));
        if (!$result)
            echo 'Message not delivered' . PHP_EOL;
        else
            $response['notification'] = 'Message successfully delivered' . PHP_EOL;
        // Close the connection to the server
        fclose($fp);
        return $response;
    }
    /************send android push notificattion**********************/
    function send_android_notification($push_id, $message)
    {
        $registrationIds = array(
            $push_id
        );
        // prep the bundle 
        $msg             = array(
            'title' => 'Haqkhateeb',
            'message' => $message,
            'vibrate' => 1,
            'sound' => 1
        );
        $fields          = array(
            'registration_ids' => $registrationIds,
            'data' => $msg
        );
        $headers         = array(
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch              = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    /******************************************************************/
    public function send_smtp_email($to, $from, $from_heading, $subject, $htmlContent)
    {
        $this->load->library('email');
        //SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.skillsquared.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@skillsquared.com',
            'smtp_pass' => 'P@ssword123',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        //Email content
        $this->email->to($to);
        $this->email->from('noreply@skillsquared.com', $from_heading);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        //Send email
        if ($this->email->send()) {
            return 1;
        } else {
            //$this->send_mail($to, $from, $from_heading, $subject, $htmlContent);
            //$this->send_smtp_email2($to, $from, $from_heading, $subject, $htmlContent);
            //    return 0;
            echo $this->email->print_debugger();
        }
    }
    
    
    
        public function send_smtp_email2($to, $from, $from_heading, $subject, $htmlContent)
    {
        //Load email library
        $this->load->library('email');
        //SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.skillsquared.com',
            'smtp_port' => 465,
            'smtp_user' => 'support@skillsquared.com',
            'smtp_pass' => 'P@ssword123',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->initialize($config);
        
        //Email content
        $this->email->to($to);
        $this->email->from('support@skillsquared.com', $from_heading);
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        //Send email
        if ($this->email->send()) {
            return 1;
        } else {
           // $this->send_mail($to, $from, $from_heading, $subject, $htmlContent);
            //    return 0;
            echo $this->email->print_debugger();
        }
    }
    
    function send_mail($to, $from, $from_heading, $subject, $htmlContent)
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
    }
    public function saveRecord($id, $data_array, $table, $key = 'id')
    {
        if (!empty($id)) {
            if (!empty($key)) {
                $ql = $this->db->select('id')->from($table)->where($key, $id)->get()->row();
                if (count($ql) > 0) {
                    $this->db->where('id', $ql->id);
                    $result = $this->db->update($table, $data_array);
                    if ($result) 
					{
                        $result = 2;
                    }
                }
            } else {
                $ql = $this->db->select('id')->from($table)->where('id', $id)->get();
                if ($ql->num_rows() > 0) {
                    $this->db->where('id', $id);
                    $result = $this->db->update($table, $data_array);
                    if ($result) {
                        $result = 2;
                    }
                }
            }
        } else {
            // add new record
            //    echo $table;pre($data_array);
            $dbExi  = $this->db->insert($table, $data_array);
            //    echo $this->db->_error_message();die();
            $result = 0;
            if ($dbExi) {
                $result = 1;
            }
        }
        return $result;
    }
    public function save($data_array, $table, $uniqueField, $uniqueVal)
    {
        $query = $this->db->select('*')->from($table)->where($uniqueField, $uniqueVal)->get();
        if ($query->num_rows() > 0) {
            $result = 2;
        } else {
            $dbExi  = $this->db->insert($table, $data_array);
            $result = 0;
            if ($dbExi) {
                $result = 1;
            }
        }
        return $result;
    }
    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return 0;
        }
    }
    public function get_by_user($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('user_id', USER_ID);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return 0;
        }
    }
    public function delete($id, $table)
    {
        //echo $id. ' ' .$table;die('L');
        $this->db->where('id', $id);
        $result = $this->db->delete($table);
        //    $this->pq();
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function edit($id, $table, $column = 'id')
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($column, $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->row();
        } else {
            return 0;
        }
    }
    public function changeStatus($id, $tblName, $status)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where("id", $id);
        $result = $this->db->update($tblName, $data);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function changeFieldStatus($id, $tblName, $status)
    {
        $data = array(
            'validated' => $status
        );
        $this->db->where("id", $id);
        $result = $this->db->update($tblName, $data);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function changeUserStatus($id, $tblName, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else if ($status == 1) {
            $status = 0;
        } else {
            $status = 0;
        }
        $data = array(
            'active' => $status
        );
        $this->db->where('id', $id);
        $result = $this->db->update($tblName, $data);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function update($id, $data_array, $table, $uniqueField, $uniqueVal)
    {
        /*echo '$id :'.$id ;
        
        
        
        
        
        
        
        echo '$data_array :'.$data_array ;
        
        
        
        
        
        
        
        echo '$table :'.$table ;
        
        
        
        
        
        
        
        echo '$uniqueField : '.$uniqueField ;
        
        
        
        
        
        
        
        echo '$uniqueVal : '.$uniqueVal ;
        
        
        
        
        
        
        
        die('<-- die ---->');*/
        $sql  = "SELECT * FROM " . $table . " WHERE " . $uniqueField . "='" . $uniqueVal . "' ";
        $data = $this->db->query($sql);
        if ($data->num_rows() > 0) {
            if ($data->row()->id != $id) {
                $result = 2;
            } else {
                $this->db->where('id', $id);
                $result = $this->db->update($table, $data_array);
            }
        } else {
            $this->db->where('id', $id);
            $result = $this->db->update($table, $data_array);
            if ($result) {
                $result = 1;
            } else {
                $result = 0;
            }
        }
        return $result;
    }
    public function insert($table, $data_array)
    {
        $dbExi = $this->db->insert($table, $data_array);
        if ($dbExi) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function insert_get_insert_id($table, $data_array)
    {
        $dbExi = $this->db->insert($table, $data_array);
        if ($dbExi) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    public function update_where($id, $table, $data_array)
    {
        //echo '$id '. $id .'$table '. $table . '$data_array ' ; pre($data_array);
        $this->db->where('id', $id);
        $result = $this->db->update($table, $data_array);
        //echo $this->db->last_query(); die('?');
        if ($result)
            return 1;
        else
            return 0;
    }
    public function update_where_specific_field($field, $field_value, $table, $data_array)
    {
        //echo '$id '. $id .'$table '. $table . '$data_array ' ; pre($data_array);
        $this->db->where($field, $field_value);
        $result = $this->db->update($table, $data_array);
        if ($result)
            return 1;
        else
            return 0;
    }
    public function get_user_location($id)
    {
        $sql  = "SELECT * FROM " . TBL_USERS_LOCATION . "  WHERE user_id='" . $id . "'";
        $data = $this->db->query($sql);
        if ($data->num_rows() > 0) {
            return $data->row();
        } else {
            return 0;
        }
    }
    public function set_language($code)
    {
        $title = "title_" . $code . " as title";
        $sql   = "SELECT id, " . $title . ", constant as cons FROM " . TBL_COUNTRIES_LANGUAGES . " ";
        $data  = $this->db->query($sql);
        if ($data->num_rows() > 0) {
            $this->session->set_userdata('lang_code', $code);
            foreach ($data->result() as $row) {
                $this->session->set_userdata($row->cons, $row->title);
            } // loop end
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_last_record($table)
    {
        $query  = $this->db->query("SELECT * FROM " . $table . " ORDER BY id DESC LIMIT 1");
        $result = $query->result_array();
        return $result;
    }
    public function delAll($idArray, $table)
    {
        //pre($idArray);
        $idArray = explode(',', $idArray);
        for ($i = 0; $i < count($idArray); $i++) {
            $this->db->where_in('id', $idArray[$i]);
            $result = $this->db->delete($table);
        }

        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    public function set_permission($id)
    {
        //$data = get_where($id,TBL_USERS_LEVELS); // this function available in helpers/admin_main_helper.php
        //$data =$this->db->select('*')->from(TBL_USERS_LEVELS)->where('id',$id);
        $row = $this->db->select('*')->from(TBL_USERS_LEVELS)->where("id", $id)->get()->row();
        $res = array(
            'can_add_users' => $row->add_users,
            'can_edit_users' => $row->edit_users,
            'can_delete_users' => $row->delete_users
        );
        if ($this->session->set_userdata($res)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_data($thisfields, $table, $field, $val)
    {
        $select = $thisfields;
        if (empty($select)) {
            $select = '*';
        } else {
            $select = $thisfields;
        }
        if (isset($field) and !empty($field) and isset($val) and !empty($val)) {
            $this->db->select($select)->from($table)->where($field, $val);
        } else {
            $this->db->select($select)->from($table);
        }
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result();
        } else {
            return 0;
        }
    }
    function DuplicateMySQLRecord($table, $primary_key_field, $primary_key_val)
    {
        /* generate the select query */
        $this->db->where($primary_key_field, $primary_key_val);
        $query = $this->db->get($table);
        foreach ($query->result() as $row) {
            foreach ($row as $key => $val) {
                if ($key == 'unique_id_number') {
                    //  echo $key .' ' .$val ;
                    $val      = preg_replace('/\d/', '', $val);
                    $uniqueID = get_unused_id($table, 'unique_id_number');
                    $val      = $val . $uniqueID;
                }
                if ($key != $primary_key_field) {
                    /* $this->db->set can be used instead of passing a data array directly to the insert or update functions */
                    $this->db->set($key, $val);
                } //endif              
            } //endforeach
        } //endforeach
        /* insert the new record into table*/
        return $this->db->insert($table);
    }
    /**************************************************************************************************************/
    public function upload_files($FILES)
    {
        $config['upload_path']   = './uploads';
        $config['allowed_types'] = ALLOWED_TYPES;
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload');
        $files           = $FILES;
        $number_of_files = count($_FILES['file']['name']);
        $errors          = 0;
        // codeigniter upload just support one file
        // to upload. so we need a litte trick
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['file']['name']     = $files['file']['name'][$i];
            $_FILES['file']['type']     = $files['file']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
            $_FILES['file']['error']    = $files['file']['error'][$i];
            $_FILES['file']['size']     = $files['file']['size'][$i];
            // we have to initialize before upload
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("file")) {
                $errors++;
            }
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $fileName    = $upload_data['file_name'];
            // create thumbnail 
            $this->_createThumbnail($fileName);
            $images[] = $fileName;
        }
        if ($errors > 0) {
            return array(
                'upload_status' => 0,
                'upload_message' => "File not uploaded" . $this->upload->display_errors()
            );
        } else {
            $fileName = implode(',', $images);
            return $fileName;
        }
        //pre($this->upload->data());
    }
    public function upload_files2($FILES)
    {
        $config['upload_path']   = './uploads';
        $config['allowed_types'] = ALLOWED_TYPES;
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload');
        $files           = $FILES;
        $number_of_files = count($_FILES['image']['name']);
        $errors          = 0;
        // codeigniter upload just support one file
        // to upload. so we need a litte trick
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['image']['name']     = $files['image']['name'][$i];
            $_FILES['image']['type']     = $files['image']['type'][$i];
            $_FILES['image']['tmp_name'] = $files['image']['tmp_name'][$i];
            $_FILES['image']['error']    = $files['image']['error'][$i];
            $_FILES['image']['size']     = $files['image']['size'][$i];
            // we have to initialize before upload
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("image")) {
                $errors++;
            }
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $fileName    = $upload_data['file_name'];
            // create thumbnail 
            $this->_createThumbnail($fileName);
            $images[] = $fileName;
        }
        $fileName = implode(',', $images);
        if ($errors > 0) {
            echo $errors . "File(s) cannot be uploaded";
        }
        //pre($this->upload->data());
        return $fileName;
    }
    public function upload_pdf_files($FILES)
    {
        $config['upload_path']   = './uploads';
        $config['allowed_types'] = 'pdf';

        $config['encrypt_name']  = TRUE;
        $this->load->library('upload');
        $files           = $FILES;
        $number_of_files = count($_FILES['image']['name']);
        $errors          = 0;
        // codeigniter upload just support one file
        // to upload. so we need a litte trick
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['file']['name']     = $files['image']['name'][$i];
            $_FILES['file']['type']     = $files['image']['type'][$i];
            $_FILES['file']['tmp_name'] = $files['image']['tmp_name'][$i];
            $_FILES['file']['error']    = $files['image']['error'][$i];
            $_FILES['file']['size']     = $files['image']['size'][$i];
            // we have to initialize before upload
            $this->upload->initialize($config);
            if (!$this->upload->do_upload("image")) {
                $errors++;
            }
            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
            $fileName    = $upload_data['file_name'];
            // create thumbnail 
            //     $this->_createThumbnail($fileName);
            $images[]    = $fileName;
        }
        $fileName = implode(',', $images);
        if ($errors > 0) {
            echo $errors . "File(s) cannot be uploaded" . $this->upload->data();
        }
        //    pre($this->upload->data());
        return $fileName;
    }
    /******************************************************************************************************************************/
    //Create Thumbnail function
    function _createThumbnail($filename)
    {
        $this->load->library('image_lib');
        // Set your config up
        $config['image_library']  = "gd2";
        $config['allowed_types']  = ALLOWED_TYPES;
        $config['source_image']   = "uploads/" . $filename;
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = "100";
        $config['height']         = "100";
        $this->image_lib->initialize($config);
        // Do your manipulation
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }
    function extract_coordinates($address)
    {
        $result = array();
        if ($address != '') {
            $api_key               = 'AIzaSyCpfWMKfe2_9VO80AfeAfqI3YmEr9DnWE8';
            $address               = urlencode($address);
            $get_file_data         = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&key=" . $api_key);
            $decoded_get_file_data = json_decode($get_file_data);
            if ($decoded_get_file_data->status == 'OK') {
                if (isset($decoded_get_file_data->results[0]->geometry->location)) {
                    $lat                      = $decoded_get_file_data->results[0]->geometry->location->lat;
                    $lng                      = $decoded_get_file_data->results[0]->geometry->location->lng;
                    $location_type            = $decoded_get_file_data->results[0]->geometry->location_type;
                    $formatted_address        = $decoded_get_file_data->results[0]->formatted_address;
                    $street                   = $decoded_get_file_data->results[0]->address_components[0]->long_name; // street address
                    $postal_address_associate = '';
                    if (isset($decoded_get_file_data->results[0]->address_components[8]) and $decoded_get_file_data->results[0]->address_components[8]->types[0] == 'postal_code') {
                        $postal_address_associate = $decoded_get_file_data->results[0]->address_components[8]->long_name;
                    } else {
                        if (isset($decoded_get_file_data->results[0]->address_components[7]) and $decoded_get_file_data->results[0]->address_components[7]->types[0] == 'postal_code') {
                            $postal_address_associate = $decoded_get_file_data->results[0]->address_components[7]->long_name;
                        } else {
                            if (isset($decoded_get_file_data->results[0]->address_components[4]) and $decoded_get_file_data->results[0]->address_components[4]->types[0] == 'postal_code') {
                                $postal_address_associate = $decoded_get_file_data->results[0]->address_components[4]->long_name;
                            }
                        }
                    }
                    $postal_address = $postal_address_associate;
                    $result         = array(
                        'lat' => $lat,
                        'lng' => $lng,
                        'street' => $street,
                        'postal_address' => $postal_address,
                        'location_type' => $location_type,
                        'formatted_address' => $formatted_address
                    );
                }
            }
        }
        return $result;
    }
	
	
	
	public function sellerearningscustom($id)
	{
	    
		if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
				 
			$query    = $this->db->query("SELECT 
			SUM((SELECT TS.price FROM tbl_services AS TS WHERE TS.id  = TCBR.service_id )) AS user_earning
			
			FROM  ".$this->db->database.'.'.$this->order." AS O INNER JOIN ".$this->tbl_custom_buyer_request." AS TCBR
			ON TCBR.id = O.custom_order_id
			
			WHERE TCBR.status = ' ".$this->active."' AND TCBR.seller_id = '".$id."' AND O.type='custom'");
				
			if ($query->num_rows() > 0) 
			{ 
			    $userearningamount = $query->result();
				if(! empty ($userearningamount[0]->user_earning))
				{
					return $userearningamount[0]->user_earning;
				}
				
				return  0;
			}
         return 0;
	}
	
	
	public function sellerearnings($id)
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		

		$query  = $this->db->query("SELECT SUM(amount) as user_earning  FROM `".$this->tbl_seller_payment_account."` 
		WHERE seller_id = '".$id."' AND task_status='".COMPLETE."' ");
		
		$result = 0;		 
		if ($query->num_rows() > 0) {
			$userearningamount = $query->result();
			if(! empty ($userearningamount[0]->user_earning))
			{
				$result = $userearningamount[0]->user_earning;
			}
		}
		
		
		  
		  return $result;
	}
	
	
	public function selleravailablewithdrwanandtotalwidthdrwan($id)
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		

$query  = $this->db->query("SELECT available_bal AS available_for_withdraw,total_withdrwal AS total_withdrwal,total_bonus   FROM `".$this->tbl_seller_balance."` WHERE seller_id = ".$id."");

		$result = 0;	
		$asellerbalance = array();	 
		if ($query->num_rows() > 0) 
		{
			$userearningamount = $query->result();
			$asellerbalance['available_for_withdraw'] =  $userearningamount[0]->available_for_withdraw;
			$asellerbalance['total_withdrwal'] =  $userearningamount[0]->total_withdrwal;
			$asellerbalance['total_bonus'] =  $userearningamount[0]->total_bonus;
		}
		return $asellerbalance;
	}
	

	public function sellerearningscustomcurrentmonth($id)
	{
	    
		if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
				 
			$query    = $this->db->query("SELECT 
			SUM((SELECT TS.price FROM tbl_services AS TS WHERE TS.id  = TCBR.service_id )) AS user_earning
			
			FROM  ".$this->db->database.'.'.$this->order." AS O INNER JOIN ".$this->tbl_custom_buyer_request." AS TCBR
			ON TCBR.id = O.custom_order_id
			
			WHERE TCBR.status = ' ".$this->active."' AND TCBR.seller_id = '".$id."' AND O.type='custom' AND MONTH(O.created_on) = '".date('m')."'");
				
			if ($query->num_rows() > 0) 
			{ 
			    $userearningamount = $query->result();
				if(! empty ($userearningamount[0]->user_earning))
				{
					return $userearningamount[0]->user_earning;
				}
				
				return  0;
			}
         return 0;
	}
	
	
	public function sellerearningscurrentmonth($id)
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		  // $sellerearningscustomcurrentmonth = $this->sellerearningscustomcurrentmonth($id);
			
/*$query    = $this->db->query("SELECT sum(TSOTR.price) AS user_earning FROM ".$this->db->database.'.'.$this->order." AS O INNER JOIN `".$this->tbl_seller_offer_to_request."` AS TSOTR 
ON TSOTR.id = O.seller_offer_request_id WHERE TSOTR.seller_id = '".$id."' AND O.type='normal' AND MONTH(O.created_on) = '".date('m')."'");*/
    
$query = $this->db->query("SELECT sum(TSPA.amount) AS user_earning FROM ".$this->tbl_seller_payment_account." AS TSPA WHERE TSPA.seller_id = '".$id."' AND MONTH(TSPA.created_date) = '".date('m')."' AND task_status ='".COMPLETE."' ");


		
		$result = 0;		 
		if ($query->num_rows() > 0) {
			 $userearningamount = $query->result();
				if(! empty ($userearningamount[0]->user_earning))
				{
					$result = $userearningamount[0]->user_earning;
				}
		}
		
		 //$result = $sellerearningscustomcurrentmonth + $result;
		 return $result;
	}
	
	
	
	public function sellercompltedorderscountcustom($id)
	{
	    
		if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
			$query    = $this->db->query("SELECT count(O.id) total_completed_order FROM ".$this->db->database.'.'.$this->order." AS O
			INNER JOIN tbl_custom_buyer_request AS TSOTR  ON TSOTR.id = O.custom_order_id
			WHERE O.type= 'custom' AND TSOTR.status = ' ".$this->active."'  AND TSOTR.seller_id = '".$id."' AND  O.status = '".COMPLETED."'");
				
			if ($query->num_rows() > 0) 
			{ 
			    $userearningamount = $query->result();
				if(! empty ($userearningamount[0]->total_completed_order))
				{
					return $userearningamount[0]->total_completed_order;
				}
				
				return  0;
			}
         return 0;
	}
	
	
	
	
	public function sellercompltedorderscount($id)
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		
		$sellercompltedorderscountcustom = $this->sellercompltedorderscountcustom($id);
		$query   = $this->db->query("SELECT count(O.id) total_completed_order FROM ".$this->db->database.'.'.$this->order." AS O
		INNER JOIN `".$this->tbl_seller_offer_to_request."` AS TSOTR  ON TSOTR.id = O.seller_offer_request_id
		WHERE O.type= 'normal' AND TSOTR.seller_id = '".$id."' AND  O.status = '".COMPLETED."'");
		
		$result = 0;		 
		if ($query->num_rows() > 0) 
		{
			    $sellertotalorder = $query->result();
				if(! empty ($sellertotalorder[0]->total_completed_order))
				{
					$result = $sellertotalorder[0]->total_completed_order;
				}
		}
		
		  $result = $sellercompltedorderscountcustom + $result;
		  return $result;
	}
	
	

	
	public function selleranalyticscustom($id)
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		$query  = $this->db->query(" 
		SELECT DISTINCT MONTH(O.created_on) AS month,
		SUM((SELECT TS.price FROM tbl_services AS TS WHERE TS.id =TCBR.service_id) ) AS total_sum FROM ".$this->db->database.'.'.$this->order." AS O
		INNER JOIN  `".$this->tbl_custom_buyer_request."` AS TCBR ON TCBR.id = O.custom_order_id
		WHERE YEAR(O.created_on) = '".date('Y')."' AND TCBR.seller_id = '".$id."' group BY MONTH(O.created_on) ");
		
		$results = array();		 
		if ($query->num_rows() > 0) 
		{
		  foreach ($query->result() as $row) 
		  {
			  
				$results['month_cus'][] = $row->month;
				$results['total_sum_cus'][] = $row->total_sum;
			
		  }
		}
		return $results;
	}
	
	
	public function selleranalytics($id) // previous functions
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		
		$results['month'] = array();
		$results['total_sum'] = array();
$query  = $this->db->query("SELECT DISTINCT MONTH(TSPA.created_date)AS month,SUM(TSPA.amount) AS total_sum FROM ".$this->tbl_seller_payment_account." AS TSPA WHERE YEAR(TSPA.created_date) = '".date('Y')."'  AND TSPA.seller_id =  '".$id."'  AND task_status='".COMPLETE."'  group BY MONTH(TSPA.created_date) ");




        $results = array();		 
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
			
				$results['month'][] = $row->month;
				$results['total_sum'][] = $row->total_sum;
			
			}
		}
		
		
	
	$jan = 0;$feb = 0;	$mar = 0;$apr = 0;$may = 0;$jun = 0;$jun = 0;$jul = 0;$aug = 0;$sep = 0;$oct = 0;$nov = 0;$dec = 0;
	
	$aMain = array();
	if(is_array($results['month']) AND count($results['month']) > 0)
	{
	 for($index = 0 ; $index <  count($results['month']); $index ++)
	 {
		if($results['month'][$index]==1)
		{
			$jan = $results['total_sum'][$index];
		}
		else 
		if($results['month'][$index]==2)
		{
			$feb =  $results['total_sum'][$index];
		}
		else 
		if($results['month'][$index]==3)
		{
			$mar =  $results['total_sum'][$index];
		}
		else 
		if($results['month'][$index]==4)
		{
			$apr =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==5)
		{
			$may =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==6)
		{
			$jun =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==7)
		{
			$jul =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==8)
		{
			$aug =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==9)
		{
			$sep =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==10)
		{
			$oct = $ $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==11)
		{
			$nov =  $results['total_sum'][$index];
		}
		else
		if($results['month'][$index]==12)
		{
			$dec =  $results['total_sum'][$index];
		}
	  }
	 }
	 
	    $aMain['jan'] = $jan; 
		$aMain['feb'] = $feb; 
		$aMain['mar'] = $mar; 
		$aMain['apr'] = $apr; 
		$aMain['may'] = $may; 
		$aMain['jun'] = $jun; 
		$aMain['jul'] = $jul; 
		$aMain['aug'] = $aug; 
		$aMain['sep'] = $sep; 
		$aMain['oct'] = $oct; 
		$aMain['nov'] = $nov; 
		$aMain['dec'] = $dec;
		
		$aMainstr = implode(',',$aMain); 
		return $aMainstr;
	}
	
	
	
	
	public function selleranalytics_old($id) // previous functions
	{
	    if( empty($id))
		{
		 return 'id can\'t be empty';	
		}
		
		$selleranalyticscustom = $this->selleranalyticscustom($id);
		$results['month'] = array();
		$results['total_sum'] = array();
		$query  = $this->db->query(" SELECT DISTINCT MONTH(O.created_on)AS month,SUM(TSOTR.price) AS total_sum  FROM ".$this->db->database.'.'.$this->order." AS O
		INNER JOIN `".$this->tbl_seller_offer_to_request."` AS TSOTR ON TSOTR.id = O.seller_offer_request_id
		WHERE YEAR(O.created_on) = '".date('Y')."' AND TSOTR.seller_id = '".$id."' AND O.type='normal' group BY MONTH(O.created_on)");

        $results = array();		 
		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
			
				$results['month'][] = $row->month;
				$results['total_sum'][] = $row->total_sum;
			
			}
		}
		
	if(count( $results['month'] ) > 0 AND count($selleranalyticscustom['month_cus']) > 0)
	{	
	
		$amonths = array_merge( $selleranalyticscustom['month_cus'],  $results['month']);
		$amonthssums = array_merge(  $selleranalyticscustom['total_sum_cus'],  $results['total_sum']);
	}
	else
	if(count($selleranalyticscustom['month_cus']) > 0 )
	{
		$amonths =  $selleranalyticscustom['month_cus'];	
		$amonthssums =  $selleranalyticscustom['total_sum_cus'];	  
	}
	else
	if(count($selleranalyticscustom['month_cus']) > 0 )
	{
		$amonths =  $results['month'];	
		$amonthssums =  $results['total_sum'];	  
	}
	
	$jan = 0;$feb = 0;	$mar = 0;$apr = 0;$may = 0;$jun = 0;$jun = 0;$jul = 0;$aug = 0;$sep = 0;$oct = 0;$nov = 0;$dec = 0;
	
	$aMain = array();
	if(is_array($amonths) AND count($amonths) > 0)
	{
	 for($index = 0 ; $index <  count($amonths); $index ++)
	 {
		if($amonths[$index]==1)
		{
		  $jan = $jan + $amonthssums[$index];
		}
		else 
		if($amonths[$index]==2)
		{
		  $feb = $feb + $amonthssums[$index];
		}
		else 
		if($amonths[$index]==3)
		{
		  $mar = $mar + $amonthssums[$index];
		}
		else 
		if($amonths[$index]==4)
		{
		  $apr = $apr + $amonthssums[$index];
		}
		else
		if($amonths[$index]==5)
		{
		  $may = $may + $amonthssums[$index];
		}
		else
		if($amonths[$index]==6)
		{
		  $jun = $jun + $amonthssums[$index];
		}
		else
		if($amonths[$index]==7)
		{
		  $jul = $jul + $amonthssums[$index];
		}
		else
		if($amonths[$index]==8)
		{
		  $aug = $aug + $amonthssums[$index];
		}
		else
		if($amonths[$index]==9)
		{
		  $sep = $sep + $amonthssums[$index];
		}
		else
		if($amonths[$index]==10)
		{
		  $oct = $oct + $amonthssums[$index];
		}
		else
		if($amonths[$index]==11)
		{
		  $nov = $nov + $amonthssums[$index];
		}
		else
		if($amonths[$index]==12)
		{
		  $dec = $dec + $amonthssums[$index];
		}
	  }
	 }
	 
	    $aMain['jan'] = $jan; 
		$aMain['feb'] = $feb; 
		$aMain['mar'] = $mar; 
		$aMain['apr'] = $apr; 
		$aMain['may'] = $may; 
		$aMain['jun'] = $jun; 
		$aMain['jul'] = $jul; 
		$aMain['aug'] = $aug; 
		$aMain['sep'] = $sep; 
		$aMain['oct'] = $oct; 
		$aMain['nov'] = $nov; 
		$aMain['dec'] = $dec;
		
		$aMainstr = implode(',',$aMain); 
		return $aMainstr;
	}
	
	public function remove_allrequest_except_order_seller_requestid($requestid)
	{
	    
	   	$ordercheck =  $this->orderplacedcheck( $requestid);
	   	$seller_offer_request_id =  $ordercheck[0]->seller_offer_request_id;
	  	if(! empty ($seller_offer_request_id))
			{
				
				return $query  = $this->db->query(" DELETE FROM `".$this->tbl_seller_offer_to_request."` 
				WHERE request_id = '".$requestid."' AND id!='".$seller_offer_request_id."'");
			
			}
			else
			{
			 
			  $this->db->where('request_id', $requestid);
			  return $this->db->delete($this->tbl_seller_offer_to_request);
			}
	  }
	 
	 
		public function sellerservicescategoriesids()
		{
		   
		    $query  = $this->db->query(" SELECT DISTINCT (category_id)  
			FROM `".$this->tbl_services."` WHERE user_id = ".USER_ID." ");
			
			$aSellerservicesids = array();
			if (count($query->result()) > 0 ) 
			{
				$buyerequest = array();
				foreach ($query->result() as $row) 
				{
					$aSellerservicesids[]  = $row->category_id;
				}
			}
			
			return implode(',',$aSellerservicesids);	
		}
	
	
	
		public function setEmailTemplate($userName,$activationLink){
		$template='<table bgcolor="#f2f2f2" border="0" cellpadding="0" cellspacing="0" width="100%">
   <tbody>
      <tr>
         <td>
            <div style="max-width:600px;margin:0 auto;font-size:16px;line-height:24px">
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td>
                           <table border="0" cellpadding="0" cellspacing="0"  width="100%">
                              <tbody>
                                 <tr>
                                    <td>
                                       <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                          <tbody>
                                             <tr>
                                                <td style="background-color:white;padding-top:30px;padding-bottom:30px">
                                                   <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                      <tbody>
                                                         <tr>
                                                            <td align="center" style="padding-top:0;padding-bottom:20px"> <a > <img src="'.base_url().'assets/logo.png" alt="" width="104" height="30" style="vertical-align:middle" class="CToWUd"> </a> </td>
                                                         </tr>
                                                         <tr>
                                                            <td  style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px;padding-bottom:20px">
                                                               <h3 style="margin-top:0;margin-bottom:0;font-family:"Montserrat",Helvetica,Arial,sans-serif!important;font-weight:700;font-size:20px;line-height:30px;color:#222">Verify your email address to complete your registration</h3>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Hi '.$userName.', </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Welcome to SkillSquared! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> Please verify your email address so you can get full access to qualified freelancers eager to tackle your project. </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:20px"> We\'re thrilled to have you on board! </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:10px">
                                                               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td style="font-size:0;line-height:0">&nbsp;</td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <table style="text-align:center" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td>
                                                                           <div style="text-align:center;margin:0 auto">  <a style="background-color:#37a000;border:2px solid #37a000;border-radius:2px;color:#ffffff;white-space:nowrap;font-weight:bold;display:block;font-family:Helvetica,Arial,sans-serif;font-size:16px;line-height:36px;text-align:center;text-decoration:none" href="'.$activationLink.'" target="_blank" >Verify Email</a> </div>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td   style="font-family:Helvetica,Arial,sans-serif!important;font-size:16px;line-height:24px;word-break:break-word;padding-left:20px;padding-right:20px;padding-top:30px">
                                                               <div style="padding-top:10px">Thanks for your time,<br>The SkillSquared Team</div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                     <tr>
                        <td align="center" width="100%" style="color:#656565;font-size:12px;line-height:24px;padding-bottom:30px;padding-top:30px"><a href="" style="color:#656565;text-decoration:underline" target="_blank" >Privacy Policy</a> &nbsp; | &nbsp; <a href="" style="color:#656565;text-decoration:underline" target="_blank" >Contact Support</a> 
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all" >
                              New York, Canal Road Thokar, USA
                           </div>
                           <div style="font-family:Helvetica,Arial,sans-serif!important;word-break:break-all">
                              © 2019 SkillSquared Inc.
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>';
		return $template;
		}

	
    /*******************************************************************************************************/
    function pq()
    {
        echo $this->db->last_query();
        die(' <=====Last query exe======> ');
    }
    /*******end of crud_model.php Location application\modules\crud\controllers*******/
}
?>