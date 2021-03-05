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
  	function triggerStatusForm(){
		if (document.changeStatusForm.rdchangestatus[0].checked)
		{
		 	document.changeStatusForm.txtapprovedby.disabled = true;
		 	document.changeStatusForm.txtactivateremarks.disabled = true;
		 	document.changeStatusForm.selActiveStatus.disabled = true;
		  
		  	document.changeStatusForm.selInactiveStatus.disabled = false;
			document.changeStatusForm.txtinactivateReason.disabled = false;
			document.changeStatusForm.dtincident.disabled = false;
			
			changeFormElements();
		}
		else{
			document.changeStatusForm.selInactiveStatus.disabled = true;
			document.changeStatusForm.txtinactivateReason.disabled = true;
			document.changeStatusForm.dtincident.disabled = true;
			document.getElementById("area1").style.visibility = "hidden";	
		 	document.getElementById("area2").style.visibility = "hidden";
			
			document.changeStatusForm.txtapprovedby.disabled = false;
		  	document.changeStatusForm.txtactivateremarks.disabled = false;
		  	document.changeStatusForm.selActiveStatus.disabled = false;
		}
  	}
  	
  	function changeFormElements(){
	  	var statusindex  = document.changeStatusForm.selInactiveStatus.selectedIndex;
	 	var statusvalue = document.changeStatusForm.selInactiveStatus.options[statusindex].value;
	
	 	if(statusvalue == 14 || statusvalue == 15){
		 	document.getElementById("area1").style.visibility = "hidden";	
		 	document.getElementById("area2").style.visibility = "visible";
	 	}
	 	else{
		 	document.getElementById("area1").style.visibility = "visible";	
		 	document.getElementById("area2").style.visibility = "hidden";
	 	}
  	}
  	
  	function prepareForm(){
	  	document.getElementById("area2").style.visibility = "hidden";	
  	}
  </script>
</head>
<body onLoad="prepareForm();">

<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /><a href="registration_pt1.php"> Registration</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Change Status </h4>
<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Change Status    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url('contLabour/changeLaborStatusPt2Submit');?>" method="POST" name="changeStatusForm" id="changeStatusForm">
  	<table width="100%" border="0">
  		<tr>
 			<th colspan="5" align="LEFT">Labour Details</th>
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
 			<td>Movement Status :</td>
 			<td><font color="red"><strong><?php echo $labor->avlab_desc;?>/<?php echo $labor->emp_status_desc;?></strong></font>
 				&nbsp; <input type="button" name="btnView1" value="View Status History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/viewStatusHistory/<?php echo $labor->wkr_id;?>', 'Passport Exp History', 'height=350, width=500, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>
 			</td>
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
 			<td>Permit Expiry Date :</td>
 			<td><?php if($labor->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($labor->wkr_permitexp));?></td>
 			<td>Current PLKS No. :</td>
 			<td><?php echo $labor->wkr_plksno;?></td>
 		</tr>
 	</table>
  <table width="100%" border="0">  
      <tr>
        <th colspan="4"><div align="left">Change Status</div></th>
      </tr>
      <tr>
      	<td ALIGN="LEFT" rowspan="4"><input type="radio" name="rdchangestatus" value="0"  onclick="triggerStatusForm();" CHECKED/>Inactivate</td>
        <td>Status </td>
        <td colspan="2"><select name="selInactiveStatus" onchange="changeFormElements();">
          <option value=""></option>
          <option value="8">Runaway</option>
          <option value="9">Unknown</option>
          <option value="10">Com/Deported</option>
          <option value="11">Death</option>
          <option value="14">Leave without notice</option>
          <option value="15">Leave with notice</option>
          <option value="16">Unfit</option>
		  <option value="17">Permit Cancelled</option>
		  <option value="18">Eviction</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Reasons</td>
        <td colspan="2"><textarea name="txtinactivateReason" cols="50" rows="2"></textarea></td>
      </tr>
      <tr>
      	<td colspan="3" align="LEFT">
      	 <table id="area1">
      	  	<tr>
	      		<td width="40%">Incident Date :</td>
	      		<td colspan="2">
	      			<input type="text" name="dtincident" id="dtincident" size="12" READONLY/>
	      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtincident'), this)" />
	      		</td>
	      	</tr>
	     </table>
      		<table id="area2" width="100%">
      	  	<tr>
	      		<td>Period From: <input type="text" name="dtfrom" id="dtfrom" size="12" READONLY />
		     		<input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtfrom'), this)" />
	      			&nbsp; &nbsp; 
		     		To: <input type="text" name="dtto" id="dtto" size="12" READONLY />
		     		<input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtto'), this)" />
		     		&nbsp; &nbsp; Running No. <input type="text" name="txtrunningno" value=""/>
	      		</td>
	      	</tr>
	     </table>
      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td rowspan="3"><input type="radio" name="rdchangestatus" value="1" onclick="triggerStatusForm();"/>Activate</td>
      	<td>Status </td>
        <td colspan="2"><select name="selActiveStatus" DISABLED>
          <option value=""></option>
          <option value="4">Available</option>
          <option value="6">Booked</option>
          <option value="7">Hired</option>
        </select>
        </td>
      </tr>
      <tr>
      	<td>Approved by</td>
      	<td colspan="2" DISABLED><input type="text" name="txtapprovedby" DISABLED/></td>
      </tr>
      <tr>
      	<td>Remarks</td>
      	<td colspan="2">
      		<textarea name="txtactivateremarks" cols="50" rows="2" DISABLED></textarea>
      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td>Key in by</td>
      	<td><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" READONLY/></td>
      	<td>Key in date</td>
      	<td><input type="text" name="dtkeyin" id="dtkeyin" value="<?php echo date('d-m-Y');?>" READONLY/>
      	</td>
      </tr>
      <tr>
        <td colspan="4" align="CENTER">
        	<input type="hidden" name="wkr_id" value="<?php echo $labor->wkr_id;?>" />
        	<input type="hidden" name="txtwkrpassno" value="<?php echo $labor->wkr_passno;?>" />
        	<input type="submit" name="btnChangeStatus" value=" Update " onclick="return confirm('Are you sure you want to update the status?');"/>
        	<input type="button" name="btnCancel" value=" Back " onclick="location.href='<?php echo site_url();?>/contLabour/changeLaborStatus'"/>
        </td>
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
</p>

</body>
</html>
