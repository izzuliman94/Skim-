<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Checklist Local Transfer</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="800px" border="0">
 <tr>
  <td align="CENTER" class="print">
	<table width="100%" border="0">
		<tr>	
			<td class="print" colspan="4" align="CENTER"><h2>CHECKLIST PERTUKARAN MAJIKAN</h2></td>
		</tr>
		<tr>	
			<td class="print">Reference No.:</td>
			<td class="print"><?php if($avlabDetails->avlab_ref_no == '') echo $avlabDetails->avlab_ref_no; else echo $avlabDetails->avlab_ref_no;?></td>
			<td class="print">CLAB No.:</td>
			<td class="print"><?php echo $avlabDetails->avlab_comp_from;?></td>
		</tr>
		<tr>	
			<td class="print" width="15%">Company:</td>
			<td class="print" width="43%"><?php echo $ctrData1->ctr_comp_name;?></td>
			<td class="print">P.I.C:</td>
			<td class="print"><?php echo $avlabDetails->avlab_entered_by;?></td>
		</tr>
		<tr>	
			
			<td class="print">FCL Requested:</td>
			<td class="print"><?php echo $avlabDetails->avlab_qty;?> 
			<!--?php echo $woRow->cty_desc;?></td-->
		</tr>
		<tr>	
			<td class="print">Processing Date:</td>
			<td class="print"><?php if($avlabDetails->avlab_submit_date !== '0000-00-00') echo date('d-m-Y', strtotime($avlabDetails->avlab_submit_date)); else echo "-";?></td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>	
			<td class="print" colspan="4">&nbsp;</td>
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
			<td class="print" colspan="2" align="LEFT"><strong><u>Submission Local Transfer Detail</u></strong></td>
			<td class="print" colspan="2" align="LEFT">&nbsp;</td>
		</tr>
		<tr>
			<td width="34%" class="print"><input type="checkbox" name="" value="1"/>
			  Release Letter (Company A)</td>
			<td width="33%" class="print">______________________</td>
			<td width="6%" class="print">&nbsp;</td>
			<td width="27%" class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" />
			  Accepting Letter (Company B)</td>
			<td class="print">______________________</td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> 
			Letter of Award</td>
			<td class="print">______________________</td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> 
			Photo &amp; Address of Accomodation</td>
			<td class="print">______________________</td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" /> 
			Employment Contract</td>
			<td class="print">______________________</td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print"><input type="checkbox" name="" value="1" />
			Addendum</td>
			<td class="print">______________________</td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
					   
		</tr>
		<tr>
			<td colspan="2" class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td class="print" colspan="4">&nbsp;</td>
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
			<td width="34%" class="print"><strong>Prepared by</strong></td>
			<td width="33%" class="print"><strong>Verified by Finance</strong></td>
			<td width="33%" class="print"><strong>Verified by Operation</strong></td>
			<td width="33%" class="print"><strong>Approved by</strong></td>
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
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print">Nurul Amalin Binti Mohammad Afandi</td>
			<td class="print">Mardziyah Bt Sazili</td>
		    <td class="print">Rohaidah Bt. Sapuan</td>
			<td class="print">Abdul Rafik Abdul Rajis</td>
		</tr>
	</table>
  </td>
 </tr>
</table
></body>
</html>
