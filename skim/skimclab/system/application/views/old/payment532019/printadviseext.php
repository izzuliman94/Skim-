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
	<td colspan="4"><strong>PAYMENT ADVICE FOR RENEWAL PROGRAMME</strong></td>
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
		<td colspan="4" rowspan="2" align="center">DESCRIPTIONS</td>
		<?php
		//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>'')  
			echo '<td colspan="2" align="center">Bank Draft to : Ketua Pengarah Imigresen Malaysia</td>';
		?>
		<td colspan="4" align="center" height=25>Bank Draft to : Ketua Pengarah Imigresen Malaysia</td>		
		<td colspan="5" align="center">Bank Draft to : Lonpac Insurance Berhad</td>
		<td colspan="4" align="center">Bank Draft to : Construction Labour Exchange Centre Berhad</td>	
		<td colspan="3" align="center">Bank Draft to : FOMEMA</td>
	</tr>
	<tr>
		<?php
		//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>'')  
			echo '<td colspan=2 align="center" height=25>Others</td>';
		?>
		<td colspan=4 align="center" height=25>Extension Change of Employer</td>		
		<td align="center">Insurance Guarantee</td>
		<td align="center">FWCS</td>
		<td align="center">FWHS</td>
		<td colspan="2" align="center"></td>
		<td colspan="4" align="center">CLAB Processing Fees</td>
		<td colspan="3" align="center">FOMEMA</td>
	</tr>
	<tr>
		<td align="center" height=20>No.</td>
		<td align="center">Name</td>
		<td align="center">No of FCL</td>
		<td align="center">Source Country</td>
		<?php
		//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>''){
			echo '<td align="center" width="50">Compound</td>';
			echo '<td align="center" width="50">Special Pass (SP)</td>';
		//} ?>
		<td align="center" width="45">Levy</td>
		<td align="center" width="45">PLKS</td>
		<td align="center" width="45">Fees</td>
		<td align="center" width="45">Visa</td>
		<td align="center" width="45">Refer Note below</td>
		<td align="center" width="45">Per FCL</td>
		<td align="center" width="45">Per FCL</td>
		<td align="center" width="45">*6% ST</td>
		<td align="center" width="45">Stamp Duty</td>
		<td align="center" width="45">Admin Fees</td>
		<td align="center" width="45">Green Card</td>
		<td align="center" width="45">Others</td>
		<td align="center" width="45">*6% ST</td>
		<td align="center" width="45">Processing Fee</td>
		<td align="center" width="45">Medical</td>
		<td align="center" width="45">*6% ST</td>
	</tr>
