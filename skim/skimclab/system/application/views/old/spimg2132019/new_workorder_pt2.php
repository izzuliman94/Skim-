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
	
	function fclmax(m){
		if(m>10){alert('Max of FCL no is 10 person');document.newWorkorderForm.txtfcltotal.value='';document.newWorkorderForm.txtfcltotal.focus();}
	}
	
	function openuploadwindow(){
		var workorderid = document.newWorkorderForm.workorderno.value
		var companyname = document.newWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contSpimG/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url)
	}
	
	function selectall(){
		document.newWorkorderForm.chkreqform.checked = true;
		document.newWorkorderForm.chkawardletter.checked = true;
		document.newWorkorderForm.chkcompany.checked = true;
		document.newWorkorderForm.chknric.checked = true;
		document.newWorkorderForm.chkfinance.checked = true;
		document.newWorkorderForm.chkbankstmt.checked = true;
		document.newWorkorderForm.chkinsurance.checked = true;
		document.newWorkorderForm.chkcert.checked = true;
		document.newWorkorderForm.chkphoto.checked = true;
		document.newWorkorderForm.dtreqform.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtawardletter.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtcompany.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtnric.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtfinance.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtbankstmt.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtinsurance.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtcert.value = '<?php echo date('d-m-Y')?>';
		document.newWorkorderForm.dtphoto.value = '<?php echo date('d-m-Y')?>';	
		document.newWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';		 
	}
	
	function paymentlist(clabno){
	
		var frm = "new";
		var url = "<?php echo site_url('contSpimG/openreceipt');?>/" + frm + "/" + clabno ;
		window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
</script>  
</head>
<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="<?php echo site_url();?>/contSpimG/spimDashbrd">SPIM (G1G3)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Work Order </h4>
<h3 id="switchsection1-title" class="handcursor">New Work Order <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
  <form action="<?php echo site_url();?>/contSpimG/newWorkOrderPt2Submit" method="POST" name="newWorkorderForm" id="newWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Workorder No</td>
			<td width="33%"><input type="text" name="workorderno" value="<?php echo "&lt;auto generate&gt;";?>" READONLY /></td>
			<td width="13%">Date Submit</td>
			<td width="39%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php echo date('d-m-Y');?>" size="10" READONLY/>
				<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->
			</td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="txtcompname" size="50" value="<?php echo $ctrRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td><input type="text" name="txtclabno" size="10" value="<?php echo $ctrRow->ctr_clab_no;?>" READONLY /></td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td><input type="text" name="txtcontact" size="50" value="<?php echo $ctrRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td><input type="text" name="txtcontactno" size="10" value="<?php echo $ctrRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL <font color="red">*</font></td>
			<td>
				<input type="text" name="txtfcltotal" size="4" onchange="fclmax(this.value)" /> 
				Country: 
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>REPLACEMENT</td>
			<td colspan="3">
				<input type="checkbox" name="chkisreplace" value="1"/>
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" />
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" />
			</td>
		</tr>
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
		  <td>Sender Contact No </td>
		  <td><input type="text" name="txtsenderctc" value="" /></td>
		  <td></td>
		  <td></td>		 
	  </tr>
	  <tr>
		  <td>Attending Officer </td>
		  <td><input type="text" name="txtattnoff" value="" size="40"/></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	  </tr>
    </table>
    <br />

	<table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th align="LEFT" colspan=10> REQUIRED DOCUMENTS (Comp)</th>
    		<!--th align="RIGHT"></th-->
    	</tr>
    	<tr>
    		<td width=160><input type="checkbox" name="chkreqform" value="1" />Borang Lengkap</td>
			<td width=70><input type="text" name="dtreqform" id="dtreqform" size="8" value=""/></td>
			<td width=30><input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" /></td>
    		<td width=160><input type="checkbox" name="chkcompany" value="1" />Dokumen Syarikat</td>
			<td width=70><input type="text" name="dtcompany" id="dtcompany" size="8" value="" /></td>
			<td width=30><input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompany'), this)"  /></td>
    		<td width=270><input type="checkbox" name="chkawardletter" value="1" />Letter of Awards</td>
			<td width=70><input type="text" name="dtawardletter" id="dtawardletter" size="8" value="" /></td>
			<td width=30><input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" /></td>
			<td></td>
		</tr>
    	<tr>
    		<td><input type="checkbox" name="chknric" value="1" />IC Pemilik</td>
    		<td><input type="text" name="dtnric" id="dtnric" size="8" value="" /></td>
    		<td><input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtnric'), this)" /></td>
			<td><input type="checkbox" name="chkfinance" value="1" />Laporan Kewangan</td>
			<td><input type="text" name="dtfinance" id="dtfinance" size="8" value="" /></td>
			<td><input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfinance'), this)" /></td>
			<td><input type="checkbox" name="chkbankstmt" value="1"  />Penyata Bank</td>
			<td><input type="text" name="dtbankstmt" id="dtbankstmt" size="8" value="" /></td>
			<td><input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtbankstmt'), this)" /></td>
			<td></td>
		</tr>
    	<tr>
    		<td><input type="checkbox" name="chkinsurance" value="1" />Insurance</td>
    		<td><input type="text" name="dtinsurance" id="dtinsurance" size="8" value="" /></td>
    		<td><input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtinsurance'), this)" /></td>
			<td><input type="checkbox" name="chkcert" value="1" />Sijil CIDB</td>
			<td><input type="text" name="dtcert" id="dtcert" size="8" value="" /></td>
			<td><input id="button12" name="btnDate12" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcert'), this)" /></td>
			<td><input type="checkbox" name="chkphoto" value="1" />Photo of Living Quarters and Project Site</td>
			<td><input type="text" name="dtphoto" id="dtphoto" size="8" value="" /></td>
			<td><input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtphoto'), this)" /></td>
			<td></td>
		</tr>
    	<tr>
    		<td>Date Complete Document</td>
    		<td><input type="text" name="dtcompletedoc" id="dtcompletedoc" size="8" value="" /></td>
			<td><input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" /></td>			
			<td colspan="7"><input type="button" name="btnselall" value="Select All" onclick="selectall()" /></td>
		</tr>

    </table>
    <br />
    <table width="100%" border="0" cellpadding=3 style='border-style:none'>
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
    	<tr>
    		<td colspan="6" id="t_payref">OFFICIAL RECEIPT NO<font color="red">*</font>.: <input type="text" name="payrefno" value="" size="50" />
			<input type="button" value="..." onclick="paymentlist('<?php echo $ctrRow->ctr_clab_no;?>')"/></td>
    	</tr>
		<tr>
			<td>Admin Fee</td>
			<td>
				<SELECT name="seladminfee">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>
			<td>LEVY</td>
			<td>
				<SELECT name="sellevy">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>
			<td>PLKS</td>
			<td>
				<SELECT name="selplks">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT> 
			</td>
		</tr>
		<tr>
			<td>Agency Fee</td>
			<td>
				<SELECT name="selagencyfee">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>
			<td>FOMEMA</td>
			<td>
				<SELECT name="selfomema">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>
			<td>VISA</td>
			<td>
				<SELECT name="selvisa">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>
		</tr>
		<tr>
			<td>IG</td>
			<td>
				<SELECT name="selig">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>			
			<td>FWHS</td>
			<td>
				<select name="selfwhs">
				<option value="NO">NO</option>
				<option value="YES">YES</option>
				</select>
			</td>
			<td>DEPOSIT</td>
			<td>
				<select name="seldeposit">
				<option value="NO">NO</option>
				<option value="YES">YES</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>GREEN CARD</td>
			<td>
				<SELECT name="selgreen">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</SELECT>    		
			</td>			
			<td>TRANSIT CENTRE</td>
			<td>
				<select name="seltransit">
					<option value="NO">NO</option>
					<option value="YES">YES</option>
				</select>
			</td>
			<td></td>
			<td></td>
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
		//,'payrefno':{'l':'Official Receipt No','r':true,'t':'t_payref'}
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
