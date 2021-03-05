<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url()?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
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
<style type="text/css">
<!--
.style1 {	color: #FF0000;
	font-weight: bold;
}
.style5 {color: #0000FF; font-weight: bold; }
-->
</style>
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
    			<table width="90%" align="center" cellpaddig="0" cellspacing="0" border="1">
    			  <tr>
                    <td width="12%"><div align="center" class="style5">Code</div></td>
  			        <td width="88%"><span class="style5">Access</span></td>
    			  </tr>
    			  <tr>
    			    <td><div align="center">0</div></td>
    			    <td><input type="checkbox" name="accessibility39" value="0" <?php if(strpos($emp->emp_accessibility, '0') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> 
    			      Acknowledgement
</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">1</div></td>
  			        <td><input type="checkbox" name="accessibility14" value="1" <?php if(strpos($emp->emp_accessibility, '1') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Contractor </td>
    			  </tr>
    			  <tr>
                    <td><div align="center">2</div></td>
  			        <td><input type="checkbox" name="accessibility15" value="2" <?php if(strpos($emp->emp_accessibility, '2') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Labour</td>
    			  </tr>
    			  <tr>
                    <td><div align="center">3</div></td>
    			    <td><input type="checkbox" name="accessibility16" value="3" <?php if(strpos($emp->emp_accessibility, '3') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Local Transfer</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">T</div></td>
    			    <td><input type="checkbox" name="accessibility17" value="T" <?php if(strpos($emp->emp_accessibility, 'T') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
SPIM (Transit Centre)</td>
  			    </tr>
    			  <tr>
    			    <td><div align="center">G</div></td>
    			    <td><input type="checkbox" name="accessibility40" value="G" <?php if(strpos($emp->emp_accessibility, 'G') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> 
    			      G1-G3
</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">4</div></td>
    			    <td> <input type="checkbox" name="accessibility18" value="4" <?php if(strpos($emp->emp_accessibility, '4') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
   			        SPIM (VDR)</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">F</div></td>
    			    <td><input type="checkbox" name="accessibility19" value="F" <?php if(strpos($emp->emp_accessibility, 'F') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
SPIM (First Year Renewal)</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">A</div></td>
    			    <td><input type="checkbox" name="accessibility20" value="A" <?php if(strpos($emp->emp_accessibility, 'A') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
SPIM (Renewal)</td>
  			    </tr>
    			  <tr>
    			    <td><div align="center">J</div></td>
    			    <td><input type="checkbox" name="accessibility41" value="J" <?php if(strpos($emp->emp_accessibility, 'J') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> 
    			      SPIM (Greencard)
</td>
  			    </tr>
    			  <tr>
    			    <td><div align="center">B</div></td>
    			    <td><input type="checkbox" name="accessibility43" value="B" <?php if(strpos($emp->emp_accessibility, 'B') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
   			        Finance Backup</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">B</div></td>
    			    <td><input type="checkbox" name="accessibility21" value="B" <?php if(strpos($emp->emp_accessibility, 'B') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Finance</td>
  			    </tr>
    			  <tr>
    			    <td><div align="center">I</div></td>
    			    <td><input type="checkbox" name="accessibility38" value="I" <?php if(strpos($emp->emp_accessibility, 'I') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/> 
    			      Invoice</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">L</div></td>
    			    <td><input type="checkbox" name="accessibility22" value="L" <?php if(strpos($emp->emp_accessibility, 'L') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Legal</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">W</div></td>
    			    <td><input type="checkbox" name="accessibility23" value="W" <?php if(strpos($emp->emp_accessibility, 'W') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Local Labour</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">C</div></td>
    			    <td><input type="checkbox" name="accessibility24" value="C" <?php if(strpos($emp->emp_accessibility, 'C') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
SKIM ID Card</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">M</div></td>
    			    <td><input type="checkbox" name="accessibility25" value="M" <?php if(strpos($emp->emp_accessibility, 'M') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
ICT Report</td>
  			    </tr>
    			  
    			  <tr>
                    <td><div align="center">5</div></td>
    			    <td><input type="checkbox" name="accessibility26" value="5" <?php if(strpos($emp->emp_accessibility, '5') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Reports</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">P</div></td>
    			    <td><input type="checkbox" name="accessibility27" value="P" <?php if(strpos($emp->emp_accessibility, 'P') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
ICT Passport Management</td>
  			    </tr>
    			  <tr>
                    <td><div align="center">6</div></td>
    			    <td><input type="checkbox" name="accessibility" value="6" <?php if(strpos($emp->emp_accessibility, '6') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/>
Administration
  <input type="hidden" name="accStr" value="<?php echo $emp->emp_accessibility;?>"/></td>
  			    </tr>
    			</table>
   		  </td>
    		<td colspan="2">
    			<table width = "90%" align="center" border="1">
    				<tr>
    					<td colspan="2">Login Name</td>
    					<td><input type="text" name="login" maxlength="100"  value="<?php echo $emp->emp_username;?>" disabled/></td>
    				</tr>
    				<tr>
    					<td colspan="2">Password</td>
    					<td><input type="password" name="password" maxlength="100"  value="<?php echo $emp->emp_password;?>"/></td>
    				</tr>
    				<tr>
    					<td colspan="2">&nbsp;</td>
    					<td>&nbsp;</td>
    				</tr>
    				<tr>
    					<th align="left" colspan="3">Authorization Level</th>
    				</tr>
    				<tr>
    				  <td><span class="style5">Code</span></td>
    				  <td><span class="style5">Access</span></td>
    				  <td><span class="style5">Module</span></td>
  				  </tr>
    				<tr>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">Labour Module</span></td>
  				  </tr>
    				<tr>
                      <td><div align="center">l</div></td>
    				  <td><input type="checkbox" name="accessibility28" value="l" <?php if(strpos($emp->emp_accessibility, 'l') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Create New Labour (New Labour Registration)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">9</div></td>
    				  <td><input type="checkbox" name="accessibility10" value="9" <?php if(strpos($emp->emp_accessibility, '9') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Delete (Delete Media And Record)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">q</div></td>
    				  <td><input type="checkbox" name="accessibility31" value="q" <?php if(strpos($emp->emp_accessibility, 'q') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Change Status</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">r</div></td>
    				  <td><input type="checkbox" name="accessibility32" value="r" <?php if(strpos($emp->emp_accessibility, 'r') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">Contractor Module</span></td>
  				  </tr>
    				<tr>
                      <td><div align="center">7</div></td>
    				  <td><input type="checkbox" name="accessibility29" value="7" <?php if(strpos($emp->emp_accessibility, '7') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification ( New Contractor Verification)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">8</div></td>
    				  <td><input type="checkbox" name="accessibility30" value="8" <?php if(strpos($emp->emp_accessibility, '8') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Approve/Reject ( New Contractor Approval)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">c</div></td>
    				  <td><input type="checkbox" name="accessibility4" value="c" <?php if(strpos($emp->emp_accessibility, 'c') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Create New Contractor (New Contractor Registration)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">o</div></td>
    				  <td><input type="checkbox" name="accessibility13" value="o" <?php if(strpos($emp->emp_accessibility, 'o') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Open Blacklist</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">m</div></td>
    				  <td><input type="checkbox" name="accessibility33" value="m" <?php if(strpos($emp->emp_accessibility, 'm') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">SPIM </span></td>
  				  </tr>
    				<tr>
                      <td><div align="center">n</div></td>
    				  <td><input type="checkbox" name="accessibility3" value="n" <?php if(strpos($emp->emp_accessibility, 'n') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Create New Workorder (New Workorder)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">x</div></td>
    				  <td><input type="checkbox" name="accessibility8" value="x" <?php if(strpos($emp->emp_accessibility, 'x') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Finance</td>
  				  </tr>
    				<tr>
                      <td><div align="center">v</div></td>
    				  <td><input type="checkbox" name="accessibility9" value="v" <?php if(strpos($emp->emp_accessibility, 'v') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Approval Of Spim (VDR &amp; Renewal)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">k</div></td>
    				  <td><input type="checkbox" name="accessibility34" value="k" <?php if(strpos($emp->emp_accessibility, 'v') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">h</div></td>
    				  <td><input type="checkbox" name="accessibility42" value="h" <?php if(strpos($emp->emp_accessibility, 'h') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Register New Labour</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">SPIM Renewal (Ext)</span></td>
  				  </tr>
    				<tr>
                      <td><div align="center">y</div></td>
    				  <td><input type="checkbox" name="accessibility7" value="y" <?php if(strpos($emp->emp_accessibility, 'y') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (Ext)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">p</div></td>
    				  <td><input type="checkbox" name="accessibility5" value="p" <?php if(strpos($emp->emp_accessibility, 'p') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Received by Corporate Services (Ext Received)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">w</div></td>
    				  <td><input type="checkbox" name="accessibility35" value="w" <?php if(strpos($emp->emp_accessibility, 'w') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">SPIM VDR</span></td>
  				  </tr>
    				<tr>
    				  <td><div align="center">z</div></td>
    				  <td><input type="checkbox" name="accessibility6" value="z" <?php if(strpos($emp->emp_accessibility, 'z') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (VDR)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">s</div></td>
    				  <td><input type="checkbox" name="accessibility11" value="s" <?php if(strpos($emp->emp_accessibility, 's') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Special update SPIM rights (CV Received)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">i</div></td>
    				  <td><input type="checkbox" name="accessibility36" value="i" <?php if(strpos($emp->emp_accessibility, 'i') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td><span class="style1">Finance Module</span></td>
  				  </tr>
    				<tr>
    				  <td><div align="center">a</div></td>
    				  <td><input type="checkbox" name="accessibility2" value="a" <?php if(strpos($emp->emp_accessibility, 'f') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Receipt Cancellation</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">u</div></td>
    				  <td><input type="checkbox" name="accessibility37" value="u" <?php if(strpos($emp->emp_accessibility, 'u') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>Edit</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td>&nbsp;</td>
    				  <td>&nbsp;</td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
                      <td>&nbsp;</td>
                      <td><span class="style1">General Access</span></td>
  				  </tr>
    				<tr>
    				  <td><div align="center">g</div></td>
    				  <td><input type="checkbox" name="accessibility12" value="g" <?php if(strpos($emp->emp_accessibility, 'g') !== false) echo "CHECKED"; ?> onclick="checkMe(this)"/></td>
    				  <td>View Only</td>
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
