<?php
	class ModelSpimg extends Model{
		function ModelSpimg(){
			parent::Model();
			$this->load->database();	
		}
		
		function getApprovalList(){
		
		  $sql = "select workorders.*,contractors.ctr_comp_name from workorders 
		          left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				  where wo_spim_status = 'G' and wo_iswithdrawal='0' and(chk_app_ceo <> '1' or chk_ver_corp <> '1' or chk_ver_fin <> '1')";
		  return $this->db->query($sql);       
		
		}
		
		function getAllCountry(){
		    
			$sql = "select mst_countries.*,mst_nationality.*
			        from mst_countries 
					left join mst_nationality on mst_nationality.cty_id = mst_countries.cty_id";
			return $this->db->query($sql);
			
		}
		
		
		function getAllReceipt($clabno){
		    
			$sql = "select * from pmt_receipt where payment_type = 'T' and clab_no = '$clabno'";
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
		
		function getCtrByClabNoW($clabno){
			$sqlQuery = "SELECT ctr_clab_no, ctr_comp_name, ctr_contact_name, ctr_contact_mobileno, ctr_status ,ctr_addr1
			             FROM contractors 
			             WHERE ctr_clab_no = '$clabno'";
			
			return $this->db->query($sqlQuery);	
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
		
		// Enhancement of SKIM for G1G3 (START)
		function getAllSiteVisitList($workorderid){
			$sqlQuery = "SELECT  sv_id,sv_woid,sv_clabno,sv_compname,sv_alapej,sv_alatap
						 FROM g_sitevisit
						 WHERE sv_woid = '$workorderid'";	
			
			return $this->db->query($sqlQuery);
		} 
		
		function getSiteVisitbyID($woid){
			$sql = "select * from g_sitevisit where sv_woid = '$woid'";
			$SiteVisitRecord = $this->db->query($sql);
			return $SiteVisitRecord->row();			
		}	
		
		function getContByClabNo($clabno){
			$sql = "SELECT ctr_clab_no, ctr_comp_name, CONCAT(ctr_addr1, ' ', ctr_addr2, ' ', ctr_addr3, ' ',ctr_pcode, ' ',state_name) AS addr
			        FROM contractors 
					LEFT JOIN mst_states ON mst_states.state_id=contractors.ctr_state
			        WHERE ctr_clab_no = '$clabno'";
			
			$contRecord = $this->db->query($sql);
			return $contRecord ->row();
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
			             order by workers.wkr_name";
						 workers.wkr_currentemp = '$clabno' */
			$sqlquery = "SELECT workers.*,mst_nationality.nat_desc FROM workers 
			             left join mst_nationality on workers.wkr_country = mst_nationality.cty_id
						 LEFT JOIN wo_fcl_g1g3 g1 ON g1.fcl_passno = workers.wkr_passno
			             where workers.wkr_passno like '%$strpassno%' and workers.wkr_group = 'G1G3' AND workers.wkr_status='1' AND fcl_check = 'IN' 
			             order by workers.wkr_name";
			//echo $sqlquery;
			return $this->db->query($sqlquery);
		}
		
		function getWOtype(){
		   $sql = "select * from mst_wo_type ";
			return $this->db->query($sql);
		}
		
		
		
		function getAllFCLFiles($workorderid){
		$sqlQuery = "SELECT wo_fcl_g1g3.fcl_id,wo_fcl_g1g3.fcl_passno,wo_fcl_g1g3.fcl_newpassno,wo_fcl_g1g3.fcl_name,mst_nationality.nat_desc,
           			     wo_fcl_g1g3.fcl_permitno, wo_fcl_g1g3.fcl_nationality,fcl_passexp,fcl_salary,wo_fcl_g1g3.fcl_next_of_kin,wo_fcl_g1g3.fcl_relationship,wo_fcl_g1g3.fcl_dob,
						 wo_fcl_g1g3.fcl_salary,mst_worktrade.trade_desc,wo_fcl_g1g3.fcl_wt,mst_wo_type.mst_wo_type_desc,wo_fcl_g1g3.fcl_nationality,wo_fcl_g1g3.fcl_plksdate1,wo_fcl_g1g3.fcl_plksdate2
						 FROM wo_fcl_g1g3 
						 left join workers on workers.wkr_passno = wo_fcl_g1g3.fcl_passno
						 Left join mst_nationality on mst_nationality.nat_id = workers.wkr_nationality
						 left join mst_worktrade on mst_worktrade.trade_id = wo_fcl_g1g3.fcl_wt 
						 left join mst_wo_type on mst_wo_type.mst_wo_type_id = wo_fcl_g1g3.fcl_wo_type
						 WHERE wo_fcl_g1g3.fcl_woid = '$workorderid'";	
		
		return $this->db->query($sqlQuery);
		} 
		
		// Enhancement of SKIM for G1G3 (END)
		
		function getWOByWoidOrCompname($searchby, $keyword){
			$sqlQuery = "SELECT wo.wo_id, wo.wo_num, wo.wo_clab_no, wo.wo_fcl_total, ctr.ctr_comp_name, wo_status.wo_latest_progress 
						 FROM workorders wo 
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 LEFT JOIN contractors ctr
						 ON wo.wo_clab_no = ctr.ctr_clab_no
			   			 WHERE wo.wo_spim_status = 'G' AND $searchby LIKE '%$keyword%'
			   			 ORDER BY wo.wo_keyin_date DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		function getFCLbyID($id){
		
		$sql = "select wo_fcl_g1g3.*,mst_countries.cty_id,mst_countries.cty_desc,mst_nationality.nat_id,
		        mst_nationality.nat_desc 
		        from wo_fcl_g1g3 
				left join mst_countries on mst_countries.cty_id = wo_fcl_g1g3.fcl_country
				left join mst_nationality on mst_nationality.nat_id = wo_fcl_g1g3.fcl_nationality
				where fcl_id = '$id'";
		$FCLRecord = $this->db->query($sql);
		return $FCLRecord->row();	
		
		}
		
		function getLegalbyID($id){
		
		$sql = "select * from wo_aggrement where wo_agg_id = '$id'";
		$LegalRecord = $this->db->query($sql);
		return $LegalRecord->row();	
		
		}
		
		function getLampiranData($wono){
		$sql = "select contractors.ctr_comp_name,contractors.ctr_addr1,contractors.ctr_addr2,contractors.ctr_addr3,contractors.ctr_pcode,contractors.ctr_state,
		        contractors.ctr_telno,contractors.ctr_fax,contractors.ctr_comp_regno,contractors.ctr_category,mst_states.state_name,
				workorders.wo_num,wo_payment.pay_refno,workorders.wo_personincharge
				from workorders 
				left join wo_payment on wo_payment.pay_woid = workorders.wo_id
		        left join contractors on contractors.ctr_clab_no = workorders.wo_clab_no
				left join mst_states on mst_states.state_id = contractors.ctr_state
				where workorders.wo_spim_status = 'G' and wo_id='$wono'";
				
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
		
		$sql = "select wo_fcl.fcl_name,wo_fcl.fcl_passno,mst_nationality.nat_desc,wo_fcl.fcl_gender,wo_fcl.fcl_dob,wo_fcl.fcl_add,
		       wo_fcl.fcl_salary,wo_fcl.fcl_bthplace,wo_fcl.fcl_passissue,fcl_passexp,mst_worktrade.trade_desc,mst_countries.cty_period,
				mst_countries.cty_levi,mst_countries.cty_plks,mst_countries.cty_visa,mst_countries.cty_process,wo.wo_personincharge,wo_fcl.fcl_next_of_kin,
				wo_fcl.fcl_relationship,wo_fcl.fcl_plksno,wo_fcl.fcl_pass
		        from wo_fcl 
		        LEFT JOIN workorders wo ON wo.wo_id = wo_fcl.fcl_woid
				left join mst_worktrade on mst_worktrade.trade_id = wo_fcl.fcl_wt
				left join mst_nationality on mst_nationality.nat_id = wo_fcl.fcl_nationality
				left join mst_countries on mst_countries.cty_id = wo_fcl.fcl_country 				
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
			$sqlQuery = "SELECT workorders.*, wo_agency.*, wo_doc.*, wo_legal.*, wo_payment.*, wo_status.*, ctr.ctr_clab_no, ctr.ctr_comp_regno, ctr.ctr_addr1, ctr_addr2, ctr_addr3, ctr_pcode, state_name, ctr_fax, ctr_telno, ctr.ctr_comp_name, ctr.ctr_contact_name, ctr.ctr_contact_mobileno,ctr_grade, mst_countries.cty_desc, wo_agency.agency_name,workorders.wo_visa_date,employees.emp_name,
			employees.emp_position,wo_aggrement.wo_agg_no,YEAR(workorders.wo_date) as woyear
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
						WHERE workorders.wo_spim_status = 'G' and workorders.wo_id = '$workorderid'";
			
			$woRecord = $this->db->query($sqlQuery);
			return $woRecord->row();	
		}
		
		function getWorkordersByStatus($wo_status, $returnType){
			$sqlQuery = "SELECT wo.wo_id, wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, wo_latest_progress
						 FROM workorders wo
 						 LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 WHERE wo.wo_spim_status = 'G' ";
			/*if($wo_status != "overall"){
				if($wo_status == "open")
					$sqlQuery .= " and wo_status.wo_latest_progress IN ('Release Workers')";
				else if($wo_status == "closed")
					$sqlQuery .= " and wo_status.wo_latest_progress IN ('receive calling visa', 'closed')";
				else
					$sqlQuery .= " and wo_status.wo_latest_progress = '$wo_status'";
			}*/
			//echo $sqlQuery;
			$woRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $woRecord->num_rows();
			else
				return $woRecord;
		}
		
		function getWorkordersByProcess($wo_status, $returnType){
			if($wo_status=='1') $process='workorder submitted';
			elseif($wo_status=='2') $process='Process CIMS';
			elseif($wo_status=='3') $process='Penerimaan Permohonan';
			elseif($wo_status=='4') $process='Semakan';
			elseif($wo_status=='5') $process='Temuduga';
			elseif($wo_status=='6') $process='Kelulusan JKK Pelulus';
			elseif($wo_status=='7') $process='labour check-out';
			elseif($wo_status=='8') $process='labour check-in';
			elseif($wo_status=='9') $process='closed';
			
			$sqlQuery = "SELECT wo.wo_id, wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, wo_latest_progress
						 FROM workorders wo
 						 LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
						 LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
						 WHERE wo.wo_spim_status = 'G' AND wo_status.wo_latest_progress = '$process' ";

			//echo $sqlQuery;
			$woRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $woRecord->num_rows();
			else
				return $woRecord;
		}
		
		function getCurrentStock($fcl, $returnType){
			$sqlQuery = "SELECT wkr_id,wkr_passno,wkr_name,nat_desc,cty_desc,wkr_dob,wkr_wtrade,wkr_passexp,wkr_permitexp  
			FROM workers 
			LEFT JOIN wo_fcl_g1g3 g ON g.fcl_passno = workers.wkr_passno
			LEFT JOIN mst_countries cty ON cty.cty_id = workers.wkr_country 
			LEFT JOIN mst_nationality nat ON nat.nat_id = workers.wkr_nationality
			WHERE wkr_group='G1G3' AND wkr_status='1' ";
			
			if($fcl == 'N')
				$sqlQuery .= " AND (fcl_id IS NULL OR fcl_check='IN') ";
			else	
				$sqlQuery .= " AND fcl_id<>'' ";
			
			//echo $sqlQuery;
			$woRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $woRecord->num_rows();
			else
				return $woRecord;
		}
		
		function getWorkerbyWO($woid){
			$sqlQuery = "SELECT fcl_woid,fcl_passno,fcl_name,fcl_nationality,wkr_permitexp,fcl_passexp,wkr_entrydate,cty_desc
						FROM wo_fcl_g1g3
						LEFT JOIN mst_countries cty ON cty.cty_id = wo_fcl_g1g3.fcl_country 
						LEFT JOIN workers ON workers.wkr_passno = wo_fcl_g1g3.fcl_passno 
						WHERE fcl_woid = '$woid' ";
			
			//echo $sqlQuery;
			$woRecord = $this->db->query($sqlQuery);
			return $woRecord;
		}
		
		function getWorkordersByLabour($check, $returnType){

			$sqlQuery = "SELECT fcl_woid,fcl_passno,fcl_name,fcl_nationality,fcl_dob,cty_desc,fcl_wt,fcl_passexp
						FROM wo_fcl_g1g3
						LEFT JOIN workorders wo ON wo.wo_id = wo_fcl_g1g3.fcl_woid 
						LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid 
						LEFT JOIN mst_countries cty ON cty.cty_id = wo_fcl_g1g3.fcl_country 
						WHERE wo_spim_status = 'G' AND fcl_check = '$check' ";
			
			//echo $sqlQuery;
			$woRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $woRecord->num_rows();
			else
				return $woRecord;
		}

		function getWoByExpiryCont($duration,$returnType){		  
			$fieldname='wo_ransitdate';
			if($duration == "less0m"){
				$noOfMon=0;$sqlQry = " AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) < 0";
			}else if($duration == "less1m"){
				$noOfMon=1;$sqlQry = " AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) > 0  
								AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) < 30 ";
			}else if($duration == "less2m"){
				$noOfMon=2;$sqlQry = " AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) > 30 
								AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) < 60 ";
			}elseif($duration == "less3m"){
				$noOfMon=3;$sqlQry = " AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) > 60 
								AND DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) < 91 ";
			}
			
			$sqlQuery = "SELECT wo.wo_id, wo.wo_num, wo.wo_clab_no, wo.wo_fcl_total, wo.wo_keyin_date, contractors.ctr_comp_name, 
			wo_latest_progress, wo.wo_contdur,wo_ransitdate,DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH) AS expiry_date,
			DATEDIFF(DATE_ADD(wo_ransitdate, INTERVAL wo.wo_contdur MONTH),NOW()) AS daysleft,tablex.print_date,tablex.print_doctype
			FROM workorders wo
			LEFT JOIN contractors ON wo.wo_clab_no = contractors.ctr_clab_no
			LEFT JOIN wo_status ON wo.wo_id = wo_status.status_woid
			LEFT JOIN (SELECT * FROM wo_printletter_history WHERE wo_printletter_history.print_isvoid = 0 AND print_docduration = '$noOfMon'  
				AND print_doctype = '$fieldname') AS tablex ON wo.wo_clab_no = tablex.print_ctr_clabno
			WHERE wo.wo_spim_status = 'G' AND wo_status.wo_latest_progress = 'labour check-out' "; 
			$sqlQuery .= $sqlQry;
			
			//echo $sqlQuery;
			$workordersRecord = $this->db->query($sqlQuery);
			
			if($returnType == "sum") 
				return $workordersRecord->num_rows();
			else
				return $workordersRecord;
		}
		//------------------------------------------------------------------------
		function getNextPrintLetterID(){
			$nextidQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE 
							MAX(print_id) + 1 END AS next_print_id 
							FROM wo_printletter_history";	
			$printIDRecord = $this->db->query($nextidQuery);
			$printIDRow = $printIDRecord->row();
			
			return $printIDRow->next_print_id;		
		}
		function checkExistingPrintRecord($clabNo, $noOfMonths, $fieldname){
			$sqlQuery = "SELECT print_id , print_date FROM wo_printletter_history 
						WHERE print_ctr_clabno = '$clabNo'
						AND print_doctype = '$fieldname'
						AND print_docduration = '$noOfMonths'
						AND print_isvoid = '0'";
			
			return $this->db->query($sqlQuery);
		}
		//--------------------------------------------------------------------------
		
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
			//$sqlQuery = "SELECT workorders.*, wo_status.wo_latest_progress, wo_status.wo_receivedate, contractors.ctr_comp_name FROM workorders 
			//			LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
			//			LEFT JOIN contractors ON contractors.ctr_clab_no = workorders.wo_clab_no
			//			WHERE workorders.wo_spim_status = 'T' and wo_status.wo_latest_progress NOT IN ('closed', 'receive calling visa')
			//			AND workorders.wo_keyin_by = '$currentuser'
			//			ORDER BY wo_date";
			
			$sqlQuery = "SELECT workorders.*, wo_status.wo_latest_progress, wo_status.wo_receivedate, contractors.ctr_comp_name FROM workorders 
						LEFT JOIN wo_status ON workorders.wo_id = wo_status.status_woid
						LEFT JOIN contractors ON contractors.ctr_clab_no = workorders.wo_clab_no
						WHERE workorders.wo_spim_status = 'G' and wo_status.wo_latest_progress NOT IN ('closed','close', 'receive calling visa')
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