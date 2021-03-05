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
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script>

function clearfield(){
	document.frmpayment.txtfcl.value = "0";
	document.frmpayment.txtcountry.value = ""; 
	document.frmpayment.txtig.checked = false;
	document.frmpayment.txtfwcs.checked = false;
	document.frmpayment.txtfwhs.checked = false;
	document.frmpayment.txtmale.checked = false;
	document.frmpayment.txtamtins.value = "0.00";
	document.frmpayment.txtamtinsg.value = "0.00";
	document.frmpayment.txtamtinso.value = "0.00";
	document.frmpayment.txtamtinsp.value = "0.00";
	document.frmpayment.txtamtig.value = "0.00";
	document.frmpayment.txtamtfwcs.value = "0.00";
	document.frmpayment.txtamtfwhs.value = "0.00";
	document.frmpayment.txtamtfomo.value = "0.00";
	document.frmpayment.txtamtfomg.value = "0.00";
	document.frmpayment.txtamtfom.value = "0.00";
	document.frmpayment.txtothremarks.value = "";
	document.frmpayment.txtamtothr.value = "0.00"; 
	document.frmpayment.txtothersfees.checked = false;	
	document.frmpayment.txtamtothr_t.value = "0.00";
	document.frmpayment.txtamtothr_o.value = "0.00";
}

function resetfield(){
	document.frmpayment.txtig.checked = false;
	document.frmpayment.txtfwcs.checked = false;
	document.frmpayment.txtfwhs.checked = false;
	document.frmpayment.txtmale.checked = false;	
	document.frmpayment.txtamtins.value = "0.00";
	document.frmpayment.txtamtinsg.value = "0.00";
	document.frmpayment.txtamtinso.value = "0.00";
	document.frmpayment.txtamtinsp.value = "0.00";
	document.frmpayment.txtamtig.value = "0.00";
	document.frmpayment.txtamtfwcs.value = "0.00";
	document.frmpayment.txtamtfwhs.value = "0.00";
	document.frmpayment.txtamtfomo.value = "0.00";
	document.frmpayment.txtamtfomg.value = "0.00";
	document.frmpayment.txtamtfom.value = "0.00";
	document.frmpayment.txtothremarks.value = "";
	document.frmpayment.txtamtothr.value = "0.00";
	document.frmpayment.txtothersfees.checked = false;	
	document.frmpayment.txtamtothr_t.value = "0.00";
	document.frmpayment.txtamtothr_o.value = "0.00";	
}

function valid(tp){
 
	if(tp == 'F'){
	   
		clearfield();
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtfwcs.disabled = true;
		document.frmpayment.txtfwhs.disabled = true;
		document.frmpayment.txtbtncountry.disabled = true;
		document.frmpayment.txtothersfees.disabled = true;
	   
	}else if(tp == 'IG') {
		
		clearfield();
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtfwcs.disabled = false;
		document.frmpayment.txtfwhs.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false;
		document.frmpayment.txtothersfees.disabled = true;
	
	}else if(tp == 'O') {
		
		clearfield();
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtfwcs.disabled = true;
		document.frmpayment.txtfwhs.disabled = true;
		document.frmpayment.txtbtncountry.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
	}
}

function opencontractor(){
var frm = "receipt";
var url = "<?php echo site_url('contPayment/ctr_list');?>/" + frm
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function cancelinvoice(){

if(document.frmpayment.chkcancel.checked == true){
		document.frmpayment.chkcancel.value = "true";
		document.frmpayment.dtcancel.value = '<?php echo date('d-m-Y')?>';
		txtuser.value=document.frmpayment.currentuser.value;
	}else{
		document.frmpayment.chkcancel.value = "false";
		document.frmpayment.dtcancel.value = '0000-00-00';
		txtuser.value="";
	} 
}

function printForm3(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printinvoiceOD');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function countrylist(){
var frm = "receipt";
var url = "<?php echo site_url('contPayment/opencountrylist');?>/" + frm
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
}

function palist(){
var pmttype = document.frmpayment.optpmttype.value;
var url = "<?php echo site_url('contPayment/openpalist');?>/" + pmttype
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
}

function getwono(){
  var pmttype = document.frmpayment.optpmttype.value;
  if(pmttype == 0){ alert('Please Select Payment Type');return false }
  if(pmttype == 'V' || pmttype == 'R'){
     
	 var url = "<?php echo site_url('contPayment/workorderlist');?>/" + pmttype
window.open(url, 'Workorder List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 

    }
}

function getins_ig(){
	fcl = document.frmpayment.txtfcl.value; 
	fine = document.frmpayment.txtfine.value; 

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtig.checked = false; return false;}	
	if(fine == "" || fine == 0){ alert('Please Select Country'); document.frmpayment.txtig.checked = false; return false; }
	
	fee = 50.00;
	stamp = 10.00;
	calcig =  ((fcl * fine * 18) / 12) * 0.01;
	if(calcig > 50) {
		gst = calcig * 0.06;
		amtonly = calcig;
		num = amtonly + gst + stamp;
	}else{
		gst = fee * 0.06;
		amtonly = fee;
		num = amtonly + gst + stamp;
	} 
	amt = num.toFixed(2);
	
	if(document.frmpayment.txtig.checked == true){
	   document.frmpayment.txtamtig.value = eval(amtonly);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	   document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) + eval(gst);
	   document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) + eval(amtonly);
	   document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) + eval(stamp);
	}else{
	   document.frmpayment.txtamtig.value = 0.00;
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	   document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) - eval(gst);
	   document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) - eval(amtonly);
	   document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) - eval(stamp);
	}
}

