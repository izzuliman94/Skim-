<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>

<script type="text/javascript">
	function getCompanyDetails(){
		var clabno = document.getElementById('selCompName').options[document.getElementById('selCompName').selectedIndex].value
		window.location.href = "<?php echo site_url();?>/contAvailablepm/availableFormWithCompDetails/" + clabno;
	}
</script>
<!--CSS for disabled textbox and textarea-->
<style type="text/css">
.disabled
{
 background-color: #FFF;
 font-family:Arial, Helvetica, sans-serif;
 font-size: 12px;
 color:#000000;
}
</style> 
</head>

<body>



<h4><a href="dashboard.php">Pertukaran Majikan</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">CONSTRUCTION LABOUR AVAILABILITY FORM (E01)<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 


  <form action="<?php echo site_url();?>/contAvailablepm/availableFormSubmit" method="POST" name="newLocalTransfer" id="entity_searchby" onsubmit="return v.exec()">
    <table width="100%" border="0">
      	<tr>
      		<td>Ref No</td>
      		<td><input type="text" name="refno" value="&lt;auto generate number &gt;" size="25" DISABLED /></td>
      		<td>Date Submit</td>
      		<td><input type="text" name="txtdatesubmit" id="txtdatesubmit" value="<?php echo $dateSubmit;?>"/>
      			<img src="<?php echo base_url();?>/images/cal.gif" id="datesubmitTrigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />
      		</td>
      	</tr>
    	<tr>
      		<th>Company(FROM)</th>
      		<td colspan="3">&nbsp;
      		</td>
      	</tr>
      	<tr>
      		<td colspan="4">
      			<?php if(isset($suspendedMsg1)) echo $suspendedMsg1;?>
		      	<?php if(isset($ctrData1)){ ?>
		      	<table width="90%" border="0" align="center">
			      	<tr>
			      		<td>Company Name</td>
			      		<td colspan="3"><input type="text" name="compname" size="70" class="disabled" value="<?php echo $ctrData1->ctr_comp_name;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Current Address</td>
			      		<td colspan="3"><input type="text" name="faxno2" class="disabled" value="<?php echo $ctrData1->ctr_addr1;?>" disabled="disabled" />
			      		</p>
		      		    <p>
		      		      <input type="text" name="faxno3" class="disabled" value="<?php echo $ctrData1->ctr_addr2;?>" disabled="disabled" />
		      		    </p>
		      		    <p>
	      		      <input type="text" name="faxno4" class="disabled" value="<?php echo $ctrData1->ctr_pcode;?>" disabled="disabled" />
	      		      <p>
	      		        <input type="text" name="faxno5" class="disabled" value="<?php echo $ctrData1->ctr_addr3;?>" disabled="disabled" />
	      		      </td>
			      	</tr>
			      	<tr>
			      		<td>Telephone No.</td>
			      		<td><input type="text" name="telno" class="disabled" size="30" value="<?php echo $ctrData1->ctr_telno;?>" DISABLED /></td>
			      		<td>Fax No.</td>
			      		<td><input type="text" name="faxno" class="disabled" value="<?php echo $ctrData1->ctr_fax;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Contact Person</td>
			      		<td><input type="text" name="contact" class="disabled" size="30" value="<?php echo $ctrData1->ctr_contact_name;?>" DISABLED /></td>
			      		<td>Contact No.</td>
			      		<td><input type="text" name="contactno" class="disabled" value="<?php echo $ctrData1->ctr_contact_mobileno;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CLAB Reg. No.</td>
			      		<td><input type="text" name="clab_no" class="disabled" size="30" value="<?php echo $ctrData1->ctr_clab_no;?>" DISABLED /></td>
			      		<td>CLAB Expiry Date</td>
			      		<td><input type="text" name="clabexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData1->ctr_clabexp_date));?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CIDB Reg. No.</td>
			      		<td><input type="text" name="cidb_no" class="disabled" size="30" value="<?php echo $ctrData1->ctr_comp_regno;?>" DISABLED /></td>
			      		<td>CIDB Expiry Date</td>
			      		<td><input type="text" name="cidbexp_date" class="disabled" value="<?php echo date('d-m-Y', strtotime($ctrData1->ctr_cidbexp_date));?>" DISABLED /></td>
			      	</tr>
		      	</table>
		      	<?php } //endif 
		      ?>
		      </td>
		</tr>
		<tr>
      		<th>Company(TO)</th>
      		<td colspan="3">&nbsp;
      		</td>
      	</tr>
      	<tr>
      		<td colspan="4">
      			<?php if(isset($suspendedMsg2)) echo $suspendedMsg2;?>
		      	<?php if(isset($ctrData2)){ ?>
		      	<table width="90%" border="0" align="center">
			      	<tr>
			      		<td>Company Name</td>
			      		<td colspan="3"><input type="text" name="compname" size="70" class="disabled" value="<?php echo $ctrData2->ctr_comp_name;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Current Address</td>
			      		<td colspan="3"><p>
			      		  <input type="text" name="faxno2" class="disabled" value="<?php echo $ctrData2->ctr_addr1;?>" disabled="disabled" />
			      		</p>
		      		    <p>
		      		      <input type="text" name="faxno3" class="disabled" value="<?php echo $ctrData2->ctr_addr2;?>" disabled="disabled" />
		      		    </p>
		      		    <p>
		      		      <input type="text" name="faxno4" class="disabled" value="<?php echo $ctrData2->ctr_pcode;?>" disabled="disabled" />
                        </p>
		      		    <p>
		      		      <input type="text" name="faxno6" class="disabled" value="<?php echo $ctrData2->ctr_addr3;?>" disabled="disabled" />
		      		    </p></td>
			      	</tr>
			      	<tr>
			      		<td>Telephone No.</td>
			      		<td><input type="text" name="telno" class="disabled" size="30" value="<?php echo $ctrData2->ctr_telno;?>" DISABLED /></td>
			      		<td>Fax No.</td>
			      		<td><input type="text" name="faxno" class="disabled" value="<?php echo $ctrData2->ctr_fax;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>Contact Person</td>
			      		<td><input type="text" name="contact" class="disabled" size="30" value="<?php echo $ctrData2->ctr_contact_name;?>" DISABLED /></td>
			      		<td>Contact No.</td>
			      		<td><input type="text" name="contactno" class="disabled" value="<?php echo $ctrData2->ctr_contact_mobileno;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CLAB Reg. No.</td>
			      		<td><input type="text" name="clab_no" class="disabled" size="30" value="<?php echo $ctrData2->ctr_clab_no;?>" DISABLED /></td>
			      		<td>Expiry Date</td>
			      		<td><input type="text" name="clabexp_date" class="disabled" value="<?php echo $ctrData2->ctr_clabexp_date;?>" DISABLED /></td>
			      	</tr>
			      	<tr>
			      		<td>CIDB Reg. No.</td>
			      		<td><input type="text" name="cidb_no" class="disabled" size="30" value="<?php echo $ctrData2->ctr_comp_regno;?>" DISABLED /></td>
			      		<td>Expiry Date</td>
			      		<td><input type="text" name="cidbexp_date" class="disabled" value="<?php echo $ctrData2->ctr_cidbexp_date;?>" DISABLED /></td>
			      	</tr>
		      	</table>
		      	<?php } //endif 
		      ?>
		      </td>
		</tr>
      	<tr>
      		<td>Status</td>
      		<td><strong><font color="#990000">Open</font></strong></td>
      		<td id="t_txtTotalQty">Total Quantity</td>
      		<td><input type="text" name="txtTotalQty" maxlength="5" value="<?php echo $totalQty;?>" /> <font color="red">*</font></td>
      	</tr>
      	<tr>
      		<td>Keyin By</td>
      		<td><input type="text" name="txtkeyinby" value="<?php echo $this->session->userdata('username');?>" READONLY /></td>
      		<td>Keyin Date</td>
      		<td><input type="text" name="txtkeyindate" value="<?php echo date('d-m-Y');?>" READONLY/></td>
      	</tr>
      	<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
      	<tr>
			<td colspan="4" align="center">
				<input type="text" name="selCompFrom" value="<?php echo $compFrom;?>" />
				<input type="text" name="selCompTo" value="<?php echo $compTo;?>" />
				<input type="submit" name="btnSave" value=" Save " <?php if(isset($suspendedMsg1) || isset($suspendedMsg2)) echo "DISABLED";?> onclick="return confirm('Are you sure you want to save?');"/>
			    <input type="button" name="btnBack" value="Back" onclick="history.back();"/>
			</td>
		</tr>
    </table>
  </form>
  <p align="center">&nbsp;</p>
