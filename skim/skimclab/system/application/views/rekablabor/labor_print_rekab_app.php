<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Permohonan Rekalibrasi PATI</title>
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
      <td width="30%">&nbsp;</td>
      <td width="33%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td width="18%" rowspan=4 align=center valign=bottom class="print">
			<?php
			include "phpqrcode/qrlib.php";
			//QRcode::png('CLAB/RTK/'.date('y').'/'.substr($ctr->ctr_clab_no, -6), 'images/qr_ap.png');
			
			//QRcode::png('http://192.168.0.222/skimclab/index.php/contrekabLabour/labourDetails/26','images/qr_ap.png');
			QRcode::png(base_url().'index.php/contrekablabour/labourDetails'.'/'.$labor->wkr_id,'images/qr_ap.png');
			?>
			<img src="<?php echo base_url();?>images/qr_ap.png" >
			</td>
			
			</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br /><br />
      Rujukan: CLAB/RTK/<?php echo date('dmy');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Tarikh:<?php echo date('j F Y');?></td>
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
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><p>Kepada Pihak Yang Berkenaan </p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Tuan / Puan,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><h3><u>PENGESAHAN PENERIMAAN PERMOHONAN MENYERTAI PROGRAM REKALIBRASI TENAGA KERJA</u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Dengan segala hormatnya kami merujuk perkara di atas.
		<br />
		<br />
		2. Dengan ini disahkan bahawa penama di bawah merupakan PATI yang telah diterima daripada syarikat <?php echo $ctr->ctr_comp_name;?> . Berikut adalah maklumat lengkap syarikat dan PATI : <br /> <br />
      </p>
	  </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
     <td colspan="4">
      	<table width="80%" border="1" cellspacing="0">
      <td><b>Nama Pekerja :</b></td>
      <td colspan="3"><?php echo $labor->wkr_name;?></td>
    </tr>
    <tr>
      <td><b>No Passpot:</b></td>
      <td colspan="3"><?php echo $labor->wkr_passno;?></td>
    </tr>
    <tr>
      <td><b>Warganegara :</b></td>
      <td colspan="3"><?php echo $labor->cty_desc;?></td>
    </tr>
    <tr>
      <td><b>Nama Syarikat :</b></td>
      <td colspan="3"><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</td>
    </tr>
    <tr>
      <td><b>Alamat Majikan :</b></td>
      <td colspan="3"><?php echo $ctr->ctr_addr1;?>&nbsp;<?php echo $ctr->ctr_addr2;?>
        <br />
        <?php echo $ctr->ctr_addr3;?><br />
        <?php echo $ctr->ctr_pcode;?>&nbsp;<?php echo $ctr->state_name;?><br />
        Tel:<?php echo $ctr->ctr_telno;?></td>
    </tr>
    <tr>
      <td><strong>Pegawai Untuk Dihubungi :</strong></td>
      <td colspan="3"><?php echo $labor->officerincharge;?></td>
    </tr>
    <tr>
      <td><strong>No. Telefon Untuk  Dihubungi :</strong></td>
      <td colspan="3"><?php echo $labor->jimtel;?></td>
    </tr>
    <tr>
      <td><strong>Lokasi Pendaftaran  Imigresen :</strong></td>
      <td colspan="3"><?php echo $labor->regjim;?></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
      </tr></table>
    </tr>
    <tr>
     
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">3. Tempoh sah laku surat ini adalah 60 hari dari tarikh surat dikeluarkan.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p><strong>&ldquo;BINA  SEMPURNA&rdquo;</strong></p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yang Benar , <br />
			<strong>Ketua Eksekutif <br />
Construction Labour Exchange Centre Berhad
</strong> <br />
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
      <td colspan="4">Ketua Pegawai Eksekutif  <br />
	  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i>/<?php echo $this->session->userdata('username');?></i> </span></td>
      <td width="1%">    
    </tr>
    <tr>
       <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i>This letter is computer generated. No signature required.</i> </span></td>
    </tr>
  </tbody>
</table>
</body>
</html>
