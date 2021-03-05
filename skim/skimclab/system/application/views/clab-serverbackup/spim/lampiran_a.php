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
body form h5 {
	font-size: 10px;
}
body form {
	font-weight: bold;
}
body form {
	font-weight: normal;
}
</style>
</head>
<body>

<form>
<table style="text-align: left; width: 700px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td align="right">Lampiran A</td>
</tr>
<tr>
    <th align="center">LIST OF FCL</th>
</tr>
<tr>
    <td>Company Particular</td>
</tr>
</table>
<br />
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="5" align="center">New Employer/Proposer (Transfer to)</td>
</tr>
<tr>
    <th align="center">Name & Correspondence Address</th>
    <th align="center">Business Registration No</th>
    <th align="center">Business / Occupation</th>
    <th align="center">Tel. No.</th>
    <th align="center">Fax. No.</th>
</tr>
<tr>
    <td align="center">
    CONSTRUCTION LABOUR EXCHANGE CENTRE BHD <br />
    LEVEL 2, ANNEXE BLOCK MENARA MILENIUM NO 8 <br />
    JLN DAMANLELA  BUKIT DAMANSARA, 50490 KUALA LUMPUR 
    </td>
    <td align="center">634396-W</td>
    <td align="center">BUILDING<br />CONSTRUCTION</td>
    <td align="center">03-20959599</td>
    <td align="center">03-20959566</td>
</tr>
</table>
<br />
<table style="text-align: left; width: 700px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td>Workers Particular</td>
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
    <th>Next Of Kin</th>
    <th>Relationship</th>
    <th>Work Trade</th>
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
    <td><?php echo $lampfcl->fcl_next_of_kin;?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
    <td><?php echo $lampfcl->trade_desc ?></td>
    <td><?php echo $lampfcl->cty_period ?></td>    
</tr>
<?php 
}}
?>
</table>
<br />
<br />
<table style="text-align: left; width: 700px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <th width="30%" align="center">Prepared by</th>
    <th width="30%" align="center">Verified by</th>
    <th width="30%" align="center">Approved by</th>
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
    <td width="30%" align="center"><?php echo $woRow->emp_name?></td>
    <td width="30%" align="center">NAZATUL AKMAR ABDUL HALIM</td>
    <td width="30%" align="center">ABDUL RAFIK B ABD RAJIS</td>
</tr>
<tr>
    <td width="30%" align="center"><?php echo $woRow->emp_position ?></td>
    <td width="30%" align="center">Deputy Head Of Corporate Services</td>
    <td width="30%" align="center">Chief Executive Officer</td>
</tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>Nama Company :<?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>Workorder No :<?php echo $lampiran->wo_num?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>OR NO : <?php echo $lampiran->pay_refno?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>PIC : <?php echo $lampiran->wo_personincharge ?></td>
</tr>
</table>

</form>
</body>