<?php 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=lampiran_qbe_renewal.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); // this is my export to excel 
?>
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr align="center">
    <th>No.</th>
    <th>Name</th>
    <th>Passport</th>
    <th>Gender</th>
    <th>Occupation Sector</th>
    <th>Nationality</th>
    <th>DOB</th>
    <th>Insured For</th>
    <th>Work Permit ID</th>
    <th>Work Permit Expiry</th>
    <th>INS Status</th>
    <th>Next Kin</th>
    <th>Relationship</th>
	<th>Address</th>
	<th>Tel No.</th>
	<th>IG Amount</th>
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
	<td><?php if($lampfcl->fcl_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
	<td><?php echo $lampfcl->fcl_wt ?></td>
    <td><?php echo $lampfcl->fcl_nationality; ?></td>
	<td><?php echo date('d M Y',strtotime($lampfcl->fcl_dob)); ?></td>
	<td><?php echo 'P'; ?></td>
	<td><?php echo $lampfcl->fcl_permitno; ?></td>
	<td><?php echo date('d M Y',strtotime($lampfcl->fcl_plksdate1))." - ". date('d M Y',strtotime($lampfcl->fcl_plksdate2)); ?></td>
    <td><?php echo 'N'; ?></td>
	<td><?php echo $lampfcl->fcl_next_of_kin;?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
    <td><?php echo $lampfcl->fcl_add ?></td>
	<td><?php echo ''; ?></td>
	<td><?php echo ''; ?></td>

        
</tr>

<?php 
}}
?>
</table>
<br />
<table style="text-align: left; width: 700px;" align="center">
<tr align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Comp Reg No :<?php echo $lampiran->ctr_comp_regno?></td>
</tr>
<tr align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Comp & Add : <?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr  align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><?php echo $lampiran->ctr_addr1?></td>
</tr>
<tr  align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><?php echo $lampiran->ctr_addr2?></td>
</tr>
<tr  align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><?php echo $lampiran->ctr_addr3?></td>
</tr>
<tr  align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><?php echo $lampiran->ctr_pcode?></td>
</tr>
<tr  align="left">
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><?php echo $lampiran->state_name ?></td>
</tr>
<tr  align="left">
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
</table>

