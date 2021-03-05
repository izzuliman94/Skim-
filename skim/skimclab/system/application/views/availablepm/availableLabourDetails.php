<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Edit Labour</title>
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
 <script type="text/javascript">	
	function printPage(){
		window.print();	
	}
	
	function calculateAgeAndYearsInMy(){
			//calculate age
			var dob = document.editLaborForm.dtdob.value;
			var splitresult = dob.split("-");
			var day = splitresult[0];
			var month = splitresult[1];
			var year = splitresult[2];
			var age = 0;
			
			today = new Date();
			tdate = today.getDate();
			tmonth = today.getMonth();
			tyear = today.getFullYear();
			
			if(dob.length > 0){
				if((tmonth > month)||(tmonth==month & tdate>=day))
					age = tyear - year;
				else
					age = tyear - year - 1;
			}			
			document.editLaborForm.txtage.value = age;
			
			//calculate years in malaysia
			var entrydate = document.editLaborForm.dtEntry.value;
			var splitdate = entrydate.split("-");
			var eday = splitdate[0];
			var emonth = splitdate[1];
			var eyear = splitdate[2];
			
			var yearsinmy = 0;
			if(entrydate.length > 0){
				if((tmonth > emonth)||(tmonth==emonth & tdate>=eday))
					yearsinmy = tyear - eyear;
				else
					yearsinmy = tyear - eyear - 1;
			}			
			document.editLaborForm.txtyearsinmy.value = yearsinmy;
	}
	</script>
</head>

<body onLoad="calculateAgeAndYearsInMy();">
<h4><a href="dashboard.php">Pertukaran Majikan</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Labour Details </h4>

