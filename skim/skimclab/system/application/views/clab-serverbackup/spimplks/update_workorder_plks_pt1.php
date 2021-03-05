<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
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



<h4><a href="dashboard.php">Immigration</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Workorder </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Update  Workorder     <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url();?>/contSpim/updateWorkOrderSearchPLKS" method="POST" name="updateWorkorderForm" id="updateWorkorderForm">
    <table width="100%" border="0">
		
      <tr>
        <td width="20%">Search By</td>
        <td width="80%"><input type="radio" name="searchby" value="wo_num" CHECKED/>Workorder Number 
        	<input type="radio" name="searchby" value="ctr_comp_name" />
        	Company Name 
        	<input type="radio" name="searchby" value="fcl_passno" />
Passport No</td>
      </tr>
      <tr>
        <td>Keyword</td>
        <td><input type="text" name="txtkeyword" size="50"/></td>
      </tr>
      <tr>
        <td colspan="2" align="CENTER"><input type="submit" name="btnSearch" value="Search" /></td>
      </tr>
    </table>
  </form>
<br />
<?php 
	if(isset($ctrRecord)){
?>
	<table width="100%" border="0">
		<tr>
			<th width="15%">Workorder ID</th>
			<th width="15%">CLAB No</th>
			<th width="30%">Company name</th>
			<th width="15%">Total FCL</th>
			<th width="25%">Latest Progress</th>
		</tr>
		<?php 
		if($ctrRecord->num_rows() == 0){
		?>
		<tr>
			<td colspan="5"><font color="red">There is no data to display. Please refine your search keyword.</font></td>
		</tr>
		<?php }
		else {
			foreach($ctrRecord->result() as $ctr){
		?>
		<tr>
			<td><a href="<?php echo site_url();?>/contSpim/updateWorkOrder_pt3/<?php echo $ctr->wo_id;?>"><?php if(strlen($ctr->wo_num) > 0) echo $ctr->wo_num; else echo $ctr->wo_id;?></a></td>
			<td><?php echo $ctr->wo_clab_no;?></td>
			<td><?php echo $ctr->ctr_comp_name;?></td>
			<td><?php echo $ctr->wo_fcl_total;?></td>
			<td><?php echo $ctr->wo_latest_progress;?></td>
		</tr>			
		<?php }
		}
		?>
	</table>
<?php }
?>
</div>
<p>
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
