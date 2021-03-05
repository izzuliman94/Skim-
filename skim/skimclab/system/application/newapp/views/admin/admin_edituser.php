<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url()?>js/switchcontent.js" >

/***********************************************
* Switch Content script- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language=javascript>
function checkMe(obj)
{
	var y = document.user_info.accStr.value;
	if(obj.checked == true){
		y = y + obj.value;	
	}else if(obj.checked == false){
		y = y.replace(obj.value, "");
	}
	else{
	}
	
	document.user_info.accStr.value = y;
}
</script>
</head>

<body>

<h4> <a href="<?php echo site_url('contSystemAdmin/filterListUsers');?>">System administration</a>  <img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" /><a href="<?php echo site_url('contSystemAdmin/filterListUsers');?>">Users List</a><img src="<?php echo base_url()?>images/right_arrow.gif" width="13" height="14" />Edit User</h4>

<h2> Edit User </h2>

<div><a href="javascript:admindashbrd.sweepToggle('contract')">Contract All</a> | <a href="javascript:admindashbrd.sweepToggle('expand')">Expand All</a></div>

<h3 id="admindashbrd2-title" class="handcursor">Employee Information  <img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="admindashbrd2" class="switchgroup1">
 <form action="<?php echo site_url('contAdmin/editUserSubmit');?>" method="POST" name="user_info" id="user_info"  onsubmit="return v.exec()">
    <table width="100%" border="0">
    	<tr>
    		<th colspan="4" align="left">Employee Form</th>
    	</tr>
      	<tr>
      		<td width="20%">EmployeeNo</td>
      		<td width="30%"><input type="text" name="employeeno" value="<?php echo $emp->emp_num;?>" disabled />
      			<input type="hidden" name="empid" value="<?php echo $emp->emp_id;?>" />
      		</td>
      		<td width="20%">Department</td>
      		<td width="30%"><select name="department">
      							<option value=""></option>
      							<?php foreach($allDepartments->result() as $department){
      							?>
      							<option value="<?php echo $department->dpt_id;?>" <?php if($emp->emp_dpt_id == $department->dpt_id) echo "SELECTED";?>><?php echo $department->dpt_name; ?></option>
      							<?php
      							}
      							?>
      						</select>
      		</td>
      	</tr>
      	<tr>
      		<td>Name</td>
      		<td><input type="text" name="name" maxlength="100"  value="<?php echo $emp->emp_name;?>" size="40"/></td>
      		<td>Designation</td>
      		<td><input type="text" name="designation" maxlength="50"  value="<?php echo $emp->emp_position;?>"/></td>
      	</tr>
      	<tr>
      		<td>Office Location</td>
      		<td><input type="text" name="location" maxlength="100"  value="<?php echo $emp->emp_office_location;?>" size="40"/></td>
      		<td>Hand Phone</td>
      		<td><input type="text" name="handphone" maxlength="50"  value="<?php echo $emp->emp_handphone;?>"/></td>
      	</tr>
      	<tr>
      		<td>Work Phone</td>
      		<td><input type="text" name="workphone" maxlength="50"  value="<?php echo $emp->emp_workphone;?>"/></td>
      		<td>Extension</td>
      		<td><input type="text" name="extension" maxlength="50"  value="<?php echo $emp->emp_extension;?>"/></td>
      	</tr>
      	<tr>
      		<td>House Phone</td>
      		<td><input type="text" name="housephone" maxlength="50"  value="<?php echo $emp->emp_housephone;?>"/></td>
      		<td>Fax No.</td>
      		<td><input type="text" name="fax" maxlength="50"  value="<?php echo $emp->emp_fax;?>"/></td>
      	</tr>
      	<tr>
      		<td>Email</td>
      		<td><input type="text" name="email" maxlength="80"  value="<?php echo $emp->emp_email;?>" size="40"/></td>
      		<td>&nbsp;</td>
      		<td>&nbsp;</td>
      	</tr>
      	<tr>
    		<th colspan="4" align="left">Employee Login & Accessible Details </th>
    	</tr>
    	<tr>
    		<td colspan="2" valign="center">
    			<table width="90%" align="center" cellpaddig="0" cellspacing="0">
    				<tr>
    				  <td valign="top">
    					<input type="checkbox" name="accessibility" value="1" <?php if(strpos($emp->emp_accessibility, '1') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Contractor <br />
					    <input type="checkbox" name="accessibility" value="2" <?php if(strpos($emp->emp_accessibility, '2') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Labour<br />
    					<input type="checkbox" name="accessibility" value="3" <?php if(strpos($emp->emp_accessibility, '3') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Local Transfer<br />
    					<input type="checkbox" name="accessibility" value="4" <?php if(strpos($emp->emp_accessibility, '4') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> SPIM (VDR)<br />
                        <input type="checkbox" name="accessibility" value="A" <?php if(strpos($emp->emp_accessibility, 'A') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> SPIM (Renewal)<br />
						<input type="checkbox" name="accessibility" value="B" <?php if(strpos($emp->emp_accessibility, 'B') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Finance<br />
						<input type="checkbox" name="accessibility" value="C" <?php if(strpos($emp->emp_accessibility, 'C') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Clab ID Card<br />
    					<input type="checkbox" name="accessibility" value="5" <?php if(strpos($emp->emp_accessibility, '5') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Reports<br />
    					<input type="checkbox" name="accessibility" value="6" <?php if(strpos($emp->emp_accessibility, '6') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> Administration<br />
    					<input type="hidden" name="accStr" value="<?php echo $emp->emp_accessibility;?>"/>
    				  </td>
    				</tr>
    			</table>
    		</td>
    		<td colspan="2">
    			<table width = "90%" align="center" border="1">
    				<tr>
    					<td>Login Name</td>
    					<td><input type="text" name="login" maxlength="100"  value="<?php echo $emp->emp_username;?>" disabled/></td>
    				</tr>
    				<tr>
    					<td>Password</td>
    					<td><input type="password" name="password" maxlength="100"  value="<?php echo $emp->emp_password;?>"/></td>
    				</tr>
    				<tr>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    				</tr>
    				<tr>
    					<th align="left" colspan="2">Authorization Level</th>
    				</tr>
    				<tr>
    					<td><input type="checkbox" name="accessibility" value="7" <?php if(strpos($emp->emp_accessibility, '7') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    					<td>Verification ( New Contractor Verification)</td>
    				</tr>
    				<tr>
    					<td><input type="checkbox" name="accessibility" value="8" <?php if(strpos($emp->emp_accessibility, '8') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    					<td>Approve/Reject ( New Contractor Approval)</td>
    				</tr>
    				<tr>
    					<td><input type="checkbox" name="accessibility" value="9" <?php if(strpos($emp->emp_accessibility, '9') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    					<td>Delete (Delete Media And Record)</td>
    				</tr>
    				<tr>
    					<td><input type="checkbox" name="accessibility" value="p" <?php if(strpos($emp->emp_accessibility, 'p') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    					<td>Special Permit Renewal rights (Ext Received)</td>
    				</tr>
    				<tr>
    				  <td><input type="checkbox" name="accessibility2" value="s" <?php if(strpos($emp->emp_accessibility, 's') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Special update SPIM rights (CV Received)</td>
  				  </tr>
    				<tr>
    				  <td><input type="checkbox" name="accessibility4" value="l" <?php if(strpos($emp->emp_accessibility, 'l') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Create New Labour (New Labour Registration)</td>
  				  </tr>
    				<tr>
    				  <td><input type="checkbox" name="accessibility5" value="c" <?php if(strpos($emp->emp_accessibility, 'c') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Create New Contractor (New Contractor Registration)</td>
  				  </tr>
    				<tr>
    					<td><input type="checkbox" name="accessibility3" value="n" <?php if(strpos($emp->emp_accessibility, 'n') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    					<td>Create New Workorder (New Workorder)</td>
    				</tr>
					<tr>
    				  <td><input type="checkbox" name="accessibility6" value="z" <?php if(strpos($emp->emp_accessibility, 'z') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (VDR)</td>
  				  </tr>
				  <tr>
    				  <td><input type="checkbox" name="accessibility7" value="y" <?php if(strpos($emp->emp_accessibility, 'y') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (Renewal)</td>
  				  </tr>
				   <tr>
    				  <td><input type="checkbox" name="accessibility8" value="x" <?php if(strpos($emp->emp_accessibility, 'x') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Finance</td>
  				  </tr>
				  <tr>
    				  <td><input type="checkbox" name="accessibility9" value="v" <?php if(strpos($emp->emp_accessibility, 'v') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Approval Of Spim (VDR & Renewal)</td>
  				  </tr>
    			</table>
   		  </td>
    	</tr>
    	<tr>
    		<td colspan="4" align="center"><input type="submit" name=" Update " value=" Update " onclick="return confirm('Are you sure you want to update?');" /> &nbsp;
    			<input type="button" name="Cancel" value="Cancel" onclick="history.back();"/>
    		</td>
    	</tr>
    </table>
  </form>

</div>
<script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var admindashbrd=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
admindashbrd.setColor('darkred', 'black')
admindashbrd.setPersist(true)
admindashbrd.collapsePrevious(true) //Only one content open at any given time
admindashbrd.init()
</script>

</body>
</html>
