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
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
	color: #333333;
}
</style>
</head>
<body>
<table width="100%" style="text-align: left;" align="center" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td rowspan="5" width="140"><img src="<?php echo base_url();?>images/logoLetter.jpg"></td>
	<td colspan="4"><strong>PAYMENT ADVICE FOR VDR PROGRAMME</strong></td>
  </tr>
<tr>
    <td colspan="4">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) </td>
  </tr>
<tr>
    <td colspan="4">LEVEL 2, ANNEXE BLOCK,MENARA MILENIUM, 8 </td>
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
  <td width="324">:&nbsp;<?php echo $display->pmt_no?></td>
  <td width="195">&nbsp;</td>
  <td width="241">&nbsp;</td>
 
</tr>
<tr>
  <td height="20">DATE</td>
  <td>:&nbsp;<?php echo date("d-M-Y",strtotime($display->pmt_dateissue))?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 
</tr>
<tr>
  <td height="20">COMPANY</td>
  <td>:&nbsp;<?php echo $display->pmt_compname?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>

</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td>:&nbsp;<?php echo $display->pmt_address1?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>

</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td>:&nbsp;<?php echo $display->pmt_address2?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  
</tr>
<tr>
  <td height="20">&nbsp;</td>
  <td>:&nbsp;<?php echo $display->pmt_address3?>&nbsp;<?php echo $display->pmt_postcode?>&nbsp;<?php echo $display->pmt_state?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>

</tr>
<tr>
  <td height="20">TEL / FAX </td>
  <td>:&nbsp;<?php echo $display->pmt_tel?>&nbsp;/&nbsp;<?php echo $display->pmt_fax?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>

</tr>
<tr>
  <td height="20">ATTENTION</td>
  <td>:&nbsp;<?php echo $display->pmt_attn?></td>
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
<table width="100%" style="text-align: left;" align="center" border="1" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="6" rowspan="3" ALIGN='CENTER' width="30%">DESCRIPTIONS</td>
	<td colspan="5" align="center">Bank Draft to:<br />
     Ketua Pengarah Imigresen Malaysia  </td>
	<td colspan="3" align="center">Bank Draft to: Lonpac Insurance<br /> Berhad </td>
	<td colspan="2"><div align="center">Bank Draft to:Lonpac Insurance<br /> 
    Berhad </div></td>
	<td colspan="3"><div align="center">Bank Draft to : Construction Labour<br />
    Exchange Centre Berhad </div></td>
	<td colspan="2"><div align="center">Bank Draft to : Construction Labour<br />
    Exchange Centre Berhad</div></td>
	<td><div align="center">Bank Draft To FOMEMa Sdn Bhd </div></td>	
</tr>
<tr>
  <td colspan="5"><div align="center">Jabatan Imigresen Processing Fees </div></td>
  <td><div align="center">Insurance<br />
    Guarantee </div></td>
  <td colspan="2"><div align="center">Insurance Coverage </div></td>
  <td><div align="center">Insurance Coverage </div></td>
  <td><div align="center">Insurance<br /> Coverage </div></td>
  <td colspan="3"><div align="center">Clab Processing Fees </div></td>
  <td colspan="2"><div align="center">Transit Center </div></td>
  <td><div align="center">FOMEMA Processing Fees </div></td>	
</tr>
<tr>
  <td colspan="5"><div align="center">1</div></td>
  <td><div align="center">2</div></td>
  <td><div align="center">3</div></td>
  <td><div align="center">4</div></td>
  <td><div align="center">5</div></td>
  <td><div align="center">6</div></td>
  <td colspan="3"><div align="center">7</div></td>
  <td><div align="center">8</div></td>
  <td><div align="center">9</div></td>
  <td><div align="center">10</div></td>	
