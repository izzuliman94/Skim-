<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #000000;
	font-weight: bold;
}

td {
font-family:"Century Gothic";
	font-size: 9px;
	color: #333333;
}
.style1 {
	font-size: 14px;
	font-weight: bold;
}
.style2 {
	font-size: 10px;
	font-weight: bold;
}
.style7 {font-size: 7px}
.style8 {
	font-size: 16px;
	font-weight: bold;
}
</style>
<?php

function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

?>
</head>
<body>
<?php 

$discount= $payment->amt_disc;
$rmkdisc=$payment->rmk_disc;
$nofcl= $payment->no_of_fcl;
$totgst=0;$totbefgst=0;$unitINS=0;
$totos=0;$addgst=0;$tso=0;$tsr=0;$tgst=0;$tamt = 0;

?>
<table align="center" width="104%">
<tr>
	<td>
	<table width="90%" align="center">			
		<tr>
		  <td height="15" colspan="5"><span class="style1">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</span> <span class="style7">(634396-W)</span><br />
			Level 2, Annexe Block, Menara Milenium 8, Jalan Damanlela, <br />
			Bukit Damansara 50490 Kuala Lumpur<br />
			Tel : 03-2095 9599     Fax : 03-2095 9566&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>No Daftar Kastam</strong> : <strong>W10-1808-32001604</strong><br /></td>
		  <td width="10%" height="15"><span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></span></td>
		</tr>
		<tr><td colspan="4" height=40px><div align="center"><span class="style8">PAYMENT ADVICE FOR CONTRACTOR-EXTENSION</span></div></td>
		  <td height=40px>&nbsp;</td>
		</tr>						

		<tr>
		  <td height="10"><strong>Ref No</strong></td>
		  <td >&nbsp;</td>
		  <td ><div align="left">PA/<?php echo substr($payment->pmt_receipt_no,2);  ?></div></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>
		<tr>
		  <td height="10"><strong>Date</strong></td>
		  <td >&nbsp;</td>
		  <td ><?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>
		<tr>
			<td width="12%" height="10"><strong>Company </strong></td>
			<td width="3%" >:</td>
			<td ><?php echo $payment->pmt_receive_from; ?></td>
			<td width="17%">&nbsp;</td>
			<td><strong> :</strong></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
		  <td height="10"><strong>Address</strong></td>
		  <td >&nbsp;</td>
		  <td><?php echo $payment->pmt_addr; ?></td>
		  <td >&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>
		<tr>
		  <td height="10"><strong>Nationality</strong></td>
		  <td >&nbsp;</td>
		  <td><?php echo $payment->country ?></td>
		  <td >&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
	    </tr>
		<tr>
			<td height="10"><strong>No Of FCL</strong></td>
			<td >:</td>
			<td><?php echo $nofcl ?></td>
			<td >&nbsp;</td>
			<td><strong> :</strong></td>
			<td>&nbsp;</td>
		</tr>
	</table>
<br/>
<table width="90%"  cellpadding="3" border="1" align="center" bordercolor="#cccccc" style="border-collapse: collapse;">
				
<tr bgcolor=#F3F3F3>
  <td width="40"><div align="center" class="style2">ITEM</div></td>
  <td width="272" height="20"><div align="center" class="style2">DESCRIPTION</div></td>
  <td width="90" ><div align="center" class="style2">DETAILS</div></td>
  <td width="90" ><div align="center" class="style2">UNIT PRICE (RM)</div></td>
  <td width="90" ><div align="center" class="style2">QUANTITY</div></td>
  <td width="90" ><div align="center" class="style2">TOTAL BEFORE TAX</div></td>
  <td width="90" ><div align="center" class="style2">SERVICE TAX (6%)</div></td>
  <td width="82" ><div align="center" class="style2">STAMP DUTY</div></td>
  <td width="86" ><div align="center" class="style2">TOTAL (RM)</div></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
  <td height="20" align=left><strong>Bank Draft To : </strong>Construction Labour Exchange Centre Berhad</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
