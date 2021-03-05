<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8px;
	color: #333333;
}
</style>
</head>
<table style="text-align: left;" width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td align='center' colspan="4"><b><u>Borang Bayaran</u></b></td>
</tr>
<tr>
    <td align='center' colspan="4">&nbsp;</td>
</tr>
<tr>
    <td>1.Nama Syarikat / Majikan :</td>
    <td><u><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></u></td>
    <td>Rujukan Fail:</td>
    <td><input type="text" style="width:200px; text-align:left;border:thin;font-size:10px" value="" /></td>
</tr>
<tr  height="25">
    <td>2.No Pendaftaran Syarikat :</td>
    <td><strong>634393-W</strong></td>
    <td>Jumlah Pekerja:</td>
    <td>&nbsp;<?php echo $TotalFCL->cnt ?></td>
</tr>
<tr  height="25">
    <td>3.Alamat Terkini Syarikat / Majikan :</td>
    <td><strong>LEVEL 2, ANNEXE BLOCK, MENARA MILENIUM , NO 8, JLN DAMANLELA, </strong></td>
    <td>Sektor:</td>
    <td><u><strong>Pembinaan</strong></u></td>
</tr>
<tr  >
    <td>&nbsp;</td>
    <td><strong>BUKIT DAMANSARA 50490 KUALA LUMPUR</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
<br />
<table style="text-align: left;" width="100%" align="center" cellpadding="0" cellspacing="0" border="1">
<tr align="Center">
    <td rowspan="2" width="5">Bil</td>
    <td rowspan="2" width="15%">Nama Pekerja <br />(Mestilah ditulis dengan jelas dalam huruf besar)</td>
    <td rowspan="2" width="5">W/N</td>
    <td rowspan="2" width="5%">No Pasport</td>
    <td rowspan="2">Tarikh Sahlaku Pasport<br />(Pastikan melebihi 1 tahun)</td>
    <td rowspan="2">No. Resit Wang Cagaran / No. BG<br />(Pastikan tarikh sahlaku melebihi 18 bulan)</td>
    <td rowspan="2" width="15%">Tempoh Sahlaku PL(KS) Dalam Paspot</td>
    <td rowspan="2" width="15%">Permohonan Lanjutan PL(KS) Bagi Tahun ke</td>
    <td colspan="6" width="20%">Bayaran</td>
</tr>
<tr align="Center">
  <td width="5%" height="12">Levi</td>
  <td width="5%">PL(KS)</td>
  <td width="5%">Visa</td>
  <td width="5%">Proses</td>
  <td width="5%">Pas Khas</td>
  <td width="5%">Jumlah</td>
</tr>
<?php 

