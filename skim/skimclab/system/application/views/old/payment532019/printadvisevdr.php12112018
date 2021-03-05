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
    <td rowspan="5" width="140"><img src="<?php echo base_url();?>images/logoLetter.jpg" width="50" height="50"></td>
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
<table width="100%" style="text-align: left;border-collapse: collapse;" align="center" border="1" bordercolor="#cccccc">	
	<tr>
		<td colspan="4" rowspan="3" align="center" width="300">DESCRIPTIONS</td>
		<td align="center" height=35 width="100">Bank Draft to: Construction Labour Exchange Centre Berhad</td>
		<td colspan="3" align="center" width="100">Bank Draft to : Ketua Pengarah Imigresen Malaysia</td>
		<td colspan="5" align="center">Bank Draft to : Lonpac Insurance Berhad</td>
		<td colspan="6" align="center">Bank Draft to : Construction Labour Exchange Centre Berhad</td>	
	</tr>
	<tr>
		<td colspan=4 align="center" height=20>VDR</td>
		<td align="center">Insurance Guarantee</td>
		<td align="center">FWCS</td>
		<td align="center">FWHS</td>
		<td colspan="2" align="center"></td>
		<td colspan="4" align="center">CLAB Processing Fees</td>
		<td align="center">FOMEMA</td>
		<td align="center"></td>
	</tr>
	<tr>
		<td align="center" height=15>1st Payment</td>
		<td colspan="14" align="center">2nd Payment</td>
	</tr>
	
	<tr>
		<td align="center" height=20>No.</td>
		<td align="center">Name</td>
		<td align="center">No of FCL</td>
		<td align="center">Source Country</td>
		<td align="center">Levy</td>
		<td align="center">PLKS</td>
		<td align="center">Fees</td>
		<td align="center">Visa</td>
		<td align="center">Refer Note below</td>
		<td align="center">Per FCL</td>
		<td align="center">Per FCL</td>
		<td align="center">*0% GST</td>
		<td align="center">Stamp Duty</td>
		<td align="center">Admin Fees</td>
		<td align="center">New Green Card</td>
		<td align="center">Transit Centre</td>
		<td align="center">Others</td>
		<td align="center">Medical</td>
		<td align="center">*0% GST</td>
	</tr>
