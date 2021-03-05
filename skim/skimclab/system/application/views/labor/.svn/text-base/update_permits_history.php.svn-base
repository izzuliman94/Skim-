<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Permit Renewal Status</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>

<h4>Labour <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Permit Progress <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> View Details</h4>

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
 			<td>Nationality</td>
 			<td><?php echo $labor->nat_desc;?></td>
 		</tr>
 		<tr>
 			<td>Name :</td>
 			<td><?php echo $labor->wkr_name;?></td>
 			<td>Movement Status :</td>
 			<td></td>
 		</tr>
 		<tr>
 			<td>Date Entry (M'sia) :</td>
 			<td><?php if(isset($labor->wkr_entrydate)) echo date('d-m-Y', strtotime($labor->wkr_entrydate));?></td>
 			<td>No. of year in M'sia :</td>
 			<td></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date :</td>
 			<td colspan="3"><?php if($labor->wkr_passexp != "0000-00-00" || $labor->wkr_passexp != "NULL" || $labor->wkr_passexp != "") echo date('d-m-Y', strtotime($labor->wkr_passexp));?></td>
 		</tr>
 		<tr>
 			<td>Current PLKS No. :</td>
 			<td><?php echo $labor->wkr_plksno;?></td>
 			<td>Permit Expiry Date :</td>
 			<td><?php if($labor->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($labor->wkr_permitexp));?></td>
 		</tr>
 	</table>    
  <table width="100%" border="0">
      <tr>
        <th colspan="4" align="LEFT">RENEWAL LOG(FOR INTERNAL CLAB USE ONLY)</th>
      </tr>
      <tr>
        <th>Department</th>
        <th>Processed by</th>
        <th>Date</th>
        <th>Comments</th>
      </tr>
      <tr>
        <td>Operations</td>
        <td><input type="checkbox" name="chkisopr" value="1" onclick="checktrigger(this, txtOPRBy, dtOPR);" <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isopr == '1') echo "CHECKED";}?> DISABLED/>
    		<input type="text" name="txtOPRBy" id="txtOPRBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_oprby;?>" READONLY/>
        </td>
        <td><input type="text" name="dtOPR" size="12" id="dtOPR" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_opr_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_opr_date));}?>" READONLY/>
    	</td>
        <td><textarea name="txtOPRComment" cols="40" rows="1" READONLY><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_opr_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Admin Received</td>
        <td><input type="checkbox" name="chkisAdmin" value="1" onclick="checktrigger(this, txtAdminBy, dtAdmin);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isadmin == '1') echo "CHECKED";}?> DISABLED/>
    		<input type="text" name="txtAdminBy" id="txtAdminBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_adminby;?>" READONLY/>
        </td>
        <td><input type="text" name="dtAdmin" size="12" id="dtAdmin" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_admin_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_admin_date));}?>" READONLY/>
    	</td>
        <td><textarea name="txtAdminComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_admin_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Passport Received from JIM</td>
        <td><input type="checkbox" name="chkisFromJIM" value="1" onclick="checktrigger(this, txtFromJIMBy, dtFromJIM);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isfromjim == '1') echo "CHECKED";}?> DISABLED/>
    		<input type="text" name="txtFromJIMBy" id="txtFromJIMBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_fromjimby;?>" READONLY/>
        </td>
        <td><input type="text" name="dtFromJIM" size="12" id="dtFromJIM" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_fromjim_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_fromjim_date));}?>" READONLY/>
    	</td>
        <td><textarea name="txtFromJIMComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_fromjim_comment;?></textarea></td>
      </tr>
      <tr>
        <td>Operations</td>
        <td><input type="checkbox" name="chkisOPRBck" value="1" onclick="checktrigger(this, txtOPRBckBy, dtOPRBck);"  <?php if($insertupdateflag == 'update') { if($currentRenewal->permit_isbackopr == '1') echo "CHECKED";}?> DISABLED/>
    		<input type="text" name="txtOPRBckBy" id="txtOPRBckBy" value="<?php if($insertupdateflag == 'update') echo $currentRenewal->permit_backoprby;?>"/>
        </td>
        <td><input type="text" name="dtOPRBck" size="12" id="dtOPRBck" value="<?php if($insertupdateflag == 'update'){ if($currentRenewal->permit_backopr_date != '0000-00-00') echo date('d-m-Y', strtotime($currentRenewal->permit_backopr_date));}?>" READONLY/>
    	</td>
        <td><textarea name="txtFromJIMComment" cols="40" rows="1"><?php if($insertupdateflag == 'update') echo $currentRenewal->permit_backopr_comment;?></textarea></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
      	<td align="LEFT"><strong>Overall Sumbission Status</strong></td>
      	<td colspan="3" align="LEFT">
      		<input type="checkbox" name="chkResubmit" value="1" <?php if($currentRenewal->permit_isincomplete == '1') echo "CHECKED";?> DISABLED />Incomplete (need to resubmit) &nbsp; &nbsp; &nbsp;
      		Remarks: <input type="text" name="txtIncompleteRemarks" size="50" value="<?php echo $currentRenewal->permit_incomplete_remarks;?>"/> <br />
      		<input type="checkbox" name="chkOwnSubmission" value="1" <?php if($currentRenewal->permit_isownsubmission == '1') echo "CHECKED";?> DISABLED />Allow Contractor to do own submission
      	</td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" align="CENTER">
        	<input type="button" name="btnClose" value="Close this Window" onclick="window.close();"/>
        </td>
      </tr>
    </table>
  </form>
  <br />
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
