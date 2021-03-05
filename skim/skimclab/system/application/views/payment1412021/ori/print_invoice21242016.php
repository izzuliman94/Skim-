<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family:"Century Gothic";
	font-size: 9px;
	color: #333333;
}
.style2 {
	font-size: 12px;
	font-weight: bold;
}
</style>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>


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

$nofcl= 0;
$nofcl= $payment->no_of_fcl;

$amtperunitAgency = "0.00";
$amtperunitAgency = "50";
$totAgency = "0.00";
$totAgency = $amtperunitAgency * $nofcl;

$amtperunitVdr = "0.00";
$amtperunitVdr = "300.00";
$totVdr = "0.00";
$totVdr = $amtperunitVdr * $nofcl;

$amtperunitExt = "0.00";
$amtperunitExt = "300.00";
$totExt = "0.00";
$totExt = $amtperunitExt * $nofcl;

$amtperunitCont= '0.00';
$amtperunitCont= $payment->clab_reg_amount;


if($payment->payment_type == 'V' and $payment->chk_clab_adm == '1' and $payment->chk_clab_fees == '1'){ 
$amtbefgst ="0.00";
$amtbefgst = $totVdr + $totAgency;
}else if ($payment->payment_type=='R'){
$amtbefgst ="0.00";
$amtbefgst = $totExt;
}else if ($payment->payment_type=='CR' or $payment->payment_type=='CRN'){
$amtbefgst ="0.00";
$amtbefgst = $amtperunitCont;
}else if ($payment->chk_clab_adm == '1' and $payment->payment_type == 'V'){
$amtbefgst ="0.00";
$amtbefgst = $totAgency;
}


$amtgst = 0;
$amtgst = $amtbefgst * 0.06;

$amtaftgst = 0;
$amtaftgst = $amtbefgst + $amtgst; 
?>
<table align="center" width="96%">
<tr>
		<td>
			<table align="center" width="100%" border="1" style="border-collapse: collapse;" bordercolor="#FFFFFF">
				<tr>
					<td width="85%" align="left" style="height: 82px" >
						<table width="100%">
							<tr>
								<td align="left">
								  <p><b>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</b><br />
									Level 2, Annexe, Menara Milenium<br />
									No. 8, Jalan Damanlela<br />
									Pusat Bandar Damansara<br />
									50490 Kuala Lumpur<br />
                                    GST ID No : 
						          <strong>001341655040</strong></p></td>
						  </tr>
							<tr><td align="center" height="20px"><span class="style2">TAX INVOICE</span></td>
						  </tr>
						</table>
					</td>
					<td witdh="15%" style="height: 70px"><div align="center"><img src="<?php echo base_url();?>images/logoLetter.jpg" width="50" height="50" /></div></td>
				</tr>
				<tr>
					<td height="2px">&nbsp;</td>
					<td align="center">Invoice No. :&nbsp;INV<?php echo  substr($payment->pmt_receipt_no,2,5); ?></td>
			  </tr>
			</table>
			<table width="100%" align="center">
				<tr>
				    <td width="15%" height="20px">&nbsp;<b>Date </b></td>
				  <td width="42%" >:&nbsp;<?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
				  <td width="43%" >&nbsp;<?php echo $payment->pmt_type_desc; ?></td>
				</tr>
				 <tr>
				 	<td height="20px">&nbsp;<b>To</b></td>
				 	<td colspan="2">:&nbsp;<?php echo $payment->pmt_receive_from; ?></td>
				 </tr>
				 <tr>
				 	<td height="20px">&nbsp;</td>
			 	   <td colspan="2">:&nbsp;<?php echo $payment->pmt_addr; ?></td>
				 </tr>
			</table>
      <br/>
			<table align="center" width="100%" border="2" style="border-collapse: collapse;" bordercolor="#cccccc">
				<tr>
				  <td width="15%" height="20px"><div align="center">No</div></td>
				  <td width="48%"><div align="center">DESCRIPTION</div></td>
				  <td width="7%"><div align="center">UNIT</div></td>
				  <td width="15%"><div align="center">UNIT PRICE</div></td>
				  <td width="15%"><div align="center">AMOUNT (RM)</div></td>
				</tr>
				<tr>
				  <td height="20px"><div align="center">1.</div></td>
				  <td><div align="center">
				     <input type="checkbox" <?php if($payment->chk_clab_fees == '1'){ echo "checked" ;} ?> disabled/>
