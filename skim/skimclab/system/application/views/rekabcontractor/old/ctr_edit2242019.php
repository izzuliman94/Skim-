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
function printAppRejLetter(){	
	var clabno = document.editCtrForm.clabno.value;
	var approve_reject = document.editCtrForm.approve_reject.value;
	if(approve_reject == "1")
			window.open('<?php echo site_url();?>/contContractor/printApproveRejLetter/approve/' + clabno);
	else if (approve_reject == "2")
			window.open('<?php echo site_url();?>/contContractor/printApproveRejLetter/reject/' + clabno);
	else {
	}
}

function printLetterMain(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/printLetterMain/' + clabno);
}

function printRenewal(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/printRenewal/' + clabno);
}

function printOPR1(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/printOPR1/' + clabno);
}

function printCert(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/printCert/' + clabno);
}

function attachdoc(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/regisAttachDoc/' + clabno);
}

function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			var monthNames = new Array(
					"01","02","03","04","05","06","07",
					"08","09","10","11","12");

			//get date
			var today = new Date()
			var tdate = today.getDate()
			var tmonth = monthNames[today.getMonth()]
			var tyear = today.getFullYear()
			
			txtbox.value=document.editCtrForm.currentlogin.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
		}
		else {
			txtbox.value=""
			datebox.value=""
		}
}

function addpayment(){
	var clabno = document.editCtrForm.clabno.value;
	window.open('<?php echo site_url();?>/contContractor/paymentForm/' + clabno, 'Add Payment Form', 'height=400, width=550, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');	
}

