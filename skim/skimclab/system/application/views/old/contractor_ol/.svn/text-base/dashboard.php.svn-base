<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Contractor Registration Online</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>

<h4> CLAB <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Contractor Online</h4>

<h3 id="switchsection1-title" class="handcursor">Welcome to Contractor Registration Online    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form action="<?php echo site_url('contContractorOl/searchCompany');?>" method="POST" name="searchCtrForm" id="searchCtrForm">
	<table width="50%" border="0">
		<tr>
			<th colspan="3">Register New (Or) Check CLAB Registration Status</td>
		</tr>
		<tr>
			<td>Company ROC Number</td>
			<td width="5%">:</td>
			<td><input type="text" name="txtcompanyroc" maxlength="20"/></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><input type="submit" value=" Submit " /></td>
		</tr>
	</table>
</form>
<br />
<?php if(isset($statusMsg)) echo "<div class=\"success\">" . $statusMsg . "</div>";?>
<?php
	if(isset($ctrRecord)){
		if($ctrRecord->num_rows() > 0){
			$ctrRow = $ctrRecord->row();
			echo "<div class=\"info\">Your Company $ctrRow->ctr_comp_name ($ctrRow->ctr_comp_regno) has been registered. <br />Registration status: <font color=\"red\">$ctrRow->appstatus_desc</font></div>";
		}	
	}
?>
</div>
</body>
</html>
