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

<!-- calendar stylesheet -->
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>/css/calendar-win2k-cold-1.css" title="win2k-cold-1" />

  <!-- main calendar program -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar.js"></script>

  <!-- language for the calendar -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar-en.js"></script>

  <!-- the following script defines the Calendar.setup helper function, which makes
       adding a calendar a matter of 1 or 2 lines of code. -->
  <script type="text/javascript" src="<?php echo base_url();?>/js/calendar-setup.js"></script>
  
</head>
<script type="text/javascript">
	function calculateAge(){
			var day = document.laborRegForm.selday.value
			var month = document.laborRegForm.selmonth.value
			var year = document.laborRegForm.selyear.value
			var age
			
			//calculate Age
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth()
			tyear = today.getFullYear()
			
			if((tmonth > month)||(tmonth==month & tdate>=day))
				age = tyear - year
			else
				age = tyear - year - 1;
			document.laborRegForm.txtage.value = age
	}
	
	function yearsInMalaysia(){
		var entrydate = document.laborRegForm.dtEntry.value
		var splitdate = entrydate.split("-");
		var entryday = splitdate[0]
		var entrymonth = splitdate[1]
		var entryyear = splitdate[2]
		var totalyears = 0;
		
		today = new Date()
		tdate = today.getDate()
		tmonth = today.getMonth() + 1
		tyear = today.getFullYear()
			
		if((tmonth > entrymonth)||(tmonth==entrymonth & tdate>=entryday))
			totalyears = tyear - entryyear
		else
			totalyears = tyear - entryyear - 1;
		document.laborRegForm.yearsinmy.value = totalyears
	}
	
	function addtotrade(){
		if(document.getElementById("selworktrade").value != '0'){
				
			var existingtrade = document.laborRegForm.txtworktrade.value;
			var newtradevalue = "";
				
			if(existingtrade.length ==0)
				newtradevalue = document.laborRegForm.selworktrade.value;
			else 
				newtradevalue = existingtrade + ',' + document.laborRegForm.selworktrade.value;				
				
				document.laborRegForm.txtworktrade.value = newtradevalue;
		}
	}
	
	function cleartrade(){
		document.laborRegForm.txtworktrade.value = "";
	}
</script>

</head>

<body>

