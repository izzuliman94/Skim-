<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(wono,fclno,visa,woid,fine){

 opener.frmpayment.txtfcl.value = "";
 opener.frmpayment.txtwono.value = "";
 opener.frmpayment.txtvisa.value = "";
 opener.frmpayment.txtwoid.value = "";
 opener.frmpayment.txtfine.value = "";
 
 opener.frmpayment.txtfcl.value = fclno;
 opener.frmpayment.txtwono.value = wono;
 opener.frmpayment.txtvisa.value = visa;
 opener.frmpayment.txtwoid.value = woid;
 opener.frmpayment.txtfine.value = fine;

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
<form method="post" action="<?php echo site_url();?>/contPayment/workorderlist">
<table width="80%">
<tr>
    <td>Workorder No</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table>
<table width="80%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th>No</th>
    <th>Workorder No</th>
	<th>No Of FCL</th>
		  
</tr>
<?php 

if($wolist->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($wolist->result() as $wolist){
?>
<tr align="center">
    <td><?php echo $i++ ?></td>
    <td><a href="#" onclick="senddata('<?php echo $wolist->wo_num; ?>','<?php echo $wolist->wo_fcl_total?>','<?php echo $wolist->cty_visa ?>','<?php echo $wolist->wo_id ?>','<?php echo $wolist->cty_fine ?>')"><?php echo $wolist->wo_num; ?></a></td>
	<td><?php echo $wolist->wo_fcl_total ?></td>	  
</tr>
<?php 
}}
?>
</table>
</form>
</body>
