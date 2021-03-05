<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Century Gothic;
	font-size: 9px;
	color: #333333;
}
.style1 {
	font-size: 18px;
	font-weight: bold;
}
.style3 {color: #000000; font-weight: bold; }
.style5 {font-size: 9}
.style7 {
	font-size: 8px;
	font-weight: bold;
}
</style>
</head>
<body>
<table width="95%" style="text-align: left;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td rowspan="6" width="164"><img src="<?php echo base_url();?>images/logoLetter.jpg" width="50" height="50"></td>
	<td colspan="2"><span class="style1">PAYMENT ADVICE FOR LOCAL WORKER</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td colspan="4"><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) </strong></td>
  </tr>
<tr>
    <td colspan="4">LEVEL 2, ANNEXE BLOCK,MENARA MILENIUM, 8 </td>
  </tr>
<tr>
  <td colspan="4"><strong>(GST ID No : 001341655040)</strong></td>
</tr>
<tr>
  <td colspan="4">JLN DAMANLELA, BUKIT DAMANSARA 50490 KUALA LUMPUR </td>
  </tr>
<tr>
  <td colspan="4">Tel : 03-20959599 Fax : 03-20959566 Email : info@clab.com.my Web : www.clab.com.my </td>
  </tr>
  <tr>
  <td colspan="4">&nbsp;</td>
</tr>
<tr>
  <td height="20">PAYMENT ADVICE NO </td>
  <td width="380"><span class="style5">:&nbsp;<strong><?php echo $display->pmt_no?></strong></span></td>
  <td width="229">&nbsp;</td>
  <td width="234">&nbsp;</td>
</tr>
<tr>
  <td height="20">DATE</td>
  <td><span class="style5">:&nbsp;<?php echo date("d-M-Y",strtotime($display->pmt_dateissue))?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">COMPANY</td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_compname?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_address1?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_address2?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_address3?>&nbsp;<?php echo $display->pmt_postcode?>&nbsp;<?php echo $display->pmt_state?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">TEL / FAX </td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_tel?>&nbsp;/&nbsp;<?php echo $display->pmt_fax?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="20">ATTENTION</td>
  <td><span class="style5">:&nbsp;<?php echo $display->pmt_attn?></span></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<!--tr>
  <td height="20">PERIOD OF PROJECT </td>
  <td>:</td>
  <td>FROM</td>
  <td>TO</td>
</tr-->
</table>
<br />
<table width="95%" border="1" align="center" bordercolor="#CCCCCC" style="border-collapse: collapse;">
<tr>
  <td width="6%" height="32" ALIGN='CENTER' bgcolor="#CCCCCC"><div align="center" class="style3">No</div>    <div align="center"></div></td>
  <td width="37%" ALIGN='CENTER' bgcolor="#CCCCCC"><div align="center" class="style3">Description</div>    <div align="center"></div></td>
  <td width="10%" ALIGN='CENTER' bgcolor="#CCCCCC"><div align="center" class="style3">Qty</div>    <div align="center"></div></td>
  <td width="24%" bgcolor="#CCCCCC"><div align="center" class="style3">Unit Price (RM)</div>    <div align="center"></div></td>
  <td width="23%" bgcolor="#CCCCCC"><div align="center" class="style3">Total (RM)</div>    
    <div align="center"></div></td>
  </tr>

