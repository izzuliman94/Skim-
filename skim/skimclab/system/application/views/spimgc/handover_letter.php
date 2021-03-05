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
    <td align='left'>Tuan / Puan,</td>
    <td width="15%" align='left'>&nbsp;</td>
    <td width="23%" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><u>PENYERAHAN KAD PERSONEL BINAAN CIDB MALAYSIA</u></td>
  </tr>
  <tr>
    <td colspan="3" align="left" ></td>
  </tr>
  <tr>
    <td colspan="3" align="left" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="left" >Dengan segala hormatnya perkara diatas adalah dirujuk. Butir-butir pekerja adalah seperti berikut ;</td>
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
    <td colspan="3" align='left'>Dilampirkan Kad Personel Binaan dari CIDB Malaysia untuk simpanan pihak tuan. Kehilangan kad ini adalah tanggungjawab majikan.</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Sekian, Terima Kasih .</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Yang Benar,</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></td>
  </tr>
  <tr>
  
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
  <td colspan="2"><i><font size="1">Dicetak</font><font size="1"> Melalui Sistem, Tandatangan tidak diperlukan</font></i></td>
</tr>
  <tr>
    <td colspan="3" align='left'><p>&nbsp;</p></td>
   </tr>

  <tr>
    <td colspan="3" align='left'>&nbsp; _________________________________________________________________________________________________</td>
  </tr>
  <tr>
    <td colspan="3" align='left'><strong>Akuan Penerimaan</strong></td>
  </tr>
  <tr>
    <td colspan="3" align='left'>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Saya,&nbsp;  dengan ini mengaku pengesahan penerimaan dokumen yang disenaraikan di  atas bagi sektor pembinaan adalah seperti yang dilampirkan.</td>
  </tr>
  <tr>
    <td align='left'>Nama:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>No Kad Pengenalan:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Jawatan:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Tarikh:</td>
  </tr>
  <tr>
    <td colspan="3" align='left'>Telefon No:</td>
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
    <td colspan="3" align='left'><i><?php echo $woRow->wo_clab_no;?>/GC/<?php echo $this->session->userdata('username');?>-<?php echo $woRow->wo_personincharge?></i></td>
  </tr>

</table>
</body>
</html>