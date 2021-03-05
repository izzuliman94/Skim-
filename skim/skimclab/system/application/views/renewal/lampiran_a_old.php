<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
</style>
</head>
<body>
Company Particular
<form>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="5" align="center">New Employer/Proposer (Transfer to)</td>
</tr>
<tr>
    <td align="center">Name & Correspondence Address</td>
    <td align="center">Business Registration No</td>
    <td align="center">Business / Occupation</td>
    <td align="center" width="10%">Tel. No.</td>
    <td align="center" width="10%">Fax. No.</td>
</tr>
<tr>
    <td align="center">
	<?php echo $lampiran->ctr_comp_name; ?><br />
	<?php echo $lampiran->ctr_addr1; ?><br />
	<?php echo $lampiran->ctr_addr2; ?><br />
    <?php echo $lampiran->ctr_addr3; ?><br />
    <?php echo $lampiran->ctr_pcode; ?>,<?php echo $lampiran->state_name; ?>
    </td>
    <td align="center"><?php echo $lampiran->ctr_comp_regno; ?></td>
    <td align="center"><?php echo $cat; ?></td>
    <td align="center"><?php echo $lampiran->ctr_telno; ?></td>
    <td align="center"><?php echo $lampiran->ctr_fax; ?></td>
</tr>
</table>
Workers Particular
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td>No</td>
    <td>Name</td>
    <td>Passport No</td>
    <td>Nationality</td>
    <td>Sex</td>
    <td>Date of Birth</td>
    <td>Work Trade</td>
    <td>Duration</td>
</tr>
<?php 

if($allFCLlampiran->num_rows() == 0){ 

?>
<tr>
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
<tr>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
</tr>
<?php 
}}
?>
</table>
<br />
<br />
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="30%" align="center">Prepared by</td>
    <td width="30%" align="center">Verified by</td>
    <td width="30%" align="center">Approved by</td>
</tr>
<tr>
    <td colspan="3" height="80">&nbsp;</td>
</tr>
<tr>
    <td width="30%" align="center">..............................................</td>
    <td width="30%" align="center">..............................................</td>
    <td width="30%" align="center">..............................................</td>
</tr>
<tr>
    <td width="30%" align="center">ERNIE YOSITA BT HUSSIN</td>
    <td width="30%" align="center">NAZATUL AKMAR ABDUL HALIM</td>
    <td width="30%" align="center">&nbsp;</td>
</tr>
<tr>
    <td width="30%" align="center">Corporate Services Specialist</td>
    <td width="30%" align="center">Deputy Head Of Corporate Services</td>
    <td width="30%" align="center">O.b : Chief Executive Officer</td>
</tr>

</table>
</form>
</body>