<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Akuan Penerimaan</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
body,td,th {
	font-size: 10px;
}
-->
</style>
</head>

<body>
<div align=center >
<table width="800px" border="0">
 <tr>
  <td align="CENTER" class=print>
	<table width="100%" border="0" cellpadding=0 style='border-style:none'>
		<tr>
			<td width=50% class=print><img src="<?php echo base_url();?>images/Letterhead CLABv2up.jpg" align="left" width='800' height='100'></td>
			
		</tr>
	</table>
	<table width="100%" border="0">
		<tr>	
			<td class="print" height=80 colspan="4" align="CENTER"><h2>Akuan Penerimaan</h2></td>
		</tr>
		<tr>	
			<td class="print" width=200>No. Permohonan</td>
			<td class="print" width=10>:</td>
			<td class="print" width=200><?php echo $woRow->woyear.'/G1G3/'.$woRow->wo_id;  ?></td>
			<td class="print" rowspan=4 align=center valign=top>
			<?php
			include "phpqrcode/qrlib.php";
			QRcode::png($woRow->woyear.'/G1G3/'.$woRow->wo_id, 'images/qr_ap.png');
			?>
			<img src="<?php echo base_url();?>images/qr_ap.png" width="71" height="77" >
			</td>
		</tr>
		<tr>
			<td class="print">Nama Pegawai Mencetak (CLAB)</td>
			<td class="print">:</td>
			<td class="print"><?php echo $this->session->userdata('empname');?></td>
			<!--td class="print"></td-->
		</tr>
		<tr>
			<td class="print">Tarikh/Masa Kelulusan</td>
			<td class="print">:</td>
			<td class="print"><?php echo date('d/m/Y g:i A') ?></td>
			<!--td class="print"></td-->
		</tr>
		<tr>
			<td class="print">Jenis Permohonan</td>
			<td class="print">:</td>
			<td class="print">Baru</td>
			<!--td class="print"></td-->
		</tr>
		<tr>
			<td class="print">No. Pendaftaran</td>
			<td class="print">:</td>
			<td class="print"><?php echo $woRow->ctr_comp_regno?></td>
			<td class="print"></td>
		</tr>
		<tr>
			<td class="print">Nama Majikan</td>
			<td class="print">:</td>
			<td class="print"><?php echo $woRow->ctr_comp_name?></td>
			<td class="print"></td>
		</tr>
		<tr>
		  <td class="print">Gred Majikan</td>
		  <td class="print">:</td>
		  <td class="print"><?php echo $woRow->ctr_grade?></td>
		  <td class="print"></td>
		  </tr>
		<tr>
		  <td class="print">Alamat Majikan</td>
		  <td class="print">:</td>
		  <td class="print"><?php echo $woRow->ctr_addr1?>&nbsp;<?php echo $woRow->ctr_addr2?></td>
		  <td class="print"></td>
		  </tr>
		<tr>
		  <td class="print">&nbsp;</td>
		  <td class="print">&nbsp;</td>
		  <td class="print"><?php echo $woRow->ctr_addr3?>&nbsp;<?php echo $woRow->ctr_pcode?></td>
		  <td class="print"></td>
		  </tr>
		<tr>
		  <td class="print">&nbsp;</td>
		  <td class="print">&nbsp;</td>
		  <td class="print"><?php echo $woRow->state_name?></td>
		  <td class="print"></td>
		  </tr>
		<tr>
			<td class="print">Nama Penghantar</td>
			<td class="print">:</td>
			<td class="print"><?php echo $woRow->wo_sender_name?></td>
			<td class="print"></td>
		</tr>
		<tr>
			<td class="print">No. Pengenalan</td>
			<td class="print">:</td>
			<td class="print"><?php echo $woRow->wo_sender_ic?></td>
			<td class="print"></td>
		</tr>
		<tr>
			<td class="print">Sektor</td>
			<td class="print">:</td>
			<td class="print">Pembinaan</td>
			<td class="print"></td>
		</tr>
		<tr>
			<td class="print">Catatan</td>
			<td class="print">:</td>
			<td class="print">&nbsp;</td>
			<td class="print"></td>
		</tr>
		<tr>
			<td class="print" height=50>&nbsp;</td>
			<td class="print">&nbsp;</td>
			<td class="print"></td>
			<td class="print"></td>
		</tr>
		<!--tr>
			<td class="print" height=50>Notis</td>
			<td class="print">:</td>
			<td class="print"></td>
			<td class="print"></td>
		</tr-->
		
	</table>
<table width="100%" border="1" cellpadding=3 style='border-style:none' bordercolor='#ccc'>
  <tr>
			<td colspan=5 class="print" height=60px align=center><b>PERMOHONAN PENGAMBILAN PEKERJA ASING<br>(KONTRAKTOR G1-G3)</b></td>
		</tr>
		<tr>
			<td class="print" WIDTH=50% colspan=2>DILULUSKAN</td>
			<td class="print" colspan=3>DITOLAK</td>
		</tr>
		<tr>
			<td class="print" colspan=2>
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr>
						<td class=print width=150>JUMLAH DILULUSKAN</td>
						<td class=print width=10>:</td>
						<td class=print align=left><?php echo $woRow->wo_fcl_total_apv?></td>
					</tr>
					<tr>
						<td class=print >&nbsp;</td>
						<td class=print >:</td>
						<td class=print align=left>&nbsp;</td>
					</tr>
					<tr>
						<td class=print >TARIKH SAH SEHINGGA</td>
						<td class=print >:</td>
						<td class=print align=left>
						<?php 
						$date = new DateTime(date("d-m-Y"));
						$date->modify('+30 day');
						$tomorrowDATE = $date->format('d-m-Y');
						echo $tomorrowDATE;
						?></td>
					</tr>
				</table>
			</td>
			<td class="print" colspan=3></td>
		</tr>
        <tr> &nbsp; </tr>
		<tr>
			<td class="print" height=100px>
			  <table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>Urusetia CLAB</td><tr>
				</table>
			</td>
			<!--td class="print" height=100px>
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>CIDB</td>
				</table>
			</td-->
			<!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
			<!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
			<!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
            
		</tr>
		<!--tr>
			<td class="print" colspan="2"><strong>Verified by</strong></td>
			<td class="print"><strong>Approved by</strong></td>
		</tr>
		<tr>
			<td class="print"><br /><br /><br /><br /><br /></td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print">Rohaidah Bt. Sapuan</td>
		  <td class="print">Mardziyah Bt. Mohd Sazili</td>
		  <td class="print">Abdul Rafik Abdul Rajis</td>
		</tr-->
	</table>
  </td>
 </tr>
 <tr>
			<td width=50% class=print><img src="<?php echo base_url();?>images/Letterhead CLABv2down.jpg" width='800' height='100'></td>
			
	</tr>
</table>
</div>
</body>
</html>
