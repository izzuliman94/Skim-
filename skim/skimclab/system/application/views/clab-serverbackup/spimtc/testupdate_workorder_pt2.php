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
</script>  
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="<?php echo site_url();?>/contSpim/spimDashbrd">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Update Work Order </h4>

<h3 id="switchsection1-title" class="handcursor">Update Work Order<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Workorder has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">The workorder has been updated!</font></strong>";
	else { //dummy else
	};
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
				<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmit'), this)" />
		</tr>
		<tr>
			<td>Company Name</td>
			<td><input type="text" name="txtcompname" size="50" value="<?php echo $woRow->ctr_comp_name;?>" READONLY /></td>
			<td>CLAB No.</td>
			<td><input type="text" name="txtclabno" value="<?php echo $woRow->wo_clab_no;?>" READONLY /></td>
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
				</SELECT>
			</td>
			<td>Agency Name</td>
			<td><SELECT name="selagency">
				<?php foreach($allAgencies->result() as $agency){
				?>
					<option value="<?php echo $agency->agency_id;?>" <?php if($woRow->wo_agency == $agency->agency_id) echo "SELECTED";?>><?php echo $agency->agency_name;?></option>
				<?php }
				?>
				</SELECT>
			</td>
		</tr>
		<tr>
			<td>REPLACEMENT</td>
			<td colspan="3">
				<input type="checkbox" name="chkisreplace" value="1" <?php if($woRow->wo_isreplacement == '1') echo "CHECKED";?>/>
				Date: <input type="text" name="dtreplacement" id="dtreplacement" size="12" value="<?php if($woRow->wo_replace_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_replace_date));?>"/>
					  <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreplacement'), this)" />
				&nbsp; &nbsp; Reason: <input type="text" name="replacereason" size="60" value="<?php echo $woRow->wo_replace_reason;?>"/>
			</td>
		</tr>
		</tr>
			<td>&nbsp;</td>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Person In Charge (CLAB)</td>
			<td><input type="text" name="txtPersonInCharge" value="<?php echo $woRow->wo_personincharge;?>" /></td>
			<td>Key In By</td>
			<td><input type="text" name="txtkeyinby" value="<?php echo $woRow->wo_keyin_by;?>" READONLY/>
				Date: <input type="text" name="dtkeyin" id="dtkeyin" value="<?php if($woRow->wo_keyin_date != "0000-00-00") echo date('d-m-Y', strtotime($woRow->wo_keyin_date));?>" size="12" READONLY/>
					  <input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtkeyin'), this)" />
			</td>
		</tr>
    </table>
    <br />
    <table width="80%" border="0">
    	<tr>
    		<th align="LEFT"> REQUIRED DOCUMENTS (Comp)</th>
    		<th align="RIGHT"><input type="button" name="btnUpload" value="Upload Documents" onclick="openuploadwindow();" DISABLED/></th>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkreqform" value="1" <?php if($woRow->doc_rqform == '1') echo "CHECKED";?>/>Request Form (R02)  &nbsp; &nbsp;&nbsp;
				<input type="text" name="dtreqform" id="dtreqform" size="11" value="<?php if($woRow->doc_rqformdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_rqformdate));?>"/>
    			<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreqform'), this)" />
    		
    		</td>
    		<td><input type="checkbox" name="chkempletter" value="1" <?php if($woRow->doc_empletter == '1') echo "CHECKED";?>/>Employment Letter   &nbsp; &nbsp; &nbsp; &nbsp; 
    			<input type="text" name="dtempletter" id="dtempletter" size="11" value="<?php if($woRow->doc_empletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_empletterdate));?>"/>
    			<input id="button6" name="btnDate6" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtempletter'), this)" />
    		</td>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkawardletter" value="1"<?php if($woRow->doc_awardletter == '1') echo "CHECKED";?>/>Letter of Award  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; 
    			<input type="text" name="dtawardletter" id="dtawardletter" size="11" value="<?php if($woRow->doc_awardletterdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_awardletterdate));?>"/>
    			<input id="button7" name="btnDate7" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtawardletter'), this)" />
    		</td>
    		<td><input type="checkbox" name="chksupagree" value="1" <?php if($woRow->doc_supplieragree == '1') echo "CHECKED";?>/>Supplier Agreement  &nbsp; &nbsp; &nbsp;
    			<input type="text" name="dtsupagree" id="dtsupagree" size="11" value="<?php if($woRow->doc_supplieragreedate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_supplieragreedate));?>" />
    			<input id="button8" name="btnDate8" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsupagree'), this)" />
    		</td>
    	</tr>
    	<tr>
    		<td><input type="checkbox" name="chkaccopic" value="1" <?php if($woRow->doc_acco == '1') echo "CHECKED";?>/>Accomodation Pic/Add 
    			<input type="text" name="dtaccopic" id="dtaccopic" size="11" value="<?php if($woRow->doc_accodate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_accodate));?>" />
    			<input id="button9" name="btnDate9" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtaccopic'), this)" />
    		</td>
    		<td><input type="checkbox" name="chksignedpay" value="1" <?php if($woRow->doc_signedpayment == '1') echo "CHECKED";?>/>Signed Payment Advice 
    			<input type="text" name="dtsignedpay" id="dtsignedpay" size="11" value="<?php if($woRow->doc_signedpaymentdate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_signedpaymentdate));?>" />
    			<input id="button10" name="btnDate10" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsignedpay'), this)" />
    		</td>
    	</tr>
    	<tr>
    		<td colspan="2" align="LEFT">
    			Date Complete Document: <input type="text" name="dtcompletedoc" id="dtcompletedoc" value="<?php if($woRow->doc_datecomplete != "0000-00-00") echo date('d-m-Y', strtotime($woRow->doc_datecomplete));?>"/>
    			<input id="button11" name="btnDate11" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletedoc'), this)" />
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
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    </table>
      <br />
      <table width="80%" border="0">
      	<tr>
      		<th colspan="3" align="LEFT">LIST OF FCL</th>
      		<th align="RIGHT"><input type="button" name="btnUploadFCL" value="Upload FCL list" class="smoothbtn1" onclick="openuploadwindow();" /></th>
      	</tr>
      	<?php if($allFCLFiles->num_rows() == 0){ ?>
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
	      	foreach($allFCLFiles->result() as $file){
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
    <table width="80%" border="0">
    	<tr>
    		<th colspan="2" align="LEFT">LEGAL</th>
    	</tr>
    	<tr>
    		<td width="50%">Agreement Receive Date:</td>
    		<td><input type="text" name="dtreceiveagree" id="dtreceiveagree"  value="<?php if($woRow->legal_agree_receivedate != "0000-00-00") echo date('d-m-Y', strtotime($woRow->legal_agree_receivedate));?>"/>
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
    		<td>Received by Corporate Support:</td>
    		<td><input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" /> <!--for javascript to get currentuser-->
    			<input type="checkbox" name="chkisreceive" value="1" onclick="checktrigger(this, txtreceiveby, dtreceive);" <?php if($woRow->wo_isreceive == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtreceiveby" id="txtreceiveby" value="<?php echo $woRow->wo_receiveby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtreceive" size="12" id="dtreceive"  value="<?php if(strlen($woRow->wo_receivedate) > 0 && $woRow->wo_receivedate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivedate));?>" READONLY/>
    			<input id="button13" name="btnDate13" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceive'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivecomment" value="<?php echo $woRow->wo_receive_comment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Process by Corporate Support:</td>
    		<td><input type="checkbox" name="chkisprocess" value="1" onclick="checktrigger(this, txtprocessby, dtprocess);" <?php if($woRow->wo_isprocess == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtprocessby" id="txtprocessby"  value="<?php echo $woRow->wo_processby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtprocess" size="12" id="dtprocess" value="<?php if(strlen($woRow->wo_processdate) > 0 && $woRow->wo_processdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_processdate));?>" READONLY/>
    			<input id="button14" name="btnDate14" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtprocess'), this)" />    		</td>
    		<td align="center"><?php echo anchor_popup("contSpim/printCheckLits/". $woRow->wo_id,"PrintChecklist");?></td>
    		<td><input type="text" name="txtprocesscomment" value="<?php echo $woRow->wo_process_comment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Submit to Corporate Services:</td>
    		<td><input type="checkbox" name="chkissubmit" onclick="checktrigger(this, txtsubmithr, dtsubmithr);"  <?php if($woRow->wo_issentto_hr == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtsubmithr" id="txtsubmithr"  value="<?php echo $woRow->wo_senthrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtsubmithr" size="12" id="dtsubmithr" value="<?php if(strlen($woRow->wo_senthrdate) > 0 && $woRow->wo_senthrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_senthrdate));?>" READONLY/>
    			<input id="button15" name="btnDate15" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtsubmithr'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtsenthrcomment" value="<?php echo $woRow->wo_senthrcomment;?>"/></td>
    	</tr>
    	<tr>
    		<td>Received by Corporate Services:</td>
    		<td><input type="checkbox" name="chkisreceivebyhr" onclick="checktrigger(this, txtreceivebyhr, dtreceivebyhr);"  <?php if($woRow->wo_isreceiveby_hr == '1') echo "CHECKED DISABLED";?>/>
    			<input type="text" name="txtreceivebyhr" id="txtreceivebyhr"  value="<?php echo $woRow->wo_receivehrby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtreceivebyhr" size="12" id="dtreceivebyhr" value="<?php if(strlen($woRow->wo_receivehrdate) > 0 && $woRow->wo_receivehrdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivehrdate));?>" READONLY/>
    			<input id="button16" name="btnDate16" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivebyhr'), this)" />    		</td>
    		<td></td>
    		<td><input type="text" name="txtreceivehrcomment" value="<?php echo $woRow->wo_receivehr_comment;?>"/></td>
    	</tr>
    	<tr>
    		<td>JIM Acknowledgement:</td>
    		<td><input type="checkbox" name="chkisjimack" onclick="checktrigger(this, txtjimack, dtjimack);" <?php if($woRow->wo_isjim_ack == '1') echo "CHECKED DISABLED";?> />
    			<input type="text" name="txtjimack" id="txtjimack" value="<?php echo $woRow->wo_jimackby;?>" READONLY/>    		</td>
    		<td>
    			<input type="text" name="dtjimack" size="12" id="dtjimack" value="<?php if(strlen($woRow->wo_jimackdate) > 0 && $woRow->wo_jimackdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_jimackdate));?>" READONLY/>
    			<input id="button17" name="btnDate17" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtjimack'), this)" />    		</td>
    		<td>Ref. No: &nbsp; <input type="Text" name="txtjimackref"  value="<?php echo $woRow->wo_jimack_refno;?>"/></td>
    		<td><input type="text" name="txtjimackcomment" value="<?php echo $woRow->wo_jimack_comment?>"/></td>
    	</tr>
    	<tr>
    		<td>Reject History:</td>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    		<td>Total Approve: <input type="text" name="txtapprove" size="4" value="<?php echo $woRow->wo_receivevisa_approve;?>" READONLY/> <br />
    			Total Reject: &nbsp; &nbsp; <input type="text" name="txtreject" size="4" value="<?php echo $woRow->wo_receivevisa_reject;?>" READONLY/> <br />
    			<input type="button" name="btnRejectHistory" value="Reject History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contSpim/viewRejectHistory/<?php echo $woRow->wo_clab_no ."/". $woRow->wo_id;?>', 'Workorder Reject History', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>    		</td>
    		<td><textarea cols="15" rows"2" name="txtreceivevisacomment" READONLY><?php echo $woRow->wo_receivevisa_comment;?></textarea></td>
    	</tr>
    	<tr>
    	  <td>Received Calling Visa:</td>
    	  <td><input type="checkbox" name="chkisreceivevisa" onclick="checktrigger(this, txtreceivevisa, dtreceivevisa);"  <?php if($woRow->wo_isreceive_visa == '1') echo "CHECKED DISABLED";?> <?php if(strpos($accessibility, 's') == false) echo "DISABLED";?>/>
            <input type="text" name="txtreceivevisa" id="txtreceivevisa"  value="<?php echo $woRow->wo_receivevisaby;?>" readonly/></td>
    	  <td><input type="text" name="dtreceivevisa" size="12" id="dtreceivevisa" value="<?php if(strlen($woRow->wo_receivevisadate) > 0 && $woRow->wo_receivevisadate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivevisadate));?>" readonly/>
            <input id="button18" name="btnDate18" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtreceivevisa'), this)" /></td>
    	  <td align="center"><?php echo anchor_popup("contSpim/printHandoverList/". $woRow->wo_id,"Print Handover Letter");?></td>
    	  <td>&nbsp;</td>
  	  </tr>
    	<tr>
    	  <td>Rejection</td>
    	  <td colspan="4"><input name="isrej" type="checkbox" id="isrej" value="1" <?php if($woRow->wo_isrejection == '1') echo "CHECKED";?>/>
Date:
  <input type="text" name="dtrej" id="dtrej" size="12" value="<?php if($woRow->wo_rejdate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_rejdate));?>"/>
  <input id="btnDate3" name="btnDate32" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtrej'), this)" />
&nbsp; &nbsp; Reason:
<input name="reasonrej" type="text" id="reasonrej" value="<?php echo $woRow->wo_rejreason;?>" size="60"/></td>
  	  </tr>
    	<tr>
    		<td>Withdrawal</td>
    		<td colspan="4"><input type="checkbox" name="iswithd" value="1" <?php if($woRow->wo_iswithdrawal == '1') echo "CHECKED";?>/>
Date:
  <input type="text" name="dtwithd" id="dtwithd" size="12" value="<?php if($woRow->wo_withd_date != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_withd_date));?>"/>
  <input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtwithd'), this)" />
&nbsp; &nbsp; Reason:
<input type="text" name="reasonwithd" size="60" value="<?php echo $woRow->wo_withd_reason;?>"/></td>
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
				<input type="submit" name="btnupdate" value=" Update Workorder " onclick="return confirm('Are you sure you want to update?');" <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?> />
				<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contSpim/updateWorkorder'" />    		
    		</td>
    	</tr>
    </table>
  </form>
  
    <br />
  <table width="100%" border="0">
  	<tr>
  		<th colspan="6" align="LEFT">TRACKING LOG</th>
  		<th colspan="1" align="RIGHT"><input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/>
  			<input type="button" name="btnRefresh" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contSpim/updateWorkOrderPt2/<?php echo $woRow->wo_id;?>/updatephonetrack'"  <?php if($woRow->wo_latest_progress == "closed") echo "DISABLED";?>/>
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
