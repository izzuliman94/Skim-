<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>SPIM-Handover Letter</title>
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
      <td colspan="4" rowspan="1">&nbsp;      </td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="9" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg">
      	<br /><br />
      <span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;">
		CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
		Level 2, Annexe, Menara Milenium,<br>
		No. 8, Jalan Damanlela<br>
		Pusat Bandar Damansara 50490 Kuala Lumpur.<br>
		Tel: 03-2095 9599 <br>
		Fax: 03-2095 9566 <br>
		E-mail: info@clab.com.my <br>
		Website: www.clab.com.my <br>
      </span></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">
        <br /></br /><br />
      	Rujukan Kami: CLAB/CS/<?php if($woRow->wo_num == '') echo $woRow->wo_id; else echo $woRow->wo_num;?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br />
        Tarikh: <?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    
    <tr>
      <td><br /><br /><b><?php echo $woRow->ctr_comp_name;?>(<?php echo $woRow->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $woRow->ctr_addr1;?>&nbsp;<?php echo $woRow->ctr_addr2;?>
    	  <br />
		  <?php echo $woRow->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $woRow->ctr_pcode;?>&nbsp;<?php echo $woRow->state_name;?>
      <br />
      Tel:<?php echo $woRow->ctr_telno;?>      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span style="text-align: right;">Faks:<?php echo $woRow->ctr_fax;?> </span></td>
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
      <td colspan="4">Tuan</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><strong><u>PENYERAHAN SURAT PERMOHONAN VISA DAN RUJUKAN, RESIT BAYARAN ASAL DAN  SURAT KE KEDUTAAN BESAR MALAYSIA</u></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Perkara di atas adalah dirujuk</p>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  <td colspan="4"><p>Kami, dari  Construction Labour Exchange Centre Berhad (CLAB), ingin menyerahkan sementara  dokumen yang tersebut diatas bagi &nbsp;<?php echo $woRow->wo_receivevisa_approve;?>&nbsp;orang pekerja <span class="print"><?php  echo $woRow->cty_desc;?></span> bagi proses kemasukan pekerja ke  Malaysia.</p>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Surat Permohonan Visa dan Rujukan dan resit  bayaran asal hendaklah diserahkan kembali kepada pihak kami semasa ketibaan  pekerja bagi urusan di Jabatan Imigresen Malaysia.</p>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Sila pastikan pekerja-pekerja di atas <strong><u>menjalankan pemeriksaan FOMEMA&nbsp; sebaik sahaja tiba di Malaysia</u></strong> dan paspot  pekerja-pekerja tersebut hendaklah diserahkan kepada CLAB setelah pemeriksaan dibuat.  Ini adalah untuk mengelakkan pihak tuan dari membayar <strong>compound RM1,000 dan denda SP (RM100/pekerja)</strong> jika pekerja-pekerja  di atas tidak mendapatkan PLKS dalam tempoh pas khas sebulan yang diberikan  oleh pihak Imigresen dari tarikh kemasukan pekerja. </p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Kerjasama  daripada pihak tuan amatlah kami hargai.<br>
      Sekian,  terima kasih.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Yang  benar,<br />
      CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD      </p>      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p><strong>Nazatul Akmar Bt Abdul Halim</strong><br>
            <strong>Timbalan Ketua Perkhidmatan Korporat</strong></p></td>
    </tr>
       <tr>
      <td colspan="4">---------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr bordercolor="#000000">
      <td colspan="4"><p><strong>Akuan Penerimaan</strong><br>
        Saya,&nbsp;  dengan ini mengaku pengesahan penerimaan dokumen yang disenaraikan di  atas bagi sektor pembinaan adalah seperti yang dilampirkan.</p>
        <p>Nama:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p>No Kad Pengenalan:</p>
        <p>Jawatan:</p>
      <p>Tarikh:</p></td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>Surat Cetakan Komputer , Tandatangan Tidak Diperlukan </i>      	</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>/<?php echo $this->session->userdata('username');?></i>      	</span></td>
    </tr>
  </tbody>
</table>
</body>
</html>