if($allFCLlampiran->num_rows() == 0){ 

?>
<tr align="Center">
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<?php
}else{
$i = 1;
$totalall = '0.00';
$total = '0.00';
$total_levi = 0.00;
$total_plks = 0.00;
$total_visa = 0.00;
$total_process = 0.00;
$total_pass = 0.00;
foreach($allFCLlampiran->result() as $lampfcl){

//if($lampfcl->fcl_pass == '1'){ 
//  $pass = "100.00";
//  }else{
// $pass = "0.00";
// } 

if($lampfcl->fcl_wo_type == ''){ //takde value apa-apa
$pass = "0.00";
}else{
//$pass = "0.00";
} 
 
if($lampfcl->fcl_wo_type == '1'){ //sp
  $pass = "100.00";
  $lampfcl->cty_levi = "0.00";
  $lampfcl->cty_plks = "0.00";
  $lampfcl->cty_visa = "0.00";
  $lampfcl->cty_process = "0.00";
  }else{
// $pass = "0.00";
 } 
 
  if($lampfcl->fcl_wo_type == '2'){ //com
  $pass = "0.00";
  $lampfcl->cty_levi = "0.00";
   $lampfcl->cty_plks = "0.00";
  $lampfcl->cty_visa = "0.00";
  $lampfcl->cty_process = "0.00";
  }else{
// $pass = "0.00";
 } 
 
   if($lampfcl->fcl_wo_type == '3'){ //compund
 $pass = "0.00";
  $lampfcl->cty_levi = "0.00";
   $lampfcl->cty_plks = "0.00";
   $lampfcl->cty_visa = "0.00";
  $lampfcl->cty_process = "0.00";
   }else{
 // $pass = "0.00";
  } 
 
  if($lampfcl->fcl_wo_type == '4'){ //sp & com
 $pass = "100.00";
  $lampfcl->cty_levi = "0.00";
 $lampfcl->cty_plks = "0.00";
  $lampfcl->cty_visa = "0.00";
  $lampfcl->cty_process = "0.00";
 }else{
// $pass = "0.00";
 } 
 
   if($lampfcl->fcl_wo_type == '5'){ //sp & plks
   $pass = "100.00";

  }else{
 //$pass = "0.00";
 } 
 
   if($lampfcl->fcl_wo_type == '6'){ //sp & com & compound
  $pass = "100.00";
  $lampfcl->cty_levi = "0.00";
$lampfcl->cty_plks = "0.00";
 $lampfcl->cty_visa = "0.00";
$lampfcl->cty_process = "0.00";
 }else{
 //$pass = "0.00";
 } 
 
   if($lampfcl->fcl_wo_type == '7'){ //sp & plks & compound
  $pass = "100.00";

  }else{
//$pass = "0.00";
} 
 
   if($lampfcl->fcl_wo_type == '8'){ //Transfer Endorsement & Com
 $pass = "0.00";
 $lampfcl->cty_levi = "0.00";
  }else{
 // $pass = "0.00";
 } 
 
      if($lampfcl->fcl_wo_type == '9'){ //plks & Transfer Endorsement Passport/Permit Hidup
  $pass = "0.00";
  $lampfcl->cty_levi = "0.00";

  }else{
//$pass = "0.00";
 } 
 
       if($lampfcl->fcl_wo_type == '10'){ //plks & Transfer Endorsement Passport/Permit Nak Mati
  $pass = "0.00";

  }else{
//$pass = "0.00";
 } 
 
$total = $lampfcl->cty_levi + $lampfcl->cty_plks + $lampfcl->cty_visa + $lampfcl->cty_process + $pass;	
$totalall = $totalall + $total;
$total_levi = $total_levi + $lampfcl->cty_levi;
$total_plks = $total_plks + $lampfcl->cty_plks;
$total_visa = $total_visa + $lampfcl->cty_visa;
$total_process = $total_process + $lampfcl->cty_process;
$total_pass = $total_pass + $pass;
?>
<tr align="Center">
  <td><?php echo $i++; ?></td>
  <td><?php echo $lampfcl->fcl_name; ?></td>
  <td><?php echo $lampfcl->nat_desc; ?></td>
  <td><?php echo $lampfcl->fcl_passno; ?></td>
  <td><?php echo date('d M Y',strtotime($lampfcl->fcl_passexp)); ?></td>
  <td>&nbsp;</td>
  <td><?php echo  date('d M Y',strtotime("-1 year",strtotime($lampfcl->wkr_permitexp)))." - ". date('d M Y',strtotime($lampfcl->wkr_permitexp)); ?></td>
  <td><?php echo $lampfcl->fcl_year_renewal;?></td>
  <td><?php echo $lampfcl->cty_levi; ?></td>
  <td><?php echo $lampfcl->cty_plks; ?></td>
  <td><?php echo $lampfcl->cty_visa; ?></td>
  <td><?php echo $lampfcl->cty_process; ?></td>
  <td><?php echo $pass; ?></td>
  <td><?php echo number_format($total,2); ?></td>
</tr>

<?php 
}}
?>
<tr align="Center">
  <td colspan="8"><strong>Jumlah</strong></td>
  <td><?php echo number_format($total_levi,2);?></td>
  <td><?php echo number_format($total_plks,2);?></td>
  <td><?php echo number_format($total_visa,2);?></td>
  <td><?php echo number_format($total_process,2);?></td>
  <td><?php echo number_format($total_pass,2);?></td>
  <td><?php echo number_format($totalall,2);?></td>
</tr>
</table>
<br />
<table width="100%">
<tr>
   <td colspan="4">Saya <b><?php echo $lampfcl->wo_personincharge; ?></b>, dengan ini mengaku bahawa butir-butir yang diberi dalam borang ini adalah benar dan faham jika maklumat ini tidak betul atau tidak lengkap ianya akan ditolak.</td>
</tr>
<tr>
   <td width="25%">&nbsp;</td>
   <td width="25%">&nbsp;</td>
   <td width="25%">&nbsp;</td>
   <td width="25%">&nbsp;</td>
</tr>
<tr>
   <td width="25%" align="center"><?php echo date("d M Y")?></td>
   <td width="25%">&nbsp;</td>
   <td width="25%">&nbsp;</td>
   <td width="25%">&nbsp;</td>
</tr>
<tr align="left">
   <td>__________________________________________________________________________</td>
   <td>&nbsp;</td>
   <td>__________________________________________________________________________</td>
   <td>&nbsp;</td>
</tr>
<tr align="center">
   <td>(Tarikh)</td>
   <td>&nbsp;</td>
   <td>(Tandatangan)</td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>No.Resit Wang Cagaran:
     <input type="text" style="width:150px; text-align:left;border:thin;font-size:10px" value="" /></td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>No.Resit Levi / PLKS / Proses / Rev / P : 
     <input type="text" style="width:150px; text-align:left;border:thin;font-size:10px" value="" /></td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td colspan="4">Permohonan Diterima/Ditolak</td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr align="left">
   <td>__________________________________________________________________________</td>
   <td>&nbsp;</td>
   <td>__________________________________________________________________________</td>
   <td>&nbsp;</td>
</tr>
<tr align="center">
  <td>(Tandatangan Pengawai Imigresen)</td>
  <td>&nbsp;</td>
  <td>(Tandatangan Juruwang)</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  <td>&nbsp;</td>
  <td>Nama Company : <?php echo $lampiran->ctr_comp_name?></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  <td>&nbsp;</td>
  <td>Workorder No : <?php echo $lampiran->wo_num?></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  <td>&nbsp;</td>
  <td>OR No : <?php echo $lampiran->pay_refno?></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  <td>&nbsp;</td>
  <td>PIC : <?php echo $lampiran->wo_personincharge ?></td>
</tr>

</table>
