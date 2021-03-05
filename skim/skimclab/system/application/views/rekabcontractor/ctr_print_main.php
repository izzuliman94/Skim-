<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
</head>

<body>

<h4>Rekalibrasi Contractors<img src="<?php echo base_url();?>images/right_arrow.gif" width="13" height="14" /> Print Letter </h4>
Company Name: <strong><?php echo $ctr->ctr_comp_name;?></strong><br />
CLAB No.: <strong><?php echo $ctr->ctr_clab_no;?></strong>
<p>
<table width="50%" border="1" align="CENTER">
  <tr>
  	<td>
	<table width="100%" border="0">
		<tr>
			<td align="CENTER">
			<?php
				$clabno = $ctr->ctr_clab_no;

			?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<font color="red"></font><?php echo anchor_popup('contrekabContractor/printVerifikasiRekab/' . $clabno, "Surat Pengesahan Verikasi Rekalibrasi Dari CLAB");?>	(PENGESAHAN)		</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contrekabContractor/printlebihanRekab/' . $clabno, "Surat Pengesahan Penerimaan Lebihan Rekalibrasi");?>	(HADIR)		</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contrekabContractor/printnoackRekab/' . $clabno, "Pemakluman KETIDAKHADIRAN dan serahan nama lebihan PATI daripada Majikan");?>	( TIDAK HADIR)</td>
		</tr>
		
		
	</table>
   </td>
  </tr>
</table>
</body>
</html>