<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
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
        //to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
    </script>	  
<!--end new calendar-->
</head>

<body>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Edit Labour <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Replace Passport Number</h4>

<h3 id="switchsection1-title" class="handcursor">CHANGE OF PASSPORT NUMBER<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 

  <form action="<?php echo site_url();?>/contLabour/passReplacementSubmit" method="POST" name="newCtr" id="entity_searchby">
    <table width="80%" border="0">
      	<tr>
      		<td width="30%">Name</td>
      		<td><input type="text" name="txtwkrname" size="35" value="<?php echo $wkrRecord->wkr_name;?>" READONLY/></td>
      	</tr>
      	<tr>
      		<td>Passport No.</td>
      		<td><input type="text" name="txtoldpassno" value="<?php echo $wkrRecord->wkr_passno;?>" READONLY/></td>
      	</tr>
      	<tr>
      		<td>New Passport No.</td>
      		<td><input type="text" name="txtnewpassno" value="" /></td>
      	</tr>
      	<tr>
      		<td>Reason for Change</td>
      		<td><textarea name="txtreason" cols="35" rows="2"></textarea></td>
      	</tr>
      	<tr>
      		<td>Date of Change</td>
      		<td><input type="text" name="dtchange" id="dtchange" value="<?php echo date('d-m-Y');?>" READONLY/>
      			<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtchange'), this)" /> <font color="red">*</font>
      		</td>
      	</tr>
      	<tr>
      		<td>Change By</td>
      		<td><input type="text" name="txtchangeby" value="<?php echo $this->session->userdata('username');?>" READONLY /></td>
      	</tr>
      	<tr>
      		<td colspan="2" align="center">
      			<input type="hidden" name="previous_passno" value="<?php echo $wkrRecord->wkr_oldpassno;?>" />
      			<input type="hidden" name="wkr_id" value="<?php echo $wkrRecord->wkr_id;?>" />
      			<input type="hidden" name="txtcountry" value="<?php echo $wkrRecord->wkr_country;?>" />
      			<input type="submit" name="btnSubmit" value="Replace" />
      			<input type="button" name="btnBack" value="Close" onclick="closeAndRefresh();" />
      		</td>
      	</tr>
    </table>
  </form>
  <font color="red"><?php if(isset($errorMsg)) echo $errorMsg;?></font>
  <br />
  <table width="100%" border="0">
  	<tr>
  		<th colspan="6" align="CENTER">Passport replacement history</th>
  	</tr>
  	<tr>
  		<th width="3%">No.</th>
  		<th width="15%">Old Passport</th>
  		<th width="15%">New Passport</th>
  		<th width="37%">Remark</th>
  		<th width="15%">Replace by</th>
  		<th width="15%">Date Replace</th>
  	</tr>
  	<?php if($replaceHistory->num_rows() == 0){?>
  	<tr>
  		<td colspan="6"><font color="red">There is no replacement history.</font></td>
  	</tr>
  	<?php }
  	else{
	  	$i=1;
	  	foreach($replaceHistory->result() as $hist){
	?>
  	<tr>
  		<td><?php echo $i++;?></td>
  		<td><?php echo $hist->wkrhist_oldpassno;?></td>
  		<td><?php echo $hist->wkrhist_newpassno;?></td>
  		<td><?php echo $hist->wkrhist_remark;?></td>
  		<td><?php echo $hist->emp_username;?></td>
  		<td><?php echo date('d-m-Y', strtotime($hist->wkrhist_changedate));?></td>
  	</tr>
  	<?php }
	}
	?>
  </table>
  <p align="center">&nbsp;</p>
</div>
</body>
</html>
