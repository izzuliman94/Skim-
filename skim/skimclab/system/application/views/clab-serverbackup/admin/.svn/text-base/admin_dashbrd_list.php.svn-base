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

<h4> <a href="<?php echo site_url();?>/contAdmin/dashbrd">System Administration Dashboard</a>  <img src="<?php echo base_url() ?>images/right_arrow.gif" width="13" height="14" />List Users</h4>

<h2> Add User </h2>
<h3 id="admindashbrd1-title" class="handcursor">List of users from <?php echo $dpt_name;?> department<img src="<?php echo base_url() ?>images/down_arrow_org.gif" width="13" height="14" /></h3>
<table width="100%" border="0">
	<tr>
		<th width="5%">No.</th>
		<th width="15%">Employee No.</th>
		<th width="30%">Employee Name</th>
		<th width="25%">Designation</th>
		<th width="25%">emp_email</th>
	</tr>
	<?php 
	if($userData->num_rows() == 0){
	?>
	<tr>
		<th colspan="5"><font color="red">There is no employee under this department.</font></th>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($userData->result() as $emp){
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><a href="<?php echo site_url();?>/contAdmin/editUser/<?php echo $emp->emp_id;?>"><?php echo $emp->emp_num;?></td>
		<td><?php echo $emp->emp_name;?></td>
		<td><?php echo $emp->emp_position;?></td>
		<td><?php echo $emp->emp_email;?></td>
	</tr>
	<?php }
	}?>
	<tr>
		<td class="print" align="CENTER" colspan="5"><input type="button" name="btnBack" value="Back to Dashboard" onclick="history.back();" /></td>
	</tr>
</table>
<script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var admindashbrd=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
admindashbrd.setColor('darkred', 'black')
admindashbrd.setPersist(true)
admindashbrd.collapsePrevious(true) //Only one content open at any given time
admindashbrd.init()
</script>
</body>
</html>
