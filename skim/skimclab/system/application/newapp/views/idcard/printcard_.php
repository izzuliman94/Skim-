<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}

table {
    border: 1px solid black;
    width:40%;
}
/*table tr {
    border: none;
}
table th {
    border: none;
}*/

</style>
</head>
<body>
<form name="frmidcard" method="post">

<table width="45%" align="center" border="1">
<tr style="border: none;">
    <th colspan="3" align="center" style="border: none;">KAD PERDAFTARAN PERSONAL BINAAN</th>	
</tr>
<tr style="border: none;">
  <td style="border: none;">&nbsp;</td>
  <td style="border: none;">&nbsp;</td>
  <td width="18%" rowspan="5" style="border: none;"><?php echo $photoInfo; ?></td>
</tr>
<tr>
    <td width="21%" style="border: none;">K.P/Passport</td>
	<td width="61%" style="border: none;">:&nbsp;<?php echo $labour->wkr_passno ?></td>
    </tr>
<tr >
    <td style="border: none;">Warganegara</td>
	<td style="border: none;">:&nbsp;<?php echo $labour->cty_desc ?></td>
    </tr>
<tr>
    <td style="border: none;">Sah Sehingga</td>
	<td style="border: none;">:&nbsp;<?php echo date('d/m/Y',strtotime($labour->wkr_passexp)) ?></td>
    </tr>
<tr height="100">
  <td style="border: none;">&nbsp;</td>
  <td style="border: none;">&nbsp;</td>
  </tr>
<tr>
  <th colspan="3" align="center" style="border: none;"><?php echo $labour->wkr_name ?></th>
  </tr>
</table>
<br />

</form>
</body>
</script>