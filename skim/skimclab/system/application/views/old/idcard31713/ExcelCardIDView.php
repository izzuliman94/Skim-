<?php 
//header("Content-type: application/octet-stream"); 
//header("Content-Disposition: attachment; filename=excelsummmary(All).xls"); 
//header("Pragma: no-cache"); 
//header("Expires: 0"); // this is my export to excel 
?>
<style type="text/css">
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
.style5 {vertical-align: text-bottom; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 9px; height: 30px; }
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style10 {vertical-align: text-bottom; text-align: center; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 9px; height: 30px; }
.style11 {font-family: Verdana, Arial, Helvetica, sans-serif}
</style>
<table width="95%" border="1">
<tr>
<td width="7%" align="center" class="style5"><div align="center" class="style8">No</div></td>
<td width="19%" align="center" class="style5"><div align="center" class="style8">Card URL</div></td>
<td width="6%" align="center" class="style5"><div align="center" class="style8">Name</div></td>
<td width="7%" align="center" class="style5"><div align="center" class="style8">Passport No</div></td>
<td width="9%" align="center" class="style5"><div align="center" class="style8">Country</div></td>
<td width="7%" align="center" class="style5"><div align="center" class="style8">Permit Date</div></td>
<td width="45%" align="center" class="style5"><div align="center" class="style8">Photo File</div></td>
</tr>
  <?php if($summary->num_rows() == 0){ ?>
<tr>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  <td class="style5">&nbsp;</td>
  </tr>
<?php }else{ 
      $i = 1;
	  foreach($summary->result() as $sum){
      $val = 000000 + $i++;
?>
<tr>
  <td class="style5"><div align="center" class="style11"><?php echo $val?></div></td>
  <td class="style5"><div align="center" class="style11">http://clabid.sytes.net/<?php echo $sum->wkr_id?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->wkr_name?></div></td>
  <td class="style5"><span class="style11"><?php echo $sum->wkr_passno?></span></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->cty_desc?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->wkr_permitexp?></div></td>
  <td class="style5"><div align="center" class="style11"><?php echo $sum->upload_destfilename?></div></td>
  </tr>
<?php }} ?>
</table>
<p>&nbsp;</p>
