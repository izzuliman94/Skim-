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
    </script>	  
<!--end new calendar-->
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
</head>

<body>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Edit Labour <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Permit Expiry</h4>

<h3 id="switchsection1-title" class="handcursor">UPDATE PERMIT EXPIRY<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
	<table align="center" width="400" border="1" cellpadding="0" cellspacing="0">
			<tr>
			  <td class="print">
			  <form action="<?php echo site_url();?>/contLabour/editPermitHistoryStep2Submit" method="POST"  name="frmUpdatePermit" id="frmUpdatePermit" onsubmit="return v.exec()">
				<table width="90%" border="0" align="center">
					<tr>
						<td class="print" width="30%">Passport No.:</td>
						<td class="print"><input type="text" name="txtpassno" value="<?php echo $permitExpHistory->wkr_passno;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print">Name:</td>
						<td class="print"><input type="text" name="txtname" size="30" value="<?php echo $permitExpHistory->wkr_name;?>" readonly /></td>
					</tr>
					<tr>
						<td class="print" id="t_dtpermitexp">Permit Exp Date:</td>
						<td class="print"><input type="text" name="dtpermitexp" id="dtpermitexp" value="<?php if(strlen($permitExpHistory->wkr_permitexp) > 0) echo date('d-m-Y', strtotime($permitExpHistory->wkr_permitexp));?>" READONLY/>
							<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtpermitexp'), this)" /> <font color="red">*</font>
						</td>
					</tr>
					<tr>
						<td class="print" id="t_txtplksno">PLKS No.:</td>
						<td class="print"><input type="text" name="txtplksno" value="<?php echo $permitExpHistory->wkr_plksno;?>"/> <font color="red">*</font></td>
					</tr>
					<tr>
						<td class="print" colspan="2" align="center">
							<input type="hidden" name="txtwkrid" value="<?php echo $permitExpHistory->wkr_id;?>" />
							<input type="hidden" name="txpermithistid" value="<?php echo $permitExpHistory->newplksexp_id;?>" />
							<input type="submit" name="btnUpdate" value="Update" onclick="return confirm('Are you sure you want to update?');"/>
							<input type="button" name="btnBack" value="Back" onclick="location.href='<?php echo site_url();?>/contLabour/viewPermitExpHistory/<?php echo $permitExpHistory->wkr_id;?>'" />
							<input type="button" name="btnClose" value="Close" onclick="window.close();" />
						</td>
					</tr>
				</table>
				</form>
			  </td>
			</tr>
	</table>
	
	<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtplksno': {
			'l': 'New PLKS No.',  // label
			'r': true,    // required
			't': 't_txtplksno'// id of the element to highlight if input not validated
		},
		'dtpermitexp':{'l':'Permit Exp. Date','r':true,'t':'t_dtpermitexp'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('frmUpdatePermit', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
</body>
</html>
