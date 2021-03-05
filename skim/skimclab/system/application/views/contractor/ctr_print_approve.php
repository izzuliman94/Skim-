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
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="1" rowspan="11" valign="top" width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br /><br /><br />Ref: CLAB/NAA1/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br />Date:<?php echo date('j F Y');?></td>
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
      <td><br /><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
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
      <br />
      Tel:<?php echo $ctr->ctr_telno;?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      <td style="text-align: right;" colspan="2" rowspan="1">Fax:<?php echo $ctr->ctr_fax;?> </td>
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
      <td colspan="4"><u><h3>CLAB REGISTRATION</h3></u></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">With reference to the above, we are pleased to inform that you have been registered with Construction Labour Exchange Centre Berhad (CLAB). Details of your registration are as follows :</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
      	<table width="80%" align="CENTER" border="0">
      		<tr>
      			<td width="5%">&#8226;</td>
      			<td width="45%">Registration No</td>
      			<td width="5%">:</td>
      			<td width="40%"><b><?php echo $ctr->ctr_clab_no?></b></td>
      		</tr>
      		<tr>
      			<td>&#8226;</td>
      			<td>Date of Registration</td>
      			<td>:</td>
      			<td><b><?php echo date('d-m-Y', strtotime($ctr->ctr_datereg))?></b></td>
      		</tr>
      		<tr>
      			<td>&#8226;</td>
      			<td>Date of Expiry</td>
      			<td>:</td>
      			<td><b><?php if($ctr->ctr_clabexp_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?></b></td>
      		</tr>
      		<tr>
      			<td>&#8226;</td>
      			<td>Date of Expiry of CIDB Registration</td>
      			<td>:</td>
      			<td><b><?php if($ctr->ctr_cidbexp_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?></b></td>
      		</tr>
      	</table>
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Enclosed herewith please find receipt of your registration fee amounting to Ringgit Malaysia : <b><?php echo $txtAmount;?></b> Kindly note that CLAB registration certificate will be sent to you in due course.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We wish to extend our appreciation for your anticipation and trust and looking forward to assist you in regard to your future needs and construction manpower requirements. Please ensure the validity of your CIDB registration remain valid. An expired CIDB registration would also result an invalidity of this registration.</p></td>
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
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"> 
					  CHIEF EXECUTIVE OFFICER
	  </td>
    </tr>
  </tbody>
</table>
</body>
</html>
