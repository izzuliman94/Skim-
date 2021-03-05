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
<h4><a href="addpayment">Payment Advice</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New VDR Payment </h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/savepaymentvdr">
<table  width="100%">
<tr>
    <td width="20%">Payment Advice No:</td>
	<td colspan="3"><input type="text" value="<auto generate>" readonly/></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="3"><input type="text" name="txtcreateddate" value="<?php echo date("d-M-Y") ?>" readonly/></td>
</tr>
<tr>
    <td>Company:</td>
	<td colspan="3"><input type="text" name="txtcompname" value="" size="60" /><font color="red">*</font>
	<input type="hidden" value="" name="id"/>
	<input type="button" value="..." onclick="opencontractor()"/></td>
</tr>
<tr>
    <td>Address1:</td>
	<td colspan="3"><input type="text" name="txtaddr1" value="" size="60" /></td>
</tr>
<tr>
    <td>Address2:</td>
	<td colspan="3"><input type="text" name="txtaddr2" value="" size="60" /></td>
</tr>
<tr>
    <td>Address3:</td>
	<td colspan="3"><input type="text" name="txtaddr3" value="" size="60" /></td>
</tr>
<tr>
    <td>Postcode</td>
	<td><input type="text" name="txtpcode" value="" size="30" /></td>
	<td>State</td>
	<td><input type="text" name="txtstate" value="" size="30" /></td>
</tr>
<tr>
    <td>Tel No</td>
	<td><input type="text" name="txttelno" value="" size="30" /></td>
	<td>Fax No</td>
	<td><input type="text" name="txtfaxno" value="" size="30" /></td>
</tr>
<tr>
    <td>Attention :</td>
	<td colspan="3"><input type="text" name="txtattn" value="" size="60"/></td>
</tr>
<tr>
   <td colspan="4" align="center"><input type="submit" value="Save" /></td>
</tr>
</table>
</form>
</body>
</html>
