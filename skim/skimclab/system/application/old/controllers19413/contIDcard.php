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
		   if($photoInfo->num_rows() > 0){
			  $photoRow = $photoInfo->row();
		  $data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
		  $data['photoInfo'] = "";
				}
		   $data['labour'] = $this->ModelIDCard->getAllLaborByID($passno);
		   $this->load->view('idcard/printcard', $data);
		}
		
		function thumbprint(){
		   
		   $passno =  $this->uri->segment(3);
		   
		   $id =  $this->uri->segment(4);
		   $photoInfo = $this->ModelIDCard->getUploadedPhotoInfo($id);
		   if($photoInfo->num_rows() > 0){
			  $photoRow = $photoInfo->row();
		  $data['photoInfo'] = "<img src=\"" . base_url() . $photoRow->upload_filepath  ."\" width=\"126\" height=\"144\" />";
				}
				else{
		  $data['photoInfo'] = "";
				}
		   $data['labour'] = $this->ModelIDCard->getAllLaborByID($passno);
		   $this->load->view('idcard/thumbprint', $data);
		}
	}
?>		