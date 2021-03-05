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
		

	function generateReportexcel(type){
	
	    var cont = document.summary.selCurrentCompany.value;
	    var cancel = document.summary.radcancel.value;
	    var region = document.summary.selregion.value;
		var ptype = document.summary.selpayment.value;
	    var datefrom = document.summary.datefrom.value;
		var dateto = document.summary.dateto.value;
	    var url = "<?php echo site_url('contPayment/summaryexcel')?>/" + datefrom + "/" + dateto + "/" + region + "/" + ptype + "/" + cancel + "/" + cont;
        window.open(url);
        
      }
      
	  function generateReportview(type){
	  
	    var cont = document.summary.selCurrentCompany.value;
	    var cancel = document.summary.radcancel.value;
	    var region = document.summary.selregion.value;
		var ptype = document.summary.selpayment.value;
	    var datefrom = document.summary.datefrom.value;
		var dateto = document.summary.dateto.value;
	    var url = "<?php echo site_url('contPaymentold/summaryview')?>/" + datefrom + "/" + dateto + "/" + region + "/" + ptype + "/" + cancel + "/" + cont;
        window.open(url);
        
      }
    
</script>
</head>

<body>
<h4><a href="dashboard.php">Payment Summary ( SUMMARY OF PAYMENT RECORDED) </a></h4>

<h3 id="switchsection1-title" class="handcursor">&nbsp;</h3>
<form method="POST" action="" name="summary">
  <table width="80%" border="0">
		<tr>
			<th colspan="2" align="LEFT">Payment Filter</th>
		</tr>
		<tr>
		  <td>Contractor/Company</td>
		  <td><select name="selCurrentCompany">
            <option value="0">All</option>
            <?php foreach($allContractors->result() as $ctr){
	 			?>
            <option value="<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
            <?php }
	 			?>
          </select></td>
    </tr>
		<tr>
		  <td>Region</td>
		  <td><select name="selregion">
            <option value="0">All</option>
            <?php foreach($allRegion->result() as $region){ ?>
            <option value="<?php echo $region->regional_id;?>"><?php echo $region->regional_desc;?></option>
            <?php } ?>
          </select></td>
    </tr>
		<tr>
		  <td>Payment Type</td>
		  <td><select name="selpayment" onchange="valid(this.value)">
            <option value="0">All</option>
            <option value="V">VDR</option>
            <option value="R">Renewal</option>
            <option value="CP">Cancel Permit</option>
            <option value="CR">Contractor Registration</option>
            <option value="CRN">Contractor Renewal</option>
            <option value="COM">Compound</option>
            <option value="T">Transit Center</option>
            <option value="SP">SP</option>
            <option value="O">Others</option>
          </select>
		    <label>
		    <input name="radcancel" type="radio" id="radio" value="0" checked="checked" />
	      All Recorded Payment
	      <input type="radio" name="radcancel" id="radio" value="1" />
	      Cancelled 
		    Payment Only</label></td>
    </tr>
		<tr>
			<td width="30%">Payment Receipt From Date </td>
			<td width="70%"><input type="text" name="datefrom" id="datefrom" maxlength="20" value="" READONLY/>
      		<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('datefrom'), this)" />   </td>
		</tr>
		<tr>
		  <td>Payment Receipt To Date </td>
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
