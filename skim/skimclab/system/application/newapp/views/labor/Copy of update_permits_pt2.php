<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Permit Renewal Status</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- ? Dynamic Drive (www.dynamicdrive.com)
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
	function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			//get date
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth() + 1
			tyear = today.getFullYear()
			
			txtbox.value=document.permitRenewalForm.currentlogin.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
		}
		else {
			txtbox.value=""
			datebox.value=""
		}
	}
  </script>
</head>

<body>
<?php 
	$accessibility = $this->session->userdata('emp_accessibility');
?>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Permit Progress </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Update Permit Progress<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<?php if(isset($successMsg)) echo $successMsg;?><br />
  <form action="<?php echo site_url();?>/contLabour/updatePermitPt2Submit" method="POST" name="permitRenewalForm" id="permitRenewalForm">
  <table width="100%" border="0">
  		<tr>
 			<th colspan="5" align="LEFT">LABOUR DETAILS</th>
 		</tr>
 		<tr>
 			<td width="18%">Passport No :</td>
 			<td width="32%"><?php echo $labor->wkr_passno;?></td>
 			<td width="18%">Green Card No. :</td>
 			<td width="32%"><?php echo $labor->wkr_green;?></td>
 		</tr>
 		<tr>
 			<td>Name :</td>
 			<td><?php echo $labor->wkr_name;?></td>
 			<td>Date Entry (M'sia) :</td>
 			<td><?php if(isset($labor->wkr_entrydate)) echo date('d-m-Y', strtotime($labor->wkr_entrydate));?></td>
 		</tr>
 		<tr>
 			<td>Old Passport No. :</td>
 			<td></td>
 			<td>Amnesty Ref. No :</td>
 			<td></td>
 		</tr>
 		<tr>		
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date of Birth :</td>
 			<td>
 				<?php if(isset($labor->wkr_dob)) echo date('d-m-Y', strtotime($labor->wkr_dob));?>
 			</td>
 			<td>Gender :</td>
 			<td><?php echo $labor->gender_desc;?></td>
 		</tr>
 		<tr>
 			<td>Race/Ethnic :</td>
 			<td><?php echo $labor->race_desc;?></td>
 			<td>Nationality</td>
 			<td><?php echo $labor->nat_desc;?></td>
 		</tr>
 		<tr>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date :</td>
 			<td colspan="3"><?php if($labor->wkr_passexp != "0000-00-00" || $labor->wkr_passexp != "NULL" || $labor->wkr_passexp != "") echo date('d-m-Y', strtotime($labor->wkr_passexp));?></td>
 		</tr>
 		<tr>
 			<td>Current PLKS No. :</td>
 			<td><?php echo $labor->wkr_plksno;?></td>
 			<td>Permit Expiry Date :</td>
 			<td><?php if($labor->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($labor->wkr_permitexp));?>
 			    &nbsp; <input type="button" name="btnView2" value="View &amp; Update" class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/viewPermitExpHistory/<?php echo $labor->wkr_id;?>', 'Permit Exp History', 'height=400, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>
 			</td>
 		</tr>
 	</table>    
  <table width="100%" border="0">
      <tr>
        <th colspan="4" align="LEFT">RENEWAL LOG(FOR INTERNAL CLAB USE ONLY)</th>
      </tr>
      <tr>
        <th width="25%">Department</th>
        <th>Processed by</th>
        <th>Date</th>
        <th>Comments</th>
      </tr>
      <tr>
        <td>Corporate Support Submit</td>
        <td><input type="checkbox" name="chkisopr" value="1" onclick="checktrigger(this, txtOPRBy, dtOPR);" <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isopr == '1') echo "CHECKED DISABLED";}?>/>
    		<input type="text" name="txtOPRBy" id="txtOPRBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_oprby;?>" />
        </td>
        <td><input type="text" name="dtOPR" size="12" id="dtOPR" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_opr_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_opr_date));}?>" READONLY/>
			<input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtOPR'), this)" />
        <td><textarea name="txtOPRComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_opr_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Corporate Services Received</td>
        <td><input type="checkbox" name="chkisAdmin" value="1" onclick="checktrigger(this, txtAdminBy, dtAdmin);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isadmin == '1') echo "CHECKED DISABLED";}?>/>
    		<input type="text" name="txtAdminBy" id="txtAdminBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_adminby;?>"/>
        </td>
        <td><input type="text" name="dtAdmin" size="12" id="dtAdmin" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_admin_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_admin_date));}?>" READONLY/>
    		<input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtAdmin'), this)" />
        </td>
        <td><textarea name="txtAdminComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_admin_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Corporate Services (Received from JIM)</td>
        <td><input type="checkbox" name="chkisFromJIM" value="1" onclick="checktrigger(this, txtFromJIMBy, dtFromJIM);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isfromjim == '1') echo "CHECKED DISABLED";}?>/>
    		<input type="text" name="txtFromJIMBy" id="txtFromJIMBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_fromjimby;?>"/>
        </td>
        <td><input type="text" name="dtFromJIM" size="12" id="dtFromJIM" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_fromjim_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_fromjim_date));}?>" READONLY/>
    		<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtFromJIM'), this)" />	
        </td>
        <td><textarea name="txtFromJIMComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_fromjim_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Corporate Support Received</td>
        <td><input type="checkbox" name="chkisOPRBck" value="1" onclick="checktrigger(this, txtOPRBckBy, dtOPRBck);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isbackopr == '1') echo "CHECKED DISABLED";}?> <?php if(strpos($accessibility, 'p') == false) echo "DISABLED";?>/>
    		<input type="text" name="txtOPRBckBy" id="txtOPRBckBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_backoprby;?>" <?php if(strpos($accessibility, 'p') == false) echo "READONLY";?>/>
        </td>
        <td><input type="text" name="dtOPRBck" size="12" id="dtOPRBck" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_backopr_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_backopr_date));}?>" READONLY/>
    		<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtOPRBck'), this)" />
    	</td>
        <td><textarea name="txtFromJIMComment" cols="40" rows="1" <?php if(strpos($accessibility, 'p') == false) echo "READONLY";?>><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_backopr_comment;?></textarea></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td align="LEFT"><strong>Overall Sumbission Status</strong></td>
      	<td colspan="3" align="LEFT">
      		<input type="checkbox" name="chkResubmit" value="1" />Incomplete (need to resubmit) &nbsp; &nbsp; &nbsp;
      		Remarks: <input type="text" name="txtIncompleteRemarks" size="50" /> <br />
      		<input type="checkbox" name="chkOwnSubmission" value="1" />Allow Contractor to do own submission
      	</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" align="CENTER">
        	<input type="hidden" name="wkr_id" value="<?php echo $labor->wkr_id;?>" />
        	<input type="hidden" name="currentlogin" value="<?php echo $this->session->userdata('username');?>" />
        	<input type="hidden" name="wkrpassno" value="<?php echo $labor->wkr_passno;?>" />
        	<input type="hidden" name="insertupdateflag" value="<?php echo $insertupdateflag;?>" />
        	<input type="hidden" name="permitid" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_id; else echo "0"?>" />
        	<input type="submit" name="BtnUpdate" value=" Update " onclick="return confirm('Are you sure you want to update?');"/>
        	<input type="button" name="btnBack" value=" Back " onclick="location.href='<?php echo site_url();?>/contLabour/updatePermits'"/>
        </td>
      </tr>
    </table>
  </form>
  <br />
 <table width="100%" border="0">
 	<tr>
 		<th colspan="7">PREVIOUS SUBMISSIONS</th>
 	</tr>
 	<tr>
 		<th>No.</th>
 		<th>OPR Received Date</th>
 		<th>Completed Date</th>
 		<th>Remarks</th>
 		<th>PLKS Expiry</th>
 		<th>Status</th>
 		<th>&nbsp;</th>
 	</tr>
 	<?php if($updatePermitHistory->num_rows() > 0){
		$i = 1;
		foreach($updatePermitHistory->result() as $updatepermit){
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php if($updatepermit->permit_opr_date != '0000-00-00') echo date('d-m-Y', strtotime($updatepermit->permit_opr_date)); else echo "-";?></td>
		<td><?php if($updatepermit->permit_backopr_date != '0000-00-00') echo date('d-m-Y', strtotime($updatepermit->permit_backopr_date)); else echo "-";?></td>
		<td><?php echo $updatepermit->permit_backopr_comment;?> <?php echo $updatepermit->permit_incomplete_remarks;?></td>
		<td><?php if($updatepermit->permit_newpermitexp != '0000-00-00') echo date('d-m-Y', strtotime($updatepermit->permit_newpermitexp)); else echo "-";?></td>
		<td><?php echo $updatepermit->permit_progress;?></td>
		<td><?php echo anchor_popup("contLabour/permitRenewalHistory/". $labor->wkr_id . "/" . $updatepermit->permit_id,"Details");?></td>
	</tr>
	<?php }
	}
	else{
	?>
	<tr>
		<td colspan="7"><strong><font color="red">No previous submission is recorded for this labour.</font></strong></td>
	</tr>
	<?php
	}
	?>
 </table>
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
</p>

</body>
</html>
