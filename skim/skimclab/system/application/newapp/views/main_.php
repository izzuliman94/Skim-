<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Login as: </title>
<link href="<?php echo base_url();?>css/sippsstyle.css" rel="stylesheet" type="text/css" />



</head>

<body>
<?php
$filename="version.txt";
//echo "filename=".$filename;
// read from file
if(!file_exists($filename))
//if(!file_exists("name.txt"))
{
	echo "File not found!\n";
} else {
    //$fhr = fopen("name.txt","r");
    $fhr = fopen($filename,"r");
    $line = fgets($fhr);
    echo "<strong>" . $line . "</strong";
    fclose($fhr);
}
?>
<p>&nbsp;</p>
<table width="375" border="0" align="center">
<form name="loginform" action="<?php echo site_url('contLogin/login');?>" method="post">
  <!--DWLayoutTable-->
  <tr>
    <th colspan="3"><div align="center">Please Login to Proceed : </div></th>
  </tr>
  <tr>
    <td width="39%"><div align="right"><strong>Login ID: </strong></div></td>
    <td width="54%">
        <div align="center">
          <input type="text" name="username" />
        </div></td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Login Password: </strong></div></td>
    <td>
        <div align="center">
          <input type="password" name="password" />
        </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <div align="center">
        <input type="submit" name="Login" value="Login" />
      </div>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="CENTER"><font color="red"><?php if(isset($errorMsg)) echo $errorMsg;?></font></td>
  </tr>
  </form>
</table>
</body>

</html>
