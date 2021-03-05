<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url() ?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url() ?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>
<h4> <a href="contSystemAdmin">System administration</a> <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" /> Reports </h4>
<h3 id="switchsection1-title" class="handcursor">Admin Report<img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1">
<table width = "80%" border="0">
	<tr>
		<td colspan="4" align="center"><h2><?php echo $reportHeader; ?></h2></td>
	</tr>
	<tr>
		<th><?php echo $fieldHeader1;?></th>
		<th><?php echo $fieldHeader2;?></th>
		<th><?php echo $fieldHeader3;?></th>
		<th><?php echo $fieldHeader4;?></th>
	</tr>
	<?php foreach($report->result() as $row){ ?>
	<tr>
		<td><?php echo $row->$field1;?></td>
		<td><?php echo $row->$field2;?></td>
		<td><?php echo $row->$field3;?></td>
		<td><?php echo $row->$field4;?></td>
	</tr>
	<?php } ?>
	<tr>
		<form method="POST" name="admin_reports">
			<td colspan = "4" align = "center">
				<input type="button" name="Print" value="Print" /> &nbsp;
				<input type="button" name="Save" value="Save" />
			</td>
		</form>
	</tr>
</table>
</div>
</body>
</html>