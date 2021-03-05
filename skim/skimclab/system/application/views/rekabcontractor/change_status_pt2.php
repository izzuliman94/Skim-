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
</head>

<body>

<h4><a href="<?php echo site_url();?>/contContractor/ctrDashboard">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> <a href="registration_pt1.php">Company Registration</a>  <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Change Status </h4>
<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Company Registration - Change Status<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<?php if(isset($successMsg)) echo $successMsg;?> 
 <form action="<?php echo site_url('contContractor/changeCtrStatusPt2Submit');?>" method="POST" name="changeStatusForm" id="changeStatusForm"  onsubmit="return v.exec()">
    <table width="100%" border="0">
	  <tr>
	  	<th colspan="4" align="LEFT">Contractor Details</th>
	  </tr>
      <tr>
        <td>Contractor Name: </td>
        <td><?php echo $ctr->ctr_comp_name;?></td>
        <td><?php echo anchor_popup("contContractor/viewListOfLabours/" . $ctr->ctr_clab_no, "View List of Labours");?></td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td width="15%">ROC Number: </td>
        <td width="35%"><?php echo $ctr->ctr_comp_regno;?></td>
        <td width="15%">CLAB Number: </td>
        <td width="35%"><?php echo $ctr->ctr_clab_no;?></td>
	  </tr>
	  <tr>
        <td>Address:</td>
        <td colspan="3"><?php echo $ctr->ctr_addr1;?>, <?php echo $ctr->ctr_addr2;?><br /><?php echo $ctr->ctr_addr3;?></td>
	  </tr>
	  <tr>
        <td>Contact Person: </td>
        <td><?php echo $ctr->ctr_contact_name;?></td>
        <td>Contact Number:</td>
        <td><?php echo $ctr->ctr_contact_mobileno;?></td>
	  </tr>
	  <tr>
        <td>CLAB expiry date:</td>
        <td><?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?></td>
        <td>CIDB expiry date:</td>
        <td><?php if($ctr->ctr_cidbexp_date != "0000-00-00") echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?></td>
	  </tr>
	  <tr>
	  	<td>Current Status:</td>
	  	<td colspan="3"><?php if($ctr->ctr_status == 1) echo "ACTIVE";
	  					  	  else if ($ctr->ctr_status == 2) echo "IN-ACTIVE";
	  					  	  else if ($ctr->ctr_status == 3) echo "SUSPENDED";
	  					  	  else if ($ctr->ctr_status == 4) echo "SUSPENDED";
	  					  	  else echo "UNKNOWN";
	  					?>
	  		&nbsp; <input type="button" name="btnView1" value="View Status History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contContractor/ctrStatusHistory/<?php echo $ctr->ctr_clab_no;?>', 'Change Status History', 'height=350, width=510, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>	  	</td>
	  </tr>
	  <tr>
	  	<th colspan="4" align="LEFT">Change Status</th>
	  </tr>
	  <tr>
        <td id="t_selStatus">Status:</td>
        <td colspan="3">
        	<select name="selStatus">
        		<option value=""></option>
        		<option value="1">ACTIVE</option>
        		<option value="2">IN-ACTIVE</option>
        		<option value="3">SUSPENDED</option>
        		<option value="4">SUSPENDED</option>
        	</select>      	</td>
      </tr>
	  <tr>
        <td id="t_txtreason">Reasons :</td>
        <td colspan="3"><textarea name="txtreason" rows="2" cols="50"></textarea></td>
      </tr>
      <tr>
        <td colspan="4" align="CENTER">
        	<input type="hidden" name="oldstatus" value="<?php echo $ctr->ctr_status;?>" />
        	<input type="hidden" name="clabno" value="<?php echo $ctr->ctr_clab_no;?>" />
        	<input type="submit" name="btnSubmit" value=" Update Status " onclick="return confirm('Are you sure you want to update?');"/>
        	<input type="button" name="btnCancel" name="btnBack" value=" Back " onclick="location.href='<?php echo site_url();?>/contContractor/changeCtrStatus'" />        </td>
      </tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>

<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtreason': {
			'l': 'Reason',  // label
			'r': true,    // required
			't': 't_txtreason'// id of the element to highlight if input not validated
		},
		'selStatus':{'l':'Status','r':true,'t':'t_selStatus'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('changeStatusForm', a_fields, o_config);

	</script>
<!--END OF FORM VALIDATION JAVASCRIPT-->

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
