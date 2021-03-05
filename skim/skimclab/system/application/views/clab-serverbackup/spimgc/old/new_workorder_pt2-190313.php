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

<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<script type="text/javascript">
	   
	   
	function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			//get date
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth() + 1
			tyear = today.getFullYear()
			
			txtbox.value=document.newWorkorderForm.currentuser.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
		}
		else {
			txtbox.value=""
			datebox.value=""
		}
	}
	
	function openuploadwindow(){
		var workorderid = document.newWorkorderForm.workorderno.value
		var companyname = document.newWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contRenewal/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url)
	}
	
	function selectall(){
	
	     document.newWorkorderForm.chkoripass.checked = true;
		 document.newWorkorderForm.chkfomema.checked = true;
		 document.newWorkorderForm.chkappletter.checked = true;
		 document.newWorkorderForm.chkdetails.checked = true;
		 document.newWorkorderForm.dtoripass.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtfomema.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtappletter.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtdetails.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		
		 
	}
	
	function fomemacheck(val){
	
	if(val == 2 || val == 3){
	   document.newWorkorderForm.chkfomema.disabled = false;
	   document.newWorkorderForm.btnDate5.disabled = false;
	   document.newWorkorderForm.selfomema.disabled = false;
	
	}else{
	   document.newWorkorderForm.chkfomema.disabled = true;
	   document.newWorkorderForm.btnDate5.disabled = true;
	   document.newWorkorderForm.selfomema.disabled = true;
	}
	
	}
	
	function paymentlist(){
	
	  var frm = "new";
	  var url = "<?php echo site_url('contRenewal/openreceipt');?>/" + frm;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
</script>  
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="<?php echo site_url();?>/contRenewal/spimDashbrd">SPIM (Renewal)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Work Order </h4>
<h3 id="switchsection1-title" class="handcursor">New Work Order <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
  <form action="<?php echo site_url();?>/contRenewal/newWorkOrderPt2Submit" method="POST" name="newWorkorderForm" id="newWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Workorder No</td>
			<td width="33%"><input type="text" name="workorderno" value="<?php echo "&lt;auto generate&gt;";?>" READONLY /></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php echo date('d-m-Y');?>" size="12" READONLY/>
				<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" />
			</td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="txtcompname" size="50" value="<?php echo $ctrRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td><input type="text" name="txtclabno" value="<?php echo $ctrRow->ctr_clab_no;?>" READONLY /></td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td><input type="text" name="txtcontact" size="30" value="<?php echo $ctrRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td><input type="text" name="txtcontactno" value="<?php echo $ctrRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL <font color="red">*</font></td>
			<td colspan="3">
				<input type="text" name="txtfcltotal" size="4" /> 
				Country: 
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>
			</td>
			<!--td>Agency Name</td>
			<td><SELECT name="selagency">
				<?php foreach($allAgencies->result() as $agency){
				?>
					<option value="<?php echo $agency->agency_id;?>"><?php echo $agency->agency_name;?></option>
				<?php }
				?>
				</SELECT>
			</td-->
		</tr>
		<!--tr>
			<td>REPLACEMENT</td>
			<td colspan="3">
				<input type="checkbox" name="chkisreplace" value="1"/>
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" />
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" />
			</td>
		</tr>
		</tr>
			<td>&nbsp;</td>
			<td colspan="3">&nbsp;</td>
		</tr-->
		<tr>
			<td>Person In Charge (CLAB)</td>
			<td><input type="text" name="txtPersonInCharge" value="<?php echo $this->session->userdata('username');?>" /></td>
			<td>Key In By</td>
			<td><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" />
				Date: <input type="text" name="dtkeyin" id="dtkeyin" value="<?php echo date('d-m-Y');?>" size="12"/>
					  <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" />
			</td>
		</tr>
		<tr>
		   <td>Sender Name</td>
		   <td><input type="text" size="50" name="txtsendername" value="" /></td>
		   <td>Sender IC No.</td>
		   <td><input type="text" name="txtsenderic" value="" /></td>
		</tr>
		<tr>
		   <td>Sender Contact No.</td>
		   <td colspan="3"><input type="text" name="txtsenderctc" size="20" value="" /></td>
		</tr>
		<tr>
		  <td>Year Of Renewal</td>
		  <td><select name="selyearrenew" onchange="fomemacheck(this.value)">
            <option value='0'>Select Year</option>
            <option value="1">1 Year</option>
            <option value="2">2 Years</option>
            <option value="3">3 Years</option>
            <option value="4">4 Years</option>
            <option value="5">5 Years</option>
            <option value="6">6 Years</option>
            <option value="7">7 Years</option>
            <option value="8">8 Years</option>
          </select></td>
		   <td>Special Pass </td>
		  <td><input type="checkbox" name="chkjtk" value="1"/></td>
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
    		<th align="LEFT" colspan="2"> REQUIRED DOCUMENTS (Comp) </th>
    		<!--th align='RIGHT'><input type="button" name="btnack" value="Acknowledgement" disabled/></th-->
    	</tr>
		<tr>
		    <td><input type="checkbox" name="chkoripass" value="1"/> Original Passport</td>
		    <td><input type="text" name="dtoripass" id="dtoripass" size="11" value=""/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtoripass'), this)" /></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkfomema" value="1" disabled/> FOMEMA Slip</td>
		    <td><input type="text" name="dtfomema" id="dtfomema" size="11" value=""/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfomema'), this)" disabled/></td>
		</tr>
		<tr>
		    <td><input type="checkbox" name="chkappletter" value="1"/> Employer's Apllication Letter</td>
		    <td><input type="text" name="dtappletter" id="dtappletter" size="11" value=""/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtappletter'), this)" /></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkdetails" value="1" /> Details of worker next of kin and relationship</td>
		    <td><input type="text" name="dtdetails" id="dtdetails" size="11" value=""/>
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
    		<td colspan="2" align="LEFT">
    			Date Documents Completed: <input type="text" name="dtcompletedoc" id="dtcompletedoc" />
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" />
    		</td>
    	</tr>
		<tr>
		   <td colspan="2"><input type="button" value="Select All" onclick="selectall()"/></td>
		</tr>
    </table>
    <br />
     <table width="80%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
		<tr>
    		<td colspan="6">REF NO.: <input type="text" name="payrefno" value="" size="50" />
			<input type="button" value="..." onclick="paymentlist()"/>
			</td>
    	</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkimigration" value="1"/> Jabatan Immigresen - Ketua Pengarah Imigresen Malaysia <i>(Processing Fees/Visa/Levi)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkclab" value="1"/> CLAB - Construction Labour Exchange Centre Berhad <i>(Admin Fees/*6% Service Tax)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkins_guarante" value="1"/> Insurance - Lonpac Insurance Berhad <i>(Insurance Guarantee / FWCS / Stamp Duty/*6% Service Tax)</i></td>
		</tr>
		<tr>
		   <td colspan="6"><input type="checkbox" name="chkins_hospital" value="1"/> Insurance - Lonpac Insurance Berhad <i>(Foreign Worker Hospitalisation and Surgical Insurance Scheme / Stamp duty)</i></td>
		</tr>    	
    	<tr>
    		<td>Admin Fee:</td>
    		<td>
    			<SELECT name="seladminfee">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    			</SELECT>    		</td>
    		<td>LEVY:</td>
    		<td>
    			<SELECT name="sellevy">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    			</SELECT>    		</td>
    		<td>PLKS:</td>
    		<td>
    			<SELECT name="selplks">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    			</SELECT>    		</td>
    	</tr>
    	 	<tr>
    		<td>Agency Fee:</td>
    		<td>
    			<SELECT name="selagencyfee">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    	   	    </SELECT>    		</td>
    		<td>FOMEMA:</td>
    		<td>
    			<SELECT name="selfomema" disabled>
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    	   	    </SELECT>    		</td>
    		<td>VISA:</td>
    		<td>
    			<SELECT name="selvisa">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    	   	    </SELECT>    		</td>
    	</tr>
    	 	<tr>
    		<td>IG:</td>
    		<td>
    			<SELECT name="selig">
    				<option value="NO">NO</option>
    				<option value="YES">YES</option>
    	   	    </SELECT>    		</td>
    		<td>FWCS:</td>
	  <td><select name="selfwcs">
        <option value="NO">NO</option>
        <option value="YES">YES</option>
      </select></td>
    		<td>FWHS:</td>
    		<td><select name="selfwcs2">
              <option value="NO">NO</option>
              <option value="YES">YES</option>
            </select></td>
    	</tr>
    </table>
    <br />
    <table width="80%" border="0">
    	<tr>
    		<th colspan="2" align="LEFT">LEGAL</th>
    	</tr>
    	<tr>
    		<td width="50%">Agreement Receive Date:</td>
    		<td><input type="text" name="dtreceiveagree" id="dtreceiveagree" />
    			<input id="button12" name="btnDate12" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceiveagree'), this)" />
    		</td>
    	</tr>
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
    		<td>Received by Corporate Services:</td>
    		<td><input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" /> <!--for javascript to get currentuser-->
    			<input type="checkbox" name="chkisreceive" value="1" onclick="checktrigger(this, txtreceiveby, dtreceive);" />
    			<input type="text" name="txtreceiveby" id="txtreceiveby" />    		</td>
    		<td>
    			<input type="text" name="dtreceive" size="12" id="dtreceive" READONLY/>
    			<input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceive'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivecomment" /></td>
    	</tr>
    	<tr>
    		<td>Process by Corporate Services:</td>
    		<td><input type="checkbox" name="chkisprocess" value="1" onclick="checktrigger(this, txtprocessby, dtprocess);" />
    			<input type="text" name="txtprocessby" id="txtprocessby" />    		</td>
    		<td>
    			<input type="text" name="dtprocess" size="12" id="dtprocess" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtprocess'), this)" />    		</td>
    		<td align="center">Print Checklist</td>
    		<td><input type="text" name="txtprocesscomment" /></td>
    	</tr>
    	<tr>
    		<td>Submit to Corporate Support:</td>
    		<td><input type="checkbox" name="chkissubmit" onclick="checktrigger(this, txtsubmithr, dtsubmithr);" />
    			<input type="text" name="txtsubmithr" id="txtsubmithr" />    		</td>
    		<td>
    			<input type="text" name="dtsubmithr" size="12" id="dtsubmithr" READONLY/>
    			<input id="button15" name="btnDate15" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmithr'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtsenthrcomment" /></td>
    	</tr>
    	<tr>
    		<td>Received by Corporate Support:</td>
    		<td><input type="checkbox" name="chkisreceivebyhr" onclick="checktrigger(this, txtreceivebyhr, dtreceivebyhr);" />
    			<input type="text" name="txtreceivebyhr" id="txtreceivebyhr" />    		</td>
    		<td>
    			<input type="text" name="dtreceivebyhr" size="12" id="dtreceivebyhr" READONLY/>
    			<input id="button16" name="btnDate16" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivebyhr'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivehrcomment" /></td>
    	</tr>
    	<tr>
    		<td>JIM Acknowledgement:</td>
    		<td><input type="checkbox" name="chkisjimack" onclick="checktrigger(this, txtjimack, dtjimack);" />
    			<input type="text" name="txtjimack" id="txtjimack" />    		</td>
    		<td>
    			<input type="text" name="dtjimack" size="12" id="dtjimack" READONLY/>
    			<input id="button17" name="btnDate17" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtjimack'), this)" />    		</td>
    		<td>Ref. No: &nbsp; <input type="Text" name="txtjimackref" /></td>
    		<td><input type="text" name="txtjimackcomment" /></td>
    	</tr>
    	<tr>
    		<td>Reject History:</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>Total Approve: <input type="text" name="txtapprove" size="4" value="0" <?php if(strpos($accessibility, 's') == false) echo "READONLY";?>/> <br />
    			Total Reject: &nbsp; &nbsp; <input type="text" name="txtreject" size="4" value="0" <?php if(strpos($accessibility, 's') == false) echo "READONLY";?>/>    		</td>
    		<td><textarea cols="15" rows"2" name="txtreceivevisacomment" <?php if(strpos($accessibility, 's') == false) echo "READONLY";?>></textarea></td>
    	</tr>
    	<tr>
    	  <td>Received Calling Visa:</td>
    	  <td><input type="checkbox" name="chkisreceivevisa" onclick="checktrigger(this, txtreceivevisa, dtreceivevisa);" <?php if(strpos($accessibility, 's') == false) echo "DISABLED";?>/>
            <input type="text" name="txtreceivevisa" id="txtreceivevisa" <?php if(strpos($accessibility, 's') == false) echo "READONLY";?>/></td>
    	  <td><input type="text" name="dtreceivevisa" size="12" id="dtreceivevisa" readonly/>
            <input id="button18" name="btnDate18" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivevisa'), this)" /></td>
    	  <td>&nbsp;</td>
    	  <td>&nbsp;</td>
  	  </tr>
    	<tr>
    		<td>Withdrawal</td>
    		<td colspan="4"><input type="checkbox" name="iswithd" value="1" />
Date:
  <input type="text" name="dtwithd" id="dtwithd" size="12"/>
  <input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtwithd'), this)" />
&nbsp; &nbsp; Reason:
<input type="text" name="reasonwithd" size="60" /></td>
   		</tr>
    </table>
    <br />
    <table width="100%" border="0">
    	<tr>
    		<td align="center">
				<input type="submit" name="btnSave" value=" Save Workorder " onclick="return confirm('Are you sure you want to save?');" />
				<input type="button" name="btnCancel" value=" Back " onclick="history.back();" />    		
    		</td>
    	</tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>

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
	var v = new validator('newWorkorderForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->

</body>
</html>
