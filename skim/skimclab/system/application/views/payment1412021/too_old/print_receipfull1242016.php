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
$amt = $payment->others_amount + $payment->agency_amount + $payment->ins_amount + $payment->fomema_amount + $payment->jim_amount + $payment->clab_amount;

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
			<table width="90%" height="283" border="1" align="center" bordercolor="#cccccc" style="border-collapse: collapse;">
				
<tr>
  <td height="20"><div align="center" class="style2">CHEQUE NO./BANK DRAFT</div></td>
  <td><div align="center" class="style2">PAYMENT TO</div></td>
  <td><div align="center" class="style2">DESCRIPTION OF PAYMENT</div></td>
  <td><div align="center" class="style2">AMOUNT (RM)</div></td>
</tr>
<tr>
				  <td width="15%" height="20"><?php echo wordwrap($payment->pmt_chq_clab,25,"<br>\n",true); ?></td>
				  <td width="14%">				    <div align="center">CLAB</div></td>
 <td width="61%">
<input type="checkbox" <?php if($payment->chk_clab_fees == '1'){ echo "checked" ;} ?> disabled/>
				     Ad.Fee VDR &nbsp;
                     <input type="checkbox" <?php if($payment->chk_clab_fees_ext == '1'){ echo "checked" ;} ?> disabled/>
                     Ad.
				    Fee EXT
				     <input type="checkbox" <?php if($payment->chk_clab_adm == '1'){ echo "checked" ;} ?> disabled/>
				    Ag.Fee  &nbsp; |Reg : 
				    <input type="checkbox" <?php if($payment->clab_reg_amount == '21.2'){ echo "checked" ;} ?> disabled/>				    
				    &nbsp;1 YRS
                    <input type="checkbox" <?php if($payment->clab_reg_amount == '42.4'){ echo "checked" ;} ?> disabled/>				    
                    &nbsp;2 YRS
                    <input type="checkbox" <?php if($payment->clab_reg_amount == '53'){ echo "checked" ;} ?> disabled/>			      
                    &nbsp;3 YRS
                    <div align="center"></div></td>
		  <td width="10%"><div align="center"><?php echo $payment->clab_amount; ?></div></td>
			  </tr>
				<tr>
				  <td height="15"><div align="left"><?php echo wordwrap($payment->pmt_chq_jim,25,"<br>\n",true); ?></div></td>
				  <td>				    <div align="center">JIM</div></td>
				  <td>
			        <input type="checkbox" <?php if($payment->chk_jim_plks == '1'){ echo "checked" ;} ?> disabled/>
			        PLKS&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_fees == '1'){ echo "checked" ;} ?> disabled/>
                    Fees&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_visa == '1'){ echo "checked" ;} ?> disabled/>
                    Visa&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_levi == '1'){ echo "checked" ;} ?> disabled/>
                    Levy&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_sp == '1'){ echo "checked" ;} ?> disabled/>
                    SP&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_cp == '1'){ echo "checked" ;} ?> disabled/>
                    CP&nbsp;
                    <input type="checkbox" <?php if($payment->chk_jim_compound == '1'){ echo "checked" ;} ?> disabled/>
                    Compound
				  <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->jim_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="15"><?php echo wordwrap($payment->pmt_chq_fomema,25,"<br>\n",true); ?>
		            <div align="left"></div></td>
				  <td>				    <div align="center">FOMEMA</div></td>
				  <td>
			        <input type="checkbox" <?php if($payment->chk_fomema_male == '1'){ echo "checked" ;} ?> disabled/>
			        Male&nbsp;
                    <input type="checkbox" <?php if($payment->chk_fomema_female == '1'){ echo "checked" ;} ?> disabled/>
			        Female
				  <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->fomema_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="15"><?php echo wordwrap($payment->ins_chq_no,25,"<br>\n",true); ?>
			        <div align="left"></div></td>
				  <td>				    <div align="center">INSURANCE</div></td>
				  <td>
			        <input type="checkbox" <?php if($payment->chk_ins_ig == '1'){ echo "checked" ;} ?> disabled/>
			        IG&nbsp;
                    <input type="checkbox" <?php if($payment->chk_ins_fwcs == '1'){ echo "checked" ;} ?> disabled/>
                    FWCS&nbsp;
                    <input type="checkbox" <?php if($payment->chk_ins_fwhs == '1'){ echo "checked" ;} ?> disabled/>
			        FWHS
			      <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->ins_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="15"><?php echo wordwrap($payment->agency_chq_no,25,"<br>\n",true); ?></td>
				  <td>				    <div align="center">TRANSIT CTR</div></td>
				  <td>
			        <input type="checkbox" <?php if($payment->chk_agency_fees == '1'){ echo "checked" ;} ?> disabled/>
			        Fees&nbsp;
                    <input type="checkbox" <?php if($payment->chk_transit_cost == '1'){ echo "checked" ;} ?> disabled/>
			        Cost
			      <div align="center"></div></td>
				  <td><div align="center"><?php echo $payment->agency_amount; ?></div></td>
				</tr>
				<tr>
				  <td height="15"><?php echo wordwrap($payment->others_chq_no,25,"<br>\n",true); ?></td>
				  <td><div align="center">OTHERS</div></td>
				  <td><input type="checkbox" <?php if($payment->chk_others_fees == '1'){ echo "checked" ;} ?> disabled/>
			      Fees&nbsp; 
			        <?php echo $payment->remarks_others; ?>
			        <input type="checkbox" <?php if($payment->chk_clab_mship == '1'){ echo "checked" ;} ?> disabled="disabled"/>
			        Membership 
Fees</td>
				  <td><div align="center"><?php echo $payment->others_amount; ?></div></td>
			  </tr>
				<tr>
				  <td height="20"></div>
		          <div align="left"></div></td>
				  <td>&nbsp;</td>
				  <td>&nbsp;<br />
			        <div align="center"></div></td>
				  <td><div align="center"></div></td>
				</tr>
				
				
				<tr>
				  <td><strong>Total (RM</strong></td>
				  <td height="20" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			      <td align="center"><div align="center"><?php echo number_format($amt,2)?></div></td>
			  </tr>
				<tr>
				  <td><strong>Amount in words :</strong></td>
				<td height="20" colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper(convert_number_to_words($amt)." Ringgit Malaysia Only") ?></td>
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
        <p>&nbsp;		              </p></td>
  </tr>
</table>
</body>
</html>
