<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
.style1 {
	border-collapse: collapse;
	border-style:solid;
	border-color:black;
	border-width:thin;
}
</style>
</head>
<body>
<br />
<table align="left" border="0" width="800px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="#800000">
	<tr>
		<td>
			<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
				<tr>
					<td width="15%" valign="top">
					<img width="86" height="78"src="<?php echo base_url();?>images/jimlogo.png" /></td>
					<td width="65%">
						<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" class="style1">
							<tr><td height="20px" align="center"><b>JABATAN IMIGRESEN MALAYSIA</b></td></tr>
							<tr><td height="20px" align="center"><b>BORANG PERMOHONAN PAS LAWATAN</b></td></tr>
							<tr><td height="20px" align="center"><i><b>VISIT PASS APPLICATION FORM</b></i></td></tr>
							<tr><td height="20px" align="center">PERATURAN-PERATURAN IMIGRESEN, 1963 [Peraturan 11(12) dan 11(15)]</td></tr>
						</table>
					</td>
					<td width="20%" align="center" valign="bottom">IM. 12 - PIN. 1/97</td>
				</tr>
			</table>
			<br />
			<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
				<tr>
					<td width="80%" valign="top">
						<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
							<tr>
								<td width="20%" height="40px">*Jenis Pas<br />Type of Pass</td>
								<td width="10%">Iktisas<br />Professional</td>
								<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
								<td width="10%">Sosial<br />Social</td>
								<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
								<td width="10%">Berniaga<br />Business</td>
								<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
								<td width="20%">Kerja Sementara<br />Temporary Employment</td>
								<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
							</tr>
							<tr>
								<td height="40px">*Jenis Permohonan<br />Type of Application</td>
								<td ></td>
								<td ></td>
								<td >Baru<br />New</td>
								<td align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_checked.png" /></td>
								<td >Lanjutan<br />Extension</td>
								<td align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
								<td ></td>
								<td ></td>
							</tr>
							<tr>
								<td height="40px" colspan="9" bgcolor="#CCCCCC">A. MAKLUMAT PEMOHON<br />&nbsp;&nbsp;&nbsp;&nbsp;PARTICULARS OF APPLICANT</td>
							</tr>
						</table>
					</td>
					<td width="20%" align="center">
						<table align="center" border="1" width="80%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
							<tr>
								<td align="center" style="height: 115px">Gambar Pemohon<br/>Photograph Of Applicant<br/>(3.5 cm x 5.0 cm)</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br/>
			<table align="center" border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
				<tr>
					<td width="5%" align="right" valign="top">1.&nbsp;</td>
					<td width="95%" colspan="8" valign="top">Nama Penuh (Huruf Besar)<br/>Full Name (Capital Letter)
					&nbsp;&nbsp;&nbsp;<?php echo strtoupper($im12->fcl_name)?>					</td>
				</tr>
				<tr>
					<td align="right" valign="top">&nbsp;</td>
					<td colspan="8" valign="top">Nama</td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td align="right" valign="top">2.&nbsp;</td>
					<td width="10%" valign="top">Jantina<br/>Gender</td>
					<td width="10%" valign="top">Lelaki<br/>Male</td>
					<td width="5%" align="left">
	                <?php if($im12->fcl_gender == '1'){?>
					<img width="25" height="25"src="<?php echo base_url();?>images/im12_checked.png" />
					<?php }else{?>
					<img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" />
					<?php } ?></td>					
					<td width="10%" valign="top">Perempuan<br/>Female</td>
					<td>
					<?php if($im12->fcl_gender == '2'){?>
					<img width="25" height="25"src="<?php echo base_url();?>images/im12_checked.png" />
					<?php }else{?>
					<img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" />
					<?php } ?></td>
					<td width="5%" align="right" valign="top">3.&nbsp;</td>
					<td width="20%" valign="top">Tempat/Negara Lahir<br/>Place/Country of Birth</td>
					<td width="30%" valign="top"><?php echo $im12->fcl_bthplace?></td>	
				</tr>
				<tr><td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				</tr>
				<tr>
					<td align="right" valign="top">4.&nbsp;</td>
					<td valign="top">*Tarikh Lahir<br/>Date of Birth</td>
					<td valign="top"><?php echo date("d M Y",strtotime($im12->fcl_dob))?></td>
					<td valign="top"></td>
					<td valign="top"></td>
					<td valign="top"></td>
					<td align="right" valign="top">5.&nbsp;</td>
					<td valign="top">Warganegara<br/>Nationality</td>
					<td valign="top"><?php echo $im12->nat_desc?></td>	
				</tr>
				<tr>
					<td align="right" valign="top">&nbsp;</td>
					<td valign="top"></td>
					<td valign="top">hari bulan tahun<br/>day month year</td>
					<td valign="top"></td>
					<td valign="top"></td>
					<td valign="top"></td>
					<td align="right" valign="top"></td>
					<td valign="top"></td>
					<td valign="top"></td>	
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="40px" align="left" valign="top" bgcolor="#CCCCCC">B.&nbsp;</td>
					<td valign="top" colspan="8" bgcolor="#CCCCCC">MAKLUMAT PASPORT PERJALANAN / DOKUMEN PERJALANAN<br/>PARTICULARS OF PASSPORT / TRAVEL DOCUMENT</td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="30px" align="right" valign="top">6.&nbsp;</td>
					<td valign="top" colspan="2">Jenis Dokumen Perjalanan<br/>Type of Travel Document</td>
					<td valign="top" colspan="3">PASSPORT</td>
					<td align="right" valign="top">7.&nbsp;</td>
					<td valign="top">Nombor<br/>Number</td>
					<td valign="top"><?php echo $im12->fcl_passno?></td>	
				</tr>
				<tr>
					<td height="30px" align="right" valign="top">8.&nbsp;</td>
					<td valign="top" colspan="2">Tempat / Negara Dikeluarkan<br/>Place / Country of Issue</td>
					<td valign="top" colspan="3"><?php echo $im12->fcl_passissue?></td>
					<td align="right" valign="top">9.&nbsp;</td>
					<td valign="top">**Sah Sehingga<br/>Valid Until</td>
					<td valign="top"><?php echo date("j M Y",strtotime($im12->fcl_passexp))?></td>	
				</tr>
				<tr>
					<td align="right" valign="top">&nbsp;</td>
					<td valign="top" colspan="7"></td>
					<td valign="top">hari bulan tahun<br/>day month year</td>	
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="40px" align="left" valign="top" bgcolor="#CCCCCC">C.&nbsp;</td>
					<td valign="top" colspan="8" bgcolor="#CCCCCC">MAKLUMAT PENGANJUR DI MALAYSIA<br/>PARTICULARS OF SPONSOR IN MALAYSIA</td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="30px" align="right" valign="top">10.&nbsp;</td>
					<td valign="top" colspan="2">Nama Penuh (Huruf Besar)<br/>Full Name (Capital Letter)</td>
					<td valign="top" colspan="6">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</td>
				</tr>
				<tr>
					<td height="30px" align="right" valign="top">11.&nbsp;</td>
					<td valign="top" colspan="2">No. Kad Pengenalan<br/>NRIC</td>
					<td valign="top" colspan="3">&nbsp;</td>
					<td align="right" valign="top">12.&nbsp;</td>
					<td valign="top">No. Telefon<br/>Telephone No.</td>
					<td valign="top">03-2095 9599</td>	
				</tr>
				<tr>
					<td height="30px" align="right" valign="top">13.&nbsp;</td>
					<td valign="top" colspan="2">Alamat<br/>Address</td>
					<td valign="top" colspan="6"><p>LEVEL 2, ANNEXE BLOCK, MENARA MILENIUM, NO 8, JALAN DAMANLELA , BUKIT DAMANSARA, 50490</p>
				    </td>
				</tr>
				<tr>
					<td height="30px" align="right" valign="top">&nbsp;</td>
					<td valign="top" colspan="2">Negeri<br/>State</td>
					<td valign="top" colspan="3">KUALA LUMPUR</td>
					<td valign="top" colspan="3"></td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="40px" align="left" valign="top" bgcolor="#CCCCCC">D.&nbsp;</td>
					<td valign="top" colspan="8" bgcolor="#CCCCCC">KEPERLUAN VISA<br/>VISA REQUIREMENT</td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="30px" align="right" valign="top">14.&nbsp;</td>
					<td valign="top" colspan="2">*Adakah Visa Diperlukan<br/>Visa Requirement</td>
					<td valign="top" colspan="2">Ya<br/>Yes</td>
					<td colspan="2" width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
					<td valign="top">Tidak<br/>No</td>
					<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>	
				</tr>
				<tr>
					<td height="30px" align="right" valign="top">15.&nbsp;</td>
					<td valign="top" colspan="2">*Jenis Visa<br/>Type of Visa</td>
					<td valign="top" colspan="2">Sekali Perjalanan<br/>Single Entry</td>
					<td colspan="2" width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>
					<td valign="top">Berulangkali Perjalanan<br/>Multiple Entry</td>
					<td width="5%" align="left"><img width="25" height="25"src="<?php echo base_url();?>images/im12_box.png" /></td>	
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="30px" align="right" valign="top">&nbsp;</td>
					<td valign="top" colspan="6">Tarikh<br/>Date</td>
					<td valign="top" colspan="2">Tandatangan Pemohon / Penganjur<br/>Signature of Applicant / Sponsor</td>
				</tr>
				<tr><td colspan="9">&nbsp;</td></tr>
				<tr>
					<td height="30px" align="right" valign="top">&nbsp;</td>
					<td valign="top" colspan="7">&#8226; Borang ini hendaklah ditaip. Tandakan (x) dalam petak yang berkenaan.<br/>This form should be typed. Mark (x) in the appropriate box .</td>
					<td valign="top" >** Format Tarikh 99/99/9999<br/>Date Format DD/MM/YYYY</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>
</body>
