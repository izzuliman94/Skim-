<?php
if ($excel == "excel"){
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=FCLList.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - REPORTS</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="80%" border="1" cellpadding="0" cellspacing="0" align="CENTER">
	<tr>
		<td class="print" align="right" colspan="5"><?php echo date('j F Y');?></td>
	</tr>
	<tr>
		<th colspan="5" class="print"><?php echo $reportTitle;?></th>
	</tr>
	<tr>
		<td rowspan="3" class="print">Criteria:</td>
		<td colspan="2" class="print">Company : <?php echo $company;?></td>
		<td colspan="2" class="print">Status : <?php echo $status;?></td>
	</tr>
	<tr>
		<td colspan="2" class="print">Work Trade : <?php echo $wtrade;?></td>
		<td colspan="2" class="print">Country : <?php echo $country;?></td>
	</tr>
	<tr>
		<td colspan="4" class="print">Permit expire between: <?php echo $permitexp_from;?> and <?php echo $permitexp_to;?> </td>
	</tr>
</table>
<table width="80%" border="1" cellpadding="0" cellspacing="0" align="CENTER">
	<tr>
		<th>NO.</th>
		<th>PASSPORT NO.</th>
		<th>NAME</th>
		<th>COUNTRY</th>
		<th>PKLS EXPIRY DATE</th>
		<th>CURRENT COMPANY</th>
		<th>Trans Status</th>
	</tr>
	<?php if($wkrData->num_rows() == 0){
	?>
	<tr>
		<td colspan="7" class="print">There is no data to display. Please refine your search.</td>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($wkrData->result() as $wkr){
	?>
	<tr>
		<td class="print" width="5%"><?php echo $i++;?>.</td>
		<td class="print" width="10%" align="CENTER"><?php echo $wkr->wkr_passno;?></td>
		<td class="print" width="28%"><?php echo $wkr->wkr_name;?></td>
		<td class="print" width="10%"><?php echo $wkr->cty_desc;?></td>
		<td class="print" width="10%" align="CENTER"><?php if($wkr->wkr_permitexp != '0000-00-00') echo date('d-m-Y', strtotime($wkr->wkr_permitexp));?></td>
		<td class="print" width="27%"><?php echo $wkr->ctr_comp_name;?></td>
		<td class="print" width="10%"><?php echo $wkr->avlab_desc;?></td>
	</tr>
	<?php }
	}
	?>
</table>
<table width="100%" border="0">
	<tr>
	 	<td align="CENTER" class="print">
	 		<input type="button" name="printList" value=" Print List " onclick="window.print();"/>
	 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
	 	</td>
	 </tr>
</table>
</body>
</html>