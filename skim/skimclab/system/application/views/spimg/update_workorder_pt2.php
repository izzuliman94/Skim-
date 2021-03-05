<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<!--new calendar-->
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript">
function datebutton_onclick(elementId, thisRef)
{
	switch (scwVisibilityStatus)
	{
		case "hidden":
			scwShow(document.getElementById(elementId), thisRef);
			this.disabled=true;
			break;
		case "visible":
			scwHide();
	}
}

function popupwindow(url, title, w, h) 
{
  var left = (screen.width/2)-(w/2);
  var top = (screen.height/2)-(h/2);
  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

</script>	
<script type="text/javascript">

    function checkreplacement(rep){
	
	if(document.updateWorkorderForm.chkisreplace.checked == true){
	   
	   document.updateWorkorderForm.dtsignedpay.value = "";
	   document.updateWorkorderForm.dtsupagree.value = "";
	   document.updateWorkorderForm.dtempletter.value = "";
	   document.updateWorkorderForm.dtcompletedoc.value = "";
	   document.updateWorkorderForm.dtaccopic.value = "";
	   document.updateWorkorderForm.dtawardletter.value = "";
	   document.updateWorkorderForm.dtreqform.value = "";
	   document.updateWorkorderForm.chksignedpay.checked = false;
	   document.updateWorkorderForm.chksupagree.checked = false;
	   document.updateWorkorderForm.chkempletter.checked = false;
	   document.updateWorkorderForm.chkaccopic.checked = false;
	   document.updateWorkorderForm.chkawardletter.checked = false;
	   document.updateWorkorderForm.chkreqform.checked = false;
	   document.updateWorkorderForm.chksupagree.disabled = true;
	   document.updateWorkorderForm.chkempletter.disabled = true;
	   document.updateWorkorderForm.chkaccopic.disabled = true;
	   document.updateWorkorderForm.chkawardletter.disabled = true;
	   document.updateWorkorderForm.chkreqform.disabled = true;
	   document.updateWorkorderForm.btnselall.disabled = true;
	   
	}else{
	   
	   document.updateWorkorderForm.dtsignedpay.value = "";
	   document.updateWorkorderForm.dtsupagree.value = "";
	   document.updateWorkorderForm.dtempletter.value = "";
	   document.updateWorkorderForm.dtcompletedoc.value = "";
	   document.updateWorkorderForm.dtaccopic.value = "";
	   document.updateWorkorderForm.dtawardletter.value = "";
	   document.updateWorkorderForm.dtreqform.value = "";
	   document.updateWorkorderForm.chksignedpay.checked = false;
	   document.updateWorkorderForm.chksupagree.checked = false;
	   document.updateWorkorderForm.chkempletter.checked = false;
	   document.updateWorkorderForm.chkaccopic.checked = false;
	   document.updateWorkorderForm.chkawardletter.checked = false;
	   document.updateWorkorderForm.chkreqform.checked = false;
	   document.updateWorkorderForm.chksupagree.disabled = false;
	   document.updateWorkorderForm.chkempletter.disabled = false;
	   document.updateWorkorderForm.chkaccopic.disabled = false;
	   document.updateWorkorderForm.chkawardletter.disabled = false;
	   document.updateWorkorderForm.chkreqform.disabled = false;
	   document.updateWorkorderForm.btnselall.disabled = false;
	
	}
	
	}

	function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			//get date
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth() + 1
			tyear = today.getFullYear()
			
			txtbox.value=document.updateWorkorderForm.currentuser.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
		}
		else {
			txtbox.value=""
			datebox.value=""
		}
	}
	
	function Inspchs(){
	 
	 var workorderid = document.updateWorkorderForm.workorderno.value
	 var url = "<?php echo site_url('contSpimG/email_item');?>/" + workorderid 
	 window.open(url, 'Insurance Purchase', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	}
	
	function fclmax(m){
		if(m>10){alert('Max of FCL no is 10 person');document.updateWorkorderForm.txtfcltotal.value='';document.updateWorkorderForm.txtfcltotal.focus();}
	}
	
	/*function handover(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpimG/handoverletter');?>/" + wono + "/" + workorderid
	   window.open(url,'handover letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function pengesahan(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpimG/confirmletter');?>/" + wono + "/" + workorderid
	   window.open(url,'confirm letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}*/
	
	function openuploadwindow(){
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value	
		var url = "<?php echo site_url('contSpimG/uploadDocView');?>/" + workorderid + "/" + companyname		
		//window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
		popupwindow(url,'Upload Document FCL',600, 300);
	}
	
	function newphtracklog(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contSpimG/newPhoneTrackLog');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Workorder Reject History', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	/*function registerNewLabor(){
		var avlabrefno = document.updateWorkorderForm.workorderno.value
		window.open('<?php echo site_url();?>/contavailable/regisNewLabourPt1/' + avlabrefno, 'Register new labour', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}*/
	
		function registerNewLegal(){
		//var wono = document.updateWorkorderForm.workorderno.value
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var currentuser = document.updateWorkorderForm.currentuser.value;
		var wono = document.updateWorkorderForm.txtwoid.value;
		
		var url = "<?php echo site_url('contSpimG/regnewlegal');?>/" + workorderid + "/" + companyname + "/" + currentuser + "/" + wono
		//window.open(url, 'Register new legal', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		popupwindow(url,'Register new Legal',600, 300);
	}
	
	/* Enhancement of SKIM for G1G3 (START) */
	function registerNewLabor(){
		var workorderid = document.updateWorkorderForm.txtwoid.value;
		var companyname = document.updateWorkorderForm.txtclabno.value;
	
		var url = "<?php echo site_url('contSpimG/regnewlabour');?>/" + workorderid + "/" + companyname
		//window.open(url, 'Register new FCL', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		popupwindow(url,'Register new FCL',600, 600);
	}
	
	function registerSiteVisit()
	{
		var workorderid = document.updateWorkorderForm.txtwoid.value;
		var clabno = document.updateWorkorderForm.txtclabno.value;
		//var companyname = document.updateWorkorderForm.txtcompname.value;
		
		var url = "<?php echo site_url('contSpimG/regsitevisit');?>/" + workorderid + "/" + clabno  // + "/" + companyname
		popupwindow(url,'Register Site Visit',700, 600);
	}
	
	function EditSiteVisit(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var clabno = document.updateWorkorderForm.txtclabno.value;
		var companyname = document.updateWorkorderForm.txtcompname.value
		
		var url = "<?php echo site_url('contSpimG/EditSiteVisit');?>/" + workorderid + "/" + clabno + "/" + companyname + "/" + id
		popupwindow(url,'Edit Site Visit',700, 600);
	}
	/* Enhancement of SKIM for G1G3 (END) */
	
	function EditFCL(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpimG/EditFCL');?>/" + workorderid + "/" + companyname + "/" + id
		//window.open(url, 'Edit FCL', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		popupwindow(url,'Edit FCL',700, 600);
		
	}
	
	function EditLegal(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpimG/EditLegal');?>/" + workorderid + "/" + companyname + "/" + id
		//window.open(url, 'Edit Legal', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		popupwindow(url,'Edit Legal',600, 450);
	}
	
    function openBatch(clabid){
		var clabid = clabid;
		var clabno = document.updateWorkorderForm.txtclabno.value
		var companyname = document.updateWorkorderForm.txtcompname.value
		
		var url = "<?php echo site_url('contSpimG/batchlistwo');?>/" + clabno + "/" + companyname
		window.open(url, 'Batch Application List', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	
	}
	
	function OpenLampiran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/lampiran_a');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenLampiranExcel(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/lampiran_a_excel');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenSecondSchedule(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/second_schedule');?>/" + wono
		window.open(url, '2nd Schedule', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenIM12(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/im12');?>/" + wono
		window.open(url, 'IM12', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenAddendum(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/addendum');?>/" + wono
		window.open(url, 'Addendum', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenBorangBayaran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/borangbayaran');?>/" + wono
		window.open(url, 'Borang Bayaran', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openack(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpimG/acknowledge');?>/" + wono
		//window.open(url,'Acknowledgement','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		popupwindow(url,'Acknowledgement',800, 600);
	}
	
	function openprintform(fclid){
	   var url = "<?php echo site_url('contSpimG/openprintform');?>/" + fclid
	   window.open(url,'Print Form','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function selectall(){	    
		document.updateWorkorderForm.chkreqform.checked = true;
		document.updateWorkorderForm.chkawardletter.checked = true;
		document.updateWorkorderForm.chkcompany.checked = true;
		document.updateWorkorderForm.chknric.checked = true;
		document.updateWorkorderForm.chkfinance.checked = true;
		document.updateWorkorderForm.chkbankstmt.checked = true;
		document.updateWorkorderForm.chkinsurance.checked = true;
		document.updateWorkorderForm.chkcert.checked = true;
		document.updateWorkorderForm.chkphoto.checked = true;
		document.updateWorkorderForm.chkcimsdoc.checked = true;
		document.updateWorkorderForm.chkreqform1.value = 1;
		document.updateWorkorderForm.chkawardletter1.value = 1;
		document.updateWorkorderForm.chkcompany1.value = 1;
		document.updateWorkorderForm.chknric1.value = 1;
		document.updateWorkorderForm.chkfinance1.value = 1;
		document.updateWorkorderForm.chkbankstmt1.value = 1;
		document.updateWorkorderForm.chkinsurance1.value = 1;
		document.updateWorkorderForm.chkcert1.value = 1;
		document.updateWorkorderForm.chkphoto1.value = 1;
		document.updateWorkorderForm.chkcimsdoc.value = 1;
		document.updateWorkorderForm.dtreqform.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtawardletter.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtcompany.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtnric.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtfinance.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtbankstmt.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtinsurance.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtcert.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtphoto.value = '<?php echo date('d-m-Y')?>';
		document.updateWorkorderForm.dtcimsdoc.value = '<?php echo date('d-m-Y')?>';	
		document.updateWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';		
	}
	
   function paymentlist(clabno){
	  var frm = "update";
	  var url = "<?php echo site_url('contSpimG/openreceipt');?>/" + frm + "/" + clabno;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
	
 
</script>  
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<?php 
$accessibility = $this->session->userdata('emp_accessibility');

if(isset($woRow->wo_isreceive) == '1' && isset($woRow->wo_isprocess) == '1'){
	
	$strver1 = "";
	$strver2 = "disabled";
	$strver3 = "disabled";
	$strprocess = "enabled";

	if($woRow->chk_ver_corp == '1'){

		$strver1 = "";
		$strver2 = "";
		$strver3 = "disabled";
		$strprocess = "enabled";

		if($woRow->chk_ver_fin == '1'){
		  
			$strver1 = "";
			$strver2 = "";
			$strver3 = "";
			$strprocess = "enabled"; 
		  
			if($woRow->chk_app_ceo == '1'){
			$strver1 = "";
			$strver2 = "";
			$strver3 = "";
			$strprocess = ""; 
			}
		}
	}	
}else{   
   $strver1 = "disabled";
   $strver2 = "disabled";
   $strver3 = "disabled";
   $strprocess = "enabled";
}
	
?>
<h4><a href="<?php echo site_url();?>/contSpimG/spimDashbrd">SPIM (G1G3)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Update Work Order </h4>

<h3 id="switchsection1-title" class="handcursor">Update Work Order<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Workorder has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">The workorder has been updated!</font></strong>";
	else { //dummy else
	};
}

//echo $woRow->doc_rqform;

	/*if(isset($woRow->wo_isreplacement) == '1'){
	     $doc = "hide";
		 $btnack = ""; 		 
		 $doc1 = "disabled=disabled";
		 $doctext = "readonly";
		 $close = "";	
		 $isrepdis = "disabled=disabled";
    }else{ */
	    if($woRow->doc_rqform == '1' && $woRow->doc_company == '1' && $woRow->doc_awardletter == '1' && $woRow->doc_nric == '1'
		   && $woRow->doc_finance == '1' && $woRow->doc_bankstmt == '1' && $woRow->doc_insurance == '1' && $woRow->doc_cert == '1'
		   && $woRow->doc_photo == '1' && $woRow->doc_cimsdoc == '1' && $woRow->doc_datecomplete != '0000-00-00')
		{
			$doc = "hide";
			$doctext = "readonly";
			$doc1 = "disabled=disabled";
			$btnack = "disabled=disabled";
			$isrepdis = "disabled=disabled";
		}else{
			$doc = "";
			$doctext = "";
			$doc1 = "";
			$btnack = "";
			$isrepdis = "";
		};
				
		if($woRow->wo_iswithdrawal == '1' && $woRow->wo_withd_date != '0000-00-00')
		{
			$close = "disabled=disabled";	
		}else{
			$close = "";	
		}	
	//}
	
	if($woRow->wo_latest_progress <> "Kelulusan JKK Pelulus"){
		$jkklulus1 = "enabled"; $jkklulus2 = "readonly";
	}else{
		$jkklulus1 = ""; $jkklulus2 = "";
	}
	
	if($woRow->wo_latest_progress == "workorder submitted")
		{$ischk1='';$ischk2='DISABLED';$ischk3='DISABLED';$ischk4='DISABLED';$ischk5='DISABLED';$ischk6='DISABLED';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Process CIMS")
		{$ischk1='CHECKED DISABLED'; $ischk2='';$ischk3='DISABLED';$ischk4='DISABLED';$ischk5='DISABLED';$ischk6='DISABLED';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Penerimaan Permohonan")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='';$ischk4='DISABLED';$ischk5='DISABLED';$ischk6='DISABLED';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Semakan")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='';$ischk5='DISABLED';$ischk6='DISABLED';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Temuduga")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='CHECKED DISABLED';$ischk5='';$ischk6='DISABLED';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Kelulusan JKK Pelulus")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='CHECKED DISABLED';$ischk5='CHECKED DISABLED';$ischk6='';$ischk7='DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='';$butdis7='DISABLED';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Labour Check-Out")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='CHECKED DISABLED';$ischk5='CHECKED DISABLED';$ischk6='CHECKED DISABLED';$ischk7='';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='';$butdis8='ENABLED';}
	elseif($woRow->wo_latest_progress == "Labour Check-In")
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='CHECKED DISABLED';$ischk5='CHECKED DISABLED';$ischk6='CHECKED DISABLED';$ischk7='CHECKED DISABLED';$ischk8='ENABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='ENABLED';}
	else
		{$ischk1='CHECKED DISABLED'; $ischk2='CHECKED DISABLED';$ischk3='CHECKED DISABLED';$ischk4='CHECKED DISABLED';$ischk5='CHECKED DISABLED';$ischk6='CHECKED DISABLED';$ischk7='CHECKED DISABLED';$ischk8='CHECKED DISABLED';
		$butdis1='DISABLED';$butdis2='DISABLED';$butdis3='DISABLED';$butdis4='DISABLED';$butdis5='DISABLED';$butdis6='DISABLED';$butdis7='DISABLED';$butdis8='DISABLED';}

?>
  <form action="<?php echo site_url();?>/contSpimG/updateWorkOrderPt2Submit" method="POST" name="updateWorkorderForm" id="updateWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
		<tr>
			<td width="15%">Workorder No</td>
			<td width="33%">
				<input type="hidden" name="txtwoid" value="<?php echo $woRow->wo_id;?>" />	
				<input type="text" name="workorderno" value="<?php if(strlen($woRow->wo_num) == 0) echo $woRow->wo_id; else echo $woRow->wo_num;?>" READONLY/></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php if($woRow->wo_datesubmit != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_datesubmit));?>" size="10" READONLY/>
		<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->		</tr>
		<tr>
			<td>Company Name</td>
			<td><p>
			  <input type="text" name="txtcompname" size="50" value="<?php echo $woRow->ctr_comp_name;?>" READONLY />
			</p></td>
			<td>CLAB No.</td>
			<td>
				<input type="text" name="txtclabno" size="10" value="<?php echo $woRow->wo_clab_no;?>" READONLY />&nbsp;
				<input type="button" name="btnbatchapp" value="Batch Application"  onclick="openBatch('<?php echo $woRow->wo_clab_no;?>')"/>
			</td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td><input type="text" name="txtcontact" size="50" value="<?php echo $woRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td><input type="text" name="txtcontactno" size="10" value="<?php echo $woRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL</td>
			<td>
				<input type="text" name="txtfcltotal" size="4" value="<?php echo $woRow->wo_fcl_total;?>" onchange="fclmax(this.value)" />&nbsp;
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>" <?php if($woRow->wo_fcl_country == $country->cty_id) echo "SELECTED";?>><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>REPLACEMENT</td>
			<td colspan="3">
				<input type="checkbox" name="chkisreplace" value="1" <?php if($woRow->wo_isreplacement == '1') echo "CHECKED";?>  onclick="checkreplacement(this.value)" />
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" value="<?php if($woRow->wo_replace_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_replace_date));?>"/>
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" value="<?php echo $woRow->wo_replace_reason;?>"/>			</td>
		</tr>
		
		<tr>
			<td>Person In Charge (CLAB)</td>
			<td><input type="text" name="txtPersonInCharge" value="<?php echo $woRow->wo_personincharge;?>" /></td>
			<td>Key In By</td>
			<td><input type="text" name="txtkeyinby" value="<?php echo $woRow->wo_keyin_by;?>" READONLY/>
				Date: <input type="text" name="dtkeyin" id="dtkeyin" value="<?php if($woRow->wo_keyin_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_keyin_date));?>" size="12" READONLY/>
					  <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" />			</td>
		</tr>
		<tr>
		   <td>Sender Name</td>
		   <td><input type="text" name="txtsendername" size="50" value="<?php echo $woRow->wo_sender_name;?>" /></td>
		   <td>Sender IC No.</td>
		   <td><input type="text" name="txtsenderic" value="<?php echo $woRow->wo_sender_ic;?>" /></td>
		</tr>
		<tr>
		  <td>Sender Contact No </td>
		  <td><input type="text" name="txtsenderctc" value="<?php echo $woRow->wo_sender_contact;?>" /></td>
		  <td>Attending Officer</td>
		  <td><input type="text" name="txtattnoff" value="<?php echo  $woRow->wo_attn_officer; ?>" size="40"/></td>		 
	  </tr>
		<tr>
		  <td> </td>
		  <td></td>
		  <td ></td>
		  <td>
			
		</td>
	  </tr>
    </table>
	<br />
	<table width="100%" border="0" cellpadding=3 style='border-style:none'>
		<tr>
			<th colspan="5" align="LEFT">PROJECT DETAIL</th>
		</tr>
		<tr>
			<td colspan=5>
				<table width="100%" cellpadding="0" border=0 style="border-collapse: collapse">
					<tr>
						<td align="LEFT" width=100px>Project Name</td>
						<td align="LEFT" width=250px><input type="text" name="txtprojname" size="60" value="<?php echo $woRow->wo_g1g3_projname;?>" /></td>
						<td align="LEFT" width=120px id="t_contdur">Contract Duration</td>
						<td align="LEFT" width=100px>			
							<SELECT name="contdur">
								<option value=''></option>
								<option value="3" <?php if($woRow->wo_contdur == "3") echo "SELECTED";?>>3</option>
								<option value="6" <?php if($woRow->wo_contdur == "6") echo "SELECTED";?>>6</option>
                                <option value="12" <?php if($woRow->wo_contdur == "12") echo "SELECTED";?>>12</option>
							</SELECT>&nbsp;month
						</td>
						<!--td align="LEFT">Levi Payable :
					    <?php if($woRow->wo_contdur == "3") echo "RM462.00";
        						  else if($woRow->wo_contdur == "6") echo "RM925.00";
        					 	  else echo "";?> </td-->
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br />
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th align="LEFT" colspan=9> REQUIRED DOCUMENTS (Comp)</th>
    		<th align="RIGHT"><input type="button" name="btnack" value="Acknowledgement" onclick="openack('<?php echo $woRow->wo_id;?>')" style='width:150px' <?php //echo $btnack ?>/><!--input type="button" name="btnUpload" value="Upload Documents" onclick="openuploadwindow();" DISABLED/--></th>
    	</tr>
    	<tr>
    		<td width=160><input type="hidden" name="chkreqform1" value=<?php echo $woRow->doc_rqform ?> ><input type="checkbox" name="chkreqform" <?php if($woRow->doc_rqform == '1') echo "CHECKED "; ?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Borang Lengkap</td>
			<td width=70><input type="text" name="dtreqform" id="dtreqform" size="8" value="<?php if($woRow->doc_rqformdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_rqformdate));?>" <?php echo $doctext ?>/></td>
			<td width=30><input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" <?php echo $doc1 ?>/></td>
    		<td width=160><input type="hidden" name="chkcompany1" value=<?php echo $woRow->doc_company ?> ><input type="checkbox" name="chkcompany" value="1" <?php if($woRow->doc_company == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Dokumen Syarikat</td>
			<td width=70><input type="text" name="dtcompany" id="dtcompany" size="8" value="<?php if($woRow->doc_company_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_company_date));?>"/></td>
			<td width=30><input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompany'), this)"  <?php echo $doc1 ?>/></td>
    		<td width=270><input type="hidden" name="chkawardletter1" value=<?php echo $woRow->doc_awardletter ?> ><input type="checkbox" name="chkawardletter" value="1" <?php if($woRow->doc_awardletter == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php	echo $isrepdis ?>/>Letter of Awards</td>
			<td width=70><input type="text" name="dtawardletter" id="dtawardletter" size="8" value="<?php if($woRow->doc_awardletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_awardletterdate));?>" <?php echo $doctext ?>/></td>
			<td width=30><input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" <?php echo $doc1 ?>/></td>
			<td>&nbsp;</td>
		</tr>
    	<tr>
    		<td><input type="hidden" name="chknric1" value=<?php echo $woRow->doc_nric ?> ><input type="checkbox" name="chknric" value="1" <?php if($woRow->doc_nric == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>IC Pemilik</td>
    		<td><input type="text" name="dtnric" id="dtnric" size="8" value="<?php if($woRow->doc_nric_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_nric_date));?>" <?php echo $doctext ?>/></td>
    		<td><input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtnric'), this)" <?php echo $doc1 ?>/></td>
			<td><input type="hidden" name="chkfinance1" value=<?php echo $woRow->doc_finance ?> ><input type="checkbox" name="chkfinance" value="1" <?php if($woRow->doc_finance == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Laporan Kewangan</td>
			<td><input type="text" name="dtfinance" id="dtfinance" size="8" value="<?php if($woRow->doc_finance_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_finance_date));?>" <?php echo $doctext ?>/></td>
			<td><input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfinance'), this)" <?php echo $doc1 ?>/></td>
			<td><input type="hidden" name="chkbankstmt1" value=<?php echo $woRow->doc_bankstmt ?> ><input type="checkbox" name="chkbankstmt" value="1" <?php if($woRow->doc_bankstmt == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?> />Penyata Bank</td>
			<td><input type="text" name="dtbankstmt" id="dtbankstmt" size="8" value="<?php if($woRow->doc_bankstmt_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_bankstmt_date));?>" <?php echo $doctext ?>/></td>
			<td><input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtbankstmt'), this)" <?php echo $doc1 ?>/></td>
			<td></td>
		</tr>
    	<tr>
    		<td><input type="hidden" name="chkinsurance1" value=<?php echo $woRow->doc_insurance ?> ><input type="checkbox" name="chkinsurance" value="1" <?php if($woRow->doc_insurance == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Insurance/SOCSO</td>
    		<td><input type="text" name="dtinsurance" id="dtinsurance" size="8" value="<?php if($woRow->doc_insurance_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_insurance_date));?>" <?php echo $doctext ?>/></td>
    		<td><input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtinsurance'), this)" <?php echo $doc1 ?>/></td>
			<td><input type="hidden" name="chkcert1" value=<?php echo $woRow->doc_cert ?> ><input type="checkbox" name="chkcert" value="1" <?php if($woRow->doc_cert == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Sijil CIDB</td>
			<td><input type="text" name="dtcert" id="dtcert" size="8" value="<?php if($woRow->doc_cert_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_cert_date));?>" <?php echo $doctext ?>/></td>
			<td><input id="button12" name="btnDate12" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcert'), this)" <?php echo $doc1 ?>/></td>
			<td><input type="hidden" name="chkphoto1" value=<?php echo $woRow->doc_photo ?> ><input type="checkbox" name="chkphoto" value="1" <?php if($woRow->doc_photo == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?> />Photo of Living Quarters and Project Site</td>
			<td><input type="text" name="dtphoto" id="dtphoto" size="8" value="<?php if($woRow->doc_photo_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_photo_date));?>" <?php echo $doctext ?>/></td>
			<td><input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtphoto'), this)" <?php echo $doc1 ?>/></td>
			<td></td>
		</tr>
    	<tr>
    	  <td><input type="hidden" name="chkcimsdoc1" value="<?php echo $woRow->doc_cimsdoc ?>" />	      <input type="checkbox" name="chkcimsdoc" value="1" <?php if($woRow->doc_cimsdoc == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>CIMS Document</td>
    	  <td><input type="text" name="dtcimsdoc" id="dtcimsdoc" size="8" value="<?php if($woRow->doc_cimsdocdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_cimsdocdate));?>" <?php echo $doctext ?>/></td>
    	  <td><input id="button" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcimsdoc'), this)" <?php echo $doc1 ?>/></td>
    	  <td colspan="7">&nbsp;</td>
  	  </tr>
    	<tr>
    		<td>Date Complete Document</td>
    		<td><input type="text" name="dtcompletedoc" id="dtcompletedoc" size="8" value="<?php if($woRow->doc_datecomplete != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_datecomplete));?>" <?php echo $doctext ?>/></td>
			<td><input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" <?php echo $doc1 ?>/></td>			
			<td colspan="7"><input type="button" name="btnselall" value="Select All" onclick="selectall()" <?php echo $isrepdis ?>/></td>
		</tr>

    </table>
   <br />
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
    	<tr>
    		<td colspan="6" id="t_payref">OFFICIAL RECEIPT NO<font color="red">*</font>.: 
			<input type="text" name="payrefno" size="50" value="<?php echo $woRow->pay_refno;?>" <?php echo $jkklulus2; ?> /><input type="button" value="..." onclick="paymentlist('<?php echo $woRow->ctr_clab_no;?>')" <?php echo $jkklulus1; ?> /></td>
    	</tr>
    	<tr>
    	  <td colspan="6" align="center">1st Payment</td>
   	  </tr>
    	<tr>
    	  <td>DEPOSIT</td>
    	  <td><SELECT name="seldeposit" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_deposit == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_deposit == "YES") echo "SELECTED";?>>YES</option>
   	      </SELECT></td>
    	  <td>Compound</td>
    	  <td><SELECT name="selcomp" <?php echo $jkklulus1; ?> />
			<option value="NO" <?php if($woRow->pay_compound == "NO") echo "SELECTED";?>>NO</option>
			<option value="YES" <?php if($woRow->pay_compound == "YES") echo "SELECTED";?>>YES</option>
   	      </SELECT></td>
    	  <td>Admin Fee</td>
    	  <td><SELECT name="seladminfee"  <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_adminfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_adminfee == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT></td>
  	  </tr>
    	<tr>
    		<td>Handling Fee</td>
    		<td><SELECT name="selhandfee"  <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_handfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_handfee == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    			
    		</td>
    		<td>Swab Test</td>
    		<td><SELECT name="selswabfee"  <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_swabfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_swabfee == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    			
    		</td>
    		<td></td>
    		<td>
    			
    		</td>
    	</tr>
    	 	<tr>
    	 	  <td colspan="6" align="center">2nd Payment</td>
   	 	  </tr>
    	 	<tr>
    		<td>Agency Fee</td>
    		<td>
    			<SELECT name="selagencyfee" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_agencyfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_agencyfee == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>FOMEMA</td>
    		<td>
    			<SELECT name="selfomema" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_fomema == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_fomema == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>VISA</td>
    		<td>
    			<SELECT name="selvisa" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_visa == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_visa == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    	</tr>
    	<tr>
    		<td>IG</td>
    		<td>
    			<SELECT name="selig" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_ig == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_ig == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>FWHS</td>
    		<td>
				<select name="selfwhs" <?php echo $jkklulus1; ?> />
				<option value="NO" <?php if($woRow->pay_fwhs == "NO") echo "SELECTED";?>>NO</option>
				<option value="YES" <?php if($woRow->pay_fwhs == "YES") echo "SELECTED";?>>YES</option>
				</select>
			</td>
			<td>LEVY</td>
    		<td><SELECT name="sellevy" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_levy == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_levy == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    			
    		</td>
    	</tr>
		<tr>
    		<td>GREEN CARD</td>
    		<td>
    			<SELECT name="selgreen" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_green == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_green == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>TRANSIT CENTRE</td>
    		<td>
				<select name="seltransit" <?php echo $jkklulus1; ?> />
					<option value="NO" <?php if($woRow->pay_transit == "NO") echo "SELECTED";?>>NO</option>
					<option value="YES" <?php if($woRow->pay_transit == "YES") echo "SELECTED";?>>YES</option>
				</select>
			</td>
			<td>PLKS</td>
    		<td><SELECT name="selplks" <?php echo $jkklulus1; ?> />
    				<option value="NO" <?php if($woRow->pay_plks == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_plks == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT></td>
    	</tr>
    </table>
      <br />
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
      	<tr>
      		<th colspan="5" align="LEFT">LIST OF FCL</th>
      		<th align="RIGHT" colspan="8">
				<input type="button" name="btnRegisNewLabour" value="Register G1G3 Labour" onclick="registerNewLabor();" style='width:160px' <?php echo $jkklulus1; ?>  />
				<!--input type="button" name="btnUploadFCL" value="Upload FCL list" class="smoothbtn1" onclick="openuploadwindow();"  /-->
			</th>
      	</tr>
      	<?php if($allFCLFiles->num_rows() == 0){ ?>
      	<tr>
      		<td colspan="10"><font color="red"><strong>No FCL lists has been insert for this workorder.</strong></font></td>
      	</tr>
      	<?php }
      	else{
	    ?>
	    <tr>
      	 	<th>No.</th>
      	 	<th>Name</th>
      	 	<th>Passport No</th>
      	 	<th>New Passport No</th>
      	 	<th>DOB</th>
      	 	<th>Nationality</th>
			<th>Next Of Kin</th>
			<th>Relationship</th>
            <th>Wages</th>
			<th>Trade</th>
			<th>Last Permit Date</th>
			<th>New Permit Date</th>
            <th align="center">Action</th>
   	    </tr>	
	    <?php $i = 1;
	      	foreach($allFCLFiles->result() as $fcl){
      	 ?>
      	 <tr>
      	 	<td><?php echo $i++;?></td>
      	 	<td><?php echo $fcl->fcl_name;?></a></td>
      	 	<td><?php echo $fcl->fcl_passno;?></td>
      	 	<td><?php echo $fcl->fcl_newpassno;?></td>
      	 	<td><?php echo $fcl->fcl_dob;?></td>
      	 	<td><?php echo $fcl->fcl_nationality;?></td>
			<td><?php echo $fcl->fcl_next_of_kin;?></td>
			<td><?php echo $fcl->fcl_relationship;?></td>
			<td><?php echo $fcl->fcl_salary;?></td>
			<td><?php echo $fcl->fcl_wt;?></td>
			<td><?php echo $fcl->fcl_plksdate1;?></td>
			<td><?php echo $fcl->fcl_plksdate2;?></td>
            <td align="center">
            <input type="button" value="Edit / Delete" onclick="EditFCL('<?php echo $fcl->fcl_id;?>')" <?php echo $jkklulus1; ?>/></td>
      	 </tr>
      	 <?php }
  	 	 }
  	 	 ?>
         <tr>
            <td colspan="13">
            <input type="button" value="Lampiran A" onclick="OpenLampiran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
			<input type="button" value="Data (Excel)" onclick="OpenLampiranExcel('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="Data QBE (Excel)" onclick="OpenLampiranExcelqbe('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
			<!--input type="button" value="2nd Schedule" onclick="OpenSecondSchedule('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="IM12" onclick="OpenIM12('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="Addendum" onclick="OpenAddendum('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> /-->
            <input type="button" value="Borang Bayaran" onclick="OpenBorangBayaran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />            </td>
         </tr>
    </table>
	<br />
	  <!-- Enhancement of SKIM for G1G3 (START) -->
	<table width="100%" border="0" cellpadding=3 style='border-style:none'>
		<tr><th colspan="6" align="LEFT">G1-G3 ATTACHMENT</th></tr>
		<tr>
			<td align=center><?php echo anchor_popup("contSpimG/printLampiran1/". $woRow->wo_id,"SENARAI SEMAK");?></td>
			<td align=center><?php echo anchor_popup("contSpimG/printLampiran2/". $woRow->wo_id,"LAPORAN LAWATAN TAPAK");?></td>
			<td align=center><?php echo anchor_popup("contSpimG/printLampiran3/". $woRow->wo_id,"DOKUMEN PERJANJIAN");?></td>
			<td align=center><?php echo anchor_popup("contSpimG/printLampiran4/". $woRow->wo_id,"BORANG PENILAIAN");?></td>
			<td align=center><?php echo anchor_popup("contSpimG/printLampiran6/". $woRow->wo_id,"BORANG PEGAMBILAN PEKERJA ASING");?></td>
			<!--td align=center><?php echo anchor_popup("contSpimG/printLampiran5/". $woRow->wo_id,"SURAT AKUAN PENERIMAAN");?></td-->
		</tr>
	</table>
	<br />
	<table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th colspan="3" align="LEFT">LAPORAN LAWATAN TAPAK</th>
            <th align="RIGHT"><input type="button" name="btnRegisNewLegal" style='width:100%' value="Register New Site Visit" onclick="registerSiteVisit();" <?php echo $close ?> <?php if($allSiteVisit->num_rows() > 0){ ?> disabled <?php }?>/></th>
    	</tr>
		<tr>
            <th width="100px">CLAB ID</th>
            <th width="400px" align=left>COMPANY NAME</th>
			<th align=left>SITE ADDRESS</th>
            <th width="160">Action</th>
        </tr>
		<?php if($allSiteVisit->num_rows() == 0){ ?>
         <tr>
      		<td colspan="4"><font color="red"><strong>No Site Visit lists has been insert for this workorder.</strong></font></td>
      	</tr>
    	<?php }else{ ?>
            <?php $i = 1;
	      	foreach($allSiteVisit->result() as $SiteVisit){
      	 ?>
   	     <tr>
      	      <td align=center><?php echo $SiteVisit->sv_clabno;?></td>
      	      <td><?php echo $SiteVisit->sv_compname;?></td>
			  <td><?php echo $SiteVisit->sv_alatap;?></td>
      	      <td align="center"><input type="button" value="Edit / Delete" onclick="EditSiteVisit('<?php echo $SiteVisit->sv_id ?>')" <?php echo $close ?>/></td>
		</tr>
		<?php }}?>
	</table>
	<br>
	<!-- Enhancement of SKIM for G1G3 (END) -->
		
	<table width="100%" border="0" cellpadding=3 style='border-style:none'>
      	<tr>
      		<th colspan="3" align="LEFT">List Of Workorder Documents</th>
      		<th align="RIGHT"><!--input type="button" name="btnRegisNewLabour" value="Register New Labour" onclick="registerNewLabor();"/-->
				<input type="button" name="btnUploadFCL" value="Upload Document"  onclick="openuploadwindow();"  style='width:160px' />
			</th>
      	</tr>
      	<?php if($allFCLUpload->num_rows() == 0){ ?>
      	<tr>
      		<td colspan="4"><font color="red"><strong>No Workorder Documents lists has been uploaded for this workorder.</strong></font></td>
      	</tr>
      	<?php }
      	else{
	    ?>
	    <tr>
      	 	<th width=40px>No.</th>
      	 	<th align=left>File Name</th>
      	 	<th width=200px align=left>Upload By</th>
      	 	<th width=160px>Date Upload</th>
   	    </tr>	
	    <?php $i = 1;
	      	foreach($allFCLUpload->result() as $file){
      	 ?>
      	 <tr>
      	 	<td align=center><?php echo $i++;?>.</td>
      	 	<td><a href="<?php echo base_url();?>uploads/spimg/<?php echo $file->upload_destfilename;?>"><?php echo $file->upload_destfilename;?></a></td>
      	 	<td><?php echo $file->emp_name;?></td>
      	 	<td align=center><?php echo date('d-m-Y', strtotime($file->upload_date));?></td>
      	 </tr>
      	 <?php }
  	 	 }
  	 	 ?>
      </table>
     
      <br />
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th colspan="4" align="LEFT">LEGAL</th>
            <th align="RIGHT"><input type="button" name="btnRegisNewLegal" style='width:100%' value="Register New Legal" onclick="registerNewLegal();" <?php echo $close ?> <?php if($allLegalFiles->num_rows() > 0){ ?> disabled <?php }?>/></th>
    	</tr>
        <tr>
            <th width="300" align=left>Agreement No</th>
            <th width="200">Reference No</th>
            <th width="150">Date</th>
            <th align=left>Remarks</th>
            <th width="160">Action</th>
        </tr>
        <?php if($allLegalFiles->num_rows() == 0){ ?>
         <tr>
      		<td colspan="5"><font color="red"><strong>No Legal lists has been insert for this workorder.</strong></font></td>
      	</tr>
    	<?php }else{ ?>
            <?php $i = 1;
	      	foreach($allLegalFiles->result() as $legal){
      	 ?>
   	     <tr>
      	      <td valign=top><?php echo $legal->wo_agg_no;?></td>
      	      <td align=center valign=top><?php echo $legal->wo_agg_ref_no;?></td>
      	      <td align=center valign=top><?php echo date('d M Y',strtotime($legal->wo_agg_date));?></td>
      	      <td valign=top><?php echo $legal->wo_agg_remarks;?></td>
      	      <td align="center" valign=top><input type="button" value="Edit / Delete" onclick="EditLegal('<?php echo $legal->wo_agg_id ?>')" <?php echo $close ?>/></td>
		</tr>
   	    <tr>
      	 	<td><input name="button4" type="button" onclick="OpenAddendum('<?php echo $woRow->wo_id; ?>')" value="Addendum" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> /></td>
      	 	<td>&nbsp;</td>
      	 	<td>&nbsp;</td>
      	 	<td>&nbsp;</td>
            <td align="center">&nbsp;</td>
      	 </tr>
        <?php }}?>
        <!--tr>
    		<td width="50%">Agreement Receive Date:</td>
    		<td><input type="text" name="dtreceiveagree" id="dtreceiveagree"  value="<?php if($woRow->legal_agree_receivedate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->legal_agree_receivedate));?>"/>
    			<input id="button12" name="btnDate12" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceiveagree'), this)" />
    		</td>
    	</tr-->
    </table>
    <br />	
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
		<tr>
			<th align="left" width="350">PROGRESS STATUS</th>
			<th align="center" width="210">PROCESSED BY</th>
			<th align="center" width="150" colspan=2>DATE</th>
			<th align="center">COMMENT</th>
		</tr>
		<tr>
			<td>Proses CIMS</td>
			<td>
				<input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" /> <!--for javascript to get currentuser-->
				<input type="hidden" name="wo_latestprogress" value="<?php echo $woRow->wo_latest_progress ?>" />
				<input name="chkisprocess" type="checkbox" id="chkisprocess" onclick="checktrigger(this, txtprocessby, dtprocess);" value="1" <?php echo $ischk1 ?> />
				<input type="text" name="txtprocessby" id="txtprocessby"  value="<?php echo $woRow->wo_processby;?>" readonly="READONLY"/>
			</td>
			<td><input type="text" name="dtprocess" size="12" id="dtprocess" value="<?php if(strlen($woRow->wo_processdate) > 0 && $woRow->wo_processdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_processdate));?>" readonly="READONLY"/></td>
			<td><input id="button12" name="button5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtprocess'), this)" <?php echo $butdis1 ?> /> </td>
			<td><input name="txtprocesscomment" type="text" id="txtprocesscomment" value="<?php echo $woRow->wo_process_comment;?>" style='width:95%' /></td>
		</tr>
		<tr>
			<td>Penerimaan Permohonan (Dokumen Wajib)</td>
			<td>
				<input type="checkbox" name="chkisreceive" value="1" onclick="checktrigger(this, txtreceiveby, dtreceive);" <?php echo $ischk2 ?> />
				<input type="text" name="txtreceiveby" id="txtreceiveby" value="<?php echo $woRow->wo_receiveby;?>" READONLY/>    		
			</td>
			<td><input type="text" name="dtreceive" size="12" id="dtreceive"  value="<?php if(strlen($woRow->wo_receivedate) > 0 && $woRow->wo_receivedate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivedate));?>" READONLY/></td>
			<td><input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceive'), this)" <?php echo $butdis2 ?> /></td>
			<td><input type="text" name="txtreceivecomment" value="<?php echo $woRow->wo_receive_comment;?>" style='width:95%'/></td>
		</tr>
		<tr>
			<td>Semakan (Cetak Borang Semakan)</td>
			<td>
				<input type="checkbox" name="chknaziran" value="1" onclick="checktrigger(this, txtnaziranby, dtnaziran);" <?php echo $ischk3 ?> />
				<input type="text" name="txtnaziranby" id="txtnaziranby" value="<?php echo $woRow->wo_naziranby;?>" READONLY/>    		
			</td>
			<td><input type="text" name="dtnaziran" size="12" id="dtnaziran"  value="<?php if(strlen($woRow->wo_nazirandate) > 0 && $woRow->wo_nazirandate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_nazirandate));?>" READONLY/></td>
			<td><input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtnaziran'), this)" <?php echo $butdis3 ?> /></td>
			<td><input type="text" name="txtnazirancomment" value="<?php echo $woRow->wo_nazirancomment;?>" style='width:95%'/></td>
		</tr>
		<tr>
			<td>Temuduga</td>
			<td>
				<input type="checkbox" name="chkinterview" value="1" onclick="checktrigger(this, txtinterviewby, dtinterview);" <?php echo $ischk4 ?> />
				<input type="text" name="txtinterviewby" id="txtinterviewby" value="<?php echo $woRow->wo_interviewby;?>" READONLY/>    		
			</td>
			<td><input type="text" name="dtinterview" size="12" id="dtinterview"  value="<?php if(strlen($woRow->wo_interviewdate) > 0 && $woRow->wo_interviewdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_interviewdate));?>" READONLY/></td>
			<td><input id="button15" name="btnDate15" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtinterview'), this)" <?php echo $butdis4 ?> /></td>
			<td><input type="text" name="txtinterviewcomment" value="<?php echo $woRow->wo_interviewcomment;?>" style='width:95%'/></td>
		</tr>
		<tr>
			<td valign=top>Kelulusan JKK Pelulus</td>
			<td valign=top>
				<input type="checkbox" name="chklulus" value="1" onclick="checktrigger(this, txtlulusby, dtlulus);" <?php echo $ischk5 ?> />
				<input type="text" name="txtlulusby" id="txtlulusby" value="<?php echo $woRow->wo_lulusby;?>" READONLY /> 
				<p><div align=center><?php echo anchor_popup("contSpimG/printAkuanPenerimaan/". $woRow->wo_id,"Cetak Akuan Penerimaan");?></div></p>				
			</td>
			<td valign=top><input type="text" name="dtlulus" size="12" id="dtlulus"  value="<?php if(strlen($woRow->wo_lulusdate) > 0 && $woRow->wo_lulusdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_lulusdate));?>" READONLY/></td>
			<td valign=top><input id="button16" name="btnDate16" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtlulus'), this)" <?php echo $butdis5 ?> /></td>
			<td valign=top>
				<input type="text" name="txtluluscomment" value="<?php echo $woRow->wo_luluscomment;?>" style='width:95%'/><br>
				<table width=100%>
					
					<tr>
						<td width=180px>Total No. of FCL Applied</td>
						<td><input type="text" name="txtfcltotalx" size="2" value="<?php echo $woRow->wo_fcl_total;?>" readonly /></td>
					</tr>
					<tr>
						<td>Total No. of FCL Approved</td>
						<td><input type="text" name="txtfcltotalapv" size="2" value="<?php echo $woRow->wo_fcl_total_apv;?>" /></td>
					</tr>
					
				</table>
			</td>
		</tr>
		<tr>
			<td valign=top>Pusat Transit : Labour Check-Out</td>
			<td valign=top>
				<input type="checkbox" name="chkransit" value="1" onclick="checktrigger(this, txtransitby, dtransit);" <?php echo $ischk6 ?> />
				<input type="text" name="txtransitby" id="txtransitby" value="<?php echo $woRow->wo_ransitby;?>" READONLY/>    		
			</td>
			<td valign=top><input type="text" name="dtransit" size="12" id="dtransit"  value="<?php if(strlen($woRow->wo_ransitdate) > 0 && $woRow->wo_ransitdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_ransitdate));?>" READONLY/></td>
			<td valign=top><input id="button17" name="btnDate17" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtransit'), this)" <?php echo $butdis6 ?> /></td>
			<td valign=top>
				<input type="text" name="txtransitcomment" value="<?php echo $woRow->wo_ransitcomment;?>" style='width:95%'/>
				<div align=center><?php echo anchor_popup("contSpimG/printLabourChkOutForm/". $woRow->wo_id,"Labour Check-Out Form");?></div>
			</td>
		</tr>
		<tr>
			<td valign=top>Pusat Transit : Labour Check-In</td>
			<td valign=top>
				<input type="checkbox" name="chkhover" value="1" onclick="checktrigger(this, txthoverby, dthover);" <?php echo $ischk7 ?> />
				<input type="text" name="txthoverby" id="txthoverby" value="<?php echo $woRow->wo_hoverby;?>" READONLY/>    		
			</td>
			<td valign=top><input type="text" name="dthover" size="12" id="dthover"  value="<?php if(strlen($woRow->wo_hoverdate) > 0 && $woRow->wo_hoverdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_hoverdate));?>" READONLY/></td>
			<td valign=top><input id="button18" name="btnDate18" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dthover'), this)" <?php echo $butdis7 ?> /></td>
			<td valign=top>
				<input type="text" name="txthovercomment" value="<?php echo $woRow->wo_hovercomment;?>" style='width:95%'/>
				<div align=center><?php echo anchor_popup("contSpimG/printLabourChkInForm/". $woRow->wo_id,"Labour Check-In Form");?></div>
			</td>
		</tr>
		
		<tr>
			<td>Close This Workorder</td>
			<td><input type="checkbox" name="iswithd" value="1" onclick="checktrigger(this, 'Close', dtwithd);" <?php echo $ischk8 ?>  <?php //echo $strprocess ?>/></td>
			<td><input type="text" name="dtwithd" id="dtwithd" size="12" value="<?php if($woRow->wo_withd_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_withd_date));?>"/></td>
			<td><input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtwithd'), this)" <?php echo $butdis8 ?> <?php echo $strprocess ?>/></td>
			<td><input type="text" name="reasonwithd" size="60" value="<?php echo $woRow->wo_withd_reason;?>"/></td>
		</tr>
		<tr><td colspan=5>&nbsp;</td></tr>
    </table>

    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<td align="center">
			   
			    <!--input type="hidden" name="orig_wo_vercorp" value="<?php echo $woRow->chk_ver_corp;?>" />
				<input type="hidden" name="orig_wo_verfin" value="<?php echo $woRow->chk_ver_fin;?>" />
				<input type="hidden" name="orig_wo_appceo" value="<?php echo $woRow->chk_app_ceo;?>" />
    			<input type="hidden" name="orig_wo_isreceive" value="<?php echo $woRow->wo_isreceive;?>" />
    			<input type="hidden" name="orig_wo_isprocess" value="<?php echo $woRow->wo_isprocess;?>" />
    			<input type="hidden" name="orig_wo_issentto_hr" value="<?php echo $woRow->wo_issentto_hr;?>" />
    			<input type="hidden" name="orig_wo_isreceiveby_hr" value="<?php echo $woRow->wo_isreceiveby_hr;?>" />
    			<input type="hidden" name="orig_wo_isjim_ack" value="<?php echo $woRow->wo_isjim_ack;?>" />
    			<input type="hidden" name="orig_wo_isreceive_visa" value="<?php echo $woRow->wo_isreceive_visa;?>" /-->
				<input type="submit" name="btnupdate" value=" Update Workorder " onclick="return confirm('Are you sure you want to update?');" <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
				<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contSpimG/updateWorkorder'" />    		
    		</td>
    	</tr>
    </table>
  </form>
  
    <br />
  <table width="100%" border="0" cellpadding=3 style='border-style:none'>
  	<tr>
  		<th colspan="6" align="LEFT">TRACKING LOG</th>
  		<th colspan="1" align="RIGHT"><input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
  			<input type="button" name="btnRefresh" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contSpimG/updateWorkOrderPt2/<?php echo $woRow->wo_id;?>/updatephonetrack'"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
  		</th>
  	</tr>
  	<tr>
  	    <th>No.</th>
  		<th>Date & Time</th>
  		<th>Attend By</th>
  		<th>Remarks</th>
  		<th>Action</th>
  		<th>Action By</th>
  		<th>Completion Date</th>
  	</tr>
  	<?php if($allPhTrackLog->num_rows() == 0){
	    ?>
	<tr>
		<td colspan="7"><strong><font color="red">No phone tracking log.</font></strong></td>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($allPhTrackLog->result() as $log){
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d-m-Y g:i a', strtotime($log->track_datetime));?></td>
		<td><?php echo $log->track_attendby;?></td>
		<td><?php echo $log->track_remarks;?></td>
		<td><?php echo $log->track_action;?></td>
		<td><?php echo $log->track_actionby;?></td>
		<td><?php if($log->track_compdate!= "0000-00-00") echo date('d-m-Y', strtotime($log->track_compdate));?></td>
	</tr>
	<?php }
	}
	?>
  </table>
<!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtfcltotal': {
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		}
		,'contdur':{'l':'Contract Duration','r':true,'t':'t_contdur'}
		//,'payrefno':{'l':'Official Receipt No','r':true,'t':'t_payref'}		
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('updateWorkorderForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->

</body>
</html>
