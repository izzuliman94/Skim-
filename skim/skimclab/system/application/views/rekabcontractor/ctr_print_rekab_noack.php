<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>Tidak Hadir</title>
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
      <td width="22%">&nbsp;</td>
      <td width="41%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td class="print" align=center valign=top>
			
			</td>
           
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br /><br />
      Rujukan: CLAB/RTK/<?php echo date('dmy');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
       <td class="print" rowspan=4 align=center valign=bottom>
			<?php
			include "phpqrcode/qrlib.php";
			//QRcode::png('CLAB/RTK/'.date('y').'/'.substr($ctr->ctr_clab_no, -6), 'images/qr_ap.png');
			//QRcode::png('http://192.168.0.222/skimclab/index.php/contrekabContractor/viewListOfLabours/CLAB000001', 'images/qr_ap.png');
			QRcode::png(base_url().'index.php/contrekabContractor/viewListOfLabours'.'/'.$ctr->ctr_clab_no,'images/qr_ap.png');
			?>
			<img src="<?php echo base_url();?>images/qr_ap.png" >
			</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td class="print" align=center valign=top></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Tarikh:<?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
      <td class="print" align=center valign=top></td>
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
      <td colspan="4"><h3><u>PEMAKLUMAN KETIDAKHADIRAN DAN TIADA SERAHAN NAMA LEBIHAN PATI DARIPADA MAJIKAN</u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Dengan segala hormatnya kami merujuk perkara di atas.
		<br />
		<br />
		2. Dengan ini kami ingin memaklumkan bahawa majikan di bawah <b><u>tidak hadir bersama PATI</u></b> selepas 14 Hari notifikasi dari Pihak Imigresen : <br /> <br />
      </p>
	  </td>
    </tr>
    <tr>
      <td><b>Nama Syarikat :</b></td>
      <td><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><b>Alamat Majikan :</b></td>
      <td><?php echo $ctr->ctr_addr1;?>&nbsp;<?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?php echo $ctr->ctr_pcode;?>&nbsp;<?php echo $ctr->state_name;?>
      <br />
      Tel:<?php echo $ctr->ctr_telno;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
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
      			<td width="20%" align="CENTER"><strong>Warganegara</strong></td>
      			<td width="20%" align="CENTER"><strong>No Passpot</strong></td>
      			<td width="20%" align="CENTER"><strong>Tarikh Tamat</strong></td>
                <td width="20%" align="CENTER"><strong>No Telefon</strong></td>
      		</tr>
      		<?php if($listofLabours->num_rows() > 0){
	      			$i = 0;
      				foreach($listofLabours->result() as $wkr){
	      	?>
	      	<tr>
	      		<td><?php echo ++$i;?></td>
	      		<td><?php echo $wkr->wkr_name;?></td>
	      		<td align="center"><?php echo $wkr->cty_desc;?></td>
	      		<td align="center"><?php echo $wkr->wkr_passno;?></td>
      		  <td align="center"><?php echo $wkr->wkr_passexp;?></td>
              <td align="center"><?php echo $wkr->jimtel;?></td>
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
      <td colspan="4"><p align="justify">3. Surat pengesahan ini adalah bagi tujuan pengesahan bahawa CLAB telah menerima makluman merujuk kepada perkara di atas.</p></td>
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
