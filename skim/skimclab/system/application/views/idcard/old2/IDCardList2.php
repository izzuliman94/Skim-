<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
    <script type="text/javascript">
        function datebutton_onclick(elementId, thisRef)
        {
	        switch (scwVisibilityStatus)
	        {
		        case "hidden":
			        scwShow(document.getElementById(elementId), thisRef);
			        break;
		        case "visible":
			        scwHide();
	        }
        }
		

	function generateReportexcel(type)
      {
	   
	    var datefrom = document.sumvdr.datefrom.value;
		var dateto = document.sumvdr.dateto.value;
	    var url = "<?php echo site_url('contIDcard/idlistexcel2')?>/" + datefrom + "/" + dateto;
        window.open(url);
        
      }
      
	  function generateReportview(type)
      {
	   
	    var datefrom = document.sumvdr.datefrom.value;
		var dateto = document.sumvdr.dateto.value;
	    var url = "<?php echo site_url('contIDcard/idlistview2')?>/" + datefrom + "/" + dateto;
        window.open(url);
        
      }
    
</script>
</head>

<body>
<h4><a href="../payment/dashboard.php">Generate Card ID List By Passport Input Date</a></h4>

<h3 id="switchsection1-title" class="handcursor">&nbsp;</h3>
<form method="POST" action="" name="sumvdr">
  <table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">Worker Filter</th>
		</tr>
		<tr>
			<td width="30%"> From Date </td>
			<td width="70%"><input type="text" name="datefrom" id="datefrom" maxlength="20" value="" READONLY/>
      		<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('datefrom'), this)" />   </td>
		</tr>
		<tr>
		  <td>To Date </td>
		  <td><input type="text" name="dateto" id="dateto" maxlength="20" value="" READONLY/>
      		<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dateto'), this)" /></td>
	  </tr>
		<tr>
			<td colspan="2" align="CENTER"><input type="button" name="btnExport1" value="View" onclick="generateReportview('excel');" />
			  <input type="button" name="btnExport2" value="Export To Excel" onclick="generateReportexcel('excel');" />		  </td>
		</tr>
  </table>
	
</form>
</body>
</html>
