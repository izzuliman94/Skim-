<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - Contract Expiry Reminder</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
</style>
</head>
<body>
<?php 
function getYears( $p_strDate ) {
	list($Y,$m,$d) = explode("-",$p_strDate);
	return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
?>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg"><br /><br />
      <span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;">
		CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
		Lot 1-3, Level 6, Block C (South), Pusat Bandar Damansara, 50490 Kuala Lumpur. <br>
		Tel: 03-2095 9599 <br>
		Fax: 03-2095 9566 <br>
		E-mail: info@clab.com.my <br>
		Website: www.clab.com.my <br>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br />Ref: CLAB/CED/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Date: <?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?> <?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?> <?php echo $ctr->state_name;?>      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Fax:<?php echo $ctr->ctr_fax;?> </td>
    </tr>
     <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_contact_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1"><strong><?php echo $reminderType;?></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Dear Sir/Madam,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><h3><u>REMINDER FOR <?php echo $titleWord;?> EXPIRY</u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We wish to draw to your attention that the contract of the following Foreign Construction Labours (FCL's) will expire on the stipulated date.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
      	<table width="90%" border="1" align="CENTER" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
      	<tr>
      		<th class="print">No.</th>
      		<th class="print" align="CENTER">Name</th>
      		<th class="print" align="CENTER">Passport No</th>
      		<th class="print" align="CENTER"><?php echo $fieldTitle;?></th>
      		<th class="print" align="CENTER"><?php echo $secondaryFieldTitle;?></th>
      		<th class="print" align="CENTER">Years in Malaysia</th>
      	</tr>
      	<?php $i = 1; 
      		foreach($expiredWorkersRecord->result() as $wkr){
	    ?>
	    <tr>
	    	<td class="print"><?php echo $i++;?>.</td>
	    	<td class="print" valign="top"><?php echo $wkr->wkr_name;?></td>
	    	<td class="print" align="CENTER"><?php echo $wkr->wkr_passno;?></td>
	    	<td class="print" align="CENTER"><?php if($fieldname == 'wkr_permitexp') echo date('j F Y', strtotime($wkr->wkr_permitexp)); else echo date('j F Y', strtotime($wkr->wkr_passexp));?></td>
	    	<td class="print" align="CENTER"><?php if($fieldname == 'wkr_permitexp') echo date('j F Y', strtotime($wkr->wkr_passexp)); else echo date('j F Y', strtotime($wkr->wkr_permitexp));?></td>
	    	<td class="print" align="CENTER"><?php if(strlen($wkr->wkr_entrydate) == 0 || $wkr->wkr_entrydate == '0000-00-00') echo "-can't be determined-"; else echo getYears($wkr->wkr_entrydate) + 1; ?></td>
	    </tr>
	    <?php }
	    ?>
      </table>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Kindly be advised that all application of extension of work permit must be accompanied together 
										 with all necessary documents and payment. Incomplete application will be rejected.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We would also like to inform that all application must reach us 2 weeks before the expiry of the work permit. This to avoid additional payment to Jabatan Imigresen malaysia of RM1100.00 (for special passed compound).</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Please inform us immediately the status of your FCL's and post or fax a copy of police report, if your FCL's reported runaway / missing from duty.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Kindly ignore this reminder should extension has been made.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Thank you.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yours Sincerely, <br />
      CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">p.p.
	  CHIEF EXECUTIVE OFFICER	  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>This letter is computer generated. No signature required.</i>      	</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"><i>/<?php echo $this->session->userdata('username');?></i></span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: left; width: 616px;">
  <tbody>
    <tr>
      <td colspan="4"><div align="center"><strong><u>CHECKLIST FOR EXTENSION (PLKS) </u></strong></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">The document &amp; payment that need to be  prepared to complete this application:-</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox" value="checkbox"></td>
      <td width="516">Original Passport (date of expiry for the  passport should be more than 14 months)</td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td>FOMEMA Slip (renewal  for year 2 &amp; 3 only, foreign workers must undergo the required medical examination) <strong></strong></td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td>Signed Agreement</td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Employer&rsquo;s Application Letter (for Extension of  PLKS)</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><u>Required Payments</u></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox42" value="checkbox"></td>
      <td>Jabatan Immigresen - <strong>Ketua  Pengarah Imigresen Malaysia</strong><br />
        <em>(Processing Fees / Visa / Levi)</em></td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox43" value="checkbox"></td>
      <td>CLAB - <strong>Construction  Labour Exchange Centre Berhad</strong><br />
        <em>(Admin Fees / *6% Service Tax)</em></td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox44" value="checkbox"></td>
      <td>Insurance - <strong>Lonpac Insurance Berhad</strong><br />
        <em>(Insurance Guarantee / FWCS / Stamp Duty/*6% Service Tax)</em></td>
    </tr>
    <tr>
      <td colspan="3"><input type="checkbox" name="checkbox45" value="checkbox"></td>
      <td>Insurance - <strong>Lonpac Insurance Berhad</strong><br />
        <em>(Foreign Worker Hospitalisation and Surgical Insurance  Scheme<strong> </strong>/ Stamp Duty)</em></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">The guidelines by the Immigration Department  stipulate that employers must take appropriate steps to renew the work permits  of their workers <strong>3 months</strong> before  their expiry. </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">We would advise employers to place importance  on this annual medical examination to avoid unnecessary inconvenience due to  last minute examination. We also wish to caution employers that they may be  subject to compound/fine by Immigration Department for late renewal.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Kindly be reminded that we could not  processed further should we do not received your complete application.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Should you have any queries pertaining to the  above, please do not hesitate to contact us. We are more than glad to assist  you in clearing all pertaining matters. You may also visit our website at <a href="http://www.clab.com.my" title="http://www.clab.com.my">www.clab.com.my</a>&nbsp;or contact our  Customer Services at 03-20959599.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">Thank You</div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong>CONSTRUCTION  LABOUR EXCHANGE CENTRE BERHAD</strong></div></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>

<p>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
</p>
<tr>
  <td width="101%">&nbsp;</td>
  </body>
</html>
