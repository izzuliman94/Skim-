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
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Edit Labour <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Passport Expiry</h4>

<h3 id="switchsection1-title" class="handcursor">UPDATE PASSPORT EXPIRY<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
	<table align="center" width="400" border="1" cellpadding="0" cellspacing="0">
			<tr>
			  <td class="print">
			  <form action="<?php echo site_url();?>/contLabour/updatePassportExpHistory" method="POST"  name="frmUpdatePassportExp" id="frmUpdatePassportExp" onsubmit="return v.exec()">
				<table width="90%" border="0" align="center">
					<tr>
						<td class="print" width="30%">Passport No.:</td>
						<td class="print"><input type="text" name="txtpassno" value="<?php echo $labor->wkr_passno;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print">Name:</td>
						<td class="print"><input type="text" name="txtname" size="30" value="<?php echo $labor->wkr_name;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print" id="t_dtpassexp">Passport Exp Date:</td>
						<td class="print"><input type="text" name="dtpassexp" id="dtpassexp" READONLY/>
							<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtpassexp'), this)" /> <font color="red">*</font>
						</td>
					</tr>
					<tr>
						<td class="print" colspan="2" align="center">
							<input type="hidden" name="txtwkrid" value="<?php echo $labor->wkr_id;?>" />
							<input type="submit" name="btnAdd" value="Add" onclick="return confirm('Are you sure you want to Update?');"/>
							<input type="button" name="btnClose" value="Close" onclick="closeAndRefresh();" />
						</td>
					</tr>
				</table>
				</form>
			  </td>
			</tr>
			<tr>
			  <td class="print">
				<table width="100%" border="0">
					<tr>
						<th colspan="4" align="Center">Update Passport History</th>
					</tr>
					<tr>
						<th>No.</th>
						<th>Passport Exp. Date</th>
						<th>Set by</th>
						<th>Date Set</th>
					</tr>
					<?php if($passExpHistory->num_rows() == 0){
					?>
					<tr>
						<td colspan="4"><font color="red">There is no passport expiry update history.</font></td>
					</tr>
					<?php
					}else{
						$i=0;
						foreach($passExpHistory->result() as $passhist){
							$i++;
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td>
							<?php if($i == 1){
							?>
									<a href="<?php echo site_url();?>/contLabour/editPassportHistory/<?php echo $passhist->newpassexp_id;?>"><?php echo date('d-m-Y', strtotime($passhist->newpassexp_date));?></a>
							<?php
								   }
								   else{
									   echo date('d-m-Y', strtotime($passhist->newpassexp_date));
								   }
							?>
						</td>
						<td><?php echo $passhist->emp_username;?></td>
						<td><?php echo date('d-m-Y', strtotime($passhist->newpass_setdate));?></td>
					</tr>
					<?php }
					}
					?>
				</table>
			  </td>
			</tr>	
	</table>
	
	<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'dtpassexp': {
			'l': 'Passport Expiry Date',  // label
			'r': true,    // required
			't': 't_dtpassexp'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('frmUpdatePassportExp', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
</body>
</html>
