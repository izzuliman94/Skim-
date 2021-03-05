<?php
	class ModelContractor extends Model {
		function ModelContractor(){
			parent::Model();
			$this->load->database();	
		}
		
		function getAllAgent($searchdata){
		   
		    if(isset($searchdata) == ""){
			$strpassno = "";
			}else{
			$strpassno = $searchdata;
			}
		    
		    $sqlquery = "SELECT * FROM mst_wkr_agent where agent_desc like '%$strpassno%' order by agent_desc";
			return $this->db->query($sqlquery);
		}
		
		function getAllStates(){
			$query = "SELECT * FROM mst_states";
			
			return $this->db->query($query);
		}
		
		function getAllCtrGrades(){
			$query = "SELECT grade_id, grade_desc FROM mst_ctr_grade";
			
			return $this->db->query($query);
		}
		
		function getAllCtrCategories(){
			$query = "SELECT category_id, category_desc FROM mst_ctr_category";
			
			return $this->db->query($query);
		}
		
		function getAllCtrSpec(){
			$query = "SELECT spec_id, spec_category_id, spec_desc FROM mst_ctr_spec";
			
			return $this->db->query($query);
		}
		
		function companyExists($companyno){
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc, mst_emp_status.emp_status_desc FROM contractors";
			$query .= " LEFT JOIN mst_ctr_appstatus ON contractors.ctr_appstatus = mst_ctr_appstatus.appstatus_id";
			$query .= " LEFT JOIN mst_emp_status ON contractors.ctr_status = mst_emp_status.emp_statusid";
			$query .= " WHERE ctr_comp_regno = '" . $companyno . "'";
			
			
			return $this->db->query($query);
		}
		
		function getContractors($num, $offset){
			$this->db->select('*');
			$this->db->from('contractors');
			$this->db->join('mst_ctr_appstatus', 'contractors.ctr_appstatus=mst_ctr_appstatus.appstatus_id','LEFT');
			$this->db->join('mst_emp_status', 'contractors.ctr_status=mst_emp_status.emp_statusid','LEFT');
			$this->db->order_by('ctr_clab_no');
			$this->db->limit($num, $offset);
			
			$query = $this->db->get();
			
			return $query;	
		}
		
		function getTotalContractors(){
			$sqlQuery = "SELECT COUNT(*) AS totalctr FROM contractors";
			$ctrRecord = $this->db->query($sqlQuery);
			$ctrRow = $ctrRecord->row();
			
			return $ctrRow->totalctr;
		}
		
		function getCtrByAppStatus($appstatus_id, $returnType){
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc FROM contractors
					 LEFT JOIN mst_ctr_appstatus ON mst_ctr_appstatus.appstatus_id = contractors.ctr_appstatus
					 WHERE ctr_status = '1'";
			if($appstatus_id > 0){
				$query .= " AND ctr_appstatus = " . $appstatus_id;	
			}
			$query .= " ORDER BY ctr_datereg";
			
			$contractorsList = $this->db->query($query);
			
			if($returnType == 'total')
			{
				return $contractorsList->num_rows();
			}
			else 
				return $contractorsList;		
		}
		
		function getCtrByStatus($ctrstatus_id, $returnType){
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc FROM contractors
					  LEFT JOIN mst_ctr_appstatus ON mst_ctr_appstatus.appstatus_id = contractors.ctr_appstatus";
			if($ctrstatus_id > 0){
				$query .= " WHERE ctr_status = " . $ctrstatus_id;	
			}
			$query .= " ORDER BY ctr_datereg";
			
			$contractorsList = $this->db->query($query);
			
			if($returnType == 'total')
			{
				return $contractorsList->num_rows();
			}
			else 
				return $contractorsList;		
		}
		
		function getCtrForApproval($returnType){
			//only get active contractors
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc FROM contractors 
					  LEFT JOIN mst_ctr_appstatus ON mst_ctr_appstatus.appstatus_id = contractors.ctr_appstatus
					  WHERE ctr_appstatus IN ('1', '2') AND ctr_status = '1'	
					  ORDER BY ctr_datereg;";
			
			$contractorsList = $this->db->query($query);
			
			if($returnType == 'total')
			{
				return $contractorsList->num_rows();
			}
			else 
				return $contractorsList;	
		}
		
		function getAppStatusByStatusID($appStatusID){
			$query = "SELECT appstatus_desc FROM mst_ctr_appstatus WHERE appstatus_id = " . $appStatusID;	
			
			$appStatusRecord = $this->db->query($query);
			$appStatusRow = $appStatusRecord->row();
			
			return $appStatusRow->appstatus_desc;
		}
		
		function getStatusByStatusID($statusID){
			$query = "SELECT emp_status_desc FROM mst_emp_status WHERE emp_statusid = " . $statusID;	
			
			$appStatusRecord = $this->db->query($query);
			$appStatusRow = $appStatusRecord->row();
			
			return $appStatusRow->emp_status_desc;
		}
		
		function getCtrRegisterOnline($statusType, $statusID, $returnType){
			$ctrQuery = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc FROM contractors 
						 LEFT JOIN mst_ctr_appstatus ON mst_ctr_appstatus.appstatus_id = contractors.ctr_appstatus
						 WHERE ctr_insertflag = '2'";	
			if($statusType == 'ctr_appstatus'){
				$ctrQuery .= " AND ctr_appstatus = '$statusID'";
			}
			else if($statusType == 'ctr_status'){
					$ctrQuery .= " AND ctr_status = '$statusID'";
			}
			else{
			}
			
			$ctrRecord = $this->db->query($ctrQuery);
		
			if($returnType == 'list'){
				return $ctrRecord;	
			}
			else return $ctrRecord->num_rows();
		}
		
		function getCtrByClabNo($ctr_clab_no){
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc, mst_emp_status.emp_status_desc,  
			mst_states.state_name, employees.emp_position, ctr_printletter_history.print_date, employees2.emp_position as 
			emp_position2,wo_agency.agency_name,wo_agency.agency_addr1,wo_agency.agency_addr2,
			wo_agency.agency_addr3,mst_wkr_agent.agent_desc,mst_wkr_agent.agent_addr1,mst_wkr_agent.agent_addr2,
			mst_wkr_agent.agent_addr3 FROM contractors ";
			$query .= " LEFT JOIN mst_ctr_appstatus ON contractors.ctr_appstatus = mst_ctr_appstatus.appstatus_id";
			$query .= " LEFT JOIN mst_emp_status ON contractors.ctr_status = mst_emp_status.emp_statusid";
			$query .= " LEFT JOIN mst_states ON contractors.ctr_state = mst_states.state_id";
			$query .= " LEFT JOIN employees ON employees.emp_name = contractors.ctr_app_name";
			$query .= " LEFT JOIN ctr_printletter_history ON ctr_printletter_history.print_ctr_clabno = contractors.ctr_clab_no";
			$query .= " LEFT JOIN employees employees2 ON employees2.emp_name = contractors.ctr_rej_name";
			$query .= " LEFT JOIN wo_agency On wo_agency.agency_id = contractors.agent_id ";
			$query .= " LEFT JOIN mst_wkr_agent On mst_wkr_agent.agent_id = contractors.agent_id ";
			$query .= " WHERE ctr_clab_no = '" . $ctr_clab_no . "'";	
			
			$ctrRecord = $this->db->query($query);
			
			return $ctrRecord->row();
		}
		
		function getCancelPermit($ctr_clab_no){
			$query = "SELECT workers.*, mst_countries.* ,contractors.*, mst_states.* FROM
			workers";
			$query .= " LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id";
			$query .= " LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp";
			$query .= " LEFT JOIN mst_states ON contractors.ctr_state = mst_states.state_id";
			$query .= " WHERE workers.wkr_status = 2 AND workers.wkr_transtatus in (12,8) AND workers.wkr_permitexp BETWEEN '2018-04-01' AND '2018-05-31' and	contractors.ctr_clab_no = '" . $ctr_clab_no . "'";
			return $this->db->query($query);	
			
		}
		
		function searchContractors($searchby, $keyword,$num,$offset){
			$this->db->select('*');
    		$this->db->from('contractors');
    		$this->db->join('mst_ctr_appstatus', 'contractors.ctr_appstatus = mst_ctr_appstatus.appstatus_id');
    		$this->db->join('mst_emp_status', 'contractors.ctr_status = mst_emp_status.emp_statusid');
    		$this->db->like($searchby, $keyword);
    		$this->db->order_by('ctr_clab_no');
	    	if($offset > 0) $this->db->limit($num, $offset);
			
    		$query = $this->db->get();
    		
    		return $query;
		}
		
		function searchCtrTotalRows($searchby, $keyword){
			$this->db->select('COUNT(*) AS totalCtr');
    		$this->db->from('contractors');
    		$this->db->join('mst_ctr_appstatus', 'contractors.ctr_appstatus = mst_ctr_appstatus.appstatus_id');
    		$this->db->join('mst_emp_status', 'contractors.ctr_status = mst_emp_status.emp_statusid');
    		$this->db->like($searchby, $keyword);
	    	
    		$query = $this->db->get();    		
    		$queryRow = $query->row();

    		return $queryRow->totalCtr;
		}
		
		function generateClabNo(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 'CLAB000001' 
						 ELSE CONCAT('CLAB', RIGHT(CONCAT('00000', CAST(RIGHT(MAX(ctr_clab_no), 6) AS UNSIGNED INTEGER) + 1), 6)) END 
						 AS next_clabno FROM contractors
						 WHERE ctr_clab_no LIKE 'CLAB%'";
			
			$clabnumRecord = $this->db->query($sqlQuery);
			$clabnumRow = $clabnumRecord->row();
			
			return $clabnumRow->next_clabno;
		}
		
		function generateTempClabNo(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 'TEMP000001'
						 ELSE CONCAT('TEMP', RIGHT(CONCAT('00000', CAST(RIGHT(MAX(ctr_clab_no), 6) AS UNSIGNED INTEGER) + 1), 6)) END 
						 AS temp_clabno FROM contractors
						 WHERE ctr_clab_no LIKE 'TEMP%'";
						 
			$clabnumRecord = $this->db->query($sqlQuery);
			$clabnumRow = $clabnumRecord->row();
			
			return $clabnumRow->temp_clabno;
		}
		
		function getAllCtrStatus(){
			$sqlQuery = "SELECT * FROM mst_emp_status";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getNextAttachmentID(){
			$sqlQuery = "select CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(att_id)+1 END AS max_attid FROM ctr_attachdoc";	
			
			$attachmentRecord = $this->db->query($sqlQuery);
			$attachmentRow = $attachmentRecord->row();
			
			return $attachmentRow->max_attid;
		}
		
		function getNextPaymentID(){
			$nextidQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE 
			                MAX(pay_id) + 1 END AS next_pay_id 
			                FROM ctr_payment";	
			$payidRecord = $this->db->query($nextidQuery);
			$payidRow = $payidRecord->row();
			
			return $payidRow->next_pay_id;
		}
		
		function getPreviousPayments($clabno){
			$sqlQuery = "SELECT * FROM ctr_payment WHERE pay_ctr_id = '$clabno' ORDER BY pay_id desc";
			
			return $this->db->query($sqlQuery);
		}
		
		function getCtrNameByClabNo($clabno){
			$sqlQuery = "SELECT ctr_comp_name FROM contractors WHERE ctr_clab_no = '$clabno'";
			
			$compRecord = $this->db->query($sqlQuery);
			$compRow = $compRecord->row();
			
			return $compRow->ctr_comp_name;
		}
		
		function getUploadHistory($clab_no){
			$sqlQuery = "SELECT ctr_attachdoc.*, employees.emp_username FROM ctr_attachdoc
						LEFT JOIN employees ON ctr_attachdoc.att_uploadby = employees.emp_id
						WHERE ctr_attachdoc.att_ctr_id = '$clab_no'";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getCtrByClabExpiry($fieldname, $noOfMonths, $returnType){
			$sqlQuery = "SELECT contractors.*, tablex.print_date,tablex.print_doctype";
			
			$sqlQuery .= " FROM contractors
						   LEFT JOIN (SELECT * FROM ctr_printletter_history WHERE ctr_printletter_history.print_isvoid = 0 AND print_docduration = $noOfMonths AND print_doctype = '$fieldname') AS tablex ON contractors.ctr_clab_no = tablex.print_ctr_clabno 
						  WHERE ";
			
			
			
			if($noOfMonths == 1){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == 2){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 30 DAY)
								AND $fieldname < date_add(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == 3){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 60 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 91 DAY)";	
			}
			else if($noOfMonths == -1){
				$sqlQuery .= " $fieldname < NOW()";	
			}
			else{
			}
			
			$sqlQuery .= " ORDER BY $fieldname";
			
			$ctrRecord = $this->db->query($sqlQuery);
			
			if($returnType == 'total'){
				return $ctrRecord->num_rows();	
			}
			else{ //$returnType = 'list'
				return $ctrRecord;
			}
		}
		
		
		function getCtrByClabExpiry1($fieldname, $noOfMonths, $returnType){
			$sqlQuery = "SELECT * FROM contractors WHERE";
			
			if($noOfMonths == 1){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == 2){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 30 DAY)
								AND $fieldname < date_add(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == 3){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 60 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 91 DAY)";	
			}
			else if($noOfMonths == -1){
				$sqlQuery .= " $fieldname < NOW()";	
			}
			else{
			}
			
			$sqlQuery .= " ORDER BY $fieldname";
			
			$ctrRecord = $this->db->query($sqlQuery);
			
			if($returnType == 'total'){
				return $ctrRecord->num_rows();	
			}
			else{ //$returnType = 'list'
				return $ctrRecord;
			}
		}
		
		function listExpiryByCompany($fieldname, $noOfMonths, $returntype, $clabNo){
			$sqlQuery = "SELECT ";
			if($returntype == 'companylist')
				$sqlQuery .= " wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, ctr_printletter_history.print_date";
			else if($returntype == 'listOfWorkers')
				$sqlQuery .= " workers.*, mst_countries.*,ctr_printletter_history.print_date";
			else {}
			
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN ctr_printletter_history ON contractors.ctr_clab_no = ctr_printletter_history.print_ctr_clabno AND ctr_printletter_history.print_isvoid = '0' AND print_doctype = '$fieldname' AND print_docduration = $noOfMonths
						  WHERE ";
			
			if($noOfMonths == 0.5){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 14 DAY)";	
			}
			else if($noOfMonths == 1){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == 2){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 30 DAY)
								AND $fieldname < date_add(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == 3){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 60 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 91 DAY)";	
			}
			else if($noOfMonths == 4){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 91 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 122 DAY)";	
			}
			else if($noOfMonths == -1){
				$sqlQuery .= " $fieldname < NOW()";	
			}
			else{
			}
			//only take active workers
			$sqlQuery .= " AND wkr_status = 1 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			if($returntype == 'companylist'){
				$sqlQuery .= " GROUP BY wkr_currentemp";
				$sqlQuery .= " ORDER BY ctr_comp_name";		
			}
			else if($returntype == 'listOfWorkers'){
				$sqlQuery .= " AND workers.wkr_currentemp = '$clabNo'";
				$sqlQuery .= " AND TIMESTAMPDIFF(YEAR,workers.wkr_entrydate,NOW()) + 1 < '10'";
				$sqlQuery .= " ORDER BY $fieldname, wkr_name";
				
			}
			else {}
