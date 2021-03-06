<?php
	class ModelReports extends model {
		function ModelAdmin(){
			parent::Model();
		}
		
		function getAllStatus(){
			$sqlQuery = "SELECT appstatus_id, appstatus_desc FROM mst_ctr_appstatus ORDER BY appstatus_id";	
			return $this->db->query($sqlQuery);
		}
		function getAllStatus2(){
			$sqlQuery = "SELECT emp_statusid, emp_status_desc FROM mst_emp_status ORDER BY emp_statusid";	
			return $this->db->query($sqlQuery);
		}
		function getAllGrades(){
			$sqlQuery = "SELECT grade_id, grade_desc FROM mst_ctr_grade";	
			return $this->db->query($sqlQuery);
		}
		
		function getAllStates(){
			$sqlQuery = "SELECT state_id, state_name FROM mst_states ORDER BY state_name";	
			return $this->db->query($sqlQuery);	
		}
		
		function getContractors($status, $grade, $state){
			$sqlQuery = "SELECT contractors.* FROM contractors
						 WHERE ctr_status = 1";
			if($grade !== '0'){
				$sqlQuery .= " AND ctr_grade = '$grade'";
			}
			
			if($status !== '0'){
				$sqlQuery .= " AND ctr_appstatus = $status";
			}
			
			if($state !== '0'){
				$sqlQuery .= " AND ctr_state = $state";
			}
			
			return 	$this->db->query($sqlQuery);
		}
		
		function getCtrGradeSummary($grade){
			if($grade == 'G'){
				$sqlQuery = "SELECT ctr_grade, count(ctr_grade) AS totalctr
						 FROM contractors
						 WHERE ctr_status = 1
						 AND ctr_grade IN ('G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7')
						 GROUP BY ctr_grade
						 ORDER BY ctr_grade";	
			}
			else{
				$sqlQuery = "SELECT \"OTHERS\" as columnname, count(*) as totalctr
 							 FROM contractors
							 WHERE ctr_status = 1
							 AND ctr_grade NOT IN ('G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7')";
			}
						 
			return 	$this->db->query($sqlQuery);
		}
		
		function getStatusByStatusID($status){
			if($status == '0'){
				$statusDesc = "All";
			}
			else{
				$sqlQuery = "SELECT appstatus_desc FROM mst_ctr_appstatus WHERE appstatus_id = $status";
				
				$statusRecord = $this->db->query($sqlQuery);
				$statusRow = $statusRecord->row();
				
				$statusDesc = $statusRow->appstatus_desc;
			}
			return $statusDesc;
		}
		
		function getStatusByStatusID2($status2){
			if($status2 == '0'){
				$statusDesc = "All";
			}
			else{
				$sqlQuery = "SELECT emp_status_desc FROM mst_emp_status WHERE emp_statusid = $status2";
				
				$statusRecord = $this->db->query($sqlQuery);
				$statusRow = $statusRecord->row();
				
				$statusDesc = $statusRow->appstatus_desc;
			}
			return $statusDesc;
		}
		function getStateByStateID($state){
			if($state == '0'){
				$stateDesc = "All";
			}
			else{
				$sqlQuery = "SELECT state_name FROM mst_states WHERE state_id = $state";
				
				$stateRecord = $this->db->query($sqlQuery);
				$stateRow = $stateRecord->row();
				
				$stateDesc = $stateRow->state_name;
			}
			return $stateDesc;
		}
		
		function getFCLByStatus($reportType){
			if($reportType == 'wkr_state'){
				$sqlQuery = "SELECT state_name AS description, COUNT(w1.wkr_id) AS totalactive,
							(SELECT COUNT(w2.wkr_id) FROM workers w2 WHERE w2.wkr_status = 2 AND w2.wkr_state = w1.wkr_state) AS totalinactive,
							(SELECT COUNT(w3.wkr_id) FROM workers w3 WHERE w3.wkr_status = 3 AND w3.wkr_state = w1.wkr_state) AS totalsuspended
							FROM workers w1
							LEFT JOIN mst_states ON mst_states.state_id = w1.wkr_state
							WHERE w1.wkr_state >= 1 AND w1.wkr_status = 1
							GROUP BY w1.wkr_state
							ORDER BY state_name";
			}
			else if($reportType == 'wkr_country'){
				$sqlQuery = "SELECT cty_desc AS description, COUNT(w1.wkr_id) AS totalactive, 
								(SELECT COUNT(w2.wkr_id) FROM workers w2 WHERE w2.wkr_status = 2 AND w2.wkr_country = w1.wkr_country) AS totalinactive,
								(SELECT COUNT(w3.wkr_id) FROM workers w3 WHERE w3.wkr_status = 3 AND w3.wkr_country = w1.wkr_country) AS totalsuspended
							FROM workers w1
							LEFT JOIN mst_countries ON mst_countries.cty_id = w1.wkr_country
							WHERE w1.wkr_country <> '' AND w1.wkr_status = 1
							GROUP BY w1.wkr_country
							ORDER BY cty_desc";
			}
			else if($reportType == 'wkr_wtrade'){
				$sqlQuery = "";
			}
			else{
				//do nothing	
			}	
			
			return $this->db->query($sqlQuery);
		}
		
		function getFCLByTrade($wTrade){
			$sqlQuery = "SELECT COUNT(*) as totalfcl FROM workers where wkr_wtrade LIKE '%$wTrade%'";
			$fclRecord = $this->db->query($sqlQuery);	
			$fclRow = $fclRecord->row();
			
			return $fclRow->totalfcl;
		}
		
		function getFCLListBySearchCriteria($wkr_currentemp, $wkr_status, $wkr_transtatus, $wkr_trade, $wkr_country, $wkr_permitexp_from, $wkr_permitexp_to){
			$sqlQuery = "SELECT workers.*, mst_countries.cty_desc, contractors.ctr_comp_name, mst_emp_status.emp_status_desc, mst_wkr_availability.avlab_desc
					     FROM workers 
						 LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
						 LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp
						 LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid
						 LEFT JOIN mst_wkr_availability ON mst_wkr_availability.avlab_id = workers.wkr_transtatus
						 WHERE wkr_id > 0 "; 		//a dummy where statement, just to connect with the following conditions
			
			if($wkr_currentemp !== '0')	{
				$sqlQuery .= " AND wkr_currentemp = '$wkr_currentemp' ";
			}
			if($wkr_status !== '0')	{
				$sqlQuery .= " AND wkr_status = '$wkr_status' ";
			}
			if($wkr_trade !== '0')	{
				$sqlQuery .= " AND wkr_wtrade LIKE '%$wkr_trade%' ";
			}
			if($wkr_country !== '0')	{
				$sqlQuery .= " AND wkr_country = '$wkr_country' ";
			}
			
			if(strlen($wkr_permitexp_from) > 0)	{
				$sqlQuery .= " AND wkr_permitexp >= '" . date('Y-m-d', strtotime($wkr_permitexp_from)) . "'";
			}
			if(strlen($wkr_permitexp_to) > 0)	{
				$sqlQuery .= " AND wkr_permitexp <= '" . date('Y-m-d', strtotime($wkr_permitexp_to)) . "'";
			}
			
			if($wkr_status !== '0' && $wkr_transtatus !== '0'){
				if(strlen($wkr_transtatus) > 0){
					$sqlQuery .= " AND wkr_transtatus = $wkr_transtatus ";	
				}
			}
			
			$sqlQuery .= " ORDER BY wkr_country, wkr_permitexp, ctr_comp_name";
			return $this->db->query($sqlQuery);
		}
		
		function getTotalEmployees(){
			$sql = "SELECT COUNT(*) AS totalemp FROM employees";
			$empRecord = $this->db->query($sql);
			$empRow = $empRecord->row();
			
			return $empRow->totalemp;	
		}
	}		
?>