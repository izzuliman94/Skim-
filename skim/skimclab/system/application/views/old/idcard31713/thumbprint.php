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

<table width="50%" align="center" border="1">
<tr style="border: none;">
	<td width="20%" valign="top" style="border: none;"><img width="70" height="50"src="<?php echo base_url();?>images/logoLetter.jpg" /></td>
    <th width="60%" align="center" style="border: none;">DATA PEKERJA ASING BINAAN<br />CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD<br />(CLAB)</th>
   	<td width="20%" align="right" valign="top" style="border: none;">Corporate Support Dept</td>	
</tr>
<tr height="150">
  <td align="center" valign="middle" style="border: none;"><img src="<?php echo base_url();?>images/thumbprint.png" /></td>
  <td style="border: none;" valign="top">
  	<table border="0" style="width: 100%" style="border: none;">
  		<tr>
  			<td width="30%" height="30px">&nbsp;NAMA PEKERJA</td>
  			<td width="1%">:</td>
  			<td width="79%"><b><?php echo $labour->wkr_name ?></b></td>
  		</tr> 
  		<tr>
  			<td height="30px">&nbsp;NO. PASSPORT</td>
  			<td>:</td>
  			<td><b><?php echo $labour->wkr_passno ?></b></td>
  		</tr>
  		<tr>
  			<td height="30px">&nbsp;WARGANEGARA</td>
  			<td>:</td>
  			<td><b><?php echo $labour->cty_desc ?></b></td>
  		</tr>
		<tr>
  			<td height="30px">&nbsp;TARIKH TIBA</td>
  			<td>:</td>
  			<td><b></b></td>
  		</tr>
		<tr>
  			<td height="30px">&nbsp;NAMA SYARIKAT</td>
  			<td>:</td>
  			<td><b></b></td>
  		</tr>

  	</table>
  </td>
  <td align="center" valign="middle" style="border: none;"><img src="<?php echo base_url();?>images/thumbprint.png" /></td>
</tr>
<tr>
  <td colspan="3" align="left" style="border: none;">&nbsp;PEGAWAI PENERIMA DIPINTU MASUK : </td>
</tr>
<tr>
  <td colspan="3" align="left" style="border: none;">&nbsp;TARIKH : </td>
</tr>
<tr>
  <td colspan="3" align="left" style="border: none;"></td>
</tr>
<tr>
  <td colspan="3" align="center" style="border: none;">Maklumat ini adalah hak Construction Labour Exchange Centre Berhad (CLAB)<br />Tidak boleh diguna pakai oleh pihak lain kecuali dengan keizinan CLAB</td>
</tr>

</table>
<br />

</form>
</body>
