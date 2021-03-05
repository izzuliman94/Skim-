<?php
	class ContAvailable extends Controller{
		function ContAvailable(){
			parent::Controller();
			$this->load->library('rapyd');
			$this->load->library('session');
			$this->load->Model('ModelContractor');
			$this->load->Model('ModelAvailable');
			$this->load->Model('ModelLabour');
		}	
		
		function availableForm(){
			$data['allContractors'] = $this->ModelAvailable->getAllContractors();
			$this->load->view('available/newavailable_form', $data);
			//$this->load->view('available/availableForm', $data);
		}
		
		function availableFormWithCompDetails(){
			$compFrom = $_POST['selCompFrom'];
			$compTo = $_POST['selCompTo'];
			$dateSubmit = $_POST['txtdatesubmit'];
			$totalQty = $_POST['txtTotalQty'];
			
			$ctrData1 = $this->ModelAvailable->getCtrByClabNo($compFrom);
			$ctrData2 = $this->ModelAvailable->getCtrByClabNo($compTo);
			
			if($ctrData2->ctr_status == '1'){
				$data['ctrData1'] = $ctrData1;
				$data['ctrData2'] = $ctrData2;
			}
			else if($ctrData2->ctr_status == '3'){
				$data['suspendedMsg1'] = "<br><br><div align=\"center\"><font color=\"#990000\" style=\"font-size:1.8em\">The company selected [$ctrData1->ctr_comp_name] is suspended at the moment.</div></font>";
				$data['suspendedMsg2'] = "<br><br><div align=\"center\"><font color=\"#990000\" style=\"font-size:1.8em\">The company selected [$ctrData2->ctr_comp_name] is suspended at the moment.</div></font>";
			}
			else{
				
			}
			
			$data['dateSubmit'] = $dateSubmit;
			$data['totalQty'] = $totalQty;
			$data['compFrom'] = $compFrom;
			$data['compTo'] = $compTo;
			$this->load->view('available/availableFormDetails', $data);
		}
		
		function availableFormSubmit(){
			$compFrom = $_POST['selCompFrom'];
			$compTo = $_POST['selCompTo'];
			$dateSubmit = date('Y-m-d', strtotime($_POST['txtdatesubmit']));
			$totalQty = $_POST['txtTotalQty'];
			$keyinby = $_POST['txtkeyinby'];
			$keyindate = date('Y-m-d', strtotime($_POST['txtkeyindate']));
			
			$nextrefno = $this->ModelAvailable->getNewAvlabRefNo();
			$avlabrefno = "E-" . date('y') . "-" . $nextrefno;
			
			$insertQuery = "INSERT INTO available (avlab_ref_no, avlab_submit_date, avlab_comp_from, avlab_comp_to, avlab_statusid, avlab_entered_by, avlab_entered_date, avlab_qty)
							VALUES ('$avlabrefno', '$dateSubmit', '$compFrom', '$compTo', 1, '$keyinby', '$keyindate', $totalQty);";
			
			$this->db->query($insertQuery);
			
			redirect('contAvailable/editAvailable/' . $avlabrefno . '/add');
		}
		
		function displaydate($originalDate){
			if($originalDate == "0000-00-00" || $originalDate == "NULL" || $originalDate == "")					
				return "-";
			else return date('d-m-Y', strtotime($originalDate));
		}
		
		function displayavlaburi($refno){
			$hrefStr = "<a href=\"" .site_url() . "/contAvailable/editAvailable/" . $refno . "\">" . $refno . "</a>";
			return $hrefStr;	
		}
		
		function displayuri($wkr_passno){
			$hrefString = anchor_popup("contLabour/labourDetails/". $wkr_passno, $wkr_passno);
		    $hrefString2 = "<a href=\"" . site_url(). "/contAvailable/wkrDetails/" . $wkr_passno . "\">" . $wkr_passno . "</a>";
			
			return $hrefString;	
		}
		
		function availableDashbrd(){
			/********Grid for available list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$clabno=$this->uri->segment(3);
			$ltref=$this->uri->segment(4);
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
			//call data from comp_to_name
			$avlabDetails = $this->ModelContractor->getAvlabDetailslt($clabno,$ltref);
			$data['avlabwkr']=$this->ModelAvailable->getAvlabwkr($ltref);
			
		    //grid
		    $grid = new DataGrid("", "available");
		    $grid->db->join("contractors ctr","available.avlab_comp_from = ctr.ctr_clab_no","LEFT");
			//$grid->db->join("contractors ctr2","available.avlab_comp_to = ctr2.ctr_clab_no","LEFT");
		    $grid->db->join("mst_avstatus", "mst_avstatus.avstatus_id = available.avlab_statusid", "LEFT");
		    $grid->db->order_by("avlab_ref_no", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayavlaburi");
		 	$grid->per_page = 10;
			
			$grid->column("REF NO.","<callback_displayavlaburi><#avlab_ref_no#></callback_displayavlaburi>");
			$grid->column("COMPANY NAME FROM","ctr_comp_name");
			//$grid->column("COMPANY CLAB No From","avlab_comp_from");
			//$grid->column("COMPANY NAME TO","avlab_comp_to");
			$grid->column("DATE SUBMITTED","<callback_displaydate><#avlab_submit_date#></callback_displaydate>");
			$grid->column("QTY REQUESTED","avlab_qty");
			$grid->column("APPROVED STATUS","avstatus_desc");
			//$grid->column("ENTRY STATUS","avlab_entrystatus");
			
			$baseuri = "contAvailable";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/

			//grid2
		    $grid = new DataGrid("", "available");
		    //$grid->db->join("contractors ctr1","available.avlab_comp_from = ctr1.ctr_clab_no","LEFT");
			$grid->db->join("contractors ctr2","available.avlab_comp_to = ctr2.ctr_clab_no","LEFT");
		    $grid->db->join("mst_avstatus", "mst_avstatus.avstatus_id = available.avlab_statusid", "LEFT");
		    $grid->db->order_by("avlab_ref_no", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayavlaburi");
		 	$grid->per_page = 10;
			
			$grid->column("REF NO.","<callback_displayavlaburi><#avlab_ref_no#></callback_displayavlaburi>");
			$grid->column("COMPANY NAME TO","ctr_comp_name");
			//$grid->column("COMPANY CLAB No From","avlab_comp_from");
			//$grid->column("COMPANY NAME TO","avlab_comp_to");
			$grid->column("DATE SUBMITTED","<callback_displaydate><#avlab_submit_date#></callback_displaydate>");
			$grid->column("QTY REQUESTED","avlab_qty");
			$grid->column("APPROVED STATUS","avstatus_desc");
			//$grid->column("ENTRY STATUS","avlab_entrystatus");
			
			$baseuri = "contAvailable";
  			$grid->build();

		    $data["crud2"] = $grid->output;
		    /**********end grid2****************/		
			
			$this->load->view('available/availableDashboard', $data);
		}
		
		function searchAvailableDashbrd(){
			if(isset($_POST['searchby'])){
				$searchby = $_POST['searchby'];
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
			if($searchby == 'avlab_submit_date') $keyword = date('Y-m-d', strtotime($keyword));
			
			/********Grid for available list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "available");
		    $grid->db->join("contractors","available.avlab_comp_from = contractors.ctr_clab_no","LEFT");
		    $grid->db->join("mst_avstatus", "mst_avstatus.avstatus_id = available.avlab_statusid", "LEFT");
			$grid->db->join("available_wkr", "available.avlab_ref_no = available_wkr.avlabwkr_ref_no", "LEFT");
			$grid->db->join("workers", "available_wkr.avlabwkr_wkrid = workers.wkr_id", "LEFT");
		    $grid->db->where("$searchby LIKE '%$keyword%'");
		    $grid->db->order_by("avlab_ref_no", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayavlaburi");
		 	$grid->per_page = 10;
			
			$grid->column("REF NO.","<callback_displayavlaburi><#avlab_ref_no#></callback_displayavlaburi>");
			$grid->column("COMPANY NAME","ctr_comp_name");
			$grid->column("DATE SUBMITTED","<callback_displaydate><#avlab_submit_date#></callback_displaydate>");
			$grid->column("QTY REQUESTED","avlab_qty");
			$grid->column("QTY CANCELLED","avlab_qty_cancel");
			$grid->column("APPROVED STATUS","avstatus_desc");
			//$grid->column("ENTRY STATUS","avlab_entrystatus");
			
			$baseuri = "contAvailable";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    $this->load->view('available/availableDashboard', $data);
		}
		
		function searchAvailableDashbrd2(){
			if(isset($_POST['searchby'])){
				$searchby = $_POST['searchby'];
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
			if($searchby == 'avlab_submit_date') $keyword = date('Y-m-d', strtotime($keyword));
			
			/********Grid for available list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "available");
		    $grid->db->join("contractors","available.avlab_comp_to = contractors.ctr_clab_no","LEFT");
		    $grid->db->join("mst_avstatus", "mst_avstatus.avstatus_id = available.avlab_statusid", "LEFT");
			$grid->db->join("available_wkr", "available.avlab_ref_no = available_wkr.avlabwkr_ref_no", "LEFT");
			$grid->db->join("workers", "available_wkr.avlabwkr_wkrid = workers.wkr_id", "LEFT");
		    $grid->db->where("$searchby LIKE '%$keyword%'");
		    $grid->db->order_by("avlab_ref_no", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayavlaburi");
		 	$grid->per_page = 10;
			
			$grid->column("REF NO.","<callback_displayavlaburi><#avlab_ref_no#></callback_displayavlaburi>");
			$grid->column("COMPANY NAME","ctr_comp_name");
			$grid->column("DATE SUBMITTED","<callback_displaydate><#avlab_submit_date#></callback_displaydate>");
			$grid->column("QTY REQUESTED","avlab_qty");
			$grid->column("QTY CANCELLED","avlab_qty_cancel");
			$grid->column("APPROVED STATUS","avstatus_desc");
			//$grid->column("ENTRY STATUS","avlab_entrystatus");
			
			$baseuri = "contAvailable";
  			$grid->build();

		    $data["crud2"] = $grid->output;
		    /**********end grid****************/
		    $this->load->view('available/availableDashboard', $data);
		}
		
		function printTransferValidate(){
			$clabno = $this->uri->segment(3);
			$ltref = $this->uri->segment(4);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			$avlabDetails = $this->ModelContractor->getAvlabDetailslt($clabno,$ltref);
			$data['avlabwkr'] = $this->ModelAvailable->getAvlabwkr($ltref);
			if($avlabDetails->num_rows() > 0){
				$avlabRow = $avlabDetails->row();
				$data['avlabRow'] = $avlabRow;
				$data['avlabWkrDetails'] = $this->ModelContractor->getAvlabWkrDetails($avlabRow->avlab_ref_no);
				$this->load->view('available/ctr_print_transfer_valid', $data);
			}
			else{
				$data['errorMsg'] = "No local transfer application has been made under this company.";
				$this->load->view('available/ctr_print_errorpage', $data);
			}
		}
		
		function printTransferValidateNew(){
			$clabno = $this->uri->segment(3);
			$ltref = $this->uri->segment(4);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			$avlabDetails = $this->ModelContractor->getAvlabDetailsltNew($clabno,$ltref);
			$data['avlabwkr'] = $this->ModelAvailable->getAvlabwkr($ltref);
			if($avlabDetails->num_rows() > 0){
				$avlabRow = $avlabDetails->row();
				$data['avlabRow'] = $avlabRow;
				$data['avlabWkrDetails'] = $this->ModelContractor->getAvlabWkrDetails($avlabRow->avlab_ref_no);
				$this->load->view('available/ctr_print_transfer_valid_new', $data);
			}
			else{
				$data['errorMsg'] = "No local transfer application has been made under this company.";
				$this->load->view('available/ctr_print_errorpage', $data);
			}
		}
		
		function printHandOver(){
			$clabno = $this->uri->segment(3);
			$ltref = $this->uri->segment(4);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			$avlabDetails = $this->ModelContractor->getAvlabDetailsltNew($clabno,$ltref);
			$data['avlabwkr'] = $this->ModelAvailable->getAvlabwkr($ltref);
			if($avlabDetails->num_rows() > 0){
				$avlabRow = $avlabDetails->row();
				$data['avlabRow'] = $avlabRow;
				$data['avlabWkrDetails'] = $this->ModelContractor->getAvlabWkrDetails($avlabRow->avlab_ref_no);
				$this->load->view('available/ctr_print_handover', $data);
			}
			else{
				$data['errorMsg'] = "No local transfer application has been made under this company.";
				$this->load->view('available/ctr_print_errorpage', $data);
			}
		}
		
		function openreceipt(){
		   
		   $clab = $this->uri->segment(4);
		   $frm = $this->uri->segment(3);
		   $data['receiptlist'] = $this->ModelAvailable->getAllReceipt($clab);
		   $data['form'] = $frm;
	       $this->load->view('available/receiptlist',$data);		   
		
		}
		
		function empfcl_list(){
		    
			$clabno = $this->uri->segment(3);
			
			
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
			$data['clabno'] = $clabno;
		   	$data['labour'] = $this->ModelRenewal->getAllLabor($searchdata,$clabno);
		    $this->load->view('renewal/fcl_emp_list', $data);
		   
		}
		
		function editAvailable(){
			$refno = $this->uri->segment(3);
			$successMsg = $this->uri->segment(4);
			
			if($successMsg == "add") $data['successMsg'] = "<strong><font color=\"red\">New Local Transfer Data has been saved!</font></strong>";
			else if($successMsg == "update") $data['successMsg'] = "<strong><font color=\"red\">Local Transfer Data has been updated!</font></strong>";
			else{ }
			
			$avlabDetails= $this->ModelAvailable->getAvailableDetails($refno);
			$data['ctrData1'] = $this->ModelAvailable->getCtrByClabNo($avlabDetails->avlab_comp_from);
			if($avlabDetails->avlab_comp_to!= '')
				$data['ctrData2'] = $this->ModelAvailable->getCtrByClabNo($avlabDetails->avlab_comp_to);
			$data['avlabDetails'] = $avlabDetails;
			$registeredWorkers = $this->ModelAvailable->getAvlabWkrByStatus($refno, 1);
			 $data['registeredWorkers'] = $registeredWorkers;
			//$data['avlabWkrDetails'] = $this->ModelAvailable->getAvailableWkrDetails($refno);
			$data['refno'] = $refno;
			
		    $data['allPhTrackLog'] = $this->ModelAvailable->getAllPhTrackLog($refno);
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "available_wkr");
		    $grid->db->join("workers","workers.wkr_id = available_wkr.avlabwkr_wkrid","LEFT");
		    $grid->db->join("mst_wkr_availability","mst_wkr_availability.avlab_id = available_wkr.avlabwkr_status", "LEFT");
		    $grid->db->join("mst_countries", "workers.wkr_country = mst_countries.cty_id", "LEFT");
		    $grid->db->join("mst_race", "workers.wkr_race = mst_race.race_id", "LEFT");
		    $grid->db->where("available_wkr.avlabwkr_ref_no", $refno);
		    ///$grid->db->order_by("");
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 10;
			
		 	$baseuri = "contAvailable";
		 	$link_edit = anchor("$baseuri/viewLaborDetails/<#wkr_id#>/" .$refno,"<#wkr_passno#>");
		 	
		 	$grid->column("PASSPORT NO", "$link_edit", 'width="100"');
			$grid->column("STATUS","avlab_desc");
			$grid->column("NAME","wkr_name");
			$grid->column("COUNTRY","cty_desc");
			$grid->column("RACE/ETHNIC","race_desc");
			$grid->column("PERMIT EXPIRY DATE","<callback_displaydate><#wkr_permitexp#></callback_displaydate>");
			$grid->column("DATE REGISTERED", "<callback_displaydate><#avlabwkr_createddate#></callback_displaydate>");
			
			$baseuri = "contAvailable";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
			
			$this->load->view('available/editAvailable', $data);
		}
		
		function editPhoneTrackLog(){
			
			$data['refid'] = $this->uri->segment(3);
			$data['id'] = $this->uri->segment(4);
			$data['companyname1'] = $this->uri->segment(5);
			$data['companyname2'] = $this->uri->segment(6);
			$id = $data['id'];
			//echo $id;
			$data['woLog'] = $this->ModelAvailable->getLogbyLogid($id);
			$this->load->view('available/edit_lt_phtracklog', $data);	
		}
		
		
		function SaveEditLog(){
		
		$id = $_POST["txtid"];
		$refid = $_POST["txtrefid"];
	   	$companyname1 = $_POST["txtcompname"];
		$companyname2 = $_POST["txtcompname2"];
		
		$action = $_POST["txtaction"];
		$compdate =  date('Y-m-d', strtotime($_POST["dtcompletion"]));
		
		if($compdate == '1970-01-01') $compdate = "00-00-0000";
		
		//echo $compdate;
		$remarks = $_POST["txtremark"];
				  
	
	    $sql = "update available_phonetrack set
		        track_compdate = '$compdate',
				track_action = '$action',
				track_remarks = '$remarks'
				where track_id = '$id'";
	
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "Log was succesfully Update.";        
		$data['refid'] = $refid;
		$data['companyname1'] = $companyname1;
		$data['companyname2'] = $companyname2;
		$data['id'] = $id;
		$data['woLog'] = $this->ModelAvailable->getLogbyLogid($id);
		$data['strhide'] = "update";
		
		$this->load->view('available/edit_lt_phtracklog', $data);
		
		}
		
		function newPhoneTrackLog(){
			$data['refid'] = $this->uri->segment(3);
			$data['companyname1'] = $this->uri->segment(4);
			$data['companyname2'] = $this->uri->segment(5);
			
			$this->load->view('available/update_lt_phtracklog', $data);	
		}
		
		function newPhoneTrackLogSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				//hidden fields
				$refid = $_POST['refid'];
				$data['companyname1'] = $_POST['companyname1'];
				$data['companyname2'] = $_POST['companyname2'];
				//phone track log
				$trackid = $this->ModelAvailable->getNextPhTrackLogID();
				$datetime = $_POST['trackdate'];
				$attendby = $_POST['txtattendby'];
				$remark = $_POST['txtremark'];
				$action = $_POST['txtaction'];
				$actionby = $_POST['txtactionby'];
				$completiondate = $_POST['dtcompletion'];
				if($completiondate == '') $completiondate = "0000-00-00";
				else $completiondate = date('Y-m-d', strtotime($completiondate));
				
				$sqlQuery = "INSERT INTO  available_phonetrack (track_id, track_ref_id, track_datetime, track_attendby, track_remarks, track_action, track_actionby, track_compdate) 
				             VALUES ($trackid, '$refid', '$datetime', '$attendby', '$remark', '$action', '$actionby', '$completiondate')";
				$this->db->query($sqlQuery);
				
				$data['refid'] = $refid;
				$data['successMsg'] = "The phone track log has been saved.";
				$this->load->view('available/update_lt_phtracklog', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function editAvailableSubmit(){
			$avlab_ref_no = $_POST['txtrefno'];
			$avlab_qty = $_POST['txttotalQty'];
			$avlab_qty_cancel = $_POST['txtqtycancelled'];
			$avlab_cancel_remarks = $_POST['txtcancelremarks'];
			
			$avlab_isver = '0';
			$avlab_isappv = '0';
			$avlab_isclosed = '0';
			$avlab_isrej = '0';
			$regStatus = 1; //1-open, 2-verified, 3-approve, 4-rejected 5-closed
			
		
			
			
			if(isset($_POST['isverified'])){
				$avlab_isver = '1';
				$avlab_ver_by = $_POST['txtverifiedby'];
				$avlab_ver_date = date('Y-m-d', strtotime($_POST['verifieddate']));
				$regStatus = 2;
			}
			
			if(isset($_POST['isapproved'])){
				$avlab_isappv = '1';
				$avlab_appv_by = $_POST['txtapprovedby'];
				$avlab_appv_date = date('Y-m-d', strtotime($_POST['approveddate']));
				$regStatus = 3;
			}
			
			if(isset($_POST['isclosed'])){
				$avlab_isclosed = '1';
				$avlab_isclosed_by = $_POST['txtclosedby'];
				$avlab_closed_date = date('Y-m-d', strtotime($_POST['closeddate']));
				$regStatus = 5;
			}
		
			if(isset($_POST['isrejected'])){
				$avlab_isrej = '1';
				$avlab_rej_by = $_POST['txtrejectedby'];
				$avlab_rej_date = date('Y-m-d', strtotime($_POST['rejecteddate']));
				$avlab_rej_reason = $_POST['txtrejectreason'];
				$regStatus = 4;
			}
			
			$updateQuery = "UPDATE available 
			                SET avlab_statusid = $regStatus, 
			                    avlab_qty = $avlab_qty, 
			                    avlab_qty_cancel = $avlab_qty_cancel, 
								avlab_cancel_remarks = '$avlab_cancel_remarks'";
								
			if($avlab_isver == '1'){
				$updateQuery .= ", avlab_isver = '$avlab_isver', 
			                    avlab_ver_by = '$avlab_ver_by', 
			                    avlab_ver_date = '$avlab_ver_date'";
		    }
		    if($avlab_isappv == '1'){
				$updateQuery .= ", avlab_isappv = '$avlab_isappv', 
			                    avlab_appv_by = '$avlab_appv_by', 
			                    avlab_appv_date = '$avlab_appv_date'";
		    }
			
			if($avlab_isclosed == '1'){
				$updateQuery .= ", avlab_isclosed = '$avlab_isclosed', 
			                    avlab_isclosed_by = '$avlab_isclosed_by', 
			                    avlab_closed_date = '$avlab_closed_date'";
		    }
			
		    if($avlab_isrej == '1'){
			    $updateQuery .= ", avlab_isrej = '$avlab_isrej', 
								avlab_rej_by = '$avlab_rej_by', 
								avlab_rej_date = '$avlab_rej_date', 
								avlab_rej_reason = '$avlab_rej_reason'";
			} 
								
			$updateQuery .= " WHERE avlab_ref_no = '$avlab_ref_no'";
			
			$this->db->query($updateQuery);
			
			redirect('contAvailable/editAvailable/' . $avlab_ref_no . '/update');
		}
		
		function regisNewLabourPt1(){
			$ref_no = $this->uri->segment(3);
			$successMsg = $this->uri->segment(4);
			if(strlen($successMsg) > 0) $data['regisSuccessMsg'] = "<strong>New Labor (passport no: $successMsg) has successfully been registered and add to Local Transfer list</strong>";
			
			$data['avlabRecord'] = $this->ModelAvailable->getAvailableSummary($ref_no);
			
			$this->load->view('available/editavailable_regislabor_pt1', $data);	
		}
		
		function regisNewLabourPt2(){
			$ref_no = $_POST['txtavlab_refno'];
			$passportNo = trim($_POST['txtPassNo']);
			
			$existingLabour = $this->ModelLabour->labourExists($passportNo);
		
			if($existingLabour->num_rows() == 0){
				$siteuri = "contAvailable/regisNewLabourNew/" . $passportNo . "/" . $ref_no;
				$data['nonExistsMsg'] = "<font color=\"red\"><strong>The labour with passportNo $passportNo is not yet recorded in the system. </strong></font>";
				$data['registerbutton'] = "<input type=\"button\" name=\"btnRegister\" value=\" Register New Labour \" onclick=\"location.href='" . site_url($siteuri) . "'\" />";
			}
			else{
				$isWkrRegistered = $this->ModelAvailable->checkRegisteredWkr($passportNo, $ref_no);
				
				if($isWkrRegistered->num_rows() == 0){
					$data['existingLabour'] = $existingLabour->row();
				}
				else{
					$wkr = $isWkrRegistered->row();	
					$data['warningMsg'] = "The Labour $wkr->wkr_name (Passport No: $wkr->wkr_passno) has already been registered to this local transfer list.";
				}
			}
			
			$data['avlabRecord'] = $this->ModelAvailable->getAvailableSummary($ref_no);
			$this->load->view('available/editavailable_regislabor_pt1', $data);	
		}
		
		function regisNewLabourNew(){
			$data['passportNo'] = $this->uri->segment(3);
			$avlabrefno = $this->uri->segment(4);
			
			$data['avlabrefno'] = $avlabrefno;
			$data['avlabRecord'] = $this->ModelAvailable->getAvailableSummary($avlabrefno);
			$data['allStates'] = $this->ModelLabour->getAllStates();
			$data['allRaces'] = $this->ModelLabour->getAllRaces();
			$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade();
				
			$this->load->view('available/editavailable_regislabor_pt2', $data);	
		}
		
		function regisExistingLabour(){
			$wkr_id = $_POST['txtwkrid'];
			$avlab_refno= $_POST['txtavlab_refno'];
			$passno = $_POST['txtpassno'];
			$wkr_name = $_POST['txtwkrname'];
			$comp_to = $_POST['txtcompto'];
			$compto_clabno = $_POST['compto_clabno'];
			$currentuser = $this->session->userdata('emp_id');
			
			
			$insertQuery = "INSERT INTO available_wkr (avlabwkr_ref_no, avlabwkr_wkrid, avlabwkr_createdby, avlabwkr_createddate)
			             VALUES ('$avlab_refno', $wkr_id, $currentuser, NOW());";	
						              
			$assigncompQuery = "UPDATE workers SET wkr_currentemp = '$compto_clabno' WHERE wkr_passno = '$passno'";
				
			$workhistoryQuery = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_avlab_refno, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate)
							     VALUES($wkr_id, '$compto_clabno', '$avlab_refno', 'local transfer', NOW(), 1, $currentuser, NOW());";
				
			/**********START TRANSACTION**********/
			$this->db->trans_begin();
			
			$this->db->query($insertQuery);      
			$this->db->query($assigncompQuery);
			$this->db->query($workhistoryQuery);
			
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			}
			else
			{
			    $this->db->trans_commit();
			}
			/****************END MANUAL TRANSACTION****************/
				
			$data['successMsg'] = "Labour Registration success. The labour with passport number $passno ($wkr_name) has been registered to Local Transfer List.";
			$data['avlabRecord'] = $this->ModelAvailable->getAvailableSummary($avlab_refno);
			
			$this->load->view('available/editavailable_regislabor_pt1', $data);	
		}
		
		function regisNewLaborPt2Submit(){
			$wkr_name = strtoupper(trim($_POST['txtname']));
			$wkr_passno = trim($_POST['txtpassno']);
			$wkr_oldpassno = trim($_POST['txtoldpassno']);
			$wkr_dob_day = $_POST['selday'];
 			$wkr_dob_month = $_POST['selmonth'];
			$wkr_dob_year = $_POST['selyear'];
			$wkr_dob = $wkr_dob_year . "-" . $wkr_dob_month . "-" . $wkr_dob_day; //YYYY-mm-dd
			$wkr_gender = $_POST['selgender'];
			$wkr_homeaddress = strtoupper(trim($_POST['txthomeaddr']));
			$wkr_zipcode = trim($_POST['txtzipcode']);
			$wkr_country = $_POST['selcountry'];
			$wkr_address = strtoupper(trim($_POST['txtcuraddr']));
			$wkr_pcode = trim($_POST['txtpcode']);
			$wkr_state = $_POST['selstate'];
			$wkr_race = $_POST['selrace'];
			$wkr_nationality = $_POST['selnationality'];
			
			$wkr_passexp = date('Y-m-d', strtotime($_POST['dtPassportExp']));
			$wkr_plksno = trim($_POST['txtplksno']);
			
			//if the permitexp date is empty
			$wkr_permitexp = $_POST['dtPermitExp'];
			if($wkr_permitexp != "") $wkr_permitexp = date('Y-m-d', strtotime($wkr_permitexp));
			else $wkr_permitexp = "0000-00-00";
			
			$wkr_entrydate = date('Y-m-d', strtotime($_POST['dtEntry']));
			$wkr_wtrade = $_POST['txtworktrade'];
			$wkr_lastemp = strtoupper(trim($_POST['txtlastemp']));
			//$wkr_currentemp = strtoupper(trim($_POST['txtcurrentemp']));
			
			$currentuserid = $this->session->userdata('emp_id');
			
			//hidden fields
			$avlab_refno = $_POST['avlabrefno'];
			$compfrom_clabno = $_POST['txtcompfrom'];
			$compto_clabno = $_POST['txtcompto'];
			$wkr_currentemp = $compto_clabno;
			
			$assignedby = $this->session->userdata('emp_id');
			
			$workerid = $this->ModelLabour->getNextWorkerID();
			$insertQuery = "INSERT INTO workers (wkr_id, wkr_name, wkr_passno, wkr_oldpassno, wkr_dob, wkr_gender, wkr_homeaddr, wkr_zipcode, 
			                wkr_country, wkr_address, wkr_pcode, wkr_state, wkr_race, wkr_nationality, wkr_passexp, wkr_plksno, 
			                wkr_permitexp, wkr_entrydate, wkr_wtrade, wkr_lastemp, wkr_currentemp, wkr_createdby, wkr_createddate) 
			                VALUES ($workerid, '$wkr_name', '$wkr_passno', '$wkr_oldpassno', '$wkr_dob', '$wkr_gender', 
			                '$wkr_homeaddress', '$wkr_zipcode', '$wkr_country', '$wkr_address', '$wkr_pcode', '$wkr_state', '$wkr_race', 
			                '$wkr_nationality', '$wkr_passexp', '$wkr_plksno', '$wkr_permitexp', '$wkr_entrydate', '$wkr_wtrade','$wkr_lastemp', '$wkr_currentemp', $currentuserid, NOW()) ";
			
			$localtransferQuery = "INSERT INTO available_wkr (avlabwkr_ref_no, avlabwkr_wkrid, avlabwkr_createdby, avlabwkr_createddate)
			             			VALUES ('$avlab_refno', $workerid, $currentuserid, NOW());";
			
			$workhistoryQuery1 = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_avlab_refno, rel_assign_type, rel_status, rel_createdby, rel_createddate)
							     VALUES($workerid, '$compfrom_clabno', '$avlab_refno', 'local transfer', 1, '$assignedby', NOW());";
			
		    $workhistoryQuery2 = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_avlab_refno, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate)
							     VALUES($workerid, '$compto_clabno', '$avlab_refno', 'local transfer', NOW(), 1, $currentuserid, NOW());";
							     
			//echo $insertQuery;
			/**********START TRANSACTION**********/
			$this->db->trans_begin();
			
			$this->db->query($insertQuery);
			$this->db->query($localtransferQuery);
			$this->db->query($workhistoryQuery1);
			$this->db->query($workhistoryQuery2);
			
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			    echo "Error in labour registration. <input type=\"button\" name=\"btnClose\" value=\"Close\" onclick=\"window.close();\" />";
			}
			else
			{
			    $this->db->trans_commit();
			    redirect('contavailable/regisNewLabourPt1/' . $avlab_refno . '/' . $wkr_passno);
			}
			/****************END TRANSACTION****************/
		}
		
		function viewLaborDetails(){
			$wkr_id = $this->uri->segment(3);
			$data['avlab_ref_no'] = $this->uri->segment(4);
			
			$data['labor'] = $this->ModelLabour->getLabourByWkrID($wkr_id);	
			$data['allStates'] = $this->ModelLabour->getAllStates();
			$data['allRaces'] = $this->ModelLabour->getAllRaces();
			$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allskill'] = $this->ModelLabour->getAllSkill();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade();
			$data['emphistory'] = $this->ModelLabour->getEmploymentHistory($wkr_id);
			//photo info
			$photoInfo = $this->ModelLabour->getUploadedPhotoInfo($wkr_id);
			if($photoInfo->num_rows() > 0){
				$photoRow = $photoInfo->row();
				$data['photoInfo'] = "<img src=\"" . base_url() ."uploads/labour/photos/" . $photoRow->upload_destfilename  ."\" width=\"126\" height=\"144\" />";
			}
			else{
				$data['photoInfo'] = "";
			}
			
			$this->load->view('available/availableLabourDetails', $data);
		}
		