function getins_fwcs(){
	fcl = document.frmpayment.txtfcl.value; 
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtfwcs.checked = false; return false;}

	fee = 72.00;
	stamp = 10.00;
	gst = fcl * fee * 0.06;;
	amtonly = fcl * fee;
	num = amtonly + gst + stamp;
	amt = num.toFixed(2);	

	if(document.frmpayment.txtfwcs.checked == true){		
		document.frmpayment.txtamtfwcs.value = eval(amtonly);
		document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
		document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) + eval(gst);
		document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) + eval(amtonly);
		document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) + eval(stamp);
	}else{
		document.frmpayment.txtamtfwcs.value = 0.00;
		document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
		document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) - eval(gst);
		document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) - eval(amtonly);
		document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) - eval(stamp);
	}
}

function getins_fwhs(){
	fcl = document.frmpayment.txtfcl.value; 
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtfwhs.checked = false; return false;}

	fee = 120.00;
	stamp = 10.00;
	gst = fcl * fee * 0.06;
	amtonly = fcl * fee;
	num = amtonly + gst + stamp;
	amt = num.toFixed(2);

	if(document.frmpayment.txtfwhs.checked == true){
	   document.frmpayment.txtamtfwhs.value = eval(amtonly);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	   document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) + eval(gst);
	   document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) + eval(amtonly);
	   document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) + eval(stamp);
	}else{
	   document.frmpayment.txtamtfwhs.value = 0.00;
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	   document.frmpayment.txtamtinsg.value = eval(document.frmpayment.txtamtinsg.value) - eval(gst);
	   document.frmpayment.txtamtinso.value = eval(document.frmpayment.txtamtinso.value) - eval(amtonly);
	   document.frmpayment.txtamtinsp.value = eval(document.frmpayment.txtamtinsp.value) - eval(stamp);
	}
}

function getfomema(){
	var fcl = document.frmpayment.txtfcl.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtmale.checked = false; return false;}

	fee = 180.00;
	amtonly = fcl * fee;
	gst = amtonly * 0.06;
	num = amtonly + gst;
	amt = num.toFixed(2);
	
	if(document.frmpayment.txtmale.checked == true){
		document.frmpayment.txtfomfee.value = eval(fee);
		document.frmpayment.txtamtfom.value = eval(amt);
		document.frmpayment.txtamtfomg.value = eval(gst);
		document.frmpayment.txtamtfomo.value = eval(amtonly);
	}else{
		document.frmpayment.txtfomfee.value = 0.00;
		document.frmpayment.txtamtfom.value = 0.00;
		document.frmpayment.txtamtfomg.value = 0.00;
		document.frmpayment.txtamtfomo.value = 0.00;
	}
}

function get_others(x){
	
	jum = x;
	gst = jum * 0.06;
	amt = eval(jum) + eval(gst);
	document.frmpayment.txtamtothr_t.value = gst;
	document.frmpayment.txtamtothr.value = amt;	
}

</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
<?php 

if($invoice->payment_type == 'IG'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	$strfomemaM = "disabled";
	$strothfee = "";
}elseif($invoice->payment_type == 'F'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	$strfomemaM = "";
	$strothfee = "";
}elseif($invoice->payment_type == 'O'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	$strfomemaM = "disabled";
	$strothfee = "";
}

?>


