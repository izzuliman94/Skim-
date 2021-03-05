<?php 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=lampiranA.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); // this is my export to excel 
?>
<style type="text/css">
body table tr td {
	text-align: right;
}
</style>

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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="95%">
 <tr>
    <td colspan="2">&nbsp;</td>
    <td >Nama Company :<?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>Workorder No :<?php echo $lampiran->wo_num?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>OR No : <?php echo $lampiran->pay_refno?></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>PIC : <?php echo $lampiran->wo_personincharge ?></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  <td>Permit Expired : </td>
</tr>
</table>
<p>&nbsp;</p>
