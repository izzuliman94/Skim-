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
		
		function Legaldelete(id){
			
			 var id = id;
		     var workorderid = document.EditLegal.txtwoid.value
		     var companyname = document.EditLegal.txtcompname.value
			
			 var uri = "<?php echo site_url();?>/contRenewal/DeleteLegal/" + workorderid + "/" + companyname + "/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}
		
</script>

</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Update Workorder&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Edit Legal</h4>


<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form action="<?php echo site_url();?>/contSpim/SaveEditLegal" method="POST" name="EditLegal" id="EditLegal" onsubmit="return validate();">
<input type="hidden" name="txtcompname" value="<?php echo $companyname; ?>" />
<input type="hidden" name="txtwoid" value="<?php echo $workorderid; ?>"/>
<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
<?php if($strhide == "delete"){?><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 	<?php }?>
<?php if($strhide != "delete"){?>

<strong>Cotractor ID: <?php echo $companyname;?> </strong><br />
<strong>Workorder ID: <?php echo $workorderid; ?></strong>
</br>

<table width="100%" border="0">
<tr>
    <td>Aggrement No</td>
    <td colspan="3"><input type="text" name="txtaggno" maxlength="250" size="40" value="<?php echo $legal->wo_agg_no; ?>" readonly/></td>
</tr>
<tr> 	
    <td id="t_txtpassno">Reference No. <font color="red">*</font></td>
 	<td colspan="3"><input type="text" name="txtrefno" value="<?php echo $legal->wo_agg_ref_no; ?>" maxlength="30" size="20" /></td>
</tr>
<tr>
    <td id="t_txtdob">Date  <font color="red">*</font></td>
    <td colspan="3">
    <input type="text" id="txtdate" name="txtdate"  value="<?php echo date('d-m-Y',strtotime($legal->wo_agg_date)); ?>" maxlength="250" size="20" readonly/>
    <input id="btndate" name="btndate" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtdate'), this)" />
    </td>
</tr>
<tr>
 	<td id="t_txtpof">Remarks</td>
 	<td colspan="3"><textarea name="txtremarks" cols="50" rows="3"><?php echo $legal->wo_agg_remarks; ?></textarea></td>
</tr>

<tr>
    <td colspan="4" align="center">
    <input type="submit" name=" Save " value=" Save " onclick="return confirm('Are you sure you want to save?');"/>
    <input type="button" name="Delete" value="Delete" onclick="Legaldelete('<?php echo $id; ?>')"/>
    <input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 				
    </td>
</tr>
</table>
</form>
<?php } ?>
</body>