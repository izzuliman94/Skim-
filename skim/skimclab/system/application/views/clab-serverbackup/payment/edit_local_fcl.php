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
window.open(url, 'country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

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

function dellw(){
			
			 var id = document.addfcl.txtid.value;		    
			 var uri = "<?php echo site_url();?>/contPayment/Deletelw/" + id
             document.forms[0].action = uri;
             document.forms[0].method = "post";
             document.forms[0].submit();
		}
</script>
</head>
<body>
<h4><a href="dashboard.php">SPIM</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Payment Advise&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Edit  Local FCL</h4>
<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?> <br />
<form method="post" name="addfcl" action="<?php echo site_url();?>/contPayment/Updatelocalworker" onsubmit="return v.exec();">
<?php if($strhide == "delete"){?><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /> 	<?php }?>
<?php if($strhide != "delete"){?>
<table width="90%">
<tr>
  <td width="35%">Payment Advise No</td>
  <td width="23%"><input type="text" name="txtpmno" value="<?php echo $dataFCL->pmt_no ?>" size="15" />
    <input type="hidden" name="txtid" value="<?php echo $dataFCL->id ?>" /></td>
  <td width="26%">&nbsp;</td>
  <td width="27%">&nbsp;</td>
</tr>
<tr>
  <td colspan="4" ><div align="center"><strong>Disbursement</strong></div></td>
</tr>
<tr>
  <td >Disbursement : No of Job Listing</td>
  <td colspan="3"><input type="text" name="txtnolist" value=<?php echo $dataFCL->pmt_list_no ?> size="5" /></td>
</tr>
<tr>
  <td >Advertising</td>
  <td colspan="3"><input type="text" name="txtadv" value=<?php echo $dataFCL->pmt_adv ?> size="20" readonly="readonly"/></td>
</tr>
<tr>
  <td colspan="4"><div align="center"><strong>Reimbursement</strong></div></td>
</tr>
<tr>
  <td id="t_fcl">Reimbursement : No Of Local Worker<font color="red">*</font></td>
  <td colspan="3"><input type="text" name="txtnofcl" value="<?php echo $dataFCL->pmt_fcl_no ?>" size="5" /></td>
</tr>
<tr>
  <td>1. Phone &amp; Fax Expenses</td>
  <td><input type="text" name="txtphone" value=<?php echo $dataFCL->pmt_phone ?> size="20" readonly="readonly"/></td>
  <td>4. Data Searching</td>
  <td><input type="text" name="txtdata" value=<?php echo $dataFCL->pmt_data ?> size="20" /></td>
</tr>
<tr>
  <td>2. Travelling Expenses</td>
  <td><input type="text" name="txtravel" value=<?php echo $dataFCL->pmt_travel ?> size="20" readonly="readonly"/></td>
  <td>5. Photocopy &amp; Printing</td>
  <td><input name="txtphoto" type="text" value=<?php echo $dataFCL->pmt_photo ?> size="20" /></td>
</tr>
<tr>
  <td>3. Interview Arrangement</td>
  <td><input type="text" name="txtint" value=<?php echo $dataFCL->pmt_int ?> size="20"/></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="3"><input type="hidden" size="20" name="selcountry" readonly="readonly"/></td>
</tr>
<tr>
    <td colspan="4" align="center"><input type="submit" value="Update"/><input type="button" value="Delete" onclick="dellw()"/><input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" /></td>
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