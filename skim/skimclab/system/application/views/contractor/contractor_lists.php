<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contractors List</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>

<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Contractors List </h4>
<h2>Contractors List</h2>
<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Search<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form action="<?php echo site_url();?>/contContractor/searchContractors" method="POST" name="searchForm" id="searchForm">
	<table width="100%" border="0">
		<tr>
			<td>Search by</td>
			<td>
				<table width="500px" border="0">
					<tr>
						<td><input type="radio" name="searchby" value="ctr_clab_no" CHECKED />Clab No</td>
						<td><input type="radio" name="searchby" value="ctr_comp_name" />Company Name</td>
						<td><input type="radio" name="searchby" value="ctr_grade" />Grade</td>
						<td><input type="radio" name="searchby" value="ctr_spec" />Specialization</td>
					</tr>
					<tr>
						<td colspan="2"><input type="radio" name="searchby" value="ctr_clabexp_date" />CLAB Expiry Date (dd-mm-yyyy) </td>
						<td colspan="2"><input type="radio" name="searchby" value="ctr_cidbexp_date" />CIDB Expiry Date (dd-mm-yyyy)</td>
					</tr>
					<tr>
						<td><input type="radio" name="searchby" value="appstatus_desc" />Reg. Status</td>
						<td><input type="radio" name="searchby" value="emp_status_desc" />Status</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>Keyword</td>
			<td><input type="text" name="keyword" size="70" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="search" value=" Search " />
				<input type="button" name="btnReset" value=" Reset " onclick="location.href='<?php echo site_url();?>/contContractor/ctrList'" />
			</td>
		</tr>
	</table>
</form>
<br />
<table width="100%" border="0">
	<tr>
		<th colspan="9" align="LEFT">CONTRACTORS LIST</th>
	</tr>
</table>
	<?php if(isset($crud)) echo $crud;?>
</div>

      <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var switchsection=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
switchsection.setColor('darkred', 'black')
switchsection.setPersist(true)
switchsection.collapsePrevious(true) //Only one content open at any given time
switchsection.init()
    </script>
</p>

</body>
</html>
