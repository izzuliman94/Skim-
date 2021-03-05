<?php
	class ModelAvailable extends Model {
		function ModelAvailable(){
			parent::Model();
			$this->load->database();
		}	
		
		function getAllContractors(){
			$query = "SELECT ctr_clab_no, ctr_comp_name FROM contractors ORDER BY ctr_comp_name";
			
			return $this->db->query($query);
		}
		
		
		function getNextPhTrackLogID(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN 1 ELSE MAX(track_id) + 1 END AS next_trackid 
			             FROM available_phonetrack";
			
			$phTrackRecord = $this->db->query($sqlQuery);
			$phTrackRow = $phTrackRecord->row();
			
			return $phTrackRow->next_trackid;	
		}
		
		function getAllPhTrackLog($refno){
			$sqlQuery = "SELECT * FROM available_phonetrack 
			           	WHERE track_ref_id = '$refno'
						ORDER BY track_id DESC";
			
			return $this->db->query($sqlQuery);	
		}
		
		
		function getLogbyLogid($id){
		
			$sqlQuery = "SELECT * FROM available_phonetrack WHERE track_id = '$id'";
			
			$LogRecord = $this->db->query($sqlQuery);
			return $LogRecord->row();	
		}
		
		function getCtrByClabNo($ctr_clab_no){
			$query = "SELECT contractors.*, mst_ctr_appstatus.appstatus_desc, mst_emp_status.emp_status_desc FROM contractors ";
			$query .= " LEFT JOIN mst_ctr_appstatus ON contractors.ctr_appstatus = mst_ctr_appstatus.appstatus_id";
			$query .= " LEFT JOIN mst_emp_status ON contractors.ctr_status = mst_emp_status.emp_statusid";
			$query .= " WHERE ctr_clab_no = '" . $ctr_clab_no . "'";	
			
			$ctrRecord = $this->db->query($query);
			
			return $ctrRecord->row();
		}
		
		function getAvailableDetails($ref_no){
			$query = "SELECT available.*, mst_avstatus.avstatus_desc FROM available";
			$query .= " LEFT JOIN mst_avstatus ON available.avlab_statusid = mst_avstatus.avstatus_id";
			$query .= " WHERE avlab_ref_no = '" . $ref_no . "'";
			$avlabRecords = $this->db->query($query);
			
			return $avlabRecords->row();
		}
		
		function getAvailableSummary($ref_no){
			$sqlQuery = "SELECT available.avlab_ref_no, ctr1.ctr_clab_no AS comp_from_clabno, ctr1.ctr_comp_name AS comp_from, ctr2.ctr_clab_no AS comp_to_clabno, ctr2.ctr_comp_name AS comp_to from available
						LEFT JOIN contractors ctr1 ON available.avlab_comp_from = ctr1.ctr_clab_no
						LEFT JOIN contractors ctr2 ON available.avlab_comp_to = ctr2.ctr_clab_no
						WHERE avlab_ref_no = '$ref_no'";	
						
			$avlabRecords = $this->db->query($sqlQuery);
			return $avlabRecords->row();
		}
		
		function getAvailableWkrDetails($refno, $num, $offset){
			$this->db->select('*');
			$this->db->from('available_wkr');
			$this->db->join('workers', 'workers.wkr_id = available_wkr.avlabwkr_wkrid');
			$this->db->where("avlabwkr_ref_no = '$refno'");
			$this->db->order_by('avlabwkr_createddate');
			$this->db->limit($num, $offset);
			
    		$query = $this->db->get();
    		
    		return $query;
		}
		
		function getNewAvlabRefNo(){
			$sqlQuery = "SELECT CASE WHEN COUNT(*) = 0 THEN '000001' 
						 ELSE RIGHT(CONCAT('00000', CAST(RIGHT(MAX(avlab_ref_no), 6) AS UNSIGNED INTEGER) + 1), 6) END 
						 AS nextrefno FROM available
						 ";
			$refnoRecord = $this->db->query($sqlQuery);
			$refnoRow = $refnoRecord->row();
			
			return $refnoRow->nextrefno;
		}
		
		function getAvlabWkrByStatus($refno, $wkrstatus){
			$sqlQuery = "SELECT COUNT(*) as totalwkr FROM available_wkr 
			             WHERE avlabwkr_ref_no = '$refno' AND avlabwkr_status = $wkrstatus";
			
			$wkrRecord = $this->db->query($sqlQuery);
			$wkrRow = $wkrRecord->row();
			
			return $wkrRow->totalwkr;
		}
		
		function checkRegisteredWkr($passno, $avlabrefno){
			$sqlQuery = "SELECT available_wkr.*, workers.wkr_name, workers.wkr_passno FROM available_wkr
						LEFT JOIN workers ON workers.wkr_id = available_wkr.avlabwkr_wkrid
						WHERE avlabwkr_ref_no = '$avlabrefno' AND workers.wkr_passno = '$passno'";
			
			return $this->db->query($sqlQuery);
		}
	}
?>