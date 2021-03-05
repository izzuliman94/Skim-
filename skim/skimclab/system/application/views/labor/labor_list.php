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
<!--new calendar-->
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
    <script type="text/javascript">
        function datebutton_onclick(elementId, thisRef)
        {
	        switch (scwVisibilityStatus)
	        {
		        case "hidden":
			        scwShow(document.getElementById(elementId), thisRef);
			        break;
		        case "visible":
			        scwHide();
	        }
        }
    </script>	
</head>

<body>



<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Labour List</h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">LABOUR LIST<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 

<form action="<?php echo site_url();?>/contLabour/searchLabourList" method="POST" name="searchLabourForm" id="searchLabourForm">
	<table width="100%" border="0">
		<tr>
			<th colspan="3" align="LEFT">Search Labours</th>
		</tr>
		<tr>
			<td rowspan="2">Search by</td>
            <td><select name="searchby">
                 <option value="wkr_passno">Passport No</option>
                 <option value="wkr_oldpassno">Old Passport No</option>
                 <option value="wkr_name">Name</option> 
				 <option value="state_name">Location</option>
                 <option value="cty_desc">Country</option>
                 <option value="ctr_comp_name">Company</option>
                </select>
			</td>
			<td><input type="text" name="keyword" size="50" /> </td>
		</tr>
		<tr>
			<td><input type="radio" name="searchby" value="wkr_permitexp" />Permit Expiry Date (dd-mm-yyyy) </td>
			<td>From: <input type="text" name="datefrom" id="datefrom" size="10" />
			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('datefrom'), this)" />
			 To: <input type="text" name="dateto" id="dateto" size="10" />
			 <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dateto'), this)" />
			</td>
		</tr>
		<tr>
		   <td>&nbsp;</td>
		   <td><input type="radio" name="searchby" value="wkr_status" />Status</td>
		   <td><select name="optstatus">
		       <option value="1">Active</option>
			   <option value="2">In-Active</option>
			   <!--option value="ALL">Both</option-->
			   </select>
			   </td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="search" value="Search"/>
				<input type="button" name="Reset" value=" Reset " onclick="location.href='<?php echo site_url();?>/contLabour/listLabour';"/>
			</td>
		</tr>
	</table>
</form>
<br />
<table width="100%" border="0">
	<tr>
		<th align="LEFT">LABOURS LIST</th>
	</tr>
</table>
<?php if(isset($crud)) echo $crud;?>
<?php if(isset($searchby)) echo $searchby;
	  if(isset($keyword)) echo $keyword;
	  ?>
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
