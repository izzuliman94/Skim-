<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="../css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>


</head>

<body>



<h4><a href="dashboard.php">Contractor</a> <img src="../images/right_arrow.gif" width="13" height="14" /> Company Registration Update </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Company Registration Details  <img src="../images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="../contractor/registration_edit_success.php" method="get" name="TypicalForm" id="TypicalForm">
    <table width="100%" border="0">
	
      <tr>
        <td width="25%">ROC Number </td>
        <td width="5%"><div align="center">:</div></td>
        <td width="70%">&lt;Roc Number&gt; </td>
      </tr>
      <tr>
        <td>Name of Company </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm" /></td>
      </tr>
	   <tr>
        <td>Address</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm2" /></td>
      </tr>
	   <tr>
        <td>Phone Number </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm3" /></td>
      </tr>
	   <tr>
        <td>Contact Person </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm4" /></td>
      </tr>
	  <tr>
        <td>CIDB Registration </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm4" /></td>
      </tr>
	   <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  
      <tr>
        <td><a href="../upload/attach.php">Attach Doc</a></td>
        <td>&nbsp;</td>
        <td><input type="submit" name="TypicalButton" value="Update" /></td>
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
