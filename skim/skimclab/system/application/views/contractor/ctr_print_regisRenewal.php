<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - CLAB Registration Renewal Letter</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}

P.pagebreakhere {page-break-before: always}
.print {font-size: 12px;
}
</style>
</head>
<body>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg"><br />
          <br />
          <br />
          <span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
          <span style="text-align: justify">Level 2, Annexe Block,Menara Milenium 8, Jalan Damanlela, Bukit Damansara, 50490 Kuala Lumpur. </span><br>
Tel: 03-2095 9599 <br>
Fax: 03-2095 9566 <br>
E-mail: info@clab.com.my <br>
Website: www.clab.com.my </span></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br />
          <br />
        <br />
        Ref: CLAB/NAA1/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1">Date:<?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><br />
          <br />
        <b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?> <?php echo $ctr->ctr_addr2;?> <br />
          <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?> <?php echo $ctr->state_name;?> </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><br />
        Tel:<?php echo $ctr->ctr_telno;?> <br />
        Fax:<?php echo $ctr->ctr_fax;?> </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_dir_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Dear Sir/Madam,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><strong><u>CLAB RENEWAL REMINDER</u></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We  wish to kindly remind you that your registration will be expiring on <?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?>. Details of your registration are as follows: </p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table width="80%" align="CENTER" border="0">
        <tr>
          <td width="5%">&#8226;</td>
          <td width="45%">Registration No</td>
          <td width="5%">:</td>
          <td width="40%"><b><?php echo $ctr->ctr_clab_no?></b></td>
        </tr>
        <tr>
          <td>&#8226;</td>
          <td>Date of Registration</td>
          <td>:</td>
          <td><b><?php echo date('d-m-Y', strtotime($ctr->ctr_datereg))?></b></td>
        </tr>
        <tr>
          <td>&#8226;</td>
          <td>Date of Expiry</td>
          <td>:</td>
          <td><b>
            <?php if($ctr->ctr_clabexp_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?>
          </b></td>
        </tr>
        <tr>
          <td>&#8226;</td>
          <td>Date of Expiry of CIDB Registration</td>
          <td>:</td>
          <td><b>
            <?php if($ctr->ctr_cidbexp_date != '0000-00-00') echo date('d-m-Y', strtotime($ctr->ctr_cidbexp_date));?>
          </b></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">Attached herewith is the Renewal Form (RN01) and kindly return the original duly signed. Last but not least, we wish to extend our fullest appreciation on the support that you have rendered to us.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Thank you.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yours Sincerely, <br />
        CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">CHIEF EXECUTIVE OFFICER </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i>This letter are computer generated. No signature required.</i> </span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;"> <i><?php echo $this->session->userdata('username');?></i> </span></td>
    </tr>
  </tbody>
</table>
<p CLASS="pagebreakhere">
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="4">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="4" align="right"><img src="<?php echo base_url();?>images/clab_logo.png" width="150px" height="40px"></td>
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
		<td width="24%">Company Reg. No</td>
	  <td width="26%">: <?php echo $ctr->ctr_comp_regno;?></td>
	  <td width="23%">CLAB No.</td>
		<td width="27%">: <?php echo $ctr->ctr_clab_no;?></td>
	</tr>
	<tr>
		<td>Company Address</td>
		<td colspan="3">: <?php echo $ctr->ctr_addr1;?> <?php echo " " . $ctr->ctr_addr2;?><br />
						  <?php echo $ctr->ctr_addr3;?>		</td>
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
		<td>a. One year @ RM20.00*</td>
		<td><input type="checkbox" name="chkperiodreg1" value="1"></td>
		<td>a. Cash</td>
		<td><input type="checkbox" name="chkperiodreg2" value="1"></td>
	</tr>
	<tr>
		<td>b. Two Year @ RM40.00*</td>
		<td><input type="checkbox" name="chkperiodreg3" value="1"></td>
		<td>Cash Date</td>
		<td>: </td>
	</tr>
	<tr>
		<td>c. Three Year @ RM50.00*</td>
		<td><input type="checkbox" name="chkperiodreg4" value="1"></td>
		<td>b. Cheque/Draft/MO</td>
		<td><input type="checkbox" name="chkperiodreg5" value="1"></td>
	</tr>
	<tr>
		<td>d. More Than 3 Years</td>
		<td> <input type="checkbox" name="chkperiodreg8" value="1">
		  Please State</td>
	  <td>Cheque/Draft/MO No</td>
		<td>: </td>
	</tr>
	<tr>
		<td><span class="print" style="border:none;"><span class="print" style="border:none;">
		  <input align="right" type="text" name="txtfield4" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:20px; text-align:left;" value="" />
        </span><span class="print" style="border:none;">Years</span>@ RM<span class="print" style="border:none;"><span class="print" style="border:none;">
        <input align="left" type="text" name="txtfield" style="border-color:#C0C0C0;border-left:none; border-right:none; border-top: none; border-bottom: 1px inherit; width:40px; text-align:right;" value="" />
        </span></span></span></td>
	  <td><div align="right"></div></td>
	  <td>Cheque/Draft/MO Date</td>
		<td>: </td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Online Payment</td>
		<td><input type="checkbox" name="chkperiodreg9" value="1"></td>
	</tr>
	<tr>
	  <td><strong> </strong></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
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
					<td>f. Copy of Director's IC<font color="red">**</font></td>
					<td align="center"><input type="checkbox" name="chkperiodreg2" value="1"></td>
				</tr>
				<tr>
					<td colspan="4"><font color="red">*</font><i>Please submit non expired certificate
                    <font color="red">**</font><i>Please Submit if any changes in owner information</i></td>
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
						</table>					</td>
				</tr>
			</table>		</td>
	</tr>
</table>
</p>
<p CLASS="pagebreakhere">

<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="5" align="center">CONSTRUCTION LABOUR EXCHANGE CENTRE</th>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<th colspan="5"><u>BORANG PEMBAYARAN TERUS KE AKAUN CLAB</u></th>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">Pembayaran yang dibenarkan adalah untuk CLAB sahaja, manakala pembayaran untuk insuran </td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">dan Jabatan Imigresen (Kecuali Pembatalan Permit) perlulah di dalam bentuk draf bank. </td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">1. Nama syarikat : ______________________________________________________________________________</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">2. No. telefon : _________________________________________________________________________________</td>  
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">3. Nama pengawai untuk dihubungi : ____________________________________________________________</td>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">4. Nama pengawai CLAB yang berurusan berkenaan bayaran di bawah : </td>
		<td colspan="2">_____________________________</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3"></td>
		<td colspan="2">_____________________________</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="3">5. Sila tandakan bayaran yang di buat : </td>
		<td align="center">Mod Bayaran</td>
		<td align="center">Jumlah (RM)</td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
	
<style> 
input[type=text] {
  border: 2px solid black;
}
</style>
	
	<tr>
		<td colspan="3"><input type="text" style="width:40px"> Pembatalan permit (Cancellation Permit)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3"><input type="text" style="width:40px"> Wisma Putra dan Kedutaan (Attestatoin)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3"><input type="text" style="width:40px"> Kad Hijau (Green Card - New / Renew)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3" ><input type="text" style="width:40px"> Pendaftaran CLAB/Pembaharuan Pendaftaran CLAB (RG01/RN01)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3" ><input type="text" style="width:40px"> 1 MMN (Reimbursement / Disbursement)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3" ><input type="text" style="width:40px"> Memo Keluar (COM)</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3" ><input type="text" style="width:40px"> Lain-lain : Sila nyatakan__________________________________</td>
		<td align="center"><input type="text" style="width:80px"></td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	<td colspan="5">&nbsp;</td>
	<tr>
		<td colspan="3" > <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah Keseluruhan</strong></td>
		<td align="center">&nbsp;</td>
		<td align="center"><input type="text" style="width:80px"></td>
	</tr>
	
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	
	<tr>
		<td colspan="5"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;">* Mod bayaran: sebagai contoh - 'Transfer Fund', 'Bank In' tunai atau cek</span></font></td>
	</tr>
	
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>

	
	<tr>
		<td colspan="5">6. Bayaran hendaklah kepada <strong>CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</strong></td>
	</tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr>
		<td colspan="5">7. Akaun Bank <strong>CIMB ISLAMIC BANK BERHAD</strong>, Akaun No. <strong>8600055032</strong></td>
	</tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr>
		<td colspan="5">8. Sila e-mel kan slip bank atau penyata pindahan bayaran setelah pembayaran dibuat dengan segera ke alamat</td>	
	</tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr>
		<td colspan="5">e-mel berikut;</td>	
	</tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">(i) auni@clab.com.my (Auni Syafinaz)</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">(ii) qistina@clab.com.my (Nur Qistina Addawiah Bt Zain Qist)</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">(iii) fadil@clab.com.my (Muhammad Fadil Bin Amrani)</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr><td colspan="5">(iv) nabila@clab.com.my (Nur Nabila Binti Mohd Badri)</td></tr>
	<tr><td colspan="5">&nbsp;</td>
	<tr><td colspan="5">9. Resit akan dikeluarkan setelah slip bayaran diterima bersama borang ini dan dokumen yang diperlukan dan pengesahan bayaran terima didalam
						akaun sehari selepas tarikh slip bank atau slip pengesahan pindahan wang</td></tr>
	<tr><td colspan="5">&nbsp;</td></tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr><td colspan="5" align="center"><span style="font-size: 7pt; font-family: &quot;Arial&quot;;">Level 2, Annexe Block, Melaka Milenium 8, Jln Damanlela, Bukit Damansara, 50490 Kuala Lumpur. Tel: 03-2095 9566</span></font></td></tr>
</table>
</p>
</body>
</html>