function printCheckLits(){
	$refno = $this->uri->segment(3);
	$compFrom = $this->uri->segment(4);
	//$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
	$data['avlabDetails']= $this->ModelAvailable->getAvailableDetails($refno);
	
	$data ['ctrData1'] = $this->ModelAvailable->getCtrByClabNo($compFrom);
	
	//$this->load->view('available/lt-checklist.php', $data);
	$this->load->view('available/lt-checklist.php', $data);
	
	
}

		function removeLabour(){
			$wkr_id = $this->uri->segment(3);
			$ref_no = $this->uri->segment(4);
			
			$deleteQuery = "DELETE * FROM available_wkr WHERE avlabwkr_ref_no = '$ref_no' AND avlab_wkrid = $wkr_id";	
			$deleteRelQuery = "DELETE FROM wkr_ctr_relationship WHERE rel_wkrid = $wkr_id AND rel_avlab_refno = '$ref_no'";
			
			/**********START TRANSACTION**********/
			$this->db->trans_begin();
			$this->db->query($deleteQuery);
			$this->db->query($deleteRelQuery);
			
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			    echo "Error in removing labour from this local transfer list. Please try again later.";
			}
			else
			{
			    $this->db->trans_commit();
			    redirect('contavailable/editAvailable/' . $ref_no);
			}
			/****************END TRANSACTION****************/
		}
	}
?>