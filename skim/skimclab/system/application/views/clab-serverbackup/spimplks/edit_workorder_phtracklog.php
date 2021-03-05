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
		
		function Logdelete(id){
			
			 var id = id;
		     var workorderid = document.uploadForm.txtwoid.value
		     var companyname = document.uploadForm.txtcompname.value
			
			 var uri = "<?php echo site_url();?>/contSpimFirst/DeleteLog/" + workorderid + "/" + companyname + "/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}
		
	</script>
</head>

<body>
<h4><a href="dashboard.php">SPIM</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Workorder <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New  Tracking Log </h4>

<h3 id="switchsection1-title" class="handcursor">Phone Tracking Log<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
  <form action="<?php echo site_url();?>/contSpimFirst/SaveEditLog" method="POST" name="uploadForm" id="uploadForm">
    <strong>Current Workorder ID : <?php echo $workorderid;?><br />
    Cotractor ID: <?php echo $companyname;?> <br /></strong>
    <?php if(isset($successMsg)) echo "<strong><font color=\"red\">$successMsg</font></strong>";?>
   	<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
   	<input type="hidden" name="txtwoid" value="<?php echo $workorderid; ?>"/>
    <input type="hidden" name="txtcompname" value="<?php echo $companyname; ?>" />
  <table width="100%" border="0">
      	<tr>
      		<td>Date & Time</td>
      		<td><input color="red" type="text" name="trackdate" id="trackdate" style="color:#999999 ;background-color:#CCCCCC;" value="<?php echo $woLog->track_datetime;?>" READONLY />
   		    <label></label>      		</td>
      	</tr>
      	<tr>
      		<td>Attend by</td>
      		<td><input type="text" name="txtattendby" id="txtattendby" style="color:#999999 ;background-color:#CCCCCC;" value="<?php echo $woLog->track_attendby;?>" READONLY/></td>
      	</tr>
      	<tr>
      		<td>Remark</td>
      		<td><textarea name="txtremark" cols="40" rows="2"><?php echo $woLog->track_remarks;?></textarea></td>
      	</tr>
      	<tr>
      		<td>Action</td>
   		  <td><input name="txtaction" type="text" value="<?php echo $woLog->track_action;?>" size="45" /></td>
      	</tr>
      	<tr>
      		<td>Action by</td>
      		<td><input type="text" name="txtactionby" style="color:#999999 ;background-color:#CCCCCC;" value="<?php echo $woLog->track_actionby;?>" READONLY/></td>
      	</tr>
      	<tr>
      		<td>Completion Date</td>
      		<td>
      			<input name="dtcompletion" type="text" id="dtcompletion" value="<?php echo $woLog->track_compdate;?>" READONLY/>
      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcompletion'), this)" />
      		</td>
      	</tr>
      	<tr>
      		<td colspan="2" align="center"><input type="submit" name=" Save " value=" Save " onclick="return confirm('Are you sure you want to save?');"/>
      		  <!--input type="button" name="Delete" value="Delete" onclick="Logdelete('<?php echo $id; ?>')"/-->
      		<input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" />
      		</td>
      	</tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>

</body>
</html>
