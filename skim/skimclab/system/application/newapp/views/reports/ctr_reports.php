<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function generateReport(type)
      {
         var status = document.ctrReportForm.selStatus.value;
		 var status2 = document.ctrReportForm.selStatus2.value;
         var grade = document.ctrReportForm.selGrade.value;
         var state = document.ctrReportForm.selState.value;
         
         var url = "<?php echo site_url('contReports/ctrReportSearch')?>/" + status + "/" + grade + "/" + state + "/" + type;

         window.open(url);
      }
      
      function summaryReport(){
	     var url = "<?php echo site_url('contReports/ctrSummaryReport')?>/normal";

         window.open(url);
      }
      
      function summaryReportExcel(){
	     var url = "<?php echo site_url('contReports/ctrSummaryReport')?>/excel";

         window.open(url);
      }
</script>
</head>

<body>
<h4><a href="dashboard.php">Reports</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Contractors</h4>

<h3 id="switchsection1-title" class="handcursor">Contractors Reports<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<form method="POST" action="" name="ctrReportForm">
	<table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">Reports Filter(Contractors List)</th>
		</tr>
		<tr>
			<td>Registration Status:</td>
			<td><SELECT name="selStatus">
					<option value="0" SELECTED>All</option>
					<?php foreach($allStatus->result() as $status){
					?>
					<option value="<?php echo $status->appstatus_id;?>"><?php echo $status->appstatus_desc;?></option>
					<?php }
					?>
				</SELECT>			</td>
		</tr>
		<tr>
		  <td>Status:</td>
		  <td><select name="selStatus2" id="selStatus2">
            <option value="0" selected="selected">All</option>
            <?php foreach($allStatus2->result() as $status2){
					?>
            <option value="<?php echo $status2->emp_statusid;?>"><?php echo $status2->emp_status_desc;?></option>
            <?php }
					?>
                              </select></td>
	  </tr>
		<tr>
			<td>Grade:</td>
			<td>
				<SELECT name="selGrade">
					<option value="0" SELECTED>All</option>
					<?php foreach($allGrades->result() as $grade){
					?>
					<option value="<?php echo $grade->grade_id;?>"><?php echo $grade->grade_id;?> - <?php echo $grade->grade_desc;?></option>
					<?php }
					?>
				</SELECT>			</td>
		</tr>
		<tr>
			<td>State:</td>
			<td>
				<SELECT name="selState">
					<option value="0" SELECTED>All</option>
					<?php foreach($allStates->result() as $state){
					?>
					<option value="<?php echo $state->state_id;?>"><?php echo $state->state_name;?></option>
					<?php }
					?>
				</SELECT>			</td>
		</tr>
		<tr>
			<td colspan="2" align="CENTER"><input type="submit" name="btnView1" value="View" onClick="generateReport('normal');"/>
				<input type="button" name="btnExport1" value="Export to Excel" onClick="generateReport('excel');" />			</td>
		</tr>
	</table>
	<br />
	<table width="80%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th align="LEFT">Contractors Summary</th>
		</tr>
		<tr>
			<td>
				<ul>
					<li>Summary of Contractors By Grade</li>
				</ul> 
			</td>
		</tr>
		<tr>
			<td align="CENTER"><input type="button" name="btnView2" value="View" onClick="summaryReport();" />
							   <input type="button" name="btnExport2" value="Export to Excel" onClick="summaryReportExcel();" />
			</td>
		</tr>
	</table>
</form>
</body>
</html>
