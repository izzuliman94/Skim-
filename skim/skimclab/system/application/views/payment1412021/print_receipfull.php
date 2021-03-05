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
$amt = 0;
$amt = $payment->clab_amount + $payment->amt_clabren + $payment->amt_contreg + $payment->amt_contren + $payment->amt_rehire + 
$payment->local_amount + $payment->amt_greencard + $payment->amt_clabfee + $payment->jim_amount + $payment->fomema_amount + 
$payment->ins_amount + $payment->agency_amount + $payment->others_amount;
$discount= $payment->amt_disc;
$rmkdisc=$payment->rmk_disc;
?>
<table align="center" width="104%">
<tr>
	<td>
	<table width="90%" align="center">			
		<tr>
		  <td height="15" colspan="5"><span class="style1">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</span> <span class="style7">(634396-W)</span><br />
			Level 2, Annexe Block, Menara Milenium 8, Jalan Damalela, <br />
			Bukit Damansara 50490 Kuala Lumpur<br />
			Tel : 03-2095 9599     Fax : 03-2095 9566&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>GST ID No</strong> : <strong>001341655040</strong><br /></td>
		  <td width="10%" height="15"><span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></span></td>
		</tr>
						

		<tr>
			<td height="10"><strong>Date Created </strong></td>
			<td>:</td>
			<td colspan="4" ><?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
		</tr>
		<tr>
			<td width="12%" height="10"><strong>Received From </strong></td>
			<td width="3%" height="10">:</td>
			<td colspan="4" ><?php echo $payment->pmt_receive_from; ?></td>
		</tr>
		<tr>
			<td height="10"><strong>Address </strong></td>
			<td height="10">:</td>
			<td><?php echo $payment->pmt_addr; ?></td>
			<td width="17%"><div align="right"><strong>Receipt No</strong></div></td>
			<td><strong> :</strong></td>
			<td><div align="left"><?php echo $payment->pmt_receipt_no; ?></div></td>
		</tr>
		<tr>
			<td height="10"><strong>Payment Type </strong></td>
			<td height="10">:</td>
			<td><?php echo $payment->pmt_type_desc; ?></td>
			<td colspan="2">&nbsp;</td>
			<td><div align="center"></div></td>
		</tr>
		<tr>
			<td height="10"><strong>PA. No </strong></td>
			<td height="10">:</td>
			<td><?php echo $payment->clab_pa_no; ?></td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td height="15" colspan="2">&nbsp;</td>
			<td width="58%">&nbsp;</td>
			<td colspan="3"><div align="right"><span class="style8">OFFICIAL RECEIPT</span></div></td>
		</tr>
	</table>
<br/>
<table width="90%"  cellpadding="3" border="1" align="center" bordercolor="#cccccc" style="border-collapse: collapse;">
				
<tr>
  <td width="150px" height="20"><div align="center" class="style2">CHEQUE NO./BANK DRAFT</div></td>
  <td width="150px" ><div align="center" class="style2">PAYMENT TO</div></td>
  <td ><div align="center" class="style2">DESCRIPTION OF PAYMENT</div></td>
  <td width="100px" ><div align="center" class="style2">DISCOUNT (RM)</div></td>
  <td width="100px" ><div align="center" class="style2">AMOUNT (RM)</div></td>