</tr>
<tr>
  <td ALIGN='CENTER'><div align="center">No</div></td>
  <td ALIGN='CENTER'><div align="center">Name</div></td>
  <td ALIGN='CENTER'><div align="center">No Of<br />FCL </div></td>
  <td ALIGN='CENTER'><div align="center">Source Country </div></td>
  <td ALIGN='CENTER'><div align="center">Wages</div></td>
  <td ALIGN='CENTER'><div align="center">JIM<br />Guarantee<br />Amount </div></td>
  <td><div align="center">Period</div></td>
  <td><div align="center">PLKS</div></td>
  <td><div align="center">Fees</div></td>
  <td><div align="center">Visa</div></td>
  <td><div align="center">Levi</div></td>
  <td><div align="center">Insurance<br />Guarantee </div></td>
  <td><div align="center">FWCS</div></td>
  <td><div align="center">Stamp Duty </div></td>
  <td><div align="center">Medical Insurance<br />(FWHS) </div></td>
  <td><div align="center">Stamp duty </div></td>
  <td><div align="center">Admin<br />Fees </div></td>
  <td><div align="center">Agency Fee </div></td>
  <td><div align="center">*6% Service<br />Tax </div></td>
  <td><div align="center">Course Of Transit Center </div></td>
  <td><div align="center">Source Country Processing Fees </div></td>
  <td><div align="center">FOMEMA</div></td>
</tr>
<tr>
  <td ALIGN='CENTER'><div align="center"></div></td>
  <td ALIGN='CENTER'><div align="center"></div></td>
  <td ALIGN='CENTER'><div align="center"></div></td>
  <td ALIGN='CENTER'><div align="center"></div></td>
  <td ALIGN='CENTER'><div align="center">RM</div></td>
  <td ALIGN='CENTER'><div align="center"></div></td>
  <td><div align="center">(mth)</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
  <td><div align="center">RM</div></td>
