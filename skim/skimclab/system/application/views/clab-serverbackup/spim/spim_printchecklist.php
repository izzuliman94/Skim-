<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Checklist VDR Submission</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="800px" border="0">
 <tr>
  <td align="CENTER" class="print">
	<table width="100%" border="0">
		<tr>	
			<td class="print" colspan="4" align="CENTER"><h2>CHECKLIST VDR SUBMISSION</h2></td>
		</tr>
		<tr>	
			<td class="print">Workorder No.:</td>
			<td class="print"><?php if($woRow->wo_num == '') echo $woRow->wo_id; else echo $woRow->wo_num;?></td>
			<td class="print">Payment Ref No.:</td>
			<td class="print"><?php echo $woRow->pay_refno;?></td>
		</tr>
		<tr>	
			<td class="print" width="15%">Company:</td>
			<td class="print" width="43%"><?php echo $woRow->ctr_comp_name;?></td>
			<td class="print" width="18%">CLAB No.:</td>
			<td class="print" width="27%"><?php echo $woRow->ctr_clab_no;?></td>
		</tr>
		<tr>	
			<td class="print">Agency Name:</td>
			<td class="print"><?php echo $woRow->agency_name;?></td>
			<td class="print">FCL Requested:</td>
			<td class="print"><?php echo $woRow->wo_fcl_total;?> <?php echo $woRow->cty_desc;?></td>
		</tr>
		<tr>	
			<td class="print">Processing Date:</td>
			<td class="print"><?php if($woRow->wo_processdate !== '0000-00-00') echo date('d-m-Y', strtotime($woRow->wo_processdate)); else echo "-";?></td>
			<td class="print">P.I.C:</td>
			<td class="print"><?php echo $woRow->wo_personincharge;?></td>
		</tr>
		<tr>	
			<td class="print" colspan="4">Replacement: <input type="checkbox" name="chkreplace" value="1" <?php if($woRow->wo_isreplacement == '1') echo "CHECKED";?>/>
			&nbsp; &nbsp;	Reason: <?php echo $woRow->wo_replace_reason;?>
			</td>
		</tr>
	</table>
	<br />
	<table width="100%" border="0">
		<tr>
			<td width="40%" class="print">&nbsp;</td>
		  <td width="20%" class="print">&nbsp;</td>
		  <td width="40%" class="print">&nbsp;</td>
		</tr>
	</table>
	<br />
	<table width="100%" border="0">
		<tr>
			<td class="print" colspan="2" align="LEFT"><strong><u>Submission/Worker Detail</u></strong></td>
			<td class="print" colspan="2" align="LEFT"><strong><u>Payment</u></strong></td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1"/>
				Letter of Submission to JIM			</td>
			<td class="print">______________________</td>
			<td class="print"><input type="checkbox" name="chkadminfee" value="1" <?php if($woRow->pay_adminfee == 'YES') echo "CHECKED";?> DISABLED/>
				Admin Fee			</td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> 
			IM12 &amp; 38 Attach & Point of Entry</td>
			<td class="print">______________________</td>
			<td class="print"><input type="checkbox" name="" value="1" <?php if($woRow->pay_levy == 'YES') echo "CHECKED";?> DISABLED/> JIM </td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> Payment Schedule, IG&BG</td>
			<td class="print">______________________</td>
			<td class="print"><input type="checkbox" name="chkpayig" value="1" <?php if($woRow->pay_ig == 'YES') echo "CHECKED";?> DISABLED/> IG</td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> Name List</td>
			<td class="print">______________________</td>
			<td class="print"><input type="checkbox" name="chkfwcs" value="1"  <?php if($woRow->pay_fwcs == 'YES') echo "CHECKED";?> DISABLED/> FWCS</td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> Passport</td>
			<td class="print">______________________</td>
			<td class="print"><input name="chkfwhs" type="checkbox" disabled="disabled" id="chkfwhs" value="1"  <?php if($woRow->pay_fwhs == 'YES') echo "CHECKED";?>/>
FWHS</td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> Medical</td>
			<td class="print">______________________</td>
			<td class="print"><input type="checkbox" name="input2" value="1"  <?php if($woRow->pay_fomema == 'YES') echo "CHECKED";?> disabled/>
FOMEMA</td>
			<td class="print">______________________</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> Photo</td>
			<td class="print" align="LEFT">______________________</td>
		    <td class="print" align="LEFT"><input type="checkbox" name="input" value="1"  <?php if($woRow->pay_agencyfee == 'YES') echo "CHECKED";?> disabled/>
Agency Fee</td>
		    <td class="print" align="LEFT">______________________</td>
		</tr>
		<tr>
			<td colspan="2" class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print" colspan="4"><strong><u>Legal</u></strong></td>
		</tr>
		<tr>
			<td class="print" colspan="4"> Date Agreement: <?php echo $woRow->legal_agree_receivedate;?></td>
		</tr>
		<tr>
			<td class="print" colspan="4"><strong>Note:</strong></td>
		</tr>
		<tr>
			<td class="print" colspan="4"><p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p><br />
	            <br />
	                      </p></td>
		</tr>
	</table>
	<table width="100%" border="1">
		<tr>
			<td class="print" colspan="2"><strong>Verified by</strong></td>
			<td class="print"><strong>Approved by</strong></td>
		</tr>
		<tr>
			<td class="print"><p><br />
		      <br />
			  <br />
			  </p>
			  <p><br />
		        <br />
	          </p></td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print">Rohaidah Bt. Sapuan</td>
		  <td class="print">Mardziyah Bt. Mohd Sazili</td>
			<td class="print">Abdul Rafik Abdul Rajis</td>
		</tr>
	</table>
  </td>
 </tr>
</table
></body>
</html>
