<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Pengesahan Pekerja</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
    font-family:"Century Gothic";
	font-size: 12px;
	color: #333333;
}
.print {font-size: 12px;
}
.style1 {
	font-size: 9px;
	font-style: italic;
	color: #666666;
}
.style2 {font-family: Arial, Helvetica, sans-serif}
</style>
</head>
<body>
<table width="618" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: left; width: 616px;">
  <tbody>
    
    <tr>
      <td colspan="2" rowspan="1">Rujukan Kami: CLAB/CS/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="5" valign="top" width="18%"><span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><img src="<?php echo base_url();?>images/logoLetter.jpg"> <br />
          <br />
CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
Level 2, Annexe, Menara Milenium,<br>
No. 8, Jalan Damanlela<br>
Pusat Bandar Damansara 50490 Kuala Lumpur.<br>
Tel: 03-2095 9599 <br>
Fax: 03-2095 9566 <br>
E-mail: info@clab.com.my <br>
Website: www.clab.com.my </span></td>
    </tr>
    
    <tr>
      <td colspan="2" rowspan="1"><br />
      Tarikh:<?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td width="42%"><br /><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td width="22%">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?> <?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?> <?php echo $ctr->state_name;?>
      <br />
      Tel:<?php echo $ctr->ctr_telno;?>      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
     
    
    <tr>
      <td colspan="4"><div align="right"><span style="text-align: right;"><strong>Serahan Tangan</strong></span></div></td>
    </tr>
    <tr>
      <td colspan="4">Tuan / Puan,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><h3><strong><u>PENYERAHAN SEMENTARA PASSPORT  PEKERJA ASING BAGI SEKTOR PEMBINAAN.</u></strong></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td height="25" colspan="4"><p align="justify">Dengan segala hormatnya perkara diatas adalah dirujuk.<br />	  
        </p>      </td>
    </tr>
    <tr>
      <td height="93" colspan="4">
      	<p align="justify">Kami, dari Construction Labour Exchange Centre Berhad (CLAB), ingin  menyerahkan sementara passport bagi <span class="print" style="border:none;">
        <input align="centre" type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:30px; text-align:left;" value="" />
        </span>orang pekerja untuk simpanan pihak  tuan. Passport hendaklah diserahkan kembali kepada pihak  kami sebelum urusan di Jabatan Imigresen dapat di jalankan. Senarai pekerja  adalah seperti yang dilampirkan.<br />      
   	    </p>      	</td>
    </tr>
    <tr>
      <td height="66" colspan="4">
      	<p align="justify">Kerjasama  daripada pihak tuan amatlah kami hargai.<br>
Sekian,  terima kasih.        </p>      	</td>
    </tr>
    <tr>
      <td colspan="4">
      	<p align="justify">Yang  benar,<br />
          <strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong>        </p>      	</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify"><br />      
        </p>      	</td>
    </tr>
    <tr>
      <td colspan="4"><strong>MOHD ROZAINI AB RAHMAN</strong><br>
        <strong> Ketua Jabatan Sokongan Korporat</strong></td>
    </tr>
    <tr>
      <td colspan="4"><span class="style1"><span class="style2">This letter is computer generated. No signature required</span>.</span></td>
    </tr>
    <tr>
      <td colspan="4">---------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    </tr>
    <tr>
      <td height="68" colspan="4"><p><strong>Akuan Penerimaan</strong><br>
        Saya,&nbsp;  dengan ini mengaku pengesahan penerimaan dokumen yang disenaraikan di  atas bagi sektor pembinaan adalah seperti yang dilampirkan.</p>      </td>
    </tr>
    <tr>
      <td height="32" colspan="4">Nama:</td>
    </tr>
    <tr>
      <td height="35" colspan="4">Telefon Untuk Dihubungi:</td>
    </tr>
    <tr>
      <td height="36" colspan="4">No Kad Pengenalan:</td>
    </tr>
    <tr>
      <td height="38" colspan="4">Jawatan:</td>
    </tr>
    <tr>
      <td height="41" colspan="4">Tarikh:</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"><i><i>/</i><?php echo $this->session->userdata('username');?></i></span></td>
    </tr>
  </tbody>
</table>
</body>
</html>
