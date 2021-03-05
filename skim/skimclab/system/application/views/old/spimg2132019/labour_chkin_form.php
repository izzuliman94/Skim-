<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Labour Check-In Form</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<div align=center >
<table width="800px" border="0">
	<tr>
		<td align="CENTER" class=print>
			<table width="100%" border="0" cellpadding=3 style='border-style:none'>
				<tr>
					<td width=50% class=print><img src="<?php echo base_url();?>images/clablogo.png" width='190' height='50'></td>
					<td align=right class=print><img src="<?php echo base_url();?>images/cidblogo.png" ></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height=30 class=print>&nbsp;</td></tr>
	<tr>
		<td height=50 align="CENTER" class=print><h2>BORANG PENYERAHAN PBA KEPADA CLAB</h2></td>
	</tr>
	<tr>
		<td align="CENTER" class=print>
			<table width="100%" border="1" cellpadding=3 style='border-collapse:collapse' bordercolor='#666666'>
				<tr>
					<td width=150px class=print>Nama Syarikat</td>
					<td align=left class=print><?php echo $woRow->ctr_comp_name ?></td>
				</tr>
				<tr>
					<td class=print>Tarikh Penyerahan</td>
					<td align=left class=print><?php //if($woRow->wo_hoverdate=='0000-00-00') echo '-'; else echo date('j M Y', strtotime($woRow->wo_hoverdate)); ?></td>
				</tr>
				<tr>
					<td class=print>Masa Penyerahan</td>
					<td align=left class=print></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height=50 class=print>Nama Pekerja Binaan Asing yang diserahkan kepada CLAB :</td></tr>
	<tr>
		<td align="CENTER" class=print>
			<table width="100%" border="1" cellpadding=3 style='border-collapse:collapse' bordercolor='#666666'>
				<tr>
					<td width=10px class=print><b>NO.</b></td>
					<td align=left class=print><b>NAMA</b></td>
					<td width=150px align=center class=print><b>NO PASPORT</b></td>
					<td width=150px align=center class=print><b>WARGANEGARA</b></td>
				</tr>
				<?php
				$i=1;
				foreach($worker->result() as $wkr){				
					echo '<tr>
						<td class="print" align="center">'.$i++.'.</td>
						<td class="print" >'.$wkr->fcl_name.'</td>
						<td class="print" align="center">'.$wkr->fcl_passno.'</td>
						<td align="CENTER" class="print">'.$wkr->fcl_nationality.'</td>
					</tr>';
					
					for ($x = 1; $x <= 11-$i; $x++) {
						echo '
						<tr>
						<td height=20 class="print" align="center"></td>
						<td class="print" valign="top"></td>
						<td class="print" align="CENTER"></td>
						<td align="CENTER" class="print"></td>
						</tr>';
					} 
				}	
				?>
			</table>
		</td>
	</tr>
	<tr><td height=60 class=print>Saya dengan ini menyerahkan semula pekerja asing binaan seperti senarai diatas bersama kad Hijau, ID Kad CLAB, dan salinan Slip Gaji terkini perkerja kepada CLAB.</td></tr>
	<tr><td height=30 class=print>&nbsp;</td></tr>
	<tr><td height=25 class=print>Tandatangan Pengarah/Wakil Syarikat :</td></tr>
	<tr><td height=25 class=print>Nama Pengarah/Wakil Syarikat :</td></tr>
	<tr><td height=25 class=print>No. Kad Pengenalan :</td></tr>
	<tr><td height=25 class=print>Cop Syarikat :</td></tr>
	<tr><td height=50 class=print>&nbsp;</td></tr>
	<tr>
		<td class=print>
			<table width="100%" border="1" cellpadding=5 style='border-collapse:collapse' bordercolor='#666666'>
				<tr><td class=print align=center><b>UNTUK KEGUNAAN CLAB</b></td>				
			</table>
		</td>
	</tr>
	<tr>
		<td class=print>
			<table width="100%" border="0" cellpadding=3 style='border-collapse:collapse' bordercolor='#666666'>
				<tr>
					<td class=print width=5%><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td class=print width=40%>Passport Asal Pekerja</td>
					<td class=print>Nama Pegawai :</td>
				</tr>
				<tr>
					<td class=print><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td class=print>Kad Hijau CIDB</td>
					<td class=print>Jawatan :</td>
				</tr>
				<tr>
					<td class=print><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td class=print>ID Kad CLAB</td>
					<td class=print>Tarikh :</td>
				</tr>
				<tr>
					<td class=print><img src="<?php echo base_url();?>images/tickbox.png" width='19' height='19'></td>
					<td class=print>Salinan slip gaji terkini</td>
					<td class=print>Tandatangan :</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height=30 class=print>&nbsp;</td></tr>
</table>
</div>
</body>
</html>
