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
<table width="580" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: justify; width: 550px;">
  <tbody>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;      </td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="11" valign="top" width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">
        <br /></br /><br />
      	Rujukan Kami: CLAB/VDR/WS/<?php if($woRow->wo_num == '') echo $woRow->wo_id; else echo $woRow->wo_num;?></td>
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
      <td><br /><br />
      <strong>Pengarah Bahagian Pekerja Asing</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Jabatan  Immigresen Malaysia<br />
      Ibu Pejabat  Jabatan Imigresen Malaysia</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Kementerian Hal  Ehwal Dalam Negeri<br />
      Tingkat 1-7,  (Podium) Blok 2G4</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Precint 2, Pusat  Pentadbiran Kerajaan Persekutuan</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     
     <tr>
      <td colspan="3">62550 Putrajaya</td>
    </tr>
    <tr>
      <td colspan="4"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="4">Tuan</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><p><u><strong>WAKIL SYARIKAT - CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></u></p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Dengan segala  hormatnya kami merujuk perkara di atas.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  <td height="45" colspan="4"><p>Kami mewakilkan  Ikmal Fahmi B. Mohd Zuhairi untuk segala urusan yang berkaitan dengan  dokumentasi pekerja asing bagi pihak Construction Labour Exchange Centre Berhad  (I/c no: 950204-03-5635).</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>Kami berharap  agar permohonan kami mendapat pertimbangan yang sewajarnya daripada pihak tuan.</p></td>
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
      <td colspan="4"><p><strong>ABDUL  RAFIK ABDUL RAJIS</strong><br>
Ketua Eksekutif</p></td>
    </tr>
       <tr>
      <td colspan="4">&nbsp;</td>
  </tr>
    <tr bordercolor="#000000">
      <td colspan="4"><p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td colspan="4"><p>s/k&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $woRow->ctr_comp_name;?></b><br>
         Fail         :</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">      	</span>
        <p><em><?php echo $woRow->wo_clab_no;?>/
          <?php if($woRow->wo_num == '') echo $woRow->wo_id; else echo $woRow->wo_num;?>
        /</em><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"><i><?php echo $this->session->userdata('username');?></i>      	</span></p>
        </td>
  </tr>
  </tbody>
</table>
</body>
</html>
