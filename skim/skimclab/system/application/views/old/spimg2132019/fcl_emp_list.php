<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM G1G3</title>
<script>
function senddata(passno,name,rdate,permitno,passexp,nok,relationship,salary,wt,nat,dob,gender,country){

 opener.AddNewFCL.txtpassno.value = "";
 opener.AddNewFCL.selemp.value = "";
 opener.AddNewFCL.empname.value = "";
 opener.AddNewFCL.txtyrendate.value="";
 opener.AddNewFCL.txtpermitno.value="";
 opener.AddNewFCL.txtpassexp.value ="";
 opener.AddNewFCL.txtnok.value ="";
 opener.AddNewFCL.txtrelationship.value ="";
 opener.AddNewFCL.txtsalary.value ="";
 opener.AddNewFCL.txtworktrade.value ="";
 opener.AddNewFCL.txtnationality.value = "";
 opener.AddNewFCL.txtdob.value = "";
 opener.AddNewFCL.txtgender.value = "";
 opener.AddNewFCL.txtcountry.value = "";
 
 opener.AddNewFCL.txtpassno.value = passno;
 opener.AddNewFCL.selemp.value = passno;
 opener.AddNewFCL.empname.value = name;
 opener.AddNewFCL.txtyrendate.value = rdate;
 opener.AddNewFCL.txtpermitno.value = permitno;
 opener.AddNewFCL.txtpassexp.value = passexp;
 opener.AddNewFCL.txtnok.value = nok;
 opener.AddNewFCL.txtrelationship.value = relationship;
 opener.AddNewFCL.txtsalary.value = salary;
 opener.AddNewFCL.txtworktrade.value =wt;
 opener.AddNewFCL.txtnationality.value = nat;
 opener.AddNewFCL.txtdob.value = dob;
 opener.AddNewFCL.txtgender.value = gender;
 opener.AddNewFCL.txtcountry.value = country;
 
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
<form method="post" action="<?php echo site_url();?>/contSpimG/empfcl_list/<?php echo $clabno ?>">
<table width="100%" border="0" cellpadding=3 style='border-style:none'>
<tr>
    <td>Passport No</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table>
<table width="100%" border="0" cellpadding=3 style='border-style:none'>
<tr align="center">
    <th width="30px" align=left>Bil</th>
    <th width="100px" align=left>Passport No</th>
    <th align=left>Name</th>    
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
    <td align=left><?php echo $i++; ?></td>
    <td align=left><a href="#" onclick="senddata('<?php echo $labour->wkr_passno; ?>','<?php echo addslashes($labour->wkr_name); ?>','<?php echo $labour->wkr_entrydate?>','<?php echo $labour->wkr_passissue?>','<?php echo date("j M Y",strtotime($labour->wkr_passexp))?>','<?php echo $labour->wkr_next_of_kin ?>','<?php echo $labour->wkr_relationship ?>','<?php echo $labour->wkr_salary?>','<?php echo $labour->wkr_wtrade?>','<?php echo $labour->nat_desc?>','<?php echo $labour->wkr_dob?>','<?php echo $labour->wkr_gender?>','<?php echo $labour->wkr_country?>')"><?php echo $labour->wkr_passno; ?></a></td>
    <td align=left><?php echo $labour->wkr_name; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
