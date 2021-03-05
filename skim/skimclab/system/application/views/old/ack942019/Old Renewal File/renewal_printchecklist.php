<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Checklist PLKS Renewal</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.print h2 {
	font-size: 12px;
}
.print {
	font-size: 12px;
}
.print1 {	font-size: 12px;
}
body table {
	font-size: 10px;
}
.print .print1 {
	font-size: 10px;
}
</style>
</head>

<body>
<table width="90%" border="0">
<tr>
    <td width="27%" height="53" align="CENTER" class="print">&nbsp;</td>
	<td align="CENTER" class="print" width="46%"><h2>CORPORATE SERVICES DEPARTMENT</h2>
    PLKS RENEWAL CHECKLIST</td>
	<td align="CENTER" class="print" width="27%">CLAB/SOP/02/09/F01</td>
</tr>
</table>
<br />
<table width="90%" border="0">
<tr>
    <td align="LEFT" class="print" width="12%"><font size="1">WorkOrder No. :</font></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->wo_num?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1"><font size="1">Received Date:</font></span></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo date('j M Y',strtotime($woRow->wo_datesubmit))?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1">Passport Expiry Date:</span></td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;"><font size="1">Refer to Lampiran A</font></td>
</tr>

<tr>
    <td align="LEFT" class="print" width="12%"><font size="1">Received By:</font></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->wo_keyin_by?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1"><font size="1">CLAB No:</span></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->wo_clab_no;?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1"><font size="1">Permit Expiry Date:</span></td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;"><font size="1">Refer to Lampiran A</font></td>
</tr>
<tr>
    <td align="LEFT" class="print" width="12%"><font size="1">Process By:</font></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->wo_personincharge?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1">No Of FCL:</span></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->wo_fcl_total;?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1"><font size="1">Year Renew:</span></td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;"><font size="1">Refer to Lampiran A</font><?php //echo $woRow->wo_yearrenew;?></td>
</tr>
<tr>
    <td align="LEFT" class="print" width="12%"><font size="1">Company Name:</font></td>
	<td align="LEFT" class="print" width="30%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->ctr_comp_name;?></td>
	<td align="LEFT" class="print" width="12%"><span class="print1">Contact Person / Tel</span></td>
	<td align="LEFT" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->ctr_contact_name;?> / <?php echo $woRow->ctr_telno;?></span></td>
	<td align="LEFT" class="print" width="12%"><span class="print1">Nationality:</span></td>
	<td align="center" class="print" width="18%" style="border:1px solid gray;"><font size="1"><?php echo $woRow->cty_desc;?></td>
</tr>
<tr>
  <td align="LEFT" class="print"><font size="1">OR Number</font></td>
  <td align="LEFT" class="print" style="border:1px solid gray;" ><font size="1"><?php echo $woRow->pay_refno;?></td>
  <td class="print" colspan="4">&nbsp;</td>
 
</tr>
</table>
<br />
<table width="90%" border="0">
<tr>
   <td class="print" colspan="2" ><h3><font size="1">REQUIRED PAYMENT</font></h3></td>
</tr>
<tr>
   <td class="print" colspan="2"><font size="1">* Please Attached with Payment Receipt to JIM & CLAB Official Receipt</font></td>
</tr>
<tr>
   <td width="30%" class="print"><font size="1">JIM :</font></td>
   <td width="70%" class="print"><input type="checkbox" name="chkjim" value="1"  <?php if($woRow->pay_imigration == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<tr>
   <td width="30%" class="print"><font size="1">Insurance Guarantee :</font></td>
   <td class="print"><input type="checkbox" name="chkfwcs" value="1"  <?php if($woRow->pay_ins_guarante == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<tr>
   <td width="30%" class="print"><font size="1">Insurance Hospital :</font></td>
   <td class="print"><input type="checkbox" name="chkpayig" value="1" <?php if($woRow->pay_ins_hospital == '1') echo "CHECKED";?> disabled="disabled"/></td>   
</tr>
<!--tr>
   <td width="20%" class="print">FWHS :</td>
   <td class="print"><input name="chkfwhs" type="checkbox" disabled="disabled" id="chkfwhs" value="1"  <?php if($woRow->pay_fwhs == 'YES') echo "CHECKED";?>/></td>   
</tr-->
<tr>
   <td width="30%" class="print"><font size="1">Admin Fee :</font></td>
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
    <td colspan="2" class="print"><font size="1">*Attached with Fomema result</font></td>
</tr>
</table>
<br />
<table width="90%">
<tr>
   <td width="20%" class="print"><font size="1">Online Date :</font></td>
   <td width="20%" class="print" style="border:1px solid gray;">&nbsp;</td>   
   <td class="print" >&nbsp;</td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;"><u><b><font size="1">Remark:</font></b></u></td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;"><input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:800px; text-align:left;" value="" /></td>
</tr>
<tr>
   <td colspan="3" class="print" style="border:1px solid gray;"><input type="text" name="txtfield1" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:800px; text-align:left;" value="" /></td>
</tr>
</table><br />
<table width="90%">
<tr>
   <td colspan="3" class="print"><h3><font size="1">STATUS</font></h3></td>
</tr>
<tr>
   <td width="20%" class="print" style="border:1px solid gray;"><p>&nbsp;</p>
    <p>&nbsp;</p></td>
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
   <td width="20%" class="print" align="center" style="border:1px solid gray;"><font size="1">Processed By:</font></td>
   <td width="20%" class="print" align="center" style="border:1px solid gray;"><font size="1">Checked By:</font></td>
   <td width="25%" class="print" align="center" style="border:1px solid gray;"><font size="1">Verified By(Fin.):</font></td>   
   <td width="25%" class="print" align="center" style="border:1px solid gray;"><font size="1">Approved By:</font></td>
</tr>
<tr>
  <td class="print" align="center" style="border:1px solid gray;"><font size="1"><?php echo strtoupper($woRow->wo_personincharge); ?></font></td>
  <td class="print" align="center" style="border:1px solid gray;"><font size="1"><?php echo strtoupper("ROHAIDAH BT SAPUAN"); ?></font></td>
  <td class="print" align="center" style="border:1px solid gray;"><font size="1"><?php echo strtoupper("AMIRUDDIN BIN ABDUL RAHIM"); ?></font></td>
  <td class="print" align="center" style="border:1px solid gray;"><font size="1"><?php echo strtoupper("ABD RAFIK BIN ABD RAJIS"); ?></font></td>
</tr>
</table>
</body>
</html>
