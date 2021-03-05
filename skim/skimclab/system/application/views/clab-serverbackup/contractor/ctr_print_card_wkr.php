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
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
.style1 {
	font-size: 9px;
	font-style: italic;
}
</style>
</head>
<body>
<table width="90" border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: justify; width: 600px;">
  <tbody>
    <tr>
      <td width="42%" height="67">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="12" valign="top" width="18%">&nbsp;</td>
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
      <td colspan="2" rowspan="1"><br />
      Ref: CLAB/ICT/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br />Date:<?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      
      <td>&nbsp;</td>
    </tr>
   
    <tr>
      <td><br /><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
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
      <td colspan="3">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_dir_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
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
      <td colspan="4"><h3><u>PENYERAHAN I-KAD JABATAN IMIGRESEN MALAYSIA</u></h3></td>
    </tr>
    <tr>
      <td height="22" colspan="4"><p align="justify">Dengan segala hormatnya perkara diatas adalah dirujuk. </p>        </td>
    </tr>
    <tr>
      <td height="81" colspan="4"><p>Dilampirkan I-Kad dari Jabatan  Imigresen Malaysia untuk simpanan pihak tuan. Kehilangan I-Kad adalah tanggungjawab majikan.</p>
        <p><br>
      </p></td>
    </tr>
    <tr>
      <td colspan="4">
      	<p align="justify"> Sekian, Terima Kasih .</p>
      	<p><br />
        </p></td>
    </tr>
    <tr>
      <td colspan="4"><p>Yang Benar,</p>
        <p><br />
          <strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">ABDUL RAFIK BIN ABDUL RAJIS <br>
 Ketua  Eksekutif</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p>&nbsp;</p></td>
    </tr>
    <tr>
      <td colspan="4"><span class="style1">This letter is computer generated. No signature required.</span></td>
    </tr>
    <tr>
      <td colspan="4"><i><?php echo $this->session->userdata('username');?></i></td>
    </tr>
  </tbody>
</table>
</body>
</html>
