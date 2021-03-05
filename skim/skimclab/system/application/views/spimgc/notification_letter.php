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
	
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
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
<table style="text-align: left; width: 90%;" align="center" border="0" cellpadding="0" cellspacing="0">
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
    <td colspan="3" align='left'>&nbsp;</td>
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
    <td colspan="3" align='left'> No. Rujukan &nbsp;  :  &nbsp;    CLAB\GC\HO\<?php echo date('y',strtotime($woRow->wo_date)); ?>\<?php echo $woRow->wo_id ?></td>
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
    <td align='left'>Pelanggan Yang Dihormati,</td>
    <td width="15%" align='left'>&nbsp;</td>
    <td width="23%" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><u>KAD PERSONAL BINAAN CIDB MALAYSIA</u></td>
  </tr>
  <tr>
    <td colspan="3" align="left" ></td>
  </tr>
  <tr>
    <td colspan="3" align="left" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" >Merujuk kepada perkara diatas dimaklumkan bahawa Kad Personel Binaan CIDB Malaysia di bawah selian tuan/puan telah siap dicetak. </td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" >2. Sila hadir ke kaunter CLAB Kuala Lumpur untuk mengambil kad berkenaan dalam tempoh empat belas (14) hari daripada tarikh pengeluaran surat ini. </td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
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
    <td colspan="3" align='left'>3. Pihak tuan/puan dikehendaki membawa dokumen seperti di bawah semasa pengambilan Kad Personel Binaan CIDB: </td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
   <td colspan="3" align='left'><table width="50%" border="0" align="center" cellpadding="2" cellspacing="0" >
      <tr>
        <td width="10%"><div align="center">a)</div></td>
        <td width="50%"><div align="left">Surat wakil syarikat</div></td>
      </tr>
	  <tr>
        <td width="10%"><div align="center">b)</div></td>
        <td width="50%"><div align="left">Penyata KWSP 3 bulan terkini</div></td>
      </tr>
	  <tr>
        <td width="10%"><div align="center">c)</div></td>
        <td width="50%"><div align="left">Salinan KP</div></td>
      </tr>
	  </table></td>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Sila hubungi pihak kami di talian bernombor 03-20959599 sambungan 174/177/178 untuk sebarang pertanyaan. </td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Sekian, Terima Kasih</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr
  <tr>
    <td colspan="3" align='left'><i><?php echo $woRow->wo_clab_no;?>/GC/<?php echo $this->session->userdata('username');?>-<?php echo $woRow->wo_personincharge?></i></td>
  </tr>

</table>
</body>
</html>