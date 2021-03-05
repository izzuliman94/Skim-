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
<h4><a href="<?php echo site_url();?>/contLabour/labourDashbrd">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Registration </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Registration    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="<?php echo site_url();?>/contLabour/newLabourDetails" method="POST" name="TypicalForm" id="TypicalForm">
    <table width="100%" border="0">	
      <tr>
        <td width="25%">Passport Number </td>
        <td width="5%"><div align="center">:</div></td>
        <td width="70%"><input type="text" name="txtPassNo" maxlength="20"/></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="TypicalButton" value="Add New Labour" /></td>
      </tr>
    </table>
  </form>
  <br />
  <?php if(isset($existingLabour)){?>
  <font color="red">The labour with passport number <strong> <?php echo $existingLabour->wkr_passno;?> </strong>has already been recorded in the system.</font>
  <table width="100%" border="0">
  	<tr>
  		<th>PASSPORT NO</th>
  		<th>NAME</th>
  		<th>STATUS</th>
  		<th>COUNTRY</th>
  		<th>RACE/ETHNIC</th>
  		<th>PERMIT EXPIRY DATE</th>
  	</tr>
  	<tr>
  		<td><a href="<?php echo site_url();?>/contLabour/labourDetails/<?php echo $existingLabour->wkr_passno;?>"><?php echo $existingLabour->wkr_passno;?></a></td>
  		<td><?php echo $existingLabour->wkr_name;?></td>
  		<td><?php echo $existingLabour->emp_status_desc;?></td>
  		<td><?php echo $existingLabour->wkr_country;?></td>
  		<td><?php echo $existingLabour->wkr_race;?></td>
  		<td><?php echo date('d-m-Y', strtotime($existingLabour->wkr_permitexp));?></td>
  	</tr>
  </table>
  <?php } ?>
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
