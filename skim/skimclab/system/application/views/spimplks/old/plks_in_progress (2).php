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
<table width="90%" align="center">
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

    <td width="11%">No. Rujukan</td>
	<td width="89%">:CLAB\CSP\PP\<?php echo date('y',strtotime($woRow->wo_withd_date)); ?>\<?php echo $woRow->wo_id ?></td>
</tr> 
<tr>
    <td colspan="2">&nbsp;</td>
</tr> 
<tr>
    <td>Tarikh</td>
	<td>:    <?php echo date('j F Y');?></td>
</tr> 
<tr>
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="2"><b><?php echo $woRow->ctr_comp_name;?></b></td>
</tr>
<tr>
    <td colspan="2"><?php echo $woRow->ctr_addr1; ?></td>
</tr>
<tr>
    <td colspan="2"><?php echo $woRow->ctr_addr2; ?></td>
</tr>
<tr>
    <td colspan="2"><?php echo $woRow->ctr_pcode; ?><?php echo $woRow->ctr_addr3; ?></td>
</tr>
<tr>
  <td colspan="2"><b><?php echo $woRow->state_name; ?></b></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">Tuan,</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><U><B><font size="+0.5">PERMOHONAN PAS LANJUTAN KERJA SEMENTARA (PLKS)</font></B></U></td>
</tr>

<tr>
  <td colspan="2"><p align="justify">Merujuk perkara di atas,  pihak kami memaklumkan bahawa passport  pekerja  di bawah penyeliaan  pihak tuan, masih dalam proses lanjutan di Jabatan Imigresen Malaysia, Kuala Lumpur bagi tujuan penampalan PLKS. Berikut adalah senarai  nama pekerja:-</p></td>
</tr>

<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2">
  <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td width="5%" align="center">Bil.</td>
	  <td width="60%" align="center">Nama</td>
		<td width="35%" align="center">No.Passport</td>	  
	  <td width="60%" align="center">Warganegara</td>
	  
  </tr>
  <?php 

if($allFCLFiles->num_rows() == 0){ 

?>
  <tr>
      <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
  </tr>
<?php
}else{
$i = 1;
foreach($allFCLFiles->result() as $lampfcl){
?>
 <tr>
      <td align="center"><?php echo $i++; ?></td>
    <td><?php echo $lampfcl->fcl_name; ?></td>
    <td align="center"><?php echo $lampfcl->fcl_newpassno; ?></td>
	<td align="center"><?php echo $lampfcl->fcl_nationality; ?></td>    
    
  </tr>
<?php 
}}
?>  
  </table>
  </td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2">Sekian, harap maklum. </td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="4">Yang benar,</td>
</tr>
<tr>
  <td colspan="2"><strong>CONSTRUCTION LABOUR  EXCHANGE CENTRE BERHAD</strong></td>
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
  <td colspan="2"><strong>Rohaidah Bt Sapuan</strong></td>
</tr>
<tr>
  <td colspan="2">Sr. Eksekutif Jabatan Perkhidmatan Korporat</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2"><font size="-6">CLAB/EXT/<i><?php echo $this->session->userdata('username');?></i></font></td>
</tr>
</table>
</body>
</html>