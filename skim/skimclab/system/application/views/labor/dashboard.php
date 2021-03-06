<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/10/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Labour Dashboard</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- ? Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</head>

<body>

<h4>Labour <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Dashboard </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>
<h3 id="switchsection1-title" class="handcursor">Statistics of Labour<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
    <table width="100%" border="0">
      <tr>
        <th width="50%"><div align="left">Description</div></th>
        <th width="25%"><div align="center">Total</div></th>
        <th width="25%">Percentage</th>
      </tr>
      <tr>
        <td>Total Labour in Database </td>
        <td><div align="center"><?php echo $totalLabours;?></div></td>
        <td align="CENTER"><?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round (($totalLabours /$totalLabours) * 100.00, 2);
    			  }
    		?>%</td>
      </tr>
      <tr>
      	<td>Active</td>
      	<td align="CENTER"><?php echo $totalActive;?></td>
      	<td align="CENTER"><?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round (($totalActive/$totalLabours) * 100.00, 2);
    			  }
    		?>%</td>
      </tr>
      <tr>
      	<td>In-active</td>
      	<td align="CENTER"><?php echo $totalInactive;?></td>
      	<td align="CENTER"><?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round (($totalInactive/$totalLabours) * 100.00, 2);
    			  }
    		?>%</td>
      </tr>
      <tr>
      	<th colspan="3" align="LEFT">FCL Movement Status</th>
      </tr>
	  <tr>
	    <td>Registered</td>
	    <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/1"><?php echo $totalRegistered;?></a></div></td>
	    <td><div align="center">
	      <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalRegistered/$totalLabours) * 100.00, 2);
    			  }
    		?>
	      % </div></td>
      </tr>
	  <tr>
        <td>Available</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/4"><?php echo $totalAvailable;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalAvailable/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>Accepted</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/2"><?php echo $totalAccepted;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalAccepted/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Booked</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/6"><?php echo $totalBooked;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalBooked/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Hired</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/7"><?php echo $totalHired;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalHired/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>Rehiring</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/21"><?php echo $totalRehiring;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalRehiring/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Runaway</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/8"><?php echo $totalRunaway;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalRunaway/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Unknown</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/9"><?php echo $totalUnknown;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalUnknown/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Com/Deported</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/10"><?php echo $totalDeported;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalDeported/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Death</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/11"><?php echo $totalDeath;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalDeath/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Leave without notice</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/14"><?php echo $totalWithoutNotice;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalWithoutNotice/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
       <tr>
        <td>Leave with notice</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/15"><?php echo $totalWithNotice;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalWithNotice/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
       <tr>
         <td>Permit Expired</td>
         <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/12"><?php echo $totalPermitExpired;?></a></div></td>
         <td><div align="center">
           <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalPermitExpired/$totalLabours) * 100.00, 2);
    			  }
    		?>
           % </div></td>
       </tr>
	   <tr>
         <td>Passport Expired</td>
         <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/13"><?php echo $totalPassExp;?></a></div></td>
         <td><div align="center">
           <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalPassExp/$totalLabours) * 100.00, 2);
    			  }
    		?>
           % </div></td>
       </tr>
       <tr>
         <td>Cancel Permit</td>
         <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/17"><?php echo $totalCancelPermit;?></a></div></td>
         <td><div align="center">
           <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalCancelPermit/$totalLabours) * 100.00, 2);
    			  }
    		?>
           % </div></td>
       </tr>
	   <tr>
         <td>Cancel Permit (6P)</td>
         <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/19"><?php echo $totalCancelPermit6P;?></a></div></td>
         <td><div align="center">
           <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalCancelPermit6P/$totalLabours) * 100.00, 2);
    			  }
    		?>
           % </div></td>
       </tr>
       <tr>
         <td>Evicted</td>
         <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/18"><?php echo $totalEvicted;?></a></div></td>
         <td><div align="center">
           <?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalEvicted/$totalLabours) * 100.00, 2);
    			  }
    		?>
           % </div></td>
       </tr>
       <tr>
        <td>Unfit</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/16"><?php echo $totalUnfit;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalUnfit/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>Rejected</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/3"><?php echo $totalRejected;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalRejected/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>M.I.P</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/5"><?php echo $totalMip;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalMip/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>PTM (Pekerja Tidak Masuk)</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contLabour/listByStatus/wkr_transtatus/20"><?php echo $totalPtm;?></a></div></td>
        <td><div align="center">
        	<?php if($totalLabours == 0) {echo 0;}
    			  else{
    			  		echo round(($totalPtm/$totalLabours) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
      </tr>
    </table>
</div>
<h3 id="switchsection2-title" class="handcursor">Passport & Permit Expiry Statistics<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection2" class="switchgroup1"> 
    <table width="100%" border="0">
      <tr>
        <th>&nbsp;</th>
        <th align="CENTER"><font color="red">Within 2 weeks</font></th>
        <th align="CENTER">Within 1 Month </th>
        <th><div align="center">Within 2 Months </div></th>
        <th><div align="center">Within 3 Months </div></th>
        <th><div align="center">Within 4 Months </div></th>
      </tr>
      <tr>
        <td width="20%">PLKS Expiry </td>
        <td width="16%"><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_permitexp/0.5/". $plks2wks, $plks2wks);?></div></td>
        <td width="16%"><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_permitexp/1/". $plks1mth, $plks1mth);?></div></td>
        <td width="16%"><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_permitexp/2/". $plks2mth, $plks2mth);?></div></td>
        <td width="16%"><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_permitexp/3/". $plks3mth, $plks3mth);?></div></td>
        <td width="16%"><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_permitexp/4/". $plks4mth, $plks4mth);?></div></td>
      </tr>
      <tr>
        <td>Passport Expiry </td>
        <td><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_passexp/0.5/". $pass2wks, $pass2wks);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_passexp/1/". $pass1mth, $pass1mth);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_passexp/2/". $pass2mth, $pass2mth);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_passexp/3/". $pass3mth, $pass3mth);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contLabour/listbyExpiryAndCty/wkr_passexp/4/". $pass4mth, $pass4mth);?></div></td>
      </tr>
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
