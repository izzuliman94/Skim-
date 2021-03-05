<?php
	class ContSpimFirst extends Controller{
		function ContSpimFirst(){
			parent::Controller();
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->Model('ModelSpimFirst');	
			$this->load->Model('ModelLabour');
			
		}
		
		function email_item(){
				
		$wono = $this->uri->segment(3);
		    $data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);
			$msg = $this->load->view('spim/email_items', $data);
		
		}
		
		function Send_Report(){
			$wono = $this->uri->segment(3);
			$uname=$this->uri->segment(4);
			$currentuser = $this->session->userdata('username');
			$data['woUnderCurrentUser'] = $this->ModelSpim->getWoUnderCurrentUser($currentuser);
		   // $data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
           // $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);	
			$msg = $this->load->view('spim/spim_monitor', $data, true);
				
			//$sqlQuery = "SELECT employees.emp_email as emails
			//            FROM workorders 
			//			left join employees on employees.emp_username = workorders.wo_personincharge
			//			WHERE workorders.wo_spim_status = 'R' and workorders.wo_id = $wono";
			
			$uname=$this->session->userdata('username');
			
			$sqlQuery = "SELECT employees.emp_email as emails
			FROM employees 
			WHERE employees.emp_username = '$uname'";
						
			$mailRecord = $this->db->query($sqlQuery);
			$mailRow = $mailRecord->row();
			//return $mailRow->emails;
				
			//print_r ($mailRow->emails);
			//var_dump ($mailRow,3);
			//echo ($mailRow,1);
		 	$this->load->library('email');
			//$this->email->from($mailRow->emails, 'CLAB');
			$this->email->from('skim@clab.com.my', 'CLAB');
			//$this->email->to('redzuan@clab.com.my');
            $this->email->to('akmar@clab.com.my , faizal@clab.com.my , hartini@clab.com.my');
			$this->email->cc('rafik@clab.com.my , rozaini@clab.com.my , razalitc@clab.com.my');
			$this->email->bcc($mailRow->emails);
            
			$this->email->subject('Auto Generated VDR Report');
            $this->email->message($msg);

			$this->email->send();
            echo "<table width='100%'>
			      <tr align='center'>
				  <td> Your message has been successfully sent...a copy has been sent to $mailRow->emails</td> 
				  </tr>
				  </table>";
			
			//echo $this->email->print_debugger();
		}
		
		
		function Insurance_purchase(){
			$wono = $this->uri->segment(3);
			$uname=$this->uri->segment(4);
		    $data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);	
			$msg = $this->load->view('spim/email_items', $data, true);
				
			//$sqlQuery = "SELECT employees.emp_email as emails
			//            FROM workorders 
			//			left join employees on employees.emp_username = workorders.wo_personincharge
			//			WHERE workorders.wo_spim_status = 'R' and workorders.wo_id = $wono";
			
			$uname=$this->session->userdata('username');
			
			$sqlQuery = "SELECT employees.emp_email as emails
			FROM employees 
			WHERE employees.emp_username = '$uname'";
						
			$mailRecord = $this->db->query($sqlQuery);
			$mailRow = $mailRecord->row();
			//return $mailRow->emails;
				
			//print_r ($mailRow->emails);
			//var_dump ($mailRow,3);
			//echo ($mailRow,1);
		 	$this->load->library('email');
			$this->email->from($mailRow->emails, 'CLAB');
            $this->email->to('lonpac@clab.com.my , maliah@clab.com.my');
			$this->email->cc('nieza@clab.com.my , hayati@clab.com.my');
			$this->email->bcc($mailRow->emails);
            
			$this->email->subject('NEW VDR  IG, FWHS & FWCS - Insurance Purchase');
            $this->email->message($msg);
            $this->email->send();
            echo "<table width='100%'>
			      <tr align='center'>
				  <td> Your message has been successfully sent...a copy has been sent to $mailRow->emails</td> 
				  </tr>
				  </table>";
			
			//echo $this->email->print_debugger();
		}
		function Insurance_purchases(){
			$wono = $this->uri->segment(3);
		    $data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);
			$msg = $this->load->view('spim/email_items', $data, true);
           			
			
		 	$this->load->library('email');
            $this->email->from('skim@clab.com.my', 'CLAB');
            $this->email->to('lonpac@clab.com.my , maliah@clab.com.my');
			$this->email->cc('nieza@clab.com.my , hayati@clab.com.my ');
			$this->email->bcc('redzuan@clab.com.my');
			
            $this->email->subject(' VDR - Insurance Purchase');
           $this->email->message($msg);
            $this->email->send();
            echo "<table width='100%'>
			      <tr align='center'>
				  <td>Your message has been successfully sent...</td>
				  </tr>
				  </table>";
			
			//echo $this->email->print_debugger();
		}
		
		function listAllApproval(){
		   $data["ApprovalList"] = $this->ModelSpim->getApprovalList();
		   $this->load->view('spim/approvallist',$data);	 
		}
		
		function getcountry(){
		   $frm = $this->uri->segment(3);
		   $data['countrylist'] = $this->ModelSpim->getAllCountry();
		     $data['form'] = $frm;
		   $this->load->view('spim/countrylist',$data);	 
		}
		
		function openreceipt(){
		   
		   $frm = $this->uri->segment(3);
		   $clabno = $this->uri->segment(4);
		   $data['receiptlist'] = $this->ModelSpimFirst->getAllReceipt($clabno);
		   $data['form'] = $frm;
	       $this->load->view('spimplks/receiptlist',$data);		   
		
		}
		
		function openprintform($fclid){
		//header('Content-type: application/pdf');
		//$this->load->view('spim/im12form.pdf');
		$data['im12'] = $this->ModelSpim->getFCLbyID($fclid);
		$this->load->view('spim/im12_indv',$data);		
		}
       
		function batchlistwo(){
		 
		 
		     $clabid = $this->uri->segment(3);
			 $data['clabno'] = $this->uri->segment(3);
			 $data['companyname'] = $this->uri->segment(4);
		/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "workorders");
		    //$grid->db->join("contractors","workorder.wo_clab_no = contractors.ctr_clab_no","LEFT");
		    //$grid->db->order_by("wo_id");
		    $grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    $grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    $grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    $grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    $grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    $grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			$grid->db->where("wo_clab_no ='$clabid' and wo_spim_status = 'V'");
		    $grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contSpim";
		 	$link_edit = anchor("$baseuri/viewwobatchapp/<#wo_id#>","<#wo_id#>");
			//$link_edit = "<#wo_id#>";		 	
		 	
			$grid->column("No.","$link_edit", 'width="50"');
			$grid->column("Workorder Number","wo_num");
			//$grid->column("COMPANY NAME","ctr_comp_name");
			//$grid->column("CLAB NO.","wo_clab_no");
			$grid->column("TOTAL FCL","wo_fcl_total");
			$grid->column("FCL Country", "cty_desc");
			$grid->column("DATE SUBMIT","<callback_displaydate><#wo_datesubmit#></callback_displaydate>");
			$grid->column("P IN CHARGE", "wo_personincharge");
			$grid->column("Workorder Type", "wo_isreplacement");
			
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('spim/batch_application_list', $data);
		
		}
		
			function viewwobatchapp(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				$data['successMsg'] = $this->uri->segment(4);
				
				$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpim->getAllCountries();
				$data['allAgencies'] = $this->ModelSpim->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpim->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpim->getAllFCLFiles($workorderid);
				
				$this->load->view('spim/view_wo_batch_app', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function regnewlabour(){
			
		$data['workorderid'] = $this->uri->segment(3);
		$wono=$data['workorderid'];
		//echo $wono;
		$data['companyname'] = $this->uri->segment(4);
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['lampiran'] = $this->ModelSpimFirst->getLampiranData($wono);
		$data['allWOTYPE'] = $this->ModelSpimFirst->getWOtype();
		$this->load->view('spimplks/reg_new_labour', $data);	
		$lamp=$data['lampiran'];
		//echo $lamp;
		
		//print_r ($lamp);
			//var_dump ($lamp,3);
			//echo ($mailRow,1);
		}
		
		function empfcl_list(){
		    
			$clabno = $this->uri->segment(3);
			
			//echo $clabno;
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
			$data['clabno'] = $clabno;
		   	$data['labour'] = $this->ModelSpimFirst->getAllLabor($searchdata,$clabno);
		    $this->load->view('spimplks/fcl_emp_list', $data);
		   
		}
		
		function EditFCL(){
		
		$data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
		$data['allWOTYPE'] = $this->ModelSpimFirst->getWOtype();
		//$data['allLabour'] = $this->ModelRenewal->getAllLabor();
		$id = $data['id'];
		$data['fcl'] = $this->ModelSpimFirst->getFCLbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimplks/edit_fcl', $data);
		
		}
		
		function regnewlegal(){
			
	    	$data['workorderid'] = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
		    $data['companyname'] = $this->uri->segment(6);
			$data['currentuser'] = $this->uri->segment(7);
			$data['wono'] = $this->uri->segment(8);
			
		$this->load->view('spim/reg_new_legal', $data);
		}
		
		
		
		
		
		function DeleteFCL(){
			
	    $data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$id = $data['id'];
		
		$sql = "delete from wo_fcl where fcl_id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "FCL was succesfully Delete.";        
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['strhide'] = "delete";
		$this->load->view('spim/edit_fcl', $data);
		}
		
		
		
		function lampiran_a(){
			
			$wono = $this->uri->segment(3);
			$data['lampiran'] = $this->ModelSpimFirst->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;
			//$data['cat'] = $this->ModelSpimFirst->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpimFirst->getLampiranFCLbyID($wono);
			$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
			
			$this->load->view('spimplks/lampiran_a', $data);
			
		}
		
		function lampiran_a_excel(){
			
			$wono = $this->uri->segment(3);
			$data['lampiran'] = $this->ModelSpimFirst->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;		
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpimFirst->getLampiranFCLbyID($wono);
			$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
			
			$this->load->view('spimplks/lampiran_a_excel', $data);
			
		}
		
		function lampiran_fwcms_csv(){
			
			$wono = $this->uri->segment(3);
			$data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;		
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($wono);
			
			$this->load->view('spim/lampiran_fwcms_csv', $data);
			
		}
		
		function second_schedule(){
			
			$wono = $this->uri->segment(3);
			//$data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);
			
			$this->load->view('spim/second_schedule', $data);
			
		}
		
		function im12(){
		   $wono = $this->uri->segment(3);
		   $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);			
		   $this->load->view('spim/im12', $data);
		}
		
		function addendum(){
		   $wono = $this->uri->segment(3);
		   $data['allFCLlampiran'] = $this->ModelSpim->getLampiranFCLbyID($wono);	
		   $data['woRow'] = $this->ModelSpim->getWObyWOid($wono);		
		   $this->load->view('spim/addendum2', $data);
		}
		
	    function borangbayaran(){
		   $wono = $this->uri->segment(3);
		   $data['lampiran'] = $this->ModelSpimFirst->getLampiranData($wono);
		   $data['TotalFCL'] = $this->ModelSpimFirst->getTotalFCL($wono);	
		   $data['allFCLlampiran'] = $this->ModelSpimFirst->getLampiranFCLbyID($wono);			
		   $this->load->view('spimplks/borang_bayaran', $data);
		}
		
		function acknowledge(){
		   $wono = $this->uri->segment(3);
		   $data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
		   $this->load->view('spimplks/acknowledge', $data);
		}
		
		
		function SaveEditFCL(){
		
		$id = $_POST["txtid"];
		$workorderid = $_POST["txtwoid"];
		$companyname = $_POST["txtcompname"];
		$passno = $_POST["txtpassno"];
		$newpassno = $_POST["txtnewpassno"];
		$name = $_POST["empname"];
		$add = $_POST["txtaddarea"];
		$dtpermitexp=date('Y-m-d', strtotime($_POST["datepermitexp"]));
		$dtpermitexp2=date('Y-m-d', strtotime($_POST["datepermitexp2"]));
		//$gender = $_POST["txtgender"]; 
		$yearrenewal = $_POST["txtyren"];
		$dob=date('Y-m-d', strtotime($_POST["txtdob"]));
		//$birthplace = $_POST["txtpof"];
		$nationality = $_POST["txtnationality"];
		$gender = $_POST["txtgender"];
		if(isset($_POST["txtpermitno"])){
		   $permitno = $_POST["txtpermitno"];
		}else{
		   $permitno = "";
		}
		
		$passexp = date('Y-m-d', strtotime($_POST["txtpassexp"]));
		$wt = $_POST['txtworktrade'];
		$nok = $_POST['txtnok'];
		$relationship = $_POST['txtrelationship'];
		$wotype = $_POST["selwotype"];
		//$country = $_POST['selcountry'];
		if(isset($_POST["chkpass"])){
		$chkpass = $_POST["chkpass"];
		}else{
		$chkpass = '0';
		}
		if(isset($_POST["txtsalary"])){
		$salary = $_POST["txtsalary"];
		}else{    
		$salary = '0.00';
		}
			
		
		$sql = "update wo_fcl_1st set
		       	fcl_permitno = '$permitno',
				fcl_passno = '$passno',
				fcl_passexp = '$passexp',
				fcl_add = '$add',
				fcl_salary  = '$salary',
				fcl_wt = '$wt',
				fcl_next_of_kin = '$nok',
				fcl_relationship = '$relationship',
				fcl_year_renewal = '$yearrenewal',
				fcl_wo_type = '$wotype',
				fcl_pass = '$chkpass',
				fcl_name = ".$this->db->escape($name).",
				fcl_plksdate1 = '$dtpermitexp',
				fcl_plksdate2 = '$dtpermitexp2',
				fcl_dob = '$dob',
				fcl_gender = '$gender',
				fcl_nationality = '$nationality',
				fcl_newpassno = '$newpassno'
				where fcl_id = '$id'"; 
				
	
				
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "FCL was succesfully Update.";        
		$data['workorderid'] = $workorderid;
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['allWOTYPE'] = $this->ModelSpimFirst->getWOtype();
		//$data['allLabour'] = $this->ModelRenewal->getAllLabor();
		$data['companyname'] = $companyname;
		$data['id'] = $id;
		$data['fcl'] = $this->ModelSpimFirst->getFCLbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimplks/edit_fcl', $data);
		
		}
		
		
		
		
		function AddNewFCL(){
		
		$workorderid = $_POST["txtwoid"];
		$companyname = $_POST["txtcompname"];
		$passno = $_POST["txtpassno"];
		$newpassno = $_POST["txtnewpassno"];
		$yearrenew = $_POST["txtyren"];
		$name = $_POST["empname"]; 
		
		$dob  = date('Y-m-d', strtotime($_POST["txtdob"]));
		//$birthplace = $_POST["txtpof"];
		//$nationality = $_POST["selnationality"];
		$gender = $_POST["txtgender"];
		$permitno = $_POST["txtpermitno"];
		$add = $_POST["txtaddarea"];
		$passexp = date('Y-m-d', strtotime($_POST["txtpassexp"]));
		$wt = $_POST['txtworktrade'];
		$nok = $_POST['txtnok'];
		$relationship = $_POST['txtrelationship'];
		$wotype = $_POST["selwotype"];
		$nationality = $_POST["txtnationality"];
		$country = $_POST['txtcountry'];
		if(isset($_POST["chkpass"])){
		$chkpass = $_POST["chkpass"];
		}else{
		$chkpass = '0';
		}
		if(isset($_POST["txtsalary"])){
		$salary = '0.00';
		}else{    
		$salary = $_POST["txtsalary"];
		}
		
		
		$data['workorderid'] = $workorderid;
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
		$data['companyname'] = $companyname;
		$data['allWOTYPE'] = $this->ModelSpimFirst->getWOtype();
		//$data['allLabour'] = $this->ModelRenewal->getAllLabor();	
		
		$sql = "insert into wo_fcl_1st
		        (fcl_woid,fcl_passno,fcl_permitno,fcl_add,fcl_passexp,fcl_salary,fcl_wt,fcl_next_of_kin,
				fcl_relationship,fcl_year_renewal,fcl_wo_type,fcl_pass,fcl_name,fcl_nationality,fcl_newpassno,fcl_dob,fcl_gender,wkr_country)
                values
                ('$workorderid','$passno','$permitno','$add','$passexp','$salary','$wt','$nok','$relationship','$yearrenew',			 '$wotype','$chkpass',".$this->db->escape($name).",'$nationality','$newpassno','$dob','$gender','$country')"; 
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
        $this->load->view('spimplks/reg_new_labour', $data);	
		
		}
		
		function AddNewLegal(){
		
		  $wono = $_POST["txtwono"];
		  $workorderid = $_POST["txtwoid"];
	   	  $companyname = $_POST["txtcompname"];
		  $initial = $_POST["txtcurrentuser"];
		  $refno = $_POST["txtrefno"];
		  $legaldate =  date('Y-m-d', strtotime($_POST["txtdate"]));
		  $remarks = $_POST["txtremarks"];
		  $legalno =  "CLAB/LEGAL/".$companyname."/".$workorderid."/".$initial;
		  
		  $sql = "insert into wo_aggrement
		          (wo_agg_no,wo_agg_ref_no,wo_agg_date,wo_agg_remarks,wo_no)
				  values
				  ('$legalno','$refno','$legaldate','$remarks','$wono')";
				  
		  $this->db->trans_begin();
		  $this->db->query($sql);	
          $this->db->trans_commit();
		  
		  $data['workorderid'] = $workorderid;
		  $data['companyname'] = $companyname;
		  $data['currentuser'] = $initial;
		  $data['wono'] = $wono;
		  $data['successMsg'] = "New Legal was succesfully added. You may insert another legal now.";
        
		  $this->load->view('spim/reg_new_legal', $data);			  
		  
			
		}
		
		
		
	/*	function form_new_labour(){
		    $data['passportNo'] = $this->uri->segment(3);   
			$data['workorderid'] = $this->uri->segment(4);
			$data['companyname'] = $this->uri->segment(5);			
			$data['allStates'] = $this->ModelLabour->getAllStates();
			$data['allRaces'] = $this->ModelLabour->getAllRaces();
			$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade();
			
			$this->load->view('spim/form_labour', $data);
		}*/
		
		function spimDashbrd(){
			$data['overall'] = $this->ModelSpim->getWorkordersByStatus("overall", "sum");
			$data['closed'] = $this->ModelSpim->getWorkordersByStatus("closed", "sum");
			$data['open'] = $this->ModelSpim->getWorkordersByStatus("open", "sum");
			$data['received'] = $this->ModelSpim->getWorkordersByStatus("received by Operation", "sum");
			$data['processed'] = $this->ModelSpim->getWorkordersByStatus("processed by Operation", "sum");
			$data['submithr'] = $this->ModelSpim->getWorkordersByStatus("submit to HR", "sum");
			$data['receivehr'] = $this->ModelSpim->getWorkordersByStatus("receive by HR", "sum");
			$data['jim'] = $this->ModelSpim->getWorkordersByStatus("JIM acknowledgement", "sum");
			$data['receiveVisa'] = $this->ModelSpim->getWorkordersByStatus("receive calling visa", "sum");
			
			$data['lt14days'] = $this->ModelSpim->getWoByJIMAckDate("less14", "sum"); //need to correct the sql script
			$data['mt14days'] = $this->ModelSpim->getWoByJIMAckDate("more14", "sum");
			
			$currentuser = $this->session->userdata('username');
			$data['woUnderCurrentUser'] = $this->ModelSpim->getWoUnderCurrentUser($currentuser);
			
			$this->load->view('spim/spim_dashboard', $data);	
		}	
		
		function ListWO(){
					
			$currentuser = $this->session->userdata('username');
			$data['woUnderCurrentUser'] = $this->ModelSpim->getWoUnderCurrentUser($currentuser);
			
			$this->load->view('spim/spim_monitor', $data);	
		}	
		
		function handoverletter(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimFirst->getAllFCLFiles($workorderid);
			  $this->load->view('spimplks/handover_letter', $data);
		}
		
		// added by azh
		function confirmletter(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimFirst->getAllFCLFiles($workorderid);
		
			  $this->load->view('spimplks/confirm_letter', $data);
		}
		function printPLKSIP(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimFirst->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimFirst->getAllFCLFiles($workorderid);
		
			  $this->load->view('spimplks/plks_in_progress', $data);
		}
		
		function dashboardList(){
			$type = $this->uri->segment(3);
			
			if($type == "overall") {
				$hdr = "Overall Workorders";
				$progress = "overall";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "closed") {
				$hdr = "Total Workorders (closed)";
				$progress = "receive calling visa";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "open") {
				$hdr = "Total Workorders (open)";
				$progress = "open";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "totalreceived") {
				$hdr = "Total Workorders Received";
				$progress = "received by Operation";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "totalprocessed"){
				$hdr = "Total Workorders processed";
				$progress = "processed by Operation";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "submithr") {
				$hdr = "Total Workorders submit to Corporate Services";
				$progress = "submit to HR";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "receivehr") {
				$hdr = "Total Workorders receive by Corporate Services";
				$progress = "receive by HR";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else if($type == "JIM") {
				$hdr = "Total Workorders Submitted to JIM";
				$progress = "JIM acknowledgement";
				$data['woRecord'] = $this->ModelSpim->getWorkordersByStatus($progress, "record");
			}
			else{
			}
			
			if($type == "lessFourteen") {
				$hdr = "Workorders which sent to JIM <14 days";
				$progress = "less14";
				$data['woRecord'] = $this->ModelSpim->getWoByJIMAckDate($progress, "record");	
			}
			else if($type == "overFourteen") {
				$hdr = "Workorders which sent to JIM >14 days";
				$progress = "mt14days";
				$data['woRecord'] = $this->ModelSpim->getWoByJIMAckDate($progress, "record");
			}
			else{
				//dummy else
			}
			
			$data['hdr'] = $hdr;
			
			$this->load->view('spim/spim_dashboard_lists', $data);
		}
		
		function newWorkOrder(){
			$this->load->view('spim/new_workorder_pt1');	
		}
		
		function newWOSearchCtr(){
			$searchby = trim($_POST['searchby']);
			$keyword = trim($_POST['keyword']);
			
			$data['ctrRecord'] = $this->ModelSpim->searchCtr($searchby, $keyword);
			
			$this->load->view('spim/new_workorder_pt1', $data);
		}
		
		function newWorkOrderPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clabno = $this->uri->segment(4);
				$workorderid = $this->uri->segment(3);
				$ctrRecord = $this->ModelSpimFirst->getCtrByClabNo($clabno);//test
				//$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($workorderid);
				$data['ctrRow'] = $ctrRecord->row();
				$data['allCountries'] = $this->ModelSpimFirst->getAllCountries();
				$data['allAgencies'] = $this->ModelSpimFirst->getAllAgencies();
				
				$this->load->view('spimplks/new_workorder_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function newWorkOrderPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wo_id = $this->ModelSpimFirst->getNextWONumber();
				$wonum_firstpart = "0000" . $wo_id;
				$workorderno = substr($wonum_firstpart, -5) . "/" . date('m') . "/" . date('y');	//get the rightmost four digit
				$wo_date = date('Y-m-d', strtotime($_POST['dtsubmit']));
				/*if(isset($_POST['chkjtk'])) $wo_jtk_check = '1';
				else $wo_jtk_check = '0';*/
				//$wo_jtk_ref = $_POST['txtrefjtk'];
				//WORKORDER DETAILS
				$wo_clab_no = $_POST['txtclabno'];
				$wo_fcl_total = $_POST['txtfcltotal'];
				$wo_fcl_country = $_POST['selcountry'];
				$wo_fcl_sp = $_POST['selSP'];
				$wo_fcl_jimreceipt = $_POST['Imireceipt'];
				//Take out for renewal form
				/*$wo_agency = $_POST['selagency'];
				if(isset($_POST['chkisreplace'])) 
					$ = '1';
				else 
					$wo_isreplacement = '0';
				$wo_replace_date = $_POST['dtreplacement'];
					if($wo_replace_date != "") $wo_replace_date = date('Y-m-d', strtotime($wo_replace_date));
					else $wo_replace_date = '0000-00-00';
				$wo_replace_reason = $_POST['replacereason'];*/
				
				if(isset($_POST['iswithd'])) 
					$wo_iswithdrawal = '1';
				else 
					$wo_iswithdrawal = '0';
				/*$wo_withd_date = $_POST['dtwithd'];
					if($wo_withd_date != "") $wo_withd_date = date('Y-m-d', strtotime($wo_withd_date));
					else $wo_withd_date = "0000-00-00";*/
				//$wo_withd_reason = $_POST['reasonwithd'];
				$wo_personincharge = $_POST['txtPersonInCharge'];
				$wo_datesubmit = $_POST['dtsubmit'];
					if($wo_datesubmit != "") $wo_datesubmit = date('Y-m-d', strtotime($wo_datesubmit));
					else $wo_datesubmit = "0000-00-00";
				$wo_keyin_by = $_POST['txtkeyinby'];
				$wo_keyin_date = $_POST['dtkeyin'];
					if($wo_keyin_date != "") $wo_keyin_date = date('Y-m-d', strtotime($wo_keyin_date));
					else $wo_keyin_date = "0000-00-00";
				/*$wo_visa_date = $_POST['dtvisa'];
					if($wo_visa_date != "") $wo_visa_date = date('Y-m-d', strtotime($wo_visa_date));
					else $wo_visa_date = "0000-00-00";*/
				//$wo_yearrenew = $_POST["selyearrenew"];		
				$wo_sendername = $_POST["txtsendername"];	
				$wo_senderic = $_POST["txtsenderic"];
				$wo_senderctc = $_POST["txtsenderctc"];
				//REQUIRED DOCUMENTS
				
				if(isset($_POST['chkoripass'])) $wo_doc_oripass = '1';
				else $wo_doc_oripass = '0';
				$wo_doc_oripass_date = $_POST['dtoripass'];
				if($wo_doc_oripass_date != "") $wo_doc_oripass_date = date('Y-m-d', strtotime($wo_doc_oripass_date));
				else $wo_doc_oripass_date = '0000-00-00';
				
				if(isset($_POST['chkfomema'])) $wo_doc_fomema = '1';
				else $wo_doc_fomema = '0';
				$wo_doc_fomema_date = $_POST['dtfomema'];
				if($wo_doc_fomema_date != "") $wo_doc_fomema_date = date('Y-m-d', strtotime($wo_doc_fomema_date));
				else $wo_doc_fomema_date = '0000-00-00';
				
				//if(isset($_POST['chkappletter'])) $wo_doc_extplks = '1';
				//else $wo_doc_extplks = '0';
				//$wo_doc_extplks_date = $_POST['dtappletter'];
				//if($wo_doc_extplks_date != "") $wo_doc_extplks_date = date('Y-m-d', strtotime($wo_doc_extplks_date));
				//else $wo_doc_extplks_date = '0000-00-00';
				
				//if(isset($_POST['chkdetails'])) $wo_doc_details = '1';
				//else $wo_doc_details = '0';
				//$wo_doc_details_date = $_POST['dtdetails'];
				//if($wo_doc_details_date != "") $wo_doc_details_date = date('Y-m-d', strtotime($wo_doc_details_date));
				//else $wo_doc_details_date = '0000-00-00';
				
				
				/*if(isset($_POST['chkreqform'])) $wo_doc_rqform = '1';
				else $wo_doc_rqform = '0';
				
				if(isset($_POST['chkempletter'])) $wo_doc_empletter = '1';
				else $wo_doc_empletter = '0';
				
				if(isset($_POST['chkawardletter'])) $wo_doc_awardletter = '1';
				else $wo_doc_awardletter = '0';
				
				if(isset($_POST['chksupagree'])) $wo_doc_supplieragree = '1';
				else $wo_doc_supplieragree = '0';
				
				if(isset($_POST['chkaccopic'])) $wo_doc_acco = '1';
				else $wo_doc_acco = '0';
				
				if(isset($_POST['chksignedpay'])) $wo_doc_signedpayment = '1';
				else $wo_doc_signedpayment = '0';
				
				$doc_rqformdate = $_POST['dtreqform'];
					if($doc_rqformdate != "") $doc_rqformdate = date('Y-m-d', strtotime($doc_rqformdate));
					else $doc_rqformdate = "0000-00-00";
				$doc_empletterdate = $_POST['dtempletter'];
					if($doc_empletterdate != "") $doc_empletterdate = date('Y-m-d', strtotime($doc_empletterdate));
					else $doc_empletterdate = "0000-00-00";
				$doc_awardletterdate = $_POST['dtawardletter']; 
					if($doc_awardletterdate != "") $doc_awardletterdate = date('Y-m-d', strtotime($doc_awardletterdate));
					else $doc_awardletterdate = "0000-00-00";
				$doc_supplieragreedate = $_POST['dtsupagree']; 
					if($doc_supplieragreedate != "") $doc_supplieragreedate = date('Y-m-d', strtotime($doc_supplieragreedate));
					else $doc_supplieragreedate = "0000-00-00";
				$doc_accodate = $_POST['dtaccopic'];
					if($doc_accodate != "") $doc_accodate = date('Y-m-d', strtotime($doc_accodate));
					else $doc_accodate = "0000-00-00";
				$doc_signedpaymentdate = $_POST['dtsignedpay'];
					if($doc_signedpaymentdate != "") $doc_signedpaymentdate = date('Y-m-d', strtotime($doc_signedpaymentdate));
					else $doc_signedpaymentdate = "0000-00-00";*/
				
				$wo_doc_datecomplete =$_POST['dtcompletedoc'];
				if($wo_doc_datecomplete != "") $wo_doc_datecomplete = date('Y-m-d', strtotime($wo_doc_datecomplete));
				else $wo_doc_datecomplete = "0000-00-00";
				
				//PAYMENT
				if(isset($_POST['chkimigration'])) $wo_pay_imi = '1';
				else $wo_pay_imi = '0';
				if(isset($_POST['chkclab'])) $wo_pay_clb = '1';
				else $wo_pay_clb = '0';
				if(isset($_POST['chkins_guarante'])) $wo_pay_insg = '1';
				else $wo_pay_insg = '0';
				if(isset($_POST['chkins_hospital'])) $wo_pay_insh = '1';
				else $wo_pay_insh = '0';
				$wo_pay_refno = $_POST['payrefno'];
	
				
				//LEGAL
				/*$wo_agree_receivedate = $_POST['dtreceiveagree'];
				if($wo_agree_receivedate != "") $wo_agree_receivedate = date('Y-m-d', strtotime($wo_agree_receivedate));
				else $wo_agree_receivedate = "0000-00-00";*/
				
				//PROGRESS
				if(isset($_POST['chkisreceive'])) $wo_isreceive = '1';
				else $wo_isreceive = '0';
				
				/*$wo_receiveby = $_POST['txtreceiveby'];
				$wo_receivedate = $_POST['dtreceive'];
				if($wo_receivedate != "") $wo_receivedate = date('Y-m-d', strtotime($wo_receivedate));
				else $wo_receivedate = "0000-00-00";
				$wo_receive_comment = $_POST['txtreceivecomment'];*/
				
				if(isset($_POST['chkisprocess'])) $wo_isprocess = '1';
				else $wo_isprocess = '0';
				
				/*$wo_processby = $_POST['txtprocessby'];
				$wo_processdate = $_POST['dtprocess'];
				if($wo_processdate != "") $wo_processdate = date('Y-m-d', strtotime($wo_processdate));
				else $wo_processdate = "0000-00-00";
				$wo_process_comment = $_POST['txtprocesscomment'];*/
				
				if(isset($_POST['chkissubmit'])) $wo_issentto_hr = '1';
				else $wo_issentto_hr = '0';
				
				/*$wo_senthrby = $_POST['txtsubmithr'];
				$wo_senthrdate = $_POST['dtsubmithr'];
				if($wo_senthrdate != "") $wo_senthrdate = date('Y-m-d', strtotime($wo_senthrdate));
				else $wo_senthrdate = "0000-00-00";
				$wo_senthrcomment = $_POST['txtsenthrcomment'];*/
				
				if(isset($_POST['chkisreceivebyhr'])) $wo_isreceiveby_hr = '1';
				else $wo_isreceiveby_hr = '0';
				//$wo_receivehrby = $_POST['txtreceivebyhr'];
				/*$wo_receivehrdate = $_POST['dtreceivebyhr'];
				if($wo_receivehrdate != "")  $wo_receivehrdate = date('Y-m-d', strtotime($wo_receivehrdate));
				else $wo_receivehrdate = "0000-00-00";
				$wo_receivehr_comment = $_POST['txtreceivehrcomment'];*/
				
				if(isset($_POST['chkisjimack'])) $wo_isjim_ack = '1';
				else $wo_isjim_ack = '0';
				/*$wo_jimackby = $_POST['txtjimack'];
				$wo_jimackdate = $_POST['dtjimack'];
				if($wo_jimackdate != "") $wo_jimackdate = date('Y-m-d', strtotime($wo_jimackdate));
				else $wo_jimackdate = "0000-00-00";
				$wo_jimack_comment = $_POST['txtjimackcomment'];*/
				//$wo_jimack_refno = $_POST['txtjimackref'];
				
				if(isset($_POST['chkisreceivevisa'])) $wo_isreceive_visa = '1';
				else $wo_isreceive_visa = '0';
				//$wo_receivevisaby = $_POST['txtreceivevisa'];
				/*$wo_receivevisadate = $_POST['dtreceivevisa'];
				if($wo_receivevisadate != "") $wo_receivevisadate = date('Y-m-d', strtotime($wo_receivevisadate));
				else $wo_receivevisadate = "0000-00-00";
				$wo_receivevisa_approve = $_POST['txtapprove'];
				$wo_receivevisa_reject = $_POST['txtreject'];
				$wo_receivevisa_comment = $_POST['txtreceivevisacomment'];*/
				if(isset($_POST['chkisrecit'])) $wo_it_ack = '1';
				else $wo_it_ack = '0';
				//calculate current processing stage
				if($wo_isreceive_visa == '1') $wo_latest_progress = "received calling visa";
				else if($wo_isjim_ack == '1') $wo_latest_progress = "JIM acknowledgement";
				else if($wo_isreceiveby_hr == '1') $wo_latest_progress = "received by Corporate Services";
				else if($wo_issentto_hr == '1') $wo_latest_progress = "submit to Corporate Services";
				else if($wo_isprocess == '1') $wo_latest_progress = "processed by Corporate Support";
				else if($wo_isreceive == '1') $wo_latest_progress = "received by Corporate Support";
				else if($wo_it_ack == '1') $wo_latest_progress = "received by IT Department";
				else $wo_latest_progress = "workorder submitted";
				
				$ctr_contactperson = $_POST['txtcontact'];
				$ctr_contactnumber = $_POST['txtcontactno'];
				$wo_attn_off = $_POST["txtattnoff"];
				
				//$this->db->query($sqlQuery);
				//old query before renewal
				/*$woQuery = "INSERT INTO workorders (wo_id, wo_num, wo_date, wo_clab_no, wo_fcl_total, wo_fcl_country, wo_agency, wo_isreplacement, wo_replace_date, wo_replace_reason, 
		    			    wo_iswithdrawal, wo_withd_date, wo_withd_reason, wo_personincharge, wo_datesubmit, wo_keyin_by, wo_keyin_date,wo_visa_date,wo_spim_status) VALUES ($wo_id, '$workorderno', '$wo_date', '$wo_clab_no', 
		    				$wo_fcl_total, '$wo_fcl_country', $wo_agency, '$wo_isreplacement', '$wo_replace_date', '$wo_replace_reason', 
		    				'$wo_iswithdrawal', '$wo_withd_date', '$wo_withd_reason', '$wo_personincharge', '$wo_datesubmit', '$wo_keyin_by', '$wo_keyin_date','$wo_visa_date','R')";
							
									    	$docQuery = "INSERT INTO wo_doc (doc_woid, doc_rqform, doc_empletter, doc_awardletter, doc_supplieragree, doc_acco, doc_signedpayment, doc_datecomplete, doc_rqformdate, doc_empletterdate, doc_awardletterdate, doc_supplieragreedate, doc_accodate, doc_signedpaymentdate)
	            			 VALUES ($wo_id, '$wo_doc_rqform', '$wo_doc_empletter', '$wo_doc_awardletter', '$wo_doc_supplieragree', '$wo_doc_acco', '$wo_doc_signedpayment', '$wo_doc_datecomplete', '$doc_rqformdate', '$doc_empletterdate', '$doc_awardletterdate', '$doc_supplieragreedate', '$doc_accodate', '$doc_signedpaymentdate')";
							 
							 $paymentQuery = "INSERT INTO wo_payment (pay_woid, pay_refno, pay_adminfee, pay_levy, pay_plks, pay_agencyfee, pay_fomema, pay_visa, pay_ig, pay_fwcs, pay_fwhs) 
							 
							*/
				$woQuery = "INSERT INTO workorders(wo_id, wo_num, wo_date, wo_clab_no, wo_fcl_total, wo_fcl_country,wo_iswithdrawal, wo_personincharge, wo_datesubmit, wo_keyin_by, wo_keyin_date,wo_spim_status,wo_sender_name,wo_sender_ic,wo_sender_contact,wo_attn_officer,wo_spcount,wo_jimreceipt) VALUES ($wo_id, '$workorderno', '$wo_date', '$wo_clab_no',$wo_fcl_total, '$wo_fcl_country','$wo_iswithdrawal','$wo_personincharge', '$wo_datesubmit', '$wo_keyin_by', '$wo_keyin_date','Y','$wo_sendername','$wo_senderic','$wo_senderctc','$wo_attn_off','$wo_fcl_sp','$wo_fcl_jimreceipt')";
				
				//echo $woQuery;
				$docQuery = "INSERT INTO wo_doc (doc_woid, doc_ori_passport, doc_fomema, doc_extplks, doc_details,
				             doc_ori_passport_date,doc_fomema_date,doc_extplks_date,doc_details_date,doc_datecomplete)
	            			 VALUES ($wo_id, '$wo_doc_oripass', '$wo_doc_fomema', '0', '0',
							 '$wo_doc_oripass_date', '$wo_doc_fomema_date', '0000-00-00', 
							 '0000-00-00','$wo_doc_datecomplete')";

				$paymentQuery = "INSERT INTO wo_payment (pay_woid, pay_refno,pay_imigration,pay_clab,
								 pay_ins_guarante,pay_ins_hospital) 
	            			     VALUES ($wo_id, '$wo_pay_refno','$wo_pay_imi','$wo_pay_clb','$wo_pay_insg','$wo_pay_insh')";	        
				$statusQuery = "INSERT INTO wo_status (status_woid) values ('$wo_id')";            			     
		/*		$legalQuery = "INSERT INTO wo_legal (legal_woid, legal_agree_receivedate, legal_date_ho) 
	            			    VALUES ($wo_id, '$wo_agree_receivedate', '')";*/
	            			    
			/*	$statusQuery = "INSERT INTO wo_status (status_woid, wo_isreceive, wo_receiveby, wo_receivedate, wo_receive_comment, wo_isprocess, wo_processby, 
								wo_processdate, wo_process_comment, wo_issentto_hr, wo_senthrby, wo_senthrdate, wo_senthrcomment, wo_isreceiveby_hr, 
								wo_receivehrby, wo_receivehrdate, wo_receivehr_comment, wo_isjim_ack, wo_jimackby, wo_jimackdate, wo_jimack_comment, 
								wo_jimack_refno, wo_isreceive_visa, wo_receivevisaby, wo_receivevisadate, wo_receivevisa_approve, wo_receivevisa_reject, 
								wo_receivevisa_comment, wo_latest_progress)
						        VALUES ($wo_id, '$wo_isreceive', '$wo_receiveby', '$wo_receivedate', '$wo_receive_comment', '$wo_isprocess', '$wo_processby', 
								'$wo_processdate', '$wo_process_comment', '$wo_issentto_hr', '$wo_senthrby', '$wo_senthrdate', '$wo_senthrcomment', '$wo_isreceiveby_hr', 
								'$wo_receivehrby', '$wo_receivehrdate', '$wo_receivehr_comment', '$wo_isjim_ack', '$wo_jimackby', '$wo_jimackdate', '$wo_jimack_comment', 
								'$wo_jimack_refno', '$wo_isreceive_visa', '$wo_receivevisaby', '$wo_receivevisadate', $wo_receivevisa_approve, $wo_receivevisa_reject, 
								'$wo_receivevisa_comment', '$wo_latest_progress')";*/
				
				//here
		/*		$currentuserid = $this->session->userdata('emp_id');
				$nextRejectHistID = $this->ModelRenewal->getNextRejectHistoryId();
				$rejectHistoryQuery = $rejectHistoryQuery = "INSERT INTO wo_reject_history (reject_id, reject_woid, reject_apply, reject_approve, reject_rejected, reject_comment, reject_createdby, reject_createddate)
									   VALUES ($nextRejectHistID, $wo_id, $wo_fcl_total, $wo_receivevisa_approve, $wo_receivevisa_reject, '$wo_receivevisa_comment', $currentuserid, NOW());";*/
	
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($woQuery);
				$this->db->query($docQuery);
				$this->db->query($paymentQuery);
				//$this->db->query($legalQuery);
				$this->db->query($statusQuery);
				/*if($wo_isjim_ack !== '0' &&$wo_receivevisa_approve !== '0' && $wo_receivevisa_reject!=='0' && strlen(wo_receivevisa_comment) > 0){
					$this->db->query($rejectHistoryQuery);
				}*/
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				
				redirect('contSpimFirst/updateWorkOrderPt2/'.$wo_id .'/add');
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function uploadDocView(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$data['workorderid'] = $this->uri->segment(3);
				$data['companyname'] = $this->uri->segment(4);
				
				$this->load->view('spimplks/new_workorder_upload', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function uploadDoc(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				//hidden fields
				$workorderid = $_POST['workorderid'];
				$companyname = $_POST['companyname'];
				$data['workorderid'] = $workorderid;
				$data['companyname'] = $companyname;
				
				//upload documents
				$config['upload_path'] = './uploads/spimplks';
				$config['allowed_types'] = 'xlsx|xls|pdf|txt|doc|png|csv';		//usually MIME extension
				$config['max_size']	= '10000';				//in KB
	
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$uploadError = array('error' => $this->upload->display_errors());
					$data['error'] = $uploadError;
					echo "<font color=\"red\">upload error." . $this->upload->display_errors() . "</font>";
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
					$uploadby = $this->session->userdata('emp_id');
					$uploaddate = date('Y-m-d');
					
					//echo "File Path: " . $filepath . "<br />";
					//echo "File Name: " . $dest_filename . "<br />";
					//echo "Original fileTypeName: " . $orig_name . "<br />";
					//echo "File Size: " . $file_size . "(KB) <br />";
					
					$upload_id = $this->ModelSpimFirst->getNextUploadID();
					$sqlQuery = "INSERT INTO wo_upload (upload_id, upload_woid, upload_filetype, upload_by, upload_date, upload_destfilename, upload_path)
								 VALUES ($upload_id, $workorderid, 'FCL List', $uploadby, '$uploaddate', '$dest_filename', '$filepath');";
					
					$this->db->query($sqlQuery);
					
					$data['successMsg'] = "File upload success. You may upload another file now.";
				}
				
				$this->load->view('spimplks/new_workorder_upload', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function updateWorkOrder(){
			$this->load->view('spimplks/update_workorder_pt1');
		}
		
		function updateWorkOrderPLKS1stYear(){
			$this->load->view('spim/update_workorder_plks_pt1');
		}
		
		function updateWorkOrderSearchPLKS(){
			$searchby = $_POST['searchby'];
			$keyword = $_POST['txtkeyword'];
			
			//######later get the data based on workorderid#####
			$data['ctrRecord'] = $this->ModelSpim->getWOByWoidOrCompnamePLKS($searchby, $keyword);
			
			$this->load->view('spim/update_workorder_plks_pt1', $data);
		}
		
		function updateWorkOrderSearch(){
			$searchby = $_POST['searchby'];
			$keyword = $_POST['txtkeyword'];
			
			//######later get the data based on workorderid#####
			$data['ctrRecord'] = $this->ModelSpimFirst->getWOByWoidOrCompname($searchby, $keyword);
			
			$this->load->view('spimplks/update_workorder_pt1', $data);
		}
		
		function updateWorkOrderPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				//echo $workorderid;
				$data['successMsg'] = $this->uri->segment(4);
				$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpimFirst->getAllCountries();
				$data['allAgencies'] = $this->ModelSpimFirst->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpimFirst->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpimFirst->getAllFCLFiles($workorderid);
				$data['allFCLUpload'] = $this->ModelSpimFirst->getAllFCLUpload($workorderid);
				$data['allLegalFiles'] = $this->ModelSpimFirst->getAllLegalList($workorderid);		
				
						
				
				$this->load->view('spimplks/update_workorder_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function updateWorkOrder_Pt3(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				$data['successMsg'] = $this->uri->segment(4);
				$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpim->getAllCountries();
				$data['allAgencies'] = $this->ModelSpim->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpim->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpim->getAllFCLFilesRenew($workorderid);
				$data['allFCLUpload'] = $this->ModelSpim->getAllFCLUpload($workorderid);
				$data['allLegalFiles'] = $this->ModelSpim->getAllLegalList($workorderid);		
				
						
				
				$this->load->view('spim/update_workorder_pt3', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		
		function ShowHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				$data['successMsg'] = $this->uri->segment(4);
				$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpim->getAllCountries();
				$data['allAgencies'] = $this->ModelSpim->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpim->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpim->getAllFCLFiles($workorderid);
				$data['allFCLUpload'] = $this->ModelSpim->getAllFCLUpload($workorderid);
				$data['allLegalFiles'] = $this->ModelSpim->getAllLegalList($workorderid);		
				
						
				
				$this->load->view('spim/spim_history', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		
		function updateWorkOrderPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wo_id = $_POST['txtwoid'];
				//$chkisreceive = $_POST['chkisreceive'];
				echo $wo_id;
				
				//WORKORDER DETAILS
				$wo_fcl_total = $_POST['txtfcltotal'];
				$wo_fcl_country = $_POST['selcountry'];
				//$wo_agency = $_POST['selagency'];
				/*if(isset($_POST['chkjtk'])) $wo_jtk_check = '1';
				else $wo_jtk_check = '0';*/
				
				
				//if(isset($_POST['chkisreplace'])) 
				//	$wo_isreplacement = '1';
				//else 
				//	$wo_isreplacement = '0';
				/*$wo_replace_date = $_POST['dtreplacement'];
					if($wo_replace_date != "") $wo_replace_date = date('Y-m-d', strtotime($wo_replace_date));
					else $wo_replace_date = '0000-00-00';*/
				//$wo_replace_reason = $_POST['replacereason'];
				
				if(isset($_POST['iswithd'])) 
					$wo_iswithdrawal = '1';
				else 
					$wo_iswithdrawal = '0';
				$wo_withd_date = $_POST['dtwithd'];
					if($wo_withd_date != "") $wo_withd_date = date('Y-m-d', strtotime($wo_withd_date));
					else $wo_withd_date = "0000-00-00";
				$wo_withd_reason = $_POST['reasonwithd'];
				$wo_personincharge = $_POST['txtPersonInCharge'];
				$modifiedby = $this->session->userdata('emp_id');
				$wo_sendername = $_POST["txtsendername"];	
				$wo_senderic = $_POST["txtsenderic"];
				$wo_senderctc = $_POST["txtsenderctc"];
				
				//REQUIRED DOCUMENTS
				if(isset($_POST['chkoripass'])) $wo_doc_oripass = '1';
				else $wo_doc_oripass = '0';
				$wo_doc_oripass_date = $_POST['dtoripass'];
				if($wo_doc_oripass_date != "") $wo_doc_oripass_date = date('Y-m-d', strtotime($wo_doc_oripass_date));
				else $wo_doc_oripass_date = '0000-00-00';
				
				if(isset($_POST['chkfomema'])) $wo_doc_fomema = '1';
				else $wo_doc_fomema = '0';
				$wo_doc_fomema_date = $_POST['dtfomema'];
				if($wo_doc_fomema_date != "") $wo_doc_fomema_date = date('Y-m-d', strtotime($wo_doc_fomema_date));
				else $wo_doc_fomema_date = '0000-00-00';
				
				//if(isset($_POST['chkappletter'])) $wo_doc_extplks = '1';
				//else $wo_doc_extplks = '0';
				//$wo_doc_extplks_date = $_POST['dtappletter'];
				//if($wo_doc_extplks_date != "") $wo_doc_extplks_date = date('Y-m-d', strtotime($wo_doc_extplks_date));
				//else $wo_doc_extplks_date = '0000-00-00';
				
				//if(isset($_POST['chkdetails'])) $wo_doc_details = '1';
				//else $wo_doc_details = '0';
				//$wo_doc_details_date = $_POST['dtdetails'];
				//if($wo_doc_details_date != "") $wo_doc_details_date = date('Y-m-d', strtotime($wo_doc_details_date));
				//else $wo_doc_details_date = '0000-00-00';
				/*if(isset($_POST['chkreqform'])) $wo_doc_rqform = '1';
				else $wo_doc_rqform = '0';
				
				if(isset($_POST['chkempletter'])) $wo_doc_empletter = '1';
				else $wo_doc_empletter = '0';
				
				if(isset($_POST['chkawardletter'])) $wo_doc_awardletter = '1';
				else $wo_doc_awardletter = '0';
				
				if(isset($_POST['chksupagree'])) $wo_doc_supplieragree = '1';
				else $wo_doc_supplieragree = '0';
				
				if(isset($_POST['chkaccopic'])) $wo_doc_acco = '1';
				else $wo_doc_acco = '0';
				
				if(isset($_POST['chksignedpay'])) $wo_doc_signedpayment = '1';
				else $wo_doc_signedpayment = '0';*/
				
				//PAYMENT
				$wo_pay_refno = $_POST['payrefno'];
				//$wo_pay_adminfee = $_POST['seladminfee'];
				//$wo_pay_levy = $_POST['sellevy'];
				//$wo_pay_plks = $_POST['selplks'];
				//$wo_pay_agencyfee = $_POST['selagencyfee'];
				//$wo_pay_fomema = $_POST['selfomema'];
				//$wo_pay_visa = $_POST['selvisa'];
				//$wo_pay_ig = $_POST['selig'];
				//$wo_pay_fwcs = $_POST['selfwcs'];
				//$wo_pay_fwhs = $_POST['selfwhs'];
				if(isset($_POST['chkimigration'])) $wo_pay_imi = '1';
				else $wo_pay_imi = '0';
			    if(isset($_POST['chkclab'])) $wo_pay_clb = '1';
				else $wo_pay_clb = '0';
			    if(isset($_POST['chkins_guarante'])) $wo_pay_insg = '1';
				else $wo_pay_insg = '0';
			    if(isset($_POST['chkins_hospital'])) $wo_pay_insh = '1';
				else $wo_pay_insh = '0';
			
					
				/*$doc_rqformdate = $_POST['dtreqform'];
					if($doc_rqformdate != "") $doc_rqformdate = date('Y-m-d', strtotime($doc_rqformdate));
					else $doc_rqformdate = "0000-00-00";
				$doc_empletterdate = $_POST['dtempletter'];
					if($doc_empletterdate != "") $doc_empletterdate = date('Y-m-d', strtotime($doc_empletterdate));
					else $doc_empletterdate = "0000-00-00";
				$doc_awardletterdate = $_POST['dtawardletter']; 
					if($doc_awardletterdate != "") $doc_awardletterdate = date('Y-m-d', strtotime($doc_awardletterdate));
					else $doc_awardletterdate = "0000-00-00";
				$doc_supplieragreedate = $_POST['dtsupagree']; 
					if($doc_supplieragreedate != "") $doc_supplieragreedate = date('Y-m-d', strtotime($doc_supplieragreedate));
					else $doc_supplieragreedate = "0000-00-00";
				$doc_accodate = $_POST['dtaccopic'];
					if($doc_accodate != "") $doc_accodate = date('Y-m-d', strtotime($doc_accodate));
					else $doc_accodate = "0000-00-00";
				$doc_signedpaymentdate = $_POST['dtsignedpay'];
					if($doc_signedpaymentdate != "") $doc_signedpaymentdate = date('Y-m-d', strtotime($doc_signedpaymentdate));
					else $doc_signedpaymentdate = "0000-00-00";*/
				
				$wo_doc_datecomplete =$_POST['dtcompletedoc'];
				if($wo_doc_datecomplete != "") $wo_doc_datecomplete = date('Y-m-d', strtotime($wo_doc_datecomplete));
				else $wo_doc_datecomplete = "0000-00-00";
				
				//$wo_yearrenew =$_POST['selyearrenew'];
				//if($wo_visa_date != "") $wo_visa_date = date('Y-m-d', strtotime($wo_visa_date));
				//else $wo_visa_date = "0000-00-00";
				
			
				
				//LEGAL
				//$wo_agree_receivedate = $_POST['dtreceiveagree'];
				//if($wo_agree_receivedate != "") $wo_agree_receivedate = date('Y-m-d', strtotime($wo_agree_receivedate));
				//else $wo_agree_receivedate = "0000-00-00";
				
				//shud get these from hidden field
				$wo_isreceive = $_POST['orig_wo_isreceive'];
				$wo_isprocess = $_POST['orig_wo_isprocess'];
				$wo_issentto_hr = $_POST['orig_wo_issentto_hr'];
				$wo_isreceiveby_hr = $_POST['orig_wo_isreceiveby_hr'];
				$wo_isjim_ack = $_POST['orig_wo_isjim_ack'];
				$wo_isreceive_visa = $_POST['orig_wo_isreceive_visa'];
				$wo_it_ack = $_POST['orig_wo_it_ack'];
				
				//PROGRESS
				
				
								
				if(isset($_POST['chkisreceive'])){
					$wo_isreceive = '1';
					$wo_isreceive_ischecked = '1';
					$wo_receiveby = $_POST['txtreceiveby'];
					$wo_receivedate = $_POST['dtreceive'];
						if($wo_receivedate != "") $wo_receivedate = date('Y-m-d', strtotime($wo_receivedate));
						else $wo_receivedate = "0000-00-00";
				}else{
					$wo_isreceive = '0';
					$wo_isreceive_ischecked = '0';
				}
				$wo_receive_comment = $_POST['txtreceivecomment'];
				
				if(isset($_POST['chkisprocess'])){
					$wo_isprocess = '1';
					$wo_isprocess_ischecked = '1';
					$wo_processby = $_POST['txtprocessby'];
					$wo_processdate = $_POST['dtprocess'];
						if($wo_processdate != "") $wo_processdate = date('Y-m-d', strtotime($wo_processdate));
						else $wo_processdate = "0000-00-00";
				}else{
					$wo_isprocess = '0';
					$wo_isprocess_ischecked = '0';
				}
				$wo_process_comment = $_POST['txtprocesscomment'];
				
				if(isset($_POST['chkissubmit'])){
					$wo_issentto_hr = '1';
					$wo_issentto_hr_ischecked = '1';
					$wo_senthrby = $_POST['txtsubmithr'];
					$wo_senthrdate = $_POST['dtsubmithr'];
						if($wo_senthrdate != "") $wo_senthrdate = date('Y-m-d', strtotime($wo_senthrdate));
						else $wo_senthrdate = "0000-00-00";
				}else{
					$wo_issentto_hr = '0';
					$wo_issentto_hr_ischecked = '0';
				}
				$wo_senthrcomment = $_POST['txtsenthrcomment'];
				
				if(isset($_POST['chkisreceivebyhr'])){ 
					$wo_isreceiveby_hr = '1';
					$wo_isreceiveby_hr_ischecked = '1';
					//$wo_isreceiveby_hr_ischecked = '1';
					$wo_receivehrby = $_POST['txtreceivebyhr'];
					$wo_receivehrdate = $_POST['dtreceivebyhr'];
						if($wo_receivehrdate != "")  $wo_receivehrdate = date('Y-m-d', strtotime($wo_receivehrdate));
						else $wo_receivehrdate = "0000-00-00";
				}else{
					$wo_isreceiveby_hr = '0';
					$wo_isreceiveby_hr_ischecked = '0';
				}
				$wo_receivehr_comment = $_POST['txtreceivehrcomment'];
			
				if(isset($_POST['chkisjimack'])){ 
					$wo_isjim_ack = '1';
					$wo_isjim_ack_ischecked = '1';
					$wo_jimackby = $_POST['txtjimack'];
					$wo_jimackdate = $_POST['dtjimack'];
						if($wo_jimackdate != "") $wo_jimackdate = date('Y-m-d', strtotime($wo_jimackdate));
						else $wo_jimackdate = "0000-00-00";
				}else{
					$wo_isjim_ack = '0';
					$wo_isjim_ack_ischecked = '0';
				}
				$wo_jimack_comment = $_POST['txtjimackcomment'];
				$wo_jimack_refno = $_POST['txtjimackref'];
				
				//$wo_close_ack = '0'; //****
				if(isset($_POST['iswithd'])){ 
					$wo_close_ack = '1';
					$wo_close_ack_ischecked = '1';
					
					$wo_close_date = $_POST['dtwithd'];
						if($wo_close_date != "") $wo_close_date = date('Y-m-d', strtotime($wo_close_date));
						else $wo_close_date = "0000-00-00";
				}else{
					$wo_close_ack = '0';
					$wo_close_ack_ischecked = '0';
				}
			
				
				if(isset($_POST['chkisrecit'])){ 
					$wo_it_ack = '1';
					$wo_it_ack_ischecked = '1';
					$wo_it_ackby = $_POST['txtitack'];
					$wo_it_ackdate = $_POST['dtitack'];
						if($wo_it_ackdate != "") $wo_it_ackdate = date('Y-m-d', strtotime($wo_it_ackdate));
						else $wo_it_ackdate = "0000-00-00";
				}else{
					$wo_it_ack = '0';
					$wo_it_ack_ischecked = '0';
				}
				
				if(isset($_POST['chkisreceivevisa'])){
					$wo_isreceive_visa = '1';
					$wo_isreceive_visa_ischecked = '1';
					$wo_receivevisaby = $_POST['txtreceivevisa'];
					$wo_receivevisadate = $_POST['dtreceivevisa'];
					if($wo_receivevisadate != "") $wo_receivevisadate = date('Y-m-d', strtotime($wo_receivevisadate));
					else $wo_receivevisadate = "0000-00-00";
				}
				//$wo_receivevisa_approve = $_POST['txtapprove'];
				//$wo_receivevisa_reject = $_POST['txtreject'];
				//$wo_receivevisa_comment = $_POST['txtreceivevisacomment'];
				
				//calculate current processing stage
				if($wo_isreceive_visa == '1') $wo_latest_progress = "receive calling visa";
				else if($wo_close_ack == '1') $wo_latest_progress = "closed";
				else if($wo_it_ack == '1') $wo_latest_progress = "received by IT Department";
				else if($wo_isjim_ack == '1') $wo_latest_progress = "JIM acknowledgement";
				else if($wo_isreceiveby_hr == '1') $wo_latest_progress = "receive by Corporate Support";
				else if($wo_issentto_hr == '1') $wo_latest_progress = "submit to Corporate Support";
				else if($wo_isprocess == '1') $wo_latest_progress = "processed by Corporate Services";
				else if($wo_isreceive == '1') $wo_latest_progress = "received by Corporate Services";
				else $wo_latest_progress = "workorder submitted";
				
				$ctr_contactperson = $_POST['txtcontact'];
				$ctr_contactnumber = $_POST['txtcontactno'];
				$wo_attn_off = $_POST["txtattnoff"];
				
				//VERIFICATION AND APPROVAL
				//$wo_ver_corp = $_POST['orig_wo_vercorp'];
				//if(isset($_POST['chkvercorp'])){
				//    $wo_ver_corp = '1';
					//$wo_isreceive_ischecked = '1';
					
				//}
				//    $vercorpby = $_POST["txtvercorp"];
				//    $vercorpdate = $_POST['dtvercorp'];
				//    if($vercorpdate != "") $vercorpdate = date('Y-m-d', strtotime($vercorpdate));
				//    else $vercorpdate = "0000-00-00";
				
				//$wo_ver_fin = $_POST['orig_wo_verfin'];
				//if(isset($_POST['chkverfin'])){				    
				//	$wo_ver_fin = '1';
					//$wo_isreceive_ischecked = '1';					
				//}
				//$verfinby = $_POST["txtverfin"];
				//	$verfindate = $_POST['dtverfin'];
				//	if($verfindate != "") $verfindate = date('Y-m-d', strtotime($verfindate));
				//	else $verfindate = "0000-00-00";
				
				//$wo_app_ceo = $_POST['orig_wo_appceo'];
				//if(isset($_POST['chkappceo'])){
				//  	$wo_app_ceo = '1';
					//$wo_isreceive_ischecked = '1';					
				//}
				//$appceoby = $_POST["txtappceo"];
				//	$appceodate = $_POST['dtappceo'];
				//	if($appceodate != "") $appceodate = date('Y-m-d', strtotime($appceodate));
				//	else $appceodate = "0000-00-00";
				
				//$this->db->query($sqlQuery);
				/*$woQuery = "UPDATE workorders SET wo_fcl_total = $wo_fcl_total, wo_fcl_country = '$wo_fcl_country', wo_agency = $wo_agency, wo_isreplacement = '$wo_isreplacement', wo_replace_date = '$wo_replace_date', wo_replace_reason = '$wo_replace_reason', 
		    			    wo_iswithdrawal = '$wo_iswithdrawal', wo_withd_date = '$wo_withd_date', wo_withd_reason = '$wo_withd_reason', 
							wo_personincharge = '$wo_personincharge', wo_modifiedby = '$modifiedby', wo_modifieddate = NOW(),
							wo_visa_date = '$wo_visa_date',wo_jtk = '$wo_jtk_check',wo_jtk_ref = '$wo_jtk_ref' WHERE wo_id = $wo_id";*/
				$woQuery = "UPDATE workorders SET wo_fcl_total = $wo_fcl_total, wo_fcl_country = '$wo_fcl_country', wo_isreplacement = '',     
				            wo_iswithdrawal = '$wo_iswithdrawal', wo_withd_date = '$wo_withd_date', wo_withd_reason = '$wo_withd_reason', 
							wo_personincharge = '$wo_personincharge', wo_modifiedby = '$modifiedby', wo_modifieddate = NOW(),
							wo_jtk_ref = '',wo_sender_name = '$wo_sendername', wo_sender_ic = '$wo_senderic',
							wo_sender_contact='$wo_senderctc',chk_ver_corp ='',ver_corp_by='',
							ver_corp_date='0000-00-00',chk_ver_fin='',
							ver_fin_by='',ver_fin_date='0000-00-00',chk_app_ceo='',
							app_ceo_by='',app_ceo_date='0000-00-00',wo_attn_officer='$wo_attn_off' WHERE wo_id = $wo_id";
				
				
				$docQuery = "update wo_doc set doc_ori_passport = '$wo_doc_oripass', doc_fomema = '$wo_doc_fomema', 
				             doc_extplks='', doc_details = '',doc_ori_passport_date = 
							 '$wo_doc_oripass_date', doc_fomema_date = '$wo_doc_fomema_date', 
				           doc_extplks_date='0000-00-00', doc_details_date = '0000-00-00',
						   doc_datecomplete = '$wo_doc_datecomplete' where doc_woid = '$wo_id'";	            			
							 
		    /*	$docQuery = "UPDATE wo_doc SET doc_rqform = '$wo_doc_rqform', doc_empletter = '$wo_doc_empletter', doc_awardletter = '$wo_doc_awardletter', doc_supplieragree = '$wo_doc_supplieragree', doc_acco = '$wo_doc_acco', 
		    	             doc_signedpayment = '$wo_doc_signedpayment', doc_datecomplete = '$wo_doc_datecomplete', doc_rqformdate = '$doc_rqformdate', doc_empletterdate = '$doc_empletterdate', doc_awardletterdate = '$doc_awardletterdate', doc_supplieragreedate = '$doc_supplieragreedate', doc_accodate = '$doc_accodate', doc_signedpaymentdate= '$doc_signedpaymentdate'
	            			 WHERE doc_woid = $wo_id";*/
				
	        /*    $paymentQuery = "UPDATE wo_payment SET pay_refno = '$wo_pay_refno', pay_adminfee = '$wo_pay_adminfee', pay_levy = '$wo_pay_levy', pay_plks = '$wo_pay_plks', 
	            				 pay_agencyfee = '$wo_pay_agencyfee', pay_fomema = '$wo_pay_fomema', pay_visa = '$wo_pay_visa', pay_ig = '$wo_pay_ig', pay_fwcs = '$wo_pay_fwcs', pay_fwhs = '$wo_pay_fwhs'
	            			     WHERE pay_woid = $wo_id";*/
								 
				$paymentQuery = "UPDATE wo_payment set pay_refno = '$wo_pay_refno',pay_imigration = '$wo_pay_imi',pay_clab = '$wo_pay_clb',
				                 pay_ins_guarante = '$wo_pay_insg',pay_ins_hospital = '$wo_pay_insh' where pay_woid = '$wo_id'";
	            			  	            			     
				$legalQuery = "UPDATE wo_legal SET legal_agree_receivedate = '' WHERE legal_woid = $wo_id";
	            			    
				$statusQuery = "UPDATE wo_status SET wo_latest_progress = '$wo_latest_progress'";
				
				if($wo_isreceive_ischecked == '1'){
					$statusQuery .= ", wo_isreceive = '$wo_isreceive', wo_receiveby = '$wo_receiveby', wo_receivedate = '$wo_receivedate'";
				}
				if($wo_isprocess_ischecked == '1'){
					$statusQuery .= ", wo_isprocess = '$wo_isprocess', wo_processby = '$wo_processby', wo_processdate = '$wo_processdate'";
				}
				if($wo_issentto_hr_ischecked == '1'){
					$statusQuery .= ", wo_issentto_hr = '$wo_issentto_hr', wo_senthrby = '$wo_senthrby', wo_senthrdate = '$wo_senthrdate'";
				}
				if($wo_isreceiveby_hr_ischecked == '1'){
					$statusQuery .= ", wo_isreceiveby_hr = '$wo_isreceiveby_hr', wo_receivehrby = '$wo_receivehrby', wo_receivehrdate = '$wo_receivehrdate'";
				}
				if($wo_isjim_ack_ischecked == '1'){
					$statusQuery .= ", wo_isjim_ack = '$wo_isjim_ack', wo_jimackby = '$wo_jimackby', wo_jimackdate = '$wo_jimackdate'";
				}
				
				if($wo_it_ack_ischecked == '1'){
					$statusQuery .= ", wo_it_ack = '$wo_it_ack', wo_it_ackby = '$wo_it_ackby', wo_it_ackdate = '$wo_it_ackdate'";
				}
				
								
			//	if($wo_isreceive_visa_ischecked == '1'){
			//		$statusQuery .= ", wo_isreceive_visa = '$wo_isreceive_visa', wo_receivevisaby = '$wo_receivevisaby', wo_receivevisadate = '$wo_receivevisadate'";
			//	}
				
				$statusQuery .= ", wo_receive_comment = '$wo_receive_comment', 
				                   wo_process_comment = '$wo_process_comment', 
				                   wo_senthrcomment = '$wo_senthrcomment', 
				                   wo_receivehr_comment = '$wo_receivehr_comment', 
				                   wo_jimack_comment = '$wo_jimack_comment', 
								   wo_jimack_refno = '$wo_jimack_refno'
								   WHERE status_woid = $wo_id";
	
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($woQuery);
				$this->db->query($docQuery);
				$this->db->query($paymentQuery);
				$this->db->query($legalQuery);
				$this->db->query($statusQuery);
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				//echo $woQuery;
				//echo $docQuery;
				//echo $paymentQuery;
				//echo $legalQuery;
				//echo $statusQuery;
				redirect('contSpimFirst/updateWorkOrderPt2/'.$wo_id .'/update');
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function newPhoneTrackLog(){
			$data['workorderid'] = $this->uri->segment(3);
			$data['companyname'] = $this->uri->segment(4);
			
			$this->load->view('spim/update_workorder_phtracklog', $data);	
		}
		
		
		function EditLegal(){
		
		$data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		  
		$id = $data['id'];
		
		$data['legal'] = $this->ModelSpim->getLegalbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spim/edit_legal', $data);
		
		}
		
		function SaveEditLegal(){
		
		$id = $_POST["txtid"];
		$workorderid = $_POST["txtwoid"];
	   	$companyname = $_POST["txtcompname"];
		$refno = $_POST["txtrefno"];
		$legaldate =  date('Y-m-d', strtotime($_POST["txtdate"]));
		$remarks = $_POST["txtremarks"];
		//$legalno = $this->ModelSpim->getlastaggno($workorderid,$companyname);
		  
	
	    $sql = "update wo_aggrement set
		        wo_agg_ref_no = '$refno',
				wo_agg_date = '$legaldate',
				wo_agg_remarks = '$remarks'
				where wo_agg_id = '$id'";
	
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "Legal was succesfully Update.";        
		$data['workorderid'] = $workorderid;
		$data['companyname'] = $companyname;
		$data['id'] = $id;
		$data['legal'] = $this->ModelSpim->getLegalbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spim/edit_legal', $data);
		
		}
		
		function editPhoneTrackLog(){
			
			$data['workorderid'] = $this->uri->segment(3);
			$data['companyname'] = $this->uri->segment(4);
			$data['id'] = $this->uri->segment(5);
			
			$id = $data['id'];
			//echo $id;
			$data['woLog'] = $this->ModelSpim->getLogbyLogid($id);
			$this->load->view('spim/edit_workorder_phtracklog', $data);	
		}
		
		function SaveEditLog(){
		
		$id = $_POST["txtid"];
		$workorderid = $_POST["txtwoid"];
	   	$companyname = $_POST["txtcompname"];
		
		$action = $_POST["txtaction"];
		$compdate =  date('Y-m-d', strtotime($_POST["dtcompletion"]));
		
		if($compdate == '1970-01-01') $compdate = "00-00-0000";
		
		//echo $compdate;
		$remarks = $_POST["txtremark"];
				  
	
	    $sql = "update wo_phonetrack set
		        track_compdate = '$compdate',
				track_action = '$action',
				track_remarks = '$remarks'
				where track_id = '$id'";
	
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "Log was succesfully Update.";        
		$data['workorderid'] = $workorderid;
		$data['companyname'] = $companyname;
		$data['id'] = $id;
		$data['woLog'] = $this->ModelSpim->getLogbyLogid($id);
		$data['strhide'] = "update";
		
		$this->load->view('spim/edit_workorder_phtracklog', $data);
		
		}
		
		function DeleteLog(){
			
	    $data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$id = $data['id'];
		
		echo $id;
		$sql = "delete from wo_phonetrack where track_id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "Log was succesfully Delete.";    
		$data['woLog'] = $this->ModelSpim->getLogbyLogid($id);    
		$data['strhide'] = "delete";
		$this->load->view('spim/edit_workorder_phtracklog', $data);
		
		}
		
		function DeleteLegal(){
			
	    $data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$id = $data['id'];
		
		$sql = "delete from wo_aggrement where wo_agg_id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "Legal was succesfully Delete.";        
		$data['strhide'] = "delete";
		$this->load->view('spim/edit_legal', $data);
		}
		
		function newPhoneTrackLogSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				//hidden fields
				$woid = $_POST['workorderid'];
				$data['companyname'] = $_POST['companyname'];
				
				//phone track log
				$trackid = $this->ModelSpim->getNextPhTrackLogID();
				$datetime = $_POST['trackdate'];
				$attendby = $_POST['txtattendby'];
				$remark = $_POST['txtremark'];
				$action = $_POST['txtaction'];
				$actionby = $_POST['txtactionby'];
				$completiondate = $_POST['dtcompletion'];
				if($completiondate == '') $completiondate = "0000-00-00";
				else $completiondate = date('Y-m-d', strtotime($completiondate));
				
				$sqlQuery = "INSERT INTO  wo_phonetrack (track_id, track_wo_id, track_datetime, track_attendby, track_remarks, track_action, track_actionby, track_compdate) 
				             VALUES ($trackid, $woid, '$datetime', '$attendby', '$remark', '$action', '$actionby', '$completiondate')";
				$this->db->query($sqlQuery);
				
				$data['workorderid'] = $woid;
				$data['successMsg'] = "The phone track log has been saved.";
				$this->load->view('spim/update_workorder_phtracklog', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function displaydate($originalDate){
			if($originalDate == "0000-00-00" || $originalDate == "NULL" || $originalDate == "")					
				return "-";
			else return date('d-m-Y', strtotime($originalDate));
		}
		
		function displayuri($wo_num){
			$hrefString = "<a href=\"updateWorkOrderPt2/$wo_num\">" . $wo_num . "</a>";
			
			return $hrefString;	
		}
		
		function listAllWorkorders(){
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "workorders");
		    //$grid->db->join("contractors","workorder.wo_clab_no = contractors.ctr_clab_no","LEFT");
		    //$grid->db->order_by("wo_id");
		    $grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    $grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    $grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    $grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    $grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    $grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			$grid->db->join("mst_replacement_type","workorders.wo_isreplacement = mst_replacement_type.replacement_type_id","LEFT");
			$grid->db->where("wo_spim_status ='Y'");
		    $grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contSpimFirst";
		 	$link_edit = anchor("$baseuri/updateWorkOrderPt2/<#wo_id#>","<#wo_id#>");
		 	
			$grid->column("No.","$link_edit", 'width="50"');
			$grid->column("Workorder Number","wo_num");
			$grid->column("COMPANY NAME","ctr_comp_name");
			$grid->column("CLAB NO.","wo_clab_no");
			$grid->column("TOTAL FCL","wo_fcl_total");
			$grid->column("FCL Country", "cty_desc");
			$grid->column("DATE SUBMIT","<callback_displaydate><#wo_datesubmit#></callback_displaydate>");
			$grid->column("P IN CHARGE", "wo_personincharge");
			$grid->column("Workorder Type", "replacement_desc");
			
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('spimplks/workorder_lists', $data);	
		}
		
		function searchWorkorders(){
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
			if($searchby == "wo_keyin_date") $keyword = date('Y-m-d', strtotime($keyword));
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
			
		    $grid = new DataGrid("", "workorders");
			
			$grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    $grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    $grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    $grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    $grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    $grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			$grid->db->join("mst_replacement_type","workorders.wo_isreplacement = mst_replacement_type.replacement_type_id","LEFT");
			
			
			if ($searchby == "fcl_newpassno")
			$grid->db->join("wo_fcl_1st","workorders.wo_id = wo_fcl_1st.fcl_woid ","LEFT");	
			
					
		    if($searchby == "ctr_comp_name" || $searchby == "ctr_clab_no" || $searchby == "fcl_newpassno" || $searchby == "pay_refno")
		    	$grid->db->where("$searchby LIKE '%$keyword%'");
		    else
		    	$grid->db->where("$searchby = '$keyword'");
				
			$grid->db->where("wo_spim_status ='Y'");	
			$grid->db->order_by("wo_id", "desc");
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
		 	$baseuri = "contSpimFirst";
			
      
			$grid->column("No.","<callback_displayuri><#wo_id#></callback_displayuri>");
      		$grid->column("Workorder Number","wo_num");
			$grid->column("COMPANY NAME","ctr_comp_name");
			$grid->column("CLAB NO.","wo_clab_no");
			$grid->column("TOTAL FCL","wo_fcl_total");
			$grid->column("FCL Country", "cty_desc");
			$grid->column("DATE SUBMIT","<callback_displaydate><#wo_keyin_date#></callback_displaydate>");
			$grid->column("P IN CHARGE", "wo_personincharge");
			$grid->column("Workorder Type", "replacement_desc");
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('spimplks/workorder_lists', $data);
		}
		
		function printCheckLits(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($workorderid);
			
			$this->load->view('spimplks/renewal_printchecklist.php', $data);
		}
		
		
		
		function printHandoverList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_handover_.php', $data);
		}
		
			function printHandoverArr(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_handover_arrival.php', $data);
		}
		
		function printPLKS1year(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_PLKS1styear.php', $data);
		}
		
		function printVDRApp(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_VDRapp.php', $data);
		}
		
		function printSPList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_SPApp.php', $data);
		}
		
		function printWPList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_SuratWakil.php', $data);
		}
		
		function printHOVDR(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimFirst->getWObyWOid($workorderid);
			$data['allFCLFiles'] = $this->ModelSpimFirst->getAllFCLFiles($workorderid);
			$this->load->view('spimplks/spim_print_handover_ack.php', $data);
		}
		
		function printCOMList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpim->getWObyWOid($workorderid);
			
			$this->load->view('spim/spim_print_COMApp.php', $data);
		}
		function viewRejectHistory(){
			$clabno = $this->uri->segment(3);
			$wo_id = $this->uri->segment(4);
			$data['ctr_comp_name'] = $this->ModelSpim->getCtrNameByClabNo($clabno);;
			$data['clab_no'] = $clabno;
			$data['wo_id'] = $wo_id;
			
			$rejectHistoryQuery = "SELECT * FROM wo_reject_history WHERE reject_woid = '$wo_id' ORDER BY reject_id desc";
			$data['woRecord'] = $this->db->query($rejectHistoryQuery);
			
			$this->load->view('spim/vdr_reject_history', $data);
		}
		
		function underConstruction(){
			$this->load->view('underconstruction.htm');	
		}
		
		function updateRejectHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid)>0){
				$clab_no = $_POST['txtclabno'];
				$wo_id = $_POST['txtwoid'];
				$applied = $_POST['txtapplied'];
				$approved = $_POST['txtapproved'];
				$rejected = $_POST['txtrejected'];
				$comment = $_POST['txtcomment'];
				
				
				$nextRejectHistID = $this->ModelSpim->getNextRejectHistoryId();
				$rejectHistoryQuery = "INSERT INTO wo_reject_history (reject_id, reject_woid, reject_apply, reject_approve, reject_rejected, reject_comment, reject_createdby, reject_createddate)
									   VALUES ($nextRejectHistID, $wo_id, $applied, $approved, $rejected, '$comment', $currentuserid, NOW());";
				
				$updateWoQuery = "UPDATE wo_status SET  
								  wo_receivevisa_approve = $approved,
								  wo_receivevisa_reject = $rejected,
								  wo_receivevisa_comment = '$comment'
								  WHERE status_woid = $wo_id";
				
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($rejectHistoryQuery);
				$this->db->query($updateWoQuery);
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				
				redirect('contSpim/viewRejectHistory/' . $clab_no. '/' . $wo_id); 
			}
			else{
				$this->load->view('session_expired.php');
			}
		}
		
	}
?>