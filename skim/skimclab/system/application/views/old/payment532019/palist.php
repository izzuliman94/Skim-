<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(pano){

 opener.frmpayment.txtpaclab.value = "";
 opener.frmpayment.txtpaclab.value = pano;
 
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
    <th width="5%">P.A No </th>
    <th>Company Name </th>
</tr>
<?php 

if($pano->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($pano->result() as $palist){
?>
<tr align="center">
    <td><a href="#" onclick="senddata('<?php echo $palist->pmt_no; ?>')"><?php echo $palist->pmt_no; ?></a></td>
    <td><?php echo $palist->pmt_compname; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
