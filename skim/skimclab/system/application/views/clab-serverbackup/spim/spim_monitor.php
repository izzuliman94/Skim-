<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<!--link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" /-->

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- ? Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/




</script>

<script type="text/javascript">
		
	function SendReport(){
	 
	 
	 var url = "<?php echo site_url('contSpim/Send_Report');?>/" 
	 window.open(url, 'Send Report', 'height=50, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	 
	}
	
</script>  

</head>

<body>

<h4>Work orders pending For VDR<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h4>

<p class="handcursor">&nbsp;</p>
<div id="switchsection2" class="switchgroup1"> 
<form name="emailform" id="emailform">
<span class="handcursor">

</span>
<table width="100%" border="0">
	<tr>
		<th>No.</th>
		<th>Workorder Number</th>
		<th>Company Name</th>
		<th>Total FCL</th>
		<th>Date Receive</th>
        <th>PIC</th>
		<th>Latest Progress</th>
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
		<td><a href="<?php echo site_url();?>/contSpim/updateWorkOrderPt2/<?php echo $wo->wo_id;?>"><?php echo $wo->wo_id;?></a></td>
		<td><?php echo $wo->ctr_comp_name;?></td>
		<td align="CENTER"><?php echo $wo->wo_fcl_total;?></td>
		<td align="CENTER"><?php echo date('d-m-Y', strtotime($wo->wo_receivedate));?></td>
        <td align="CENTER"><?php echo $wo->wo_personincharge;?></td>
		<td align="CENTER"><?php echo $wo->wo_latest_progress;?></td>
	</tr>
<?php }
}
?>
</table>		
</div>

      </p>

      <div align="center">
        <input type="button" value="Send Now" onclick="SendReport()" />
      </div>
 </form>  
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
    
</body>
</html>
