<?php
	class ModelAdmin extends model {
		function ModelAdmin(){
			parent::Model();
			$this->load->database();
		}
		
		function getAllDepartments(){
			$sqlQuery = "SELECT dpt_id, dpt_name from departments";
			
			return $this->db->query($sqlQuery);
		}
		
		function getAllUsers(){
			$sqlQuery = "SELECT e.emp_num, e.emp_name, e.emp_position, d.dpt_name
				     FROM employees e
				     LEFT JOIN departments d ON e.emp_dpt_id = d.dpt_id";
				     
			return $this->db->query($sqlQuery);
		}
		
		function getEmployees($num, $offset){
    		$this->db->select('*');
    		$this->db->from('employees');
    		$this->db->join('departments', 'employees.emp_dpt_id = departments.dpt_id');
    		$this->db->order_by('emp_id');
    		$this->db->limit($num, $offset);
    		
    		$query = $this->db->get();
    		
    		return $query;
  		}
  		
  		function searchEmployees($searchby, $keyword, $num, $offset){
    		$this->db->select('*');
    		$this->db->from('employees');
    		$this->db->join('departments', 'employees.emp_dpt_id = departments.dpt_id');
    		$this->db->like($searchby, $keyword);
    		$this->db->order_by('emp_id');
	    	if($offset > 0) $this->db->limit($num, $offset);
			
    		$query = $this->db->get();
    		
    		return $query;
  		}
  		
  		function getDptNameByDptID($dpt_id){
	  		$sqlQuery = "SELECT dpt_name FROM departments WHERE dpt_id = $dpt_id";	
	  		
	  		$dptRecord = $this->db->query($sqlQuery);
	  		$dptRow = $dptRecord->row();
	  		
	  		return $dptRow->dpt_name;
  		}
  		
  		function searchEmpTotalRows($searchby, $keyword){
  			$this->db->select('COUNT(*) AS totalEmp');
    		$this->db->from('employees');
    		$this->db->join('departments', 'employees.emp_dpt_id = departments.dpt_id');
    		$this->db->like($searchby, $keyword);
	    	
    		$query = $this->db->get();    		
    		$queryRow = $query->row();

    		return $queryRow->totalEmp;
	  	}
	  	
	  	function getEmpByEmpID($emp_id){
		 	$sqlQuery = "SELECT * FROM employees";
		 	$sqlQuery .= " WHERE employees.emp_id = $emp_id";
		 	
		 	$empRecord = $this->db->query($sqlQuery);
		 	return $empRecord->row();
		 	
	  	}
	  	
	  	function getDescColumn($tableName){
		  	if($tableName == "mst_countries") return "cty_desc";
			else if($tableName == "mst_nationality") return "nat_desc";
			else if($tableName == "mst_race") return "race_desc";
			else if($tableName == "mst_worktrade") return "trade_desc";
			else if($tableName == "mst_ctr_grade") return "grade_desc";
			else if($tableName == "mst_ctr_category") return "category_desc";
			else if($tableName == "mst_ctr_spec") return "spec_desc";
			else if($tableName == "wo_agency") return "agency_name";
			else if($tableName == "mst_wkr_availability") return "avlab_desc";
			else return "";
	  	}
	  	
	  	function getCodeColumn($tableName){
		 	if($tableName == "mst_countries") return "cty_id";
			else if($tableName == "mst_nationality") return "nat_id";
			else if($tableName == "mst_race") return "race_id";
			else if($tableName == "mst_worktrade") return "trade_id";
			else if($tableName == "mst_ctr_grade") return "grade_id";
			else if($tableName == "mst_ctr_category") return "category_id";
			else if($tableName == "mst_ctr_spec") return "spec_id";
			else if($tableName == "wo_agency") return "agency_id";
			else if($tableName == "mst_wkr_availability") return "avlab_id";
			else return "";
	  	}
	  	
	  	function getMasterTblData($tableName){
		  	if($tableName == "mst_countries"){
			  	$sqlQuery = "SELECT cty_id AS codevalue, cty_desc AS descvalue 
							 FROM mst_countries";
		  	}
			else if($tableName == "mst_nationality"){
			  	$sqlQuery = "SELECT nat_id AS codevalue, nat_desc AS descvalue
							 FROM mst_nationality";
		  	}
			else if($tableName == "mst_race"){
			  	$sqlQuery = "SELECT race_id AS codevalue, race_desc AS descvalue
							 FROM mst_race";
		  	}
			else if($tableName == "mst_worktrade"){
			  	$sqlQuery = "SELECT trade_id AS codevalue, trade_desc AS descvalue
							 FROM mst_worktrade";
		  	}
			else if($tableName == "mst_ctr_grade"){
			  	$sqlQuery = "SELECT grade_id AS codevalue, grade_desc AS descvalue
							 FROM mst_ctr_grade";
		  	}
			else if($tableName == "mst_ctr_category"){
			  	$sqlQuery = "SELECT category_id AS codevalue, category_desc AS descvalue
							 FROM mst_ctr_category";
		  	}
			else if($tableName == "mst_ctr_spec"){
			  	$sqlQuery = "SELECT spec_id AS codevalue, spec_desc AS descvalue
							 FROM mst_ctr_spec";
		  	}
			else if($tableName == "wo_agency"){
			  	$sqlQuery = "SELECT agency_id AS codevalue, agency_name AS descvalue
							 FROM wo_agency";
		  	}
			else if($tableName == "mst_wkr_availability"){
			  	$sqlQuery = "SELECT avlab_id AS codevalue, avlab_desc AS descvalue
							 FROM mst_wkr_availability";
		  	}
			else{
			  	$sqlQuery = "";
		  	}
		  	$sqlQuery .= " ORDER BY codevalue ASC";
		  	
		  	return $this->db->query($sqlQuery);
	  	}
	  	
	  	function addMasterValue($tableName, $codeValue, $descValue){
		 	if($tableName == "mst_countries"){
			  	$sqlQuery = "INSERT INTO mst_countries (cty_id, cty_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_nationality"){
			  	$sqlQuery = "INSERT INTO mst_nationality (nat_id, nat_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_race"){
			  	$sqlQuery = "INSERT INTO mst_race (race_id, race_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_worktrade"){
			  	$sqlQuery = "INSERT INTO mst_worktrade (trade_id, trade_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_ctr_grade"){
			  	$sqlQuery = "INSERT INTO mst_ctr_grade (grade_id, grade_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_ctr_category"){
			  	$sqlQuery = "INSERT INTO mst_ctr_category (category_id, category_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_ctr_spec"){
			  	$sqlQuery = "INSERT INTO mst_ctr_spec (spec_id, spec_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "wo_agency"){
			  	$sqlQuery = "INSERT INTO wo_agency (agency_id, agency_name) VALUES('$codeValue', '$descValue')";
		  	}
			else if($tableName == "mst_wkr_availability"){
			  	$sqlQuery = "INSERT INTO mst_wkr_availability (avlab_id, avlab_desc) VALUES('$codeValue', '$descValue')";
		  	}
			else{
			  	$sqlQuery = "";
		  	}
		  	
		  	$this->db->query($sqlQuery); 	//put try catch here, Error Number: 1062 Duplicate entry 'xxx' for key 1
		  	return 1;
	  	}
	  	
	  	function getDescValue($tableName, $codevalue){
		  	$codecolumn = $this->getCodeColumn($tableName);
		  	$desccolumn = $this->getDescColumn($tableName);
		  	
		 	$sqlQuery = "SELECT $desccolumn AS descvalue FROM $tableName WHERE $codecolumn = '$codevalue'";
		 	$resultRecord = $this->db->query($sqlQuery); 	
		 	$resultRow = $resultRecord->row();
		 	
		 	return $resultRow->descvalue;
	  	}
	  	
	  	function updateMasterValue($tableName, $codeValue, $descValue){
		 	$codecolumn = $this->getCodeColumn($tableName);
		  	$desccolumn = $this->getDescColumn($tableName);
		  	
		  	$updateQuery = "UPDATE $tableName SET $desccolumn = '$descValue' WHERE $codecolumn = '$codeValue'";
		  	
		  	$this->db->query($updateQuery);
		  	return 1;
	  	}
	  	
	  	function getUserByDptID($dpt_id, $returnType){
		 	$sqlQuery = "SELECT * FROM employees 
		 				 WHERE emp_dpt_id = $dpt_id
		 				 ORDER BY emp_num ASC";
		 	$empRecord = $this->db->query($sqlQuery);
		 	
		 	if($returnType == 'total'){
			 	return $empRecord->num_rows();
		 	}
		 	else{ //'list'
			 	return 	$empRecord;
		 	}
	  	}
	}
?>