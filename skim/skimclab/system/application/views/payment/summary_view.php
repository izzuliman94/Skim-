<?php 
//header("Content-type: application/octet-stream"); 
//header("Content-Disposition: attachment; filename=excelsummmary(All).xls"); 
//header("Pragma: no-cache"); 
//header("Expires: 0"); // this is my export to excel 
?>
<style type="text/css">
.head1 {
	font-family: verdana;
	font-weight: bold;
	font-size: large;
	text-align: center;
}
.head2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: light;
	font-size: medium;
	text-align: center;
}
.style5 {vertical-align: text-bottom; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 9px; height: 30px; }
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style10 {vertical-align: text-bottom; text-align: center; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; height: 30px; }
.style11 {font-family: Verdana, Arial, Helvetica, sans-serif}
</style>
<table width="200%" border="0" style="border-collapse: collapse;" bordercolor="#CCC">
	<tr><td colspan=50  height=50 align="center" class="style8">Summary of Payment</td></tr>
</table>
<table width="200%" border="1" style="border-collapse: collapse;" bordercolor="#CCC" cellpadding=2>
	<tr>
		<td rowspan="2" align="center" class="style5" ><div align="center" class="style8">No.</div></td>
		<td rowspan="2" align="center" class="style5" width=80><div align="center" class="style8">Date<br>Received</div></td>
		<!--td rowspan="2" align="center" class="style5"><div align="center" class="style8">Payment<br />Advice<br />Ref<br />. Number</div></td-->
		<td rowspan="2" align="center" class="style5" width=120><div align="center" class="style8">Payment<br>Type</div></td>
		<td rowspan="2" align="center" class="style5" width=200><div align="center" class="style8">COMPANY</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">FCL</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Nationality</div></td>
		<td rowspan="2" align="center" class="style5" width=70><div align="center" class="style8">OR No.</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Total Payment<br>Collected</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">VDR</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Renewal<br>Permit</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Contractor<br>Registration</div></td>	
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Contractor<br>Renewal</div></td>	
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Rehiring</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">CLAB<br>(Local Worker)</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Green<br>Card</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">CLAB<br>Fees</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Transit Centre</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">FOMEMA</div></td>
		<td colspan="7" align="center" class="style5"><div align="center" class="style8">JIM Collected</div></td>
		<td colspan="3" align="center" class="style5"><div align="center" class="style8">Insurance Collected</div></td>
		<td colspan="6" align="center" class="style5"><div align="center" class="style8">Others</div></td>
		<td colspan="2" align="center" class="style5"><div align="center" class="style8">Discount</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Cancellation<br>Remarks</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO CLAB </div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO FOMEMA</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO JIM</div></td>
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO INSURANCE</div></td>		
		<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO OTHERS FEE</div></td>
        <td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO OTHERS 3RD </div></td>
	</tr>
	<tr>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">PLKS</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Fees</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Visa</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Levy</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Compound</div></td>
		<td align="center" class="style5"><div align="center" class="style8">SP</div></td>
		<td align="center" class="style5"><div align="center" class="style8">CP</div></td>
		<td align="center" class="style5"><div align="center" class="style8">IG</div></td>
		<td align="center" class="style5"><div align="center" class="style8">FWCS</div></td>
		<td align="center" class="style5"><div align="center" class="style8">FWHS</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amt</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Tax</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Total</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Deposit Fee</div></td>
		
		<td align="center" class="style5"><div align="center" class="style8">Remarks Others Fee</div></td>
        <td align="center" class="style5"><div align="center" class="style8">Remarks Others 3rd Party</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Amount</div></td>
		<td align="center" class="style5"><div align="center" class="style8">Remarks</div></td>
	</tr>
	<?php if($summary->num_rows() == 0){ ?>
		<tr><td valign=middle align=center colspan=51 height=100 class="style8"><b>No data to display</b></td></tr>
	<?php }else{ 
		$i = 1;
		foreach($summary->result() as $sum){
		$val = 000000 + $i++;
	?>
	<tr>
		<td class="style5"><div align="center" class="style11"><?php echo $val?></div></td>
		<td class="style5"><div align="center" class="style11"><?php echo date('j M Y',strtotime($sum->pmt_datecreated))?></div></td>
		<!--td class="style5"><div align="center" class="style11"><?php echo $sum->clab_pa_no?></div></td-->
		<td class="style5"><div align="center" class="style11"><?php echo $sum->pmt_type_desc?></div></td>
		<td class="style5"><span class="style11"><?php echo $sum->pmt_receive_from?></span></td>
		<td class="style5"><div align="center" class="style11"><?php echo $sum->no_of_fcl?></div></td>
		<td class="style5"><div align="center" class="style11"><?php echo $sum->country?></div></td>
		<td class="style5"><div align="center" class="style11"><?php echo $sum->pmt_receipt_no?></div></td>
		<td class="style5"><div align="center" class="style11"><?php echo $sum->TotalPaymentCollected ?></div></td>
		<td align="center" class="style10"><?php echo $sum->clab_amount_only ?></td>
		<td align="center" class="style10"><?php echo $sum->clab_amount_tax ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_clabreno ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_clabrent ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_contrego ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_contregt ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_contreno ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_contrent ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_rehireo ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_rehiret ?></td>
		<td align="center" class="style10"><?php echo $sum->local_amounto ?></td>
		<td align="center" class="style10"><?php echo $sum->local_amountt ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_greencardo ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_greencardt ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_clabfeeo ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_clabfeet ?></td>		
		<td align="center" class="style10"><?php echo $sum->agency_amounto ?></td>
		<td align="center" class="style10"><?php echo $sum->agency_amountt ?></td>
		<td align="center" class="style10"><?php echo $sum->fomema_amounto ?></td>
		<td align="center" class="style10"><?php echo $sum->fomema_amountt ?></td>

		<td align="center" class="style10"><?php echo $sum->jim_amount_plks ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_fees ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_visa ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_levi ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_compound ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_sp ?></td>
		<td align="center" class="style10"><?php echo $sum->jim_amount_cp ?></td>

		<td align="center" class="style10"><?php echo $sum->ins_amount_ig ?></td>
		<td align="center" class="style10"><?php echo $sum->ins_amount_fwcs ?></td>
		<td align="center" class="style10"><?php echo $sum->ins_amount_fwhs ?></td>
		<td align="center" class="style10"><?php echo $sum->others_amount_o ?></td>
		<td align="center" class="style10"><?php echo $sum->others_amount_t ?></td>
		<td align="center" class="style10"><?php echo $sum->others_amount ?></td>
		<td align="center" class="style10"><?php echo $sum->depref ?></td>
		
		<td align="center" class="style10"><?php echo $sum->remarks_otherso ?></td>
        <td align="center" class="style10"><?php echo $sum->remarks_others3rd ?></td>
		<td align="center" class="style10"><?php echo $sum->amt_disc ?></td>	
		<td align="center" class="style10"><?php echo $sum->rmk_disc ?></td>
		<td class="style5"><span class="style11"><?php echo $sum->pmt_wd_comment?></span></td>
		<td class="style5"><span class="style11">
		<?php 
		if($sum->payment_type=='V')
			echo $sum->pmt_chq_clab; 
		elseif($sum->payment_type=='R')
			echo $sum->pmt_chq_clab_ren;
		elseif($sum->payment_type=='CR')
			echo $sum->chqno_contreg;
		elseif($sum->payment_type=='CRN')
			echo $sum->chqno_contren;
		elseif($sum->payment_type=='REH')
			echo $sum->chqno_rehire.','.$sum->pmt_chk_green;
		elseif($sum->payment_type=='LW')
			echo $sum->pmt_chq_local;	
		elseif($sum->payment_type=='GRC')
			echo $sum->pmt_chk_green;	
		elseif($sum->payment_type=='FEE')
			echo $sum->chqno_clabfee;	
		elseif($sum->payment_type=='T')
			echo $sum->agency_chq_no;
		elseif($sum->payment_type=='LT')
			echo $sum->agency_chq_no;
		elseif($sum->payment_type=='G13')
			echo $sum->agency_chq_no;
		else
			echo '';	
		
		?>		
		</span></td>
		<td class="style5"><span class="style11"><?php echo $sum->pmt_chq_fomema?></span></td>
		<td class="style5"><span class="style11"><?php echo $sum->pmt_chq_jim?></span></td>
		<td class="style5"><span class="style11"><?php echo $sum->ins_chq_no?></span></td>		
		<td class="style5"><span class="style11"><?php echo $sum->others_chq_noo?></span></td>
        <td class="style5"><span class="style11"><?php echo $sum->others_chq_no3rd?></span></td>
	</tr>
	<?php }} ?>
</table>
<p>&nbsp;</p>
