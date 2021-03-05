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
		
		function printinvoice4(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_recp_taxinv_1',$data);			
		}
		
		function printpavdr(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_payment_advice_vdr',$data);			
		}
		
		function printpaext(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_payment_advice_ext',$data);			
		}
		
		function printpalt(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_payment_advice_lt',$data);			
		}
		
		function printpag133(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_payment_advice_g133',$data);			
		}
		
		function printpag136(){
		   $pmtno = $this->uri->segment(3);
		   $data['payment'] = $this->ModelPayment->getAllPaymentByID($pmtno);
		   $this->load->view('payment/print_payment_advice_g136',$data);			
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
			
			$grid = new DataGrid("", "pmt_receipt_new");
		    $grid->db->join("pmt_type","pmt_receipt_new.payment_type = pmt_type.pmt_type_id", "LEFT");
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
		    $grid = new DataGrid("", "pmt_receipt_new");
			$grid->db->join("pmt_type","pmt_receipt_new.payment_type = pmt_type.pmt_type_id", "LEFT");
		    $grid->db->order_by("pmt_receipt_no", "desc");
		 		    
		    $grid->use_function("callback_displaydate");
		    $grid->use_function("callback_displayuri");
		 	$grid->per_page = 15;
			
		 	$baseuri = "contPayment";
		 	$link_edit = anchor("$baseuri/GetPaymentReceipt/<#pmt_receipt_no#>","<#pmt_receipt_no#>");
			$link_print = anchor_popup("$baseuri/printreceipt/<#pmt_receipt_no#>","Print");
		 	
			
			$grid->column("RECEIPT NO.","$link_edit", 'width="100"');
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
		 	
			
			$grid->column("TAX INVOICE NO.","$link_edit", 'width="110"');
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
		
		function openlocal(){
		   $this->load->view('payment/localpayment_1');
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
			$currentuser = $this->session->userdata('username');
			$pmt_id = $this->ModelPayment->getNextPaymentReceiptNo();
		    
			$pmt_firstpart = "00000" . $pmt_id;
		    $pmtno = "OR".substr($pmt_firstpart, -6)."-".$regionalid;
			$clabno = $_POST["id"];
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			
			$country = $_POST["txtcountry"];
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
			$clabpa = $_POST["txtpaclab"];
			if(isset($_POST["txtamtdisc"]) == ""){ $disc = 0;} else { $disc = $_POST["txtamtdisc"];}
			$rmkdisc = $_POST["txtrmkdisc"];
			
			$clabchqno = $_POST["txtchqclab"];
			if(isset($_POST["txtadmfees"]) == '1'){ $chkclabfees = '1';} else{ $chkclabfees = '0';}
			if(isset($_POST["txtsitcent"]) == '1'){ $chkclabtsitcent = '1';} else{ $chkclabtsitcent = '0';}
			if(isset($_POST["txtgrncad"]) == '1'){ $chkclabgrncad = '1';} else{ $chkclabgrncad = '0';}
			$clabadmfee = $_POST["txtclabadmfee"];
			$clabtcfee = $_POST["txtclabtcfee"];
			$clabgcfee = $_POST["txtclabgcfee"];
			$clabamount = $_POST["txtamtclab"];
			$clabamountonly = $_POST["txtamtclab_only"];
			$clabamounttax = $_POST["txtamtclab_tax"];
			
			$clabchqren = $_POST["txtchqclabren"];
			if(isset($_POST["txtadmfeesext"]) == '1'){ $chkclabfeesext = '1';} else{ $chkclabfeesext = '0';}
			if(isset($_POST["txtadmfeesextgc"]) == '1'){ $chkclabfeesextgc = '1';} else{ $chkclabfeesextgc = '0';}
			$clabrenfee = $_POST["txtclabrenfee"];
			$clabrengcfee = $_POST["txtclabrengcfee"];
			$amtclabren = $_POST["txtamtclabren"];
			$amtclabreno = $_POST["txtamtclabren_o"];
			$amtclabrent = $_POST["txtamtclabren_t"];
			
			$chqcontreg = $_POST["txtchqcontreg"];
			if(isset($_POST["txtcontreg1"]) == '1'){ $chkcontreg1 = '1';} else{ $chkcontreg1 = '0';}
			if(isset($_POST["txtcontreg2"]) == '1'){ $chkcontreg2 = '1';} else{ $chkcontreg2 = '0';}
			if(isset($_POST["txtcontreg3"]) == '1'){ $chkcontreg3 = '1';} else{ $chkcontreg3 = '0';}
			$contregfee = $_POST["txtclabregfee"];
			$amtcontreg = $_POST["txtamtreg"];
			$amtcontrego = $_POST["txtamtreg_o"];
			$amtcontregt = $_POST["txtamtreg_t"];
			
			$chqcontren = $_POST["txtchqcontren"];
			if(isset($_POST["txtcontren1"]) == '1'){ $chkcontren1 = '1';} else{ $chkcontren1 = '0';}
			if(isset($_POST["txtcontren2"]) == '1'){ $chkcontren2 = '1';} else{ $chkcontren2 = '0';}
			if(isset($_POST["txtcontren3"]) == '1'){ $chkcontren3 = '1';} else{ $chkcontren3 = '0';}
			$contrenfee = $_POST["txtcontrenfee"];
			$amtcontren = $_POST["txtamtcontren"];
			$amtcontreno = $_POST["txtamtcontren_o"];
			$amtcontrent = $_POST["txtamtcontren_t"];
			
			$chqrehire = $_POST["txtchqrehire"];
			if(isset($_POST["txtrehire1"]) == '1'){ $chkrehire1 = '1';} else{ $chkrehire1 = '0';}
			if(isset($_POST["txtrehire2"]) == '1'){ $chkrehire2 = '1';} else{ $chkrehire2 = '0';}
			$clabrehfee = $_POST["txtclabrehfee"];
			$amtrehire = $_POST["txtamtrehire"];
			$amtrehireo = $_POST["txtamtrehire_o"];
			$amtrehiret = $_POST["txtamtrehire_t"];

			$localchqno = $_POST["txtchqclabloc"];
			if(isset($_POST["txtlocald"]) == '1'){ $chklocaldis= '1';} else{ $chklocaldis = '0';}
			if(isset($_POST["txtlocalr"]) == '1'){ $chklocalreim= '1';} else{ $chklocalreim = '0';}	
			$clablwfee = $_POST["txtclablwfee"];
			$localamount = $_POST["txtamtlocal"];
			$localamounto = $_POST["txtamtlocal_o"];
			$localamountt = $_POST["txtamtlocal_t"];
			
			$chqgreen = $_POST["txtchqgreen"];
			if(isset($_POST["txtgreenw"]) == '1'){ $chkgreenw= '1';} else{ $chkgreenw = '0';}
			if(isset($_POST["txtgreenr"]) == '1'){ $chkgreenr= '1';} else{ $chkgreenr = '0';}
			$clabgreenfee = $_POST["txtclabgreenfee"];
			$amtgreen = $_POST["txtamtgreen"];
			$amtgreeno = $_POST["txtamtgreen_o"];
			$amtgreent = $_POST["txtamtgreen_t"];
			
			$chqclabfee = $_POST["txtchqclabfee"];
			if(isset($_POST["txtmember"]) == '1'){ $chkmember= '1';} else{ $chkmember = '0';}
			if(isset($_POST["txtintro"]) == '1'){ $chkintro= '1';} else{ $chkintro = '0';}
			$clabfee = $_POST["txtclabfee"];
			$amtclabfee = $_POST["txtamtclabfee"];
			$amtclabfeeo = $_POST["txtamtclabfee_o"];
			$amtclabfeet = $_POST["txtamtclabfee_t"];
			
			$jimchqno = $_POST["txtchqjim"];
			if(isset($_POST["txtjimplks"]) == '1'){ $chkjimplks = '1';} else{ $chkjimplks = '0';}
			if(isset($_POST["txtjimfees"]) == '1'){ $chkjimfees = '1';} else{ $chkjimfees = '0';}
			if(isset($_POST["txtjimvisa"]) == '1'){ $chkjimvisa = '1';} else{ $chkjimvisa = '0';}
			if(isset($_POST["txtjimlevi"]) == '1'){ $chkjimlevi = '1';} else{ $chkjimlevi  = '0';}
			if(isset($_POST["txtjimlevi2"]) == '1'){ $chkjimlevi2 = '1';} else{ $chkjimlevi2  = '0';}
			if(isset($_POST["txtjimlevi3"]) == '1'){ $chkjimlevi3 = '1';} else{ $chkjimlevi3  = '0';}
			if(isset($_POST["txtjimsp"]) == '1'){ $chkjimsp = '1';} else{ $chkjimsp = '0';}
			if(isset($_POST["txtjimcp"]) == '1'){ $chkjimcp = '1';} else{ $chkjimcp = '0';}		
			if(isset($_POST["txtjimcompund"]) == '1'){ $chkjimcompound = '1';} else{ $chkjimcompound = '0';}				
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
			$fomemaamount = $_POST["txtamtfomema"];
			$fomemaamounto = $_POST["txtamtfomema_o"];
			$fomemaamountt = $_POST["txtamtfomema_t"];
			
			$inschqno = $_POST["txtchqins"];
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtFWCS"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtFWHS"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			$insamounto = $_POST["txtamtins_o"];
			$insamountt = $_POST["txtamtins_t"];
			$insamount = $_POST["txtamtins"];
			$insamountig = $_POST["txtamtins_ig"];
			$insamountfwcs = $_POST["txtamtins_fwcs"];
			$insamountfwhs = $_POST["txtamtins_fwhs"];
			$transfees = $_POST["txttc_fees"];
			//$transcost = $_POST["txttc_cost"];
			
			$agencychqno = $_POST["txtchqagency"];
			if(isset($_POST["txtagencyfees"]) == '1'){ $chkagencyfees = '1';} else{ $chkagencyfees = '0';}
			if(isset($_POST["txtagencyfeesgc"]) == '1'){ $chkagencyfeesgc = '1';} else{ $chkagencyfeesgc = '0';}
			$clabtransfee = $_POST["txtclabtransfee"];
			$clabtransgcfee = $_POST["txtclabtransgcfee"];
			$agencyamount = $_POST["txtamtagency"];
			$agencyamounto = $_POST["txtamtagency_o"];
			$agencyamountt = $_POST["txtamtagency_t"];

			$otherschqno = $_POST["txtchqothr"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
			if(isset($_POST["txtothersfees2"]) == '1'){ $chkothersfees2 = '1';} else{ $chkothersfees2 = '0';}
			if(isset($_POST["txtothersfees3"]) == '1'){ $chkothersfees3 = '1';} else{ $chkothersfees3 = '0';}
			
			$othersamount = $_POST["txtamtothr"];
			$othersamount_o = $_POST["txtamtothr_o"];
			$othersamount_t = $_POST["txtamtothr_t"];
			$paymenttype= $_POST["optpmttype"];
			$remarksothers = $_POST["txtothremarks"];
			$visaref = $_POST["txtvisa"];
			$fineref = $_POST["txtfine"];
			$depref = $_POST["txtdepfees"];	
			if(isset($_POST["txtDeposit"]) == '1'){ $chkdepfee = '1';} else{ $chkdepfee = '0';}
			
			$transcostref = $_POST["txttranscost"];
			$transfeesref = $_POST["txttransfees"];
			
			$sql = "insert into pmt_receipt_new 
			        (pmt_receipt_no,pmt_datecreated,pmt_datecreatedby,pmt_receive_from,pmt_addr,
					no_of_fcl,country,clab_pa_no,amt_disc,rmk_disc,
					
					chk_clab_fees,chk_clab_mship,chk_clab_tsitcent,chk_clab_grncad,				
					pmt_chq_clab,clab_amount,clab_amount_only,clab_amount_tax,clab_adm_fee,clab_tc_fee,
					clab_gc_fee,pmt_chq_jim,chk_jim_plks,chk_jim_fees,chk_jim_visa,chk_jim_levi,chk_jim_levi2,chk_jim_levi3,chk_jim_sp,chk_jim_cp,chk_jim_compound,jim_amount,
					jim_amount_visa,jim_amount_sp,jim_amount_cp,jim_amount_compound,jim_amount_plks,jim_amount_fees,jim_amount_levi,pmt_chq_fomema,chk_fomema_male,chk_fomema_female,
					fomema_amount,fomema_amounto,fomema_amountt,ins_chq_no,chk_ins_ig,chk_ins_fwcs,chk_ins_fwhs,ins_amount,ins_amounto,ins_amountt,
					ins_amount_ig,ins_amount_fwcs,ins_amount_fwhs,agency_chq_no,chk_agency_fees,chk_agency_feesgc,agency_amount,agency_amounto,agency_amountt,clab_trans_fee,
					clab_transgc_fee,transit_fees,others_chq_no,chk_others_fees,chk_others_fees2,chk_others_fees3,others_amount,others_amount_o,others_amount_t,payment_type,
					clab_no,remarks_others,visa_ref,fine_ref,regional_id,trans_fees_ref,trans_cost_ref,pmt_chq_clab_ren,chk_clab_fees_ext,chk_clab_fees_extgc,
					amt_clabren,amt_clabreno,amt_clabrent,clab_ren_fee,clab_rengc_fee,chqno_contreg,chk_contreg1,chk_contreg2,chk_contreg3,amt_contreg,
					amt_contrego,amt_contregt,clab_contreg_fee,chqno_contren,chk_contren1,chk_contren2,chk_contren3,amt_contren,amt_contreno,amt_contrent,
					
					clab_contren_fee,chqno_rehire,chk_rehire1,chk_rehire2,amt_rehireo,amt_rehiret,amt_rehire,clab_reh_fee,
					pmt_chq_local,chk_local_dis,
					chk_local_reim,local_amounto,local_amountt,local_amount,clab_lw_fee,pmt_chk_green,chk_green_new,chk_green_ren,amt_greencard,amt_greencardo,
					amt_greencardt,clab_green_fee,chqno_clabfee,chk_member,chk_intro,amt_clabfee,amt_clabfeeo,amt_clabfeet,clab_fee,chk_dep_fee,depref) 
					values
					('$pmtno','$datecreated','$currentuser',".$this->db->escape($receivefrom).",'$addr','$fcl','$country','$clabpa','$disc','$rmkdisc',
					'$chkclabfees','$chkothersfees2','$chkclabtsitcent','$chkclabgrncad','$clabchqno','$clabamount','$clabamountonly','$clabamounttax','$clabadmfee','$clabtcfee',
					'$clabgcfee','$jimchqno','$chkjimplks','$chkjimfees','$chkjimvisa','$chkjimlevi','$chkjimlevi2','$chkjimlevi3','$chkjimsp','$chkjimcp','$chkjimcompound','$jimamount',
					'$jimamountvisa','$jimamountsp','$jimamountcp','$jimamountcompound','$jimamountplks','$jimamountfees','$jimamountlevi','$fomemachqno','$chkfomemamale','$chkfomemafemale',
					'$fomemaamount','$fomemaamounto','$fomemaamountt','$inschqno','$chkinsig','$chkinsfwcs','$chkinsfwhs','$insamount','$insamounto','$insamountt',
					'$insamountig','$insamountfwcs','$insamountfwhs','$agencychqno','$chkagencyfees','$chkagencyfeesgc','$agencyamount','$agencyamounto','$agencyamountt','$clabtransfee',
					
					'$clabtransgcfee','$transfees','$otherschqno','$chkothersfees','$chkothersfees2','$chkothersfees3','$othersamount','$othersamount_o','$othersamount_t','$paymenttype',
					'$clabno','$remarksothers','$visaref','$fineref','$regionalid','$transfeesref','$transcostref','$clabchqren','$chkclabfeesext','$chkclabfeesextgc',
					'$amtclabren','$amtclabreno','$amtclabrent','$clabrenfee','$clabrengcfee','$chqcontreg','$chkcontreg1','$chkcontreg2','$chkcontreg3','$amtcontreg',
					'$amtcontrego','$amtcontregt','$contregfee','$chqcontren','$chkcontren1','$chkcontren2','$chkcontren3','$amtcontren','$amtcontreno','$amtcontrent',
					'$contrenfee','$chqrehire','$chkrehire1','$chkrehire2','$amtrehireo','$amtrehiret','$amtrehire','$clabrehfee','$localchqno','$chklocaldis',
					'$chklocalreim','$localamounto','$localamountt','$localamount','$clablwfee','$chqgreen','$chkgreenw','$chkgreenr','$amtgreen','$amtgreeno',
					'$amtgreent','$clabgreenfee','$chqclabfee','$chkmember','$chkintro','$amtclabfee','$amtclabfeeo','$amtclabfeet','$clabfee','$chkdepfee','$depref')";
			
			//$sqlupd = "update wo_payment set pay_refno = '$pmtno' where pay_woid = '$woid'";
			echo $sql;
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
			
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			$paymenttype= $_POST["optpmttype"];
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
			$country=$_POST["txtcountry"];
			$fineref = $_POST["txtfine"];
			
			if(isset($_POST["txtmale"]) == '1'){ $chkfomemamale = '1';} else{ $chkfomemamale  = '0';}
			$amtfom = $_POST["txtamtfom"];
			$amtfomo = $_POST["txtamtfomo"];
			$amtfomg = $_POST["txtamtfomg"];
			$fomfee = $_POST["txtfomfee"];
			
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtfwcs"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtfwhs"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			$amtig = $_POST["txtamtig"];
			$amtfwcs = $_POST["txtamtfwcs"];
			$amtfwhs = $_POST["txtamtfwhs"];
			$amtins = $_POST["txtamtins"];
			$amtinso = $_POST["txtamtinso"];
			$amtinsg = $_POST["txtamtinsg"];
			$amtinsp = $_POST["txtamtinsp"];
			
			$rmkothr = $_POST["txtothremarks"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
			$othersamount_o = $_POST["txtamtothr_o"];
			$othersamount_t = $_POST["txtamtothr_t"];
			$amtothr = $_POST["txtamtothr"];
			
			$sql = "insert into pmt_tax_inv 
			        (pmt_taxinv_no,pmt_datecreated,pmt_receive_from,pmt_addr,no_of_fcl,regional_id,payment_type,clab_no,country,fine_ref,
					chk_fomema_male,fomema_amount,fomema_amounto,fomema_amountg,fomema_fee,
					chk_ins_ig,chk_ins_fwcs,chk_ins_fwhs,ins_amount_ig,ins_amount_fwcs,ins_amount_fwhs,ins_amount,ins_amount_o,ins_amount_g,ins_amount_p,
					chk_others_fees,remarks_others,others_amount_o,others_amount_t,others_amount)
					values
					('$pmtno','$datecreated',".$this->db->escape($receivefrom).",'$addr','$fcl','$regionalid','$paymenttype','$clabno','$country','$fineref',
					'$chkfomemamale','$amtfom','$amtfomo','$amtfomg','$fomfee',
					'$chkinsig','$chkinsfwcs','$chkinsfwhs','$amtig','$amtfwcs','$amtfwhs','$amtins','$amtinso','$amtinsg','$amtinsp',
					'$chkothersfees','$rmkothr','$othersamount_o','$othersamount_t','$amtothr')";
			
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
	function updatetaxinvoice(){
		    
		//$woid = $_POST["txtwoid"];
		//$wono = $_POST["txtwono"];
		
		if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
		$pmtno = $_POST["txtpmtno"];
		//$datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
		if($_POST["txtcreateddate"]=='') $datecreated = '0000-00-00'; else $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
		$receivefrom = $_POST["txtrecfrom"];
		$addr = $_POST["txtaddr1"];
		$paymenttype= $_POST["optpmttype"];
		$clabno= $_POST["id"];
		$country=$_POST["txtcountry"];
		$fineref = $_POST["txtfine"];
		
		if(isset($_POST["txtmale"]) == '1'){ $chkfomemamale = '1';} else{ $chkfomemamale  = '0';}
		$amtfom = $_POST["txtamtfom"];
		$amtfomo = $_POST["txtamtfomo"];
		$amtfomg = $_POST["txtamtfomg"];
		$fomfee = $_POST["txtfomfee"];
		
		if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
		if(isset($_POST["txtfwcs"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
		if(isset($_POST["txtfwhs"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
		$amtig = $_POST["txtamtig"];
		$amtfwcs = $_POST["txtamtfwcs"];
		$amtfwhs = $_POST["txtamtfwhs"];
		$amtins = $_POST["txtamtins"];
		$amtinso = $_POST["txtamtinso"];
		$amtinsg = $_POST["txtamtinsg"];
		$amtinsp = $_POST["txtamtinsp"];
		
		$polig = $_POST["txtpolig"];
		$polfwcs = $_POST["txtpolfwcs"];
		$polfwhs = $_POST["txtpolfwhs"];
		
		//$rmkothr = $_POST["txtothremarks"];
		//$amtothr = $_POST["txtamtothr"];
		$rmkothr = $_POST["txtothremarks"];
		if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
		$othersamount_o = $_POST["txtamtothr_o"];
		$othersamount_t = $_POST["txtamtothr_t"];
		$amtothr = $_POST["txtamtothr"];
		
		//$chkcancel = $_POST["chkcancel"];
		//$dtcancel = date('Y-m-j',strtotime($_POST["dtcancel"]));
		if(isset($_POST["chkcancel"]) == '1'){ $chkcancel = '1';} else { $chkcancel = '0';}
		if($_POST["dtcancel"]=='') $dtcancel = '0000-00-00'; else $dtcancel = date('Y-m-j',strtotime($_POST["dtcancel"]));
		$canceluser = $_POST["txtuser"];
		$cancelcomment = $_POST["txtcomment"];
		
		$sql = "update pmt_tax_inv SET 
				pmt_receive_from = ".$this->db->escape($receivefrom).",
				pmt_addr = '$addr',
				clab_no = '$clabno',
				country = '$country',
				payment_type = '$paymenttype',
				no_of_fcl = '$fcl',
				fine_ref = '$fineref',
				pmt_datecreated='$datecreated',
				pmt_wd_date = '$dtcancel',
				pmt_withdraw = '$chkcancel',
				pmt_wd_by = '$canceluser',
				pmt_wd_comment = '$cancelcomment',
				chk_fomema_male='$chkfomemamale',					
				fomema_amounto='$amtfomo',
				fomema_amountg='$amtfomg',
				fomema_amount='$amtfom',
				fomema_fee='$fomfee',
				chk_ins_ig='$chkinsig',
				chk_ins_fwcs='$chkinsfwcs',
				chk_ins_fwhs='$chkinsfwhs',
				ins_amount_ig='$amtig',
				ins_amount_fwcs='$amtfwcs',
				ins_amount_fwhs='$amtfwhs',
				ins_amount='$amtins',
				ins_amount_o='$amtinso',
				ins_amount_g='$amtinsg',
				ins_amount_p='$amtinsp',
				ins_policy_ig='$polig',
				ins_policy_fwcs='$polfwcs',
				ins_policy_fwhs='$polfwhs',
				chk_others_fees='$chkothersfees',
				remarks_others='$rmkothr',
				others_amount_o='$othersamount_o',
				others_amount_t='$othersamount_t',
				others_amount='$amtothr' 				
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
		
	 function updatepaymentrcpt(){
		    
			//$woid = $_POST["txtwoid"];
		    //$wono = $_POST["txtwono"];
						
		    $pmtno = $_POST["txtpmtno"];			
			$currentuser = $this->session->userdata('username');
			$datemodified = date('Y-m-j',strtotime($_POST["txtmodifieddate"]));			
		    $datecreated = date('Y-m-j',strtotime($_POST["txtcreateddate"]));
			$receivefrom = $_POST["txtrecfrom"];
			$addr = $_POST["txtaddr1"];
			if(isset($_POST["chkcancel"]) == '1'){ $chkcancel = '1';} else { $chkcancel = '0';}
			if($_POST["dtcancel"]=='') $dtcancel = '0000-00-00'; else $dtcancel = date('Y-m-j',strtotime($_POST["dtcancel"]));
			$clabpa = $_POST["txtpaclab"];
			$paymenttype= $_POST["optpmttype"];
			$country = $_POST["txtcountry"];
			$canceluser = $_POST["txtuser"];
			$cancelcomment = $_POST["txtcomment"];
			$visaref = $_POST["txtvisa"];
			$fineref = $_POST["txtfine"];
			if(isset($_POST["txtfcl"]) == ""){ $fcl = 0;} else { $fcl = $_POST["txtfcl"];}
			if(isset($_POST["txtamtdisc"]) == ""){ $disc = 0;} else { $disc = $_POST["txtamtdisc"];}
			$rmkdisc = $_POST["txtrmkdisc"];
		/*-----------------------------------------------*/
			
			$clabchqno = $_POST["txtchqclab"];
			if(isset($_POST["txtadmfees"]) == '1'){ $chkclabfees = '1';} else{ $chkclabfees = '0';}
			if(isset($_POST["txtsitcent"]) == '1'){ $chkclabtsitcent = '1';} else{ $chkclabtsitcent = '0';}
			if(isset($_POST["txtgrncad"]) == '1'){ $chkclabgrncad = '1';} else{ $chkclabgrncad = '0';}	
			$clabadmfee = $_POST["txtclabadmfee"];
			$clabtcfee = $_POST["txtclabtcfee"];
			$clabgcfee = $_POST["txtclabgcfee"];			
			$clabamount = $_POST["txtamtclab"];
			$clabamountonly = $_POST["txtamtclab_only"];
			$clabamounttax = $_POST["txtamtclab_tax"];
			
			$clabchqren = $_POST["txtchqclabren"];
			if(isset($_POST["txtadmfeesext"]) == '1'){ $chkclabfeesext = '1';} else{ $chkclabfeesext = '0';}
			if(isset($_POST["txtadmfeesextgc"]) == '1'){ $chkclabfeesextgc = '1';} else{ $chkclabfeesextgc = '0';}
			$clabrenfee = $_POST["txtclabrenfee"];
			$clabrengcfee = $_POST["txtclabrengcfee"];
			$amtclabren = $_POST["txtamtclabren"];
			$amtclabreno = $_POST["txtamtclabren_o"];
			$amtclabrent = $_POST["txtamtclabren_t"];
			
			$chqcontreg = $_POST["txtchqcontreg"];
			if(isset($_POST["txtcontreg1"]) == '1'){ $chkcontreg1 = '1';} else{ $chkcontreg1 = '0';}
			if(isset($_POST["txtcontreg2"]) == '1'){ $chkcontreg2 = '1';} else{ $chkcontreg2 = '0';}
			if(isset($_POST["txtcontreg3"]) == '1'){ $chkcontreg3 = '1';} else{ $chkcontreg3 = '0';}
			$contregfee = $_POST["txtclabregfee"];
			$amtcontreg = $_POST["txtamtreg"];
			$amtcontrego = $_POST["txtamtreg_o"];
			$amtcontregt = $_POST["txtamtreg_t"];
			
			$chqcontren = $_POST["txtchqcontren"];
			if(isset($_POST["txtcontren1"]) == '1'){ $chkcontren1 = '1';} else{ $chkcontren1 = '0';}
			if(isset($_POST["txtcontren2"]) == '1'){ $chkcontren2 = '1';} else{ $chkcontren2 = '0';}
			if(isset($_POST["txtcontren3"]) == '1'){ $chkcontren3 = '1';} else{ $chkcontren3 = '0';}
			$contrenfee = $_POST["txtcontrenfee"];
			$amtcontren = $_POST["txtamtcontren"];
			$amtcontreno = $_POST["txtamtcontren_o"];
			$amtcontrent = $_POST["txtamtcontren_t"];
			
			$chqrehire = $_POST["txtchqrehire"];
			if(isset($_POST["txtrehire1"]) == '1'){ $chkrehire1 = '1';} else{ $chkrehire1 = '0';}
			if(isset($_POST["txtrehire2"]) == '1'){ $chkrehire2 = '1';} else{ $chkrehire2 = '0';}
			$clabrehfee = $_POST["txtclabrehfee"];
			$amtrehire = $_POST["txtamtrehire"];
			$amtrehireo = $_POST["txtamtrehire_o"];
			$amtrehiret = $_POST["txtamtrehire_t"];

			$localchqno = $_POST["txtchqclabloc"];
			if(isset($_POST["txtlocald"]) == '1'){ $chklocaldis= '1';} else{ $chklocaldis = '0';}
			if(isset($_POST["txtlocalr"]) == '1'){ $chklocalreim= '1';} else{ $chklocalreim = '0';}	
			$clablwfee = $_POST["txtclablwfee"];			
			$localamount = $_POST["txtamtlocal"];
			$localamounto = $_POST["txtamtlocal_o"];
			$localamountt = $_POST["txtamtlocal_t"];
			
			$chqgreen = $_POST["txtchqgreen"];
			if(isset($_POST["txtgreenw"]) == '1'){ $chkgreenw= '1';} else{ $chkgreenw = '0';}
			if(isset($_POST["txtgreenr"]) == '1'){ $chkgreenr= '1';} else{ $chkgreenr = '0';}
			$clabgreenfee = $_POST["txtclabgreenfee"];
			$amtgreen = $_POST["txtamtgreen"];
			$amtgreeno = $_POST["txtamtgreen_o"];
			$amtgreent = $_POST["txtamtgreen_t"];
			
			$chqclabfee = $_POST["txtchqclabfee"];
			if(isset($_POST["txtmember"]) == '1'){ $chkmember= '1';} else{ $chkmember = '0';}
			if(isset($_POST["txtintro"]) == '1'){ $chkintro= '1';} else{ $chkintro = '0';}
			$clabfee = $_POST["txtclabfee"];
			$amtclabfee = $_POST["txtamtclabfee"];
			$amtclabfeeo = $_POST["txtamtclabfee_o"];
			$amtclabfeet = $_POST["txtamtclabfee_t"];
			
			$jimchqno = $_POST["txtchqjim"];
			if(isset($_POST["txtjimplks"]) == '1'){ $chkjimplks = '1';} else{ $chkjimplks = '0';}
			if(isset($_POST["txtjimfees"]) == '1'){ $chkjimfees = '1';} else{ $chkjimfees = '0';}
			if(isset($_POST["txtjimvisa"]) == '1'){ $chkjimvisa = '1';} else{ $chkjimvisa = '0';}
			if(isset($_POST["txtjimlevi"]) == '1'){ $chkjimlevi = '1';} else{ $chkjimlevi  = '0';}
		 	if(isset($_POST["txtjimlevi2"]) == '1'){ $chkjimlevi2 = '1';} else{ $chkjimlevi2  = '0';}
		 	if(isset($_POST["txtjimlevi3"]) == '1'){ $chkjimlevi3 = '1';} else{ $chkjimlevi3  = '0';}
			if(isset($_POST["txtjimsp"]) == '1'){ $chkjimsp = '1';} else{ $chkjimsp = '0';}
			if(isset($_POST["txtjimcp"]) == '1'){ $chkjimcp = '1';} else{ $chkjimcp = '0';}		
			if(isset($_POST["txtjimcompund"]) == '1'){ $chkjimcompound = '1';} else{ $chkjimcompound = '0';}				
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
			$fomemaamount = $_POST["txtamtfomema"];
			$fomemaamounto = $_POST["txtamtfomema_o"];
			$fomemaamountt = $_POST["txtamtfomema_t"];
			
			$inschqno = $_POST["txtchqins"];
			if(isset($_POST["txtig"]) == '1'){ $chkinsig = '1';} else{ $chkinsig  = '0';}
			if(isset($_POST["txtFWCS"]) == '1'){ $chkinsfwcs = '1';} else{ $chkinsfwcs = '0';}
			if(isset($_POST["txtFWHS"]) == '1'){ $chkinsfwhs = '1';} else{ $chkinsfwhs = '0';}
			$insamounto = $_POST["txtamtins_o"];
			$insamountt = $_POST["txtamtins_t"];
			$insamount = $_POST["txtamtins"];
			$insamountig = $_POST["txtamtins_ig"];
			$insamountfwcs = $_POST["txtamtins_fwcs"];
			$insamountfwhs = $_POST["txtamtins_fwhs"];
			$transfees = $_POST["txttc_fees"];
			//$transcost = $_POST["txttc_cost"];
			
			$agencychqno = $_POST["txtchqagency"];
			if(isset($_POST["txtagencyfees"]) == '1'){ $chkagencyfees = '1';} else{ $chkagencyfees = '0';}
			if(isset($_POST["txtagencyfeesgc"]) == '1'){ $chkagencyfeesgc = '1';} else{ $chkagencyfeesgc = '0';}
			$clabtransfee = $_POST["txtclabtransfee"];
			$clabtransgcfee = $_POST["txtclabtransgcfee"];
			$agencyamount = $_POST["txtamtagency"];
			$agencyamounto = $_POST["txtamtagency_o"];
			$agencyamountt = $_POST["txtamtagency_t"];

			$otherschqno = $_POST["txtchqothr"];
			if(isset($_POST["txtothersfees"]) == '1'){ $chkothersfees = '1';} else{ $chkothersfees = '0';}
			if(isset($_POST["txtothersfees2"]) == '1'){ $chkothersfees2 = '1';} else{ $chkothersfees2 = '0';}
		 	if(isset($_POST["txtDeposit"]) == '1'){ $chkdepfees = '1';} else{ $chkdepfees = '0';}
		 	$depref = $_POST["txtdepfees"];	
			$othersamount = $_POST["txtamtothr"];
			$othersamount_o = $_POST["txtamtothr_o"];
			$othersamount_t = $_POST["txtamtothr_t"];
			$paymenttype= $_POST["optpmttype"];
			$remarksothers = $_POST["txtothremarks"];
			$visaref = $_POST["txtvisa"];
			$fineref = $_POST["txtfine"];	
			$transcostref = $_POST["txttranscost"];
			$transfeesref = $_POST["txttransfees"];

						
			$sql = "update pmt_receipt_new set 
			        
					pmt_receive_from = ".$this->db->escape($receivefrom).",
					payment_type = '$paymenttype',
					pmt_addr = '$addr',
					pmt_datemodified = '$datemodified',
					pmt_modifiedby = '$currentuser',
					clab_pa_no ='$clabpa',
					no_of_fcl = '$fcl',
					country = '$country',
					amt_disc = '$disc',
					rmk_disc = '$rmkdisc',
					
					visa_ref = '$visaref',
					fine_ref = '$fineref',
					trans_cost_ref = '$transcostref',
			        trans_fees_ref = '$transfeesref',					
					
					pmt_chq_clab = '$clabchqno',
					chk_clab_fees = '$chkclabfees',
					chk_clab_tsitcent='$chkclabtsitcent',
					chk_clab_grncad='$chkclabgrncad',
					clab_adm_fee = '$clabadmfee',
					clab_gc_fee = '$clabgcfee',
					clab_tc_fee = '$clabtcfee',
					clab_amount='$clabamount',
					clab_amount_only='$clabamountonly',
					clab_amount_tax='$clabamounttax',

					pmt_chq_clab_ren='$clabchqren',
					chk_clab_fees_ext='$chkclabfeesext',
					chk_clab_fees_extgc='$chkclabfeesextgc',
					clab_ren_fee='$clabrenfee',
					clab_rengc_fee='$clabrengcfee',
					amt_clabren='$amtclabren',
					amt_clabreno='$amtclabreno',
					amt_clabrent='$amtclabrent',
					
					chqno_contreg='$chqcontreg',
					chk_contreg1='$chkcontreg1',
					chk_contreg2='$chkcontreg2',
					chk_contreg3='$chkcontreg3',
					clab_contreg_fee='$contregfee',
					amt_contreg='$amtcontreg',
					amt_contrego='$amtcontrego',
					amt_contregt='$amtcontregt',
					
					chqno_contren='$chqcontren',
					chk_contren1='$chkcontren1',
					chk_contren2='$chkcontren2',
					chk_contren3='$chkcontren3',
					clab_contren_fee='$contrenfee',
					amt_contren='$amtcontren',
					amt_contreno='$amtcontreno',
					amt_contrent='$amtcontrent',
					
					chqno_rehire='$chqrehire',
					chk_rehire1='$chkrehire1',
					chk_rehire2='$chkrehire2',
					clab_reh_fee='$clabrehfee',
					amt_rehireo='$amtrehireo',
					amt_rehiret='$amtrehiret',
					amt_rehire='$amtrehire',

					pmt_chq_local='$localchqno',
					chk_local_dis='$chklocaldis',
					chk_local_reim='$chklocalreim',
					clab_lw_fee='$clablwfee',
					local_amounto='$localamounto',
					local_amountt='$localamountt',
					local_amount='$localamount',
					
					pmt_chk_green='$chqgreen',
					chk_green_new='$chkgreenw',
					chk_green_ren='$chkgreenr',
					clab_green_fee='$clabgreenfee',
					amt_greencard='$amtgreen',
					amt_greencardo='$amtgreeno',
					amt_greencardt='$amtgreent',

					chqno_clabfee='$chqclabfee',
					chk_member='$chkmember',
					chk_intro='$chkintro',
					clab_fee='$clabfee',
					amt_clabfee='$amtclabfee',
					amt_clabfeeo='$amtclabfeeo',
					amt_clabfeet='$amtclabfeet',
					
					pmt_chq_jim='$jimchqno',
					chk_jim_plks='$chkjimplks',
					chk_jim_fees='$chkjimfees',
					chk_jim_visa='$chkjimvisa',
					chk_jim_levi='$chkjimlevi',
					chk_jim_levi2='$chkjimlevi2',
					chk_jim_levi3='$chkjimlevi3',
					chk_jim_sp='$chkjimsp',
					chk_jim_cp='$chkjimcp',
					chk_jim_compound='$chkjimcompound',
					jim_amount='$jimamount',
					jim_amount_visa='$jimamountvisa',
					jim_amount_sp='$jimamountsp',
					jim_amount_cp='$jimamountcp',
					jim_amount_compound='$jimamountcompound',
					jim_amount_plks='$jimamountplks',
					jim_amount_fees='$jimamountfees',
					jim_amount_levi='$jimamountlevi',
					
					pmt_chq_fomema='$fomemachqno',
					chk_fomema_male='$chkfomemamale',
					chk_fomema_female='$chkfomemafemale',
					fomema_amount='$fomemaamount',
					fomema_amounto='$fomemaamounto',
					fomema_amountt='$fomemaamountt',
					
					ins_chq_no='$inschqno',
					chk_ins_ig='$chkinsig',
					chk_ins_fwcs='$chkinsfwcs',
					chk_ins_fwhs='$chkinsfwhs',
					ins_amount='$insamount',
					ins_amounto='$insamounto',
					ins_amountt='$insamountt',
					ins_amount_ig='$insamountig',
					ins_amount_fwcs='$insamountfwcs',
					ins_amount_fwhs='$insamountfwhs',
					
					agency_chq_no='$agencychqno',
					chk_agency_fees='$chkagencyfees',
					chk_agency_feesgc='$chkagencyfeesgc',
					clab_trans_fee='$clabtransfee',
					clab_transgc_fee='$clabtransgcfee',
					agency_amount='$agencyamount',
					agency_amounto='$agencyamounto',
					agency_amountt='$agencyamountt',
					transit_fees='$transfees',
					
					others_chq_no='$otherschqno',
					chk_others_fees='$chkothersfees',
					chk_others_fees2='$chkothersfees2',
					chk_dep_fee='$chkdepfees',
					depref='$depref',
					others_amount='$othersamount',
					others_amount_o='$othersamount_o',
					others_amount_t='$othersamount_t',
					payment_type='$paymenttype',
					remarks_others = '$remarksothers',
					
					visa_ref='$visaref',
					fine_ref='$fineref',
					regional_id='$regionalid',
					trans_fees_ref='$transfeesref',
					trans_cost_ref='$transcostref',
					clab_no='$clabno',					
					pmt_wd_date = '$dtcancel',
					pmt_withdraw = '$chkcancel',
					pmt_wd_by = '$canceluser',
					pmt_wd_comment = '$cancelcomment'
					where pmt_receipt_no = '$pmtno'";
													
			
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
		 
		redirect('contPayment/GetPaymentReceipt/'.$pmtno.'/update');		
			
			
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
	 
	 function savepaymentlocal(){
		
		$contractorid = $_POST["id"];
		$datecreated  = date('Y-m-d', strtotime($_POST["txtcreateddate"]));
		$attn = $_POST["txtattn"];
		$pm_id = $this->ModelPayment->getNextPaymentNo();
		$pm_firstpart = "00000" . $pm_id;
		$pmno = "P/LOCAL/".substr($pm_firstpart, -6);
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
				   ('$pmno','$datecreated','$contractorid','$attn','LW',".$this->db->escape($contractorname).",'$addr1','$addr2',
				    '$addr3','$tel','$fax','$state','$postcode')";	
		
		$this->db->trans_begin();
		$this->db->query($pmquery);
		
		if($this->db->trans_status() === FALSE)
		  {
		   $this->db->trans_rollback();
		  }else{
    	   $this->db->trans_commit();
		   }
		 
		 redirect('contPayment/GetPaymentDetailsLocal/'.$pmno.'/add');
		
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
	 
	 
	 function UpdatePaymentLW(){
	    
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
		 
		 redirect('contPayment/GetPaymentDetailsLocal/'.$pmno);				  
	 
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
	 
	 function GetPaymentDetailsLocal(){
	    
		 $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);		
	     $data['allPaymentFCL'] = $this->ModelPayment->getAlllocalpaymentbyPMNO($pmno);
		 $data['PMrow'] = $this->ModelPayment->getPaymentByID($pmno);  
		 $this->load->view('payment/localpayment_2',$data);
	 
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
	 
	 
	  function ListallpaymentLocal(){
	 
	 /********Grid for labor list*******/
			$css_src = $this->rapyd->get_elements_path("css/sippsstyle.css","css");
			$this->rapyd->load("datafilter","datagrid");
		    $this->rapyd->uri->keep_persistence();
			
		    //grid
		    $grid = new DataGrid("", "pmt_advise");
		    $grid->db->join("pmt_type","pmt_advise.pmt_type = pmt_type.pmt_type_id","LEFT");
			//$grid->db->join("pmt_fcl","pmt_advise.pmt_no = pmt_fcl.pmt_no", "LEFT");
		    $grid->db->where("pmt_type ='LW'");
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
		 	$link_edit = anchor("$baseuri/GetPaymentDetailsLocal/<#pmt_no#>","<#pmt_no#>");
		 	
			$grid->column("PAYMENT NO.","$link_edit", 'width="50"');
			$grid->column("COMPANY NAME","pmt_compname");
			$grid->column("DATE ISSUE","pmt_dateissue");
			$grid->column("FCL","pmt_fcl_no");
			//$grid->column("PAYMENT TYPE","pmt_type_desc");
						
  			$grid->build();

		    $data["crud"] = $grid->output;
		    /**********end grid****************/
		    			
			$this->load->view('payment/payment_list_local', $data);	
	 
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
	 
	 function addlocalworker(){
	        
			$pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
	        $data['allPaymentFCL'] = $this->ModelPayment->getAlllocalpaymentbyPMNO($pmno);
	        $data['pmno'] = $pmno;
	        $this->load->view('payment/add_local_fcl',$data);	
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
	 
	  function editlocalworker(){
	        
			$id = $this->uri->segment(3);
			$data['strhide'] = "update";
	        $data['dataFCL'] = $this->ModelPayment->getAlllocaldatabyid($id);
	        $this->load->view('payment/edit_local_fcl',$data);	
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
			//$transfees = $_POST["txttransitfees"];
			//$transcost = $_POST["txttransitcost"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtadmin = $_POST["txtadmin"];
			$pmtfomema = $_POST["txtfomema"];
			$pmtgreen = $_POST["txtgreen"];
			$pmttransit = $_POST["txtransit"];
			$pmtothers = $_POST["txtothers"];
			
			$pmtquery = "insert into pmt_fcl 
			             (pmt_no,pmt_cty_id,pmt_cty_desc,pmt_fcl_no,pmt_levi,pmt_plks,pmt_visa,pmt_fees,pmt_period,pmt_jim,pmt_wages,
						 pmt_ig,pmt_fwcs,pmt_fwhs,pmt_admin,pmt_fomema,pmt_green,pmt_transit,pmt_others)
						 values
						 ('$pmno','$cityid','$citydesc','$nooffcl','$pmtlevi','$pmtplks','$pmtvisa','$pmtfees','$pmtperiod','$pmtjim','$pmtwages',
						 '$pmtig','$pmtfwcs','$pmtfwhs','$pmtadmin','$pmtfomema','$pmtgreen','$pmttransit','$pmtothers')";
					
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
		 	$pmtfomema2 = $_POST["txtfomema2"];
			$pmtgreen = $_POST["txtgreen"];
			$pmttransit = $_POST["txtransit"];
			$pmtothers = $_POST["txtothers"];
					
			$pmtquery = "insert into pmt_fcl 
			             (pmt_no,pmt_cty_id,pmt_cty_desc,pmt_fcl_no,pmt_levi,pmt_plks,pmt_visa,pmt_fees,pmt_period,pmt_jim,pmt_wages,
						  pmt_ig,pmt_fwcs,pmt_fwhs,pmt_admin,pmt_fomema ,pmt_fomema2 ,pmt_green,pmt_transit,pmt_compound,pmt_sp,pmt_others)
						 values
						 ('$pmno','$cityid','$citydesc','$nooffcl','$pmtlevi','$pmtplks','$pmtvisa','$pmtfees','$pmtperiod','$pmtjim',$pmtwages,
						 '$pmtig','$pmtfwcs','$pmtfwhs','$pmtadmin','$pmtfomema','$pmtfomema2','$pmtgreen','$pmttransit','$pmtcomp','$pmtsp','$pmtothers')";
					
			 $this->db->trans_begin();
		     $this->db->query($pmtquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
		     $data['pmno'] = $pmno;
			 $data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
             $this->load->view('payment/add_ext_fcl', $data);		 
			
	 }
	 
	 
	 function savefcllocal(){
	 
	        $pmno = $_POST["txtpmno"];
			$nooflist = $_POST["txtnolist"];
			$nooffcl = $_POST["txtnofcl"];
			$pmtadv = $_POST["txtadv"];
			$pmtphone = $_POST["txtphone"];
			$pmttravel= $_POST["txtravel"];
			$pmtint = $_POST["txtint"];
			$pmtdata = $_POST["txtdata"];
			$pmtphoto = $_POST["txtpho"];
			
					
			$pmtquery = "insert into pmt_local
			             (pmt_no,pmt_fcl_no,pmt_list_no,pmt_adv,pmt_phone,pmt_travel,pmt_int,pmt_data,pmt_photo)
						 values
						 ('$pmno','$nooffcl','$nooflist','$pmtadv','$pmtphone','$pmttravel',
						 '$pmtint','$pmtdata','$pmtphoto')";
					
			 $this->db->trans_begin();
		     $this->db->query($pmtquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
		     $data['pmno'] = $pmno;
			 $data['successMsg'] = "New FCL was succesfully added. You may insert another FCL now.";
             $this->load->view('payment/add_local_fcl', $data);		 
			
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
		    $pmtfomema2 = $_POST["txtfomema2"];
			$pmtadmin = $_POST["txtadmin"];
			$pmtgreen = $_POST["txtgreen"];
			$pmttransit = $_POST["txtransit"];
			$pmtothers = $_POST["txtothers"];
			
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
						pmt_ig = '$pmtig',
						pmt_fwcs= '$pmtfwcs',
						pmt_fwhs= '$pmtfwhs',
						pmt_fomema = '$pmtfomema',
						pmt_fomema2 = '$pmtfomema2',
						pmt_admin = '$pmtadmin',
						pmt_compound = '$pmtcomp',
						pmt_sp = '$pmtsp',
						pmt_green = '$pmtgreen',
						pmt_others = '$pmtothers',
						pmt_transit = '$pmttransit'
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
			//$transfees = $_POST["txttransitfees"];
			//$transcost = $_POST["txttransitcost"];
			$pmtig = $_POST["txtig"];
			$pmtfwcs = $_POST["txtfwcs"];
			$pmtfwhs = $_POST["txtfwhs"];
			$pmtfomema = $_POST["txtfomema"];
		 	$pmtfomema2 = $_POST["txtfomema2"];
			$pmtadmin = $_POST["txtadmin"];
			$pmtgreen = $_POST["txtgreen"];
			$pmttransit = $_POST["txtransit"];
			$pmtothers = $_POST["txtothers"];
			
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
						pmt_ig = '$pmtig',
						pmt_fwcs= '$pmtfwcs',
						pmt_fwhs= '$pmtfwhs',
						pmt_fomema = '$pmtfomema',
						pmt_fomema2 = '$pmtfomema2',
						pmt_admin = '$pmtadmin',
						pmt_green = '$pmtgreen',
						pmt_others = '$pmtothers',
						pmt_transit = '$pmttransit'
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
	 
	 function Updatelocalworker(){
	         
			$id = $_POST["txtid"]; 
			$pmno = $_POST["txtpmno"];
			$nooflist = $_POST["txtnolist"];
			$nooffcl = $_POST["txtnofcl"];
			$pmtadv = $_POST["txtadv"];
			$pmtphone = $_POST["txtphone"];
			$pmttravel= $_POST["txtravel"];
			$pmtint = $_POST["txtint"];
			$pmtdata = $_POST["txtdata"];
			$pmtphoto = $_POST["txtphoto"];
			
			$sqlquery = "Update pmt_local set 
			            pmt_list_no = '$nooflist',
						pmt_fcl_no = '$nooffcl',
						pmt_adv = '$pmtadv',
						pmt_phone = '$pmtphone',
						pmt_travel = '$pmttravel',
						pmt_int= '$pmtint',
						pmt_data = '$pmtdata',
						pmt_photo = '$pmtphoto'";
						
			 
			 $this->db->trans_begin();
		     $this->db->query($sqlquery);	
             $this->db->trans_commit();		
			 
			 $data['strhide'] = "update";
			 $data['pmno'] = $pmno;
			 $data['dataFCL'] = $this->ModelPayment->getAlllocaldatabyid($id);
			 $data['successMsg'] = "Local Worker was succesfully Update.";
             $this->load->view('payment/edit_local_fcl', $data);				
						
	 
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
	
	
	function displayprintlocal(){
	         $pmno = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
			 $type = $this->uri->segment(4);
	         $data['display'] = $this->ModelPayment->getAllPrint($pmno);
			 $data['fcl'] = $this->ModelPayment->getAllPrintLocal($pmno);
			 $this->load->view('payment/printadviseloc', $data);
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

function Deletelw(){
	
	    $id = $this->uri->segment(3);
				
		$sql = "delete from pmt_local where id = '$id'";
		$this->db->trans_begin();
		$this->db->query($sql);	
        $this->db->trans_commit();
		
		$data['strhide'] = "delete";
		$data['successMsg'] = "FCL was succesfully Delete.";        
		$this->load->view('payment/edit_local_fcl', $data);
	
	}

}
?>		