<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
.style1 {
	text-align: left;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	height:30px;
	line-height:0.5;
	
}
.head1 {
	font-family: verdana;
	font-weight: bold;
	font-size: large;
	text-align: center;
}
.head2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: light;
	font-size: medium;
	text-align: center;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height:1.0;
}
.print {	font-size: 12px;
}
.style3 {font-family: verdana; font-weight: bold; font-size: medium; text-align: center; }
.style4 {font-family: Arial, Helvetica, sans-serif; font-weight: light; font-size: small; text-align: center; }
.style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
</style>
</head>
<body>
<table width="650px" height="527" border="0" align="center" cellpadding="5" cellspacing="5" style="text-align: left;">
<tr>
	<td width="600" colspan="2" align="center" style="height: 40px"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></td>
</tr>
<tr>
    <td colspan="2" class="style3" >Construction Labour Exchange Centre Berhad</td>
</tr>
<tr>
    <td colspan="2" class="style4" >Surat Akuan Penerimaan</td>
</tr>


<tr>
    <td colspan="2">
   	  <TABLE  border="1" width="100%" height="261" cellspacing="5" cellpadding="5" style="border-collapse: collapse;" bordercolor="#000000">
<tr>
    			<td>
	    <table width="100%">
	    	<tr>
			    <td width="17%" class="style2" >&nbsp;Tarikh / Masa&nbsp;</td>
			    <td width="28%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">:&nbsp;<?php echo date('d-m-Y G:i:a') ?></td>
			    <td width="10%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">Bil Pekerja </td>
			    <td width="16%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">: <?php echo $woRow->wo_fcl_total;?> </td>
			    <td width="11%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">Warganegara </td>
	    	    <td width="18%" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;">: <?php echo $woRow->cty_desc;?></td>
	    	</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;No Pengesahan</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtwono" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_num?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;Nama Syarikat</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtsyarikat" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->ctr_comp_name?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;Nama Majikan</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtmajikan" style="width:300px; text-align:left;border:thin" value="<?php echo $woRow->ctr_contact_name?>" readonly /></td>
			</tr>
			
			<tr>
			    <td height="30px" class="style2">&nbsp;Nama Penghantar	</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txthantar" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_name?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;No. KP Penghantar</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtichantar" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_ic?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;No. Telefon Penghantar</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtphone" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_sender_contact?>" readonly /></td>
			</tr>
			<tr>
			    <td height="30px" class="style2">&nbsp;Attending Officer</td>
			    <td colspan="5">:&nbsp;<input type="text" name="txtbil" style="width:400px; text-align:left;border:thin" value="<?php echo $woRow->wo_attn_officer?>" /></td>
			</tr>
	    </table>	    </td>
	    </tr>
      </table>    
      <table style="border-collapse: collapse;" bordercolor="#000000" width="757" align="center" cellpadding="5" cellspacing="5" border="1">
        <tr>
          <td height="30px" colspan="2" bordercolor="#000000" class="style2" ><div align="center"><strong>Dokumen</strong></div></td>
          <td height="30px" colspan="2" bordercolor="#000000" class="style2" ><div align="center"><strong>Pembayaran</strong></div></td>
        </tr>
        <tr>
          <td width="55" height="30px" class="style2" ><div align="center"><span class="print">
              <input type="checkbox" name="chkjim" value="1"  <?php if($woRow->doc_ori_passport == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td width="215"><p class="style2" >Passport Asal</p></td>
          <td width="55"><div align="center"><span class="print">
              <input type="checkbox" name="chkjim6" value="1" <?php if($woRow->pay_imigration == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td width="239"><span class="style2">Ketua Pengarah Imigresen Malaysia 
            :
              <input type="text" name="txtmajikan2" style="width:300px; text-align:left;border:thin" value="<?php echo $woRow->pay_imigration_detail?>" readonly="readonly" />
          </span></td>
        </tr>
        <tr>
          <td height="30px" ><div align="center"><span class="print">
              <input type="checkbox" name="chkjim2" value="1"  <?php if($woRow->doc_fomema == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><span class="style2">FOMEMA Slip</span></td>
          <td><div align="center"><span class="print">
              <input type="checkbox" name="chkjim7" value="1"  <?php if($woRow->pay_clab == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><p class="style2">Construction Labour Exchange Centre Berhad</p></td>
        </tr>
        <tr>
          <td height="30px" ><div align="center"><span class="print">
              <input type="checkbox" name="chkjim3" value="1"  <?php if($woRow->doc_extplks == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><p class="style2">Surat Permohonan Pembaharuan Permit</p></td>
          <td><div align="center"><span class="print">
              <input type="checkbox" name="chkjim5" value="1"  <?php if($woRow->pay_ins_guarante == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><span class="style2">Lonpac Insurance Berhad (<em>Insurance Guarantee</em> )</span></td>
        </tr>
        <tr>
          <td height="30px" class="style1"><div align="center"><span class="print">
              <input type="checkbox" name="chkjim4" value="1"  <?php if($woRow->doc_details == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><span class="style2">Senarai Waris Pekerja</span></td>
          <td><div align="center"><span class="print">
            <input type="checkbox" name="chkjim8" value="1"  <?php if($woRow->pay_ins_hospital == '1') echo "CHECKED";?> disabled="disabled"/>
          </span></div></td>
          <td><span class="style2">Lonpac Insurance Berhad</span><span class="style5"> (<em>FWHS</em>)</span></td>
        </tr>
        <tr>
          <td height="30px" class="style2"><div align="center">Lain - Lain</div></td>
          <td><input type="text" name="txtmajikan" style="width:300px; text-align:left;border:thin" value="<?php echo $woRow->doc_others_detail?>" readonly /></td>
          <td><div align="center"><span class="style2">Lain - Lain</span></div></td>
          <td><input type="text" name="txtmajikan" style="width:300px; text-align:left;border:thin" value="<?php echo $woRow->pay_others_detail?>" readonly /></td>
        </tr>
        <tr>
          <td colspan="4" height="30px" class="style1"><p align="center"> <span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #B09090;">* Resit rasmi dan tax invois akan dikeluarkan oleh ibu pejabat CLAB. Sebarang pertanyaaan, sila rujuk pihak kewangan ibu pejabat.</span></p>
          <p align="center"></p></td>
        </tr>
      </table>
      <table width="756" border="1" align="center" cellpadding="5" cellspacing="5" style="border-collapse: collapse;" bordercolor="#000000">
        <tr>
          <td width="215" style="height: 40px"><p class="style2">&nbsp;</p>
            <p class="style2">&nbsp;</p>
            <p class="style2">........................................................</p>
            <p align="left" class="style2">Tandatangan Penghantar</p>
            <p class="style2">Tarikh : <span style="font-family: Arial, Helvetica, sans-serif;font-size: 12px;"><?php echo date('d-m-Y') ?></span></p></td>
          <td width="249" style="height: 34px"><p class="style2">&nbsp;</p>
            <p class="style2">&nbsp;</p>
            <p class="style2">.......................................................</p>
            <p class="style2">Tandatangan Penerima Cawangan </p>
          <p class="style2">Tarikh :</p></td>
          <td width="234" style="height: 34px"><p class="style2">&nbsp;</p>
            <p class="style2">&nbsp;</p>
            <p class="style2">......................................................</p>
            <p class="style2">Tandatangan Penerima Ibu Pejabat </p>
            <p class="style2">Tarikh :</p></td>
        </tr>
      </table>      
      <table width="631" border="0" align="center" cellpadding="5" cellspacing="5" style="border-collapse: collapse;" bordercolor="80000">
        <tr>
          <td><div align="center"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 9px; color: #B09090;">Maklumkan kepada kami no. rujukan apabila berurusan dengan kami</span></div></td>
        </tr>
      </table>      </td>
</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
