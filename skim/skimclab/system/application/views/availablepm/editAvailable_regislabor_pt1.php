<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Local Transfer</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script type="text/javascript">
		//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
</script>
</head>

<body>



<h4><a href="dashboard.php">Pertukaran Majikan</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Edit Pertukaran Majikan<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Register New Labour</h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Pertukaran Majikan - REGISTER NEW LABOUR<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<strong>Reference No.: <?php echo $avlabRecord->avlab_ref_no;?> <br />
Company (FROM) : <?php echo $avlabRecord->comp_from;?><br />
Compnay (TO) : <?php echo $avlabRecord->comp_to;?>
</strong>

  <form action="<?php echo site_url();?>/contAvailablepm/regisNewLabourPt2" method="POST" name="TypicalForm" id="TypicalForm">
    <table width="80%" border="0">	
      <tr>
      	<th colspan="3" align="LEFT">Search Labour Form</th>
      </tr> 
      <tr>
        <td width="25%">Passport Number </td>
        <td width="5%"><div align="center">:</div></td>
        <td width="70%"><input type="text" name="txtPassNo" maxlength="20"/>
        	<input type="hidden" name="txtavlab_refno" value="<?php echo $avlabRecord->avlab_ref_no;?>" />
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="btnAddNewLabour" value="Search Labor" />
        	<input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" />
        </td>
      </tr>
    </table>
  </form>
  <br />
  <?php if(isset($regisSuccessMsg)) echo "<div class=\"success\" style=\"width:700px;\">" . $regisSuccessMsg . "</div>";?>
  <?php if(isset($warningMsg)) echo "<div class=\"warning\" style=\"width:700px;\">" . $warningMsg . "</div>";?>
  <?php if(isset($nonExistsMsg)) echo "<div class=\"info\" style=\"width:400px;\">" . $nonExistsMsg;?> <?php if(isset($registerbutton)) echo $registerbutton . "</div>";?>
  <strong><font color="red"><?php if(isset($successMsg)) echo "<div class=\"success\" style=\"width:800px;\">" . $successMsg . "</div>";?></font></strong>
  <?php if(isset($existingLabour)){?>
  	<div class="info" style="width:600px;">Labor exists. Click "Register this labour" to add this worker for Pertukaran Majikan.</div>
  <form method="POST" name="addAvailableForm" action="<?php echo site_url();?>/contAvailablepm/regisExistingLabour">
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
  		<td><?php echo $existingLabour->wkr_passno;?></td>
  		<td><?php echo $existingLabour->wkr_name;?></td>
  		<td><?php echo $existingLabour->emp_status_desc;?></td>
  		<td><?php echo $existingLabour->cty_desc;?></td>
  		<td><?php echo $existingLabour->race_desc;?></td>
  		<td><?php echo date('d-m-Y', strtotime($existingLabour->wkr_permitexp));?></td>
  	</tr>
  	<tr>
  		<td colspan="6" align="CENTER">
  				<input type="hidden" name="txtwkrid" value="<?php echo $existingLabour->wkr_id;?>" />
  				<input type="hidden" name="txtavlab_refno" value="<?php echo $avlabRecord->avlab_ref_no;?>" />
  				<input type="hidden" name="txtpassno" value="<?php echo $existingLabour->wkr_passno;?>" />
  				<input type="hidden" name="txtwkrname" value="<?php echo $existingLabour->wkr_name;?>" />
  				<input type="hidden" name="txtcompto" value="<?php echo $avlabRecord->comp_to;?>" />
  				<input type="hidden" name="compto_clabno" value="<?php echo $avlabRecord->comp_to_clabno;?>" />
  				<input type="submit" name="btnAddAvailable" value="Register this Labour" onclick="return confirm('Are you sure you want to register this labour for local transfer?');"/>	
  		</td>
  	</tr>
  </table>
  </form>
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
