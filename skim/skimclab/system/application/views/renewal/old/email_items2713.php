<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>


<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
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
<script type="text/javascript">
		
	function Inspchs(){
	 
	 var workorderid = document.emailform.what.value
	 var url = "<?php echo site_url('contRenewal/Insurance_purchase');?>/" + workorderid 
	 window.open(url, 'Insurance Purchase', 'height=50, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	 
	}
	
</script>  
</head>
    
<body>

<form name="emailform" id="emailform">
<table>
<tr>
<td> As per attached, List of Name for coverage</td>
</tr>
<tr>
<td>&nbsp;</td>  
</tr>
<tr>
<td>Company Name</td>
<td>:</td>
<td><?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr>
<td>Workorder No</td>
<td>:</td>
<td><?php echo $lampiran->wo_num?></td>
</tr>
<tr>
<td>OR No</td>
<td>:</td>
<td><?php echo $lampiran->pay_refno?></td>
</tr>
<tr>
  <td>Person In Charge</td>
  <td>:</td>
  <td><?php echo $lampiran->wo_personincharge ?></td>
</tr>
</table>
<label>
<input name="what" type="hidden" id="what" value="<?php echo $lampiran->wo_num?>" />
</label>
<br>
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr align="center">
    <th width="18" style="height: 14px">No</th>
    <th width="29" style="height: 14px">Name</th>
    <th width="63" style="height: 14px">Passport No</th>
    <th width="11" style="height: 14px">Worker Permit</th>
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
    <td><?php if($lampfcl->wkr_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->wkr_dob)); ?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_plksdate1))." - ". date('d M Y',strtotime($lampfcl->fcl_plksdate2)); ?></td>
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
<p>
  <input type="button" value="Send Now" onclick="Inspchs()" />
</p>
</form>
</body>