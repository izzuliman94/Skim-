<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
</head>

<body>

<h4>Contractors<img src="<?php echo base_url();?>images/right_arrow.gif" width="13" height="14" /> Print Letter </h4>
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
				echo anchor_popup('contContractor/printApproveRejLetter/' . $clabno, "Print Registration Letter");
			?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<font color="red">**</font><?php echo anchor_popup('contContractor/printRegisRenewal/' . $clabno, "Print Registration Renewal Letter + Renewal Form (RN01)");?>			</td>
		</tr>
		<!-- combined together with the above letter
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printRenewalForm/' . $clabno, "Print Renewal Form - RN01");?>
			</td>
		</tr>
		-->
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printCert/' . $clabno, "Certificate");?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printVDR/' . $clabno, "Agreement Letter (VDR)");?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printExt/' . $clabno, "Agreement Letter (Ext)");?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printTransferApp/' . $clabno, "Local Transfer (Permohonan)");?>			</td>
		</tr>
		<tr>
			<td align="CENTER">
				<?php echo anchor_popup('contContractor/printTransferValidate/' . $clabno, "Local Transfer (Pengesahan)");?>			</td>
		</tr>
		<tr>
		  <td align="CENTER"><?php echo anchor_popup('contContractor/printValidateWorkers/' . $clabno, "Pengesahan Pekerja");?></td>
	    </tr>
		<tr>
			<td align="CENTER"><?php echo anchor_popup('contContractor/printArrivalWorkers/' . $clabno, "Surat Serahan Ketibaan Pekerja ");?></td>
		</tr>
		<tr>
			<td align="LEFT"><font color="red"><i>** Two letters, one is with CLAB letterhead and one plain A4 paper</i></font></td>
		</tr>
	</table>
   </td>
  </tr>
</table>
</body>
</html>