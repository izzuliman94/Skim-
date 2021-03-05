<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Change Status<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Status History</h4>

<h3 id="switchsection1-title" class="handcursor">Status History<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
	<table align="center" width="500" border="1" cellpadding="0" cellspacing="0">
			<tr>
			  <td class="print">
			  <form action="<?php echo site_url();?>/contLabour/updatePassportExpHistory" method="POST"  name="frmUpdatePassportExp" id="frmUpdatePassportExp" onsubmit="return v.exec()">
				<table width="90%" border="0" align="center">
					<tr>
						<td class="print" width="30%">Passport No.:</td>
						<td class="print"><input type="text" name="txtpassno" value="<?php echo $labor->wkr_passno;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print">Name:</td>
						<td class="print"><input type="text" name="txtname" size="30" value="<?php echo $labor->wkr_name;?>" readonly /></td>
					</tr>
				</table>
				</form>
			  </td>
			</tr>
			<tr>
			  <td class="print">
				<table width="100%" border="0">
					<tr>
						<th colspan="4" align="Center">Status History</th>
					</tr>
					<tr>
						<th width="5%" align="CENTER">No.</th>
						<th width="10%" align="CENTER">Status</th>
						<th width="20%" align="CENTER">Date Set</th>
						<th>Remarks</th>
					</tr>
					<?php if($statusHistory->num_rows() == 0){
					?>
					<tr>
						<td colspan=4"><font color="red">There is no previous status change history.</font></td>
					</tr>
					<?php }
					else{
						$i = 1;
						foreach($statusHistory->result() as $hist){
					?>
					<tr>
						<td><?php echo $i++;?>.</td>
						<td><?php echo $hist->avlab_desc;?></td>
						<td><?php if($hist->hist_keyindate !== '0000-00-00') echo date('d-m-Y', strtotime($hist->hist_keyindate));?></td>
						<td><?php echo $hist->hist_reason;?>
							<?php if($hist->hist_transtatus == 14 || $hist->hist_transtatus == 15){
								  	echo "<br />Leave from: ";
								  	if($hist->hist_leavefrom!== '0000-00-00' && $hist->hist_leaveto !== '0000-00-00') echo date('d-m-Y', strtotime($hist->hist_leavefrom)) . " to " . date('d-m-Y', strtotime($hist->hist_leaveto));
								  	else echo " not specified";
								  	echo "<br />Running No.:" . $hist->hist_leave_runningno;
								  	echo "<br />Incident Date:";
								  	if($hist->hist_incidentdate !== '0000-00-00') echo date('d-m-Y', strtotime($hist->hist_incidentdate));
								  }
								  else if($hist->hist_transtatus == 4 || $hist->hist_transtatus == 6 || $hist->hist_transtatus == 7){
									echo "<br />Approved by: " . $hist->hist_approvedby;	  
								  }
								  else{
								  }
							?>
						</td>
					</tr>
					<?php }
					}
					?>
					<tr>
						<td colspan="4" align="center" class="print"><input type="button" name="btnClose" value=" Close " onclick="window.close()" /></td>
					</tr>
				</table>
			  </td>
			</tr>	
	</table>
</body>
</html>
