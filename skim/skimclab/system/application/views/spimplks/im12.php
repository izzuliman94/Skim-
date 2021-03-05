<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
</style>
</head>
<body>
<table style="text-align: left; width: 700px;" align="center" cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <td rowspan="2">Bil</td>
    <td rowspan="2">Nama</td>
    <td rowspan="2">Tempat Lahir</td>
    <td rowspan="2">Tarikh Lahir</td>
    <td rowspan="2">Warganegara</td>
    <td>No.</td>
    <td>Tempat Dikeluarkan</td>
    <td>Sah Sehingga</td>
</tr>
<tr>
  <td colspan="3" align="center">Passport</td>
</tr>
<?php 

if($allFCLlampiran->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($allFCLlampiran->result() as $lampfcl){
?>
<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><?php echo $lampfcl->fcl_name; ?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_dob)); ?></td>
    <td><?php echo $lampfcl->fcl_bthplace; ?></td>
    <td><?php echo $lampfcl->nat_desc; ?></td>
    <td><?php echo $lampfcl->fcl_passno; ?></td>
    <td><?php echo $lampfcl->fcl_passissue; ?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_passexp)); ?></td>
</tr>
<?php 
}}
?>
</table>
</body>
