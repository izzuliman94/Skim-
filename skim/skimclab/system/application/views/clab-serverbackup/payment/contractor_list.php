<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(clabno,name,add1,add2,add3,pcode,state,tel,fax,frm){

 if(frm == "receipt"){
 
 opener.frmpayment.id.value = "";
 opener.frmpayment.txtrecfrom.value= "";
 opener.frmpayment.txtaddr1.value = "";
 opener.frmpayment.id.value = clabno;
 opener.frmpayment.txtrecfrom.value= name;
 opener.frmpayment.txtaddr1.value = add1 + "\n" + add2 + "\n" + pcode + "\n" + add3 + "\n" + state;
 
 }else{

 opener.frmpayment.txtcompname.value = "";
 opener.frmpayment.id.value = "";
 opener.frmpayment.txtaddr1.value = "";
 opener.frmpayment.txtaddr2.value = "";
 opener.frmpayment.txtaddr3.value = "";
 opener.frmpayment.txtpcode.value = "";
 opener.frmpayment.txtstate.value = "";
 opener.frmpayment.txttelno.value = "";
 opener.frmpayment.txtfaxno.value = "";
 
 opener.frmpayment.txtcompname.value = name;
 opener.frmpayment.id.value = clabno;
 opener.frmpayment.txtaddr1.value = add1;
 opener.frmpayment.txtaddr2.value = add2;
 opener.frmpayment.txtaddr3.value = add3;
  opener.frmpayment.txtpcode.value = pcode;
 opener.frmpayment.txtstate.value = state;
 opener.frmpayment.txttelno.value = tel;
 opener.frmpayment.txtfaxno.value = fax;
 }
 window.close();
 opener.focus();

}
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
</style>
</head>
<body>
<form method="post" action="<?php echo site_url();?>/contPayment/ctr_list/<?php echo $frm ?>">
<table width="80%">
<tr>
    <td>Company Name </td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table>
<table width="80%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th width="5%">No</th>
    <th>Registeration No </th>
	<th>Clab No </th>
    <th>Company Name</th>    
</tr>
<?php 

if($contractor->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($contractor->result() as $contractor){
?>
<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><a href="#" onclick="senddata('<?php echo $contractor->ctr_clab_no; ?>','<?php echo addslashes($contractor->ctr_comp_name); ?>','<?php echo trim($contractor->ctr_addr1); ?>','<?php echo trim($contractor->ctr_addr2); ?>','<?php echo trim($contractor->ctr_addr3); ?>','<?php echo $contractor->ctr_pcode ?>','<?php echo $contractor->state_name ?>','<?php echo $contractor->ctr_telno ?>','<?php echo $contractor->ctr_fax ?>','<?php echo $frm ?>')"><?php echo $contractor->ctr_comp_regno; ?></a></td>
	<td><?php echo $contractor->ctr_clab_no; ?></td> 
    <td><?php echo $contractor->ctr_comp_name; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
