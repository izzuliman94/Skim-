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
body form p {
	font-size: 9px;
}
body form table tr td h5 {
	color: #666;
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
    <th align="center">Name &amp; Correspondence Address</th>
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
    <th style="height: 14px">No</th>
    <th style="height: 14px">Name</th>
    <th style="height: 14px">Passport No</th>
    <th style="height: 14px">Nationality</th>
    <th style="height: 14px">Sex</th>
    <th style="height: 14px">Date of Birth</th>
    <th style="height: 14px">Permit Expired Date</th>
    <th style="height: 14px">Next Of Kin</th>
    <th style="height: 14px">Relationship</th>
    <th style="height: 14px">Year of Renewal</th>
    <th style="height: 14px">Work Trade</th>
    <th style="height: 14px">Duration</th>
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
    <td><?php if($lampfcl->wkr_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->wkr_dob)); ?></td>
    <td><?php echo  date('d M Y',strtotime("-1 year",strtotime($lampfcl->wkr_permitexp)))." - ". date('d M Y',strtotime($lampfcl->wkr_permitexp)); ?></td>
  <td><?php echo $lampfcl->fcl_next_of_kin;?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
    <td><?php echo $lampfcl->fcl_year_renewal ?></td>
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
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Nama Company : <?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td>&nbsp;</td>
  <td>Workorder No : <?php echo $lampiran->wo_num?></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td>&nbsp;</td>
  <td>OR No : <?php echo $lampiran->pay_refno?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>PIC : <?php echo $lampiran->wo_personincharge ?></td>
</tr>
</table>
<!--p>&nbsp;</p>
<h6>&nbsp;</h6>
<table width="95%">
  <tr>
    <td width="76%" height="131" align="left">&nbsp;</td>
    <td width="20%" align="right"><h6><?php echo $woRow->ctr_comp_name;?> :
      <?php if(strlen($woRow->wo_receivedate) > 0 && $woRow->wo_receivedate != '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_receivedate));?>
    </h6>
      <h6><?php echo $woRow->wo_clab_no;?>/EXT/<?php echo $woRow->emp_name?>:</h6>
      <h6><?php echo $woRow->pay_refno;?></h6></td>
    <td width="20%" align="right">&nbsp;</td>
</tr></table>
<p>&nbsp;</p>
<p>&nbsp;</p-->

</form>
</body>