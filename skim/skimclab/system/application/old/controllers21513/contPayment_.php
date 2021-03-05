<?php
	class contPayment extends Controller {
		function contPayment(){
			parent::Controller();
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->Model('ModelPayment');
		}
		
	    function addpayment(){
		   $this->load->view('payment/newpayment');
		}	
		
		function openvdr(){
		   $this->load->view('payment/vdrpayment_1');
		}
		
		function ctr_list(){
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
		   	$data['contractor'] = $this->ModelPayment->getAllContractor($searchdata);
		    $this->load->view('payment/contractor_list', $data);
		   
		}
		
		function savepaymentvdr(){
		
		$contractorid = $_POST["id"];
		$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		$pm_id = $this->ModelPayment->getNextPaymentNo();
		$pm_firstpart = "00000" . $pm_id;
		$pmno = "P/VDR/".substr($pm_firstpart, -6);
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$pmquery = "insert into pmt_advise (pmt_no,pmt_dateissue,contractor_id,pmt_attn,pmt_type,pmt_compname,
		  		    pmt_address1,pmt_address2,pmt_address3,pmt_tel,pmt_fax,pmt_state,pmt_postcode)
				    values
				   ('$pmno','$datecreated','$contractorid','$attn','V','$contractorname','$addr1','$addr2',
				    '$addr3','$tel','$fax','$state','$postcode')";	
		
		$this->db->trans_begin();
		$this->db->query($pmquery);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetails/'.$pmno.'/add');
		
		}
	 
	 function UpdatePaymentVDR(){
	    
		$pmno = $_POST["txtpmno"];
		$contractorid = $_POST["id"];
		//$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		//$pm_id = $this->ModelPayment->getNextPaymentNo();
		//$pm_firstpart = "00000" . $pm_id;
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$sqlupdate = "update pmt_advise set
		              contractor_id = '$contractorid',
					  pmt_attn = '$attn',
					  pmt_compname = '$contractorname',
		  		      pmt_address1 = '$addr1',
					  pmt_address2 = '$addr2',
					  pmt_address3 = '$addr3',
					  pmt_tel = '$tel',
					  pmt_fax = '$fax',
					  pmt_state = '$state',
					  pmt_postcode = '$postcode'
					  where pmt_no = '$pmno'";
	  
	  	$this->db->trans_begin();
		$this->db->query($sqlupdate);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetails/'.$pmno);				  
	 
	 }	
	 function GetPaymentDetails(){
	    
		 $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);		
	     $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
		 $data['PMrow'] = $this->ModelPayment->getPaymentByID($pmno);  
		 $this->load->view('payment/vdrpayment_2',$data);
	 
	 }	
	 
	 function Listallpayment(){
	 
	 /********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
		    $grid->db->order_by("pmt_dateissue", "desc");
		    //$grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    //$grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    //$grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    //$grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    //$grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    //$grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			//$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			//$grid->db->where("wo_spim_status ='R'");
		    //$grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetails/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list', $data);	
	 
	 }
	 
	 function searchPayment(){
	 
	 if(isset($_POST['rdsearchby'])){
				$searchby = $_POST['rdsearchby'];
				$keyword = trim($_POST['txtkeyword']);
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');	
			}		
			
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();	
			
			$grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
		    if($searchby == "pmt_compname" || $searchby == "pmt_no")
		    	$grid->db->where("$searchby LIKE '%$keyword%'");
		    else
		    	$grid->db->where("$searchby = '$keyword'");
		    $grid->db->order_by("pmt_dateissue", "desc");
	        
			 $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetails/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list', $data);	
	 
	 }
	 
	 function addvdrfcl(){
	        
			$pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
	        $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
	        $data['pmno'] = $pmno;
	        $this->load->view('payment/add_vdr_fcl',$data);	
	 }
	 
	 function editvdrfcl(){
	        
			$id = $this->uri->segment(3);
			$data['strhide'] = "";
	        $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
	        $this->load->view('payment/edit_vdr_fcl',$data);	
	 }
	 
	 function opencountrylist(){
	 
	        $data['country'] = $this->ModelPayment->getAllCountry();
	        $this->load->view('payment/countrylist',$data);		   
	 }
	 
	 function savefclvdr(){
	 
	        $pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			
			$pmtquery = "insert into pmt_fcl 
			             (pmt_no,pmt_cty_id,pmt_cty_desc,pmt_fcl_no,pmt_levi,pmt_plks,pmt_visa,pmt_fees,pmt_period,pmt_jim,pmt_wages)
						 values
						 ('$pmno','$cityid','$citydesc','$nooffcl','$pmtlevi','$pmtplks',
						 '$pmtvisa','$pmtfees','$pmtperiod','$pmtjim','$pmtwages')";
					
			 $this->db->trans_begin();
		     $this->db->query($pmtquery);	
             $this->db->trans_commit();		
			 
			 
		     $data['pmno'] = $pmno;
			 $data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
             $this->load->view('payment/add_vdr_fcl', $data);		 
			
	 }
	 
	 function Updatefclvdr(){
	         
			$id = $_POST["txtid"];
			$pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			
			$sqlquery = "Update pmt_fcl set 
			            pmt_cty_id = '$cityid',
						pmt_cty_desc = '$citydesc',
						pmt_fcl_no = '$nooffcl',
						pmt_levi = '$pmtlevi',
						pmt_plks = '$pmtplks',
						pmt_fees = '$pmtfees',
						pmt_period = '$pmtperiod',
						pmt_visa = '$pmtvisa',
						pmt_jim = '$pmtjim',
						pmt_wages = '$pmtwages'
						where id = '$id'";
			 
			 $this->db->trans_begin();
		     $this->db->query($sqlquery);	
             $this->db->trans_commit();		
			 
			 $data['pmno'] = $pmno;
			 $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
			 $data['successMsg'] = "FCL was succesfully Update.";
             $this->load->view('payment/edit_vdr_fcl', $data);				
						
	 
	 }
	 
	function displayprint(){
	         $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
			 $type = $this->uri->segment(4);
	         $data['display'] = $this->ModelPayment->getAllPrint($pmno);
			 $data['fcl'] = $this->ModelPayment->getAllPrintFCL($pmno);
			 
			 if($type == 'VDR'){
			 $this->load->view('payment/printadvisevdr', $data);	
			 }else{
			 $this->load->view('payment/printadviseext', $data);	
			 }
	}
	
	function paymentrcpt(){
	          $this->load->view('payment/payment_rcpt');		        
	}
	
	function DeleteFCL(){
	
	    $id = $this->uri->segment(3);
				
		$sql = "delete from pmt_fcl where id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['strhide'] = "delete";
		$data['successMsg'] = "FCL was succesfully Delete.";        
		$this->load->view('payment/edit_vdr_fcl', $data);
	
	}

}
?>		