<?php
	class ContSpimG extends Controller{
		function ContSpimG(){
			parent::Controller();
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->Model('ModelSpimg');	
			$this->load->Model('ModelLabour');
			
		}
		
		function email_item(){
				
		$wono = $this->uri->segment(3);
		    $data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);
			$msg = $this->load->view('spimg/email_items', $data);
		
		}
		function Insurance_purchase(){
			$wono = $this->uri->segment(3);
			$uname=$this->uri->segment(4);
		    $data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);	
			$msg = $this->load->view('spimg/email_items', $data, true);
				
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
            $this->email->to('lonpac@clab.com.my , fadil@clab.com.my , qistina@clab.com.my');
			$this->email->cc('faiz@clab.com.my , redzuan@clab.com.my , skim@clab.com.my' );
			$this->email->bcc($mailRow->emails);
            
			$this->email->subject('Extension - Insurance Purchase');
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
		    $data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
            $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);
			$msg = $this->load->view('spimg/email_items', $data, true);		
			
		 	$this->load->library('email');
            $this->email->from('skim@clab.com.my', 'CLAB');
            $this->email->to('lonpac@clab.com.my , maliah@clab.com.my');
			$this->email->cc('nieza@clab.com.my , hayati@clab.com.my ');
			$this->email->bcc('redzuan@clab.com.my');
			
            $this->email->subject('Transit Centre - Insurance Purchase');
            $this->email->message($msg);
            $this->email->send();
            echo "<table width='100%'>
			      <tr align='center'>
				  <td>Your message has been successfully sent...</td>
				  </tr>
				  </table>";
			// echo $this->email->print_debugger();
		}
		
		
		function listAllApproval(){
		   $data["ApprovalList"] = $this->ModelSpimg->getApprovalList();
		   $this->load->view('spimg/approvallist',$data);	 
		}
		
		function getcountry(){
		   $frm = $this->uri->segment(3);
		   $data['countrylist'] = $this->ModelSpimg->getAllCountry();
		     $data['form'] = $frm;
		   $this->load->view('spimg/countrylist',$data);	 
		}
		
		function openreceipt(){
		   
		   $frm = $this->uri->segment(3);
		   $clabno = $this->uri->segment(4);
		   $data['receiptlist'] = $this->ModelSpimg->getAllReceipt($clabno);
		   $data['form'] = $frm;
	       $this->load->view('spimg/receiptlist',$data);		   
		
		}
		
		function openprintform($fclid){
		//header('Content-type: application/pdf');
		//$this->load->view('spim/im12form.pdf');
		$data['im12'] = $this->ModelSpimg->getFCLbyID($fclid);
		$this->load->view('spimg/im12_indv',$data);		
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
			$grid->db->where("wo_clab_no ='$clabid' and wo_spim_status = 'G'");
		    $grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contSpimG";
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
		    			
			$this->load->view('spimg/batch_application_list', $data);
		
		}
		
			function viewwobatchapp(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				$data['successMsg'] = $this->uri->segment(4);
				
				$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpimg->getAllCountries();
				$data['allAgencies'] = $this->ModelSpimg->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpimg->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpimg->getAllFCLFiles($workorderid);
				
				$this->load->view('spimg/view_wo_batch_app', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function regnewlegal(){
			
	    	$data['workorderid'] = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
		    $data['companyname'] = $this->uri->segment(6);
			$data['currentuser'] = $this->uri->segment(7);
			$data['wono'] = $this->uri->segment(8);
			
		$this->load->view('spimg/reg_new_legal', $data);
		}
		
		
		
		function EditLegal(){
		
		$data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		  
		$id = $data['id'];
		$data['legal'] = $this->ModelSpimg->getLegalbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimg/edit_legal', $data);
		
		}
		
		function DeleteFCLxxx(){
			
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
		$this->load->view('spimg/edit_fcl', $data);
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
		$this->load->view('spimg/edit_legal', $data);
		}
		
		function lampiran_a(){
			
			$wono = $this->uri->segment(3);
			$data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;		
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
			
			$this->load->view('spimg/lampiran_a', $data);
			
		}
		
		function lampiran_a_excel(){
			
			$wono = $this->uri->segment(3);
			$data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;		
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
			
			$this->load->view('spimg/lampiran_a_excel', $data);
			
		}
		
		
		function second_schedule(){
			
			$wono = $this->uri->segment(3);
			//$data['lampiran'] = $this->ModelSpim->getLampiranData($wono);
			//$cat = $data['lampiran']->ctr_category;
			//$data['cat'] = $this->ModelSpim->getCategory($cat);
			$data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);
			
			$this->load->view('spimg/second_schedule', $data);
			
		}
		
		function im12(){
		   $wono = $this->uri->segment(3);
		   $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);			
		   $this->load->view('spimg/im12', $data);
		}
		
		function addendum(){
		   $wono = $this->uri->segment(3);
		   $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);	
		   $data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);		
		   $this->load->view('spimg/addendum', $data);
		}
		
	    function borangbayaran(){
		   $wono = $this->uri->segment(3);
		   $data['lampiran'] = $this->ModelSpimg->getLampiranData($wono);
		   $data['TotalFCL'] = $this->ModelSpimg->getTotalFCL($wono);	
		   $data['allFCLlampiran'] = $this->ModelSpimg->getLampiranFCLbyID($wono);			
		   $this->load->view('spimg/borang_bayaran', $data);
		}
		
		function acknowledge(){
		   $wono = $this->uri->segment(3);
		   $data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
		   $this->load->view('spimg/acknowledge', $data);
		}
		
		
		function SaveEditFCL(){
		
		$id = $_POST["txtid"];
		$workorderid = $_POST["txtwoid"];
		$companyname = $_POST["txtcompname"];
		//$clabno = $_POST["txtclabno"];
		$currentuserid = $this->session->userdata('emp_id');
		
		$add1 = $_POST["txtadd1"];
		$add2 = $_POST["txtadd2"];
		$add3 = $_POST["txtadd3"];
		$pcode = $_POST["txtpcode"];
		$state = $_POST["txtstate"];
		
		
		$passno = $_POST["txtpassno"];
		$name = $_POST["txtname"]; 
		$dob  = date('Y-m-d', strtotime($_POST["txtdob"]));
		$birthplace = $_POST["txtpof"];
		$nationality = $_POST["selnationality"];
		
		if(isset($_POST["chkpass"])){
		$chkpass = $_POST["chkpass"];
		}else{
		$chkpass = '0';
		}
		
		$gender = $_POST["selgender"];
		$passissue = $_POST["txtpassissue"];
		
		$passexp = date('Y-m-d', strtotime($_POST["txtpassexp"]));
		$permitexp = date('Y-m-d', strtotime($_POST["datepermitexp"]));
		$dateentry = date('Y-m-d', strtotime($_POST["txtentrydate"]));
		
		$wt = $_POST['txtworktrade'];
		$country = $_POST['selcountry'];
		$nok = $_POST['txtnok'];
		$add = $_POST["txtaddarea"];
		$relationship = $_POST['txtrelationship'];
		$plksno = $_POST["txtplksno"];
		
		if(isset($_POST["txtsalary"])){
		$salary = $_POST["txtsalary"];
		}else{    
		$salary = '0.00';
		}
				
		$sqllabour = "update workers set wkr_name = ".$this->db->escape($name).",wkr_dob = '$dob',wkr_homeaddr = '$birthplace',wkr_nationality = '$nationality',wkr_incharge = '$currentuserid', wkr_gender = '$gender',  wkr_passissue = '$passissue', wkr_passexp = '$passexp',wkr_permitexp = '$permitexp',wkr_address1 = '$add1',wkr_address2 = '$add2',wkr_address3 = '$add3',wkr_pcode = '$pcode',wkr_state = '$state',wkr_entrydate = '$dateentry',wkr_salary  = '$salary', wkr_wtrade = '$wt',wkr_country = '$country',wkr_plksno = '$plksno',wkr_currentemp = '$companyname', wkr_next_of_kin = ".$this->db->escape($nok).", wkr_relationship = '$relationship' where wkr_passno = '$passno'";		
		
		$sql = "update wo_fcl set fcl_name = ".$this->db->escape($name).",fcl_dob = '$dob',fcl_bthplace = '$birthplace',fcl_nationality = '$nationality',fcl_gender = '$gender',fcl_passissue = '$passissue',fcl_passexp = '$passexp',fcl_plksdate = '$permitexp',fcl_entrydate = '$dateentry',fcl_add = '$add',fcl_salary  = '$salary',fcl_pass= '$chkpass',fcl_wt = '$wt',fcl_country = '$country',fcl_next_of_kin = ".$this->db->escape($nok).",fcl_relationship = '$relationship',fcl_plksno = '$plksno' where fcl_id = '$id'"; 
				
        $this->db->trans_begin();
		$this->db->query($sql);	
		$this->db->query($sqllabour);	
        $this->db->trans_commit();
		
		//echo $sqllabour;
		//echo $workorderid;
	
		$data['successMsg'] = "FCL was succesfully Update.";        
		$data['workorderid'] = $workorderid;
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['lampiran'] = $this->ModelSpimg->getLampiranData($workorderid);
		$data['companyname'] = $companyname;
		$data['id'] = $id;
		$data['fcl'] = $this->ModelSpimg->getFCLbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimg/edit_fcl', $data);
		
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
		$data['legal'] = $this->ModelSpimg->getLegalbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimg/edit_legal', $data);
		
		}
		
		/* Enhancement of SKIM for G1G3 (START) */
		function printLampiran1(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_semak.php', $data);
		}
		function printLampiran2(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_lawatan.php', $data);
		}
		function printLampiran3(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_perjanjian.php', $data);
		}
		function printLampiran4(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_penilaian.php', $data);
		}
		function printLampiran5(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_akuan.php', $data);
		}
		function printLampiran6(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);			
			$this->load->view('spimg/lampiran_pengambilan.php', $data);
		}
		
		function regsitevisit()
		{
		   	$data['workorderid'] = $this->uri->segment(3);
		    $data['clabno'] = $this->uri->segment(4);
			$data['companyname'] = $this->uri->segment(5);
			$clabno=$data['clabno'];
			$data['contractor'] = $this->ModelSpimg->getContByClabNo($clabno);

			$this->load->view('spimg/reg_new_sitevisit', $data);	
		}

		function AddNewSiteVisit()
		{
			$workorderid = $_POST["txtwoid"];
			$clabno = $_POST["txtclabno"];
			$compname = $_POST["txtcompname"];
			$alapej = $_POST["txtalapej"];
			$alatap = $_POST["txtalatap"];
			$warga1 = $_POST["txtwarga1"];$warga2=$_POST["txtwarga2"];$warga3=$_POST["txtwarga3"];$warga4=$_POST["txtwarga4"];
			$warga5 = $_POST["txtwarga5"];$warga6=$_POST["txtwarga6"];$wargalain=$_POST["txtwargalain"];			
			$rumah1 = $_POST["txtrumah1"];$rumah2=$_POST["txtrumah2"];$rumah3=$_POST["txtrumah3"];
			$rumah4 = $_POST["txtrumah4"];$rumahlain=$_POST["txtrumahlain"];
			$bilik1 = $_POST["txtbilik1"];$bilik2=$_POST["txtbilik2"];$bilik3=$_POST["txtbilik3"];
			$bilik4 = $_POST["txtbilik4"];$biliklain=$_POST["txtbiliklain"];
			$makan1 = $_POST["txtmakan1"];$makan2 = $_POST["txtmakan2"];
			$kafe1 = $_POST["txtkafe1"];$kafe2 = $_POST["txtkafe1"];
			$mandi1 = $_POST["txtmandi1"];$mandi2 = $_POST["txtmandi2"];
			$selamat1 = $_POST["txtselamat1"];$selamat2 = $_POST["txtselamat2"];$selamat3 = $_POST["txtselamat3"];
			$selamat4 = $_POST["txtselamat4"];$selamat5 = $_POST["txtselamat5"];$selamatlain = $_POST["txtselamatlain"];
			$gaji = $_POST["txtgaji"];$lebih1 = $_POST["txtlebih1"];$lebih2 = $_POST["txtlebih2"];
			$ulasmaj = $_POST["txtulasmaj"];$ulaspek = $_POST["txtulaspek"];$ulasnaz = $_POST["txtulasnaz"];
			//$ = $_POST[""];
			
			$sql_sitevisit = "INSERT INTO g_sitevisit
						   (sv_woid,sv_clabno,sv_compname,sv_alapej,sv_alatap,sv_warga1,sv_warga2,sv_warga3,sv_warga4,sv_warga5,sv_warga6,sv_wargalain,
						   sv_rumah1,sv_rumah2,sv_rumah3,sv_rumah4,sv_rumahlain,sv_bilik1,sv_bilik2,sv_bilik3,sv_bilik4,sv_biliklain,sv_makan1,sv_makan2,
						   sv_kafe1,sv_kafe2,sv_mandi1,sv_mandi2,sv_selamat1,sv_selamat2,sv_selamat3,sv_selamat4,sv_selamat5,sv_selamatlain,
						   sv_gaji,sv_lebih1,sv_lebih2,sv_ulasmaj,sv_ulaspek,sv_ulasnaz)
						   VALUES
						   ('$workorderid','$clabno','$compname','$alapej','$alatap','$warga1','$warga2','$warga3','$warga4','$warga5','$warga6','$wargalain',
						   '$rumah1','$rumah2','$rumah3','$rumah4','$rumahlain','$bilik1','$bilik2','$bilik3','$bilik4','$biliklain','$makan1','$makan2',
						   '$kafe1','$kafe2','$mandi1','$mandi2','$selamat1','$selamat2','$selamat3','$selamat4','$selamat5','$selamatlain',
						   '$gaji','$lebih1','$lebih2','$ulasmaj','$ulaspek','$ulasnaz')";
			//echo $sql_sitevisit;
			$this->db->trans_begin();
			$this->db->query($sql_sitevisit);	
			$this->db->trans_commit();
			
			$data['successMsg'] = "New Site Visit Report was succesfully added.";     
			$data['workorderid'] = $workorderid;
			$data['companyname'] = $compname;
			$data['clabno'] = $clabno;
			$woid = $workorderid;
			$data['SiteVisit'] = $this->ModelSpimg->getSiteVisitbyID($woid);
			$data['strhide'] = "update";
			
			$this->load->view('spimg/edit_sitevisit', $data);
			
		}
		
		function EditSiteVisit(){	
			$data['workorderid'] = $this->uri->segment(3);
		    $data['clabno'] = $this->uri->segment(4);
			$data['companyname'] = $this->uri->segment(5);
			//$data['woid'] = $this->uri->segment(6);		  
			$woid = $data['workorderid'];
			$data['SiteVisit'] = $this->ModelSpimg->getSiteVisitbyID($woid);
			$data['strhide'] = "update";
			
			$this->load->view('spimg/edit_sitevisit', $data);	
		}
		
		function empfcl_list(){
		    
			$clabno = $this->uri->segment(3);
					
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
			$data['clabno'] = $clabno;
		   	$data['labour'] = $this->ModelSpimg->getAllLabor($searchdata,$clabno);
		    $this->load->view('spimg/fcl_emp_list', $data);
		   
		}
		
		/*function EditFCL(){
		
		$data['workorderid'] = $this->uri->segment(3);
		$wono=$data['workorderid'];
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade();
		$data['lampiran'] = $this->ModelSpimg->getLampiranData($wono); 
		$id = $data['id'];
		$data['fcl'] = $this->ModelSpimg->getFCLbyID($id);
		$data['strhide'] = "update";
		
		$this->load->view('spimg/edit_fcl', $data);
		
		}*/
		function EditFCL(){		
			$data['workorderid'] = $this->uri->segment(3);
			$data['companyname'] = $this->uri->segment(4);
			$data['id'] = $this->uri->segment(5);
			$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
			$data['allWOTYPE'] = $this->ModelSpimg->getWOtype();
			$id = $data['id'];
			$data['fcl'] = $this->ModelSpimg->getFCLbyID($id);
			$data['strhide'] = "update";
			
			$this->load->view('spimg/edit_fcl', $data);			
		}
		
		function DeleteFCL(){
			
	    $data['workorderid'] = $this->uri->segment(3);
		$data['companyname'] = $this->uri->segment(4);
		$data['id'] = $this->uri->segment(5);
		$id = $data['id'];
		
		$sql = "delete from wo_fcl_g1g3 where fcl_id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "FCL was succesfully Delete.";        
		$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
		$data['strhide'] = "delete";
		$this->load->view('spimg/edit_fcl', $data);
		}
		/*
		function DeleteSiteVisit(){
			
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
		$this->load->view('spimg/edit_fcl', $data);
		}
		*/
		
		function regnewlabour(){
			
	    	$data['workorderid'] = $this->uri->segment(3);
		    $data['companyname'] = $this->uri->segment(4);
			$data['allNationalities'] = $this->ModelLabour->getAllNationalities();
			$data['allworktrade'] = $this->ModelLabour->getAllWorkTrade(); 
			$data['allCountries'] = $this->ModelLabour->getAllCountries();
			$data['allWOTYPE'] = $this->ModelSpimg->getWOtype();
			
			$this->load->view('spimg/reg_new_labour', $data);			
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
		$data['allWOTYPE'] = $this->ModelSpimg->getWOtype();
		//$data['allLabour'] = $this->ModelRenewal->getAllLabor();	
		
		$sql = "insert into wo_fcl_g1g3
		        (fcl_woid,fcl_passno,fcl_permitno,fcl_add,fcl_passexp,fcl_salary,fcl_wt,fcl_next_of_kin,fcl_relationship,fcl_year_renewal,
				fcl_wo_type,fcl_pass,fcl_name,fcl_nationality,fcl_newpassno,fcl_dob,fcl_gender,fcl_country,fcl_check)
                values
                ('$workorderid','$passno','$permitno','$add','$passexp','$salary','$wt','$nok','$relationship','$yearrenew',
				 '$wotype','$chkpass',".$this->db->escape($name).",'$nationality','$newpassno','$dob','$gender','$country','OUT')"; 
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
        $this->load->view('spimg/reg_new_labour', $data);	
		
		}
		
		/* Enhancement of SKIM for G1G3 (END) */
		
			
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
        
		  $this->load->view('spimg/reg_new_legal', $data);			  			
		}
	
		function spimDashbrd(){
			$data['overall'] = $this->ModelSpimg->getWorkordersByStatus("overall", "sum");
			$data['open'] = $this->ModelSpimg->getWorkordersByStatus("open", "sum");
			$data['totlabreg'] = $this->ModelSpimg->getCurrentStock("N","sum");
			$data['totlabrel'] = $this->ModelSpimg->getWorkordersByLabour("OUT","sum");

			$data['totwo1'] = $this->ModelSpimg->getWorkordersByProcess("1","sum");
			$data['totwo2'] = $this->ModelSpimg->getWorkordersByProcess("2","sum");			
			$data['totwo3'] = $this->ModelSpimg->getWorkordersByProcess("3","sum");
			$data['totwo4'] = $this->ModelSpimg->getWorkordersByProcess("4","sum");
			$data['totwo5'] = $this->ModelSpimg->getWorkordersByProcess("5","sum");
			$data['totwo6'] = $this->ModelSpimg->getWorkordersByProcess("6","sum");
			$data['totwo7'] = $this->ModelSpimg->getWorkordersByProcess("7","sum");
			$data['totwo8'] = $this->ModelSpimg->getWorkordersByProcess("8","sum");
			$data['totwo9'] = $this->ModelSpimg->getWorkordersByProcess("9","sum");
			
			$data['less0'] = $this->ModelSpimg->getWoByExpiryCont("less0m","sum"); 
			$data['less1'] = $this->ModelSpimg->getWoByExpiryCont("less1m","sum");
			$data['less2'] = $this->ModelSpimg->getWoByExpiryCont("less2m","sum"); 
			$data['less3'] = $this->ModelSpimg->getWoByExpiryCont("less3m","sum");
			
			$data['pass2wks'] = $this->ModelLabour->getLaborByPermitPassExpiry('wkr_passexp', 0.5, 'total', 'allcountry');
			
			$currentuser = $this->session->userdata('username');
			$data['woUnderCurrentUser'] = $this->ModelSpimg->getWoUnderCurrentUser($currentuser);
			
			$this->load->view('spimg/spim_dashboard', $data);	
		}	
		
		function dashboardProcess(){
			$type = $this->uri->segment(3);			
			if($type=="1") $hdr = "Work Order Submitted";
			elseif($type=="2") $hdr = "Process CIMS";
			elseif($type=='3') $hdr='Penerimaan Permohonan';
			elseif($type=='4') $hdr='Semakan';
			elseif($type=='5') $hdr='Temuduga';
			elseif($type=='6') $hdr='Kelulusan JKK Pelulus';
			elseif($type=='7') $hdr='Labour Check-Out';
			elseif($type=='8') $hdr='Labour Check-In';
			elseif($type=='9') $hdr='Closed';
			
			$data['woRecord'] = $this->ModelSpimg->getWorkordersByProcess($type, "record");
			$data['hdr'] = $hdr;
			$this->load->view('spimg/spim_dashboard_lists', $data);
		}
		
		function dashboardLaborWo(){
			$type = $this->uri->segment(3);
			if($type == "chkout") {
				$hdr = "Labour In Work Order";
				$progress = "OUT";
				$data['woRecord'] = $this->ModelSpimg->getWorkordersByLabour($progress, "record");
			}
			$data['hdr'] = $hdr;
			$this->load->view('spimg/spim_dashboard_laborwo', $data);
		}
		
		function dashboardLaborList(){
			$type = $this->uri->segment(3);
			if($type == "overall") {
				$hdr = "Registered G1G3 Labour";
				$progress = "N";
				$data['woRecord'] = $this->ModelSpimg->getCurrentStock($progress, "record");
			}
			$data['hdr'] = $hdr;
			$this->load->view('spimg/spim_dashboard_laborlists', $data);
		}
		
		function dashboardList(){
			$type = $this->uri->segment(3);
			
			if($type == "overall") {
				$hdr = "Overall Workorders";
				$progress = "overall";
				$data['woRecord'] = $this->ModelSpimg->getWorkordersByStatus($progress, "record");
			}
			else if($type == "closed") {
				$hdr = "Total Workorders (closed)";
				$progress = "receive calling visa";
				$data['woRecord'] = $this->ModelSpimg->getWorkordersByStatus($progress, "record");
			}
			else if($type == "open") {
				$hdr = "Total Workorders (open)";
				$progress = "open";
				$data['woRecord'] = $this->ModelSpimg->getWorkordersByStatus($progress, "record");
			}
			else{
				//dummy else
			}
			$data['hdr'] = $hdr;		
			$this->load->view('spimg/spim_dashboard_lists', $data);
		}
		//-------------------------
		function dashboardListExpiry(){
			$type = $this->uri->segment(3);
			$noOfMon = $this->uri->segment(4);
			
			if($type == "less0m")
				$hdr = "Expiry of Contract < 0 month";
			elseif($type == "less1m")
				$hdr = "Expiry of Contract < 1 month";
			elseif($type == "less2m")
				$hdr = "Expiry of Contract < 2 month";
			elseif($type == "less3m")
				$hdr = "Expiry of Contract < 3 month";

			$data['woRecord'] = $this->ModelSpimg->getWoByExpiryCont($type,"record");
			$data['hdr'] = $hdr;
			$data['noOfMonths'] = $noOfMon;
			$this->load->view('spimg/spim_dashboard_expiry', $data);
		}
		
		/*************** View & Print ****************/
		function viewReminderExpiry(){
			$clabno = $this->uri->segment(3);
			$reminderType = $this->uri->segment(4);
			$workorderid = $this->uri->segment(5);
			$fieldname = "wo_ransitdate";
			
			if($reminderType == "3") $reminderTypeTitle = "First Reminder";
			else if($reminderType == "2") $reminderTypeTitle = "Second Reminder";
			else if($reminderType == "1") $reminderTypeTitle = "Final Reminder";
			else $reminderTypeTitle = "";
			
			//$data['expiredWorkersRecord'] = $this->ModelSpimg->listExpiryByCompany($fieldname, $noOfMonths, 'listOfWorkers', $clabNo);
			$data['worker'] = $this->ModelSpimg->getWorkerbyWO($workorderid);
			$data['reminderTypeTitle'] = $reminderTypeTitle;
			$data['ctr'] = $this->ModelSpimg->getCtrByClabNo($clabno);
			
			$this->load->view('spimg/ctr_print_reminder', $data);
		}
		function printReminderExpiry(){
			$clabno = $this->uri->segment(3);
			$reminderType = $this->uri->segment(4);
			$workorderid = $this->uri->segment(5);
			$fieldname = "wo_ransitdate";
			
			if($reminderType == "3") $reminderTypeTitle = "First Reminder";
			else if($reminderType == "2") $reminderTypeTitle = "Second Reminder";
			else if($reminderType == "1") $reminderTypeTitle = "Final Reminder";
			else $reminderTypeTitle = "";
			
			$data['worker'] = $this->ModelSpimg->getWorkerbyWO($workorderid);
			$data['reminderTypeTitle'] = $reminderTypeTitle;
			$data['ctr'] = $this->ModelSpimg->getCtrByClabNo($clabno);
			
			//save to database, mark as printed
			$isAlreadyPrinted = $this->ModelSpimg->checkExistingPrintRecord($clabno, $reminderType, $fieldname);
			if($isAlreadyPrinted->num_rows() == 0){
				$nextprintID = $this->ModelSpimg->getNextPrintLetterID();
				$currentuserid = $this->session->userdata('emp_id');
				
				$docType = $fieldname;
				$docDuration = $reminderType;
				$printedQuery = "INSERT INTO wo_printletter_history (print_id, print_ctr_clabno, print_date, print_by, print_doctype, print_docduration) 
								VALUES ($nextprintID, '$clabno', NOW(), $currentuserid, '$docType', $docDuration);";
				$this->db->query($printedQuery);
			}			
			$data['printMsg'] = " onload=\"window.print();\"";
			
			$this->load->view('spimg/ctr_print_reminder', $data);
		}
		/***************END****************/
		
		function newWorkOrder(){
			$this->load->view('spimg/new_workorder_pt1');	
		}
		
		function newWOSearchCtr(){
			$searchby = trim($_POST['searchby']);
			$keyword = trim($_POST['keyword']);
			
			$data['ctrRecord'] = $this->ModelSpimg->searchCtr($searchby, $keyword);
			
			$this->load->view('spimg/new_workorder_pt1', $data);
		}
		
		function newWorkOrderPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$clabno = $this->uri->segment(3);
				
				$ctrRecord = $this->ModelSpimg->getCtrByClabNoW($clabno);
				$data['ctrRow'] = $ctrRecord->row();
				$data['allCountries'] = $this->ModelSpimg->getAllCountries();
				$data['allAgencies'] = $this->ModelSpimg->getAllAgencies();
				
				$this->load->view('spimg/new_workorder_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function newWorkOrderPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wo_id = $this->ModelSpimg->getNextWONumber();
				$wonum_firstpart = "0000" . $wo_id;
				$workorderno = substr($wonum_firstpart, -5) . "/" . date('m') . "/" . date('y');//get the rightmost four digit
				$wo_date = date('Y-m-d', strtotime($_POST['dtsubmit']));
				//WORKORDER DETAILS
				$wo_clab_no = $_POST['txtclabno'];
				$wo_fcl_total = $_POST['txtfcltotal'];
				$wo_fcl_country = $_POST['selcountry'];
				//$wo_agency = $_POST['selagency'];
				/*if(isset($_POST['chkjtk'])) $wo_jtk_check = '1';
				else $wo_jtk_check = '0';
				$wo_jtk_ref = $_POST['txtrefjtk'];*/
				if(isset($_POST['chkisreplace'])) 
					$wo_isreplacement = '1';
				else 
					$wo_isreplacement = '0';
				$wo_replace_date = $_POST['dtreplacement'];
					if($wo_replace_date != "") $wo_replace_date = date('Y-m-d', strtotime($wo_replace_date));
					else $wo_replace_date = '0000-00-00';
				$wo_replace_reason = $_POST['replacereason'];
				
				if(isset($_POST['iswithd'])) 
					$wo_iswithdrawal = '1';
				else 
					$wo_iswithdrawal = '0';
				/*$wo_withd_date = $_POST['dtwithd'];
					if($wo_withd_date != "") $wo_withd_date = date('Y-m-d', strtotime($wo_withd_date));
					else $wo_withd_date = "0000-00-00";
				$wo_withd_reason = $_POST['reasonwithd'];*/
				$wo_personincharge = $_POST['txtPersonInCharge'];
				$wo_datesubmit = $_POST['dtsubmit'];
					if($wo_datesubmit != "") $wo_datesubmit = date('Y-m-d', strtotime($wo_datesubmit));
					else $wo_datesubmit = "0000-00-00";
				$wo_keyin_by = $_POST['txtkeyinby'];
				$wo_keyin_date = $_POST['dtkeyin'];
					if($wo_keyin_date != "") $wo_keyin_date = date('Y-m-d', strtotime($wo_keyin_date));
					else $wo_keyin_date = "0000-00-00";
				//$wo_visa_date = $_POST['dtvisa'];
				//	if($wo_visa_date != "") $wo_visa_date = date('Y-m-d', strtotime($wo_visa_date));
				//	else $wo_visa_date = "0000-00-00";	
				$wo_sendername = $_POST["txtsendername"];	
				$wo_senderic = $_POST["txtsenderic"];	
				$wo_senderctc = $_POST["txtsenderctc"];	

				$ctr_contactperson = $_POST['txtcontact'];
				$ctr_contactnumber = $_POST['txtcontactno'];
				$wo_attn_off = $_POST["txtattnoff"];
				
				//REQUIRED DOCUMENTS
				if(isset($_POST['chkreqform'])) $wo_doc_rqform = '1';
				else $wo_doc_rqform = '0';
				
				if(isset($_POST['chkcompany'])) $wo_doc_company = '1';
				else $wo_doc_company = '0';
				
				if(isset($_POST['chkawardletter'])) $wo_doc_awardletter = '1';
				else $wo_doc_awardletter = '0';
				
				if(isset($_POST['chknric'])) $wo_doc_nric = '1';
				else $wo_doc_nric = '0';
				
				if(isset($_POST['chkfinance'])) $wo_doc_finance = '1';
				else $wo_doc_finance = '0';
				
				if(isset($_POST['chkbankstmt'])) $wo_doc_bankstmt = '1';
				else $wo_doc_bankstmt = '0';
				
				if(isset($_POST['chkinsurance'])) $wo_doc_insurance = '1';
				else $wo_doc_insurance = '0';
				
				if(isset($_POST['chkcert'])) $wo_doc_cert = '1';
				else $wo_doc_cert = '0';
				
				if(isset($_POST['chkphoto'])) $wo_doc_photo = '1';
				else $wo_doc_photo = '0';
				
				if(isset($_POST['chkcimsdoc'])) $wo_doc_cimsdoc = '1';
				else $wo_doc_cimsdoc = '0';
				
				$doc_rqformdate = $_POST['dtreqform'];
					if($doc_rqformdate != "") $doc_rqformdate = date('Y-m-d', strtotime($doc_rqformdate));
					else $doc_rqformdate = "0000-00-00";
				$doc_companydate = $_POST['dtcompany'];
					if($doc_companydate != "") $doc_companydate = date('Y-m-d', strtotime($doc_companydate));
					else $doc_companydate = "0000-00-00";
				$doc_awardletterdate = $_POST['dtawardletter']; 
					if($doc_awardletterdate != "") $doc_awardletterdate = date('Y-m-d', strtotime($doc_awardletterdate));
					else $doc_awardletterdate = "0000-00-00";
				$doc_nricdate = $_POST['dtnric']; 
					if($doc_nricdate != "") $doc_nricdate = date('Y-m-d', strtotime($doc_nricdate));
					else $doc_nricdate = "0000-00-00";
				$doc_financedate = $_POST['dtfinance'];
					if($doc_financedate != "") $doc_financedate = date('Y-m-d', strtotime($doc_financedate));
					else $doc_financedate = "0000-00-00";
				$doc_bankstmtdate = $_POST['dtbankstmt'];
					if($doc_bankstmtdate != "") $doc_bankstmtdate = date('Y-m-d', strtotime($doc_bankstmtdate));
					else $doc_bankstmtdate = "0000-00-00";
				
				$doc_insurancedate = $_POST['dtinsurance'];
					if($doc_insurancedate != "") $doc_insurancedate = date('Y-m-d', strtotime($doc_insurancedate));
					else $doc_insurancedate = "0000-00-00";
				$doc_certdate = $_POST['dtcert'];
					if($doc_certdate != "") $doc_certdate = date('Y-m-d', strtotime($doc_certdate));
					else $doc_certdate = "0000-00-00";
				$doc_photodate = $_POST['dtphoto'];
					if($doc_photodate != "") $doc_photodate = date('Y-m-d', strtotime($doc_photodate));
					else $doc_photodate = "0000-00-00";
				$doc_cimsdocdate = $_POST['dtcimsdoc'];
					if($doc_cimsdocdate != "") $doc_cimsdocdate = date('Y-m-d', strtotime($doc_cimsdocdate));
					else $doc_cimsdocdate = "0000-00-00";	
				
				$wo_doc_datecomplete =$_POST['dtcompletedoc'];
				if($wo_doc_datecomplete != "") $wo_doc_datecomplete = date('Y-m-d', strtotime($wo_doc_datecomplete));
				else $wo_doc_datecomplete = "0000-00-00";
				
				//PAYMENT
				$wo_pay_refno = $_POST['payrefno'];
				$wo_pay_adminfee = $_POST['seladminfee'];
				$wo_pay_levy = $_POST['sellevy'];
				$wo_pay_plks = $_POST['selplks'];
				$wo_pay_agencyfee = $_POST['selagencyfee'];
				$wo_pay_fomema = $_POST['selfomema'];
				$wo_pay_visa = $_POST['selvisa'];
				$wo_pay_ig = $_POST['selig'];				
				$wo_pay_fwhs = $_POST['selfwhs'];
				$wo_pay_deposit = $_POST['seldeposit'];
				$wo_pay_green= $_POST['selgreen'];
				$wo_pay_transit = $_POST['seltransit'];
				$wo_pay_compound = $_POST['selcomp'];
				$wo_pay_handfee = $_POST['selhandfee'];
				$wo_pay_swabfee = $_POST['selswabfee'];
				
				//$wo_pay_fwcs = $_POST['selfwcs'];
				
				//calculate current processing stage
				$wo_latest_progress = "workorder submitted";
				
				//INSERT DATA
				$woQuery = "INSERT INTO workorders (wo_id, wo_num, wo_date, wo_clab_no, wo_fcl_total, wo_fcl_country, wo_isreplacement, wo_replace_date, wo_replace_reason, 
		    			    wo_iswithdrawal,wo_personincharge, wo_datesubmit, wo_keyin_by, wo_keyin_date,wo_spim_status,wo_sender_name,wo_sender_ic,wo_sender_contact,wo_attn_officer) VALUES ($wo_id, '$workorderno', '$wo_date', '$wo_clab_no', 
		    				$wo_fcl_total, '$wo_fcl_country', '$wo_isreplacement', '$wo_replace_date', '$wo_replace_reason', 
		    				'$wo_iswithdrawal', '$wo_personincharge', '$wo_datesubmit', '$wo_keyin_by', '$wo_keyin_date','G','$wo_sendername','$wo_senderic','$wo_senderctc','$wo_attn_off')";				
		    	
				$docQuery = "INSERT INTO wo_doc (doc_woid, doc_rqform, doc_company, doc_awardletter, doc_nric, doc_finance, doc_bankstmt,doc_insurance, doc_cert, doc_photo, doc_datecomplete, 
							doc_rqformdate, doc_company_date, doc_awardletterdate, doc_nric_date, doc_finance_date, doc_bankstmt_date,doc_insurance_date,doc_cert_date,doc_photo_date,doc_cimsdoc,doc_cimsdocdate)
	            			 VALUES ($wo_id, '$wo_doc_rqform', '$wo_doc_company', '$wo_doc_awardletter', '$wo_doc_nric', '$wo_doc_finance', '$wo_doc_bankstmt', '$wo_doc_insurance','$wo_doc_cert','$wo_doc_photo','$wo_doc_datecomplete', 
							 '$doc_rqformdate', '$doc_companydate', '$doc_awardletterdate', '$doc_nricdate', '$doc_financedate', '$doc_bankstmtdate', '$doc_insurancedate', '$doc_certdate', '$doc_photodate', '$wo_doc_cimsdoc', '$doc_cimsdocdate')";
							 
	            $paymentQuery = "INSERT INTO wo_payment (pay_woid, pay_refno, pay_adminfee, pay_levy, pay_plks, pay_agencyfee, pay_fomema, pay_visa, pay_ig, pay_fwhs, pay_deposit, pay_green, pay_transit,pay_compound,pay_handfee,pay_swabfee) 
	            			     VALUES ($wo_id, '$wo_pay_refno', '$wo_pay_adminfee', '$wo_pay_levy', '$wo_pay_plks', '$wo_pay_agencyfee', '$wo_pay_fomema', '$wo_pay_visa', '$wo_pay_ig', '$wo_pay_fwhs', '$wo_pay_deposit', '$wo_pay_green', '$wo_pay_transit', '$wo_pay_compound', '$wo_pay_handfee', '$wo_pay_swabfee')";
	            			     	           
			   $statusQuery =  "INSERT INTO wo_status (status_woid,wo_latest_progress) values ($wo_id,'$wo_latest_progress')";   			    
								

				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($woQuery);
				$this->db->query($docQuery);
				$this->db->query($paymentQuery);
				$this->db->query($statusQuery);
			/*	if($wo_isjim_ack !== '0' &&$wo_receivevisa_approve !== '0' && $wo_receivevisa_reject!=='0' && strlen(wo_receivevisa_comment) > 0){
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
				
				redirect('contSpimG/updateWorkOrderPt2/'.$wo_id .'/add');
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
				
				$this->load->view('spimg/new_workorder_upload', $data);	
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
				$config['upload_path'] = './uploads/spimg';
				$config['allowed_types'] = 'xlsx|jpg|xlsx|xls|pdf|txt|doc|png|csv';		//usually MIME extension
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
					
					$upload_id = $this->ModelSpimg->getNextUploadID();
					$sqlQuery = "INSERT INTO wo_upload (upload_id, upload_woid, upload_filetype, upload_by, upload_date, upload_destfilename, upload_path)
								 VALUES ($upload_id, $workorderid, 'FCL List', $uploadby, '$uploaddate', '$dest_filename', '$filepath');";
					
					$this->db->query($sqlQuery);
					
					$data['successMsg'] = "File upload success. You may upload another file now.";
				}
				
				$this->load->view('spimg/new_workorder_upload', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function updateWorkOrder(){
			$this->load->view('spimg/update_workorder_pt1');
		}
		
		function updateWorkOrderSearch(){
			$searchby = $_POST['searchby'];
			$keyword = $_POST['txtkeyword'];
			
			//######later get the data based on workorderid#####
			$data['ctrRecord'] = $this->ModelSpimg->getWOByWoidOrCompname($searchby, $keyword);
			
			$this->load->view('spimg/update_workorder_pt1', $data);
		}
		
		function updateWorkOrderPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$workorderid = $this->uri->segment(3);
				$data['successMsg'] = $this->uri->segment(4);
				$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
				$data['allCountries'] = $this->ModelSpimg->getAllCountries();
				$data['allAgencies'] = $this->ModelSpimg->getAllAgencies();
				$data['allPhTrackLog'] = $this->ModelSpimg->getAllPhTrackLog($workorderid);
				$data['allFCLFiles'] = $this->ModelSpimg->getAllFCLFiles($workorderid);
				$data['allFCLUpload'] = $this->ModelSpimg->getAllFCLUpload($workorderid);
				$data['allLegalFiles'] = $this->ModelSpimg->getAllLegalList($workorderid);						
				// Enhancement of SKIM for G1G3 (START) 
				$data['allSiteVisit'] = $this->ModelSpimg->getAllSiteVisitList($workorderid);	
				
				// Enhancement of SKIM for G1G3 (END)				
				$this->load->view('spimg/update_workorder_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function updateWorkOrderPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wo_id = $_POST['txtwoid'];
				
				//WORKORDER DETAILS
				$wo_fcl_total = $_POST['txtfcltotal'];
				$wo_fcl_country = $_POST['selcountry'];
				//$wo_agency = $_POST['selagency'];

				if(isset($_POST['chkisreplace'])) 
					$wo_isreplacement = '1';
				else 
					$wo_isreplacement = '0';
				$wo_replace_date = $_POST['dtreplacement'];
					if($wo_replace_date != "") $wo_replace_date = date('Y-m-d', strtotime($wo_replace_date));
					else $wo_replace_date = '0000-00-00';
				$wo_replace_reason = $_POST['replacereason'];
				
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
				$ctr_contactperson = $_POST['txtcontact'];
				$ctr_contactnumber = $_POST['txtcontactno'];
				$wo_attn_off = $_POST["txtattnoff"];
				$wo_contdur = $_POST["contdur"];				
				$wo_fclapv = $_POST["txtfcltotalapv"];
				$wo_projname = $_POST["txtprojname"];
				
				//REQUIRED DOCUMENTS
				//if(isset($_POST['chkreqform'])) $wo_doc_rqform = '1';
				//else $wo_doc_rqform = '0';
				
				if($_POST['chkreqform1']==1) $wo_doc_rqform = '1';
				else $wo_doc_rqform = '0';
				
				if($_POST['chkcompany1']==1) $wo_doc_company = '1';
				else $wo_doc_company = '0';
				
				if($_POST['chkawardletter1']==1) $wo_doc_awardletter = '1';
				else $wo_doc_awardletter = '0';
				
				if($_POST['chknric1']==1) $wo_doc_nric = '1';
				else $wo_doc_nric = '0';
				
				if($_POST['chkfinance1']==1) $wo_doc_finance = '1';
				else $wo_doc_finance = '0';
				
				if($_POST['chkbankstmt1']==1) $wo_doc_bankstmt = '1';
				else $wo_doc_bankstmt = '0';
				
				if($_POST['chkinsurance1']==1) $wo_doc_insurance = '1';
				else $wo_doc_insurance = '0';
				
				if($_POST['chkcert1']==1) $wo_doc_cert = '1';
				else $wo_doc_cert = '0';
				
				if($_POST['chkphoto1']==1) $wo_doc_photo = '1';
				else $wo_doc_photo = '0';
				
				if($_POST['chkcimsdoc']==1) $wo_doc_cimsdoc = '1';
				else $wo_doc_cimsdoc = '0';
				
				
				$doc_rqformdate = $_POST['dtreqform'];
					if($doc_rqformdate != "") $doc_rqformdate = date('Y-m-d', strtotime($doc_rqformdate));
					else $doc_rqformdate = "0000-00-00";
				$doc_company_date = $_POST['dtcompany'];
					if($doc_company_date != "") $doc_company_date = date('Y-m-d', strtotime($doc_company_date));
					else $doc_company_date = "0000-00-00";
				$doc_awardletterdate = $_POST['dtawardletter']; 
					if($doc_awardletterdate != "") $doc_awardletterdate = date('Y-m-d', strtotime($doc_awardletterdate));
					else $doc_awardletterdate = "0000-00-00";
				$doc_nric_date = $_POST['dtnric']; 
					if($doc_nric_date != "") $doc_nric_date = date('Y-m-d', strtotime($doc_nric_date));
					else $doc_nric_date = "0000-00-00";
				$doc_finance_date = $_POST['dtfinance'];
					if($doc_finance_date != "") $doc_finance_date = date('Y-m-d', strtotime($doc_finance_date));
					else $doc_finance_date = "0000-00-00";
				$doc_bankstmt_date = $_POST['dtbankstmt'];
					if($doc_bankstmt_date!= "") $doc_bankstmt_date = date('Y-m-d', strtotime($doc_bankstmt_date));
					else $doc_bankstmt_date = "0000-00-00";
				$doc_insurance_date = $_POST['dtinsurance'];
					if($doc_insurance_date != "") $doc_insurance_date = date('Y-m-d', strtotime($doc_insurance_date));
					else $doc_insurance_date = "0000-00-00";
				$doc_cert_date = $_POST['dtcert'];
					if($doc_cert_date != "") $doc_cert_date = date('Y-m-d', strtotime($doc_cert_date));
					else $doc_cert_date = "0000-00-00";
				$doc_photo_date = $_POST['dtphoto'];
					if($doc_photo_date != "") $doc_photo_date = date('Y-m-d', strtotime($doc_photo_date));
					else $doc_photo_date = "0000-00-00";
				$doc_cimsdocdate = $_POST['dtcimsdoc'];
					if($doc_cimsdocdate != "") $doc_cimsdocdate = date('Y-m-d', strtotime($doc_cimsdocdate));
					else $doc_cimsdocdate = "0000-00-00";
				
				$wo_doc_datecomplete =$_POST['dtcompletedoc'];
				if($wo_doc_datecomplete != "") $wo_doc_datecomplete = date('Y-m-d', strtotime($wo_doc_datecomplete));
				else $wo_doc_datecomplete = "0000-00-00";
				//$wo_visa_date =$_POST['dtvisa'];
				//if($wo_visa_date != "") $wo_visa_date = date('Y-m-d', strtotime($wo_visa_date));
				//else $wo_visa_date = "0000-00-00";
				
				//PAYMENT
				$wo_pay_refno = $_POST['payrefno'];
				if(isset($_POST['seladminfee'])) $wo_pay_adminfee = $_POST['seladminfee']; else $wo_pay_adminfee = 'NO';
				if(isset($_POST['sellevy'])) $wo_pay_levy = $_POST['sellevy']; else $wo_pay_levy = 'NO';
				if(isset($_POST['selplks'])) $wo_pay_plks = $_POST['selplks']; else $wo_pay_plks =  'NO';
				if(isset($_POST['selagencyfee'])) $wo_pay_agencyfee = $_POST['selagencyfee']; else $wo_pay_agencyfee = 'NO';
				if(isset($_POST['selfomema'])) $wo_pay_fomema = $_POST['selfomema']; else $wo_pay_fomema = 'NO';
				if(isset($_POST['selvisa'])) $wo_pay_visa = $_POST['selvisa']; else $wo_pay_visa = 'NO';
				if(isset($_POST['selig'])) $wo_pay_ig = $_POST['selig']; else $wo_pay_ig = 'NO';				
				if(isset($_POST['selfwhs'])) $wo_pay_fwhs = $_POST['selfwhs']; else $wo_pay_fwhs = 'NO';
				if(isset($_POST['seldeposit'])) $wo_pay_deposit = $_POST['seldeposit']; else $wo_pay_deposit = 'NO';
				if(isset($_POST['selgreen'])) $wo_pay_green = $_POST['selgreen']; else $wo_pay_green = 'NO';
				if(isset($_POST['seltransit'])) $wo_pay_transit = $_POST['seltransit']; else $wo_pay_transit = 'NO';
				if(isset($_POST['selcomp'])) $wo_pay_compound = $_POST['selcomp']; else $wo_pay_compound = 'NO';
				if(isset($_POST['selhandfee'])) $wo_pay_handfee = $_POST['selhandfee']; else $wo_pay_handfee = 'NO';
				if(isset($_POST['selswabfee'])) $wo_pay_swabfee = $_POST['selswabfee']; else $wo_pay_swabfee = 'NO';
				
				//PROGRESS of WORKORDER			
				if(isset($_POST['chkisprocess'])){
					$wo_isprocess = '1';
					$wo_isprocess_ischecked = '1';
					$wo_processby = $_POST['txtprocessby'];
					$wo_processdate = $_POST['dtprocess'];
					if($wo_processdate != "") $wo_processdate = date('Y-m-d', strtotime($wo_processdate));
					else $wo_processdate = "0000-00-00";				
					$wo_process_comment = $_POST['txtprocesscomment'];
				}else $wo_isprocess = '0';
				
				if(isset($_POST['chkisreceive'])){
					$wo_isreceive = '1';
					$wo_isreceive_ischecked = '1';
					$wo_receiveby = $_POST['txtreceiveby'];
					$wo_receivedate = $_POST['dtreceive'];
					if($wo_receivedate != "") $wo_receivedate = date('Y-m-d', strtotime($wo_receivedate));
					else $wo_receivedate = "0000-00-00";				
					$wo_receive_comment = $_POST['txtreceivecomment'];
				}else $wo_isreceive = '0';	
				
				if(isset($_POST['chknaziran'])){
					$wo_isnaziran = '1';
					$wo_isnaziran_ischecked = '1';
					$wo_naziranby = $_POST['txtnaziranby'];
					$wo_nazirandate = $_POST['dtnaziran'];
					if($wo_nazirandate != "") $wo_nazirandate = date('Y-m-d', strtotime($wo_nazirandate));
					else $wo_nazirandate = "0000-00-00";				
					$wo_nazirancomment = $_POST['txtnazirancomment'];
				}else $wo_isnaziran = '0';
				
				if(isset($_POST['chkinterview'])){ 
					$wo_isinterview = '1';
					$wo_isinterview_ischecked = '1';
					$wo_isinterview_ischecked = '1';
					$wo_interviewby = $_POST['txtinterviewby'];
					$wo_interviewdate = $_POST['dtinterview'];
					if($wo_interviewdate != "")  $wo_interviewdate = date('Y-m-d', strtotime($wo_interviewdate));
					else $wo_interviewdate = "0000-00-00";				
					$wo_interviewcomment = $_POST['txtinterviewcomment'];
				}else $wo_isinterview = '0';
				
				if(isset($_POST['chklulus'])){ 
					$wo_islulus = '1';
					$wo_islulus_ischecked = '1';
					$wo_lulusby = $_POST['txtlulusby'];
					$wo_lulusdate = $_POST['dtlulus'];
					if($wo_lulusdate != "") $wo_lulusdate = date('Y-m-d', strtotime($wo_lulusdate));
					else $wo_lulusdate = "0000-00-00";				
					$wo_luluscomment = $_POST['txtluluscomment'];
				}else $wo_islulus = '0';
				
				if(isset($_POST['chkransit'])){
					$wo_isransit= '1';
					$wo_isransit_ischecked = '1';
					$wo_ransitby = $_POST['txtransitby'];
					$wo_ransitdate = $_POST['dtransit'];
					if($wo_ransitdate != "") $wo_ransitdate = date('Y-m-d', strtotime($wo_ransitdate));
					else $wo_ransitdate = "0000-00-00";
								
					$wo_ransitcomment = $_POST['txtransitcomment'];
				}else $wo_isransit= '0';				

				if(isset($_POST['chkhover'])){
					$wo_ishover = '1';
					$wo_ishover_ischecked = '1';
					$wo_hoverby = $_POST['txthoverby'];
					$wo_hoverdate = $_POST['dthover'];
					if($wo_hoverdate != "") $wo_hoverdate = date('Y-m-d', strtotime($wo_hoverdate));
					else $wo_hoverdate = "0000-00-00";
					$wo_hovercomment = $_POST['txthovercomment'];
				}else $wo_ishover = '0';
											
				//calculate current processing stage
				if(isset($_POST['iswithd'])){ 
					$wo_close_ack = '1';
					$wo_close_ack_ischecked = '1';					
					$wo_close_date = $_POST['dtwithd'];
					if($wo_close_date != "") $wo_close_date = date('Y-m-d', strtotime($wo_close_date));
					else $wo_close_date = "0000-00-00";
				}else $wo_close_ack = '0';		
				
				//calculate current processing stage				
				if($wo_close_ack == '1') $wo_latest_progress = "Closed";
				else if($wo_isprocess == '1') $wo_latest_progress = "Process CIMS";
				else if($wo_isreceive == '1') $wo_latest_progress = "Penerimaan Permohonan";
				else if($wo_isnaziran == '1') $wo_latest_progress = "Semakan";
				else if($wo_isinterview == '1') $wo_latest_progress = "Temuduga";
				else if($wo_islulus == '1') $wo_latest_progress = "Kelulusan JKK Pelulus";
				else if($wo_isransit == '1') $wo_latest_progress = "Labour Check-Out";
				else if($wo_ishover == '1') {$wo_latest_progress = "Labour Check-In"; $checkOutQuery = "UPDATE wo_fcl_g1g3 SET fcl_check = 'IN' WHERE fcl_woid = '$wo_id' ";}
				else $wo_latest_progress = $_POST['wo_latestprogress']; //"workorder submitted";	
								
				//Update
				$woQuery = "UPDATE workorders SET wo_fcl_total = $wo_fcl_total, wo_fcl_country = '$wo_fcl_country', wo_isreplacement = '$wo_isreplacement', wo_replace_date = '$wo_replace_date', wo_replace_reason = '$wo_replace_reason', 
		    			    wo_iswithdrawal = '$wo_iswithdrawal', wo_withd_date = '$wo_withd_date', wo_withd_reason = '$wo_withd_reason', 
							wo_personincharge = '$wo_personincharge', wo_modifiedby = '$modifiedby', wo_modifieddate = NOW(),
							wo_sender_name = '$wo_sendername', wo_sender_ic = '$wo_senderic',wo_sender_contact = '$wo_senderctc',
							wo_attn_officer = '$wo_attn_off', wo_contdur = '$wo_contdur', wo_fcl_total_apv = '$wo_fclapv', wo_g1g3_projname = '$wo_projname'
							WHERE wo_id = $wo_id";
				
		    	$docQuery = "UPDATE wo_doc SET doc_rqform = '$wo_doc_rqform', doc_company = '$wo_doc_company', doc_awardletter = '$wo_doc_awardletter', doc_nric = '$wo_doc_nric', doc_finance = '$wo_doc_finance', 
		    	             doc_bankstmt = '$wo_doc_bankstmt',doc_insurance = '$wo_doc_insurance',doc_cert = '$wo_doc_cert',doc_photo = '$wo_doc_photo', doc_cimsdoc = '$wo_doc_cimsdoc',
							 doc_datecomplete = '$wo_doc_datecomplete', doc_rqformdate = '$doc_rqformdate', doc_company_date = '$doc_company_date', doc_awardletterdate = '$doc_awardletterdate', 
							 doc_nric_date = '$doc_nric_date', doc_finance_date = '$doc_finance_date', doc_bankstmt_date= '$doc_bankstmt_date',
							 doc_insurance_date = '$doc_insurance_date', doc_cert_date = '$doc_cert_date', doc_photo_date= '$doc_photo_date', doc_cimsdocdate= '$doc_cimsdocdate'
	            			 WHERE doc_woid = $wo_id";
				
	            $paymentQuery = "UPDATE wo_payment SET pay_refno = '$wo_pay_refno', pay_adminfee = '$wo_pay_adminfee', pay_levy = '$wo_pay_levy', pay_plks = '$wo_pay_plks', 
	            				 pay_agencyfee = '$wo_pay_agencyfee', pay_fomema = '$wo_pay_fomema', pay_visa = '$wo_pay_visa', pay_ig = '$wo_pay_ig', pay_fwhs = '$wo_pay_fwhs',
								 pay_deposit = '$wo_pay_deposit',pay_green = '$wo_pay_green',pay_transit = '$wo_pay_transit', pay_compound = '$wo_pay_compound', pay_swabfee = '$wo_pay_swabfee', pay_handfee = '$wo_pay_handfee'
	            			     WHERE pay_woid = $wo_id";
	            
				
				//die($paymentQuery);	            			    
				$statusQuery = "UPDATE wo_status SET wo_latest_progress = '$wo_latest_progress'";
				if($wo_isreceive_ischecked == '1'){
					$statusQuery .= ", wo_isreceive = '$wo_isreceive', wo_receiveby = '$wo_receiveby', 
					wo_receivedate = '$wo_receivedate', wo_receive_comment = '$wo_receive_comment' ";
				}
				if($wo_isprocess_ischecked == '1'){
					$statusQuery .= ", wo_isprocess = '$wo_isprocess', wo_processby = '$wo_processby', 
					wo_processdate = '$wo_processdate', wo_process_comment = '$wo_process_comment' ";
				}
				if($wo_isnaziran_ischecked == '1'){
					$statusQuery .= ", wo_isnaziran = '$wo_isnaziran', wo_naziranby = '$wo_naziranby', 
					wo_nazirandate = '$wo_nazirandate', wo_nazirancomment = '$wo_nazirancomment' ";
				}
				if($wo_isinterview_ischecked == '1'){
					$statusQuery .= ", wo_isinterview = '$wo_isinterview', wo_interviewby = '$wo_interviewby', 
					wo_interviewdate = '$wo_interviewdate', wo_interviewcomment = '$wo_interviewcomment' ";
				}
				if($wo_islulus_ischecked == '1'){
					$statusQuery .= ", wo_islulus = '$wo_islulus', wo_lulusby = '$wo_lulusby', 
					wo_lulusdate = '$wo_lulusdate', wo_luluscomment = '$wo_luluscomment' ";
				}
				if($wo_isransit_ischecked == '1'){
					$statusQuery .= ", wo_isransit= '$wo_isransit', wo_ransitby = '$wo_ransitby', 
					wo_ransitdate = '$wo_ransitdate', wo_ransitcomment = '$wo_ransitcomment' ";
				}
				if($wo_ishover_ischecked == '1'){
					$statusQuery .= ", wo_ishover = '$wo_ishover', wo_hoverby = '$wo_hoverby', 
					wo_hoverdate = '$wo_hoverdate', wo_hovercomment = '$wo_hovercomment' ";
				}
				
				$statusQuery .= " WHERE status_woid = $wo_id";
				
				//die($statusQuery);
				//die($docQuery);
				
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($woQuery);
				$this->db->query($docQuery);
				$this->db->query($paymentQuery);
				$this->db->query($statusQuery);
				if($wo_ishover == '1') $this->db->query($checkOutQuery);
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				
				redirect('contSpimG/updateWorkOrderPt2/'.$wo_id .'/update');
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function newPhoneTrackLog(){
			$data['workorderid'] = $this->uri->segment(3);
			$data['companyname'] = $this->uri->segment(4);
			
			$this->load->view('spimg/update_workorder_phtracklog', $data);	
		}
		
		function newPhoneTrackLogSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				//hidden fields
				$woid = $_POST['workorderid'];
				$data['companyname'] = $_POST['companyname'];
				
				//phone track log
				$trackid = $this->ModelSpimg->getNextPhTrackLogID();
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
				$this->load->view('spimg/update_workorder_phtracklog', $data);	
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
			$grid->db->where("wo_spim_status ='G'");
		    $grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contSpimG";
		 	$link_edit = anchor("$baseuri/updateWorkOrderPt2/<#wo_id#>","<#wo_id#>");
		 	
			$grid->column("NO.","$link_edit", 'width="50"');
			$grid->column("WORK ORDER NO.","wo_num");
			$grid->column("COMPANY NAME","ctr_comp_name");
			$grid->column("CLAB NO.","wo_clab_no");
			$grid->column("TOTAL FCL","wo_fcl_total");
			$grid->column("FCL COUNTRY", "cty_desc");
			$grid->column("DATE SUBMIT","<callback_displaydate><#wo_datesubmit#></callback_displaydate>");			
			$grid->column("PROGRESS STATUS", "wo_latest_progress");
			//$grid->column("P IN CHARGE", "wo_personincharge");
			//$grid->column("Workorder Type", "replacement_desc");
			
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('spimg/workorder_lists', $data);	
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
			
			if ($searchby == "fcl_passno")
		    $grid->db->join("wo_fcl","workorders.wo_id = wo_fcl.fcl_woid","LEFT");
			
		    if($searchby == "ctr_comp_name" || $searchby == "ctr_clab_no" || $searchby == "fcl_passno" || $searchby == "wo_jimack_refno")
		    	$grid->db->where("$searchby LIKE '%$keyword%'");
		    else
		    	$grid->db->where("$searchby = '$keyword'");
				$grid->db->where("wo_spim_status ='G'");
		    $grid->db->order_by("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
		 	$baseuri = "contSpimG";
			
      
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
		    			
			$this->load->view('spimg/workorder_lists', $data);
		}
		
		function printCheckLits(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_printchecklist.php', $data);
		}
		
		function printAkuanPenerimaan(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_printakuan.php', $data);
		}
		//-----------------------------------------------------------------
		function printLabourChkOutForm(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			$data['worker'] = $this->ModelSpimg->getWorkerbyWO($workorderid);
			
			$this->load->view('spimg/labour_chkout_form.php', $data);
		}
		function printLabourChkInForm(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			$data['worker'] = $this->ModelSpimg->getWorkerbyWO($workorderid);
			
			$this->load->view('spimg/labour_chkin_form.php', $data);
		}
		//------------------------------------------------------------------
		
		function printHandoverList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_handover_.php', $data);
		}
		
		function printHandoverArr(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_handover_arrival.php', $data);
		}
		
			function printVDRApp(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_VDRapp.php', $data);
		}
		
			function printWPList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_SuratWakil.php', $data);
		}
		
			function printHOVDR(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_handover_ack.php', $data);
		}
		
		function printPLKSIP(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimg->getAllFCLFiles($workorderid);
		
			  $this->load->view('spim/plks_in_progress', $data);
		}
		
		function handoverletter(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimg->getAllFCLFiles($workorderid);
			  $this->load->view('spimg/handover_letter', $data);
		}
		// added by azh
		
		function confirmletter(){
		      $wono = $this->uri->segment(3); 
			  $workorderid = $this->uri->segment(4);
			  $data['woRow'] = $this->ModelSpimg->getWObyWOid($wono);
			  $data['allFCLFiles'] = $this->ModelSpimg->getAllFCLFiles($workorderid);
		
			  $this->load->view('spimg/confirm_letter', $data);
		}
		
		function printPLKS1year(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_PLKS1styear.php', $data);
		}
		
		function printSPList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_SPApp.php', $data);
		}
		
		function printCOMList(){
			$workorderid = $this->uri->segment(3);
			$data['woRow'] = $this->ModelSpimg->getWObyWOid($workorderid);
			
			$this->load->view('spimg/spim_print_COMApp.php', $data);
		}
		function viewRejectHistory(){
			$clabno = $this->uri->segment(3);
			$wo_id = $this->uri->segment(4);
			$data['ctr_comp_name'] = $this->ModelSpimg->getCtrNameByClabNo($clabno);;
			$data['clab_no'] = $clabno;
			$data['wo_id'] = $wo_id;
			
			$rejectHistoryQuery = "SELECT * FROM wo_reject_history WHERE reject_woid = '$wo_id' ORDER BY reject_id desc";
			$data['woRecord'] = $this->db->query($rejectHistoryQuery);
			
			$this->load->view('spimg/vdr_reject_history', $data);
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
				
				
				$nextRejectHistID = $this->ModelSpimg->getNextRejectHistoryId();
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
				
				redirect('contSpimG/viewRejectHistory/' . $clab_no. '/' . $wo_id); 
			}
			else{
				$this->load->view('session_expired.php');
			}
		}
		
	}
?>