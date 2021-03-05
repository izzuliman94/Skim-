<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url()?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url()?>js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>css/calendar-win2k-cold-1.css" title="win2k-cold-1" />

  <!-- main calendar program -->
  <script type="text/javascript" src="<?php echo base_url();?>js/calendar.js"></script>

  <!-- language for the calendar -->
  <script type="text/javascript" src="<?php echo base_url();?>js/calendar-en.js"></script>

  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="<?php echo base_url();?>js/calendar-setup.js"></script>
</head>

<body>
<h2>System Administration Dashboard</h2>

<div>
  <p><a href="javascript:adminreports.sweepToggle('contract')">Contract All</a> | <a href="javascript:adminreports.sweepToggle('expand')">Expand All</a></p>
</div>

<table width="100%" border="0">
  <tr>
    <td width="62%"><h3 id="adminreports1-title" class="handcursor">Statistics <img src="<?php echo base_url()?>images/down_arrow_org.gif" width="13" height="14" /></h3></td>
    <td width="38%"><h3> Date : <?php echo date('j F Y');?> </h3>

 </td>
  </tr>
</table>
<div id="adminreports1" class="switchgroup1">
  <h4>Total Number of Users : <?php echo $totalusers;?></h4>
  <h4>Total Number of Groups: <?php echo $totalgroups;?></h4>
<table width="100%" border="0" cellpadding="0">
  <tr>
  	<th colspan="3">STATISTICS OF USERS PER GROUP</th>
  </tr>
  <tr>
    <th width="47%">Groups</th>
    <th width="3%">&nbsp;</th>
    <th width="50%">No of Users </th>
  </tr>
  <?php foreach($allGroups->result() as $group){?>
  <tr>
    <td><?php echo $group->group_name;?></td>
    <td>:</td>
    <td><?php $var = "group_" . $group->group_id;
    		  echo $$var; ?></td>
  </tr>
  <?php }?>
</table>
<br />
<h4>Total Number of Facilities: <?php echo $allEntities->num_rows();?></h4>
<table width="100%" border="0">
  <tr>
  	<th colspan="3">STATISTICS OF FACILITIES</th>
  </tr>
  <tr>
    <th width="47%">Facility type</th>
    <th width="3%">&nbsp;</th>
    <th width="50%">Total</th>
  </tr>
  <tr>
  	<td>Hospitals</td>
  	<td>:</td>
  	<td><?php echo $totalhospitals;?></td>
  </tr>
  <tr>
  	<td>Clinics</td>
  	<td>:</td>
  	<td><?php echo $totalclinics;?></td>
  </tr>
  <tr>
  	<td>Labs</td>
  	<td>:</td>
  	<td><?php echo $totallabs;?></td>
  </tr>
  <tr>
  	<td>Others</td>
  	<td>:</td>
  	<td><?php echo $totalOthers;?></td>
  </tr>
 </table>
 <br />
</div>

	<script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var adminreports=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
adminreports.setColor('darkred', 'black')
adminreports.setPersist(true)
adminreports.collapsePrevious(true) //Only one content open at any given time
adminreports.init()
    </script>
    </p>
  </form>
</body>
</html>