</div>
<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtTotalQty': {
			'l': 'Total Quantity',  // label
			'r': true,    // required
			't': 't_txtTotalQty'// id of the element to highlight if input not validated
		}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('newLocalTransfer', a_fields, o_config);

	</script>
<!--END OF FORM VALIDATION JAVASCRIPT-->

<!--js for calendar date pick: datesubmit field-->
  <script type="text/javascript">
    Calendar.setup({
        inputField     :    "txtdatesubmit",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "datesubmitTrigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
  </script>
<p>
      <script type="text/javascript">
//   MAIN FUNCTION: new switchcontent("class name", "[optional_element_type_to_scan_for]") REQUIRED
//1) Instance.setStatus(openHTML, closedHTML)- Sets optional HTML to prefix the headers to indicate open/closed states
//2) Instance.setColor(openheaderColor, closedheaderColor)- Sets optional color of header when it's open/closed
//3) Instance.setPersist(true/false)- Enables or disabled session only persistence (recall contents' expand/contract states)
//4) Instance.collapsePrevious(true/false)- Sets whether previous content should be contracted when current one is expanded
//5) Instance.defaultExpanded(indices)- Sets contents that should be expanded by default (ie: 0, 1). Persistence feature overrides this setting!
//6) Instance.init() REQUIRED

var switchsection=new switchcontent("switchgroup1", "div") //Limit scanning of switch contents to just "div" elements
//bobexample.setStatus('<img src="http://img242.imageshack.us/img242/5553/opencq8.png" /> ', '<img src="http://img167.imageshack.us/img167/7718/closedy2.png" /> ')
switchsection.setColor('darkred', 'black')
switchsection.setPersist(true)
switchsection.collapsePrevious(true) //Only one content open at any given time
switchsection.init()
    </script>
</p>

</body>
</html>