//			echo $sqlQuery;
			return $this->db->query($sqlQuery);		
		}
		
		
		function listExpiryByCompanyLast($fieldname, $noOfMonths, $returntype, $clabNo){
			$sqlQuery = "SELECT ";
			if($returntype == 'companylist')
				$sqlQuery .= " wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, ctr_printletter_history.print_date";
			else if($returntype == 'listOfWorkers')
				$sqlQuery .= " workers.*, ctr_printletter_history.print_date,mst_countries.cty_desc";
			else {}
			
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN ctr_printletter_history ON contractors.ctr_clab_no = ctr_printletter_history.print_ctr_clabno AND ctr_printletter_history.print_isvoid = '0' AND print_doctype = '$fieldname' AND print_docduration = $noOfMonths
						  WHERE ";
			
			if($noOfMonths == -1){
				$sqlQuery .= "  $fieldname <= NOW() 
								AND $fieldname > date_sub(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == -2){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 30 DAY)
								AND $fieldname > date_sub(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == -3){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 60 DAY)
							   AND $fieldname > date_sub(NOW(), INTERVAL 91 DAY)";	
			}
			else{
			}
			//only take inactive workers
			$sqlQuery .= " AND wkr_transtatus = 12 ";
			$sqlQuery .= " AND wkr_status = 2 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			if($returntype == 'companylist'){
				$sqlQuery .= " GROUP BY wkr_currentemp";
				$sqlQuery .= " ORDER BY ctr_comp_name";		
			}
			else if($returntype == 'listOfWorkers'){
				$sqlQuery .= " AND workers.wkr_currentemp = '$clabNo'";
				$sqlQuery .= " ORDER BY $fieldname, wkr_name";
			}
			else {}
