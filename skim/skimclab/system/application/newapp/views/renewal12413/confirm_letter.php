<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
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
<table style="text-align: center;" width="70%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td colspan="2" align='left'>No. Rujukan : CLAB\CSP\HO\<?php echo date('y',strtotime($woRow->wo_withd_date)); ?>\<?php echo $woRow->wo_id ?></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Tarikh :<?php echo date('j F Y');?></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><b><?php echo $woRow->ctr_comp_name;?></b></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_addr1;?></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_addr2;?></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_pcode;?>&nbsp;<?php echo $woRow->ctr_addr3;?>&nbsp;<?php echo $woRow->state_name;?></td>	
</tr>
<tr>
    <td align='right'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Tuan/Puan,</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><B>PENGESAHAN PEKERJA ASING BINAAN</B></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Dengan segala hormatnya perkara di atas adalah dirujuk.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Dimaklumkan bahawa pada 
      <input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" />
    , pihak kami telah menyerahkan bilangan pekerja asing binaan warganegara 
      <input type="text" name="txtfield2" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" />
di bawah pengurusan dan penyeliaan pihak tuan iaitu :</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>
	<table width="60%" align="center" border="1" >
	<tr>
	    <td width="10%"><div align="center"><strong>BIL</strong></div></td>
		<td><div align="center"><strong>NAMA</strong></div></td>
		<td width="20%"><div align="center"><strong>NO.PASSPORT</strong></div></td>
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
		<td><?php echo $fcl->wkr_name;?></td>
		<td align="center"><?php echo $fcl->fcl_passno;?></td>
	    </tr>
	 <?php } }?>
	</table>	</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Berikutan itu, dimaklumkan bahawa secara rasminya pekerja-pekerja tersebut adalah di bawah pengurusan dan penyeliaan <b><?php echo $woRow->ctr_comp_name;?></b> untuk menjalankan projek-projek pembinaan di seluruh</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Semenanjung Malaysia bermula 
      <input type="text" name="txtfield3" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" />
hingga 
<input type="text" name="txtfield4" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" />
.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Yang benar,</td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>ABDUL RAFIK B. ABD RAJIS</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>Ketua Perkhidmatan Korporat</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>s.k Pengarah Bahagian Pekerja Asing</td>	
</tr>
<tr>
    <td colspan="2" align='left'>   Jabatan Imigresen Malaysia, Putrajaya</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>   Unit Pembangunan Personel Binaan</td>	
</tr>
<tr>
    <td colspan="2" align='left'>   Bahagian Kad Hijau</td>	
</tr>
<tr>
    <td colspan="2" align='left'>   Lembaga Pembangunan Industri Pembinaan Malaysia (CIDB)</td>	
</tr>

<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
</table>
</body>
</html>