<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
<script>

function opencountrylist(){

   var url = "<?php echo site_url('contPayment/opencountrylist');?>";
window.open(url, 'country list', 'height=500,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

}

//to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
	
	
	function delfcl(){
			
			 var id = document.addfcl.txtid.value;		    
			 var uri = "<?php echo site_url();?>/contPayment/DeleteFCL/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}	

</script>
</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Payment Advise&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Edit  VDR FCL</h4>
<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form method="post" name="addfcl" action="<?php echo site_url();?>/contPayment/Updatefclvdr" onsubmit="return v.exec();">
<?php if($strhide == "delete"){?><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 	<?php }?>
<?php if($strhide != "delete"){?>
<table width="100%" border="1" style="border-collapse: collapse;" bordercolor="#ccc" cellpadding=3>
<tr>
    <td width="35%">Payment Advise No</td>
	<td colspan="3"><input type="text" name="txtpmno" value="<?php echo $dataFCL->pmt_no ?>" readonly><input type="hidden" name="txtid" value="<?php echo $dataFCL->id ?>" /></td>
</tr>
<tr>
    <td width="35%" id="t_fcl">No Of FCL<font color="red">*</font></td>
	<td colspan="3"><input type="text" name="txtnofcl" value="<?php echo $dataFCL->pmt_fcl_no ?>" size="5"></td>
</tr>
<tr>
    <td>Source Country</td>
	<td colspan="3"><input type="text" size="20" name="selcountry" value="<?php echo $dataFCL->pmt_cty_desc ?>" />
	<input type="hidden" size="20" name="selid" readonly/>
	<input type="button" onclick="opencountrylist()" value="..." /></td>
</tr>
<tr>
  <td>Wages</td>
  <td><input type="text" name="txtwages" size="20" value="<?php echo $dataFCL->pmt_wages ?>" readonly/></td>
  <td>Period</td>
  <td><input type="text" name="txtperiod" value="<?php echo $dataFCL->pmt_period ?>" size="20" readonly/></td>
</tr>
<tr>
  <td colspan="4"><div align="center">CLAB Processing Fee</div></td>
</tr>
<tr>
	<td>Admin Fees</td>
	<td><input type="text" name="txtadmin" value="<?php echo $dataFCL->pmt_admin ?>" size="20"/></td>
	<td >Green Card</td>
	<td><input type="text" name="txtgreen" value="<?php echo $dataFCL->pmt_green ?>" size="20"/></td>
</tr>
<tr>
	<td>Transit Centre</td>
	<td><input type="text" name="txtransit" value="<?php echo $dataFCL->pmt_transit ?>" size="20"/></td>
	<td>Others</td>
	<td><input type="text" name="txtothers" value="<?php echo $dataFCL->pmt_others ?>" size="20"/></td>
</tr>
<!--tr>
	<td colspan="4"><div align="center">Others</div></td>
</tr>
<tr>
	<td>Compound</td>
	<td><input type="text" name="txtjim2" value="<?php echo $dataFCL->pmt_jim ?>" size="20"/></td>
	<td>SP</td>
	<td><input type="text" name="txtjim3" value="<?php echo $dataFCL->pmt_jim ?>" size="20"/></td>
</tr-->
<tr>
	<td colspan="4"><div align="center">Extension Change Of Employers</div></td>
</tr>
<tr>
    <td>JIM Guarantee Amount</td>
	<td width="23%"><input type="text" name="txtjim" value="<?php echo $dataFCL->pmt_jim ?>" size="20"/></td>
    <td width="26%">&nbsp;</td>
	<td width="27%">&nbsp;</td>
</tr>
<tr>
    <td>PLKS</td>
	<td><input type="text" name="txtplks" size="20" value="<?php echo $dataFCL->pmt_plks ?>" readonly/></td>
    <td>Fees</td>
	<td><input type="text" name="txtfees" size="20" value="<?php echo $dataFCL->pmt_fees ?>" readonly/></td>
</tr>
<tr>
    <td>Visa</td>
	<td><input type="text" name="txtvisa" size="20" value="<?php echo $dataFCL->pmt_visa ?>" readonly/></td>
    <td>Levi</td>
	<td><input type="text" name="txtlevi" size="20" value="<?php echo $dataFCL->pmt_levi ?>"readonly/></td>
</tr>
<!--tr>
    <td colspan="4"><div align="center">Transit Centre</div></td>
</tr>
<tr>
	<td>Transit Cost</td>
	<td><input type="text" name="txttransitcost" value="<?php echo $dataFCL->pmt_trans_cost ?>" size="20" /></td>
	<td>Transit Fees</td>
	<td><input type="text" name="txttransitfees" value="<?php echo $dataFCL->pmt_trans_fees ?>" size="20" /></td>
</tr-->
<tr>
	<td colspan="4"><div align="center">Insurance Premium</div></td>
</tr>
<tr>
	<td>Insurance Guarantee</td>
	<td ><input type="text" name="txtig" value="<?php echo $dataFCL->pmt_ig ?>" size="20"/></td>
	<td>FWCS</td>
	<td><input type="text" name="txtfwcs" value="<?php echo $dataFCL->pmt_fwcs ?>" size="20"/></td>
</tr>
<tr>
	<td >FWHS</td>
	<td ><input type="text" name="txtfwhs" value="<?php echo $dataFCL->pmt_fwhs ?>" size="20"/></td>
	<td align="center">&nbsp;</td>
	<td align="center">&nbsp;</td>
</tr>
<tr>
	<td colspan="4" align="center">FOMEMA Processing Fee</td>
</tr>
<tr> 
	<td>Medical</td>
	<td><input type="text" name="txtfomema" value="<?php echo $dataFCL->pmt_fomema ?>" size="20"/></td>
	<td>Processing Fee</td>
	<td><input type="text" name="txtfomema2" value="<?php echo $dataFCL->pmt_fomema ?>" size="20"/></td>
</tr>
<tr>
  <td colspan="4" align="center">
	<input type="hidden" name="txttransitcost" value="0.00" size="20" />
	<input type="hidden" name="txttransitfees" value="0.00" size="20" />
  </td>
</tr>
<!--tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr-->
<tr>
    <td colspan="4" align="center"><input type="submit" value="Update"/><input type="button" value="Delete" onclick="delfcl()"/><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /></td>
</tr>
</table>
<?php } ?>
</form>
</body>
<!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtnofcl': {
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('addfcl', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
</html>