<h3 id="switchsection1-title" class="handcursor">Pertukaran Majikan Labour Details<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<strong><font color="red"><?php if(isset($successMsg)) echo $successMsg;?></font> </strong>
<form method="POST" action="<?php echo site_url();?>/contLabour/updateLabourDetailsSubmit" name="editLaborForm" id="editLaborForm">
<table width="100%" border="0">
 		<tr>
 			<th colspan="5" align="RIGHT">
 				<input type="button" name="btnPrintDoc" value="Print Doc" onclick="printPage();"/>
 				<!--<input type="button" name="btnRemove" value="Remove this labour" onclick="location.href='<?php echo site_url();?>/contAvailablepm/removeLabour/<?php //echo $labor->wkr_id;?>/<?php //echo $avlab_ref_no;?>'"/>-->
 				<input type="button" name="btnBack" value=" Back " onclick="history.back();"/>
 			</th>
 		</tr>
 		<tr>
 			<td rowspan="4" width="18%" valign="bottom">
 				<?php echo $photoInfo;?>
 			</td>
 			<td width="17%">Passport No</td>
 			<td width="20%"><input type="text" name="txtpassno" id="txtpassno" maxlength="" value="<?php echo $labor->wkr_passno;?>" READONLY/>
 			</td>
 			<td width="20%">Green Card No.</td>
 			<td width="25%"><input type="text" name="txtgreen" maxlength="30" value="<?php echo $labor->wkr_green;?>"/></td>
 		</tr>
 		<tr>
 			<td>Name</td>
 			<td><input type="text" name="txtname" maxlength="" size="35" value="<?php echo $labor->wkr_name;?>"/></td>
 			<td>Movement Status</td>
 			<td><font color="#990000"><?php echo $labor->avlab_desc;?></font></td>
 		</tr>
 		<tr>
 			<td>Old Passport No.</td>
 			<td><input type="text" name="txtoldpassno" maxlength="100" value="<?php echo $labor->wkr_oldpassno;?>" /></td>
 			<td>Amnesty Ref. No</td>
 			<td><input type="text" name="txtamnestyref" maxlength="30" value="<?php echo $labor->wkr_amnestyref;?>" /></td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date of Birth <font color="red">*</font></td>
 			<td colspan="2">
 				<input type="text" name="dtdob" id="dtdob" value="<?php echo date('d-m-Y', strtotime($labor->wkr_dob));?>" READONLY/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtdob_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />		
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
 			<td colspan="2">
 				<SELECT name="selrace">
 					<option value=""></option>	
 					<?php foreach($allRaces->result() as $race){ ?>	
 					<option value="<?php echo $race->race_id;?>" <?php if($labor->wkr_race == $race->race_id) echo "SELECTED";?>><?php echo $race->race_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 			<td>Nationality <font color="red">*</font></td>
 			<td>
 				<SELECT name="selnationality">
 					<option value=""></option>	
 					<?php foreach($allNationalities->result() as $nationality){ ?>	
 					<option value="<?php echo $nationality->nat_id;?>" <?php if($labor->wkr_nationality == $nationality->nat_id) echo "SELECTED";?>><?php echo $nationality->nat_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Home Address</td>
 			<td rowspan="2" colspan="2"><textarea name="txthomeaddr" cols="50" rows="2"><?php echo $labor->wkr_homeaddr;?></textarea></td>
 			<td>Zipcode</td>
 			<td><input type="text" name="txtzipcode" maxlength="10" value="<?php echo $labor->wkr_zipcode;?>" /></td>
 		</tr>
 		<tr>
 			<td>Country</td>
 			<td colspan="2">
 				<SELECT name="selcountry">
 					<option value=""></option>	
 					<?php foreach($allCountries->result() as $country){ ?>	
 					<option value="<?php echo $country->cty_id;?>" <?php if($labor->wkr_country == $country->cty_id) echo "SELECTED";?>><?php echo $country->cty_desc;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Current Address</td>
 			<td rowspan="2" colspan="2"><textarea name="txtcuraddr" cols="50" rows="2"><?php echo $labor->wkr_address1;?><?php echo $labor->wkr_address2;?><?php echo $labor->wkr_address3;?></textarea></td>
 			<td>Postcode</td>
 			<td><input type="text" name="txtpcode" maxlength="5" value="<?php echo $labor->wkr_pcode;?>"/></td>
 		</tr>
 		<tr>
 			<td>State</td>
 			<td colspan="2"><SELECT name="selstate">
 					<option value=""></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_id;?>" <?php if($labor->wkr_state == $state->state_id) echo "SELECTED";?>><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td>Date Entry (M'sia)</td>
 			<td colspan="2">
 				<input type="text" name="dtEntry" id="dtEntry" maxlength="" value="<?php if($labor->wkr_entrydate != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_entrydate));?>" READONLY/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtEntry_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />		
 			</td>
 			<td>No. of year in M'sia</td>
 			<td><input type="text" name="txtyearsinmy" size="5" READONLY/></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date</td>
 			<td colspan="2">
 				<input type="text" name="dtPassportExp" id="dtPassportExp" value="<?php echo date('d-m-Y', strtotime($labor->wkr_passexp));?>" READONLY/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtPassportExp_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />			
 			</td>
 			<td></td>
 			<td></td>
 		</tr>
 		<tr>
 			<td>Current PLKS No.</td>
 			<td colspan="2"><input type="text" name="txtplksno" value="<?php echo $labor->wkr_plksno;?>"/></td>	
 			<td>Permit Expiry Date</td>
 			<td>
 				<input type="text" name="dtPermitExp" id="dtPermitExp" value="<?php if($labor->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($labor->wkr_permitexp));?>" READONLY/>
 				<img src="<?php echo base_url();?>/images/cal.gif" id="dtPermitExp_trigger" style="cursor: pointer;" title="Date selector" onmouseover="this.style.background='red';" onmouseout="this.style.background=''" />			
 			</td>
 		</tr>
 		<tr>
 			<td colspan="5" align="LEFT"><u>Skill & Employment Details</u></td>
 		</tr>
 		<tr>
 			<td>Work Trade</td>
 			<td colspan="4"><SELECT name="selworktrade" id="selworktrade">
 								<option value="" SELECTED></option>
 							<?php foreach($allworktrade->result() as $wt){
	 						?>
	 							<option value="<?php echo $wt->trade_id;?>"><?php echo $wt->trade_id . "-" . $wt->trade_desc;?></option>
	 						<?php
 							}
 							?>
 							</SELECT>
 							<input type="text" name="txtworktrade" value="<?php echo $labor->wkr_wtrade;?>" size="40" READONLY />
 			</td>
 		</tr>
 		<tr>
 			<td>Current Employer</td>
 			<td colspan="4"><input type="text" name="txtCurrentEmp"  value="<?php echo $labor->ctr_comp_name;?>" size="60" READONLY/></td>
 		</tr>
 		<tr>
 			<td>First Employer</td>
 			<td colspan="4"><input type="text" name="txtInitEmp" value="<?php echo $labor->wkr_initemp;?>" size="60"/></td>
 		</tr>
 		<tr>
 			<td>Last Employer</td>
 			<td colspan="4"><input type="text" name="txtLastEmp" value="<?php echo $labor->wkr_lastemp;?>" size="60"/></td>
 		</tr>
 		<tr>
 			<td colspan="5" align="LEFT"><u>Employer History</u></td>
 		</tr>
 		<tr>
 			<td colspan="5">
 				<table width="100%" border="0">
 					<tr>
 						<th>No.</th>
 						<th>Company Name</th>
 						<th align="CENTER">Location (State)</th>
 						<th align="CENTER">Date Assigned</th>
 					</tr>
 					<?php 
 					if($emphistory->num_rows() > 0){
	 					$i = 1;
 						foreach($emphistory->result() as $hist){
	 				?>
	 				<tr>
	 					<td><?php echo $i++;?></td>
	 					<td><?php echo $hist->ctr_comp_name;?></td>
	 					<td><?php echo $hist->state_name;?></td>
	 					<td><?php if($hist->rel_datehired != '0000-00-00') echo date('d-m-Y', strtotime($hist->rel_datehired));?></td>
	 				</tr>
	 				<?php }//end foreach
 					}
	 				else{
		 			?>
		 			<tr>
		 				<td colspan="4"><font color="red">No employer history has been recorded for this worker in the database.</font></td>
		 			</tr>
		 			<?php
	 				}//end else
	 				?>
 				</table>
 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="4">&nbsp;</td>
 		</tr>
 		<tr>
 			<td colspan="5" align="Right">
 				<input type="hidden" name="wkr_id" value="<?php echo $labor->wkr_id;?>" />
 				<input type="button" name="btnPrintDoc" value="Print Doc" onclick="printPage();"/>
 				<input type="button" name="btnBack" value=" Back "  onclick="history.back();"/>
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
<script type="text/javascript">	
	  Calendar.setup({
        inputField     :    "dtdob",     // id of the input field
        ifFormat       :    "%d-%m-%Y",      // format of the input field
        button         :    "dtdob_trigger",  // trigger for the calendar (button ID)
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