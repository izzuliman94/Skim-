<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Checklist VDR Submission</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="90%" border="0">
<tr>
    <td align="CENTER" class="print" width="30%"><img src="../images/clablogo.jpg"></td>
	<td align="CENTER" class="print" width="30%"><h2>CORPORATE SUPPORT DEPARTMENT</h2></td>
	<td align="CENTER" class="print" width="30%">CLAB/SOP/02/09/F01</td>
</tr>
<tr>
    <td align="CENTER" class="print" width="30%">&nbsp;</td>
	<td align="CENTER" class="print" width="30%">PLKS EXTENSION CHECKLIST</td>
	<td align="CENTER" class="print" width="30%">&nbsp;</td>
</tr>
</table>
<br />
<table width="90%" border="0">
<tr>
    <td align="LEFT" class="print" width="12%">Received By:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->wo_keyin_by?></td>
	<td align="LEFT" class="print" width="12%">Received Date:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo date('j M Y',strtotime($woRow->wo_datesubmit))?></td>
	<td align="LEFT" class="print" width="12%">Passport Expiry Date:</td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;">&nbsp;Refer to Lampiran A</td>
</tr>
<tr>
    <td align="LEFT" class="print" width="12%">Process By:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->wo_personincharge?></td>
	<td align="LEFT" class="print" width="12%">CLAB No:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->wo_clab_no;?></td>
	<td align="LEFT" class="print" width="12%">Permit Expiry Date:</td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;">&nbsp;Refer to Lampiran A</td>
</tr>
<tr>
    <td align="LEFT" class="print" width="12%">Company Name:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->ctr_comp_name;?></td>
	<td align="LEFT" class="print" width="12%">No Of FCL:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->wo_fcl_total;?></td>
	<td align="LEFT" class="print" width="12%">Year Renew:</td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;"><?php //echo $woRow->wo_yearrenew;?>&nbsp;Refer to Lampiran A</td>
</tr>
<tr>
    <td align="LEFT" class="print" width="12%">Contact Person:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->ctr_contact_name;?></td>
	<td align="LEFT" class="print" width="12%">Nationality:</td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><?php echo $woRow->cty_desc;?></td>
	<td align="LEFT" class="print" width="12%">&nbsp;</td>
	<td align="center" class="print" width="18%">&nbsp;</td>
</tr>
</table>
<br />
<table width="90%" border="0">
<tr>
   <td class="print" colspan="2"><h3>REQUIRED PAYMENT</h3></td>
</tr>
<tr>
   <td class="print" colspan="2">* Please Attached with Payment Receipt to JIM & CLAB Official Receipt</td>
</tr>
<tr>
   <td width="20%" class="print">JIM :</td>
   <td class="print"><input type="checkbox" name="chkjim" value="1"  <?php if($woRow->pay_imigration == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<tr>
   <td width="20%" class="print">Insurance Guarantee :</td>
   <td class="print"><input type="checkbox" name="chkfwcs" value="1"  <?php if($woRow->pay_ins_guarante == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<tr>
   <td width="20%" class="print">Insurance Hospital :</td>
   <td class="print"><input type="checkbox" name="chkpayig" value="1" <?php if($woRow->pay_ins_hospital == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<!--tr>
   <td width="20%" class="print">FWHS :</td>
   <td class="print"><input name="chkfwhs" type="checkbox" disabled="disabled" id="chkfwhs" value="1"  <?php if($woRow->pay_fwhs == 'YES') echo "CHECKED";?>/></td>   
</tr-->
<tr>
   <td width="20%" class="print">Admin Fee :</td>
   <td class="print"><input type="checkbox" name="chkadminfee" value="1" <?php if($woRow->pay_clab == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<!--tr>
   <td width="20%" class="print">Fomema :</td>
   <td class="print"><input type="checkbox" name="input2" value="1"  <?php if($woRow->pay_fomema == 'YES') echo "CHECKED";?> disabled="disabled"/></td>   
</tr-->
<tr>
    <td colspan="2" class="print">&nbsp;</td>
</tr>
<tr>
    <td colspan="2" class="print">*Attached with Fomema result</td>
</tr>
</table>
<br />
<table width="90%">
<tr>
   <td width="20%" class="print">Online Date :</td>
   <td width="20%" class="print" style="border:1px solid gray;">&nbsp;</td>   
   <td class="print" >&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;"><u><b>Remark:</b></u></td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;">&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;">&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;">&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print">&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print"><h3>LEGAL</h3></td>
</tr>
<tr height="30">
   <td width="20%" class="print">Agreement :</td>
   <td width="20%" class="print"><input type="checkbox" name="" value="1"   <?php if(isset($woRow->wo_agg_no) != ''){ echo "checked"; } ?> disabled="disabled"/></td>   
   <td class="print" >&nbsp;</td>
</tr>
<tr height="30">
   <td colspan="3" class="print" >*Please attached together with second Schedule</td>
</tr>
</table>
<br /><br />
<table width="90%">
<tr>
   <td colspan="3" class="print"><h3>STATUS</h3></td>
</tr>
<tr>
   <td width="20%" class="print" style="border:1px solid gray;">&nbsp;</td>
   <td width="20%" class="print" style="border:1px solid gray;">&nbsp;</td>
   <td width="25%" class="print" style="border:1px solid gray;">&nbsp;</td>   
   <td width="25%" class="print" style="border:1px solid gray;">&nbsp;</td>
</tr>
<tr>
   <td width="20%" class="print" align="center" style="border:1px solid gray;">&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;</td>
   <td width="20%" class="print" align="center" style="border:1px solid gray;">&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;</td>
   <td width="25%" class="print" align="center" style="border:1px solid gray;">&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;</td>   
   <td width="25%" class="print" align="center" style="border:1px solid gray;">&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;</td>
</tr>
<tr>
   <td width="20%" class="print" align="center" style="border:1px solid gray;">Processed By:</td>
   <td width="20%" class="print" align="center" style="border:1px solid gray;">Checked By:</td>
   <td width="25%" class="print" align="center" style="border:1px solid gray;">Verified By(Fin.):</td>   
   <td width="25%" class="print" align="center" style="border:1px solid gray;">Approved By:</td>
</tr>
<tr>
  <td class="print" align="center" style="border:1px solid gray;"><?php echo strtoupper($woRow->wo_personincharge); ?></td>
  <td class="print" align="center" style="border:1px solid gray;"><?php echo strtoupper("ROHAIDAH BT SAPUAN"); ?></td>
  <td class="print" align="center" style="border:1px solid gray;"><?php echo strtoupper("AMIRUDDIN BIN ABDUL RAHIM"); ?></td>
  <td class="print" align="center" style="border:1px solid gray;"><?php echo strtoupper("ABD RAFIK BIN ABD RAJIS"); ?></td>
</tr>
</table>
</body>
</html>
