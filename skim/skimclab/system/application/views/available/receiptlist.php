<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(paymentno,frm){

 /*if(frm == "update"){
   opener.updateWorkorderForm.payrefno.value = "";
   opener.updateWorkorderForm.payrefno.value = paymentno;
 }else{
   opener.newWorkorderForm.payrefno.value = "";
   opener.newWorkorderForm.payrefno.value = paymentno;
 }*/
  if(frm == "update"){
 
 if(opener.editAvailableForm.payrefno.value == ""){
    opener.editAvailableForm.payrefno.value = paymentno;
 }else{
    opener.editAvailableForm.payrefno.value = opener.editAvailableForm.payrefno.value + " , " + paymentno;
 }
   
   
 }else{
 
    if(opener.editAvailableForm.payrefno.value == ""){
    opener.editAvailableForm.payrefno.value = paymentno;
 }else{
    opener.editAvailableForm.payrefno.value = opener.editAvailableForm.payrefno.value + " , " + paymentno;
 }
   
  
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
<form method="post" action="<?php echo site_url();?>/contAvailable/empfcl_list">
<!--table width="70%">
<tr>
    <td>Passport No</td>
	<td><input type="text" name="txtsearch" /><input type="submit" value="Search"/></td>
</tr>
</table-->
<table width="70%"  cellpadding="0" cellspacing="0" border="1">
<tr align="center">
    <th width="40%">Payment No</th>
    <th>Payment Received From</th>
</tr>
<?php 

if($receiptlist->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($receiptlist->result() as $receiptlist){
?>
<tr align="center">
    <td><a href="#" onclick="senddata('<?php echo $receiptlist->pmt_receipt_no; ?>','<?php echo $form?>')"><?php echo $receiptlist->pmt_receipt_no; ?></a></td>
    <td><?php echo $receiptlist->pmt_receive_from; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
