<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
</style>
</head>
<body>
<table width="50%" align="center">
<tr>
    <td width="16%">Official Receipt No</td>
	<td colspan="3">:&nbsp;<?php echo $payment->pmt_receipt_no; ?></td>
	<td width="22%" rowspan="3"><div align="center"><img src="<?php echo base_url();?>images/logoLetter.jpg"></div></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="3">:&nbsp;<?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
  </tr>
<tr>
    <td>Received From</td>
	<td colspan="3">:&nbsp;<?php echo $payment->pmt_receive_from; ?></td>
  </tr>
<tr>
  <td>Address</td>
  <td colspan="4">:&nbsp;<?php echo $payment->pmt_addr; ?></td>
  </tr>
<tr>
  <td></td>
  <td colspan="4"></td>
</tr>
</table>
<table width="50%" align="center" border="1" style="border-width:thin">  
<tr>
  <td><div align="center">ITEM</div></td>
  <td width="16%"><div align="center">Cheque No </div></td>
  <td width="17%"><div align="center">Payment Description </div></td>
  <td width="29%"><div align="center">PA. No </div></td>
  <td><div align="center">Amount</div></td>
</tr>
<tr>
  <td><div align="center">CLAB</div></td>
  <td><div align="center"><?php echo $payment->pmt_chq_clab; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_clab_fees == '1'){ echo "checked" ;} ?> disabled/>Admin Fees<br />
  <input type="checkbox" <?php if($payment->chk_clab_adm == '1'){ echo "checked" ;} ?> disabled/>Administration<br />
  <input type="checkbox" <?php if($payment->chk_clab_levy == '1'){ echo "checked" ;} ?> disabled/>Refund Levy</td>
  <td><div align="center"><?php echo $payment->clab_pa_no; ?></div></td>
  <td><div align="center"><?php echo $payment->clab_amount; ?></div></td>
</tr>
<tr>
  <td><div align="center">JIM</div></td>
  <td><div align="center"><?php echo $payment->pmt_chq_jim; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_jim_plks == '1'){ echo "checked" ;} ?> disabled/>PLKS<br />
  <input type="checkbox" <?php if($payment->chk_jim_fees == '1'){ echo "checked" ;} ?> disabled/>Fees<br />
  <input type="checkbox" <?php if($payment->chk_jim_visa == '1'){ echo "checked" ;} ?> disabled/>Visa<br />
  <input type="checkbox" <?php if($payment->chk_jim_levi == '1'){ echo "checked" ;} ?> disabled/>Levy<br />
  <input type="checkbox" <?php if($payment->chk_jim_sp == '1'){ echo "checked" ;} ?> disabled/>Sp</td>
  <td><div align="center"><?php echo $payment->jim_pa_no; ?></div></td>
  <td><div align="center"><?php echo $payment->jim_amount; ?></div></td> 
</tr>
<tr>
  <td><div align="center">FOMEMA</div></td>
  <td><div align="center"><?php echo $payment->pmt_chq_fomema; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_fomema_male == '1'){ echo "checked" ;} ?> disabled/>Male<br />
  <input type="checkbox" <?php if($payment->chk_fomema_female == '1'){ echo "checked" ;} ?> disabled/>Female</td>
  <td><div align="center"><?php echo $payment->fomema_pa_no; ?></div></td>
  <td><div align="center"><?php echo $payment->fomema_amount; ?></div></td>
</tr>
<tr>
  <td><div align="center">INSURANCE</div></td>
  <td><div align="center"><?php echo $payment->ins_chq_no; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_ins_ig == '1'){ echo "checked" ;} ?> disabled/>IG<br />
  <input type="checkbox" <?php if($payment->chk_ins_fwcs == '1'){ echo "checked" ;} ?> disabled/>FWCS</td>
  <td><div align="center"><?php echo $payment->ins_pa; ?></div></td>
  <td><div align="center"><?php echo $payment->ins_amount; ?></div></td>
</tr>
<tr>
  <td><div align="center">AGENCY</div></td>
  <td><div align="center"><?php echo $payment->agency_chq_no; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_agency_fees == '1'){ echo "checked" ;} ?> disabled/>Fees</td>
  <td><div align="center"><?php echo $payment->agency_pa_no; ?></div></td>
  <td><div align="center"><?php echo $payment->agency_amount; ?></div></td>
</tr>
<tr>
  <td><div align="center">OTHERS</div></td>
  <td><div align="center"><?php echo $payment->others_chq_no; ?></div></td>
  <td><input type="checkbox" <?php if($payment->chk_others_fees == '1'){ echo "checked" ;} ?> disabled/>Fees</td>
  <td><div align="center"><?php echo $payment->others_pa; ?></div></td>
  <td><div align="center"><?php echo $payment->others_amount; ?></div></td>
</tr>
</table>
</body>
</html>
