<?php
	class ContRequest extends Controller{
		function ContRequest(){
			parent::Controller();
			$this->load->Model('ModelRequest');
			$this->load->Model('ModelAvailable');
			
		}	
		
		function requestDashbrd(){
			$this->load->view('request/requestDashboard');
		}
		
		function newRequestForm(){
			$data['allContractors'] = $this->ModelAvailable->getAllContractors();
			$this->load->view('request/requestForm', $data);	
		}
		
		function requestFormWithCompDetails(){
			$clabno = $this->uri->segment(3);
			$ctrData = $this->ModelAvailable->getCtrByClabNo($clabno);
			$data['allContractors'] = $this->ModelAvailable->getAllContractors();
			
			if($ctrData->ctr_status == '3'){
				$data['suspendedMsg'] = "<br><br><div align=\"center\"><font color=\"#990000\" style=\"font-size:1.8em\">The company selected is suspended at the moment.</div></font>";
			}
			else{
				$data['ctrData'] = $ctrData;
			}
			
			$this->load->view('request/requestForm', $data);
		}
		
		
		
		function requestFormSubmit(){
			
		}
	}
?>