<h4><a href="dashboard.php">Local Transfer</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> edit Local Transfer <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Register New Labour</h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">LOCAL TRANSFER - REGISTER NEW LABOUR<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form action="<?php echo site_url();?>/contAvailable/regisNewLaborPt2Submit" method="POST" name="laborRegForm" id="laborRegForm">
 	<table width="100%" border="0">
 		<tr>
 			<th colspan="5" align="LEFT">Labour Details <font color="#990000">[Fill all the column sign ( * ) as compulsory ]</font></th>
 		</tr>
 		<tr>
 			<td>Name <font color="red">*</font></td>
 			<td colspan="3"><input type="text" name="txtname" maxlength="250" size="70" /></td>
 		</tr>
 		<tr>
 			<td>Passport No <font color="red">*</font></td>
 			<td><input type="text" name="txtpassno" maxlength="20" value="<?php if(isset($passportNo)) echo $passportNo;?>"/></td>
 			<td>Application Status</td>
 			<td><font color="#990000">ACTIVE</font></td>
 		</tr>
 		<tr>
 			<td>Old Passport No.</td>
 			<td colspan="3">
 				<input type="text" name="txtoldpassno" maxlength="100" size="50" /> (separate by comma "," if more than one)
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="3">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date of Birth <font color="red">*</font></td>
 			<td><SELECT name="selday">
 					<option value=""></option>
 					<?php for($i=1;$i<=31;$i++){?>
 					<option value="<?php echo $i;?>"><?php echo $i;?></option>
 					<?php } ?>
 				</SELECT>
 				<SELECT name="selmonth">
 					<option value=""></option>
 					<option value="1">Jan</option>
 					<option value="2">Feb</option>
 					<option value="3">Mar</option>
 					<option value="4">Apr</option>
 					<option value="5">May</option>
 					<option value="6">June</option>
 					<option value="7">July</option>
 					<option value="8">Aug</option>
 					<option value="9">Sept</option>
 					<option value="10">Oct</option>
 					<option value="11">Nov</option>
 					<option value="12">Dec</option>
 				</SELECT>
 				<SELECT name="selyear" onchange="calculateAge()">
 					<?php $year = date('Y');
 					for($y=$year - 65;$y<$year;$y++){ ?>
 					<option value="<?php echo $y;?>"><?php echo $y;?></option>
 					<?php }?>
 					<option value="" SELECTED></option>
 				</SELECT>
 				&nbsp; &nbsp; Age: <input type="text" name="txtage" size="5" READONLY/>
 			</td>
 			<td>Gender <font color="red">*</font></td>
 			<td>
 				<SELECT name="selgender">
 					<option value=""></option>
 					<OPTION value="1" SELECTED>MALE</option>
 					<OPTION value="2">FEMALE</option>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>Race/Ethnic <font color="red">*</font></td>
 			<td>
 				<SELECT name="selrace">
 					<option value=""></option>	
 					<?php foreach($allRaces->result() as $race){ ?>	
 					<option value="<?php echo $race->race_id;?>"><?php echo $race->race_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 			<td>Nationality <font color="red">*</font></td>
 			<td>
 				<SELECT name="selnationality">
 					<option value=""></option>	
 					<?php foreach($allNationalities->result() as $nationality){ ?>	
 					<option value="<?php echo $nationality->nat_id;?>"><?php echo $nationality->nat_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="3">&nbsp;</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Home Address</td>
 			<td rowspan="2"><textarea name="txthomeaddr" cols="50" rows="2"></textarea></td>
 			<td width="18%">Zipcode</td>
 			<td><input type="text" name="txtzipcode" maxlength="" /></td>
 		</tr>
 		<tr>
 			<td>Country</td>
 			<td>
 				<SELECT name="selcountry">
 					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>"><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Current Address</td>
 			<td rowspan="2"><textarea name="txtcuraddr" cols="50" rows="2"></textarea></td>
 			<td>Postcode</td>
 			<td><input type="text" name="txtpcode" maxlength="10" /></td>
 		</tr>
 		<tr>
 			<td>State</td>
 			<td><SELECT name="selstate">
 					<option value=""></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_id;?>"><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="3">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date Entry (M'sia) <font color="red">*</font></td>
 			<td>
 				<input type="text" name="dtEntry" maxlength="" id="dtEntry" onchange="yearsInMalaysia()"/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtEntry_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />	
 			</td>
 			<td>No. of years in M'sia</td>
 			<td><input type="text" name="txtyearsinmy" value="" size = "5" READONLY/></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date <font color="red">*</font></td>
 			<td colspan="3">
 				<input type="text" name="dtPassportExp" id="dtPassportExp"/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtPassportExp_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />	
 			</td>
 		</tr>
 		<tr>
 			<td>Current PLKS No.</td>
 			<td><input type="text" name="txtplksno" maxlength="" /></td>
 			<td>Permit Expiry Date</td>
 			<td>
 				<input type="text" name="dtPermitExp" id="dtPermitExp" />
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtPermitExp_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />	
 			</td>
 		</tr>
 		<tr>
 			<td colspan="4" align="LEFT"><u>Skill & Employment Details</u></td>
 		</tr>
 		<tr>
 			<td>Work Trade</td>
 			<td colspan="3"><SELECT name="selworktrade" id="selworktrade" onchange='javascript:addtotrade();'>
 								<option value="" SELECTED></option>
 							<?php foreach($allworktrade->result() as $wt){
	 						?>
	 							<option value="<?php echo $wt->trade_id;?>"><?php echo $wt->trade_id . "-" . $wt->trade_desc;?></option>
	 						<?php
 							}
 							?>
 							</SELECT>
 							<input type="text" name="txtworktrade" size="40" READONLY />
 							<input type="button" name="btnclear" value="Clear" onclick='javascript:cleartrade();'/>
 			</td>
 		</tr>
 		<tr>
 			<td>Initial Employer</td>
 			<td colspan="3"><input type="text" name="txtlastemp" maxlength="" size="50" value="<?php echo $avlabRecord->comp_from;?>" READONLY/>
 				<input type="hidden" name="txtcompfrom" value="<?php echo $avlabRecord->comp_from_clabno;?>" />
 			</td>
 		</tr>
 		<tr>
 			<td>Transfer to</td>
 			<td colspan="3"><input type="text" name="txtcurrentemp" size="50" value="<?php echo $avlabRecord->comp_to;?>" READONLY/>
 							<input type="hidden" name="txtcompto" value="<?php echo $avlabRecord->comp_to_clabno;?>" />
 			</td>
 		</tr>
 		<tr>
 			<td colspan="4" align="Center">
 				<input type="hidden" name="avlabrefno" value="<?php echo $avlabrefno;?>" />
 				<input type="submit" name=" Save " value=" Save " />
 				<input type="button" name="btnClose" value=" Close " onclick="window.close();"/>
 			</td>
 		</tr>
 	</table>	   
</form>
  <p align="center">&nbsp;</p>
</div>
<script type="text/javascript">	
	  Calendar.setup({
        inputField     :    "dtEntry",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtEntry_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script>
<script type="text/javascript">	
	  Calendar.setup({
        inputField     :    "dtPassportExp",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtPassportExp_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script>
<script type="text/javascript">	
	  Calendar.setup({
        inputField     :    "dtPermitExp",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtPermitExp_trigger",  // trigger for the calendar (button ID)
        align          :    "Tl",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script>
</div>
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
