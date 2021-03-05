<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Phone tracking Log</title>
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
	<script type="text/javascript">
		//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
	</script>
</head>

<body>
<h4><a href="dashboard.php">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Workorder <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Phone Tracking Log </h4>

<h3 id="switchsection1-title" class="handcursor">Phone Tracking Log<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
  <form action="<?php echo site_url();?>/contSpim/newPhoneTrackLogSubmit" method="POST" name="uploadForm" id="uploadForm">
    <strong>Current Workorder ID : <?php echo $workorderid;?><br />
    Cotractor ID: <?php echo $companyname;?> <br /></strong>
    <?php if(isset($successMsg)) echo "<strong><font color=\"red\">$successMsg</font></strong>";?>
   	<table width="100%" border="0">
      	<tr>
      		<td>Date & Time</td>
      		<td><input type="text" name="trackdate" id="trackdate" value="<?php echo date('Y-m-d G:i:s');?>" READONLY />
      		</td>
      	</tr>
      	<tr>
      		<td>Attend by</td>
      		<td><input type="text" name="txtattendby" id="txtattendby" value="<?php echo $this->session->userdata('username');?>" /></td>
      	</tr>
      	<tr>
      		<td>Remark</td>
      		<td><textarea name="txtremark" cols="40" rows="2"></textarea></td>
      	</tr>
      	<tr>
      		<td>Action</td>
      		<td><input type="text" name="txtaction" size="45" /></td>
      	</tr>
      	<tr>
      		<td>Action by</td>
      		<td><input type="text" name="txtactionby" value="<?php echo $this->session->userdata('username');?>"/></td>
      	</tr>
      	<tr>
      		<td>Completion Date</td>
      		<td>
      			<input type="text" name="dtcompletion" id="dtcompletion" READONLY/>
      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletion'), this)" />
      		</td>
      	</tr>
      	<tr>
      		<td colspan="2" align="center">
      			<input type="hidden" name="workorderid" value="<?php echo $workorderid;?>" />
      			<input type="hidden" name="companyname" value="<?php echo $companyname;?>" />
      			<input type="submit" name="btnSave" value=" Save " />
      			<input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" />
      		</td>
      	</tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>

</body>
</html>