<?php
	$tfcl=0;$tlevy=0;$tplks=0;$tfees=0;$tvisa=0;$tig=0;$tfwcs=0;$tfwhs=0;$tigst=0;$tstamp=0;$tadmin=0;$tgreen=0;$ttransit=0;$tothers=0;$tfomema=0;$tcgst=0;
	$sum1=0;$sum2=0;$sum3=0;$sum4=0;
	$i = 1;
	foreach($fcl->result() as $fcl){ ?>
		<tr>
			<?php 
			$levy = $fcl->pmt_levi * $fcl->pmt_fcl_no;
			$plks = $fcl->pmt_plks * $fcl->pmt_fcl_no;
			$fees = $fcl->pmt_fees * $fcl->pmt_fcl_no;
			$visa = $fcl->pmt_visa * $fcl->pmt_fcl_no;
			$val = $fcl->pmt_fcl_no * $fcl->cty_fine * 18 / 12 * 0.01;
			if($val <= 50.00) $ig = 50.00; else $ig = $val;
			$fwcs = $fcl->pmt_fwcs * $fcl->pmt_fcl_no;
			$fwhs = $fcl->pmt_fwhs * $fcl->pmt_fcl_no;
			$igst = ($ig + $fwcs + $fwhs) * 0.00;
			$stamp = 30;
			$admin = ($fcl->pmt_admin + 50) * $fcl->pmt_fcl_no;
			$green = $fcl->pmt_green * $fcl->pmt_fcl_no;
			$transit = $fcl->pmt_transit * $fcl->pmt_fcl_no;
			$others = $fcl->pmt_others;
			$fomema = $fcl->pmt_fomema * $fcl->pmt_fcl_no;
			$cgst = ($admin + $green + $transit + $others + $fomema) * 0.00;
			
			?>
			<td ALIGN='CENTER' height=15><?php echo $i++ ?></td>
			<td ALIGN='CENTER'>IF TOTAL NO OF FCL IS&nbsp;<?php echo $nfcl = $fcl->pmt_fcl_no?>&nbsp;PERSON</td>
			<td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no ?></td>
			<td ALIGN='CENTER'><?php echo $fcl->pmt_cty_desc?></td>
			<td ALIGN='CENTER'><?php echo number_format($levy,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($plks,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fees,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($visa,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($ig,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fwcs,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fwhs,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($igst,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($stamp,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($admin,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($green,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($transit,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($others,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fomema,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($cgst,2) ?></td>
		</tr>		
		<?php
		$tfcl = $tfcl + $nfcl;
		$tlevy = $tlevy + $levy;
		$tplks = $tplks + $plks;
		$tfees = $tfees + $fees;
		$tvisa = $tvisa + $visa;
		$tig = $tig + $ig;
		$tfwcs = $tfwcs + $fwcs;
		$tfwhs = $tfwhs + $fwhs;
		$tigst = $tigst + $igst;
		$tstamp = $tstamp + $stamp;
		$tadmin = $tadmin + $admin;
		$tgreen = $tgreen + $green;
		$ttransit = $ttransit + $transit;
		$tothers = $tothers + $others;
		$tfomema = $tfomema + $fomema;
		$tcgst = $tcgst + $cgst;		
	}
	$sum1 = $tlevy;
	$sum2 = $tplks+$tfees+$tvisa;
	$sum3 = $tig+$tfwcs+$tfwhs+$tigst+$tstamp;
	$sum4 = $tadmin+$tgreen+$ttransit+$tothers+$tfomema+$tcgst;
	?>
	<tr><td colspan=19>&nbsp;</td></tr>
	<tr>
		<td ALIGN='CENTER' height=15></td>
		<td ALIGN='CENTER'></td>
		<td ALIGN='CENTER'><?php echo $tfcl ?></td>
		<td ALIGN='CENTER'></td>
		<td ALIGN='CENTER'><?php echo number_format($tlevy,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tplks,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfees,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tvisa,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tig,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfwcs,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfwhs,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tigst,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tstamp,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tadmin,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tgreen,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($ttransit,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tothers,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfomema,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tcgst,2) ?></td>	
	</tr>
	<tr>
		<td height=20></td>
		<td colspan=3 align=center><b>TOTAL</b></td>
		<td align=center><b><?php echo number_format($sum1,2) ?></b></td>	
		<td align=center colspan=3><b><?php echo number_format($sum2,2) ?></b></td>
		<td align=center colspan=5><b><?php echo number_format($sum3,2) ?></b></td>
		<td align=center colspan=6><b><?php echo number_format($sum4,2) ?></b></td>
	<tr>
</table>
<br />
<table width="100%" style="border-collapse: collapse;" border="0" bordercolor="#cccccc">
<tr>
   <td width="40%">Construction Labour Exchange Centre Berhad </td>
   <td width="40%">we hereby agree with the above charges.Please proceed with the necessary action </td>
   <td align="right"><font style='font-size: 10px;font-weight: bold;'>GRAND TOTAL : RM<?php echo number_format($sum1 + $sum2 + $sum3 + $sum4,2) ?></font></b></td>
</tr>
<tr>
    <td height="30">&nbsp;</td>
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
<tr><td colspan=3 height=30>&nbsp;</td></tr>
<tr>
	<td>
		<table width="400" style="border-collapse: collapse;" border="1" bordercolor="#cccccc">
			<tr><td colspan=8 height=15>Note :</td></tr>
			<tr><td colspan=8 height=15>All admin fees subject to 0% GST</td></tr>
			<tr><td colspan=8 height=15>Formula Insurance Guarantee for Foreign Workers RM50.00 OR as per formula below (whichever is higher)</td></tr>
			<tr>
				<td width=70 height=15 align=center></td>
				<td width=70 align=center>No of Worker(s)</td>
				<td width=40 align=center>Rate</td>
				<td width=40 align=center>Month</td>
				<td width=40 align=center>Year</td>
				<td width=40 align=center>Interest</td>
				<td width=40 align=center>Total(RM)</td>
				<td></td>
			</tr>
			<tr>
				<td height=15></td>
				<td align=center><?php echo $fcl->pmt_fcl_no ?></td>
				<td align=center><?php echo $fcl->cty_fine ?></td>
				<td align=center>18</td>
				<td align=center>12</td>
				<td align=center>1.00%</td>
				<td align=center><?php $val = $fcl->pmt_fcl_no * $fcl->cty_fine * 18 / 12 * 0.01; echo number_format($val,2); ?></td>
				<td align=center></td>
			</tr>
		</table>
	</td>
	<td colspan=2 valign=bottom>
		<table width="500" style="border-collapse: collapse;" border="0" bordercolor="#cccccc">
			<tr><td align=left height=15>*Penalty shall be imposed on any cancellations</td></tr>
			<tr><td align=left height=15 >*All IG & FWCS will be made through CLAB</td></tr>
			<tr><td align=left height=15 >*IG Payment - maximum 15 FCL per IG</td></tr>
		</table>
	</td>
</tr>
</table>
</body>
</html>