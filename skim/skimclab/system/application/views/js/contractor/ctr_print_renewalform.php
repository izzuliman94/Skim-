<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
<title>SKIM - CLAB Membership Renewal Form (RN01)</title>
<style type="text/css">
th {
	font-family: Arial, sans-serif;
	font-size: 13px;
	color: #000000;
	font-weight: bold;
	background-color: #C0C0C0;
	height: 17;
}

td {
	font-family: Arial, sans-serif;
	font-size: 12px;
	color: #333333;
	height: 17;
}
</style>
</head>
<body>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="right"><img src="<?php echo base_url();?>images/image002.gif" width="185px" height="111px"></td>
	</tr>
	<tr>
		<th colspan="4">RENEWAL FORM (RN01)</th>
	</tr>
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4"><u>1. Particulars</u></th>
	</tr>
	<tr>
		<td>Company Name</td>
		<td colspan="3">: <?php echo $ctr->ctr_comp_name;?></td>
	</tr>
	<tr>
		<td width="23%">Company Reg. No</td>
		<td width="27%">: <?php echo $ctr->ctr_comp_regno;?></td>
		<td width="23%">CLAB No.</td>
		<td width="27%">: <?php echo $ctr->ctr_clab_no;?></td>
	</tr>
	<tr>
		<td>Company Address</td>
		<td colspan="3">: <?php echo $ctr->ctr_addr1;?> <?php echo " " . $ctr->ctr_addr2;?><br />
						  <?php echo $ctr->ctr_addr3;?>
		</td>
	</tr>
	<tr>
		<td>Telephone No.</td>
		<td>: <?php echo $ctr->ctr_telno;?></td>
		<td>Postcode</td>
		<td>: <?php echo $ctr->ctr_pcode;?></td>
	</tr>
	<tr>
		<td>CIDB Registration No</td>
		<td>: <?php echo $ctr->ctr_cidb_regno;?></td>
		<td>Fax No:</td>
		<td>: <?php echo $ctr->ctr_fax;?></td>
	</tr>
	<tr>
		<td>CIDB Expiry Date</td>
		<td>: <?php echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?></td>
		<td>Email Address</td>
		<td>: <?php echo $ctr->ctr_email;?></td>
	</tr>
	<tr>
		<td>Grade</td>
		<td>: <?php echo $ctr->ctr_grade;?></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Specialisation</td>
		<td>: <?php echo $ctr->ctr_spec;?></td>
		<td>Category Code</td>
		<td>: <?php echo $ctr->ctr_category;?></td>
	</tr>
	<tr>
		<td colspan="2"><i>(As registered with CLAB)</i></td>
		<td colspan="2"><i>(CE-Civil Engineering, B-Building, ME - Mechanical & Electrical)</i></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th colspan="2"><u>2. Period of Registration Applied For: (Tick One)</u></th>
		<th colspan="2"><u>3. Payment</u></th>
	</tr>
	<tr>
		<td>a. One year @ RM20</td>
		<td><input type="checkbox" name="chkperiodreg1" value="1"></td>
		<td>a. Cash</td>
		<td><input type="checkbox" name="chkperiodreg2" value="1"></td>
	</tr>
	<tr>
		<td>b. Two Year @ RM40</td>
		<td><input type="checkbox" name="chkperiodreg3" value="1"></td>
		<td>Cash Date</td>
		<td>: </td>
	</tr>
	<tr>
		<td>c. Three Year @ RM50</td>
		<td><input type="checkbox" name="chkperiodreg4" value="1"></td>
		<td>b. Cheque/Draft/MO</td>
		<td><input type="checkbox" name="chkperiodreg5" value="1"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Cheque/Draft/MO No</td>
		<td>: </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Cheque/Draft/MO Date</td>
		<td>: </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4"><u>4. Attachments</u></th>
	</tr>
	<tr>
		<td colspan="4">
		   <table border="0" width="100%">
		    <tr>
		      <td>
				<tr>
					<td colspan="4">Please attach the following documents together with this form (if there is any changes to the 1st submission)</td>
				</tr>
				<tr>
					<td width="30%">a. Form 24</td>
					<td align="center" width="20%"><input type="checkbox" name="chkperiodreg1" value="1"></td>
					<td width="30%">d. Form 13</td>
					<td align="center" width="20%"><input type="checkbox" name="chkperiodreg2" value="1"></td>
				</tr>
				<tr>
					<td>b. Form 49</td>
					<td align="center"><input type="checkbox" name="chkperiodreg1" value="1"></td>
					<td>e. Form 9</td>
					<td align="center"><input type="checkbox" name="chkperiodreg2" value="1"></td>
				</tr>
				<tr>
					<td>c. Copy of CIDB Certificate<font color="red">*</font></td>
					<td align="center"><input type="checkbox" name="chkperiodreg1" value="1"></td>
					<td>f. Copy of Director's IC<font color="red">*</font></td>
					<td align="center"><input type="checkbox" name="chkperiodreg2" value="1"></td>
				</tr>
				<tr>
					<td colspan="4"><font color="red">*</font> <font face="Arial" size="9em">Mandatory to submit latest CIDB Certificate with renewal<font></td>
					
				</tr>
			   </td>
			  </tr>
			 </table>  
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<th colspan="4"><u>5. Renewal Details</u></th>
	</tr>
	<tr>
		<td>Declaration</td>
		<td colspan="3">: I declare that all the above information are true.</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="3">&nbsp; I understand that CLAB reserve the right to accept or reject my application.</td>
	</tr>
	<tr>
		<td>Renewal by:</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Name</td>
		<td>___________________</td>
		<td>Company Stamp</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Designation</td>
		<td>___________________</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Signature</td>
		<td>&nbsp;</td>
		<td>Date</td>
		<td>___________________</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>	
		<td colspan="4" align="center">
			<table style="text-align: left; width: 610px; border:1px solid;" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table border="0" width="100%">
							<tr>
								<td width="25%"><strong>For Office Use:</strong></td>
								<td width="25%">&nbsp;</td>
								<td width="25%"><strong>CLAB No:</strong></td>
								<td width="25%">: <strong><?php echo $ctr->ctr_clab_no;?></strong></td>
							</tr>
							<tr>
								<td>Processed by:</td>
								<td>&nbsp;</td>
								<td>Verified by:</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Name</td>
								<td>___________________</td>
								<td>Name</td>
								<td>___________________</td>
							</tr>
							<tr>
								<td>Signature</td>
								<td>___________________</td>
								<td>Signature</td>
								<td>___________________</td>
							</tr>
							<tr>
								<td>Date</td>
								<td>___________________</td>
								<td>Date</td>
								<td>___________________</td>
							</tr>
							<tr>
								<td colspan="4"><strong>Application Status & Approval :</strong></td>
							</tr>
							<tr>
								<td>Approved</td>
								<td><input type="checkbox" name="chkperiodreg6" value="1"></td>
								<td>Signature</td>
								<td>___________________</td>
							</tr>
							<tr>
								<td>Rejected</td>
								<td><input type="checkbox" name="chkperiodreg7" value="1"></td>
								<td>Reason for rejection</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Date Approved/Rejected</td>
								<td colspan="3">&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
