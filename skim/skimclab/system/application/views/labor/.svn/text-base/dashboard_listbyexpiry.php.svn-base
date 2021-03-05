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
<?php
if(isset($wkrRecord)){
?>
	<table width="80%" border="0">
		<tr>
			<td colspan="7" align="CENTER" class="print"><h2><?php echo $title;?></h2></td>
		</tr>
		<tr>
			<td colspan="7" align="RIGHT" class="print">Date: <?php echo date('j F Y');?></td>
		</tr>
		<tr>
			<th width="4%">No.</th>
			<th width="12%">PASSPORT NO</th>
			<th width="19%">NAME</th>
			<th width="13%">STATUS</th>
			<th width="13%">WORK TRADE</th>
			<th width="23%">CURRENT COMPANY</th>
			<th width="16%"><?php if($fieldType == "wkr_permitexp") echo "PERMIT EXPIRY DATE";
		    		  else echo "PASSPORT EXPIRY DATE";
		    	?>
			</th>
		</tr>
		<?php if($wkrRecord->num_rows() == 0){
		?>
		<tr>
			<td colspan="7"><font color="red">There is no data display. Please refine your search keyword.</font></td>
		</tr>
		<?php }
		else{
			$i = 1;
			foreach($wkrRecord->result() as $wkr){
		?>
		<tr>
			<td><?php echo $i++;?>.</td>
			<td><?php echo $wkr->wkr_passno;?></td>
			<td><?php echo $wkr->wkr_name;?></td>
			<td><?php echo $wkr->emp_status_desc;?></td>
			<td><?php echo $wkr->wkr_wtrade;?></td>
			<td><?php echo $wkr->wkr_currentemp;?></td>
			<td><?php if($fieldType == "wkr_permitexp"){ 
						if($wkr->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($wkr->wkr_permitexp));
					}
					else{
						if($wkr->wkr_passexp != "0000-00-00") echo date('d-m-Y', strtotime($wkr->wkr_passexp));
					}
			?></td>
		</tr>
		<?php
				}//end foreach
			} //end else
		?>
	</table>
<?php	
}
?>
  </td>
 </tr>
 <tr>
 	<td align="CENTER" class="print">
 		<input type="button" name="printList" value=" Print List " />
 		<input type="button" name="btnBack" value=" Back " onclick="history.back();" />
 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
 	</td>
 </tr>
</table>
</body>
</html>