<?php
	$tfcl=0;$tlevy=0;$tplks=0;$tfees=0;$tvisa=0;$tig=0;$tfwcs=0;$tfwhs=0;$tigst=0;$tstamp=0;$tadmin=0;$tgreen=0;$tothers=0;$tcgst=0;$tfomema=0 ;$tfomema2=0;$tfgst=0;$tcomp=0;$tsp=0;
	$sum0=0;$sum1=0;$sum2=0;$sum3=0;
	$i = 1;
	foreach($fcl->result() as $fcl){ ?>
		<tr>
			<?php 
			$comp = $fcl->pmt_compound;
			$sp = $fcl->pmt_sp;
			
			$levy = $fcl->pmt_levi * $fcl->pmt_fcl_no;
			$plks = $fcl->pmt_plks * $fcl->pmt_fcl_no;
			$fees = $fcl->pmt_fees * $fcl->pmt_fcl_no;
			$visa = $fcl->pmt_visa * $fcl->pmt_fcl_no;
			$val = $fcl->pmt_fcl_no * $fcl->cty_fine * 18 / 12 * 0.01;
			if($val <= 50.00) $ig = 50.00; else $ig = $val;
			$fwcs = $fcl->pmt_fwcs * $fcl->pmt_fcl_no;
			$fwhs = $fcl->pmt_fwhs * $fcl->pmt_fcl_no;
			$igst = ($ig + $fwcs + $fwhs) * 0.06;
			$stamp = 20;
			$admin = $fcl->pmt_admin * $fcl->pmt_fcl_no;
			$green = $fcl->pmt_green * $fcl->pmt_fcl_no;
			$others = $fcl->pmt_others;
			$cgst = ($admin+$green+$others) * 0.06;
			$fomema = $fcl->pmt_fomema * $fcl->pmt_fcl_no;
			$fomema2 = $fcl->pmt_fomema2 * $fcl->pmt_fcl_no;
			$fgst = $fomema2 * 0.06;
			
			?>
			<td ALIGN='CENTER' height=15><?php echo $i++ ?></td>
			<td ALIGN='CENTER'>IF TOTAL NO OF FCL IS&nbsp;<?php echo $nfcl = $fcl->pmt_fcl_no?>&nbsp;PERSON</td>
			<td ALIGN='CENTER'><?php echo $fcl->pmt_fcl_no ?></td>
			<td ALIGN='CENTER'><?php echo $fcl->pmt_cty_desc?></td>
			<?php
			//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>''){
				echo "<td ALIGN='CENTER'>".number_format($comp,2)."</td>";
				echo "<td ALIGN='CENTER'>".number_format($sp,2)."</td>";
			//} ?>
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
			<td ALIGN='CENTER'><?php echo number_format($others,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($cgst,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fomema2,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fomema,2) ?></td>
			<td ALIGN='CENTER'><?php echo number_format($fgst,2) ?></td>
		</tr>		
		<?php
		$tfcl = $tfcl + $nfcl;
		$tcomp = $tcomp + $comp;
		$tsp = $tsp + $sp;
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
		$tothers = $tothers + $others;
		$tcgst = $tcgst + $cgst;
		$tfomema = $tfomema + $fomema;
		$tfomema2 = $tfomema2 + $fomema2;
		$tfgst = $tfgst + $fgst;		
	}
	$sum0 = $tcomp+$tsp;
	$sum1 = $tlevy+$tplks+$tfees+$tvisa;
	$sum2 = $tig+$tfwcs+$tfwhs+$tigst+$tstamp;
	$sum3 = $tadmin+$tgreen+$tothers+$tcgst;
	$sum4 = $tfomema+ $tfomema2 + $tfgst;
	?>
	<tr><td colspan=21>&nbsp;</td></tr>
	<tr>
		<td ALIGN='CENTER' height=15></td>
		<td ALIGN='CENTER'></td>
		<td ALIGN='CENTER'><?php echo $tfcl ?></td>
		<td ALIGN='CENTER'></td>
		<?php
		//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>''){
			echo "<td ALIGN='CENTER'>".number_format($tcomp,2)."</td>";
			echo "<td ALIGN='CENTER'>".number_format($tsp,2)."</td>";
		//} ?>
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
		<td ALIGN='CENTER'><?php echo number_format($tothers,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tcgst,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfomema2,2) ?></td>	
		<td ALIGN='CENTER'><?php echo number_format($tfomema,2) ?></td>
		<td ALIGN='CENTER'><?php echo number_format($tfgst,2) ?></td>	
	</tr>
	<tr>
		<td height=20></td>
		<td colspan=3 align=center><b>TOTAL</b></td>
		<?php
		//if($fcl->pmt_compound<>0 && $fcl->pmt_compound<>'' && $fcl->pmt_sp<>0 && $fcl->pmt_sp<>''){
			echo '<td align=center colspan=2><b>'.number_format($sum0,2).'</b></td>';		
			echo '<td align=center colspan=4><b>'.number_format($sum1,2).'</b></td>';
		//} ?>
		<td align=center colspan=5><b><?php echo number_format($sum2,2) ?></b></td>
		<td align=center colspan=4><b><?php echo number_format($sum3,2) ?></b></td>
		<td align=center colspan=3><b><?php echo number_format($sum4,2) ?></b></td>
	<tr>
</table>
<br />
<table width="100%" style="border-collapse: collapse;" border="0" bordercolor="#cccccc">
<tr>
   <td width="40%">Construction Labour Exchange Centre Berhad </td>
   <td width="40%">we hereby agree with the above charges.Please proceed with the necessary action </td>
   <td align="right"><font style='font-size: 10px;font-weight: bold;'>GRAND TOTAL : RM<?php echo number_format($sum0 + $sum1 + $sum2 + $sum3 + $sum4,2) ?></font></td>
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
			<tr>
			  <td colspan=8 height=15>All admin fees subject to 6% Service Tax</td></tr>
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
			<tr><td align=left height=15 ></td></tr>
			<tr><td align=left height=15>*Penalty shall be imposed on any cancellations</td></tr>
			<tr><td align=left height=15 >*All IG & FWCS will be made through CLAB</td></tr>			
		</table>
	</td>
</tr>
</table>
</body>
</html>