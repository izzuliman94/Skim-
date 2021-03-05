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
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script>
function opencontractor($pmno){

var url = "<?php echo site_url('contPayment/ctr_list');?>"
window.open(url, 'Contractor List', 'height=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

}

function addvdrfcl(){
var pmno = document.frmpayment.txtpmno.value;
var url = "<?php echo site_url('contPayment/addvdrfcl');?>/" + pmno
window.open(url, 'Add VDR FCL', 'height=600,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

}

function editvdrfcl(id){

var url = "<?php echo site_url('contPayment/editvdrfcl');?>/" + id
window.open(url, 'Edit VDR FCL', 'height=600,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function printpayment(){

var pmno = document.frmpayment.txtpmno.value;
var url = "<?php echo site_url('contPayment/displayprint');?>/" + pmno
window.open(url, 'Print Payment', 'height=600,width=1100, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}
</script>
</head>
<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Payment Advice</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update VDR Payment </h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/updatepaymentvdr">
<table  width="100%">
<tr>
    <td width="20%">Payment Advice No:</td>
	<td colspan="3"><input type="text" name="txtpmno" value="<?php echo $PMrow->pmt_no?>" readonly/></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="3"><input type="text" name="txtcreateddate" value="<?php echo date("d-M-Y",strtotime($PMrow->pmt_dateissue))?>" readonly/></td>
</tr>
<tr>
    <td>Company:</td>
	<td colspan="3"><input type="text" name="txtcompname" value="<?php echo $PMrow->pmt_compname?>" size="60"/><font color="red">*</font>
	<input type="hidden" value="<?php echo $PMrow->contractor_id?>" name="id"/>
	<input type="button" value="..." onclick="opencontractor()"/></td>
</tr>
<tr>
    <td>Address1:</td>
	<td colspan="3"><input type="text" name="txtaddr1" value="<?php echo $PMrow->pmt_address1?>" size="60"/></td>
</tr>
<tr>
    <td>Address2:</td>
	<td colspan="3"><input type="text" name="txtaddr2" value="<?php echo $PMrow->pmt_address2?>" size="60"/></td>
</tr>
<tr>
    <td>Address3:</td>
	<td colspan="3"><input type="text" name="txtaddr3" value="<?php echo $PMrow->pmt_address3?>" size="60"/></td>
</tr>
<tr>
    <td>Postcode</td>
	<td><input type="text" name="txtpcode" value="<?php echo $PMrow->pmt_postcode ?>" size="30" /></td>
	<td>State</td>
	<td><input type="text" name="txtstate" value="<?php echo $PMrow->pmt_state ?>" size="30" /></td>
</tr>
<tr>
    <td>Tel No</td>
	<td><input type="text" name="txttelno" value="<?php echo $PMrow->pmt_tel?>" size="30" /></td>
	<td>Fax No</td>
	<td><input type="text" name="txtfaxno" value="<?php echo $PMrow->pmt_fax?>" size="30" /></td>
</tr>
<tr>
    <td>Attention :</td>
	<td colspan="3"><input type="text" name="txtattn" value="<?php echo $PMrow->pmt_attn?>" size="60"/></td>
</tr>
</table>
<br />
<table width="100%">
	<tr>
	    <th colspan="5" align="right"><input type="button" onclick="addvdrfcl()" value="Add FCL Payment" /></th> 
	</tr>
	<tr>
	    <th>No</th>
		<th>No Of FCL</th>
		<th>Country</th>	
		<th>Wages</th>	
		<th>Action</th>	
	</tr>
		<?php if($allPaymentFCL->num_rows() == 0){ ?>
      	<tr>
      		<td colspan="5" align="center"><font color="red"><strong>No FCL lists has been insert for this Payment.</strong></font></td>
      	</tr>
      	<?php }else{ ?>
		 <?php 
		    $i = 1;
	      	$wages = 0;
			foreach($allPaymentFCL->result() as $fcl){
			//$wages = $fcl->wkr_name
      	 ?>
		<tr>
		    <td align="center"><?php echo $i++;?></td>
			<td align="center"><?php echo $fcl->pmt_fcl_no;?></td>
			<td align="center"><?php echo $fcl->pmt_cty_desc;?></td>
			<td align="center"><?php echo $fcl->pmt_wages?></td>
			<td align="center"><input type="button" value="Edit / Delete" onclick="editvdrfcl('<?php echo $fcl->id; ?>')"/></td>
		</tr>
		 <?php }
  	 	 }
  	 	 ?>
</table>
<br />
<table width="100%">
<tr>
   <td colspan="4" align="center"><input type="submit" value="Update"/>&nbsp;<input type="button" value="Print" onclick="printpayment()"/></td>
</tr>
</table>
</form>
</body>
</html>
