<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
	background-color:#CCCCCC
	
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
	
}
.style2 {
	font-size: 14px;
	font-weight: bold;
}
.style4 {font-weight: bold}
</style>
</head>
<table width="77%" border="0" align="center" cellpadding="0" cellspacing="1" style="text-align: justify; width: 80%;">
<tr>
    <td width="658" align='left' >Our Ref : <?php echo $woRow->wo_agg_no ?></td>
</tr>

<tr>
  <td align='left' >&nbsp;</td>
</tr>
<tr>
  <td align='left' >Date : <?php echo date('j F Y');?></td>
</tr>
<tr>
  <td align='left' >&nbsp;</td>
</tr>
<tr>
  <td align='left' ><b><?php echo $woRow->ctr_comp_name;?></b></td>
</tr>
<tr>
  <td align='left' ><?php echo $woRow->ctr_addr1; ?></td>
</tr>
<tr>
  <td align='left' ><?php echo $woRow->ctr_addr2; ?></td>
</tr>
<tr>
  <td align='left' ><?php echo $woRow->ctr_pcode; ?><?php echo $woRow->ctr_addr3; ?></td>
</tr>
<tr>
  <td align='left' ><?php echo $woRow->state_name; ?></td>
</tr>
<tr>
  <td align='left' ></td>
</tr>

<tr>
    <td align='left'><p class="style2">NOTIFICATION  OF NAME LIST OF FCL </p></td>
</tr>
<tr>
   
</tr>
<tr>
  <td height="20">
    <p>The  above matter refers. </p>  </td>
</tr>
<tr>
  
</tr>
<tr>
  <td height="20"><p>This  is a Notification for <strong><?php echo $woRow->ctr_comp_name;?></strong> (Employer) which had applied for <strong><?php echo $woRow->wo_fcl_total;?></strong> foreign workers from <span class="print style4">
    <?php  echo $woRow->cty_desc;?>
  </span>. </p></td>
</tr>
<tr>

</tr>
<tr>
  <td height="20"><p>This  Notification shall be and is incorporated and shall read together with the  Agreement for the Supply of Foreign Construction Labour between&nbsp; Construction Labour Exchange Centre Berhad and  <strong><?php echo $woRow->ctr_comp_name;?></strong> (Employer). </p></td>
</tr>
<tr>

</tr>
<tr>
  <td style="height: 20px">Below is the additional list of name of the  Foreign workers:- .</td>
</tr>
<tr>
   
</tr>
</table>
<br />
<table style="text-align: left; width: 80%;" align="center" cellpadding="3" cellspacing="0" border="1">
<tr align="center">
    <th>No</th>
    <th>Name</th>
    <th>Passport No</th>
    <th>Nationality</th>
    <th>Sex</th>
    <th>Date of Birth</th>
    <th>Work Trade</th>
    <th>Wages</th>
    <th>Duration</th>
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
    <td><?php echo $lampfcl->fcl_salary;?></td>
    <td><?php echo $lampfcl->cty_period ?></td>    
</tr>
<?php 
}}
?>
</table>
<br />
<table width="1035" border="0" align="center" cellpadding="0" cellspacing="0"  style="text-align: justify; width: 80%;">
<tr>
    <td colspan="2" height="20"><p>These  additional name list shall be made valid as they are included as part of the Agreement.  Other terms and conditions of the Agreement remain the same.</p></td>
</tr>
<tr>
    
</tr>
<tr>
  <td colspan="2" height="20"><p>Yours  faithfully, </p></td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
    <td width="515">_________________________________</td>
    <td width="520">&nbsp;</td>
</tr>
<tr>
    <td height="20"> <strong>CHIEF EXECUTIVE OFFICER</strong></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td><strong>ABDUL RAFIK BIN ABD RAJIS</strong></td>
    <td>&nbsp;</td>
</tr>
</table>
