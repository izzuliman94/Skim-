<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Local Transfer - Permohonan</title>
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
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="10" valign="top" width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br /><br />Ref: CLAB/LTA/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Date:<?php echo date('j F Y');?></td>
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
      <td><br /><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?>&nbsp;<?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?>&nbsp;<?php echo $ctr->state_name;?>
      <br />
      Tel:<?php echo $ctr->ctr_telno;?>
      </td>
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
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_dir_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1">Fax:<?php echo $ctr->ctr_fax;?> </td>
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
      <td colspan="4"><h3><u>PERMOHONAN PERTUKARAN MAJIKAN BAGI PEKERJA ASING BINAAN </u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Perkara diatas adalah dirujuk.
		<br />
		<br />
		Pihak kami ingin memaklumkan bahawa proses sedang dijalankan untuk permohonan pertukaran majikan dari pihak Tuan kepada <i><?php echo $avlabRow->comp_to_name;?></i>. <br /> <br />
		Berikut adalah senarai nama pekerja yang terlibat :- </p>
	  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
      	<table width="100%" border="1" cellspacing="0">
      		<tr>
      			<td width="5%" align="CENTER"><strong>No</strong></td>
      			<td width="35%" align="CENTER"><strong>Name</strong></td>
      			<td width="20%" align="CENTER"><strong>No Passport</strong></td>
      			<td width="20%" align="CENTER"><strong>Tarikh Tamat Permit</strong></td>
      			<td width="20%" align="CENTER"><strong>Warganegara</strong></td>
      		</tr>
      		<?php if($avlabWkrDetails->num_rows() > 0){
	      			$i = 0;
      				foreach($avlabWkrDetails->result() as $wkr){
	      	?>
	      	<tr>
	      		<td><?php echo ++$i;?></td>
	      		<td><?php echo $wkr->wkr_name;?></td>
	      		<td align="center"><?php echo $wkr->wkr_passno;?></td>
	      		<td align="center"><?php echo date('d-m-Y', strtotime($wkr->wkr_permitexp));?></td>
	      		<td align="center"><?php echo $wkr->cty_desc;?></td>
	      	</tr>
	      	<?php
     	 		}
  			}
  			?>
      	</table>
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Pegawai kami akan menghubungi pihak tuan dalam tempoh 14 hari untuk memaklumkan status permohonan. </p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Sekian, Terima Kasih .</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yang Benar , <br />
			<strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong> <br />
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
      <td colspan="4">b.p.					  Ketua Pegawai Eksekutif  <br />
	  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>
