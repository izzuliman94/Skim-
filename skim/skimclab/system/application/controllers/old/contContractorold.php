<?php
	class ContContractor extends Controller {
		function ContContractor(){
			parent::Controller();
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->model('ModelContractor');
			$this->load->model('ModelLabour');
		}
		
		function index(){
		}
		
		function registrationForm(){
			$this->load->view('contractor/registration_pt1.php');
		}
		
		function checkCompanyNumber(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$companyno = trim($_POST["companyno"]);
				$companyno = str_replace(" ", "", $companyno);
				
				$companyExists = $this->ModelContractor->companyExists($companyno);
				if($companyExists->num_rows() > 0)
				{
					$data['existsMsg'] = "The company with ROC number <b> $companyno </b> has already been registered.";
					$data['company'] = $companyExists->row();
					$this->load->view('contractor/registration_pt1.php', $data);
				}
				else{
					$data['allStates'] = $this->ModelContractor->getAllStates();
					$data['allGrades'] = $this->ModelContractor->getAllCtrGrades();
					$data['allCategories'] = $this->ModelContractor->getAllCtrCategories();
					$data['allSpec'] = $this->ModelContractor->getAllCtrSpec();
				
					$data['companyno'] = $companyno;
					$this->load->view('contractor/registration_pt2.php', $data);
				}
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function registrationFormSubmit(){
			$clabno = $this->ModelContractor->generateClabNo();
			$companyname = strtoupper(trim($_POST['companyname']));	
			$companyregno = strtoupper(trim($_POST['companyregno']));	
			//remove white space from companyregno
			$companyregno = str_replace(" ", "", $companyregno);
			
			$address1 = strtoupper(trim($_POST['address1']));	
			$address2 = strtoupper(trim($_POST['address2']));	
			$address3 = strtoupper(trim($_POST['address3']));	
			$postcode = trim($_POST['postcode']);	
			$state = $_POST['state'];	
			$telephone1 = trim($_POST['telephone1']);	
			$telephone2 = trim($_POST['telephone2']);	
			$fax = trim($_POST['fax']);	
			$cidbreg = trim($_POST['cidbreg']);	
			
			$cidbexpire = trim($_POST['cidbexpire']);	
				if($cidbexpire == '') $cidbexpire = "0000-00-00";
				else $cidbexpire = date('Y-m-d', strtotime($cidbexpire));
			
			$email = trim($_POST['email']);
			$grade = trim($_POST['grade']);	
			$category = trim($_POST['txtcategory']);	
			$specialization = trim($_POST['txtspec']);	
			
			if(isset($_POST['periodreg'])) $periodreg = $_POST['periodreg'];
			else $periodreg = '';
			
			$amount = trim($_POST['amount']);
			if($amount == '') $amount = 0;
			
			if(isset($_POST['paymentmode'])) $paymentmode = $_POST['paymentmode'];
			else $paymentmode = '';
			
			$chequeno = trim($_POST['chequeno']);
			$paymentdate = trim($_POST['paymentdate']);
			if($paymentdate == '') $paymentdate = '0000-00-00';
			else $paymentdate = date('Y-m-d', strtotime($paymentdate));
			
			if($paymentmode == '1') {
				$cashdate = $paymentdate; 
				$chequedate="0000-00-00";
			}
			else{
				$cashdate = "0000-00-00"; 
				$chequedate = $paymentdate;
			}
			
			//get the CLAB expiry date
			if($periodreg != '' && $amount > 0){
				if($periodreg == '1') $clabExpDate = date('Y-m-d', strtotime('+1 year', strtotime($paymentdate)));
				else if($periodreg == '2') $clabExpDate = date('Y-m-d', strtotime('+2 year', strtotime($paymentdate)));
				else if($periodreg == '3') $clabExpDate = date('Y-m-d', strtotime('+3 year', strtotime($paymentdate)));
				else{	
				}
			}else{
				$clabExpDate = "0000-00-00";		
			}
			
			if(isset($_POST['form24'])) $form24 = $_POST['form24'];	
			else $form24 = '0';
			
			if(isset($_POST['form49'])) $form49 = $_POST['form49'];	
			else $form49 = '0';
			
			if(isset($_POST['cidb_certcopy'])) $cidb_certcopy = $_POST['cidb_certcopy'];	
			else $cidb_certcopy = '0';
			
			if(isset($_POST['iccopy'])) $ic_copy = $_POST['iccopy'];
			else $ic_copy = '0';
			
			if(isset($_POST['others'])) $others = $_POST['others'];	
			else $others = '0';
			
			$attach_others = trim($_POST['attach_others']);
			$director = trim($_POST['director']);	
			$directorMobile = trim($_POST['directorMobile']);	
			$contactperson = trim($_POST['contactperson']);	
			$contactMobile = trim($_POST['contactMobile']);	
			$contactDesig = trim($_POST['contactDesig']);	
			$enteredby = trim($_POST['enteredby']);	
			$entereddate = date('Y-m-d', strtotime($_POST['entereddate']));	
			$ctr_appstatus = '1'; //appplication status = open
			$ctr_status = '1'; //contractor status = active
			
			$insertQuery = "INSERT INTO contractors (ctr_clab_no, ctr_datereg, ctr_comp_name, ctr_comp_regno, ctr_addr1, ctr_addr2, ctr_addr3, ctr_pcode, ctr_state, ctr_telno, 
							ctr_telno1, ctr_fax, ctr_email, ctr_cidb_regno, ctr_cidbexp_date, ctr_grade, ctr_category, ctr_spec, ctr_periodreg, ctr_mbramount,
							ctr_paymentype, ctr_cshdate, ctr_chqno, ctr_chqdate, ctr_procsby, ctr_procdate, ctr_appstatus, 
							ctr_attach_form24, ctr_attach_form49, ctr_attach_copycidb, ctr_attach_iccopy, ctr_attach_others, ctr_attach_specify, 
							ctr_dir_name, ctr_dir_mobileno, ctr_contact_name, ctr_contact_desg, ctr_contact_mobileno, ctr_status, ctr_clabexp_date) 
							VALUES ('$clabno', NOW(), " . $this->db->escape($companyname) .",'$companyregno', ". $this->db->escape($address1) .", ". $this->db->escape($address2).", 
							".$this->db->escape($address3).", '$postcode', '$state', '$telephone1',
							'$telephone2', '$fax', '$email', '$cidbreg', '$cidbexpire', '$grade', '$category', '$specialization', '$periodreg', $amount,
							'$paymentmode', '$cashdate', '$chequeno', '$chequedate', '$enteredby', '$entereddate', '$ctr_appstatus',
							'$form24', '$form49', '$cidb_certcopy', '$ic_copy', '$others', '$attach_others', 
							".$this->db->escape($director).", '$directorMobile', ".$this->db->escape($contactperson).", ".$this->db->escape($contactDesig).", '$contactMobile', '$ctr_status', '$clabExpDate');";
			
			/**********START TRANSACTION**********/
			$this->db->trans_begin();
			$this->db->query($insertQuery);
			if($periodreg != '' && $amount > 0){
			$paymentid = $this->ModelContractor->getNextPaymentID();
			$paymentQuery = "INSERT INTO ctr_payment (pay_id, pay_ctr_id, pay_periodreg, pay_amount, pay_type, pay_date, pay_chequeno, pay_recvby, pay_recvdate) 
			                 VALUES ($paymentid, '$clabno', '$periodreg', $amount, '$paymentmode', '$paymentdate', '$chequeno', '$enteredby', '$entereddate')";
			$this->db->query($paymentQuery);
			}
			
			
			if ($this->db->trans_status() === FALSE)
			{
			    $this->db->trans_rollback();
			}
			else
			{
			    $this->db->trans_commit();
			}
			/****************END MANUAL TRANSACTION****************/
			$data['clabno'] = $clabno;
			$data['ctr_compname'] = $companyname;
			
			redirect('contContractor/editContractor/'. $clabno .'/add');
		}
		
		function regisAttachDoc(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clab_no = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);
				if($successMsg == 'delete'){
					$data['successMsg'] = "The document has been deleted successfully.";	
				}
				$data['clabno'] = $clab_no;
				$data['ctr_compname'] = $this->ModelContractor->getCtrNameByClabNo($clab_no);
				$data['uploadHistory'] = $this->ModelContractor->getUploadHistory($clab_no);
				
				$data['accessibility'] = $this->session->userdata('emp_accessibility');
				$this->load->view('contractor/registration_attachdoc', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function uploadDocSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clabno = $_POST['clabno'];
				$ctr_compname = $_POST['ctr_compname'];
				$filetype = $_POST['filetype'];
				if($filetype == 'others') $fileTypeName = $_POST['otherFileName'];
				else if($filetype == 'form24') $fileTypeName = "Form 24";
				else if($filetype == 'form49') $fileTypeName = "Form 49";
				else if($filetype == 'iccopy') $fileTypeName = "IC Copy";
				else $fileTypeName = "Copy of CIDB certificate";
				
				$dirname = "./uploads/contractors/" . $clabno;
				if (file_exists($dirname)) {    
			        //echo "The directory {$dirname} exists";    
			    } else {    
			        mkdir($dirname, 0777);    
			        //echo "The directory {$dirname} was successfully created.";    
			    }   
			    
				//upload documents
				$config['upload_path'] = $dirname;
				$config['allowed_types'] = 'txt|xls|pdf|jpg|gif|png';		//usually MIME extension
				$config['max_size']	= '10000';				//in KB
	
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$uploadError = array('error' => $this->upload->display_errors());
					$data['error'] = $uploadError;
					echo "upload error." . $this->upload->display_errors();
					//$this->load->view('contractor/registration_attachdoc', $data);
				}
				else
				{
					//upload the file and get the info
					$uploadInfo = $this->upload->data();
	
					//call function to import the data in file to database
					$filepath = $uploadInfo['full_path'];
					
					//pass the data to importsuccess view --> later this should be converted to log file
					$dest_filename = $uploadInfo['file_name'];
					$orig_name = $uploadInfo['orig_name'];
					$file_size = $uploadInfo['file_size'];
					$filepath = substr($filepath, strpos($filepath, "uploads/contractors"), strlen($filepath));
					$uploadby = $this->session->userdata('emp_id');
					$uploaddate = date('Y-m-d');
					
					//echo "File Path: " . $filepath . "<br />";
					//echo "File Name: " . $dest_filename . "<br />";
					//echo "Original fileTypeName: " . $orig_name . "<br />";
					//echo "File Size: " . $file_size . "(KB) <br />";
					
					$attachment_id = $this->ModelContractor->getNextAttachmentID();
					$sqlQuery = "INSERT INTO ctr_attachdoc (att_id, att_ctr_id, att_filetype, att_org_filename, att_dest_filename, att_desturl, att_uploadby, att_uploaddate) 
					             VALUES ($attachment_id, '$clabno', '$fileTypeName', '$orig_name', '$dest_filename', '$filepath', $uploadby, '$uploaddate');";
					
					$this->db->query($sqlQuery);
					$data['successMsg'] = $fileTypeName . "has been uploaded successfully. You may attach another file.";
				}
				
				$data['clabno'] = $clabno;
				$data['ctr_compname'] = $ctr_compname;
				
				$data['uploadHistory'] = $this->ModelContractor->getUploadHistory($clabno);
				$data['accessibility'] = $this->session->userdata('emp_accessibility');
				$this->load->view('contractor/registration_attachdoc', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function ctrDashboard(){
			$data['overallCtr'] = $this->ModelContractor->getTotalContractors();
			$data['openCtr'] = $this->ModelContractor->getCtrByAppStatus(1, 'total');
			$data['verifiedCtr'] = $this->ModelContractor->getCtrByAppStatus(2, 'total');
			$data['approvedCtr'] = $this->ModelContractor->getCtrByAppStatus(3, 'total');
			$data['rejectedCtr'] = $this->ModelContractor->getCtrByAppStatus(4, 'total');
			$data['withdrawCtr'] = $this->ModelContractor->getCtrByAppStatus(5, 'total');
			$data['activeCtr'] = $this->ModelContractor->getCtrByStatus(1, 'total');
			$data['inactiveCtr'] = $this->ModelContractor->getCtrByStatus(2, 'total');
			$data['suspendedCtr'] = $this->ModelContractor->getCtrByStatus(3, 'total');
			$data['registerOnlineCtr'] = $this->ModelContractor->getCtrRegisterOnline('', 0, 'total');
			
			$data['clabexpiry1mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_clabexp_date', 1, 'total');
			$data['clabexpiry2mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_clabexp_date', 2, 'total');
			$data['clabexpiry3mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_clabexp_date', 3, 'total');
			$data['clabexpiryexpired'] = $this->ModelContractor->getCtrByClabExpiry('ctr_clabexp_date', -1, 'total');
			
			$data['cidbexpiry1mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_cidbexp_date', 1, 'total');
			$data['cidbexpiry2mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_cidbexp_date', 2, 'total');
			$data['cidbexpiry3mth'] = $this->ModelContractor->getCtrByClabExpiry('ctr_cidbexp_date', 3, 'total');
			$data['cidbexpiryexpired'] = $this->ModelContractor->getCtrByClabExpiry('ctr_cidbexp_date', -1, 'total');
			
			//expiry statistics
			$data['plks2wks'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_permitexp', 0.5, 'total', 'allcountry');
			$data['plks1mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_permitexp', 1, 'total', 'allcountry');
			$data['plks2mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_permitexp', 2, 'total', 'allcountry');
			$data['plks3mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_permitexp', 3, 'total', 'allcountry');
			$data['plks4mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_permitexp', 4, 'total', 'allcountry');
			$data['plksexp2'] = $this->ModelLabour->getLaborByPermitPassExpiry4('wkr_permitexp', -1, 'total', 'allcountry');
			
			$data['pass2wks'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 0.5, 'total', 'allcountry');
			$data['pass1mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 1, 'total', 'allcountry');
			$data['pass2mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 2, 'total', 'allcountry');
			$data['pass3mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 3, 'total', 'allcountry');
			$data['pass4mth'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 4, 'total', 'allcountry');
			
			$this->load->view('contractor/dashboard', $data);
		}
		
		function ctrListByClabExpiry(){
			$noOfMonths = $this->uri->segment(3);
			$fieldType = $this->uri->segment(4);
			if($fieldType == "ctr_clabexp_date") $titleType = "CLAB";
			else $titleType = "CIDB";
			
			if($noOfMonths == "1"){
				$data['title'] = "List of contractors ($titleType Registration expires in 1 month)";
			}
			else{
				$data['title'] = "List of contractors ($titleType Registration expires in " . $noOfMonths . " months)";
			}
			
			$data['titleType'] = $titleType;
			$data['noOfMonths'] = $noOfMonths;
			$data['contractorList'] =  $this->ModelContractor->getCtrByClabExpiry($fieldType, $noOfMonths, 'list');
			
			$this->load->view('contractor/ctr_listby_clabexpiry', $data);
		}
		
		function listByExpiryAndCompany(){
			$fieldName = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$total = $this->uri->segment(5);
			
			//update the previous printing tasks - void printed mark after a month
			$success = $this->ModelContractor->updatePrintLetterHistory($noOfMonths, $fieldName);
			
			if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldName == 'wkr_permitexp'){
				$data['title'] = "List of Companies(FCL Permit Expiry Within $duration)";
			}
			else{
				$data['title'] = "List of Companies (FCL Passport Expiry Within $duration)";
			}
			
			$data['listByCompany'] = $this->ModelContractor->listExpiryByCompany($fieldName, $noOfMonths, 'companylist', '');
			
			$data['total'] = $total;
			$data['fieldName'] = $fieldName;
			$data['noOfMonths'] = $noOfMonths;
			
			$this->load->view('contractor/ctr_listby_plksexpiry', $data);
		}
		
		function listByExpiryAndCompany2(){
			$fieldName = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$offset = strlen($this->uri->segment(5) > 0)? $this->uri->segment(5) : "0";
			
			if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldName == 'wkr_permitexp'){
				$data['title'] = "List of Companies(FCL Permit Expiry Within $duration)";
			}
			else{
				$data['title'] = "List of Companies (FCL Passport Expiry Within $duration)";
			}
			$totalCompanies = $this->ModelContractor->listExpiryByCompany2($fieldName, $noOfMonths, 'total', 0, 0);
			
			// load pagination class
		    $this->load->library('pagination');
		    $config['base_url'] = base_url().'index.php/contContractor/listByExpiryAndCompany2/' . $fieldName . '/'. $noOfMonths . '/';
		    $config['total_rows'] = $totalCompanies;
		    $config['per_page'] = '20';
		    $config['uri_segment'] = 5; 	//without this OR if this is wrongly set, the pagination link won't work well
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>';
		
		    $this->pagination->initialize($config);
			$data['listByCompany'] = $this->ModelContractor->listExpiryByCompany2($fieldName, $noOfMonths, 'companylist', $config['per_page'], $offset);
			
			$data['fieldName'] = $fieldName;
			$data['noOfMonths'] = $noOfMonths;
			$data['offset'] = $offset;
			$this->load->view('contractor/ctr_listby_plksexpiry2', $data);
		}
		
		function listByExpiryAndCompany3(){
			$fieldName = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$total = $this->uri->segment(5);
			
			//update the previous printing tasks - void printed mark after a month
			$success = $this->ModelContractor->updatePrintLetterHistory($noOfMonths, $fieldName);
			
			if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldName == 'wkr_permitexp'){
				$data['title'] = "List of Companies(FCL Permit Expiry Within $duration)";
			}
			else{
				$data['title'] = "List of Companies (FCL Passport Expiry Within $duration)";
			}
			
			$data['listByCompany'] = $this->ModelContractor->listExpiryByCompany3($fieldName, $noOfMonths, 'companylist', '');
			
			$data['total'] = $total;
			$data['fieldName'] = $fieldName;
			$data['noOfMonths'] = $noOfMonths;
			
			$this->load->view('contractor/ctr_listby_plksexpiry3', $data);
		}
				
				
		function listByExpiryAndCompany4(){
			$fieldName = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$total = $this->uri->segment(5);
			
			//update the previous printing tasks - void printed mark after a month
			$success = $this->ModelContractor->updatePrintLetterHistory($noOfMonths, $fieldName);
			
			if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldName == 'wkr_permitexp'){
				$data['title'] = "List of Companies(FCL Permit Expiry Within $duration)";
			}
			else{
				$data['title'] = "List of Companies (FCL Passport Expiry Within $duration)";
			}
			
			$data['listByCompany'] = $this->ModelContractor->listExpiryByCompany4($fieldName, $noOfMonths, 'companylist', '');
			
			$data['total'] = $total;
			$data['fieldName'] = $fieldName;
			$data['noOfMonths'] = $noOfMonths;
			
			$this->load->view('contractor/ctr_listby_plksexpiry4', $data);
		}
						
				
				
				
		function displaydate($originalDate){
			if($originalDate == "0000-00-00" || $originalDate == "NULL" || $originalDate == "")					
				return "-";
			else return date('d-m-Y', strtotime($originalDate));
		}
		
		function displayuri($ctr_clab_no){
			$hrefString = "<a href=\"editContractor/$ctr_clab_no\">" . $ctr_clab_no . "</a>";
			
			return $hrefString;	
		}
		
		function ctrList(){
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "contractors");
		    $grid->db->join("mst_ctr_appstatus","contractors.ctr_appstatus=mst_ctr_appstatus.appstatus_id","LEFT");
		    $grid->db->join("mst_emp_status","contractors.ctr_status=mst_emp_status.emp_statusid","LEFT");
		    $grid->db->order_by("ctr_clab_no", "DESC");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contContractor";
		 	$link_edit = anchor("$baseuri/editContractor/<#ctr_clab_no#>","<#ctr_clab_no#>");
		 	
			$grid->column("CLAB NO","$link_edit", 'width="100"');
			$grid->column("COMPANY","ctr_comp_name");
			$grid->column("GRADE","ctr_grade");
			$grid->column("STATUS","emp_status_desc");
			$grid->column("TELEPHONE","ctr_telno");
			$grid->column("CLAB EXPIRY DATE","<callback_displaydate><#ctr_clabexp_date#></callback_displaydate>");
			$grid->column("CIDB EXPIRY DATE","<callback_displaydate><#ctr_cidbexp_date#></callback_displaydate>");
			$grid->column("REG. STATUS","appstatus_desc");
			
			$baseuri = "contContractor";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
			$this->load->view('contractor/contractor_lists', $data);	
		}
		
		function listContractorByStatus(){
			$statusType = $this->uri->segment(3);
			$appStatusID = $this->uri->segment(4);
			if($statusType == 'ctr_appstatus'){
				$data['appStatus'] = $this->ModelContractor->getAppStatusByStatusID($appStatusID);
				$data['contractorList'] = $this->ModelContractor->getCtrByAppStatus($appStatusID, 'list');
			}
			else if($statusType == 'ctr_status'){ //ctr_status
				$data['appStatus'] = $this->ModelContractor->getStatusByStatusID($appStatusID);
				$data['contractorList'] = $this->ModelContractor->getCtrByStatus($appStatusID, 'list');
			}
			else if($statusType == 'approval'){
				$data['appStatus'] = "";
				$data['titleString'] = "require approval";
				$data['contractorList'] = $this->ModelContractor->getCtrForApproval('list');
			}
			else{
				$data['appStatus'] = "REGISTERED ONLINE";
				$data['contractorList'] = $this->ModelContractor->getCtrRegisterOnline($statusType, $appStatusID, 'list');
			}
			$this->load->view('contractor/ctr_listby_status', $data);
		}
		
		function editContractor(){
			$ctr_clab_no = $this->uri->segment(3);
			$successMsg = $this->uri->segment(4);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($ctr_clab_no);
			
			$data['allStates'] = $this->ModelContractor->getAllStates();
			$data['allGrades'] = $this->ModelContractor->getAllCtrGrades();
			$data['allCategories'] = $this->ModelContractor->getAllCtrCategories();
			$data['allSpec'] = $this->ModelContractor->getAllCtrSpec();
			$data['successMsg'] = $successMsg;
			
			$this->load->view('contractor/ctr_edit', $data);	
		}
		
		function editCtrSubmit(){
			$ctr_clab_no = $_POST['clabno'];
			//POST data
			$companyname = trim($_POST['companyname']);	
			$companyregno = trim($_POST['companyregno']);	
			$address1 = trim($_POST['address1']);	
			$address2 = trim($_POST['address2']);	
			$address3 = trim($_POST['address3']);	
			$postcode = trim($_POST['postcode']);	
			$state = $_POST['state'];	
			$telephone1 = trim($_POST['telephone1']);	
			$telephone2 = trim($_POST['telephone2']);	
			$fax = trim($_POST['fax']);	
			$cidbreg = trim($_POST['cidbreg']);	
			
			$cidbexpire = trim($_POST['cidbexpire']);	
				if($cidbexpire == '') $cidbexpire = "0000-00-00";
				else $cidbexpire = date('Y-m-d', strtotime($cidbexpire));
			
			$email = trim($_POST['email']);
			$grade = trim($_POST['grade']);	
			$category = trim($_POST['txtcategory']);	
			$specialization = trim($_POST['txtspec']);	
			
			if(isset($_POST['form24'])) $form24 = $_POST['form24'];	
			else $form24 = '0';
			
			if(isset($_POST['form49'])) $form49 = $_POST['form49'];	
			else $form49 = '0';
			
			if(isset($_POST['cidb_certcopy'])) $cidb_certcopy = $_POST['cidb_certcopy'];	
			else $cidb_certcopy = '0';
			
			if(isset($_POST['iccopy'])) $ic_copy = $_POST['iccopy'];
			else $ic_copy = '0';
			
			if(isset($_POST['others'])) $others = $_POST['others'];	
			else $others = '0';
			
			$attach_others = trim($_POST['attach_others']);
			$director = trim($_POST['director']);	
			$directorMobile = trim($_POST['directorMobile']);	
			$contactperson = trim($_POST['contactperson']);	
			$contactMobile = trim($_POST['contactMobile']);	
			$contactDesig = trim($_POST['contactDesig']);	
			
			$registrationType = $_POST['regisType'];	//1-register through CLAB, 2-register online
			$isverified = '0';
			$isapproved = '0';
			$isreject = '0';
			$iswithdraw = '0';
			$regStatus = $_POST['txtregStatus'];	//1-open, 2-verified, 3-approved, 4-rejected, 5-withdrawal [FK:Mst_Ctr_Appstatus, appstatus_id]
			
			//if verified
			if(isset($_POST['isverified'])){
				$isverified = '1';
				$verifiedby = $_POST['txtverifiedby'];
				$verifieddate = date('Y-m-d', strtotime($_POST['verdate']));	
				$regStatus = '2';
			}
			
			//if approved
			if(isset($_POST['isapproved'])){
				$isapproved = '1';
				$approvedby = $_POST['txtapprovedby'];
				$approveddate = date('Y-m-d', strtotime($_POST['appdate']));
				$regStatus = '3';
				
				if($registrationType == '2') $newClabNo = $this->ModelContractor->generateClabNo();
			}
			
			//if rejected
			if(isset($_POST['isrejected'])){
				$isreject = '1';
				$rejectby = $_POST['txtrejectedby'];
				$rejectdate = date('Y-m-d', strtotime($_POST['rejdate']));
				$rejectreason = trim($_POST['txtrejectreason']);
				$regStatus = '4';
			}
			
			//if withdraw
			if(isset($_POST['iswithdraw'])){
				$iswithdraw = '1';
				$withdrawby = $_POST['txtwithdrawby'];
				$withdrawdate = date('Y-m-d', strtotime($_POST['withddate']));
				$regStatus = '5';
			}
			
			$updateCtrQuery = "UPDATE contractors SET
							   ctr_comp_name = " . $this->db->escape($companyname) .",
			                   ctr_comp_regno = '$companyregno', 
			                   ctr_addr1 = ".$this->db->escape($address1).", 
			                   ctr_addr2 = ".$this->db->escape($address2).", 
			                   ctr_addr3 = ".$this->db->escape($address3).", 
			                   ctr_pcode = '$postcode', 
			                   ctr_state = '$state', 
			                   ctr_telno = '$telephone1', 
							   ctr_telno1 = '$telephone2', 
							   ctr_fax = '$fax', 
							   ctr_email = '$email', 
							   ctr_cidb_regno = '$cidbreg', 
							   ctr_cidbexp_date = '$cidbexpire', 
							   ctr_grade = '$grade', 
							   ctr_category = '$category', 
							   ctr_spec = '$specialization', 
							   ctr_attach_form24 = '$form24', 
							   ctr_attach_form49 = '$form49', 
							   ctr_attach_copycidb = '$cidb_certcopy', 
							   ctr_attach_iccopy = '$ic_copy',
							   ctr_attach_others = '$others', 
							   ctr_attach_specify = '$attach_others', 
							   ctr_dir_name = ".$this->db->escape($director).", 
							   ctr_dir_mobileno = '$directorMobile', 
							   ctr_contact_name = ".$this->db->escape($contactperson).", 
							   ctr_contact_desg = '$contactDesig', 
							   ctr_contact_mobileno = '$contactMobile'";
			
			if($registrationType == '2' && $isapproved == '1'){
				$updateCtrQuery .= ", ctr_clab_no = '$newClabNo'";
			 }
			
			if($isverified == '1'){
				$updateCtrQuery .= " ,ctr_verified = '$isverified', 
				                      ctr_verifiedby = '$verifiedby', 
				                      ctr_verifieddate = '$verifieddate'";
			}
			if($isapproved == '1'){
				$updateCtrQuery .= " ,ctr_approve = '$isapproved', 
				                      ctr_app_name = '$approvedby', 
				                      ctr_app_date = '$approveddate'";	
			}
			if($isreject == '1'){
				$updateCtrQuery .= " ,ctr_reject = '$isreject', 
				                      ctr_rej_name = '$rejectby', 
				                      ctr_rej_date = '$rejectdate', 
				                      ctr_reject_reason = '$rejectreason'";
			}
			
			if($iswithdraw == '1'){
				$updateCtrQuery .= " ,ctr_withdrawal = '$iswithdraw', 
				                     ctr_withd_name = '$withdrawby', 
				                     ctr_withd_date = '$withdrawdate'";
			}
			
			$updateCtrQuery .= " , ctr_appstatus = '$regStatus' 
								WHERE ctr_clab_no = '$ctr_clab_no'"; 
			
			$this->db->query($updateCtrQuery);  
			      
			//after insert, change the clab number for approving online registered contractors case
			if($registrationType == '2' && $isapproved == '1') {
				$ctr_clab_no = $newClabNo;
			 }
			
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($ctr_clab_no);
			$data['allStates'] = $this->ModelContractor->getAllStates();
			$data['allGrades'] = $this->ModelContractor->getAllCtrGrades();
			$data['allCategories'] = $this->ModelContractor->getAllCtrCategories();
			$data['allSpec'] = $this->ModelContractor->getAllCtrSpec();
			
			redirect('contContractor/editContractor/' . $ctr_clab_no . '/update');
		}
		
		function assignLabourCompSearch(){
			$this->load->view('contractor/assign_labor_pt1');	
		}
		
		function assignLabourCompSearchResult(){
			$searchby = $_POST['searchby'];
			$keyword = trim($_POST['txtkeyword']);
			
			$data['ctrRecord'] = $this->ModelContractor->searchContractors($searchby, $keyword,0,0);
			
			$this->load->view('contractor/assign_labor_pt1', $data);
		}
		
		function assignLabourPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clab_no = $this->uri->segment(3);
				
				$data['allCountries'] = $this->ModelLabour->getAllCountries();
				$data['allRaces'] = $this->ModelLabour->getAllRaces();
				
				$ctr = $this->ModelContractor->getCtrByClabNo($clab_no);
				$data['ctr_comp_name'] = $ctr->ctr_comp_name;
				$data['ctr_clab_no'] = $ctr->ctr_clab_no;
				
				$this->load->view('contractor/assign_labor_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function assignLabourPt2Search(){
			$data['ctr_comp_name'] = $_POST['ctr_comp_name'];
			$data['ctr_clab_no'] = $_POST['ctr_clab_no'];
			$searchby = $_POST['searchby'];
			$keyword = $_POST['txtkeyword'];
			
			$nameGroup = "";
			$passnoGroup = "";
			
			if($searchby == "wkr_name") $nameGroup = $keyword;
			else if($searchby == "wkr_passno") $passnoGroup = $keyword;
			else{
				//blank else
			}
			
			$searchQuery = "SELECT workers.*, mst_countries.*, mst_wkr_availability.*  FROM workers
							LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
							LEFT JOIN mst_wkr_availability ON mst_wkr_availability.avlab_id = workers.wkr_transtatus";
			
			if(strlen($nameGroup)>0) {
				$nameChunks = explode(",", $nameGroup);
				$totalNameChunks = count($nameChunks);
				$searchQuery .= " WHERE wkr_name LIKE '%$nameChunks[0]%'";
				for($i=1;$i<$totalNameChunks;$i++){
					$searchQuery .= " OR wkr_name LIKE '%" . trim($nameChunks[$i]) . "%'";
				}	
			}
			else if(strlen($passnoGroup)>0){
				$passnoChunks = explode(",", $passnoGroup);
				$totalPassNoChunks = count($passnoChunks);		
				
				$searchQuery .= " WHERE wkr_passno IN ('" . trim($passnoChunks[0]) . "'";
				for($j=1;$j<$totalPassNoChunks;$j++){
					$searchQuery .= ", '" . trim($passnoChunks[$j]) . "'";	
				}
				$searchQuery .= ")";
			}
			else{
				$searchQuery .= " LIMIT 20";
			}
			
			//echo $searchQuery;
			$data['wkrRecord'] = $this->db->query($searchQuery);
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allRaces'] = $this->ModelLabour->getAllRaces();
			
			$this->load->view('contractor/assign_labor_pt2', $data);
		}
		
		function assignLaborSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$ctr_comp_name = $_POST['ctr_comp_name'];
				$ctr_clab_no = $_POST['ctr_clab_no'];
				$assignedby = $this->session->userdata('emp_id');
				$status = '1';	//1-active
				$transtatus = '7';	//7-hired
				
				//get the checked value
				$workers = $_POST['workers'];
				
				$successfulAssigned = "";
				foreach($workers as $wkr_id){
					$assignWorkerQuery = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate) VALUES
										  ($wkr_id, '$ctr_clab_no', 'own recruitment', NOW(), 1, $assignedby, NOW());";
					
					$updateCurrentEmpQuery = "UPDATE workers SET wkr_currentemp = '$ctr_clab_no',
											   wkr_status = '$status', wkr_transtatus = '$transtatus'
											   WHERE wkr_id = $wkr_id; ";
					/**********START TRANSACTION**********/
						$this->db->trans_begin();
						$this->db->query($assignWorkerQuery);
						$this->db->query($updateCurrentEmpQuery);
						
						if ($this->db->trans_status() === FALSE)
						{
						    $this->db->trans_rollback();
						}
						else
						{
						    $this->db->trans_commit();
						    $successfulAssigned .= $wkr_id . "<br />";
						}
					/****************END MANUAL TRANSACTION****************/
				}
				 
				$data['ctr_comp_name'] = $ctr_comp_name;
				$data['ctr_clab_no'] = $ctr_clab_no;
				$data['successfulAssigned'] = "<font color=\"red\">The following workers are successfully assigned to this company.</font> <br />" . $successfulAssigned;
				    
				$this->load->view('contractor/assign_labor_pt2', $data);	
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function searchContractors(){
			if(isset($_POST['searchby'])){
				$searchby = $_POST['searchby'];
				$keyword = trim($_POST['keyword']); 
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
					
				if($searchby == "ctr_clabexp_date" || $searchby == "ctr_cidbexp_date")	{
					$keyword = date('Y-m-d', strtotime($keyword));
				}
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');
				
				if($searchby == "ctr_clabexp_date" || $searchby == "ctr_cidbexp_date")	{
					$keyword = date('Y-m-d', strtotime($keyword));
				}
			}
			
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "contractors");
		    $grid->db->join("mst_ctr_appstatus","contractors.ctr_appstatus=mst_ctr_appstatus.appstatus_id","LEFT");
		    $grid->db->join("mst_emp_status","contractors.ctr_status=mst_emp_status.emp_statusid","LEFT");
		    if($searchby == "ctr_clabexp_date" || $searchby == "ctr_cidbexp_date")	{
		    	$grid->db->where("$searchby = '$keyword'");
			}
			else{
				$grid->db->where("$searchby LIKE '%$keyword%'");
	    	}
		    $grid->db->order_by("ctr_clab_no", "DESC");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
			$grid->column("CLAB NO","<callback_displayuri><#ctr_clab_no#></callback_displayuri>");
			$grid->column("COMPANY","ctr_comp_name");
			$grid->column("GRADE","ctr_grade");
			$grid->column("STATUS","emp_status_desc");
			$grid->column("TELEPHONE","ctr_telno");
			$grid->column("CLAB EXPIRY DATE","<callback_displaydate><#ctr_clabexp_date#></callback_displaydate>");
			$grid->column("CIDB EXPIRY DATE","<callback_displaydate><#ctr_cidbexp_date#></callback_displaydate>");
			$grid->column("REG. STATUS","appstatus_desc");
			
			$baseuri = "contContractor";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
			
		    // load the view
		    $this->load->view('contractor/contractor_lists', $data);	
		}
		
		function printApproveRejLetter(){
			$clabno = $this->uri->segment(3);
			
			$ctr = $this->ModelContractor->getCtrByClabNo($clabno);
			$data['ctr'] = $ctr;
			
			if($ctr->ctr_approve == "1"){
				$periodreg = $ctr->ctr_periodreg;
				if($periodreg == "3") $txtAmount = "<u>Fifty Only</u>(<u>RM 50.00</u>) for <u>three(3)</u> years.";
				else if($periodreg == "2") $txtAmount = "<u>Forty Only</u>(<u>RM 40.00</u>) for <u>two(2)</u> years.";
				else $txtAmount = "<u>Twenty Only</u>(<u>RM 20.00</u>) for <u>one(1)</u> years.";
				
				$data['txtAmount'] = $txtAmount;
				$this->load->view('contractor/ctr_print_approve', $data);	
			}
			else if($ctr->ctr_reject == "1"){
				$this->load->view('contractor/ctr_print_reject', $data);
			}
			else{
				$data['errorMsg'] = "This application is still under processing. Wating for approval.";
				$this->load->view('contractor/ctr_print_errorpage', $data);
			}
		}
		
		function printOPR1(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_opr1', $data);
		}
		
		//renewal reminder letter
		function printRegisRenewal(){
			$clabno = $this->uri->segment(3);
			$reminderType = $this->uri->segment(4);
			
			if($reminderType == "3") $reminderTypeTitle = "First Reminder";
			else if($reminderType == "2") $reminderTypeTitle = "Second Reminder";
			else if($reminderType == "1") $reminderTypeTitle = "Final Reminder";
			else $reminderTypeTitle = "";
			
			$data['reminderTypeTitle'] = $reminderTypeTitle;
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_regisRenewal', $data);
		}
		
		//registration renewal confirmation letter
		function printRenewal(){
			$clabno = $this->uri->segment(3);
			$ctr = $this->ModelContractor->getCtrByClabNo($clabno);
			$data['ctr'] = $ctr;
			
			$periodreg = $ctr->ctr_periodreg;
			if($periodreg == "3") $txtAmount = "<u>Fifty Only</u>(<u>RM 50.00</u>) for <u>three(3)</u> years.";
			else if($periodreg == "2") $txtAmount = "<u>Forty Only</u>(<u>RM 40.00</u>) for <u>two(2)</u> years.";
			else $txtAmount = "<u>Twenty Only</u>(<u>RM 20.00</u>) for <u>one(1)</u> years.";
				
			$data['txtAmount'] = $txtAmount;
				
			$this->load->view('contractor/ctr_print_renewal', $data);
		}
		
		function printCert(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_certificate', $data);
		}
		
		function printVDR(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_agreement_vdr', $data);
		}
		
		function printExt(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_agreement_ext', $data);
		}
		
		function printTransferApp(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			$avlabDetails = $this->ModelContractor->getAvlabDetails($clabno);
			if($avlabDetails->num_rows() > 0){
				$avlabRow = $avlabDetails->row();
				$data['avlabRow'] = $avlabRow;
				$data['avlabWkrDetails'] = $this->ModelContractor->getAvlabWkrDetails($avlabRow->avlab_ref_no);
				$this->load->view('contractor/ctr_print_transfer_app', $data);
			}
			else{
				$data['errorMsg'] = "No local transfer application has been made under this company.";
				$this->load->view('contractor/ctr_print_errorpage', $data);
			}
		}
		
		function printValidateWorkers(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_validate_wkr', $data);
		}
		
		function printTransferValidate(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			$avlabDetails = $this->ModelContractor->getAvlabDetails($clabno);
			if($avlabDetails->num_rows() > 0){
				$avlabRow = $avlabDetails->row();
				$data['avlabRow'] = $avlabRow;
				$data['avlabWkrDetails'] = $this->ModelContractor->getAvlabWkrDetails($avlabRow->avlab_ref_no);
				$this->load->view('contractor/ctr_print_transfer_valid', $data);
			}
			else{
				$data['errorMsg'] = "No local transfer application has been made under this company.";
				$this->load->view('contractor/ctr_print_errorpage', $data);
			}
		}
		
		function printLetterMain(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_main', $data);
		}
		
		function printRenewalForm(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/ctr_print_renewalform.php', $data);
		}
		
		function changeCtrStatus(){
			$this->load->view('contractor/change_status_pt1');
		}
		
		function changeCtrStatusSearch(){
			$searchby = $_POST['searchby'];
			$keyword = trim($_POST['txtkeyword']);
			
			$data['ctrRecord'] = $this->ModelContractor->searchContractors($searchby, $keyword,0,0);
			
			$this->load->view('contractor/change_status_pt1', $data);
		}
		
		function changeCtrStatusPt2(){
			$clabno = $this->uri->segment(3);
			$data['ctrStatus'] = $this->ModelContractor->getAllCtrStatus();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/change_status_pt2', $data);
		}
		
		function changeCtrStatusPt2Submit(){
			$oldstatus = $_POST['oldstatus'];
			$newstatus = $_POST['selStatus'];
			$reason = $_POST['txtreason'];
			$clabno = $_POST['clabno'];
			$changeby = $this->session->userdata('username');
			
			$sqlQuery = "UPDATE contractors SET ctr_status = '$newstatus' WHERE ctr_clab_no = '$clabno'";
			$this->db->query($sqlQuery);
			
			$sqlQuery2 = "INSERT INTO ctr_changestatus_history (status_clab_no, status_oldstatus, status_newstatus, status_changereason, status_changeby, status_changedate) 
			             VALUES ('$clabno', '$oldstatus', '$newstatus', '$reason', '$changeby', NOW())";
			$this->db->query($sqlQuery2);
			
			$data['successMsg'] = "<font color=\"red\"><strong>The contractor status has been updated.</strong></font>";
			
			$data['ctrStatus'] = $this->ModelContractor->getAllCtrStatus();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('contractor/change_status_pt2', $data);
		}
		
		function paymentForm(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clabno = $this->uri->segment(3);
				
				$data['paymentHistory'] = $this->ModelContractor->getPreviousPayments($clabno);
				$data['clabno'] = $clabno;
				$data['comp_name'] = $this->ModelContractor->getCtrNameByClabNo($clabno);
				
				$this->load->view('contractor/ctr_payment', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function paymentSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clabno = $_POST['txtclabno'];
				$compname = $_POST['txtcompname'];
				$periodreg = $_POST['periodreg'];
				
				$amount = trim($_POST['amount']);
				if($amount == '') $amount = 0;
				
				$paymentmode = $_POST['paymentmode'];
				
				$chequeno = trim($_POST['chequeno']);
				$paymentdate = trim($_POST['paymentdate']);
				if($paymentdate == '') $paymentdate = '0000-00-00';
				else $paymentdate = date('Y-m-d', strtotime($paymentdate));
				
				if($paymentmode == '1') {
					$cashdate = $paymentdate; 
					$chequedate="0000-00-00";
				}
				else{
					$cashdate = "0000-00-00"; 
					$chequedate = $paymentdate;
				}
				
				if($periodreg == '1') $clabExpDate = date('Y-m-d', strtotime('+1 year', strtotime($paymentdate)));
				else if($periodreg == '2') $clabExpDate = date('Y-m-d', strtotime('+2 year', strtotime($paymentdate)));
				else if($periodreg == '3') $clabExpDate = date('Y-m-d', strtotime('+3 year', strtotime($paymentdate)));
				else{	
				}
				
				//requirement requested on 2-Nov-2009 that expiry date shud be one day before the payment date of next year
				$clabExpDate = date('Y-m-d', strtotime('-1 day', strtotime($clabExpDate)));
				
				$enteredby = $this->session->userdata('username');
				$entereddate = date('Y-m-d');
				
				$paymentid = $this->ModelContractor->getNextPaymentID();
				$paymentQuery = "INSERT INTO ctr_payment (pay_id, pay_ctr_id, pay_periodreg, pay_amount, pay_type, pay_date, pay_chequeno, pay_recvby, pay_recvdate) 
				                 VALUES ($paymentid, '$clabno', '$periodreg', $amount, '$paymentmode', '$paymentdate', '$chequeno', '$enteredby', '$entereddate')";
				
				$updateCtrQuery = "UPDATE contractors SET
									ctr_periodreg = '$periodreg',
									ctr_mbramount = $amount,
									ctr_paymentype = '$paymentmode',
									ctr_cshdate = '$cashdate',
									ctr_chqno = '$chequeno',
									ctr_chqdate = '$chequedate',
									ctr_recvby = '$enteredby',
									ctr_recvdate = '$entereddate',
									ctr_clabexp_date = '$clabExpDate'
									WHERE ctr_clab_no = '$clabno'";                 			
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				
				$this->db->query($updateCtrQuery);
				$this->db->query($paymentQuery);
	
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				
				//data for display purpose
				$data['paymentHistory'] = $this->ModelContractor->getPreviousPayments($clabno);
				$data['clabno'] = $clabno;
				$data['comp_name'] = $compname;
				$data['successMsg'] = "New payment added!";
				
				$this->load->view('contractor/ctr_payment', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function viewExpiryLetter(){
			$fieldname = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$clabNo = $this->uri->segment(5);	
			
			$data['expiredWorkersRecord'] = $this->ModelContractor->listExpiryByCompany($fieldname, $noOfMonths, 'listOfWorkers', $clabNo);
			//echo $expiredWorkersRecord->num_rows();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabNo);
			$data['fieldname'] = $fieldname;
			
			if($fieldname == 'wkr_permitexp'){
				$data['titleWord'] = 'PERMIT';
				$data['fieldTitle'] = "Permit Expiry";
				$data['secondaryFieldTitle'] = "Passport Expiry";
			}
			else if($fieldname == 'wkr_passexp'){
				$data['titleWord'] = 'PASSPORT';
				$data['fieldTitle'] = "Passport Expiry";
				$data['secondaryFieldTitle'] = "Permit Expiry";
			}
			else{
			}
			
			if($noOfMonths == '3'){
				$data['reminderType'] = "First Reminder";
				$this->load->view('contractor/ctr_print_plksexp', $data);	
			}
			else if($noOfMonths == '2'){
				$data['reminderType'] = "Second Reminder";
				$this->load->view('contractor/ctr_print_plksexp_reminder', $data);	
			}
			else if($noOfMonths == '1'){
				$data['reminderType'] = "Third Reminder";
				$this->load->view('contractor/ctr_print_plksexp_reminder', $data);	
			}
			else if($noOfMonths == '0.5'){
				$data['reminderType'] = "Final Reminder";
				$this->load->view('contractor/ctr_print_plksexp_finalremind', $data);	
			}
			else if($noOfMonths == '-1'){
				$data['reminderType'] = "Warning";
				$this->load->view('contractor/ctr_print_plksexp_warning', $data);	
			}
			else{
				//do nothing	
			}
		}
		
		
		function viewExpiryLetter4(){
			$fieldname = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$clabNo = $this->uri->segment(5);	
			
			$data['expiredWorkersRecord'] = $this->ModelContractor->listExpiryByCompany5($fieldname, $noOfMonths, 'listOfWorkers', $clabNo);
			//echo $expiredWorkersRecord->num_rows();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabNo);
			$data['fieldname'] = $fieldname;
			
			if($fieldname == 'wkr_permitexp'){
				$data['titleWord'] = 'PERMIT';
				$data['fieldTitle'] = "Permit Expiry";
				$data['secondaryFieldTitle'] = "Passport Expiry";
			}
			else if($fieldname == 'wkr_passexp'){
				$data['titleWord'] = 'PASSPORT';
				$data['fieldTitle'] = "Passport Expiry";
				$data['secondaryFieldTitle'] = "Permit Expiry";
			}
			else{
			}
			
			if($noOfMonths == '3'){
				$data['reminderType'] = "First Reminder";
				$this->load->view('contractor/ctr_print_plksexp', $data);	
			}
			else if($noOfMonths == '2'){
				$data['reminderType'] = "Second Reminder";
				$this->load->view('contractor/ctr_print_plksexp_reminder', $data);	
			}
			else if($noOfMonths == '1'){
				$data['reminderType'] = "Third Reminder";
				$this->load->view('contractor/ctr_print_plksexp_reminder', $data);	
			}
			else if($noOfMonths == '0.5'){
				$data['reminderType'] = "Final Reminder";
				$this->load->view('contractor/ctr_print_plksexp_finalremind', $data);	
			}
			else if($noOfMonths == '-1'){
				$data['reminderType'] = "Warning";
				$this->load->view('contractor/ctr_print_plksexp_warning', $data);	
			}
			else{
				//do nothing	
			}
		}
		
		//basically this function is the same with the above viewExpiryLetter
		function printExpiryLetter(){
			$fieldname = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$clabNo = $this->uri->segment(5);	
			
			$data['expiredWorkersRecord'] = $this->ModelContractor->listExpiryByCompany($fieldname, $noOfMonths, 'listOfWorkers', $clabNo);
			//echo $expiredWorkersRecord->num_rows();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabNo);
			$data['fieldname'] = $fieldname;
			
			if($fieldname == 'wkr_permitexp'){
				$data['titleWord'] = 'PERMIT';
				$data['fieldTitle'] = "Permit Expiry";
				$data['secondaryFieldTitle'] = "Passport Expiry";
			}
			else if($fieldname == 'wkr_passexp'){
				$data['titleWord'] = 'PASSPORT';
				$data['fieldTitle'] = "Passport Expiry";
				$data['secondaryFieldTitle'] = "Permit Expiry";
			}
			else{
			}
			
			if($noOfMonths == '3'){
				$data['reminderType'] = "First Reminder";
			}
			else if($noOfMonths == '2'){
				$data['reminderType'] = "Second Reminder";
			}
			else if($noOfMonths == '1'){
				$data['reminderType'] = "Third Reminder";
			}
			else if($noOfMonths == '0.5'){
				$data['reminderType'] = "Final Reminder";
			}
			else if($noOfMonths == '-1'){
				$data['reminderType'] = "Warning";
			}
			else{
				//do nothing	
			}
			
			//save to database, mark as printed
			$isAlreadyPrinted = $this->ModelContractor->checkExistingPrintRecord($clabNo, $noOfMonths, $fieldname);
			if($isAlreadyPrinted->num_rows() == 0){
				$nextprintID = $this->ModelContractor->getNextPrintLetterID();
				$currentuserid = $this->session->userdata('emp_id');
				
				$docType = $fieldname;
				$docDuration = $noOfMonths;
				$printedQuery = "INSERT INTO ctr_printletter_history (print_id, print_ctr_clabno, print_date, print_by, print_doctype, print_docduration) 
								VALUES ($nextprintID, '$clabNo', NOW(), $currentuserid, '$docType', $docDuration);";
				$this->db->query($printedQuery);
			}			
			$data['printMsg'] = " onload=\"window.print();\"";
			$this->load->view('contractor/ctr_print_plksexp', $data);	
		}
		
		
		//basically this function is the same with the above viewExpiryLetter
		function printExpiryLetter4(){
			$fieldname = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$clabNo = $this->uri->segment(5);	
			
			$data['expiredWorkersRecord'] = $this->ModelContractor->listExpiryByCompany5($fieldname, $noOfMonths, 'listOfWorkers', $clabNo);
			//echo $expiredWorkersRecord->num_rows();
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabNo);
			$data['fieldname'] = $fieldname;
			
			if($fieldname == 'wkr_permitexp'){
				$data['titleWord'] = 'PERMIT';
				$data['fieldTitle'] = "Permit Expiry";
				$data['secondaryFieldTitle'] = "Passport Expiry";
			}
			else if($fieldname == 'wkr_passexp'){
				$data['titleWord'] = 'PASSPORT';
				$data['fieldTitle'] = "Passport Expiry";
				$data['secondaryFieldTitle'] = "Permit Expiry";
			}
			else{
			}
			
			if($noOfMonths == '3'){
				$data['reminderType'] = "First Reminder";
			}
			else if($noOfMonths == '2'){
				$data['reminderType'] = "Second Reminder";
			}
			else if($noOfMonths == '1'){
				$data['reminderType'] = "Third Reminder";
			}
			else if($noOfMonths == '0.5'){
				$data['reminderType'] = "Final Reminder";
			}
			else if($noOfMonths == '-1'){
				$data['reminderType'] = "Warning";
			}
			else{
				//do nothing	
			}
			
			//save to database, mark as printed
			$isAlreadyPrinted = $this->ModelContractor->checkExistingPrintRecord($clabNo, $noOfMonths, $fieldname);
			if($isAlreadyPrinted->num_rows() == 0){
				$nextprintID = $this->ModelContractor->getNextPrintLetterID();
				$currentuserid = $this->session->userdata('emp_id');
				
				$docType = $fieldname;
				$docDuration = $noOfMonths;
				$printedQuery = "INSERT INTO ctr_printletter_history (print_id, print_ctr_clabno, print_date, print_by, print_doctype, print_docduration) 
								VALUES ($nextprintID, '$clabNo', NOW(), $currentuserid, '$docType', $docDuration);";
				$this->db->query($printedQuery);
			}			
			$data['printMsg'] = " onload=\"window.print();\"";
			$this->load->view('contractor/ctr_print_plksexp_warning', $data);	
		}
		
		
		
		
		
		function viewListOfLabours(){
			$clabno = $this->uri->segment(3);
			
			$data['companyname'] = $this->ModelContractor->getCtrNameByClabNo($clabno);
			$data['listofLabours'] = $this->ModelContractor->getLabourListByCompany($clabno);
			
			$this->load->view('contractor/ctr_listofLabours', $data);	
		}
		
		function deleteUploadedFile(){
			$upload_id = $this->uri->segment(3);
			$ctr_id = $this->uri->segment(4);
			$filepath = $this->ModelContractor->getFilePathByUploadID($upload_id, 'att_desturl');
			
			$myFile = "./" . $filepath;
			if (file_exists($myFile)) {
				unlink($myFile);
			}
			
			$deleteQuery = "DELETE FROM ctr_attachdoc WHERE att_id =  $upload_id";
			$this->db->query($deleteQuery);
			
			redirect('contContractor/regisAttachDoc/' . $ctr_id . '/delete');
		}
		
		function testPatternMatching(){
			$filename = "CLAB000001-1.jpg";
			
			if(preg_match("/^CLAB[0-9]{6}[\-][0-9]{1,}[\.][jpg]/", $filename)){
				echo "matched!";
			}
			else{
				echo "not matched!";
			}
		}
		
		function getSimplifieFilesFormat(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistContAttDoc.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "SpecialPass";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				
				$dataChunks = explode("  ", $line);
				//echo "<br />Total" . count($dataChunks) . "<br />";
				for($i=0;$i<count($dataChunks);$i++){
					$data = trim($dataChunks[$i]);
					//echo "<br />" . $data;
					if(preg_match("/^CLAB[0-9]{6}[\-][0-9]{1,}[\.][jpg]/", $data)){
						echo $data . "<br />";
					}
					else{
						//echo "not matched!";
					}
				}
			}
		}
		
		function getCtrUploadScript(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistContAttDoc_simplified.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "SpecialPass";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("-", $line);
				$clabNo = $dataChunks[0];
				$desturl = "uploads/contractors/" . $clabNo . "/" . $line;	
				
				$sqlQuery .= "INSERT INTO ctr_attachdoc (att_id, att_ctr_id, att_filetype, att_org_filename, att_dest_filename, att_desturl, att_uploadby, att_uploaddate) 
							  VALUES(NULL, '$clabNo', '', '$line', '$line', '$desturl', 1, NOW());" . "<br />";
				
			}
			
			echo $sqlQuery;
		}
		
		function ctrStatusHistory(){
			$clabNo = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabNo);
			$data['statusHistory'] = $this->ModelContractor->getCtrStatusHistory($clabNo);
			
			$this->load->view('contractor/change_status_history', $data);
		}
		
		function listFifthYearLetter(){
			$noOfMonths = $this->uri->segment(3);
			$data['noOfMonths'] = $noOfMonths;
			$data['title'] = "List of Companies (FCL fifth year letter due in " . $noOfMonths . " months)";
			
			$this->load->view('contractor/ctr_listby_fifthyr', $data);	
		}
		
		function printFifthYearLetter(){
			$this->load->view('contractor/ctr_print_fifthyr');	
		}
	}
?>