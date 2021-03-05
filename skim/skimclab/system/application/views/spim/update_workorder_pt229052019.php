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
	   
	   document.updateWorkorderForm.txtjimackref.value='Replacement';
		
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
	   
	   document.updateWorkorderForm.txtjimackref.value="";
	
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
	 var url = "<?php echo site_url('contSpim/email_item');?>/" + workorderid 
	 window.open(url, 'Insurance Purchase', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	}
	
	function handover(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpim/handoverletter');?>/" + wono + "/" + workorderid
	   window.open(url,'handover letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function pengesahan(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpim/confirmletter');?>/" + wono + "/" + workorderid
	   window.open(url,'confirm letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openuploadwindow(){
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function newphtracklog(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contSpim/newPhoneTrackLog');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Workorder Reject History', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function EditTrackLog(id){
		
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/editPhoneTrackLog');?>/" + workorderid + "/" + companyname + "/" + id
				
		window.open(url, 'Workorder Reject History', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	/*function registerNewLabor(){
		var avlabrefno = document.updateWorkorderForm.workorderno.value
		window.open('<?php echo site_url();?>/contavailable/regisNewLabourPt1/' + avlabrefno, 'Register new labour', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}*/
	function registerNewLabor(){
		var workorderid = document.updateWorkorderForm.txtwoid.value;
		var companyname = document.updateWorkorderForm.txtclabno.value;
	
		var url = "<?php echo site_url('contSpim/regnewlabour');?>/" + workorderid + "/" + companyname
		window.open(url, 'Register new FCL', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
		function registerNewLegal(){
		//var wono = document.updateWorkorderForm.workorderno.value
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var currentuser = document.updateWorkorderForm.currentuser.value;
		var wono = document.updateWorkorderForm.txtwoid.value;
		
		var url = "<?php echo site_url('contSpim/regnewlegal');?>/" + workorderid + "/" + companyname + "/" + currentuser + "/" + wono
		window.open(url, 'Register new legal', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	
	
	function EditFCL(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/EditFCL');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit FCL', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
		
	}
	
	function EditLegal(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/EditLegal');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit Legal', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	
	
    function openBatch(clabid){
		var clabid = clabid;
		var clabno = document.updateWorkorderForm.txtclabno.value
		var companyname = document.updateWorkorderForm.txtcompname.value
		
		var url = "<?php echo site_url('contSpim/batchlistwo');?>/" + clabno + "/" + companyname
		window.open(url, 'Batch Application List', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	
	}
	
	function OpenLampiran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/lampiran_a');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
		function OpenLampiranExcel(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/lampiran_a_excel');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenLampiranCSV(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/lampiran_fwcms_csv');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenSecondSchedule(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/second_schedule');?>/" + wono
		window.open(url, '2nd Schedule', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenIM12(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/im12');?>/" + wono
		window.open(url, 'IM12', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenAddendum(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/addendum');?>/" + wono
		window.open(url, 'Addendum', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenBorangBayaran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/borangbayaran');?>/" + wono
		window.open(url, 'Borang Bayaran', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openack(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/acknowledge');?>/" + wono
		window.open(url,'Acknowledgement','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openprintform(fclid){
	   var url = "<?php echo site_url('contSpim/openprintform');?>/" + fclid
	   window.open(url,'Print Form','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function checkconfirm(fclid){
	   var url = "<?php echo site_url('contSpim/selectfcl');?>/" + fclid
	   window.open(url,'Print Form','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function selectall(){
	    
	     document.updateWorkorderForm.chkreqform.checked = true;
		 document.updateWorkorderForm.chkawardletter.checked = true;
		 document.updateWorkorderForm.chkaccopic.checked = true;
		 document.updateWorkorderForm.chkempletter.checked = true;
		 document.updateWorkorderForm.chksupagree.checked = true;
		 document.updateWorkorderForm.chksignedpay.checked = true;
		 document.updateWorkorderForm.dtreqform.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtawardletter.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtaccopic.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtempletter.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtsupagree.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtsignedpay.value = '<?php echo date('d-m-Y')?>';
	
		 
	}
	
   function paymentlist(clabno){
	  var frm = "update";
	  var url = "<?php echo site_url('contSpim/openreceipt');?>/" + frm + "/" + clabno;
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
<h4><a href="<?php echo site_url();?>/contSpim/spimDashbrd">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Update Work Order </h4>

<h3 id="switchsection1-title" class="handcursor">Update Work Order<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Workorder has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">The workorder has been updated!</font></strong>";
	else { //dummy else
	};
}

//echo $woRow->doc_rqform;

	if(isset($woRow->wo_isreplacement) == '1'){
	     $doc = "hide";
		 $btnack = ""; 		 
		 $doc1 = "disabled=disabled";
		 $doctext = "readonly";
		 $close = "";	
		 $isrepdis = "disabled=disabled";
    }else{
	      if(isset($woRow->doc_rqform) == '1' 
							   && $woRow->doc_empletter == '1' 
							   && $woRow->doc_awardletter == '1' 
							   && $woRow->doc_supplieragree == '1'
							   && $woRow->doc_acco == '1'
							   && $woRow->doc_signedpayment == '1'
							   && $woRow->doc_datecomplete != '0000-00-00'){
				$doc = "hide";
				$doctext = "readonly";
				$doc1 = "disabled=disabled";
				$btnack = "";
				$isrepdis = "";
				}else{
				$doc = "";
				$doctext = "";
				$doc1 = "";
				$btnack = "disabled=disabled";
				$isrepdis = "";
				};
				
		if($woRow->wo_iswithdrawal == '1' && $woRow->wo_withd_date != '0000-00-00'
		){
				$close = "disabled=disabled";	
				}else{
				$close = "";	
				}
	}				

?>
  <form action="<?php echo site_url();?>/contSpim/updateWorkOrderPt2Submit" method="POST" name="updateWorkorderForm" id="updateWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Workorder No</td>
			<td width="33%">
				<input type="hidden" name="txtwoid" value="<?php echo $woRow->wo_id;?>" />	
				<input type="text" name="workorderno" value="<?php if(strlen($woRow->wo_num) == 0) echo $woRow->wo_id; else echo $woRow->wo_num;?>" READONLY/></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php if($woRow->wo_datesubmit != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_datesubmit));?>" size="12" READONLY/>
		<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->		</tr>
		<tr>
			<td>Company Name</td>
			<td><p>
			  <input type="text" name="txtcompname" size="50" value="<?php echo $woRow->ctr_comp_name;?>" READONLY />
			</p></td>
			<td>CLAB No.</td>
			<td>
            <input type="text" name="txtclabno" value="<?php echo $woRow->wo_clab_no;?>" READONLY />&nbsp;
            <input type="button" name="btnbatchapp" value="Batch Application"  onclick="openBatch('<?php echo $woRow->wo_clab_no;?>')"/>            </td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td><input type="text" name="txtcontact" size="30" value="<?php echo $woRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td><input type="text" name="txtcontactno" value="<?php echo $woRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL</td>
			<td>
				<input type="text" name="txtfcltotal" size="4" value="<?php echo $woRow->wo_fcl_total;?>"/> &nbsp;
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>" <?php if($woRow->wo_fcl_country == $country->cty_id) echo "SELECTED";?>><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>			</td>
			<td>Agency Name</td>
			<td><SELECT name="selagency">
				<?php foreach($allAgencies->result() as $agency){
				?>
					<option value="<?php echo $agency->agency_id;?>" <?php if($woRow->wo_agency == $agency->agency_id) echo "SELECTED";?>><?php echo $agency->agency_name;?></option>
				<?php }
				?>
				</SELECT>			</td>
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
		  <td>Approval No</td>
          <td><select name="selapproval">
            <?php foreach($allapproval->result() as $approval){
				?>
            <option value="<?php echo $approval->app_id;?>" <?php if($woRow->wo_appid == $approval->app_id) echo "SELECTED";?>><?php echo $approval->app_desc;?></option>
            <?php }
				?>
          </select></td>
          <td><!--input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtvisa'), this)" /--></td>		 
	  </tr>
		<tr>
		  <td>Attending Officer </td>
		  <td><input type="text" name="txtattnoff" value="<?php echo  $woRow->wo_attn_officer; ?>" size="40"/></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
    </table>
    <!--br />
	 	  <table width="100%" >
	  <tr>
	     <th colspan="4" align="left">APPROVAL</th>
	  </tr>
	   <tr>
	     <td width="14%">Prepare By</td>
	     <td width="33%"><input type="checkbox" name="chk_pre_by" onclick="checktrigger(this, txtpreby, dtpreby);"/>&nbsp;<input type="text" name="txtpreby"/></td>
	     <td width="11%">Date Prepared </td>
	     <td><input type="text" name="dtpreby" id="dtpreby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtpreby'), this)" /></td>
	   </tr>
	   <tr>
	     <td>Approved By </td>
	     <td><input name="chk_app_by" type="checkbox" onclick="checktrigger(this, txtappby, dtappby);"/>&nbsp;<input type="text"  name="txtappby" /></td>
	     <td>Date Approved </td>
	     <td><input type="text" name="dtappby" id="dtappby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappby'), this)" /></td>
	   </tr>
	   <tr>
	     <td>Verify By </td>
	     <td><input name="chk_ver_by" type="checkbox" onclick="checktrigger(this, txtverby, dtverby);"/>&nbsp;<input type="text"  name="txtverby"/></td>
	     <td>Date Verify </td>
	     <td><input type="text" name="dtverby" id="dtverby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtverby'), this)" /></td>
	   </tr>
	   <tr>
	     <td>Checked By </td>
	     <td><input name="chk_chk_by" type="checkbox" onclick="checktrigger(this, txtchkby, dtchkby);"/>&nbsp;<input type="text"  name="txtchkby"/></td>
	     <td>Date Checked </td>
	     <td><input type="text" name="dtchkby" id="dtchkby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtchkby'), this)" /></td>
	   </tr>
    </table-->
	<br />
    <table width="100%" border="0">
    	<tr>
    		<th align="LEFT"> REQUIRED DOCUMENTS (Comp)</th>
    		<th align="RIGHT"><input type="button" name="btnack" value="Acknowledgement" onclick="openack('<?php echo $woRow->wo_id;?>')" <?php echo $btnack ?>/><!--input type="button" name="btnUpload" value="Upload Documents" onclick="openuploadwindow();" DISABLED/--></th>
    	</tr>
    	<tr>
    		<!--td><input type="checkbox" name="chkreqform" value="1" <?php if($woRow->doc_rqform == '1') echo "CHECKED "; ?> <?php
			echo $isrepdis ?>/>Request Form (R02)  &nbsp; &nbsp;&nbsp;
				<input type="text" name="dtreqform" id="dtreqform" size="11" value="<?php if($woRow->doc_rqformdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_rqformdate));?>" <?php echo $doctext ?>/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" <?php echo $doc1 ?>/>
    		
    		</td-->
			<td><input type="checkbox" name="chkaccopic" value="1" <?php if($woRow->doc_acco == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php echo $isrepdis ?>/>Accomodation Pic/Add 
    			<input type="text" name="dtaccopic" id="dtaccopic" size="11" value="<?php if($woRow->doc_accodate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_accodate));?>" <?php echo $doctext ?>/>
    			<input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtaccopic'), this)" <?php echo $doc1 ?>/>
    		</td>
			<td><input type="checkbox" name="chkawardletter" value="1" <?php if($woRow->doc_awardletter == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php
			echo $isrepdis ?>/>Letter of Award  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;
    		  <input type="text" name="dtawardletter" id="dtawardletter" size="11" value="<?php if($woRow->doc_awardletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_awardletterdate));?>" <?php echo $doctext ?>/>
    		  <input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" <?php echo $doc1 ?>/>
    		</td>
    		
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkempletter" value="1" <?php if($woRow->doc_empletter == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php
			echo $isrepdis ?>/>Employment Letter   &nbsp; &nbsp; &nbsp; &nbsp; 
    			<input type="text" name="dtempletter" id="dtempletter" size="11" value="<?php if($woRow->doc_empletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_empletterdate));?>"/>
    			<input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtempletter'), this)"  <?php echo $doc1 ?>/>
    		</td>
    		<td><input type="checkbox" name="chksupagree" value="1" <?php if($woRow->doc_supplieragree == '1') echo "CHECKED ";?> <?php echo $doc ?> <?php
			echo $isrepdis ?>/>Supplier Agreement  &nbsp; &nbsp; &nbsp;
    			<input type="text" name="dtsupagree" id="dtsupagree" size="11" value="<?php if($woRow->doc_supplieragreedate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_supplieragreedate));?>" <?php echo $doctext ?>/>
    			<input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsupagree'), this)" <?php echo $doc1 ?>/>
    		</td>
    	</tr>
    	<tr>
    		
    		<!--td><input type="checkbox" name="chkempletter" value="1" <?php if($woRow->doc_empletter == '1') echo "CHECKED ";?> <?php echo $doc ?>/>Employer Application 
    			<input type="text" name="dtempletter" id="dtempletter" size="11" value="<?php if($woRow->doc_empletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_empletterdate));?>" <?php echo $doctext ?>/>
    			<input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsignedpay'), this)" <?php echo $doc1 ?>/>
    		</td-->
    	</tr>
    	<tr>
    		<td colspan="2" align="LEFT">
    			Date Complete Document: <input type="text" name="dtcompletedoc" id="dtcompletedoc" value="<?php if($woRow->doc_datecomplete != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_datecomplete));?>" <?php echo $doctext ?>/>
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" <?php echo $doc1 ?>/>
    		</td>
    	</tr>
		<tr>
		    <td colspan="2"><input type="button" name="btnselall" value="Select All" onclick="selectall()" <?php
			echo $isrepdis ?>/></td>
		</tr>
    </table>
   <br />
     <table width="100%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
    	<tr>
    		<td colspan="6" id="t_payref">OFFICIAL RECEIPT NO<font color="red">*</font>.: 
   		  <input type="text" name="payrefno" size="50" value="<?php echo $woRow->pay_refno;?>" /><input type="button" value="..." onclick="paymentlist('<?php echo $woRow->ctr_clab_no;?>')"/></td>
    	</tr>
    	<tr>
    		<td>Admin Fee:</td>
    		<td>
    			<SELECT name="seladminfee">
    				<option value="NO" <?php if($woRow->pay_adminfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_adminfee == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>    		</td>
    		<td>LEVY:</td>
    		<td>
    			<SELECT name="sellevy">
    				<option value="NO" <?php if($woRow->pay_levy == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_levy == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>    		</td>
    		<td>PLKS:</td>
    		<td>
    			<SELECT name="selplks">
    				<option value="NO" <?php if($woRow->pay_plks == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_plks == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>    		</td>
    	</tr>
    	 	<tr>
    		<td>Agency Fee:</td>
    		<td>
    			<SELECT name="selagencyfee">
    				<option value="NO" <?php if($woRow->pay_agencyfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_agencyfee == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>    		</td>
    		<td>FOMEMA:</td>
    		<td>
    			<SELECT name="selfomema">
    				<option value="NO" <?php if($woRow->pay_fomema == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_fomema == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>    		</td>
    		<td>VISA:</td>
    		<td>
    			<SELECT name="selvisa">
    				<option value="NO" <?php if($woRow->pay_visa == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_visa == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>    		</td>
    	</tr>
    	 	<tr>
    		<td>IG:</td>
    		<td>
    			<SELECT name="selig">
    				<option value="NO" <?php if($woRow->pay_ig == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_ig == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT></td>
    		<td>&nbsp;</td>
<td>
    			<SELECT name="selfwcs">
    				<option value="NO" <?php if($woRow->pay_fwcs == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_fwcs == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT></td>
<td>FWHS:</td>
    		<td><select name="selfwhs" id="selfwhs">
              <option value="NO" <?php if($woRow->pay_fwhs == "NO") echo "SELECTED";?>>NO</option>
              <option value="YES" <?php if($woRow->pay_fwhs == "YES") echo "SELECTED";?>>YES</option>
            </select></td>
    	 	</tr>
    </table>
  <br />
  <table width="100%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">INSURANCE POLICY</th>
    	</tr>
    	 	<tr>
    		<td>IG:</td>
    		<td><input type="text" name="txtigpolicy"  value="<?php echo $woRow->pay_igno;?>"/></td>
    		<td>FWCS:</td>
<td><input type="text" name="txtcspolicy"  value="<?php echo $woRow->pay_fwcsno;?>"/></td>
    		<td>FWHS:</td>
    		<td><input type="text" name="txthspolicy"  value="<?php echo $woRow->pay_fwhsno;?>"/></td>
    	</tr>
    </table>
    <br/>
<table width="100%" border="0">
      	<tr>
      		<th colspan="3" align="LEFT">LIST OF FCL</th>
      		<th align="RIGHT" colspan="7"><input type="button" name="btnRegisNewLabour" value="Register New Labour" onclick="registerNewLabor();" <?php if(strpos($accessibility, 'h') == false) echo "DISABLED";  ?><?php echo $close ?> /><!--input type="button" name="btnUploadFCL" value="Upload FCL list" class="smoothbtn1" onclick="openuploadwindow();" /--></th>
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
      	 	<th>Nationality</th>
			<th>Next Of Kin</th>
			<th>Relationship</th>
            <th>Wages</th>
			<th>Trade</th>
			<th align="center">Action</th>
            <th align="center">Confirm</th>
   	    </tr>	
	    <?php $i = 1;
	      	foreach($allFCLFiles->result() as $fcl){
      	 ?>
      	 <tr>
      	 	<td><?php echo $i++;?></td>
      	 	<td><?php echo $fcl->fcl_name;?></td>
      	 	<td><?php echo $fcl->fcl_passno;?></td>
      	 	<td><?php echo $fcl->nat_desc;?></td>
			<td><?php echo $fcl->fcl_next_of_kin;?></td>
			<td><?php echo $fcl->fcl_relationship;?></td>
			<td><?php echo $fcl->fcl_salary;?></td>
			<td><?php echo $fcl->fcl_wt;?></td>
			<td align="center"><input type="button" value="Edit / Delete" onclick = "EditFCL('<?php echo $fcl->fcl_id;?>')" <?php echo $close ?>/>
		    <!--input type="button" value="Print IM12 Form" onclick="openprintform('<?php echo $fcl->fcl_id?>')" /--></td>
           <td align="center"><input type="checkbox" name="chkconfirm" value="1" <?php if($fcl->fcl_sel == '1') echo "CHECKED ";?>/></td>
      	 </tr>
      	 <?php }
  	 	 }
  	 	 ?>
         <tr>
            <td colspan="9">
            <input type="button" value="Lampiran A" onclick="OpenLampiran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
			<input type="button" value="Lampiran A (Excel)" onclick="OpenLampiranExcel('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="2nd Schedule" onclick="OpenSecondSchedule('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="IM12" onclick="OpenIM12('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
           <input type="button" value="Borang Bayaran" onclick="OpenBorangBayaran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
           <input type="button" value="Lampiran FWCMS" onclick="OpenLampiranCSV('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> /></td>
            <td>&nbsp;</td>
         </tr>
      </table>
	  <br />
	   <table width="100%" border="0">
      	<tr>
      		<th colspan="3" align="LEFT">List Of Workorder Documents</th>
      		<th align="RIGHT"><!--input type="button" name="btnRegisNewLabour" value="Register New Labour" onclick="registerNewLabor();"/--><input type="button" name="btnUploadFCL" value="Upload Document"  onclick="openuploadwindow();" /></th>
      	</tr>
      	<?php if($allFCLUpload->num_rows() == 0){ ?>
      	<tr>
      		<td colspan="4"><font color="red"><strong>No FCL lists has been uploaded for this workorder.</strong></font></td>
      	</tr>
      	<?php }
      	else{
	    ?>
	    <tr>
      	 	<th>No.</th>
      	 	<th>File Name</th>
      	 	<th>Upload By</th>
      	 	<th>Date Upload</th>
   	    </tr>	
	    <?php $i = 1;
	      	foreach($allFCLUpload->result() as $file){
      	 ?>
      	 <tr>
      	 	<td><?php echo $i++;?></td>
      	 	<td><a href="<?php echo base_url();?>uploads/spim/<?php echo $file->upload_destfilename;?>"><?php echo $file->upload_destfilename;?></a></td>
      	 	<td><?php echo $file->emp_name;?></td>
      	 	<td width="25%"><?php echo date('d-m-Y', strtotime($file->upload_date));?></td>
      	 </tr>
      	 <?php }
  	 	 }
  	 	 ?>
      </table>
     
      <br />
    <table width="100%" border="0">
    	<tr>
    		<th colspan="3" align="LEFT">LEGAL</th>
            <th colspan="2" align="RIGHT"><input type="button" name="btnRegisNewLegal" value="Register New Legal" onclick="registerNewLegal();" <?php echo $close ?> <?php if($allLegalFiles->num_rows() > 0){ ?> disabled <?php }?>/></th>
    	</tr>
        <tr>
            <th width="30%">Aggrement No</th>
            <th width="20%">Reference No</th>
            <th width="20%">Date</th>
            <th width="20%">Remarks</th>
            <th width="10%">Action</th>
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
      	      <td><?php echo $legal->wo_agg_no;?></td>
      	      <td><?php echo $legal->wo_agg_ref_no;?></td>
      	      <td><?php echo date('d M Y',strtotime($legal->wo_agg_date));?></td>
      	      <td><?php echo $legal->wo_agg_remarks;?></td>
      	      <td align="center"><input type="button" value="Edit / Delete" onclick="EditLegal('<?php echo $legal->wo_agg_id ?>')" <?php echo $close ?>/></td>
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
    <table width="100%" border="0">
    	<tr>
    		<th colspan="5" align="LEFT">STATUS</th>
    	</tr>
    	<tr>
    		<th align="center" width="20%">PROGRESS</th>
    		<th align="center">PROCESSED BY</th>
    		<th align="center">DATE</th>
    		<th align="center">ETC</th>
    		<th align="center">COMMENT</th>
    	</tr>
    	<tr>
    		<td rowspan="3">Received by Operation:</td>
    		<td rowspan="3"><input type="checkbox" name="chkisprocess" value="1" onclick="checktrigger(this, txtprocessby, dtprocess);" <?php if($woRow->wo_isprocess == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtprocessby" id="txtprocessby"  value="<?php echo $woRow->wo_processby;?>" READONLY/>    		</td>
    		<td rowspan="3">
    			<input type="text" name="dtprocess" size="12" id="dtprocess" value="<?php if(strlen($woRow->wo_processdate) > 0 && $woRow->wo_processdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_processdate));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtprocess'), this)" />    		</td>
    		<td align="center"><?php echo anchor_popup("contSpim/printCheckLits/". $woRow->wo_id,"PrintChecklist");?></td>
    		<td rowspan="3"><!--input type="text" name="txtprocesscomment" value="<?php echo $woRow->wo_process_comment;?>"/--></td>
   	  </tr>
    	<tr>
    	  <td align="center">&nbsp;</td>
    	</tr>
    	<tr>
    	  <td align="center">&nbsp;</td>
  	  </tr>
    	<tr>
          <td>Process by Operation Assistant:</td>
    	  <td><input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" />
              <!--for javascript to get currentuser-->
              <input type="checkbox" name="chkisreceive" value="1" onclick="checktrigger(this, txtreceiveby, dtreceive);" <?php if($woRow->wo_isreceive == '1') echo "CHECKED DISABLED";?>/>
              <input type="text" name="txtreceiveby" id="txtreceiveby" value="<?php echo $woRow->wo_receiveby;?>" readonly="READONLY"/>          </td>
    	  <td><input type="text" name="dtreceive" size="12" id="dtreceive"  value="<?php if(strlen($woRow->wo_receivedate) > 0 && $woRow->wo_receivedate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivedate));?>" readonly="READONLY"/>
              <input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceive'), this)" />          </td>
    	  <td align="center"><input type="button" value="Insurance Purchase" onclick="Inspchs()" /></td>
    	  <td><!--input type="text" name="txtreceivecomment" value="<?php echo $woRow->wo_receive_comment;?>"/--></td>
  	  </tr>
		<tr>
		  <th colspan="5" align="left">VERIFICATION AND APPROVAL</th>
		</tr>
		<tr>
		    <td>Verification From HOU Operation</td>
			<td><input type="checkbox" name="chkvercorp" value="1" onclick="checktrigger(this, txtvercorp, dtvercorp);" <?php if($woRow->chk_ver_corp == '1') echo "CHECKED DISABLED";?>  <?php if(strpos($accessibility, 'z') == false) echo "DISABLED";  ?> <?php echo $strver1 ?>/>
			<input type="text" name="txtvercorp" id="txtvercorp"  value="<?php echo $woRow->ver_corp_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtvercorp" size="12" id="dtvercorp" value="<?php if(strlen($woRow->ver_corp_date) > 0 && $woRow->ver_corp_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->ver_corp_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtvercorp'), this)" <?php if(strpos($accessibility, 'z') == false) echo "DISABLED";  ?> <?php echo $strver1 ?>/> </td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		  <td>Verification From Legal ( Demand Letter )</td>
		  <td><input type="checkbox" name="chkissubmit2" onclick="checktrigger(this, txtsubmitlegal, dtsubmitlegal);"  <?php if($woRow->wo_issentto_legal == '1') echo "CHECKED DISABLED";?> <?php echo $strprocess ?>/>
	      <input type="text" name="txtsubmitlegal" id="txtsubmitlegal"  value="<?php echo $woRow->wo_sentlegalby;?>" readonly="READONLY"/></td>
		  <td><input type="text" name="dtsubmitlegal" size="12" id="dtsubmitlegal" value="<?php if(strlen($woRow->wo_senthrdate) > 0 && $woRow->wo_sentlegaldate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_sentlegaldate));?>" readonly="READONLY"/>
	      <input id="button" name="button3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmithr'), this)" <?php echo $strprocess ?>/></td>
		  <td>Remarks :
	      <input type="text" name="txtsentlegalcomment"  value="<?php echo $woRow->wo_sentlegalcomment;?>"/></td>
		  <td>&nbsp;</td>
	  </tr>
		<tr>
		    <td>Verification From Finance</td>
			<td><input type="checkbox" name="chkverfin" value="1" onclick="checktrigger(this, txtverfin, dtverfin);" <?php if($woRow->chk_ver_fin == '1') echo "CHECKED DISABLED";?> <?php if(strpos($accessibility, 'x') == false) echo "DISABLED";  ?> <?php echo $strver2 ?>/>
			<input type="text" name="txtverfin" id="txtverfin"  value="<?php echo $woRow->ver_fin_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtverfin" size="12" id="dtverfin" value="<?php if(strlen($woRow->ver_fin_date) > 0 && $woRow->ver_fin_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->ver_fin_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtverfin'), this)" <?php if(strpos($accessibility, 'x') == false) echo "DISABLED";  ?> <?php echo $strver2 ?>/> </td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		    <td>Approval From CEO</td>
			<td><input type="checkbox" name="chkappceo" value="1" onclick="checktrigger(this, txtappceo, dtappceo);" <?php if($woRow->chk_app_ceo == '1') echo "CHECKED DISABLED";?>  <?php if(strpos($accessibility, 'v') == false) echo "DISABLED";  ?> <?php echo $strver3 ?>/>
			<input type="text" name="txtappceo" id="txtappceo"  value="<?php echo $woRow->app_ceo_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtappceo" size="12" id="dtappceo" value="<?php if(strlen($woRow->app_ceo_date) > 0 && $woRow->app_ceo_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->app_ceo_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappceo'), this)" <?php if(strpos($accessibility, 'v') == false) echo "DISABLED";  ?> <?php echo $strver3 ?>/> </td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr><th colspan="5">&nbsp;</th></tr>
    	
    	<tr>
    		<td>Submit to JIM:</td>
    		<td><input type="checkbox" name="chkissubmit" onclick="checktrigger(this, txtsubmithr, dtsubmithr);"  <?php if($woRow->wo_issentto_hr == '1') echo "CHECKED DISABLED";?> <?php echo $strprocess ?>/>
    			<input type="text" name="txtsubmithr" id="txtsubmithr"  value="<?php echo $woRow->wo_senthrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtsubmithr" size="12" id="dtsubmithr" value="<?php if(strlen($woRow->wo_senthrdate) > 0 && $woRow->wo_senthrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_senthrdate));?>" READONLY/>
    			<input id="button15" name="btnDate15" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmithr'), this)" <?php echo $strprocess ?>/>    		</td>
    		<td></td>
    		<td><!--input type="text" name="txtsenthrcomment" value="<?php echo $woRow->wo_senthrcomment;?>"/--></td>
    	</tr>
    	<tr>
    		<td>Received by Operation:</td>
    		<td><input type="checkbox" name="chkisreceivebyhr" onclick="checktrigger(this, txtreceivebyhr, dtreceivebyhr);"  <?php if($woRow->wo_isreceiveby_hr == '1') echo "CHECKED DISABLED";?> <?php echo $strprocess ?>/>
    			<input type="text" name="txtreceivebyhr" id="txtreceivebyhr"  value="<?php echo $woRow->wo_receivehrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtreceivebyhr" size="12" id="dtreceivebyhr" value="<?php if(strlen($woRow->wo_receivehrdate) > 0 && $woRow->wo_receivehrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivehrdate));?>" READONLY/>
    			<input id="button16" name="btnDate16" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivebyhr'), this)" <?php echo $strprocess ?>/>    		</td>
    		<td></td>
    		<td><!--input type="text" name="txtreceivehrcomment" value="<?php echo $woRow->wo_receivehr_comment;?>"/--></td>
    	</tr>
    	<tr>
    		<td>Key In FWCMS:</td>
    		<td><input type="checkbox" name="chkisjimack" onclick="checktrigger(this, txtjimack, dtjimack);" <?php if($woRow->wo_isjim_ack == '1') echo "CHECKED DISABLED";?> <?php echo $strprocess ?>/>
    			<input type="text" name="txtjimack" id="txtjimack" value="<?php echo $woRow->wo_jimackby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtjimack" size="12" id="dtjimack" value="<?php if(strlen($woRow->wo_jimackdate) > 0 && $woRow->wo_jimackdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_jimackdate));?>" READONLY/>
    			<input id="button17" name="btnDate17" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtjimack'), this)" <?php echo $strprocess ?>/>    		</td>
   		  <td>FWCMS Ref. No: &nbsp;
	        <input type="Text" name="txtjimackref"  value="<?php if($woRow->wo_isreplacement == '0') echo $woRow->wo_jimack_refno; else echo $woRow->replacement_desc;?>"/></td>
          
          <!--?php if(strlen($woRow->wo_num) == 0) echo $woRow->wo_id; else echo $woRow->wo_num;?-->
          
   		  <td><input type="text" name="txtjimackcomment" value="<?php echo $woRow->wo_jimack_comment?>"/></td>
    	</tr>
    	<tr>
    		<td>Reject History:</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>Total Approve: <input type="text" name="txtapprove" size="4" value="<?php echo $woRow->wo_receivevisa_approve;?>" READONLY/> <br />
    			Total Reject: &nbsp; &nbsp; <input type="text" name="txtreject" size="4" value="<?php echo $woRow->wo_receivevisa_reject;?>" READONLY/> <br />
                Balance Quota As To Date: &nbsp; &nbsp; <input type="text" name="txtreject" size="4" value="<?php echo $woRow->wo_receivevisa_balance;?>" READONLY/> <br />
    			<input type="button" name="btnRejectHistory" value="Reject History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contSpim/viewRejectHistory/<?php echo $woRow->wo_clab_no ."/". $woRow->wo_id;?>', 'Workorder Reject History', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" <?php echo $close ?>/>    		</td>
    		<td><textarea cols="15" rows"2" name="txtreceivevisacomment" READONLY><?php echo $woRow->wo_receivevisa_comment;?></textarea></td>
    	</tr>
    	<tr>
    	  <td>Received Calling Visa:</td>
    	  <td><input type="checkbox" name="chkisreceivevisa" onclick="checktrigger(this, txtreceivevisa, dtreceivevisa);"  <?php if($woRow->wo_isreceive_visa == '1') echo "CHECKED DISABLED";?> <?php if(strpos($accessibility, 's') == false) echo "DISABLED";?> <?php echo $strprocess ?>/>
            <input type="text" name="txtreceivevisa" id="txtreceivevisa"  value="<?php echo $woRow->wo_receivevisaby;?>" readonly/></td>
    	  <td><input type="text" name="dtreceivevisa" size="12" id="dtreceivevisa" value="<?php if(strlen($woRow->wo_receivevisadate) > 0 && $woRow->wo_receivevisadate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivevisadate));?>" readonly/>
            <input id="button18" name="btnDate18" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivevisa'), this)" <?php echo $strprocess ?>/></td>
    	  <td></td>
		  <!--td align="left"><?php echo anchor_popup("contSpim/printHandoverList/". $woRow->wo_id,"Print Handover Letter");?>
    	   <p><?php echo anchor_popup("contSpim/printSPList/". $woRow->wo_id,"Print SP Application Letter");?></p>
   	      <p><?php echo anchor_popup("contSpim/printCOMList/". $woRow->wo_id,"Print COM Application Letter");?></p>
   	      <p><?php echo anchor_popup("contSpim/printHandoverArr/". $woRow->wo_id,"Print Handover Letter (Arrival)");?></p>
          <p><?php echo anchor_popup("contSpim/printPLKS1year/". $woRow->wo_id,"Print PLKS First Year Reminder");?></p></td-->
    	  <td><?php echo anchor_popup("contSpim/printVDRApp/". $woRow->wo_id,"Print VDR Application");?>
    	  <p><?php echo anchor_popup("contSpim/printWPList_H/". $woRow->wo_id,"Print Surat Wakil - Ariff ");?></p>
          <p><?php echo anchor_popup("contSpim/printWPList_R/". $woRow->wo_id,"Print Surat Wakil - Ikmal ");?></p>
    	  <p><?php echo anchor_popup("contSpim/printHOVDR/". $woRow->wo_id,"Print Hand Over Acknowledgement ");?></p>
    	  <p><?php echo anchor_popup("contSpim/printPLKSIP/". $woRow->wo_id ."/".$woRow->wo_num,"PLKS in Progress");?></p></td>
  	  </tr>
    	<tr>
    	  <td>&nbsp;</td>
    	  <td colspan="4"><input name="button" type="button" onclick="handover('<?php echo $woRow->wo_clab_no;?>')" value="Handover Letter"/>
              <input name="button2" type="button" onclick="pengesahan('<?php echo $woRow->wo_clab_no;?>')" value="Surat Pengesahan"/></td>
   	  </tr>
    	<tr>
    	  <td>Close This Workorder</td>
    	  <td colspan="4"><input type="checkbox" name="iswithd" value="1" onclick="checktrigger(this, 'Close', dtwithd);"<?php if($woRow->wo_iswithdrawal == '1') echo "CHECKED";?> <?php echo $strprocess ?>/>
Date:
  <input type="text" name="dtwithd" id="dtwithd" size="12" value="<?php if($woRow->wo_withd_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_withd_date));?>"/>
  <input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtwithd'), this)" <?php echo $strprocess ?>/>
&nbsp; &nbsp; Reason:          
<input type="text" name="reasonwithd" size="60" value="<?php echo $woRow->wo_withd_reason;?>"/></td>
    	</tr>
    </table>
    <br />
    <table width="100%" border="0">
    	<tr>
    		<td align="center">
			   
			    <input type="hidden" name="orig_wo_vercorp" value="<?php echo $woRow->chk_ver_corp;?>" />
				<input type="hidden" name="orig_wo_verfin" value="<?php echo $woRow->chk_ver_fin;?>" />
				<input type="hidden" name="orig_wo_appceo" value="<?php echo $woRow->chk_app_ceo;?>" />
    			<input type="hidden" name="orig_wo_isreceive" value="<?php echo $woRow->wo_isreceive;?>" />
    			<input type="hidden" name="orig_wo_isprocess" value="<?php echo $woRow->wo_isprocess;?>" />
    			<input type="hidden" name="orig_wo_issentto_hr" value="<?php echo $woRow->wo_issentto_hr;?>" />
    			<input type="hidden" name="orig_wo_isreceiveby_hr" value="<?php echo $woRow->wo_isreceiveby_hr;?>" />
    			<input type="hidden" name="orig_wo_isjim_ack" value="<?php echo $woRow->wo_isjim_ack;?>" />
    			<input type="hidden" name="orig_wo_isreceive_visa" value="<?php echo $woRow->wo_isreceive_visa;?>" />
				<input type="submit" name="btnupdate" value=" Update Workorder " onclick="return confirm('Are you sure you want to update?');" <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
				<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contSpim/updateWorkorder'" />    		
    		</td>
    	</tr>
    </table>
  </form>
  
    <br />
  <table width="100%" border="0">
  	<tr>
  		<th colspan="6" align="LEFT">TRACKING LOG</th>
  		<th colspan="2" align="RIGHT"><input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
  			<input type="button" name="btnRefresh" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contSpim/updateWorkOrderPt2/<?php echo $woRow->wo_id;?>/updatephonetrack'"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>  		</th>
  	</tr>
  	<tr>
  	    <th width="5%">No.</th>
  		<th width="17%">Date & Time</th>
  		<th width="13%">Attend By</th>
  		<th width="12%">Remarks</th>
  		<th width="8%">Action</th>
  		<th width="13%">Action By</th>
  		<th colspan="2">Completion Date</th>
  	</tr>
  	<?php if($allPhTrackLog->num_rows() == 0){
	    ?>
	<tr>
		<td colspan="8"><strong><font color="red">No phone tracking log.</font></strong></td>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($allPhTrackLog->result() as $log){
	?>
	<tr>
		<td><?php echo $i++;?></td>
	  <td><?php echo date('d-m-Y g:i a', strtotime($log->track_datetime));?>
      <!--input type="textbox" name="trackID" value="<?php echo $log->track_id;?>" /--></td>
		<td><?php echo $log->track_attendby;?></td>
		<td><?php echo $log->track_remarks;?></td>
		<td><?php echo $log->track_action;?></td>
		<td><?php echo $log->track_actionby;?></td>
		<td width="28%"><?php if($log->track_compdate!= "0000-00-00") echo date('d-m-Y', strtotime($log->track_compdate));?></td>
	    <td width="4%"><input type="button" value="Edit" onclick="EditTrackLog('<?php echo $log->track_id;?>')" <?php echo $close ?>/></td>
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
		},
		'payrefno':{'l':'Official Receipt No','r':true,'t':'t_payref'}
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
