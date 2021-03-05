<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h4><a href="dashboard.php">Reports</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Dashboard</h4>

<h3 id="switchsection1-title" class="handcursor">SUMMARY<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<table width="100%" border="0">
	<tr>
		<th colspan="2">SKIM system summary</th>
	</tr>
	<tr>
		<td width="60%">Total Contractors :</td>
		<td width="40%"><?php echo $totalCtr; ?></td>
	</tr>
	<tr>
		<td>Total Labours :</td>
		<td><?php echo $totalLabours; ?></td>
	</tr>
	<tr>
		<td>Total workorders :</td>
		<td><?php echo $totalWorkorders; ?></td>
	</tr>
	<tr>
		<td>Total SKIM users :</td>
		<td><?php echo $totalEmp; ?></td>
	</tr>
</table>
</body>
</html>
