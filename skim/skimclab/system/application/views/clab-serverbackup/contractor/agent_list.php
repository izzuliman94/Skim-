<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(id,name,add1,add2,add3,process){

 if(process == 'N'){
 opener.newCtrForm.txtagname.value = "";
 opener.newCtrForm.txtagid.value = "";
 opener.newCtrForm.txtagadd1.value = "";
 opener.newCtrForm.txtagadd2.value = "";
 opener.newCtrForm.txtagadd3.value = ""; 
 opener.newCtrForm.txtagname.value = name;
 opener.newCtrForm.txtagid.value = id;
 opener.newCtrForm.txtagadd1.value = add1;
 opener.newCtrForm.txtagadd2.value = add2;
 opener.newCtrForm.txtagadd3.value = add3;
 window.close();
 opener.focus();
 }else{
 opener.editCtrForm.txtagname.value = "";
 opener.editCtrForm.txtagid.value = "";
 opener.editCtrForm.txtagadd1.value = "";
 opener.editCtrForm.txtagadd2.value = "";
 opener.editCtrForm.txtagadd3.value = ""; 
 opener.editCtrForm.txtagname.value = name;
 opener.editCtrForm.txtagid.value = id;
 opener.editCtrForm.txtagadd1.value = add1;
 opener.editCtrForm.txtagadd2.value = add2;
 opener.editCtrForm.txtagadd3.value = add3;
 window.close();
 opener.focus();
 
 }

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
<form method="post" action="<?php echo site_url();?>/contContractor/agent_list">
<table width="70%">
<tr>
    <td>Agency Name</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table>
<table width="70%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th width="5%">Bil</th>
    <th>Agency Name</th>    
</tr>
<?php 

if($agent->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($agent->result() as $Agency){
?>
<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><a href="#" onclick="senddata('<?php echo $Agency->agent_id; ?>','<?php echo $Agency->agent_desc; ?>','<?php echo $Agency->agent_addr1; ?>','<?php echo $Agency->agent_addr2; ?>','<?php echo $Agency->agent_addr3; ?>','<?php echo $process ?>')"><?php echo $Agency->agent_desc; ?></a></td>  
</tr>
<?php 
}}
?>
</table>
</form>
</body>
