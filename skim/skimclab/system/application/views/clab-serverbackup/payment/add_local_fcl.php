<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
<script>

function opencountrylist(){

   var url = "<?php echo site_url('contPayment/opencountrylist');?>";
window.open(url, 'country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

}

//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
		

</script>
</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Payment Advise&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Add  Local Worker</h4>
<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form method="post" name="addfcl" action="<?php echo site_url();?>/contPayment/savefcllocal" onsubmit="return v.exec();">
<table width="90%">
<tr>
    <td width="35%">Payment Advise No</td>
	<td colspan="3"><input type="text" name="txtpmno" value="<?php echo $pmno ?>"></td>
</tr>
<tr>
  <td colspan="4" ><div align="center"><strong>Disbursement</strong></div></td>
  </tr>
<tr>
  <td id="t_fcl7">Disbursement : No of Job Listing</td>
  <td colspan="3"><input type="text" name="txtnolist" size="5" /></td>
</tr>
<tr>
  <td id="t_fcl2">Advertising</td>
  <td colspan="3"><input type="text" name="txtadv" value="50.00" size="20" readonly="readonly"/></td>
</tr>
<tr>
  <td colspan="4"><div align="center"><strong>Reimbursement</strong></div></td>
  </tr>
<tr>
  <td id="t_fcl4">Reimbursement : No Of Local Worker<font color="red">*</font></td>
  <td colspan="3"><input type="text" name="txtnofcl" size="5" /></td>
</tr>
<tr>
  <td id="t_fcl3">1. Phone &amp; Fax Expenses</td>
  <td width="23%"><input type="text" name="txtphone" value="15.00" size="20" readonly="readonly"/></td>
  <td width="26%">4. Data Searching</td>
  <td width="27%"><input type="text" name="txtdata" value="30.00" size="20" /></td>
</tr>
<tr>
    <td width="35%" id="t_fcl">2. Travelling Expenses</td>
	<td><input type="text" name="txtravel" value="70.00" size="20" readonly/></td>
    <td>5. Photocopy &amp; Printing</td>
    <td><input type="text" name="txtpho" value="35.00" size="20" /></td>
</tr>
<tr>
  <td>3. Interview Arrangement</td>
  <td><input type="text" name="txtint" value="50.00" size="20"/></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td colspan="3"><input type="hidden" size="20" name="selcountry" readonly/></td>
</tr>
<tr>
    <td colspan="4" align="center"><input type="submit" value="Save" /><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /></td>
</tr>
</table>
<input type="hidden" name="txttransitfees" value="0.00" size="20" >
<input type="hidden" name="txttransitcost" value="0.00" size="20" >
</form>
</body>
 <!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtnofcl': {
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('addfcl', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->

</html>