<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Invoice Tax</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Invoice Tax</h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/updatetaxinvoice">
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Payment has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">Payment Receipt has been updated!</font></strong>";
	else { //dummy else
	};
}
?>
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding=2 bordercolor="#FFF">
<tr>
	<td width="210">Official Invoice No.</td>
	<td ><input type="text" name="txtpmtno" size="10" value="<?php echo $invoice->pmt_taxinv_no?>" readonly/></td>
	<td><span class="style1">
		<input name="chkcancel" type="checkbox" id="chkcancel" onclick="cancelinvoice();" value="1" 
		<?php if($invoice->pmt_withdraw == '1') echo "checked" ;?>
		<?php if(strpos($accessibility, 'a') == false) echo "DISABLED";  ?> />Cancel Invoice&nbsp; &nbsp;&nbsp;
		<input name="dtcancel" type="text" id="dtcancel" value="<?php echo $invoice->pmt_wd_date ?>" size="11" readonly/>
		<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcancel'), this)" />
		</span>
	</td>
	<td>
		<span class="style1">
		<input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" />PIC :
		<input name="txtuser" type="text" id="txtuser" value="<?php echo $invoice->pmt_wd_by;?>"  size="10" <?php echo $strfcl ?> readonly/>
		</span>
	</td>
	<td>
		<span class="style1">Reason : 
		<input name="txtcomment" type="text" id="txtcomment" value="<?php echo $invoice->pmt_wd_comment;?>"  size="10" <?php echo $strfcl ?>/>
		</span>
	</td>
</tr>

<tr>
    <td>Date Created</td>
	<td colspan="4">
	<input type="text" name="txtcreateddate" id="txtcreateddate" size="10" value="<?php echo date('j-m-Y',strtotime($invoice->pmt_datecreated))?>" readonly/>
	<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtcreateddate'), this)" />
	</td>
</tr>
<tr>
    <td>Received From</td>
	<td colspan="4"><input type="text" name="txtrecfrom" value="<?php echo $invoice->pmt_receive_from?>" style='width:400px;' />
	  <input name="button" type="button" onclick="opencontractor()" value="..."/></td>
</tr>
<tr>
    <td>Address</td>
	<td colspan="4">
		<textarea name="txtaddr1" style='width:400px;height:45px;'><?php echo $invoice->pmt_addr?></textarea>
		<input type="hidden" name="id" value="<?php echo $invoice->clab_no ?>"/>
	</td>
</tr>
<tr>
	<td>Payment Type</td>
	<td colspan="4">
		<Select name="optpmttype" onchange="valid(this.value)">
		<option value="0"></option>
		<option value="IG" <?php if($invoice->payment_type == 'IG') echo "selected"; ?>>INSURANCE GUARANTEE</option>
		<option value="F" <?php if($invoice->payment_type == 'F') echo "selected"; ?>>FOMEMA</option>		
		<option value="O" <?php if($invoice->payment_type == 'O') echo "selected"; ?>>OTHERS</option>
		</Select>
	</td>
</tr>
<tr>
    <td>No Of FCL</td>
	<td colspan="4"><input type="text" name="txtfcl" value="<?php echo $invoice->no_of_fcl ?>"  size="10" <?php echo $strfcl ?> onchange="resetfield()" style='width:80px;text-align:center;'/></td>
</tr>
<tr>
    <td>Country:</td>
	<td colspan="4"><input type="text" name="txtcountry" value="<?php echo $invoice->country ?>"  style='width:130px;text-align:center;' />
	<input type="button" name="txtbtncountry" value="..." onclick="resetfield();countrylist();" <?php echo $strcountry ?>/>
	<input type="hidden" name="txtvisa" value="<?php echo $invoice->visa_ref ?>" />
	<input type="hidden" name="txtfine" value="<?php echo $invoice->fine_ref ?>"/>
	<input type="hidden" name="txttransfees" value="<?php echo $invoice->trans_cost_ref ?>"/>
	<input type="hidden" name="txttranscost" value="<?php echo $invoice->trans_fees_ref ?>"	/>
	</td>
</tr>

