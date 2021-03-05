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

<h4><a href="dashboard.php">SPIM (G1G3)</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Dashboard </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Statistics   <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="" method="get" name="typicalform1" id="typicalform1">
    <table width="100%" border="1" style="border-collapse: collapse" bordercolor='#FFF'>
		<tr>
			<th align="left">Description</th>
			<th align="center" width=220>Total Work Order</th>
			<th align="center" width=220>Total Worker</th>
			<th align="center" colspan=2>Remarks</th>
		</tr>
		<tr>
			<td>Current In Stock</td>
			<td align="center"></td>
			<td align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardLaborList/overall"><?php echo $totlabreg;?></a></td>
			<td align="center" colspan=2></td>
		</tr>
		<tr>
			<td>Current Worker Under G1G3 Contractor</td>
			<td align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardList/overall"><?php echo $overall;?></td>
			<td align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardLaborWo/chkout"><?php echo $totlabrel;?></a></td>
			<td align="center" colspan=2></td>
		</tr>
		<tr><td colspan=5>&nbsp;</td></tr>
		<tr>
			<th align="left">Description</th>
			<th align="left" >Work Order Status</th>
			<th align="center" >Total Work Order</th>
			<th align="left" >Work Order Status</th>
			<th align="center" >Total Work Order</th>
		</tr>
		<tr>
			<td rowspan=5 valign=top>Total Work Order by G1G3 Process</td>
			<td align=left>Work Order Submitted</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/1"><?php echo $totwo1;?></td>
			<td align=left width=200>Process CIMS</td>
			<td align=center width=200><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/2"><?php echo $totwo2;?></td>
		</tr>
		<tr>
			<td align=left>Penerimaan Permohonan</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/3"><?php echo $totwo3;?></td>
			<td align=left>Semakan</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/4"><?php echo $totwo4;?></td>
		</tr>
		<tr>
			<td align=left>Temuduga</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/5"><?php echo $totwo5;?></td>
			<td align=left>Kelulusan JKK Pelulus</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/6"><?php echo $totwo6;?></td>
		</tr>
		<tr>
			<td align=left>Transit Center : Labour Check-Out</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/7"><?php echo $totwo7;?></td>
			<td align=left>Transit Center : Labour Check-In</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/8"><?php echo $totwo8;?></td>
		</tr>
		<tr>
			<td align=left>Work Order Closed</td>
			<td align=center><a href="<?php echo site_url();?>/contSpimG/dashboardProcess/9"><?php echo $totwo9;?></td>
			<td></td>
			<td></td>
		</tr>
		<tr><td colspan=5>&nbsp;</td></tr>
		<tr>
			<th align="left">G1G3 Contract Expiry</th>
			<th align="center">Total Work Order</th>
			<th align="center" colspan=3></th>
		</tr>
		<tr>
			<td style='color:red'> < 0 month</td>
			<td><div align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardListExpiry/less0m/0"><?php echo $less0;?></a></div></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>
		<tr>
			<td style='color:red'> < 1 month</td>
			<td><div align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardListExpiry/less1m/1"><?php echo $less1;?></a></div></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>
		<tr>
			<td> < 2 month</td>
			<td><div align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardListExpiry/less2m/2"><?php echo $less2;?></a></div></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>
		<tr>
			<td> < 3 month</td>
			<td><div align="center"><a href="<?php echo site_url();?>/contSpimG/dashboardListExpiry/less3m/3"><?php echo $less3;?></a></div></td>
			<td align="center"></td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>
		<tr><td colspan=5>&nbsp;</td></tr>
    </table>
  </form>
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
