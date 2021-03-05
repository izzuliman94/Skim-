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
.style8 {color: #FF0000}
-->
</style>
</head>
<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Tax Invoice</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Tax Invoice</h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/savetaxinvoice">
<table width="100%" border="1" style="border-collapse: collapse;" cellpadding=2 bordercolor="#FFF">
<tr>
    <td width="210">Regional </td>
	<td colspan="5"><select name="selregion">
	<option value=""></option>
    <?php foreach($allRegion->result() as $region){ ?>
    <option value="<?php echo $region->regional_id;?>"><?php echo $region->regional_desc;?></option>
    <?php } ?>
	</select></td>
    </tr>
<tr>
	<td>Official Invoice No. </td>
	<td colspan="5"><input type="text" size="10" value="<auto generate>" readonly/>
		<!--input type="hidden" name="txtamtclab" value="0" size="20" />
		<input type="hidden" name="txtamtfomema" value="0" size="20" />
		<input type="hidden" name="txtamtothr" value="0" size="20" /-->
	</td>
</tr>

<tr>
    <td>Date Created</td>
	<td colspan="5"><!--input type="text" name="txtcreateddate" id="txtcreateddate"  size="11" readonly /-->
		<input name="txtcreateddate" id="txtcreateddate" type="text" size="10" value="<?php echo date("d-m-Y") ?>" readonly />
		<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('txtcreateddate'), this)" />
	</td>
</tr>

<tr>
    <td>Received From</td>
	<td colspan="5"><input type="text" name="txtrecfrom" value="" style='width:400px;' />
	<input type="button" value="..." onclick="opencontractor()"/></td>
</tr>
<tr>
    <td>Address</td>
	<td colspan="5">
		<textarea name="txtaddr1" style='width:400px;height:45px;'></textarea>
		<input type="hidden" name="id" value=""/>
	</td>
</tr>

<tr>
	<td>Invoice Type</td>
	<td colspan="5">
		<select name="optpmttype" onchange="valid(this.value)">   
		<option value="0"></option>
		<option value="IG">INSURANCE GUARANTEE</option>
		<option value="F">FOMEMA</option>
		<option value="O">OTHERS</option>
		</select>
	</td>
</tr>
<tr>
	<td>No Of FCL</td>
	<td colspan="5">
		<input type="text" name="txtfcl" value="0"  onchange="resetfield()" style='width:80px;text-align:center;'/>
		<span class="style8">    *</span>
	</td>
</tr>
<tr>
    <td>Country</td>
	<td colspan="3"><input type="text" name="txtcountry" value=""  style='width:130px;text-align:center;' />
		<input type="button" name="txtbtncountry" value="..." onclick="countrylist()" disabled/>
		<input type="hidden" name="txtvisa" value="0" />
		<input type="hidden" name="txtfine" value="0"/>
		<input type="hidden" name="txttransfees" value="0"/>
		<input type="hidden" name="txttranscost" value="0"/>
		<!--input type="hidden" name="id" value=""/-->
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
			<td><strong></strong></td>
		</tr>
		<tr>
			<td width=200><strong>INSURANCE GUARANTEE</strong></td>
			<td width=70><input type="checkbox" name="txtig" value="1" onclick="getins_ig()" disabled />&nbsp;IG</td>
			<td width=70><input type="checkbox" name="txtfwcs" value="1" onclick="getins_fwcs()" disabled />&nbsp;FWCS</td>
			<td width=70><input type="checkbox" name="txtfwhs" value="1" onclick="getins_fwhs()" disabled />&nbsp;FWHS</td>
			<td width=90 align=center><input type="text" name="txtamtinso" value="0" style='width:80px;text-align:center;'  /></td>
			<td width=90 align=center><input type="text" name="txtamtinsg" value="0" style='width:80px;text-align:center;'  /></td>
			<td width=90 align=center><input type="text" name="txtamtinsp" value="0" style='width:80px;text-align:center;'  /></td>
			<td width=90 align=center><input type="text" name="txtamtins" value="0" style='width:80px;text-align:center;'  /></td>
			<td>
				<input type="hidden" name="txtamtig" value="0" style='width:80px;text-align:center;'  />
				<input type="hidden" name="txtamtfwcs" value="0" style='width:80px;text-align:center;'  />
				<input type="hidden" name="txtamtfwhs" value="0" style='width:80px;text-align:center;'  />
			</td>
		</tr>
		<tr>
			<td ><strong>FOMEMA</strong></td>
			<td colspan=3 align=left><input type="checkbox" name="txtmale" value="1" onclick="getfomema()" disabled />&nbsp;MEDICAL</td></td>
			<td align=center><input type="text" name="txtamtfomo" value="0" style='width:80px;text-align:center;'  /></td>
			<td align=center><input type="text" name="txtamtfomg" value="0" style='width:80px;text-align:center;'  /></td>
			<td align=center></td>
			<td align=center><input type="text" name="txtamtfom" value="0" style='width:80px;text-align:center;'  /></td>
			<td><input type="hidden" name="txtfomfee" value="0" style='width:80px;text-align:center;' /></td>
		</tr>
		<tr>
			<td rowspan=2 valign=top><strong>OTHERS REMARK</strong></td>
			<td colspan=3 align=left><input type="checkbox" name="txtothersfees" value="1" disabled />&nbsp;FEES</td>
			<td align=center><input type="text" name="txtamtothr_o" value="0"  onchange="get_others(this.value)" style='width:80px;text-align:center;'  /></td>
			<td align=center><input type="text" name="txtamtothr_t" value="0" style='width:80px;text-align:center;'  /></td>
			<td align=center></td>
			<td align=center><input type="text" name="txtamtothr" value="0" style='width:80px;text-align:center;'  /></td>
			<td><!--input type="hidden" name="txtothfees" value="0" size="20" /--></td>
		</tr>
		<tr>
			<td colspan=3 align=center><textarea  name="txtothremarks" style='width:95%;height:40px;'></textarea></td></td>
			<td colspan=5></td>
		</tr>
	</table>	  
  </td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
   <td colspan="2" align="center"><input type="submit" value="Save" />&nbsp;<input type="button" onclick="clearfield()" value="Reset" /></td>
</tr>
</table>
</form>
</body>
</html>
