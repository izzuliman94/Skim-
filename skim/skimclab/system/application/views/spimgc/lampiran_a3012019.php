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
	background-color:#CCCCCC
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
.style2 {font-size: 9}
</style>
</head>
<body>

<form>
<br />
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="3" cellspacing="0">
<tr>
    <th colspan="5" align="center">List Of FCL</th>
</tr>
<tr>
    <th width="300" align="center">Name &amp; Correspondence Address</th>
    <th width="96" align="center">Business Registration No</th>
    <th width="103" align="center">Business / Occupation</th>
    <th width="95" align="center">Tel. No.</th>
    <th width="64" align="center">Fax. No.</th>
</tr>
<tr>
    <td align="center">
    <strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BHD</strong> <br />
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

<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="3" cellspacing="0">
<tr align="center">
    <th width="18" style="height: 14px">No</th>
    <th width="29" style="height: 14px">Name</th>
    <th width="63" style="height: 14px">Passport No</th>
    <th width="60" style="height: 14px">Worker Pemit</th>
    <th width="51" style="height: 14px">Nationality</th>
    <th width="20" style="height: 14px">Sex</th>
    <th width="63" style="height: 14px">Date of Birth</th>
    <th width="103" style="height: 14px">Permit Expired Date</th>
    <th width="58" style="height: 14px">Next Of Kin</th>
    <th width="64" style="height: 14px">Relationship</th>
    <th width="85" style="height: 14px">Year of Renewal</th>
    <th width="58" style="height: 14px">Work Trade</th>
    <th width="49" style="height: 14px">Duration</th>
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
    <td><?php echo $lampfcl->fcl_newpassno; ?></td>
    <td><?php echo $lampfcl->fcl_permitno; ?></td>
    <td><?php echo $lampfcl->fcl_nationality; ?></td>
    <td><?php if($lampfcl->fcl_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_dob)); ?></td>
    <!--td><?php echo  date('d M Y',strtotime("-1 year",strtotime($lampfcl->wkr_permitexp)))." - ". date('d M Y',strtotime($lampfcl->wkr_permitexp)); ?></td-->
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_plksdate1))." - ". date('d M Y',strtotime($lampfcl->fcl_plksdate2)); ?></td>
  <td><?php echo $lampfcl->fcl_next_of_kin;?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
    <td><?php echo $lampfcl->fcl_year_renewal ?></td>
    <td><?php echo $lampfcl->trade_desc ?></td>
    <!--td><?php echo $lampfcl->cty_period ?></td-->    
    <td>12 MONTH</td>   
</tr>
<?php 
}}
?>
</table>
<br />
<br />
<table style="text-align: left; width: 700px;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
  <td width="30%">&nbsp;</td>
  <td width="30%">&nbsp;</td>
  <td width="30%"><span class="style2">Nama Company : <?php echo $lampiran->ctr_comp_name?></span></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td>&nbsp;</td>
  <td><span class="style2">Workorder No : <?php echo $lampiran->wo_num?></span></td>
</tr>
<tr>
  <td >&nbsp;</td>
  <td>&nbsp;</td>
  <td><span class="style2">OR No : <?php echo $lampiran->pay_refno?></span></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><span class="style2">PIC : <?php echo $lampiran->wo_personincharge ?></span></td>
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