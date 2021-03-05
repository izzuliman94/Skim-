<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - CLAB Registration Renewal Letter</title>
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

P.pagebreakhere {page-break-before: always}
.print {font-size: 12px;
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
		<!--td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/clablogo.png" width=180 height=50><br />
		<br />
		<br />
		<span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
		<span style="text-align: justify">Level 2, Annexe Block,Menara Milenium 8, Jalan Damanlela, Bukit Damansara, 50490 Kuala Lumpur. </span><br>
			Tel: 03-2095 9599 <br>
			Fax: 03-2095 9566 <br>
			E-mail: info@clab.com.my <br>
			Website: www.clab.com.my 
		</span></td-->
		<!--td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg"><br /><br />
			<span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;">
			CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
			<span style="text-align: justify">Level 2, Annexe Block,Menara Milenium 8, Jalan Damanlela, Bukit Damansara, 50490 Kuala Lumpur. </span><br>
			Tel: 03-2095 9599 <br>
			Fax: 03-2095 9566 <br>
			E-mail: info@clab.com.my <br>
			Website: www.clab.com.my <br>
			</span>
		</td-->
    </tr>
    <tr>
		<td colspan="2" rowspan="1">Ref: CLAB/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?>
		</td>
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
      <td><br />
          <br />
        <b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?> <?php echo $ctr->ctr_addr2;?> <br />
          <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?> <?php echo $ctr->state_name;?> </td>
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
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_dir_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1">&nbsp;</td>
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
      <td colspan="4"><strong><u>REMINDER FOR G1G3 PROGRAMME CONTRACT EXPIRY</u></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <!--td colspan="4"><p align="justify">We  wish to kindly remind you that your registration will be expiring on <?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?>. Details of your registration are as follows: </p></td-->
	  <td colspan="4"><p align="justify">We wish to draw to your attention that the contract of the following Foreign Construction Labours (FCL's) will expire on the stipulated date.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
		<td colspan="4">
			<table width="100%" border="1" align="left" cellpadding="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#ccc">
				<tr>
					<th height=25 class="print" align="center">No.</th>
					<th class="print" align="left">Name</th>
					<th class="print" align="CENTER">Passport No</th>
					<th class="print" align="CENTER">Permit Expiry</th>
					<th class="print" align="CENTER">Passport Expiry</th>
					<th class="print" align="CENTER">Years in Malaysia</th>
					<th class="print" align="CENTER">Country</th>
				</tr>
				<?php
				$i=1;
				foreach($worker->result() as $wkr)
				{ ?>
				<tr>
					<td height=25 class="print" align="center" valign="top"><?php echo $i++;?>.</td>
					<td class="print" valign="top"><?php echo $wkr->fcl_name;?></td>
					<td class="print" align="CENTER" valign="top"><?php echo $wkr->fcl_passno;?></td>
					<td class="print" align="CENTER" valign="top"><?php echo date('j M Y', strtotime($wkr->wkr_permitexp)); ?></td>
					<td class="print" align="CENTER" valign="top"><?php echo date('j M Y', strtotime($wkr->fcl_passexp)); ?></td>
					<td align="CENTER" class="print" valign="top"><?php if(strlen($wkr->wkr_entrydate) == 0 || $wkr->wkr_entrydate == '0000-00-00') echo "-can't be determined-"; else echo getYears($wkr->wkr_entrydate) + 1; ?></td>
					<td align="CENTER" class="print" valign="top"><?php echo $wkr->cty_desc;?></td>
				</tr>
				<?php
				} ?>
				
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
    </tr>
    <tr>
		<td colspan="4">
			<p align="justify">Kindly be advised that the return worker(s) must be accompanied together with all necessary. Incomplete application will be rejected.</p>
			<p align="justify">We would also like to inform that all application must reach us 2 weeks before the expiry of the work permit. This to avoid additional payment to Jabatan Imigresen malaysia of RM1100.00 (for special passed compound).</p>
			<p align="justify"><b>Kindly ignore this reminder should extension has been made.</b></p>
		</td>
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
        CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">p.p CHIEF EXECUTIVE OFFICER </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i>This letter are computer generated. No signature required.</i> </span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <!--tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i><?php echo $this->session->userdata('username');?></i> </span></td>
    </tr-->
  </tbody>
</table>
<p CLASS="pagebreakhere">
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4" align=center><u><b>CHECKLIST FOR RETURN OF FCL TO CLAB</b></u></th>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4">The document that need to be prepared to complete this process:-</th>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td width=30px><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
		<td colspan=3>Original Passport </td>
	</tr>
	<tr>
		<td><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
		<td colspan=3>CLAB ID CARD</td>
	</tr>
	<tr>
		<td><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
		<td colspan=3>CIDB Construction Personnel Card (Green Card)</td>
	</tr>
	<tr>
		<td><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
		<td colspan=3>Borang Penyerahan PBA</td>
	</tr>
	<tr><td colspan="4" height=40>&nbsp;</td></tr>
	<tr>
		<td colspan="4">
			<p align="justify">Employers must take appropriate steps to return the worker on the stipulated date prior to contract expiry date.</p>
			<p align="justify">We would advise employers to place importance reminder. We also wish to caution employers that they may be subject to blacklisted and your deposit will be forfeited should you failed to return the worker. </p>
			<p align="justify"><b>Kindly be reminded that we could not processed further should we do not received your complete application.</b></p>
		</td>
    </tr>
	<tr><td colspan="4" height=40>&nbsp;</td></tr>
    <tr>
		<td colspan="4">
			<p>Thank You<br><b>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</b></p>
		</td>
    </tr>
	<tr><td colspan="4" height=40>&nbsp;</td></tr>
	<tr>
		<td colspan="4">
			<table width="100%" border="1" cellpadding=5 style='border-collapse:collapse' bordercolor='#666666'>
				<tr><td align=center><b>FOR CLAB USE ONLY</b></td>				
			</table>
		</td>
	</tr>
	<tr><td colspan="4" height=40>&nbsp;</td></tr>
	<tr>
		<td colspan="4">
			<table width="100%" border="0" cellpadding=0 style='border-collapse:collapse' bordercolor='#666666'>				
				<tr>
					<td width=150px>CLAB registration status : </td>
					<td width=25px><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td width=50px>ACTIVE</td>
					<td width=25px><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td>IN-ACTIVE</td>
				</tr>
				<tr><td colspan="5" height=40>&nbsp;</td></tr>
				<tr>
					<td height=40>Checked By : </td>
					<td colspan=4>________________________</td>
				</tr>
				<tr>
					<td height=40>Signature : </td>
					<td colspan=4>________________________</td>
				</tr>
				<tr>
					<td height=40>Date : </td>
					<td colspan=4>________________________</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</p>
</body>
</html>
