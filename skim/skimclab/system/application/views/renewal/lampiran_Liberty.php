<?php 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=lampiran_lib_baru.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); // this is my export to excel 
?>
<table style="text-align: left; width: 700px;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr align="center">
    <th>No.</th>
    <th>Name</th>
	<th>Gender</th>
    <th>Passport</th>
	<th>Socso_id</th>
    <th>Nationality</th>
    <th>Worker Trade</th>
    <th>DOB</th>
    <th>Permit Expiry Date</th>
    <th>Insured For</th>
    <th>Work Permit No.</th>
    <th>Name of Next Kin</th>
    <th>Full Address of Next Kin</th>
    <th>Contact No.</th>
    <th>Relationship</th>
	<th>Next Kin Nationality</th>
	<th>Next Kin Age</th>
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
	<td><?php if($lampfcl->fcl_gender == 1){
		         echo "M"; 
	             }else{
				 echo "F";
				 }
		?></td>
	<td><?php echo $lampfcl->fcl_newpassno; ?></td>
	<td><?php echo $lampfcl->wkr_socso_id; ?></td>
	<!--td><?php echo 'EFWF1'; ?></td-->
    <td><?php if($lampfcl->fcl_nationality == 'BANGLADESH'){
		         echo "BGD"; 
	             }elseif ($lampfcl->fcl_nationality == 'INDONESIA'){
				 echo "IDN";
				 }elseif ($lampfcl->fcl_nationality == 'CAMBODIA'){
				 echo "KHM";
				 }elseif ($lampfcl->fcl_nationality == 'CHINA'){
				 echo "CHN";
				 }elseif ($lampfcl->fcl_nationality == 'INDIA'){
				 echo "IND";
				 }elseif ($lampfcl->fcl_nationality == 'MYANMAR'){
				 echo "MMR";
				 }elseif ($lampfcl->fcl_nationality == 'NEPAL'){
				 echo "NPL";
				 }elseif ($lampfcl->fcl_nationality == 'FILIPINA'){
				 echo "PHL";
				 }elseif ($lampfcl->fcl_nationality == 'PAKISTAN'){
				 echo "PAK";
				 }elseif ($lampfcl->fcl_nationality == 'SRI LANKAN'){
				 echo "LKA";
				 }elseif ($lampfcl->fcl_nationality == 'THAILAND'){
				 echo "THA";
				 }elseif ($lampfcl->fcl_nationality == 'VIETNAM'){
				 echo "VNM";
				 }elseif ($lampfcl->fcl_nationality == 'LAOS'){
				 echo "LAO";
				 }
		?></td>
	<!--td><?php echo $lampfcl->trade_desc ?></td-->
	<td><?php echo 'Construction Worker' ?></td>
	<td><?php echo date('d/m/y',strtotime($lampfcl->fcl_dob)); ?></td>
	<td><?php echo date('d/m/y',strtotime($lampfcl->fcl_plksdate2)); ?></td>
	<td><?php echo 'P'; ?></td>
	<td><?php echo $lampfcl->fcl_permitno; ?></td>  
	<td><?php echo $lampfcl->fcl_next_of_kin;?></td>
	<td><?php echo $lampfcl->fcl_add ?></td>
	<td><?php echo ''; ?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
	 <td><?php if($lampfcl->fcl_nationality == 'BANGLADESH'){
		         echo "BGD"; 
	             }elseif ($lampfcl->fcl_nationality == 'INDONESIA'){
				 echo "IDN";
				 }elseif ($lampfcl->fcl_nationality == 'CAMBODIA'){
				 echo "KHM";
				 }elseif ($lampfcl->fcl_nationality == 'CHINA'){
				 echo "CHN";
				 }elseif ($lampfcl->fcl_nationality == 'INDIA'){
				 echo "IND";
				 }elseif ($lampfcl->fcl_nationality == 'MYANMAR'){
				 echo "MMR";
				 }elseif ($lampfcl->fcl_nationality == 'NEPAL'){
				 echo "NPL";
				 }elseif ($lampfcl->fcl_nationality == 'FILIPINA'){
				 echo "PHL";
				 }elseif ($lampfcl->fcl_nationality == 'PAKISTAN'){
				 echo "PAK";
				 }elseif ($lampfcl->fcl_nationality == 'SRI LANKAN'){
				 echo "LKA";
				 }elseif ($lampfcl->fcl_nationality == 'THAILAND'){
				 echo "THA";
				 }elseif ($lampfcl->fcl_nationality == 'VIETNAM'){
				 echo "VNM";
				 }elseif ($lampfcl->fcl_nationality == 'LAOS'){
				 echo "LAO";
				 }
		?></td>
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
<tr  align="left">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>Tel No :<?php echo $lampiran->ctr_telno?></td>
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
  <td>Postcode : <?php echo $lampiran->ctr_pcode?></td>
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

<tr  align="left">
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
<tr  align="left">
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
</table>

