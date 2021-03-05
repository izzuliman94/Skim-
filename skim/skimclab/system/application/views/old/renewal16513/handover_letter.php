<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
</style>
</head>
<body>
<table style="text-align: center;" width="70%" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
    <td colspan="2" align='left'>Ref : CLAB\CSP\HO\<?php echo date('y',strtotime($woRow->wo_withd_date)); ?>\<?php echo $woRow->wo_id ?></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Date :<?php echo date('j F Y');?></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><b><?php echo $woRow->ctr_comp_name;?></b></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_addr1;?></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_addr2;?></td>	
</tr>
<tr>
    <td colspan="2" align='left'><?php echo $woRow->ctr_pcode;?>&nbsp;<?php echo $woRow->ctr_addr3;?>&nbsp;<?php echo $woRow->state_name;?></td>	
</tr>
<tr>
    <td align='right'>&nbsp;</td>	
    <td align='left'>Courier / By Hand</td>
</tr>
<tr>
    <td colspan="2" align='left'>Dear Sir / Madam.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><B>HANDOVER OF ORIGINAL PASSPORT</B></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>We refer to the above matter.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>We are pleased to inform,that the passports for foreign construction workers are ready for collection.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>The details of the workers are : </td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>
	<table width="60%" align="center" border="1" >
	<tr>
	    <td width="10%"><div align="center"><strong>BIL</strong></div></td>
		<td><div align="center"><strong>NAMA</strong></div></td>
		<td width="20%"><div align="center"><strong>NO.PASSPORT</strong></div></td>
	</tr>
	<?php if($allFCLFiles->num_rows() == 0){ ?>
	<tr>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php }else{
	     $i = 1;
	    foreach($allFCLFiles->result() as $fcl){
      	 ?>
		 <tr>
	    <td align="center"><?php echo $i++;?></td>
		<td><?php echo $fcl->wkr_name;?></td>
		<td align="center"><?php echo $fcl->fcl_passno;?></td>
	    </tr>
	 <?php } }?>
	</table>	</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Kindly make the necessary arrangement for collection of passports at our office.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Thank You.</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Yours Sincerely,</td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>Nazatul Akmar Bt Abdul Halim</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>Deputy Head Corporation Service Division</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>______________________________________________________________________________________________________________________________________</td>	
</tr>
<tr>
    <td colspan="2" align='left'><strong>Acknowledgement</strong></td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>&nbsp;</td>	
</tr>
<tr>
    <td colspan="2" align='left'>I,hereby acknowledge receipt the above passports.</td>	
</tr>
<tr>
    <td width="50%" align='left'>Name:</td>	
    <td width="50%" align='left'>Company Stamp: </td>
</tr>
<tr>
    <td colspan="2" align='left'>Identity Card No:</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Designation:</td>	
</tr>
<tr>
    <td colspan="2" align='left'>Date:</td>	
</tr>
</table>
</body>
</html>