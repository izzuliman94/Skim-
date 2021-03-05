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
		var url = "<?php echo site_url('contAck/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url)
	}
	
	function selectall(){
	
	     document.newWorkorderForm.chkoripass.checked = true;
		 document.newWorkorderForm.chkfomema.checked = true;
		 document.newWorkorderForm.chkappletter.checked = true;
		 document.newWorkorderForm.chkdetails.checked = true;
		 document.newWorkorderForm.chkothers.checked = true;
		 
		 document.newWorkorderForm.dtoripass.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtfomema.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtappletter.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtdetails.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtothers.value = '<?php echo date('d-m-Y')?>';
		
		 
	}
	
	
	function selectallpayment(){
	
	     document.newWorkorderForm.chkimigration.checked = true;
		 document.newWorkorderForm.chkclab.checked = true;
		 document.newWorkorderForm.chkins_guarante.checked = true;
		 document.newWorkorderForm.chkins_hospital.checked = true;
		 document.newWorkorderForm.chkotherspay.checked = true;
		 
		 
	}
	
	
	function fomemacheck(val){
	
	if(val == 2 || val == 3){
	   document.newWorkorderForm.chkfomema.disabled = false;
	   document.newWorkorderForm.btnDate5.disabled = false;
	  // document.newWorkorderForm.selfomema.disabled = false;
	
	}else{
	   document.newWorkorderForm.chkfomema.checked = false;
	   document.newWorkorderForm.chkfomema.disabled = true;
	   document.updateWorkorderForm.dtfomema.value = "";
	   document.newWorkorderForm.btnDate5.disabled = true;
	   //document.newWorkorderForm.selfomema.disabled = true;
	}
	
	}
	
	function paymentlist(clabno){
	
	  var frm = "new";
	  var url = "<?php echo site_url('contAck/openreceipt');?>/" + frm + "/" + clabno;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
</script>  
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="<?php echo site_url();?>/contAck/spimDashbrd">Acknowledgement</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Acknowledgement </h4>
<h3 id="switchsection1-title" class="handcursor">New Acknowledgement <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<form action="<?php echo site_url();?>/contAck/newWorkOrderPt2Submit" method="POST" name="newWorkorderForm" id="newWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="12%">Acknowledgement No</td>
		  <td width="14%"><input type="text" name="workorderno" value="<?php echo "&lt;auto generate&gt;";?>" READONLY /></td>
			<td width="17%" id="t_type"> Type<font color="red">*</font></td>
			<td width="15%"><select name="selpayment" onchange="valid(this.value)">
              <option ></option>
              <option value="V">VDR</option>
              <option value="R">Renewal</option>
              <option value="LW">Local Worker</option>
              <option value="CP">Cancel Permit</option>
              <option value="CR">Contractor Registration</option>
              <option value="CRN">Contractor Renewal</option>
              <option value="COM">Compound</option>
              <option value="T">Transit Center</option>
              <option value="SP">SP</option>
              <option value="O">Others</option>
            </select></td>
			<td width="10%">Date Submit</td>
			<td width="7%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php echo date('d-m-Y');?>" size="12" READONLY/>
				<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->			</td>
		    <td width="7%">Time</td>
		    <td width="18%"><input type="text" name="dtsubmit2" id="dtsubmit2" value="<?php echo date('g:i a');?>" size="12" readonly="READONLY"/></td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td colspan="3"><input type="text" name="txtcompname" size="50" value="<?php echo $ctrRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td colspan="3"><input type="text" name="txtclabno" value="<?php echo $ctrRow->ctr_clab_no;?>" READONLY /></td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td colspan="3"><input type="text" name="txtcontact" size="30" value="<?php echo $ctrRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td colspan="3"><input type="text" name="txtcontactno" value="<?php echo $ctrRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL <font color="red">*</font></td>
			<td colspan="7">
				<input type="text" name="txtfcltotal" size="4" /> 
				Country: 
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>			</td>
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
			<td>Receive By  (CLAB)</td>
			<td colspan="3"><input type="text" name="txtPersonInCharge" value="<?php echo $this->session->userdata('username');?>" /></td>
			<td>Key In By</td>
			<td colspan="3"><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" />
				Date: <input type="text" name="dtkeyin" id="dtkeyin" value="<?php echo date('d-m-Y');?>" size="12"/>
					  <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" />			</td>
		</tr>
		<tr>
		   <td>Sender Name</td>
		   <td colspan="3"><input type="text" size="50" name="txtsendername" value="" /></td>
		   <td>Sender IC No.</td>
		   <td colspan="3"><input type="text" name="txtsenderic" value="" /></td>
		</tr>
		<tr>
		   <td>Sender Contact No.</td>
		   <td colspan="3"><input type="text" name="txtsenderctc" size="20" value="" /></td>
		   <td>Attending Officer </td>
		   <td colspan="3"><input type="text" name="txtattnoff" value="" size="40"/></td>		  
	  </tr>
		<!--tr>
		  <td>Year Of Renewal</td>
		  <td colspan="3"><select name="selyearrenew" onchange="fomemacheck(this.value)">
            <option value='0'>Select Year</option>
            <option value="1">1 Year</option>
            <option value="2">2 Years</option>
            <option value="3">3 Years</option>
            <option value="4">4 Years</option>
            <option value="5">5 Years</option>
            <option value="6">6 Years</option>
            <option value="7">7 Years</option>
            <option value="8">8 Years</option>
          </select></td-->
		   <!--td>Special Pass </td>
		  <td><input type="checkbox" name="chkjtk" value="1"/></td-->
	  </tr>
	  <!--tr>
	      <td>Description Of Application</td>
		  <td><select></select></td>
		  <td>History Of Application</td>
		  <td><select></select></td>
	  </tr-->
    </table>
<br />
    <!--table width="100%" border="0">
  <tr>
    		<th align="LEFT" colspan="2"> REQUIRED DOCUMENTS (Comp) </th>
    		<th align='RIGHT'><input type="button" name="btnack" value="Acknowledgement" disabled/></th-->
    	<!--/tr>
		<tr>
		    <td><input type="checkbox" name="chkoripass" value="1" /> Original Passport
	        <input type="hidden" name="txtuser" id="txtuser" readonly="READONLY"/></td>
		    <td><input type="text" name="dtoripass" id="dtoripass" size="11" value=""/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtoripass'), this)" /></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="chkfomema" value="1"/> FOMEMA Slip</td>
		    <td><input type="text" name="dtfomema" id="dtfomema" size="11" value=""/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfomema'), this)" /></td>
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
    	<!--tr>
    	  <td align="LEFT"><input type="checkbox" name="chkothers" value="1" />
    	    Other Detail          
   	        <input type="text" name="txtothers" size="40"/></td>
    	  <td align="LEFT"><input type="text" name="dtothers" id="dtothers" size="11"/>
    	  <input id="button" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtothers'), this)" /></td>
   	  </tr>
    	<tr>
    		<td colspan="2" align="LEFT">
    			Date Documents Completed: <input type="text" name="dtcompletedoc" id="dtcompletedoc" />
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" />    		</td>
    	</tr>
		<tr>
		   <td colspan="2"><input type="button" value="Select All" onclick="selectall()"/></td>
		</tr>
    </table-->
<br />
     <table width="100%" border="0">
    <tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
		
		<tr>
		  <td colspan="6"  id="t_payref"><input type="hidden" name="payrefno" value="0" size="50" />
            <!--input type="button" value="..." onclick="paymentlist('<?php echo $ctrRow->ctr_clab_no;?>')"/--></td>
	   </tr>
		<tr>
		   <td colspan="5"><input type="checkbox" name="chkimigration" value="1"/> 
		   CLAB - <i>(Processing Fees/Visa/Levi)
		   
		   </i></td>
		   <td width="27%"><i>
		     <input type="text" name="txtImipay" size="40"/>
		   </i></td>
		</tr>
		<tr>
		   <td colspan="5"><input type="checkbox" name="chkclab" value="1"/>	         CLAB -  <i>(Admin Fees/*6% Service Tax)
		     
		   </i></td>
		   <td><i>
		     <input type="text" name="txtclabpay" size="40"/>
		   </i></td>
		</tr>
		<tr>
		   <td colspan="5"><input type="checkbox" name="chkins_guarante" value="1"/>	        
		      Insurance - <i>(Insurance Guarantee  / Stamp Duty/*6% Service Tax)
		     
		   </i></td>
		   <td><i>
		     <input type="text" name="txtfwcspay" size="40"/>
		   </i></td>
		</tr>
		<tr>
		  <td colspan="5"><input type="checkbox" name="chkins_hospital" value="1"/>
Insurance -  <i>(Foreign Worker Hospitalisation and Surgical Insurance Scheme / Stamp duty)

</i></td>
	      <td><i>
	        <input type="text" name="txtfwhspay" size="40"/>
	      </i></td>
	   </tr>
		<tr>
		  <td colspan="5"><input type="checkbox" name="chkotherspay" value="1"/> 
	      Other Payment</td>
	      <td><i>
	        <input type="text" name="txtotherspay" size="40"/>
	      </i></td>
	   </tr>
		<tr>
		   <td colspan="6"><input type="button" value="Select All" onclick="selectallpayment()"/></td>
		</tr>    
    </table>
<br />
   
    <table width="100%" border="0">
    	<tr>
    		<td align="center">
				<input type="submit" name="btnSave" value=" Save Acknowledgement " onclick="return confirm('Are you sure you want to save?');" />
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
		'txtfcltotal': { // name of the element
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		},
		'payrefno':{'l':'Payment','r':true,'t':'t_payref'},
		'selpayment':{'l':'Type','r':true,'t':'t_type'},
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
