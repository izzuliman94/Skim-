<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- ? Dynamic Drive (www.dynamicdrive.com)
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
	
	function openuploadwindow(){
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contRenewal/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function newphtracklog(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contRenewal/newPhoneTrackLog');?>/" + workorderid + "/" + companyname
		
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
		var url = "<?php echo site_url('contRenewal/acknowledge');?>/" + wono
		window.open(url,'Acknowledgement','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
</script>  
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="<?php echo site_url();?>/contRenewal/spimDashbrd">SPIM (Renewal)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Batch Application <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />View Workorders</h4>

<h3 id="switchsection1-title" class="handcursor">View Work Order<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Workorder has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">The workorder has been updated!</font></strong>";
	else { //dummy else
	};
}

	if($woRow->doc_rqform == '1' 
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
  <form action="<?php echo site_url();?>/contRenewal/updateWorkOrderPt2Submit" method="POST" name="updateWorkorderForm" id="updateWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Workorder No</td>
			<td width="33%">
				<input type="hidden" name="txtwoid" value="<?php echo $woRow->wo_id;?>" />	
				<input type="text" name="workorderno" value="<?php if(strlen($woRow->wo_num) == 0) echo $woRow->wo_id; else echo $woRow->wo_num;?>" READONLY/></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php if($woRow->wo_datesubmit != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_datesubmit));?>" size="12" READONLY/>
				<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="txtcompname" size="50" value="<?php echo $woRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td>
            <input type="text" name="txtclabno" value="<?php echo $woRow->wo_clab_no;?>" READONLY />&nbsp;
            <!--input type="button" name="btnbatchapp" value="Batch Application"  onclick="openBatch('<?php echo $woRow->wo_clab_no;?>')"/-->
            </td>
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
				</SELECT>
			</td>
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
					  <!--input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" /-->
			</td>
		</tr>
		<tr>
		  <td>Visa Date</td>
		  <td><input type="text" name="dtvisa" id="dtvisa" size="12" value="<?php if($woRow->wo_visa_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_visa_date));?>"/>
		<!--input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtvisa'), this)" /--></td>
		  <td>JTK Submission </td>
		  <td><input type="checkbox" name="chkjtk" value="1" <?php if($woRow->wo_jtk == '1') echo "CHECKED"; ?>/> Rerefence No. <input type="text" name="txtrefjtk" width="200" value="<?php echo $woRow->wo_jtk_ref ?>"/></td>
	  </tr>
	   <tr>
	      <td>Description Of Application</td>
		  <td><select></select></td>
		  <td>History Of Application</td>
		  <td><select></select></td>
	  </tr>
    </table>
    <br />
    <table width="80%" border="0">
    	<tr>
    		<th align="LEFT"> REQUIRED DOCUMENTS (Comp) </th>
    		<th align='RIGHT'><!--input type="button" name="btnack" value="Acknowledgement" onclick="openack('<?php echo $woRow->wo_clab_no;?>')" <?php echo $btnack ?>/--></th>
    	</tr>
		<tr>
		    <td><input type="checkbox" name="chkoripass" value="1"  <?php if($woRow->doc_ori_passport == '1') echo "CHECKED"; ?> /> Original Passport</td>
		    <td><input type="text" name="dtoripass" id="dtoripass" size="11" value="<?php if($woRow->doc_ori_passport_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_ori_passport_date));?>"/>
    			<!--input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtoripass'), this)" /--></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkfomema" value="1" <?php if($woRow->doc_fomema == '1') echo "CHECKED"; ?>/> FOMEMA Slip</td>
		    <td><input type="text" name="dtfomema" id="dtfomema" size="11" value="<?php if($woRow->doc_fomema_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_fomema_date));?>"/>
    			<!--input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfomema'), this)" /--></td>
		</tr>
		<tr>
		    <td><input type="checkbox" name="chkappletter" value="1" <?php if($woRow->doc_extplks == '1') echo "CHECKED"; ?>/> Employer's Apllication Letter</td>
		    <td><input type="text" name="dtappletter" id="dtappletter" size="11" value="<?php if($woRow->doc_extplks_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_extplks_date));?>"/>
    			<!--input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappletter'), this)" /--></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkdetails" value="1" <?php if($woRow->doc_details == '1') echo "CHECKED"; ?>/> Details of worker next of kin and relationship</td>
		    <td><input type="text" name="dtdetails" id="dtdetails" size="11" value="<?php if($woRow->doc_details_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_details_date));?>"/>
    			<!--input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtdetails'), this)" /--></td>
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
    		<td colspan="2" align="LEFT">
    			Date Documents Completed: <input type="text" name="dtcompletedoc" id="dtcompletedoc" value="<?php if($woRow->doc_datecomplete != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_datecomplete));?>"/>
    			<!--input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" /-->
    		</td>
    	</tr>
    </table>
    <br />
       <table width="80%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
		<tr>
    		<td colspan="6">REF NO.: <input type="text" name="payrefno" size="50" value="<?php echo $woRow->pay_refno;?>" /></td>
    	</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkimigration" value="1" <?php if($woRow->pay_imigration == '1') echo "checked";?>/> Jabatan Immigresen - Ketua Pengarah Imigresen Malaysia <i>(Processing Fees/Visa/Levi)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkclab" value="1" <?php if($woRow->pay_clab == '1') echo "checked";?>/> CLAB - Construction Labour Exchange Centre Berhad <i>(Admin Fees/*6% Service Tax)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkins_guarante" value="1" <?php if($woRow->pay_ins_guarante == '1') echo "checked";?>/> Insurance - Lonpac Insurance Berhad <i>(Insurance Guarantee / FWCS / Stamp Duty/*6% Service Tax)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkins_hospital" value="1" <?php if($woRow->pay_ins_hospital == '1') echo "checked";?>/> Insurance - Lonpac Insurance Berhad <i>(Foreign Worker Hospitalisation and Surgical Insurance Scheme / Stamp duty)</i></td>
		</tr>
    	<tr>
    		<td>Admin Fee:</td>
    		<td>
    			<SELECT name="seladminfee">
    				<option value="NO" <?php if($woRow->pay_adminfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_adminfee == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    		</td>
    		<td>LEVY:</td>
    		<td>
    			<SELECT name="sellevy">
    				<option value="NO" <?php if($woRow->pay_levy == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_levy == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    		</td>
    		<td>PLKS:</td>
    		<td>
    			<SELECT name="selplks">
    				<option value="NO" <?php if($woRow->pay_plks == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_plks == "YES") echo "SELECTED";?>>YES</option>
    			</SELECT>
    		</td>
    	</tr>
    	 	<tr>
    		<td>Agency Fee:</td>
    		<td>
    			<SELECT name="selagencyfee">
    				<option value="NO" <?php if($woRow->pay_agencyfee == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_agencyfee == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>FOMEMA:</td>
    		<td>
    			<SELECT name="selfomema">
    				<option value="NO" <?php if($woRow->pay_fomema == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_fomema == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>VISA:</td>
    		<td>
    			<SELECT name="selvisa">
    				<option value="NO" <?php if($woRow->pay_visa == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_visa == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    	</tr>
    	 	<tr>
    		<td>IG:</td>
    		<td>
    			<SELECT name="selig">
    				<option value="NO" <?php if($woRow->pay_ig == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_ig == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>FWCS:</td>
    		<td>
    			<SELECT name="selfwcs">
    				<option value="NO" <?php if($woRow->pay_fwcs == "NO") echo "SELECTED";?>>NO</option>
    				<option value="YES" <?php if($woRow->pay_fwcs == "YES") echo "SELECTED";?>>YES</option>
    	   	    </SELECT>
    		</td>
    		<td>FWHS:</td>
    		<td><select name="selfwhs" id="selfwhs">
              <option value="NO" <?php if($woRow->pay_fwhs == "NO") echo "SELECTED";?>>NO</option>
              <option value="YES" <?php if($woRow->pay_fwhs == "YES") echo "SELECTED";?>>YES</option>
            </select></td>
    	</tr>
    </table>
      <br />
      <table width="80%" border="0">
      	<tr>
      		<th colspan="3" align="LEFT">LIST OF FCL</th>
      		<th align="RIGHT" colspan="2"><!--input type="button" name="btnRegisNewLabour" value="Register New Labour" onclick="registerNewLabor();"/><!--input type="button" name="btnUploadFCL" value="Upload FCL list" class="smoothbtn1" onclick="openuploadwindow();" /--></th>
      	</tr>
      	<?php if($allFCLFiles->num_rows() == 0){ ?>
      	<tr>
      		<td colspan="5"><font color="red"><strong>No FCL lists has been insert for this workorder.</strong></font></td>
      	</tr>
      	<?php }
      	else{
	    ?>
	    <tr>
      	 	<th>No.</th>
      	 	<th>Name</th>
      	 	<th>Passport No</th>
      	 	<th>Nationality</th>
            <!--th align="center">Action</th-->
   	    </tr>	
	    <?php $i = 1;
	      	foreach($allFCLFiles->result() as $fcl){
      	 ?>
      	 <tr>
      	 	<td><?php echo $i++;?></td>
      	 	<td><?php echo $fcl->wkr_name;?></a></td>
      	 	<td><?php echo $fcl->fcl_passno;?></td>
      	 	<td><?php echo $fcl->nat_desc;?></td>
            <!--td align="center">
            <input type="button" value="Edit / Delete" onclick="EditFCL('<?php echo $fcl->fcl_id;?>')"/>
             
            </td-->
      	 </tr>
      	 <?php }
  	 	 }
  	 	 ?>
         <tr>
            <td colspan="5">
            <!--input type="button" value="Lampiran A" onclick="OpenLampiran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> /-->
            <!--input type="button" value="2nd Schedule" onclick="OpenSecondSchedule('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="IM12" onclick="OpenIM12('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="Addendum" onclick="OpenAddendum('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> />
            <input type="button" value="Borang Bayaran" onclick="OpenBorangBayaran('<?php echo $woRow->wo_id; ?>')" <?php if($allFCLFiles->num_rows() == 0){ echo "disabled"; }?> /-->
            </td>
         </tr>
      </table>
      <br />
    <table width="100%" border="0">
    	<tr>
    		<th colspan="3" align="LEFT">LEGAL</th>
            <th colspan="2" align="RIGHT"><!--input type="button" name="btnRegisNewLegal" value="Register New Legal" onclick="registerNewLegal();"/--></th>
    	</tr>
        <tr>
            <th width="30%">Aggrement No</th>
            <th width="20%">Reference No</th>
            <th width="20%">Date</th>
            <th width="20%">Remarks</th>
            <!--th width="10%">Action</th-->
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
      	 	<td><?php echo $legal->wo_agg_ref_no;?></a></td>
      	 	<td><?php echo date('d M Y',strtotime($legal->wo_agg_date));?></td>
      	 	<td><?php echo $legal->wo_agg_remarks;?></td>
            <!--td align="center">
            <input type="button" value="Edit / Delete" onclick="EditLegal('<?php echo $legal->wo_agg_id ?>')"/>
             
            </td-->
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
    		<td>Received by Corporate Support:</td>
    		<td><input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" /> <!--for javascript to get currentuser-->
    			<input type="checkbox" name="chkisreceive" value="1" onclick="checktrigger(this, txtreceiveby, dtreceive);" <?php if($woRow->wo_isreceive == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtreceiveby" id="txtreceiveby" value="<?php echo $woRow->wo_receiveby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtreceive" size="12" id="dtreceive"  value="<?php if(strlen($woRow->wo_receivedate) > 0 && $woRow->wo_receivedate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivedate));?>" READONLY/>
    			<!--input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceive'), this)" /-->    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivecomment" value="<?php echo $woRow->wo_receive_comment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Process by Corporate Support:</td>
    		<td><input type="checkbox" name="chkisprocess" value="1" onclick="checktrigger(this, txtprocessby, dtprocess);" <?php if($woRow->wo_isprocess == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtprocessby" id="txtprocessby"  value="<?php echo $woRow->wo_processby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtprocess" size="12" id="dtprocess" value="<?php if(strlen($woRow->wo_processdate) > 0 && $woRow->wo_processdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_processdate));?>" READONLY/>
    			<!--input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtprocess'), this)" /-->    		</td>
    		<td align="center"><?php echo anchor_popup("contRenewal/printCheckLits/". $woRow->wo_id,"PrintChecklist");?></td>
    		<td><input type="text" name="txtprocesscomment" value="<?php echo $woRow->wo_process_comment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Submit to Corporate Services:</td>
    		<td><input type="checkbox" name="chkissubmit" onclick="checktrigger(this, txtsubmithr, dtsubmithr);"  <?php if($woRow->wo_issentto_hr == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtsubmithr" id="txtsubmithr"  value="<?php echo $woRow->wo_senthrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtsubmithr" size="12" id="dtsubmithr" value="<?php if(strlen($woRow->wo_senthrdate) > 0 && $woRow->wo_senthrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_senthrdate));?>" READONLY/>
    			<!--input id="button15" name="btnDate15" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmithr'), this)" /-->    		</td>
    		<td></td>
    		<td><input type="text" name="txtsenthrcomment" value="<?php echo $woRow->wo_senthrcomment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Received by Corporate Services:</td>
    		<td><input type="checkbox" name="chkisreceivebyhr" onclick="checktrigger(this, txtreceivebyhr, dtreceivebyhr);"  <?php if($woRow->wo_isreceiveby_hr == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtreceivebyhr" id="txtreceivebyhr"  value="<?php echo $woRow->wo_receivehrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtreceivebyhr" size="12" id="dtreceivebyhr" value="<?php if(strlen($woRow->wo_receivehrdate) > 0 && $woRow->wo_receivehrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivehrdate));?>" READONLY/>
    			<!--input id="button16" name="btnDate16" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivebyhr'), this)" /-->    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivehrcomment" value="<?php echo $woRow->wo_receivehr_comment;?>"/></td>
    	</tr>
    	
    	<tr>
    	  <td>Close This Workorder</td>
    	  <td colspan="4"><input type="checkbox" name="iswithd" value="1" <?php if($woRow->wo_iswithdrawal == '1') echo "CHECKED";?>/>
Date:
  <input type="text" name="dtwithd" id="dtwithd" size="12" value="<?php if($woRow->wo_withd_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_withd_date));?>"/>
  <!--input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtwithd'), this)" /-->
&nbsp; &nbsp; Reason:
<input type="text" name="reasonwithd" size="60" value="<?php echo $woRow->wo_withd_reason;?>"/><br /><!--input type="button" value="Handover Letter" /><input type="button" value="Surat Pengesahan" /--></td>
  	  </tr>
    </table>
    <br />
    <table width="100%" border="0">
    	<tr>
    		<td align="center">
    			<input type="hidden" name="orig_wo_isreceive" value="<?php echo $woRow->wo_isreceive;?>" />
    			<input type="hidden" name="orig_wo_isprocess" value="<?php echo $woRow->wo_isprocess;?>" />
    			<input type="hidden" name="orig_wo_issentto_hr" value="<?php echo $woRow->wo_issentto_hr;?>" />
    			<input type="hidden" name="orig_wo_isreceiveby_hr" value="<?php echo $woRow->wo_isreceiveby_hr;?>" />
    			<input type="hidden" name="orig_wo_isjim_ack" value="<?php echo $woRow->wo_isjim_ack;?>" />
    			<input type="hidden" name="orig_wo_isreceive_visa" value="<?php echo $woRow->wo_isreceive_visa;?>" />
				<!--input type="submit" name="btnupdate" value=" Update Workorder " onclick="return confirm('Are you sure you want to update?');" <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> <?php echo $close ?>/-->
				<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contRenewal/updateWorkorder'" />    		
    		</td>
    	</tr>
    </table>
  </form>
  
    <br />
  <table width="100%" border="0">
  	<tr>
  		<th colspan="6" align="LEFT">TRACKING LOG</th>
  		<th colspan="1" align="RIGHT"><!--input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/-->
  			<!--input type="button" name="btnRefresh" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contRenewal/updateWorkOrderPt2/<?php echo $woRow->wo_id;?>/updatephonetrack'"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/-->
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
