<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - CLAB Registration Approval Letter</title>
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
      <td colspan="2" rowspan="1"><br />Date: <?php echo date('j F Y');?></td>
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
      <td><?php echo $ctr->ctr_addr1;?>&nbsp;<?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?>&nbsp;<?php echo $ctr->state_name;?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><br />
      	Tel:<?php echo $ctr->ctr_telno;?> <br />
      	Fax:<?php echo $ctr->ctr_fax;?> </td>
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
      <td colspan="4"><h3><u><?PHP echo $titleWord;?> EXPIRY DATE</u></h3></td>
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
      </table>
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Please inform us immediately if you wish to extend their service, failing which we will re-distribute these FCLs to other company.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
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
      <td colspan="4">p.p.					  CHIEF EXECUTIVE OFFICER
	  </td>
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
      	</span></td>
    </tr>
  </tbody>
</table>
</body>
</html>