</tr>
<?php if($fcl->num_rows() == 0){ ?>
<tr>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<?php }else{ ?>
<?php 
     $i = 1;
	 foreach($fcl->result() as $fcl){
?>
<tr>
  <td ALIGN='CENTER'><?php echo $i++ ?></td>
  <td ALIGN='CENTER'>IF TOTAL NO OF FCL IS&nbsp;<?php echo $fcl->pmt_fcl_no?>&nbsp;PERSON</td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no ?></td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_cty_desc?></td>
  <td ALIGN='CENTER'><?php echo $sum1 = number_format($fcl->pmt_wages * $fcl->pmt_fcl_no,2) ?></td>
  <td ALIGN='CENTER'><?php echo $sum2 = $fcl->pmt_jim ?></td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_period ?></td>
  <td ALIGN='CENTER'><?php echo $sum3 = number_format($fcl->pmt_plks * $fcl->pmt_fcl_no,2)?></td>
  <td ALIGN='CENTER'><?php echo $sum4 = number_format($fcl->pmt_fees * $fcl->pmt_fcl_no,2) ?></td>
  <td ALIGN='CENTER'><?php echo $sum5 = number_format($fcl->pmt_visa * $fcl->pmt_fcl_no,2)?></td>
  <td ALIGN='CENTER'><?php echo $sum6 = $fcl->pmt_levi * $fcl->pmt_fcl_no ?></td>
  <td ALIGN='CENTER'><?php $val = $fcl->pmt_fcl_no * $fcl->cty_fine * 18 / 12 * 0.01 + 10 ;
  if($val <= "60"){
     echo $sum7 = "60";
  }else{
     echo $sum7 = $val;
  }
  ?></td>
  <td ALIGN='CENTER'><?php echo $sum8 = "76.02" * $fcl->pmt_fcl_no  ?></td>
  <td ALIGN='CENTER'><?php echo $sum9 = "10.00" ?></td>
  <td ALIGN='CENTER'><?php echo $sum10 = "120.00" * $fcl->pmt_fcl_no ?></td>
  <td ALIGN='CENTER'><?php echo $sum11 = "10.00" ?></td>
  <td ALIGN='CENTER'><?php echo $sum12 = $fcl->pmt_fcl_no * 300 ?></td>
  <td ALIGN='CENTER'><?php echo $sum13 = $fcl->pmt_fcl_no * 50 ?></td>
  <td ALIGN='CENTER'><?php echo $sum14 = ($sum12 + $sum13) * 0.06?></td>
  <td ALIGN='CENTER'><?php echo $sum15 = $fcl->pmt_fcl_no * $fcl->pmt_trans_fees ?></td>
  <td ALIGN='CENTER'><?php echo $sum16 = $fcl->pmt_fcl_no * $fcl->pmt_trans_cost ?></td>
  <td ALIGN='CENTER'><?php echo $sum17 = $fcl->pmt_fcl_no * 180?></td>
</tr>
<tr>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>TOTAL </td>
  <td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no ?></td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'><?php echo $sum1?></td>
  <td ALIGN='CENTER'><?php echo $sum2?></td>
  <td>&nbsp;</td>
  <td ALIGN='CENTER'><?php echo $sum3?></td>
  <td ALIGN='CENTER'><?php echo $sum4?></td>
  <td ALIGN='CENTER'><?php echo $sum5?></td>
  <td ALIGN='CENTER'><?php echo $sum6?></td>
  <td ALIGN='CENTER'><?php echo $sum7?></td>
  <td ALIGN='CENTER'><?php echo $sum8?></td>
  <td ALIGN='CENTER'><?php echo $sum9?></td>
  <td ALIGN='CENTER'><?php echo $sum10?></td>
  <td ALIGN='CENTER'><?php echo $sum11?></td>
  <td ALIGN='CENTER'><?php echo $sum12 ?></td>
  <td ALIGN='CENTER'><?php echo $sum13 ?></td>
  <td ALIGN='CENTER'><?php echo $sum14 ?></td>
  <td ALIGN='CENTER'><?php echo $sum15 ?></td>
  <td ALIGN='CENTER'><?php echo $sum16 ?></td>
  <td ALIGN='CENTER'><?php echo $sum17 ?></td>
</tr>
<tr>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>GRAND TOTAL </td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td ALIGN='CENTER'>&nbsp;</td>
  <td colspan="5"><div align="right"><?php echo $sumA = $sum3 + $sum4 + $sum5 + $sum6 ?></div></td>
  <td colspan="3" ALIGN='CENTER'><div align="right"><?php echo $sumB = $sum7 + $sum8 + $sum9?></div></td>
  <td colspan="2" ALIGN='CENTER'><div align="right"><?php echo $sumC = $sum10 + $sum11?></div></td>
  <td colspan="3" ALIGN='CENTER'><div align="right"><?php echo $sumD = $sum12 + $sum13 + $sum14?></div></td>
  <td colspan="2" ALIGN='CENTER'><div align="right"><?php echo $sumE = $sum15 + $sum16?></div></td>
  <td><div align="right"><?php echo $sumF = $sum17?></div></td>
</tr>
<?php }
  	 	 }
  	 	 ?>
</table>
<br />
<table width="100%">
<tr>
   <td colspan="3" align="right"><b><font size="1">TOTAL : RM&nbsp;<?php echo $sum1 + $sumA + $sumB + $sumC + $sumD + $sumE + $sumF ?></font></b></td>
</tr>
<tr>
   <td colspan="3">&nbsp;</td>
</tr>
<tr>
   <td colspan="3">&nbsp;</td>
</tr>
<tr>
    <td width="40%">Construction Labour Exchange Centre Berhad </td>
	<td width="40%">we hereby agree with the above charges.Please proceed with the necessary action </td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
    <td height="40">&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
    <td>--------------------------------</td>
	<td>--------------------------------</td>
	<td>&nbsp;</td>
</tr>
<tr>
    <td>Authorised Signature</td>
	<td>Signature/Company's Chop</td>
	<td>&nbsp;</td>
</tr>
</table>
</body>
</html>