<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(passno,name,rdate,passissue,passexp,nok,relationship,salary,wt){

 opener.AddNewFCL.selemp.value = "";
 opener.AddNewFCL.empname.value = "";
 opener.AddNewFCL.txtyrendate.value="";
 opener.AddNewFCL.txtpassissue.value="";
 opener.AddNewFCL.txtpassexp.value ="";
 opener.AddNewFCL.txtnok.value ="";
 opener.AddNewFCL.txtrelationship.value ="";
 opener.AddNewFCL.txtsalary.value ="";
 opener.AddNewFCL.txtworktrade.value ="";
 
  
 opener.AddNewFCL.selemp.value = passno;
 opener.AddNewFCL.empname.value = name;
 opener.AddNewFCL.txtyrendate.value = rdate;
 opener.AddNewFCL.txtpassissue.value = passissue;
 opener.AddNewFCL.txtpassexp.value = passexp;
 opener.AddNewFCL.txtnok.value = nok;
 opener.AddNewFCL.txtrelationship.value = relationship;
 opener.AddNewFCL.txtsalary.value = salary;
 opener.AddNewFCL.txtworktrade.value =wt;
 
 
 opener.calcyor();
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
<form method="post" action="<?php echo site_url();?>/contRenewal/empfcl_list/<?php echo $clabno ?>">
<table width="70%">
<tr>
    <td>Passport No</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table>
<table width="70%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th width="5%">Bil</th>
    <th>Passport No</th>
    <th>Name</th>    
</tr>
<?php 

if($labour->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($labour->result() as $labour){
?>
<tr align="center">
    <td><?php echo $i++; ?></td>
    <td><a href="#" onclick="senddata('<?php echo $labour->wkr_passno; ?>','<?php echo $labour->wkr_name; ?>','<?php echo $labour->wkr_entrydate?>','<?php echo $labour->wkr_passissue?>','<?php echo date("j M Y",strtotime($labour->wkr_passexp))?>','<?php echo $labour->wkr_next_of_kin ?>','<?php echo $labour->wkr_relationship ?>','<?php echo $labour->wkr_salary?>','<?php echo $labour->wkr_wtrade?>')"><?php echo $labour->wkr_passno; ?></a></td>
    <td><?php echo $labour->wkr_name; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
