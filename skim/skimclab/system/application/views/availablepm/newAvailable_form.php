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
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>

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
  <form action="<?php echo site_url();?>/contAvailablepm/availableFormWithCompDetails" method="POST" name="newLocalTransfer" id="newLocalTransfer" onsubmit="return v.exec()">
    <table width="100%" border="0">
      	<tr>
      		<td>Ref No</td>
      		<td><input type="text" name="refno" value="&lt;auto generate number &gt;" size="25" DISABLED /></td>
      		<td>Date Submit</td>
      		<td><input type="text" name="txtdatesubmit" id="txtdatesubmit" value="<?php echo date('d-m-Y');?>" READONLY />
      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtdatesubmit'), this)" />
      		</td>
      	</tr>
    	<tr>
      		<td id="t_selCompFrom">Company(FROM)</td>
      		<td colspan="3">
      			<SELECT name="selCompFrom" id="selCompFrom" onchange='javascript:getCompanyDetails();'>
      				<option value="" SELECTED></option>
      			<?php foreach($allContractors->result() as $ctr){
	      		?>
	      			<option value="<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
	      		<?php } ?>
      			</SELECT> <font color="red">*</font>
      		</td>
      	</tr>
		<tr>
      		<td id="t_selCompTo">Company(TO)</td>
      		<td colspan="3">
      			<SELECT name="selCompTo" id="selCompTo">
      				<option value="" SELECTED></option>
      			<?php foreach($allContractors->result() as $ctr){
	      		?>
	      			<option value="<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
	      		<?php } ?>
      			</SELECT> <font color="red">*</font>
      		</td>
      	</tr>
      	<tr>
      		<td>Status</td>
      		<td><strong><font color="#990000">Open</font></strong></td>
      		<td id="t_txtTotalQty">Total Quantity</td>
      		<td><input type="text" name="txtTotalQty" maxlength="5"/> <font color="red">*</font></td>
      	</tr>
      	<tr>
			<td colspan="4" align="center">
				<input type="submit" name="btnNext" value=" Next " />
			    <input type="button" name="Back" value=" Cancel " onclick="location.href='<?php echo site_url();?>/contAvailablepm/availableDashbrd'"/>
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
		},
		'selCompFrom':{'l':'Company (from)','r':true,'t':'t_selCompFrom'},
		'selCompTo':{'l':'Company (to)','r':true,'t':'t_selCompTo'}
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
