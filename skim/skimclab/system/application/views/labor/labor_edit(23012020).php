<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - Edit Labour</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- ? Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script language="JavaScript" src="<?php echo base_url()?>js/validator.js"></script>
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
   	function photoUpload(){
		var wkrid = document.editLaborForm.wkr_id.value;
		window.open('<?php echo site_url();?>/contLabour/regisAttachPhoto/' + wkrid);
	}
	
	function attachContract(){
		var wkrid = document.editLaborForm.wkr_id.value;
		window.open('<?php echo site_url();?>/contLabour/attachContract/' + wkrid);
	}
	
	function attachDoc(){
		var wkrid = document.editLaborForm.wkr_id.value;
		window.open('<?php echo site_url();?>/contLabour/attachDoc/' + wkrid);
	}
	
	function addtotrade(){
		if(document.getElementById("selworktrade").value != '0'){
				
			var existingtrade = document.editLaborForm.txtworktrade.value;
			var newtradevalue = "";
				
			if(existingtrade.length ==0)
				newtradevalue = document.editLaborForm.selworktrade.value;
			else 
				newtradevalue = existingtrade + ',' + document.editLaborForm.selworktrade.value;				
				
				document.editLaborForm.txtworktrade.value = newtradevalue;
		}
	}
	
	function cleartrade(){
		document.editLaborForm.txtworktrade.value = "";
	}
	
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
			tmonth = today.getMonth()+1;
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
					yearsinmy = tyear - eyear + 1;
				else
					yearsinmy = tyear - eyear;
			}
			if(yearsinmy < 0) yearsinmy = 0;		//if -1, -2 etc
						
			document.editLaborForm.txtyearsinmy.value = yearsinmy;
	}
	
		function getcountry(){
	     var frm = "update";
		 var url = "<?php echo site_url('contLabour/getcountry');?>/" + frm
window.open(url, 'Country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
	
	</script>
 <style type="text/css">
<!--
.style11 {color: #009900; font-weight: bold; }
.style12 {color: #009900}
.style14 {color: #000000}
-->
 </style>
</head>

<body onLoad="calculateAgeAndYearsInMy();">
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="dashboard.php">Labour</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Registration </h4>

<h3 id="switchsection1-title" class="handcursor">Labour Details<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
<strong><font color="red"><?php if(isset($successMsg)) echo $successMsg;?></font> </strong>
<form method="POST" action="<?php echo site_url();?>/contLabour/updateLabourDetailsSubmit" name="editLaborForm" id="editLaborForm" onsubmit="return v.exec()">
<table width="100%" border="0">
 		<tr>
 			<th colspan="6" align="RIGHT">
 				<input type="button" name="btnPrintDoc" value="Print Doc" onclick="printPage();"/>
 				<input type="button" name="btnAttachContract" value="Attach Contract" onclick="attachContract();"/>
 				<input type="button" name="btnAttachDoc" value="Attach Doc" onclick="attachDoc();"/>
 				<input type="submit" name="btnSave" value=" Update " <?php if(strpos($accessibility, 'r') == false) echo "DISABLED";  ?> />
 				<input type="button" name="btnRefresh" value=" Refresh " onclick="location.href='<?php echo site_url();?>/contLabour/labourDetails/<?php echo $labor->wkr_id;?>'"/>
 				<input type="button" name="btnBack" value=" Back " onclick="location.href='<?php echo site_url();?>/contLabour/listLabour'"/> 			</th>
 		</tr>
 		<tr>
 			<td rowspan="5" width="15%" valign="bottom">
 				<?php echo $photoInfo;?> 			</td>
 			<td width="16%" id="t_txtpassno">Passport No</td>
 			<td width="25%" colspan="2"><input type="text" name="txtpassno" id="txtpassno" maxlength="" value="<?php echo $labor->wkr_passno;?>" READONLY/>
 							<input type="button" name="btnReplace" value="Replacement" class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/passportReplacement/<?php echo $labor->wkr_id;?>', 'Passport Number Replacement', 'height=450, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')" /> 			</td>
 			<td bordercolor="#000000" bgcolor="#000000">  <span class="style12"><span class="style14">Green Card Status </span></span><span class="style11">: </span></td>
		    <td bordercolor="#00CC00" bgcolor="#FF0000"><span class="style12">
		      <input type="button" name="btnView3" value="Green Card"  class="style11" onclick="window.open('<?php echo site_url();?>/contLabour/changeGCStatusPt2/<?php echo $labor->wkr_id;?>', 'Green Card History', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>
		      <font color="#009900">
		      &nbsp;<?php if($labor->wkr_greencard != 0) echo 'Available !';?>
			  &nbsp;<?php if($labor->wkr_biogreencard != 0) echo 'Bio Available !';?>
	        </font>		    </span></td>
      </tr>
 		<tr>
 			<td id="t_txtname">Name <font color="red">*</font></td>
 			<td colspan="2"><input type="text" name="txtname" maxlength="" size="35" value="<?php echo $labor->wkr_name;?>"/></td>
 			<td>Movement Status</td>
 			<td><input type="button" name="btnView1" value="View Status History"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/viewStatusHistory/<?php echo $labor->wkr_id;?>', 'Passport Exp History', 'height=350, width=500, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/>
		    <font color="#990000"><?php echo $labor->avlab_desc;?></font> </td>
 		</tr>
 		<tr>
 			<td>Old Passport No.</td>
 			<td colspan="2"><input type="text" name="txtoldpassno" maxlength="100" value="<?php echo $labor->wkr_oldpassno;?>" READONLY/></td>
 			<td>SOCSO ID</td>
 			<td><input type="text" name="txtsocsoid" width="12" maxlength="12" value="<?php echo $labor->wkr_socso_id ?>"/></td>
 		</tr>
 		<tr>
 			<td>Bank Draft No: </td>
 			<td colspan="2"><input type="text" name="txtorgReceipt" value="<?php echo $labor->wkr_orgreceipt;?>" maxlength="100" /></td>
 			<td>Person in Charge: <font color="red">*</font></td>
 			<td>
 				<SELECT name="selEmp">
 					<option value="0" <?php if($labor->wkr_incharge == 0) echo "SELECTED";?>></option>
 					<?php foreach($allEmployees->result() as $emp){?>
 					<option value="<?php echo $emp->emp_id;?>" <?php if($labor->wkr_incharge == $emp->emp_id) echo "SELECTED";?>><?php echo $emp->emp_username;?></option>
 					<?php } ?>
 				</SELECT> 			</td>
 		</tr>
 		<tr>
		    <td>Next Of Kin</td>
			<td colspan="2"><input type="text" name="txtnok" value="<?php echo $labor->wkr_next_of_kin; ?>" size="35"/></td>
			<td>Relationship</td>
			<td><input type="text" name="txtrelationship"  value="<?php echo $labor->wkr_relationship; ?>"/></td>
		</tr>
 		<tr>
 			<td>Date of Birth <font color="red">*</font></td>
 			<td colspan="3">
 				<input type="text" name="dtdob" id="dtdob" value="<?php echo date('d-m-Y', strtotime($labor->wkr_dob));?>" READONLY/>
 				<input id="button4" name="btnDate4" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtdob'), this)" /> <font color="red">*</font>
 				&nbsp; &nbsp; Age: <input type="text" name="txtage" size="5" READONLY/> 			</td>
 			<td id="t_selgender">Gender <font color="red">*</font></td>
 			<td>
 				<SELECT name="selgender">
 					<option value=""></option>
 					<OPTION value="1" SELECTED>MALE</option>
 					<OPTION value="2">FEMALE</option>
 				</SELECT> 			</td>
 		</tr>
 		<tr>
 			<td id="t_selcountry">Country<font color="red">*</font></td>
 			<td colspan="3">
			 <input type="text" value="<?php echo $labor->cty_desc ?>" name="selcountrydesc" /><input type="hidden" value="<?php echo $labor->wkr_country ?>" name="selcountry" /><input type="button" onclick="getcountry()" value="..."/></td>
			<td>Nationality </td>
			<td><input type="text" value="<?php echo $labor->nat_desc ?>" name="selnationalitydesc" /><input type="hidden" value="<?php echo $labor->wkr_nationality ?>" name="selnationality" /></td>
 		</tr>
 		<tr>
 			<td>Salary</td>
 			<td><input type="text" name="txtsalary" value="<?php echo $labor->wkr_salary?>"/> </td>
 			<td colspan="2">&nbsp;</td>
		  <td>JTK Submission</td>
			<td><input type="checkbox" name="chkjtk" value="1" <?php if($labor->wkr_jtk == '1') echo "CHECKED"; ?>/>
Rerefence No. 
  <input type="text" name="txtrefjtk" width="200" value="<?php echo $labor->wkr_jtk_ref ?>"/></td>
 		</tr>
 		<tr>
 			<td rowspan="2">Place Of Birth</td>
 			<td rowspan="2" colspan="3"><textarea name="txthomeaddr" cols="50" rows="2"><?php echo $labor->wkr_homeaddr;?></textarea></td>
 			<td>Zipcode</td>
 			<td><input type="text" name="txtzipcode" maxlength="10" value="<?php echo $labor->wkr_zipcode;?>" /></td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td>&nbsp;</td>
 		</tr>
 		<tr>
 			<td rowspan="2">Current Address</td>
 			<td rowspan="2" colspan="3">
 				Line1: <input type="text" name="txtcuraddr1" size="50" maxlength="100" value="<?php echo $labor->wkr_address1;?>" /><br />
	 			Line2: <input type="text" name="txtcuraddr2" size="50" maxlength="100" value="<?php echo $labor->wkr_address2;?>"/><br />
	 			Line3: <input type="text" name="txtcuraddr3" size="50" maxlength="100" value="<?php echo $labor->wkr_address3;?>"/> 			</td>
 			<td id="t_txtpcode">Postcode</td>
 			<td><input type="text" name="txtpcode" maxlength="5" value="<?php echo $labor->wkr_pcode;?>"/></td>
 		</tr>
 		<tr>
 			<td>State</td>
 			<td><SELECT name="selstate">
 					<option value=""></option>	
 					<?php foreach($allStates->result() as $state){ ?>	
 					<option value="<?php echo $state->state_id;?>" <?php if($labor->wkr_state == $state->state_id) echo "SELECTED";?>><?php echo $state->state_name;?></option>	
 					<?php } ?>
 				</SELECT> 			</td>
 		</tr>
 	    <tr>
 			<td>Date Entry (M'sia)</td>
 			<td colspan="3">
 				<input type="text" name="dtEntry" id="dtEntry" maxlength="" value="<?php if($labor->wkr_entrydate != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_entrydate));?>" READONLY/>
 				<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtEntry'), this)" /> <font color="red">*</font> 			</td>
 			<td>No. of year in M'sia</td>
 			<td><input type="text" name="txtyearsinmy" size="5" READONLY/></td>
 		</tr>
 		<tr>
 			<td>Passport Expiry Date</td>
 			<td colspan="3">
 				<input type="text" name="dtPassportExp" id="dtPassportExp" value="<?php echo date('d-m-Y', strtotime($labor->wkr_passexp));?>" READONLY/>
 				<input type="button" name="btnView1" value="View &amp; Update"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/viewPassportExpHistory/<?php echo $labor->wkr_id;?>', 'Passport Exp History', 'height=400, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/> <font color="red">*</font>
 				<input type="button" name="btnView2" value="Change Status"  class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/changeLaborStatusPt2/<?php echo $labor->wkr_id;?>', 'Passport Exp History', 'height=400, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/> 			</td>
 			<td>Passport Issue </td>
 			<td><input type="text" name="txtpassissue" value="<?php echo $labor->wkr_passissue ?>"/></td>
 		</tr>
 		<tr>
 			<td>Permit Expiry Date</td>
 			<td colspan="3">
 				<input type="text" name="dtPermitExp" id="dtPermitExp" value="<?php if($labor->wkr_permitexp != "0000-00-00") echo date('d-m-Y', strtotime($labor->wkr_permitexp));?>" READONLY/>
			 	<input type="button" name="btnView2" value="View &amp; Update" class="smoothbtn1" onclick="window.open('<?php echo site_url();?>/contLabour/viewPermitExpHistory/<?php echo $labor->wkr_id;?>', 'Permit Exp History', 'height=400, width=420, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')"/> <font color="red">*</font> 			</td>
 			<td>Current PLKS No.</td>
 			<td><input type="text" name="txtplksno" value="<?php echo $labor->wkr_plksno;?>" READONLY/></td>	
 		</tr>
		<tr>
		    <td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
 			<td colspan="6">&nbsp;</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="LEFT"><u>Skill & Employment Details</u></td>
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
 							<input type="text" name="txtworktrade" value="<?php echo $labor->wkr_wtrade;?>" size="40" READONLY />
 							<input type="button" name="btnclear" value="Clear" onclick='javascript:cleartrade();' class="smoothbtn1"/> 			</td>
 			<td>Date Accredited (SCC Date)</td>
 			<td><input type="text" name="dtskk" id="dtskk" maxlength="" value="<?php if($labor->wkr_skkdate != '0000-00-00') echo date('d-m-Y', strtotime($labor->wkr_skkdate));?>" readonly="readonly"/>
            <input id="button2" name="button" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtskk'), this)" /></td>
 			<td>SCC Ref No</td>
 			<td><input type="text" name="txtskkref" maxlength="22" value="<?php echo $labor->wkr_skkref;?>" /></td>
		</tr>
 		<tr>
 			<td>Current Employer</td>
 			<td colspan="5">
 				<?php if(strlen($labor->ctr_comp_name)>0){?>
 				<input type="text" name="txtCurrentEmp"  value="<?php echo $labor->ctr_comp_name;?>" size="60" READONLY/>
				<?php 
					}
					else{ ?>
					<SELECT name="selCurrentCompany">
	 					<option value=""></option>
		 				<?php foreach($allContractors->result() as $ctr){
			 			?>
			 				<option value="<?php echo $ctr->ctr_clab_no;?>" <?php if($ctr->ctr_clab_no == $labor->ctr_comp_name) echo "SELECTED DISABLED";?>><?php echo $ctr->ctr_comp_name;?></option>
			 			<?php }
			 			?>
		 			</SELECT>
				<?php
					}
				?> 			</td>
 		</tr>
 		<tr>
 			<td>First Employer</td>
 			<td colspan="5"><input type="text" name="txtInitEmp" value="<?php echo $labor->wkr_initemp;?>" size="60"/></td>
 		</tr>
 		<tr>
 			<td>Last Employer</td>
 			<td colspan="5"><input type="text" name="txtLastEmp" value="<?php echo $labor->wkr_lastemp;?>" size="60"/></td>
 		</tr>
 		<tr>
 			<td colspan="6">&nbsp;</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="LEFT"><u>Employer History</u></td>
 		</tr>
 		<tr>
 			<td colspan="6">
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
	 					<td><?php echo $hist->ctr_comp_name;?> <?php echo $hist->rel_otherinfo;?></td>
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
 				</table> 			</td>
 		</tr>
 		<tr>
 			<td>&nbsp;</td>
 			<td colspan="5">&nbsp;</td>
 		</tr>
 		<tr>
 			<td colspan="6" align="Right">
 				<input type="hidden" name="hidcurrentemp" value="<?php echo $labor->wkr_currentemp;?>" />
 				<input type="hidden" name="wkr_id" value="<?php echo $labor->wkr_id;?>" />
 				<input type="button" name="btnPrintDoc" value="Print Doc" onclick="printPage();"/>
 				<input type="button" name="btnAttachContract" value="Attach Contract" onclick="attachContract();"/>
 				<input type="button" name="btnAttachDoc" value="Attach Doc" onclick="attachDoc();"/>
 				<input type="submit" name="btnSave" value=" Update " <?php if(strpos($accessibility, 'r') == false) echo "DISABLED";  ?>/>
 				<input type="button" name="btnRefresh" value=" Refresh " onclick="location.href='<?php echo site_url();?>/contLabour/labourDetails/<?php echo $labor->wkr_id;?>'"/>
 				<input type="button" name="btnBack" value=" Back "  onclick="location.href='<?php echo site_url();?>/contLabour/listLabour'"/> 			</td>
 		</tr>
 	</table>	
</form>   

<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtname': {
			'l': 'Labour Name',  // label
			'r': true,    // required
			't': 't_txtname'// id of the element to highlight if input not validated
		},
		'txtpassno':{'l':'Passport no.','r':true,'t':'t_txtpassno'},
		//'selrace':{'l':'Race/Ethnic','r':true,'t':'t_selrace'},
		'selgender':{'l':'Gender','r':true,'t':'t_selgender'},
		'selcountry':{'l':'Country','r':true,'t':'t_selcountry'},
		'txtpcode':{'l':'Postcode','r':false,'t':'t_txtpcode','f':'unsigned','mx': 5},
		'txtworktrade':{'l':'Work Trade','r':true,'t':'t_txtworktrade'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('editLaborForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->
  <p align="center">&nbsp;</p>
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
