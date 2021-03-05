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
<h4><a href="dashboard.php">SPIM (Renewal) </a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Workorder <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Attach Files </h4>

<h3 id="switchsection1-title" class="handcursor">Attach Files<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 

  <form action="<?php echo site_url();?>/contRenewal/uploadDoc" method="POST" name="uploadForm" id="uploadForm" enctype="multipart/form-data">
    <strong>Current Workorder ID : <?php echo $workorderid;?><br />
    Cotractor ID: <?php echo $companyname;?> </strong>
    <br />
    <?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
	<?php if(isset($error)) echo $error;?>
  	<table width="100%" border="0">
      	<tr>
      		<td>File Type:</td>
    		<td><input type="radio" name="filetype" value="reqform" CHECKED/>FCL List
    		</td>
      	</tr>
      	<tr>
      		<td>Location :</td>
      		<td><input type="file" name="userfile" size="80" /></td>
      	</tr>
      	<tr>
      		<td colspan="2" align="center"><br />
      			<input type="hidden" name="workorderid" value="<?php echo $workorderid;?>" />
      			<input type="hidden" name="companyname" value="<?php echo $companyname;?>" />
      			<input type="submit" name="Upload" value=" Upload " />
      			<input type="button" name="btnDone" value=" Close " onclick="closeAndRefresh();" />
      		</td>
      	</tr>
    </table>
  </form>
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
