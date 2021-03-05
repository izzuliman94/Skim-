<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(passno,name,wrg,expdate,id,dtpermit,photo,comp){

 opener.frmidcard.wkrid.value = "";
 opener.frmidcard.selemp.value = "";
 opener.frmidcard.txtname.value = "";
 opener.frmidcard.txtpass.value = "";
 opener.frmidcard.txtwrg.value = "";
 opener.frmidcard.txtdateexp.value ="";
 opener.frmidcard.txtpermit.value ="";
 opener.frmidcard.selphoto.value ="";
  opener.frmidcard.txtcomp.value ="";

 opener.frmidcard.wkrid.value = id;
 opener.frmidcard.selemp.value = passno;
 opener.frmidcard.txtname.value = name;
 opener.frmidcard.txtpass.value = passno;
 opener.frmidcard.txtwrg.value = wrg;
 opener.frmidcard.txtdateexp.value = expdate;
 opener.frmidcard.txtpermit.value = dtpermit;
 opener.frmidcard.selphoto.value = photo;
 opener.frmidcard.txtcomp.value = comp;
   
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
<form method="post" action="<?php echo site_url();?>/contIDcard/labour_list">
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
    <td><a href="#" onclick="senddata('<?php echo $labour->wkr_passno; ?>','<?php echo $labour->wkr_name; ?>','<?php echo $labour->cty_desc?>','<?php echo $labour->wkr_passexp?>','<?php echo $labour->wkr_id?>','<?php echo $labour->wkr_permitexp?>','<?php echo $labour->upload_destfilename?>','<?php echo $labour->ctr_comp_name?>')"><?php echo $labour->wkr_passno; ?></a><a href="#" onclick="senddata('<?php echo $labour->wkr_passno; ?>','<?php echo $labour->wkr_name; ?>','<?php echo $labour->cty_desc?>','<?php echo $labour->wkr_passexp?>','<?php echo $labour->wkr_id?>','<?php echo $labour->wkr_permitexp?>','<?php echo $labour->upload_destfilename?>','<?php echo $labour->ctr_comp_name?>')"></a></td>
    <td><?php echo $labour->wkr_name; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
