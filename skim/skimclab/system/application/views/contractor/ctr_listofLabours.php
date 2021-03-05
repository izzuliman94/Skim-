<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Labour List</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0">
 <tr>
  <td class="print" align="center">
	<table width="70%" border="0">
		<tr>
			<td colspan="16" align="CENTER" class="print"><h2>LIST OF LABOURS (<?php echo $companyname;?>)</h2></td>
		</tr>
		<tr>
		  <td colspan="16" align="RIGHT" class="print">Date: <?php echo date('j F Y');?></td>
	    </tr>
		<tr>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td align="RIGHT" class="print">&nbsp;</td>
			<td colspan="7" align="RIGHT" class="print"><font color="#009900" size="0"><font color = green>A</font> - <font color = black>Available</font> <font color = red>N/A</font> - <font color = black>Not Available</font></td>
			
		</tr>
		<tr>
			<th rowspan="2">No.</th>
			<th rowspan="2">Passport No.</th>
			<th rowspan="2">Name</th>
			<th rowspan="2">Status</th>
			<th rowspan="2">Sub Status</th>
			<th rowspan="2">Country</th>
			<th rowspan="2">Race/Ethnic</th>
			<th rowspan="2">Permit Expiry</th>
			<th rowspan="2">Passport Expiry</th>
			<th rowspan="2">Green Card</th>
			<th colspan="2">SKK</th>
			<th colspan="2">SOCSO</th>
			<th colspan="2">BANK</th>
		</tr>
		<tr>
		  <th>Reg</th>
		  <th>Cert</th>
		  <th>Reg</th>
		  <th>Pay</th>
		  <th>Reg</th>
		  <th>Pay</th>
	    </tr>
		<?php 
			if($listofLabours->num_rows() == 0){
		?>
		<tr>
			<td colspan="16"><font color="red"><strong>There is no labour assigned to this company.</strong></font></td>
			
		</tr>
		<?php }
		else{
			$i=1;
			foreach($listofLabours->result() as $labor){
		?>
		<tr>
			<td><?php echo $i++;?>.</td>
			<td><a href="<?php echo site_url();?>/contLabour/labourDetails/<?php echo $labor->wkr_id;?>" target="_blank"><?php echo $labor->wkr_passno;?></a></td>
			<!--td><?php echo $labor->wkr_passno;?></td-->
			<td><?php echo $labor->wkr_name;?></td>
			<td><?php echo $labor->emp_status_desc;?></td>
			<td><?php echo $labor->avlab_desc;?></td>
			<td><?php echo $labor->cty_desc;?></td>
			<td><?php echo $labor->race_desc;?></td>
			<td><?php if($labor->wkr_permitexp != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_permitexp));?></td>
			<td><?php if($labor->wkr_passexp != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_passexp));?></td>
			<td><?php if($labor->wkr_greencard != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_skkregstatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_skkstatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_socsoregstatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_socsostatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_bankregstatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
			<td><?php if($labor->wkr_bankstatus != '0') echo "<font color = green>A</font>"; else echo "<font color = red>N/A</font>";?></td>
		</tr>
		<?php } //end foreach
		} //end else
		?>
	</table>
 <tr>
 	<td align="CENTER" class="print">
 		<input type="button" name="printList" value=" Print List " onclick="window.print();"/>
 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
 	</td>
 </tr>
</table>
</body>
</html>
