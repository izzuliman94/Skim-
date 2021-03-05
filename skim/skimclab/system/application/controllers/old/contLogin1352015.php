<?php
	class contLogin extends Controller{
		function contLogin(){
			parent::Controller();
			$this->load->library('session');
			$this->load->database();
			$this->load->Model('ModelLabour');
		}
		
		function index(){
			$this->load->view('main.php');	
		}
		
		function login(){
			$username=$_POST["username"];
			$password = $_POST["password"];
			
			//validate login
			$sqlQuery = "SELECT emp_id, emp_name, emp_username, emp_accessibility FROM employees WHERE emp_username = '$username' AND emp_password = '$password' AND emp_status=1";
			$userRecord = $this->db->query($sqlQuery);
			
			if($userRecord->num_rows() > 0)
			{
				$user_row = $userRecord->row();
				
				//destroy previous session
				$this->session->sess_destroy();

				//create new session
				$this->session->sess_create();
			
				$this->session->set_userdata('_is_skim_session', 'true');
				$this->session->set_userdata('username', $user_row->emp_username);
				$this->session->set_userdata('emp_id', $user_row->emp_id);
				$this->session->set_userdata('emp_accessibility', $user_row->emp_accessibility);
				
				//update workers status if plks expired
				//perform this only if admin log in
				if(strpos($user_row->emp_accessibility, '6') !== false) {
					//$this->ModelLabour->autoWkrStatusChange();
				}
				
				$this->load->view('index.htm');
			}
			else{
				$data['errorMsg'] = "Invalid loginID or password.";
				$this->load->view('main.php', $data);	
			}
		}
		
		function topFrame(){
			$this->load->view('top.php');
		}
		
		function leftFrame(){
			$sitemapCtr = "";
			$sitemapLabour = "";
			$sitemapLocalTransfer = "";
			$sitemapSpimtc = "";
			$sitemapSpim = "";
			$sitemapAdmin = "";
			$sitemapReports = "";
			$sitemapRenewal = "";
			$sitemapFinance = "";
			$sitePrintid = "";
			$siteMonitoring = "";
			$sitePassportMgt = "";
			$sitemapRenewalFirst = "";
			
			
			
			$accessibility = $this->session->userdata('emp_accessibility');
			/*****how acceessibility is defined*****
			* 1 - Contractor
			* 2 - Labour
			* 3 - Local Transfer
			* 4 - Spim
			* 5 - Reports
			* 6 - Administration
			* 7 - Verification
			* 8 - Approve/Reject
			* 9 - Delete
			* A - Renewal
			* T - Transit Centre
			*/
			if(strpos($accessibility, '1') !== false){
				$sitemapCtr .= "['Contractor', '/skimclab/index.php/contContractor/ctrDashboard',
									['Registration', '/skimclab/index.php/contContractor/registrationForm'],
									['Change Status', '/skimclab/index.php/contContractor/changeCtrStatus'],
									['Assign Labour', '/skimclab/index.php/contContractor/assignLabourCompSearch'],
									['Contractors List', '/skimclab/index.php/contContractor/ctrList'], 
									['Approval', '/skimclab/index.php/contContractor/listContractorByStatus/approval/0'],
								],";
			}
			
			if(strpos($accessibility, '2') !== false){
				$sitemapLabour .= "['Labour', '/skimclab/index.php/contLabour/labourDashbrd',
										['Registration', '/skimclab/index.php/contLabour/newLabour'],
										['Assign Company', '/skimclab/index.php/contLabour/assignCompany'],
										['Change Status', '/skimclab/index.php/contLabour/changeLaborStatus'],
										['Labour List', '/skimclab/index.php/contLabour/listLabour'],
										['Permit Renewal Status', '/skimclab/index.php/contLabour/updatePermits'],
									],";
			}
			
			if(strpos($accessibility, '3') !== false){
				$sitemapLocalTransfer .= "['Local Transfer', '/skimclab/index.php/contAvailable/availableDashbrd',
											 ['New Local Transfer', '/skimclab/index.php/contAvailable/availableForm'],
										],";
			}
			if(strpos($accessibility, '4') !== false){
				$sitemapSpim .= "['SPIM (VDR)', '/skimclab/index.php/contSpim/spimDashbrd',
									['New Work Order', '/skimclab/index.php/contSpim/newWorkOrder'],
									['Update Work Order', '/skimclab/index.php/contSpim/updateWorkOrder'],
									['Workorder Lists', '/skimclab/index.php/contSpim/listAllWorkorders'],
									['Approval', '/skimclab/index.php/contSpim/listAllApproval'],
										],";
			}
			if(strpos($accessibility, 'T') !== false){
				$sitemapSpimtc .= "['SPIM (Transit Centre)', '/skimclab/index.php/contSpimtc/spimDashbrd',
									['New Work Order', '/skimclab/index.php/contSpimtc/newWorkOrder'],
									['Update Work  Order', '/skimclab/index.php/contSpimtc/updateWorkOrder'],
									['Workorder Lists', '/skimclab/index.php/contSpimtc/listAllWorkorders'],
									['Approval', '/skimclab/index.php/contSpimtc/listAllApproval'],
								],";
			}
			
			if(strpos($accessibility, 'A') !== false){
				$sitemapRenewal .= "['SPIM (Renewal)', '/skimclab/index.php/contRenewal/spimDashbrd',
									['New Renewal', '/skimclab/index.php/contRenewal/newWorkOrder'],
									['Update Renewal', '/skimclab/index.php/contRenewal/updateWorkOrder'],
									['Renewal Lists', '/skimclab/index.php/contRenewal/listAllWorkorders'],
									['Approval', '/skimclab/index.php/contRenewal/listAllApproval'],
								],";
			}
			
				if(strpos($accessibility, 'F') !== false){
				$sitemapRenewalFirst .= "['SPIM (First Year Renewal )', '',
									['Update First Year Renewal', '/skimclab/index.php/contSpimFirst/updateWorkOrder'],
									['1st Year Renewal List', '/skimclab/index.php/contSpimFirst/listAllWorkorders'],
									
								],";
			}
			
			if(strpos($accessibility, 'B') !== false){
				$sitemapFinance .= "['Finance', '',
				                    ['Payment Advice (VDR)', '/skimclab/index.php/contPayment/openvdr'],
									['Payment Advice (VDR) List', '/skimclab/index.php/contPayment/ListallpaymentVDR'],
									['Payment Advice (EXT)', '/skimclab/index.php/contPayment/openext'],
									['Payment Advice (EXT) List', '/skimclab/index.php/contPayment/ListallpaymentEXT'],
									['Payment Receipt', '/skimclab/index.php/contPayment/paymentrcpt'],
									['Payment Receipt List', '/skimclab/index.php/contPayment/receiptlist'],
									['Payment Summary (VDR)', '/skimclab/index.php/contPayment/xlssumvdrlist'],
									['Payment Summary (EXT)', '/skimclab/index.php/contPayment/xlssumextlist'],
									['Payment Summary (ALL)', '/skimclab/index.php/contPayment/xlssumalllist'],	
									
				                ],";
			}
			
			if(strpos($accessibility, '5') !== false){
				$sitemapReports .= "['Reports', '/skimclab/index.php/contReports/reportsDashbrd',
									    ['Contractors', '/skimclab/index.php/contReports/ctrReports'],
										['Labour', '/skimclab/index.php/contReports/viewFCLReports'],
										['SPIM VDR', '/skimclab/index.php/contReports/viewFCLReports'],
										['SPIM Renewal', '/skimclab/index.php/contReports/viewSPIMRenewalReports'],
										['Finance', '/skimclab/index.php/contReports/viewFCLReports'],
									],";
			}
			
			if(strpos($accessibility, '6') !== false){
				$sitemapAdmin .= "['System Administration', '/skimclab/index.php/contAdmin/dashbrd',
									['Add User', '/skimclab/index.php/contAdmin/newUser'],
									['Users List', '/skimclab/index.php/contAdmin/listUsers'],
									['Masters', '/skimclab/index.php/contAdmin/loadMasters/mst_nationality'],
								],";
			}
			
			if(strpos($accessibility, 'C') !== false){
				$sitePrintid .= "['SKIM ID Card', '',
									['Print ID Card', '/skimclab/index.php/contidcard/newid'],	
									['Print Thumb Print', '/skimclab/index.php/contidcard/newthumb'],									
								],";
			}	
			
			if(strpos($accessibility, 'M') !== false){
				$siteMonitoring .= "['ICT Report', '',
									['VDR Report', '/skimclab/index.php/contSpim/ListWO'],	
									['EXT Report', '/skimclab/index.php/contRenewal/ListWO'],
									['KBRI Report', '/skimclab/index.php/contRenewal/ListWorker'],
									['Monthly Report', '/skimclab/index.php/contRenewal/ListWorker'],
									['COM & Cancel Permit Report', '/skimclab/index.php/contRenewal/ListWorker'],								
								],";
			}	
			
			if(strpos($accessibility, 'P') !== false){
				$sitePassportMgt .= "['IT Passport Management', '',
									['(VDR)Passport  ', '/skimclab/index.php/contPassport/listAllWorkordersVDR'],	
									['(Extension)Passport  ', '/skimclab/index.php/contPassport/listAllWorkordersEXT'],
									['(Transit Centre)Passport  ', '/skimclab/index.php/contPassport/listAllWorkordersTC'],							
								],";
			}
			
			$data['sitemapMenu'] = $sitemapCtr . $sitemapLabour . $sitemapLocalTransfer . $sitemapSpimtc . $sitemapSpim . $sitemapRenewalFirst . $sitemapRenewal . $sitemapFinance. $sitePrintid. $sitemapAdmin . $sitemapReports . $siteMonitoring . $sitePassportMgt;
			
			$this->load->view('left.php', $data);
		}
		
		function mainFrame(){
			redirect('contContractor/ctrDashboard');
		}
		
		function changePasswd(){
			$status = $this->uri->segment(3);
			
			if($status == 'update') $data['status'] = "<strong><font color=\"red\">Your password has been changed successfully!</font></strong>";
			else $data['status'] = "";
			
			$this->load->view('changePasswd.php', $data);	
		}
		
		function editPasswordSubmit(){
			$newPassword = $_POST['newpassword'];
			$login_id = $_POST['login_id'];
			
			$updatePasswdQuery = "UPDATE employees SET emp_password = '$newPassword' WHERE emp_id = " . $login_id;
			$this->db->query($updatePasswdQuery);
			
			redirect('contLogin/changePasswd/update');
		}
		
		function logout(){
			$this->session->sess_destroy();
			$data['errorMsg']="Logout success.";
			$this->load->view('main', $data);	
		}
		
		//This function is to import the data from OLD SPIM database
		function filterSpimData(){
			$filepath="C:\Documents and Settings\User\Desktop\SKIM conversion 20090808\spim_tbl_stat.csv";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			
			while (!feof($fs) )
			{
				$sql = "";
				$wo_isreceive = '0';
				$wo_isprocess = '0';
				$wo_issentto_hr = '0';
				$wo_isreceiveby_hr = '0';
				$wo_isjim_ack = '0';
				$wo_isreceive_visa = '0';

				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				
				$status_woid = $dataChunks[0];
				$wo_receivedate = trim($dataChunks[1]);
					if(strlen($wo_receivedate) > 0){
						$wo_isreceive = '1';
						$wo_receivedate = date('Y-m-d', strtotime($wo_receivedate));
					}
					else $wo_receivedate = "0000-00-00";
				$wo_processdate = trim($dataChunks[2]);
					if(strlen($wo_processdate) > 0){
						$wo_isprocess = '1';
						$wo_processdate = date('Y-m-d', strtotime($wo_processdate));
					}
					else $wo_processdate = "0000-00-00";
				$wo_senthrdate = trim($dataChunks[3]);
					if(strlen($wo_senthrdate) > 0) {
						$wo_issentto_hr = '1';	
						$wo_senthrdate = date('Y-m-d', strtotime($wo_senthrdate));
					}
					else $wo_senthrdate = "0000-00-00";
				$wo_receivehrdate = trim($dataChunks[4]);
					if(strlen($wo_receivehrdate) > 0) {
						$wo_isreceiveby_hr = '1';	
						$wo_receivehrdate = date('Y-m-d', strtotime($wo_receivehrdate));
					}
					else $wo_receivehrdate = "0000-00-00";
				$wo_receivehr_comment = $dataChunks[5];
				$wo_jimackdate = trim($dataChunks[6]);
					if(strlen($wo_jimackdate) > 0) {
						$wo_isjim_ack = '1';	
						$wo_jimackdate = date('Y-m-d', strtotime($wo_jimackdate));
					}
					else $wo_jimackdate = "0000-00-00";
				$wo_jimack_refno = $dataChunks[7];
				$wo_receivevisadate = trim($dataChunks[8]);
					if(strlen($wo_receivevisadate) > 0) {
						$wo_isreceive_visa = '1';
						$wo_receivevisadate = date('Y-m-d', strtotime($wo_receivevisadate));
					}
					else $wo_receivevisadate = "0000-00-00";
				$wo_receivevisa_approve = $dataChunks[9];
				$wo_receivevisa_reject = $dataChunks[10];
				$wo_receivevisa_comment = $dataChunks[11];
				
				
				//calculate current processing stage
				if($wo_isreceive_visa == '1') $wo_latest_progress = "receive calling visa";
				else if($wo_isjim_ack == '1') $wo_latest_progress = "JIM acknowledgement";
				else if($wo_isreceiveby_hr == '1') $wo_latest_progress = "receive by HR";
				else if($wo_issentto_hr == '1') $wo_latest_progress = "submit to HR";
				else if($wo_isprocess == '1') $wo_latest_progress = "processed by Operation";
				else if($wo_isreceive == '1') $wo_latest_progress = "received by Operation";
				else $wo_latest_progress = "workorder submitted";
				
				//echo $status_woid . ", ". $wo_receivedate . ", ". $wo_processdate . ", ". $wo_senthrdate . ", ". $wo_receivehrdate. ", ". $wo_jimackdate . "<br />";
				$sqlQuery .= "INSERT INTO wo_status (status_woid, wo_isreceive, wo_receivedate, wo_isprocess, wo_processdate, wo_issentto_hr, wo_senthrdate, wo_isreceiveby_hr, wo_receivehrdate, wo_receivehr_comment, wo_isjim_ack, wo_jimackdate, wo_jimack_refno, wo_isreceive_visa, wo_receivevisadate, wo_receivevisa_approve, wo_receivevisa_reject, wo_receivevisa_comment, wo_latest_progress)
				             VALUES ($status_woid, $wo_isreceive, '$wo_receivedate', $wo_isprocess, '$wo_processdate', $wo_issentto_hr, '$wo_senthrdate', $wo_isreceiveby_hr, '$wo_receivehrdate', '$wo_receivehr_comment', $wo_isjim_ack, '$wo_jimackdate', '$wo_jimack_refno', $wo_isreceive_visa, '$wo_receivevisadate', '$wo_receivevisa_approve', '$wo_receivevisa_reject', '$wo_receivevisa_comment', '$wo_latest_progress');";
				$sqlQuery .= "<br />";
			}
			echo $sqlQuery;
		}
		
		//function to convert date string to SQL-recognized format
		function filterSpimDocData(){
			$filepath="C:\Documents and Settings\User\Desktop\SKIM conversion 20090808\spim_tbl_doc.csv";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				
				$doc_woid = $dataChunks[0];
				$doc_rqform = $dataChunks[1];
				$doc_awardletter = $dataChunks[2];
				$doc_acco = $dataChunks[3];
				$doc_empletter = $dataChunks[4];
				$doc_supplieragree = $dataChunks[5];
				$doc_signedpayment = $dataChunks[6];
				$doc_datecomplete = $dataChunks[7];
					if(strlen($doc_datecomplete) > 0 && $doc_datecomplete !== '\\N') $doc_datecomplete = date('Y-m-d', strtotime($doc_datecomplete));
					else $doc_datecomplete = "0000-00-00";
				
				if($doc_datecomplete == "1970-01-01") $doc_datecomplete = "0000-00-00";
				
				$sqlQuery .= "INSERT INTO wo_doc (doc_woid, doc_rqform, doc_awardletter, doc_acco, doc_empletter, doc_supplieragree, doc_signedpayment, doc_datecomplete) 
				              VALUES($doc_woid, $doc_rqform, $doc_awardletter, $doc_acco, $doc_empletter, $doc_supplieragree, $doc_signedpayment, '$doc_datecomplete');";
				$sqlQuery .= "<br />";
			 }
			 echo $sqlQuery;
		}
		
		//function to convert date string to SQL-recognized format
		function filterSpimLegalData(){
			$filepath="C:\Documents and Settings\User\Desktop\SKIM conversion 20090808\spim_tbl_legal.csv";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			
			while (!feof($fs) )
			{
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$legal_woid = $dataChunks[0];
				$legal_agree_receivedate  = $dataChunks[1];
					if(strlen($legal_agree_receivedate) >0) $legal_agree_receivedate = date('Y-m-d', strtotime($legal_agree_receivedate));
					else $legal_agree_receivedate = "0000-00-00";
					
					if($legal_agree_receivedate == "1970-01-01") $legal_agree_receivedate = "0000-00-00";
				$legal_date_ho = "0000-00-00";
				
				$sqlQuery .= "INSERT INTO wo_legal (legal_woid, legal_agree_receivedate, legal_date_ho) 
				              VALUES($legal_woid, '$legal_agree_receivedate', '$legal_date_ho');";
				$sqlQuery .= "<br />";
			}
			echo $sqlQuery;
		}
		
		//function to assign currentemp to workers (to import from old database where they set the current company in address field)
		function filterWorkersData(){
			$filepath="C:\Documents and Settings\User\Desktop\workers_filtered.csv";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			while (!feof($fs) )
			{
				$sql = "";
				$line = fgets($fs);
				$dataChunks = str_replace("\"", "", explode("|", $line));
				
				$passno = $dataChunks[0];
				$address = $dataChunks[1];
				$company = "";
				
				$addrChunks = explode(";", $address);
				$company = str_replace("\\", "", $addrChunks[0]);
				
				echo $passno . "|" . $company . "<br />";
			}
		}
		
		function getWorkersCompanyCLAB(){
			$filepath="C:\Documents and Settings\User\Desktop\workers_filtered2.txt";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			while (!feof($fs) )
			{
				$sql = "";
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				
				$passno = $dataChunks[0];
				$companyname = trim($dataChunks[1]);
				
				$sqlQuery = "SELECT ctr_clab_no FROM contractors WHERE ctr_comp_name = " . $this->db->escape($companyname);
				$ctrRecord = $this->db->query($sqlQuery);
				if($ctrRecord->num_rows() > 0){
					//$ctrRow = $ctrRecord->row();
					//$clabno = $ctrRow->ctr_clab_no;
					
					//echo "UPDATE workers SET wkr_currentemp = '$clabno' WHERE wkr_passno = '$passno';" . "<br />";
				}
				else{
					$clabno = "";
					echo $passno . "|" . $companyname . "|" . "<br />";
				}
			}
		}
		
		function generateLuckyTimeContent(){
			$dataArray = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
			$dateAppendArray = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
			
			$arrayLength = count($dataArray);
			$longestLength = 0;
			$contentLength = 0;
			for($i=0;$i<$arrayLength;$i++){
				$filename = $dataArray[$i] . "052009.txt";
				$getDate = "2009-05-" . $dataArray[$i];
				
				$filepath="C:/Documents and Settings/User/Desktop/UMobile/LUCKY TIME/May/" . $filename;
				$fs = fopen($filepath, 'r');
				$dateAppend = $dateAppendArray[$i] . "/5";
				$sqlQuery = "";
				while (!feof($fs) )
				{
					$sql = "";
					$line = fgets($fs);
					$dataChunks = explode("|", $line);
					
					$combination = $dataChunks[0];
					$content = "RM0.30 " . $dateAppend . " " . trim($dataChunks[1]);
					$contentLength = strlen($content);
					if($contentLength > $longestLength) $longestLength = $contentLength;
					
					$sqlQuery .= "INSERT INTO umobile_lucky_content (datescheduled, combination, content, charge) VALUES ('$getDate', '$combination', '$content', '30');<br />";
				}
				echo "#===============" . $filename . "==============<br />";
				echo $sqlQuery;
				echo "<br />";
			}
			
			echo "<br />LONGEST CONTENT LENGTH = ". $longestLength;
		}
		
		function updateWorkersMovementStatus(){
			$filepath="C:\Documents and Settings\User\Desktop\wkr_transtatus.csv";
			$fs = fopen($filepath, 'r');
			$sqlQuery = "";
			
			while (!feof($fs) )
			{
				$sql = "";
				$line = fgets($fs);
				$dataChunks = explode("|", $line);
				$wkr_id = $dataChunks[0];
				$wkr_transtatus = $dataChunks[1];
				
				$sqlQuery .= "UPDATE WORKERS SET wkr_transtatus = $wkr_transtatus WHERE wkr_id = $wkr_id; <br />";
				
				
			}
			echo $sqlQuery;
		}
	}
?>