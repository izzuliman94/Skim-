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

<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Dashboard </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Statistics of CLAB registered contractors<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
    <table width="100%" border="0">
	
      <tr>
        <th width="50%"><div align="left">Description</div></th>
        <th width="25%"><div align="center">Total</div></th>
        <th width="25%">Percentage</th>
      </tr>
      <tr>
        <td>Overall</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrList"><?php echo $overallCtr;?></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Open</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_appstatus/1"><?php echo $openCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($openCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
	  <tr>
        <td>Verified</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_appstatus/2"><?php echo $verifiedCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($verifiedCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        	</div>
        </td>
      </tr>
      <tr>
        <td>Approved</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_appstatus/3"><?php echo $approvedCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($approvedCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%</div>
    	</td>
      </tr>
      <tr>
        <td>Rejected</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_appstatus/4"><?php echo $rejectedCtr;?></a></div></td>
        <td><div align="center">
 			 <?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($rejectedCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%     
        	</div>
        </td>
      </tr>
      <tr>
        <td>Withdrawal</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_appstatus/5"><?php echo $withdrawCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($withdrawCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Active</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_status/1"><?php echo $activeCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($activeCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>In-active</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_status/2"><?php echo $inactiveCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($inactiveCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
        <td>Suspended</td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_status/3"><?php echo $suspendedCtr;?></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($suspendedCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
      <tr>
      	<td>Contractors (registered online)</td>
      	<td><div align="center"><a href="<?php echo site_url();?>/contContractor/listContractorByStatus/ctr_insertflag/2"><?php echo $registerOnlineCtr;?></a></div></td>
        <td><div align="center">
        	<?php if($overallCtr == 0) {echo 0;}
    			  else{
    			  		echo round(($registerOnlineCtr/$overallCtr) * 100.00, 2);
    			  }
    		?>%
        </div></td>
      </tr>
    </table>
  <p align="center">&nbsp;</p>
</div>
<p>
<h3 id="switchsection2-title" class="handcursor">Status   <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection2" class="switchgroup1"> 
  <form action="" method="get" name="typicalform2" id="typicalform2">
    <table width="100%" border="0">
	
      <tr>
        <th><div align="left">&nbsp;</div></th>
        <th><font color="red">Within 2 weeks</font></th>
        <th><font color="red">Within 1 Month</font></th>
        <th><div align="center">Within 2 Months</div></th>
        <th><div align="center">Within 3 Months </div></th>
        <th><div align="center">Expired</div></th>
        <th><font color="red">Expired Last 2 Month</th>
      </tr>
	   <tr>
        <td>CLAB Registration Expiry </td>
        <td></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/1/ctr_clabexp_date"><?php echo $clabexpiry1mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/2/ctr_clabexp_date"><?php echo $clabexpiry2mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/3/ctr_clabexp_date"><?php echo $clabexpiry3mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/-1/ctr_clabexp_date"><?php echo $clabexpiryexpired;?></a></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="18%">CIDB Expiry</td>
        <td></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/1/ctr_cidbexp_date"><?php echo $cidbexpiry1mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/2/ctr_cidbexp_date"><?php echo $cidbexpiry2mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/3/ctr_cidbexp_date"><?php echo $cidbexpiry3mth;?></a></div></td>
        <td><div align="center"><a href="<?php echo site_url();?>/contContractor/ctrListByClabExpiry/-1/ctr_cidbexp_date"><?php echo $cidbexpiryexpired;?></a></div></td>
        <td>&nbsp;</td>
      </tr>
	   <tr>
        <td>PLKS Expiry (NEW)</td>
        <td width="12%"><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_permitexp/0.5", $plks2wks);?></div></td>
        <td width="13%"><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_permitexp/1", $plks1mth);?></div></td>
        <td width="12%"><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_permitexp/2", $plks2mth);?></div></td>
        <td width="12%"><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_permitexp/3", $plks3mth);?></div></td>
        <td width="13%">&nbsp;</td>
        <td width="20%"><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany4/wkr_permitexp/-1", $plksexp2);?></div></td>
      </tr>
      <tr>
        <td>Passport Expiry(NEW)</td>
        <td><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_passexp/0.5", $pass2wks);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_passexp/1", $pass1mth);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_passexp/2", $pass2mth);?></div></td>
        <td><div align="center"><?php echo anchor_popup("contContractor/listByExpiryAndCompany3/wkr_passexp/3", $pass3mth);?></div></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
 <!--pending task
      <tr>
      	<td>5th year letter</td>
      	<td>&nbsp;</td>
      	<td align="center"><?php echo anchor_popup("contContractor/listFifthYearLetter/1", "xxx");?></td>
      	<td align="center"><?php echo anchor_popup("contContractor/listFifthYearLetter/2", "xxx");?></td>
      	<td align="center"><?php echo anchor_popup("contContractor/listFifthYearLetter/3", "xxx");?></td>
      	<td>&nbsp;</td>
      </tr>
-->
    </table>
  </form>
  <p align="center">&nbsp;</p>
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
