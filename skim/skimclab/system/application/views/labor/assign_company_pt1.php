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

<h4><a href="<?php echo site_url();?>/contLabour/labourDashbrd">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Assign Company </h4>
<h3 id="switchsection1-title" class="handcursor">Assign Company     <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url();?>/contLabour/assignCompanySearchLabor" method="POST" name="frmAssignComp" id="frmAssignComp">
    <table width="100%" border="0">
		<tr>
        <td width="25%">Search by</td>
        <td width="3%"><div align="center">:</div></td>
        <td width="72%">
        	<input type="radio" name="searchby" value="wkr_passno" CHECKED/>Passport No
        	<input type="radio" name="searchby" value="wkr_name" />Name
        </td>
      </tr>
      <tr>
        <td>Keyword</td>
        <td align="CENTER">:</td>
        <td><input type="text" name="txtkeyword" size="50" /></td>
      </tr>
      <tr>
        <td colspan="3" align="CENTER"><input type="submit" name="TypicalButton" value="Search" /></td>
      </tr>
    </table>
  </form>
  	<?php if(isset($errorMsg)||isset($successMsg)){?>
  	<table width="80%" border="0">
  	  <tr>
  	  	<td class="print">
  	  		<?php if(isset($errorMsg)) echo "<div class=\"warning\">" . $errorMsg . "</div>";?>
  	  		<?php if(isset($successMsg)) echo "<div class=\"success\">" . $successMsg . "</div>";?>
  	  	</td>
  	  </tr>
  	</table?
  	<?php 
		}
	?>
  <br />
  <?php
if(isset($wkrRecord)){
?>
	<table width="100%" border="0">
		<tr>
			<th>PASSPORT NO</th>
			<th>NAME</th>
			<th>COUNTRY</th>
			<th>STATUS</th>
			<th>PERMIT EXPIRY DATE</th>
			<th>&nbsp;</th>
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
			<td><a href="<?php echo site_url();?>/contLabour/labourDetails/<?php echo $wkr->wkr_id;?>"><?php echo $wkr->wkr_passno;?></a></td>
			<td><?php echo $wkr->wkr_name;?></td>
			<td><?php echo $wkr->cty_desc;?></td>
			<td><?php echo $wkr->emp_status_desc;?></td>
			<td><?php if($wkr->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($wkr->wkr_permitexp));?></td>
			<td><a href="<?php echo site_url();?>/contLabour/assignCompanyPt2/<?php echo $wkr->wkr_id;?>">Assign Company</a></td>
		</tr>
		<?php
				}//end foreach
			} //end else
		?>
	</table>
<?php	
}
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
