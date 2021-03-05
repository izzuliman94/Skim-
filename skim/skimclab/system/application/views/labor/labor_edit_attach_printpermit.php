<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Print Permit</title>
</head>

<body>

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="89%" id="AutoNumber4" height="24">
    <tr>
      <td width="100%" height="24">&nbsp;</td>
    </tr>
  </table>
  </center>
</div>
<div align="center">
  <center>
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="89%" id="AutoNumber1" height="289">
      <tr> 
        <td height="31">&nbsp;</td>
        <td height="31">&nbsp;</td>
      </tr>
      <tr> 
        <td height="31">&nbsp;</td>
        <td height="31">&nbsp;</td>
      </tr>
      <tr> 
        <td width="50%" height="31"> <p align="center"><b></b></td>
        <td width="50%" height="31"> <p align="center"><b></b></td>
      </tr>
      <?php 
	foreach($permitFileList->result() as $permitFile){
		?>
      <tr> 
        <td height="19" colspan="2"> 
        	<p align="center"><img src="<?php echo base_url() . $permitFile->upload_filepath;?>" width="470" height="300"></p>
        	<p align="center"><?php echo $permitFile->upload_filetype;?>
      </tr>
      <tr> 
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
      </tr>
      <tr> 
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
      </tr>
      <tr> 
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
      </tr>
      <?php } ?>
    </table>
  </center>
</div>

</body>
</html>
