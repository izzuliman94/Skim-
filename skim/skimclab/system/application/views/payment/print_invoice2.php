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
$bil=1;
$nofcl= $payment->no_of_fcl;
$discount= $payment->amt_disc;
$rmkdisc=$payment->rmk_disc;
$amtbefgst ="0.00";

?>
<table align="center" width="104%">
	<tr>
		<td>
			<table align="center" width="100%" border="0" style="border-collapse: collapse;" bordercolor="#FFFFFF">
				<tr>
					<td height="15">
						<table width="100%">
							<tr>
								<td align="left"><p><span class="style1">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (CLAB)</span> <span class="style7">(634396-W)</span><br />
								Level 2, Annexe Block, Menara Milenium 8, Jalan Damalela, <br />
								Bukit Damansara 50490 Kuala Lumpur<br />
								Tel : 03-2095 9599     Fax : 03-2095 9566&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4"><strong>GST ID No</strong> : <strong>001341655040</strong></span><br />
								</p>
								</td>
							</tr>
							<tr>
								<td align="center" height="20px">&nbsp;</td>
							</tr>
						</table>
					</td>
					<td align="center"><div align="center"><img src="<?php echo base_url();?>images/logoLetter.jpg" width="50" height="50" /></div></td>
				</tr>

				<tr>
					<td width="85%" height="15">&nbsp;</td>
					<td align="center">&nbsp;</td>
				</tr>
			</table>
			<table width="100%" align="center">			
				<tr>
				    <td width="12%" height="15">&nbsp;</td>
					<td >&nbsp;</td>
					<td ><strong>Invoice No.</strong></td>
					<td >: <strong>INV</strong><?php echo  substr($payment->pmt_receipt_no,2,9); ?></td>
					<td width="2%" >&nbsp;</td>
				</tr>
				<tr>
					<td height="20px"><strong>TO</strong></td>
					<td><strong>: </strong><?php echo $payment->pmt_receive_from; ?></td>
					<td><b>Date</b></td>
					<td><strong>:</strong> <?php echo date("d F Y",strtotime($payment->pmt_datecreated)); ?></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td height="20px">&nbsp;</td>
					<td>: <?php echo $payment->pmt_addr; ?></td>
					<td>&nbsp;</td>
					<td>: <?php echo $payment->pmt_type_desc; ?></td>
					<td>&nbsp;</td>
				</tr>
				 <tr>
					<td height="21">&nbsp;</td>
					<td width="62%">&nbsp;</td>
					<td width="8%">&nbsp;</td>
					<td width="16%"><span class="style6">TAX INVOICE</span></td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<table align="center" width="92%" border="1" style="border-collapse: collapse;" bordercolor="#cccccc">
				<tr>
					<td width="30" height="20"><div align="center"><strong>NO</strong></div></td>
					<td width="0"><div align="center"><strong>DESCRIPTION</strong></div></td>
					<td width="100"><div align="center"><strong>FCL / Posting / LW</strong></div></td>
					<td width="100"><div align="center"><strong>UNIT PRICE (RM)</strong></div></td>
					<td width="100"><div align="center"><strong>DISCOUNT (RM)</strong></div></td>
					<td width="100"><div align="center"><strong>TOTAL (RM)</strong></div></td>
				</tr>
				
				<?php if($payment->payment_type=='V'){ 
				if($payment->chk_clab_fees == '1'){?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>ADMIN/AGENCY FEE (<?php echo $payment->country ?>)</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_adm_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$admfee = ($payment->clab_adm_fee * $nofcl) - $discount;
						echo number_format($admfee,2);							
						$amtbefgst=$amtbefgst+$admfee;						
					?>
					</td>
				</tr>
				<?php } 				
				if($payment->chk_clab_grncad == '1'){?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>GREEN CARD</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_gc_fee ?></div></td>
					<td align=center>-</td>
					<td align=center>
					<?php 
						$gcfee = ($payment->clab_gc_fee * $nofcl);
						echo number_format($gcfee,2);							
						$amtbefgst=$amtbefgst+$gcfee;						
					?>
					</td>
				</tr>
				<?php } 				
				if($payment->chk_clab_tsitcent == '1'){?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>TRANSIT CENTRE</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_tc_fee ?></div></td>
					<td align=center>-</td>
					<td align=center>
					<?php 
						$tcfee = ($payment->clab_tc_fee * $nofcl);
						echo number_format($tcfee,2);							
						$amtbefgst=$amtbefgst+$tcfee;						
					?>
					</td>
				</tr>
				<?php } 
				} ?>
				
				<?php if($payment->payment_type=='R'){ 
				
				if($payment->chk_clab_fees_ext == '1'){ ?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>ADMIN FEE EXT (<?php echo $payment->country ?>)</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_ren_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$renfee = ($payment->clab_ren_fee * $nofcl) - $discount;
						echo number_format($renfee,2);							
						$amtbefgst=$amtbefgst+$renfee;						
					?>
					</td>
				</tr>
				<?php } 				
				if($payment->chk_clab_fees_extgc == '1'){?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>GREEN CARD</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_rengc_fee ?></div></td>
					<td align=center>-</td>
					<td align=center>
					<?php 
						$rengcfee = ($payment->clab_rengc_fee * $nofcl);
						echo number_format($rengcfee,2);							
						$amtbefgst=$amtbefgst+$rengcfee;						
					?>
					</td>
				</tr>
				<?php } 
				} ?>
				
				<?php if($payment->payment_type=='CR'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_contreg1 == '1') echo "REGISTRATION YEAR 1"; 
					if($payment->chk_contreg2 == '1') echo "REGISTRATION YEAR 2";
					if($payment->chk_contreg3 == '1') echo "REGISTRATION YEAR 3";
					?>
					</td>
					<td align=center>-</td>
					<td align=center><?php echo $payment->clab_contreg_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$cregfee = $payment->clab_contreg_fee - $discount;
						echo number_format($cregfee,2);							
						$amtbefgst=$amtbefgst + $cregfee;						
					?>
					</td>
				</tr>
				<?php } ?>
				
				<?php if($payment->payment_type=='CRN'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_contren1 == '1') echo "RENEWAL YEAR 1"; 
					if($payment->chk_contren2 == '1') echo "RENEWAL YEAR 2";		
					if($payment->chk_contren3 == '1') echo "RENEWAL YEAR 3";
					?>
					</td>
					<td align=center>-</td>
					<td align=center><?php echo $payment->clab_contren_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$crenfee = $payment->clab_contren_fee - $discount;
						echo number_format($crenfee,2);							
						$amtbefgst=$amtbefgst + $crenfee;						
					?>
					</td>
				</tr>
				<?php } ?>				

				<?php if($payment->payment_type=='REH'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_rehire1 == '1') echo "REHIRING (1st PAYMENT)"; 
					if($payment->chk_rehire2 == '1') echo "REHIRING (2nd PAYMENT)";
					?>
					</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_reh_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$crehfee = ($payment->clab_reh_fee * $nofcl) - $discount;
						echo number_format($crehfee,2);							
						$amtbefgst=$amtbefgst + $crehfee;						
					?>
					</td>
				</tr>
				<?php } ?>
				
				<?php if($payment->payment_type=='LW'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_local_dis == '1') echo "LOCAL WORKER (DISBURSEMENT)"; 
					if($payment->chk_local_reim == '1') echo "LOCAL WORKER (REIMBURSEMENT)";	
					?>
					</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_lw_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$clwfee = ($payment->clab_lw_fee * $nofcl) - $discount;
						echo number_format($clwfee,2);							
						$amtbefgst=$amtbefgst + $clwfee;						
					?>
					</td>
				</tr>
				<?php } ?>
				
				<?php if($payment->payment_type=='GRC' || $payment->payment_type=='REH'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_green_new == '1') echo "GREEN CARD (NEW)"; 
					if($payment->chk_green_ren == '1') echo "GREEN CARD (RENEW)";	
					?>
					</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_green_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$cgcfee = ($payment->clab_green_fee * $nofcl) - $discount;
						echo number_format($cgcfee,2);							
						$amtbefgst=$amtbefgst + $cgcfee;						
					?>
					</td>
				</tr>
				<?php } ?>
				
				<?php if($payment->payment_type=='FEE'){ ?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>
					<?php
					if($payment->chk_member == '1') {echo "CLAB FEE (MEMBERSHIP)"; $clabfee=$payment->clab_fee; } 
					if($payment->chk_intro == '1') {echo "CLAB FEE (INTRODUCER)"; $clabfee=$payment->amt_clabfeeo; }
					?>
					</td>
					<td align=center>-</td>
					<td align=center><?php echo $clabfee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$cfee = $clabfee - $discount;
						echo number_format($cfee,2);							
						$amtbefgst=$amtbefgst + $cfee;						
					?>
					</td>
				</tr>
				<?php } ?>
				
				<?php if($payment->payment_type=='T'){ 
				if($payment->chk_agency_fees == '1'){
				?>		
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>TRANSIT CENTRE (FEES)</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_trans_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$ctransfee = ($payment->clab_trans_fee * $nofcl) - $discount;
						echo number_format($ctransfee,2);							
						$amtbefgst=$amtbefgst + $ctransfee;						
					?>
					</td>
				</tr>
				<?php }
				if($payment->chk_agency_feesgc == '1'){
				?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?>.</div></td>
					<td>TRANSIT CENTRE (GREEN CARD)</td>
					<td align=center><?php echo $nofcl ?></td>
					<td align=center><?php echo $payment->clab_transgc_fee ?></div></td>
					<td align=center><?php echo $discount."<br>".$rmkdisc; ?></td>
					<td align=center>
					<?php 
						$ctransgcfee = ($payment->clab_transgc_fee * $nofcl) - $discount;
						echo number_format($ctransgcfee,2);							
						$amtbefgst=$amtbefgst + $ctransgcfee;						
					?>
					</td>
				</tr>
				<?php } 
				}
				
				if($payment->chk_others_fees == '1'){
				?>
				<tr>
					<td height="20"><div align="center"><?php echo $bil++ ?></div></td>
					<td>OTHERS(FEE)</td>
					<td align=center>-</td>
					<td align=center><?php echo $payment->others_amount_o ?></div></td>
					<td align=center>-</td>
					<td align=center>
					<?php 
						$cotherfee = $payment->others_amount_o;
						echo number_format($cotherfee,2);							
						$amtbefgst=$amtbefgst + $cotherfee;						
					?>
					</td>
				</tr>
				<?php } 
				
				if($payment->remarks_others<>''){
				?>
				<tr>
					<td height="20"></td>
					<td ><b>Remarks :</b> <?php echo $payment->remarks_others ?></td>
					<td align=center></td>
					<td align=center></td>
					<td align=center></td>				
					<td align=center></td>
				</tr>
				<?php } ?>
				
				<tr>
					<td height="15" >&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
					<td align="center">&nbsp;</td>
				</tr>

				<tr>
					<td height="20" colspan="5" align=right><strong>Total before GST (RM)</strong>&nbsp;</td>
					<td align="center"><?php echo number_format($amtbefgst,2)?></td>
				</tr>
				<tr>
					<td height="20" colspan="5" align=right><strong>Add GST @ 6%</strong>&nbsp;</td>
					<td align ="center">
					<?php 
						$amtgst = $amtbefgst * 0.06;
						echo number_format($amtgst,2);					
					?>
					</td>
				</tr>
				<tr>
					<td height="20" colspan="5" align=right><strong>Total (RM)</strong>&nbsp;</td>
					<td align ="center">
					<?php 
						$amtaftgst = $amtbefgst + $amtgst;
						echo number_format($amtaftgst,2); 
					?>
					</td>
				</tr>
			</table>
		  	
			<table width="92%" height="70" align="center" bordercolor="#FFFFFF" style="border-collapse: collapse;">              
				<tr>
					<td height="13"colspan="3"></td>
					<td width="20%" rowspan="3"><div align="right">...............................................................<br />
					Authorised Signature</div></td>
				</tr>
				<tr>
					<td height="11"colspan="3"><span class="style7">Johor : Johor Regional Office. c/o CIDB Johor, Lot 2067, Batu 3, Jalan Tampoi, 81200 Johor Bahru, Johor Darul Takzim. Tel : 07-235 9599 Fax : 07-237 9566</span></td>
				</tr>
				<tr>
					<td height="14"colspan="3"><span class="style7">Penang Regional Office, No 12, Ground Floor, Jalan Todak 5, Pusat Bandar Seberang Jaya, 13700 Pulau Pinang. Tel : 04-397 9599 Fax : 04-397 9566</span></td>
				</tr>
            </table>
		<p>&nbsp;</p>
		</td>
	</tr>
</table>
</body>
</html>
