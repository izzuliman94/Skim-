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
  <td class="print" align="center"
	<table width="70%" border="0">
		<tr>
			<td colspan="4" align="CENTER" class="print"><h2><?php echo $title;?></h2></td>
		</tr>
		<tr>
			<td colspan="4" align="RIGHT" class="print">Date: <?php echo date('j F Y');?></td>
		</tr>
		<tr>
			<th>No.</th>
			<th>CLAB NO.</th>
			<th>COMPANY NAME</th>
			<th>Total FCL</th>
		</tr>
		<?php if($listByCompany->num_rows() == 0){
		?>
		<tr>
			<td colspan="4"><font color="red">There is no FCL data.</font></td>
		</tr>
		<?php }
		else{
			$i = 1;
			foreach($listByCompany->result() as $list){
		?>
		<tr>
			<td><?php echo $i++;?></td>	
			<td><?php echo $list->ctr_clab_no;?></td>
			<td><?php echo $list->ctr_comp_name;?></td>
			<td align="RIGHT"><?php echo $list->total_workers;?></td>
		</tr>
		<?php }
		?>
		<tr>
			<td colspan="3" align="CENTER">TOTAL</td>
			<td align="RIGHT"><?php echo $total;?></td>
		</tr>
		<?php
		}
		?>
	</table>
  </td>
 </tr>
 <tr>
 	<td align="CENTER" class="print">
 		<input type="button" name="printList" value=" Print List " />
 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
 	</td>
 </tr>
</table>
</body>
</html>
