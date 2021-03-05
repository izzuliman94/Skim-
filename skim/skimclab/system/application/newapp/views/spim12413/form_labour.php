<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
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
<body>
<h4><a href="dashboard.php">Spim</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />Register New Labour</h4>
<h3 id="switchsection1-title" class="handcursor">SPIM - REGISTER NEW LABOUR<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<form method="POST">
<strong>Current Workorder ID : <?php echo $workorderid;?><br />
Cotractor ID: <?php echo $companyname;?> </strong>
<br />
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
 		<!--tr>
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
 		</tr-->
 	</table>
</form>
</div>


</body>