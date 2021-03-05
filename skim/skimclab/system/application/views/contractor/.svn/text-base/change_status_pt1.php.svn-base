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



<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> <a href="registration_pt1.php">Company Registration</a>  <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Change Status </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Company Registration - Change Status <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="<?php echo site_url();?>/contContractor/changeCtrStatusSearch" method="POST" name="frmSearch" id="frmSearch">
    <table width="100%" border="0">
      <tr>
        <td width="25%">Search company by</td>
        <td width="3%"><div align="center">:</div></td>
        <td width="72%">
        	<input type="radio" name="searchby" value="ctr_comp_name" CHECKED/>Company Name
        	<input type="radio" name="searchby" value="ctr_clab_no" />CLAB No
        	<input type="radio" name="searchby" value="ctr_comp_regno" />ROC Number
        </td>
      </tr>
      <tr>
        <td>Keyword</td>
        <td align="CENTER">:</td>
        <td><input type="text" name="txtkeyword" size="60" /></td>
      </tr>
      <tr>
        <td colspan="3" align="CENTER"><input type="submit" name="TypicalButton" value="Search" /></td>
      </tr>
    </table>
  </form>
<br />
<?php if(isset($ctrRecord)){	
?>
	<table width="100%" border="0">
		<tr>
			<th>CLAB No</th>
			<th>Company</th>
			<th>Grade</th>
			<th>Specialization</th>
			<th>Telephone</th>
			<th>CLAB Expiry Date</th>
			<th>CIDB Expiry Date</th>
			<th>Status</th>
			<th>Reg. Status</th>
			<th>&nbsp;</th>
		</tr>
		<?php if($ctrRecord->num_rows() == 0){
		?>
		<tr>
			<td colspan="9"><font color="red">There is no data to display. Please refine your search keyword.</font></td>
		</tr>
		<?php
		}else{
			foreach($ctrRecord->result() as $ctr){
		?>
		<tr>
			<td><?php echo $ctr->ctr_clab_no;?></td>
			<td><?php echo $ctr->ctr_comp_name;?></td>
			<td><?php echo $ctr->ctr_grade;?></td>
			<td><?php echo $ctr->ctr_spec;?></td>
			<td><?php echo $ctr->ctr_telno;?></td>
			<td align="CENTER"><?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?></td>
			<td align="CENTER"><?php echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?></td>
			<td align="CENTER"><?php echo $ctr->emp_status_desc;?></td>
			<td align="CENTER"><?php echo $ctr->appstatus_desc;?></td>
			<td><a href="<?php echo site_url();?>/contContractor/changeCtrStatusPt2/<?php echo $ctr->ctr_clab_no;?>">Change Status</a></td>
		</tr>
	<?php
			}//end foreach
		}//end else
	}//end if
	?>
	</table>
  <p align="center">&nbsp;</p>
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
