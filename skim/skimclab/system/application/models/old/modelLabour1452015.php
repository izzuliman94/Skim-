<?php 
	class ModelLabour extends Model {
		function ModelLabour(){
			parent::Model();	
		}	
		
		
		function getAllCountry(){
		    
			$sql = "select mst_countries.*,mst_nationality.*
			        from mst_countries 
					left join mst_nationality on mst_nationality.cty_id = mst_countries.cty_id";
			return $this->db->query($sql);
			
		}
		
		function getAllStates(){
			$sqlquery = "SELECT * FROM mst_states order by state_name";	
			
			return $this->db->query($sqlquery);
		}
		
		function getAllRaces(){
			$sqlquery = "SELECT * FROM mst_race ORDER BY race_desc";	
			
			return $this->db->query($sqlquery);
		}
		
		function getAllNationalities(){
			$sqlquery = "SELECT * FROM mst_nationality ORDER BY nat_desc";	
			
			return $this->db->query($sqlquery);
		}
		
		function getAllCountries(){
			$sqlquery = "SELECT * FROM mst_countries ORDER BY cty_desc";	
			
			return $this->db->query($sqlquery);
		}
		
		function getAllContractors(){
			$sqlquery = "SELECT ctr_clab_no, ctr_comp_name, ctr_addr1, ctr_addr2, ctr_addr3, ctr_pcode, ctr_state FROM contractors
			             ORDER BY ctr_comp_name";	
			
			return $this->db->query($sqlquery);
		}	
		
		function getLabourByPassportNo($passno){
			$sqlquery = "SELECT workers.*, mst_countries.cty_desc, contractors.ctr_comp_name, mst_nationality.nat_desc, mst_race.race_desc, mst_gender.gender_desc, mst_wkr_availability.avlab_desc, mst_emp_status.emp_status_desc";
			$sqlquery .= " FROM workers ";
			$sqlquery .= " LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country";
			$sqlquery .= " LEFT JOIN mst_nationality ON mst_nationality.nat_id = workers.wkr_nationality";
			$sqlquery .= " LEFT JOIN mst_race ON mst_race.race_id = workers.wkr_race";
			$sqlquery .= " LEFT JOIN mst_gender ON mst_gender.gender_id = workers.wkr_gender";
			$sqlquery .= " LEFT JOIN mst_wkr_availability ON mst_wkr_availability.avlab_id = workers.wkr_transtatus";
			$sqlquery .= " LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp";
			$sqlquery .= " LEFT JOIN mst_emp_status ON mst_emp_status.emp_statusid = workers.wkr_status";
			$sqlquery .= " WHERE wkr_passno = '" . $passno . "'";
			
			$laborRecord = $this->db->query($sqlquery);
			return $laborRecord->row();
		}
		
		function getLabourByWkrID($wkr_id){
			$sqlquery = "SELECT workers.*, mst_countries.cty_desc, contractors.ctr_comp_name, mst_nationality.nat_desc, mst_race.race_desc, mst_gender.gender_desc, mst_wkr_availability.avlab_desc, mst_emp_status.emp_status_desc";
			$sqlquery .= " FROM workers ";
			$sqlquery .= " LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country";
			$sqlquery .= " LEFT JOIN mst_nationality ON mst_nationality.nat_id = workers.wkr_nationality";
			$sqlquery .= " LEFT JOIN mst_race ON mst_race.race_id = workers.wkr_race";
			$sqlquery .= " LEFT JOIN mst_gender ON mst_gender.gender_id = workers.wkr_gender";
			$sqlquery .= " LEFT JOIN mst_wkr_availability ON mst_wkr_availability.avlab_id = workers.wkr_transtatus";
			$sqlquery .= " LEFT JOIN contractors ON contractors.ctr_clab_no = workers.wkr_currentemp";
			$sqlquery .= " LEFT JOIN mst_emp_status ON mst_emp_status.emp_statusid = workers.wkr_status";
			$sqlquery .= " WHERE wkr_id = $wkr_id";
			
			$laborRecord = $this->db->query($sqlquery);
			return $laborRecord->row();
		}
		
		function getLabourDetailsForUploadDoc($passno){
			$sqlquery = "SELECT workers.wkr_id, workers.wkr_passno, workers.wkr_name, mst_countries.cty_desc, mst_nationality.nat_desc";
			$sqlquery .= " FROM workers ";
			$sqlquery .= " LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country";
			$sqlquery .= " LEFT JOIN mst_nationality ON mst_nationality.nat_id = workers.wkr_nationality";
			$sqlquery .= " WHERE wkr_passno = '" . $passno . "'";
			
			$laborRecord = $this->db->query($sqlquery);
			return $laborRecord->row();
		}
		
		function labourExists($passportNo){
			$sqlQuery = "SELECT wkr_id, wkr_passno, wkr_name, emp_status_desc, wkr_country, wkr_race, wkr_permitexp, cty_desc, race_desc 
						 FROM workers
						 LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid
						 LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
						 LEFT JOIN mst_race ON mst_race.race_id = workers.wkr_race
						 WHERE wkr_passno = '$passportNo'";	
			return $this->db->query($sqlQuery);
		}
		
		function checkLabourExists($passNo, $country){
			$sqlQuery = "SELECT wkr_id, wkr_passno, wkr_name FROM workers WHERE wkr_passno = '$passNo' AND wkr_country = '$country'";
			
			return $this->db->query($sqlQuery);
		}
		
		function getNextPassHistID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(wkrhist_no) + 1 END AS nextID FROM wkr_history";
			
			$passHistRecord = $this->db->query($sqlQuery);
			$passHistRow = $passHistRecord->row();
			
			return $passHistRow->nextID;
		}
		
		function getTotalLaboursByStatus($statusType, $statusID, $returnType){
			//$sqlQuery = "SELECT wkr_id, wkr_passno, wkr_name, emp_status_desc, wkr_country, wkr_permitexp, cty_desc FROM workers ";
			$sqlQuery = "SELECT wkr_id, wkr_passno, wkr_name, emp_status_desc, wkr_country, wkr_race, wkr_permitexp, cty_desc, race_desc FROM workers ";
			$sqlQuery .= "  LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid
						 	LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
						 	LEFT JOIN mst_race ON mst_race.race_id = workers.wkr_race";
			
			if(strlen($statusType) > 0){
				$sqlQuery .= " WHERE $statusType = '$statusID' ";
			}
			$labourRecord = $this->db->query($sqlQuery);
			
			if($returnType == 'total'){
				return $labourRecord->num_rows();
			}
			else return $labourRecord;
		}
		
		function searchLabour($searchby, $keyword){
			$sqlQuery = "SELECT wkr_id, wkr_passno, wkr_name, emp_status_desc, cty_desc, wkr_permitexp, wkr_currentemp, contractors.ctr_comp_name, employees.emp_name, employees.emp_username
						 FROM workers
						 LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid
						 LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country
						 LEFT JOIN contractors ON workers.wkr_currentemp = contractors.ctr_clab_no
						 LEFT JOIN employees ON workers.wkr_incharge = employees.emp_id
						 ";
			
			$sqlQuery .= " WHERE $searchby LIKE '%$keyword%'";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getNextUploadID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 
					     ELSE MAX(upload_id) + 1 END AS nextId 
					     FROM wkr_uploaddoc";
			
			$uploadIdRecord = $this->db->query($sqlQuery);	
			$uploadIdRow = $uploadIdRecord->row();
			
			return $uploadIdRow->nextId;
		}
		
		function getStatusByStatusID($statusID){
			$sqlQuery = "SELECT avlab_desc FROM mst_wkr_availability WHERE avlab_id = $statusID";	
			
			$queryRecord = $this->db->query($sqlQuery);
			$queryRow = $queryRecord->row();
			
			return $queryRow->avlab_desc;
		}
		
		function getCompNameByClabNo($ctr_clabno){
			$selectQuery = "SELECT ctr_comp_name FROM contractors WHERE ctr_clab_no = '$ctr_clabno'";
			
			$ctrRecord = $this->db->query($selectQuery);
			$ctrRow = $ctrRecord->row();
			
			return $ctrRow->ctr_comp_name;
		}
		
		function getEmploymentHistory($wkr_id){
			$selectQuery = "SELECT wkr_ctr_relationship.*, contractors.ctr_comp_name, mst_states.state_name 
							FROM wkr_ctr_relationship 
							LEFT JOIN contractors ON wkr_ctr_relationship.rel_ctr_clab_no = contractors.ctr_clab_no
							LEFT JOIN mst_states ON contractors.ctr_state = mst_states.state_id
							WHERE rel_wkrid = $wkr_id";
							
			return $this->db->query($selectQuery);	
		}
		
		function getAllSkill(){
			$sqlQuery = "SELECT * FROM mst_skill";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getAllWorkTrade(){
			$sqlQuery = "SELECT * FROM mst_worktrade ORDER BY trade_id ASC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getLaborByPermitPassExpiry($fieldname, $noOfMonths, $returnType, $country){
			$sqlQuery = "SELECT workers.*, mst_countries.cty_desc, mst_emp_status.emp_status_desc FROM workers ";
			$sqlQuery .= " LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid";
			$sqlQuery .= " LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country";
			$sqlQuery .= " WHERE";
			
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
			
			if($country == 'allcountry'){
			}
			else{
				$sqlQuery .= " AND wkr_country = '$country'";	
			}
			
			//$sqlQuery .= " AND wkr_transtatus = 12";
			$sqlQuery .= " AND wkr_status = 1 ORDER BY $fieldname";
			
			$wkrRecord = $this->db->query($sqlQuery);
			
			if($returnType == 'total'){
				return $wkrRecord->num_rows();	
			}
			else{ //$returnType = 'list'
				return $wkrRecord;
			}
		}
		
		
		function getLaborByPermitPassExpiry4($fieldname, $noOfMonths, $returnType, $country){
			$sqlQuery = "SELECT workers.*, mst_countries.cty_desc, mst_emp_status.emp_status_desc FROM workers ";
			$sqlQuery .= " LEFT JOIN mst_emp_status ON workers.wkr_status = mst_emp_status.emp_statusid";
			$sqlQuery .= " LEFT JOIN mst_countries ON mst_countries.cty_id = workers.wkr_country";
			$sqlQuery .= " WHERE";
			
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
			else if($noOfMonths == -2){
				//$sqlQuery .= " $fieldname <= date_add(NOW(),INTERVAL -2 MONTH)
				//				AND $fieldname >= date_add(NOW(),INTERVAL -3 MONTH)";	
				$sqlQuery .= " $fieldname BETWEEN '2014-11-01' AND '2014-11-31'";
			}
			else{
			}
			
			if($country == 'allcountry'){
			}
			else{
				$sqlQuery .= " AND wkr_country = '$country'";	
			}
			
			$sqlQuery .= " AND wkr_transtatus = 12";
			$sqlQuery .= " AND wkr_status = 2 ORDER BY $fieldname";
			
			$wkrRecord = $this->db->query($sqlQuery);
			
			if($returnType == 'total'){
				return $wkrRecord->num_rows();	
			}
			else{ //$returnType = 'list'
				return $wkrRecord;
			}
		}
		
		
		function listExpiryByCountry($fieldname, $noOfMonths){
			$sqlQuery = "SELECT workers.wkr_country, mst_countries.cty_desc, COUNT(*) as total_workers 
						FROM workers
						LEFT JOIN mst_countries ON workers.wkr_country = mst_countries.cty_id
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
			
			$sqlQuery .= " GROUP BY wkr_country";
	
			return $this->db->query($sqlQuery);	
		}
		
		function getCtyByCtyID($cty_id){
			$selectQuery = "SELECT cty_desc FROM mst_countries WHERE cty_id = '$cty_id'";	
			$ctyRecord = $this->db->query($selectQuery);
			$ctyRow = $ctyRecord->row();
			
			return $ctyRow->cty_desc;
		}
		
		function getUploadedPhotoInfo($wkr_id){
			$sqlQuery = "SELECT * FROM wkr_uploaddoc
						WHERE upload_filetype = 'Photo'
						AND upload_wkrid = $wkr_id";	
			
			return $this->db->query($sqlQuery);
		}
		
		function getUploadHistory($wkr_id, $fileType){
			$sqlQuery	= "SELECT wkr_uploaddoc.*, emp_name FROM wkr_uploaddoc
							LEFT JOIN employees ON wkr_uploaddoc.upload_by = employees.emp_id
							WHERE upload_wkrid = $wkr_id";	
			
			if($fileType == "others"){
				$sqlQuery .= " AND  upload_filetype NOT IN ('photos', 'contracts')";	
			}
			else{
				$sqlQuery .= " AND  upload_filetype = '$fileType'";
			}
			
			$sqlQuery .= " ORDER BY upload_filetype";
			return $this->db->query($sqlQuery);
		}
		
		function getCurrentPermitRenewal($wkr_id){
			$sqlQuery = "SELECT * FROM wkr_updatepermit 
			             WHERE permit_wkrid = $wkr_id
			             AND permit_progress NOT IN ('complete', 'need to resubmit', 'allow own submission') ;";
			
			 return $this->db->query($sqlQuery);
		}
		
		function getNextUpdatePermitID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(permit_id) + 1 END AS next_permitid FROM wkr_updatepermit";	
			$nextUpdatePermitRecord = $this->db->query($sqlQuery);
			$nextUpdatePermitRow = $nextUpdatePermitRecord->row();
			
			return $nextUpdatePermitRow->next_permitid;
		}
		
		function getUpdatePermitHistory($wkr_id){
			$sqlQuery = "SELECT * FROM wkr_updatepermit 
			             WHERE permit_progress IN ('complete', 'need to resubmit', 'allow own submission') 
			             AND permit_wkrid = $wkr_id";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getNextWorkerID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(wkr_id) + 1 END AS next_wkrid FROM workers";
			$wkrRecord = $this->db->query($sqlQuery);
			$wkrRow = $wkrRecord->row();
			
			return $wkrRow->next_wkrid;
		}
		
		function getCurrentCompany($wkr_id){
			$sqlQuery = "SELECT wkr_passno, wkr_name, wkr_currentemp, ctr_comp_name
						FROM workers 
						LEFT JOIN contractors ON workers.wkr_currentemp = contractors.ctr_clab_no
						WHERE wkr_id = $wkr_id";
			$wkrRecord = $this->db->query($sqlQuery);
			return $wkrRecord->row();
		}
		
		function getPassportReplaceHistory($wkr_id){
			$sqlQuery = "SELECT wkr_history.*, employees.emp_username FROM wkr_history
						LEFT JOIN employees ON wkr_history.wkrhist_setby = employees.emp_id
						WHERE wkrhist_wkrid = $wkr_id";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getUploadFileList($filetype, $wkr_id){
			$sqlQuery = "SELECT * FROM wkr_uploaddoc
						WHERE upload_filetype LIKE '" . $filetype . "%' 
						AND upload_wkrid = $wkr_id
						ORDER BY upload_filetype ASC";
			
			return $this->db->query($sqlQuery);
		}
		
		function getFilePathByUploadID($upload_id, $fieldname){
			$sqlQuery = "SELECT $fieldname AS upload_field FROM wkr_uploaddoc WHERE upload_id = $upload_id";
			$sqlRecord = $this->db->query($sqlQuery);
			$sqlRow = $sqlRecord->row();
			
			return $sqlRow->upload_field;				
		}
		
		function getWkrIDByPassportNo($passno){
			$sqlQuery = "SELECT wkr_id FROM workers WHERE wkr_passno = '$passno'";	
			$sqlRecord = $this->db->query($sqlQuery);

			if($sqlRecord->num_rows() > 0){
				$sqlRow = $sqlRecord->row();
			
				return $sqlRow->wkr_id;				
			}
			else return 0;
		}
		
		function getPermitHistoryByID($permithistory_id){
			$sqlQuery = "SELECT * FROM wkr_updatepermit WHERE permit_id = $permithistory_id;";
			$permitRenewalRecord = $this->db->query($sqlQuery);
			return $permitRenewalRecord->row();
		}
		
		function getAllEmployees(){
			$sqlQuery = "SELECT emp_id, emp_username FROM employees WHERE emp_username != '' ORDER BY emp_username;";
			
			return $this->db->query($sqlQuery);	
		}
		
    function getVDREmployees(){
			$sqlQuery = "SELECT emp_id, emp_username FROM employees WHERE emp_username != '' and `emp_dpt_id` = '8' ORDER BY emp_username;";
			                                                                        
			return $this->db->query($sqlQuery);	
		}
		function getPermitHistory($wkr_id){
			$sqlQuery = "SELECT wkr_permitexp_history.*, employees.emp_username 
						 FROM wkr_permitexp_history 
						 LEFT JOIN employees ON employees.emp_id = wkr_permitexp_history.newplksexp_setby
						 WHERE newplksexp_wkrid = $wkr_id
						 ORDER BY newplksexp_date DESC";
			
			return $this->db->query($sqlQuery);
		}
		
		function getPassExpHistory($wkr_id){
			$sqlQuery = "SELECT wkr_pass_history.*, employees.emp_username FROM wkr_pass_history " .
						" LEFT JOIN employees ON employees.emp_id = wkr_pass_history.newpass_setby " .
						" WHERE newpassexp_wkrid = " . $wkr_id .
						" ORDER BY newpassexp_date DESC";	
			
			return $this->db->query($sqlQuery);
		}
		
		function getStatusHistory($wkr_id){
			$sqlQuery = "SELECT wkr_statushistory.*, mst_wkr_availability.avlab_desc FROM wkr_statushistory ".
						" LEFT JOIN mst_wkr_availability ON wkr_statushistory.hist_transtatus = mst_wkr_availability.avlab_id " .
						" WHERE hist_wkrid = " . $wkr_id . " ORDER BY hist_keyindate DESC";
			
			return $this->db->query($sqlQuery);
		}

		function getNextPlksHistId(){
			$sqlQuery = "SELECT CASE WHEN count(*) = 0 THEN 1 ELSE MAX(newplksexp_id) + 1 END as nextId " .
						" FROM wkr_permitexp_history";
			
			$historyRecord = $this->db->query($sqlQuery);
			$historyRow = $historyRecord->row();
			
			return $historyRow->nextId;
		}
		
		function nextPassHistId(){
			$sqlQuery = "SELECT CASE WHEN count(*) = 0 THEN 1 ELSE MAX(newpassexp_id) + 1 END as nextId
						 FROM wkr_pass_history";
			
			$historyRecord = $this->db->query($sqlQuery);
			$historyRow = $historyRecord->row();
			
			return $historyRow->nextId;
		}	
		
		function getPassExpHistoryById($passexp_id){
			$sqlQuery = "SELECT wkr_pass_history.*, workers.wkr_id, workers.wkr_passno, workers.wkr_name FROM wkr_pass_history 
 						 LEFT JOIN workers ON wkr_pass_history.newpassexp_wkrid = workers.wkr_id
						 WHERE newpassexp_id = " . $passexp_id;
			$passexpRecord = $this->db->query($sqlQuery);	
			return $passexpRecord->row();
		}
		
		function getPermitExpHistoryById($permitexp_id)	{
			$sqlQuery = "SELECT wkr_permitexp_history.*, workers.wkr_id, workers.wkr_passno, workers.wkr_name, workers.wkr_plksno, workers.wkr_permitexp
 						 FROM wkr_permitexp_history 
						 LEFT JOIN workers ON wkr_permitexp_history.newplksexp_wkrid = workers.wkr_id
						 WHERE newplksexp_id = " . $permitexp_id;
						 
			$permitexpRecord = $this->db->query($sqlQuery);	
			return $permitexpRecord->row();
		}
		
		function getAllPlksExpiredWorkers(){
			//wkr_transtatus: 4 - available, 6 - booked, 7 - hired
			$sqlQuery = "SELECT * FROM workers WHERE wkr_permitexp < CURDATE() 
						 		AND wkr_transtatus IN ('4', '6', '7')			
						 	    AND wkr_status = 1
						  		AND wkr_id NOT IN(
									SELECT permit_wkrid FROM wkr_updatepermit WHERE permit_progress <> 'complete'
								)
						 		ORDER BY wkr_permitexp";	
			
			return $this->db->query($sqlQuery);
		}
		
		function autoWkrStatusChange(){
			$expiredWorkersRecord = $this->getAllPlksExpiredWorkers();
			
			$updateWkrQuery = "";
			$updateWkrStatusQuery = "";
			
			if($expiredWorkersRecord->num_rows() > 0){
				foreach($expiredWorkersRecord->result() as $expiredWkr){
					$updateWkrQuery = "UPDATE workers SET wkr_transtatus = 12, wkr_status = 2 WHERE wkr_id = " . $expiredWkr->wkr_id . "; ";
					$updateWkrStatusQuery = "INSERT INTO wkr_statushistory (hist_wkrid, hist_transtatus, hist_reason, hist_incidentdate, hist_keyinby, hist_keyindate)
											 VALUES($expiredWkr->wkr_id, 12, 'status auto-change to permit expired', NOW(), 1, NOW());";
											 
											 
					$this->db->query($updateWkrQuery);
					$this->db->query($updateWkrStatusQuery);
				}
				
			}
		}
	}
?>