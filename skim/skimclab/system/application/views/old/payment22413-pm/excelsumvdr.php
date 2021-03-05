<?php 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=excelsummmary(vdr).xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); // this is my export to excel 
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
<table width="150%" border="1">
<tr>
<td rowspan="2" align="center" class="style5" ><div align="center" class="style8">Running<br>
  Number</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Date<br>
  Received</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Payment<br>
  Advice<br> 
  Ref<br>
  . Number</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">COMPANY</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">FCL</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Nationality</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">OR No.</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Total Payment<br>
  Collected</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Admin<br>
  Fees<br> 
  Collected</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Service<br>
  Tax</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Special Pass /<br> 
  Transfer<br> 
  Endorsement</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Compound</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">Compound<br>
  Company</div></td>
<td colspan="4" align="center" class="style5"><div align="center" class="style8">JIM Collected</div></td>
<td colspan="4" align="center" class="style5"><div align="center" class="style8">Insurance Collected</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO CLAB </div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO JIM</div></td>
<td rowspan="2" align="center" class="style5"><div align="center" class="style8">CHQ NO LONPAC</div></td>
</tr>
<tr>
  <td align="center" class="style5"><div align="center" class="style8">PLKS</div></td>
  <td align="center" class="style5"><div align="center" class="style8">Fees</div></td>
  <td align="center" class="style5"><div align="center" class="style8">Visa</div></td>
  <td align="center" class="style5"><div align="center" class="style8">Levy</div></td>
  <td align="center" class="style5"><div align="center" class="style8">IG</div></td>
  <td align="center" class="style5"><div align="center" class="style8">FWCS</div></td>
  <td align="center" class="style5"><div align="center" class="style8">MEDICAL<BR>
    INSURANCE </div></td>
  <td align="center" class="style5"><div align="center" class="style8">LONPAC</div></td>
  </tr>
  <?php if($summary->num_rows() == 0){ ?>
<tr>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td align="center" class="style10">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
</tr>
<?php }else{ 
      $i = 1;
	  foreach($summary->result() as $sum){
      $val = 000000 + $i++;
?>
<tr>
  <td class="style5"><div align="center" class="style11"><?php echo "LT13".$val?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo date('j M Y',strtotime($sum->pmt_datecreated))?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->pmt_no?></div></td>
  <td class="style5"><span class="style11"><?php echo $sum->pmt_receive_from?></span></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->no_of_fcl?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->country?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->pmt_receipt_no?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->TotalPaymentCollected ?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->clab_amount_only ?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->clab_amount_tax ?></div></td>
  <td class="style5"><?php echo $sum->jim_amount_sp ?></td>
  <td class="style5"><?php echo $sum->jim_amount_compound ?></td>
  <td class="style5">&nbsp;</td>
  <td align="center" class="style10"><?php echo $sum->jim_amount_plks ?></td>
  <td align="center" class="style10"><?php echo $sum->jim_amount_fees ?></td>
  <td align="center" class="style10"><?php echo $sum->jim_amount_levi ?></td>
  <td align="center" class="style10"><?php echo $sum->jim_amount_visa ?></td>
  <td align="center" class="style10"><?php echo $sum->ins_amount_ig ?></td>
  <td align="center" class="style10"><?php echo $sum->ins_amount_fwcs ?></td>
  <td align="center" class="style10"><?php echo $sum->ins_amount_fwhs ?></td>
  <td align="center" class="style10">&nbsp;</td>
  <td class="style5"><span class="style11"><?php echo $sum->pmt_chq_clab?></span></td>
  <td class="style5"><span class="style11"><?php echo $sum->pmt_chq_jim?></span></td>
  <td class="style5"><span class="style11"><?php echo $sum->ins_chq_no?></span></td>
</tr>
<?php }} ?>
</table>
