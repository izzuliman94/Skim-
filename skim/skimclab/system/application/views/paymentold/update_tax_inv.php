<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" >

/***********************************************
* Switch Content script- � Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use. Last updated April 05th, 2007.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
 <link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script>

function clearfield(){
 
   document.frmpayment.txtamtclab.value = "0.00";
   document.frmpayment.txtamtclab_only.value = "0.00";
   document.frmpayment.txtamtclab_tax.value = "0.00";
   document.frmpayment.txtamtjim.value = "0.00";
   document.frmpayment.txtamtjim_plks.value = "0.00";
   document.frmpayment.txtamtjim_fees.value = "0.00";
   document.frmpayment.txtamtjim_visa.value = "0.00";
   document.frmpayment.txtamtjim_levi.value = "0.00";
   document.frmpayment.txtamtjim_sp.value = "0.00";
   document.frmpayment.txtamtjim_cp.value = "0.00";
   document.frmpayment.txtamtjim_compound.value = "0.00";
   document.frmpayment.txtamtfomema.value = "0.00";
   document.frmpayment.txtamtins.value = "0.00";
   document.frmpayment.txtamtins_ig.value = "0.00";
   document.frmpayment.txtamtins_fwcs.value = "0.00";
   document.frmpayment.txtamtins_fwhs.value = "0.00";
   document.frmpayment.txtamtagency.value = "0.00";
   document.frmpayment.txtamtothr.value = "0.00";   
   document.frmpayment.txtpaclab.value = "";
   document.frmpayment.txtvisa.value = "0.00"; 
   document.frmpayment.txtfine.value = "0.00"; 
   document.frmpayment.txttranscost.value = "0.00"; 
   document.frmpayment.txttc_fees.value = "0.00";
   document.frmpayment.txttc_cost.value = "0.00";
   
  // document.frmpayment.txtpaclab.value = "";
   //document.frmpayment.txtpajim.value = "";
   //document.frmpayment.txtpafomema.value = "";
   //document.frmpayment.txtpains.value = "";
   //document.frmpayment.txtpaagency.value = "";
   //document.frmpayment.txtpaothr.value = "";   
   document.frmpayment.selamt.value = "0";
   document.frmpayment.txtchqclab.value = "";
   document.frmpayment.txtchqjim.value = "";
   document.frmpayment.txtchqfomema.value = "";
   document.frmpayment.txtchqins.value = "";
   document.frmpayment.txtchqagency.value = "";
   document.frmpayment.txtchqothr.value = "";
   document.frmpayment.txtfcl.value = "0";
   document.frmpayment.txtcountry.value = "";  
   document.frmpayment.txtadmfees.checked = false;
   document.frmpayment.txtadmin.checked = false;
   document.frmpayment.txtjimplks.checked = false;
   document.frmpayment.txtjimfees.checked = false;
   document.frmpayment.txtjimvisa.checked = false;
   document.frmpayment.txtjimlevi.checked = false;
   document.frmpayment.txtmale.checked = false;
   document.frmpayment.txtfemale.checked = false;
   document.frmpayment.txtig.checked = false;
   document.frmpayment.txtFWCS.checked = false;
   document.frmpayment.txtFWHS.checked = false;
   document.frmpayment.txtagencyfees.checked = false;
   document.frmpayment.txttcost.checked = false;
   document.frmpayment.txtadmfeesext.checked = false;
   document.frmpayment.txtothersfees.checked = false;
   document.frmpayment.txtothersfees2.checked = false;
   document.frmpayment.txtjimsp.checked = false;
   document.frmpayment.txtjimcp.checked = false;
   document.frmpayment.txtjimcompund.checked = false;
   document.frmpayment.selamt.checked = false;  

}

function valid(tp){
 
 var answer = confirm("Are you sure want to change this payment type? It will totally changes your receipt value.")
if(answer){
 
 if(tp == 'V'){
   
   clearfield();     
   document.frmpayment.txtadmfees.disabled = false;
   document.frmpayment.txtadmin.disabled = false;
   document.frmpayment.txtjimplks.disabled = false;
   document.frmpayment.txtjimfees.disabled = false;
   document.frmpayment.txtjimvisa.disabled = false;
   document.frmpayment.txtjimlevi.disabled = false;
   document.frmpayment.txtmale.disabled = false;
   document.frmpayment.txtfemale.disabled = false;
   document.frmpayment.txtig.disabled = false;
   document.frmpayment.txtFWCS.disabled = false;
   document.frmpayment.txtFWHS.disabled = false;
   document.frmpayment.txtfcl.disabled = false;
   document.frmpayment.txtbtncountry.disabled = false; 
   document.frmpayment.txtbtnpano.disabled = false;   
   document.frmpayment.txtagencyfees.disabled = false;
   document.frmpayment.txttcost.disabled = false;
   
   document.frmpayment.txtadmfeesext.disabled = true;
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.selamt.disabled = true;
   
   
  
  }else if(tp == 'R') {
    
	clearfield(); 
	
	document.frmpayment.txtadmfeesext.disabled = false;
	document.frmpayment.txtjimplks.disabled = false;
    document.frmpayment.txtjimfees.disabled = false;
    document.frmpayment.txtjimvisa.disabled = false;
    document.frmpayment.txtjimlevi.disabled = false;
	document.frmpayment.txtmale.disabled = false;
    document.frmpayment.txtfemale.disabled = false;
	document.frmpayment.txtig.disabled = false;
    document.frmpayment.txtFWCS.disabled = false;
    document.frmpayment.txtFWHS.disabled = false;
	document.frmpayment.txtfcl.disabled = false; 
	document.frmpayment.txtbtncountry.disabled = false;
	document.frmpayment.txtbtnpano.disabled = false;
	document.frmpayment.txtjimsp.disabled = false;
	document.frmpayment.txtjimcompund.disabled = false;
	
	document.frmpayment.txtadmin.disabled = true;
	document.frmpayment.txtadmfees.disabled = true;
	document.frmpayment.txtagencyfees.disabled = true;
	document.frmpayment.txttcost.disabled = true;	
	document.frmpayment.txtothersfees.disabled = true;
	document.frmpayment.txtothersfees2.disabled = true;
    document.frmpayment.txtjimcp.disabled = true;    
	document.frmpayment.selamt.disabled = true;
   
	}else if(tp == 'CP') {
	
   clearfield(); 	
   document.frmpayment.txtjimcp.disabled = false;	
   document.frmpayment.txtfcl.disabled = false;
   document.frmpayment.txtbtncountry.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true; 
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true;
   document.frmpayment.txttcost.disabled = true;	   
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.selamt.disabled = true;
  
   }else if(tp == 'CR') {
   
   clearfield(); 
   document.frmpayment.selamt.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true;
   document.frmpayment.txtbtncountry.disabled = true;
   document.frmpayment.txtfcl.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true;
   document.frmpayment.txttcost.disabled = true;	   
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
   
   }else if(tp == 'CRN') {
   
   clearfield(); 
   document.frmpayment.selamt.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true;
   document.frmpayment.txtbtncountry.disabled = true;
   document.frmpayment.txtfcl.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true;
   document.frmpayment.txttcost.disabled = true;	   
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
  
    }else if(tp == 'SP') {
   
   clearfield(); 	
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtfcl.disabled = false;
   document.frmpayment.txtjimsp.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true;
   document.frmpayment.selamt.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true; 
   document.frmpayment.txttcost.disabled = true;	  
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
   
   }else if(tp == 'COM') {
   
   clearfield(); 
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtfcl.disabled = false;
   document.frmpayment.txtjimcompund.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.selamt.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true;  
   document.frmpayment.txttcost.disabled = true;	 
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
   
   }else if(tp == 'T') {
   
   clearfield(); 
   document.frmpayment.txtagencyfees.disabled = false; 
   document.frmpayment.txttcost.disabled = false;	
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtfcl.disabled = false;
   
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.txtadmin.disabled = true;
   document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.selamt.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtjimcompund.disabled = true;
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
   
    }else if(tp == 'O') {
	
	clearfield();
	document.frmpayment.txtbtncountry.disabled = false;
	document.frmpayment.txtfcl.disabled = false; 
	document.frmpayment.txtothersfees.disabled = false;
	document.frmpayment.txtothersfees2.disabled = false;
	document.frmpayment.txtbtnpano.disabled = true;
	document.frmpayment.txtadmin.disabled = true;
	document.frmpayment.txtjimcompund.disabled = true;
    document.frmpayment.txtjimsp.disabled = true;
   document.frmpayment.selamt.disabled = true;
   document.frmpayment.txtadmfees.disabled = true;
   document.frmpayment.txtjimplks.disabled = true;
   document.frmpayment.txtjimfees.disabled = true;
   document.frmpayment.txtjimvisa.disabled = true;
   document.frmpayment.txtjimlevi.disabled = true;
   document.frmpayment.txtmale.disabled = true;
   document.frmpayment.txtfemale.disabled = true;
   document.frmpayment.txtig.disabled = true;
   document.frmpayment.txtFWCS.disabled = true;
   document.frmpayment.txtFWHS.disabled = true;
   document.frmpayment.txtagencyfees.disabled = true; 
   document.frmpayment.txttcost.disabled = true;	  
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtjimcp.disabled = true;	

  
 }
 
}else{
  return false;
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

function printForm(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printreceipt');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function printForm1(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printreceipt2');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}
function printForm2(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printinvoice');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function printForm3(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printinvoiceOD');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function getclabval_adminfees(){
   var pmttype = document.frmpayment.optpmttype.value;
   var fcl = document.frmpayment.txtfcl.value;
   
   if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtadmfees.checked = false; return false;}
  
   if(pmttype == 'V'){
      amt = 300 * fcl + (300 * fcl) * 0.06; 
	  amtonly = 300 * fcl;
	  amttax = (300 * fcl) * 0.06;
   }else if(pmttype == 'R'){
      amt = 300 * fcl + (300 * fcl) * 0.06; 
	  amtonly = 300 * fcl;
	  amttax = (300 * fcl) * 0.06;
   } 

   if(document.frmpayment.txtadmfees.checked == true){
      document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax) 
      document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly) 
      document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
   }else{
      document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax) 
      document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly)
      document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
   }	  
	  
}



function getclabval_adminfeesrenewal(){
   var pmttype = document.frmpayment.optpmttype.value;
   var fcl = document.frmpayment.txtfcl.value;
   
   if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtadmfees.checked = false; return false;}
   
    amt = 300 * fcl + (300 * fcl) * 0.06; 
	amtonly = 300 * fcl;
	amttax = (300 * fcl) * 0.06;
 

   if(document.frmpayment.txtadmfeesext.checked == true){
      document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax) 
      document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly) 
	  document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
   }else{
      document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax) 
      document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly)
      document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
   }	  
	  
}

function getjimval_plks(){ 
   var pmttype = document.frmpayment.optpmttype.value;  
   var fcl = document.frmpayment.txtfcl.value;  
   amt = 60 * fcl; 
   
    if(document.frmpayment.txtjimplks.checked == true){
	   document.frmpayment.txtamtjim_plks.value = eval(document.frmpayment.txtamtjim_plks.value) + eval(amt);
       document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
   }else{
       document.frmpayment.txtamtjim_plks.value = eval(document.frmpayment.txtamtjim_plks.value) - eval(amt);
       document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
   }	
}

function getjimval_fees(){   
   fcl = document.frmpayment.txtfcl.value;  
   amt = 50 * fcl; 
   
    if(document.frmpayment.txtjimfees.checked == true){
	    document.frmpayment.txtamtjim_fees.value = eval(document.frmpayment.txtamtjim_fees.value) + eval(amt);
       document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
   }else{
       document.frmpayment.txtamtjim_fees.value = eval(document.frmpayment.txtamtjim_fees.value) - eval(amt);
      document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
   }	
}

function getjimval_levi(){   
   fcl = document.frmpayment.txtfcl.value;  
   amt = 1250 * fcl; 
   
    if(document.frmpayment.txtjimlevi.checked == true){
	    document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) + eval(amt);
       document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
   }else{
       document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) - eval(amt);
      document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
   }	
}

function getjimval_visa(){  
  
   visa = document.frmpayment.txtvisa.value;   
   fcl = document.frmpayment.txtfcl.value;
   amt = visa * fcl; 
   if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimvisa.checked = false; return false;}
   if(visa == ""){ alert('Please Select Country'); document.frmpayment.txtjimvisa.checked = false; return false; }
    if(document.frmpayment.txtjimvisa.checked == true){
	   document.frmpayment.txtamtjim_visa.value = eval(document.frmpayment.txtamtjim_visa.value) + eval(amt);
       document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
   }else{
       document.frmpayment.txtamtjim_visa.value = eval(document.frmpayment.txtamtjim_visa.value) - eval(amt);
	  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
   }	
}

function getfomema_male(){
   fcl = document.frmpayment.txtfcl.value;  
   
   amt1 = 180 * 0.06;
   amt2 = amt1 + 180;
   amt = fcl * amt2;
   
    if(document.frmpayment.txtmale.checked == true){
       document.frmpayment.txtfemale.checked = false;
	   document.frmpayment.txtamtfomema.value = 0;
	   document.frmpayment.txtamtfomema.value = eval(amt);
   }else{
       document.frmpayment.txtamtfomema.value = 0;
   }	
}

function getfomema_female(){
   fcl = document.frmpayment.txtfcl.value;  
   
   amt1 = 180 * 0.06;
   amt2 = amt1 + 180;
   amt = fcl * amt2;
   
    if(document.frmpayment.txtfemale.checked == true){
       document.frmpayment.txtmale.checked = false;
	   document.frmpayment.txtamtfomema.value = 0;
	   document.frmpayment.txtamtfomema.value = eval(amt);
   }else{
       document.frmpayment.txtamtfomema.value = 0;
   }	
}

function getins_ig(){
    fcl = document.frmpayment.txtfcl.value; 
	fine = document.frmpayment.txtfine.value;   
	amt = fcl * fine * 18 / 12 * 0.01 + 10;
	if(amt <= 50){
	  amt = 50+(50 * 0.06 + 10);
	}else{
	  amt = amt + (amt * 0.06 +10);
	}
	if(document.frmpayment.txtig.checked == true){
	   document.frmpayment.txtamtins_ig.value = eval(document.frmpayment.txtamtins_ig.value) + eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtins_ig.value = eval(document.frmpayment.txtamtins_ig.value) - eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	}
}

function getins_fwcs(){
    fcl = document.frmpayment.txtfcl.value; 
	
	amt1 = 72.00 * fcl;
	amt2 = amt1 * 0.06;
	amt = amt2 + amt1 + 10.00;
	
	amt_ins_fwcs = document.frmpayment.txtamtins_fwcs.value;
	amt_ins = document.frmpayment.txtamtins.value;
	
	
	if(document.frmpayment.txtFWCS.checked == true){
	   document.frmpayment.txtamtins_fwcs.value = eval(document.frmpayment.txtamtins_fwcs.value) + eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtins_fwcs.value = eval(document.frmpayment.txtamtins_fwcs.value) - eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	}
}

function getins_fwhs(){
    fcl = document.frmpayment.txtfcl.value; 
	amt1 = 120.00 * fcl;
	amt2 = amt1 * 0.06;
	amt = amt1 + amt2 + 10.00;
	
	if(document.frmpayment.txtFWHS.checked == true){
	   document.frmpayment.txtamtins_fwhs.value = eval(document.frmpayment.txtamtins_fwhs.value) + eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtins_fwhs.value = eval(document.frmpayment.txtamtins_fwhs.value) - eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	}
}

function getagency(){
  fcl = document.frmpayment.txtfcl.value; 
   amt = 50 * fcl + (50 * fcl) * 0.06;
   amtonly = 50 * fcl;
   amttax = (50 * fcl) * 0.06;
   if(document.frmpayment.txtadmin.checked == true){
	   document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
	   document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly);
	   document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax);
	}else{
	   document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
	   document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly);
	   document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax);
	}
}

function getcancelpermit(){
   fcl = document.frmpayment.txtfcl.value; 
   fine = document.frmpayment.txtfine.value;
   amt = fine * fcl;
   
   if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimcp.checked = false; return false;}
   if(fine == ""){ alert('Please Select Country'); document.frmpayment.txtjimcp.checked = false; return false; }
   
   
   if(document.frmpayment.txtjimcp.checked == true){
	   document.frmpayment.txtamtjim.value = eval(amt);
	}else{
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
   
}

function getctrrenewal(val){

    document.frmpayment.txtamtclab.value = "";
	document.frmpayment.txtamtclab.value = val;
    
}

function getcompound(){
    fcl = document.frmpayment.txtfcl.value; 
	amt = 1000 * fcl;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimcompund.checked = false; return false;}
	
	 if(document.frmpayment.txtjimcompund.checked == true){
	   document.frmpayment.txtamtjim_compound.value = eval(document.frmpayment.txtamtjim_compound.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtjim_compound.value = eval(document.frmpayment.txtamtjim_compound.value) - eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	
}

function getsp(){
    fcl = document.frmpayment.txtfcl.value; 
	amt = 100 * fcl;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimsp.checked = false; return false;}
	
	 if(document.frmpayment.txtjimsp.checked == true){
	   document.frmpayment.txtamtjim_sp.value = eval(document.frmpayment.txtamtjim_sp.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtjim_sp.value = eval(document.frmpayment.txtamtjim_sp.value) - eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	
}

function gettransit(){
  fcl = document.frmpayment.txtfcl.value; 
	fees = document.frmpayment.txttransfees.value;
	amt = fees * fcl;

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtagencyfees.checked = false; return false;}
	
	 if(document.frmpayment.txtagencyfees.checked == true){
	   document.frmpayment.txttc_fees.value = eval(document.frmpayment.txttc_fees.value) + eval(amt);
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) + eval(amt);
	}else{
	   document.frmpayment.txttc_fees.value = eval(document.frmpayment.txttc_fees.value) - eval(amt);
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) - eval(amt);
	}
	
}


function gettransitcost(){
    
	fcl = document.frmpayment.txtfcl.value; 
	cost = document.frmpayment.txttranscost.value;
	amt = cost * fcl;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtagencyfees.checked = false; return false;}
	
	 if(document.frmpayment.txttcost.checked == true){
	   document.frmpayment.txttc_cost.value = eval(document.frmpayment.txttc_cost.value) + eval(amt);
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) + eval(amt);
	}else{
	   document.frmpayment.txttc_cost.value = eval(document.frmpayment.txttc_cost.value) - eval(amt);
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) - eval(amt);
	}
	
	
}

/*function getagency(){
   fcl = document.frmpayment.txtfcl.value; 
   amt = 50 + (50 * 0.06) * fcl;
   if(document.frmpayment.txtadmin.checked == true){
	   document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
	}
}*/

