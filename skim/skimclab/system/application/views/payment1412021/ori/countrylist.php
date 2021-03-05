<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<title>SKIM - SPIM</title>
<script>
function senddata(id,country,period,plks,fees,visa,levi,wages,fine,transfees,transcost,frm){

 if(frm == "receipt"){
 
 opener.frmpayment.txtvisa.value = "";
 opener.frmpayment.txtcountry.value = "";
 opener.frmpayment.txtfine.value = "";
 opener.frmpayment.txttransfees.value = "";
 opener.frmpayment.txttranscost.value = "";
 
 opener.frmpayment.txtvisa.value = visa;
 opener.frmpayment.txtcountry.value = country;
 opener.frmpayment.txtfine.value = fine;
 opener.frmpayment.txttransfees.value = transfees;
 opener.frmpayment.txttranscost.value = transcost;
 
 }else{
 
 opener.addfcl.selid.value = "";
 opener.addfcl.selcountry.value = "";
 opener.addfcl.txtperiod.value = "";
 opener.addfcl.txtplks.value = "";
 opener.addfcl.txtfees.value = "";
 opener.addfcl.txtvisa.value = "";
 opener.addfcl.txtlevi.value = "";
 opener.addfcl.txtwages.value = "";
 opener.addfcl.txttransitfees.value = "";
 opener.addfcl.txttransitcost.value = "";
 opener.addfcl.txtig.value = "";
 opener.addfcl.txtfwcs.value = "";
 opener.addfcl.txtfwhs.value = "";
 opener.addfcl.txtfomema.value = "";
 opener.addfcl.txtadmin.value = "";

 opener.addfcl.selid.value = id;
 opener.addfcl.selcountry.value = country;
 opener.addfcl.txtperiod.value = period;
 opener.addfcl.txtplks.value = plks;
 opener.addfcl.txtfees.value = fees;
 opener.addfcl.txtvisa.value = visa;
 opener.addfcl.txtlevi.value = levi;
 opener.addfcl.txtwages.value = wages;
 opener.addfcl.txttransitfees.value = transfees;
 opener.addfcl.txttransitcost.value = transcost;
 opener.addfcl.txtig.value = "50.00";
 opener.addfcl.txtfwcs.value = "72.00";
 opener.addfcl.txtfwhs.value = "120.00";
 opener.addfcl.txtfomema.value = "180.00";
 opener.addfcl.txtadmin.value = "300.00";
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
    <th width="5%">Country Code</th>
    <th>Country Name</th>
</tr>
<?php 

if($country->num_rows() == 0){ 

?>

<?php
}else{
$i = 1;
foreach($country->result() as $country){
?>
<tr align="center">
    <td><a href="#" onclick="senddata('<?php echo $country->cty_id; ?>','<?php echo $country->cty_desc; ?>','<?php echo $country->cty_period; ?>','<?php echo $country->cty_plks; ?>','<?php echo $country->cty_fees; ?>','<?php echo $country->cty_visa; ?>','<?php echo $country->cty_levi; ?>','<?php echo $country->cty_wages; ?>','<?php echo $country->cty_fine; ?>','<?php echo $country->cty_trans_fees; ?>','<?php echo $country->cty_trans_cost; ?>','<?php echo $frm?>')"><?php echo $country->cty_id; ?></a></td>
    <td><?php echo $country->cty_desc; ?></td>    
</tr>
<?php 
}}
?>
</table>
</form>
</body>
