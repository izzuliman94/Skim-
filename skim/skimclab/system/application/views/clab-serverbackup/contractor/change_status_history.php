<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Change Status<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Status History</h4>

<h3 id="switchsection1-title" class="handcursor">Status History<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
	<table align="center" width="500" border="1" cellpadding="0" cellspacing="0">
			<tr>
			  <td class="print">
				<table width="90%" border="0" align="center">
					<tr>
						<td class="print" width="30%">CLAB No.:</td>
						<td class="print"><input type="text" name="txtpassno" value="<?php echo $ctr->ctr_clab_no;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print">Company Name:</td>
						<td class="print"><input type="text" name="txtname" size="40" value="<?php echo $ctr->ctr_comp_name;?>" readonly /></td>
					</tr>
				</table>
			  </td>
			</tr>
			<tr>
			  <td class="print">
				<table width="100%" border="0">
					<tr>
						<th colspan="5" align="Center">Status History</th>
					</tr>
					<tr>
						<th width="5%" align="CENTER">No.</th>
						<th width="10%" align="CENTER">Status</th>
						<th width="15%" align="CENTER">Set by</th>
						<th width="15%" align="CENTER">Date set</th>
						<th>Remarks</th>
					</tr>
					<?php if($statusHistory->num_rows() == 0){
					?>
					<tr>
						<td colspan="5"><font color="red">There is no previous change status history.</font></td>
					</tr>
					<?php }
					else{
						$i=1;
						foreach($statusHistory->result() as $hist){
					?>
					<tr>
						<td><?php echo $i++;?></td>
						<td><?php if($hist->status_newstatus == 1) echo "ACTIVE";
	  					  	  else if ($hist->status_newstatus == 2) echo "IN-ACTIVE";
	  					  	  else if ($hist->status_newstatus == 3) echo "SUSPENDED";
	  					  	  else if ($hist->status_newstatus == 4) echo "BLACKLISTED";
	  					  	  else echo "UNKNOWN";?>
	  					</td>
						<td><?php echo $hist->status_changeby;?></td>
						<td><?php echo date('d-m-Y', strtotime($hist->status_changedate));?></td>
						<td><?php echo $hist->status_changereason;?></td>
					</tr>
					<?php }
					}
					?>
					<tr>
						<td colspan="5" align="center" class="print"><input type="button" name="btnClose" value=" Close " onclick="window.close()" /></td>
					</tr>
				</table>
			  </td>
			</tr>	
	</table>
</body>
</html>