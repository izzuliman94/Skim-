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
        //to refresh the main page when close button is hit
        function closeAndRefresh()
        {
	        window.opener.location.href=window.opener.location.href; // refresh the main page
			window.opener.focus(); // focus on the main page
			window.close(); // close the popup page
        }
     </script>	
<!--end of calendar-->
  <script type="text/javascript">
  	function fillDefaultPayment(x)
{
	if(x==1) {document.getElementById("amount").value="21.20";} 
	if(x==2) {document.getElementById("amount").value="42.40";}
	if(x==3) {document.getElementById("amount").value="53.00";}  
	if(x==4) {document.getElementById("amount").value="74.20";} 
	if(x==5) {document.getElementById("amount").value="95.40";}
	if(x==6) {document.getElementById("amount").value="106.00";} 
	if(x==7) {document.getElementById("amount").value="127.20";} 
	if(x==8) {document.getElementById("amount").value="148.40";}
	if(x==9) {document.getElementById("amount").value="159.00";} 
}
  </script>
  <style type="text/css">
<!--
.style2 {color: #0000FF}
-->
  </style>
</head>

<body onload="fillDefaultPayment();">
<h4>Contractor <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Edit <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Payment </h4>

<div><a href="javascript:switchsection.sweepToggle('contract')">Contract All</a> | <a href="javascript:switchsection.sweepToggle('expand')">Expand All</a></div>
<h3 id="switchsection1-title" class="handcursor">CLAB MEMBERSHIP PAYMENT<img src="<?php echo base_url();?>/images/down_arrow_org.gif" width="13" height="14" /></h3>
<div id="switchsection1" class="switchgroup1"> 
  <form action="<?php echo site_url();?>/contcontractor/paymentSubmit" method="POST" name="paymentForm" id="paymentForm">
    <table width="500" border="0">
      	<tr>
   		<th colspan="2" align="LEFT">Payment Form</td>      	</tr>
    	<tr>
      		<td width="30%">Company ID</td>
      		<td><input type="text" name="txtclabno" value="<?php echo $clabno;?>" READONLY/></td>
      	</tr>
      	<tr>
      		<td width="30%">Company Name</td>
      		<td><input type="text" name="txtcompname" value="<?php echo $comp_name;?>" size="50" READONLY/></td>
      	</tr>
      	<tr>
      		<td>Period of Reg.</td>
      		<td>
     
	      		<label>
	      		<select id="reg" name="reg" onchange="fillDefaultPayment(this.value)">
                <option value="" SELECTED>Select Years</option>
			<option value="1">1 Year</option>
			<option value="2">2 Year</option>
			<option value="3">3 Year</option>
            <option value="4">4 Year</option>
			<option value="5">5 Year</option>
			<option value="6">6 Year</option>
            <option value="7">7 Year</option>
			<option value="8">8 Year</option>
			<option value="9">9 Year</option>
				</select>
	      		</label></td>
      	</tr>
      	<tr>
      		<td>Payment Type</td>
      		<td>
      			<input type="radio" name="paymentmode" value="1" CHECKED/>Cash
      			<input type="radio" name="paymentmode" value="2" />Cheque/Draft/MO      		</td>
      	</tr>
      	<tr>
      		<td>Amount</td>
      		<td>RM<input type="text" name="amount" size="20" id="amount" READONLY/></td>
      	</tr>
      	<tr>
      		<td>Cheque No</td>
      		<td><input type="text" name="chequeno" size="20" /></td>
      	</tr>
      	<tr>
      		<td>Payment Date</td>
      		<td>
      			<input type="text" name="paymentdate" id="paymentdate" value="<?php echo date('d-m-Y');?>" READONLY/>
      			<input id="button1" name="btnDate1" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('paymentdate'), this)" />      		</td>
      	</tr>
      	<tr>
          <td>Valid Date</td>
      	  <td><input type="text" name="validdate" id="validdate" value="<?php if($ctr->ctr_validdate != "0000-00-00") echo date('d-m-Y', strtotime($ctr->ctr_validdate));?>" readonly="READONLY"/></td>
   	  </tr>
      	<tr>
      	  <td colspan="2" align="CENTER">&nbsp;</td>
   	  </tr>
      	<tr>
      		<td colspan="2" align="CENTER">
      			<input type="submit" name="btnSubmit" value=" Add " onclick="return confirm('Are you sure you want to add a new payment?');"/>
      			<input type="button" name="btnClose" value="Close" onclick="closeAndRefresh();" />      		</td>
      	</tr>
    </table>
    <br />
    <?php if(isset($successMsg)) echo "<strong><font color=\"red\">$successMsg</font></strong>";?>
    <table width="500" border="0">
    	<tr>
    		<th colspan="4">Payment History</th>
    	    <th>&nbsp;</th>
    	    <th colspan="3">CLAB Certificate History</th>
   	    </tr>
    	<tr>
    		<th>Date</th>
    		<th>Period Reg.</th>
    		<th>Payment Type</th>
    		<th>Cheque No</th>
    	    <th>&nbsp;</th>
    	    <th>Certificate Printed Date</th>
    	    <th>Certficate Printed By</th>
    	    <th>Certificate Status</th>
    	</tr>
    	<?php if($paymentHistory->num_rows() == 0){
	    ?>
	    <tr>
	    	<td colspan="8"><font color="red">There is no payment history.</font></td>
	    </tr>
	    <?php }
	    else{
		    foreach($paymentHistory->result() as $pay){
		?>
		<tr>
			<td><?php echo date('d-m-Y', strtotime($pay->pay_date));?></td>
			<td><?php echo $pay->pay_periodreg;?> years</td>
			<td><?php if($pay->pay_type == '1') echo "Cash";
			     	  else echo "Cheque/Draft/MO"; 
			     ?>			</td>
			<td><?php echo $pay->pay_chequeno;?></td>
		    <td>&nbsp;</td>
		    <td><span class="style2"><?php echo date('d-m-Y', strtotime($pay->pay_cert_date));?></span></td>
		    <td><span class="style2"><?php echo $pay->pay_cert_pic;?></span></td>
		    <td><span class="style2"><?php echo $pay->pay_cert_print;?></span></td>
		</tr>
		<?php }
		}
		?>
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
</body>
</html>
