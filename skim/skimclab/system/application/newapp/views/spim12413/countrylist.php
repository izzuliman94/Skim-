<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(cty_desc,nat_desc,cty_id,nat_id,frm){

 if(frm == "update"){
   opener.EditFCL.selcountrydesc.value = "";
   opener.EditFCL.selnationalitydesc.value = "";
   opener.EditFCL.selcountry.value = "";
   opener.EditFCL.selnationality.value = "";
   opener.EditFCL.selcountrydesc.value = cty_desc;
   opener.EditFCL.selnationalitydesc.value = nat_desc;
   opener.EditFCL.selcountry.value = cty_id;
   opener.EditFCL.selnationality.value = nat_id;  
 }else{
   opener.AddNewFCL.selcountrydesc.value = "";
   opener.AddNewFCL.selnationalitydesc.value = "";
   opener.AddNewFCL.selcountry.value = "";
   opener.AddNewFCL.selnationality.value = "";
   opener.AddNewFCL.selcountrydesc.value = cty_desc;
   opener.AddNewFCL.selnationalitydesc.value = nat_desc;
   opener.AddNewFCL.selcountry.value = cty_id;
   opener.AddNewFCL.selnationality.value = nat_id;
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
<form method="post" action="<?php echo site_url();?>/contRenewal/empfcl_list">
<!--table width="70%">
<tr>
    <td>Passport No</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table-->
<table width="70%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th width="40%">Country List </th>
    <th>Nationality</th>
</tr>
<?php 

if($countrylist->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($countrylist->result() as $country){
?>
<tr align="center">
    <td><a href="#" onclick="senddata('<?php echo $country->cty_desc; ?>','<?php echo $country->nat_desc; ?>','<?php echo $country->cty_id; ?>','<?php echo $country->nat_id; ?>','<?php echo $form?>')"><?php echo $country->cty_desc; ?></a></td>
    <td><?php echo $country->nat_desc; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
