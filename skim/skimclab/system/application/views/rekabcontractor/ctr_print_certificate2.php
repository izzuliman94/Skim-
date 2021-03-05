<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SKIM - Perakuan Pendaftaran <?php echo $ctr->ctr_clab_no;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.data {font-style:normal;font-weight:bold;font-size:1.5em;font-family :arial;}
.data1 {font-style:normal;font-weight:bold;font-size:1.0em;font-family :arial;}
.data2 {font-style:normal;font-weight:bold;font-size:1.3em;font-family :arial;color:#000000;}
.data3 {font-style:normal;font-weight:bold;font-size:2.5em;font-family:arial;color:#FB0004;}
body {
	background-image:url("<?php echo base_url();?>images/bg.png");
	background-size:300%;
	background-repeat: no-repeat;
	background-size: cover;
</style>
</head>

<body>

	
<p>
  <?php $x = 0;
      $y = 0;
?>
</p>
<p><img width=200 src="<?php echo base_url();?>images/clab_logo.png"</p><img width=200 align=right src="<?php echo base_url();?>images/cidblogo.png"
																			 
<p>
<div style="position:absolute;top:<?php echo (string)($y + 150)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data3" >PERAKUAN PENDAFTARAN CLAB</span></td>
		</tr>
	</table>
</div>

	<div style="position:absolute;top:<?php echo (string)($y + 250)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">Adalah dengan ini diperakui bahawa kontraktor yang dinamakan di bawah ini telah berdaftar dengan Construction Labour Exchange Centre Berhad.</span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 320)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">Nama Syarikat &emsp;&emsp;&emsp;&emsp;: &emsp;&emsp;&emsp;&emsp;	<?php echo $ctr->ctr_comp_name;?></span></td>
		</tr>
	</table>
</div>	

<div style="position:absolute;top:<?php echo (string)($y + 380)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">No Pendaftaran &emsp;&emsp;&emsp;&nbsp;:&emsp;&emsp;&emsp;&emsp; 	<?php echo $ctr->ctr_clab_no;?></span></td>
		</tr>
		<tr>
			<td align="center"><span class="data"></span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 440)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">Tarikh Daftar &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;:&emsp;&emsp;&emsp;&emsp; 	<?php echo date('d-m-Y', strtotime($ctr->ctr_datereg));?></span></td>
		</tr>
		<tr>
			<td align="center"><span class="data"></span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 500)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">Gred CIDB&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&emsp;&emsp;&emsp;&emsp; 	<?php echo $ctr->ctr_grade;?></span></td>
		</tr>
		<tr>
			<td align="center"><span class="data"></span></td>
		</tr>
	</table>
</div>	

<div style="position:absolute;top:<?php echo (string)($y + 480)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">
    
    <tr>
      <!--td align="center"><span class="data2"><img width=300 src="<?php echo base_url();?>images/CEO Digital Signature copy.png"</td-->
		
    </tr>
  </table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 630)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">
    
    <tr>
      <!--td align="center"><span class="data2">Chief Executive Officer</td-->
    </tr>
	  <tr>
      
    </tr>
  </table>
</div>
</p>


	

	

<div style="position:absolute;top:<?php echo (string)($y + 700)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1">Tarikh Mula Berkuatkuasa : <?php echo date('d-m-Y', strtotime($ctr->ctr_validdate));?></td>
		</tr>
		<tr>
			
		</tr>

	</table>
</div>
	
<div style="position:absolute;top:<?php echo (string)($y + 750)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data1"> Tarikh Habis Tempoh Perakuan : <?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?></span></td>
		</tr>
		
		<tr>
			
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 800)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">	
		<tr>
			<td align="left"><span class="data1">Status : Aktif</td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 890)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<!--tr>
			<td align="center"><span class="data2"><?php echo date('d-m-Y', strtotime($ctr->ctr_clabexp_date));?></span></td>
		</tr-->
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 900)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="right"><span class="data2"><?php
			include "phpqrcode/qrlib.php";
			QRcode::png($ctr->ctr_clab_no.'/Reg/2020', 'images/qr_ap.png');
			?>
	          <img width=180 src="<?php echo base_url();?>images/qr_ap.png" ></span></td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 900)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data2"><img width=200 src="<?php echo base_url();?>images/CommonSeal2.png" ></span></td>
		</tr>
	</table>
</div>
	<div style="position:absolute;top:<?php echo (string)($y + 1060)."px"; ?>;left:<?php echo (string)($x-20 )."px"; ?>">
	<table width="790px" border="0">
		
		<tr>
			<td align="right"><span class="data1">Tarikh : <?php echo date('d-m-Y');?></span></td>
		</tr>
	</table>
</div>




</body>
</html>