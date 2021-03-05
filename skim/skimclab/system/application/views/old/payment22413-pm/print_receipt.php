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
$amt = $payment->others_amount + $payment->agency_amount + $payment->ins_amount + $payment->fomema_amount + $payment->jim_amount + $payment->clab_amount;

?>
<table align="center" width="60%">
	<tr>
		<td>
			<table align="center" width="100%" border="1" style="border-collapse: collapse;" bordercolor="#FFFFFF">
				<tr>
					<td width="85%" align="left" style="height: 82px" >
						<table width="100%">
							<tr>
								<td align="left">
								<b>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</b><br />
									Level 2, Annexe, Menara Milenium<br />
									No. 8, Jalan Damanlela<br />
									Pusat Bandar Damansara<br />
									50490 Kuala Lumpur
			 						
								</td>
							</tr>
							<tr><td align="center" height="30px"><b>OFFICIAL RECEIPT</b></td></tr>
						</table>
					</td>
					<td witdh="15%" style="height: 70px"><div align="center"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></div></td>
				</tr>
				<tr>
					<td height="20px">&nbsp;</td>
					<td align="center">OR No. :&nbsp;<?php echo $payment->pmt_receipt_no; ?></td>
				</tr>
			</table>
			<table width="100%" align="center">
				<tr>
				    <td width="15%" height="20px">&nbsp;<b>Date Created</b></td>
					<td width="85%" >:&nbsp;<?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
				 </tr>
				 <tr>
				 	<td height="20px">&nbsp;<b>Received From</b></td>
				 	<td>:&nbsp;<?php echo $payment->pmt_receive_from; ?></td>
				 </tr>
				 <tr>
				 	<td height="20px">&nbsp;<b>Address</b></td>
				 	<td>:&nbsp;<?php echo $payment->pmt_addr; ?></td>
				 </tr>
				 <tr>
				   <td height="20px">&nbsp;<b>Payment Type</b></td>
				   <td>:&nbsp;<?php echo $payment->pmt_type_desc; ?></td>
		      </tr>
				 <tr>
				   <td height="20px">&nbsp;<b>P.A No</b></td>
				   <td>:&nbsp;<?php echo $payment->clab_pa_no; ?></td>
		      </tr>
			</table>
			<br/>
			<table align="center" width="100%" border="1" style="border-collapse: collapse;" bordercolor="#cccccc">
				<tr>
				  <td width="15%" height="30px"><div align="center">CHEQUE NO.</div></td>
				  <td width="15%"><div align="center">PAYMENT TO</div></td>
				  <td><div align="center">DESCRIPTION OF PAYMENT</div></td>
				  <td width="15%"><div align="center">AMOUNT (RM)</div></td>
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->pmt_chq_clab; ?></div></td>
				  <td><div align="center">CLAB</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_clab_fees == '1'){ echo "checked" ;} ?> disabled/>		    
				  Admin Fee VDR &nbsp;
				  <input type="checkbox" <?php if($payment->chk_clab_fees_ext == '1'){ echo "checked" ;} ?> disabled/>
				  Admin Fee EXT
				  <input type="checkbox" <?php if($payment->chk_clab_adm == '1'){ echo "checked" ;} ?> disabled/>
				  Agency Fee<br />
				  &nbsp;Registration : <br />
				  <input type="checkbox" <?php if($payment->clab_reg_amount == '20'){ echo "checked" ;} ?> disabled/>&nbsp;1 YEAR
				  <input type="checkbox" <?php if($payment->clab_reg_amount == '40'){ echo "checked" ;} ?> disabled/>&nbsp;2 YEARS
				  <input type="checkbox" <?php if($payment->clab_reg_amount == '50'){ echo "checked" ;} ?> disabled/>&nbsp;3 YEARS				  
				  <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->clab_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->pmt_chq_jim; ?></div></td>
				  <td><div align="center">JIM</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_jim_plks == '1'){ echo "checked" ;} ?> disabled/>PLKS&nbsp;
				  <input type="checkbox" <?php if($payment->chk_jim_fees == '1'){ echo "checked" ;} ?> disabled/>Fees&nbsp;
				  <input type="checkbox" <?php if($payment->chk_jim_visa == '1'){ echo "checked" ;} ?> disabled/>Visa&nbsp;
				  <input type="checkbox" <?php if($payment->chk_jim_levi == '1'){ echo "checked" ;} ?> disabled/>Levy&nbsp;
				  <input type="checkbox" <?php if($payment->chk_jim_sp == '1'){ echo "checked" ;} ?> disabled/>SP
				  <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->jim_amount; ?></div></td> 
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->pmt_chq_fomema; ?></div></td>
				  <td><div align="center">FOMEMA</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_fomema_male == '1'){ echo "checked" ;} ?> disabled/>Male&nbsp;
				  <input type="checkbox" <?php if($payment->chk_fomema_female == '1'){ echo "checked" ;} ?> disabled/>Female
				  <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->fomema_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->ins_chq_no; ?></div></td>
				  <td><div align="center">INSURANCE</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_ins_ig == '1'){ echo "checked" ;} ?> disabled/>IG&nbsp;
				  <input type="checkbox" <?php if($payment->chk_ins_fwcs == '1'){ echo "checked" ;} ?> disabled/>FWCS&nbsp;
				   <input type="checkbox" <?php if($payment->chk_ins_fwhs == '1'){ echo "checked" ;} ?> disabled/>FWHS
				   <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->ins_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->agency_chq_no; ?></div></td>
				  <td><div align="center">TRANSIT CENTER</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_agency_fees == '1'){ echo "checked" ;} ?> disabled/>Fees&nbsp;
				  <input type="checkbox" <?php if($payment->chk_transit_cost == '1'){ echo "checked" ;} ?> disabled/>Cost
			      <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->agency_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="30px"><div align="center"><?php echo $payment->others_chq_no; ?></div></td>
				  <td><div align="center">OTHERS</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_others_fees == '1'){ echo "checked" ;} ?> disabled/>Fees<br />
				  Remarks:&nbsp;<?php echo $payment->remarks_others; ?>
			      <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->others_amount; ?></div></td>
				</tr>
				<tr>
				<td height="20px"colspan="3">&nbsp;Total (RM) :</td>
				<td align="center"><?php echo number_format($amt,2)?></td>
				</tr>
				<tr><td height="20px"colspan="4">&nbsp;Amount in words : <?php echo strtoupper(convert_number_to_words($amt)." Ringgit Malaysia Only") ?></td></tr>
			</table>
			<!--table width="100%" border="0" style="border-collapse: collapse;">
				<tr><td height="20px">Amount in words (RM) :</td></tr>
			</table-->	
		</td>
	</tr>
</table>
<table width="60%" align="center" border="0" style="border-collapse: collapse;">
	<tr>
		<td width="70%" height="20px" >&nbsp;Recruitment will only be processed upon full payment and documentation. </td>
		<td width="30%"></td>
	</tr>
	<tr>
		<td height="30px">&nbsp;</td>
		<td align="center" valign="bottom">..............................................................</td>
	</tr>
	<tr>
		<td height="20px">&nbsp;</td>
		<td align="center" valign="top">Authorized Signature</td>		
	</tr>
</table>

</body>
</html>
