<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Masters</title>
<link href="<?php echo base_url();?>/css/screen.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url() ?>css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h4> System administration  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" />Masters</h4>

<h2>Masters<img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h2>
<table width="100%" border="1">
	<tr>
		<td colspan="2" class="print" align="CENTER">
			<table width="90%" border="0">
				<tr>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_nationality"><u>Nationality</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_race"><u>Race/Ethnic</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_countries"><u>Country</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_worktrade"><u>Work Trade</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_ctr_grade"><u>Grade</u></a></td>
				</tr>
				<tr>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_ctr_category"><u>Category</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_ctr_spec"><u>Specialization</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/wo_agency"><u>Agent</u></a></td>
					<td align="CENTER" width="20%"><a href="<?php echo site_url();?>/contAdmin/loadMasters/mst_wkr_availability"><u>Workers Movement Status</u></a></td>
					<td align="CENTER" width="20%">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td class="print" width="40%" valign="top">
			<br /><br />
			<form method="POST" action="<?php echo site_url();?>/contAdmin/editMasterValueSubmit" name="editValueForm">
			<table width="100%" border="0">
				<tr>
					<td colspan="2" align="LEFT" class="print"><strong>Edit Value for <?php echo $tableValue;?></strong></td>
				</tr>
				<tr>
					<td class="print">Code</td>
					<td class="print"><input type="text" name="txtCode" value="<?php echo $codevalue;?>" READONLY/></td>
				</tr>
				<tr>
					<td class="print">Description</td>
					<td class="print"><input type="text" name="txtDesc" size="30" value="<?php echo $descvalue;?>"/></td>
				</tr>
				<tr>
					<td colspan="2" align="CENTER" class="print">
						<input type="hidden" name="txtTableName" value="<?php echo $tableName;?>" />
						<input type="submit" name="btnSubmit" value="Update" onclick="return confirm('Are you sure you want to update?');"/>
						<input type="button" name="btnReset" value="Cancel" onclick="location.href='<?php echo site_url();?>/contAdmin/loadMasters/<?php echo $tableName;?>'" />
					</td>
				</tr>
			</table>
			</form>
		</td>
		<td class="print" width="60%"><br />
			<div class="listtitle" style="width:300px;">
				<strong><?php echo $tableTitle;?></strong>
			</div>
			<table width="80%" align="LEFT" border="0">
				<tr>
					<th width="25%">Code</th>
					<th width="75%">Description</th>
				</tr>
				<?php if($tableData->num_rows() == 0){
				?>
				<tr>
					<td colspan="2"><font color="red">No data.</font></td>
				</tr>
				<?php }
				else{
					foreach($tableData->result() as $data){
				?>
				<tr>
					<td align="CENTER"><a href=""><u><?php echo $data->codevalue;?></u></a></td>
					<td><?php echo $data->descvalue;?></td>
				</tr>
				<?php }
				}
				?>
			</table>
		</td>
	</tr>
</table>
</html>