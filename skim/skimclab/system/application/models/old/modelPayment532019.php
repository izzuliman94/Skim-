<?php

   class ModelPayment extends model {
		function ModelPayment(){
			parent::Model();
			$this->load->database();
		}
		
		
		function getRegion(){
		   $sql = "select * from mst_regional";
		   return $this->db->query($sql);
		}
		
		
		function getpaymenttype($type){
		
		   $sql = "select * from pmt_type where pmt_type_id='$type'";
		   
		   //echo $sql;
		   return $this->db->query($sql);
		}
		
		function getsumpayment($type,$datefrom,$dateto){
		   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 
		   
		   $sql = "select pmt_receipt_new.*,pmt_advise.pmt_no,pmt_type.pmt_type_desc,
		           sum(clab_amount + jim_amount + fomema_amount + ins_amount + agency_amount + others_amount + local_amount) as TotalPaymentCollected
				   from pmt_receipt_new 
                   inner join pmt_advise on pmt_advise.pmt_no = pmt_receipt_new.clab_pa_no
                   inner join pmt_fcl on pmt_fcl.pmt_no = pmt_advise.pmt_no
				   inner join pmt_type on pmt_type.pmt_type_id = pmt_receipt_new.payment_type
                   where pmt_advise.pmt_type = '$type' and pmt_datecreated between '$dtf' and '$dtt' and pmt_withdraw ='0'
                   group by pmt_receipt_no";
		   
		   return $this->db->query($sql);
		   
		}
		
		function getsummarypayment($datefrom,$dateto,$region,$type,$cancel,$cont){
				
				   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 

		   $sqlQuery = "select pmt_receipt_new.*,pmt_type.pmt_type_desc,		           
				   sum(clab_amount + amt_clabren + amt_contreg + amt_contren + amt_rehire + local_amount + amt_greencard +  amt_clabfee + jim_amount + fomema_amount + ins_amount + agency_amount + others_amount) as TotalPaymentCollected 
				   from pmt_receipt_new 
                   inner join pmt_type on pmt_type.pmt_type_id = pmt_receipt_new.payment_type 				   
				   where pmt_datecreated between '$dtf' and '$dtt' and pmt_withdraw ='$cancel' ";
				   
			if($region !== '0'){
				$sqlQuery .= " AND regional_id = '$region'";
			}
			
			if($type !== '0'){
				$sqlQuery .= " AND payment_type = '$type'";
			}
			
			if($cont !== '0'){
				$sqlQuery .= " AND clab_no = '$cont'";
			}
			
			$sqlQuery .= " GROUP BY pmt_receipt_new.pmt_receipt_no";
			
			//echo $sqlQuery;
						
			return 	$this->db->query($sqlQuery);  		   
		   
		}
		
		function getsumpaymentall($datefrom,$dateto){
		   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 
		  
		   $sql = "select pmt_receipt_new.*,pmt_type.pmt_type_desc,
		           sum(clab_amount + jim_amount + fomema_amount + ins_amount + agency_amount + others_amount + local_amount) as TotalPaymentCollected
				   from pmt_receipt_new 
				   left join pmt_type on pmt_type.pmt_type_id = pmt_receipt_new.payment_type
                   where pmt_datecreated between '$dtf' and '$dtt' and pmt_withdraw ='0'
                   group by pmt_receipt_no";
		   return $this->db->query($sql);
		   
		}
		
		function getsumpaymentcancel($datefrom,$dateto){
		   		   
		   $dtf = date("Y-m-d",strtotime($datefrom)); 
		   $dtt = date("Y-m-d",strtotime($dateto)); 
		  
		   $sql = "select pmt_receipt_new.*,pmt_type.pmt_type_desc,
		           sum(clab_amount + jim_amount + fomema_amount + ins_amount + agency_amount + others_amount) as TotalPaymentCollected
				   from pmt_receipt_new 
				   left join pmt_type on pmt_type.pmt_type_id = pmt_receipt_new.payment_type
                   where pmt_datecreated between '$dtf' and '$dtt' and pmt_withdraw ='1'
                   group by pmt_receipt_no";
		   return $this->db->query($sql);
		   
		}
		
		
		function getAllPayment($pmtno){
		    
			$sql = "select * from  pmt_receipt_new where pmt_receipt_no = '$pmtno'";
			return $this->db->query($sql);
			
		}
		
		function getAllPaymentByID($pmtno){
           $sql = "select  pmt_receipt_new.*,pmt_type.pmt_type_desc from  pmt_receipt_new 
		           left join pmt_type on pmt_type.pmt_type_id =  pmt_receipt_new.payment_type
				   where pmt_receipt_no ='$pmtno'";
		   $pmRecord = $this->db->query($sql);
		   return $pmRecord->row();
		}
		
		function getAllInvTaxByID($pmtno){
           $sql = "select pmt_tax_inv.*,pmt_inv_type.inv_type_desc from pmt_tax_inv 
		           left join pmt_inv_type on pmt_inv_type.inv_type_id = pmt_tax_inv.payment_type
				   where pmt_taxinv_no ='$pmtno'";
		   $pmRecord = $this->db->query($sql);
		   return $pmRecord->row();
		}
		
		
		function getAllWOlist($searchdata,$pmttype){
		   
		    if(isset($searchdata) == ""){
			$strpassno = "";
			}else{
			$strpassno = $searchdata;
			}
		    
		    $sqlquery = "SELECT workorders.*,mst_countries.cty_visa,mst_countries.cty_fine 
			             from workorders 
			             left join mst_countries on mst_countries.cty_id = workorders.wo_fcl_country
						 where wo_num like '%$strpassno%' and wo_spim_status = '$pmttype' order by workorders.wo_num desc";
						
			return $this->db->query($sqlquery);
		}
		
		function getAllContractor($searchdata){
		   
		    if(isset($searchdata) == ""){
			$strpassno = "";
			}else{
			$strpassno = $searchdata;
			}
		    
		    $sqlquery = "SELECT ctr_comp_name,ctr_comp_regno,ctr_clab_no,ctr_addr1,ctr_addr2,ctr_addr3,
			             ctr_pcode,mst_states.state_name,ctr_telno,ctr_fax
			             FROM contractors 
						 left join mst_states on mst_states.state_id = contractors.ctr_state
			             where ctr_comp_name like '%$strpassno%' order by ctr_comp_name";
			return $this->db->query($sqlquery);
		}
		
		function getNextPaymentNo(){
			$sqlQuery = "SELECT MAX(pmt_id) as maxid FROM pmt_advise";	
			$woRecord = $this->db->query($sqlQuery);
			$woRow = $woRecord->row();
			
			return $woRow->maxid + 1;
		}
		
		function getNextPaymentReceiptNo(){
			$sqlQuery = "SELECT MAX(pmt_receipt_id) as maxid FROM pmt_receipt_new";	
			$woRecord = $this->db->query($sqlQuery);
			$woRow = $woRecord->row();
			
			return $woRow->maxid + 1;
		}
		
		function getNextTaxInvoiceNo(){
			$sqlQuery = "SELECT MAX(pmt_taxinv_id) as maxsid FROM pmt_tax_inv";	
			$woRecord = $this->db->query($sqlQuery);
			$woRow = $woRecord->row();
			
			return $woRow->maxsid + 1;
		}
		
		function getPaymentByID($pmno){
		   
		   $pmquery = "select *
		               from pmt_advise 
					   where pmt_no = '$pmno'";
		   $pmRecord = $this->db->query($pmquery);
		   return $pmRecord->row();
		
		}
		
		function getAllCountry(){
		   
		    $sqlquery = "SELECT * FROM mst_countries order by cty_desc";
			return $this->db->query($sqlquery);
		}
		
		function getPAlist($type){
		   
		    $sqlquery = "SELECT * FROM pmt_advise where pmt_type = '$type' order by pmt_no";
			return $this->db->query($sqlquery);
		}
		
		function getAllFCLpaymentbyPMNO($pmno){
		   
		    $sqlquery = "SELECT * FROM pmt_fcl where pmt_no = '$pmno' ";
			return $this->db->query($sqlquery);
		}
		
		function getAlllocalpaymentbyPMNO($pmno){
		   
		    $sqlquery = "SELECT * FROM pmt_local where pmt_no = '$pmno' ";
			return $this->db->query($sqlquery);
		}
		
		function getAllFCLdatabyid($id){
		   
		    $sqlquery = "SELECT * FROM pmt_fcl where id = '$id' ";
			$FCLrecord = $this->db->query($sqlquery);
			return $FCLrecord->row();	
			
		}
		
		
		function getAlllocaldatabyid($id){
		   
		    $sqlquery = "SELECT * FROM pmt_local where id = '$id' ";
			$FCLrecord = $this->db->query($sqlquery);
			return $FCLrecord->row();	
			
		}
		
		function getAllPrint($pmno){
		
		   $sqlquery = "select * from pmt_advise where pmt_no = '$pmno'";
		   $payDetails = $this->db->query($sqlquery);
		   return $payDetails->row();
		   
		}
		
		function getAllPrintLocal($pmno){
		
		   $sqlquery = "select * from pmt_local where pmt_no = '$pmno'";
		   //$sqlquery = "select pmt_fcl.*,mst_countries.* 
		  //              from pmt_fcl 
		   //             left join mst_countries on  mst_countries.cty_id = pmt_fcl.pmt_cty_id
           //             where pmt_no  = '$pmno'";
		   return $this->db->query($sqlquery);
		   
		}
		
		function getAllPrintFCL($pmno){
		
		   //$sqlquery = "select * from pmt_fcl where pmt_no = '$pmno'";
		   $sqlquery = "select pmt_fcl.*,mst_countries.* 
		                from pmt_fcl 
		                left join mst_countries on  mst_countries.cty_id = pmt_fcl.pmt_cty_id
                        where pmt_no  = '$pmno'";
		   return $this->db->query($sqlquery);
		   
		}
	
	}	

?>