<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
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

.style1 {font-size: 18px}
.style2 {
	font-size: 14px;
	font-weight: bold;
}
</style>
</head>
<body>
<form name="frmidcard" method="post">
  <table width="49%" border="0" align="center" cellpadding="0">
    <tr style="border: none;">
      <th width="24%"align="left" bgcolor="#003399"  style="border: none;"><img src="<?php echo base_url();?>images/clab_logo.png" width="50" /></th>
      <th colspan="4"align="left" bgcolor="#003399" style="border: none;"><div align="center"><span class="style1">KAD PENDAFTARAN PEKERJA CLAB</span></div></th>
    </tr>
    <tr style="border: none;">
      <th align="CENTRE" style="border: none;"><?php echo $photoInfo; ?></th>
      <th width="1%" align="left" style="border: none;">&nbsp;</th>
      <th colspan="3" align="left" style="border: none;">&nbsp;</th>
    </tr>
    <tr style="border: none;">
      <td style="border: none;">&nbsp;</td>
      <td style="border: none;">&nbsp;</td>
      <th colspan="4" align="center" style="border: none;">&nbsp;</th>
    </tr>
    <tr style="border: none;">
      <td height="29" style="border: none;"><span class="style2">NAMA</span></td>
      <td colspan="2" font-size: 20px; style="border: none;">&nbsp;<strong>:<?php echo $labour->wkr_name ?></strong></td>
      <td width="31%" rowspan="4" style="border: none;"><img src="<?php echo base_url();?>images/qrclab.png" alt="" width="130" /></td>
    </tr>
    <tr>
      <td width="24%" height="31" style="border: none;">WARGANEGARA</td>
      <td colspan="2" style="border: none;">:<?php echo $labour->cty_desc ?></td>
    </tr>
    <tr >
      <td height="37" style="border: none;">NO PASSPORT</td>
      <td colspan="2" style="border: none;">:<?php echo $labour->wkr_passno ?></td>
    </tr>
    <tr>
      <td height="32" style="border: none;">TARIKH TAMAT PERMIT</td>
      <td colspan="2" style="border: none;">:<?php echo date('d/m/Y',strtotime($labour->wkr_permitexp)) ?></td>
    </tr>
  </table>
  <br />

</form>
</body>
</script>