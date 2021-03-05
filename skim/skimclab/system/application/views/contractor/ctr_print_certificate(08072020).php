<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SKIM - Certificate Of Registration <?php echo $ctr->ctr_clab_no;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.data {font-style:normal;font-weight:bold;font-size:1.5em;font-family:Bookman Old Style;color:#000000;}
.data2 {font-style:normal;font-weight:bold;font-size:1.3em;font-family:Bookman Old Style;color:#000000;}
.data3 {font-style:normal;font-weight:bold;font-size:2.5em;font-family:Bookman Old Style;color:#FB0004;}
body {
	background-image:url("<?php echo base_url();?>images/bg.png");
	background-size:150%;
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
			<td align="center"><span class="data3" >Certificate of Registration</span></td>
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
			<td align="center"><span class="data2">Registration No :</span></td>
		</tr>
		<tr>
			<td align="center"><span class="data"><?php echo $ctr->ctr_clab_no;?></span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 400)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data">has been registered with </span></td>
		</tr>
		<tr>
			<td align="center"><span class="data">Construction Labour Exchange Centre Berhad </span></td>
		</tr>
	</table>
</div>	
<div style="position:absolute;top:<?php echo (string)($y + 480)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">   
    <tr>
      <!--td align="center"><span class="data2"><img width=300 src="<?php echo base_url();?>images/CEO_Digital Signature_copy.png"</span></td-->
		<td align="center"><span class="data2"><?php 
		    include "phpqrcode/qrlib.php";
			QRcode::png($ctr->ctr_clab_no.'/Reg/2020', 'images/qr_ap.png');
			?>
	          <img src="<?php echo base_url();?>images/qr_ap.png" ></span></td>
    </tr>
  </table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 630)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
  <table width="790px" border="0">
    
    <tr>
      <!--td align="center"><span class="data2">Chief Executive Officer</td-->
    </tr>
	  <tr>
      <td align="center"><span class="data2">Date :</td>
    </tr>
  </table>
</div>
</p>		
<div style="position:absolute;top:<?php echo (string)($y + 660)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y');?></span></td>
		</tr>
	</table>
</div>

<div style="position:absolute;top:<?php echo (string)($y + 820)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2">Valid From :</td>
		</tr>
		<tr>
			
		</tr>
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_validdate));?></span></td>
		</tr>
		
	</table>
</div>
	
<div style="position:absolute;top:<?php echo (string)($y + 870)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2"> to </span></td>
		</tr>
		
		<tr>
			
		</tr>
	</table>
</div>
	
<div style="position:absolute;top:<?php echo (string)($y + 890)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="center"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_clabexp_date));?></span></td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 950)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			
			<td align="right"><span class="data2"><img width=180 src="<?php echo base_url();?>images/CommonSeal2.png" ></span></td>
		</tr>
	</table>
</div>


</body>
</html>