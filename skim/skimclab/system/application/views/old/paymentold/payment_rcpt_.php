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
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script>
function opencontractor(){

var url = "<?php echo site_url('contPayment/ctr_list');?>"
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

}
</script>
</head>
<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Payment Receipt</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Payment </h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/savepayment">
<table  width="100%">
<tr>
    <td width="20%">Official Receipt No. :</td>
	<td colspan="3"><input type="text" value="<auto generate>" readonly/></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="3"><input type="text" name="txtcreateddate" value="<?php echo date("d-M-Y") ?>" readonly/></td>
</tr>

<tr>
    <td>Received From</td>
	<td colspan="3"><input type="text" name="txtrecfrom" value="" size="60" /></td>
</tr>
<tr>
    <td>Address:</td>
	<td colspan="3">
	<textarea name="txtaddr1" ssize="60" height="4" style="width: 363px"></textarea></td>
</tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr>
	<td colspan="4">
		<TABLE  border="1" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="80000">
			<tr>
				<td width="15%" align="center" height="35px">&nbsp;CHEQUE NO.</td>
				<td width="15%" align="center">PAYMENT TO</td>
				<td width="30%" >DESCRIPTION OF PAYMENT</td>
				<td width="20%" align="center">PA NO.</td>
				<td width="20%" align="center">AMOUNT (RM)</td>
			</tr>
			<tr>
				<td height="30px" align="center"><input type="text" name="txtchqclab" value="" size="20" /></td>
				<td align="center">CLAB</td>
				<td>
					<input type="checkbox" name="txtadmfees" value="" />&nbsp;ADMIN FEES
					<input type="checkbox" name="txtadmin" value="" />&nbsp;ADMINISTRATION
					<input type="checkbox" name="txtrefund" value="" />&nbsp;REFUND LEVY
				</td>
				<td align="center"><input type="text" name="txtpaclab" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtclab" value="" size="20" /></td>
			</tr>
			<tr>
				<td height="30px" align="center"><input type="text" name="txtchqjim" value="" size="20" /></td>
				<td align="center">JIM</td>
				<td>
					<input type="checkbox" name="txtjimplks" value="" />&nbsp;PLKS
					<input type="checkbox" name="txtjimfees" value="" />&nbsp;FEES
					<input type="checkbox" name="txtjimvisa" value="" />&nbsp;VISA
					<input type="checkbox" name="txtjimfees" value="" />&nbsp;LEVY
					<input type="checkbox" name="txtjimsp" value="" />&nbsp;SP
				</td>
				<td align="center"><input type="text" name="txtpajim" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtjim" value="" size="20" /></td>
			</tr>
			<tr>
				<td height="30px" align="center">&nbsp;<input type="text" name="txtchqfomema" value="" size="20" /></td>
				<td align="center">FOMEMA</td>
				<td>
					<input type="checkbox" name="txtmale" value="" />&nbsp;MALE
					<input type="checkbox" name="txtfemale" value="" />&nbsp;FEMALE
				</td>
				<td align="center"><input type="text" name="txtpafomema" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtfomema" value="" size="20" /></td>
			</tr>
			<tr>
				<td height="30px" align="center">&nbsp;<input type="text" name="txtchqins" value="" size="20" /></td>
				<td align="center">INSURANCE</td>
				<td>
					<input type="checkbox" name="txtig" value="" />&nbsp;IG
					<input type="checkbox" name="txtFWCS" value="" />&nbsp;FWCS
				</td>
				<td align="center"><input type="text" name="txtpains" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtins" value="" size="20" /></td>
			</tr>
			<tr>
				<td height="30px" align="center"><input type="text" name="txtchqagency" value="" size="20" /></td>
				<td align="center">AGENCY FEES</td>
				<td>
					<input type="checkbox" name="txtagencyfees" value="" />&nbsp;FEES
				</td>
				<td align="center"><input type="text" name="txtpafomema" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtfomema" value="" size="20" /></td>
			</tr>
			<tr>
				<td height="30px" align="center"><input type="text" name="txtchqothr" value="" size="20" /></td>
				<td align="center">OTHERS</td>
				<td>
					<input type="checkbox" name="txtagencyfees" value="" />&nbsp;FEES
				</td>
				<td align="center"><input type="text" name="txtpaothr" value="" size="20" /></td>
				<td align="center"><input type="text" name="txtamtothr" value="" size="20" /></td>
			</tr>
			
		</table>
	</td>
</tr>
<tr><td colspan="4"></td></tr>
<tr>
   <td colspan="4" align="center"><input type="submit" value="Save" /></td>
</tr>
</table>
</form>
</body>
</html>
