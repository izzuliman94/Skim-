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
   
   document.frmpayment.txtlocaldis.value = "0.00";
   document.frmpayment.txtlocalreim.value = "0.00";
   
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
   document.frmpayment.txttc_fees.value = "0.00";
   document.frmpayment.txttc_cost.value = "0.00";
   
  // document.frmpayment.txtpaclab.value = "";
   //document.frmpayment.txtpajim.value = "";
   //document.frmpayment.txtpafomema.value = "";
   //document.frmpayment.txtpains.value = "";
   //document.frmpayment.txtpaagency.value = "";
   //document.frmpayment.txtpaothr.value = "";   
   document.frmpayment.txtchqclab.value = "";
   document.frmpayment.txtchqjim.value = "";
   document.frmpayment.txtchqfomema.value = "";
   document.frmpayment.txtchqins.value = "";
   document.frmpayment.txtchqagency.value = "";
   document.frmpayment.txtchqothr.value = "";
   document.frmpayment.txtfcl.value = "0";
   document.frmpayment.txtcountry.value = "";  
   
   document.frmpayment.txtlocald.checked = false;
   document.frmpayment.txtlocalr.checked = false;
   
   document.frmpayment.txtadmfees.checked = false;
   document.frmpayment.txtCancel.checked = false;
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
 
 if(tp == 'V'){
   
   clearfield();
   document.frmpayment.txtadmfees.disabled = false;
   document.frmpayment.txtadmfees.disabled = false;
   document.frmpayment.txtCancel.disabled = false;
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
   
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
	document.frmpayment.txtCancel.disabled = false;
	
	document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
	document.frmpayment.txtadmin.disabled = true;
	document.frmpayment.txtadmfees.disabled = true;
	document.frmpayment.txtagencyfees.disabled = true;
	document.frmpayment.txttcost.disabled = true;	
	document.frmpayment.txtothersfees.disabled = true;
	document.frmpayment.txtothersfees2.disabled = true;
    document.frmpayment.txtjimcp.disabled = true;    
	document.frmpayment.selamt.disabled = true;
   
    }else if(tp == 'LW') {
    
	clearfield();
	
	document.frmpayment.txtlocald.disabled = false;
   document.frmpayment.txtlocalr.disabled = false;
	document.frmpayment.txtadmfeesext.disabled = true;
	document.frmpayment.txtjimplks.disabled = true;
    document.frmpayment.txtjimfees.disabled = true;
    document.frmpayment.txtjimvisa.disabled = true;
    document.frmpayment.txtjimlevi.disabled = true;
	document.frmpayment.txtmale.disabled = true;
    document.frmpayment.txtfemale.disabled = true;
	document.frmpayment.txtig.disabled = true;
    document.frmpayment.txtFWCS.disabled = true;
    document.frmpayment.txtFWHS.disabled = true;
	document.frmpayment.txtfcl.disabled = false; 
	document.frmpayment.txtbtncountry.disabled = false;
	document.frmpayment.txtbtnpano.disabled = false;
	document.frmpayment.txtjimsp.disabled = true;
	document.frmpayment.txtjimcompund.disabled = true;
	document.frmpayment.txtCancel.disabled = false;
	
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
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   document.frmpayment.txtjimsp.disabled = false;
   document.frmpayment.txtfcl.disabled = false; 
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   document.frmpayment.txtfcl.disabled = false; 
   document.frmpayment.txtjimcompund.disabled = false;
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
   document.frmpayment.txtbtnpano.disabled = true;
   document.frmpayment.selamt.disabled = true;
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
   document.frmpayment.txtadmfeesext.disabled = true; 
   document.frmpayment.txtothersfees.disabled = true;
   document.frmpayment.txtothersfees2.disabled = true;
   document.frmpayment.txtjimcp.disabled = true;	
   
   
    }else if(tp == 'O') {
   
   clearfield();
   document.frmpayment.txtfcl.disabled = false; 	
   document.frmpayment.txtothersfees.disabled = false;
   document.frmpayment.txtothersfees2.disabled = false;
   document.frmpayment.txtbtncountry.disabled = false;
   document.frmpayment.txtCancel.disabled = false;
   
   document.frmpayment.txtlocald.disabled = true;
   document.frmpayment.txtlocalr.disabled = true;
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
   amt = 125 * fcl; 
   
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
   amt = 2500 * fcl; 
   
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

function getlocaldis(){
   fcl = document.frmpayment.txtfcl.value;  
  
   amt1 = 50 * 0.06;
   amt2 = amt1 + 50;
   amt = fcl * amt2;
   
    if(document.frmpayment.txtlocald.checked == true){
       document.frmpayment.txtlocalr.checked = false;
	   document.frmpayment.txtamtlocal.value = 0;
	   document.frmpayment.txtamtlocal.value = eval(amt);
   }else{
       document.frmpayment.txtamtlocal.value = 0;
   }	
}

function getlocalreim(){
   fcl = document.frmpayment.txtfcl.value;  
  
   amt1 = 200 * 0.06;
   amt2 = amt1 + 200;
   amt = fcl * amt2;
   
    if(document.frmpayment.txtlocalr.checked == true){
       document.frmpayment.txtlocald.checked = false;
	   document.frmpayment.txtamtlocal.value = 0;
	   document.frmpayment.txtamtlocal.value = eval(amt);
   }else{
       document.frmpayment.txtamtlocal.value = 0;
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
	amt = fcl * fine * 18 / 12 * 0.01 ;
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
	   document.frmpayment.txtamtins_fwhs.value =eval( document.frmpayment.txtamtins_fwhs.value) - eval(amt);
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

function getmship(){

    document.frmpayment.txtamtothr.value = "";
	
	
	 if(document.frmpayment.txtothersfees2.checked == true){
		document.frmpayment.txtamtothr.value = "53.00";
	}else{
		document.frmpayment.txtamtothr.value = "0.00";		
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



</script>
</head>
<body>
<?php $accessibility = $this->session->userdata('emp_accessibility'); ?>
<h4><a href="addpayment">Payment Receipt</a> <img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" /> New Payment </h4>
<form name="frmpayment" method="post" action="<?php echo site_url();?>/contPayment/savepaymentrcpt">
<table  width="100%">
<tr>
    <td width="20%">Regional :</td>
	<td colspan="2"><select name="selregion">
	<option value=""></option>
    <?php foreach($allRegion->result() as $region){ ?>
    <option value="<?php echo $region->regional_id;?>"><?php echo $region->regional_desc;?></option>
    <?php } ?>
	</select></td>
    <td>Cancel Receipt 
      <input type="checkbox" name="txtCancel" value="1" onclick="" disabled="disabled"/></td>
</tr>
<tr>
    <td width="20%">Official Receipt No. :</td>
	<td colspan="3"><input type="text" value="<auto generate>" readonly/></td>
</tr>
<tr>
    <td>Payment Type:</td>
	<td colspan="3"><Select name="optpmttype" onchange="valid(this.value)">
	                <option value="0"></option>
					<option value="V">VDR</option>
					<option value="R">Renewal</option>
					<option value="CP">Cancel Permit</option>
					<option value="CR">Contractor Registration</option>
					<option value="CRN">Contractor Renewal</option>
					<option value="COM">Compound</option>					
					<option value="T">Transit Center</option>
					<option value="SP">SP</option>
                    <option value="LW">Local Worker</option>
					<option value="O">Others</option>
					</Select></td>
</tr>
<!--tr>
    <td width="20%">Workorder No. :</td>
	<td colspan="3"><input type="text" name="txtwono" value="" readonly/><input type="hidden" name="txtwoid" value="" readonly/>&nbsp;<input type="button" value="..." onclick="getwono()"/></td>
</tr-->
<tr>
    <td>Date Created</td>
	<td colspan="3"><input type="text" name="txtcreateddate" value="<?php echo date("d-M-Y") ?>" readonly/></td>
</tr>

<tr>
    <td>Received From</td>
	<td colspan="3"><input type="text" name="txtrecfrom" value="" size="60" />
	<input type="button" value="..." onclick="opencontractor()"/></td>
</tr>
<tr>
    <td>Address:</td>
	<td colspan="3">
	<textarea name="txtaddr1" ssize="60" height="4" style="width: 363px"></textarea></td>
</tr>
<tr>
    <td>No Of (FCL/Posting/LW )</td>
	<td colspan="3"><input type="text" name="txtfcl" value="0"  size="10" /></td>
</tr>
<tr>
    <td>Country:</td>
	<td colspan="3"><input type="text" name="txtcountry" value=""  size="20" />
	<input type="button" name="txtbtncountry" value="..." onclick="countrylist()" disabled/></td>
</tr>
<tr>
    <td>P.A No</td>
	<td><input type="text" name="txtpaclab" value="" size="20" readonly/>
	<input type="button" name="txtbtnpano" value="..." onclick="palist()" disabled/>	</td>
</tr>
<tr><td colspan="4">&nbsp;</td></tr>

<tr>
	<td colspan="4">
		<!--TABLE  border="0" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="#FFFFFF"-->
		<table width="100%" border="1" style="border-collapse: collapse;" bordercolor="#FFFFFF">
			<tr>
				<td width="15%" align="center" height="35">&nbsp;CHEQUE NO./<br /> BANK DRAFT </td>
				<td width="15%" align="center">PAYMENT TO</td>
				<td width="36%" >DESCRIPTION OF PAYMENT</td>
				<td width="19%" align="center">AMOUNT (RM)</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqclab" value="" size="20" /></td>
				<td align="center">CLAB</td>
				<td>
				
					  <input type="checkbox" name="txtadmfees" value="1" onclick="getclabval_adminfees()" disabled/>
					  &nbsp;ADMIN FEE VDR
					   <input type="checkbox" name="txtadmfeesext" value="1" onclick="getclabval_adminfeesrenewal()" disabled/>
					  &nbsp;ADMIN FEE EXT<br />					  
					  <input type="checkbox" name="txtadmin" value="1" onclick="getagency()" disabled/>
					  &nbsp;AGENCY FEE<br />
					  Registration Amount
					   <select name="selamt" onchange="getctrrenewal(this.value)" disabled>
					   <option value="0"></option>
					   <option value="21.2">1 Year</option>
					   <option value="42.4">2 Year</option>
					   <option value="53">3 Year</option>
					   </select>			
					  <!--input type="checkbox" name="txtrefund" value="1" />
                       &nbsp;REFUND LEVY --></td>
				<td align="center"><input type="text" name="txtamtclab" value="0" size="20" />
				                   <input type="hidden" name="txtamtclab_only" value="0" size="20" />
								   <input type="hidden" name="txtamtclab_tax" value="0" size="20" /></td>
			</tr>
			<tr>
			  <td height="30" align="center"><input type="text" name="txtchqclabloc" value="" size="20" /></td>
			  <td align="center">CLAB ( Local Worker )</td>
			  <td><input type="checkbox" name="txtlocald" value="1" onclick="getlocaldis()" disabled="disabled"/>			    &nbsp; DISBURSEMENT 
			    <input type="checkbox" name="txtlocalr" value="1" onclick="getlocalreim()" disabled="disabled"/>&nbsp; REIMBURSEMENT</td>
			  <td align="center"><input type="text" name="txtamtlocal" value="0" size="20" />
			    <input type="hidden" name="txtlocaldis" value="0" size="20" />
                <input type="hidden" name="txtlocalreim" value="0" size="20" /></td>
		  </tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqjim" value="" size="20" /></td>
				<td align="center">JIM</td>
				<td>
					<input type="checkbox" name="txtjimplks" value="1" onclick="getjimval_plks()" disabled/>&nbsp;PLKS
					<input type="checkbox" name="txtjimfees" value="1" onclick="getjimval_fees()" disabled/>&nbsp;FEES
					<input type="checkbox" name="txtjimvisa" value="1" onchange="getjimval_visa()" disabled/>&nbsp;VISA
					<input name="txtjimlevi" type="checkbox" id="txtjimlevi" value="1" onclick="getjimval_levi()" disabled/>
					&nbsp;LEVY<br />
					<input type="checkbox" name="txtjimsp" value="1" onclick="getsp()" disabled/>&nbsp;SP
					<input type="checkbox" name="txtjimcp" value="1"  onclick="getcancelpermit()" disabled/>&nbsp;CP
					<input type="checkbox" name="txtjimcompund" value="1" onclick="getcompound()" disabled/>&nbsp;COMPOUND				</td>
				<td align="center"><input type="text" name="txtamtjim" value="0" size="20" />
				                   <input type="hidden" name="txtamtjim_plks" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_fees" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_visa" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_levi" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_sp" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_cp" value="0" size="20" />
								   <input type="hidden" name="txtamtjim_compound" value="0" size="20" />				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqfomema" value="" size="20" /></td>
				<td align="center">FOMEMA</td>
				<td>
					<input type="checkbox" name="txtmale" value="1" onclick="getfomema_male()" disabled/>&nbsp;MALE
					<input type="checkbox" name="txtfemale" value="1" onclick="getfomema_female()" disabled/>&nbsp;FEMALE				</td>
				<td align="center"><input type="text" name="txtamtfomema" value="0" size="20" /></td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqins" value="" size="20" /></td>
				<td align="center">INSURANCE</td>
				<td>
					<input type="checkbox" name="txtig" value="1" onclick="getins_ig()" disabled/>&nbsp;IG
					<input type="checkbox" name="txtFWCS" value="1" onclick="getins_fwcs()" disabled/>&nbsp;FWCS
					<input type="checkbox" name="txtFWHS" value="1" onclick="getins_fwhs()" disabled/>&nbsp;FWHS				</td>
				<td align="center"><input type="text" name="txtamtins" value="0" size="20" />
				                   <input type="hidden" name="txtamtins_ig" value="0" size="20" />
								   <input type="hidden" name="txtamtins_fwcs" value="0" size="20" />
								   <input type="hidden" name="txtamtins_fwhs" value="0" size="20" />				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqagency" value="" size="20" /></td>
				<td align="center">TRANSIT CENTER</td>
				<td>
					<input type="checkbox" name="txtagencyfees" onclick="gettransit()" value="1" disabled/>&nbsp;FEES	
					<input type="checkbox" name="txttcost" onclick="gettransitcost()" value="1" disabled/>&nbsp;COST					</td>
				<td align="center"><input type="text" name="txtamtagency" value="0" size="20" />
				                   <input type="hidden" name="txttc_fees" value="0" size="20" />
					               <input type="hidden" name="txttc_cost" value="0" size="20" />				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqothr" value="" size="20" /></td>
				<td align="center">OTHERS</td>
				<td>
					<input type="checkbox" name="txtothersfees" value="1" disabled/>
					&nbsp;FEES 
					<input type="checkbox" name="txtothersfees2" onclick="getmship()" value="1" disabled/>
&nbsp;MEMBERSHIP FEES <br />
					Remarks&nbsp;<br /><textarea cols="30" rows="5" name="txtothremarks"></textarea>					</td>
				<td align="center"><input type="text" name="txtamtothr" value="0" size="20" />
			    <input type="hidden" name="txtothfees" value="0" size="20" />
			    <input type="hidden" name="txtmshipfees" value="0" size="20" /></td>
			</tr>
	  </table>	</td>
</tr>
<tr><td colspan="4">
<input type="hidden" name="txtvisa" value="0" />
<input type="text" name="txtfine" value="0"/>
<input type="hidden" name="txttransfees" value="0"/>
<input type="hidden" name="txttranscost" value="0"/>
<input type="hidden" name="id" value=""/></td>
</tr>
<tr>
   <td colspan="4" align="center"><input type="submit" value="Save" />&nbsp;<input type="button" onclick="clearfield()" value="Reset" /></td>
</tr>
</table>
</form>
</body>
</html>
