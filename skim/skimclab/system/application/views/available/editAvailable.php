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
<script type="text/javascript">
	function getCompanyDetails(){
		var clabno = document.getElementById('selCompName').options[document.getElementById('selCompName').selectedIndex].value
		window.location.href = "<?php echo site_url();?>/contAvailable/availableFormWithCompDetails/" + clabno;
	}
	
	function registerNewLabor(){
		var avlabrefno = document.editAvailableForm.txtrefno.value
		window.open('<?php echo site_url();?>/contavailable/regisNewLabourPt1/' + avlabrefno, 'Register new labour', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function newphtracklog(){
		var refid = document.editAvailableForm.txtrefno.value
		//var companyname = document.editAvailableForm.txtclabno.value
		var compfrom = document.editAvailableForm.clab_no.value
		var compto = document.editAvailableForm.clab_no2.value
		var url = "<?php echo site_url('contAvailable/newPhoneTrackLog');?>/" + refid  + "/" + compfrom + "/" + compto
		
		window.open(url, 'Local Transfer Tracking Log', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function EditTrackLog(id){
		
		var refid = document.editAvailableForm.txtrefno.value
		var compfrom = document.editAvailableForm.clab_no.value
		var compto = document.editAvailableForm.clab_no2.value
		
		var url = "<?php echo site_url('contAvailable/editPhoneTrackLog');?>/" + refid + "/" + id + "/" + compfrom + "/" + compto
				
		window.open(url, 'Edit Local Transfer Tracking Log', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function paymentlist(clabno){
	
	  var frm = "update";
	  var url = "<?php echo site_url('contAvailable/openreceipt');?>/" + frm + "/" + clabno;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
	
	function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			//get date
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth() + 1
			tyear = today.getFullYear()
			
			txtbox.value=document.editAvailableForm.currentuser.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
			$ = "";
		}
		else {
			txtbox.value=""
			datebox.value=""
			button.enabled="false"
			
		}
	}
</script>
<!--CSS for disabled textbox and textarea-->
<style type="text/css">
.disabled
{
 background-color: #FFF;
 font-family:Arial, Helvetica, sans-serif;
 font-size: 12px;
 color:#000000;
}
</style> 
</head>

<body>



<h4><a href="dashboard.php">Local Transfer</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Edit </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>
<h3 id="switchsection1-title" class="handcursor">LOCAL TRANSFER DETAILS<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>

<?php if(isset($successMsg))echo $successMsg;
	
	
if($avlabDetails->avlab_isappv == '1' && $avlabDetails->avlab_appv_date != '0000-00-00'){
	$btnRegisNewLabour = "";
	}else{
	$btnRegisNewLabour = "disabled=disabled";
	};
	
if($avlabDetails->avlab_isclosed == '1' && $avlabDetails->avlab_closed_date != '0000-00-00'){
	$btnclosed = "disabled=disabled";
	}else{
	$btnclosed = "";
	};
	

?>
	
<form action="<?php echo site_url();?>/contAvailable/editAvailableSubmit" method="POST" name="editAvailableForm" id="editAvailableForm">
<table width="100%" border="0">
      	<tr>
      		<td>Ref No</td>
      		<td><input type="text" name="txtrefno" value="<?php echo $refno;?>" size="25" READONLY /></td>
      		<td>Date Submit</td>
      		<td><input type="text" name="datesubmit" id="txtdatesubmit" value="<?php echo date('d-m-Y', strtotime($avlabDetails->avlab_submit_date));?>" READONLY />
      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtdatesubmit'), this)" />      		</td>
      	</tr>
      	<tr>
      		<th>Company(FROM)</th>
      		<td colspan="3">&nbsp;      		</td>
      	</tr>
      	<tr>
      		<td colspan="4">
		      	<?php if(isset($ctrData1)){ ?>
		      	<table width="90%" border="0" align="center">
			      	<tr>
			      		<td>Company Name</td>
			      		<td colspan="3"><input type="text" name="compname" size="70" class="disabled" value="<?php echo $ctrData1->ctr_comp_name;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Current Address</td>
			      		<td colspan="3"><p>
			      		  <input type="text" name="faxno2" class="disabled" value="<?php echo $ctrData1->ctr_addr1;?>" disabled="disabled" />
			      		  </p>
			      		  <p>
			      		    <input type="text" name="faxno3" class="disabled" value="<?php echo $ctrData1->ctr_addr2;?>" disabled="disabled" />
		      		      </p>
                          <p>
                            <input type="text" name="faxno4" class="disabled" value="<?php echo $ctrData1->ctr_pcode;?>" disabled="disabled" />
                        </p>
                        <p>
                          <input type="text" name="faxno7" class="disabled" value="<?php echo $ctrData1->ctr_addr3;?>" disabled="disabled" />
                        </p></td>
			      	</tr>
			      	<tr>
			      		<td>Telephone No.</td>
			      		<td><input type="text" name="telno" class="disabled" size="30" value="<?php echo $ctrData1->ctr_telno;?>" DISABLED /></td>
			      		<td>Fax No.</td>
			      		<td><input type="text" name="faxno" class="disabled" value="<?php echo $ctrData1->ctr_fax;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Contact Person</td>
			      		<td><input type="text" name="contact" class="disabled" size="30" value="<?php echo $ctrData1->ctr_contact_name;?>" DISABLED /></td>
			      		<td>Contact No.</td>
			      		<td><input type="text" name="contactno" class="disabled" value="<?php echo $ctrData1->ctr_contact_mobileno;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CLAB Reg. No.</td>
			      		<td><input type="text" name="clab_no" class="disabled" size="30" value="<?php echo $ctrData1->ctr_clab_no;?>" DISABLED /></td>
			      		<td>Expiry Date</td>
			      		<td><input type="text" name="clabexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData1->ctr_clabexp_date));?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CIDB Reg. No.</td>
			      		<td><input type="text" name="cidb_no" class="disabled" size="30" value="<?php echo $ctrData1->ctr_comp_regno;?>" DISABLED /></td>
			      		<td>Expiry Date</td>
			      		<td><input type="text" name="cidbexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData1->ctr_cidbexp_date));?>" DISABLED /></td>
			      	</tr>
		      	</table>
		      	<?php } ?>		      </td>
		</tr>
		<tr>
      		<th>Company(TO)</th>
      		<td colspan="3">&nbsp;</td>
      	</tr>
      	<tr>
      		<td colspan="4">
		      	<?php if(isset($ctrData2)){ ?>
		      	<table width="90%" border="0" align="center">
			      	<tr>
			      		<td>Company Name</td>
			      		<td colspan="3"><input type="text" name="compname" size="70" class="disabled" value="<?php echo $ctrData2->ctr_comp_name;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Current Address</td>
			      		<td colspan="3">
			      		  <input type="text" name="faxno5" class="disabled" value="<?php echo $ctrData2->ctr_addr1;?>" disabled="disabled" />
			      		  
                          <p>
                            <input type="text" name="faxno5" class="disabled" value="<?php echo $ctrData2->ctr_addr2;?>" disabled="disabled" />
                          </p>
                          <p>
                            <input type="text" name="faxno5" class="disabled" value="<?php echo $ctrData2->ctr_pcode;?>" disabled="disabled" />
                        </p>
                        <p>
                          <input type="text" name="faxno6" class="disabled" value="<?php echo $ctrData2->ctr_addr3;?>" disabled="disabled" />
                        </p></td>
			      	</tr>
			      	<tr>
			      		<td>Telephone No.</td>
			      		<td><input type="text" name="telno" class="disabled" size="30" value="<?php echo $ctrData2->ctr_telno;?>" DISABLED /></td>
			      		<td>Fax No.</td>
			      		<td><input type="text" name="faxno" class="disabled" value="<?php echo $ctrData2->ctr_fax;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Contact Person</td>
			      		<td><input type="text" name="contact" class="disabled" size="30" value="<?php echo $ctrData2->ctr_contact_name;?>" DISABLED /></td>
			      		<td>Contact No.</td>
			      		<td><input type="text" name="contactno" class="disabled" value="<?php echo $ctrData2->ctr_contact_mobileno;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CLAB Reg. No.</td>
			      		<td><input type="text" name="clab_no2" class="disabled" size="30" value="<?php echo $ctrData2->ctr_clab_no;?>" disabled /></td>
		      		  <td>Expiry Date</td>
			      		<td><input type="text" name="clabexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData2->ctr_clabexp_date));?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CIDB Reg. No.</td>
			      		<td><input type="text" name="cidb_no" class="disabled" size="30" value="<?php echo $ctrData2->ctr_comp_regno;?>" DISABLED /></td>
			      		<td>Expiry Date</td>
			      		<td><input type="text" name="cidbexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData2->ctr_cidbexp_date));?>" DISABLED /></td>
			      	</tr>
		      	</table>
      	  <?php } //endif 
		      ?>		      </td>
		</tr>
      	<tr>
      		<td>Status</td>
      		<td><strong><font color="#990000"><?php echo $avlabDetails->avstatus_desc;?></font></strong></td>
      		<td>Total Quantity</td>
      		<td><input type="text" name="txttotalQty" maxlength="5" value="<?php echo $avlabDetails->avlab_qty;?>" /> <font color="red">*</font></td>
      	</tr>
      	<tr>
      		<!--td>Qty Cancelled</td-->
      		<!--td colspan="3"><input type="hidden" name="txtqtycancelled" value="<?php echo $avlabDetails->avlab_qty_cancel;?>" size="5" /> &nbsp; &nbsp;
      						Remarks : <input type="text" name="txtcancelremarks" value="<?php echo $avlabDetails->avlab_cancel_remarks;?>" size="50" />
      		</td--><input type="hidden" name="txtqtycancelled" value="<?php echo $avlabDetails->avlab_qty_cancel;?>" size="5" />
</tr>
      	<tr>
      		<td>&nbsp;</td>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td>Entered by</td>
			<td><input type="text" name="enteredby" size="24" value="<?php echo $avlabDetails->avlab_entered_by;?>" READONLY/></td>
			<td>Entered Date</td>
			<td><input type="text" name="entereddate" id="txtentereddate" value="<?php echo date('d-m-Y', strtotime($avlabDetails->avlab_entered_date));?>" READONLY/>			</td>
		</tr>
		<tr>
			<td>Verified by</td>
			<td>
				<input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" /> <!--for javascript to get currentuser-->
				<input type="checkbox" name="isverified" value="1" <?php if($avlabDetails->avlab_isver == '1') echo "CHECKED DISABLED";?> onclick="checktrigger(this, txtverifiedby, verifieddate);" />
				<input type="text" name="txtverifiedby" value="<?php echo $avlabDetails->avlab_ver_by;?>" READONLY/>			</td>
			<td>Verified Date</td>
			<td><input type="text" name="verifieddate" id="txtverifieddate" value="<?php if($avlabDetails->avlab_ver_date != "0000-00-00") echo date('d-m-Y', strtotime($avlabDetails->avlab_ver_date));?>" READONLY/>
				<input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtverifieddate'), this)" />			</td>
		</tr>
		<tr>
			<td>Approved by</td>
			<td><input type="checkbox" name="isapproved" <?php if($avlabDetails->avlab_isappv == '1') echo "CHECKED DISABLED";?> onclick="checktrigger(this, txtapprovedby, approveddate);"/>
				<input type="text" name="txtapprovedby" value="<?php echo $avlabDetails->avlab_appv_by;?>" READONLY/>			</td>
			<td>Approved Date</td>
			<td><input type="text" name="approveddate" id="approveddate" value="<?php if($avlabDetails->avlab_appv_date != "0000-00-00") echo date('d-m-Y', strtotime($avlabDetails->avlab_appv_date));?>" READONLY/>
				<input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('approveddate'), this)" />			</td>
		</tr>
		<tr>
			<!--td>Rejected by</td>
			<td><input type="checkbox" name="isrejected" <?php if($avlabDetails->avlab_isrej == '1') echo "CHECKED DISABLED";?> onclick="checktrigger(this, txtrejectedby, rejecteddate);"/>
				<input type="text" name="txtrejectedby" value="<?php echo $avlabDetails->avlab_rej_by;?>" READONLY/>			</td>
			<td>Rejected Date</td>
			<td><input type="text" name="rejecteddate"  id="rejecteddate" value="<?php if($avlabDetails->avlab_rej_date != "0000-00-00") echo date('d-m-Y', strtotime($avlabDetails->avlab_rej_date));?>" READONLY/>
				<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('rejecteddate'), this)" />			</td-->
	</tr>
		<tr>
			<!--td>Reason for rejection</td>
			<td colspan="3"><input type="text" name="txtrejectreason" size="100" value="<?php echo $avlabDetails->avlab_rej_reason;?>" /></td>
		</tr>
		<tr>
      		<td>&nbsp;</td>
			<td colspan="3">&nbsp;</td-->
		</tr>
		<tr>
		  <td >Payment (Official Receipt)</td>
		  <td ><input type="text" name="payrefno" value="" size="60" readonly="readonly"/>
	      <input type="button" value="..." onclick="paymentlist('<?php echo $ctrData2->ctr_clab_no;?>')"/></td>
		  <td >&nbsp;</td>
		  <td >&nbsp;</td>
    </tr>
		<tr>
		  <td >Close Workorder </td>
		  <td ><input type="checkbox" name="isclosed" <?php if($avlabDetails->avlab_isclosed == '1') echo "CHECKED DISABLED";?> onclick="checktrigger(this, txtclosedby, closeddate);"/>
	      <input type="text" name="txtclosedby" value="<?php echo $avlabDetails->avlab_isclosed_by;?>" readonly="readonly"/></td>
		  <td >Closed Date</td>
		  <td ><input type="text" name="closeddate" id="closeddate" value="<?php echo $avlabDetails->avlab_closed_date;?>" readonly="readonly"/>
	      <input id="button4" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('approveddate'), this)" /></td>
    </tr>
		<tr>
			<td colspan="4" align="center">
				<input type="submit" name="Update" value=" Update " onclick="return confirm('Are you sure you want to update');" <?php echo $btnclosed ?>/>
				<input type="button" name="Back" value=" Back " onclick="location.href='<?php echo site_url();?>/contAvailable/availableDashbrd';" />			</td>
		</tr>
  </table>

<h3 id="calldashbrd2-title" class="handcursor">List of Labours (<?php echo $ctrData1->ctr_comp_name;?>)<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
	<table width="100%" border="0">
		<tr>
			<th>Qty Supply</th>
			<!--th>Qty Cancelled</th-->
			<th>Qty Registered</th>
			<!--th>Qty Accepted</th-->
			<!--th>Qty Rejected</th-->
		</tr>
		<tr>
		  <td align="CENTER"><?php echo $avlabDetails->avlab_qty;?></td>
		  <td align="CENTER"><?php echo $registeredWorkers;?></td>
	  </tr>
		<tr>
			<td align="CENTER">&nbsp;</td>
            
            
		  <!--td align="CENTER"><?php echo $avlabDetails->avlab_qty_cancel;?></td-->
			<td align="CENTER">&nbsp;</td>
            
            
            
		  <!--td align="CENTER">0</td-->
			<!--td align="CENTER">0</td-->
		</tr>
		<tr align="RIGHT">
			<td colspan="6"><input type="button" name="Checklist" value="Print Checklist"   onclick="window.open('<?php echo site_url();?>/contAvailable/printCheckLits/<?php echo $avlabDetails->avlab_ref_no ."/". $ctrData1->ctr_clab_no;?>', 'PrintChecklist', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" />
			  <input type="button" name="Checklist4" value="Surat Pengesahan LT (Old Contractor)"   onclick="window.open('<?php echo site_url();?>/contAvailable/printTransferValidate/<?php echo $ctrData1->ctr_clab_no;?>/<?php echo $refno;?>', 'Local Transfer Pengesahan', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" />
			  <input type="button" name="Checklist3" value="Handover Letter &amp; Passport (New Contractor)"   onclick="window.open('<?php echo site_url();?>/contAvailable/printHandOver/<?php echo $ctrData1->ctr_clab_no;?>/<?php echo $refno;?>', 'Local Transfer Pengesahan', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" />
			  <input type="button" name="Checklist2" value="Surat Pengesahan LT (New Contractor)"   onclick="window.open('<?php echo site_url();?>/contAvailable/printTransferValidateNew/<?php echo $ctrData1->ctr_clab_no;?>/<?php echo $refno;?>', 'Local Transfer Pengesahan', 'height=480, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" />
			  <input name="btnRegisNewLabour" type="button" onclick="registerNewLabor();" value="Register New Labour" <?php echo $btnRegisNewLabour ?><?php echo $btnclosed ?>/>
				<input type="button" name="btnRefresh" value="Refresh Labour List" onclick="location.href='<?php echo site_url();?>/contAvailable/editAvailable/<?php echo $refno;?>'" />
				<!--input type="button" name="btnPrintOPR2" value="Print OPR2" /-->
				<!--input type="button" name="btnPrintOPR2A" value="Print OPR2A" /-->		  </td>
		</tr>
		<tr align="RIGHT">
			<td colspan="6">
				<!--input type="button" name="btnPrintNAA" value="Print NAA" /-->
				<!--input type="button" name="btnPrintNAR" value=" Print NAR " /-->			</td>
		</tr>
		<tr>
			<th colspan="6" align="LEFT">LABOUR DETAILS</th>
		</tr>
	</table>
	<p>
	  <?php if(isset($crud)) echo $crud;?>
  </p>
	<table width="100%" border="0">
	  <tr>
	    <th colspan="6" align="left">TRACKING LOG</th>
	    <th colspan="2" align="right"><input type="button" name="btnNewLog" value=" New Log " onclick="newphtracklog();"  />
        <input type="button" name="btnRefresh2" value=" Refresh Log " onclick="location.href='<?php echo site_url();?>/contAvailable/editAvailable/<?php echo $refno;?>'"  /></th>
	  </tr>
	  <tr>
	    <th width="5%">No.</th>
	    <th width="17%">Date &amp; Time</th>
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
	    <td width="4%"><input type="button" value="Edit" onclick="EditTrackLog('<?php echo $log->track_id;?>')"/></td>
      </tr>
	  <?php }
	}
	?>
  </table>
  <p>&nbsp;</p>
</form>
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
<!--js for calendar date pick: datesubmit field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "txtdatesubmit",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "datesubmitTrigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>

<!--js for calendar date pick: verifieddate field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "txtverifieddate",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "verifieddateTrigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>
<!--js for calendar date pick: approveddate field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "approveddate",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "approveddateTrigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>
<!--js for calendar date pick: rejecteddate field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "rejecteddate",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "rejecteddateTrigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>
</p>

</body>
</html>