</tr>
<?php if($payment->payment_type=='V'){ ?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->pmt_chq_clab,25,"<br>\n",true); ?></td>
	<td ><div align="center">CLAB</div></td>
	<td >
		<?php 
		$vdr1='';$vdr2='';$vdr3='';
		
		if($payment->chk_clab_fees == '1') $vdr1="ADMIN/AGENCY FEE, ";		
		if($payment->chk_clab_grncad == '1') $vdr2="GREEN CARD, " ;	
		if($payment->chk_clab_tsitcent == '1') $vdr3="TRANSIT CENTRE, " ;

		$vdr = $vdr1.$vdr2.$vdr3;
		echo rtrim($vdr,", ");
		?>	
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->clab_amount; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='R'){ 
?> 
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->pmt_chq_clab_ren,25,"<br>\n",true); ?></td>
	<td ><div align="center">RENEWAL PERMIT</div></td>
	<td >
		<?php 
		$ren1='';$ren2='';
		if($payment->chk_clab_fees_ext == '1') $ren1="ADMIN FEE EXT, "; 
		if($payment->chk_clab_fees_extgc == '1') $ren2="GREEN CARD, " ;
		
		$ren = $ren1.$ren2;
		echo rtrim($ren,", ");
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td><div align="center"><?php echo $payment->amt_clabren; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='CR'){ 
?> 
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->chqno_contreg,25,"<br>\n",true); ?></td>
	<td ><div align="center">CONTRACTOR REGISTRATION</div></td>
	<td >
		<?php 
		if($payment->chk_contreg1 == '1') echo "REGISTRATION YEAR 1"; 
		if($payment->chk_contreg2 == '1') echo "REGISTRATION YEAR 2" ;
		if($payment->chk_contreg3 == '1') echo "REGISTRATION YEAR 3" ;
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->amt_contreg; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='CRN'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->chqno_contren,25,"<br>\n",true); ?></td>
	<td ><div align="center">CONTRACTOR RENEWAL</div></td>
	<td >
		<?php 
		if($payment->chk_contren1 == '1') echo "RENEWAL YEAR 1"; 
		if($payment->chk_contren2 == '1') echo "RENEWAL YEAR 2" ;		
		if($payment->chk_contren3 == '1') echo "RENEWAL YEAR 3" ;
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->amt_contren; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='REH'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->chqno_rehire,25,"<br>\n",true); ?></td>
	<td ><div align="center">REHIRING</div></td>
	<td >
		<?php 
		if($payment->chk_rehire1 == '1') echo "1st PAYMENT"; 
		if($payment->chk_rehire2 == '1') echo "2nd PAYMENT" ;		
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->amt_rehire; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='LW'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->pmt_chq_local,25,"<br>\n",true); ?></td>
	<td ><div align="center">CLAB(Local Worker)</div></td>
	<td >
		<?php 
		if($payment->chk_local_dis == '1') echo "DISBURSEMENT"; 
		if($payment->chk_local_reim == '1') echo "REIMBURSEMENT";		
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td><div align="center"><?php echo $payment->local_amount; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='GRC' || $payment->payment_type=='REH'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->pmt_chk_green,25,"<br>\n",true); ?></td>
	<td ><div align="center">GREEN CARD</div></td>
	<td >
		<?php 
		if($payment->chk_green_new == '1') echo "NEW"; 
		if($payment->chk_green_ren == '1') echo "RENEW";		
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td><div align="center"><?php echo $payment->amt_greencard; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='FEE'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->chqno_clabfee,25,"<br>\n",true); ?></td>
	<td ><div align="center">CLAB FEE</div></td>
	<td >
		<?php 
		if($payment->chk_member == '1') echo "MEMBERSHIP"; 
		if($payment->chk_intro == '1') echo "INTRODUCER";		
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->amt_clabfee; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='T'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->agency_chq_no,25,"<br>\n",true); ?></td>
	<td ><div align="center">TRANSIT CENTRE</div></td>
	<td >
		<?php 
		$fees1='';$fees2='';
		if($payment->chk_agency_fees == '1') $fees1="FEES, "; 
		if($payment->chk_agency_feesgc == '1') $fees2="GREEN CARD" ;

		$fees = $fees1.$fees2;
		echo rtrim($fees,", ");
		?>
	</td>
	<td align=center><?php if($discount<>0) echo $discount."<br>".$rmkdisc; ?></td>
	<td ><div align="center"><?php echo $payment->agency_amount; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='V' || $payment->payment_type=='R' || 
