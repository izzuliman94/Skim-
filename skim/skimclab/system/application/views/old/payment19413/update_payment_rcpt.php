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
   document.frmpayment.txtjimcp.disabled = true;	
   
    }else if(tp == 'O') {
	
	clearfield();
	document.frmpayment.txtbtncountry.disabled = false;
	document.frmpayment.txtfcl.disabled = false; 
	document.frmpayment.txtothersfees.disabled = false;
	
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

function getclabval_adminfees(){
   var pmttype = document.frmpayment.optpmttype.value;
   var fcl = document.frmpayment.txtfcl.value;
   
   if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtadmfees.checked = false; return false;}
  
   if(pmttype == 'V'){
      amt = 300 * fcl + (300 * fcl) * 0.06; 
	  amtonly = 300 * fcl;
	  amttax = (300 * fcl) * 0.06;
   }else if(pmttype == 'R'){
      amt = 270 * fcl + (270 * fcl) * 0.06; 
	  amtonly = 270 * fcl;
	  amttax = (270 * fcl) * 0.06;
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
   
    amt = 270 * fcl + (270 * fcl) * 0.06; 
	amtonly = 270 * fcl;
	amttax = (270 * fcl) * 0.06;
 

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
   amt = 180 * fcl;
   
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
   amt = 180 * fcl;
   
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
	amt = 76.2 + 10;
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
	amt = 120 + 10;
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


</script>
</head>
<body>
<?php 
    if($payment->payment_type == 'V'){
	
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
	
    }elseif($payment->payment_type == 'R'){
	
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
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
    }elseif($payment->payment_type == 'COM'){
	
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
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
    }elseif($payment->payment_type == 'CP'){
   
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
  
}elseif($payment->payment_type == 'CR'){
    
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
	$stragfees = "disabled";
	$strtranscost = "disabled";

}elseif($payment->payment_type == 'CRN'){
    
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
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
	
}elseif($payment->payment_type == 'O'){
    
	$strothfees = "";
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

}elseif($payment->payment_type == 'T'){

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
	$strjimsp = "disabled";

}elseif($payment->payment_type == 'SP'){

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
	$stragfees = "disabled";
	$strtranscost = "disabled";
	
} ?>


<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Payment Receipt</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> Update Payment </h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/updatepaymentrcpt">
<?php if(isset($successMsg)){
	if($successMsg == "add") echo "<strong><font color=\"red\">New Payment has been added successfully.</font></strong>";
	else if($successMsg == "update") echo "<strong><font color=\"red\">Payment Receipt has been updated!</font></strong>";
	else { //dummy else
	};
}
?>
<table  width="100%">
<tr>
    <td width="20%">Official Receipt No. :</td>
	<td colspan="3"><input type="text" name="txtpmtno" value="<?php echo $payment->pmt_receipt_no?>" readonly/></td>
</tr>
<tr>
    <td>Payment Type:</td>
	<td colspan="3"><Select name="optpmttype" onchange="valid(this.value)">
	                <option value="0"></option>
					<option value="V" <?php if($payment->payment_type == 'V') echo "selected"; ?>>VDR</option>
					<option value="R" <?php if($payment->payment_type == 'R') echo "selected"; ?>>Renewal</option>
					<option value="CP" <?php if($payment->payment_type == 'CP') echo "selected"; ?>>Cancel Permit</option>
					<option value="CR" <?php if($payment->payment_type == 'CR') echo "selected"; ?>>Contractor Registration</option>
					<option value="CRN" <?php if($payment->payment_type == 'CRN') echo "selected"; ?>>Contractor Renewal</option>
					<option value="COM" <?php if($payment->payment_type == 'COM') echo "selected"; ?>>Compound</option>					
					<option value="T" <?php if($payment->payment_type == 'T') echo "selected"; ?>>Transit Center</option>
					<option value="SP" <?php if($payment->payment_type == 'SP') echo "selected"; ?>>SP</option>
					<option value="O" <?php if($payment->payment_type == 'O') echo "selected"; ?>>Others</option>
  				    </Select></td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="3"><input type="text" name="txtcreateddate" value="<?php echo date('j M Y',strtotime($payment->pmt_datecreated))?>" readonly/></td>
</tr>
<tr>
    <td>Received From</td>
	<td colspan="3"><input type="text" name="txtrecfrom" value="<?php echo $payment->pmt_receive_from?>" size="60" />
	  <input name="button" type="button" onclick="opencontractor()" value="..."/></td>
</tr>
<tr>
    <td>Address:</td>
	<td colspan="3">
	<textarea name="txtaddr1" ssize="60" height="4" style="width: 363px"><?php echo $payment->pmt_addr?></textarea></td>
</tr>
<tr>
    <td>No Of FCL:</td>
	<td colspan="3"><input type="text" name="txtfcl" value="<?php echo $payment->no_of_fcl ?>"  size="10" <?php echo $strfcl ?>/></td>
</tr>
<tr>
    <td>Country:</td>
	<td colspan="3"><input type="text" name="txtcountry" value="<?php echo $payment->country ?>"  size="20" />
	<input type="button" value="..." name="txtbtncountry" onclick="countrylist()" <?php echo $strcountry ?>/></td>
</tr>
<tr>
    <td>P.A No:</td>
	<td colspan="3"><input type="text" name="txtpaclab" value="<?php echo $payment->clab_pa_no?>" size="20" />
	<input type="button" name="txtbtnpano" value="..." onclick="palist()" <?php echo $strpa ?>/>
	</td>
</tr>
<tr><td colspan="4">&nbsp;</td></tr>
<tr>
	<td colspan="4">
		<!--TABLE  border="0" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="#FFFFFF"-->
		<table width="100%" border="1" style="border-collapse: collapse;" bordercolor="#FFFFFF">
			<tr>
				<td width="15%" align="center" height="35">&nbsp;CHEQUE NO.</td>
				<td width="15%" align="center">PAYMENT TO</td>
				<td width="30%" >DESCRIPTION OF PAYMENT</td>
				<td width="20%" align="center">AMOUNT (RM)</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqclab" value="<?php echo $payment->pmt_chq_clab?>" size="20" /></td>
				<td align="center">CLAB</td>
				<td>
					<input type="checkbox" name="txtadmfees" value="1" <?php if($payment->chk_clab_fees == '1') echo "Checked"?> onclick="getclabval_adminfees()" <?php echo $strclabfeevdr ?>/>
					&nbsp;ADMIN FEE VDR
					<input type="checkbox" name="txtadmfeesext" value="1"  <?php if($payment->chk_clab_fees_ext == '1') echo "Checked"?> onclick="getclabval_adminfeesrenewal()" <?php echo $strclabfeeext ?>/>
					&nbsp;ADMIN FEE EXT<br />
					<input type="checkbox" name="txtadmin" value="1"  <?php if($payment->chk_clab_adm == '1') echo "Checked"?> <?php echo $strclabagencyfee ?> onclick="getagency()"/>
					&nbsp;AGENCY FEE<br />
					 Registration Amount
					 <select name="selamt" onchange="getctrrenewal(this.value)" <?php echo $strclabregamt ?>>
					 <option value="0"></option>
					 <option value="20" <?php if($payment->clab_reg_amount == '20') echo "selected"?>>1 Year</option>
					 <option value="40" <?php if($payment->clab_reg_amount == '40') echo "selected"?>>2 Year</option>
					 <option value="50" <?php if($payment->clab_reg_amount == '50') echo "selected"?>>3 Year</option>
					 </select>			  </td>
				<td align="center">
				<input type="text" name="txtamtclab" value="<?php echo $payment->clab_amount?>" size="20" />
				<input type="hidden" name="txtamtclab_only" value="<?php echo $payment->clab_amount_only?>" size="20" />
				<input type="hidden" name="txtamtclab_tax" value="<?php echo $payment->clab_amount_tax?>" size="20" />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqjim" value="<?php echo $payment->pmt_chq_jim?>" size="20" /></td>
				<td align="center">JIM</td>
				<td>
				<input type="checkbox" name="txtjimplks" value="1" <?php if($payment->chk_jim_plks == '1') echo "Checked"?> onclick="getjimval_plks()" <?php echo $strjimplks ?>/>&nbsp;PLKS
				<input type="checkbox" name="txtjimfees" value="1" <?php if($payment->chk_jim_fees == '1') echo "Checked"?> onclick="getjimval_fees()" <?php echo $strjimfees ?>/>&nbsp;FEES
				<input type="checkbox" name="txtjimvisa" value="1" <?php if($payment->chk_jim_visa == '1') echo "Checked"?> onchange="getjimval_visa()" <?php echo $strjimvisa ?>/>&nbsp;VISA
				<input type="checkbox" name="txtjimlevi" value="1" <?php if($payment->chk_jim_levi == '1') echo "Checked"?> onclick="getjimval_levi()" <?php echo $strjimlevi ?>/>&nbsp;LEVY<br />
				<input type="checkbox" name="txtjimsp" value="1" <?php if($payment->chk_jim_sp == '1') echo "Checked"?> 
onclick="getsp()" <?php echo $strjimsp ?>/>&nbsp;SP	
				<input type="checkbox" name="txtjimcp" value="1"  <?php if($payment->chk_jim_cp == '1') echo "Checked"?> 
onclick="getcancelpermit()" <?php echo $strjimcp ?>/>&nbsp;CP
				<input type="checkbox" name="txtjimcompund" value="1"  <?php if($payment->chk_jim_compound == '1') echo "Checked"?> onclick="getcompound()" <?php echo $strjimcompound ?>/>&nbsp;COMPOUND				</td>
				<td align="center">
				<input type="text" name="txtamtjim" value="<?php echo $payment->jim_amount?>" size="20" />
				<input type="hidden" name="txtamtjim_plks" value="<?php echo $payment->jim_amount_plks?>" size="20" />
				<input type="hidden" name="txtamtjim_fees" value="<?php echo $payment->jim_amount_fees?>" size="20" />
				<input type="hidden" name="txtamtjim_visa" value="<?php echo $payment->jim_amount_visa?>" size="20" />
				<input type="hidden" name="txtamtjim_levi" value="<?php echo $payment->jim_amount_levi?>" size="20" />
				<input type="hidden" name="txtamtjim_sp" value="<?php echo $payment->jim_amount_sp?>" size="20" />
				<input type="hidden" name="txtamtjim_cp" value="<?php echo $payment->jim_amount_cp?>" size="20" />
				<input type="hidden" name="txtamtjim_compound" value="<?php echo $payment->jim_amount_compound?>" size="20" />
				</td>
			</tr>
			<tr>
				<td height="30" align="center">&nbsp;<input type="text" name="txtchqfomema" value="<?php echo $payment->pmt_chq_fomema ?>" size="20" /></td>
				<td align="center">FOMEMA</td>
				<td>
					<input type="checkbox" name="txtmale" value="1" <?php if($payment->chk_fomema_male == '1') echo "Checked"?> onclick="getfomema_male()" <?php echo $strfomemaM ?>/>&nbsp;MALE
					<input type="checkbox" name="txtfemale" value="1" <?php if($payment->chk_fomema_female == '1') echo "Checked"?> onclick="getfomema_female()" <?php echo $strfomemaF ?>/>&nbsp;FEMALE				</td>
				<td align="center"><input type="text" name="txtamtfomema" value="<?php echo $payment->fomema_amount?>" size="20" /></td>
			</tr>
			<tr>
				<td height="30" align="center">&nbsp;<input type="text" name="txtchqins" value="<?php echo $payment->ins_chq_no?>" size="20" /></td>
				<td align="center">INSURANCE</td>
				<td>
					<input type="checkbox" name="txtig" value="1" <?php if($payment->chk_ins_ig == '1') echo "Checked"?> 
onclick="getins_ig()"<?php echo $strinsig ?>/>&nbsp;IG
					<input type="checkbox" name="txtFWCS" value="1" <?php if($payment->chk_ins_fwcs == '1') echo "Checked"?> onclick="getins_fwcs()" <?php echo $strinsfwcs ?>/>&nbsp;FWCS
					<input type="checkbox" name="txtFWHS" value="1" <?php if($payment->chk_ins_fwhs == '1') echo "Checked"?> onclick="getins_fwhs()" <?php echo $strinsfwhs ?>/>&nbsp;FWHS				</td>
				<td align="center">
				<input type="text" name="txtamtins" value="<?php echo $payment->ins_amount?>" size="20" />
				<input type="hidden" name="txtamtins_ig" value="<?php echo $payment->ins_amount_ig?>" size="20" />
				<input type="hidden" name="txtamtins_fwcs" value="<?php echo $payment->ins_amount_fwcs?>" size="20" />
				<input type="hidden" name="txtamtins_fwhs" value="<?php echo $payment->ins_amount_fwhs?>" size="20" />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqagency" value="<?php echo $payment->agency_chq_no?>" size="20" /></td>
				<td align="center">TRANSIT CENTER </td>
				<td>
					<input type="checkbox" name="txtagencyfees" value="1" <?php if($payment->chk_agency_fees == '1') echo "Checked"?> onclick="gettransit()" <?php echo $stragfees ?>/>&nbsp;FEES
					<input type="checkbox" name="txttcost" onclick="gettransitcost()" value="1" <?php if($payment->chk_transit_cost == '1') echo "Checked"?> <?php echo $strtranscost ?>/>&nbsp;COST				
						
					</td>
				<td align="center"><input type="text" name="txtamtagency" value="<?php echo $payment->agency_amount?>" size="20" />
				<input type="hidden" name="txttc_fees" value="<?php echo $payment->transit_fees?>" size="20" />
					<input type="hidden" name="txttc_cost" value="<?php echo $payment->transit_cost?>" size="20" />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqothr" value="<?php echo $payment->others_chq_no?>" size="20" /></td>
				<td align="center">OTHERS</td>
				<td>
					<input type="checkbox" name="txtothersfees" value="1" <?php if($payment->chk_others_fees == '1') echo "Checked"?> <?php echo $strothfees ?>/>&nbsp;FEES
					<br />
					Remarks&nbsp;<br /><textarea cols="30" rows="5" name="txtothremarks"><?php echo $payment->remarks_others?></textarea>
					</td>
				<td align="center"><input type="text" name="txtamtothr" value="<?php echo $payment->others_amount?>" size="20" /></td>
			</tr>
		</table>	</td>
</tr>
<input type="hidden" name="txtvisa" value="<?php echo $payment->visa_ref ?>" />
<input type="hidden" name="txtfine" value="<?php echo $payment->fine_ref ?>"/>
<input type="hidden" name="txttransfees" value="<?php echo $payment->trans_cost_ref ?>"/>
<input type="hidden" name="txttranscost" value="<?php echo $payment->trans_fees_ref ?>"/>
<input type="hidden" name="id" value="<?php echo $payment->clab_no ?>"/>
</td></tr>
<tr>
   <td colspan="4" align="center"><input type="submit" value="Update" /><input type="button" value="Print" onclick="printForm()" /></td>
</tr>
</table>
</form>
</body>
</html>