</tr>
<tr>

  <td align=center>&nbsp;</td>
  <td height="20" align=left>&nbsp;</td>
  <td >
							  
  </td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>

</tr>

	
<tr>
  <td align=center>1</td>
  <td height="20" align=left><strong>Extension Change Of Employer</strong></td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
</tr>
<?php
if($payment->payment_type=='V' || $payment->payment_type=='R' || $payment->payment_type=='G13' ||
$payment->payment_type=='REH' || $payment->payment_type=='CP' || $payment->payment_type=='LT' ||
$payment->payment_type=='COM' || $payment->payment_type=='SP'){ 

$jim='';$jim1='';$jim2='';$jim3='';$jim4='';$jim5='';$jim6='';$jim7='';$jim8='';$jim9='';$unitJIM1=0;$unitJIM2=0;$unitJIM3=0;$unitJIM4=0;
$unitJIM5=0;$unitJIM6=0;$unitJIM7=0;$unitJIM8=0;$unitJIM9=0;$gtotlevy=0;$gtotplks=0;$gtotfees=0;$gtotvisa=0;$ttax=0;
	$sduty1=0;$sduty=0;
	
if($payment->chk_jim_plks == '1') {$jim1="PLKS "; $unitJIM1 = $unitJIM1  + 60;}
if($payment->chk_jim_fees == '1') {$jim2="FEES "; $unitJIM2 = $unitJIM2  + 125;}
if($payment->chk_jim_visa == '1') {$jim3="VISA "; $unitJIM3 = $unitJIM3  + $payment->visa_ref;} 
if($payment->chk_jim_levi == '1') {$jim4="LEVY (NORMAL) "; $unitJIM4 = $unitJIM4  + 1850;}	
if($payment->chk_jim_levi2 == '1') {$jim5="LEVY 3 Month "; $unitJIM5 = $unitJIM5  + 462.5;}
if($payment->chk_jim_levi3 == '1') {$jim6="LEVY 6 Month "; $unitJIM6 = $unitJIM6  + 925;}
if($payment->chk_jim_sp == '1') {$jim7="SPECIAL PASS ";  $unitJIM7 = $unitJIM7  + 100;}
if($payment->chk_jim_cp == '1') {$jim8="CANCEL PERMIT "; $unitJIM8 = $unitJIM8  + $payment->fine_ref;}
if($payment->chk_jim_compound == '1') {$jim9="COMPOUND "; $unitJIM9 = $unitJIM9  + 1000;}

$totjim1=$nofcl*$unitJIM1;
$totjim2=$nofcl*$unitJIM2;
$totjim3=$nofcl*$unitJIM3;
$totjim4=$nofcl*$unitJIM4;
$totjim5=$nofcl*$unitJIM5;
$totjim6=$nofcl*$unitJIM6;
$totjim7=$nofcl*$unitJIM7;
$totjim8=$nofcl*$unitJIM8;
$totjim9=$nofcl*$unitJIM9;
//$totos=$totos+$totjim;
$sduty= 10.00;
$sduty1= 0.00;
	
$gtotlevy=$totjim4 + $ttax + $sduty1 ;
$gtotplks=$totjim1 + $ttax + $sduty1 ;
$gtotfees=$totjim2 + $ttax + $sduty1 ;
$gtotvisa=$totjim3 + $ttax + $sduty1 ;
$gtotsp=$totjim7 + $ttax + $sduty1 ;
$gtotcp=$totjim8 + $ttax + $sduty1 ;
$gtotcom=$totjim9 + $ttax + $sduty1 ;
	
}
?>
<tr>
  <td align=center>&nbsp;</td>
  <td height="20" align=left>&nbsp;</td>
  <td ><?php echo $jim4 ?></td>
  <td align=right><?php echo number_format($unitJIM4,2)?></td>
  <td align=right><?php echo $nofcl;?></td>
  <td align=right><?php echo $tbtax = number_format($totjim4,2) ?> </td>
  <td align=right><?php echo $ttax = number_format(($totjim4)*0.00,2) ?></td>
  <td align=right><?php echo number_format ($sduty1,2) ?></td>
  <td align=right><?php echo number_format($gtotlevy,2) ?></td>
