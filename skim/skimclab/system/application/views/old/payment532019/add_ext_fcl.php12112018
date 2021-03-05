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
window.open(url, 'country list', 'height=500,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

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
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Payment Advise&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Add  EXT FCL</h4>
<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form method="post" name="addfcl" action="<?php echo site_url();?>/contPayment/savefclext" onsubmit="return v.exec();">
<table width="100%" border="1" style="border-collapse: collapse;" bordercolor="#ccc" cellpadding=3>
<tr>
    <td width="35%">Payment Advise No</td>
	<td colspan="3"><input type="text" name="txtpmno" value="<?php echo $pmno ?>"></td>
</tr>
<tr>
    <td width="35%" id="t_fcl">No Of FCL<font color="red">*</font></td>
	<td colspan="3"><input type="text" name="txtnofcl" size="5"></td>
</tr>
<tr>
    <td>Source Country</td>
	<td colspan="3"><input type="text" size="20" name="selcountry" readonly/>
	<input type="hidden" size="20" name="selid" readonly/>
	<input type="button" onclick="opencountrylist()" value="..." /></td>
</tr>
<tr>
    <td>Wages</td>
	<td width="23%"><input type="text" name="txtwages" value="0.00" size="20" readonly/></td>
    <td width="26%">Period</td>
	<td width="27%"><input type="text" name="txtperiod" value="0" size="20" readonly/></td>
</tr>
<tr>
  <td colspan="4"><div align="center">CLAB Processing Fee</div></td>
</tr>
<tr>
	<td>Admin Fees</td>
	<td><input type="text" name="txtadmin" value="0.00" size="20"/></td>
	<td >Green Card</td>
	<td><input type="text" name="txtgreen" value="0.00" size="20"/></td>
</tr>
<tr>
	<td colspan="4"><div align="center">Others</div></td>
</tr>
<tr>
	<td>Compound Company</td>
	<td><input type="text" name="txtcompoundcomp" value="0.00" size="20" /></td>
	<td>Special Pass</td>
	<td><input type="text" name="txtspecpass" value="0.00" size="20" /></td>
</tr>
<tr>
	<td>Others</td>
	<td><input type="text" name="txtothers" value="0.00" size="20"/></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td colspan="4"><div align="center">Extension Change Of Employers</div></td>
</tr>
<tr>
	<td>JIM Guarantee Amount</td>
	<td><input type="text" name="txtjim" value="0.00" size="20"/></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
    <td>PLKS</td>
	<td><input type="text" name="txtplks" size="20" value="0.00" readonly/></td>
    <td>Fees</td>
	<td><input type="text" name="txtfees" size="20" value="0.00" readonly/></td>
</tr>
<tr>
    <td>Visa</td>
	<td><input type="text" name="txtvisa" size="20" value="0.00" readonly/></td>
    <td>Levi</td>
	<td><input type="text" name="txtlevi" size="20"  value="0.00" readonly/></td>
</tr>
<tr>
    <td colspan="4"><div align="center">Insurance Premium</div></td>
</tr>
<tr>
	<td>Insurance Guarantee</td>
	<td><input type="text" name="txtig" value="0.00" size="20"/></td>
	<td>FWCS</td>
	<td><input type="text" name="txtfwcs" value="0.00" size="20"/></td>
</tr>
<tr>
	<td>FWHS</div></td>
	<td><input type="text" name="txtfwhs" value="0.00" size="20"/></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td colspan="4" align="center">FOMEMA Processing Fee</td>
</tr>
<tr> 
	<td>Medical</td>
	<td><input type="text" name="txtfomema" value="0.00" size="20"/></td>
	<td></td>
	<td></td>
</tr>
<tr>
    <td><input type="hidden" name="txtransit" value="0.00" size="20"/></td>
	<td><input type="hidden" name="txttransitfees" value="0.00" size="20" ></td>
    <td><input type="hidden" name="txttransitcost" value="0.00" size="20" ></td>
	<td>&nbsp;</td>
</tr>
<tr>
    <td colspan="4" align="center"><input type="submit" value="Save" /><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /></td>
</tr>
</table>


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