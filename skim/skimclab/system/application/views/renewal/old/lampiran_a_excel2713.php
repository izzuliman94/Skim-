<?php 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=lampiranA_renewal.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); // this is my export to excel 
?>
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr align="center">
    <th>No</th>
    <th>Name</th>
    <th>Passport No</th>
    <th>Worker Permit</th>
    <th>Nationality</th>
    <th>Sex</th>
    <th>Date of Birth</th>
    <th>Permit Expired</th>
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
    <!--td><?php echo  date('d M Y',strtotime("-1 year",strtotime($lampfcl->wkr_permitexp)))." - ". date('d M Y',strtotime($lampfcl->wkr_permitexp));?></td-->
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_plksdate1))." - ". date('d M Y',strtotime($lampfcl->fcl_plksdate2)); ?></td>
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
<table style="text-align: left; width: 700px;" align="center">
<tr align="right">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Nama Company : <?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr  align="right">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Workorder No : <?php echo $lampiran->wo_num?></td>
</tr>
<tr  align="right">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>OR No : <?php echo $lampiran->pay_refno?></td>
</tr>
<tr  align="right">
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>PIC : <?php echo $lampiran->wo_personincharge ?></td>
</tr>
</table>

