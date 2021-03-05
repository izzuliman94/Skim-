<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Login as: </title>
<!--link href="<?php echo base_url();?>css/sippsstyle.css" rel="stylesheet" type="text/css" /-->

<style type="text/css">
.titlehdr {
	font:normal 20px arial, verdana;
	color:#c00;
	/*border-right:1px solid #c00;
	//border-left:1px solid #c00;
	border-top:1px solid #c00;
	border-bottom:1px solid #c00;*/
	margin-bottom:40px;	
	text-align:center;
}
.bodybg {
	background-image:url(./images/bg_lateral.gif);
	background-repeat:repeat-x;
	margin: 0px;
	font: 11px verdana, sans-serif;
	color: #333333; 
	background-color: #f8fafc
	}
	
.style2 {
	text-align: center;
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: 14px;
	color:#000080;
	font-weight:bold;
}
.footer{
	font:normal 11px Arial;
	color:#808080;
	text-align:center;
	
}
.textbox {
	font-family: verdana; 
	font-size: 12px; 
	color:#0000FF; 
	border-style:solid; 
	border-width:1px; 
	border-color:#FFA500; 
	height:20px;
	border-radius: 5px;

}
.txtlabel {
	font-family: Verdana, Geneva, Tahoma, sans-serif;
	font-size: 12px;
	color:#708090;
	font-weight:bold;
}

</style>
</head>

<body class=bodybg>
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
    //echo "<strong>" . $line . "</strong";
    fclose($fhr);
}
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
<table width="600px" border="0" height="50px" CELLPADDING='0' CELLSPACING='0' style='border-collapse: collapse' bordercolor='#999999'>
	<tr>
		<td align="center"><img src="<?php echo base_url();?>images/clab_logo.png" /></td>
	</tr>
	<tr><td height="20px">&nbsp;</td></tr>
	<tr>
		<td class="titlehdr">SISTEM KENDALIAN PEKERJA IMIGRAN (SKIM)</td>
	</tr>
</table>

<table width="375" border="0" align="center">
<form name="loginform" action="<?php echo site_url('contLogin/login');?>" method="post">
  <!--DWLayoutTable-->
  <tr>
    <th colspan="3" height="40px"><div align="center">Please Login to Proceed</div></th>
  </tr>
  <tr>
    <td width="50%"><div align="right" class="txtlabel"><strong>Login ID: </strong></div></td>
    <td width="50%">
        <div align="left">
          <input type="text" name="username" class="textbox" style="width: 90px" />
        </div></td>
    <!--td width="7%">&nbsp;</td-->
  </tr>
  <tr>
    <td><div align="right" class="txtlabel"><strong>Password: </strong></div></td>
    <td>
        <div align="left">
          <input type="password" name="password" class="textbox" style="width: 90px" />
        </div></td>
    <!--td>&nbsp;</td-->
  </tr>
  <tr>
    <!--td>&nbsp;</td-->
    <td colspan="2" style="height: 53px"><label>
      <div align="center">
        <input type="submit" name="Login" value=" Login " style="font-weight: 700"/>
      </div>
    </label></td>
    <!--td style="height: 53px"></td-->
  </tr>
  <tr>
    <td colspan="2" align="CENTER"><font color="red"><?php if(isset($errorMsg)) echo $errorMsg;?></font></td>
  </tr>
  </form>
</table>

<table width="600px" border="0" CELLPADDING='0' CELLSPACING='0' style='border-collapse: collapse; height: 43px;' bordercolor='#999999'>
	
	<tr><td class="style2" style="height: 30px">CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD</td></tr>
	<tr><td class="footer"><?php echo $line; ?></td></tr>
	<!--tr><td class="footer">Best viewed with 1024x768 screen resolution.<br><b>Powered by eqlazbiz</b></td></tr>
	<!--tr><td class="footer">Best viewed using Mozilla FireFox with 1024x768 screen resolution.<br><b>Powered by eqlazbiz</b></td></tr-->
</table>

</div>
</body>

</html>
