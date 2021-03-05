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
	function addtospec(){
		if(document.getElementById("selspec").value != '0'){
				
			var existingspec = document.getElementById("txtspec").value;
			var newspecvalue = "";
				
			if(existingspec.length ==0)
				newspecvalue = document.getElementById("selspec").value;
			else 
				newspecvalue = existingspec + ',' + document.getElementById("selspec").value;				
				
				document.getElementById("txtspec").value = newspecvalue;
		}
	}
	
	function clearspec(){
		document.getElementById("txtspec").value = "";
	}
	
	function addtocategory(){
		if(document.getElementById("selcategory").value != '0'){
			var existingcatg = document.getElementById("txtcategory").value;
			var newcatgvalue = "";
			
			if(existingcatg.length ==0)
				newcatgvalue = document.getElementById("selcategory").value;
			else 
				newcatgvalue = existingcatg + ',' + document.getElementById("selcategory").value;
				
				document.getElementById("txtcategory").value = newcatgvalue;
		}
	}
	
	function clearcategory(){
		document.getElementById("txtcategory").value = "";
	}
	
	function fillDefaultPayment(){
	 if(document.newCtrForm.periodreg[0].checked)	document.newCtrForm.amount.value="20";
	 else if(document.newCtrForm.periodreg[1].checked)	document.newCtrForm.amount.value="40";
	 else if(document.newCtrForm.periodreg[2].checked)	document.newCtrForm.amount.value="50";
	 else document.newCtrForm.amount.value="";
  	}
	
	function getagent(process){
	var process
	var url = "<?php echo site_url('contContractor/agent_list');?>/" + process
    window.open(url, 'Agent list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
	function addkod(x,y)
	{
		if(x==1) { document.getElementById("directorMobile").value='6'+y; }
		if(x==2) { document.getElementById("contactMobile").value='6'+y; }
	}

</script>
</head>

<body>
<h4><a href="dashboard.php">Contractor</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Company Registration </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>

<h3 id="switchsection1-title" class="handcursor">Company Registration Details  <img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url();?>/contContractor/registrationFormSubmit" method="POST" name="newCtrForm" id="newCtrForm" onsubmit="return v.exec()">
    <table width="100%" border="0">
      <tr>
        <td width="17%">CLAB No</td>
        <td width="33%"><input type="text" name="clabno" size="25" value="&lt; auto generate number &gt;" READONLY /></td>
        <td width="17%">Reg.Status</td>
        <td width="33%"><SELECT name="comp_reg_status" DISABLED>
        					<option value="1">ACTIVE</option>
        					<option value="2">IN-ACTIVE</option>
        					<option value="3">SUSPENDED</option>
        				</SELECT>
        </td>
      </tr>
	  <tr>
        <td id="t_companyname">Company Name</td>
        <td colspan="3"><input type="text" name="companyname" size="80" maxlength="250"/><font color="red">*</font></td>
      </tr>
      <tr>
        <td>Company Reg. No.</td>
        <td colspan="3"><input type="text" name="companyregno" maxlength="20" value="<?php echo $companyno;?>"/> <font color="red">*</font></td>
      </tr>
	  <tr>
        <td id="t_address1">Address 1</td>
        <td colspan="3">
        	<input type="TEXT" name="address1" size="80" maxlength="100" />
        <font color="red">*</font></td>
      </tr>
      <tr>
        <td>Address 2</td>
        <td colspan="3">
        	<input type="TEXT" name="address2" size="80" maxlength="100" />
        </td>
      </tr>
      <tr>
        <td>Address 3</td>
        <td colspan="3">
        	<input type="TEXT" name="address3" size="80" maxlength="100" />
        </td>
      </tr>
      <tr>
      	<td id="t_postcode">Postcode</td>
      	<td><input type="text" name="postcode" maxlength="5"/></td>
      	<td>State</td>
      	<td><select name="state">
      			<option value=""></option>
      		    <?php foreach($allStates->result() as $state){
	      		?>
	      		<option value="<?php echo $state->state_id;?>"><?php echo $state->state_name;?></option>
      		    <?php
  		    	}
      		    ?>
      	</select>
      	</td>
      </tr>
	  <tr>
        <td id="t_telephone1">Telephone</td>
        <td><input type="text" name="telephone1" maxlength="20" /> <font color="red">*</font> <input type="text" name="telephone2" maxlength="20"/> </td>
      	<td>Fax No</td>
      	<td><input type="text" name="fax" maxlength="20" /> </td>
        </tr>
		<tr>
		    <td>Agent</td>
			<td colspan="3"><input type="text" name="txtagname" size="80" readonly/>
			<input type="hidden" name="txtagid" readonly/>
			<input type="button" name="btnagn" onclick="getagent('N')" value="..."/> 
			</td>			
		</tr>
		<tr>
		    <td>Address 1</td>
			<td colspan="3"><input type="text" name="txtagadd1" size="80" readonly/></td>			
		</tr>
		<tr>
		    <td>Address 2</td>
			<td colspan="3"><input type="text" name="txtagadd2" size="80" readonly/></td>			
		</tr>
		<tr>
		    <td>Address 3</td>
			<td colspan="3"><input type="text" name="txtagadd3" size="80" readonly/></td>			
		</tr>
	  <tr>
        <td id="t_cidbreg">CIDB Reg. No</td>
        <td><input type="text" name="cidbreg" /> <font color="red">*</font></td>
        <td id="t_cidbexpire">CIDB Exp. Date</td>
      	<td><input type="text" name="cidbexpire" id="cidbexpire" maxlength="20" READONLY/>
			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('cidbexpire'), this)" /> <font color="red">*</font>
      	</td>
      </tr>
      <tr>
      	<td>Email Address</td>
      	<td colspan="3"><input type="text" name="email" size="50" maxlength="50" /></td>
      </tr>
	  <tr>
        <td>Grade</td>
        <td colspan="3"><select name="grade">
        					<option value="0" SELECTED></option>
        				<?php foreach($allGrades->result() as $grade){
	        			?>
	        				<option value="<?php echo $grade->grade_id; ?>"><?php echo $grade->grade_id; ?> - <?php echo $grade->grade_desc; ?></option>
	        			<?php } ?>
                        </select>
        </td>
      </tr>
      <tr>
        <td>Category</td>
        <td colspan="3"><select name="category" id="selcategory" onchange='javascript:addtocategory();'>
        					<option value="0" SELECTED></option>
        				<?php foreach($allCategories->result() as $category){
	        			?>
	        				<option value="<?php echo $category->category_id;?>"><?php echo $category->category_id; ?> - <?php echo $category->category_desc;?></option>
	        			<?php } ?>
                        </select>
                        <input type="text" name="txtcategory" id="txtcategory" size="30" value="" READONLY/><input type="button" name="clear" value="Clear" class="smoothbtn1" onclick='javacript:clearcategory();'/>
        </td>
      </tr>
      <tr>
        <td>Specialization</td>
        <td colspan="3"><select name="specialization" id="selspec" onchange='javascript:addtospec();'>
        					<option value="0" SELECTED></option>
        				<?php foreach($allSpec->result() as $spec){
	        			?>
	        				<option value="<?php echo $spec->spec_id;?>"><?php echo $spec->spec_id;?> - <?php echo $spec->spec_desc;?></option>
	        			<?php } ?>
                        </select>
                        <input type="text" name="txtspec" id="txtspec" size="30" value="" READONLY/><input type="button" name="clear2" class="smoothbtn1" value="Clear" onclick='javascript:clearspec();'/>
        </td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td>Period of Reg.</td>
      	<td>
      		<input type="radio" name="periodreg" value="1" onclick="fillDefaultPayment();"/>1 year
      		<input type="radio" name="periodreg" value="2" onclick="fillDefaultPayment();"/>2 years
      		<input type="radio" name="periodreg" value="3" onclick="fillDefaultPayment();"/>3 years
      	</td>
      	<td>Amount (RM)</td>
      	<td><input type="text" name="amount" size="20" READONLY/></td>
      </tr>
      <tr>
      	<td>Payment Mode</td>
      	<td><input type="radio" name="paymentmode" value="1" />Cash
      		<input type="radio" name="paymentmode" value="2" />Cheque/Draft/MO
      	</td>
      	<td>Cheque No</td>
      	<td><input type="text" name="chequeno" size="20" /></td>
      </tr>
      <tr>
      	<td>Payment Date</td>
      	<td colspan="3">
      		<input type="text" name="paymentdate" id="paymentdate" READONLY/>
      		<input id="button2" name="btnDate2" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('paymentdate'), this)" />    
      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td>Attachments</td>
      	<td colspan="3"><input type="checkbox" name="form24" value="1" />Form24
      	                <input type="checkbox" name="form49" value="1" />Form 49 
      	                <input type="checkbox" name="cidb_certcopy" value="1" />Copy of CIDB Certificate 
      	                <input type="checkbox" name="iccopy" value="1" />IC Copy
      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
      	<td colspan="3"><input type="checkbox" name="others" value="1" />Others &nbsp; &nbsp; &nbsp;
      					Please specify: <input type="text" name="attach_others" size="40" maxlength="200" /> &nbsp; &nbsp; &nbsp; <input type="button" name="btnAttach" value="Attach Doc"  onclick="attachdoc();" DISABLED/>
      	</td>
      </tr>
      <tr>
       	<td>&nbsp;</td>
      	<td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td>Director</td>
      	<td><input type="text" name="director" size="40" maxlength="250" /></td>
      	<td>Mobile No.</td>
      	<td><input type="text" name="directorMobile" id="directorMobile" size="35" maxlength="50"  onchange="javascript:addkod(1,this.value);" /></td>
      </tr>
      <tr>
      	<td id="t_contactperson">Contact Person</td>
      	<td><input type="text" name="contactperson" size="40" maxlength="250" /> <font color="red">*</font></td>
      	<td>Mobile No.</td>
      	<td><input type="text" name="contactMobile" id="contactMobile" size="35" maxlength="50"  onchange='javascript:addkod(2,this.value);' /></td>
      </tr>
      <tr>
      	<td>Designation</td>
      	<td colspan="3"><input type="text" name="contactDesig" size="80" maxlength="250" /></td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
      	<td id="t_enteredby">Entered by</td>
      	<td><input type="text" name="enteredby" size="30" maxlength="120" value="<?php echo $this->session->userdata('username');?>" READONLY/> <font color="red">*</font></td>
      	<td>Entered date</td>
      	<td><input type="text" name="entereddate" id="entereddate" value="<?php echo date('d-m-Y');?>" READONLY />
      		<input id="button3" name="btnDate3" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('entereddate'), this)" />    
      		<font color="red">*</font>
      	</td>
      </tr>
      <tr>
      	<td>&nbsp;</td>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" align="center"><input type="submit" name="btnRegister" value="Register" onclick="return confirm('Are you sure you want to register this contractor?');"/>
        				<input type="reset" name="Reset" value="Reset" />                
        </td>
      </tr>
    </table>
  </form>
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
<!--JAVASCRIPT FOR FORM VALIDATION-->
    <script>
	// form fields description structure
	var a_fields = {
		'companyname': {
			'l': 'Company Name',  // label
			'r': true,    // required
			't': 't_companyname'// id of the element to highlight if input not validated
		},
		//'client_newicno':{'l':'New IC No.','r':false,'f':'unsigned','mx': 12,'t':'t_newic'},
		'address1':{'l':'Address 1','r':true,'t':'t_address1'},
		'telephone1':{'l':'Telephone','r':true,'t':'t_telephone1'},
		'cidbreg':{'l':'CIDB Reg. No','r':true,'t':'t_cidbreg'},
		'cidbexpire':{'l':'CIDB Expiry Date','r':true,'t':'t_cidbexpire'},
		'contactperson':{'l':'Contact Person','r':true,'t':'t_contactperson'},
		'postcode':{'l':'Postcode','r':false,'t':'t_postcode','f':'unsigned','mx': 5},
		'enteredby':{'l':'Entered by','r':true,'t':'t_enteredby'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('newCtrForm', a_fields, o_config);

	</script>
<!--END OF FORM VALIDATION JAVASCRIPT-->
</body>
</html>
