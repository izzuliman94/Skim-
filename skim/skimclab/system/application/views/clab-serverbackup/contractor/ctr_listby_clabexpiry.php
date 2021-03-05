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

<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> List of contractors by <?php echo $titleType;?> Reg. Expiry</h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor"><?php echo $title;?><img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<table width="1070" border="0">
  <tr>
    <td width="231"><span class="print">Date: <?php echo date('j F Y');?></span></td>
    <td width="829"><div align="right"><span class="print">
      <input type="button" align="right" name="btnRefresh" value="Refresh" onclick="window.location.reload()" />
    </span></div></td>
  </tr>
</table>
<div id="switchsection1" class="switchgroup1"> 
<div align="left"><?php if($contractorList->num_rows() > 0){ ?>
</div>
<table width="100%" border="0">
	
	<tr>
		<th>No.</th>
		<th>CLAB No</th>
		<th>Company</th>
		<th>Status</th>
		<th>Grade</th>
		<th>Skill</th>
		<th><?php echo $titleType;?> Expiry Date</th>
		<th>Period Reg. (CLAB)</th>
		<th>Printed Date</th>
		<th>View / Print</th>
	</tr>
	<?php $i = 1; 
		foreach($contractorList->result() as $ctr){
	?>
	<tr>
		<td><?php echo $i++;?>.</td>
		<td><?php echo $ctr->ctr_clab_no;?></td>
		<td><?php echo $ctr->ctr_comp_name;?></td>
		<td><?php echo $ctr->ctr_appstatus;?></td>
		<td><?php echo $ctr->ctr_grade;?></td>
		<td><?php echo $ctr->ctr_category;?></td>
		<td><?php if($titleType == "CLAB") echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date)); 
		    	  else echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date)); 
		    ?>		</td>
		<td><?php echo $ctr->ctr_periodreg;?> Years</td>
		<td><?php if(strlen($ctr->print_date)>0) echo date('d-m-Y', strtotime($ctr->print_date));?></td>
<td><?php if($titleType == "CLAB"){?>
		     <input type="button" name="btnPrintRenewal" value="View " onclick="window.open('<?php echo site_url();?>/contContractor/viewRegisRenewal/$fieldName/<?php echo $ctr->ctr_clab_no . "/" . $noOfMonths?>');"/>
		     <input type="button" name="btnPrintRenewal2" value="Print Renewal" onclick="window.open('<?php echo site_url();?>/contContractor/printRegisRenewal/$fieldName/<?php echo $ctr->ctr_clab_no . "/" . $noOfMonths?>');"/>
		     <?php }
		     ?>		</td>
	</tr>
	<?php } //end foreach
	?>
</table>
<?php } //end if 
else{
	echo "<font color=\"red\"><strong>There is no data to display.</strong></font>";
}
?>
<table width="100%" border="0">
	<tr>
		<td align="CENTER"><input type="button" name="btnBack" value="Back to Dashboard" onclick="history.back();" /><td>
	</tr>
</table>
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
