<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url() ?>css/sippsstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body onload="fillCategory();">

<h2> Change Password </h2>
<br />
<?php echo $status;?>
<form action="<?php echo site_url();?>/contLogin/editPasswordSubmit" method="POST" name="login_info" id="login_info" onsubmit="return v.exec()">
	<table width="50%" border="0">
		<tr>
			<td>Current User</td>
			<td>:</td>
			<td><?php echo $this->session->userdata('username');?></td>
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
</body>
</html>