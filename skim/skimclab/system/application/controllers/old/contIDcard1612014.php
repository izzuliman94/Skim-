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
		
		function CardIDList1(){
		    $this->load->view('idcard/IDCardList1');
		}
		
			function CardIDList2(){
		    $this->load->view('idcard/IDCardList2');
		}
		
		
		function idlistview(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelIDCard->getIDList($datefrom,$dateto);
		     $this->load->view('idcard/ExcelCardIDView',$data);
		}
		
		function idlistexcel(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelIDCard->getIDList($datefrom,$dateto);
		     $this->load->view('idcard/ExcelCardIDExcel',$data);
		}
		
		function idlistview2(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelIDCard->getIDList2($datefrom,$dateto);
		     $this->load->view('idcard/ExcelCardIDView2',$data);
		}
		
		function idlistexcel2(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelIDCard->getIDList2($datefrom,$dateto);
		     $this->load->view('idcard/ExcelCardIDExcel2',$data);
		}
		
		function newthumb(){
		    $this->load->view('idcard/mainthumb');
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
		
		function AddNewFCL(){
		
			
		$passno = $_POST["txtpass"];
		$name = $_POST["txtname"]; 
		$photo = $_POST["selphoto"]; 
		$country = $_POST['txtwrg'];
		$passexp = date('Y-m-d', strtotime($_POST["txtdateexp"]));
		$dateout = date('Y-m-d');
		
		$now = new DateTime(null, new DateTimeZone('Asia/Kuala_Lumpur'));
		//echo $now->format('H:i:s');	
		$timeout = $now->format('H:i:s');	
		$wkrid = $_POST["wkrid"]; 
		$comp = $_POST["txtcomp"]; 
		$permitxpdate=date('Y-m-d', strtotime($_POST["txtpermit"]));
		
		//$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$sql = "insert into card_fcl
		        (fcl_dateout,fcl_time,fcl_wkrid,fcl_passno,fcl_name,fcl_country,fcl_permitexp,fcl_photo,fcl_comp)
                values
                ('$dateout','$timeout','$wkrid','$passno','$name','$country','$permitxpdate','$photo','$comp')"; 
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
        $this->load->view('idcard/mainid', $data);	
		
		}
		function AddNewFCL1(){
		
			
		$passno = $_POST["txtpass"];
		$name = $_POST["txtname"]; 
		$photo = $_POST["selphoto"]; 
		$country = $_POST['txtwrg'];
		$passexp = date('Y-m-d', strtotime($_POST["txtdateexp"]));
		$dateout = date('Y-m-d');
		$wkrid = $_POST["wkrid"]; 
		$comp = $_POST["txtcomp"]; 
		$permitxpdate=date('Y-m-d', strtotime($_POST["txtpermit"]));
		
		//$data['allCountries'] = $this->ModelLabour->getAllCountries();
		$sql = "insert into card_fcl
		        (fcl_dateout,fcl_wkrid,fcl_passno,fcl_name,fcl_country,fcl_permitexp,fcl_photo,fcl_comp)
                values
                (NOW(),'$wkrid','$passno','$name','$country','$permitxpdate','$photo','$comp')"; 
        $this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
        $this->load->view('idcard/mainid', $data);	
		
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
		
		function printcard(){
			$clabno = $this->uri->segment(3);
			$data['ctr'] = $this->ModelContractor->getCtrByClabNo($clabno);
			
			$this->load->view('idcard/ctr_print_card_wkr', $data);
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