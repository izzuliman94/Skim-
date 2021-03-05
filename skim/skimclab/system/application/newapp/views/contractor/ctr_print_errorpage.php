<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
</head>

<body>

<h4>Contractors<img src="<?php echo base_url();?>images/right_arrow.gif" width="13" height="14" /> Print Letter </h4>
Company Name: <strong><?php echo $ctr->ctr_comp_name;?></strong><br />
CLAB No.: <strong><?php echo $ctr->ctr_clab_no;?></strong>
<p>
<font color="red"><?php echo $errorMsg;?></font>
</p>
<br />
<form method="POST" action="" name="errorForm">
<input type="button" name="btnClose" value="Close" onClick="window.close();" />
</form>

</body>
</html>