//			echo $sqlQuery;
			return $this->db->query($sqlQuery);		
		}
		
		
		
		function listExpiryByCompany2($fieldname, $noOfMonths, $returntype, $limit, $offset){
			$sqlQuery = "";
			if($returntype == 'total'){
				$sqlQuery = "SELECT COUNT(*) AS totalrows FROM(";
			}
			$sqlQuery .= "SELECT  wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, ctr_printletter_history.print_date";
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN ctr_printletter_history ON contractors.ctr_clab_no = ctr_printletter_history.print_ctr_clabno AND ctr_printletter_history.print_isvoid = '0' AND print_doctype = '$fieldname' AND print_docduration = $noOfMonths
						  WHERE ";
			
			if($noOfMonths == 0.5){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 14 DAY)";	
			}
			else if($noOfMonths == 1){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == 2){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 30 DAY)
								AND $fieldname < date_add(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == 3){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 60 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 91 DAY)";	
			}
			else if($noOfMonths == 4){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 91 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 122 DAY)";	
			}
			else if($noOfMonths == -1){
				$sqlQuery .= " $fieldname < NOW()";	
			}
			else{
			}
			//only take active workers
			$sqlQuery .= " AND wkr_status = 1 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			
			$sqlQuery .= " GROUP BY wkr_currentemp";
			$sqlQuery .= " ORDER BY ctr_comp_name";		
			if($limit > 0) 	$sqlQuery .= " LIMIT " . $offset . ", " . $limit;
			
			if($returntype == 'companylist')
				return $this->db->query($sqlQuery);		
			else{
				$sqlQuery .= " ) AS temptable;";
				//echo "<br />Query: " . $sqlQuery;
				$listOfCompanies = $this->db->query($sqlQuery);	
				$listOfCompaniesRows = $listOfCompanies->row();
					return $listOfCompaniesRows->totalrows;
			}
		}
		
		//$permittype => wkr_permitexp OR wkr_passexp
		function listExpiryByCompany3($fieldname, $noOfMonths, $returntype, $clabNo){
			$sqlQuery = "SELECT ";
			if($returntype == 'companylist')
				$sqlQuery .= " wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, tablex.print_date";
			else if($returntype == 'listOfWorkers')
				$sqlQuery .= " workers.*, ctr_printletter_history.print_date";
			else {}
			
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN (SELECT * FROM ctr_printletter_history WHERE ctr_printletter_history.print_isvoid = 0 AND print_docduration = $noOfMonths AND print_doctype = '$fieldname') AS tablex ON workers.wkr_currentemp = tablex.print_ctr_clabno 
						  WHERE ";
			
			if($noOfMonths == 0.5){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 14 DAY)";	
			}
			else if($noOfMonths == 1){
				$sqlQuery .= "  $fieldname >= NOW() 
								AND $fieldname < date_add(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == 2){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 30 DAY)
								AND $fieldname < date_add(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == 3){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 60 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 91 DAY)";	
			}
			else if($noOfMonths == 4){
				$sqlQuery .= " $fieldname >= date_add(NOW(), INTERVAL 91 DAY)
							   AND $fieldname < date_add(NOW(), INTERVAL 122 DAY)";	
			}
			else if($noOfMonths == -1){
				$sqlQuery .= " $fieldname < NOW()";	
			}
			else{
			}
			//only take active workers
			$sqlQuery .= " AND wkr_status = 1 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			if($returntype == 'companylist'){
				$sqlQuery .= " AND TIMESTAMPDIFF(YEAR,workers.wkr_entrydate,NOW()) + 1 < '10'";
				$sqlQuery .= " GROUP BY wkr_currentemp";
				$sqlQuery .= " ORDER BY ctr_comp_name";	
					
			}
			else if($returntype == 'listOfWorkers'){
				$sqlQuery .= " AND workers.wkr_currentemp = '$clabNo'";
				$sqlQuery .= " AND TIMESTAMPDIFF(YEAR,workers.wkr_entrydate,NOW()) + 1 < '10'";
				$sqlQuery .= " ORDER BY $fieldname, wkr_name";
			}
			else {}
			//echo $sqlQuery;
			return $this->db->query($sqlQuery);		
		}
		
		
		function listExpiryByCompanyDate($fieldname, $fromDate, $toDate, $returntype, $clabNo){
		
		
			$sqlQuery = "SELECT ";
			if($returntype == 'companylist')
				$sqlQuery .= " wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, tablex.print_date";
			else if($returntype == 'listOfWorkers')
				$sqlQuery .= " workers.*, ctr_printletter_history.print_date";
			else {}
			
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN (SELECT * FROM ctr_printletter_history WHERE ctr_printletter_history.print_isvoid = 0 AND print_docduration = $noOfMonths AND print_doctype = '$fieldname') AS tablex ON workers.wkr_currentemp = tablex.print_ctr_clabno 
						  WHERE ";
			
			if($noOfMonths == -1){
				$sqlQuery .= "  $fieldname <= NOW() 
								AND $fieldname > date_sub(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == -2){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 30 DAY)
								AND $fieldname > date_sub(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == -3){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 60 DAY)
							   AND $fieldname > date_sub(NOW(), INTERVAL 91 DAY)";	
			} /////////////////////////////////////////////////                                /
			else{
			}
			//only take inactive workers
			$sqlQuery .= " AND wkr_transtatus = 12 ";
			$sqlQuery .= " AND wkr_status = 2 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			if($returntype == 'companylist'){
				$sqlQuery .= " GROUP BY wkr_currentemp";
				$sqlQuery .= " ORDER BY ctr_comp_name";		
			}
			else if($returntype == 'listOfWorkers'){
				$sqlQuery .= " AND workers.wkr_currentemp = '$clabNo'";
				$sqlQuery .= " ORDER BY $fieldname, wkr_name";
			}
			else {}
			//echo $sqlQuery;
			return $this->db->query($sqlQuery);		
		}
		
		function listExpiryByCompanyOld($fieldname, $noOfMonths, $returntype, $clabNo){
		
		
			$sqlQuery = "SELECT ";
			if($returntype == 'companylist')
				$sqlQuery .= " wkr_currentemp, COUNT(*) AS totalwkr, contractors.ctr_comp_name, tablex.print_date";
			else if($returntype == 'listOfWorkers')
				$sqlQuery .= " workers.*, ctr_printletter_history.print_date";
			else {}
			
			$sqlQuery .= " FROM workers
						  LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						  LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						  LEFT JOIN (SELECT * FROM ctr_printletter_history WHERE ctr_printletter_history.print_isvoid = 0 AND print_docduration = $noOfMonths AND print_doctype = '$fieldname') AS tablex ON workers.wkr_currentemp = tablex.print_ctr_clabno 
						  WHERE ";
			
			if($noOfMonths == -1){
				$sqlQuery .= "  $fieldname <= NOW() 
								AND $fieldname > date_sub(NOW(), INTERVAL 30 DAY)";	
			}
			else if($noOfMonths == -2){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 30 DAY)
								AND $fieldname > date_sub(NOW(), INTERVAL 60 DAY)";	
			}
			else if($noOfMonths == -3){
				$sqlQuery .= " $fieldname <= date_sub(NOW(), INTERVAL 60 DAY)
							   AND $fieldname > date_sub(NOW(), INTERVAL 91 DAY)";	
			} /////////////////////////////////////////////////                                /
			else{
			}
			//only take inactive workers
			$sqlQuery .= " AND wkr_transtatus = 12 ";
			$sqlQuery .= " AND wkr_status = 2 ";
			$sqlQuery .= " AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)";
			
			if($returntype == 'companylist'){
				$sqlQuery .= " GROUP BY wkr_currentemp";
				$sqlQuery .= " ORDER BY ctr_comp_name";		
			}
			else if($returntype == 'listOfWorkers'){
				$sqlQuery .= " AND workers.wkr_currentemp = '$clabNo'";
				$sqlQuery .= " ORDER BY $fieldname, wkr_name";
			}
			else {}
			//echo $sqlQuery;
			return $this->db->query($sqlQuery);		
		}
		
		
		function getLabourListByCompany($clabno){
			$sqlQuery = "SELECT * FROM workers 
						LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
						LEFT JOIN mst_nationality ON mst_nationality.nat_id = workers.wkr_nationality
						LEFT JOIN mst_race ON mst_race.race_id = workers.wkr_race
						LEFT JOIN mst_gender ON mst_gender.gender_id = workers.wkr_gender
						LEFT JOIN mst_wkr_availability ON mst_wkr_availability.avlab_id = workers.wkr_transtatus
						LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						LEFT JOIN mst_emp_status ON mst_emp_status.emp_statusid = workers.wkr_status
						WHERE wkr_currentemp = '$clabno'
						ORDER BY wkr_country, wkr_permitexp ASC";
						
			return $this->db->query($sqlQuery);		
		}
		
		function getNextPrintLetterID(){
			$nextidQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE 
							MAX(print_id) + 1 END AS next_print_id 
							FROM ctr_printletter_history";	
			$printIDRecord = $this->db->query($nextidQuery);
			$printIDRow = $printIDRecord->row();
			
			return $printIDRow->next_print_id;		
		}
		
		function checkExistingPrintRecord($clabNo, $noOfMonths, $fieldname){
			$sqlQuery = "SELECT print_id , print_date FROM ctr_printletter_history 
						WHERE print_ctr_clabno = '$clabNo'
						AND print_doctype = '$fieldname'
						AND print_docduration = '$noOfMonths'
						AND print_isvoid = '0'";
			
			return $this->db->query($sqlQuery);
		}
		
		function updatePrintLetterHistory($noOfMonths, $fieldName){
			$voidPrintIDString = "(0";
			
			$getVoidListQuery = "SELECT print_id FROM ctr_printletter_history WHERE";
			
			if($noOfMonths == '0.5'){
				$getVoidListQuery .= " date_add(print_date, INTERVAL 14 DAY) <= NOW() ";
			}else{
				$getVoidListQuery .= " date_add(print_date, INTERVAL 30 DAY) <= NOW() ";
			}
			$getVoidListQuery .= " AND print_isvoid = 0 AND print_doctype = '$fieldName' AND print_docduration = '$noOfMonths'";
			
			$getVoidListRecord = $this->db->query($getVoidListQuery);
			foreach($getVoidListRecord->result() as $voidPrintID){
				$voidPrintIDString .= "," . $voidPrintID->print_id;
			}
			$voidPrintIDString .= ")";
			
			//echo "<br />updatePrintLetterHistory <br />";
			//echo $voidPrintIDString;
			//echo "<br />" . $getVoidListQuery;
			
			$sqlQuery = "UPDATE ctr_printletter_history SET print_isvoid = 1
						 WHERE print_id IN " . $voidPrintIDString;
			$sqlQuery .= " AND print_doctype = '$fieldName' AND print_docduration = $noOfMonths;";
			
			$this->db->query($sqlQuery);
			
			//echo "<br />" . $sqlQuery;
			return 1;	
		}
		
		function updatePrintLetterHistory_old($noOfMonths, $fieldName){
			$sqlQuery = "UPDATE ctr_printletter_history SET print_isvoid = 1
						 WHERE print_id IN (SELECT print_id FROM (SELECT * FROM ctr_printletter_history print2
						                   WHERE";
			if($noOfMonths <= 1){
				$sqlQuery .= " date_add(print2.print_date, INTERVAL 14 DAY) <= NOW() ";
			}
			else{
				$sqlQuery .= " date_add(print2.print_date, INTERVAL 30 DAY) <= NOW() ";
			}
			$sqlQuery .= " AND print2.print_isvoid = 0) AS TEMP) AND print_doctype = '$fieldName' AND print_docduration = $noOfMonths;";
			
			$this->db->query($sqlQuery);
			return 1;	
		}
		
		function getFilePathByUploadID($upload_id, $fieldname){
			$sqlQuery = "SELECT $fieldname AS att_fieldname FROM ctr_attachdoc WHERE att_id = $upload_id";
			$sqlRecord = $this->db->query($sqlQuery);
			$sqlRow = $sqlRecord->row();
			
			return $sqlRow->att_fieldname;
		}
		
		function getAvlabDetails($clabno){
			$sqlQuery = "SELECT available.*, contractors.ctr_comp_name AS comp_to_name FROM available
						 LEFT JOIN contractors ON contractors.ctr_clab_no = available.avlab_comp_to
						 WHERE avlab_comp_from = '$clabno'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getAvlabDetailslt($clabno,$ltref){
			$sqlQuery = "SELECT available.*, contractors.ctr_comp_name AS comp_to_name FROM available
						 LEFT JOIN contractors ON contractors.ctr_clab_no = available.avlab_comp_to
						 WHERE avlab_comp_from = '$clabno' and avlab_ref_no = '$ltref'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getAvlabDetailsNew($clabno){
			$sqlQuery = "SELECT available.*, contractors.ctr_comp_name AS comp_to_name FROM available
						 LEFT JOIN contractors ON contractors.ctr_clab_no = available.avlab_comp_to
						 WHERE avlab_comp_from = '$clabno'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getAvlabDetailsltNew($clabno,$ltref){
			$sqlQuery = "SELECT available.*, contractors.ctr_comp_name AS comp_to_name,contractors.ctr_comp_regno AS comp_to_regno,contractors.ctr_addr1 AS to_addr1,
						 contractors.ctr_addr2 AS to_addr2, contractors.ctr_addr3 AS to_addr3, contractors.ctr_pcode AS to_pcode, mst_states.state_name AS state_to_name,
						 contractors.ctr_telno AS to_telno, contractors.ctr_dir_name AS dir_to_name, contractors.ctr_fax AS to_fax, contractors.ctr_clab_no AS clab_to_no FROM available
						 LEFT JOIN contractors ON contractors.ctr_clab_no = available.avlab_comp_to
						 LEFT JOIN mst_states ON contractors.ctr_state = mst_states.state_id 
						 WHERE avlab_comp_from = '$clabno' and avlab_ref_no = '$ltref'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getAvlabWkrDetails($avlab_ref_no){
			$sqlQuery = "SELECT available_wkr.*, workers.wkr_passno, workers.wkr_name, workers.wkr_permitexp, mst_countries.cty_desc
 						 FROM available_wkr 
						 LEFT JOIN workers ON avlabwkr_wkrid = workers.wkr_id
						 LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
						 WHERE avlabwkr_ref_no = '$avlab_ref_no'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getCtrStatusHistory($clabNo){
			$sqlQuery = "SELECT ctr_changestatus_history.*, mst_emp_status.emp_status_desc FROM ctr_changestatus_history
						 LEFT JOIN mst_emp_status ON mst_emp_status.emp_statusid = ctr_changestatus_history.status_newstatus
						 WHERE status_clab_no = '$clabNo'";
			
			return $this->db->query($sqlQuery);
		}
	}	
?>