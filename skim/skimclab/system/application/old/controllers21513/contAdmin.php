<?php
	class contAdmin extends Controller {
		function contAdmin(){
			parent::Controller();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->Model('ModelAdmin');
		}

		function index(){
		}
		
		function dashbrd(){
			$data['totalOPR'] = $this->ModelAdmin->getUserByDptID(1, 'total');
			$data['totalFIN'] = $this->ModelAdmin->getUserByDptID(2, 'total');
			$data['totalHR'] = $this->ModelAdmin->getUserByDptID(3, 'total');
			$data['totalADMIN'] = $this->ModelAdmin->getUserByDptID(4, 'total');
			$data['totalIT'] = $this->ModelAdmin->getUserByDptID(5, 'total');
			$this->load->view('admin/admin_dashbrd', $data);
		}
		
		function viewEmpListByDpt(){
			$dpt_id = $this->uri->segment(3);
			$data['dpt_name'] = $this->ModelAdmin->getDptNameByDptID($dpt_id);
			$data['userData'] = $this->ModelAdmin->getUserByDptID($dpt_id, 'list');
			
			$this->load->view('admin/admin_dashbrd_list', $data);	
		}

		function newUser(){
			$data['allDepartments'] = $this->ModelAdmin->getAllDepartments();
			$this->load->view('admin/admin_adduser.php', $data);
		}
		
		function newUserSubmit(){
			$emp_num = $_POST['employeeno'];
			$emp_name = $_POST['name'];
			$emp_position = $_POST['designation'];
			$emp_dpt_id = $_POST['department'];
			$emp_extension = $_POST['extension'];
			$emp_workphone = $_POST['workphone'];
			$emp_handphone = $_POST['handphone'];
			$emp_email = $_POST['email'];
			$emp_fax = $_POST['fax'];
			$emp_housephone = $_POST['housephone'];
			$emp_office_location = $_POST['location'];
			$emp_username = $_POST['login'];
			$emp_password = $_POST['password'];
			$emp_accessibility = $_POST['accStr'];
			
			$currentuserid = $this->session->userdata('emp_id');
			
			$sqlQuery = "INSERT INTO employees (emp_id, emp_num, emp_name, emp_position, emp_dpt_id, emp_extension, 
						 emp_workphone, emp_handphone, emp_email, emp_fax, emp_housephone, emp_office_location, 
						 emp_username, emp_password,emp_accessibility, emp_createdby, emp_createddate, emp_status) VALUES
						 (NULL, '$emp_num', '$emp_name', '$emp_position', $emp_dpt_id, '$emp_extension', 
						 '$emp_workphone', '$emp_handphone', '$emp_email', '$emp_fax', '$emp_housephone', '$emp_office_location', 
						 '$emp_username', '$emp_password', '$emp_accessibility', $currentuserid, NOW(), 1);";
			$this->db->query($sqlQuery);
			
			redirect('contAdmin/listUsers/add');
		}
		
		function listUsers(){
			$successMsg = $this->uri->segment(3);
			if($successMsg == 'add') $data['successMsg'] = "New user has been successfully added!";
			else if($successMsg == 'update') $data['successMsg'] = "User data has been updated!";
			else $data['successMsg'] = "";
			// load pagination class
		    $this->load->library('pagination');
		    $config['base_url'] = base_url().'index.php/contAdmin/listUsers/';
		    $config['total_rows'] = $this->db->count_all('employees');
		    $config['per_page'] = '15';
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>';
		
		    $this->pagination->initialize($config);
				
		    //load the model and get results
		    $data['employees'] = $this->ModelAdmin->getEmployees($config['per_page'], $this->uri->segment(3));
		    
		    //unset session data that might result from previous searchEmployees
		    $this->session->unset_userdata('searchby');
		    $this->session->unset_userdata('keyword');
		    	
		    // load the view
		    $this->load->view('admin/admin_listusers', $data);
		}
		
		function searchUsers(){
			$searchby = $_POST['searchby'];
			$keyword = $_POST['keyword']; 	
			
			$this->session->set_userdata('searchby', $searchby);
			$this->session->set_userdata('keyword', $keyword);
			
			$this->showSearchResults();
		}
		
		function showSearchResults(){
			$searchby = $this->session->userdata('searchby');
			$keyword = $this->session->userdata('keyword');
		 	
			// load pagination class
		    $this->load->library('pagination');
		    $config['base_url'] = base_url().'index.php/contAdmin/showSearchResults/';
		    //$config['total_rows'] = $this->db->count_all('employees');
		    $config['total_rows'] = $this->ModelAdmin->searchEmpTotalRows($searchby, $keyword);
		    $config['per_page'] = '10';
		    $config['full_tag_open'] = '<p>';
		    $config['full_tag_close'] = '</p>';
		
		    $this->pagination->initialize($config);
				
		    //load the model and get results
		    $data['employees'] = $this->ModelAdmin->searchEmployees($searchby, $keyword, $config['per_page'], $this->uri->segment(3));
		   	
		    // load the view
		    $this->load->view('admin/admin_listusers', $data);
		}
		
		function loadMasters(){
			$tableName = $this->uri->segment(3);
			$data['tableName'] = $tableName;
			
			$data['tableTitle'] = $this->getTableTitle($tableName);
			$data['tableValue'] = $this->getTableValueName($tableName);
			$data['tableData'] = $this->ModelAdmin->getMasterTblData($tableName);
			
			$this->load->view('admin/admin_masters.php', $data);
		}
		
		function getTableTitle($tableName){
			//get the listing title
			if($tableName == "mst_countries") $tableTitle="Countries List";
			else if($tableName == "mst_nationality") $tableTitle="Nationalities List";
			else if($tableName == "mst_race") $tableTitle="Race/Ethinc List";
			else if($tableName == "mst_worktrade") $tableTitle="Work Trade List";
			else if($tableName == "mst_ctr_grade") $tableTitle="Contractors Grade List";
			else if($tableName == "mst_ctr_category") $tableTitle="Contractors Category List";
			else if($tableName == "mst_ctr_spec") $tableTitle="Contractors Specialization List";
			else if($tableName == "wo_agency") $tableTitle="Agents List";
			else if($tableName == "mst_wkr_availability") $tableTitle="Workers Movement Status List";
			else $tableTitle="";
			
			return $tableTitle;
		}
		
		function getTableValueName($tableName){
			//get the listing title
			if($tableName == "mst_countries") $tableValue="Country";
			else if($tableName == "mst_nationality") $tableValue="Nationality";
			else if($tableName == "mst_race") $tableValue="Race/Ethinc";
			else if($tableName == "mst_worktrade") $tableValue="Work Trade";
			else if($tableName == "mst_ctr_grade") $tableValue="Contractor Grade";
			else if($tableName == "mst_ctr_category") $tableValue="Contractors Category";
			else if($tableName == "mst_ctr_spec") $tableValue="Contractors Specialization";
			else if($tableName == "wo_agency") $tableValue="Agent";
			else if($tableName == "mst_wkr_availability") $tableValue="Workers Movement Status";
			else $tableValue="";
			
			return $tableValue;
		}
		
		function newMasterValueSubmit(){
			$tableName = $_POST['txtTableName'];
			$codeValue = strtoupper(trim($_POST['txtCode']));
			$descValue = strtoupper(trim($_POST['txtDesc']));
			
			$success = $this->ModelAdmin->addMasterValue($tableName, $codeValue, $descValue);
			
			redirect('contAdmin/loadMasters/' . $tableName);
		}
		
		function editMasterValue(){
			$tableName = $this->uri->segment(3);
			$codevalue = $this->uri->segment(4);
			
			$data['tableName'] = $tableName;
			$data['tableTitle'] = $this->getTableTitle($tableName);
			$data['tableValue'] = $this->getTableValueName($tableName);
			$data['tableData'] = $this->ModelAdmin->getMasterTblData($tableName);
			$data['codevalue'] = $codevalue;
			$data['descvalue'] = $this->ModelAdmin->getDescValue($tableName, $codevalue);
			
			$this->load->view('admin/admin_masters_edit', $data);	
		}
		
		function editMasterValueSubmit(){
			$tableName = $_POST['txtTableName'];
			$codeValue = strtoupper(trim($_POST['txtCode']));
			$descValue = strtoupper(trim($_POST['txtDesc']));
			
			$success = $this->ModelAdmin->updateMasterValue($tableName, $codeValue, $descValue);
			redirect('contAdmin/loadMasters/' . $tableName);
		}
		
		function countriesIframe(){
			$this->load->view('admin/lists/countries.php');
		}
		
		function editUser(){
			$emp_id = $this->uri->segment(3);
			$data['emp'] = $this->ModelAdmin->getEmpByEmpID($emp_id);
			
			$data['allDepartments'] = $this->ModelAdmin->getAllDepartments();
			
			$this->load->view('admin/admin_edituser', $data);	
		}
		
		function editUserSubmit(){
			$emp_id = $_POST['empid'];
			$emp_name = $_POST['name'];
			$emp_position = $_POST['designation'];
			$emp_dpt_id = $_POST['department'];
			$emp_extension = $_POST['extension'];
			$emp_workphone = $_POST['workphone'];
			$emp_handphone = $_POST['handphone'];
			$emp_email = $_POST['email'];
			$emp_fax = $_POST['fax'];
			$emp_housephone = $_POST['housephone'];
			$emp_office_location = $_POST['location'];
			$emp_password = $_POST['password'];
			$emp_accessibility = $_POST['accStr'];
			
			$currentuserid = $this->session->userdata('emp_id');
			
			$sqlQuery = "UPDATE employees SET emp_name = '$emp_name', emp_position = '$emp_position', emp_dpt_id = $emp_dpt_id, 
						 emp_extension = '$emp_extension', emp_workphone = '$emp_workphone', emp_handphone = '$emp_handphone', 
						 emp_email = '$emp_email', emp_fax = '$emp_fax', emp_housephone = '$emp_housephone', emp_office_location = '$emp_office_location', 
						 emp_password = '$emp_password', emp_accessibility = '$emp_accessibility', emp_modifiedby = '$currentuserid', emp_modifieddate = NOW()
						 WHERE emp_id = $emp_id";
			$this->db->query($sqlQuery);
			
			redirect('contAdmin/listUsers/update');
		}
	}
?>
