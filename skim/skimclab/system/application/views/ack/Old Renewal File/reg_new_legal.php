<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
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
  
  
		//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
		
		function validate(){
			
			if(document.forms[0].txtreffno.value == "")      { alert("Please Insert Reference No !"); return false;}
			if(document.forms[0].txtdate.value == "")         { alert("Please Insert Date  !"); return false;}
			
		}
</script>

</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Update Workorder&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Register New Legal</h4>


<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form action="<?php echo site_url();?>/contRenewal/AddNewLegal" method="POST" name="AddNewFCL" id="AddNewFCL" onsubmit="return validate();">
<input type="hidden" name="txtcompname" value="<?php echo $companyname; ?>" />
<input type="hidden" name="txtwoid" value="<?php echo $workorderid; ?>"/>


<strong>Cotractor ID: <?php echo $companyname;?> </strong><br />
<strong>Workorder ID: <?php echo $workorderid; ?></strong>
</br>

<table width="100%" border="0">
<!--tr>
    <td>Aggrement No</td>
    <td colspan="3"><input type="text" name="txtwoid" value="" maxlength="250" size="20" readonly/></td>
</tr-->
<tr> 	
    <td id="t_txtpassno">Reference No. <font color="red">*</font></td>
 	<td colspan="3"><input type="text" name="txtrefno" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtdob">Date  <font color="red">*</font></td>
    <td colspan="3">
    <input type="text" id="txtdate" name="txtdate"  value="" maxlength="250" size="20" readonly/>
    <input id="btndate" name="btndate" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtdate'), this)" />
    </td>
</tr>
<tr>
 	<td id="t_txtpof">Remarks</td>
 	<td colspan="3"><textarea name="txtremarks" cols="50" rows="3"></textarea></td>
</tr>

<tr>
    <td colspan="4" align="center">
    <input type="submit" name=" Save " value=" Save " onclick="return confirm('Are you sure you want to save?');"/>
    <input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 				
    </td>
</tr>
</table>
</form>

</body>