function palist(){
var pmttype = document.frmpayment.optpmttype.value;
var url = "<?php echo site_url('contPayment/openpalist');?>/" + pmttype
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
</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body>
<?php 


    if($invoice->payment_type == 'V'){
	
	$strclabfeevdr = "";
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strfomemaM = "";
	$strfomemaF = "";
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	$strfcl = "";
	$strcountry = "";
	$strclabagencyfee = "";
	$strpa = "";
	$stragfees = "";
	$strtranscost = "";
	
	$strjimcp = "disabled";  
	$strclabfeeext = "disabled";
	$strclabregamt = "disabled";	
	$strjimsp = "disabled";
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	
    }elseif($invoice->payment_type == 'R'){
	
	$strclabfeeext = "";
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strfomemaM = "";
	$strfomemaF = "";
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	$strfcl = "";	
	$strcountry = "";
	$strpa = "";
	$strjimsp = "";
	$strjimcompound = "";	
	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";
	$strclabregamt = "disabled";	
			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
    }elseif($invoice->payment_type == 'F'){
	
	$strjimcompound = "";	
	$strfcl = "";	
	$strcountry = "";
	
	$strpa = "disabled";
	$strjimsp = "disabled";
    $strclabregamt = "disabled";    
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
    }elseif($invoice->payment_type == 'CP'){
   
    $strjimcp = "";  
	$strfcl = "";
	$strcountry = "";
	
	$strpa = "disabled";
	$strclabfeevdr = "disabled";
	$strclabfeeext = "disabled";
	$strclabagencyfee = "disabled";
	$strclabregamt = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimsp = "disabled";
	$strjimcompound = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";
	$strothfees = "disabled";	
	$strothfees2 = "disabled";
  
}elseif($invoice->payment_type == 'CR'){
    
	$strclabregamt = "";
    
	$strpa = "disabled";
	$strcountry = "disabled";
	$strfcl = "disabled";
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimsp = "disabled";
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";

}elseif($invoice->payment_type == 'CRN'){
    
	$strclabregamt = "";
    
	$strpa = "disabled";
	$strcountry = "disabled";
	$strfcl = "disabled";
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimsp = "disabled";
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
	
}elseif($invoice->payment_type == 'O'){
    
	$strothfees = "";
	$strothfees2 = "";
	$strfcl = "";
	$strcountry = "";
    
	$strpa = "disabled";
    $strclabregamt = "disabled";
    $strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimsp = "disabled";
	$strjimcompound = "disabled";		
	
	$stragfees = "disabled";
	$strtranscost = "disabled";

}elseif($invoice->payment_type == 'T'){

    $stragfees = "";
    $strfcl = "";
	$strcountry = "";
	$strtranscost = "";
    
	$strpa = "disabled";
    $strclabregamt = "disabled";    
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$strjimsp = "disabled";

}elseif($invoice->payment_type == 'SP'){

    $strjimsp = "";
	$strfcl = "";
	$strcountry = "";
    
	$strpa = "disabled";
    $strclabregamt = "disabled";    
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";


}elseif($invoice->payment_type == 'SP'){

    $strjimsp = "";
	$strfcl = "";
	$strcountry = "";
    
	$strpa = "disabled";
    $strclabregamt = "disabled";    
	$strclabfeeext = "disabled";
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";	
	$strjimcp = "disabled";  
	$strclabfeevdr = "disabled";
	$strclabagencyfee = "disabled";		
	$strjimcompound = "disabled";			
	$strothfees = "disabled";
	$strothfees2 = "disabled";
	$stragfees = "disabled";
	$strtranscost = "disabled";	
	
	
} ?>


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
<table  width="100%">
<tr>
    <td width="20%">Official Invoice No. :</td>
	<td colspan="2"><input type="text" name="txtpmtno" value="<?php echo $invoice->pmt_taxinv_no?>" readonly/></td>
    <td><span class="style1">
      <input name="chkcancel" type="checkbox" id="chkcancel" onclick="cancelinvoice();" value="1" <?php if($invoice->pmt_withdraw == '1') echo "checked" ;?><?php if(strpos($accessibility, 'a') == false) echo "DISABLED";  ?> />
      Cancel Invoice&nbsp; &nbsp;&nbsp;
      <input name="dtcancel" type="text" id="dtcancel" value="<?php echo $invoice->pmt_wd_date ?>" size="11" readonly/>
      <input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcancel'), this)" />
    </span></td>
    <td><span class="style1">
      <input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" />
      PIC :
        <input name="txtuser" type="text" id="txtuser" value="<?php echo $invoice->pmt_wd_by;?>"  size="10" <?php echo $strfcl ?> readonly/>
    </span></td>
    <td><span class="style1">Reason : 
        <input name="txtcomment" type="text" id="txtcomment" value="<?php echo $invoice->pmt_wd_comment;?>"  size="10" <?php echo $strfcl ?>/>
    </span></td>
</tr>
<tr>
    <td>Payment Type:</td>
	<td colspan="5"><Select name="optpmttype" onchange="valid(this.value)">
	                <option value="0"></option>
					<option value="V" <?php if($invoice->payment_type == 'V') echo "selected"; ?>>VDR</option>
					<option value="R" <?php if($invoice->payment_type == 'R') echo "selected"; ?>>Renewal</option>
					<option value="CR" <?php if($invoice->payment_type == 'CR') echo "selected"; ?>>Contractor Registration</option>
					<option value="CRN" <?php if($invoice->payment_type == 'CRN') echo "selected"; ?>>Contractor Renewal</option>
					<option value="F" <?php if($invoice->payment_type == 'F') echo "selected"; ?>>Fomema</option>					
					<option value="O" <?php if($invoice->payment_type == 'O') echo "selected"; ?>>Others</option>
  				    </Select></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="5"><input type="text" name="txtcreateddate" value="<?php echo date('j M Y',strtotime($invoice->pmt_datecreated))?>" readonly/></td>
</tr>
<tr>
    <td>Received From</td>
	<td colspan="5"><input type="text" name="txtrecfrom" value="<?php echo $invoice->pmt_receive_from?>" size="60" />
	  <input name="button" type="button" onclick="opencontractor()" value="..."/></td>
</tr>
<tr>
    <td>Address:</td>
	<td colspan="5">
	<textarea name="txtaddr1" ssize="60" height="4" style="width: 363px"><?php echo $invoice->pmt_addr?></textarea></td>
</tr>
<tr>
    <td>No Of FCL:</td>
	<td colspan="5"><input type="text" name="txtfcl" value="<?php echo $invoice->no_of_fcl ?>"  size="10" <?php echo $strfcl ?>/></td>
</tr>

<tr><td height="28" colspan="6">&nbsp;</td></tr>
<tr>
	<td colspan="6">
		<!--TABLE  border="0" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="#FFFFFF"-->		</td>
</tr>
<input type="hidden" name="txtvisa" value="<?php echo $invoice->visa_ref ?>" />
<input type="hidden" name="txtfine" value="<?php echo $invoice->fine_ref ?>"/>
<input type="hidden" name="txttransfees" value="<?php echo $invoice->trans_cost_ref ?>"/>
<input type="hidden" name="txttranscost" value="<?php echo $invoice->trans_fees_ref ?>"/>
<input type="hidden" name="id" value="<?php echo $invoice->clab_no ?>"/>

<tr>
   <td colspan="6" align="center"><input type="submit" value="Update" <?php if($invoice->pmt_withdraw == '1') echo "DISABLED";?>/>
     <input type="button" value="Print Invoice A4 " onclick="printForm3()" /></td>
</tr>
</table>
</form>
</body>
</html>