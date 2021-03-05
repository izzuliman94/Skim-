<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Labour Check-Out Form</title>
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
		<td height=50 align="CENTER" class=print><h2>BORANG PENYERAHAN PBA DAN PASPORT ASAL KEPADA KONTRAKTOR (G1-G3)</h2></td>
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
					<td align=left class=print><?php //if($woRow->wo_ransitdate=='0000-00-00') echo '-'; else echo date('j M Y', strtotime($woRow->wo_ransitdate)); ?></td>
				</tr>
				<tr>
					<td class=print>Masa Penyerahan</td>
					<td align=left class=print></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height=50 class=print>Nama Pekerja Binaan Asing yang diserahkan kepada majikan :</td></tr>
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
	<tr><td height=30 class=print><b>PENGESAHAN MAJIKAN</b></td></tr>
	<tr><td height=30 class=print>Saya dengan ini telah menerima pekerja asing binaan seperti senarai diatas bersama pasport asal perkerja tersebut.</td></tr>
	<tr><td height=30 class=print>&nbsp;</td></tr>
	<tr><td height=25 class=print>Tandatangan Pengarah/Wakil Syarikat :</td></tr>
	<tr><td height=25 class=print>Nama Pengarah/Wakil Syarikat :</td></tr>
	<tr><td height=25 class=print>No. Kad Pengenalan :</td></tr>
	<tr><td height=25 class=print>Cop Syarikat :</td></tr>
	
</table>
</div>
</body>
</html>
