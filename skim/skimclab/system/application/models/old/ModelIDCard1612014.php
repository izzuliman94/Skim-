<?php
	class ModelIDCard extends Model{
		function ModelIDCard(){
			parent::Model();
			$this->load->database();	
		}
		
		function getAllLabor($searchdata){
		   
		    if(isset($searchdata) == ""){
			$strpassno = "";
			}else{
			$strpassno = $searchdata;
			}
		    
		    $sqlquery = "SELECT wkr_passno,wkr_name,mst_countries.cty_desc,wkr_passexp,wkr_id,wkr_permitexp,wkr_uploaddoc.upload_destfilename,contractors.ctr_comp_name
			            FROM workers 
						left join contractors on contractors.ctr_clab_no = workers.wkr_currentemp
						left join mst_countries on mst_countries.cty_id = workers.wkr_country
						left join wkr_uploaddoc on wkr_uploaddoc.upload_wkrid = workers.wkr_id
						where wkr_passno like '%$strpassno%' and upload_filetype='Photo' and wkr_status='1' order by wkr_name";
			return $this->db->query($sqlquery);
		}
		
		function getIDList($datefrom,$dateto){
		   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 
		  
		   $sql = "SELECT wkr_id,wkr_passno,wkr_name,mst_countries.cty_desc,wkr_passexp,wkr_permitexp,wkr_uploaddoc.upload_destfilename,contractors.ctr_comp_name
			            FROM workers 
						left join contractors on contractors.ctr_clab_no = workers.wkr_currentemp
						left join mst_countries on mst_countries.cty_id = workers.wkr_country
						left join wkr_uploaddoc on wkr_uploaddoc.upload_wkrid = workers.wkr_id
                   where wkr_entrydate between '$dtf' and '$dtt' and upload_filetype='Photo'";
		   return $this->db->query($sql);
		   
		}
		
		function getIDList2($datefrom,$dateto){
		   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 
		  
		   $sql = "SELECT fcl_passno,fcl_name,fcl_wkrid,fcl_photo,fcl_permitexp,fcl_country,fcl_comp,fcl_dateout,fcl_time
						 FROM card_fcl 
                   where fcl_dateout between '$dtf' and '$dtt'";
		   return $this->db->query($sql);
		   
		}
		
		
		function getAllLaborByID($passno){
		   
		    $sqlquery = "SELECT wkr_id,wkr_passno,wkr_name,mst_countries.cty_desc,wkr_passexp,wkr_id,wkr_permitexp,contractors.ctr_comp_name
			            FROM workers 
						left join contractors on contractors.ctr_clab_no = workers.wkr_currentemp
						left join mst_countries on mst_countries.cty_id = workers.wkr_country
						where wkr_passno = '$passno'";
					
			$laborRecord = $this->db->query($sqlquery);
			return $laborRecord->row();
		}
		
		    function getUploadedPhotoInfo($wkr_id){
		
			$sqlQuery = "SELECT * FROM wkr_uploaddoc
						WHERE upload_filetype = 'Photo'
						AND upload_wkrid = $wkr_id";	
			
			return $this->db->query($sqlQuery);
		}
	}	
?>		