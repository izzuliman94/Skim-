<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
.style1 {
	text-align: left;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	height:30px;
	
}
.head1 {
	font-family: verdana;
	font-weight: bold;
	font-size: large;
	text-align: center;
}
.head2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: light;
	font-size: medium;
	text-align: center;
}
</style>
</head>
<body>
<table style="text-align: left;" width="650px" align="center" cellpadding="5" cellspacing="5" border="0">
<tr>
	<td colspan="2" align="center" style="height: 97px"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></td>
</tr>
<tr>
    <td colspan="2" class="head1" >Construction Labour Exchange Centre Berhad</td>
</tr>
<tr>
    <td colspan="2" class="head2" >Surat Akuan Penerimaan</td>
</tr>

<tr>
    <td colspan="2">&nbsp;</td>
</tr>

<tr>
    <td colspan="2">
    	<TABLE  border="1" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="80000">
    		<tr>
    			<td>
	    <table width="100%">
	    	<tr>
			    <td width="34%" class="style1" >&nbsp;Tarikh / Masa&nbsp;</td>
			    <td width="23%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">:&nbsp;<?php echo date('d-m-Y G:i:s') ?></td>
			    <td width="15%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">Bil Pekerja </td>
			    <td width="28%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">: <?php echo $woRow->wo_fcl_total;?>&nbsp; <?php echo $woRow->cty_desc;?></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;Workorder No</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtwono" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_num?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;Nama Syarikat</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtsyarikat" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->ctr_comp_name?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;Nama Untuk Dihubungi</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtmajikan" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->ctr_contact_name?>" readonly /></td>
			</tr>
			
			<tr>
			    <td height="30px" class="style1">&nbsp;Nama Penghantar	</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txthantar" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_name?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;No. KP Penghantar</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtichantar" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_ic?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;No. Telefon Penghantar</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtphone" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_contact?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style1">&nbsp;Pegawai Bertanggungjawab</td>
			    <td colspan="3">:&nbsp;<input type="text" name="txtbil" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_attn_officer?>" /></td>
			</tr>
			<tr>
				<td height="30px" class="style1">&nbsp;No Resit Pembayaran</td>
			    <td colspan="3">:
			      <input type="text" name="txtbil2" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->pay_refno;?>" /></td>
			</tr>
			
			<tr>
			    <td colspan="4" height="30px" class="style1">&nbsp;Disclaimer - penerimaan dokumen ini tidak bermaksud permohonan akan diluluskan.<br />&nbsp;Keputusan akan diketahui selepas 14 hari waktu berkerja.</td>
			</tr>
			
			<tr>
			    <td colspan="4" height="30px" class="style1">&nbsp;</td>
			</tr>
	    </table>	    </td>
	    </tr>
	    </table>    </td>
</tr>
<tr><td style="height: 34px"></td></tr>
<tr><td class="style1">Terima Kasih kerana berurusan dengan kami.</td></tr>
<tr><td class="style1">&nbsp;Cetakan berkomputer, tidak memerlukan tandatangan.</td></tr>
<tr><td style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #B09090;">(Maklumkan kepada kami no. rujukan apabila berurusan dengan kami)</td></tr>
<tr>
  <td style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #B09090;">&nbsp;</td>
</tr>
<tr>
  <td style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #B09090;"><p>http://www.clab.com.my</p>
    <p>facebook: https://www.facebook.com/clabmalaysia</p>
    <p>instagram : clabmalaysia</p></td>
</tr>
</table>
</body>
</html>
