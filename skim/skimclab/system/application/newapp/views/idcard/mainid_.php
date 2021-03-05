<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>/css/calendar-win2k-cold-1.css" title="win2k-cold-1" />

  <!-- main calendar program -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar.js"></script>

  <!-- language for the calendar -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar-en.js"></script>

  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar-setup.js"></script>
  <script>
  function openemp(){
		
		var url = "<?php echo site_url('contIDcard/labour_list');?>"
		window.open(url, 'Labour list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
		
  function printme(){
        var id = document.frmidcard.wkrid.value;
		var passno = document.frmidcard.txtpass.value;
	
        var url = "<?php echo site_url('contIDcard/print_card');?>/" + passno + "/" + id
	   	window.open(url, 'Labour list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
  }		
  </script>
</head>
<body>
<form name="frmidcard" method="post">
<table width="60%" align="center">
<tr>
    <td width="20%">Choose Labor</td>
	<td width="80%"> <input type="text" size="60" name="empname" readonly/>
   <input type="hidden" size="100" name="selemp"/>
   <input type="hidden" name="wkrid" />
   <input type="button" value="..." onclick="openemp()"/></td>
</tr>
</table>
<br>
<table width="50%" align="center">
<tr>
    <td colspan="3" align="center">KAD PERDAFTARAN PERSONAL BINAAN</td>	
</tr>
<tr>
  <td>Nama</td>
  <td>:<input type="text" name="txtname" size="40"/></td>
  <td>&nbsp;</td>
</tr>
<tr>
    <td width="21%">K.P/Passport</td>
	<td width="61%">:<input type="text" name="txtpass" size="40"/></td>
    <td width="18%">&nbsp;</td>
</tr>
<tr>
    <td>Warganegara</td>
	<td>:<input type="text" name="txtwrg" size="40"/></td>
    <td width="18%">&nbsp;</td>
</tr>
<tr>
    <td>Sah Sehingga</td>
	<td>:<input type="text" name="txtdateexp" size="40"/></td>
    <td width="18%">&nbsp;</td>
</tr>
</table>
<br />
<table width="60%" align="center">
<tr>
    <td align="center"><input type="button" value="Print" onclick="printme()"/></td>
</tr>
</table>
</form>
</body>
</script>