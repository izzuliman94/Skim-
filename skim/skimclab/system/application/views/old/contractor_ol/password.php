<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body>

<h4><a href="dashboard.php">Contractor Online</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Password </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Change Password    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form action="<?php echo site_url('contLogin/editPasswordSubmit');?>" method="POST" name="login_info" id="login_info" onsubmit="return v.exec()">
	<table width="50%" border="0">
		<tr>
			<td>Current User</td>
			<td>:</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td id="t_password">New Password</td>
			<td width="5%">:</td>
			<td><input type="password" name="newpassword" maxlength="20"/></td>
		</tr>
		<tr>
			<td id="t_confirmedpass">Confirm new Password</td>
			<td>:</td>
			<td><input type="password" name="confirmedpass" maxlength="20"/></td>
		</tr>
		<tr>
			<input type="hidden" name="login_id" value="<?php echo $this->session->userdata('emp_id');?>" />
			<td colspan="3" align="center"><input type="submit" value=" Save " /></td>
		</tr>
	</table>
</form>
<script>
// form fields description structure
var a_fields = {
	'newpassword' : {'l':'Password','r':true,'f':'alphanum','t':'t_password'},
	'confirmedpass' : {'l':'Confirmed Password','r':true,'f':'alphanum','t':'t_confirmedpass', 'm':'newpassword'}
},
o_config = {
	'to_disable' : ['Submit'],
	'alert' : 1
}

// validator constructor call
var v = new validator('login_info', a_fields, o_config);

</script>
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
