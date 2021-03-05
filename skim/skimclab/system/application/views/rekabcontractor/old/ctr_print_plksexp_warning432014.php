<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - Contract Expiry (Final Reminder)</title>
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
.print {
	text-align: center;
}
</style>
</head>
<body>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg"><br /><br />
      <span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><br />
      CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
      <span style="text-align: justify">Level 2, Annexe Block,Menara Milenium 8, Jalan Damanlela, Bukit Damansara, 50490 Kuala Lumpur. </span><br>
Tel: 03-2095 9599 <br>
Fax: 03-2095 9566 <br>
E-mail: info@clab.com.my <br>
Website: www.clab.com.my <br>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br/><br />Ref: CLAB/CED/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
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
      <td><?php echo $ctr->ctr_pcode;?> <?php echo $ctr->state_name;?>
      </td>
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
      <td style="text-align: right;" colspan="2" rowspan="1"></td>
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
      <td colspan="4"><h3><u>STATUS AND WORK PERMIT CANCELLATION FEE<a href="ctr_print_plksexp_warning.php"></a></u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">We refer to the above matter.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We wish to draw to your attention that the contract of the following Foreign Construction Labours (FCL's) are already expired. Below is the list of names of the workers:-</p></td>
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
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">In due of the above this has contravened provisions under Section 14 and Section 15 of the Immigration Act 1959/63 and regulation 19 of the Immigration Regulation 1963 .</p></td>
    </tr>
    <tr>
      <td height="19" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="50" colspan="4"><p>Therefore, should we  not receive any reply from you within 14 days from date of this letter. A  police report will be lodge against your company and the above FCL(s) and &nbsp;cancellation permit should be made to Ketua Pengarah Imigresen Malaysia. We will also no longer accept or process your application for new recruitment of FCL.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Please find below cost of the cancellation fee for the FCL(s) base from their origin country.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="43" valign="top"><p><strong>NO</strong></p></td>
          <td width="390" valign="top"><p><strong>COUNTRY </strong></p></td>
          <td width="156" valign="top"><p><strong>FEE(PER    FCL)</strong></p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>1.</p></td>
          <td width="390" valign="top"><p>INDONESIA</p></td>
          <td width="156" valign="top"><p>RM250.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>2.</p></td>
          <td width="390" valign="top"><p>BANGLADESH </p></td>
          <td width="156" valign="top"><p>RM500.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>3.</p></td>
          <td width="390" valign="top"><p>PAKISTAN </p></td>
          <td width="156" valign="top"><p>RM750.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>4.</p></td>
          <td width="390" valign="top"><p>MYANMAR</p></td>
          <td width="156" valign="top"><p>RM750.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>5.</p></td>
          <td width="390" valign="top"><p>INDIA </p></td>
          <td width="156" valign="top"><p>RM750.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>6.</p></td>
          <td width="390" valign="top"><p>PHILIPPINES </p></td>
          <td width="156" valign="top"><p>RM1,000.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>7.</p></td>
          <td width="390" valign="top"><p>THAILAND </p></td>
          <td width="156" valign="top"><p>RM250.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>8.</p></td>
          <td width="390" valign="top"><p>KEMBOJA</p></td>
          <td width="156" valign="top"><p>RM250.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>9.</p></td>
          <td width="390" valign="top"><p>NEPAL </p></td>
          <td width="156" valign="top"><p>RM750.00</p></td>
        </tr>
        <tr>
          <td width="43" valign="top"><p>10.</p></td>
          <td width="390" valign="top"><p>VIETNAM </p></td>
          <td width="156" valign="top"><p>RM1,500.00</p></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="4"><p><strong>Your  cooperation in settling the fees imposed is much appreciated. Failing to do so  will affect your future application with us. </strong></p></td>
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
      CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
     <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>This letter is computer generated. No signature required.</i>
      	</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>/<?php echo $this->session->userdata('username');?></i>
      	<?php 
function getYears( $p_strDate ) {
	list($Y,$m,$d) = explode("-",$p_strDate);
	return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
?>
        </span></td>
    </tr>
  </tbody>
</table>
</body>
</html>