</tr>
<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim1 ?></td>
	<td align=right><?php echo number_format($unitJIM1,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo $tbtax = number_format($totjim1,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim1)*0.00,2) ?></td>
	<td align=right><?php echo number_format($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotplks,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim2 ?></td>
	<td align=right><?php echo number_format($unitJIM2,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totjim2,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim2)*0.00,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotfees,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim3 ?></td>
	<td align=right><?php echo number_format($unitJIM3,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totjim3,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim3)*0.00,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotvisa,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim7 ?></td>
	<td align=right><?php echo number_format($unitJIM7,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totjim7,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim7)*0.00,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotsp,2) ?></td>
</tr>
<tr>
 <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim8 ?></td>
	<td align=right><?php echo number_format($unitJIM8,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totjim8,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim8)*0.00,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotcp,2) ?></td></tr>
<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $jim9 ?></td>
	<td align=right><?php echo number_format($unitJIM9,2)?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totjim9,2) ?></td>
	<td align=right><?php echo $ttax = number_format(($totjim9)*0.00,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotcom,2) ?></td></tr>
<tr bgcolor="#F3F3F3">
  <td align=center>&nbsp;</td>
  <td height="20" align=left><strong>Sub Total</strong></td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td >&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td align=center>&nbsp;</td>
  <td>&nbsp;</td>
  <td align=right ><strong><?php echo number_format($gtotlevy + $gtotplks + $gtotfees + $gtotvisa + $gtotsp + $gtotcp + $gtotcom,2) ?></strong></td>
</tr>
<tr>
  <td align=center>2</td>
	<td height="20" align=left><strong>Insurance</strong></td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td>&nbsp;</td>
	<td align=right>&nbsp;</td>
</tr>
<?php	

