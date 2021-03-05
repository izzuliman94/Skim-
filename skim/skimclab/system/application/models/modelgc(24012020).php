<?php
	class Modelgc extends Model{
		function Modelgc(){
			parent::Model();
			$this->load->database();	
		}
		
		function getWOtype(){
		   $sql = "select * from mst_wo_type ";
			return $this->db->query($sql);
		}
		
		function getApprovalList(){
		
		  $sql = "select workorders.*,contractors.ctr_comp_name from workorders 
		          left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				  where wo_spim_status = 'R' and wo_iswithdrawal='0' and (chk_app_ceo <> '1' or chk_ver_corp <> '1' or chk_ver_fin <> '1')";
		  return $this->db->query($sql);       
		
		}
		
		function getTotalFCL($wono){
		    $sql = "select count(*) as cnt from wo_fcl_renew where fcl_woid = '$wono'";
			$CNTRecord = $this->db->query($sql);
			return $CNTRecord->row();	
			
		}
		
		
		function getAllFCLUpload($workorderid){
			$sqlQuery = "SELECT wo_upload.*, employees.emp_name 
						 FROM wo_upload 
						 LEFT JOIN employees ON employees.emp_id = wo_upload.upload_by
						 WHERE upload_filetype = 'FCL List' AND upload_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		
		function getAllReceipt($clab){
		    
			$sql = "select * from pmt_receipt_new where payment_type IN ('GRC', 'V', 'R') and clab_no = '$clab'";
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
			             where workers.wkr_passno like '%$strpassno%' AND
						 workers.wkr_transtatus NOT IN (20) and workers.wkr_currentemp = '$clabno' 
			             order by workers.wkr_name";

			return $this->db->query($sqlquery);
		}
		
		function getlastaggno($workorderid,$clabno){
			$legalno = "";
			$yy = date('y');
			$sql = "select count(wo_agg_no) as cnt from wo_aggrement where wo_agg_no like 'CLAB/LEGAL/$clabno/$workorderid/$yy/%'";
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
		
		function getAllregion(){
			$sqlquery = "SELECT * FROM mst_regional ORDER BY regional_desc";	
			
			return $this->db->query($sqlquery);
		}
		
		function getAllConsultant(){
			$sqlquery = "SELECT * FROM gc_consultant ORDER BY gc_train_id";	
			
			return $this->db->query($sqlquery);
		}
		
			function getAllgctype(){
			$sqlquery = "SELECT * FROM gc_app_type ORDER BY gc_type_id";	
			
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
		
	/*	function getAllFCLFiles($workorderid){
			$sqlQuery = "SELECT wo_upload.*, employees.emp_name 
						 FROM wo_upload 
						 LEFT JOIN employees ON employees.emp_id = wo_upload.upload_by
						 WHERE upload_filetype = 'FCL List' AND upload_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} */
		
		function getAllLegalList($workorderid){
			$sqlQuery = "SELECT  wo_agg_id,wo_agg_no,wo_agg_ref_no,wo_agg_date,wo_agg_remarks
						 FROM wo_aggrement
						 WHERE wo_no = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
			function getAllFCLFiles($workorderid){
			/*
			$sqlQuery = "SELECT wo_fcl_renew.fcl_id,wo_fcl_renew.fcl_passno,workers.wkr_name,mst_nationality.nat_desc,
           			     wo_fcl_renew.fcl_passissue,fcl_passexp,fcl_salary,wo_fcl_renew.fcl_next_of_kin,wo_fcl_renew.fcl_relationship,
						 wo_fcl_renew.fcl_salary,mst_worktrade.trade_desc,wo_fcl_renew.fcl_wt,mst_wo_type.mst_wo_type_desc
						 FROM wo_fcl_renew 
						 left join workers on workers.wkr_passno = wo_fcl_renew.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = wo_fcl_renew.fcl_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_renew.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_renew.fcl_wo_type
						 WHERE wo_fcl_renew.fcl_woid = '$workorderid'";	*/
			$sqlQuery = "SELECT wo_fcl_gc.fcl_id,wo_fcl_gc.fcl_passno,wo_fcl_gc.fcl_newpassno,wo_fcl_gc.fcl_name,mst_nationality.nat_desc,
           			     wo_fcl_gc.fcl_permitno, wo_fcl_gc.fcl_gcr, wo_fcl_gc.fcl_gcrdate,wo_fcl_gc.fcl_prgc,wo_fcl_gc.fcl_gcp, wo_fcl_gc.fcl_gcpdate,  wo_fcl_gc.fcl_nationality,fcl_passexp,fcl_salary,wo_fcl_gc.fcl_next_of_kin,wo_fcl_gc.fcl_relationship,wo_fcl_gc.fcl_dob,wo_fcl_gc.fcl_salary,mst_worktrade.trade_desc,wo_fcl_gc.fcl_wt,mst_wo_type.mst_wo_type_desc,wo_fcl_gc.fcl_nationality,wo_fcl_gc.fcl_plksdate1,wo_fcl_gc.fcl_plksdate2
						 FROM wo_fcl_gc 
						 left join workers on workers.wkr_passno = wo_fcl_gc.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = workers.wkr_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_gc.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_gc.fcl_wo_type
						 WHERE wo_fcl_gc.fcl_woid = '$workorderid'";//" and wo_fcl_gc.fcl_gcr = '1'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		function getsummarygc($datefrom,$dateto,$region,$type,$cancel,$cont){
				
				   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 

		   $sqlQuery = "select pmt_receipt_new.*,pmt_type.pmt_type_desc,		           
				   sum(clab_amount + amt_clabren + amt_contreg + amt_contren + amt_rehire + local_amount + amt_greencard +  amt_clabfee + jim_amount + fomema_amount + ins_amount + agency_amount + others_amount) as TotalPaymentCollected 
				   from pmt_receipt_new 
                   inner join pmt_type on pmt_type.pmt_type_id = pmt_receipt_new.payment_type 				   
				   where pmt_datecreated between '$dtf' and '$dtt' and pmt_withdraw ='$cancel' ";
				   
			if($region !== '0'){
				$sqlQuery .= " AND regional_id = '$region'";
			}
			
			if($type !== '0'){
				$sqlQuery .= " AND payment_type = '$type'";
			}
			
			if($cont !== '0'){
				$sqlQuery .= " AND clab_no = '$cont'";
			}
			
			$sqlQuery .= " GROUP BY pmt_receipt_new.pmt_receipt_no";
			
			//echo $sqlQuery;
						
			return 	$this->db->query($sqlQuery);  		   
		   
		}
		
		function getSelFCLFiles($workorderid){
			$sqlQuery = "SELECT wo_fcl_gc.fcl_id,wo_fcl_gc.fcl_passno,wo_fcl_gc.fcl_newpassno,wo_fcl_gc.fcl_name,mst_nationality.nat_desc,
           			     wo_fcl_gc.fcl_permitno, wo_fcl_gc.fcl_gcr, wo_fcl_gc.fcl_gcrdate,wo_fcl_gc.fcl_prgc,wo_fcl_gc.fcl_gcp, wo_fcl_gc.fcl_gcpdate,  wo_fcl_gc.fcl_nationality,fcl_passexp,fcl_salary,wo_fcl_gc.fcl_next_of_kin,wo_fcl_gc.fcl_relationship,wo_fcl_gc.fcl_dob,wo_fcl_gc.fcl_salary,mst_worktrade.trade_desc,wo_fcl_gc.fcl_wt,mst_wo_type.mst_wo_type_desc,wo_fcl_gc.fcl_nationality,wo_fcl_gc.fcl_plksdate1,wo_fcl_gc.fcl_plksdate2
						 FROM wo_fcl_gc 
						 left join workers on workers.wkr_passno = wo_fcl_gc.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = workers.wkr_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_gc.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_gc.fcl_wo_type
						 WHERE wo_fcl_gc.fcl_woid = '$workorderid' and wo_fcl_gc.fcl_gcr = '1'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		function getWOByWoidOrCompname($searchby, $keyword){
			$sqlQuery = "SELECT wo.wo_id, wo.wo_num, wo.wo_clab_no, wo.wo_fcl_total, ctr.ctr_comp_name, wo_status.wo_latest_progress 
						 FROM workorders wo 
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 LEFT JOIN contractors ctr
						 ON wo.wo_clab_no = ctr.ctr_clab_no
			   			 WHERE wo.wo_spim_status = 'X' AND $searchby LIKE '%$keyword%'
			   			 ORDER BY wo.wo_keyin_date DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getFCLbyID($id){
		/*$sql = "select wo_fcl_renew.*,workers.wkr_name from wo_fcl_renew 
		        left join workers on workers.wkr_passno = wo_fcl_renew.fcl_passno where wo_fcl_renew.fcl_id = '$id'";*/
		$sql = "select * from wo_fcl_gc where wo_fcl_gc.fcl_id = '$id'";
		$FCLRecord = $this->db->query($sql);
		return $FCLRecord->row();	
		
		}
		
		function getLegalbyID($id){
		
		$sql = "select * from wo_aggrement where wo_agg_id = '$id'";
		$LegalRecord = $this->db->query($sql);
		return $LegalRecord->row();	
		
		}
		
		function getLampiranData($wono){
		$sql = "select contractors.ctr_comp_name,contractors.ctr_addr1,contractors.ctr_addr2,contractors.ctr_addr3,contractors.ctr_pcode,
		        contractors.ctr_telno,contractors.ctr_fax,contractors.ctr_comp_regno,contractors.ctr_category,mst_states.state_name,
				workorders.wo_num,wo_payment.pay_refno,workorders.wo_personincharge
				from workorders 
				left join wo_payment on wo_payment.pay_woid = workorders.wo_id
		        left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				left join mst_states on mst_states.state_id = contractors.ctr_state
				where workorders.wo_spim_status = 'X' and wo_id='$wono'";
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
		
		function getLampiranFCLbyID($wono){
		
		$sql = "select wo_fcl_gc.fcl_passno,wo_fcl_gc.fcl_name,mst_nationality.nat_desc,wo_fcl_gc.fcl_salary,wo_fcl_gc.fcl_year_renewal,
		        wo_fcl_gc.fcl_permitno,fcl_add,wo_fcl_gc.fcl_next_of_kin,wo_fcl_gc.fcl_nationality, wo_fcl_gc.fcl_relationship,fcl_passexp,mst_worktrade.trade_desc,mst_countries.cty_period,mst_countries.cty_levi,wo_fcl_gc.fcl_pass,
				wo_fcl_gc.fcl_dob,wo_fcl_gc.fcl_gender,wo_fcl_gc.fcl_wt,wo_fcl_gc.fcl_newpassno,wo_fcl_gc.fcl_wo_type,wo_fcl_gc.fcl_wo_type,wo_fcl_gc.fcl_plksdate1,wo_fcl_gc.fcl_plksdate2,			mst_countries.cty_plks,mst_countries.cty_visa,workers.wkr_gender,workers.wkr_dob,mst_countries.cty_process,mst_countries.cty_fees,wo.wo_personincharge,wkr_permitexp
		        from wo_fcl_gc
		        LEFT JOIN workorders wo ON wo.wo_id = wo_fcl_gc.fcl_woid
				left join workers on workers.wkr_passno = wo_fcl_gc.fcl_passno 
				left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_gc.fcl_wt
				left join mst_nationality on mst_nationality.nat_id = wo_fcl_gc.fcl_nationality
				left join mst_countries on mst_countries.cty_id = wo_fcl_gc.wkr_country 
				left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_gc.fcl_wo_type 
				
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
			$sqlQuery = "SELECT workorders.*, wo_agency.*,gc_consultant.*, mst_regional.*, wo_doc.*, wo_legal.*, wo_payment.*, wo_status.*, ctr.ctr_clab_no, 
			             ctr.ctr_comp_regno, ctr.ctr_addr1, ctr_addr2, ctr_addr3, ctr_pcode, state_name, ctr_fax, ctr_telno,   
						 ctr.ctr_comp_name, ctr.ctr_contact_name, ctr.ctr_contact_mobileno, mst_countries.cty_desc, 
						 wo_agency.agency_name,workorders.wo_visa_date,employees.emp_name,employees.emp_position,wo_aggrement.wo_agg_no
			            FROM workorders 
						LEFT JOIN wo_agency ON workorders.wo_agency = wo_agency.agency_id
						LEFT JOIN wo_doc ON workorders.wo_id = wo_doc.doc_woid
						LEFT JOIN wo_legal ON workorders.wo_id = wo_legal.legal_woid
						LEFT JOIN wo_payment ON workorders.wo_id = wo_payment.pay_woid
						LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
						LEFT JOIN contractors ctr ON workorders.wo_clab_no = ctr.ctr_clab_no
						left join mst_states on ctr.ctr_state = mst_states.state_id 
						left join mst_regional on workorders.wo_region = mst_regional.regional_id 
						left join gc_consultant on workorders.wo_gc_consult = gc_consultant.gc_train_id 
						LEFT JOIN mst_countries ON workorders.wo_fcl_country = mst_countries.cty_id
						left join employees on employees.emp_username = workorders.wo_personincharge
						left join wo_aggrement on wo_aggrement.wo_no = workorders.wo_id
						WHERE workorders.wo_spim_status = 'X' and workorders.wo_id = $workorderid";
			
			$woRecord = $this->db->query($sqlQuery);
			return $woRecord->row();	
		}
		
		function getWorkordersByStatus($wo_status, $returnType){
			$sqlQuery = "SELECT wo.wo_id, wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, wo_latest_progress
						 FROM workorders wo
 						 LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 where wo.wo_spim_status = 'X' ";
						 
			if($wo_status != "overall"){
				if($wo_status == "open")
					$sqlQuery .= " and wo_status.wo_latest_progress NOT IN ('closed')";
				else if($wo_status == "closed")
					$sqlQuery .= " and wo_status.wo_latest_progress IN ('closed')";
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
						 WHERE wo.wo_spim_status = 'X' ";
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
			$sqlQuery = "SELECT workorders.*, wo_status.wo_latest_progress, wo_status.wo_receivedate, contractors.ctr_comp_name FROM workorders 
						LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
						LEFT JOIN contractors ON contractors.ctr_clab_no = workorders.wo_clab_no
						WHERE workorders.wo_spim_status = 'X' and wo_status.wo_latest_progress NOT IN ('closed','close')
						ORDER BY wo_date";
			
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