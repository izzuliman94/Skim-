<?php 
header("Content-type: text/csv; charset=utf-8"); 
header("Content-Disposition: attachment; filename=fwcms.csv"); 
//header("Pragma: no-cache"); 
//header("Expires: 0"); // this is my export to excel 
// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('No', 'Name', 'Passport No','Passport Exp Date','Nationality','Sex','Date of Birth','Date of Birth','Next Of Kin','Address','Relationship','Work Trade','Duration'));

?>

<?php 

if($allFCLlampiran->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($allFCLlampiran->result() as $lampfcl){
while($i = mysql_fetch_assoc($lampfcl)) fputcsv($output, $i( $i++,$lampfcl->fcl_name,$lampfcl->fcl_passno,$lampfcl->fcl_passexp,$lampfcl->nat_desc));

?>


<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><?php echo $lampfcl->fcl_name; ?></td>
    <td><?php echo $lampfcl->fcl_passno; ?></td>
    <td><?php echo $lampfcl->fcl_passexp; ?></td>
    <td><?php echo $lampfcl->nat_desc; ?></td>
    <td><?php if($lampfcl->fcl_gender == 1){
		         echo "MALE"; 
	             }else{
				 echo "FEMALE";
				 }
		?></td>
    <td><?php echo date('d M Y',strtotime($lampfcl->fcl_dob)); ?></td>
    <td><?php echo $lampfcl->fcl_next_of_kin;?></td>
    <td><?php echo $lampfcl->fcl_add;?></td>
    <td><?php echo $lampfcl->fcl_relationship;?></td>
    <td><?php echo $lampfcl->trade_desc ?></td>
    <td><?php echo $lampfcl->cty_period ?></td>    
</tr>
<?php 
}}
?>
</table>
<p>&nbsp;</p>
<table align="center" style="text-align: left; width: 700px;">
  <tr align="right">
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="95%">
  <tr>
    <td width="76%" height="131" align="left">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
