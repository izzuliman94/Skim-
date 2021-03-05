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
			        break;
		        case "visible":
			        scwHide();
	        }
        }
    </script>	
<script type="text/javascript">
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
	 var url = "<?php echo site_url('contRenewal/email_item');?>/" + workorderid 
	 window.open(url, 'Insurance Purchase', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	}
	
	
	function openuploadwindow(){
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function newphtracklog(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contAck/newPhoneTrackLog');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Workorder Reject History', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	/*function registerNewLabor(){
		var avlabrefno = document.updateWorkorderForm.workorderno.value
		window.open('<?php echo site_url();?>/contavailable/regisNewLabourPt1/' + avlabrefno, 'Register new labour', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}*/
	function registerNewLabor(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/regnewlabour');?>/" + workorderid + "/" + companyname
		window.open(url, 'Register new FCL', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
		function registerNewLegal(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/regnewlegal');?>/" + workorderid + "/" + companyname
		window.open(url, 'Register new legal', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	
	
	function EditFCL(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/EditFCL');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit FCL', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
		
	}
	
	function EditLegal(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/EditLegal');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit Legal', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
    function openBatch(clabid){
		var clabid = clabid;
		var clabno = document.updateWorkorderForm.txtclabno.value
		var companyname = document.updateWorkorderForm.txtcompname.value
		
		var url = "<?php echo site_url('contRenewal/batchlistwo');?>/" + clabno + "/" + encodeURIComponent(companyname)
		window.open(url, 'Batch Application List', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	
	}
	
	function OpenLampiran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/lampiran_a');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenSecondSchedule(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/second_schedule');?>/" + wono
		window.open(url, '2nd Schedule', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenIM12(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/im12');?>/" + wono
		window.open(url, 'IM12', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenAddendum(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/addendum');?>/" + wono
		window.open(url, 'Addendum', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenBorangBayaran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/borangbayaran');?>/" + wono
		window.open(url, 'Borang Bayaran', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openack(wono){
		var wono = wono;
		var url = "<?php echo site_url('contAck/acknowledge');?>/" + wono
		window.open(url,'Acknowledgement','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function handover(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contRenewal/handoverletter');?>/" + wono + "/" + workorderid
	   window.open(url,'handover letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function pengesahan(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contRenewal/confirmletter');?>/" + wono + "/" + workorderid
	   window.open(url,'confirm letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}

	function openprintform(){
	   window.open('<?php echo site_url('contRenewal/openprintform');?>','Print Form','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function paymentlist(clabno){
	
	  var frm = "update";
	  var url = "<?php echo site_url('contRenewal/openreceipt');?>/" + frm + "/" + clabno;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
	
	function OpenLampiranExcel(wono){
		var wono = wono;
		var url = "<?php echo site_url('contRenewal/lampiran_a_excel');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function selectall(){
	
	     document.updateWorkorderForm.chkoripass.checked = true;
		 document.updateWorkorderForm.chkfomema.checked = true;
		 document.updateWorkorderForm.chkappletter.checked = true;
		 document.updateWorkorderForm.chkdetails.checked = true;
		 document.updateWorkorderForm.chkothers.checked = true;
		 
		 
		 //document.updateWorkorderForm.dtoripass.value = '<?php echo date('d-m-Y')?>';
		 //document.updateWorkorderForm.dtfomema.value = '<?php echo date('d-m-Y')?>';
		 //document.updateWorkorderForm.dtappletter.value = '<?php echo date('d-m-Y')?>';
		 //document.updateWorkorderForm.dtdetails.value = '<?php echo date('d-m-Y')?>';
		 //document.updateWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		 
	}
	
	function fomemacheck(val){
	
	if(val == 2 || val == 3){
	  
	   document.updateWorkorderForm.chkfomema.disabled = false;
	   document.updateWorkorderForm.btnDate5.disabled = false;
	  // document.updateWorkorderForm.selfomema.disabled = false;
	
	}else{
	  
	   document.updateWorkorderForm.chkfomema.checked = false;
	   document.updateWorkorderForm.dtfomema.value = "";
	  // document.updateWorkorderForm.selfomema.value = 'NO';
	   document.updateWorkorderForm.chkfomema.disabled = true;
	   document.updateWorkorderForm.btnDate5.disabled = true;
	  // document.updateWorkorderForm.selfomema.disabled = true;
	}
	}
	
</script>  
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
	
	
	if($woRow->wo_yearrenew == '2' || $woRow->wo_yearrenew == '3'){
	   $fomemacontrol = '';
	}else{
	   $fomemacontrol = 'disabled=disabled';	
	}
	
	if($woRow->wo_isreceive == '1' && $woRow->wo_isprocess == '1'){
	    
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
<h4><a href="<?php echo site_url();?>/contAck/spimDashbrd">Acknowledgement</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Update Acknowledgement </h4>

<h3 id="switchsection1-title" class="handcursor">Update Acknowledgement<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Acknowledgement has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">The Acknowledgement has been updated!</font></strong>";
	else { //dummy else
	};
}
// && $woRow->doc_fomema == '1' 
	if($woRow->doc_ori_passport == '1' 
				   && $woRow->doc_extplks == '1' 
				   && $woRow->doc_details == '1'
				   && $woRow->doc_datecomplete != '0000-00-00'){
	$doc = "hide";
	$doctext = "readonly";
	$doc1 = "disabled=disabled";
	$btnack = "";
	}else{
	$doc = "";
	$doctext = "";
	$doc1 = "";
	$btnack = "disabled=disabled";
	};
	
	if($woRow->wo_iswithdrawal == '1' && $woRow->wo_withd_date != '0000-00-00'){
	$close = "disabled=disabled";	
	}else{
	$close = "";	
	}

?>
  <form action="<?php echo site_url();?>/contAck/updateAcknowledgementPt2Submit" method="POST" name="updateWorkorderForm" id="updateWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Acknowledgement No</td>
	  <td width="33%">
				<input type="hidden" name="txtwoid" value="<?php echo $woRow->wo_id;?>" />	
				<input type="text" name="workorderno" value="<?php if(strlen($woRow->wo_num) == 0) echo $woRow->wo_id; else echo $woRow->wo_num;?>" READONLY/></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php if($woRow->wo_datesubmit != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_datesubmit));?>" size="12" READONLY/>
		<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="txtcompname" size="50" value="<?php echo $woRow->ctr_comp_name;?>" READONLY /></td>
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
			<td colspan="3">
				<input type="text" name="txtfcltotal" size="4" value="<?php echo $woRow->wo_fcl_total;?>"/> &nbsp;
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>" <?php if($woRow->wo_fcl_country == $country->cty_id) echo "SELECTED";?>><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>			</td>
			<!--td>Agency Name</td>
			<td><SELECT name="selagency">
				<?php foreach($allAgencies->result() as $agency){
				?>
					<option value="<?php echo $agency->agency_id;?>" <?php if($woRow->wo_agency == $agency->agency_id) echo "SELECTED";?>><?php echo $agency->agency_name;?></option>
				<?php }
				?>
				</SELECT>
			</td-->
		</tr>
		<!--tr>
			<td>REPLACEMENT</td>
			<td colspan="3">
				<input type="checkbox" name="chkisreplace" value="1" <?php if($woRow->wo_isreplacement == '1') echo "CHECKED";?> />
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" value="<?php if($woRow->wo_replace_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_replace_date));?>"/>
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" value="<?php echo $woRow->wo_replace_reason;?>"/>
			</td>
		</tr>
		</tr>
			<td>&nbsp;</td>
			<td colspan="3">&nbsp;</td>
		</tr-->
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
		   <td>Sender Contact No.</td>
		   <td><input type="text" name="txtsenderctc" size="20" value="<?php echo $woRow->wo_sender_contact;?>" /></td>
		    <td>Attending Officer </td>
		   <td><input type="text" name="txtattnoff" value="<?php echo $woRow->wo_attn_officer;?>" size="40"/></td>	
		</tr>
		<!--tr>
		  <td>Year Of Renewal</td>
		  <td colspan="3"><select name="selyearrenew" onchange="fomemacheck(this.value)">
		      <option value='0'>Select Year</option>
		      <option value="1" <?php if($woRow->wo_yearrenew == '1') echo "selected";?>>1 Year</option>
			  <option value="2" <?php if($woRow->wo_yearrenew == '2') echo "selected";?>>2 Years</option>
			  <option value="3" <?php if($woRow->wo_yearrenew == '3') echo "selected";?>>3 Years</option>
			  <option value="4" <?php if($woRow->wo_yearrenew == '4') echo "selected";?>>4 Years</option>
			  <option value="5" <?php if($woRow->wo_yearrenew == '5') echo "selected";?>>5 Years</option>
			  <option value="6" <?php if($woRow->wo_yearrenew == '6') echo "selected";?>>6 Years</option>
			  <option value="7" <?php if($woRow->wo_yearrenew == '7') echo "selected";?>>7 Years</option>
			  <option value="8" <?php if($woRow->wo_yearrenew == '8') echo "selected";?>>8 Years</option>
			  </select></td>
			</tr-->  
		
    </table>
	  <br>
	  <!--table width="100%" >
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
	     <td>Checked By </td>
	     <td><input name="chk_chk_by" type="checkbox" onclick="checktrigger(this, txtchkby, dtchkby);"/>&nbsp;<input type="text"  name="txtchkby"/></td>
	     <td>Date Checked </td>
	     <td><input type="text" name="dtchkby" id="dtchkby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtchkby'), this)" /></td>
	   </tr>
	   <tr>
	     <td>Verify By </td>
	     <td><input name="chk_ver_by" type="checkbox" onclick="checktrigger(this, txtverby, dtverby);"/>&nbsp;<input type="text"  name="txtverby"/></td>
	     <td>Date Verify </td>
	     <td><input type="text" name="dtverby" id="dtverby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtverby'), this)" /></td>
	   </tr>
	    <tr>
	     <td>Approved By </td>
	     <td><input name="chk_app_by" type="checkbox" onclick="checktrigger(this, txtappby, dtappby);"/>&nbsp;<input type="text"  name="txtappby" /></td>
	     <td>Date Approved </td>
	     <td><input type="text" name="dtappby" id="dtappby" size="11" value=""/>
             <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappby'), this)" /></td>
	   </tr>
	  
    </table>
    <br /-->
    <table width="100%" border="0">
    	<tr>
    		<th align="LEFT"> REQUIRED DOCUMENTS (Comp) </th>
    		<th align='RIGHT'><input type="button" name="btnack" value="Acknowledgement" onclick="openack('<?php echo $woRow->wo_id;?>')" <?php echo $btnack ?>/></th>
    	</tr>
		<tr>
		    <td><input type="checkbox" name="chkoripass" value="1" onclick="checktrigger(this, txtuser, dtoripass);"  <?php if($woRow->doc_ori_passport == '1') echo "CHECKED"; ?> /> 
		      Original Passport 
	          <input type="hidden" name="txtuser" id="txtuser"  value="<?php echo $woRow->ver_corp_by;?>" readonly="READONLY"/></td>
		    <td><input type="text" name="dtoripass" id="dtoripass" size="11" value="<?php if($woRow->doc_ori_passport_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_ori_passport_date));?>"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtoripass'), this)" /></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkfomema" value="1" onclick="checktrigger(this, txtuser, dtfomema);" <?php if($woRow->doc_fomema == '1') echo "CHECKED"; ?> /> FOMEMA Slip</td>
		    <td><input type="text" name="dtfomema" id="dtfomema" size="11" value="<?php if($woRow->doc_fomema_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_fomema_date));?>"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfomema'), this)" /></td>
		</tr>
		<tr>
		    <td><input type="checkbox" name="chkappletter" value="1" onclick="checktrigger(this, txtuser, dtappletter);"<?php if($woRow->doc_extplks == '1') echo "CHECKED"; ?>/> Employer's Apllication Letter</td>
		    <td><input type="text" name="dtappletter" id="dtappletter" size="11" value="<?php if($woRow->doc_extplks_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_extplks_date));?>"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappletter'), this)" /></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkdetails" value="1" onclick="checktrigger(this, txtuser, dtdetails);" <?php if($woRow->doc_details == '1') echo "CHECKED"; ?>/> Details of worker next of kin and relationship</td>
		    <td><input type="text" name="dtdetails" id="dtdetails" size="11" value="<?php if($woRow->doc_details_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_details_date));?>"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtdetails'), this)" /></td>
		</tr>
    	<!--tr>
    		<td><input type="checkbox" name="chkreqform" value="1"/>Request Form (R02) &nbsp; &nbsp;&nbsp;
				<input type="text" name="dtreqform" id="dtreqform" size="11"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" />
    		</td>
    		<td><input type="checkbox" name="chkempletter" value="1"/>Employment Letter  &nbsp; &nbsp; &nbsp; &nbsp; 
    			<input type="text" name="dtempletter" id="dtempletter" size="11" />
    			<input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtempletter'), this)" />
    		</td>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkawardletter" value="1"/>Letter of Award &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
    			<input type="text" name="dtawardletter" id="dtawardletter" size="11" />
    			<input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" />
    		</td>
    		<td><input type="checkbox" name="chksupagree" value="1"/>Supplier Agreement &nbsp; &nbsp; &nbsp;
    			<input type="text" name="dtsupagree" id="dtsupagree" size="11" />
    			<input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsupagree'), this)" />
    		</td>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkaccopic" value="1"/>Accomodation Pic/Add 
    			<input type="text" name="dtaccopic" id="dtaccopic" size="11" />
    			<input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtaccopic'), this)" />
    		</td>
    		<td><input type="checkbox" name="chksignedpay" value="1"/>Signed Payment Advice 
    			<input type="text" name="dtsignedpay" id="dtsignedpay" size="11" />
    			<input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsignedpay'), this)" />
    		</td>
    	</tr-->
    	<tr>
    	  <td align="LEFT"><input type="checkbox" name="chkothers" value="1" onclick="checktrigger(this, txtuser, dtothers);" <?php if($woRow->doc_others == '1') echo "CHECKED"; ?>/>
   	      Other Details 
   	        <input type="text" name="txtothers" value="<?php echo $woRow->doc_others_detail;?>" size="40"/></td>
  	      <td><input type="text" name="dtothers" id="dtothers" size="11" value="<?php if($woRow->doc_others_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_others_date));?>"/>
            <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtothers'), this)" /></td>
   	  </tr>
    	<tr>
    		<td colspan="2" align="LEFT">
    			Date Documents Completed: <input type="text" name="dtcompletedoc" id="dtcompletedoc" value="<?php if($woRow->doc_datecomplete != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_datecomplete));?>"/>
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" />    		</td>
    	</tr>
		<tr>
		   <td colspan="2"><input type="button" value="Select All" onclick="selectall()"/></td>
		</tr>
    </table>
<br />
       <table width="100%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
		<tr>
    		<!--td colspan="6">OFFICIAL RECEIPT NO<font color="red">*</font>.: <input type="text" name="payrefno" value="<?php echo $woRow->pay_refno;?>" size="60" /><input type="button" value="..." onclick="paymentlist('<?php echo $woRow->wo_clab_no;?>')"/></td-->
    	</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkimigration" value="1" <?php if($woRow->pay_imigration == '1') echo "checked";?>/> Jabatan Immigresen - Ketua Pengarah Imigresen Malaysia <i>(Processing Fees/Visa/Levi)
		     <input type="text" name="txtimidetail" value="<?php echo $woRow->pay_imigration_detail;?>" size="40"/>
		   </i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkclab" value="1" <?php if($woRow->pay_clab == '1') echo "checked";?>/> CLAB - Construction Labour Exchange Centre Berhad <i>(Admin Fees/*6% Service Tax)
		     <input type="text" name="txtclabdetail" value="<?php echo $woRow->pay_clab_detail;?>" size="40"/>
		   </i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkins_guarante" value="1" <?php if($woRow->pay_ins_guarante == '1') echo "checked";?>/> Insurance - Lonpac Insurance Berhad <i>(Insurance Guarantee / FWCS / Stamp Duty/*6% Service Tax)
		     <input type="text" name="txtfwcsdetail" value="<?php echo $woRow->pay_fwcs_detail;?>" size="40"/>
		   </i></td>
		</tr>
		<tr>
		  <td colspan="6"><input type="checkbox" name="chkins_hospital" value="1" <?php if($woRow->pay_ins_hospital == '1') echo "checked";?>/>
Insurance - Lonpac Insurance Berhad <i>(Foreign Worker Hospitalisation and Surgical Insurance Scheme / Stamp duty)
<input type="text" name="txtfwhsdetail" value="<?php echo $woRow->pay_fwhs_detail;?>" size="40"/>
</i></td>
	     </tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkpayothers" value="1" <?php if($woRow->pay_others == '1') echo "checked";?>/> 
	      Other Payment 
          <input type="text" name="txtotherdetail" value="<?php echo $woRow->pay_others_detail;?>" size="40"/></td>
		</tr>
    </table>
    <br />
    <table width="100%" border="0">
		<tr>
		  <th colspan="3" align="left">Acknowledgement Process</th>
		</tr>
		<tr>
		    <td width="20%">Receive ( Client )</td>
			<td><input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" />
			  <input type="checkbox" name="chkvercorp" value="1" onclick="checktrigger(this, txtvercorp, dtvercorp);" <?php if($woRow->chk_ver_corp == '1') echo "CHECKED DISABLED";?>/>
			<input type="text" name="txtvercorp" id="txtvercorp"  value="<?php echo $woRow->ver_corp_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtvercorp" size="12" id="dtvercorp" value="<?php if(strlen($woRow->ver_corp_date) > 0 && $woRow->ver_corp_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->ver_corp_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtvercorp'), this)" <?php if(strpos($accessibility, 'y') == false) echo "DISABLED";  ?> <?php echo $strver1 ?>/> </td>
		</tr>
		<tr>
		    <td>Receiver ( Region )</td>
			<td><input type="checkbox" name="chkverfin" value="1" onclick="checktrigger(this, txtverfin, dtverfin);" <?php if($woRow->chk_ver_fin == '1') echo "CHECKED DISABLED";?> />
			<input type="text" name="txtverfin" id="txtverfin"  value="<?php echo $woRow->ver_fin_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtverfin" size="12" id="dtverfin" value="<?php if(strlen($woRow->ver_fin_date) > 0 && $woRow->ver_fin_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->ver_fin_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtverfin'), this)" <?php echo $strver2 ?> <?php if(strpos($accessibility, 'x') == false) echo "DISABLED";  ?>/> </td>
		</tr>
		<tr>
		    <td>Receiver ( HQ )</td>
			<td><input type="checkbox" name="chkappceo" value="1" onclick="checktrigger(this, txtappceo, dtappceo);" <?php if($woRow->chk_app_ceo == '1') echo "CHECKED DISABLED";?>/>
			<input type="text" name="txtappceo" id="txtappceo"  value="<?php echo $woRow->app_ceo_by;?>" READONLY/>			</td>
			<td><input type="text" name="dtappceo" size="12" id="dtappceo" value="<?php if(strlen($woRow->app_ceo_date) > 0 && $woRow->app_ceo_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->app_ceo_date));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappceo'), this)" <?php echo $strver3 ?> <?php if(strpos($accessibility, 'v') == false) echo "DISABLED";  ?>/> </td>
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
				<input type="hidden" name="orig_wo_it_ack" value="<?php echo $woRow->wo_it_ack;?>" />
				<input type="submit" name="btnupdate" value=" Update " onclick="return confirm('Are you sure you want to update?');" <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/>
				<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contRenewal/updateWorkorder'" />    		
    		</td>
    	</tr>
    </table>
    <table width="100%" border="0">
      <tr>
        <th colspan="6" align="left">TRACKING LOG</th>
        <th colspan="1" align="right"><input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/>
            <input type="button" name="btnRefresh" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contAck/updateWorkOrderPt2/<?php echo $woRow->wo_id;?>/updatephonetrack'"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/>
        </th>
      </tr>
      <tr>
        <th>No.</th>
        <th>Date &amp; Time</th>
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
</form>
  
    <!--javascript for form validation-->
<script>
	// form fields description structure
	var a_fields = {
		'txtfcltotal': {
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		}
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
