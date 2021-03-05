<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Akuan Penerimaan</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
body,td,th {
	font-size: 13px;
}
.style7 {font-size: 10px}
.style2 {font-size: 13px}
-->
</style>
</head>

<body>
<div align=center >
<table width="800px" border="0">
 <tr>
   <td colspan="2" align="CENTER" class=print>
     <table width="100%" border="0" cellpadding=0 style='border-style:none'>
       <tr>
         <td width=50% class=print><img src="<?php echo base_url();?>images/clab_logo.png" align="left" width='215' height='60'></td>
         <td width=50% class=print><img src="<?php echo base_url();?>images/logo CIDB.png" align="right" width='215' height='60'></td>
         </tr>
       </table>
     <table width="100%" border="0">
       <tr>	
         <td class="print" height=80 colspan="4" align="CENTER"><h2>Akuan Penerimaan</h2></td>
         </tr>
       <tr>	
         <td class="print" width=200><span class="style2">No. Permohonan</span></td>
         <td class="print" width=10>:</td>
         <td class="print" width=254><span class="style2"><?php echo $woRow->woyear.'/G1G3/'.$woRow->wo_id;  ?></span></td>
         <td width="312" rowspan=4 align=center valign=top class="print">
           <?php
			include "phpqrcode/qrlib.php";
			QRcode::png($woRow->woyear.'/G1G3/'.$woRow->wo_id, 'images/qr_ap.png');
			?>
           <img src="<?php echo base_url();?>images/qr_ap.png" width="71" height="77" >
           </td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Nama Pegawai Mencetak (CLAB)</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $this->session->userdata('empname');?></span></td>
         <!--td class="print"></td-->
         </tr>
       <tr>
         <td class="print"><span class="style2">Tarikh/Masa Kelulusan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo date('d/m/Y g:i A') ?></span></td>
         <!--td class="print"></td-->
         </tr>
       <tr>
         <td class="print"><span class="style2">Jenis Permohonan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2">Baru</span></td>
         <!--td class="print"></td-->
         </tr>
       <tr>
         <td class="print"><span class="style2">No. Pendaftaran</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->ctr_comp_regno?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Nama Majikan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->ctr_comp_name?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Gred Majikan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->ctr_grade?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Alamat Majikan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->ctr_addr1?>&nbsp;<?php echo $woRow->ctr_addr2?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print">&nbsp;</td>
         <td class="print">&nbsp;</td>
         <td class="print"><span class="style2"><?php echo $woRow->ctr_addr3?>&nbsp;<?php echo $woRow->ctr_pcode?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print">&nbsp;</td>
         <td class="print">&nbsp;</td>
         <td class="print"><span class="style2"><?php echo $woRow->state_name?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Nama Penghantar</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->wo_sender_name?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">No. Pengenalan</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2"><?php echo $woRow->wo_sender_ic?></span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Sektor</span></td>
         <td class="print">:</td>
         <td class="print"><span class="style2">Pembinaan</span></td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print"><span class="style2">Catatan</span></td>
         <td class="print">:</td>
         <td class="print">&nbsp;</td>
         <td class="print"></td>
         </tr>
       <tr>
         <td class="print" height=50>&nbsp;</td>
         <td class="print">&nbsp;</td>
         <td class="print"></td>
         <td class="print"></td>
         </tr>
       <!--tr>
			<td class="print" height=50>Notis</td>
			<td class="print">:</td>
			<td class="print"></td>
			<td class="print"></td>
		</tr-->
       
       </table>
  <table width="100%" border="1" cellpadding=3 style='border-style:none' bordercolor='#ccc'>
    <tr>
      <td colspan=5 class="print" height=60px align=center><b><span class="style2">PERMOHONAN PENGAMBILAN PEKERJA ASING<br>(KONTRAKTOR G1-G3)</span></b></td>
      </tr>
    <tr>
      <td class="print" WIDTH=50% colspan=4><span class="style2"><b>&nbsp;&nbsp;&nbsp;DILULUSKAN</b></span></td>
      
      </tr>
    <tr>
      <td class="print" colspan=4>
        <table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
          <tr>
            <td class=print width=150><span class="style2">JUMLAH DILULUSKAN</span></td>
            <td class=print width=10>:</td>
            <td class=print align=left><?php echo $woRow->wo_fcl_total_apv?></td>
            </tr>
          <tr>
            <td class=print ><span class="style2">TARIKH SAH SEHINGGA</span></td>
            <td class=print >:</td>
            <td class=print align=left><?php 
						$date = new DateTime(date("d-m-Y"));
						$date->modify('+30 day');
						$tomorrowDATE = $date->format('d-m-Y');
						echo $tomorrowDATE;
						?></td>
            </tr>
          <tr>
            <td class=print >&nbsp;</td>
            <td class=print >&nbsp;</td>
            <td class=print align=left>&nbsp;</td>
            </tr>
          </table>
        </td>
      
      </tr>
    <tr> &nbsp; </tr>
    <tr>
      <td class="print" height=100px>
        <table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
          <tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
          <tr><td class="print" align=center width=50%>___________________<br>Urusetia CLAB</td><tr>
            </table>
        </td>
      <!--td class="print" height=100px>
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>CIDB</td>
				</table>
			</td-->
      <!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
      <!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
      <!--td class="print">
				<table width="100%" border="0" style='border-style:none' bordercolor='#ccc'>
					<tr><td class="print" colspan=1 height=50px>&nbsp;</td></tr>
					<tr><td class="print" align=center width=50%>___________________<br>KDN</td></tr>
				</table>
			</td-->
      
      </tr>
    <!--tr>
			<td class="print" colspan="2"><strong>Verified by</strong></td>
			<td class="print"><strong>Approved by</strong></td>
		</tr>
		<tr>
			<td class="print"><br /><br /><br /><br /><br /></td>
			<td class="print">&nbsp;</td>
			<td class="print">&nbsp;</td>
		</tr>
		<tr>
			<td class="print">Rohaidah Bt. Sapuan</td>
		  <td class="print">Mardziyah Bt. Mohd Sazili</td>
		  <td class="print">Abdul Rafik Abdul Rajis</td>
		</tr-->
    </table>
     </td>
 </tr>
 <tr>
   <td width=17% class=print>&nbsp;</td>
   <td class=print  >&nbsp;</td>
 </tr>
 <tr>
   <td width=17% class=print>&nbsp;</td>
   <td class=print  >&nbsp;</td>
 </tr>
 <tr>
   <td width=17% rowspan="3" class=print><img src="<?php echo base_url();?>images/SGS_ISO.jpg" width='128' height='60' /></td>
   <td class=print  ><span class="style7">Ibu Pejabat : Level 2, Annexe Block, Menara Milenium, No 8, Jalan Damanlela, Bukit Damansara 50490 Kuala Lumpur</span></td>
 </tr>
 <tr>
   <footer>
			<td width=83% class=print  ><span class="style7">Cawangan Pulau Pinang : 12, Jalan Todak 5, Pusat Bandar Seberang Jaya, 13700 Prai , Pulau Pinang</span></td>
			
	</footer></tr>
 <tr>
   <td class=print  ><span class="style7">Cawangan Johor : C/O CIDB Johor, Lot 2067, Batu 3, Jalan Tampoi 81200 Johor Bahru, Johor</span></td>
 </tr>
 </table>
</div>
</body>
</html>
