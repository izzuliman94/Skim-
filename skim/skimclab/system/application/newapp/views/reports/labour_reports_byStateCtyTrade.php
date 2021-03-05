<?php
if ($excel == "excel"){
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=FCLReport.xls");
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
<table width="80%" border="1" cellpadding="1" cellspacing="1" align="CENTER">
	<tr>
		<td class="print" align="right" colspan="5"><?php echo date('j F Y');?></td>
	</tr>
	<tr>
		<th colspan="5" class="print"><?php echo $reportTitle;?></th>
	</tr>
	<tr>
		<th rowspan="2">No.</th>
		<th rowspan="2"><?php echo $fieldTitle;?></th>
		<th colspan="3" align="CENTER">STATUS</th>
	</tr>
		<th align="CENTER">Active</th>
		<th align="CENTER">In-active</th>
		<th align="CENTER">Suspended</th>
	<tr>
	</tr>
	<?php 
		if($wkrRecord->num_rows() > 0){
			$i=1;
			$overallActive = 0;
			$overallInactive = 0;
			$overallSuspended = 0;
			foreach($wkrRecord->result() as $data){
	?>
		<tr>
		<td class="print" width="5%"><?php echo $i++;?>.</td>
		<td class="print" width="50%"><?php echo $data->description;?></td>
		<td class="print" align="RIGHT" width="15%"><?php echo $data->totalactive;?></td>
		<td class="print" align="RIGHT" width="15%"><?php echo $data->totalinactive;?></td>
		<td class="print" align="RIGHT" width="15%"><?php echo $data->totalsuspended;?></td>
		</tr>
	<?php
			$overallActive += $data->totalactive;
			$overallInactive += $data->totalinactive;
			$overallSuspended += $data->totalsuspended;
			}
		}
	else{
	?>
	<tr>
		<td colspan="5"><font color="red">No data to display. Please refine your search.</font></td>
	</tr>
	<?php
	  }
	?>
	<tr>
		<td colspan="2" class="print" align="CENTER"><strong>TOTAL</strong></td>
		<td class="print" align="RIGHT"><strong><?php echo $overallActive;?></strong></td>
		<td class="print" align="RIGHT"><strong><?php echo $overallInactive;?></strong></td>
		<td class="print" align="RIGHT"><strong><?php echo $overallSuspended;?></strong></td>
	</tr>
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