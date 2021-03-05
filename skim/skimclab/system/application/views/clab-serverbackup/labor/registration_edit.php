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



<h4><a href="dashboard.php">Labour</a> <img src="../images/right_arrow.gif" width="13" height="14" /> Labour Registration Update </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Registration Update   <img src="../images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="../labor/registration_edit_success.php" method="get" name="TypicalForm" id="TypicalForm">
    <table width="100%" border="0">
	
      <tr>
        <th width="19%"><div align="left">Registration Information </div></th>
        <th width="5%">&nbsp;</th>
        <th width="25%">&nbsp;</th>
		<th width="2%">&nbsp;</th>
        <th width="19%">&nbsp;</th>
        <th width="5%">&nbsp;</th>
        <th width="25%">&nbsp;</th>
      </tr>
      <tr>
        <td>Passport Number </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm" /></td>
        <td>&nbsp;</td>
        <td>Picture</td>
        <td><div align="center">:</div></td>
        <td rowspan="3"><img src="" alt="" name="picPassportPic" width="117" height="64" id="picPassportPic" /></td>
      </tr>
      <tr>
        <td>Name</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm4" /></td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Attach Pic" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Status</td>
        <td><div align="center">:</div></td>
        <td><select name="select2">
            <option value="1">Active</option>
            <option value="2">Inactive</option>
          </select>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Home Address</td>
        <td><div align="center">:</div></td>
        <td><textarea name="textarea"></textarea></td>
        <td>&nbsp;</td>
        <td>Current Address </td>
        <td><div align="center">:</div></td>
        <td><textarea name="textarea"></textarea></td>
      </tr>
      <tr>
        <td>Postcode</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm42" /></td>
        <td>&nbsp;</td>
        <td>PostCode</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm43" /></td>
      </tr>
      <tr>
        <td>Country</td>
        <td><div align="center">:</div></td>
        <td><select name="select">
            <option value="1">China</option>
            <option value="2">Indonesia</option>
            <option value="3">Malaysia</option>
            <option value="4">Myanmar</option>
            <option value="5">Singapore</option>
          </select>
        </td>
        <td>&nbsp;</td>
        <td>Country</td>
        <td><div align="center">:</div></td>
        <td><select name="select">
            <option value="1">China</option>
            <option value="2">Indonesia</option>
            <option value="3">Malaysia</option>
            <option value="4">Myanmar</option>
            <option value="5">Singapore</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Date of Birth </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFirstArrived2" /></td>
        <td>&nbsp;</td>
        <td>Age</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFirstArrived24" /></td>
      </tr>
      <tr>
        <td>Race</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFirstArrived22" /></td>
        <td>&nbsp;</td>
        <td>Nationality</td>
        <td><div align="center">:</div></td>
        <td><select name="select3">
            <option value="1">China</option>
            <option value="2">Indonesia</option>
            <option value="3">Malaysia</option>
            <option value="4">Myanmar</option>
            <option value="5">Singapore</option>
        </select></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFirstArrived23" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>First Arrived </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFirstArrived" />
            <img src="../images/cal.gif" id="dtFirstArrived_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Years in Malaysia </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm9" /></td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th><div align="left">Permits</div></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>
      <tr>
        <td>Passport Number </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm2" /> 
          <a href="../upload/attach.php">Attach</a></td>
        <td>&nbsp;</td>
        <td>Validity</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtPassportNo" />
            <img src="../images/cal.gif" id="dtPassportNo_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td>
      </tr>
      <tr>
        <td>PLKS Number </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm3" /></td>
        <td>&nbsp;</td>
        <td>Validity</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtPLKSNo" />
            <img src="../images/cal.gif" id="dtPLKSNo_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td>
      </tr>
      <tr>
        <td>FWCS Coverage </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm32" /></td>
        <td>&nbsp;</td>
        <td>Date of Issue </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtFWCSIssue" /> <img src="../images/cal.gif" id="dtFWCSIssue_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td>
      </tr>
      <tr>
        <td>I-KAD</td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="txtTypicalForm33" /></td>
        <td>&nbsp;</td>
        <td>Date of Issue </td>
        <td><div align="center">:</div></td>
        <td><input type="text" name="dtIKADIssue" /> <img src="../images/cal.gif" id="dtIKADIssue_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="TypicalButton" value="Update" /></td>
      </tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>
<p>

  <!--js for calendar date pick: Date To field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "dtFirstArrived",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtFirstArrived_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
	
	  Calendar.setup({
        inputField     :    "dtFWCSIssue",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtFWCSIssue_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
	
	  Calendar.setup({
        inputField     :    "dtIKADIssue",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtIKADIssue_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
	
	 Calendar.setup({
        inputField     :    "dtPassportNo",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtPassportNo_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
	  Calendar.setup({
        inputField     :    "dtPLKSNo",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtPLKSNo_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>

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
