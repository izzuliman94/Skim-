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
<h4><a href="dashboard.php">Reports</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Labours</h4>

<h3 id="switchsection1-title" class="handcursor">Labour Reports<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<form method="POST" action="" name="wkrReportForm">
	<table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">GENERAGE SUMMARY REPORTS</th>
		</tr>
		<tr>
			<td width="20%" valign="top">Choose Report:</td>
			<td width="80%">
				<input type="radio" name="reporttype" value="wkr_state" CHECKED/>Distribution of FCL by States <br />
				<input type="radio" name="reporttype" value="wkr_country" />FCL by Source Country <br />
				<input type="radio" name="reporttype" value="wkr_wtrade" />FCL by Work Trade <br />
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
			<td>Company :</td>
			<td>
				<SELECT name="selCurrentCompany">
 					<option value="0">All</option>
 				<?php foreach($allContractors->result() as $ctr){
	 			?>
	 				<option value="<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
	 			<?php }
	 			?>
	 			</SELECT>
			</td>
		</tr>
		<tr>
			<td width="30%">Status :</td>
			<td width="70%">
				<SELECT name="selstatus" id="selstatus" onChange="SelectSubCat();">
				</SELECT>
			</td>
		</tr>
		<tr>
			<td width="30%">Sub-Status :</td>
			<td width="70%">
				<SELECT name="sel_substatus" id="sel_substatus">
					<option value="0">All</option>
				</SELECT>
			</td>
		</tr>
		<tr>
			<td>Work Trade :</td>
			<td>
				<SELECT name="selworktrade" id="selworktrade" onchange='javascript:addtotrade();'>
 					<option value="0" SELECTED>All</option>
 					<?php foreach($allworktrade->result() as $wt){
	 				?>
	 				<option value="<?php echo $wt->trade_id;?>"><?php echo $wt->trade_id . "-" . $wt->trade_desc;?></option>
	 				<?php
 					}
 					?>
 				</SELECT>
			</td>
		</tr>
		<tr>
			<td>Country :</td>
			<td>
				<SELECT name="selcountry">
 					<option value="0">All</option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
 				</SELECT>
			</td>
		</tr>
		<tr>
			<td>Permit Expiry (Between) :</td>
			<td>
				<input type="text" name="txtExpiryFrom" id="txtExpiryFrom">
				<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtExpiryFrom'), this)" />
				 And 
				<input type="text" name="txtExpiryTo" id="txtExpiryTo">
				<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtExpiryTo'), this)" />
			</td>
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
