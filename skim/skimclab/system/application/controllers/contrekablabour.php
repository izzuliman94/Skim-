<?php
	class ContrekabLabour extends Controller {
		function ContrekabLabour(){
			parent::Controller();
			$this->load->Model('ModelrekabLabour');
			$this->load->Model('ModelrekabContractor');
			$this->load->Model('ModelReports');
			$this->load->library('rapyd');	
			$this->load->library('session');
			$this->load->database();
		}
		
		function printLetterMain(){
		
		$wkr_id = $this->uri->segment(3);
		$clabno = $this->uri->segment(4);
		$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
		$data['ctr'] = $this->ModelrekabLabour->getCtrByClabNo($clabno);
		$this->load->view('rekablabor/labor_print_rekab_app',$data);
		
		}
		
		function getcountry(){
		   $frm = $this->uri->segment(3);
		   $data['countrylist'] = $this->ModelrekabLabour->getAllCountry();
		   $data['form'] = $frm;
		   $this->load->view('rekablabor/countrylist',$data);	 
		}
		
		function labourDashbrd(){
			$data['totalLabours'] = $this->ModelrekabLabour->getTotalLaboursByStatus('', 0, 'total');
			$data['totalActive'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_status', 1, 'total');
			$data['totalInactive'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_status', 2, 'total');
			$data['totalRegistered'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 1, 'total');
			$data['totalAvailable'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 4, 'total');
			$data['totalBooked'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 6, 'total');
			$data['totalHired'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 7, 'total');
			$data['totalRunaway'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 8, 'total');
			$data['totalUnknown'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 9, 'total');
			$data['totalDeported'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 10, 'total');
			$data['totalDeath'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 11, 'total');
			$data['totalPermitExpired'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 12, 'total');
			$data['totalWithoutNotice'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 14, 'total');
			$data['totalWithNotice'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 15, 'total');
			$data['totalUnfit'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 16, 'total');
			$data['totalCancelPermit'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 17, 'total');
			$data['totalEvicted'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 18, 'total');
			$data['totalRejected'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 3, 'total');
			$data['totalRehiring'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 21, 'total');
			$data['totalAccepted'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 2, 'total');
			$data['totalMip'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 5, 'total');
			$data['totalPtm'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 20, 'total');
			$data['totalPassExp'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 13, 'total');
			$data['totalCancelPermit6P'] = $this->ModelrekabLabour->getTotalLaboursByStatus('wkr_transtatus', 19, 'total');
			
			//expiry statistics
			$data['plks2wks'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_permitexp', 0.5, 'total', 'allcountry');
			$data['plks1mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_permitexp', 1, 'total', 'allcountry');
			$data['plks2mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_permitexp', 2, 'total', 'allcountry');
			$data['plks3mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_permitexp', 3, 'total', 'allcountry');
			$data['plks4mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_permitexp', 4, 'total', 'allcountry');
			$data['pass2wks'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_passexp', 0.5, 'total', 'allcountry');
			$data['pass1mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_passexp', 1, 'total', 'allcountry');
			$data['pass2mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_passexp', 2, 'total', 'allcountry');
			$data['pass3mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_passexp', 3, 'total', 'allcountry');
			$data['pass4mth'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry('wkr_passexp', 4, 'total', 'allcountry');
			
			$this->load->view('rekablabor/dashboard', $data);
		}
		
		function listWkrByExpiry(){
			$fieldType = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$cty_id = $this->uri->segment(5);
			
			$cty_desc = $this->ModelrekabLabour->getCtyByCtyID($cty_id);
			
			if($noOfMonths == 0.5) $duration = "2 weeks";
			else if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldType == 'wkr_permitexp'){
				$data['title'] = "FCL Details (Permit Expiry Within $duration, COUNTRY = $cty_desc)";
			}
			else{
				$data['title'] = "FCL Details (Passport Expiry Within $duration, COUNTRY = $cty_desc)";
			}
			$data['wkrRecord'] = $this->ModelrekabLabour->getLaborByPermitPassExpiry($fieldType, $noOfMonths, 'list', $cty_id);
			$data['fieldType'] = $fieldType;
			$this->load->view('rekablabor/dashboard_listbyexpiry', $data);	
		}
		
		function viewFCLReports(){
			$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
			$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
			$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
			
			$this->load->view('rekablabor/labour_reports', $data);
		}
		
		function listbyExpiryAndCty(){
			$fieldName = $this->uri->segment(3);
			$noOfMonths = $this->uri->segment(4);
			$total = $this->uri->segment(5);
			
			if($noOfMonths == 0.5) $duration = "2 weeks";
			else if($noOfMonths == 1) $duration = "1 month";
			else $duration = $noOfMonths . " months";
			
			if($fieldName == 'wkr_permitexp'){
				$data['title'] = "List of FCL (Permit Expiry Within $duration)";
			}
			else{
				$data['title'] = "List of FCL (Passport Expiry Within $duration)";
			}
			
			$data['listByCountry'] = $this->ModelrekabLabour->listExpiryByCountry($fieldName, $noOfMonths);
			$data['total'] = $total;
			$data['fieldName'] = $fieldName;
			$data['noOfMonths'] = $noOfMonths;
			
			$this->load->view('rekablabor/dashbrd_listybyexpiry_cty', $data);
		}	
		
		function listByStatus(){
			$statusType = $this->uri->segment(3);
			$statusID = $this->uri->segment(4);
			
			$data['status'] = $this->ModelrekabLabour->getStatusByStatusID($statusID);
			$data['wkrRecord'] = $this->ModelrekabLabour->getTotalLaboursByStatus($statusType, $statusID, 'list');
			
			$this->load->view('rekablabor/dashboard_listbystatus', $data);	
		}
		
		function newLabour(){
				$currentuserid = $this->session->userdata('emp_id');
				if(strlen($currentuserid) > 0){
					$this->load->view('rekablabor/labor_regis_pt1');
				}
				else{
					$this->load->view('session_expired.php');	
				}
		}
		
		function newLabourDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$passportNo = strtoupper(trim($_POST['txtPassNo']));
				$passportNo = str_replace(" ", "", $passportNo);	//remove white space
				
				$existingLabour = $this->ModelrekabLabour->labourExists($passportNo);
			
				if($existingLabour->num_rows() == 0){
					$data['passportNo'] = $passportNo;
					
					$data['allSector'] = $this->ModelrekabLabour->getAllSector();
					$data['alltype'] = $this->ModelrekabLabour->getAlltype();
					$data['allStates'] = $this->ModelrekabLabour->getAllStates();
					$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
					$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
					$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
					$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
					$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
					$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
					$data['vdrEmployees'] = $this->ModelrekabLabour->getVDREmployees();
					
					$this->load->view('rekablabor/labor_regis_pt2', $data);
				}
				else{
					$data['existingLabour'] = $existingLabour->row();
					$this->load->view('rekablabor/labor_regis_pt1', $data);	
				}
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function newLabourDetailsSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_name = strtoupper(trim($_POST['txtname']));
				$wkr_passno = str_replace(" ", "", strtoupper(trim($_POST['txtpassno'])));
				$wkr_sector = $_POST['selsector'];
				$wkr_type = $_POST['seltype'];
				$wkr_oldpassno = trim($_POST['txtoldpassno']);
				$wkr_dob_day = $_POST['selday'];
	 			$wkr_dob_month = $_POST['selmonth'];
				$wkr_dob_year = $_POST['selyear'];
				$wkr_dob = $wkr_dob_year . "-" . $wkr_dob_month . "-" . $wkr_dob_day; //YYYY-mm-dd
				$wkr_gender = $_POST['selgender'];
				$wkr_homeaddress = strtoupper(trim($_POST['txthomeaddr']));
				$wkr_zipcode = trim($_POST['txtzipcode']);
				$wkr_country = $_POST['selcountry'];
				$wkr_address1 = strtoupper(trim($_POST['txtcuraddr1']));
				$wkr_address2 = strtoupper(trim($_POST['txtcuraddr2']));
				$wkr_address3 = strtoupper(trim($_POST['txtcuraddr3']));
				$wkr_pcode = trim($_POST['txtpcode']);
				$wkr_state = $_POST['selstate'];
				//$wkr_race = $_POST['selrace'];
				$wkr_nationality = $_POST['selnationality'];
				$wkr_agent_add1 = "";
				$wkr_agent_add2 = "";
				$wkr_agent_add3 = "";
				$wkr_agent_pcode = "";
				$wkr_agent_state = "";
				
				$wkr_passexp = date('Y-m-d', strtotime($_POST['dtPassportExp']));
				$wkr_plksno = trim($_POST['txtplksno']);
				$wkr_jtk = 0;
				$wkr_jtk_ref = $_POST["txtrefjtk"];
				
				//if the permitexp date is empty
				$wkr_permitexp = $_POST['dtPermitExp'];
				if($wkr_permitexp != "") $wkr_permitexp = date('Y-m-d', strtotime($wkr_permitexp));
				else $wkr_permitexp = "0000-00-00";
				
				$wkr_entrydate = date('Y-m-d', strtotime($_POST['dtEntry']));
				$wkr_wtrade = $_POST['txtworktrade'];
				$wkr_lastemp = strtoupper(trim($_POST['txtlastemp']));
				//$wkr_expectedemp = strtoupper(trim($_POST['txtexpectedemp']));	//field removed
				//$wkr_currentemp = $_POST['selCurrentCompany'];
				$wkr_currentemp = $_POST['txtClabNo'];
				
				
				//get workers history
				$txtcompany1 = $_POST['txtcompany1'];
				$selstate1 = $_POST['selstate1'];
				$txtcompany2 = $_POST['txtcompany2'];
				$selstate2 = $_POST['selstate2'];
				$txtcompany3 = $_POST['txtcompany3'];
				$selstate3 = $_POST['selstate3'];
				
				$personInCharge = $_POST['selEmp'];
				$orgReceipt = $_POST['txtorgReceipt'];
				$nextofkin = $_POST['txtnok'];
				$relationship = $_POST['txtrelationship'];
				$wkr_passissue = $_POST['txtpassissue'];
				$wkr_salary = $_POST['txtsalary'];
				
				$wkr_skkdate = date('Y-m-d', strtotime($_POST['dtskk']));
				$wkr_skkref = $_POST['txtskkref'];
				$wkr_offic = $_POST['officerinc'];
				$wkr_jimtel = $_POST['jimtel'];
				$wkr_jimreg = $_POST['jimreg'];
				
				$workerid = $this->ModelrekabLabour->getNextWorkerID();
				$insertQuery = "INSERT INTO rekab_workers (wkr_id, wkr_name, wkr_passno, wkr_oldpassno, wkr_dob, wkr_gender, wkr_homeaddr, wkr_zipcode, 
				                wkr_country, wkr_address1, wkr_address2, wkr_address3, wkr_pcode, wkr_state, wkr_nationality, wkr_passexp, wkr_plksno, 
				                wkr_permitexp, wkr_entrydate, wkr_wtrade, wkr_lastemp, wkr_currentemp, wkr_createdby, wkr_createddate, wkr_incharge, wkr_orgreceipt,
								wkr_agent_add1,wkr_agent_add2,wkr_agent_add3,wkr_agent_pcode,wkr_agent_state,wkr_jtk,wkr_jtk_ref,wkr_next_of_kin,wkr_relationship,
								wkr_passissue,wkr_salary,wkr_skkdate,wkr_skkref,wkr_sector,wkr_type,officerincharge,jimtel,regjim) 
				                VALUES ($workerid, ".$this->db->escape($wkr_name).", '$wkr_passno', '$wkr_oldpassno', '$wkr_dob', '$wkr_gender', 
				                ".$this->db->escape($wkr_homeaddress).", '$wkr_zipcode', '$wkr_country', ".$this->db->escape($wkr_address1).", ".$this->db->escape($wkr_address2).", ".$this->db->escape($wkr_address3).", '$wkr_pcode', '$wkr_state','$wkr_nationality', '$wkr_passexp', '$wkr_plksno', '$wkr_permitexp', '$wkr_entrydate', '$wkr_wtrade','$wkr_lastemp', '$wkr_currentemp', $currentuserid, NOW(), $personInCharge, '$orgReceipt','$wkr_agent_add1','$wkr_agent_add2','$wkr_agent_add3','$wkr_agent_pcode','$wkr_agent_state','$wkr_jtk','$wkr_jtk_ref','$nextofkin','$relationship','$wkr_passissue','$wkr_salary','$wkr_skkdate','$wkr_skkref','$wkr_sector','$wkr_type','$wkr_offic','$wkr_jimtel','$wkr_jimreg') ";
				
				//wkr_ctr_relationship
				$assignWorkerQuery = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate) VALUES
									  ($workerid, '$wkr_currentemp', 'own recruitment', NOW(), 1, $currentuserid, NOW());";
				
				$addCompanyQuery1 = "";
				$addCompanyQuery2 = "";
				$addCompanyQuery3 = "";
				
				//add worker history
				if(strlen($txtcompany1)>0){
					$otherinfo = $txtcompany1 . ", " . $selstate1;
					$addCompanyQuery1 = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_otherinfo, rel_createdby, rel_createddate) 
										VALUES($workerid, '$otherinfo', $currentuserid, NOW());";
				}
				
				if(strlen($txtcompany2)>0){
					$otherinfo = $txtcompany2. ", " . $selstate2;
					$addCompanyQuery2 = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_otherinfo, rel_createdby, rel_createddate) 
										VALUES($workerid, '$otherinfo', $currentuserid, NOW());";
				}
				
				if(strlen($txtcompany3)>0){
					$otherinfo = $txtcompany3 . ", " . $selstate3;
					$addCompanyQuery3 = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_otherinfo, rel_createdby, rel_createddate) 
										VALUES($workerid, '$otherinfo', $currentuserid, NOW());";
				}
				
				//add to Passport Expiry History : wkr_pass_history
				$nextPassHistId = $this->ModelrekabLabour->nextPassHistId();
				$sqlUpdatePassHist = "INSERT INTO wkr_pass_history (newpassexp_id, newpassexp_wkrid, newpassexp_date, newpass_setby, newpass_setdate) " . 
									   " VALUES ($nextPassHistId, $workerid, '$wkr_passexp', $currentuserid, NOW());";
				
				//add to update permit Expiry history: wkr_permitexp_history
				$nextPlksHistId = $this->ModelrekabLabour->getNextPlksHistId();
				$sqlUpdatePermitHist = "INSERT INTO wkr_permitexp_history (newplksexp_id, newplksexp_wkrid, newplks_no, newplksexp_date, newplksexp_setby, newplksexp_setdate) " .
									   " VALUES ($nextPlksHistId, $workerid, '$wkr_plksno', '$wkr_permitexp', $currentuserid, NOW())";
				
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($insertQuery);
				
				if($wkr_currentemp != ''){
					$this->db->query($assignWorkerQuery);
				}
				
				if(strlen($addCompanyQuery1)>0) $this->db->query($addCompanyQuery1);
				if(strlen($addCompanyQuery2)>0) $this->db->query($addCompanyQuery2);
				if(strlen($addCompanyQuery3)>0) $this->db->query($addCompanyQuery3);
				
				$this->db->query($sqlUpdatePassHist);
				$this->db->query($sqlUpdatePermitHist);
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				    echo "Error in adding to database. Please try again later.";
				}
				else
				{
				    $this->db->trans_commit();
				    redirect('contrekabLabour/labourDetails/' . $workerid . '/regis');
				}
				/****************END MANUAL TRANSACTION****************/
			}
			else{
				$this->load->view('session_expired.php');
			}
		}
		
		function updateLabourDetailsSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				$wkr_name = strtoupper(trim($_POST['txtname']));
				$wkr_passno = trim($_POST['txtpassno']);
				//$wkr_amnestyref = trim($_POST['txtamnestyref']);
				//$wkr_green = trim($_POST['txtgreen']);
				$wkr_oldpassno = trim($_POST['txtoldpassno']);
				$wkr_dob = date('Y-m-d', strtotime(trim($_POST['dtdob'])));
				$wkr_gender = $_POST['selgender'];
				$wkr_homeaddress = strtoupper(trim($_POST['txthomeaddr']));
				$wkr_zipcode = trim($_POST['txtzipcode']);
				$wkr_country = $_POST['selcountry'];
				$wkr_address1 = strtoupper(trim($_POST['txtcuraddr1']));
				$wkr_address2 = strtoupper(trim($_POST['txtcuraddr2']));
				$wkr_address3 = strtoupper(trim($_POST['txtcuraddr3']));
				$wkr_pcode = trim($_POST['txtpcode']);
				$wkr_state = $_POST['selstate'];
				//$wkr_race = $_POST['selrace']; hide upon clab request 
				$wkr_nationality = $_POST['selnationality'];
				//$wkr_agent_add1 = strtoupper(trim($_POST['txtagentaddr1']));
				//$wkr_agent_add2 = strtoupper(trim($_POST['txtagentaddr2']));
				//$wkr_agent_add3 = strtoupper(trim($_POST['txtagentaddr3']));
				//$wkr_agent_pcode = trim($_POST['txtagentpcode']);
				//$wkr_agent_state = $_POST['selagentstate'];
				$nextofkin = $_POST['txtnok'];
				$relationship = $_POST['txtrelationship'];
				
				$wkr_passexp = date('Y-m-d', strtotime($_POST['dtPassportExp']));
				$wkr_plksno = trim($_POST['txtplksno']);
				$wkr_orgreceipt = $_POST['txtorgReceipt'];
				$wkr_incharge = $_POST['selEmp'];
				//$wkr_jtk = $_POST["chkjtk"];
				if(isset($_POST['chkjtk'])) $wkr_jtk = '1';
				else $wkr_jtk = '0';
				if(isset($_POST['chkgc'])) $wkr_gc = '1';
				else $wkr_gc = '0';
				//$wkr_gcdate = date('Y-m-d', strtotime(trim($_POST['dategc'])));
				//$wkr_socso_id = trim($_POST['txtsocsoid']); 
				if(isset($_POST['biogc'])) $wkr_biogc = '1';
				//else $wkr_biogc = '0';
				//$wkr_gcbiodate = date('Y-m-d', strtotime(trim($_POST['datebiogc'])));
				//$wkr_socso_id = trim($_POST['txtsocsoid']);
				//if(isset($_POST['chkskk2'])) $wkr_skkregstatus = '1';
				//else $wkr_skkregstatus = '0';
				//if(isset($_POST['chkskk'])) $wkr_skkstatus = '1';
				//else $wkr_skkstatus = '0';
				//$wkr_skkstatusdate = date('Y-m-d', strtotime(trim($_POST['dateskk'])));
				//$wkr_socso_id = trim($_POST['txtsocsoid']);
				//if($wkr_gcdate != "") $wkr_gcdate = date('Y-m-d', strtotime($wkr_gcdate));
				//else $wkr_gcdate = "0000-00-00";
		
				//$wkr_jtk_ref = $_POST["txtrefjtk"];
				$wkr_passissue = $_POST['txtpassissue'];
				$wkr_salary = $_POST['txtsalary'];
				
				//$wkr_skkdate = date('Y-m-d', strtotime($_POST['dtskk']));//NEW SKK REQ
				//$wkr_skkref = $_POST['txtskkref']; // NEW SKK REQ
				
				//if the permitexp date is empty
				$wkr_permitexp = $_POST['dtPermitExp'];
				if($wkr_permitexp != "") $wkr_permitexp = date('Y-m-d', strtotime($wkr_permitexp));
				else $wkr_permitexp = "0000-00-00";
				
				$wkr_entrydate = date('Y-m-d', strtotime($_POST['dtEntry']));
				$wkr_wtrade = $_POST['txtworktrade'];
				$wkr_lastemp = strtoupper(trim($_POST['txtLastEmp']));
				$wkr_firstdemp = strtoupper(trim($_POST['txtInitEmp']));
				if(isset($_POST['selCurrentCompany'])){
					$wkr_currentemp = $_POST['selCurrentCompany'];
					$isNew = 1;
				}
				else{
					$wkr_currentemp = $_POST['hidcurrentemp'];
					$isNew = 0;
				}
				$wkr_offic = $_POST['officerinc'];
				$wkr_jimtel = $_POST['jimtel'];
				$wkr_jimreg = $_POST['jimreg'];
				
				if(isset($_POST['confirm'])) $confirm = '1';
				else $confirm = '0';
				
				
				$updateQuery = "UPDATE rekab_workers SET wkr_name = ".$this->db->escape($wkr_name).", 
							    wkr_oldpassno = '$wkr_oldpassno', 
							    wkr_dob = '$wkr_dob', 
							    wkr_gender = '$wkr_gender', 
							    wkr_homeaddr = ".$this->db->escape($wkr_homeaddress).", 
							    wkr_zipcode = '$wkr_zipcode', 
				                wkr_country = '$wkr_country', 
				                wkr_address1 = ".$this->db->escape($wkr_address1).", 
				                wkr_address2 = ".$this->db->escape($wkr_address2).", 
				                wkr_address3 = ".$this->db->escape($wkr_address3).", 
				                wkr_pcode = '$wkr_pcode', 
				                wkr_state = '$wkr_state', 
				                wkr_nationality = '$wkr_nationality', 
				                wkr_passexp = '$wkr_passexp', 
				                wkr_plksno = '$wkr_plksno', 
				                wkr_permitexp = '$wkr_permitexp', 
				                wkr_entrydate = '$wkr_entrydate', 
				                wkr_wtrade = '$wkr_wtrade',
				                wkr_currentemp = '$wkr_currentemp',
				                wkr_lastemp = '$wkr_lastemp', 
				                wkr_initemp = '$wkr_firstdemp',
				                
				               
				                wkr_orgreceipt = '$wkr_orgreceipt',
				                wkr_incharge = $wkr_incharge,
				               
								wkr_modifiedby = $currentuserid, 
				                wkr_modifieddate = NOW(),
								
								wkr_next_of_kin  = '$nextofkin',
								wkr_relationship = '$relationship',
								wkr_salary       = '$wkr_salary',
								wkr_passissue    = '$wkr_passissue',
								
								officerincharge = '$wkr_offic',
								jimtel= '$wkr_jimtel',
								regjim ='$wkr_jimreg',
								confirm ='$confirm'
								
								WHERE wkr_id = $wkr_id";
				if($isNew == 1 && strlen($wkr_currentemp) > 0){
					$insertRelQuery = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_avlab_refno, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate)
								VALUES($wkr_id, '$wkr_currentemp', '', 'own recruitment', NOW(), 1, $currentuserid, NOW());";
				}
				//aaa
				
				/**********START TRANSACTION**********/
					$this->db->trans_begin();
					$this->db->query($updateQuery);
					if($isNew == 1 && strlen($wkr_currentemp) > 0){
						$this->db->query($insertRelQuery);	
					}
					
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/labourDetails/' . $wkr_id . '/update');
					}
				/****************END MANUAL TRANSACTION****************/
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
				
		function updateGreenCard(){
			//Green Card
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				
				if(isset($_POST['chkgc'])) $wkr_gc = '1';
				else $wkr_gc = '0';
				$wkr_gcdate = date('Y-m-d', strtotime(trim($_POST['dtgcexp'])));
				
				$updateQuery = "UPDATE workers SET  							    
								wkr_greencard = '$wkr_gc',
								wkr_gcdate = '$wkr_gcdate'
								WHERE wkr_id = $wkr_id";
						
					$this->db->trans_begin();
					$this->db->query($updateQuery);
										
					/*if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/GCDetails/' . $wkr_id . '/update');
					}*/
		    //Bio Card
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				
				if(isset($_POST['biogc'])) $wkr_biogc = '1';
				else $wkr_biogc = '0';
				$wkr_gcbiodate = date('Y-m-d', strtotime(trim($_POST['dtbiogcexp'])));
				
				$updateQuery = "UPDATE workers SET  							    
								wkr_biogreencard ='$wkr_biogc',
								wkr_gcbiodate = '$wkr_gcbiodate'
								WHERE wkr_id = $wkr_id";
						
					$this->db->trans_begin();
					$this->db->query($updateQuery);
					
					//False					
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/GCDetails/' . $wkr_id . '/update');
					}
			}
			else
			{
				$this->load->view('session_expired.php');	
			}
		}
	}
	
	function updateSKKStatus(){
			//Sijil Kecekapan Kemahiran Status
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				if(isset($_POST['chkskk2'])) $wkr_skkregstatus = '1';
				else $wkr_skkregstatus = '0';
				if(isset($_POST['chkskk'])) $wkr_skkstatus = '1';
				else $wkr_skkstatus = '0';
				$wkr_skkstatusdate = date('Y-m-d', strtotime(trim($_POST['skkstatus'])));
				
				$updateQuery = "UPDATE workers SET  							    
								wkr_skkregstatus= '$wkr_skkregstatus',wkr_skkstatus= '$wkr_skkstatus',
								wkr_skkstatusdate = '$wkr_skkstatusdate'
								WHERE wkr_id = $wkr_id";
						
					$this->db->trans_begin();
					$this->db->query($updateQuery);
					
					//False
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/SKKDetails/' . $wkr_id . '/update');
					}
			}
			else
			{
				$this->load->view('session_expired.php');	
			}
	}
		
		function updatesocsoStatus(){
			//Sijil Kecekapan Kemahiran Status
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				if(isset($_POST['chksocso2'])) $wkr_socsoregstatus = '1';
				else $wkr_socsoregstatus = '0';
				if(isset($_POST['chksocso'])) $wkr_socsostatus = '1';
				else $wkr_socsostatus = '0';
				
				$wkr_socsostatusmonth = $_POST['datesocso'];
				if($wkr_socsostatusmonth != "") $wkr_socsostatusmonth = date('Y-m-d', strtotime($wkr_socsostatusmonth));
				else $wkr_socsostatusmonth = "0000-00-00";
				
				//$wkr_socsostatusmonth = date('d/m/y', strtotime(trim($_POST['socsostatusmonth'])));
				//$wkr_socsostatusmonth = date('F');
				
				$updateQuery = "UPDATE workers SET  							    
								wkr_socsoregstatus= '$wkr_socsoregstatus',wkr_socsostatus= '$wkr_socsostatus',
								wkr_socsostatusmonth = '$wkr_socsostatusmonth'
								WHERE wkr_id = $wkr_id";
						
					$this->db->trans_begin();
					$this->db->query($updateQuery);
					
					//False
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/socsoDetails/' . $wkr_id . '/update');
					}
			}
			else
			{
				$this->load->view('session_expired.php');	
			}
	}
		
		function updatebankStatus(){
			//Sijil Kecekapan Kemahiran Status
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				if(isset($_POST['chkbank2'])) $wkr_bankregstatus = '1';
				else $wkr_bankregstatus = '0';
				if(isset($_POST['chkbank'])) $wkr_bankstatus = '1';
				else $wkr_bankstatus = '0';
				//$wkr_skkstatusdate = date('Y-m-d', strtotime(trim($_POST['skkstatus'])));
				
				$updateQuery = "UPDATE workers SET  
								wkr_bankregstatus= '$wkr_bankregstatus',
								wkr_bankstatus= '$wkr_bankstatus'
								WHERE wkr_id = $wkr_id";
						
					$this->db->trans_begin();
					$this->db->query($updateQuery);
					
					//False
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					    echo "Error while updating Labour details. Changes are not saved. Please try again later!";
					}
					else
					{
					    $this->db->trans_commit();
					    redirect('contrekabLabour/bankDetails/' . $wkr_id . '/update');
					}
			}
			else
			{
				$this->load->view('session_expired.php');	
			}
	}
		
		function displaydate($originalDate){
			if($originalDate == "0000-00-00" || $originalDate == "NULL" || $originalDate == "")					
				return "-";
			else return date('d-m-Y', strtotime($originalDate));
		}
		
		function displayuri($wkr_passno){
			$hrefString = "<a href=\"labourDetails/$wkr_passno\">" . $wkr_passno . "</a>";
			
			return $hrefString;	
		}
		
		function listLabour(){
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "rekab_workers");
		    $grid->db->join("mst_race","rekab_workers.wkr_race = mst_race.race_id","LEFT");
		    $grid->db->join("mst_countries","rekab_workers.wkr_country = mst_countries.cty_id","LEFT");
		    $grid->db->join("mst_emp_status", "rekab_workers.wkr_status = mst_emp_status.emp_statusid", "LEFT");
			$grid->db->join("mst_skk", "rekab_workers.wkr_skkstatus = mst_skk.skk_id", "LEFT");
			$grid->db->join("mst_wkr_availability", "rekab_workers.wkr_transtatus = mst_wkr_availability.avlab_id", "LEFT");
		    $grid->db->join("rekab_contractors", "rekab_workers.wkr_currentemp = rekab_contractors.ctr_clab_no", "LEFT");
		    $grid->db->order_by("wkr_passno");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contrekabLabour";
		 	$link_edit = anchor("$baseuri/labourDetails/<#wkr_id#>","<#wkr_passno#>");
		 	
		 	$grid->column("PASSPORT NO", "$link_edit", 'width="100"');
			$grid->column("NAME","wkr_name");
			$grid->column("STATUS","emp_status_desc");
			$grid->column("SKK","skk_desc");
			$grid->column("SUBSTATUS","avlab_desc");
			$grid->column("COUNTRY","cty_desc");
			$grid->column("COMPANY","ctr_comp_name");
			$grid->column("PERMIT EXPIRY DATE","<callback_displaydate><#wkr_permitexp#></callback_displaydate>");
			
			$baseuri = "contrekabLabour";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    
			$this->load->view('rekablabor/labor_list', $data);
		}
		
		function searchLabourList(){
			if(isset($_POST['searchby'])){
				$searchby = $_POST['searchby'];
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				
				if($searchby == "wkr_permitexp"){
					$datefrom = trim(date('Y-m-d', strtotime($_POST['datefrom'])));
					$dateto = trim(date('Y-m-d', strtotime($_POST['dateto'])));
					
					
					$this->session->unset_userdata('datefrom');
					$this->session->unset_userdata('dateto');
					$this->session->set_userdata('datefrom', $datefrom);
					$this->session->set_userdata('dateto', $dateto);
				
				}elseif($searchby == "wkr_status"){
				    $valstatus = $_POST["optstatus"];
					$this->session->unset_userdata('valstatus');
					$this->session->set_userdata('valstatus', $valstatus);
					
				   
				}else{
					$keyword = trim($_POST['keyword']);
					
					$this->session->unset_userdata('keyword');
					$this->session->set_userdata('keyword', $keyword);
				}
			}
			else{
				$searchby = $this->session->userdata('searchby');
				if($searchby == "wkr_permitexp"){
					$datefrom = $this->session->userdata('datefrom');
					$dateto = $this->session->userdata('dateto');
				}elseif($searchby == "wkr_status"){
				    $valstatus = $this->session->userdata('valstatus');
				
				}else{
					$keyword = $this->session->userdata('keyword');
				}
			}
			
			/********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "workers");
		    $grid->db->join("mst_race","workers.wkr_race = mst_race.race_id","LEFT");
		    $grid->db->join("mst_states","workers.wkr_state = mst_states.state_id","LEFT");
		    $grid->db->join("mst_countries","workers.wkr_country = mst_countries.cty_id","LEFT");
		    $grid->db->join("mst_emp_status", "workers.wkr_status = mst_emp_status.emp_statusid", "LEFT");
			$grid->db->join("mst_skk", "workers.wkr_skkstatus = mst_skk.skk_id", "LEFT");
			$grid->db->join("mst_wkr_availability", "workers.wkr_transtatus = mst_wkr_availability.avlab_id", "LEFT");
		    $grid->db->join("rekab_contractors", "workers.wkr_currentemp = rekab_contractors.ctr_clab_no", "LEFT");
			if($searchby == "wkr_permitexp"){
				$grid->db->where("wkr_permitexp >= '$datefrom' AND wkr_permitexp <= '$dateto'");
			}elseif($searchby == "wkr_status"){
			    $grid->db->where("wkr_status = '$valstatus'");
			}else{
		    	$grid->db->where("$searchby LIKE '%$keyword%'");   
	    	}
		    $grid->db->order_by("wkr_passno");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
			$baseuri = "contrekabLabour";
		 	$link_edit = anchor("$baseuri/labourDetails/<#wkr_id#>","<#wkr_passno#>");
		 	
		 	$grid->column("PASSPORT NO", "$link_edit", 'width="100"');
			$grid->column("NAME","wkr_name");
			$grid->column("STATUS","emp_status_desc");
			$grid->column("SKK","skk_desc");
			$grid->column("SUBSTATUS","avlab_desc");
			$grid->column("COUNTRY","cty_desc");
			$grid->column("COMPANY","ctr_comp_name");
			$grid->column("PERMIT EXPIRY DATE","<callback_displaydate><#wkr_permitexp#></callback_displaydate>");
			
			$baseuri = "contrekabLabour";
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    $this->load->view('rekablabor/labor_list', $data);
		}
		
		function GCDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablaborchange_gc', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function SKKDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablabor/change_skk', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function socsoDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablaborchange_socso', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		
		function bankDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablabor/change_bank', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function labourDetails(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablabor/labor_edit', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		
		function labourDetailsDroid(){
			//$currentuserid = $this->session->userdata('emp_id');
			
			//if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);	//if the page comes from registration
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$photoInfo = $this->ModelrekabLabour->getUploadedPhotoInfo($wkr_id);
				if($photoInfo->num_rows() > 0){
					$photoRow = $photoInfo->row();
					$data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
					$data['photoInfo'] = "";
				}
				$data['emphistory'] = $this->ModelrekabLabour->getEmploymentHistory($wkr_id);
				
				$data['allStates'] = $this->ModelrekabLabour->getAllStates();
				$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
				$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
				$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
				$data['allskill'] = $this->ModelrekabLabour->getAllSkill();
				$data['allworktrade'] = $this->ModelrekabLabour->getAllWorkTrade();
				$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
				$data['allEmployees'] = $this->ModelrekabLabour->getAllEmployees();
				
				if($successMsg == "update") $data['successMsg'] = "The Labour record has been updated!";
				else if($successMsg=="regis") $data['successMsg'] = "New Labour registration success!";
				else {}
				
				$this->load->view('rekablaborlabor_view', $data);
			//}
			//else{
			//	$this->load->view('session_expired.php');	
			//}
		}
		
		function passportReplacement(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				//$oldpassno = $this->uri->segment(3);
				$errorMsg = $this->uri->segment(4);
				
				if(strlen($errorMsg) > 0) 
					$data['errorMsg'] = "There is another worker with passport no. <strong>$errorMsg</strong> already existed in the system. <br />The system cannot accept duplicate passport numbers. Please verify again!"; 	
				$data['wkrRecord'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['replaceHistory'] = $this->ModelrekabLabour->getPassportReplaceHistory($wkr_id);
				
				$this->load->view('rekablaborlabor_edit_passreplace', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}	
		}
		
		function passReplacementSubmit(){
			$currentuserID = $this->session->userdata('emp_id');
			
			if(strlen($currentuserID) > 0){
				$oldpassno = $_POST['txtoldpassno'];
				$newpassno = str_replace(" ", "", trim($_POST['txtnewpassno']));
				$changeReason = $_POST['txtreason'];
				$changeBy = $_POST['txtchangeby'];
				$changeDate = date('Y-m-d', strtotime($_POST['dtchange']));
				$wkr_country = $_POST['txtcountry'];
				$wkr_id = $_POST['wkr_id'];
				$previous_passno = $_POST['previous_passno'];
				
				//make sure there is no duplicate first
				$hasDuplicate = $this->ModelrekabLabour->checkLabourExists($newpassno, $wkr_country);
				if($hasDuplicate->num_rows() > 0){
					redirect('contrekabLabour/passportReplacement/' . $wkr_id . '/' . $newpassno);
				}
				else{
					if(strlen($previous_passno) == 0){
						$oldPassNoString = 	$oldpassno;
					}
					else{
						$oldPassNoString = $previous_passno . ", " . $oldpassno;
					}
					
					$updatePassNumQuery = "UPDATE workers SET wkr_passno = '$newpassno', wkr_oldpassno = '$oldPassNoString' WHERE wkr_id = $wkr_id";
					$passHistID = $this->ModelrekabLabour->getNextPassHistID();
					$passHistoryQuery = "INSERT INTO wkr_history (wkrhist_no, wkrhist_wkrid, wkrhist_oldpassno, wkrhist_newpassno, wkrhist_setby, wkrhist_changedate, wkrhist_remark) 
					                     VALUES ($passHistID, $wkr_id, '$oldpassno', '$newpassno', $currentuserID, '$changeDate', '$changeReason');";
					
					/**********START TRANSACTION**********/
					$this->db->trans_begin();
					$this->db->query($updatePassNumQuery);
					$this->db->query($passHistoryQuery);
					
					if ($this->db->trans_status() === FALSE)
					{
					    $this->db->trans_rollback();
					}
					else
					{
					    $this->db->trans_commit();
					}
					/****************END MANUAL TRANSACTION****************/
					redirect('contrekabLabour/passportReplacement/' . $wkr_id);
				}
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function updatePermits(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$this->load->view('rekablaborupdate_permits_pt1');
			}
			else{
				$this->load->view('session_expired.php');	
			}			
		}
		
		function updatePermitSearch(){
			$searchby = $_POST['searchby'];
			$keyword =  trim($_POST['txtkeyword']);
			
			$data['wkrRecord'] = $this->ModelrekabLabour->searchLabour($searchby, $keyword);
			
			if($searchby == "wkr_passno"){
				$searchterm = "Passport";
			}
			else if($searchby == "wkr_name"){
				$searchterm = "Name";	
			}
			else if($searchby == "ctr_comp_name"){
				$searchterm = "Company Name";	
			}
			$data['searchterm'] = "RESULTS FOR ==> " . $searchterm . " : " . $keyword;
			$this->load->view('rekablaborupdate_permits_pt1', $data);
		}
		
		function updatePermitPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$successFlag = $this->uri->segment(4);
				
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$currentPermitRenewal = $this->ModelrekabLabour->getCurrentPermitRenewal($wkr_id);
				if($currentPermitRenewal->num_rows() > 0){
					$data['currentRenewal'] = $currentPermitRenewal->row();
					$data['insertupdateflag'] = 'update';
				}
				else{
					$data['insertupdateflag'] = 'insert';
				}
				
				if($successFlag == 'update') $data['successMsg'] = "<strong><font color=\"red\">Permit Renewal Status updated!</font></strong>";
				$data['updatePermitHistory'] = $this->ModelrekabLabour->getUpdatePermitHistory($wkr_id);
				$this->load->view('rekablaborupdate_permits_pt2', $data);	
			}
			else{
				$this->load->view('session_expired.php');	
			}	
		}
		
		function updatePermitPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				$passno = $_POST['wkrpassno'];	//hidden field
				$newplksno = "";	//change the process, actually this field is not needed, but since I don't wanna edit the code, just hardcoded this one
				$newpermitexpirydate = "0000-00-00"; //same as above field
				$insertupdateflag = $_POST['insertupdateflag'];
				$permitid = $_POST['permitid'];		//will be used for update case only (not used in insert)
				
				$permit_isopr = '0';
				$permit_isadmin = '0';
				$permit_isfromjim = '0';
				$permit_isbackopr = '0';
				$permit_isincomplete = '0';
				$permit_isownsubmission = '0';
				
				if(isset($_POST['chkisopr'])){
					$permit_isopr = '1';
					$permit_oprby = $_POST['txtOPRBy'];
					$permit_opr_date = date('Y-m-d', strtotime($_POST['dtOPR']));
					$permit_opr_comment = $_POST['txtOPRComment'];
				}
				
				if(isset($_POST['chkisAdmin'])){
					$permit_isadmin = '1';
					$permit_adminby = $_POST['txtAdminBy'];
					$permit_admin_date = date('Y-m-d', strtotime($_POST['dtAdmin']));
					$permit_admin_comment = $_POST['txtAdminComment'];
				}
				if(isset($_POST['chkisFromJIM'])){
					$permit_isfromjim = '1';
					$permit_fromjimby = $_POST['txtFromJIMBy'];
					$permit_fromjim_date = date('Y-m-d', strtotime($_POST['dtFromJIM']));
					$permit_fromjim_comment = $_POST['txtFromJIMComment'];
				}
				if(isset($_POST['chkisOPRBck'])){
					$permit_isbackopr = '1';
					$permit_backoprby = $_POST['txtOPRBckBy'];
					$permit_backopr_date = date('Y-m-d', strtotime($_POST['dtOPRBck']));
					$permit_backopr_comment = $_POST['txtFromJIMComment'];
				}
				if(isset($_POST['chkResubmit'])){
					$permit_isincomplete = '1';
					$permit_incomplete_remarks = $_POST['txtIncompleteRemarks'];
				}
				if(isset($_POST['chkOwnSubmission'])){
					$permit_isownsubmission = '1';
				}
				
				if($permit_isownsubmission == '1') $permit_progress = 'allow own submission';
				else if($permit_isincomplete == '1') $permit_progress = 'need to resubmit';
				else if($permit_isbackopr == '1') $permit_progress = 'complete';
				else if($permit_isfromjim == '1') $permit_progress = 'passport received from JIM';
				else if($permit_isadmin == '1') $permit_progress = 'admin received';
				else if($permit_isopr == '1') $permit_progress = 'operations received';
				else $permit_progress = '';
				
				if($insertupdateflag == 'insert'){
					$nextUpdatePermitID = $this->ModelrekabLabour->getNextUpdatePermitID();
					$insertPermitQuery = "INSERT INTO wkr_updatepermit(permit_id, permit_wkrid, permit_newplksno, permit_newpermitexp, permit_progress ";
					if($permit_isopr == '1')
						$insertPermitQuery .= ", permit_isopr, permit_oprby, permit_opr_date, permit_opr_comment";
					if($permit_isadmin == '1')
						$insertPermitQuery .= ", permit_isadmin, permit_adminby, permit_admin_date, permit_admin_comment";
					if($permit_isfromjim == '1')	
						$insertPermitQuery .= ", permit_isfromjim, permit_fromjimby, permit_fromjim_date, permit_fromjim_comment";
					if($permit_isbackopr == '1')
						$insertPermitQuery .= ", permit_isbackopr, permit_backoprby, permit_backopr_date, permit_backopr_comment";
					if($permit_isincomplete == '1')
						$insertPermitQuery .= ", permit_isincomplete, permit_incomplete_remarks";
					if($permit_isownsubmission == '1')
						$insertPermitQuery .= ", permit_isownsubmission";
						
					$insertPermitQuery .= ") VALUES ($nextUpdatePermitID, $wkr_id, '$newplksno', '$newpermitexpirydate', '$permit_progress'";
					 if($permit_isopr == '1')
						$insertPermitQuery .= ", '$permit_isopr', '$permit_oprby', '$permit_opr_date', '$permit_opr_comment'";
					 if($permit_isadmin == '1')
						$insertPermitQuery .= ", '$permit_isadmin', '$permit_adminby', '$permit_admin_date', '$permit_admin_comment'";
					 if($permit_isfromjim == '1')	
						$insertPermitQuery .= ", '$permit_isfromjim', '$permit_fromjimby', '$permit_fromjim_date', '$permit_fromjim_comment'";
					 if($permit_isbackopr == '1')
						$insertPermitQuery .= ", '$permit_isbackopr', '$permit_backoprby', '$permit_backopr_date', '$permit_backopr_comment'";
					 if($permit_isincomplete == '1')
						$insertPermitQuery .= ", '$permit_isincomplete', '$permit_incomplete_remarks'";
					 if($permit_isownsubmission == '1')
						$insertPermitQuery .= ", '$permit_isownsubmission'";
					
					$insertPermitQuery .= ")";
					$this->db->query($insertPermitQuery);
					//update workers table - permit expiry field
				}
				else{
					$updatePermitQuery = "UPDATE wkr_updatepermit SET 
									   	  permit_newplksno = '$newplksno', 
									   	  permit_newpermitexp = '$newpermitexpirydate',
									   	  permit_progress = '$permit_progress'";
					if($permit_isopr == '1')
						$updatePermitQuery .= ", permit_isopr = '$permit_isopr', 
						                       permit_oprby = '$permit_oprby', 
						                       permit_opr_date = '$permit_opr_date', 
						                       permit_opr_comment = '$permit_opr_comment'";
					 if($permit_isadmin == '1')
						$updatePermitQuery .= ", permit_isadmin = '$permit_isadmin', 
						                       permit_adminby = '$permit_adminby', 
						                       permit_admin_date = '$permit_admin_date', 
						                       permit_admin_comment = '$permit_admin_comment'";
					 if($permit_isfromjim == '1')	
						$updatePermitQuery .= ", permit_isfromjim = '$permit_isfromjim', 
						                       permit_fromjimby = '$permit_fromjimby', 
						                       permit_fromjim_date = '$permit_fromjim_date', 
						                       permit_fromjim_comment = '$permit_fromjim_comment'";
					 if($permit_isbackopr == '1')
						$updatePermitQuery .= ", permit_isbackopr = '$permit_isbackopr', 
						                       permit_backoprby = '$permit_backoprby', 
						                       permit_backopr_date = '$permit_backopr_date', 
						                       permit_backopr_comment = '$permit_backopr_comment' ";
			       	 if($permit_isincomplete == '1')
						$updatePermitQuery .= ", permit_isincomplete = '$permit_isincomplete', 
											   permit_incomplete_remarks = '$permit_incomplete_remarks'";
					 if($permit_isownsubmission == '1')
						$updatePermitQuery .= ", permit_isownsubmission = '$permit_isownsubmission'";
						
					$updatePermitQuery .= " WHERE permit_id = $permitid";
					
					$this->db->query($updatePermitQuery);
				}	
									
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['updatePermitHistory'] = $this->ModelrekabLabour->getUpdatePermitHistory($wkr_id);
				if($permit_progress == 'complete' || $permit_progress == 'need to re	' || $permit_progress == 'allow own submission'){
					$data['statusMsg'] = "<strong><font color=\"red\">Permit renewal status for the worker (Passport No: $passno) has been updated. Status: $permit_progress</font></strong>";
					$this->load->view('rekablaborupdate_permits_pt1', $data);
				}
				else{
					redirect('contrekabLabour/updatePermitPt2/'. $wkr_id . '/update');
				}
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function assignCompany(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$this->load->view('rekablaborassign_company_pt1');	
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function assignCompanySearchLabor(){
			$searchby = $_POST['searchby'];
			$keyword =  trim($_POST['txtkeyword']);
			
			$data['wkrRecord'] = $this->ModelrekabLabour->searchLabour($searchby, $keyword);
			
			$this->load->view('rekablaborassign_company_pt1', $data);	
		}
		
		function assignCompanyPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$checkCurrentEmp = $this->ModelrekabLabour->getCurrentCompany($wkr_id);
				if($checkCurrentEmp->wkr_currentemp != ''){
					$wkr = $checkCurrentEmp;
					$data['errorMsg'] = "The worker <font color=\"red\">$wkr->wkr_name (Passport No: $wkr->wkr_passno)</font> is currently assigned to <font color=\"red\">$wkr->ctr_comp_name (CLAB No: $wkr->wkr_currentemp)</font>.<br />
					                     Unable to assign this worker to another company. Please use the module \"Local Transfer\" to transfer to another company.";
					$this->load->view('rekablabor/assign_company_pt1', $data);	
				}
				else{	
					$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
						
					$data['allStates'] = $this->ModelrekabLabour->getAllStates();
					$data['allRaces'] = $this->ModelrekabLabour->getAllRaces();
					$data['allNationalities'] = $this->ModelrekabLabour->getAllNationalities();
					$data['allCountries'] = $this->ModelrekabLabour->getAllCountries();
					$data['allContractors'] = $this->ModelrekabLabour->getAllContractors();
						
					$this->load->view('rekablaborassign_company_pt2', $data);	
				}
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function assignCompanyPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['txtwkrid'];
				$passno = $_POST['txtpassno'];
				$wkr_name = $_POST['txtwkrname'];
				$ctr_clabno = $_POST['selcompany'];
				$datehired = trim(date('Y-m-d', strtotime($_POST['dthired'])));
				$assignedby = $this->session->userdata('emp_id');
				$dateassigned = trim(date('Y-m-d', strtotime($_POST['dtassigned'])));
				$status = '1';	//1-active
				$transtatus = '7';	//7-hired
				
				$compname = $this->ModelrekabLabour->getCompNameByClabNo($ctr_clabno);
				
				$insertQuery = "INSERT INTO wkr_ctr_relationship (rel_wkrid, rel_ctr_clab_no, rel_avlab_refno, rel_assign_type, rel_datehired, rel_status, rel_createdby, rel_createddate)
								VALUES($wkr_id, '$ctr_clabno', '', 'own recruitment', '$datehired', 1, $assignedby, '$dateassigned');";
				
				$this->db->query($insertQuery);
				
				$upadteQuery = "UPDATE workers SET wkr_currentemp = " . $this->db->escape($ctr_clabno) .
								" , wkr_status = '$status', wkr_transtatus = '$transtatus' WHERE wkr_passno = '$passno'";
				$this->db->query($upadteQuery);
				
				$data['successMsg'] = "The worker <strong>$wkr_name(Passport No: $passno)</strong> has been assigned to <strong>$compname</strong>.";
				
				$this->load->view('rekablabor/assign_company_pt1', $data);	
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changeLaborStatus(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$this->load->view('rekablabor/change_status_pt1');
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changeLaborStatusSearch(){
			$searchby = $_POST['searchby'];
			$keyword =  trim($_POST['txtkeyword']);
			
			$data['wkrRecord'] = $this->ModelrekabLabour->searchLabour($searchby, $keyword);
			$this->load->view('rekablabor/change_status_pt1', $data);
		}
		
		function changeLaborStatusPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$this->load->view('rekablabor/change_status_pt2', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changeGCStatusPt2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$this->load->view('rekablabor/change_gc', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changeSKKStatus(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$this->load->view('rekablabor/change_skk', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changebankStatus(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$this->load->view('rekablabor/change_bank', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changesocsoStatus(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				
				$this->load->view('rekablabor/change_socso', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function changeLaborStatusPt2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$activateInactivate = $_POST['rdchangestatus'];
				$wkr_passno = $_POST['txtwkrpassno'];
				$wkr_id = $_POST['wkr_id'];
				
				$approvedby = '';
				$incidentDate = "0000-00-00";
				$leavefrom = "0000-00-00";	
				$leaveto = "0000-00-00";
				$runningno = '';	
				
				if($activateInactivate == '0'){	//inactivate
					$transtatus = $_POST['selInactiveStatus'];
					$status = '2';		//2-inactive
					$remarks = $_POST['txtinactivateReason'];
					if($transtatus == 14 || $transtatus == 15){
						$leavefrom = $_POST['dtfrom'];
						$leaveto = $_POST['dtto'];
						
						if(strlen($leavefrom) > 0) $leavefrom = date('Y-m-d', strtotime($leavefrom));
						else $leavefrom = "0000-00-00";	
						if(strlen($leaveto) > 0) $leaveto = date('Y-m-d', strtotime($leaveto));
						else $leaveto = "0000-00-00";
						$runningno = $_POST['txtrunningno'];
					}
					else{
						$incidentDate = $_POST['dtincident'];
						if(strlen($incidentDate) > 0) $incidentDate = date('Y-m-d', strtotime($incidentDate));
						else $incidentDate = "0000-00-00";
					}
				}
				else{	//activate
					$transtatus = $_POST['selActiveStatus'];
					$status = '1';		//1-active
					$approvedby = $_POST['txtapprovedby'];
					$remarks = $_POST['txtactivateremarks'];
					
				}
				
				$keyinby = $this->session->userdata('emp_id');
				$keyindate = date('Y-m-d', strtotime($_POST['dtkeyin']));
				
				$changeStatusQuery = "INSERT INTO wkr_statushistory (hist_wkrid, hist_transtatus, hist_reason, hist_incidentdate, hist_leavefrom, hist_leaveto, hist_leave_runningno, hist_approvedby, hist_keyinby, hist_keyindate) 
									  VALUES ($wkr_id, '$transtatus', '$remarks', '$incidentDate', '$leavefrom', '$leaveto', '$runningno', '$approvedby', $keyinby, '$keyindate');";
				$updateWkrQuery = "UPDATE workers SET wkr_status = '$status', wkr_transtatus = '$transtatus' WHERE wkr_passno = '$wkr_passno'";
				
				/**********START TRANSACTION**********/
				$this->db->trans_begin();
				$this->db->query($changeStatusQuery);
				$this->db->query($updateWkrQuery);
				
				if ($this->db->trans_status() === FALSE)
				{
				    $this->db->trans_rollback();
				}
				else
				{
				    $this->db->trans_commit();
				}
				/****************END MANUAL TRANSACTION****************/
				$data['successMsg'] = "The labor ($wkr_passno) status has been updated!";
				$this->load->view('rekablabor/change_status_pt1', $data);
			}
			else{
				$this->load->view('session_expired.php');	
			}
		}
		
		function regisAttachPhoto(){
			$wkrid = $this->uri->segment(3);
			$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkrid);
			$data['passno'] = $laborDetails->wkr_passno;
			$data['name'] = $laborDetails->wkr_name;
			$data['nationality'] = $laborDetails->nat_desc;
			$data['country'] = $laborDetails->cty_desc;
			$data['wkr_id'] = $wkrid;
			
			$this->load->view('rekablabor/labor_edit_attachphoto', $data);	
		}
		
		function uploadPhoto(){
			$wkr_id = $_POST['wkr_id'];		//hidden field
			$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
			$data['passno'] = $laborDetails->wkr_passno;
			$data['name'] = $laborDetails->wkr_name;
			$data['nationality'] = $laborDetails->nat_desc;
			$data['country'] = $laborDetails->cty_desc;
			$data['wkr_id'] = $wkr_id;
			
			//start uploading
			$config['upload_path'] = './uploads/labour/photos/';
			$config['allowed_types'] = 'jpg|gif|png';		//usually MIME extension
			$config['max_size']	= '10000';				//in KB

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				//upload the file and get the info
				$uploadInfo = $this->upload->data();

				//call function to import the data in file to database
				$filepath = $uploadInfo['full_path'];

				//pass the data to importsuccess view --> later this should be converted to log file
				$filename = $uploadInfo['file_name'];
				$origname = $uploadInfo['orig_name'];
				$filesize = $uploadInfo['file_size'];
				$filepath = substr($filepath, strpos($filepath, "uploads/labour"), strlen($filepath));
				
				$data['file_name'] = $filename;
				$data['orig_name'] = $origname;
				$data['file_size'] = $filesize;
				$data['filepath'] = $filepath;
				
				//save to wkr_uploaddoc
				$upload_id = $this->ModelrekabLabour->getNextUploadID();
				$sqlQuery = "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath) 
							 VALUES ($upload_id, $wkr_id, 'photos', '', '$filesize', '$filename', '$filepath');";
							 
				$this->db->query($sqlQuery);
				
				$this->load->view('rekablabor/labor_edit_attachphoto', $data);
			}	
		}
		
		function attachContract(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);
				if($successMsg == 'delete'){
					$data['successMsg'] = "The contract file has been deleted.";	
				}
				$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passno'] = $laborDetails->wkr_passno;
				$data['name'] = $laborDetails->wkr_name;
				$data['nationality'] = $laborDetails->nat_desc;
				$data['country'] = $laborDetails->cty_desc;
				$data['wkr_id'] = $wkr_id;
				
				$data['uploadContractHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, 'Contract');
				$data['accessibility'] = $this->session->userdata('emp_accessibility');
				$this->load->view('rekablabor/labor_edit_attachcontract', $data);	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function attachContractSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];
				//$passno = $_POST['txtpassno'];		//hidden field
				$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passno'] = $laborDetails->wkr_passno;
				$data['name'] = $laborDetails->wkr_name;
				$data['nationality'] = $laborDetails->nat_desc;
				$data['country'] = $laborDetails->cty_desc;
				$data['wkr_id'] = $wkr_id;
				
				//start uploading
				$config['upload_path'] = './uploads/labour/LabContract/';
				$config['allowed_types'] = 'jpg|gif|png|txt|doc|pdf';		//usually MIME extension
				$config['max_size']	= '10000';				//in KB
	
				$this->load->library('upload', $config);
	
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					//upload the file and get the info
					$uploadInfo = $this->upload->data();
	
					//call function to import the data in file to database
					$filepath = $uploadInfo['full_path'];
	
					//pass the data to importsuccess view --> later this should be converted to log file
					$filename = $uploadInfo['file_name'];
					$origname = $uploadInfo['orig_name'];
					$filesize = $uploadInfo['file_size'];
					$filepath = substr($filepath, strpos($filepath, "uploads/labour"), strlen($filepath));
					
					$data['file_name'] = $filename;
					$data['orig_name'] = $origname;
					$data['file_size'] = $filesize;
					$data['filepath'] = $filepath;
					$currentuser = $this->session->userdata('emp_id');
					
					//save to wkr_uploaddoc
					$upload_id = $this->ModelrekabLabour->getNextUploadID();
					$sqlQuery = "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_by, upload_date) 
								 VALUES ($upload_id, $wkr_id, 'Contract', '', '$filesize', '$filename', '$filepath', $currentuser, NOW());";
								 
					$this->db->query($sqlQuery);
					
					$data['uploadContractHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, 'Contract');
					$data['accessibility'] = $this->session->userdata('emp_accessibility');
					$data['successMsg'] = "The contract file has been uploaded successfully.";
					$this->load->view('rekablabor/labor_edit_attachcontract', $data);
				}	
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}	
		}
		
		function attachDoc(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$successMsg = $this->uri->segment(4);
				if($successMsg == "delete"){
					$data['successMsg'] = "File has been deleted successfully";
				}
				
				$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passno'] = $laborDetails->wkr_passno;
				$data['name'] = $laborDetails->wkr_name;
				$data['nationality'] = $laborDetails->nat_desc;
				$data['country'] = $laborDetails->cty_desc;
				$data['wkr_id'] = $wkr_id;
				
				$data['uploadDocHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, "others");
				$data['accessibility'] = $this->session->userdata('emp_accessibility');
				$this->load->view('rekablabor/labor_edit_attachdoc', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function attachDocSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$doctype = $_POST['seldoctype'];
				$others = $_POST['txtdoctype'];
				$wkr_id = $_POST['wkr_id'];		//hidden field
				$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passno'] = $laborDetails->wkr_passno;
				$data['name'] = $laborDetails->wkr_name;
				$data['nationality'] = $laborDetails->nat_desc;
				$data['country'] = $laborDetails->cty_desc;
				$data['wkr_id'] = $wkr_id;
				
				//start uploading
				$config['upload_path'] = './uploads/labour/contracts/';
				$config['allowed_types'] = 'jpg|gif|png|txt|doc|pdf';		//usually MIME extension
				$config['max_size']	= '10000';				//in KB
	
				$this->load->library('upload', $config);
	
				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					//upload the file and get the info
					$uploadInfo = $this->upload->data();
	
					//call function to import the data in file to database
					$filepath = $uploadInfo['full_path'];
	
					//pass the data to importsuccess view --> later this should be converted to log file
					$filename = $uploadInfo['file_name'];
					$origname = $uploadInfo['orig_name'];
					$filesize = $uploadInfo['file_size'];
					$filepath = substr($filepath, strpos($filepath, "uploads/labour"), strlen($filepath));
					
					$data['file_name'] = $filename;
					$data['orig_name'] = $origname;
					$data['file_size'] = $filesize;
					$data['filepath'] = $filepath;
					$currentuser = $this->session->userdata('emp_id');
					
					//save to wkr_uploaddoc
					$upload_id = $this->ModelrekabLabour->getNextUploadID();
					$sqlQuery = "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_by, upload_date) 
								 VALUES ($upload_id, $wkr_id, '$doctype', '', '$filesize', '$filename', '$filepath', $currentuser, NOW());";
								 
					$this->db->query($sqlQuery);
					
					$data['uploadDocHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, "others");
					$data['accessibility'] = $this->session->userdata('emp_accessibility');
					$this->load->view('rekablabor/labor_edit_attachdoc', $data);
				}
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function attachMultipleDocSubmit_old(){
			$wkr_id = $_POST['wkr_id'];		//hidden field
			$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
			$data['passno'] = $laborDetails->wkr_passno;
			$data['name'] = $laborDetails->wkr_name;
			$data['nationality'] = $laborDetails->nat_desc;
			$data['country'] = $laborDetails->cty_desc;
			$data['wkr_id'] = $wkr_id;
					
			//check whether the directory exists for this labour, if not, create one
		    $dirname = "./uploads/labour/{$wkr_id}/";    
		      
		    if (file_exists($dirname)) {    
		        //echo "The directory {$dirname} exists";    
		    } else {    
		        mkdir("uploads/labour/{$wkr_id}", 0777);    
		        //echo "The directory {$dirname} was successfully created.";    
		    }   
			//start uploading
			//$config['upload_path'] = './uploads/labour/contracts/';
			$config['upload_path'] = $dirname;
			$config['allowed_types'] = 'jpg|gif|png|txt|doc|pdf';		//usually MIME extension
			$config['max_size']	= '10000';				//in KB

			$this->load->library('upload', $config);
			$i=1;
			foreach ($_FILES["userdoc"]["error"] as $key => $error)
			{								
				if($this->upload->do_upload("userdoc[$key]"))
				{
					$upload = $this->upload->data();
					
					$doctype = $_POST['seldoctype' . $i];
					$other_specify = "";
					
					if($doctype == 'PLKS' || $doctype == 'SpecialPass'){
						$docNum = $_POST['documentno' . $i];
						$doctype = $doctype . $docNum;
					}
					else if($doctype == 'Others'){
						$other_specify = $_POST['txtdoctype'.$i];
					}
					else{
						//do nothing	
					}
					
					// do stuff with your upload data here...
					//upload the file and get the info
					$uploadInfo = $this->upload->data();

					//call function to import the data in file to database
					$filepath = $uploadInfo['full_path'];
	
					//pass the data to importsuccess view --> later this should be converted to log file
					$filename = $uploadInfo['file_name'];
					$origname = $uploadInfo['orig_name'];
					$filesize = $uploadInfo['file_size'];
					$filepath = substr($filepath, strpos($filepath, "uploads/labour"), strlen($filepath));
					
					$data['file_name'] = $filename;
					$data['orig_name'] = $origname;
					$data['file_size'] = $filesize;
					$data['filepath'] = $filepath;
					$currentuser = $this->session->userdata('emp_id');
					
					//save to wkr_uploaddoc
					$upload_id = $this->ModelrekabLabour->getNextUploadID();
					$sqlQuery = "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_by, upload_date) 
								 VALUES ($upload_id, $wkr_id, '$doctype', '$other_specify', '$filesize', '$filename', '$filepath', $currentuser, NOW());";
								 
					$this->db->query($sqlQuery);
				}
				else
				{
					$data['upload_errors'] = $this->upload->display_errors('
					', '
					');
					//will just ignore if the upload field are empty	
				}
				$i++;
			}

			$data['uploadDocHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, "others");
			$data['accessibility'] = $this->session->userdata('emp_accessibility');
			$data['successMsg'] = "Files has been uploaded successfully";
			$this->load->view('rekablabor/labor_edit_attachdoc', $data);
		}
		
		function attachMultipleDocSubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['wkr_id'];		//hidden field
				$laborDetails = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passno'] = $laborDetails->wkr_passno;
				$data['name'] = $laborDetails->wkr_name;
				$data['nationality'] = $laborDetails->nat_desc;
				$data['country'] = $laborDetails->cty_desc;
				$data['wkr_id'] = $wkr_id;
						
				//check whether the directory exists for this labour, if not, create one
			    $dirname = "./uploads/labour/TEMP/";    
			      
			    if (file_exists($dirname)) {    
			        //echo "The directory {$dirname} exists";    
			    } else {    
			        mkdir("uploads/labour/TEMP", 0777);    
			        //echo "The directory {$dirname} was successfully created.";    
			    }   
				//start uploading
				//$config['upload_path'] = './uploads/labour/contracts/';
				$config['upload_path'] = $dirname;
				$config['allowed_types'] = 'jpg|gif|png|txt|doc|pdf';		//usually MIME extension
				$config['max_size']	= '10000';				//in KB
	
				$this->load->library('upload', $config);
				$i=1;
				foreach ($_FILES["userdoc"]["error"] as $key => $error)
				{								
					if($this->upload->do_upload("userdoc[$key]"))
					{
						$upload = $this->upload->data();
						
						$doctype = $_POST['seldoctype' . $i];
						$other_specify = "";
						$upload_filetype = $doctype;	//data for wkr_uploaddoc table
						
						if($doctype == 'PLKS' || $doctype == 'SpecialPass'){
							$docNum = $_POST['documentno' . $i];
							$upload_filetype = $doctype . "-" . $docNum;		//data for wkr_uploaddoc table
						}
						else if($doctype == 'Others'){
							$other_specify = $_POST['txtdoctype'.$i];
						}
						else{
							//do nothing	
						}
						
						// do stuff with your upload data here...
						//upload the file and get the info
						$uploadInfo = $this->upload->data();
	
						//call function to import the data in file to database
						$filepath = $uploadInfo['full_path'];
		
						//pass the data to importsuccess view --> later this should be converted to log file
						$filename = $uploadInfo['file_name'];
						$origname = $uploadInfo['orig_name'];
						$filesize = $uploadInfo['file_size'];
						$filepath = substr($filepath, strpos($filepath, "uploads/labour"), strlen($filepath));
						
						//**************move file from TEMP to destination dir, then delete the original file*****************
						//Notes: I do this way because multiple upload doesn't allow u to upload to different folders at the same time
						$originalFile = $filepath;
						$destdir = "./uploads/labour/{$doctype}/";
						if (file_exists($destdir)) {    
					        //echo "The directory {$destdir} exists";    
					    } else {    
					        mkdir("uploads/labour/{$doctype}", 0777);    
					        //echo "The directory {$destdir} was successfully created.";    
					    } 
						$destFile = "./uploads/labour/{$doctype}/" . $filename;   
						
						if (!copy($originalFile, $destFile)) {
							echo "failed to copy file. Please try again to upload $filename.";
						}
						else{
							echo "File moved successfully.";
							unlink($originalFile);	
							
							$data['file_name'] = $filename;
							$data['orig_name'] = $origname;
							$data['file_size'] = $filesize;
							$data['filepath'] = $filepath;
							$currentuser = $this->session->userdata('emp_id');
							
							//save to wkr_uploaddoc
							$upload_id = $this->ModelrekabLabour->getNextUploadID();
							$sqlQuery = "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_by, upload_date) 
										 VALUES ($upload_id, $wkr_id, '$upload_filetype', '$other_specify', '$filesize', '$filename', '$destFile', $currentuser, NOW());";
										 
							$this->db->query($sqlQuery);
						}  
						//**********************************************************************					
					}
					else
					{
						$data['upload_errors'] = $this->upload->display_errors('
						', '
						');
						//will just ignore if the upload field are empty	
					}
					$i++;
				}
	
				$data['uploadDocHistory'] = $this->ModelrekabLabour->getUploadHistory($wkr_id, "others");
				$data['accessibility'] = $this->session->userdata('emp_accessibility');
				$data['successMsg'] = "Files has been uploaded successfully";
				$this->load->view('rekablabor/labor_edit_attachdoc', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}		
		
		function printAttachPermit(){
			$docType = $this->uri->segment(3);
			$wkr_id = $this->uri->segment(4);
			$data['wkr_id'] = $wkr_id;
			$data['permitFileList'] = $this->ModelrekabLabour->getUploadFileList($docType, $wkr_id);
			
			$this->load->view('rekablabor/labor_edit_attach_printpermit', $data);	
		}
		
		function deleteUploadedFile(){
			$upload_id = $this->uri->segment(3);
			$wkr_id = $this->uri->segment(4);
			$filepath = $this->ModelrekabLabour->getFilePathByUploadID($upload_id, 'upload_filepath');
			$filetype = $this->ModelrekabLabour->getFilePathByUploadID($upload_id, 'upload_filetype');
			
			$myFile = "./" . $filepath;
			if (file_exists($myFile)) {
				unlink($myFile);
			}
			
			$deleteQuery = "DELETE FROM wkr_uploaddoc WHERE upload_id = $upload_id";
			$this->db->query($deleteQuery);
			
			if($filetype == "contracts")
			{
				redirect('contrekabLabour/attachContract/' . $wkr_id . '/delete');
			}
			else{
				redirect('contrekabLabour/attachDoc/' . $wkr_id . '/delete');
			}
		}
		
		function getUploadScriptCERT(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistCert.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "CERTIFICATE";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("-", $line);
				$passno = trim($dataChunks[0]);
				
				$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
				$filepath = "uploads/labour/" . $filetype . "/" . $line;
				if($wkr_id > 0){
					$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$filetype', '', '', '$line', '$filepath', NOW());" . "<br />";
				}
				else{
					$nonExisting .= $line . "<br />";	
				}
			}
			echo "#SQL query for ADD and CERT <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptADD(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistadd.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "Address";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$file[0] = trim($dataChunks[0]);
				$file[1] = trim($dataChunks[1]);
				$file[2] = trim($dataChunks[2]);
				$file[3] = trim($dataChunks[3]);
				for($i=0;$i<4;$i++){
					if(strlen($file[$i]) > 0){
						$eachFileChunks = explode("-", $file[$i]);
						$passno = $eachFileChunks[0];
						
						$filepath = "uploads/labour/Address/" . $filetype . "/" . $file[$i];
						$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
						
						if($wkr_id > 0){
							$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$filetype', '', '', '$file[$i]', '$filepath', NOW());" . "<br />";
						}
						else{
							$nonExisting .= $file[$i] . "<br />";	
						}
					}
				}				
			}
			echo "#SQL query for ADD (Address) <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptPASS(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistpass2.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "Passport";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$file[0] = trim($dataChunks[0]);
				$file[1] = trim($dataChunks[1]);
				$file[2] = trim($dataChunks[2]);
				for($i=0;$i<3;$i++){
					if(strlen($file[$i]) > 0){
						$eachFileChunks = explode("-", $file[$i]);
						$passno = $eachFileChunks[0];
						
						$filepath = "uploads/labour/" . $filetype . "/" . $file[$i];
						$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
						if($wkr_id > 0){
							$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$filetype', '', '', '$file[$i]', '$filepath', NOW());" . "<br />";
						}
						else{
							$nonExisting .= $file[$i] . "<br />";	
						}
					}
				}				
			}
			echo "#SQL query for Pass (Passport) <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptPICT(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistpict2.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "Photo";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$file[0] = trim($dataChunks[0]);
				$file[1] = trim($dataChunks[1]);
				$file[2] = trim($dataChunks[2]);
				for($i=0;$i<3;$i++){
					if(strlen($file[$i]) > 0){
						$passno = str_replace(".jpg", "", $file[$i]);
						
						$filepath = "uploads/labour/" . $filetype . "/" . $file[$i];
						$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
						if($wkr_id > 0){
							$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$filetype', '', '', '$file[$i]', '$filepath', NOW());" . "<br />";
						}
						else{
							$nonExisting .= $file[$i] . "<br />";	
						}
					}
				}				
			}
			echo "#SQL query for PICT (Pictures) <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptPLKS(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistplks3.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "PLKS";
			$prevPassportNo = "";
			$prevwkr_id = "";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$file[0] = trim($dataChunks[0]);
				$file[1] = trim($dataChunks[1]);
				$file[2] = trim($dataChunks[2]);
				for($i=0;$i<3;$i++){
					if(strlen($file[$i]) > 0){
						$eachFileChunks = explode("-", $file[$i]);
						$passno = $eachFileChunks[0];
						$uploadfiletype = str_replace(".jpg", "", $eachFileChunks[1]);
						$fileNumber = substr($uploadfiletype, 4, strlen($uploadfiletype));
						$uploadfiletype = "PLKS-" . $fileNumber;
						
						$filepath = "uploads/labour/" . $filetype . "/" . $file[$i];
						if($passno == $prevPassportNo){
							$wkr_id = $prevwkr_id;
						}
						else{
							$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
							$prevPassportNo = $passno;
							$prevwkr_id = $wkr_id;
						}
						
						if($wkr_id > 0){
							$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$uploadfiletype', '', '', '$file[$i]', '$filepath', NOW());" . "<br />";
						}
						else{
							$nonExisting .= $file[$i] . "<br />";	
						}
					}
				}				
			}
			echo "#SQL query for PLKS<br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptVISA(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistsvisa2.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "VISA";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$file[0] = trim($dataChunks[0]);
				$file[1] = trim($dataChunks[1]);
				$file[2] = trim($dataChunks[2]);
				for($i=0;$i<3;$i++){
					if(strlen($file[$i]) > 0){
						$eachFileChunks = explode("-", $file[$i]);
						$passno = $eachFileChunks[0];
						
						$filepath = "uploads/labour/" . $filetype . "/" . $file[$i];
						$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
						if($wkr_id > 0){
							$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
									 VALUES (NULL, $wkr_id, '$filetype', '', '', '$file[$i]', '$filepath', NOW());" . "<br />";
						}
						else{
							$nonExisting .= $file[$i] . "<br />";	
						}
					}
				}				
			}
			echo "#SQL query for VISA <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function getUploadScriptSPASS(){
			$filepath = "C:\Documents and Settings\User\Desktop\CLAB Files\List of Attachments from Old SKIM\dirlistspass2.txt";	
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			$nonExisting = "";
			$filetype = "SpecialPass";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				
				$eachFileChunks = explode("-", $line);
				$passno = $eachFileChunks[0];
						
				$filepath = "uploads/labour/" . $filetype . "/" . $line;
				$wkr_id = $this->ModelrekabLabour->getWkrIDByPassportNo($passno);
				if($wkr_id > 0){
					$sqlQuery .= "INSERT INTO wkr_uploaddoc (upload_id, upload_wkrid, upload_filetype, upload_otherdoc_specify, upload_filesize, upload_destfilename, upload_filepath, upload_date) 
							 VALUES (NULL, $wkr_id, '$filetype', '', '', '$line', '$filepath', NOW());" . "<br />";
				}
				else{
					$nonExisting .= $line . "<br />";	
				}
			}
							
			echo "#SQL query for SpecialPass <br />";
			echo $sqlQuery;
			echo "#files that can't be matched <br />";
			echo $nonExisting;
		}
		
		function permitRenewalHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$permithistory_id = $this->uri->segment(4);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['currentRenewal'] = $this->ModelrekabLabour->getPermitHistoryByID($permithistory_id);
				$data['insertupdateflag'] = 'update';
				
				$this->load->view('rekablabor/update_permits_history', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function viewPermitExpHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){			
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['permitHistory'] = $this->ModelrekabLabour->getPermitHistory($wkr_id);
				
				$this->load->view('rekablabor/labor_edit_permitexphistory', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function updatePermitExpHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['txtwkrid'];
				$plksno = $_POST['txtplksno'];
				$plksexp_date = date('Y-m-d', strtotime($_POST['dtpermitexp']));
				
				$nextPlksHistId = $this->ModelrekabLabour->getNextPlksHistId();
				
				$sqlUpdatePermitHist = "INSERT INTO wkr_permitexp_history (newplksexp_id, newplksexp_wkrid, newplks_no, newplksexp_date, newplksexp_setby, newplksexp_setdate) " .
									   " VALUES ($nextPlksHistId, $wkr_id, '$plksno', '$plksexp_date', $currentuserid, NOW())";
									   
				$sqlUpdateWorkers = "UPDATE workers SET wkr_status = 1, wkr_plksno = '". $plksno . 
				                    "', wkr_permitexp = '" . $plksexp_date . "' WHERE wkr_id = " . $wkr_id;
				
				$this->db->query($sqlUpdatePermitHist);
				$this->db->query($sqlUpdateWorkers);
				
				redirect('contrekabLabour/viewPermitExpHistory/' . $wkr_id);
			}
			else{
				$this->load->view('session_expired_popup.php');
			}
		}
		
		function viewPassportExpHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $this->uri->segment(3);
				$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
				$data['passExpHistory'] = $this->ModelrekabLabour->getPassExpHistory($wkr_id);
				
				$this->load->view('rekablabor/labor_edit_passexphistory', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function updatePassportExpHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['txtwkrid'];
				$passportexp_date = date('Y-m-d', strtotime($_POST['dtpassexp']));
				
				$nextPassHistId = $this->ModelrekabLabour->nextPassHistId();
				
				$sqlUpdatePassHist = "INSERT INTO wkr_pass_history (newpassexp_id, newpassexp_wkrid, newpassexp_date, newpass_setby, newpass_setdate) " . 
									   " VALUES ($nextPassHistId, $wkr_id, '$passportexp_date', $currentuserid, NOW());";
									   
				$sqlUpdateWorkers = "UPDATE workers SET wkr_status = 1, wkr_passexp = '" . $passportexp_date . "' WHERE wkr_id = " . $wkr_id;
				
				$this->db->query($sqlUpdatePassHist);
				$this->db->query($sqlUpdateWorkers);
				
				redirect('contrekabLabour/viewPassportExpHistory/' . $wkr_id);
			}
			else{
				$this->load->view('session_expired_popup.php');
			}
		}
		
		function editPassportHistory(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$passexp_id = $this->uri->segment(3);
				
				$data['passExpHistory'] = $this->ModelrekabLabour->getPassExpHistoryById($passexp_id);
				
				$this->load->view('rekablabor/labor_edit_passexphistorypt2', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function editPassportHistorySubmit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$passhist_id = $_POST['txtpasshistid'];
				$wkr_id = $_POST['txtwkrid'];
				$passportexp_date = date('Y-m-d', strtotime($_POST['dtpassexp']));
				
				$sqlUpdatePassHist = "UPDATE wkr_pass_history SET newpassexp_date = '$passportexp_date', newpass_modifiedby = $currentuserid, newpass_modifieddate = NOW()
									  WHERE newpassexp_id = " . $passhist_id;
									   
				$sqlUpdateWorkers = "UPDATE workers SET wkr_status = 1, wkr_passexp = '" . $passportexp_date . "' WHERE wkr_id = " . $wkr_id;
				
				$this->db->query($sqlUpdatePassHist);
				$this->db->query($sqlUpdateWorkers);
				
				redirect('contrekabLabour/viewPassportExpHistory/' . $wkr_id);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function editPermitHistoryStep2(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$permitexp_id = $this->uri->segment(3);
				
				$data['permitExpHistory'] = $this->ModelrekabLabour->getPermitExpHistoryById($permitexp_id);
				$this->load->view('rekablabor/labor_edit_permitexphistorypt2', $data);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function editPermitHistoryStep2Submit(){
			$currentuserid = $this->session->userdata('emp_id');
			if(strlen($currentuserid) > 0){
				$wkr_id = $_POST['txtwkrid'];
				$permitexphist_id = $_POST['txpermithistid'];
				$plksno = $_POST['txtplksno'];
				$plksexp_date = date('Y-m-d', strtotime($_POST['dtpermitexp']));
				
				$sqlUpdatePermitHist = "UPDATE wkr_permitexp_history SET newplks_no = '$plksno', newplksexp_date = '$plksexp_date', newplksexp_modifiedby = $currentuserid, newplksexp_modifieddate = NOW()
										WHERE newplksexp_id = " . $permitexphist_id;
									   
				$sqlUpdateWorkers = "UPDATE workers SET wkr_status = 1, wkr_plksno = '". $plksno . 
				                    "', wkr_permitexp = '" . $plksexp_date . "' WHERE wkr_id = " . $wkr_id;
				
				$this->db->query($sqlUpdatePermitHist);
				$this->db->query($sqlUpdateWorkers);
				
				redirect('contrekabLabour/viewPermitExpHistory/' . $wkr_id);
			}
			else{
				$this->load->view('session_expired_popup.php');	
			}
		}
		
		function viewStatusHistory(){
			$wkr_id = $this->uri->segment(3);
			$data['labor'] = $this->ModelrekabLabour->getLabourByWkrID($wkr_id);
			$data['statusHistory'] = $this->ModelrekabLabour->getStatusHistory($wkr_id);
			
			$this->load->view('rekablabor/labor_status_history', $data);
		}
}
?>