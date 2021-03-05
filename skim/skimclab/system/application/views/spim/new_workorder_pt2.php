<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- Â© Dynamic Drive (www.dynamicdrive.com)
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
		var url = "<?php echo site_url('contSpim/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url)
	}
	
	function selectall(){
	     //document.newWorkorderForm.chkreqform.checked = true;
		 document.newWorkorderForm.chkawardletter.checked = true;
		 document.newWorkorderForm.chkaccopic.checked = true;
		 document.newWorkorderForm.chkempletter.checked = true;
		 document.newWorkorderForm.chksupagree.checked = true;
		 //document.newWorkorderForm.chksignedpay.checked = true;
		 //document.newWorkorderForm.dtreqform.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtawardletter.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtaccopic.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtempletter.value = '<?php echo date('d-m-Y')?>';
		 document.newWorkorderForm.dtsupagree.value = '<?php echo date('d-m-Y')?>';
		 //document.newWorkorderForm.dtsignedpay.value = '<?php echo date('d-m-Y')?>';
		 
	}
	
	function deselectall(){
	     //document.newWorkorderForm.chkreqform.checked = false;
		 document.newWorkorderForm.chkawardletter.checked = false;
		 document.newWorkorderForm.chkaccopic.checked = false;
		 document.newWorkorderForm.chkempletter.checked = false;
		 document.newWorkorderForm.chksupagree.checked = false;
		 //document.newWorkorderForm.chksignedpay.checked = false;
		 //document.newWorkorderForm.dtreqform.value = '';
		 document.newWorkorderForm.dtawardletter.value = '';
		 document.newWorkorderForm.dtaccopic.value = '';
		 document.newWorkorderForm.dtcompletedoc.value = '';
		 document.newWorkorderForm.dtempletter.value = '';
		 document.newWorkorderForm.dtsupagree.value = '';
		 //document.newWorkorderForm.dtsignedpay.value = '';
		 
	}
	
	function paymentlist(clabno){
	
	  var frm = "new";
	  var url = "<?php echo site_url('contSpim/openreceipt');?>/" + frm + "/" + clabno ;
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
?>
<h4><a href="<?php echo site_url();?>/contSpim/spimDashbrd">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Work Order </h4>
<h3 id="switchsection1-title" class="handcursor">New Work Order <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
  <form action="<?php echo site_url();?>/contSpim/newWorkOrderPt2Submit" method="POST" name="newWorkorderForm" id="newWorkorderForm"  onsubmit="return v.exec();">
    <table width="100%" border="0">
		<tr>
			<td width="15%">Workorder No</td>
			<td width="16%"><input type="text" name="workorderno" value="<?php echo "&lt;auto generate&gt;";?>" READONLY /></td>
			<td width="8%">Ack No</td>
			<td width="9%">
			<select name="txtackno">
			  <option value=""></option>
			  <?php foreach($allAck->result() as $ack){
				?>
			  <option value="<?php echo $ack->wo_num;?>"><?php echo $ack->wo_num;?></option>
			  <?php }
				?>
		    </select>
			<!--input type="text" name="txtackno" value="" /--></td>
			<td width="13%">Date Submit</td>
			<td width="19%">
				<input type="text" name="dtsubmit" id="dtsubmit" value="<?php echo date('d-m-Y');?>" size="12" READONLY/>
				<!--input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" /-->			</td>
		    <td width="20%"><input type="text" name="trackdate" id="trackdate" value="<?php echo date('Y-m-d G:i:s');?>" readonly="READONLY" /></td>
		</tr>
		<tr>
			<td>Company Name</td>
			<td colspan="3"><input type="text" name="txtcompname" size="50" value="<?php echo $ctrRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td colspan="2"><input type="text" name="txtclabno" value="<?php echo $ctrRow->ctr_clab_no;?>" READONLY /></td>
		</tr>
		<tr>
			<td>Contact Person</td>
			<td colspan="3"><input type="text" name="txtcontact" size="30" value="<?php echo $ctrRow->ctr_contact_name;?>" /></td>
			<td>Contact Number</td>
			<td colspan="2"><input type="text" name="txtcontactno" value="<?php echo $ctrRow->ctr_contact_mobileno;?>" /></td>
		</tr>
		<tr>
			<td id="t_fcl">No. Of FCL <font color="red">*</font></td>
			<td colspan="3">
				<input name="txtfcltotal" type="text" value="" size="4" /> 
				Country: 
				<SELECT name="selcountry">
					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
				</SELECT>			</td>
			<td>Agency Name</td>
			<td colspan="2"><SELECT name="selagency">
				<?php foreach($allAgencies->result() as $agency){
				?>
					<option value="<?php echo $agency->agency_id;?>"><?php echo $agency->agency_name;?></option>
				<?php }
				?>
				</SELECT>			</td>
		</tr>
		<tr>
			<td>REPLACEMENT</td>
			<td colspan="6">
				<input type="checkbox" name="chkisreplace" value="1"/>
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" />
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" />			</td>
		</tr>
		<tr>
			<td>Person In Charge (CLAB)</td>
			<td colspan="3"><input type="text" name="txtPersonInCharge" value="<?php echo $this->session->userdata('username');?>" /></td>
			<td>Key In By</td>
			<td colspan="2"><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" />
				Date: <input type="text" name="dtkeyin" id="dtkeyin" value="<?php echo date('d-m-Y');?>" size="12"/>
					  <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" />			</td>
		</tr>
		<tr>
		   <td>Sender Name</td>
		   <td colspan="3"><input type="text" size="50" name="txtsendername" value="" /></td>
		   <td>Sender IC No. <span class="style1">*</span></td>
	      <td colspan="2"><input type="text" name="txtsenderic" value="" /></td>
		</tr>
		<tr>
		  <td>Sender Contact No </td>
		  <td colspan="3"><input type="text" name="txtsenderctc" value="" /></td>
		  <td>Approval Ref</td>
          <!--td>Visa Date</td-->
		  <td colspan="2"><!--input type="text" name="dtvisa" id="dtvisa" size="12" value=""/-->
		<!--input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtvisa'), this)" /-->
		<select name="selapproval">
          <?php foreach($allapproval->result() as $approval){
				?>
          <option value="<?php echo $approval->app_id;?>"><?php echo $approval->app_desc;?></option>
          <?php }
				?>
        </select></td>		 
	  </tr>
	  <tr>
		  <td>Attending Officer </td>
		  <td colspan="3"><input type="text" name="txtattnoff" value="" size="40"/></td>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
	  </tr>
    </table>
    <br />
    <table width="80%" border="0">
    	<tr>
    		<th align="LEFT"> REQUIRED DOCUMENTS (Comp) </th>
    		<th align="RIGHT"><!--input type="button" name="btnUpload" value="Upload Documents" onclick="openuploadwindow();" DISABLED/-->Date Received</th>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkreqform" value="1"/>Surat Kelulusan Asal dari Kementerian Dalam Negeri (OSC)  &nbsp; &nbsp;&nbsp;</td>
			<td><!--input type="checkbox" name="chkaccopic" value="1"/>Accomodation Pic/Add 
    			<input type="text" name="dtaccopic" id="dtaccopic" size="11" />
    			<input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtaccopic'), this)" /-->
   		      <input type="text" name="dtreqform" id="dtreqform" size="11"/>
	        <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" /></td>
    		<!--td><!--input type="checkbox" name="chkempletter" value="1"/>Employer Application Letter  &nbsp; &nbsp; &nbsp; &nbsp; 
    			<input type="text" name="dtempletter" id="dtempletter" size="11" />
    			<input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtempletter'), this)" /-->
    		</td-->
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkawardletter" value="1"/>Surat Wakil Syarikat (Salinan I/C Wakil Syarikat dan No Telefon), Penyata KWSP (3 Bulan terkini) / Pengarah/ Pemilik Syarikat  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;</td>
    		<td><!--input type="checkbox" name="chksupagree" value="1"/>Supplier Agreement &nbsp; &nbsp; &nbsp;
    			<input type="text" name="dtsupagree" id="dtsupagree" size="11" />
    			<input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsupagree'), this)" /-->
   		      <input type="text" name="dtawardletter" id="dtawardletter" size="11" />
	        <input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" /></td>
    	</tr>
    	<tr>
    		
    		<td><input type="checkbox" name="chksignedpay" value="1"/>Penyata PERKESO 3 Bulan terkini </td>
    			<td><input type="text" name="dtsignedpay" id="dtsignedpay" size="11" />
    			<input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsignedpay'), this)" />
    		</td>
    	</tr>
    	<tr>
			<td><input type="checkbox" name="chksupagree" value="1"/>
			  Biodata Pekerja ( Sijil Kesihatan Asal, 2 Keping Salinan Pasport Pekerja, 2 Keping Gambar Berukuran Pasport, Salinan ISC) 
              <legal>
              <h5>*Tempoh Sah Laku Sijil Kesihatan hendaklah melebihi 30 Hari dari tarikh penghantaran</h5>
              <h5><p>*Tempoh Sah Laku Pasport mestilah melebihi 18 Bulan semasa proses penghantaran ke CLAB</p></h5>
              <h5><p>*Nama Waris, Hubungan serta Alamat Lengkap Waris Diperlukan</p></h5></td>
				
    		<!--td colspan="2" align="LEFT">
    			Date Documents Completed: <!--input type="text" name="dtcompletedoc" id="dtcompletedoc" />
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" /-->
    		</td>
    		  <td><input type="text" name="dtsupagree" id="dtsupagree" size="11" />
    		    &nbsp;
   		      <input id="button" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsupagree'), this)" /></td>
    	</tr>
		<tr>
		    <td colspan="2"><!--input type="button" value="Select All" onclick="selectall()"/-->
	        <!--input type="button" value="Deselect All" onclick="deselectall()"/--></td>
		</tr>
    </table>
    <br />
     <table width="80%" border="0">
    	<tr>
    		<th colspan="6" align="LEFT">PAYMENT</th>
    	</tr>
    	<tr>
    		<td colspan="6" id="t_payref">OFFICIAL RECEIPT NO <font color="red">*</font>.: 
    		  <input type="text" name="payrefno" value="" size="50" />
			<input type="button" value="..." onclick="paymentlist('<?php echo $ctrRow->ctr_clab_no;?>')"/></td>
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
    			<SELECT name="selfomema">
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
    		<td>&nbsp;</td>
	  <td><select name="selfwcs">
        <option value="NO">NO</option>
        <option value="YES">YES</option>
      </select></td>
    		<td>FWHS:</td>
    		<td><select name="selfwhs">
              <option value="NO">NO</option>
              <option value="YES">YES</option>
            </select></td>
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
		},
		'payrefno':{'l':'Official Receipt No','r':true,'t':'t_payref'}
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