Admin.Fee VDR <?php echo $payment->country ?></div></td>
				  <td><div align="center"><?php echo $nofcl ?></div></td>
				  <td><div align="center"><?php echo $amtperunitVdr ?></div></td>
				  <td><div align="center"><?php if($payment->chk_clab_fees == '1') echo number_format($totVdr,2);?></div></td>
				</tr>
				<tr>
				  <td height="20px"><div align="center">2.</div></td>
				  <td><div align="center"><input type="checkbox" <?php if($payment->chk_clab_adm == '1'){ echo "checked" ;} ?> disabled/>
 Agency.Fee
</div></td>
				  <td><div align="center"><?php echo $nofcl ?></div></td>
				  <td><div align="center"><?php echo $amtperunitAgency ?></div></td>
				  <td><div align="center"><?php if($payment->chk_clab_adm == '1' ) echo number_format($totAgency,2) ;?>
				  </div></td> 
				</tr>
				<tr>
				  <td height="20px"><div align="center">3.</div></td>
				  <td><div align="center">
				    <input type="checkbox" <?php if($payment->chk_clab_fees_ext == '1'){ echo "checked" ;} ?> disabled/>
Admin.
			      Fee - Extension</div></td>
				  <td><div align="center"><?php echo $nofcl ?></div></td>
				  <td><div align="center"><?php echo $amtperunitExt ?></div></td>
				  <td><div align="center"><?php if($payment->chk_clab_fees_ext == '1') echo number_format($totExt,2);?></div></td>
				</tr>
				<tr>
				  <td height="20px"><div align="center">4.</div></td>
				  <td><div align="center">Registration :
                      <input type="checkbox" <?php if($payment->clab_reg_amount == '20'){ echo "checked" ;} ?> disabled="disabled"/>
&nbsp;1 YRS
<input type="checkbox" <?php if($payment->clab_reg_amount == '40'){ echo "checked" ;} ?> disabled="disabled"/>
&nbsp;2 YRS
<input type="checkbox" <?php if($payment->clab_reg_amount == '50'){ echo "checked" ;} ?> disabled="disabled"/>
&nbsp;3 YRS </div></td>
				  <td><div align="center"></div></td>
				  <td><div align="center"><?php echo $amtperunitCont ?></div></td>
				  <td><div align="center"><?php echo number_format($amtperunitCont,2) ?></div></td>
				</tr>
				<tr>
				  <td height="20px"><div align="center">5.</div></td>
				  <td height="20px"><div align="center">
				    <input type="checkbox" <?php if($payment->clab_reg_amount == '20'){ echo "checked" ;} ?> disabled="disabled"/>
				    Registration :
			      Director's Fee</div></td>
				  <td height="20px"><div align="center"></div></td>
				  <td align="center"><div align="center"><?php echo $amtperunitCont ?></div></td>
				  <td align="center">&nbsp;</td>
			  </tr>
				<tr>
				<td height="20px"colspan="3">Total Before GST (RM) :</td>
				<td align="center">&nbsp;</td>
				<td align="center"><?php echo number_format($amtbefgst,2)?></td>
				</tr>
				<tr>
				  <td height="20px"colspan="3">Add GST @ 6%</td>
				  <td height="20px">&nbsp;</td>
				  <td align ="center" height="20px"><?php echo number_format($amtgst,2)?></td>
			  </tr>
				<tr>
				  <td height="20px"colspan="3">Total</td>
				  <td height="20px">&nbsp;</td>
				  <td align ="center" height="20px"><?php echo number_format($amtaftgst,2) ?></td>
				</tr>
			</table>
		  <!--table width="100%" border="0" style="border-collapse: collapse;">
				<tr><td height="20px">Amount in words (RM) :</td></tr>
			</table-->	
		</td>
	</tr>
</table>
<table width="76%" align="center" border="0" style="border-collapse: collapse;">
	<tr>
		<td width="70%" height="20px"><p>&nbsp;</p>
	    </td>
		<td width="30%" align="center" valign="bottom">..............................................................</td>
	</tr>
	<tr>
		<td height="20px">&nbsp;</td>
		<td align="center" valign="top">Authorized Signature</td>		
	</tr>
</table>

</body>
</html>
