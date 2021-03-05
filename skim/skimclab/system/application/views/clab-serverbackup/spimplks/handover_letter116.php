<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #333333;
}
.print {	font-size: 12px;
}
.style1 {
	font-size: 14px;
	font-weight: bold;
}
</style>
</head>
<body>
<!--table style="text-align: center;" width="90%" align="center" cellpadding="0" cellspacing="0" border="0"-->
<table style="text-align: justify; width: 90%;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'> No. Rujukan &nbsp;  :  &nbsp;    CLAB\CSP\HO\<?php echo date('y',strtotime($woRow->wo_withd_date)); ?>\<?php echo $woRow->wo_id ?></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Tarikh &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;<?php echo date('j F Y');?></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><b><?php echo $woRow->ctr_comp_name;?></b></td>
  </tr>
  <tr>
    <td colspan="3" align='left'><?php echo $woRow->ctr_addr1;?></td>
  </tr>
  <tr>
    <td colspan="3" align='left'><?php echo $woRow->ctr_addr2;?></td>
  </tr>
  <tr>
    <td colspan="3" align='left'><?php echo $woRow->ctr_pcode;?>&nbsp;<?php echo $woRow->ctr_addr3;?>&nbsp;<?php echo $woRow->state_name;?></td>
  </tr>
  <tr>
    <td width="62%" align='right'>&nbsp;</td>
  </tr>
  <tr>
    <td align='left'>Dear Sir / Madam.</td>
    <td width="15%" align='left'>&nbsp;</td>
    <td width="23%" align='left'><span class="style1">Courier / By Hand</span></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><span class="style1"><u>HANDOVER OF ORIGINAL PASSPORT</u></span></td>
  </tr>
  <tr>
    <td colspan="3" align="left" ></td>
  </tr>
  <tr>
    <td height="20" colspan="3" align="left" >The above matter refers.</td>
  </tr>
  <tr>
    <td height="22" colspan="3" align='left'><p>Enclosed is/are the passport(s) for the foreign construction workers and the details is/are as per listed below :</p></td>
  </tr>
  <tr>
    <td colspan="3" align='left'><table width="50%" border="1" align="center" cellpadding="2" cellspacing="0" >
      <tr>
        <td width="10%"><div align="center"><strong>BIL</strong></div></td>
        <td width="50%"><div align="center"><strong>NAMA</strong></div></td>
        <td width="19%"><div align="center"><strong>NO.PASSPORT</strong></div></td>
      </tr>
      <?php if($allFCLFiles->num_rows() == 0){ ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php }else{
	     $i = 1;
	    foreach($allFCLFiles->result() as $fcl){
      	 ?>
      <tr>
        <td align="center"><?php echo $i++;?></td>
        <td><?php echo $fcl->fcl_name;?></td>
        <td align="center"><?php echo $fcl->fcl_passno;?></td>
      </tr>
      <?php } }?>
  </table></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Kindly acknowledge receipt of the passport by completing acknowledge column below and return to CLAB accordingly.</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Thank You.</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Yours Sincerely,</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><strong>Nazatul Akmar Bt Abdul Halim</strong></td>
  </tr>
  <tr>
    <td colspan="3" align='left'><strong>Deputy Head Of Corporate Services Division</strong></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp; ________________________________________________________________________________________________</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;&nbsp;<strong>Acknowledgement </strong></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>I,hereby acknowledge receipt the above passports.</td>
  </tr>
  <tr>
    <td align='left'>Name:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Identity Card No:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Designation:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Date:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Signature:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Handphone No:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><i><?php echo $woRow->wo_clab_no;?>/EXT/<?php echo $this->session->userdata('username');?>-<?php echo $woRow->wo_personincharge?></i></td>
  </tr>
</table>
</body>
</html>