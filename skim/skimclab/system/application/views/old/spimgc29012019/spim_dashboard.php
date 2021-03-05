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

<h4><a href="dashboard.php">Spim (Renewal) </a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Dashboard </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Statistics   <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="" method="get" name="typicalform1" id="typicalform1">
    <table width="100%" border="0">
      <tr>
        <th width="50%"><div align="left">Description</div></th>
        <th width="25%"><div align="center">No. of Workorders</div></th>
      </tr>
      <tr>
      	<td>Total work orders (overall)</td>
      	<td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/overall"><?php echo $overall;?></a></td>
      </tr>
      <tr>
      	<td>Total workorders (received calling visa)</td>
      	<td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/closed"><?php echo $receiveVisa;?></a></td>
      </tr>
      <tr>
      	<td>Total workorders (open)</td>
      	<td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/open"><?php echo $open;?></a></td>
      </tr>
      <tr>
      	<td> -- Total received (Corporate Support)</td>
      	<td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/totalreceived"><?php echo $received;?></a></td>
      </tr>
      <tr>
      	<td> -- Total processed (Corporate Support)</td>
      	<td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/totalprocessed"><?php echo $processed;?></a></td>
      </tr>
      <tr>
        <td> -- Submit to Corporate Services</td>
        <td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/submithr"><?php echo $submithr;?></a></td>
      </tr>
      <tr>
        <td> -- Received by Corporate Services</td>
        <td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/receivehr"><?php echo $receivehr;?></a></td>
      </tr>
	  <tr>
        <td> -- JIM (outstanding)</td>
        <td align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/JIM"><?php echo $jim;?></a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th><div align="left">Immigration Approval </div></th>
        <th>Status</th>
      </tr>
      <tr>
        <td> <14 days </td>
        <td><div align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/lessFourteen"><?php echo $lt14days;?></a></div></td>
        </tr>
      <tr>
        <td>>14 days</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contRenewal/dashboardList/overFourteen"><?php echo $mt14days;?></a></div></td>
      </tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>

<h3 id="switchsection2-title" class="handcursor">Work orders pending for Extension<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection2" class="switchgroup1"> 
<table width="100%" border="0">
	<tr>
		<th width="5%">No.</th>
	  <th width="8%">Workorder Number</th>
	  <th width="30%">Company Name</th>
	  <th width="7%">Total FCL</th>
	  <th width="11%">Date Receive</th>
        <th width="19%">PIC</th>
	  <th width="20%">Latest Progress</th>
	</tr>
<?php if($woUnderCurrentUser->num_rows() == 0){?>
	<tr>
		<td colspan="6">
			<strong><font color="red">There is no workorder pending under current user.</font></strong>
		</td>
	</tr>
<?php }
	else{
		$i = 1;
		foreach($woUnderCurrentUser->result() as $wo){
?>
	<tr>
		<td><?php echo $i++;?>.</td>
		<td><a href="<?php echo site_url();?>/contRenewal/updateWorkOrderPt2/<?php echo $wo->wo_id;?>"><?php echo $wo->wo_id;?></a></td>
		<td><?php echo $wo->ctr_comp_name;?></td>
		<td align="CENTER"><?php echo $wo->wo_fcl_total;?></td>
		<td align="CENTER"><?php echo date('d-m-Y', strtotime($wo->wo_receivedate));?></td>
        <td align="CENTER"><?php echo $wo->wo_personincharge;?></td>
		<td><?php echo $wo->wo_latest_progress;?></td>
	</tr>
<?php }
}
?>
</table>		
</div>

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
