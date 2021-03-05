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
<script>
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

<h4><a href="dashboard.php">Spim</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> workorders <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />  Batch Application List</h4>
<br>
<strong>Contractor ID: <?php echo $clabno;?> </strong><br>
<strong>Company Name : <?php echo $companyname;?> </strong>
<br>
<form>
<table width="100%" border="0">
	<tr>
		<th align="LEFT">WORKORDER LISTS</th>
	</tr>
    <tr>
        <td>
        <?php if(isset($crud)) echo $crud;?>
        </td>
    </tr>
    <tr>
        <td><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /></td>
    </tr>
</table>
</form>