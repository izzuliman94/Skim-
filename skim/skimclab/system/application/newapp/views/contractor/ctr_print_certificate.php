<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SKIM - Approval Letter</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.data {font-style:normal;font-weight:bold;font-size:1.3em;font-family:Bookman Old Style;color:#000000;}
.data2 {font-style:normal;font-weight:bold;font-size:0.9em;font-family:Bookman Old Style;color:#000000;}
</style>
</head>

<body bgcolor="#FFFFFF">

<?php $x = 0;
      $y = 0;
?>
<!--<div style="position:absolute;top:<?php echo (string)$y; ?>;left:<?php echo (string)$x; ?>"><img src="<?php echo base_url();?>images/clab_cert.jpg" ALT=""></div>-->
<div style="position:absolute;top:<?php echo (string)($y + 40)."px"; ?>;left:<?php echo (string)($x + 520)."px"; ?>"><span class="data"><?php echo $ctr->ctr_clab_no;?></span></div>
<div style="position:absolute;top:<?php echo (string)($y + 460)."px"; ?>;left:<?php echo (string)($x)."px"; ?>">
	<table width="790px" border="0">
		<tr>
			<td align="RIGHT"><span class="data"><?php echo $ctr->ctr_comp_name;?></span></td>
		</tr>
	</table>
</div>
<div style="position:absolute;top:<?php echo (string)($y + 810)."px"; ?>;left:<?php echo (string)($x + 672)."px"; ?>"><span class="data2"><?php echo date('j F Y');?></span></div>
<div style="position:absolute;top:<?php echo (string)($y + 1056)."px"; ?>;left:<?php echo (string)($x + 480)."px"; ?>"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_datereg));?></span></div>
<div style="position:absolute;top:<?php echo (string)($y + 1056)."px"; ?>;left:<?php echo (string)($x + 650)."px"; ?>"><span class="data2"><?php echo date('j F Y', strtotime($ctr->ctr_clabexp_date));?></span></div>
</body>
</html>