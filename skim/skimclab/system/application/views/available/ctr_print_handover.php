<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Local Transfer - Handover</title>
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
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="1" rowspan="11" valign="top" width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%" height="34">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td height="34" colspan="2" rowspan="1">Ref: CLAB/LTV/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Date:<?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><b><?php echo $avlabRow->comp_to_name;?> (<?php echo $avlabRow->comp_to_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $avlabRow->to_addr1;?>&nbsp;<?php echo $avlabRow->to_addr2;?> <br />
          <?php echo $avlabRow->to_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $avlabRow->to_pcode;?>&nbsp;<?php echo $avlabRow->state_to_name;?> <br />
        Tel:<?php echo $avlabRow->to_telno;?> </td>
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
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $avlabRow->dir_to_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1">Fax:<?php echo $avlabRow->to_fax;?> </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Dear Sir / Madam,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><h3><u>HANDOVER OF ORIGINAL PASSPORT </u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We are pleased to inform, that the passports for foreign construction workers are ready for collection. The details of the workers are : <br /></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table width="100%" border="1" cellspacing="0">
          <tr>
            <td width="5%" align="CENTER"><strong>No</strong></td>
            <td width="35%" align="CENTER"><strong>Name</strong></td>
            <td width="20%" align="CENTER"><strong>No Passport</strong></td>
          </tr>
          <?php if($avlabWkrDetails->num_rows() > 0){
	      			$i = 0;
      				foreach($avlabWkrDetails->result() as $wkr){
	      	?>
          <tr>
            <td><?php echo ++$i;?></td>
            <td><?php echo $wkr->wkr_name;?></td>
            <td><?php echo $wkr->wkr_passno;?></td>
          </tr>
          <?php
     	 		}
  			}
  			?>
      </table></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Kindly make the necessary arrangement for collection of passports at our office. </p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Thank You .</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yours Sincerely , <br />
          <strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong> <br />      </td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i>This letter is computer generated. No signature required.</i> </span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;<br />
        _____________________________________________________________________________________________<br />      </td>
    </tr>
    <tr>
      <td colspan="4"><strong>Acknowledgement By Sign</strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">I, hereby acknowledge receipt the above passports.</td>
    </tr>
	<tr>
      <td colspan="4">Name : </td>
    </tr>
	<tr>
      <td colspan="4">Identity Card No: </td>
    </tr>
	<tr>
      <td colspan="4">Designation : </td>
    </tr>
	<tr>
      <td colspan="4">Date : </td>
    </tr>
	<tr>
      <td colspan="4">Signature : </td>
    </tr>
	<tr>
      <td colspan="4">Handphone No : </td>
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
      <td colspan="4">CLAB<?php echo substr($ctr->ctr_clab_no, -6);?>/LT/<?php echo $this->session->userdata('username');?></td>
    </tr>
  </tbody>
<tbody><tr></tr>
</tbody>
</table>
</body>
</html>