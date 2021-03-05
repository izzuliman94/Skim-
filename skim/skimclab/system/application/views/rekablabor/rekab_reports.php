<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<!--populate status and substatus-->
<script type="text/javascript" src="<?php echo base_url();?>js/statusLists.js"></script>
<!--new calendar-->
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
    </script>	    
<script type="text/javascript">
	function generateReport()
    {
         for(var i=0; i < document.wkrReportForm.reporttype.length; i++)
         {
         	if(document.wkrReportForm.reporttype[i].checked)
         		var reportName = document.wkrReportForm.reporttype[i].value;
         }

         var url = "<?php echo site_url('contReports/wkrReportSearch')?>/" + reportName + "/normal";

         window.open(url);
    }
    
    function generateReportExcel()
    {
         for(var i=0; i < document.wkrReportForm.reporttype.length; i++)
         {
         	if(document.wkrReportForm.reporttype[i].checked)
         		var reportName = document.wkrReportForm.reporttype[i].value;
         }

         var url = "<?php echo site_url('contReports/wkrReportSearch')?>/" + reportName + "/excel";

         window.open(url);
    }
    
    function generateWkrList(){
	    var company = document.wkrlist_report.selCurrentCompany.value;
	    var status = document.wkrlist_report.selstatus.value;
	    var substatus = document.wkrlist_report.sel_substatus.value;
	    var worktrade = document.wkrlist_report.selworktrade.value;
	    var country = document.wkrlist_report.selcountry.value;
	    var expfrom = document.wkrlist_report.txtExpiryFrom.value;
	    var expto = document.wkrlist_report.txtExpiryTo.value;
	    var url = "<?php echo site_url('contReports/getWkrListReport')?>/" + company + "/" + status + "/" + substatus + "/" + worktrade + "/"  + country + "/normal/"  + expfrom + "/"  + expto;

        window.open(url);
    }
    
    function generateWkrListExcel(){
	    var company = document.wkrlist_report.selCurrentCompany.value;
	    var status = document.wkrlist_report.selstatus.value;
	    var substatus = document.wkrlist_report.sel_substatus.value;
	    var worktrade = document.wkrlist_report.selworktrade.value;
	    var country = document.wkrlist_report.selcountry.value;
	    var expfrom = document.wkrlist_report.txtExpiryFrom.value;
	    var expto = document.wkrlist_report.txtExpiryTo.value;
	    var url = "<?php echo site_url('contReports/getWkrListReport')?>/" + company + "/" + status + "/" + substatus + "/" + worktrade + "/"  + country + "/excel/"  + expfrom + "/"  + expto;

        window.open(url);
    }
</script>
</head>

<body onload="fillCategory();">
<h4><a href="dashboard.php">Reports</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /><span class="handcursor">Rekalibrasi</span></h4>

<h3 id="switchsection1-title" class="handcursor">Rekalibrasi Reports<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<form method="POST" action="" name="wkrReportForm">
	<table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">GENERATE SUMMARY REPORTS</th>
		</tr>
		<tr>
			<td width="20%" valign="top">Choose Report:</td>
			<td width="80%">
				<input type="radio" name="reporttype" value="wkr_state" CHECKED/>
				Distribution of Rekab Worker by Sector<br />				<br />
			</td>
		</tr>
		<tr>
			<td colspan="2" align="CENTER">
				<input type="submit" name="btnView1" value="View" onClick="generateReport();"/>
				<input type="submit" name="btnExport1" value="Export to Excel" onClick="generateReportExcel();"/>
			</td>
		</tr>
	</table>
</form>
<br />
<form action="" method="POST" name="wkrlist_report" id="wkrlist_report">
	<table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">GENERATE LABOURS LIST</th>
		</tr>
		<tr>
			<td width="30%">Sector</td>
			<td width="70%"><select name="selsector">
			  <option value=""></option>
 			  <?php foreach($allSector->result() as $sector){ ?>
 			  <option value="<?php echo $sector->sec_id;?>"><?php echo $sector->sec_description;?></option>
 			  <?php } ?>
		    </select></td>
		</tr>
		<tr>
			<td colspan="2" align="CENTER">
				<input type="submit" name="btnView2" value="View" onclick="generateWkrList();"/>
				<input type="submit" name="btnExport2" value="Export to Excel" onclick="generateWkrListExcel();"/>
			</td>
		</tr>
	</table>
</form>
</body>
</html>
