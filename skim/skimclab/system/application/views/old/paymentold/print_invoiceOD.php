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
.style1 {	font-size: 14px;
	font-weight: bold;
}
.style7 {font-size: 7px}
.style4 {font-size: 10}
.style6 {font-size: 16px; font-weight: bold; }
.style9 {font-size: 7px; color: #666666; }
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

$nofclvdr= 0;
$nofclag= 0;
$nofclext= 0;
$nofclfom=0;

$nofclvdr= $invoice->no_of_fcl;
$nofclag= $invoice->no_of_fcl;
$nofclext= $invoice->no_of_fcl;
$nofclfom= $invoice->no_of_fcl;

$amtperunitAgency = "0.00";
$amtperunitAgency = "50.00";
$totAgency = "0.00";
$totAgency = $amtperunitAgency * $nofclag;

$amtperunitVdr = "0.00";
$amtperunitVdr = "300.00";
$totVdr = "0.00";
$totVdr = $amtperunitVdr * $nofclvdr;

$amtperunitFom = "0.00";
$amtperunitFom = "180.00";
$totFom = "0.00";
$totFom = $amtperunitFom * $nofclfom;


$amtperunitExt = "0.00";
$amtperunitExt = "300.00";
$totExt = "0.00";
$totExt = $amtperunitExt * $nofclext;

$totmship= '0.00';
$totmship= "50.00";

$amtperunitCont= '0.00';
if ($invoice->clab_reg_amount == '21.2'){
$amtperunitCont=20;
}else if ($invoice->clab_reg_amount == '42.4'){
$amtperunitCont=40;
}else if ($invoice->clab_reg_amount == '53'){
$amtperunitCont=50;
}

$amtbefgst ="0.00";

if($invoice->payment_type == 'V' and $invoice->chk_clab_adm == '1' and $invoice->chk_clab_fees == '1'){ 
$amtbefgst ="0.00";
$amtbefgst = $totVdr + $totAgency;
$totExt = "0.00";
$nofclext = 0;

}else if ($invoice->chk_clab_adm == '1' and $invoice->payment_type == 'V'){
$amtbefgst ="0.00";
$amtbefgst = $totAgency;
$nofclvdr = 0;
$nofclext = 0;
$nofclfom = 0;


}else if ($invoice->chk_clab_fees == '1' and $invoice->payment_type == 'V'){
$amtbefgst ="0.00";
$amtbefgst = $totVdr;
$nofclext = 0;
$nofclfom = 0;
$nofclag = 0;

}else if ($invoice->payment_type=='R' and $invoice->chk_clab_fees_ext == '1'){
$amtbefgst ="0.00";
$amtbefgst = $totExt;
$nofclvdr = 0;
$nofclag = 0;
$nofclfom = 0;
$totAgency = "0.00";
$totvdr = "0.00";

}else if ($invoice->payment_type=='F' and $invoice->chk_fomema_male == '1'){
$amtbefgst ="0.00";
$amtbefgst = $totFom;
$nofclvdr = 0;
$nofclag = 0;
$nofclext = 0;
$totAgency = "0.00";
$totvdr = "0.00";

}else if ($invoice->payment_type=='CR' or $invoice->payment_type=='CRN'){
$amtbefgst ="0.00";
$amtbefgst = $amtperunitCont;
$nofclvdr = 0;
$nofclag = 0;
$nofclext = 0;
$nofclfom = 0;

}else if ($invoice->chk_clab_mship == '1' and $invoice->payment_type == 'O'){
$amtbefgst ="0.00";
$amtbefgst = $totmship;
$nofclvdr = 0;
$nofclext = 0;
$nofclfom = 0;
$nofclag = 0;
}

$amtgst = 0.00;
$amtgst = $amtbefgst * 0.06;

$amtaftgst = 0.00;
$amtaftgst = $amtbefgst + $amtgst; 
?>
<table align="center" width="104%">
<tr>
		<td>
			<table align="center" width="92%" border="0" style="border-collapse: collapse;" bordercolor="#FFFFFF">
				
<tr>
				  <td height="15"><table width="100%">
                    <tr>
                      <td align="left"><p><span class="style1">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</span> <span class="style7">(634396-W)</span><br />
Level 2, Annexe Block, Menara Milenium 8, Jalan Damalela, <br />
Bukit Damansara 50490 Kuala Lumpur<br />
Tel : 03-2095 9599     Fax : 03-2095 9566&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4"><strong>GST ID No</strong> : <strong>001341655040</strong></span><br />
                      </p></td>
                    </tr>
                    <tr>
                      <td align="center" height="20px">&nbsp;</td>
                    </tr>
                  </table></td>
				  <td align="center"><div align="center"><img src="<?php echo base_url();?>images/logoLetter.jpg" width="50" height="50" /></div></td>
			  </tr>
				
				<tr>
					<td width="85%" height="15">&nbsp;</td>
					<td align="center">&nbsp;</td>
			  </tr>
			</table>
<table width="92%" align="center">
				
				<tr>
				    <td width="6%" height="15">&nbsp;</td>
				  <td >&nbsp;</td>
				  <td width="12%" ><strong>Invoice No.</strong></td>
				  <td width="18%" ><strong>:&nbsp;</strong><?php echo $invoice->pmt_taxinv_no; ?></td>
			    </tr>
				 <tr>
				 	<td height="20"><strong>TO</strong></td>
				 	<td><strong>: </strong><?php echo $invoice->pmt_receive_from; ?></td>
			        <td><b>Date</b></td>
			        <td><strong>:</strong> <?php echo date("d F Y",strtotime($invoice->pmt_datecreated)); ?></td>
		         </tr>
				 <tr>
				   <td height="20">&nbsp;</td>
				   <td>: <?php echo $invoice->pmt_addr; ?></td>
				   <td>&nbsp;</td>
				   <td>: <?php echo $invoice->inv_type_desc; ?></td>
	    </tr>
				 <tr>
				   <td height="21">&nbsp;</td>
				   <td width="64%">&nbsp;</td>
	               <td colspan="2"><div align="right"><span class="style6">TAX INVOICE</span></div></td>
        </tr>
			</table>
<table align="center" width="92%" border="1" style="border-collapse: collapse;" bordercolor="#cccccc">
				<tr>
				  <td width="6%" height="20"><div align="center"><strong>NO</strong></div></td>
				  <td width="49%"><div align="center"><strong>DESCRIPTION</strong></div></td>
				  <td width="8%"><div align="center"><strong>FCL</strong></div></td>
				  <td width="21%"><div align="center"><strong>UNIT PRICE (RM)</strong></div></td>
				  <td width="16%"><div align="center"><strong>TOTAL (RM)</strong></div></td>
			  </tr>
				<tr>
				  <td height="20"><div align="center">1.</div></td>
				  <td>
				    <div align="left">
				      <input type="checkbox" <?php if($invoice->chk_clab_fees == '1'){ echo "checked" ;} ?> disabled/>
			      Admin.Fee VDR <?php echo $invoice->country ?></div></td>
				  <td><div align="center"><?php echo $nofclvdr ?></div></td>
				  <td><div align="center"><?php echo $amtperunitVdr ?></div></td>
				  <td><div align="center">
				    <?php if($invoice->chk_clab_fees == '1'){ echo number_format($totVdr,2); 
				  }else{ echo "0.00";}?>
				    <!--?php echo number_format($totVdr,2);?-->
                  </div></td>
				</tr>
				<tr>
				  <td height="20"><div align="center">2.</div></td>
				  <td><div align="left">
				    <input type="checkbox" <?php if($invoice->chk_clab_adm == '1'){ echo "checked" ;} ?> disabled/>
				    Agency.Fee
			      </div></td>
				  <td><div align="center"><?php echo $nofclag ?></div></td>
				  <td><div align="center"><?php echo $amtperunitAgency ?></div></td>
				  <td><div align="center"><?php if($invoice->chk_clab_adm == '1'){ echo number_format($totAgency,2); 
				  }else{ echo "0.00";}?>
				  </div></td> 
				</tr>
				<tr>
				  <td height="20"><div align="center">3.</div></td>
				  <td>
				    <div align="left">
				      <input type="checkbox" <?php if($invoice->chk_clab_fees_ext == '1'){ echo "checked" ;} ?> disabled/>
				      Admin.
			      Fee - Extension</div></td>
				  <td><div align="center"><?php echo $nofclext ?></div></td>
				  <td><div align="center"><?php echo $amtperunitExt ?></div></td>
				  <td><div align="center">
				    <?php if($invoice->chk_clab_fees_ext == '1'){ echo number_format($totExt,2); 
				  }else{ echo "0.00";}?>
				  </div></td>
				</tr>
				<tr>
				  <td height="20"><div align="center">4.</div></td>
				  <td><div align="left">
				    <input type="checkbox" <?php if($invoice->chk_clab_mship == '1'){ echo "checked" ;} ?> disabled="disabled"/>
Yearly Membership Fees</div></td>
				  <td><div align="center"></div></td>
				  <td><div align="center"><?php echo $totmship ?></div></td>
				  <td><div align="center">
				    <?php if($invoice->chk_clab_mship == '1'){ echo number_format($totmship,2); 
				  }else{ echo "0.00";}?>
				  </div></td>
				</tr>
				<tr>
				  <td height="20"><div align="center">5.</div></td>
				  <td height="20">
				    <!--div align="left">
				      <input type="checkbox" <?php if($invoice->clab_reg_amount == '20'){ echo "checked" ;} ?> disabled="disabled"/>
				      Registration :
			      Director's Fee</div-->
				    <input type="checkbox" disabled="disabled" <?php if($invoice->clab_reg_amount == '21.2'){ echo "checked" ;} ?>/>
&nbsp;1 YRS
<input type="checkbox" disabled="disabled" <?php if($invoice->clab_reg_amount == '42.4'){ echo "checked" ;} ?>/>
&nbsp;2 YRS
<input type="checkbox" disabled="disabled" <?php if($invoice->clab_reg_amount == '53'){ echo "checked" ;} ?>/>
&nbsp;3 YRS - Registration /Renewal </td>
				  <td height="20"><div align="center"></div></td>
				  <td align="center"><div align="center"><!--?php echo $amtperunitDir ?-->
			      <?php echo $amtperunitCont ?></div></td>
				  <td align="center"><div align="center"><?php echo number_format($amtperunitCont,2) ?></div></td>
			  </tr>
				
				<tr>
				  <td height="15"><div align="center">6.</div></td>
				  <td height="15"><input type="checkbox" <?php if($invoice->chk_fomema_male == '1'){ echo "checked" ;} ?> disabled="disabled"/>
				    Fomema</td>
				  <td height="15"><div align="center"><?php echo $nofclfom ?></div></td>
				  <td align="center"><div align="center"><?php echo $amtperunitFom ?></div></td>
				  <td align="center"><?php if($invoice->chk_fomema_male == '1'){ echo number_format($totFom,2); 
				  }else{ echo "0.00";}?></td>
			  </tr>
				
				
				<tr>
				<td height="20"colspan="3">&nbsp;</td>
				<td height="20"><strong>Total before GST (RM)</strong></td>
				<td align="center"><?php echo number_format($amtbefgst,2)?></td>
				</tr>
				<tr>
				  <td height="20"colspan="3">&nbsp;</td>
				  <td height="20"><strong>Add GST @ 6%</strong></td>
				  <td align ="center" height="20"><?php echo number_format($amtgst,2)?></td>
			  </tr>
				<tr>
				  <td height="20"colspan="3">&nbsp;</td>
				  <td height="20"><strong>Total (RM)</strong></td>
				  <td align ="center" height="20"><?php echo number_format($amtaftgst,2) ?></td>
				</tr>
			</table>
		  	
    <table width="92%" height="70" align="center" bordercolor="#FFFFFF" style="border-collapse: collapse;">
              
              <tr>
                <td height="13"colspan="3"></td>
                <td width="14%" rowspan="3"><div align="right">..............................................<br />
                  Authorised Signature</div></td>
        </tr>
              <tr>
                <td height="11"colspan="3"><span class="style9">Johor : Johor Regional Office. c/o CIDB Johor, Lot 2067, Batu 3, Jalan Tampoi, 81200 Johor Bahru, Johor Darul Takzim. Tel : 07-235 9599 Fax : 07-237 9566</span></td>
        </tr>
              <tr>
                <td height="14"colspan="3"><span class="style9">Penang Regional Office, No 12, Ground Floor, Jalan Todak 5, Pusat Bandar Seberang Jaya, 13700 Pulau Pinang. Tel : 04-397 9599 Fax : 04-397 9566</span></td>
        </tr>
            </table>
    <p>&nbsp;</p></td>
	</tr>
</table>
</body>
</html>