$payment->payment_type=='REH' || $payment->payment_type=='CP' || 
$payment->payment_type=='COM' || $payment->payment_type=='SP'){ 
?>
<tr>
	<td height="20" align=center><?php echo wordwrap($payment->pmt_chq_jim,25,"<br>\n",true); ?></td>
	<td ><div align="center">JIM</div></td>
	<td>
		<?php 
		$jim='';$jim1='';$jim2='';$jim3='';$jim4='';$jim5='';$jim6='';$jim7='';
		
		if($payment->chk_jim_plks == '1') $jim1="PLKS, "; 
		if($payment->chk_jim_fees == '1') $jim2="FEES, ";
		if($payment->chk_jim_visa == '1') $jim3="VISA, "; 
		if($payment->chk_jim_levi == '1') $jim4="LEVY, ";	
		if($payment->chk_jim_sp == '1') $jim5="SPECIAL PASS, "; 
		if($payment->chk_jim_cp == '1') $jim6="CANCEL PERMIT, ";
		if($payment->chk_jim_compound == '1') $jim7="COMPOUND,"; 
		
		$jim = $jim1.$jim2.$jim3.$jim4.$jim5.$jim6.$jim7;
		echo rtrim($jim,", ");
		?>
	</td>
	<td align=center></td>
	<td><div align="center"><?php echo $payment->jim_amount; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='V' || $payment->payment_type=='R' || $payment->payment_type=='REH' || $payment->payment_type=='T'){ 
?>
<tr>
	<td height="15" align=center><?php echo wordwrap($payment->pmt_chq_fomema,25,"<br>\n",true); ?> <div align="left"></div></td>
	<td><div align="center">FOMEMA</div></td>
	<td>
		<?php 
		$fom1='';$fom2='';
		if($payment->chk_fomema_male == '1') $fom1="MALE, "; 
		if($payment->chk_fomema_female == '1') $fom2="FEMALE, " ;

		$fom = $fom1.$fom2;
		echo rtrim($fom,", ");
		?>
	</td>
	<td align=center></td>
	<td><div align="center"><?php echo $payment->fomema_amount; ?></div></td>
</tr>
<?php
}
if($payment->payment_type=='V' || $payment->payment_type=='R' || $payment->payment_type=='REH'){ 
?>
<tr>
	<td height="15" align=center><?php echo wordwrap($payment->ins_chq_no,25,"<br>\n",true); ?><div align="left"></div></td>
	<td><div align="center">INSURANCE</div></td>
	<td>
		<?php 
		$ins1='';$ins2='';$ins3='';
		if($payment->chk_ins_ig == '1') $ins1="IG, "; 
		if($payment->chk_ins_fwcs == '1') $ins2="FWCS, " ;	
		if($payment->chk_ins_fwhs == '1') $ins3="FWHS, " ;
		
		$ins = $ins1.$ins2.$ins3;
		echo rtrim($ins,", ");
		?>
	</td>
	<td align=center></td>
	<td><div align="center"><?php echo $payment->ins_amount; ?></div></td>
</tr>
<?php
}
if($payment->chk_others_fees == '1' || $payment->chk_others_fees2 == '1' || $payment->remarks_others <> ''){ 
?>
<tr>	
	<td height="15" align=center><?php echo wordwrap($payment->others_chq_no,25,"<br>\n",true); ?></td>
	<td><div align="center">OTHERS</div></td>
	<td>
		<?php
		$oth1='';$oth2='';
		if($payment->chk_others_fees == '1') $oth1="FEES, "; 
		if($payment->chk_others_fees2 == '1') $oth2="3rd PARTY CHARGES, " ;	
		$oth = $oth1.$oth2;
		echo rtrim($oth,", ");
		if($payment->remarks_others <> ''){
			echo "<br><br><u>Remarks:</u><br>"; ?>
			<textarea cols="30" rows="3" name="txtothremarks" style='width:90%;height:30px;font-family:"Century Gothic";font-size: 9px;color: #333333;border:0'><?php echo $payment->remarks_others?></textarea>
		<?php
		}
		?>
	</td>
	<td align=center></td>
	<td><div align="center"><?php echo $payment->others_amount; ?></div></td>
</tr>
<?php } ?>
<tr>
	<td height="20"></td>
	<td>&nbsp;</td>
	<td>&nbsp;<br />
	<td align="center"></td>
	<td align="center"></td>
</tr>


<tr>
	<td><strong>Total (RM)</strong></td>
	<td height="20" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td align="center"><div align="center"><?php echo number_format($amt,2)?></div></td>
</tr>
<tr>
	<td><strong>Amount in words :</strong></td>
	<td height="20" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper(convert_number_to_words($amt)." Ringgit Malaysia Only") ?></td>
</tr>
</table>
<table width="90%" height="70" align="center" bordercolor="#FFFFFF" style="border-collapse: collapse;">
	<tr>
		<td height="20"colspan="3">Recruitment will only be processed upon full payment and documentation.</td>
		<td width="23%" rowspan="4"><div align="right">.........................................................................<br />
		Authorised Signature</div></td>
	</tr>
	<tr>
		<td height="13"colspan="3"></td>
	</tr>
	<tr>
		<td height="11"colspan="3"><span class="style7">Johor : Johor Regional Office. c/o CIDB Johor, Lot 2067, Batu 3, Jalan Tampoi, 81200 Johor Bahru, Johor Darul Takzim. Tel : 07-235 9599 Fax : 07-237 9566</span></td>
	</tr>
	<tr>
		<td height="14"colspan="3"><span class="style7">Penang Regional Office, No 12, Ground Floor, Jalan Todak 5, Pusat Bandar Seberang Jaya, 13700 Pulau Pinang. Tel : 04-397 9599 Fax : 04-397 9566</span></td>
	</tr>
</table>
<p>&nbsp;</p></td>
</tr>
</table>
</body>
</html>