<tr>
  <!--td valign=top>Please Select</td-->
  <td colspan=6>
	<table width="100%" border="1" style="border-collapse: collapse;" cellpadding=1 bordercolor="#F0F3F4">
		<tr>
			<td align=left><strong>Payment Type</strong></td>
			<td colspan=3 align=center><strong>Description of Payment</strong></td>
			<td align=center><strong>Amount</strong></td>
			<td align=center><strong>GST</strong></td>
			<td align=center><strong>Stamp</strong></td>
			<td align=center><strong>Total</strong></td>
			<td align=center><strong>Remarks</strong></td>
		</tr>
		<tr>
			<td width=200 valign=top><strong>INSURANCE GUARANTEE</strong></td>
			<td width=70 valign=top>
				<input type="checkbox" name="txtig" value="1" <?php if($invoice->chk_ins_ig == '1') echo "Checked"?> onclick="getins_ig()"<?php echo $strinsig ?>/>&nbsp;IG
			</td>
			<td width=70 valign=top>
				<input type="checkbox" name="txtfwcs" value="1" <?php if($invoice->chk_ins_fwcs == '1') echo "Checked"?> onclick="getins_fwcs()" <?php echo $strinsfwcs ?>/>&nbsp;FWCS
			</td>
			<td width=70 valign=top>
				<input type="checkbox" name="txtfwhs" value="1" <?php if($invoice->chk_ins_fwhs == '1') echo "Checked"?> onclick="getins_fwhs()" <?php echo $strinsfwhs ?>/>&nbsp;FWHS
			</td>
			<td valign=top width=90 align=center><input type="text" name="txtamtinso" value="<?php echo $invoice->ins_amount_o?>" style='width:80px;text-align:center;'  /></td>
			<td valign=top width=90 align=center><input type="text" name="txtamtinsg" value="<?php echo $invoice->ins_amount_g?>" style='width:80px;text-align:center;'  /></td>
			<td valign=top width=90 align=center><input type="text" name="txtamtinsp" value="<?php echo $invoice->ins_amount_p?>" style='width:80px;text-align:center;'  /></td>
			<td valign=top width=90 align=center><input type="text" name="txtamtins" value="<?php echo $invoice->ins_amount?>" style='width:80px;text-align:center;'  /></td>
			<td valign=top>
				<input type="hidden" name="txtamtig" value="<?php echo $invoice->ins_amount_ig?>" style='width:80px;text-align:center;' />
				<input type="hidden" name="txtamtfwcs" value="<?php echo $invoice->ins_amount_fwcs?>" style='width:80px;text-align:center;' />
				<input type="hidden" name="txtamtfwhs" value="<?php echo $invoice->ins_amount_fwhs?>" style='width:80px;text-align:center;' />
				<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=0 >
					<tr><td >IG Policy No.</td></tr>
					<tr><td><input type="text" name="txtpolig" value="<?php echo $invoice->ins_policy_ig?>" style='width:230px;text-align:left;'  /></td></tr>
					<tr><td>FWCS Policy No.</td></tr>
					<tr><td><input type="text" name="txtpolfwcs" value="<?php echo $invoice->ins_policy_fwcs?>" style='width:230px;text-align:left;'  /></td></tr>
					<tr><td>FWHS Policy No.</td></tr>
					<tr><td><input type="text" name="txtpolfwhs" value="<?php echo $invoice->ins_policy_fwhs?>" style='width:230px;text-align:left;'  /></td></tr>
				</table>
			</td>
		</tr>
		<tr>
			<td ><strong>FOMEMA</strong></td>
			<td colspan=3 align=left>
				<input type="checkbox" name="txtmale" value="1" <?php if($invoice->chk_fomema_male == '1') echo "Checked"?> onclick="getfomema()" <?php echo $strfomemaM ?> />&nbsp;MEDICAL
			</td>
			<td align=center><input type="text" name="txtamtfomo" value="<?php echo $invoice->fomema_amounto?>" style='width:80px;text-align:center;'  /></td>
			<td align=center><input type="text" name="txtamtfomg" value="<?php echo $invoice->fomema_amountg?>" style='width:80px;text-align:center;'  /></td>
			<td align=center></td>
			<td align=center><input type="text" name="txtamtfom" value="<?php echo $invoice->fomema_amount?>" style='width:80px;text-align:center;' /></td>
			<td><input type="hidden" name="txtfomfee" value="<?php echo $invoice->fomema_fee?>" style='width:80px;text-align:center;' /></td>
		</tr>
		<tr>
			<td rowspan=2 valign=top><strong>OTHERS REMARK</strong></td>
			<td colspan=3 align=left><input type="checkbox" name="txtothersfees" value="1" <?php if($invoice->chk_others_fees == '1') echo "Checked"?> <?php echo $strothfee ?> />&nbsp;FEES</td>
			<td align=center><input type="text" name="txtamtothr_o" value="<?php echo $invoice->others_amount_o?>" onchange="get_others(this.value)" style='width:80px;text-align:center;'  /></td>
			<td align=center><input type="text" name="txtamtothr_t" value="<?php echo $invoice->others_amount_t?>" style='width:80px;text-align:center;'  /></td>
			<td align=center></td>
			<td align=center><input type="text" name="txtamtothr" value="<?php echo $invoice->others_amount?>" style='width:80px;text-align:center;'  /></td>
			<td></td>
		</tr>
		<tr>
			<td colspan=3 align=center><textarea  name="txtothremarks" style='width:95%;height:40px;'><?php echo $invoice->remarks_others?></textarea></td>
			<td colspan=5></td>
		</tr>
	</table>	  
  </td>
</tr>
<tr><td colspan="5">&nbsp;</td></tr>
<tr>
   <td colspan="5" align="center"><input type="submit" value="Update" <?php if($invoice->pmt_withdraw == '1') echo "DISABLED";?>/>
     <input type="button" value="Print Invoice A4 " onclick="printForm3()" /></td>
</tr>
</table>
</form>
</body>
</html>
