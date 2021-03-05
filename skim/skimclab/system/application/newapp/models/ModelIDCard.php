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
		    
		    $sqlquery = "SELECT wkr_passno,wkr_name,mst_countries.cty_desc,wkr_passexp,wkr_id 
			            FROM workers 
						left join mst_countries on mst_countries.cty_id = workers.wkr_country
						where wkr_passno like '%$strpassno%' and wkr_transtatus = '1' order by wkr_name";
			return $this->db->query($sqlquery);
		}
		
		function getAllLaborByID($passno){
		   
		    $sqlquery = "SELECT wkr_passno,wkr_name,mst_countries.cty_desc,wkr_passexp,wkr_id 
			            FROM workers 
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