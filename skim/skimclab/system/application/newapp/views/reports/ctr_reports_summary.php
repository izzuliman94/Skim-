<?php
if ($excel == "excel"){
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=contractors_by_grade.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
}  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
  <title>SKIM - REPORTS</title>
  <link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/sippsstyle.css" />
</head>

<body>
<table style="width: 70%; text-align: left; margin-left: auto; margin-right: auto;" border="1" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="4" class="print" align="right">Date:
			<?php echo date('d-m-Y');?>
	  </td>
    </tr>
    <tr>
      <th style="text-align: center;" colspan="4">REGISTERED CONTRACTORS BY GRADE</th>
    </tr>
    <tr>
      <th style="text-align: center;" width="10%">No.</th>
      <th style="text-align: center;" width="25%">Grade</th>
      <th style="text-align: center;" width="25%">Companies</th>
      <th style="text-align: center;" width="40%">Remarks</th>
    </tr>
<?php $i = 1; $total = 0; foreach($ctrSummary->result() as $ctr){ ?>
    <tr>
      <td class="print"><?php echo $i++;?>.</td>
      <td class="print" align="center"><?php echo $ctr->ctr_grade;?></td>
      <td class="print" align="center"><?php echo $ctr->totalctr;?></td>
      <td class="print"></td>
    </tr>
<?php $total += $ctr->totalctr; } ?><?php foreach($others->result() as $other){ ?>
    <tr>
      <td class="print"><?php echo $i++;?>.</td>
      <td class="print" align="center"><?php echo $other->columnname;?></td>
      <td class="print" align="center"><?php echo $other->totalctr;?></td>
      <td class="print"></td>
    </tr>

<?php $total += $other->totalctr; } ?> <tr>
      <td colspan="2" class="print" align="center"><strong>Total</strong></td>
      <td class="print" align="center"><?php echo $total;?></td>
      <td class="print">&nbsp;</td>
    </tr>

  </tbody>
</table>
<br />
<table width="100%" border="0">
	<tr>
	 	<td align="CENTER" class="print">
	 		<input type="button" name="printList" value=" Print List " onclick="window.print();"/>
	 		<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
	 	</td>
	 </tr>
</table>
</body>
</html>
