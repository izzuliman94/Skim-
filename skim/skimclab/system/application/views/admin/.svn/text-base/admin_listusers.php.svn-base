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
<?php if(isset($extra_head)) echo $extra_head; ?>
</head>

<body>

<h4> System administration  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" />Users List</h4>

<h2>Users List</h2>

<div><a href="javascript:adminlistusers.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminlistusers.sweepToggle('expand')">Expand All</a></div>

<h3 id="adminlistusers1-title" class="handcursor">Search <img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="adminlistusers1" class="switchgroup1">
<form name="searchUserForm" method="POST" action="<?php echo site_url();?>/contAdmin/searchUsers">
<?php if(isset($successMsg)) echo "<strong><font color=\"red\">" . $successMsg . "</font></strong>";?>
<table width="100%" border="0">
	<tr>
		<td width="25%">Search by</td>
		<td><input type="radio" name="searchby" value="emp_num">Emp No &nbsp;
			<input type="radio" name="searchby" value="emp_name" CHECKED>Emp Name &nbsp;
			<input type="radio" name="searchby" value="emp_position">Designation &nbsp;
			<input type="radio" name="searchby" value="dpt_name">Department
			</select></td>
	</tr>
	<tr>
		<td>Keyword</td>
		<td><input type="text" name="keyword" size="50"/></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="Search" value="Search" />
			<input type="button" name="btnReset" value="Reset" onclick="location.href='<?php echo site_url();?>/contAdmin/listUsers'" />
		</td>
	</tr>
</table>
</form>
<br />
<table width="100%" border="0">
	<tr>
		<th align="LEFT" colspan="5">USERS LIST</th>
	</tr>
	<tr>
		<th width="3%">No.</th>
		<th>Employee No</th>
		<th>Employee Name</th>
		<th>Designation</th>
		<th>Department</th>
	</tr>
<?php
	foreach($employees->result() as $row){
?>
	<tr>
		<td><?php echo $row->emp_id;?></td>
		<td><a href="<?php echo site_url();?>/contAdmin/editUser/<?php echo $row->emp_id;?>"><?php echo $row->emp_num;?></a></td>
		<td><?php echo $row->emp_name;?></td>
		<td><?php echo $row->emp_position;?></td>
		<td><?php echo $row->dpt_name;?></td>
	</tr>
<?php
} //end foreach
?>
</table>


<?php echo $this->pagination->create_links(); ?>

</div>
<script type="text/javascript">
	//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
	//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
	//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
	//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
	//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
	//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
	//6) Instance.init() REQUIRED

	var adminlistusers=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
	//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
	adminlistusers.setColor('darkred', 'black')
	adminlistusers.setPersist(true)
	adminlistusers.collapsePrevious(true) //Only one content open at any given time
	adminlistusers.init()
</script>
</body>
</html>