<?php 
$sum1 = '0.00';
$sumA = '0.00';
$sumB = '0.00';
$sumC = '0.00';
$sumD = '0.00';
$sumE = '0.00';
$sumF = '0.00';
$sumG = '0.00';
$sumH = '0.00';
if($fcl->num_rows() == 0){ ?>
<?php }else{ ?>
<?php 
     $i = 1;
	
	 foreach($fcl->result() as $fcl){
?>
<tr>
  <td height="20" ALIGN='CENTER'>1</td>
  <td ALIGN='left'><strong>&nbsp;Disbursement</strong></td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td align='center'>&nbsp;</td>
  <td align='center'><div align="right" class="style5"></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;1. Advertising</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_list_no?></td>
  <td><div align="center"><?php echo $sum1 = $fcl->pmt_adv?></div></td>
  <td><div align="right"><?php echo number_format($sum2 = $sum1 * $fcl->pmt_list_no,2)?></div></td>
  </tr>
<tr bordercolor="1">
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td>&nbsp;</td>
  <td><div align="right"></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>2</td>
  <td ALIGN='left'><strong>&nbsp;Reimbursement</strong></td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td>&nbsp;</td>
  <td><div align="right"></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;1. Phone &amp; Fax Expenses</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no?></td>
  <td><div align="center" class="style5"><?php echo $sum3 = $fcl->pmt_phone?></div></td>
  <td><div align="right" class="style5"><?php echo number_format($sum4 = $sum3 * $fcl->pmt_fcl_no,2)?></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;2. Travelling Expenses</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no?></td>
  <td><div align="center" class="style5"><?php echo $sum5 = $fcl->pmt_travel?></div></td>
  <td><div align="right" class="style5"><?php echo number_format($sum6 = $sum5 * $fcl->pmt_fcl_no,2)?></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;3. Interview Arrangement</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no?></td>
  <td><div align="center" class="style5"><?php echo $sum7 = $fcl->pmt_int?></div></td>
  <td><div align="right" class="style5"><?php echo number_format($sum8 = $sum7 * $fcl->pmt_fcl_no,2)?></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;4. Data Search</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no?></td>
  <td><div align="center" class="style5"><?php echo $sum9 = $fcl->pmt_data?></div></td>
  <td><div align="right" class="style5"><?php echo number_format($sum10 = $sum9 * $fcl->pmt_fcl_no,2)?></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='left'>&nbsp;5. Photocopy &amp; printing</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no?></td>
  <td><div align="center" class="style5"><?php echo $sum11 = $fcl->pmt_photo?></div></td>
  <td><div align="right" class="style5"><?php echo number_format($sum12 = $sum11 * $fcl->pmt_fcl_no,2)?></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='LEFT'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td>&nbsp;</td>
  <td><div align="right"></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td colspan="3" ALIGN='LEFT'><div align="center" class="style5"><strong> TOTAL BEFORE GST</strong></div></td>
  <td><div align="right" class="style5"><strong><?php echo number_format($sumA = $sum2 + $sum4 + $sum6 + $sum8 + $sum10 + $sum12,2) ?></strong></div></td>
  </tr>
<tr>
  <td height="21" ALIGN='CENTER'>&nbsp;</td>
  <td colspan="3" ALIGN='LEFT'><div align="center" class="style5"><strong>ADD GST@6%</strong></div></td>
  <td><div align="right" class="style5"><strong><?php echo number_format($sumB = $sumA * 0.06,2) ?></strong></div></td>
</tr>
<tr>
  <td height="21" ALIGN='CENTER' bordercolor="#666666" bgcolor="#FFFFFF">&nbsp;</td>
  <td colspan="3" ALIGN='LEFT' bordercolor="#666666" bgcolor="#FFFFFF"><div align="center" class="style5"><strong> TOTAL </strong></div></td>
  <td bordercolor="#666666" bgcolor="#FFFFFF"><div align="right" class="style5"><strong><?php echo number_format($sumC = $sumA + $sumB,2) ?></strong></div></td>
</tr>
<?php }
  	 	 }
  	 	 ?>
</table>
<br />
<table width="100%">
<tr align="right">
   <td colspan="3">&nbsp;</td>
</tr>
<tr>
   <td colspan="3">&nbsp;</td>
</tr>
<tr>
   <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td width="71%">&nbsp;</td>
	<td width="19%">&nbsp;</td>
	<td width="10%">&nbsp;</td>
</tr>
<tr>
    <td height="40">&nbsp;</td>
	<td colspan="2">-----------------------------------------------------------</td>
  </tr>
<tr>
    <td>&nbsp;</td>
	<td colspan="2"><div align="center">Authorised Signature</div></td>
  </tr>
<tr>
    <td><span class="style7">* Tax invoice and official receipt will be issued once the payment is made</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
</body>
</html>