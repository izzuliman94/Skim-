<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
</head>
<script>
function openvdr(){

var url = "<?php echo site_url('contPayment/openvdr');?>"
		window.open(url,"_self");
}

</script>
<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="newpayment.php">Payment Advice</a></h4>
<table align="center" width="100%">
<tr height="100">
    <td align="center"><input type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VDR Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"  onclick="openvdr()"></td>
</tr>
<tr>
    <td align="center"><input type="button" value="Extension Payment" width="200"/></td>
</tr>

</table>
</body>
</html>
