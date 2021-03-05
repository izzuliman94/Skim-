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

<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> <a href="registration_pt1.php">Company Registration</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Assign Labor</h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Assign Labor    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 

<strong>COMPANY NAME: <?php echo $ctr_comp_name;?> <br />
CLAB REGISTRATION NO.: <?php echo $ctr_clab_no;?></strong>
  <form action="<?php echo site_url();?>/contContractor/assignLabourPt2Search" method="POST" name="searchform" id="searchform">
<table width="100%" border="0">
	  <tr>
        <th colspan="2" align="LEFT">Search Criteria :</th>
      </tr>
      <tr>
      	<td width="15%">Search by:</td>
      	<td>
      		<input type="radio" name="searchby" value="wkr_name" CHECKED/> Name
      		<input type="radio" name="searchby" value="wkr_passno"/> Passport No.
      	</td>
      </tr>
	  <tr>
        <td>Keyword:</td>
        <td><input type="text" name="txtkeyword" size="60"/> (Multiple passport No./names allowed. Separate by comma. e.g., X111, B222, E333)</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="CENTER">
        		<input type="hidden" name="ctr_comp_name" value="<?php echo $ctr_comp_name;?>" />
        		<input type="hidden" name="ctr_clab_no" value="<?php echo $ctr_clab_no;?>" />
	     		<input type="submit" name="btnSearch" value="Search" />
	     		<input type="reset" name="btnBack" value=" Back " onclick="location.href='<?php echo site_url();?>/contContractor/assignLabourCompSearch';"/></td>
      </tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>
<?php if(isset($successfulAssigned)) echo $successfulAssigned;?>
<?php
if(isset($wkrRecord)){
?>
<form method="POST" action="<?php echo site_url();?>/contContractor/assignLaborSubmit" name="frmAssignLabor" id="frmAssignLabor" />
	<table width="100%" border="0">
		<tr>
			<th>&nbsp;</th>
			<th>PASSPORT NO</th>
			<th>NAME</th>
			<th>COUNTRY</th>
			<th>STATUS</th>
			<th>PERMIT EXPIRY DATE</th>
		</tr>
		<?php if($wkrRecord->num_rows() == 0){
		?>
		<tr>
			<td colspan="7"><font color="red">There is no data display. Please refine your search keyword.</font></td>
		</tr>
		<?php }
		else{
			foreach($wkrRecord->result() as $wkr){
		?>
		<tr>
			<td><input type="checkbox" name="workers[]" value="<?php echo $wkr->wkr_id;?>"/>
			<td><?php echo $wkr->wkr_passno;?></td>
			<td><?php echo $wkr->wkr_name;?></td>
			<td><?php echo $wkr->cty_desc;?></td>
			<td><?php echo $wkr->avlab_desc;?></td>
			<td><?php if($wkr->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($wkr->wkr_permitexp));?></td>
		</tr>
		<?php
				}//end foreach
			} //end else
		?>
		<tr>
			<td colspan="6" align="CENTER">
				<input type="hidden" name="ctr_comp_name" value="<?php echo $ctr_comp_name;?>" />
        		<input type="hidden" name="ctr_clab_no" value="<?php echo $ctr_clab_no;?>" />
				<input type="submit" name="btnAssign" value=" Assign Labor " />
				<input type="button" name="btnBack" value=" Cancel " onclick="history.back();" />
			</td>
		</tr>
	</table>
</form>
<?php	
}
?>
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
