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
<table style="text-align: center;" width="90%" align="center" cellpadding="0" cellspacing="0" border="0">
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
  <td colspan="2" align='left'>&nbsp;</td>
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
  <td colspan="2" align='left'>&nbsp;</td>
</tr>
<tr>
  <td colspan="2" align='left'>&nbsp;</td>
</tr>
<tr>
    <td colspan="2" align='left'>No. Rujukan &nbsp;  :  &nbsp;    CLAB\EXT\SP\<?php echo date('y',strtotime($woRow->wo_date)); ?>\<?php echo $woRow->wo_id ?></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Tarikh &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;   <?php echo date('j F Y');?></td>	
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
    <td colspan="2" align='left'><span class="style1"><B><u>PENGESAHAN PEKERJA ASING BINAAN</u></B></td>	
</tr>
<tr>
    <td colspan="2" align="left" ></td>
  </tr>
<tr>
    <td colspan="2"><p align="left" >Dengan segala hormatnya perkara di atas adalah dirujuk.</td>	
</tr>

<tr>
    <td colspan="2"><p align="justify" >Dimaklumkan bahawa pada 
     <!--input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" /-->
      <?php echo date('d-m-Y');?>, pihak kami telah menyerahkan bilangan pekerja asing binaan  
      
      <!--input type="text" name="txtfield2" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:160px; text-align:center;" value="&lt;type here&gt;" /-->
di bawah pengurusan dan penyeliaan pihak tuan iaitu :</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>

<tr>
    <td colspan="2" align='left'>
	<table width="83%" border="1" align="center" cellpadding="2" cellspacing="0" >
	<tr>
	    <th width="5%"><div align="center"><strong>BIL</strong></div></th>
		<th width="30%"><div align="center"><strong>NAMA</strong></div></th>
		<th width="10%"><div align="center"><strong>NO.PASSPORT</strong></div></th>
	    <th width="10%"><div align="center"> <strong>WARGANEGARA</strong></div></th>
		<th width="25%"><div align="center"><strong>TARIKH SAH BEKERJA</strong></div></th>
		</tr>
	<?php if($allFCLFiles->num_rows() == 0){ ?>
	<tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
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
		<td align="center"><?php echo $fcl->fcl_newpassno; ?></td>
		<td align="center"><?php echo $fcl->fcl_nationality; ?></td>
		<td align="center"><?php echo date('d-m-Y',strtotime($fcl->fcl_plksdate1))." ~ ". date('d-m-Y',strtotime($fcl->fcl_plksdate2)); ?></td>
		</tr>
	 <?php } }?>
	</table>	</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2"><p align="justify" >Berikutan itu, dimaklumkan bahawa secara rasminya pekerja-pekerja tersebut adalah di bawah pengurusan dan penyeliaan <b><?php echo $woRow->ctr_comp_name;?></b> untuk menjalankan projek-projek pembinaan dan penyelenggaraan di seluruh Semenanjung Malaysia.</td>	
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
    <td colspan="2" align='left'><strong>Rohaidah Bt Sapuan </strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>Pengurus Jabatan Operasi</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp; &nbsp; &nbsp; s.k Pengarah Bahagian Pekerja Asing</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp; &nbsp; &nbsp;   Jabatan Imigresen Malaysia, Putrajaya</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'> &nbsp; &nbsp; &nbsp; Unit Pendaftaran Personel Binaan</td>	
</tr>
<tr>
    <td colspan="2" align='left'> &nbsp; &nbsp; &nbsp; Lembaga Pembangunan Industri Pembinaan Malaysia (CIDB)</td>	
</tr>
<tr>
    <td colspan="2" align='left'> &nbsp; &nbsp; &nbsp;</td>	
</tr>

<tr>
  <td colspan="2" align='left'>&nbsp;</td>
</tr>
<tr>
    <td colspan="2" align='left'><i><?php echo $woRow->wo_clab_no;?>/EXT/<?php echo $this->session->userdata('username');?>-<?php echo $woRow->wo_personincharge?></i></td>	
</tr>
</table>
</body>
</html>