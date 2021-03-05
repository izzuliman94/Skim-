<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
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
<table style="text-align: left; width: 700px;" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td align='left'><?php echo $woRow->wo_agg_no ?></td>
</tr>
<tr>
    <td align='left' height="30">&nbsp;</td>
</tr>
<tr>
    <td align='center'><b>ADDENDUM FOR THE SUPPLY OF FOREIGN CONSTRUCTION LABOUR</b></td>
</tr>
<tr>
   <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">This is an Addendum to the Agreement for the Supply of Foreign Construction Labour entered into</td>
</tr>
<tr>
  <td height="20">on 
  <input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="<type here>" /> between   Construction Labour Exchange Centre Berhad (CLAB)</td>
</tr>
<tr>
  <td style="height: 20px">and 
  <input type="text" name="txtfield2" style="border-left:none; border-right:none; border-top: none; width:440px; text-align:center; border-bottom-color: #C0C0C0;" value="<type here>" /> (Employer).</td>
</tr>
<tr>
   <td style="height: 20px"></td>
</tr>
<tr>
   <td height="20">This Addendum shall be and is incorporated into the Agreement for the Supply of Foreign</td>
</tr>
<tr>
   <td height="20">Construction Labour dated&nbsp;<input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="<type here>" /> between CLAB and Employer.</td>
</tr>
<tr>
   <td height="20">&nbsp;</td>
</tr>
<tr>
   <td height="20">May it be known that the undersigned parties, for good consideration, do hereby agree to make the additions that are outlined below. </td>
</tr>
<tr>
   <td height="20">&nbsp;</td>
</tr>
<tr>
   <td height="20">a.    List of the name of the Foreign Workers </td>
</tr>
</table>
<br />
<table style="text-align: left; width: 700px;" align="center" cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th>No</th>
    <th>Name</th>
    <th>Passport No</th>
    <th>Nationality</th>
    <th>Sex</th>
    <th>Date of Birth</th>
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
    <td><?php echo $lampfcl->cty_period ?></td>    
</tr>
<?php 
}}
?>
</table>
<br />
<table  style="text-align: left; width: 700px;" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td colspan="2" height="20">These additions shall be made valid as they are included as past of the original Agreement for the Supply of the Foreign Construction Labour. No other terms or conditions of the above mentioned contract shall be negated or changed as a result of this here stated addendum.</td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
    <td colspan="2" height="20">The Agreement shall continue in full force and effect, as amended herein.</td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
   <td colspan="2" height="20">IN WITNESS WHEREOF, the parties  hereto have executed this Agreement</td>
</tr>
<tr>
    <td colspan="2" height="20">&nbsp;</td>
</tr>
<tr>
    <td>__________________________________________</td>
    <td>__________________________________________</td>
</tr>
<tr>
    <td> CHIEF EXECUTIVE OFFICER</td>
    <td>NAME(DIRECTOR):___________________________</td>
</tr>
<tr>
    <td>ABD RAFIK ABD RAJIS</td>
    <td>NRIC NO.           :______________________</td>
</tr>
</table>