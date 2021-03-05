<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0">
 <tr>
  <td class="print" align="center">
	<table width="70%" border="0">
		<tr>
			<td colspan="5" align="CENTER" class="print"><h2><?php echo $title;?></h2></td>
		</tr>
		<tr>
			<td colspan="2" align="LEFT" class="print">Date: <?php echo date('j F Y');?></td>
			<td colspan="3" align="RIGHT" class="print"><input type="button" name="btnRefresh" value="Refresh" onClick="window.location.reload()" /></td>
		</tr>
		<tr>
			<th width="5%">No.</th>
			<th width="50%">Contractor Name</th>
			<th width="15%">TOTAL FCL</th>
			<th width="15%">Printed Date</th>
			<th width="15%">&nbsp;</th>
		</tr>
		<?php
		if($listByCompany->num_rows() >0){
				$i = 1;
				foreach($listByCompany->result() AS $ctr){
		?>
		<tr>
			<td><?php echo $i++;?>.</td>
			<td><?php if(strlen($ctr->wkr_currentemp) == 0) echo "-Unidentified-"; else echo $ctr->ctr_comp_name;?></td>
			<td><?php echo $ctr->totalwkr;?></td>
			<td align="center"><?php if(strlen($ctr->print_date)>0) echo date('d-m-Y', strtotime($ctr->print_date));?></td>
			<td><a href="<?php if(strlen($ctr->wkr_currentemp) == 0) echo ""; else echo site_url() . "/contContractor/viewExpiryLetter/$fieldName/$noOfMonths/$ctr->wkr_currentemp";?>" target="_blank"><u>View</u></a> | <a href="<?php if(strlen($ctr->wkr_currentemp) == 0) echo ""; else echo site_url() . "/contContractor/printExpiryLetter/$fieldName/$noOfMonths/$ctr->wkr_currentemp";?>" target="_blank"><u>Print Letter</u></a></td>
		</tr>
		<?php
				}	
			}
		?>
	</table>
 <tr>
 	<td align="CENTER" class="print">
 		<input type="button" name="printList" value=" Print List "  onclick="window.print();"/>
 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
 	</td>
 </tr>
</table>
</body>
</html>