function addtospec(){
		if(document.getElementById("selspec").value != '0'){
				
			var existingspec = document.getElementById("txtspec").value;
			var newspecvalue = "";
				
			if(existingspec.length ==0)
				newspecvalue = document.getElementById("selspec").value;
			else 
				newspecvalue = existingspec + ',' + document.getElementById("selspec").value;				
				
				document.getElementById("txtspec").value = newspecvalue;
		}
	}
	
	function clearspec(){
		document.getElementById("txtspec").value = "";
	}
	
	function addtocategory(){
		if(document.getElementById("selcategory").value != '0'){
			var existingcatg = document.getElementById("txtcategory").value;
			var newcatgvalue = "";
			
			if(existingcatg.length ==0)
				newcatgvalue = document.getElementById("selcategory").value;
			else 
				newcatgvalue = existingcatg + ',' + document.getElementById("selcategory").value;
				
				document.getElementById("txtcategory").value = newcatgvalue;
		}
	}
	
	function clearcategory(){
		document.getElementById("txtcategory").value = "";
	}
	
	function getagent(process){
	var process
	var url = "<?php echo site_url('contContractor/agent_list');?>/" + process
    window.open(url, 'Agent list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
	
	function addkod(x,y){
		if(x==1) { document.getElementById("directorMobile").value='6'+y; }
		if(x==2) { document.getElementById("contactMobile").value='6'+y; }
	}

	function GetValidDate(){
		
		document.editCtrForm.clab_validdate.value = document.editCtrForm.clab_expdate.value; 
		//document.forms[0].txtnewpassno.value = document.forms[0].txtpassno.value;
	
	}
</script>
</head>

<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Company Registration </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Company Registration Details  <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<?php if(isset($successMsg)){
		if($successMsg == "add") echo  "<font color=\"red\"><strong>New Contractor has been registered!</strong></font>";
		else if($successMsg == "update") echo "<font color=\"red\"><strong>Contractor data has been updated!</strong></font>";
		else echo $successMsg;
	}
?>
<form action="<?php echo site_url();?>/contContractor/editCtrSubmit" method="POST" name="editCtrForm" id="editCtrForm" onsubmit="return v.exec()">
    <table width="100%" border="0">
    <tr>
        <th colspan="5" align="RIGHT">
        	<input type="hidden" name="txtregStatus" value="<?php echo $ctr->ctr_appstatus;?>" />
        	<input type="hidden" name="regisType" value="<?php echo $ctr->ctr_insertflag;?>" />
        	<input type="hidden" name="currentlogin" value="<?php echo $this->session->userdata('username');?>" />
        	<input type="button" name="btnCert" value="Print Cert" onclick="printCert()"/>
        	<input type="button" name="btnPrintOPR1" value="Print OPR1" onclick="printOPR1()"/>
        	<input type="button" name="btnPrintLetter" value="Print Letter" onclick="printLetterMain()"/>
        	<input type="button" name="btnPrintRenewal" value="Print Renewal" onclick="printRenewal()"/>
        	<input type="submit" name="btnUpdate" value="Update" onclick="return confirm('Are you sure you want to update?');" <?php if(strpos($accessibility, 'm') == false) echo "DISABLED";  ?> />
        	<input type="button" name="btnBack" value="Back" onclick="location.href='<?php echo site_url();?>/contContractor/ctrList';"/>        </th>
      </tr>
      <tr>
      	<td colspan="5" align="RIGHT"><?php echo anchor_popup("contContractor/viewListOfLabours/" . $ctr->ctr_clab_no, "View List of Labours");?>      	</td>
      </tr>
      <tr>
        <td width="10%">CLAB No</td>
        <td width="44%"><input type="text" name="clabno" value="<?php echo $ctr->ctr_clab_no;?>" READONLY /></td>
        <td width="7%">Status</td>
        <td colspan="2">
        					<?php if($ctr->ctr_status == 1) echo "ACTIVE";
        						  else if($ctr->ctr_status == 2) echo "IN-ACTIVE";
        						  else if($ctr->ctr_status == 3) echo "SUSPENDED";
        					 	  else if($ctr->ctr_status == 4) echo "BLACKLISTED";
        					 	  else echo "";?>
        			    &nbsp;<input type="button" name="btnView1" value="View Status History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contContractor/ctrStatusHistory/<?php echo $ctr->ctr_clab_no;?>', 'Change Status History', 'height=350, width=510, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>        </td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td>&nbsp;</td>
      	<td>Reg. Status</td>
      	<td colspan="2"><font color="#990000"><?php echo $ctr->appstatus_desc;?></font></td>
      </tr>
	  <tr>
        <td id="t_companyname">Company Name</td>
        <td colspan="4"><input type="text" name="companyname" size="100" maxlength="250" value="<?php echo $ctr->ctr_comp_name;?>"/><font color="red">*</font></td>
      </tr>
      <tr>
        <td>Company Reg. No.</td>
        <td><input type="text" name="companyregno" maxlength="20" value="<?php echo $ctr->ctr_comp_regno;?>"/>
        <font color="red">*</font></td>
        <td>GST No</td>
        <td colspan="2"><input name="companygstno" type="text" value="<?php echo $ctr->ctr_gst_no;?>" maxlength="13"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>SOCSO ID</td>
        <td colspan="2"><input name="companysocsono" type="text" value="<?php echo $ctr->ctr_socso_no;?>" maxlength="13"/></td>
      </tr>
      <tr>
        <td id="t_address1">Address 1</td>
        <td colspan="4">
        	<input type="TEXT" name="address1" size="80" maxlength="100" value="<?php echo $ctr->ctr_addr1;?>"/>
        <font color="red">*</font></td>
      </tr>
      <tr>
        <td>Address 2</td>
        <td colspan="4">
        	<input type="TEXT" name="address2" size="80" maxlength="100"  value="<?php echo $ctr->ctr_addr2;?>"/>        </td>
      </tr>
      <tr>
        <td>Address 3</td>
        <td colspan="4">
        	<input type="TEXT" name="address3" size="80" maxlength="100"  value="<?php echo $ctr->ctr_addr3;?>"/>        </td>
      </tr>
      <tr>
      	<td id="t_postcode">Postcode</td>
      	<td><input type="text" name="postcode" maxlength="5" value="<?php echo $ctr->ctr_pcode;?>"/></td>
      	<td>State</td>
      	<td colspan="2"><select name="state">
      		    <?php foreach($allStates->result() as $state){
	      		?>
	      		<option value="<?php echo $state->state_id;?>" <?php if($state->state_id == $ctr->ctr_state) echo "SELECTED";?>><?php echo $state->state_name;?></option>
      		    <?php
  		    	}
      		    ?>
      	</select>      	</td>
      </tr>
	  <tr>
        <td id="t_telephone1">Telephone</td>
        <td><input type="text" name="telephone1" maxlength="20" value="<?php echo $ctr->ctr_telno;?>"/> <font color="red">*</font> <input type="text" name="telephone2" maxlength="20" value="<?php echo $ctr->ctr_telno1;?>"/> </td>
      	<td>Fax No</td>
      	<td colspan="2"><input type="text" name="fax" maxlength="20" value="<?php echo $ctr->ctr_fax;?>"/> </td>
        </tr>
		<tr>
		    <td>Agent</td>
			<td colspan="4"><input type="text" name="txtagname" value="<?php echo $ctr->agent_desc;?>" size="80" readonly/>
			<input type="hidden" name="txtagid" value="<?php echo $ctr->agent_id;?>" readonly/>
			<input type="button" name="btnagn" onclick="getagent('E')" value="..."/>			</td>			
		</tr>
		<tr>
		    <td>Address 1</td>
			<td><input type="text" name="txtagadd1" size="80" value="<?php echo $ctr->agent_addr1;?>" readonly/></td>
			<td rowspan="3">&nbsp;</td>
			<td width="12%" rowspan="3">Remark</td>
			<td width="27%" rowspan="3"><label for="Remark"></label>
		    <textarea name="Remark" id="Remark" cols="30" rows="3"><?php echo $ctr->ctr_remark;?></textarea></td>			
		</tr>
		<tr>
		    <td>Address 2</td>
			<td><input type="text" name="txtagadd2" size="80" value="<?php echo $ctr->agent_addr2;?>" readonly/></td>
		</tr>
		<tr>
		    <td>Address 3</td>
			<td><input type="text" name="txtagadd3" size="80" value="<?php echo $ctr->agent_addr3;?>" readonly/></td>
		</tr>
	  <tr>
        <td id="t_cidbreg">CIDB Reg. No</td>
        <td><input type="text" name="cidbreg" value="<?php echo $ctr->ctr_cidb_regno;?>"/> <font color="red">*</font></td>
        <td id="t_cidbexpire">CIDB Exp. Date</td>
      	<td colspan="2"><input type="text" name="cidbexpire" id="cidbexpire" maxlength="20" value="<?php if($ctr->ctr_cidbexp_date != "0000-00-00") echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?>" READONLY/>
      		<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('cidbexpire'), this)" />      	</td>
      </tr>
      <tr>
      	<td>Email Address</td>
      	<td colspan="4"><input type="text" name="email" size="50" maxlength="50" value="<?php echo $ctr->ctr_email;?>"/></td>
      </tr>
	  <tr>
        <td>Grade</td>
        <td colspan="4"><select name="grade">
        				<?php foreach($allGrades->result() as $grade){
	        			?>
	        				<option value="<?php echo $grade->grade_id; ?>" <?php if($grade->grade_id == $ctr->ctr_grade) echo "SELECTED";?>><?php echo $grade->grade_id; ?> - <?php echo $grade->grade_desc; ?></option>
	        			<?php } ?>
                        </select>        </td>
      </tr>
      <tr>
        <td>Category</td>
        <td colspan="4"><select name="category" id="selcategory" onchange='javascript:addtocategory();'>
        				<option value="" SELECTED></option>
        				<?php foreach($allCategories->result() as $category){
	        			?>
	        				<option value="<?php echo $category->category_id;?>"><?php echo $category->category_id; ?> - <?php echo $category->category_desc;?></option>
	        			<?php } ?>
                        </select>
                        <input type="text" name="txtcategory" id="txtcategory" size="30" value="<?php echo $ctr->ctr_category;?>" READONLY/><input type="button" name="clear" class="smoothbtn1" value="Clear" onclick='javacript:clearcategory();'/>        </td>
      </tr>
      <tr>
        <td>Specialization</td>
        <td colspan="4"><select name="specialization" id="selspec" onchange='javascript:addtospec();'>
        				<option value="" SELECTED></option>
        				<?php foreach($allSpec->result() as $spec){
	        			?>
	        				<option value="<?php echo $spec->spec_id;?>"><?php echo $spec->spec_id;?> - <?php echo $spec->spec_desc;?></option>
	        			<?php } ?>
                        </select>
                        <input type="text" name="txtspec" id="txtspec" size="30"  value="<?php echo $ctr->ctr_spec;?>" READONLY/><input type="button" name="clear2" value="Clear" class="smoothbtn1" onclick='javascript:clearspec();' />        </td>
      </tr>
      <tr>
      	<td>CLAB Valid From Date</td>
      	<td><input name="clab_validdate" type="text" id="clab_validdate" value="<?php if($ctr->ctr_validdate != "0000-00-00") echo date('d-m-Y', strtotime($ctr->ctr_validdate));?>" maxlength="20" readonly="READONLY"/>
   	    <input type="button" name="btnsync" class="smoothbtn1" value="Sync" onclick="GetValidDate();" /></td>
        <td>CLAB Exp. Date</td>
        <td colspan="2"><input type="text" name="clab_expdate" value="<?php if($ctr->ctr_clabexp_date != "0000-00-00") echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?>" readonly/>
          <input type="button" name="btnPayment" class="smoothbtn1" value="Payment" onclick="addpayment();" /></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td>Attachments</td>
      	<td colspan="4"><input type="checkbox" name="form24" value="1" <?php if($ctr->ctr_attach_form24 == '1') echo "CHECKED";?> />Form24
      	                <input type="checkbox" name="form49" value="1" <?php if($ctr->ctr_attach_form49 == '1') echo "CHECKED";?>/>Form 49 
      	                <input type="checkbox" name="cidb_certcopy" value="1" <?php if($ctr->ctr_attach_copycidb == '1') echo "CHECKED";?>/>Copy of CIDB Certificate 
      	                <input type="checkbox" name="iccopy" value="1" <?php if($ctr->ctr_attach_iccopy == '1') echo "CHECKED";?>/>IC Copy      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="4"><input type="checkbox" name="others" value="1" <?php if($ctr->ctr_attach_others == '1') echo "CHECKED";?>/>Others &nbsp; &nbsp; &nbsp;
      					Please specify: <input type="text" name="attach_others" size="40" maxlength="200" value="<?php echo $ctr->ctr_attach_specify;?>" /> &nbsp; &nbsp; &nbsp; <input type="button" name="btnAttach" value="Attach Doc" class="smoothbtn1" onclick="attachdoc();" />      	</td>
      </tr>
      <tr>
       	<td>&nbsp;</td>
      	<td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td>Director</td>
      	<td><input type="text" name="director" size="40" maxlength="250"  value="<?php echo $ctr->ctr_dir_name;?>"/></td>
      	<td>Mobile No.</td>
      	<td colspan="2"><input type="text" name="directorMobile" id="directorMobile" size="35" maxlength="50" value="<?php echo $ctr->ctr_dir_mobileno;?>"  onchange="javascript:addkod(1,this.value);" onKeypress="if (event.keyCode < 44 || event.keyCode > 57 || event.keyCode==45 || event.keyCode==47) event.returnValue = false;"/></td>
      </tr>
      <tr>
      	<td id="t_contactperson">Contact Person</td>
      	<td><input type="text" name="contactperson" size="40" maxlength="250" value="<?php echo $ctr->ctr_contact_name;?>" /> <font color="red">*</font></td>
      	<td>Mobile No.</td>
      	<td colspan="2"><input type="text" name="contactMobile" id="contactMobile" size="35" maxlength="50"  value="<?php echo $ctr->ctr_contact_mobileno;?>" onchange="javascript:addkod(2,this.value);" /></td>
      </tr>
      <tr>
      	<td>Designation</td>
      	<td colspan="4"><input type="text" name="contactDesig" size="80" maxlength="250"  value="<?php echo $ctr->ctr_contact_desg;?>"/></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td id="t_enteredby">Entered by</td>
      	<td><input type="text" name="enteredby" size="34" maxlength="120" value="<?php echo $ctr->ctr_procsby;?>" READONLY/></td>
      	<td>Entered date</td>
      	<td colspan="2"><input type="text" name="entereddate" id="entereddate" value="<?php echo date('d-m-Y', strtotime($ctr->ctr_procdate))?>" READONLY/>
      	    <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('entereddate'), this)" />      	</td>
      </tr>
      <tr>
      	<td>Verified by</td>
      	<td><input type="checkbox" name="isverified" onclick="checktrigger(this, txtverifiedby, verdate);" <?php if($ctr->ctr_verified == '1') echo "CHECKED DISABLED";?> /> <input type="text" name="txtverifiedby" id="txtverifiedby" size="30" maxlength="120" value="<?php echo $ctr->ctr_verifiedby;?>" READONLY/></td>
      	<td>Verified date</td>
      	<td colspan="2"><input type="text" name="verdate" id="verdate" value="<?php if($ctr->ctr_verifieddate != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_verifieddate))?>" READONLY/>
			<input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('verdate'), this)" />      	</td>
     </tr>
      <tr>
      	<th>OPR1</th>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td>Approved by</td>
      	<td><input type="hidden" name="approve_reject" value="<?php if($ctr->ctr_approve == '1') echo "1";
      	                                                            else if($ctr->ctr_reject == '1') echo "2";
      	                                                            else echo "0";?>" />
      		<input type="checkbox" name="isapproved" onclick="checktrigger(this, txtapprovedby, appdate);" <?php if($ctr->ctr_approve == '1') echo "CHECKED DISABLED";?> <?php if(strpos($this->session->userdata('emp_accessibility'), '8') !== false) {} else echo "DISABLED";?>/> <input type="text" name="txtapprovedby" id="txtapprovedby" size="30" maxlength="120" value="<?php echo $ctr->ctr_app_name;?>" READONLY/></td>
      	<td>Approved Date</td>
      	<td colspan="2"><input type="text" name="appdate" id="appdate" value="<?php if(strlen($ctr->ctr_app_date) > 0 && $ctr->ctr_app_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_app_date))?>" READONLY/>
      	    <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('appdate'), this)" />      	</td>
      </tr>
      <tr>
      	<td>Rejected by</td>
      	<td><input type="checkbox" name="isrejected" onclick="checktrigger(this, txtrejectedby, rejdate);"  <?php if($ctr->ctr_reject == '1') echo "CHECKED DISABLED";?> <?php if(strpos($this->session->userdata('emp_accessibility'), '8') !== false) {} else echo "DISABLED";?>/> <input type="text" name="txtrejectedby" id="txtrejectedby" size="30" maxlength="120" value="<?php echo $ctr->ctr_rej_name;?>" READONLY/></td>
      	<td>Rejected Date</td>
      	<td colspan="2"><input type="text" name="rejdate" id="rejdate" value="<?php if(strlen($ctr->ctr_rej_date) > 0 && $ctr->ctr_rej_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_rej_date))?>" READONLY/>
      	    <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('rejdate'), this)" />      	</td>
      </tr>
      <tr>
      	<td>Reason for rejection</td>
      	<td colspan="4"><input type="text" name="txtrejectreason" size="80" value="<?php echo $ctr->ctr_reject_reason;?>" /></td>
      </tr>
      <tr>
      	<td>Withdrawal by</td>
      	<td><input type="checkbox" name="iswithdraw" <?php if($ctr->ctr_withdrawal == '1') echo "CHECKED DISABLED";?>/> <input type="text" name="txtwithdrawby" size="30" maxlength="120" value="<?php echo $ctr->ctr_withd_name;?>"/></td>
      	<td>Withdrawal date</td>
      	<td colspan="2"><input type="text" name="withddate" id="withddate" value="<?php if(strlen($ctr->ctr_withd_date) > 0 && $ctr->ctr_withd_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_withd_date))?>" READONLY/>
      	    <input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('withddate'), this)" />      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="RIGHT">
        	<input type="button" name="btnCert" value="Print Cert" onclick="printCert()"/>
        	<input type="button" name="btnPrintOPR1" value="Print OPR1" onclick="printOPR1()" />
        	<input type="button" name="btnPrintLetter" value="Print Letter" onclick="printLetterMain()"/>
        	<input type="button" name="btnPrintRenewal" value="Print Renewal" onclick="printRenewal()"/>
        	<input type="submit" name="btnUpdate" value="Update" onclick="return confirm('Are you sure you want to update?');" <?php if(strpos($accessibility, 'm') == false) echo "DISABLED";  ?> />
        	<input type="button" name="btnBack" value="Back" onclick="location.href='<?php echo site_url();?>/contContractor/ctrList';"/>        </td>
      </tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>
<p>
      <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var switchsection=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
switchsection.setColor('darkred', 'black')
switchsection.setPersist(true)
switchsection.collapsePrevious(true) //Only one content open at any given time
switchsection.init()
    </script>
    
    <!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'companyname': {
			'l': 'Company Name',  // label
			'r': true,    // required
			't': 't_companyname'// id of the element to highlight if input not validated
		},
		//'client_newicno':{'l':'New IC No.','r':false,'f':'unsigned','mx': 12,'t':'t_newic'},
		'address1':{'l':'Address 1','r':true,'t':'t_address1'},
		'telephone1':{'l':'Telephone','r':true,'t':'t_telephone1'},
		'cidbreg':{'l':'CIDB Reg. No','r':true,'t':'t_cidbreg'},
		'cidbexpire':{'l':'CIDB Expiry Date','r':true,'t':'t_cidbexpire'},
		'contactperson':{'l':'Contact Person','r':true,'t':'t_contactperson'},
		'postcode':{'l':'Postcode','r':false,'t':'t_postcode','f':'unsigned','mx': 12},
		'enteredby':{'l':'Entered by','r':true,'t':'t_enteredby'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('editCtrForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->    
</p>

</body>
</html>
