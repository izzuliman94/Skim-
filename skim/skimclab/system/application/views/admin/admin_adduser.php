<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url() ?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/switchcontent.js" >

/***********************************************
* Switch Content script- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
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
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style3 {color: #0000FF; font-weight: bold; }
-->
</style>
</head>

<body>

<h4> <a href="admin_dashbrd.php">System administration</a>  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" /> Add User </h4>

<h2> Add User </h2>

<div><a href="javascript:admindashbrd.sweepToggle('contract')">Contract All</a> | <a href="javascript:admindashbrd.sweepToggle('expand')">Expand All</a></div>

<h3 id="admindashbrd1-title" class="handcursor">New User<img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="admindashbrd1" class="switchgroup1">
  <form action="<?php echo site_url('contAdmin/newUserSubmit');?>" method="POST" name="user_info" id="user_info"  onsubmit="return v.exec()">
    <table width="100%" border="0">
    	<tr>
    		<th colspan="4" align="left">Employee Form</th>
    	</tr>
      	<tr>
      		<td width="20%" id="t_employeeno">EmployeeNo</td>
      		<td width="30%"><input type="text" name="employeeno" size="10"/> <font color="red">*</red></td>
      		<td width="20%" id="t_department">Department</td>
      		<td width="30%"><select name="department">
      							<option value=""></option>
      							<?php foreach($allDepartments->result() as $department){
      							?>
      							<option value="<?php echo $department->dpt_id;?>"><?php echo $department->dpt_name; ?></option>
      							<?php
      							}
      							?>
      						</select> <font color="red">*</red>
      		</td>
      	</tr>
      	<tr>
      		<td id="t_name">Name</td>
      		<td><input type="text" name="name" maxlength="100" size="40"/> <font color="red">*</red></td>
      		<td>Designation</td>
      		<td><input type="text" name="designation" maxlength="50" /></td>
      	</tr>
      	<tr>
      		<td>Office Location</td>
      		<td><input type="text" name="location" maxlength="100" size="40"/></td>
      		<td>Hand Phone</td>
      		<td><input type="text" name="handphone" maxlength="50" /></td>
      	</tr>
      	<tr>
      		<td>Work Phone</td>
      		<td><input type="text" name="workphone" maxlength="50" /></td>
      		<td>Extension</td>
      		<td><input type="text" name="extension" maxlength="50" size="10"/></td>
      	</tr>
      	<tr>
      		<td>House Phone</td>
      		<td><input type="text" name="housephone" maxlength="50" /></td>
      		<td>Fax No.</td>
      		<td><input type="text" name="fax" maxlength="50" /></td>
      	</tr>
      	<tr>
      		<td>Email</td>
      		<td><input type="text" name="email" maxlength="80" size="40"/></td>
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
    				  <td><span class="style3">Code</span></td>
    				  <td><span class="style3">Access</span></td>
  				  </tr>
    				
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility38" value="1" onclick="checkMe(this)"/> 
    				    Acknowledgement
</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility17" value="1" onclick="checkMe(this)"/>
Contractor</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility18" value="2" onclick="checkMe(this)"/>
Labour</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility19" value="3" onclick="checkMe(this)"/>
Local Transfer</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility20" value="T" onclick="checkMe(this)"/>
SPIM (Transit Centre)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility39" value="1" onclick="checkMe(this)"/>
G1-G3 </td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility21" value="4" onclick="checkMe(this)"/>
SPIM (VDR)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility22" value="F" onclick="checkMe(this)"/>
SPIM (First Year Renewal)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility23" value="A" onclick="checkMe(this)"/>
SPIM (Renewal)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility40" value="1" onclick="checkMe(this)"/>
SPIM (GreenCard)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility24" value="B" onclick="checkMe(this)"/>
Finance</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility36" value="I" onclick="checkMe(this)"/> 
    				    Invoice</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility25" value="L" onclick="checkMe(this)"/>
Legal</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility26" value="H" onclick="checkMe(this)"/>
Local Labour</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility27" value="C" onclick="checkMe(this)"/>
Clab ID Card</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility28" value="5" onclick="checkMe(this)"/>
Reports</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility29" value="M" onclick="checkMe(this)"/>
ICT Reports</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility30" value="P" onclick="checkMe(this)"/>
ICT Passport Management</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility" value="6" onclick="checkMe(this)"/>
Administration
  <input type="hidden" name="accStr" /></td>
  				  </tr>
    			</table>
    		</td>
    		<td colspan="2">
    			<table width = "90%" align="center" border="1">
    				<tr>
    					<td colspan="2" id="t_login">Login ID</td>
    					<td width="79%"><input type="text" name="login" maxlength="100" /> <font color="red">*</font></td>
    				</tr>
    				<tr>
    					<td colspan="2" id="t_password">Password</td>
    					<td><input type="password" name="password" maxlength="100" /> <font color="red">*</font></td>
    				</tr>
    				<tr>
    					<td colspan="2">&nbsp;</td>
    					<td>&nbsp;</td>
    				</tr>
    				<tr>
    					<th align="left" colspan="3">Authorization Level</th>
    				</tr>
    				<tr>
    				  <td><span class="style3">Code</span></td>
    				  <td><span class="style3">Access</span></td>
    				  <td><span class="style3">Modules</span></td>
  				  </tr>
    				<tr>
    				  <td width="10%">&nbsp;</td>
    				  <td width="11%">&nbsp;</td>
    				  <td><span class="style1">Labour Module</span></td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility2" value="9" onclick="checkMe(this)"/></td>
    				  <td>Delete (Delete Media And Record)</td>
  				  </tr>
    				<tr>
    					<td><div align="center"></div></td>
    					<td><input type="checkbox" name="accessibility5" value="l" onclick="checkMe(this)"/></td>
    					<td>Create New Labour (New Labour Registration)</td>
   				  </tr>
    				<tr>
    				  <td><div align="center">q</div></td>
    				  <td><input type="checkbox" name="accessibility31" value="l" onclick="checkMe(this)"/></td>
    				  <td>Change Status</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">r</div></td>
    				  <td><input type="checkbox" name="accessibility32" value="l" onclick="checkMe(this)"/></td>
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
                      <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility14" value="7" onclick="checkMe(this)"/></td>
    				  <td>Verification ( New Contractor Verification)</td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility15" value="8" onclick="checkMe(this)"/></td>
    				  <td>Approve/Reject ( New Contractor Approval)</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility4" value="c" onclick="checkMe(this)"/></td>
    				  <td>Create New Contractor (New Contractor Registration)</td>
  				  </tr>
    				<tr>
                      <td><div align="center">o</div></td>
    				  <td><input type="checkbox" name="accessibility13" value="o" onclick="checkMe(this)"/></td>
    				  <td>Open Blacklist</td>
  				  </tr>
    				<tr>
    				  <td><div align="center">m</div></td>
    				  <td><input type="checkbox" name="accessibility33" value="m" onclick="checkMe(this)"/></td>
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
    				  <td><span class="style1">SPIM VDR/Renewal Module</span></td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility16" value="p" onclick="checkMe(this)"/></td>
    				  <td>Special Permit Renewal rights</td>
  				  </tr>
    				<tr>
                      <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility10" value="s" onclick="checkMe(this)"/></td>
    				  <td>Special update SPIM rights</td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility3" value="n" onclick="checkMe(this)"/></td>
    				  <td>Create New Workorder </td>
  				  </tr>
    				<tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility6" value="z" onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (VDR)</td>
  				  </tr>
				    <tr>
				      <td>&nbsp;</td>
				      <td>&nbsp;</td>
				      <td>&nbsp;</td>
			      </tr>
			      <tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility7" value="y" onclick="checkMe(this)"/></td>
    				  <td>Verification Of Spim (Renewal)</td>
  				  </tr>
				   <tr>
    				  <td><div align="center"></div></td>
    				  <td><input type="checkbox" name="accessibility8" value="x" onclick="checkMe(this)"/></td>
    				  <td>Verification Of Finance</td>
  				  </tr>
				   <tr>
				     <td><div align="center"></div></td>
				     <td><input type="checkbox" name="accessibility9" value="v" onclick="checkMe(this)"/></td>
				     <td>Approval Of Spim (VDR & Renewal)</td>
			      </tr>
			       <tr>
			         <td><div align="center">k</div></td>
			         <td><input type="checkbox" name="accessibility34" value="k" onclick="checkMe(this)"/></td>
			         <td>Edit</td>
		          </tr>
			       <tr>
                     <td><div align="center">i</div></td>
			         <td><input type="checkbox" name="accessibility37" value="i" onclick="checkMe(this)"/></td>
			         <td>Edit</td>
		          </tr>
			       <tr>
                     <td><div align="center">j</div></td>
			         <td><input type="checkbox" name="accessibility37" value="j" onclick="checkMe(this)"/></td>
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
		             <td><div align="center">f</div></td>
		             <td><input type="checkbox" name="accessibility11" value="f" onclick="checkMe(this)"/></td>
		             <td>Receipt Cancellation</td>
	              </tr>
	               <tr>
	                 <td><div align="center">u</div></td>
	                 <td><input type="checkbox" name="accessibility35" value="u" onclick="checkMe(this)"/></td>
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
                     <td><div align="center">w</div></td>
                     <td><input type="checkbox" name="accessibility12" value="w" onclick="checkMe(this)"/></td>
                     <td>View Only</td>
                   </tr>
    			</table>
   		  </td>
    	</tr>
    	<tr>
    		<td colspan="4" align="center">
    			<input type="submit" name="Save" value="Save" onclick="return confirm('Are you sure you want to save?');"/> &nbsp;
    			<input type="button" name="btnBack" value="Back" onclick="history.back();"/>
    		</td>
    	</tr>
    </table>
  </form>
</div>
<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'employeeno': {
			'l': 'Employee No',  // label
			'r': true,    // required
			't': 't_employeeno'// id of the element to highlight if input not validated
		},
		'department':{'l':'department','r':true,'t':'t_department'},
		'name':{'l':'Name','r':true,'t':'t_name'},
		'login':{'l':'Login ID','r':true,'t':'t_login'},
		'password':{'l':'Password','r':true,'t':'t_password'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('user_info', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
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
