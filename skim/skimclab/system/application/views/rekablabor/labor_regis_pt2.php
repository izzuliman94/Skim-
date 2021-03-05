<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Labour Registration</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
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
	
	function addtoAddress(){
		if(document.getElementById("selCurrentCompany").value != '0'){
				
			var existingAddress1 = document.laborRegForm.txtcuraddr1.value;
			var existingAddress2 = document.laborRegForm.txtcuraddr2.value;
			var existingAddress3 = document.laborRegForm.txtcuraddr3.value;
			var existingAddress4 = document.laborRegForm.txtpcode.value;
			var existingAddress5 = document.laborRegForm.selstate.value;
			var existingAddress6 = document.laborRegForm.txtClabNo.value;
			var newAddressvalue1 = "";
			var newAddressvalue2 = "";
			var newAddressvalue3 = "";
			var newAddressvalue4 = "";
			var newAddressvalue5 = "";
			var newAddressvalue6 = "";
				

				newAddressvalue1 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue1 = newAddressvalue1.substring(0,(newAddressvalue1.indexOf("'")));
								
				newAddressvalue2 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue2 = newAddressvalue2.substring((newAddressvalue2.indexOf("'")+1),(newAddressvalue2.lastIndexOf("'")));
				
				newAddressvalue3 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue3 = newAddressvalue3.substring(((newAddressvalue3.lastIndexOf("'")+1)),(newAddressvalue3.indexOf("|")));
				
				newAddressvalue4 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue4 = newAddressvalue4.substring((newAddressvalue4.indexOf("|")+1),(newAddressvalue4.lastIndexOf("|")));
				
				newAddressvalue5 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue5 = newAddressvalue5.substring(((newAddressvalue5.lastIndexOf("|")+1)),(newAddressvalue5.indexOf("@")));
				
				newAddressvalue6 = document.laborRegForm.selCurrentCompany.value;
				newAddressvalue6 = newAddressvalue6.substring(newAddressvalue6.lastIndexOf("@")+1);
				
				document.laborRegForm.txtcuraddr1.value = newAddressvalue1;
				document.laborRegForm.txtcuraddr2.value = newAddressvalue2;
				document.laborRegForm.txtcuraddr3.value = newAddressvalue3;
				document.laborRegForm.txtpcode.value = newAddressvalue4;
				document.laborRegForm.selstate.value = newAddressvalue5;
				document.laborRegForm.txtClabNo.value = newAddressvalue6;
		}
	}
	function cleartrade(){
		document.laborRegForm.txtworktrade.value = "";
	}
	
	function getcountry(){
	     var frm = "new";
		 var url = "<?php echo site_url('contLabour/getcountry');?>/" + frm
window.open(url, 'Country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
</script>

<body>



<h4><a href="file:///C|/webserver/apache/htdocs/skimclab/system/application/views/labor/dashboard.php">RekabLabour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Registration </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">New Labour Registration    <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
 <form action="<?php echo site_url();?>/contrekabLabour/newLabourDetailsSubmit" method="POST" name="laborRegForm" id="laborRegForm" onsubmit="return v.exec();">
 	<table width="100%" border="0">
 		<tr>
 			<th colspan="7" align="LEFT">Labour Details <font color="#990000">[Fill all the column sign ( * ) as compulsory ]</font></th>
 		</tr>
 		<tr>
 		  <td id="t_txtname2"><strong><u>Passport</u></strong></td>
 		  <td colspan="5">&nbsp;</td>
	  </tr>
 		<tr>
 			<td id="t_txtname">Name <font color="red">*</font></td>
 			<td><input type="text" name="txtname" maxlength="250" size="70" /></td>
		  <td id="t_sector">Sector <font color="red">*</font></td>
 			<td><select name="selsector">
 			  <option value=""></option>
 			  <?php foreach($allSector->result() as $sector){ ?>
 			  <option value="<?php echo $sector->sec_id;?>"><?php echo $sector->sec_description;?></option>
 			  <?php } ?>
		    </select></td>
		  <td>Officer Incharge</td>
 			<td colspan="6" id="t_offic"><input type="text" name="officerinc" /></td>
 		</tr>
 		<tr>
 		  <td id="t_txtpassno2">&nbsp;</td>
 		  <td>&nbsp;</td>
 		  <td id="t_type">Record Type <font color="red">*</font></td>
 		  <td><select name="seltype">
 			  <option value=""></option>
 			  <?php foreach($alltype->result() as $type){ ?>
 			  <option value="<?php echo $type->type_id;?>"><?php echo $type->type_description;?></option>
 			  <?php } ?>
	      </select></td>
 		  <td>Telephone</td>
 		  <td colspan="6" id="t_tel"><input type="text" name="tel" /></td>
	  </tr>
 		<tr>
 			<td width="18%" id="t_txtpassno">Passport No <font color="red">*</font></td>
 			<td><input type="text" name="txtpassno" maxlength="20" value="<?php if(isset($passportNo)) echo $passportNo;?>"/></td>
		  <td></td>
 			<td></td>
 			<td>Registered Imigration Office</td>
 			<td colspan="6" id="t_jim"><input type="text" name="jimreg" /></td>
 		</tr>
 		<tr>
 			<td>Application Status</td>
 			<td colspan="5"><font color="#990000">ACTIVE</font></td>
 		</tr>
 		<tr>
 			<td>Old Passport No.</td>
 			<td colspan="5">
 				<input type="text" name="txtoldpassno" maxlength="100" size="50" /> (separate by comma "," if more than one) 			</td>
 		</tr>
 		<tr>
 			<td>Date of Birth <font color="red">*</font></td>
 			<td colspan="5"><select name="selday">
              <option value=""></option>
              <?php for($i=1;$i<=31;$i++){?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php } ?>
            </select>
 			  <select name="selmonth">
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
              </select>
 			  <select name="selyear" onchange="calculateAge()">
                <?php $year = date('Y');
 					for($y=$year - 65;$y<$year;$y++){ ?>
                <option value="<?php echo $y;?>"><?php echo $y;?></option>
                <?php }?>
                <option value="" selected></option>
              </select>
 			  Age:
          <input type="text" name="txtage" size="5" readonly/></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date <font color="red">*</font></td>
 			<td><input type="text" name="dtPassportExp" id="dtPassportExp" readonly/>
		    <input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtPassportExp'), this)" />
		    <font color="red">*</font></td>
 			<td width="18%" colspan="2" id="t_selEmp">Passport Issue </td>
 			<td colspan="2"><input type="text" name="txtpassissue" /></td>
 		</tr>
 		<tr>
 			<td>Home Address</td>
 			<td colspan="5"><textarea name="txthomeaddr" cols="50" rows="2"></textarea></td>
 		</tr>
		<tr>
		    <td>Next Of Kin</td>
			<td><input type="text" name="txtnok"  size="50"/></td>
			<td colspan="2">Relationship</td>
			<td colspan="2"><input type="text" name="txtrelationship"  /></td>
		</tr>
 		<tr>
 			<td>Salary</td>
 			<td><input type="text" name="txtsalary" value="0.00"/> </td>
 			<td colspan="2">JTK Submission</td>
 			<td colspan="2"><input type="checkbox" name="chkjtk" value="1"/>
 			  Rerefence No.
		  <input type="text" name="txtrefjtk" width="200" value=""/></td>
 		</tr><tr>
 			<td>&nbsp;</td>
 			<td id="t_dob">&nbsp; &nbsp;</td>
 			<td colspan="2" id="t_selgender">&nbsp;</td>
 			<td colspan="2">&nbsp;</td>
 		</tr>
 		<tr>
		    <td id="t_selcountry" >Country <font color="red">*</font></td>
			<td><input type="text" value="" name="selcountrydesc" /><input type="hidden" value="" name="selcountry" /><input type="button" onclick="getcountry()" value="..."/></td>
 			<td colspan="2" >Nationality </td>
 			<td colspan="2" ><input type="text" value="" name="selnationalitydesc" /><input type="hidden" value="" name="selnationality" /></td>
	  </tr>
 		<tr>
 			<td>Gender <font color="red">*</font></td>
 			<td colspan="5"><select name="selgender">
              <option value=""></option>
              <option value="1" selected>MALE</option>
              <option value="2">FEMALE</option>
            </select></td>
 		</tr>
 		<tr>
 			<td>Zipcode</td>
 			<td><input type="text" name="txtzipcode" maxlength="" /></td>
 			<td colspan="4">&nbsp;</td>
		</tr>
 		
 		<tr>
 			<td>Bank Draft No.:</td>
 			<td><input type="text" name="txtorgReceipt" maxlength="100" /></td>
 			<td colspan="2" id="t_txtpcode">Person in Charge: <font color="red">*</font></td>
 			<td colspan="2"><select name="selEmp">
              <option value=""></option>
              <?php foreach($vdrEmployees->result() as $emp){?>
              <option value="<?php echo $emp->emp_id;?>"><?php echo $emp->emp_username;?></option>
              <?php } ?>
            </select></td>
 		</tr>
 		
 		<tr>
 			<td>&nbsp;</td>
 			<td>&nbsp;</td>
 		    <td colspan="2">&nbsp;</td>
 		    <td colspan="2">&nbsp;</td>
 		</tr>
 		<tr>
 		  <td id="t_dtEntry2"><strong><u>Permit</u></strong></td>
 		  <td>&nbsp;</td>
 		  <td colspan="2">&nbsp;</td>
 		  <td colspan="2">&nbsp;</td>
	  </tr>
 		<tr>
 			<td id="t_dtEntry">Date Entry (M'sia) <font color="red">*</font></td>
 			<td>
 				<input type="text" name="dtEntry" maxlength="" id="dtEntry" onkeyup="yearsInMalaysia();" READONLY/>
 				<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtEntry'), this)" /> <font color="red">*</font> 			</td>
 			<td colspan="2">No. of years in M'sia</td>
 			<td colspan="2"><input type="text" name="txtyearsinmy" value="" size = "5" READONLY/></td>
 		</tr>
 		<tr>
 			<td id="t_dtPassportExp">Permit Expiry Date</td>
 			<td colspan="5"><input type="text" name="dtPermitExp" id="dtPermitExp" readonly/>
		    <input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtPermitExp'), this)" />
		    <font color="red">*</font></td>
 		</tr>
 		<tr>
 			<td>Current PLKS No.</td>
 			<td><input type="text" name="txtplksno" maxlength="" /></td>
 			<td colspan="2">&nbsp;</td>
 			<td colspan="2">&nbsp;</td>
 		</tr>
		<tr>
		    <td>&nbsp;</td>
		  <td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td colspan="2">&nbsp;</td>
		</tr>
		
 		<tr>
 			<td colspan="6" align="LEFT">&nbsp;</td>
 		</tr>
 		<tr>
 		  <td id="t_txtworktrade2"><u><strong>Skill & Employment Details</strong></u></td>
 		  <td colspan="5">&nbsp;</td>
	  </tr>
 		<tr>
 			<td id="t_txtworktrade">Work Trade<font color="red">*</font></td>
 			<td><SELECT name="selworktrade" id="selworktrade" onchange='javascript:addtotrade();'>
 								<option value="" SELECTED></option>
 							<?php foreach($allworktrade->result() as $wt){
	 						?>
	 							<option value="<?php echo $wt->trade_id;?>"><?php echo $wt->trade_id . "-" . $wt->trade_desc;?></option>
	 						<?php
 							}
 							?>
 							</SELECT>
 							<input type="text" name="txtworktrade" size="40" READONLY />
 							<input type="button" name="btnclear" value="Clear" class="smoothbtn1" onclick='javascript:cleartrade();'/> 			</td>
 			<td>Date Accredited (SCC Date)</td>
 			<td><input type="text" name="dtskk" id="dtskk" readonly="readonly"/>
              <input id="button4" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtskk'), this)" />
            <font color="red">*</font></td>
 			<td>SCC Ref No</td>
 			<td><input name="txtskkref" type="text" maxlength="22"  /></td>
 		</tr>
 		<tr>
 			<td>Last Employer</td>
 			<td colspan="5"><input type="text" name="txtlastemp" maxlength="" size="50" /></td>
 		</tr>
 		<tr>
 		  <td>Current Employer</td>
 		  <td colspan="5"><select name="selCurrentCompany" id="selCurrentCompany" onchange='javascript:addtoAddress();'>
            <option value=""></option>
            <?php foreach($allContractors->result() as $ctr){
	 			?>
            <option value="<?php echo $ctr->ctr_addr1;?>'<?php echo $ctr->ctr_addr2;?>'<?php echo $ctr->ctr_addr3;?>|<?php echo $ctr->ctr_pcode;?>|<?php echo $ctr->ctr_state;?>@<?php echo $ctr->ctr_clab_no;?>"><?php echo $ctr->ctr_comp_name;?></option>
            <?php }
	 			?>
          </select>
 		    <label>
 		    <input type="text" name="txtClabNo" maxlength="5" readonly/>
	      </label></td>
	  </tr>
 		<tr>
 			<td rowspan="2">Current Address</td>
 			<td rowspan="2">Line1:
              <input name="txtcuraddr1" type="text" size="50" maxlength="100" />
              <br />
Line2:
<input type="text" name="txtcuraddr2" size="50" maxlength="100" />
<br />
Line3:
<input type="text" name="txtcuraddr3" size="50" maxlength="100" /></td>
 		    <td colspan="2">Postcode</td>
 		    <td colspan="2"><input type="text" name="txtpcode" maxlength="5" /></td>
 		</tr>
 		<tr>
 		  <td colspan="2">State</td>
 		  <td colspan="2"><select name="selstate">
            <option value=""></option>
            <?php foreach($allStates->result() as $state){ ?>
            <option value="<?php echo $state->state_id;?>"><?php echo $state->state_name;?></option>
            <?php } ?>
          </select></td>
	  </tr>
	  <tr>
 		  <td colspan="6" align="LEFT"><strong><u>Work History Description (OPTIONAL)</u></strong></td>
	  </tr>
 		<tr>
 			<td colspan="6" align="LEFT"><u>History 1</u></td>
 		</tr>
 		<tr>
 			<td>Company</td>
 			<td colspan="5"><input type="text" name="txtcompany1" maxlength="120" value="" size="50"/></td>
 		</tr>
 		<tr>
 			<td>Location</td>
 			<td colspan="5">
 				<SELECT name="selstate1">
 					<option value="" SELECTED></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_name;?>"><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT> 			</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="LEFT"><u>History 2</u></td>
 		</tr>
 		<tr>
 			<td>Company</td>
 			<td colspan="5"><input type="text" name="txtcompany2" maxlength="120" size="50" value=""/></td>
 		</tr>
 		<tr>
 			<td>Location</td>
 			<td colspan="5">
 				<SELECT name="selstate2">
 					<option value="" SELECTED></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_name;?>"><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT> 			</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="LEFT"><u>History 3</u></td>
 		</tr>
 		<tr>
 			<td>Company</td>
 			<td colspan="5"><input type="text" name="txtcompany3" maxlength="120" value="" size="50" /></td>
 		</tr>
 		<tr>
 			<td>Location</td>
 			<td colspan="5">
 				<SELECT name="selstate3">
 					<option value="" SELECTED></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_name;?>"><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT> 			</td>
 		</tr>
 		<tr>
 			<td colspan="6">&nbsp;</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="Center"><input type="submit" name=" Save " value=" Save " onclick="return confirm('Are you sure you want to save?');"/>
 				<input type="button" name="Back" value=" Back " onclick="location.href='<?php echo site_url();?>/contLabour/listLabour';"/> 			</td>
 		</tr>
 	</table>	   
</form>
  <p align="center">&nbsp;</p>
  <!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtname': {
			'l': 'Labour Name',  // label
			'r': true,    // required
			't': 't_txtname'// id of the element to highlight if input not validated
		},
		'selsector':{'l':'Sector','r':true,'t':'t_sector'},
		'seltype':{'l':'Type','r':true,'t':'t_type'},
		'txtpassno':{'l':'Passport no.','r':true,'t':'t_txtpassno'},
		'selEmp':{'l':'Person in charge','r':true,'t':'t_selEmp'},
		//'selrace':{'l':'Race/Ethnic','r':true,'t':'t_selrace'},
		'selgender':{'l':'Gender','r':true,'t':'t_selgender'},
		'selcountry':{'l':'Country','r':true,'t':'t_selcountry'},
		'selday':{'l':'Date of birth->day','r':true,'t':'t_dob'},
		'selmonth':{'l':'Date of birth->month','r':true,'t':'t_dob'},
		'selyear':{'l':'Date of birth->year','r':true,'t':'t_dob'},
		'dtEntry':{'l':'Date Entry','r':true,'t':'t_dtEntry'},
		'txtpcode':{'l':'Postcode','r':false,'t':'t_txtpcode','f':'unsigned','mx': 5},
		'dtPassportExp':{'l':'Passport Expiry Date','r':true,'t':'t_dtPassportExp'},
		'txtworktrade':{'l':'Work Trade','r':true,'t':'t_txtworktrade'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('laborRegForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
    
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
