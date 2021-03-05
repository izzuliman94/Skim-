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

 <SCRIPT language="JavaScript">
function OnSubmitForm()
{
  if(document.pressed == 'Approved')
  {
   document.TypicalForm.action ="approval_success.php";
  }
  else
  if(document.pressed == 'Rejected')
  {
    document.TypicalForm.action ="rejected_success.php";
  }
  return true;
}
</SCRIPT>

<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="../css/calendar-win2k-cold-1.css" title="win2k-cold-1" />

  <!-- main calendar program -->
  <script type="text/javascript" src="../js/calendar.js"></script>

  <!-- language for the calendar -->
  <script type="text/javascript" src="../js/calendar-en.js"></script>

  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="../js/calendar-setup.js"></script>
  
</head>

<body>



<h4><a href="dashboard.php">Immigration</a> <img src="../images/right_arrow.gif" width="13" height="14" /> <a href="approval_status.php">Approval Status</a> <img src="../images/right_arrow.gif" width="13" height="14" /> Immigration </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Approval - Immigration       <img src="../images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="../immigration/approval_immigration_success.php" method="get" name="TypicalForm" id="TypicalForm">
    <table width="100%" border="0">
	
      <tr>
        <td>Work Order # </td>
        <td>&nbsp;</td>
        <td>&lt;Work Order #&gt; </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="19%">Number of Labor </td>
        <td width="5%"><div align="center">:</div></td>
        <td width="25%">&lt;Labor Total&gt; </td>
        <td width="2%">&nbsp;</td>
        <td width="25%"><a href="search_attach_labor_pt1.php"></a></td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>Status </td>
        <td><div align="center">:</div></td>
        <td><select name="select">
          <option value="1">Inactive</option>
          <option value="2">Suspended</option>
          <option value="3">Blacklisted</option>
        </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Reasons</td>
        <td><div align="center">:</div></td>
        <td><textarea name="textarea2"></textarea></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>Comments </td>
        <td><div align="center">:</div></td>
        <td><textarea name="textarea"></textarea></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="TypicalButton" value="Save" /></td>
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
