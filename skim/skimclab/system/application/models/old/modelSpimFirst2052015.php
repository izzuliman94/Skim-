<?php
	class ModelSpimFirst extends Model{
		function ModelSpimFirst(){
			parent::Model();
			$this->load->database();	
		}
		
		function getApprovalList(){
		
		  $sql = "select workorders.*,contractors.ctr_comp_name from workorders 
		          left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				  where wo_spim_status = 'Y' and (chk_app_ceo <> '1' or chk_ver_corp <> '1' or chk_ver_fin <> '1')";
		  return $this->db->query($sql);       
		
		}
		
		function getAllCountry(){
		    
			$sql = "select mst_countries.*,mst_nationality.*
			        from mst_countries 
					left join mst_nationality on mst_nationality.cty_id = mst_countries.cty_id";
			return $this->db->query($sql);
			
		}
		
		
		function getAllReceipt($clabno){
		    
			$sql = "select * from pmt_receipt where payment_type = 'SP' and clab_no = '$clabno'";
			return $this->db->query($sql);
			
		}
		
		function getlastaggno($workorderid,$clabno){
		
			$legalno = "";
			$yy = date('y');
			$sql = "select count(wo_agg_no) as cnt from wo_aggrement where wo_agg_no like 'CLAB/LEGAL/$clabno/$workorderid%'";
			$cntRecord = $this->db->query($sql);
			$rec = $cntRecord->row();
			
					   
		  if($rec->cnt == 0){
			   $legalno = 'CLAB/LEGAL/'.$clabno.'/'.$workorderid.'/'.$yy.'/01';
			}else{
			   $sql = "select wo_agg_no from wo_aggrement where wo_agg_no 
			   LIKE 'CLAB/LEGAL/$clabno/$workorderid/$yy/%' ORDER BY wo_agg_no desc limit 1";	
			   $LegRecord = $this->db->query($sql);
			   $newrec = $LegRecord->row();
			   $last_id = $newrec->wo_agg_no;
			   $legalno = 'CLAB/LEGAL/'.$clabno.'/'.$workorderid.'/'.$yy.'/'.sprintf("%02s",substr($last_id,-2)+1);
			
			} 
			
			return $legalno;
		}
		
		
		function getCtrByClabNo($clabno){
			$sqlQuery = "SELECT ctr_clab_no, ctr_comp_name, ctr_contact_name, ctr_contact_mobileno, ctr_status 
			             FROM contractors 
			             WHERE ctr_clab_no = '$clabno'";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getCtrNameByClabNo($clabno){
			$sqlQuery = "SELECT ctr_comp_name AS name FROM contractors WHERE ctr_clab_no = '$clabno'";
			
			$compRecord = $this->db->query($sqlQuery);
			$compRow = $compRecord->row();
			
			return $compRow->name;
		}
		
		function searchCtr($searchby, $keyword){
			$sqlQuery = "SELECT ctr_clab_no, ctr_comp_name, ctr_contact_name, ctr_contact_mobileno, ctr_status, emp_status_desc
						 FROM contractors
						 LEFT JOIN mst_emp_status ON mst_emp_status.emp_statusid = contractors.ctr_status
						 WHERE $searchby LIKE '%$keyword%'"	;
			
			return $this->db->query($sqlQuery);
		}
		
		function getAllCountries(){
			$sqlquery = "SELECT * FROM mst_countries ORDER BY cty_desc";	
			
			return $this->db->query($sqlquery);
		}
		
		function getNextWONumber(){
			$sqlQuery = "SELECT MAX(wo_id) as maxid FROM workorders";	
			$woRecord = $this->db->query($sqlQuery);
			$woRow = $woRecord->row();
			
			return $woRow->maxid + 1;
		}
		
		function getNextUploadID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(upload_id) + 1 END AS next_uploadid FROM wo_upload";
			
			$uploadIDRecord = $this->db->query($sqlQuery);
			$uploadIDRow = $uploadIDRecord->row();
			
			return $uploadIDRow->next_uploadid;
		}
		
		function getAllFCLUpload($workorderid){
			$sqlQuery = "SELECT wo_upload.*, employees.emp_name 
						 FROM wo_upload 
						 LEFT JOIN employees ON employees.emp_id = wo_upload.upload_by
						 WHERE upload_filetype = 'FCL List' AND upload_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		function getAllLegalList($workorderid){
			$sqlQuery = "SELECT  wo_agg_id,wo_agg_no,wo_agg_ref_no,wo_agg_date,wo_agg_remarks
						 FROM wo_aggrement
						 WHERE wo_no = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
			function getAllFCLFiles($workorderid){
			//$sqlQuery = "SELECT wo_fcl_1st.fcl_id,wo_fcl_1st.fcl_passno,wo_fcl_1st.fcl_name,mst_nationality.nat_desc,
			//             fcl_passexp,fcl_salary,mst_worktrade.trade_desc,
			//			 wo_fcl_1st.fcl_next_of_kin,wo_fcl_1st.fcl_relationship,wo_fcl_1st.fcl_salary,wo_fcl_1st.fcl_wt,wo_fcl_1st.fcl_wo_type
			//			 FROM wo_fcl_1st 
			//			 Left join mst_nationality on mst_nationality.nat_id = wo_fcl_1st.fcl_nationality 
			//			 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_1st.fcl_wt
			//			 WHERE wo_fcl_1st.fcl_woid = '$workorderid'";	
			
			$sqlQuery = "SELECT wo_fcl_1st.fcl_id,wo_fcl_1st.fcl_passno,wo_fcl_1st.fcl_newpassno,wo_fcl_1st.fcl_name,mst_nationality.nat_desc,
           			     wo_fcl_1st.fcl_permitno, wo_fcl_1st.fcl_nationality,fcl_passexp,fcl_salary,wo_fcl_1st.fcl_next_of_kin,wo_fcl_1st.fcl_relationship,wo_fcl_1st.fcl_dob,
						 wo_fcl_1st.fcl_salary,mst_worktrade.trade_desc,wo_fcl_1st.fcl_wt,mst_wo_type.mst_wo_type_desc,wo_fcl_1st.fcl_plksdate1,wo_fcl_1st.fcl_plksdate2
						 FROM wo_fcl_1st 
						 left join workers on workers.wkr_passno = wo_fcl_1st.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = workers.wkr_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_1st.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_1st.fcl_wo_type
						 WHERE wo_fcl_1st.fcl_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		
		function getAllFCLFilesRenew($workorderid){
			
			$sqlQuery = "SELECT wo_fcl_renew.fcl_id,wo_fcl_renew.fcl_passno,wo_fcl_renew.fcl_newpassno,wo_fcl_renew.fcl_name,mst_nationality.nat_desc,
           			     wo_fcl_renew.fcl_permitno, wo_fcl_renew.fcl_nationality,fcl_passexp,fcl_salary,wo_fcl_renew.fcl_next_of_kin,wo_fcl_renew.fcl_relationship,wo_fcl_renew.fcl_dob,
						 wo_fcl_renew.fcl_salary,mst_worktrade.trade_desc,wo_fcl_renew.fcl_wt,mst_wo_type.mst_wo_type_desc,wo_fcl_renew.fcl_nationality,wo_fcl_renew.fcl_plksdate1,wo_fcl_renew.fcl_plksdate2
						 FROM wo_fcl_renew 
						 left join workers on workers.wkr_passno = wo_fcl_renew.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = workers.wkr_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_renew.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_renew.fcl_wo_type
						 WHERE wo_fcl_renew.fcl_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
				
		function getWOByWoidOrCompname($searchby, $keyword){
			$sqlQuery = "SELECT wo.wo_id, wo.wo_num, wo.wo_clab_no, wo.wo_fcl_total, ctr.ctr_comp_name, wo_status.wo_latest_progress 
						 FROM workorders wo 
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 LEFT JOIN contractors ctr
						 ON wo.wo_clab_no = ctr.ctr_clab_no
			   			 WHERE wo.wo_spim_status = 'V' AND $searchby LIKE '%$keyword%' and wo_latest_progress like '%close%'
						 ORDER BY wo.wo_keyin_date DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getWOByWoidOrCompnamePLKS($searchby, $keyword){
			$sqlQuery = "SELECT wo.wo_id, wo.wo_num, wo.wo_clab_no, wo.wo_fcl_total, ctr.ctr_comp_name, wo_status.wo_latest_progress 
						 FROM workorders wo 
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 left join wo_fcl on wo.wo_id = wo_fcl.fcl_woid
						 LEFT JOIN contractors ctr ON wo.wo_clab_no = ctr.ctr_clab_no
			   			 WHERE wo.wo_spim_status = 'Y' AND $searchby LIKE '%$keyword%' and wo.wo_iswithdrawal = 1
and wo_status.wo_isreceive_visa = 1	 ORDER BY wo.wo_keyin_date DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getFCLbyID($id){
		
		$sql = "select wo_fcl_1st.*,mst_countries.cty_id,mst_countries.cty_desc,mst_nationality.nat_id,
		        mst_nationality.nat_desc 
		        from wo_fcl_1st 
				left join mst_countries on mst_countries.cty_id = wo_fcl_1st.wkr_country
				left join mst_nationality on mst_nationality.nat_id = wo_fcl_1st.fcl_nationality
				where fcl_id = '$id'";
		$FCLRecord = $this->db->query($sql);
		return $FCLRecord->row();	
		
		}
		
		
		
		function getCont($clabid){
		$sql = "select contractors.ctr_comp_name,contractors.ctr_addr1,contractors.ctr_addr2,contractors.ctr_addr3,contractors.ctr_pcode,contractors.ctr_state,
		        contractors.ctr_telno,contractors.ctr_fax,contractors.ctr_comp_regno,contractors.ctr_category,mst_states.state_name
				from contractors 
				left join mst_states on mst_states.state_id = contractors.ctr_state
				where ctr_clab_no='$clabid'";
				
		$LampRecord = $this->db->query($sql);
		return $LampRecord->row();
		}
		
		function getLampiranData($wono){
		$sql = "select contractors.ctr_comp_name,contractors.ctr_addr1,contractors.ctr_addr2,contractors.ctr_addr3,contractors.ctr_pcode,contractors.ctr_state,
		        contractors.ctr_telno,contractors.ctr_fax,contractors.ctr_comp_regno,contractors.ctr_category,mst_states.state_name,
				workorders.wo_num,wo_payment.pay_refno,workorders.wo_personincharge
				from workorders 
				left join wo_payment on wo_payment.pay_woid = workorders.wo_id
		        left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				left join mst_states on mst_states.state_id = contractors.ctr_state
				where workorders.wo_spim_status = 'Y' and wo_id='$wono'";
				
		$LampRecord = $this->db->query($sql);
		return $LampRecord->row();
		}
		
		function getCategory($cat){
		
		
		$catid = $cat; 
        $cat_arr = explode(",", $catid);
		
		for($i = 0; $i < count($cat_arr); $i++){
	       
			$sql = "select category_desc from mst_ctr_category where category_id = '$cat_arr[$i]'";
			
			$catRecord = $this->db->query($sql);
			$rec = $catRecord->row();
			$catdesc = $rec->category_desc;
		
		    if($i < 1){
			$strcat = $catdesc;
			}else{
			$strcat = $strcat. "," .$catdesc; 	
			}
		return $strcat;
		
		}
		}
		
		function getTotalFCL($wono){
		    $sql = "select count(*) as cnt from wo_fcl where fcl_woid = '$wono'";
			$CNTRecord = $this->db->query($sql);
			return $CNTRecord->row();	
			
		}
		
		
		function getLampiranFCLbyID($wono){
		
		$sql = "select wo_fcl_1st.fcl_passno,wo_fcl_1st.fcl_name,mst_nationality.nat_desc,wo_fcl_1st.fcl_salary,wo_fcl_1st.fcl_year_renewal,
		        wo_fcl_1st.fcl_permitno,fcl_add,wo_fcl_1st.fcl_next_of_kin,wo_fcl_1st.fcl_nationality, wo_fcl_1st.fcl_relationship,fcl_passexp,mst_worktrade.trade_desc,mst_countries.cty_period,mst_countries.cty_levi,wo_fcl_1st.fcl_pass,
				wo_fcl_1st.fcl_dob,wo_fcl_1st.fcl_gender,wo_fcl_1st.fcl_newpassno,wo_fcl_1st.fcl_wo_type,wo_fcl_1st.fcl_wo_type,wo_fcl_1st.fcl_plksdate1,wo_fcl_1st.fcl_plksdate2,			mst_countries.cty_plks,mst_countries.cty_visa,workers.wkr_gender,workers.wkr_dob,mst_countries.cty_process,mst_countries.cty_fees,wo.wo_personincharge,wkr_permitexp
		        from wo_fcl_1st
		        LEFT JOIN workorders wo ON wo.wo_id = wo_fcl_1st.fcl_woid
				left join workers on workers.wkr_passno = wo_fcl_1st.fcl_passno 
				left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_1st.fcl_wt
				left join mst_nationality on mst_nationality.nat_id = wo_fcl_1st.fcl_nationality
				left join mst_countries on mst_countries.cty_id = wo_fcl_1st.wkr_country 
				left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_1st.fcl_wo_type 
				
				where fcl_woid = '$wono'";
				
		return $this->db->query($sql);
		//return $LampRec->row();	
		
		}
		
		function getAcknowledgeID($wono){
		$sql = "";
		return $this->db->query($sql);
		}
		
		function getWObyWOid($workorderid){
		/***amik dari contractor skali address untuk handover***/
			$sqlQuery = "SELECT workorders.*, wo_agency.*, wo_doc.*, wo_legal.*, wo_payment.*, wo_status.*, ctr.ctr_clab_no, ctr.ctr_comp_regno, ctr.ctr_addr1, ctr_addr2, ctr_addr3, ctr_pcode, state_name, ctr_fax, ctr_telno, ctr.ctr_comp_name, ctr.ctr_contact_name, ctr.ctr_contact_mobileno, mst_countries.cty_desc, wo_agency.agency_name,workorders.wo_visa_date,employees.emp_name, mst_replacement_type.replacement_desc,
			employees.emp_position,wo_aggrement.wo_agg_no
			            FROM workorders 
						LEFT JOIN wo_agency ON workorders.wo_agency = wo_agency.agency_id
						LEFT JOIN wo_doc ON workorders.wo_id = wo_doc.doc_woid
						LEFT JOIN wo_legal ON workorders.wo_id = wo_legal.legal_woid
						LEFT JOIN wo_payment ON workorders.wo_id = wo_payment.pay_woid
						LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
						LEFT JOIN contractors ctr ON workorders.wo_clab_no = ctr.ctr_clab_no
						left join mst_states on ctr.ctr_state = mst_states.state_id 
						LEFT JOIN mst_countries ON workorders.wo_fcl_country = mst_countries.cty_id
						left join employees on employees.emp_username = workorders.wo_personincharge
						left join wo_aggrement on wo_aggrement.wo_no = workorders.wo_id
						left join mst_replacement_type on workorders.wo_isreplacement = mst_replacement_type.replacement_type_id
						WHERE workorders.wo_spim_status = 'Y' and workorders.wo_id = '$workorderid'";
			
			$woRecord = $this->db->query($sqlQuery);
			return $woRecord->row();	
		}
		
		function getWOtype(){
		   $sql = "select * from mst_wo_type ";
			return $this->db->query($sql);
		}
		
		function getAllLabor($searchdata,$clabno){
		   
		    if(isset($searchdata) == ""){
			$strpassno = "";
			}else{
			$strpassno = $searchdata;
			}
		    
		    /*$sqlquery = "SELECT workers.* FROM workers 
			             left join wkr_ctr_relationship on wkr_ctr_relationship.rel_wkrid = workers.wkr_id 
			             where workers.wkr_passno like '%$strpassno%' and wkr_ctr_relationship.rel_ctr_clab_no = '$clabno' 
			             order by workers.wkr_name";*/
			$sqlquery = "SELECT workers.*,mst_nationality.nat_desc FROM workers 
			             left join mst_nationality on workers.wkr_country = mst_nationality.cty_id
			             where workers.wkr_passno like '%$strpassno%' and workers.wkr_currentemp = '$clabno' 
			             order by workers.wkr_name";

			return $this->db->query($sqlquery);
		}
		
		function getLegalbyID($id){
		
		$sql = "select * from wo_aggrement where wo_agg_id = '$id'";
		$LegalRecord = $this->db->query($sql);
		return $LegalRecord->row();	
		
		}
		
		
		function getLogbyLogid($id){
		
			$sqlQuery = "SELECT * FROM wo_phonetrack WHERE track_id = '$id'";
			
			$LogRecord = $this->db->query($sqlQuery);
			return $LogRecord->row();	
		}
		
		
		function getWorkordersByStatus($wo_status, $returnType){
			$sqlQuery = "SELECT wo.wo_id, wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, wo_latest_progress
						 FROM workorders wo
 						 LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 WHERE wo.wo_spim_status = 'Y' ";
			if($wo_status != "overall"){
				if($wo_status == "open")
					$sqlQuery .= " and wo_status.wo_latest_progress NOT IN ('receive calling visa', 'closed','close')";
				else if($wo_status == "closed")
					$sqlQuery .= " and wo_status.wo_latest_progress IN ('receive calling visa', 'closed','close')";
				else
					$sqlQuery .= " and wo_status.wo_latest_progress = '$wo_status'";
			}
			
			$woRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $woRecord->num_rows();
			else
				return $woRecord;
		}
		
		function getWoByJIMAckDate($duration, $returnType){
			$sqlQuery = "SELECT wo.wo_id, wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, wo_latest_progress
						 FROM workorders wo
 						 LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 WHERE wo.wo_spim_status = 'Y' ";
			if($duration == "less14")
				$sqlQuery .= " and NOW() <= date_add(wo_status.wo_jimackdate, INTERVAL 14 DAY)";
			else
				$sqlQuery .= "  and NOW() > date_add(wo_status.wo_jimackdate, INTERVAL 14 DAY)";
			
			$sqlQuery .= " AND wo_status.wo_latest_progress = 'JIM acknowledgement'";
			
			$workordersRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $workordersRecord->num_rows();
			else
				return $workordersRecord;
		}
		
		function getAllAgencies(){
			$selectQuery = "SELECT * FROM wo_agency ORDER BY agency_name";
			
			return $this->db->query($selectQuery);	
		}
		
		function getNextPhTrackLogID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(track_id) + 1 END AS next_trackid 
			             FROM wo_phonetrack";
			
			$phTrackRecord = $this->db->query($sqlQuery);
			$phTrackRow = $phTrackRecord->row();
			
			return $phTrackRow->next_trackid;	
		}
		
		function getAllPhTrackLog($workorderid){
			$sqlQuery = "SELECT * FROM wo_phonetrack 
			           	WHERE track_wo_id = $workorderid
						ORDER BY track_id DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getWoUnderCurrentUser($currentuser){
			$sqlQuery = "SELECT workorders.wo_id, contractors.ctr_comp_name, workorders.wo_fcl_total, workorders.wo_date, workorders.wo_personincharge, workorders.wo_isreplacement, wo_reject_history.reject_rejected, wo_reject_history.reject_comment, wo_phonetrack.track_remarks, wo_phonetrack.track_action, wo_status.wo_latest_progress, wo_status.wo_isjim_ack, wo_status.wo_jimackdate
		FROM
		(
			SELECT * FROM wo_phonetrack ORDER BY wo_phonetrack.track_id DESC
		) AS wo_phonetrack
		LEFT JOIN workorders ON workorders.wo_id = wo_phonetrack.track_wo_id
		LEFT JOIN wo_reject_history ON workorders.wo_id = wo_reject_history.reject_woid
		LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
		LEFT JOIN contractors ON workorders.wo_clab_no = contractors.ctr_clab_no
		WHERE workorders.wo_spim_status = 'Y'  and wo_status.wo_latest_progress NOT IN ('close','closed', 'receive calling visa')
		GROUP BY wo_phonetrack.track_wo_id
		";


			
			return $this->db->query($sqlQuery);	
		}
		
		function getNextRejectHistoryId(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(reject_id) + 1 END AS next_rejectid
						 FROM wo_reject_history";
			
			$rejectRecord = $this->db->query($sqlQuery);
			$rejectRow = $rejectRecord->row();
			
			return $rejectRow->next_rejectid;	
		}
	}
?>