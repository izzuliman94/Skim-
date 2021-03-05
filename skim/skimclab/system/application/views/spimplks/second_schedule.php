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

<form>
<table style="text-align: left; width: 700px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="right">SECOND SCHEDULE</td>
</tr>
<tr>
    <th align="center">LIST OF FCL</th>
</tr>
</table>
<br />
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr align="center">
    <th>No</th>
    <th>Name</th>
    <th>Passport No</th>
    <th>Nationality</th>
    <th>Sex</th>
    <th>Date of Birth</th>
    <th>Work Trade</th>
	<th>Next Of Kin</th>
	<th>Relationship</th>
	<th>PLKS No.</th>
    <th>Salary</th>
    <th>Duration</th>
</tr>
<?php 

if($allFCLlampiran->num_rows() == 0){ 

?>
<tr align="center">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
</tr>
<?php
}else{
$i = 1;
foreach($allFCLlampiran->result() as $lampfcl){
?>
<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><?php echo $lampfcl->fcl_name; ?></td>
    <td><?php echo $lampfcl->fcl_passno; ?></td>
    <td><?php echo $lampfcl->nat_desc; ?></td>
    <td><?php if($lampfcl->fcl_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_dob)); ?></td>
    <td><?php echo $lampfcl->trade_desc; ?></td>
	<td><?php echo $lampfcl->fcl_next_of_kin; ?></td>
	<td><?php echo $lampfcl->fcl_relationship; ?></td>
	<td><?php echo $lampfcl->fcl_plksno; ?></td>
    <td><?php echo $lampfcl->fcl_salary; ?></td>
    <td><?php echo $lampfcl->cty_period ?></td>    
</tr>
<?php 
}}
?>
</table>
<br />
</form>
</body>