if($payment->payment_type=='R'){ 
	
$ins1='';$ins2='';$ins3='';$insu=0;$unitINS1=0;$unitINS3=0;$unitINS2=0;$totfwhs=0;$totig=0;$tfwhs=0;$val=0;$ig=0;$ttax1=0;
	$ttax=0;$sduty= 0;$gtotig=0;$gtotfwhs=0;


	
	if($payment->chk_ins_ig =='1'){
	
	$val = $nofcl * $payment->fine_ref * 18 / 12 * 0.01;
	if($val <= 50.00) $ig = 50.00; else $ig = $val;
		
	$ins1='IG';
	$sduty1= 0.00;
	$sduty= 10.00;
	$ttax = $ig * 0.06;
	$gtotig =	$ttax + $ig + $sduty;	
	//$sduty= 10.00;
	}
	
	//echo $val;  
	
	if($payment->chk_ins_fwhs == '1'){
	$tfwhs = 120;	
	$ins3='FWHS';
	$sduty= 10.00;
	$ttax1 = $nofcl*$tfwhs * 0.06;
	$totfwhs=$nofcl*$tfwhs;	
	$gtotfwhs =	$ttax1 + $totfwhs + $sduty;
		echo $ttax1;
	}
	
}
?>
<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=center>&nbsp;</td>
	<td ><?php echo $ins1 ?></td>
	<td align=right><?php echo number_format($ig,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($ig,2) ?></td>
	<td align=right><?php echo number_format($ttax,2) ?></td>
	<td align=right><?php echo number_format ($sduty,2) ?></td>
	<td align=right><?php echo number_format($gtotig,2) ?></td>
</tr>

			 
<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=center>&nbsp;</td>
	<td ><?php echo $ins3 ?></td>
	<td align=right><?php echo number_format($tfwhs,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totfwhs,2) ?></td>
	<td align=right><?php echo number_format($ttax1,2) ?></td>
	<td align=right><?php echo number_format ($sduty,2) ?></td>
	<td align=right><?php echo number_format($gtotfwhs,2) ?></td>
</tr>

<tr bgcolor="#F3F3F3">
  <td align=center>&nbsp;</td>
	<td height="20" align=left><strong>Sub Total</strong></td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td align=right>&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td >&nbsp;</td>
	<td align=right><strong><?php echo number_format($gtotig + $gtotfwhs ,2) ?></strong></td>
</tr>

<tr>
  <td align=center>3</td>
	<td height="20" align=left><strong>CLAB Processing Fee</strong></td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td >&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>

<?php	

if($payment->payment_type=='R'){
	
$ins1='';$ins2='';$ins3='';$insu=0;$unitINS1=0;$unitINS3=0;$unitINS2=0;$unitV1=0;$unitV2=0;$unitV3='';$unitV4=0;$unitV5=0;
	$unitFOM=0;$vdr1=0;$vdr2='';$vdr3='';$vdr4='';$vdr5='';$fom1='';
	
if($payment->chk_clab_fees_ext == '1') {$vdr1="ADMIN/AGENCY FEE, ";	$unitV1 = $unitV1 + $payment->clab_ren_fee;}
if($payment->chk_clab_fees_extgc == '1') {$vdr2="GREEN CARD, " ; $unitV2 = $unitV2 + $payment->clab_rengc_fee;}	
if($payment->chk_clab_tsitcent == '1') {
	$vdr3="TRANSIT CENTRE " ; 
	$unitV3 = $unitV3 + $payment->clab_tc_fee;
}else{


}
if($payment->chk_dep_fee == '1') {$vdr4="DEPOSIT FEE, " ; $unitV4 = $unitV4 + $payment->fine_ref;}
if($payment->chk_fomema_male == '1') {$fom1="MEDICAL, "; $unitFOM=180;}

$totadmin=$nofcl*$unitV1;
$totgc=$nofcl*$unitV2;
$tottc=$nofcl*$unitV3;
$totdf=$nofcl*$unitV4;
$totfom=$nofcl*$unitFOM;

$ttaxadmin=$totadmin * 0.06;
$ttaxgc=$totgc * 0.06;
$ttaxtc=$tottc * 0.06;
$ttaxdf=$totdf * 0.00;
$ttaxfom=$totfom * 0.00;
	
	
$gtotadmin = $ttaxadmin + $totadmin + $sduty1;
$gtotgc = $ttaxgc + $totgc + $sduty1;
$gtottc = $ttaxtc + $tottc + $sduty1;
$gtotdf = $ttaxdf + $totdf + $sduty1;

$gtotfom = $ttaxfom + $totfom + $sduty1;
	
}
?>	
	
<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=left>&nbsp;</td>
	<td ><?php echo $vdr1 ?></td>
	<td align=right><?php echo number_format($unitV1,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totadmin,2) ?></td>
	<td align=right><?php echo number_format($ttaxadmin,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotadmin,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=center>&nbsp;</td>
	<td ><?php echo $vdr2 ?></td>
	<td align=right><?php echo number_format($unitV2,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totgc,2) ?></td>
	<td align=right><?php echo number_format($ttaxgc,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotgc,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=center>&nbsp;</td>
	<td ><?php echo $vdr3 ?></td>
	<td align=right><?php echo number_format($unitV3,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($tottc,2) ?></td>
	<td align=right><?php echo number_format($ttaxtc,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtottc,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="20" align=center>&nbsp;</td>
	<td ><?php echo $vdr4 ?></td>
	<td align=right><?php echo number_format($unitV4,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totdf,2) ?></td>
	<td align=right><?php echo number_format($ttaxdf,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotdf,2) ?></td>
</tr>

<tr>
  <td align=center>&nbsp;</td>
	<td height="15" align=center>&nbsp;</td>
	<td><?php echo $fom1 ?></td>
	<td align=right><?php echo number_format($unitFOM,2) ?></td>
	<td align=right><?php echo $nofcl ?></td>
	<td align=right><?php echo number_format($totfom,2) ?></td>
	<td align=right><?php echo number_format($ttaxfom,2) ?></td>
	<td align=right><?php echo number_format ($sduty1,2) ?></td>
	<td align=right><?php echo number_format($gtotfom,2) ?></td>
</tr>

<tr bgcolor=#F3F3F3>
  <td align=center>&nbsp;</td>
	<td height="15" align=left><strong>Sub Total</strong></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td align=center>&nbsp;</td>
	<td>&nbsp;</td>
	<td align=right><strong><?php echo number_format($gtotadmin + $gtotgc + $gtottc + $gtotdf + $gtotfom ,2) ?></strong></td>
</tr>

<tr>
  <td align=center valign=top>&nbsp;</td>	
	<td height="15" align=center valign=top>&nbsp;</td>
	<td valign=top align="center" >&nbsp;</td>
	<td valign=top align="center" >&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td align="center"  valign=top>&nbsp;</td>
	<td align="center"  valign=top>&nbsp;</td>
</tr>
<tr bgcolor=#F3F3F3>
  <td align=right>&nbsp;</td>
  <td height="30" align=left><strong>GRAND TOTAL</strong></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td align=right><strong><?php echo number_format($gtotadmin + $gtotgc + $gtottc + $gtotdf + $gtotfom + $gtotig + $gtotfwhs + $gtotlevy + $gtotplks + $gtotfees + $gtotvisa + $gtotsp + $gtotcp + $gtotcom,2) ?></strong></td>
</tr>
</table>
<table width="90%" height="70" align="center" bordercolor="#FFFFFF" style="border-collapse: collapse;">
	<tr>
		<td height="25" colspan="3">&nbsp;</td>
		<!--td width="23%" rowspan="4"><div align="right">.........................................................................<br />Authorised Signature</div></td-->
		<td width="23%">&nbsp;</td>
	</tr>
	
	<tr>
	<td height="25" colspan="3"><table width="400" style="border-collapse: collapse;" border="1" bordercolor="#cccccc">
	  <tr>
	    <td colspan="8" height="15">Note :</td>
	    </tr>
	  <tr>
	    <td colspan="8" height="15">All admin fees subject to 6% Service Tax</td>
	    </tr>
	  <tr>
	    <td colspan="8" height="15">Formula Insurance Guarantee for Foreign Workers RM50.00 OR as per formula below (whichever is higher)</td>
	    </tr>
	  <tr>
	    <td width="70" height="15" align="center"></td>
	    <td width="70" align="center">No of Worker(s)</td>
	    <td width="40" align="center">Rate</td>
	    <td width="40" align="center">Month</td>
	    <td width="40" align="center">Year</td>
	    <td width="40" align="center">Interest</td>
	    <td width="40" align="center">Total(RM)</td>
	    <td></td>
	    </tr>
	  <tr>
	    <td height="15"></td>
	    <td align="center"><?php echo $nofcl ?></td>
	    <td align="center"><?php echo $payment->fine_ref; ?></td>
	    <td align="center">18</td>
	    <td align="center">12</td>
	    <td align="center">1.00%</td>
	    <td align="center"><?php $val = $nofcl * $payment->fine_ref * 18 / 12 * 0.01; echo number_format($val,2); ?></td>
	    <td align="center"></td>
	    </tr>
	  </table></td>
	<td colspan=4>&nbsp;</td>
	</tr>	
	<tr>
		<td height="50" colspan="4"></td>
	</tr>
	<tr>
		<td height="11" colspan="4" align=center><span class="style7">Johor : Johor Regional Office. c/o CIDB Johor, Lot 2067, Batu 3, Jalan Tampoi, 81200 Johor Bahru, Johor Darul Takzim. Tel : 07-235 9599 Fax : 07-237 9566</span></td>
	</tr>
	<tr>
		<td height="14" colspan="4" align=center><span class="style7">Penang Regional Office, No 12, Ground Floor, Jalan Todak 5, Pusat Bandar Seberang Jaya, 13700 Pulau Pinang. Tel : 04-397 9599 Fax : 04-397 9566</span></td>
	</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
