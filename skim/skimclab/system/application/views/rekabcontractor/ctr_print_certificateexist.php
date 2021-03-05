<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SKIM - Approval Letter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.data {font-style:normal;font-weight:bold;font-size:1.3em;font-family:Bookman Old Style;color:#000000;}
.data2 {font-style:normal;font-weight:bold;font-size:0.9em;font-family:Bookman Old Style;color:#000000;}
body {
	background-image: url(../../../../images/BG.png);
}
</style>
</head>

<body bgcolor="#FFFFFF">

	
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
			<td align="center"><span class="data"><img align=middle width=500 src="<?php echo base_url();?>images/Cert.png" ></span></td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 230)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data"><?php echo $ctr->ctr_comp_name;?></span></td>
		</tr>
	</table>
</div>	

<div style="position:absolute;top:<?php echo (string)($y + 280)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data"><img align=middle width=500 src="<?php echo base_url();?>images/regno.png" ></span></td>
		</tr>
		<tr>
			<td align="center"><span class="data"><?php echo $ctr->ctr_clab_no;?></span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 400)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data"><img align=middle width=500 src="<?php echo base_url();?>images/regno2.png" ></span></td>
		</tr>
	</table>
</div>	

<div style="position:absolute;top:<?php echo (string)($y + 480)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">
    
    <tr>
      <td align="center"><span class="data2"><img width=300 src="<?php echo base_url();?>images/CEO Digital Signature copy.png"</td>
    </tr>
  </table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 630)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">
    
    <tr>
      <td align="center"><span class="data2"><img src="<?php echo base_url();?>images/ceodate.png"</td>
    </tr>
  </table>
</div>
</p>


	

	
<div style="position:absolute;top:<?php echo (string)($y + 700)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y');?></span></td>
		</tr>
	</table>
</div>

<div style="position:absolute;top:<?php echo (string)($y + 750)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2"><img src="<?php echo base_url();?>images/validfrom.png"</span></td>
		</tr>
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_validdate));?></span></td>
		</tr>
		
	</table>
</div>
	
<div style="position:absolute;top:<?php echo (string)($y + 820)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2">to</span></td>
		</tr>
		
		<tr>
			
		</tr>
	</table>
</div>
	
<div style="position:absolute;top:<?php echo (string)($y + 850)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_clabexp_date));?></span></td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 840)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="left"><span class="data2"><?php
			include "phpqrcode/qrlib.php";
			QRcode::png($ctr->ctr_clab_no.'/Reg/2020', 'images/qr_ap.png');
			?>
	          <img src="<?php echo base_url();?>images/qr_ap.png" ></span></td>
			<td align="right"><span class="data2"><img width=180 src="<?php echo base_url();?>images/CommonSeal2.png" ></span></td>
		</tr>
	</table>
</div>


</body>
</html>