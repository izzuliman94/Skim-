<?php
	class contIDcard extends Controller {
		function contIDcard(){
			parent::Controller();
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->Model('ModelIDCard');
		}
		
		function newid(){
		    $this->load->view('idcard/mainid');
		}
		
		function labour_list(){
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
		   	$data['labour'] = $this->ModelIDCard->getAllLabor($searchdata);
		    $this->load->view('idcard/labour_list', $data);
		   
		}
		
		function print_card(){
		   
		   $passno =  $this->uri->segment(3);
		   $id =  $this->uri->segment(4);
		   $photoInfo = $this->ModelIDCard->getUploadedPhotoInfo($id);
		   $data['labour'] = $this->ModelIDCard->getAllLaborByID($passno);
		   $this->load->view('idcard/printcard', $data);
		   
		   
		}
	}
?>		