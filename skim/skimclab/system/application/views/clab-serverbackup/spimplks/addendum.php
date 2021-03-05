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
.style1 {
	font-size: 13px;
	font-weight: bold;
}
</style>
</head>
<table width="77%" border="0" align="center" cellpadding="0" cellspacing="1" style="text-align: justify; width: 80%;">
<tr>
    <td width="658" align='left' style="font-size:9px"><?php echo $woRow->wo_agg_no ?></td>
</tr>

<tr>
  <td align='left' height="30">&nbsp;</td>
</tr>

<tr>
    <td align='center'><span class="style1">ADDENDUM FOR THE SUPPLY OF FOREIGN CONSTRUCTION LABOUR</span></td>
</tr>
<tr>
   <td><p>&nbsp;</p></td>
</tr>
<tr>
  <td height="20"><div align="justify">This is an Addendum to the Agreement for the Supply of Foreign Construction Labour entered into on
      <input type="text" name="txtfield2" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" />
between   Construction Labour Exchange Centre Berhad (CLAB)</div></td>
</tr>
<tr>
  <td height="20"><span style="height: 20px">and <u><?php echo $woRow->ctr_comp_name;?></u> (Employer).</span></td>
</tr>
<tr>
  <td style="height: 20px">This Addendum shall be and is incorporated into the Agreement for the Supply of Foreign Construction Labour dated&nbsp;
    <input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" />
between CLAB and Employer.</td>
</tr>
<tr>
   <td style="height: 20px"></td>
</tr>
<tr>
   <td height="20">May it be known that the undersigned parties, for good consideration, do hereby agree to make the additions that are outlined below. </td>
</tr>
<tr>
   <td height="20">&nbsp;</td>
</tr>
<tr>
   <td height="20">a.&nbsp;&nbsp;&nbsp; List of the name of the Foreign Workers </td>
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
    <td colspan="2" height="20">These additions shall be made valid as they are included as past of the original Agreement for the Supply of the Foreign Construction Labour. No other terms or conditions of the above mentioned contract shall be negated or changed as a result of this here stated addendum.</td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
  <td colspan="2" height="20">The Agreement shall continue in full force and effect, as amended herein. IN WITNESS WHERE OF, the parties hete to have executed this Agreement.</td>
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
    <td width="520">__________________________________</td>
</tr>
<tr>
    <td height="20"> CHIEF EXECUTIVE OFFICER</td>
    <td>NAME(DIRECTOR) :___________________</td>
</tr>
<tr>
    <td>ABD RAFIK ABD RAJIS</td>
    <td>NRIC NO.           :__________________________</td>
</tr>
</table>
