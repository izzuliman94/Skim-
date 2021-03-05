<?php
	class contPayment extends Controller {
		function contPayment(){
			parent::Controller();
			$this->load->library('session');
			$this->load->library('rapyd');	
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->Model('ModelPayment');
			$this->load->Model('ModelLabour');
		}
		
		
		function xlssumvdrlist(){
		   $this->load->view('payment/paymentsumvdrlist');
		}
		
		function xlssumextlist(){
		    $this->load->view('payment/paymentsumextlist');
		}
		
		function xlssumalllist(){
		    $this->load->view('payment/paymentsumalllist');
		}
		
		function xlssumcancellist(){
		    $this->load->view('payment/paymentsumcancellist');
		}
	
		function summarylist(){
			$data['allRegion'] = $this->ModelPayment->getRegion();
			$data['allContractors'] = $this->ModelLabour->getAllContractors();
			$this->load->view('payment/paymentsummary',$data);
		}
		
		function xlssumvdr(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $type = 'V';
		     $data['summary'] = $this->ModelPayment->getsumpayment($type,$datefrom,$dateto);
		     $this->load->view('payment/excelsumvdr',$data);
		}
		
		function xlssumext(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $type = 'R';
		     $data['summary'] = $this->ModelPayment->getsumpayment($type,$datefrom,$dateto);
		     $this->load->view('payment/excelsumext',$data);
		}
		
				
		function xlssumallview(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelPayment->getsumpaymentall($datefrom,$dateto);
		     $this->load->view('payment/excelsumall_view',$data);
		}
		
		function xlssumcancelview(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelPayment->getsumpaymentcancel($datefrom,$dateto);
		     $this->load->view('payment/excelsumcancel_view',$data);
		}
		
		function xlssumvdrview(){
		     $datefrom = $this->uri->segment(3);
			 echo $datefrom;
			 $dateto = $this->uri->segment(4);
			 $type = 'V';
		     $data['summary'] = $this->ModelPayment->getsumpayment($type,$datefrom,$dateto);
		     $this->load->view('payment/excelsumvdr_view',$data);
		}
		
		function xlssumextview(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
			 $type = 'R';
		     $data['summary'] = $this->ModelPayment->getsumpayment($type,$datefrom,$dateto);
			 $this->ModelPayment->getsumpayment($type,$datefrom,$dateto);
		     $this->load->view('payment/excelsumext_view',$data);
		}
		
		function summaryview(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
			 $region = $this->uri->segment(5);
			 $type = $this->uri->segment(6);
			 $cancel = $this->uri->segment(7);
			 $cont = $this->uri->segment(8);
			 
			 $data['paymenttype']= $this->ModelPayment->getpaymenttype($type);
			 //$paymenttype= $this->ModelPayment->getpaymenttype($type);
		     $data['summary'] = $this->ModelPayment->getsummarypayment($datefrom,$dateto,$region,$type,$cancel,$cont);
			 
			 //echo $paymenttype;
		     $this->load->view('payment/summary_view',$data);
			 
		}
		
		function summaryexcel(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
			 $region = $this->uri->segment(5);
			 $type = $this->uri->segment(6);
			 $cancel = $this->uri->segment(7);
			  $cont = $this->uri->segment(8);
			 
			 $data['paymenttype']= $this->ModelPayment->getpaymenttype($type);
			 
			 //echo $type;
		     $data['summary'] = $this->ModelPayment->getsummarypayment($datefrom,$dateto,$region,$type,$cancel,$cont);
			 
		     $this->load->view('payment/summary_excel',$data);
		}
		
		function xlssumallexcel(){
		     $datefrom = $this->uri->segment(3);
			 $dateto = $this->uri->segment(4);
		     $data['summary'] = $this->ModelPayment->getsumpaymentall($datefrom,$dateto);
		     $this->load->view('payment/excelsumall_excel',$data);
		}
		
		function printreceipt(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_receipt',$data);			
		}
		
		function printreceipt2(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_receipfull',$data);			
		}
		
		function printinvoice(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_invoice',$data);			
		}
		
		function printinvoice3(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_invoice2',$data);			
		}
		
		
		function printinvoiceOD(){
		   $pmtno = $this->uri->segment(3);
		   $data['invoice'] = $this->ModelPayment->getAllInvTaxByID($pmtno);
		   $this->load->view('payment/print_invoiceOD',$data);			
		}
		
		function searchReceiptList(){
		        if(isset($_POST['rdsearchby'])){
		        
				$searchby = $_POST['rdsearchby'];
				$keyword = trim($_POST['txtkeyword']);
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');	
			}		
			
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();	
			
			$grid = new DataGrid("", "pmt_receipt");
		    $grid->db->join("pmt_type","pmt_receipt.payment_type = pmt_type.pmt_type_id", "LEFT");
		    if($searchby == "pmt_receipt_no" || $searchby == "pmt_receive_from")
		    	$grid->db->where("$searchby LIKE '%$keyword%' ");
		    else
		    	$grid->db->where("$searchby = '$keyword' ");
		    $grid->db->order_by("pmt_datecreated", "desc");
	        
			 $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentReceipt/<#pmt_receipt_no#>","<#pmt_receipt_no#>");
			$link_print = anchor_popup("$baseuri/printreceipt/<#pmt_receipt_no#>","Print");
		 	
			$grid->column("RECEIPT NO.","$link_edit", 'width="80"');
			$grid->column("RECEIVE FROM","pmt_receive_from");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
			$grid->column("DATE ISSUE","pmt_datecreated");
			$grid->column("ACTION","$link_print");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_receipt_list', $data);	
		}
		
		function searchInvoiceList(){
		        if(isset($_POST['rdsearchby'])){
		        
				$searchby = $_POST['rdsearchby'];
				$keyword = trim($_POST['txtkeyword']);
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');	
			}		
			
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();	
			
			$grid = new DataGrid("", "pmt_tax_inv");
		    $grid->db->join("pmt_inv_type","pmt_tax_inv.payment_type = pmt_inv_type.inv_type_id", "LEFT");
		    if($searchby == "pmt_taxinv_no" || $searchby == "pmt_receive_from")
		    	$grid->db->where("$searchby LIKE '%$keyword%' ");
		    else
		    	$grid->db->where("$searchby = '$keyword' ");
		    $grid->db->order_by("pmt_datecreated", "desc");
	        
			 $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentInvTax/<#pmt_taxinv_no#>","<#pmt_taxinv_no#>");
			$link_print = anchor_popup("$baseuri/printinvoiceOD/<#pmt_taxinv_no#>","Print");
		 	
			$grid->column("INVOICE NO.","$link_edit", 'width="80"');
			$grid->column("PREPARED FOR","pmt_receive_from");
			$grid->column("INVOICE TYPE","inv_type_desc");
			$grid->column("DATE ISSUE","pmt_datecreated");
			$grid->column("ACTION","$link_print");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_invoice_list', $data);	
		}
		
		
		
		
		function receiptlist(){
		   /********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_receipt");
			$grid->db->join("pmt_type","pmt_receipt.payment_type = pmt_type.pmt_type_id", "LEFT");
		    $grid->db->order_by("pmt_receipt_no", "desc");
		 		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentReceipt/<#pmt_receipt_no#>","<#pmt_receipt_no#>");
			$link_print = anchor_popup("$baseuri/printreceipt/<#pmt_receipt_no#>","Print");
		 	
			
			$grid->column("RECEIPT NO.","$link_edit", 'width="80"');
			$grid->column("RECEIVE FROM","pmt_receive_from");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
			$grid->column("DATE ISSUE","pmt_datecreated");
			//$grid->column("ISSUED BY","emp_username");
			$grid->column("ACTION","$link_print");
			
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_receipt_list', $data);	
		}
		
		function taxinvlist(){
		   /********Grid for labor list*******/
		    //$currentuser = $this->session->userdata('username');
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_tax_inv");
			$grid->db->join("pmt_inv_type","pmt_tax_inv.payment_type = pmt_inv_type.inv_type_id", "LEFT");
		    $grid->db->order_by("pmt_taxinv_no", "desc");
		 		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentInvTax/<#pmt_taxinv_no#>","<#pmt_taxinv_no#>");
			$link_print = anchor_popup("$baseuri/printinvoiceOD/<#pmt_taxinv_no#>","Print");
		 	
			
			$grid->column("TAX INVOICE NO.","$link_edit", 'width="80"');
			$grid->column("PREPARED FOR","pmt_receive_from");
			$grid->column("INVOICE TYPE","inv_type_desc");
			$grid->column("DATE ISSUE","pmt_datecreated");
			//$grid->column("ISSUED BY","emp_username");
			$grid->column("ACTION","$link_print");
			
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_invoice_list', $data);	
		}
		
		
	    function addpayment(){
		   $this->load->view('payment/newpayment');
		}	
		
		function openvdr(){
		   $this->load->view('payment/vdrpayment_1');
		}
		
		function openext(){
		   $this->load->view('payment/extpayment_1');
		}
		
		function ctr_list(){
		
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
		   	$data['contractor'] = $this->ModelPayment->getAllContractor($searchdata);
			$data['frm'] = $this->uri->segment(3);
		    $this->load->view('payment/contractor_list', $data);
		   
		}
		
		function workorderlist(){
		    if(isset($_POST["txtsearch"]) == ""){
			$searchdata = "";
			}else{
			$searchdata = $_POST["txtsearch"];
			} 
		    $paytype = $this->uri->segment(3);
		    $data['wolist'] = $this->ModelPayment->getAllWOlist($searchdata,$paytype);
		    $this->load->view('payment/workorder_list', $data);
		    
		}
		
		
		function savepaymentrcpt(){
		    
			$regionalid = $_POST["selregion"];
			$pmt_id = $this->ModelPayment->getNextPaymentReceiptNo();
		    
			$pmt_firstpart = "00000" . $pmt_id;
		    $pmtno = "OR".substr($pmt_firstpart, -6)."-".$regionalid;
			$clabno = $_POST["id"];
			//$wono = $_POST["txtwono"];
			//$woid = $_POST["txtwoid"];
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			$clabchqno = $_POST["txtchqclab"];
			$country = $_POST["txtcountry"];
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
			if(isset($_POST["txtadmfees"]) == '1'){ $chkclabfees = '1';} else{ $chkclabfees = '0';}
			if(isset($_POST["txtadmin"]) == '1'){ $chkclabadm = '1';} else{ $chkclabadm = '0';}
			if(isset($_POST["txtadmfeesext"]) == '1'){ $chkclabfeesext = '1';} else{ $chkclabfeesext = '0';}
			$clabregamt = $_POST["selamt"];
			$clabpa = $_POST["txtpaclab"];
			$clabamount = $_POST["txtamtclab"];
			$clabamountonly = $_POST["txtamtclab_only"];
			$clabamounttax = $_POST["txtamtclab_tax"];
			$jimchqno = $_POST["txtchqjim"];
			if(isset($_POST["txtjimplks"]) == '1'){ $chkjimplks = '1';} else{ $chkjimplks = '0';}
			if(isset($_POST["txtjimfees"]) == '1'){ $chkjimfees = '1';} else{ $chkjimfees = '0';}
			if(isset($_POST["txtjimvisa"]) == '1'){ $chkjimvisa = '1';} else{ $chkjimvisa = '0';}
			if(isset($_POST["txtjimlevi"]) == '1'){ $chkjimlevi = '1';} else{ $chkjimlevi  = '0';}
			if(isset($_POST["txtjimsp"]) == '1'){ $chkjimsp = '1';} else{ $chkjimsp = '0';}
			if(isset($_POST["txtjimcp"]) == '1'){ $chkjimcp = '1';} else{ $chkjimcp = '0';}		
			if(isset($_POST["txtjimcompund"]) == '1'){ $chkjimcompound = '1';} else{ $chkjimcompound = '0';}				
			$jimpa = $_POST["txtpajim"];
			$jimamount = $_POST["txtamtjim"];
			$jimamountplks = $_POST["txtamtjim_plks"];
			$jimamountfees = $_POST["txtamtjim_fees"];
			$jimamountlevi = $_POST["txtamtjim_levi"];
			$jimamountvisa = $_POST["txtamtjim_visa"];
			$jimamountsp = $_POST["txtamtjim_sp"];
			$jimamountcp = $_POST["txtamtjim_cp"];
			$jimamountcompound = $_POST["txtamtjim_compound"];
			$fomemachqno = $_POST["txtchqfomema"];
			if(isset($_POST["txtmale"]) == '1'){ $chkfomemamale = '1';} else{ $chkfomemamale  = '0';}
			if(isset($_POST["txtfemale"]) == '1'){ $chkfomemafemale = '1';} else{ $chkfomemafemale = '0';}
			$fomemapa = $_POST["txtpafomema"];
			$fomemaamount = $_POST["txtamtfomema"];
			$inschqno = $_POST["txtchqins"];
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtFWCS"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtFWHS"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			$inspa = $_POST["txtpains"];
			$insamount = $_POST["txtamtins"];
			$insamountig = $_POST["txtamtins_ig"];
			$insamountfwcs = $_POST["txtamtins_fwcs"];
			$insamountfwhs = $_POST["txtamtins_fwhs"];
			$agencychqno = $_POST["txtchqagency"];
			if(isset($_POST["txtagencyfees"]) == '1'){ $chkagencyfees = '1';} else{ $chkagencyfees = '0';}
			if(isset($_POST["txttcost"]) == '1'){ $chktransitcost = '1';} else{ $chktransitcost = '0';}
			$agencypa = $_POST["txtpaagency"];
			$agencyamount = $_POST["txtamtagency"];
			$transfees = $_POST["txttc_fees"];
			$transcost = $_POST["txttc_cost"];
			$otherschqno = $_POST["txtchqothr"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
			if(isset($_POST["txtothersfees2"]) == '1'){ $chkothersfees2 = '1';} else{ $chkothersfees2 = '0';}
			$otherspa = $_POST["txtpaothr"];
			$othersamount = $_POST["txtamtothr"];
			$paymenttype= $_POST["optpmttype"];
			$remarksothers = $_POST["txtothremarks"];
			$visaref = $_POST["txtvisa"];
			$fineref = $_POST["txtfine"];	
			$transcostref = $_POST["txttranscost"];
			$transfeesref = $_POST["txttransfees"];
			
			$sql = "insert into pmt_receipt 
			        (pmt_receipt_no,pmt_datecreated,pmt_receive_from,pmt_addr,pmt_chq_clab,chk_clab_fees,chk_clab_adm,chk_clab_fees_ext,					 
					chk_clab_mship,clab_pa_no,clab_amount,clab_amount_only,clab_amount_tax,pmt_chq_jim,chk_jim_plks,chk_jim_fees,chk_jim_visa,chk_jim_levi,chk_jim_sp,jim_pa_no,
					jim_amount,pmt_chq_fomema,chk_fomema_male,chk_fomema_female,fomema_pa_no,fomema_amount,ins_chq_no,chk_ins_ig,chk_ins_fwcs,chk_ins_fwhs,
					ins_pa,ins_amount,agency_chq_no,chk_agency_fees,agency_pa_no,agency_amount,others_chq_no,chk_others_fees,others_pa,others_amount,payment_type,
					country,clab_reg_amount,chk_jim_cp,chk_jim_compound,no_of_fcl,clab_no,remarks_others,jim_amount_plks,jim_amount_fees,jim_amount_levi,
					jim_amount_visa,jim_amount_sp,jim_amount_cp,jim_amount_compound,ins_amount_ig,ins_amount_fwcs,ins_amount_fwhs,visa_ref,fine_ref,regional_id,chk_transit_cost,transit_fees,transit_cost,trans_fees_ref,trans_cost_ref)
					values
					('$pmtno','$datecreated',".$this->db->escape($receivefrom).",'$addr','$clabchqno','$chkclabfees','$chkclabadm','$chkclabfeesext','$chkothersfees2','$clabpa','$clabamount',
				     '$clabamountonly','$clabamounttax','$jimchqno','$chkjimplks','$chkjimfees','$chkjimvisa','$chkjimlevi','$chkjimsp','$jimpa',
				     '$jimamount','$fomemachqno','$chkfomemamale','$chkfomemafemale','$fomemapa','$fomemaamount','$inschqno','$chkinsig','$chkinsfwcs',
					'$chkinsfwhs','$inspa','$insamount',
					'$agencychqno','$chkagencyfees','$agencypa','$agencyamount','$otherschqno','$chkothersfees','$otherspa','$othersamount','$paymenttype',
					'$country','$clabregamt','$chkjimcp','$chkjimcompound','$fcl','$clabno','$remarksothers','$jimamountplks','$jimamountfees','$jimamountlevi',
					'$jimamountvisa','$jimamountsp','$jimamountcp','$jimamountcompound','$insamountig','$insamountfwcs','$insamountfwhs','$visaref','$fineref',
					'$regionalid','$chktransitcost','$transfees','$transcost','$transfeesref','$transcostref')";
			
			//$sqlupd = "update wo_payment set pay_refno = '$pmtno' where pay_woid = '$woid'";
			
			$this->db->trans_begin();
		    $this->db->query($sql);
			//$this->db->query($sqlupd);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentReceipt/'.$pmtno.'/add');		
					
		}		
	
	
	function savetaxinvoice(){
		    
			$regionalid = $_POST["selregion"];
			$pmt_id = $this->ModelPayment->getNextTaxInvoiceNo();
			echo $pmt_id;
		    
			$pmt_firstpart = "00000" . $pmt_id;
		    $pmtno = "INV".substr($pmt_firstpart, -6)."-".$regionalid;
			$clabno = $_POST["id"];
			//$wono = $_POST["txtwono"];
			//$woid = $_POST["txtwoid"];
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			//$clabchqno = $_POST["txtchqclab"];
			$country = $_POST["txtcountry"];
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
			if(isset($_POST["txtadmfees"]) == '1'){ $chkclabfees = '1';} else{ $chkclabfees = '0';}
			if(isset($_POST["txtadmin"]) == '1'){ $chkclabadm = '1';} else{ $chkclabadm = '0';}
			if(isset($_POST["txtadmfeesext"]) == '1'){ $chkclabfeesext = '1';} else{ $chkclabfeesext = '0';}
			if(isset($_POST["selamt"]) == ""){ $clabregamt = 0;} else { $clabregamt = $_POST["selamt"];}
			//$clabregamt = $_POST["selamt"];
			//$clabpa = $_POST["txtpaclab"];
			$clabamount = $_POST["txtamtclab"];
			//$clabamountonly = $_POST["txtamtclab_only"];
			//$clabamounttax = $_POST["txtamtclab_tax"];
			//$jimchqno = $_POST["txtchqjim"];
			if(isset($_POST["txtjimplks"]) == '1'){ $chkjimplks = '1';} else{ $chkjimplks = '0';}
			if(isset($_POST["txtjimfees"]) == '1'){ $chkjimfees = '1';} else{ $chkjimfees = '0';}
			if(isset($_POST["txtjimvisa"]) == '1'){ $chkjimvisa = '1';} else{ $chkjimvisa = '0';}
			if(isset($_POST["txtjimlevi"]) == '1'){ $chkjimlevi = '1';} else{ $chkjimlevi  = '0';}
			if(isset($_POST["txtjimsp"]) == '1'){ $chkjimsp = '1';} else{ $chkjimsp = '0';}
			if(isset($_POST["txtjimcp"]) == '1'){ $chkjimcp = '1';} else{ $chkjimcp = '0';}		
			if(isset($_POST["txtjimcompund"]) == '1'){ $chkjimcompound = '1';} else{ $chkjimcompound = '0';}				
			//$jimpa = $_POST["txtpajim"];
			//$jimamount = $_POST["txtamtjim"];
			//$jimamountplks = $_POST["txtamtjim_plks"];
			//$jimamountfees = $_POST["txtamtjim_fees"];
			//$jimamountlevi = $_POST["txtamtjim_levi"];
			//$jimamountvisa = $_POST["txtamtjim_visa"];
			//$jimamountsp = $_POST["txtamtjim_sp"];
			//$jimamountcp = $_POST["txtamtjim_cp"];
			//$jimamountcompound = $_POST["txtamtjim_compound"];
			//$fomemachqno = $_POST["txtchqfomema"];
			if(isset($_POST["txtmale"]) == '1'){ $chkfomemamale = '1';} else{ $chkfomemamale  = '0';}
			if(isset($_POST["txtfemale"]) == '1'){ $chkfomemafemale = '1';} else{ $chkfomemafemale = '0';}
			//if(isset($_POST["selamt"]) == ""){ $clabregamt = 0;} else { $clabregamt = $_POST["selamt"];}
			//$fomemapa = $_POST["txtpafomema"];
			$fomemaamount = $_POST["txtamtfomema"];
			//$inschqno = $_POST["txtchqins"];
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtFWCS"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtFWHS"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			//$inspa = $_POST["txtpains"];
			//$insamount = $_POST["txtamtins"];
			//$insamountig = $_POST["txtamtins_ig"];
			//$insamountfwcs = $_POST["txtamtins_fwcs"];
			//$insamountfwhs = $_POST["txtamtins_fwhs"];
			//$agencychqno = $_POST["txtchqagency"];
			if(isset($_POST["txtagencyfees"]) == '1'){ $chkagencyfees = '1';} else{ $chkagencyfees = '0';}
			if(isset($_POST["txttcost"]) == '1'){ $chktransitcost = '1';} else{ $chktransitcost = '0';}
			//$agencypa = $_POST["txtpaagency"];
			//$agencyamount = $_POST["txtamtagency"];
			//$transfees = $_POST["txttc_fees"];
			//$transcost = $_POST["txttc_cost"];
			//$otherschqno = $_POST["txtchqothr"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
			if(isset($_POST["txtothersfees2"]) == '1'){ $chkothersfees2 = '1';} else{ $chkothersfees2 = '0';}
			//$otherspa = $_POST["txtpaothr"];
			$othersamount = $_POST["txtamtothr"];
			$paymenttype= $_POST["optpmttype"];
			//$remarksothers = $_POST["txtothremarks"];
			$visaref = $_POST["txtvisa"];
			$fineref = $_POST["txtfine"];	
			$transcostref = $_POST["txttranscost"];
			$transfeesref = $_POST["txttransfees"];
			
			$sql = "insert into pmt_tax_inv 
			        (pmt_taxinv_no,pmt_datecreated,pmt_receive_from,pmt_addr,pmt_chq_clab,chk_clab_fees,chk_clab_adm,chk_clab_fees_ext,					 
					chk_clab_mship,clab_pa_no,clab_amount,clab_amount_only,clab_amount_tax,pmt_chq_jim,chk_jim_plks,chk_jim_fees,chk_jim_visa,chk_jim_levi,chk_jim_sp,jim_pa_no,
					jim_amount,pmt_chq_fomema,chk_fomema_male,chk_fomema_female,fomema_pa_no,fomema_amount,ins_chq_no,chk_ins_ig,chk_ins_fwcs,chk_ins_fwhs,
					ins_pa,ins_amount,agency_chq_no,chk_agency_fees,agency_pa_no,agency_amount,others_chq_no,chk_others_fees,others_pa,others_amount,payment_type,
					country,clab_reg_amount,chk_jim_cp,chk_jim_compound,no_of_fcl,clab_no,remarks_others,jim_amount_plks,jim_amount_fees,jim_amount_levi,
					jim_amount_visa,jim_amount_sp,jim_amount_cp,jim_amount_compound,ins_amount_ig,ins_amount_fwcs,ins_amount_fwhs,visa_ref,fine_ref,regional_id,chk_transit_cost,transit_fees,transit_cost,trans_fees_ref,trans_cost_ref)
					values
					('$pmtno','$datecreated',".$this->db->escape($receivefrom).",'$addr','0','$chkclabfees','$chkclabadm','$chkclabfeesext','$chkothersfees2','0','$clabamount',
				     '0','0','0','$chkjimplks','$chkjimfees','$chkjimvisa','$chkjimlevi','$chkjimsp','0',
				     '0','0','$chkfomemamale','$chkfomemafemale','$fomemaamount','0','0','$chkinsig','$chkinsfwcs',
					'$chkinsfwhs','0','0',
					'0','$chkagencyfees','0','0','0','0','0','$othersamount','$paymenttype',
					'$country','$clabregamt','$chkjimcp','$chkjimcompound','$fcl','$clabno','0','0','0','0',
					'0','0','0','0','0','0','0','$visaref','$fineref',
					'$regionalid','0','0','0','$transfeesref','$transcostref')";
			
			//$sqlupd = "update wo_payment set pay_refno = '$pmtno' where pay_woid = '$woid'";
			
			$this->db->trans_begin();
		    $this->db->query($sql);
			//$this->db->query($sqlupd);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentInvTax/'.$pmtno.'/add');		
					
		}		
	
	    function updatepaymentrcpt(){
		    
			//$woid = $_POST["txtwoid"];
		    //$wono = $_POST["txtwono"];
			
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
		    $pmtno = $_POST["txtpmtno"];
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			//$clabchqno = $_POST["txtchqclab"];
			if(isset($_POST["txtadmfees"]) == '1'){ $chkclabfees = '1';} else{ $chkclabfees = '0';}
			if(isset($_POST["txtadmin"]) == '1'){ $chkclabadm = '1';} else{ $chkclabadm = '0';}
			if(isset($_POST["txtadmfeesext"]) == '1'){ $chkclabfeesext = '1';} else{ $chkclabfeesext = '0';}
			if(isset($_POST["txtrefund"]) == '1'){ $chkclablevi = '1';} else{ $chkclablevi = '0';}
			if(isset($_POST["chkcancel"]) == '1'){ $chkcancel = '1';} else{ $chkcancel = '0';}
			$dtcancel = date('Y-m-j',strtotime($_POST["dtcancel"]));
			//$clabregamt = $_POST["selamt"];
			//$clabpa = $_POST["txtpaclab"];
			//$clabamount = $_POST["txtamtclab"];
			//$clabamountonly = $_POST["txtamtclab_only"];
			//$clabamounttax = $_POST["txtamtclab_tax"];
			//$jimchqno = $_POST["txtchqjim"];
			if(isset($_POST["txtjimplks"]) == '1'){ $chkjimplks = '1';} else{ $chkjimplks = '0';}
			if(isset($_POST["txtjimfees"]) == '1'){ $chkjimfees = '1';} else{ $chkjimfees = '0';}
			if(isset($_POST["txtjimvisa"]) == '1'){ $chkjimvisa = '1';} else{ $chkjimvisa = '0';}
			if(isset($_POST["txtjimlevi"]) == '1'){ $chkjimlevi = '1';} else{ $chkjimlevi  = '0';}
			if(isset($_POST["txtjimsp"]) == '1'){ $chkjimsp = '1';} else{ $chkjimsp = '0';};
			if(isset($_POST["txtjimcp"]) == '1'){ $chkjimcp = '1';} else{ $chkjimcp = '0';};
			if(isset($_POST["txtjimcompund"]) == '1'){ $chkjimcompound = '1';} else{ $chkjimcompound = '0';};
			//$jimpa = $_POST["txtpajim"];
			//$jimamount = $_POST["txtamtjim"];
			//$jimamountplks = $_POST["txtamtjim_plks"];
			//$jimamountfees = $_POST["txtamtjim_fees"];
			//$jimamountlevi = $_POST["txtamtjim_levi"];
			//$jimamountvisa = $_POST["txtamtjim_visa"];
			//$jimamountsp = $_POST["txtamtjim_sp"];
			//$jimamountcp = $_POST["txtamtjim_cp"];
			//$jimamountcompound = $_POST["txtamtjim_compound"];
			//$fomemachqno = $_POST["txtchqfomema"];
			if(isset($_POST["txtmale"]) == '1'){ $chkfomemamale = '1';} else{ $chkfomemamale  = '0';}
			if(isset($_POST["txtfemale"]) == '1'){ $chkfomemafemale = '1';} else{ $chkfomemafemale = '0';}
			//$fomemapa = $_POST["txtpafomema"];
			//$fomemaamount = $_POST["txtamtfomema"];
			//$inschqno = $_POST["txtchqins"];
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtFWCS"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtFWHS"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			//$inspa = $_POST["txtpains"];
			//$insamount = $_POST["txtamtins"];
			//$insamountig = $_POST["txtamtins_ig"];
			//$insamountfwcs = $_POST["txtamtins_fwcs"];
			//$insamountfwhs = $_POST["txtamtins_fwhs"];
			//$agencychqno = $_POST["txtchqagency"];
			if(isset($_POST["txtagencyfees"]) == '1'){ $chkagencyfees = '1';} else{ $chkagencyfees = '0';}
			if(isset($_POST["txttcost"]) == '1'){ $chktransitcost = '1';} else{ $chktransitcost = '0';}
			//$agencypa = $_POST["txtpaagency"];
			//$agencyamount = $_POST["txtamtagency"];
			//$transfees = $_POST["txttc_fees"];
			//$transcost = $_POST["txttc_cost"];
			//$otherschqno = $_POST["txtchqothr"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees  = '0';}
			if(isset($_POST["txtothersfees2"]) == '1'){ $chkothersfees2 = '1';} else{ $chkothersfees2  = '0';}
			//$otherspa = $_POST["txtpaothr"];
			//$othersamount = $_POST["txtamtothr"];
			$paymenttype= $_POST["optpmttype"];
			//$country = $_POST["txtcountry"];
			//$remarksothers = $_POST["txtothremarks"];
			//$visaref = $_POST["txtvisa"];
			//$fineref = $_POST["txtfine"];
			//$transcostref = $_POST["txttranscost"];
			//$transfeesref = $_POST["txttransfees"];
			$canceluser = $_POST["txtuser"];
			$cancelcomment = $_POST["txtcomment"];
			
			
			$sql = "update pmt_tax_inv set 
			        
					pmt_receive_from = ".$this->db->escape($receivefrom).",
					pmt_addr = '$addr',
					
					
					
					
					
					
					chk_jim_plks = '$chkjimplks',
					chk_jim_fees ='$chkjimfees',
					chk_jim_visa ='$chkjimvisa',
					chk_jim_levi = '$chkjimlevi',
					chk_jim_sp ='$chkjimsp',
					chk_jim_cp ='$chkjimcp',
					chk_jim_compound = '$chkjimcompound',
					
					chk_fomema_male='$chkfomemamale',
					chk_fomema_female ='$chkfomemafemale',
					
					payment_type = '$paymenttype',
					no_of_fcl = '$fcl',
					
					pmt_wd_date = '$dtcancel',
					pmt_withdraw = '$chkcancel',
					pmt_wd_by = '$canceluser',
					pmt_wd_comment = '$cancelcomment'
					
					where pmt_taxinv_no = '$pmtno'";
			
		 // $sqlupd = "update wo_payment set pay_refno = '$pmtno' where pay_woid = '$woid'";
		  
		  $this->db->trans_begin();
		  $this->db->query($sql);
		 // $this->db->query($sqlupd);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		redirect('contPayment/GetPaymentInvTax/'.$pmtno.'/update');		
			
			
		}
	
		function GetPaymentReceipt(){
		    $pmtno = $this->uri->segment(3);
			$data['successMsg'] = $this->uri->segment(4);
			$data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		    $this->load->view('payment/update_payment_rcpt',$data);
		}
		
		function GetPaymentInvTax(){
		    $pmtno = $this->uri->segment(3);
			$data['successMsg'] = $this->uri->segment(4);
			$data['invoice'] = $this->ModelPayment->getAllInvTaxByID($pmtno);
		    $this->load->view('payment/update_tax_inv',$data);
		}
		
		function savepaymentvdr(){
		
		$contractorid = $_POST["id"];
		$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		$pm_id = $this->ModelPayment->getNextPaymentNo();
		$pm_firstpart = "00000" . $pm_id;
		$pmno = "P/VDR/".substr($pm_firstpart, -6);
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$pmquery = "insert into pmt_advise (pmt_no,pmt_dateissue,contractor_id,pmt_attn,pmt_type,pmt_compname,
		  		    pmt_address1,pmt_address2,pmt_address3,pmt_tel,pmt_fax,pmt_state,pmt_postcode)
				    values
				   ('$pmno','$datecreated','$contractorid','$attn','V',".$this->db->escape($contractorname).",'$addr1','$addr2',
				    '$addr3','$tel','$fax','$state','$postcode')";	
		
		$this->db->trans_begin();
		$this->db->query($pmquery);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetailsVDR/'.$pmno.'/add');
		
		}
		
		function savepaymentext(){
		
		$contractorid = $_POST["id"];
		$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		$pm_id = $this->ModelPayment->getNextPaymentNo();
		$pm_firstpart = "00000" . $pm_id;
		$pmno = "P/EXT/".substr($pm_firstpart, -6);
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$pmquery = "insert into pmt_advise (pmt_no,pmt_dateissue,contractor_id,pmt_attn,pmt_type,pmt_compname,
		  		    pmt_address1,pmt_address2,pmt_address3,pmt_tel,pmt_fax,pmt_state,pmt_postcode)
				    values
				   ('$pmno','$datecreated','$contractorid','$attn','R',".$this->db->escape($contractorname).",'$addr1','$addr2',
				    '$addr3','$tel','$fax','$state','$postcode')";	
		
		$this->db->trans_begin();
		$this->db->query($pmquery);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetailsEXT/'.$pmno.'/add');
		
		}
	 
	 
	 function UpdatePaymentVDR(){
	    
		$pmno = $_POST["txtpmno"];
		$contractorid = $_POST["id"];
		//$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		//$pm_id = $this->ModelPayment->getNextPaymentNo();
		//$pm_firstpart = "00000" . $pm_id;
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$sqlupdate = "update pmt_advise set
		              contractor_id = '$contractorid',
					  pmt_attn = '$attn',
					  pmt_compname = ".$this->db->escape($contractorname).",
		  		      pmt_address1 = '$addr1',
					  pmt_address2 = '$addr2',
					  pmt_address3 = '$addr3',
					  pmt_tel = '$tel',
					  pmt_fax = '$fax',
					  pmt_state = '$state',
					  pmt_postcode = '$postcode'
					  where pmt_no = '$pmno'";
	  
	  	$this->db->trans_begin();
		$this->db->query($sqlupdate);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetailsEXT/'.$pmno);				  
	 
	 }	
	 
	 function UpdatePaymentEXT(){
	    
		$pmno = $_POST["txtpmno"];
		$contractorid = $_POST["id"];
		//$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		//$pm_id = $this->ModelPayment->getNextPaymentNo();
		//$pm_firstpart = "00000" . $pm_id;
		$contractorname = $_POST["txtcompname"];
		$addr1 = $_POST["txtaddr1"];
		$addr2 = $_POST["txtaddr2"];
		$addr3 = $_POST["txtaddr3"];
		$tel   = $_POST["txttelno"];
		$fax   = $_POST["txtfaxno"];
		$state = $_POST["txtstate"];
		$postcode = $_POST["txtpcode"];
		
		$sqlupdate = "update pmt_advise set
		              contractor_id = '$contractorid',
					  pmt_attn = '$attn',
					  pmt_compname = ".$this->db->escape($contractorname).",
		  		      pmt_address1 = '$addr1',
					  pmt_address2 = '$addr2',
					  pmt_address3 = '$addr3',
					  pmt_tel = '$tel',
					  pmt_fax = '$fax',
					  pmt_state = '$state',
					  pmt_postcode = '$postcode'
					  where pmt_no = '$pmno'";
	  
	  	$this->db->trans_begin();
		$this->db->query($sqlupdate);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetailsEXT/'.$pmno);				  
	 
	 }	
	 
	 function GetPaymentDetailsVDR(){
	    
		 $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);		
	     $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
		 $data['PMrow'] = $this->ModelPayment->getPaymentByID($pmno);  
		 $this->load->view('payment/vdrpayment_2',$data);
	 
	 }	
	 
	 function GetPaymentDetailsEXT(){
	    
		 $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);		
	     $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
		 $data['PMrow'] = $this->ModelPayment->getPaymentByID($pmno);  
		 $this->load->view('payment/extpayment_2',$data);
	 
	 }	
	 
	 
	  function ListallpaymentEXT(){
	 
	 /********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
			$grid->db->where("pmt_type ='R'");
		    $grid->db->order_by("pmt_no", "desc");
		    //$grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    //$grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    //$grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    //$grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    //$grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    //$grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			//$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			//$grid->db->where("wo_spim_status ='R'");
		    //$grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetailsEXT/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			//$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list_EXT', $data);	
	 
	 }
	 
	 
	 
	 
	 function ListallpaymentVDR(){
	 
	 /********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
			//$grid->db->join("pmt_fcl","pmt_advise.pmt_no = pmt_fcl.pmt_no", "LEFT");
		    $grid->db->where("pmt_type ='V'");
			$grid->db->order_by("pmt_no", "desc");
		    //$grid->db->join("wo_agency","workorders.wo_agency = wo_agency.agency_id", "LEFT");
		    //$grid->db->join("wo_doc","workorders.wo_id = wo_doc.doc_woid", "LEFT");
		    //$grid->db->join("wo_legal","workorders.wo_id = wo_legal.legal_woid", "LEFT");
		    //$grid->db->join("wo_payment","workorders.wo_id = wo_payment.pay_woid", "LEFT");
		    //$grid->db->join("wo_status","workorders.wo_id = wo_status.status_woid", "LEFT");
		    //$grid->db->join("contractors","workorders.wo_clab_no = contractors.ctr_clab_no","LEFT");
			//$grid->db->join("mst_countries","workorders.wo_fcl_country = mst_countries.cty_id","LEFT");
			//$grid->db->where("wo_spim_status ='R'");
		    //$grid->db->orderby("wo_id", "desc");
		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetailsVDR/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("FCL","pmt_fcl_no");
			//$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list_VDR', $data);	
	 
	 }
	 
	 function searchPaymentVDR(){
	 
	 if(isset($_POST['rdsearchby'])){
				$searchby = $_POST['rdsearchby'];
				$keyword = trim($_POST['txtkeyword']);
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');	
			}		
			
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();	
			
			$grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
		    if($searchby == "pmt_compname" || $searchby == "pmt_no")
		    	$grid->db->where("$searchby LIKE '%$keyword%' and pmt_type ='V'");
		    else
		    	$grid->db->where("$searchby = '$keyword' and pmt_type ='V'");
		    $grid->db->order_by("pmt_dateissue", "desc");
	        
			 $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetailsVDR/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list_VDR', $data);	
	 
	 }
	 
	 function searchPaymentEXT(){
	 
	 if(isset($_POST['rdsearchby'])){
				$searchby = $_POST['rdsearchby'];
				$keyword = trim($_POST['txtkeyword']);
				
				$this->session->unset_userdata('searchby');
				$this->session->set_userdata('searchby', $searchby);
				$this->session->unset_userdata('keyword');
				$this->session->set_userdata('keyword', $keyword);
			}
			else{
				$searchby = $this->session->userdata('searchby');
				$keyword = $this->session->userdata('keyword');	
			}		
			
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();	
			
			$grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
		    if($searchby == "pmt_compname" || $searchby == "pmt_no")
		    	$grid->db->where("$searchby LIKE '%$keyword%' and pmt_type ='R'");
		    else
		    	$grid->db->where("$searchby = '$keyword' and pmt_type ='R'");
		    $grid->db->order_by("pmt_dateissue", "desc");
	        
			 $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentDetailsEXT/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list_EXT', $data);	
	 
	 }
	 
	 function addvdrfcl(){
	        
			$pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
	        $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
	        $data['pmno'] = $pmno;
	        $this->load->view('payment/add_vdr_fcl',$data);	
	 }
	 
	  function addextfcl(){
	        
			$pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
	        $data['allPaymentFCL'] = $this->ModelPayment->getAllFCLpaymentbyPMNO($pmno);
	        $data['pmno'] = $pmno;
	        $this->load->view('payment/add_ext_fcl',$data);	
	 }
	 
	 
	 function editvdrfcl(){
	        
			$id = $this->uri->segment(3);
			$data['strhide'] = "update";
	        $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
	        $this->load->view('payment/edit_vdr_fcl',$data);	
	 }
	 
	 function editextfcl(){
	        
			$id = $this->uri->segment(3);
			$data['strhide'] = "update";
	        $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
	        $this->load->view('payment/edit_ext_fcl',$data);	
	 }
	 
	 function opencountrylist(){
	 
	        $data['country'] = $this->ModelPayment->getAllCountry();
	        $data['frm'] = $this->uri->segment(3);
			$this->load->view('payment/countrylist',$data);		   
	 }
	 
	  function openpalist(){
	        
			$type = $this->uri->segment(3);
	        $data['pano'] = $this->ModelPayment->getPAlist($type);
	       
			$this->load->view('payment/palist',$data);		   
	 }
	 
	 
	 
	 function savefclvdr(){
	 
	        $pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			$transfees = $_POST["txttransitfees"];
			$transcost = $_POST["txttransitcost"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtadmin = $_POST["txtadmin"];
			$pmtfomema = $_POST["txtfomema"];
			
			$pmtquery = "insert into pmt_fcl 
			             (pmt_no,pmt_cty_id,pmt_cty_desc,pmt_fcl_no,pmt_levi,pmt_plks,pmt_visa,pmt_fees,pmt_period,pmt_jim,pmt_wages,pmt_trans_fees,pmt_trans_cost,pmt_ig,pmt_fwcs,pmt_fwhs,pmt_admin,pmt_fomema)
						 values
						 ('$pmno','$cityid','$citydesc','$nooffcl','$pmtlevi','$pmtplks',
						 '$pmtvisa','$pmtfees','$pmtperiod','$pmtjim','$pmtwages','$transfees','$transcost','$pmtig','$pmtfwcs','$pmtfwhs','$pmtadmin','$pmtfomema')";
					
			 $this->db->trans_begin();
		     $this->db->query($pmtquery);	
             $this->db->trans_commit();		
			 
			 
		     $data['pmno'] = $pmno;
			 $data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
             $this->load->view('payment/add_vdr_fcl', $data);		 
			
	 }
	 
	 function savefclext(){
	 
	        $pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			$pmtcomp = $_POST["txtcompoundcomp"];
			$pmtsp = $_POST["txtspecpass"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtadmin = $_POST["txtadmin"];
			$pmtfomema = $_POST["txtfomema"];
					
			$pmtquery = "insert into pmt_fcl 
			             (pmt_no,pmt_cty_id,pmt_cty_desc,pmt_fcl_no,pmt_levi,pmt_plks,pmt_visa,pmt_fees,pmt_period,pmt_jim,pmt_wages,
						  pmt_compound,pmt_sp,pmt_ig,pmt_fwcs,pmt_fwhs,pmt_admin,pmt_fomema)
						 values
						 ('$pmno','$cityid','$citydesc','$nooffcl','$pmtlevi','$pmtplks',
						 '$pmtvisa','$pmtfees','$pmtperiod','$pmtjim','$pmtwages','$pmtcomp','$pmtsp','$pmtig','$pmtfwcs','$pmtfwhs','$pmtadmin','$pmtfomema')";
					
			 $this->db->trans_begin();
		     $this->db->query($pmtquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
		     $data['pmno'] = $pmno;
			 $data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
             $this->load->view('payment/add_ext_fcl', $data);		 
			
	 }
	 
	  function Updatefclext(){
	         
			$id = $_POST["txtid"];
			$pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			$pmtcomp = $_POST["txtcompoundcomp"];
			$pmtsp = $_POST["txtspecpass"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtfomema = $_POST["txtfomema"];
			$pmtadmin = $_POST["txtadmin"];
			
			$sqlquery = "Update pmt_fcl set 
			            pmt_cty_id = '$cityid',
						pmt_cty_desc = '$citydesc',
						pmt_fcl_no = '$nooffcl',
						pmt_levi = '$pmtlevi',
						pmt_plks = '$pmtplks',
						pmt_fees = '$pmtfees',
						pmt_period = '$pmtperiod',
						pmt_visa = '$pmtvisa',
						pmt_jim = '$pmtjim',
						pmt_wages = '$pmtwages',
						pmt_compound = '$pmtcomp',
						pmt_sp = '$pmtsp',
						pmt_ig = '$pmtig',
						pmt_fwcs= '$pmtfwcs',
						pmt_fwhs= '$pmtfwhs',
						pmt_fomema = '$pmtfomema',
						pmt_admin = '$pmtadmin'
						where id = '$id'";
						
			 
			 $this->db->trans_begin();
		     $this->db->query($sqlquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
			 $data['pmno'] = $pmno;
			 $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
			 $data['successMsg'] = "FCL was succesfully Update.";
             $this->load->view('payment/edit_ext_fcl', $data);				
						
	 
	 }
	 
	 function Updatefclvdr(){
	         
			$id = $_POST["txtid"];
			$pmno = $_POST["txtpmno"];
			$nooffcl = $_POST["txtnofcl"];
			$cityid = $_POST["selid"];
			$citydesc = $_POST["selcountry"];
			$pmtjim = $_POST["txtjim"];
			$pmtvisa = $_POST["txtvisa"];
			$pmtfees = $_POST["txtfees"];
			$pmtplks = $_POST["txtplks"];
			$pmtperiod = $_POST["txtperiod"];
			$pmtlevi = $_POST["txtlevi"];
			$pmtwages = $_POST["txtwages"];
			$transfees = $_POST["txttransitfees"];
			$transcost = $_POST["txttransitcost"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtfomema = $_POST["txtfomema"];
			$pmtadmin = $_POST["txtadmin"];
			
			
			$sqlquery = "Update pmt_fcl set 
			            pmt_cty_id = '$cityid',
						pmt_cty_desc = '$citydesc',
						pmt_fcl_no = '$nooffcl',
						pmt_levi = '$pmtlevi',
						pmt_plks = '$pmtplks',
						pmt_fees = '$pmtfees',
						pmt_period = '$pmtperiod',
						pmt_visa = '$pmtvisa',
						pmt_jim = '$pmtjim',
						pmt_wages = '$pmtwages',
						pmt_trans_fees = '$transfees',
						pmt_trans_cost = '$transcost',
						pmt_ig = '$pmtig',
						pmt_fwcs= '$pmtfwcs',
						pmt_fwhs= '$pmtfwhs',
						pmt_fomema = '$pmtfomema',
						pmt_admin = '$pmtadmin'
						where id = '$id'";
			 
			 $this->db->trans_begin();
		     $this->db->query($sqlquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
			 $data['pmno'] = $pmno;
			 $data['dataFCL'] = $this->ModelPayment->getAllFCLdatabyid($id);
			 $data['successMsg'] = "FCL was succesfully Update.";
             $this->load->view('payment/edit_vdr_fcl', $data);				
						
	 
	 }
	 
	function displayprint(){
	         $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
			 $type = $this->uri->segment(4);
	         $data['display'] = $this->ModelPayment->getAllPrint($pmno);
			 $data['fcl'] = $this->ModelPayment->getAllPrintFCL($pmno);
			 
			 if($type == 'VDR'){
			 $this->load->view('payment/printadvisevdr', $data);	
			 }else{
			 $this->load->view('payment/printadviseext', $data);	
			 }
	}
	
	function paymentrcpt(){
	         $data['allRegion'] = $this->ModelPayment->getRegion();
			 $this->load->view('payment/payment_rcpt',$data);		        
	}
	
	function taxinvoice(){
	         $data['allRegion'] = $this->ModelPayment->getRegion();
			 $this->load->view('payment/tax_invoice',$data);		        
	}
	
	function DeleteFCL(){
	
	    $id = $this->uri->segment(3);
				
		$sql = "delete from pmt_fcl where id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['strhide'] = "delete";
		$data['successMsg'] = "FCL was succesfully Delete.";        
		$this->load->view('payment/edit_vdr_fcl', $data);
	
	}

}
?>		