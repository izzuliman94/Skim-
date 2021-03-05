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
  function thumbprint(){
        var id = document.frmidcard.wkrid.value;
		var passno = document.frmidcard.txtpass.value;
	
        var url = "<?php echo site_url('contIDcard/thumbprint');?>/" + passno + "/" + id
	   	window.open(url, 'Labour list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
  }	
   function choosedate1(){
        var id = document.frmidcard.wkrid.value;
		var passno = document.frmidcard.txtpass.value;
	
        var url = "<?php echo site_url('contIDcard/cardidlist1');?>/" + passno + "/" + id
	   	window.open(url, 'Labour list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
  }	
  
   function choosedate2(){
        var id = document.frmidcard.wkrid.value;
		var passno = document.frmidcard.txtpass.value;
	
        var url = "<?php echo site_url('contIDcard/cardidlist2');?>/" + passno + "/" + id
	   	window.open(url, 'Labour list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
  }	
  </script>
</head>
<body>

<form action="<?php echo site_url();?>/contIDcard/AddNewFCL" method="POST" name="frmidcard" id="AddNewFCL" onsubmit="return validate();">

<!--table width="60%" align="center">
<tr>
    <td width="20%">Choose Labor</td>
	<td width="80%"> <input type="text" size="60" name="empname" readonly/>
   <input type="hidden" size="100" name="selemp"/>
   <input type="hidden" name="wkrid" />
   <input type="button" value="..." onclick="openemp()"/></td>
</tr>
</table-->
<br />
<table width="63%" align="center">
<tr>
    <td colspan="3" align="center">KAD PENDAFTARAN PERSONEL BINAAN</td>	
</tr>
<tr>
  <td>QR Code URL</td>
  <td>http://clabid.sytes.net/
    <input name="wkrid" type="text" /></td>
  <td align="center">&nbsp;</td>
</tr>
<tr>
  <td>Nama</td>
  <td><input type="text" name="txtname" size="48"/></td>
  <td><input type="button" value="..." onclick="openemp()"/>
    <input type="hidden" size="100" name="selemp"/>
    <input type="hidden" size="100" name="selphoto"/></td>
</tr>
<tr>
    <td>Passport</td>
	<td>
	<input type="text" name="txtpass" size="48"/></td>
    <td width="20%"><input type="submit" name=" Save " value=" Add And Save " onclick="return confirm('Are you sure you want to save?');"/></td>
</tr>
<tr>
    <td>Warganegara</td>
	<td><input type="text" name="txtwrg" size="48"/></td>
	<td width="20%">&nbsp;</td>
</tr>
<tr>
    <td>Sah Sehingga</td>
	<td><input type="text" name="txtdateexp" size="48"/></td>
    <td width="20%">&nbsp;</td>
</tr>
<tr>
    <td>Tarikh Tiba</td>
	<td><input type="text" name="txtdatearr" size="48"/></td>
    <td width="20%" align="center">&nbsp;</td>
</tr>
<tr>
  <td>Tarikh Tamat Permit</td>
  <td><input type="text" name="txtpermit" size="48" id="txtpermit"/></td>
  <td width="20%" align="center">&nbsp;</td>
</tr>
</table>

<div align="center"></div>
<table width="63%" align="center">
<tr>
    <td align="center"><input type="button" value="Preview Single Card" onclick="printme()"/>
    <input type="button" value="By Date Entry" onclick="choosedate1()"/>
    <input type="button" value="By Passport Input Date" onclick="choosedate2()"/></td>

</tr>
</table>
<p>&nbsp;</p>
</form>
</body>
