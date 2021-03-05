<?php
if ($excel == "excel"){
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=FCLByWorkTrade.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
  <title>SKIM - REPORTS</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/sippsstyle.css" />
</head>

<body>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td class="print" colspan="3" align="CENTER"><b><?php echo $reportTitle;?></b></td>
	</tr>
	<tr>
		<td colspan="3" class="print" align="RIGHT"><?php echo date('j F Y');?></td>
	</tr>
	<tr>
		<th align="CENTER" width="10%">No.</th>
		<th align="CENTER" width="65%">TRADE</th>
		<th align="CENTER" width="25%">FCLs</th>
	</tr>
	<?php echo $fclListCodes;?>
</table>
<table width="100%" border="0">
	<tr>
	 	<td align="CENTER" class="print">
	 		<input type="button" name="printList" value=" Print List " onclick="window.print();"/>
	 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
	 	</td>
	 </tr>
</table>
</body>
</html>
