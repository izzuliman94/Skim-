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
	document.frmpayment.txtpaclab.value = "";	
	document.frmpayment.txtamtdisc.value = "0";
	document.frmpayment.txtrmkdisc.value = "";

	document.frmpayment.txtchqclab.value = "";
	document.frmpayment.txtadmfees.checked = false;
	document.frmpayment.txtsitcent.checked = false;
	document.frmpayment.txtgrncad.checked = false;
	document.frmpayment.txtclabadmfee.value = "0";
	document.frmpayment.txtclabgcfee.value = "0";
	document.frmpayment.txtclabtcfee.value = "0";
	document.frmpayment.txtamtclab.value = "0.00";
	document.frmpayment.txtamtclab_only.value = "0.00";
	document.frmpayment.txtamtclab_tax.value = "0.00";
	
	document.frmpayment.txtchqclabren.value = "";
	document.frmpayment.txtadmfeesext1.checked = false;
	document.frmpayment.txtadmfeesext2.checked = false;
	document.frmpayment.txtadmfeesextgc.checked = false;
	document.frmpayment.txtclabrenfee.value = "0";
	document.frmpayment.txtclabrengcfee.value = "0";
	document.frmpayment.txtamtclabren.value = "0.00";
	document.frmpayment.txtamtclabren_t.value = "0.00";
	document.frmpayment.txtamtclabren_o.value = "0.00";
	
	document.frmpayment.txtchqcontreg.value = "";
	document.frmpayment.txtcontreg1.checked = false;
	document.frmpayment.txtcontreg2.checked = false;
	document.frmpayment.txtcontreg3.checked = false;
	document.frmpayment.txtclabregfee.value = "0";
	document.frmpayment.txtamtreg.value = "0.00";
	document.frmpayment.txtamtreg_t.value = "0.00";
	document.frmpayment.txtamtreg_o.value = "0.00";
	
	document.frmpayment.txtchqcontren.value = "";
	document.frmpayment.txtcontren1.checked = false;
	document.frmpayment.txtcontren2.checked = false;
	document.frmpayment.txtcontren3.checked = false;
	document.frmpayment.txtcontrenfee.value = "0";
	document.frmpayment.txtamtcontren.value = "0.00";
	document.frmpayment.txtamtcontren_t.value = "0.00";
	document.frmpayment.txtamtcontren_o.value = "0.00";
	
	document.frmpayment.txtchqrehire.value = "";
	document.frmpayment.txtrehire1.checked = false;
	document.frmpayment.txtrehire2.checked = false;
	document.frmpayment.txtclabrehfee.value = "0";
	document.frmpayment.txtamtrehire.value = "0.00";
	document.frmpayment.txtamtrehire_t.value = "0.00";
	document.frmpayment.txtamtrehire_o.value = "0.00";
	
	document.frmpayment.txtchqclabloc.value = "";
	document.frmpayment.txtlocald.checked = false;
	document.frmpayment.txtlocalr.checked = false;
	document.frmpayment.txtclablwfee.value = "0";
	document.frmpayment.txtamtlocal.value = "0.00";
	document.frmpayment.txtamtlocal_t.value = "0.00";
	document.frmpayment.txtamtlocal_o.value = "0.00";
	
	document.frmpayment.txtchqgreen.value = "";
	document.frmpayment.txtgreenw.checked = false;
	document.frmpayment.txtgreenr.checked = false;
	document.frmpayment.txtclabgreenfee.value = "0";
	document.frmpayment.txtamtgreen.value = "0.00";
	document.frmpayment.txtamtgreen_t.value = "0.00";
	document.frmpayment.txtamtgreen_o.value = "0.00";
	
	document.frmpayment.txtchqclabfee.value = "";
	document.frmpayment.txtmember.checked = false;
	document.frmpayment.txtintro.checked = false;
	document.frmpayment.txtclabfee.value = "0";
	document.frmpayment.txtamtclabfee.value = "0.00";
	document.frmpayment.txtamtclabfee_t.value = "0.00";
	document.frmpayment.txtamtclabfee_o.value = "0.00";
	
	document.frmpayment.txtchqjim.value = "";
	document.frmpayment.txtjimplks.checked = false;
	document.frmpayment.txtjimfees.checked = false;
	document.frmpayment.txtjimvisa.checked = false;
	document.frmpayment.txtjimlevi.checked = false;	
	document.frmpayment.txtjimlevi2.checked = false;
	document.frmpayment.txtjimlevi3.checked = false;
	document.frmpayment.txtjimsp.checked = false;
	document.frmpayment.txtjimcp.checked = false;
	document.frmpayment.txtjimcompund.checked = false;
	document.frmpayment.txtamtjim.value = "0.00";
	document.frmpayment.txtamtjim_plks.value = "0.00";
	document.frmpayment.txtamtjim_fees.value = "0.00";
	document.frmpayment.txtamtjim_visa.value = "0.00";
	document.frmpayment.txtamtjim_levi.value = "0.00";
	document.frmpayment.txtamtjim_sp.value = "0.00";
	document.frmpayment.txtamtjim_cp.value = "0.00";
	document.frmpayment.txtamtjim_compound.value = "0.00";
	
	document.frmpayment.txtchqfomema.value = "";
	document.frmpayment.txtmale.checked = false;
	document.frmpayment.txtfemale.checked = false;
	document.frmpayment.txtamtfomema.value = "0.00";
	document.frmpayment.txtamtfomema_t.value = "0.00";
	document.frmpayment.txtamtfomema_o.value = "0.00";
	
	document.frmpayment.txtchqins.value = "";
	document.frmpayment.txtig.checked = false;
	document.frmpayment.txtFWCS.checked = false;
	document.frmpayment.txtFWHS.checked = false;
	document.frmpayment.txtamtins.value = "0.00";
	document.frmpayment.txtamtins_t.value = "0.00";
	document.frmpayment.txtamtins_o.value = "0.00";
	document.frmpayment.txtamtins_ig.value = "0.00";
	document.frmpayment.txtamtins_fwcs.value = "0.00";
	document.frmpayment.txtamtins_fwhs.value = "0.00";
	
	document.frmpayment.txtchqagency.value = "";
	document.frmpayment.txtagencyfees.checked = false;
	document.frmpayment.txtagencyfeesgc.checked = false;
	document.frmpayment.txtclabtransfee.value = "0";
	document.frmpayment.txtclabtransgcfee.value = "0";
	document.frmpayment.txtamtagency.value = "0.00";
	document.frmpayment.txtamtagency_t.value = "0.00";
	document.frmpayment.txtamtagency_o.value = "0.00";
	document.frmpayment.txttc_fees.value = "0.00";
	document.frmpayment.txttc_cost.value = "0.00";
	
	document.frmpayment.txtchqothro.value = "";
	document.frmpayment.txtchqothr3rd.value = "";
	document.frmpayment.txtothremarks.value = "";
	document.frmpayment.txtothersfees.checked = false;
	document.frmpayment.txtothersfees2.checked = false;	
	document.frmpayment.txtamtothr.value = "0.00"; 
	document.frmpayment.txtamtothr_t.value = "0.00";
	document.frmpayment.txtamtothr_o.value = "0.00";  	
}

function resetfield(){

	//document.frmpayment.txtchqclab.value = "";
	document.frmpayment.txtadmfees.checked = false;
	document.frmpayment.txtsitcent.checked = false;
	document.frmpayment.txtgrncad.checked = false;
	document.frmpayment.txtclabadmfee.value = "0";
	document.frmpayment.txtclabgcfee.value = "0";
	document.frmpayment.txtclabtcfee.value = "0";
	document.frmpayment.txtamtclab.value = "0.00";
	document.frmpayment.txtamtclab_only.value = "0.00";
	document.frmpayment.txtamtclab_tax.value = "0.00";
	
	//document.frmpayment.txtchqclabren.value = "";
	document.frmpayment.txtadmfeesext1.checked = false;
	document.frmpayment.txtadmfeesext2.checked = false;
	document.frmpayment.txtadmfeesextgc.checked = false;
	document.frmpayment.txtclabrenfee.value = "0";
	document.frmpayment.txtclabrengcfee.value = "0";
	document.frmpayment.txtamtclabren.value = "0.00";
	document.frmpayment.txtamtclabren_t.value = "0.00";
	document.frmpayment.txtamtclabren_o.value = "0.00";
	
	//document.frmpayment.txtchqcontreg.value = "";
	document.frmpayment.txtcontreg1.checked = false;
	document.frmpayment.txtcontreg2.checked = false;
	document.frmpayment.txtcontreg3.checked = false;
	document.frmpayment.txtclabregfee.value = "0";
	document.frmpayment.txtamtreg.value = "0.00";
	document.frmpayment.txtamtreg_t.value = "0.00";
	document.frmpayment.txtamtreg_o.value = "0.00";
	
	//document.frmpayment.txtchqcontren.value = "";
	document.frmpayment.txtcontren1.checked = false;
	document.frmpayment.txtcontren2.checked = false;
	document.frmpayment.txtcontren3.checked = false;
	document.frmpayment.txtcontrenfee.value = "0";
	document.frmpayment.txtamtcontren.value = "0.00";
	document.frmpayment.txtamtcontren_t.value = "0.00";
	document.frmpayment.txtamtcontren_o.value = "0.00";
	
	//document.frmpayment.txtchqrehire.value = "";
	document.frmpayment.txtrehire1.checked = false;
	document.frmpayment.txtrehire2.checked = false;	
	document.frmpayment.txtclabrehfee.value = "0";
	document.frmpayment.txtamtrehire.value = "0.00";
	document.frmpayment.txtamtrehire_t.value = "0.00";
	document.frmpayment.txtamtrehire_o.value = "0.00";
	
	//document.frmpayment.txtchqclabloc.value = "";
	document.frmpayment.txtlocald.checked = false;
	document.frmpayment.txtlocalr.checked = false;
	document.frmpayment.txtclablwfee.value = "0";
	document.frmpayment.txtamtlocal.value = "0.00";
	document.frmpayment.txtamtlocal_t.value = "0.00";
	document.frmpayment.txtamtlocal_o.value = "0.00";
	
	//document.frmpayment.txtchqgreen.value = "";
	document.frmpayment.txtgreenw.checked = false;
	document.frmpayment.txtgreenr.checked = false;
	document.frmpayment.txtclabgreenfee.value = "0";
	document.frmpayment.txtamtgreen.value = "0.00";
	document.frmpayment.txtamtgreen_t.value = "0.00";
	document.frmpayment.txtamtgreen_o.value = "0.00";
	
	//document.frmpayment.txtchqclabfee.value = "";
	document.frmpayment.txtmember.checked = false;
	document.frmpayment.txtintro.checked = false;
	document.frmpayment.txtclabfee.value = "0";
	document.frmpayment.txtamtclabfee.value = "0.00";
	document.frmpayment.txtamtclabfee_t.value = "0.00";
	document.frmpayment.txtamtclabfee_o.value = "0.00";
	
	//document.frmpayment.txtchqjim.value = "";
	document.frmpayment.txtjimplks.checked = false;
	document.frmpayment.txtjimfees.checked = false;
	document.frmpayment.txtjimvisa.checked = false;
	ocument.frmpayment.txtjimlevi.checked = false;	
	document.frmpayment.txtjimlevi2.checked = false;
	document.frmpayment.txtjimlevi3.checked = false;
	document.frmpayment.txtjimsp.checked = false;
	document.frmpayment.txtjimcp.checked = false;
	document.frmpayment.txtjimcompund.checked = false;
	document.frmpayment.txtamtjim.value = "0.00";
	document.frmpayment.txtamtjim_plks.value = "0.00";
	document.frmpayment.txtamtjim_fees.value = "0.00";
	document.frmpayment.txtamtjim_visa.value = "0.00";
	document.frmpayment.txtamtjim_levi.value = "0.00";
	document.frmpayment.txtamtjim_sp.value = "0.00";
	document.frmpayment.txtamtjim_cp.value = "0.00";
	document.frmpayment.txtamtjim_compound.value = "0.00";
	
	//document.frmpayment.txtchqfomema.value = "";
	document.frmpayment.txtmale.checked = false;
	document.frmpayment.txtfemale.checked = false;
	document.frmpayment.txtamtfomema.value = "0.00";
	document.frmpayment.txtamtfomema_t.value = "0.00";
	document.frmpayment.txtamtfomema_o.value = "0.00";
	
	//document.frmpayment.txtchqins.value = "";
	document.frmpayment.txtig.checked = false;
	document.frmpayment.txtFWCS.checked = false;
	document.frmpayment.txtFWHS.checked = false;
	document.frmpayment.txtamtins.value = "0.00";
	document.frmpayment.txtamtins_t.value = "0.00";
	document.frmpayment.txtamtins_o.value = "0.00";
	document.frmpayment.txtamtins_ig.value = "0.00";
	document.frmpayment.txtamtins_fwcs.value = "0.00";
	document.frmpayment.txtamtins_fwhs.value = "0.00";
	
	//document.frmpayment.txtchqagency.value = "";
	document.frmpayment.txtagencyfees.checked = false;
	document.frmpayment.txtagencyfeesgc.checked = false;
	document.frmpayment.txtclabtransfee.value = "0";
	document.frmpayment.txtclabtransgcfee.value = "0";
	document.frmpayment.txtamtagency.value = "0.00";
	document.frmpayment.txtamtagency_t.value = "0.00";
	document.frmpayment.txtamtagency_o.value = "0.00";
	document.frmpayment.txttc_fees.value = "0.00";
	document.frmpayment.txttc_cost.value = "0.00";
	
	//document.frmpayment.txtchqothr.value = "";
	document.frmpayment.txtothremarks.value = "";
	document.frmpayment.txtothersfees.checked = false;
	document.frmpayment.txtothersfees2.checked = false;	
	document.frmpayment.txtamtothr.value = "0.00";
	document.frmpayment.txtamtothr_t.value = "0.00";
	document.frmpayment.txtamtothr_o.value = "0.00";
}

function valid(tp){
 
var answer = confirm("Are you sure want to change this payment type? It will totally changes your receipt value.")
if(answer){
	if(tp == 'V'){  
		clearfield();  
		
		document.frmpayment.txtadmfees.disabled = false;
		document.frmpayment.txtsitcent.disabled = false;
		document.frmpayment.txtgrncad.disabled = false;		
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;		
		document.frmpayment.txtjimplks.disabled = false;
		document.frmpayment.txtjimfees.disabled = false;
		document.frmpayment.txtjimvisa.disabled = false;
		document.frmpayment.txtjimlevi.disabled = false;
		document.frmpayment.txtjimlevi2.checked = true;
		document.frmpayment.txtjimlevi3.checked = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;	
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtFWCS.disabled = false;
		document.frmpayment.txtFWHS.disabled = false;		
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = false;
	   
	}else if(tp == 'R') {
		clearfield();
		
		document.frmpayment.txtadmfeesext1.disabled = false;
		document.frmpayment.txtadmfeesext2.disabled = false;
		document.frmpayment.txtadmfeesextgc.disabled = false;	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;		
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = false;
		document.frmpayment.txtjimfees.disabled = false;
		document.frmpayment.txtjimvisa.disabled = false;
		document.frmpayment.txtjimlevi.checked = false;	
		document.frmpayment.txtjimlevi2.checked = true;
		document.frmpayment.txtjimlevi3.checked = true;
		document.frmpayment.txtjimsp.disabled = false;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = false;
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtFWCS.disabled = false;
		document.frmpayment.txtFWHS.disabled = false;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = false;
		
	}else if(tp == 'CR') { //Contractor Registration 
		clearfield();
	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = false;
		document.frmpayment.txtcontreg2.disabled = false;
		document.frmpayment.txtcontreg3.disabled = false;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;	

	}else if(tp == 'CRN') { //Contractor Renewal	   
		clearfield();

		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = false;
		document.frmpayment.txtcontren2.disabled = false;
		document.frmpayment.txtcontren3.disabled = false;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;	
			
	 }else if(tp == 'REH') { //Rehiring	
		clearfield();
	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = false;
		document.frmpayment.txtrehire2.disabled = false;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = false;
		document.frmpayment.txtgreenr.disabled = false;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = false;
		document.frmpayment.txtjimfees.disabled = false;
		document.frmpayment.txtjimvisa.disabled = false;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = false;
		document.frmpayment.txtjimcp.disabled = false;
		document.frmpayment.txtjimcompund.disabled = false;
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtFWCS.disabled = false;
		document.frmpayment.txtFWHS.disabled = false;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = true;
		
	 }else if(tp == 'LT'){ //Local Transfer
		clearfield();  
		
		document.frmpayment.txtadmfees.disabled = false;
		document.frmpayment.txtsitcent.disabled = false;
		document.frmpayment.txtgrncad.disabled = false;		
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;		
		document.frmpayment.txtjimplks.disabled = false;
		document.frmpayment.txtjimfees.disabled = false;
		document.frmpayment.txtjimvisa.disabled = false;
		document.frmpayment.txtjimlevi.disabled = false;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;	
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtFWCS.disabled = false;
		document.frmpayment.txtFWHS.disabled = false;		
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = false;
		 
	}else if(tp == 'G13'){ //G1-G3 Programme
		clearfield();  
		
		document.frmpayment.txtadmfees.disabled = false;
		document.frmpayment.txtsitcent.disabled = false;
		document.frmpayment.txtgrncad.disabled = false;		
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;		
		document.frmpayment.txtjimplks.disabled = false;
		document.frmpayment.txtjimfees.disabled = false;
		document.frmpayment.txtjimvisa.disabled = false;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = false;
		document.frmpayment.txtjimlevi3.disabled = false;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;	
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = false;
		document.frmpayment.txtFWCS.disabled = false;
		document.frmpayment.txtFWHS.disabled = false;		
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = false;
		
	 }else if(tp == 'LW') { //Local Worker		
		clearfield();

		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = false;
		document.frmpayment.txtlocalr.disabled = false;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;

	}else if(tp == 'GRC') { //GREEN CARD	   
		clearfield();

		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = false;
		document.frmpayment.txtgreenr.disabled = false;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = true;	

	}else if(tp == 'FEE') { //CLAB FEE	   
		clearfield();
	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = false;
		document.frmpayment.txtintro.disabled = false;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true;
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;	

	}else if(tp == 'T') { //Transit Center	   
		clearfield();
	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = false;
		document.frmpayment.txtfemale.disabled = false;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = false;
		document.frmpayment.txtagencyfeesgc.disabled = false;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = true;	
		
	}else if(tp == 'CP') { //Cancel Permit   
		clearfield();

		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = false;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = false;	

	}else if(tp == 'COM') { //Compound	   
		clearfield();

		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = false;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;	

	}else if(tp == 'SP') { //Special Pass
	   
		clearfield();	
	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = false;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = true; 
		document.frmpayment.txtbtnpano.disabled = true;
		
	}else if(tp == 'O') { //Others
	   
		clearfield();
		
		document.frmpayment.txtadmfees.disabled = true;
		document.frmpayment.txtsitcent.disabled = true;
		document.frmpayment.txtgrncad.disabled = true;	
		document.frmpayment.txtadmfeesext1.disabled = true;
		document.frmpayment.txtadmfeesext2.disabled = true;
		document.frmpayment.txtadmfeesextgc.disabled = true;
		document.frmpayment.txtcontreg1.disabled = true;
		document.frmpayment.txtcontreg2.disabled = true;
		document.frmpayment.txtcontreg3.disabled = true;	
		document.frmpayment.txtcontren1.disabled = true;
		document.frmpayment.txtcontren2.disabled = true;
		document.frmpayment.txtcontren3.disabled = true;	
		document.frmpayment.txtrehire1.disabled = true;
		document.frmpayment.txtrehire2.disabled = true;	
		document.frmpayment.txtlocald.disabled = true;
		document.frmpayment.txtlocalr.disabled = true;
		document.frmpayment.txtgreenw.disabled = true;
		document.frmpayment.txtgreenr.disabled = true;
		document.frmpayment.txtmember.disabled = true;
		document.frmpayment.txtintro.disabled = true;
		document.frmpayment.txtjimplks.disabled = true;
		document.frmpayment.txtjimfees.disabled = true;
		document.frmpayment.txtjimvisa.disabled = true;
		document.frmpayment.txtjimlevi.disabled = true;
		document.frmpayment.txtjimlevi2.disabled = true;
		document.frmpayment.txtjimlevi3.disabled = true;
		document.frmpayment.txtjimsp.disabled = true;
		document.frmpayment.txtjimcp.disabled = true;
		document.frmpayment.txtjimcompund.disabled = true;
		document.frmpayment.txtmale.disabled = true;
		document.frmpayment.txtfemale.disabled = true;
		document.frmpayment.txtig.disabled = true;
		document.frmpayment.txtFWCS.disabled = true;
		document.frmpayment.txtFWHS.disabled = true;	
		document.frmpayment.txtagencyfees.disabled = true
		document.frmpayment.txtagencyfeesgc.disabled = true;
		document.frmpayment.txtothersfees.disabled = false;
		document.frmpayment.txtothersfees2.disabled = false;	
		
		document.frmpayment.txtfcl.disabled = false;
		document.frmpayment.txtbtncountry.disabled = false; 
		document.frmpayment.txtbtnpano.disabled = true;
	  
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
var url = "<?php echo site_url('contPayment/printinvoice3');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}

function printForm4(pmtno){

var pmtno = document.frmpayment.txtpmtno.value;
var url = "<?php echo site_url('contPayment/printinvoice4');?>/" + pmtno
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
}
	
function printpaymentadvice(){
var pmttype = document.frmpayment.optpmttype.value;
var pmtno = document.frmpayment.txtpmtno.value;
//var jimlevy2 = document.frmpayment.txtjimlevi2.checked;
//var jimlevy3 = document.frmpayment.txtjimlevi3.value;
//echo jimlevy2;
//echo jimlevy3;
	
if(pmttype == 'V') {
	var url = "<?php echo site_url('contPayment/printpavdr');?>/" + pmtno
	window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	}
else if(pmttype == 'LT') {var url = "<?php echo site_url('contPayment/printpalt');?>/" + pmtno
	window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	}
else if(pmttype == 'G13' && document.frmpayment.txtjimlevi2.checked == true ) {var url = "<?php echo site_url('contPayment/printpag133');?>/" + pmtno
	window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	}
else if(pmttype == 'G13' && document.frmpayment.txtjimlevi3.checked == true ) {var url = "<?php echo site_url('contPayment/printpag136');?>/" + pmtno
	window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	}
else if(pmttype == 'R') {var url = "<?php echo site_url('contPayment/printpaext');?>/" + pmtno
	window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	}


}	

function getclabval_adminfees(){
	var pmttype = document.frmpayment.optpmttype.value;
	var fcl = document.frmpayment.txtfcl.value;
	var disc = document.frmpayment.txtamtdisc.value;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtadmfees.checked = false; return false;}

	fee = 350;
	amtonly = (fee * fcl) - disc;
	amttax = amtonly * 0.06;
	amt = amtonly + amttax;	
	
	if(document.frmpayment.txtadmfees.checked == true){
		document.frmpayment.txtclabadmfee.value = fee;
		document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax) 
		document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly) 
		document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
	}else{
		document.frmpayment.txtclabadmfee.value = "0";
		document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax) 
		document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly)
		document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
	}
}

function getclabval_transit(){
	var pmttype = document.frmpayment.optpmttype.value;
	var fcl = document.frmpayment.txtfcl.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtsitcent.checked = false; return false;}

	fee = 350;
	amtonly = fee * fcl;
	amttax = amtonly * 0.06;
	amt = amtonly + amttax;
	
	if(document.frmpayment.txtsitcent.checked == true){
		document.frmpayment.txtclabtcfee.value = fee;
		document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax) 
		document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly) 
		document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
	}else{
		document.frmpayment.txtclabtcfee.value = 0;
		document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax) 
		document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly)
		document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
	}	
}

function getclabval_greencard(){
	var pmttype = document.frmpayment.optpmttype.value;
	var fcl = document.frmpayment.txtfcl.value;

	if(fcl == "" || fcl == 0){ 
		alert('Please Insert No Of FCL'); 
		if(pmttype == 'V') {document.frmpayment.txtgrncad.checked = false; return false;}
		else if(pmttype == 'LT') {document.frmpayment.txtgrncad.checked = false; return false;}
		else if(pmttype == 'G13') {document.frmpayment.txtgrncad.checked = false; return false;}
		else if(pmttype == 'R') {document.frmpayment.txtadmfeesextgc.checked = false; return false;}
		else if(pmttype == 'T') {document.frmpayment.txtagencyfeesgc.checked = false; return false;}
	}

	if(pmttype == 'V' || pmttype == 'R' || pmttype == 'T' || pmttype == 'LT' || pmttype == 'G13'){
		if(pmttype == 'R' ){fee=60;} else {fee=135;}
		amtonly = fee * fcl;
		amttax = amtonly * 0.06;
		amt = amtonly + amttax; 	
	} 
		
	if(pmttype == 'V' || pmttype == 'LT' || pmttype == 'G13' ){
		if(document.frmpayment.txtgrncad.checked == true){
			document.frmpayment.txtclabgcfee.value = fee;
			document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) + eval(amttax) 
			document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) + eval(amtonly) 
			document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) + eval(amt);
		}else{
			document.frmpayment.txtclabgcfee.value = 0;
			document.frmpayment.txtamtclab_tax.value = eval(document.frmpayment.txtamtclab_tax.value) - eval(amttax) 
			document.frmpayment.txtamtclab_only.value = eval(document.frmpayment.txtamtclab_only.value) - eval(amtonly)
			document.frmpayment.txtamtclab.value = eval(document.frmpayment.txtamtclab.value) - eval(amt);
		}
	}	
	if(pmttype == 'R'){
		if(document.frmpayment.txtadmfeesextgc.checked == true){
			document.frmpayment.txtclabrengcfee.value = fee;
			document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) + eval(amttax); 
			document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) + eval(amtonly) 
			document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) + eval(amt);
		}else{
			document.frmpayment.txtclabrengcfee.value = 0;
			document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) - eval(amttax);
			document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) - eval(amtonly) 
			document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) - eval(amt);
		}	
	}	
	if(pmttype == 'T'){
		if(document.frmpayment.txtagencyfeesgc.checked == true){
		   document.frmpayment.txtclabtransgcfee.value = fee;
		   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) + eval(amt);
		   document.frmpayment.txtamtagency_o.value = eval(document.frmpayment.txtamtagency_o.value) + eval(amtonly);
		   document.frmpayment.txtamtagency_t.value = eval(document.frmpayment.txtamtagency_t.value) + eval(gst);
		}else{
		   document.frmpayment.txtclabtransgcfee.value = 0;
		   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) - eval(amt);
		   document.frmpayment.txtamtagency_o.value = eval(document.frmpayment.txtamtagency_o.value) - eval(amtonly);
		   document.frmpayment.txtamtagency_t.value = eval(document.frmpayment.txtamtagency_t.value) - eval(gst);
		}
	}
}

function getclabval_adminfeesrenewal(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var fcl = document.frmpayment.txtfcl.value;
	var disc = document.frmpayment.txtamtdisc.value;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtadmfeesext1.checked ; document.frmpayment.txtadmfeesext2.checked = false; return false;}
	
if(x == '1') { fee=300;}
if(x == '2') { fee=500;}

	amtonly = (fee * fcl) - disc;
	amttax = amtonly * 0.06;
	amt = amtonly + amttax;
	
if(x == '1'){
	if(document.frmpayment.txtadmfeesext1.checked == true){
		document.frmpayment.txtclabrenfee.value = fee;
		document.frmpayment.txtadmfeesext1.value = eval(document.frmpayment.txtadmfeesext1.value) + eval(amt);
		document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) + eval(amttax); 
		document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) + eval(amtonly) 
		document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) + eval(amt);
	}else{
		document.frmpayment.txtclabrenfee.value = 0;
		document.frmpayment.txtadmfeesext1.value = eval(document.frmpayment.txtadmfeesext1.value) - eval(amt);
		document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) - eval(amttax);
		document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) - eval(amtonly) 
		document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) - eval(amt);
	}	
		
}else if(x == '2'){    
if(document.frmpayment.txtadmfeesext2.checked == true){
		document.frmpayment.txtclabrenfee.value = fee;
		document.frmpayment.txtadmfeesext2.value = eval(document.frmpayment.txtadmfeesext2.value) + eval(amt);
		document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) + eval(amttax); 
		document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) + eval(amtonly) 
		document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) + eval(amt);
	}else{
		document.frmpayment.txtclabrenfee.value = 0;
		document.frmpayment.txtadmfeesext2.value = eval(document.frmpayment.txtadmfeesext2.value) - eval(amt);
		document.frmpayment.txtamtclabren_t.value = eval(document.frmpayment.txtamtclabren_t.value) - eval(amttax);
		document.frmpayment.txtamtclabren_o.value = eval(document.frmpayment.txtamtclabren_o.value) - eval(amtonly) 
		document.frmpayment.txtamtclabren.value = eval(document.frmpayment.txtamtclabren.value) - eval(amt);
	}	
	}
}

function getcont_reg(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var disc = document.frmpayment.txtamtdisc.value;
	//var fcl = document.frmpayment.txtfcl.value;
	//if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtgrncad.checked = false; return false;}

	if(x == '1') { fee=20;}
	if(x == '2') { fee=40;}
	if(x == '3') { fee=50;}
	
	amtonly = fee - disc;
	gst = amtonly * 0.00;
	amt = amtonly + gst;
	
	if(x == '1'){
		if(document.frmpayment.txtcontreg1.checked == true){
			document.frmpayment.txtclabregfee.value = fee;
			document.frmpayment.txtcontreg2.checked = false;
			document.frmpayment.txtcontreg3.checked = false;
			document.frmpayment.txtamtreg.value = eval(amt);
			document.frmpayment.txtamtreg_o.value = eval(amtonly);
			document.frmpayment.txtamtreg_t.value = eval(gst);
		}else{
			document.frmpayment.txtclabregfee.value = 0;
			document.frmpayment.txtamtreg.value = 0;
			document.frmpayment.txtamtreg_t.value = 0;
			document.frmpayment.txtamtreg_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtcontreg2.checked == true){
			document.frmpayment.txtclabregfee.value = fee;
			document.frmpayment.txtcontreg1.checked = false;
			document.frmpayment.txtcontreg3.checked = false;
			document.frmpayment.txtamtreg_o.value = eval(amtonly);
			document.frmpayment.txtamtreg.value = eval(amt);
			document.frmpayment.txtamtreg_t.value = eval(gst);
		}else{
			document.frmpayment.txtclabregfee.value = 0;
			document.frmpayment.txtamtreg.value = 0;
			document.frmpayment.txtamtreg_t.value = 0;
			document.frmpayment.txtamtreg_o.value = 0;
		}
	}else if(x == '3'){
		if(document.frmpayment.txtcontreg3.checked == true){
			document.frmpayment.txtclabregfee.value = fee;
			document.frmpayment.txtcontreg1.checked = false;
			document.frmpayment.txtcontreg2.checked = false;
			document.frmpayment.txtamtreg_o.value = eval(amtonly);
			document.frmpayment.txtamtreg.value = eval(amt);
			document.frmpayment.txtamtreg_t.value = eval(gst);
		}else{
			document.frmpayment.txtclabregfee.value = 0;
			document.frmpayment.txtamtreg.value = 0;
			document.frmpayment.txtamtreg_t.value = 0;
			document.frmpayment.txtamtreg_o.value = 0;
		}		
	}   
}

function getcont_renw(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var disc = document.frmpayment.txtamtdisc.value;
	//var fcl = document.frmpayment.txtfcl.value;
	//if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtgrncad.checked = false; return false;}

	if(x == '1') { fee=20;}
	if(x == '2') { fee=40;}
	if(x == '3') { fee=50;}

	amtonly = fee - disc;
	gst = amtonly * 0.00;
	amt = amtonly + gst;	
	
if(x == '1'){
		if(document.frmpayment.txtcontren1.checked == true){
			document.frmpayment.txtcontrenfee.value = fee;
			document.frmpayment.txtcontren2.checked = false;
			document.frmpayment.txtcontren3.checked = false;
			document.frmpayment.txtamtcontren.value = eval(amt);
			document.frmpayment.txtamtcontren_o.value = eval(amtonly);
			document.frmpayment.txtamtcontren_t.value = eval(gst);
		}else{
			document.frmpayment.txtcontrenfee.value = 0;
			document.frmpayment.txtamtcontren.value = 0;
			document.frmpayment.txtamtcontren_t.value = 0;
			document.frmpayment.txtamtcontren_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtcontren2.checked == true){
			document.frmpayment.txtcontrenfee.value = fee;
			document.frmpayment.txtcontren1.checked = false;
			document.frmpayment.txtcontren3.checked = false;
			document.frmpayment.txtamtcontren.value = eval(amt);
			document.frmpayment.txtamtcontren_o.value = eval(amtonly);
			document.frmpayment.txtamtcontren_t.value = eval(gst);
		}else{
			document.frmpayment.txtcontrenfee.value = 0;
			document.frmpayment.txtamtcontren.value =  0;
			document.frmpayment.txtamtcontren_t.value = 0;
			document.frmpayment.txtamtcontren_o.value = 0;
		}		
	}else if(x == '3'){
		if(document.frmpayment.txtcontren3.checked == true){
			document.frmpayment.txtcontrenfee.value = fee;
			document.frmpayment.txtcontren1.checked = false;
			document.frmpayment.txtcontren2.checked = false;
			document.frmpayment.txtamtcontren.value = eval(amt);
			document.frmpayment.txtamtcontren_o.value = eval(amtonly);
			document.frmpayment.txtamtcontren_t.value = eval(gst);
		}else{
			document.frmpayment.txtcontrenfee.value = 0;
			document.frmpayment.txtamtcontren.value = 0;
			document.frmpayment.txtamtcontren_t.value = 0;
			document.frmpayment.txtamtcontren_o.value = 0;
		}		
	}   
}

function getgreen_card(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var disc = document.frmpayment.txtamtdisc.value;
	var fcl = document.frmpayment.txtfcl.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtgreenw.checked = false; return false;}

	if(x == '1') { fee=135;}
	if(x == '2') { fee=60;}

	amtonly = (fcl * fee) - disc;
	gst = amtonly * 0.06;
	num = amtonly + gst;
	amt = num.toFixed(2);	
	
	if(x == '1'){
		if(document.frmpayment.txtgreenw.checked == true){
			document.frmpayment.txtclabgreenfee.value = fee;
			document.frmpayment.txtgreenr.checked = false;
			document.frmpayment.txtamtgreen.value = eval(amt);
			document.frmpayment.txtamtgreen_t.value = eval(gst);
			document.frmpayment.txtamtgreen_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtclabgreenfee.value = 0;
			document.frmpayment.txtamtgreen.value = 0;
			document.frmpayment.txtamtgreen_t.value = 0;
			document.frmpayment.txtamtgreen_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtgreenr.checked == true){
			document.frmpayment.txtclabgreenfee.value = fee;
			document.frmpayment.txtgreenw.checked = false;
			document.frmpayment.txtamtgreen.value = eval(amt);
			document.frmpayment.txtamtgreen_t.value = eval(gst);
			document.frmpayment.txtamtgreen_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtclabgreenfee.value = 0;
			document.frmpayment.txtamtgreen.value = 0;
			document.frmpayment.txtamtgreen_t.value = 0;
			document.frmpayment.txtamtgreen_o.value = 0;
		}		
	}  
}

function getval_rehire(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var disc = document.frmpayment.txtamtdisc.value;
	var fcl = document.frmpayment.txtfcl.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtgrncad.checked = false; return false;}

	if(x == '1') { fee=175;}
	if(x == '2') { fee=175;}
	
	amtonly = (fcl * fee) - disc;
	gst = amtonly * 0.06;
	num = amtonly + gst;
	amt = num.toFixed(2);
		
	if(x == '1'){
		if(document.frmpayment.txtrehire1.checked == true){
			document.frmpayment.txtclabrehfee.value = fee;
			document.frmpayment.txtrehire2.checked = false;
			document.frmpayment.txtamtrehire.value = eval(amt);
			document.frmpayment.txtamtrehire_t.value = eval(gst);
			document.frmpayment.txtamtrehire_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtclabrehfee.value = 0;
			document.frmpayment.txtamtrehire.value = 0;
			document.frmpayment.txtamtrehire_t.value = 0;
			document.frmpayment.txtamtrehire_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtrehire2.checked == true){
			document.frmpayment.txtclabrehfee.value = fee;
			document.frmpayment.txtrehire1.checked = false;
			document.frmpayment.txtamtrehire.value = eval(amt);
			document.frmpayment.txtamtrehire_t.value = eval(gst);
			document.frmpayment.txtamtrehire_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtclabrehfee.value = 0;
			document.frmpayment.txtamtrehire.value = 0;
			document.frmpayment.txtamtrehire_t.value = 0;
			document.frmpayment.txtamtrehire_o.value = 0;
		}		
	}	
}

function getlocaldis(){
	fcl = document.frmpayment.txtfcl.value; 
	var disc = document.frmpayment.txtamtdisc.value;	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtlocald.checked = false; return false;}
	fee = 50;
	amtonly = (fee * fcl) - disc;
	gst = amtonly * 0.06;
	amt = amtonly + gst; 

	if(document.frmpayment.txtlocald.checked == true){
		document.frmpayment.txtlocalr.checked = false;
		document.frmpayment.txtclablwfee.value = fee;
		document.frmpayment.txtamtlocal_t.value = eval(gst);
		document.frmpayment.txtamtlocal_o.value = eval(amtonly);
		document.frmpayment.txtamtlocal.value = eval(amt);
	}else{
		document.frmpayment.txtclablwfee.value = 0;
		document.frmpayment.txtamtlocal.value = 0;
		document.frmpayment.txtamtlocal_o.value = 0;
		document.frmpayment.txtamtlocal_t.value = 0;
	}
}

function getlocalreim(){
	fcl = document.frmpayment.txtfcl.value; 
	var disc = document.frmpayment.txtamtdisc.value;	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtlocalr.checked = false; return false;}

	fee = 200;
	amtonly = (fee * fcl) - disc;
	gst = amtonly * 0.06;
	amt = amtonly + gst; 
	
	if(document.frmpayment.txtlocalr.checked == true){
		document.frmpayment.txtlocald.checked = false;
		document.frmpayment.txtclablwfee.value = fee;
		document.frmpayment.txtamtlocal_t.value = eval(gst);
		document.frmpayment.txtamtlocal_o.value = eval(amtonly);
		document.frmpayment.txtamtlocal.value = eval(amt);
	}else{
		document.frmpayment.txtclablwfee.value = 0;
		document.frmpayment.txtamtlocal.value = 0;
		document.frmpayment.txtamtlocal_t.value = 0;
		document.frmpayment.txtamtlocal_o.value = 0;
	}  
}

function getval_cfee(x){
	var pmttype = document.frmpayment.optpmttype.value;
	var disc = document.frmpayment.txtamtdisc.value;
	//var fcl = document.frmpayment.txtfcl.value;
	//if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtgrncad.checked = false; return false;}

	if(x == '1') { fee=50;}
	if(x == '2') { fee=0;}
	
	amtonly = fee - disc;
	gst = amtonly * 0.06;
	num = amtonly + gst;
	amt = num.toFixed(2);
	
	if(x == '1'){
		if(document.frmpayment.txtmember.checked == true){
			document.frmpayment.txtclabfee.value = fee;
			document.frmpayment.txtintro.checked = false;
			document.frmpayment.txtamtclabfee.value = eval(amt);
			document.frmpayment.txtamtclabfee_t.value = eval(gst);
			document.frmpayment.txtamtclabfee_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtclabfee.value = 0;
			document.frmpayment.txtamtclabfee.value = 0;
			document.frmpayment.txtamtclabfee_t.value = 0;
			document.frmpayment.txtamtclabfee_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtintro.checked == true){
			document.frmpayment.txtclabfee.value = fee;
			document.frmpayment.txtmember.checked = false;
			document.frmpayment.txtamtclabfee.value = 0; //eval(amt);
			document.frmpayment.txtamtclabfee_t.value = 0;//eval(gst);
			document.frmpayment.txtamtclabfee_o.value = 0;//eval(amtonly);
		}else{
			document.frmpayment.txtclabfee.value = 0;
			document.frmpayment.txtamtclabfee.value = 0;
			document.frmpayment.txtamtclabfee_t.value = 0;
			document.frmpayment.txtamtclabfee_o.value = 0;
		}		
	}   
}

function get_introducer(x){	
	jum = x;
	gst = jum * 0.06;
	amt = eval(jum) + eval(gst);
	document.frmpayment.txtamtclabfee_t.value = gst;
	document.frmpayment.txtamtclabfee.value = amt;	
}

function getjimval_plks(){ 
	var pmttype = document.frmpayment.optpmttype.value;  
	var fcl = document.frmpayment.txtfcl.value; 

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimplks.checked = false; return false;}
	
	fee=60;
	amt = fee * fcl; 

	if(document.frmpayment.txtjimplks.checked == true){
	  document.frmpayment.txtamtjim_plks.value = eval(document.frmpayment.txtamtjim_plks.value) + eval(amt);
	  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	  document.frmpayment.txtamtjim_plks.value = eval(document.frmpayment.txtamtjim_plks.value) - eval(amt);
	  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nAmount = '+amt);   
}

function getjimval_fees(){   
	fcl = document.frmpayment.txtfcl.value; 

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimfees.checked = false; return false;}
	
	fee = 125;
	amt = fee * fcl; 

	if(document.frmpayment.txtjimfees.checked == true){
	   document.frmpayment.txtamtjim_fees.value = eval(document.frmpayment.txtamtjim_fees.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtjim_fees.value = eval(document.frmpayment.txtamtjim_fees.value) - eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nAmount = '+amt);     
}

function getjimval_levi(tterm){   
	fcl = document.frmpayment.txtfcl.value; 

	if(tterm == '1') {fee=1850;}
	else if(tterm == '2') {fee=462.5;}
	else if(tterm == '3') {fee=925;}
	else if(tterm == '4') {fee=6000;}
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimfees.checked = false; return false;}
	//fee = 1850;
	amt = fee * fcl; 

	if(tterm == '1'){
		if(document.frmpayment.txtjimlevi.checked == true){
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) + eval(amt);
		   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
		}else{
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) - eval(amt);
		  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
		}
	}
	
	if(tterm == '2'){
		if(document.frmpayment.txtjimlevi2.checked == true){
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) + eval(amt);
		   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
		}else{
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) - eval(amt);
		  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
		}
	}
	
	if(tterm == '3'){
		if(document.frmpayment.txtjimlevi3.checked == true){
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) + eval(amt);
		   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
		}else{
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) - eval(amt);
		  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
		}
	}
	
	if(tterm == '4'){
		if(document.frmpayment.txtjimlevi4.checked == true){
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) + eval(amt);
		   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
		}else{
		   document.frmpayment.txtamtjim_levi.value = eval(document.frmpayment.txtamtjim_levi.value) - eval(amt);
		  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
		}
	}
	
	//alert('FCL No = '+fcl+'\nAmount = '+amt);     
}

function getjimval_visa(){  
	visa = document.frmpayment.txtvisa.value;   
	fcl = document.frmpayment.txtfcl.value;
		
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimvisa.checked = false; return false;}
	if(visa == ""){ alert('Please Select Country'); document.frmpayment.txtjimvisa.checked = false; return false; }
	
	amt = visa * fcl; 
	
	if(document.frmpayment.txtjimvisa.checked == true){
	   document.frmpayment.txtamtjim_visa.value = eval(document.frmpayment.txtamtjim_visa.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	  document.frmpayment.txtamtjim_visa.value = eval(document.frmpayment.txtamtjim_visa.value) - eval(amt);
	  document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nAmount = '+amt);     
}

function getcancelpermit(){
	fcl = document.frmpayment.txtfcl.value; 
	fine = document.frmpayment.txtfine.value;
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimcp.checked = false; return false;}
	if(fine == "" || fine == 0){ alert('Please Select Country'); document.frmpayment.txtjimcp.checked = false; return false; }
	
	amt = fine * fcl;
	
	if(document.frmpayment.txtjimcp.checked == true){
		document.frmpayment.txtamtjim_cp.value = eval(document.frmpayment.txtamtjim_cp.value) + eval(amt);
		document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
		document.frmpayment.txtamtjim_cp.value = eval(document.frmpayment.txtamtjim_cp.value) - eval(amt);
		document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nFine = '+fine+'\nAmount='+amt+'\nCountry = '+fine); 
}

function getfomema(x){
	var fcl = document.frmpayment.txtfcl.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtmale.checked = false; document.frmpayment.txtfemale.checked = false; return false;}

	//fee = 180;
	if(x == '1') { fee=180;}
	if(x == '2') { fee=20;}
	amtonly = fcl * fee;
	gst = amtonly * 0.00;
	num = amtonly + gst;
	amt = num.toFixed(2);	
	
	if(x == '1'){
		if(document.frmpayment.txtmale.checked == true){
			document.frmpayment.txtfemale.checked = false;
			document.frmpayment.txtamtfomema.value = eval(amt);
			document.frmpayment.txtamtfomema_t.value = eval(gst);
			document.frmpayment.txtamtfomema_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtamtfomema.value = 0;
			document.frmpayment.txtamtfomema_t.value = 0;
			document.frmpayment.txtamtfomema_o.value = 0;
		}
	}else if(x == '2'){
		if(document.frmpayment.txtfemale.checked == true){
			document.frmpayment.txtmale.checked = false;
			document.frmpayment.txtamtfomema.value = eval(amt);
			document.frmpayment.txtamtfomema_t.value = eval(gst);
			document.frmpayment.txtamtfomema_o.value = eval(amtonly);
		}else{
			document.frmpayment.txtamtfomema.value = 0;
			document.frmpayment.txtamtfomema_t.value = 0;
			document.frmpayment.txtamtfomema_o.value = 0;
		}		
	}	
	//alert('Fee = '+fee+'\nGST='+gst+'\nTotal='+amt);   
}

function getins_ig(){
	fcl = document.frmpayment.txtfcl.value; 
	fine = document.frmpayment.txtfine.value; 

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtig.checked = false; return false;}	
	if(fine == "" || fine == 0){ alert('Please Select Country'); document.frmpayment.txtig.checked = false; return false; }
	
	fee = 50;
	stamp = 10;
	calcig =  ((fcl * fine * 18) / 12) * 0.01;
	if(calcig > 50) {
		gst = calcig * 0.06;
		amtonly = calcig + stamp;
		num = amtonly + gst;
	}else{
		gst = fee * 0.06;
		amtonly = fee + stamp;
		num = amtonly + gst;
	} 
	amt = num.toFixed(2);
	
	if(document.frmpayment.txtig.checked == true){
	   document.frmpayment.txtamtins_ig.value = eval(document.frmpayment.txtamtins_ig.value) + eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	   document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) + eval(gst);
	   document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) + eval(amtonly);
	}else{
	   document.frmpayment.txtamtins_ig.value = eval(document.frmpayment.txtamtins_ig.value) - eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	   document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) - eval(gst);
	   document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) - eval(amtonly);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nStamp = '+stamp+'\nFine = '+fine+'\nGST = '+gst+'\nCalc IG='+calcig+'\nAmt only='+amtonly+'\namt='+amt); 
}

	function get_deposit(){ 
		
		amt=0;
	fcl = document.frmpayment.txtfcl.value; 
	fine = document.frmpayment.txtfine.value; 

	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtDeposit.checked = false; return false;}	
	if(fine == "" || fine == 0){ alert('Please Select Country'); document.frmpayment.txtDeposit.checked = false; return false; }

	calcdep =  fcl * fine ;
	num = calcdep;
	amt = num.toFixed(2);
	//amt = 0;
	
	if(document.frmpayment.txtDeposit.checked == true){
	   document.frmpayment.txtamtothr.value = eval(document.frmpayment.txtamtothr.value) + eval(amt);
	   document.frmpayment.txtmshipfees.value = eval(document.frmpayment.txtmshipfees.value);
	   document.frmpayment.txtdepfees.value = eval(document.frmpayment.txtdepfees.value)+ eval(amt);
	   document.frmpayment.txtamtothr_o.value = eval(document.frmpayment.txtamtothr_o.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtothr.value = eval(document.frmpayment.txtamtothr.value) - eval(amt);
	   document.frmpayment.txtmshipfees.value = eval(document.frmpayment.txtmshipfees.value);
	   document.frmpayment.txtdepfees.value = eval(document.frmpayment.txtdepfees.value)- eval(amt);
	   document.frmpayment.txtamtothr_o.value = eval(document.frmpayment.txtamtothr_o.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nStamp = '+stamp+'\nFine = '+fine+'\nGST = '+gst+'\nCalc IG='+calcig+'\nAmt only='+amtonly+'\namt='+amt); 
}
	
function getins_fwcs(){
	fcl = document.frmpayment.txtfcl.value; 
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtig.checked = false; return false;}

	fee = 72;
	stamp = 10;
	gst = fcl * fee * 0.06;
	amtonly = fcl * fee + stamp;
	num = amtonly + gst;
	amt = num.toFixed(2);	

	if(document.frmpayment.txtFWCS.checked == true){		
		document.frmpayment.txtamtins_fwcs.value = eval(document.frmpayment.txtamtins_fwcs.value) + eval(amt);
		document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
		document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) + eval(gst);
		document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) + eval(amtonly);
	}else{
		document.frmpayment.txtamtins_fwcs.value = eval(document.frmpayment.txtamtins_fwcs.value) - eval(amt);
		document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
		document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) - eval(gst);
		document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) - eval(amtonly);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nStamp = '+stamp+'\nGST = '+gst+'\nAmount='+amt); 
}

function getins_fwhs(){
	fcl = document.frmpayment.txtfcl.value; 
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtFWHS.checked = false; return false;}

	fee = 120;
	stamp = 10;
	gst = fcl * fee * 0.06;
	amtonly = fcl * fee + stamp;
	num = amtonly + gst;
	amt = num.toFixed(2);

	if(document.frmpayment.txtFWHS.checked == true){
	   document.frmpayment.txtamtins_fwhs.value = eval(document.frmpayment.txtamtins_fwhs.value) + eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) + eval(amt);
	   document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) + eval(gst);
	   document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) + eval(amtonly);
	}else{
	   document.frmpayment.txtamtins_fwhs.value =eval( document.frmpayment.txtamtins_fwhs.value) - eval(amt);
	   document.frmpayment.txtamtins.value = eval(document.frmpayment.txtamtins.value) - eval(amt);
	   document.frmpayment.txtamtins_t.value = eval(document.frmpayment.txtamtins_t.value) - eval(gst);
	   document.frmpayment.txtamtins_o.value = eval(document.frmpayment.txtamtins_o.value) - eval(amtonly);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nStamp = '+stamp+'\nGST = '+gst+'\nAmount='+amt); 
}

function getcompound(){
    fcl = document.frmpayment.txtfcl.value; 
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimcompund.checked = false; return false;}

	fee=1000;
	amt = fee * fcl;
	
	 if(document.frmpayment.txtjimcompund.checked == true){
	   document.frmpayment.txtamtjim_compound.value = eval(document.frmpayment.txtamtjim_compound.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtjim_compound.value = eval(document.frmpayment.txtamtjim_compound.value) - eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nAmount='+amt); 	
}

function getsp(){
	fcl = document.frmpayment.txtfcl.value; 
	
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtjimsp.checked = false; return false;}	
	
	fee=100;
	amt = fee * fcl;

	 if(document.frmpayment.txtjimsp.checked == true){
	   document.frmpayment.txtamtjim_sp.value = eval(document.frmpayment.txtamtjim_sp.value) + eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) + eval(amt);
	}else{
	   document.frmpayment.txtamtjim_sp.value = eval(document.frmpayment.txtamtjim_sp.value) - eval(amt);
	   document.frmpayment.txtamtjim.value = eval(document.frmpayment.txtamtjim.value) - eval(amt);
	}
	//alert('FCL No = '+fcl+'\nFee = '+fee+'\nAmount='+amt); 	
}

function gettransit(){
    var fcl = document.frmpayment.txtfcl.value;
	var disc = document.frmpayment.txtamtdisc.value;
	if(fcl == "" || fcl == 0){ alert('Please Insert No Of FCL'); document.frmpayment.txtagencyfees.checked = false; return false;}
	
	fee = 350;
	amtonly = (fee * fcl) - disc;
	gst = amtonly * 0.06;
	amt = amtonly + gst;
	
	if(document.frmpayment.txtagencyfees.checked == true){
	   document.frmpayment.txtclabtransfee.value = fee;
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) + eval(amt);
	   document.frmpayment.txtamtagency_o.value = eval(document.frmpayment.txtamtagency_o.value) + eval(amtonly);
	   document.frmpayment.txtamtagency_t.value = eval(document.frmpayment.txtamtagency_t.value) + eval(gst);
	}else{
	   document.frmpayment.txtclabtransfee.value = 0;
	   document.frmpayment.txtamtagency.value = eval(document.frmpayment.txtamtagency.value) - eval(amt);
	   document.frmpayment.txtamtagency_o.value = eval(document.frmpayment.txtamtagency_o.value) - eval(amtonly);
	   document.frmpayment.txtamtagency_t.value = eval(document.frmpayment.txtamtagency_t.value) - eval(gst);
	}
}

function get_others(x){
	
	jum = x;
	gst = jum * 0.06;
	amt = eval(jum) + eval(gst);
	document.frmpayment.txtamtothr_t.value = gst;
	document.frmpayment.txtamtothr.value = amt;	
}

function get_others3rd(x){
	
	jum = x;
	gst = 0;
	amt = eval(jum) + eval(gst);
	document.frmpayment.txtamtothr_t.value = gst;
	document.frmpayment.txtamtothr.value = amt;	
}

function palist(){
var pmttype = document.frmpayment.optpmttype.value;
var url = "<?php echo site_url('contPayment/openpalist');?>/" + pmttype
window.open(url, 'Contractor List', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
}

function cancelreceipt(){

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


if($payment->payment_type == 'V'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "";
	$strclabtrans  = "";
	$strclabgreen = "";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
	$strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";

	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'R'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "";
	$strclabfeeext2 = "";
	$strclabfeeextgc = "";
	
	$strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";

	$strlocdis = "disabled";
	$strlocreim = "disabled";	

	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "";
	$strjimsp = "";
	$strjimcp = "disabled"; 
	$strjimcompound = "";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'CR'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "";
	$strcontreg2 = "";
	$strcontreg3 = "";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";	
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";

	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";

}elseif($payment->payment_type == 'CRN'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "";
    $strcontren2 = "";
	$strcontren3 = "";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";

}elseif($payment->payment_type == 'REH'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "";
	$strrehire2 = "";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "";
	$strgreenr = "";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "";
	$strjimcp = ""; 
	$strjimcompound = "";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'LT'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "";
	$strclabtrans  = "";
	$strclabgreen = "";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
	$strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";

	$strothfee = "";
	$strothfee2 = "";

}elseif($payment->payment_type == 'G13'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "";
	$strclabtrans  = "";
	$strclabgreen = "";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
	$strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "";
	$strjimfees = "";
	$strjimvisa = "";
	$strjimlevi = "disabled";
	$strjimlevi2 = "";
	$strjimlevi3 = "";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "";
	$strinsfwcs = "";
	$strinsfwhs = "";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";

	$strothfee = "";
	$strothfee2 = "";	
	
}elseif($payment->payment_type == 'LW'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "";
	$strlocreim = "";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'GRC'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "";
	$strgreenr = "";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";

	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'FEE'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "";
	$strintro = "";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";

}elseif($payment->payment_type == 'T'){
 	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "";
	$stragfeesgc = "";
	
	$strothfee = "";
	$strothfee2 = "";

	}elseif($payment->payment_type == 'CP'){
  	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = ""; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
  
	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'COM'){
	$strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";
	
}elseif($payment->payment_type == 'SP'){
    $strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";

}elseif($payment->payment_type == 'F'){
    $strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "";
	$strfomemaF = "";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";
	
	$strothfee = "";
	$strothfee2 = "";

	
}elseif($payment->payment_type == 'O'){   
    $strfcl = "";
	$strcountry = "";
	$strpa = "";
	$strdisc = "";
	
	$strclabfeevdr = "disabled";
	$strclabtrans  = "disabled";
	$strclabgreen = "disabled";
	
	$strclabfeeext1 = "disabled";
	$strclabfeeext2 = "disabled";
	$strclabfeeextgc = "disabled";
	
    $strcontreg1 = "disabled";
	$strcontreg2 = "disabled";
	$strcontreg3 = "disabled";
	
	$strcontren1 = "disabled";
    $strcontren2 = "disabled";
	$strcontren3 = "disabled";
	
	$strrehire1 = "disabled";
	$strrehire2 = "disabled";
	
	$strlocdis = "disabled";
	$strlocreim = "disabled";
	
	$strgreenw = "disabled";
	$strgreenr = "disabled";
	
	$strmember = "disabled";
	$strintro = "disabled";
	
	$strjimplks = "disabled";
	$strjimfees = "disabled";
	$strjimvisa = "disabled";
	$strjimlevi = "disabled";
	$strjimlevi2 = "disabled";
	$strjimlevi3 = "disabled";
	$strjimlevi4 = "disabled";
	$strjimsp = "disabled";
	$strjimcp = "disabled"; 
	$strjimcompound = "disabled";
	
	$strfomemaM = "disabled";
	$strfomemaF = "disabled";
	
	$strinsig = "disabled";
	$strinsfwcs = "disabled";
	$strinsfwhs = "disabled";
	
	$stragfees = "disabled";
	$stragfeesgc = "disabled";

	$strothfee = "";
	$strothfee2 = "";
	
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
  <td>Regional :</td>
  <td colspan="2"><input type="text" name="txtregion" value="<?php echo $payment->regional_id?>" readonly="readonly"/></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
	<td width="20%">Official Receipt No. :</td>
	<td colspan="2"><input type="text" name="txtpmtno" value="<?php echo $payment->pmt_receipt_no?>" readonly/></td>
	<td><span class="style1">
		<input name="chkcancel" type="checkbox" id="chkcancel" onclick="cancelreceipt();" value="1" 
		<?php if($payment->pmt_withdraw == '1') echo "checked" ;?>
		<?php if(strpos($accessibility, 'a') == false) echo "DISABLED";  ?> />Cancel Receipt&nbsp; &nbsp;&nbsp;
		<input name="dtcancel" type="text" id="dtcancel" value="<?php echo $payment->pmt_wd_date ?>" size="11" readonly/>
		<input id="button5" name="btnDate5" type="button" class="scwdatepicker" onclick="scwShow(document.getElementById('dtcancel'), this)" />
		</span>
	</td>
	<td><span class="style1">
		<input type="hidden" name="currentuser" value="<?php echo $this->session->userdata('username');?>" />PIC :
		<input name="txtuser" type="text" id="txtuser" value="<?php echo $payment->pmt_wd_by;?>"  size="10" <?php echo $strfcl ?> readonly/>
		</span>
	</td>
	<td><span class="style1">Reason : 
		<input name="txtcomment" type="text" id="txtcomment" value="<?php echo $payment->pmt_wd_comment;?>"  size="10" <?php echo $strfcl ?>/>
		</span>
	</td>
</tr>
<tr>
    <td>Payment Type:</td>
	<td colspan="5">
		<Select name="optpmttype" onchange="valid(this.value)">
		<option value="0"></option>
		<option value="V" <?php if($payment->payment_type == 'V') echo "selected"; ?>>VDR</option>
		<option value="R" <?php if($payment->payment_type == 'R') echo "selected"; ?>>Renewal Permit</option>
		<option value="CR" <?php if($payment->payment_type == 'CR') echo "selected"; ?>>Contractor Registration</option>
		<option value="CRN" <?php if($payment->payment_type == 'CRN') echo "selected"; ?>>Contractor Renewal</option>
		<option value="REH" <?php if($payment->payment_type == 'REH') echo "selected"; ?>>Rehiring</option>
		<option value="LT" <?php if($payment->payment_type == 'LT') echo "selected"; ?>>Local Transfer</option>
		<option value="G13" <?php if($payment->payment_type == 'G13') echo "selected"; ?>>G1-G3 Programme</option>			
		<option value="LW" <?php if($payment->payment_type == 'LW') echo "selected"; ?>>Local Worker</option>
		<option value="GRC" <?php if($payment->payment_type == 'GRC') echo "selected"; ?>>Green Card</option>
		<option value="FEE" <?php if($payment->payment_type == 'FEE') echo "selected"; ?>>CLAB Fee</option>
		<option value="T" <?php if($payment->payment_type == 'T') echo "selected"; ?>>Transit Centre</option>
		<option value="CP" <?php if($payment->payment_type == 'CP') echo "selected"; ?>>Cancel Permit</option>
		<option value="COM" <?php if($payment->payment_type == 'COM') echo "selected"; ?>>Compound</option>							
		<option value="SP" <?php if($payment->payment_type == 'SP') echo "selected"; ?>>Special Pass</option>	
		<option value="F" <?php if($payment->payment_type == 'F') echo "selected"; ?>>Fomema</option>	
		<option value="O" <?php if($payment->payment_type == 'O') echo "selected"; ?>>Others</option>
		
		
		</Select>
	</td>
</tr>
<tr>
    <td>Date Created</td>
	<td colspan="5"><input type="text" name="txtcreateddate" value="<?php echo date('j M Y',strtotime($payment->pmt_datecreated))?>" readonly/></td>
</tr>
<tr>
    <td>Received From</td>
	<td colspan="5"><input type="text" name="txtrecfrom" value="<?php echo $payment->pmt_receive_from?>" size="60" />
	  <input name="button" type="button" onclick="opencontractor()" value="..."/></td>
</tr>
<tr>
    <td>Address:</td>
	<td colspan="5">
	<textarea name="txtaddr1" ssize="60" height="4" style="width: 363px"><?php echo $payment->pmt_addr?></textarea></td>
</tr>
<tr>
    <td>No Of (FCL/Posting/LW )</td>
	<td colspan="5"><input type="text" name="txtfcl" onchange="resetfield()" value="<?php echo $payment->no_of_fcl ?>"  style='width:80px;text-align:center;' <?php echo $strfcl ?>/></td>
</tr>
<tr>
    <td>Country:</td>
	<td colspan="5"><input type="text" name="txtcountry" value="<?php echo $payment->country ?>"  size="20" />
	<input type="button" value="..." name="txtbtncountry" onclick="countrylist()" <?php echo $strcountry ?>/></td>
</tr>
<tr>
    <td>P.A No:</td>
	<td colspan="5"><input type="text" name="txtpaclab" value="<?php echo $payment->clab_pa_no?>" size="20" />
	<input type="button" name="txtbtnpano" value="..." onclick="palist()" <?php echo $strpa ?>/></td>
</tr>
<tr>
	<td>Discount Amount</td>
	<td colspan="5">
		<!--input type="checkbox" name="txtchkdisc" value="1" onclick="discount()" disabled/-->
		<input type="text" name="txtamtdisc" value="<?php echo $payment->amt_disc?>" onchange="resetfield()" style='width:80px;text-align:center;' <?php echo $strdisc ?> />
	</td>
</tr>
<tr>
	<td>Discount Remarks</td>
	<td colspan="5"><textarea cols="40" rows="2" name="txtrmkdisc" ><?php echo $payment->rmk_disc?></textarea></td>
</tr>
<tr><td colspan="6">&nbsp;</td></tr>
<tr>
	<td colspan="6">
		<!--TABLE  border="0" width="100%" height="40px" cellspacing="0" cellpadding="0" style="border-collapse: collapse;" bordercolor="#FFFFFF"-->
		<table width="100%" border="1" style="border-collapse: collapse;" bordercolor="#FFFFFF">
			<tr>
				<td width="15%" align="center" height="35">&nbsp;CHEQUE NO./<br /> BANK DRAFT </td>
				<td width="15%" align="center">PAYMENT TO</td>
				<td width="40%" >DESCRIPTION OF PAYMENT</td>
				<td width="10%" align="center">AMOUNT</td>
				<td width="10%" align="center">SST (6%)</td>
				<td width="10%" align="center">TOTAL</td>
			</tr>

			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqclab" value="<?php echo $payment->pmt_chq_clab?>" size="20" /></td>
				<td align="center" valign=top>CLAB</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=0>
						<tr>
							<td width=50%><input type="checkbox" name="txtadmfees" value="1" <?php if($payment->chk_clab_fees == '1') echo "Checked"?> onclick="getclabval_adminfees()" <?php echo $strclabfeevdr ?> />&nbsp;ADMIN / AGENCY FEE</td>
							<td><input type="checkbox" name="txtgrncad" value="1" <?php if($payment->chk_clab_grncad == '1') echo "Checked"?> onclick="getclabval_greencard()" <?php echo $strclabgreen ?> />&nbsp;GREEN CARD</td>							
						</tr>
						<tr>
							<td><input type="checkbox" name="txtsitcent" value="1" <?php if($payment->chk_clab_tsitcent == '1') echo "Checked"?> onclick="getclabval_transit()" <?php echo $strclabtrans ?> />&nbsp;TRANSIT CENTRE</td>
							<td>&nbsp;</td>							
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtclab_only" value="<?php echo $payment->clab_amount_only ?>"  style='width:80px;text-align:center;' readonly />	
					<input type="hidden" name="txtclabadmfee" value="<?php echo $payment->clab_adm_fee ?>" size=5 />	
					<input type="hidden" name="txtclabgcfee" value="<?php echo $payment->clab_gc_fee ?>" size=5 />	
					<input type="hidden" name="txtclabtcfee" value="<?php echo $payment->clab_tc_fee ?>" size=5 />	
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtclab_tax" value="<?php echo $payment->clab_amount_tax ?>" style='width:80px;text-align:center;' readonly />  				
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtclab" value="<?php echo $payment->clab_amount ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>

			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqclabren" value="<?php echo $payment->pmt_chq_clab_ren?>" size="20" /></td>
				<td align="center" valign=top>Renewal Permit</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
						  <td><input type="checkbox" name="txtadmfeesext1" value="1" <?php if($payment->chk_clab_fees_ext == '1') echo "Checked"?> onclick="getclabval_adminfeesrenewal(1)" <?php echo $strclabfeeext1 ?> />&nbsp;ADMIN FEE EXT</td>
						  <td>&nbsp;</td>
					  </tr>
						<tr>
							<td width=50%><input type="checkbox" name="txtadmfeesext2" value="1" <?php if($payment->chk_clab_fees_ext11 == '1') echo "Checked"?> onclick="getclabval_adminfeesrenewal(2)" <?php echo $strclabfeeext2 ?> />
							  &nbsp;ADMIN FEE (Year 11 &amp; Above)</td>
							<td><input type="checkbox" name="txtadmfeesextgc" value="1" <?php if($payment->chk_clab_fees_extgc == '1') echo "Checked"?> onclick="getclabval_greencard()" <?php echo $strclabfeeextgc ?> />&nbsp;GREEN CARD</td>
						</tr>
					</table>
				</td>
				<td align="center" >
					<input type="text" name="txtamtclabren_o" value="<?php echo $payment->amt_clabreno ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclabrenfee" value="<?php echo $payment->clab_ren_fee ?>" size=5 />	
					<input type="hidden" name="txtclabrengcfee" value="<?php echo $payment->clab_rengc_fee ?>" size=5 />
				</td>
				<td align="center" >
					<input type="text" name="txtamtclabren_t" value="<?php echo $payment->amt_clabrent ?>" style='width:80px;text-align:center;' readonly />			
				</td>
				<td align="center" >
					<input type="text" name="txtamtclabren" value="<?php echo $payment->amt_clabren ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqcontreg" value="<?php echo $payment->chqno_contreg?>" size="20" /></td>
				<td align="center" valign=top>Contractor Registration</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtcontreg1" value="1" <?php if($payment->chk_contreg1 == '1') echo "Checked"?> onclick="getcont_reg(1)" <?php echo $strcontreg1 ?> />&nbsp;REGISTRATION YEAR 1</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtcontreg2" value="1" <?php if($payment->chk_contreg2 == '1') echo "Checked"?> onclick="getcont_reg(2)" <?php echo $strcontreg2 ?> />&nbsp;REGISTRATION YEAR 2</td>
							<td></td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtcontreg3" value="1" <?php if($payment->chk_contreg3 == '1') echo "Checked"?> onclick="getcont_reg(3)" <?php echo $strcontreg3 ?> />&nbsp;REGISTRATION YEAR 3</td>
							<td></td>
						</tr>
						
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtreg_o" value="<?php echo $payment->amt_contrego ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclabregfee" value="<?php echo $payment->clab_contreg_fee ?>" size=5 />	
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtreg_t" value="<?php echo $payment->amt_contregt ?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtreg" value="<?php echo $payment->amt_contreg ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqcontren" value="<?php echo $payment->chqno_contren?>" size="20" /></td>
				<td align="center" valign=top>Contractor Renewal</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtcontren1" value="1" <?php if($payment->chk_contren1 == '1') echo "Checked"?> onclick="getcont_renw(1)" <?php echo $strcontren1 ?> />&nbsp;RENEWAL YEAR 1</td>
							<td></td>
						</tr>
						<tr>
							<td ><input type="checkbox" name="txtcontren2" value="1" <?php if($payment->chk_contren2 == '1') echo "Checked"?> onclick="getcont_renw(2)" <?php echo $strcontren2 ?> />&nbsp;RENEWAL YEAR 2</td>
							<td></td>
						</tr>
						<tr>
							<td ><input type="checkbox" name="txtcontren3" value="1" <?php if($payment->chk_contren3 == '1') echo "Checked"?> onclick="getcont_renw(3)" <?php echo $strcontren3 ?> />&nbsp;RENEWAL YEAR 3</td>
							<td></td>
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtcontren_o" value="<?php echo $payment->amt_contreno ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtcontrenfee" value="<?php echo $payment->clab_contren_fee ?>" size=5 />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtcontren_t" value="<?php echo $payment->amt_contrent ?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtcontren" value="<?php echo $payment->amt_contren ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqrehire" value="<?php echo $payment->chqno_rehire?>" size="20" /></td>
				<td align="center" valign=top>Rehiring</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtrehire1" value="1" <?php if($payment->chk_rehire1 == '1') echo "Checked"?> onclick="getval_rehire(1)" <?php echo $strrehire1 ?> />&nbsp;1st PAYMENT</td>
							<td><input type="checkbox" name="txtrehire2" value="1" <?php if($payment->chk_rehire2 == '1') echo "Checked"?> onclick="getval_rehire(2)" <?php echo $strrehire2 ?> />&nbsp;2nd PAYMENT</td>
						</tr>
					</table>
				</td>
				<td align="center">
					<input type="text" name="txtamtrehire_o" value="<?php echo $payment->amt_rehireo ?>"  style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclabrehfee" value="<?php echo $payment->clab_reh_fee ?>" size=5 />
				</td>
				<td align="center">
					<input type="text" name="txtamtrehire_t" value="<?php echo $payment->amt_rehiret ?>"  style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center">
					<input type="text" name="txtamtrehire" value="<?php echo $payment->amt_rehire ?>"  style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqclabloc" value="<?php echo $payment->pmt_chq_local?>" size="20" /></td>
				<td align="center">CLAB ( Local Worker )</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtlocald" value="1" <?php if($payment->chk_local_dis == '1') echo "Checked"?> onclick="getlocaldis()" <?php echo $strlocdis ?> />&nbsp; DISBURSEMENT</td>
							<td><input type="checkbox" name="txtlocalr" value="1" <?php if($payment->chk_local_reim == '1') echo "Checked"?> onclick="getlocalreim()" <?php echo $strlocreim ?> />&nbsp; REIMBURSEMENT</td>
						</tr>
					</table>
				</td>
				<td align="center">
					<input type="text" name="txtamtlocal_o" value="<?php echo $payment->local_amounto ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclablwfee" value="<?php echo $payment->clab_lw_fee ?>" size=5 />
				</td>
				<td align="center" >
					<input type="text" name="txtamtlocal_t" value="<?php echo $payment->local_amountt ?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center">
					<input type="text" name="txtamtlocal" value="<?php echo $payment->local_amount ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqgreen" value="<?php echo $payment->pmt_chk_green?>" size="20" /></td>
				<td align="center" valign=top>Green Card</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtgreenw" value="1" <?php if($payment->chk_green_new == '1') echo "Checked"?> onclick="getgreen_card(1)" <?php echo $strgreenw ?> />&nbsp;NEW</td>
							<td><input type="checkbox" name="txtgreenr" value="1" <?php if($payment->chk_green_ren == '1') echo "Checked"?> onclick="getgreen_card(2)" <?php echo $strgreenr ?> />&nbsp;RENEW</td>
						</tr>
					</table>
				<td align="center" >
					<input type="text" name="txtamtgreen_o" value="<?php echo $payment->amt_greencardo ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclabgreenfee" value="<?php echo $payment->clab_green_fee ?>" size=5 />
				</td>
				<td align="center" >
					<input type="text" name="txtamtgreen_t" value="<?php echo $payment->amt_greencardt ?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center">
					<input type="text" name="txtamtgreen" value="<?php echo $payment->amt_greencard ?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqclabfee" value="<?php echo $payment->chqno_clabfee?>" size="20" /></td>
				<td align="center" valign=top>CLAB FEE</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtmember" value="1" <?php if($payment->chk_member == '1') echo "Checked"?> onclick="getval_cfee(1)" <?php echo $strmember ?> />&nbsp;Membership</td>
							<td><input type="checkbox" name="txtintro" value="1" <?php if($payment->chk_intro == '1') echo "Checked"?> onclick="getval_cfee(2)" <?php echo $strintro ?> />&nbsp;Introducer</td>
						</tr>
					</table>
				</td>
				<td align="center">
					<input type="text" name="txtamtclabfee_o" value="<?php echo $payment->amt_clabfeeo ?>"  onchange="get_introducer(this.value)" style='width:80px;text-align:center;'  />
					<input type="hidden" name="txtclabfee" value="<?php echo $payment->clab_fee?>" size=5 />
				</td>
				<td align="center">
					<input type="text" name="txtamtclabfee_t" value="<?php echo $payment->amt_clabfeet ?>"  style='width:80px;text-align:center;'  />
				</td>
				<td align="center">
					<input type="text" name="txtamtclabfee" value="<?php echo $payment->amt_clabfee ?>"  style='width:80px;text-align:center;' />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqjim" value="<?php echo $payment->pmt_chq_jim?>" size="20" /></td>
				<td align="center" valign=top>JIM</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtjimplks" value="1" <?php if($payment->chk_jim_plks == '1') echo "Checked"?> onclick="getjimval_plks()" <?php echo $strjimplks ?> />&nbsp;PLKS</td>
							<td><input type="checkbox" name="txtjimfees" value="1" <?php if($payment->chk_jim_fees == '1') echo "Checked"?> onclick="getjimval_fees()" <?php echo $strjimfees ?> />&nbsp;FEES</td>
						</tr>
						<tr>
							<td rowspan="4"><input type="checkbox" name="txtjimvisa" value="1" <?php if($payment->chk_jim_visa == '1') echo "Checked"?> onchange="getjimval_visa()" <?php echo $strjimvisa ?> />&nbsp;VISA</td>
							<td><input name="txtjimlevi" type="checkbox" id="txtjimlevi" value="1" <?php if($payment->chk_jim_levi == '1') echo "Checked"?> onclick="getjimval_levi(1)" <?php echo $strjimlevi ?> />
							  &nbsp;LEVY (Normal)</td>
						</tr>
					  <tr>
						  <td><input name="txtjimlevi2" type="checkbox" id="txtjimlevi2" value="1" <?php if($payment->chk_jim_levi2 == '1') echo "Checked"?> onclick="getjimval_levi(2)" <?php echo $strjimlevi2 ?> />
					    &nbsp;LEVY (3 Month) - G1G3</td>
					  </tr>
						<tr>
						  <td><input name="txtjimlevi3" type="checkbox" id="txtjimlevi3" value="1" <?php if($payment->chk_jim_levi3 == '1') echo "Checked"?> onclick="getjimval_levi(3)" <?php echo $strjimlevi3 ?> />
					      &nbsp;LEVY (6 Month) - G1G3</td>
					  </tr>
						<tr>
						  <td><input name="txtjimlevi4" type="checkbox" id="txtjimlevi4" value="1" <?php if($payment->chk_jim_levi4 == '1') echo "Checked"?> onclick="getjimval_levi(4)" <?php echo $strjimlevi4 ?> />
					      &nbsp;LEVY ( Year 11 &amp; Above)</td>
					  </tr>
						<tr>
							<td><input type="checkbox" name="txtjimsp" value="1" <?php if($payment->chk_jim_sp == '1') echo "Checked"?> onclick="getsp()" <?php echo $strjimsp ?> />&nbsp;SP</td>
							<td><input type="checkbox" name="txtjimcp" value="1"  <?php if($payment->chk_jim_cp == '1') echo "Checked"?> onclick="getcancelpermit()" <?php echo $strjimcp ?> />&nbsp;CP</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtjimcompund" value="1" <?php if($payment->chk_jim_compound == '1') echo "Checked"?> onclick="getcompound()" <?php echo $strjimcompound ?> />&nbsp;COMPOUND</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</table>
				</td>		
				<td align="center" valign=top>
					
				</td>
				<td align="center" valign=top>
					<input type="hidden" name="txtamtjim_plks" value="<?php echo $payment->jim_amount_plks?>" size="20" />
					<input type="hidden" name="txtamtjim_fees" value="<?php echo $payment->jim_amount_fees?>" size="20" />
					<input type="hidden" name="txtamtjim_visa" value="<?php echo $payment->jim_amount_visa?>" size="20" />
					<input type="hidden" name="txtamtjim_levi" value="<?php echo $payment->jim_amount_levi?>" size="20" />
					<input type="hidden" name="txtamtjim_sp" value="<?php echo $payment->jim_amount_sp?>" size="20" />
					<input type="hidden" name="txtamtjim_cp" value="<?php echo $payment->jim_amount_cp?>" size="20" />
					<input type="hidden" name="txtamtjim_compound" value="<?php echo $payment->jim_amount_compound?>" size="20" />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtjim" value="<?php echo $payment->jim_amount?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqfomema" value="<?php echo $payment->pmt_chq_fomema ?>"  size="20" /></td>
				<td align="center">FOMEMA</td>				
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtmale" value="1" <?php if($payment->chk_fomema_male == '1') echo "Checked"?> onclick="getfomema(1)" <?php echo $strfomemaM ?> />&nbsp;MEDICAL</td>
							<td><input type="checkbox" name="txtfemale" value="1" <?php if($payment->chk_fomema_female == '1') echo "Checked"?> onclick="getfomema(2)" <?php echo $strfomemaF ?> />&nbsp;ONLINE FEES</td>
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtfomema_o" value="<?php echo $payment->fomema_amounto?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtfomema_t" value="<?php echo $payment->fomema_amountt?>" style='width:80px;text-align:center;' readonly />
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtfomema" value="<?php echo $payment->fomema_amount?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqins" value="<?php echo $payment->ins_chq_no?>"  size="20" /></td>
				<td align="center" valign=top>INSURANCE</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtig" value="1" <?php if($payment->chk_ins_ig == '1') echo "Checked"?> onclick="getins_ig()"<?php echo $strinsig ?>/>&nbsp;IG</td>
							<td><input type="checkbox" name="txtFWCS" value="1" <?php if($payment->chk_ins_fwcs == '1') echo "Checked"?> onclick="getins_fwcs()" <?php echo $strinsfwcs ?>/>&nbsp;FWCS</td>
						</tr>
						<tr>
							<td><input type="checkbox" name="txtFWHS" value="1" <?php if($payment->chk_ins_fwhs == '1') echo "Checked"?> onclick="getins_fwhs()" <?php echo $strinsfwhs ?>/>&nbsp;FWHS</td>
							<td></td>
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtins_o" value="<?php echo $payment->ins_amounto?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtamtins_ig" value="<?php echo $payment->ins_amount_ig?>" style='width:80px;text-align:center;' />
					<input type="hidden" name="txtamtins_fwcs" value="<?php echo $payment->ins_amount_fwcs?>" style='width:80px;text-align:center;' />
					<input type="hidden" name="txtamtins_fwhs" value="<?php echo $payment->ins_amount_fwhs?>" style='width:80px;text-align:center;' />	
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtins_t" value="<?php echo $payment->ins_amountt?>" style='width:80px;text-align:center;' readonly />				   			
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtins" value="<?php echo $payment->ins_amount?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center"><input type="text" name="txtchqagency" value="<?php echo $payment->agency_chq_no?>" size="20" /></td>
				<td align="center">TRANSIT CENTRE</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtagencyfees" <?php if($payment->chk_agency_fees == '1') echo "Checked"?> onclick="gettransit()" <?php echo $stragfees ?>/>&nbsp;FEES</td>
							<td><input type="checkbox" name="txtagencyfeesgc" value="1" <?php if($payment->chk_agency_feesgc == '1') echo "Checked"?> onclick="getclabval_greencard()" <?php echo $stragfeesgc ?> />&nbsp;GREEN CARD</td>
						</tr>
					</table>
				<td align="center" >
					<input type="text" name="txtamtagency_o" value="<?php echo $payment->agency_amounto ?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtclabtransfee" value="<?php echo $payment->clab_trans_fee ?>" size=5 />
					<input type="hidden" name="txtclabtransgcfee" value="<?php echo $payment->clab_transgc_fee ?>" size=5 />
				</td>
				<td align="center" >
					<input type="text" name="txtamtagency_t" value="<?php echo $payment->agency_amountt?>" style='width:80px;text-align:center;' readonly />
				   <input type="hidden" name="txttc_fees" value="<?php echo $payment->transit_fees?>" size="20" />
				   <input type="hidden" name="txttc_cost" value="<?php echo $payment->transit_cost?>" size="20" />
				</td>
				<td align="center" >
					<input type="text" name="txtamtagency" value="<?php echo $payment->agency_amount?>" style='width:80px;text-align:center;'  />
				</td>
			</tr>
			<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqothro" value="<?php echo $payment->others_chq_noo?>" size="20" /></td>
				<td align="center" valign=top>OTHERS ( SST )</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%><input type="checkbox" name="txtothersfees" value="1" <?php if($payment->chk_others_fees == '1') echo "Checked"?> <?php echo $strothfee ?> />&nbsp;FEES </td>					
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td>&nbsp;</td>							
						</tr>
						<tr>
							<td colspan=2><textarea cols="30" rows="5" name="txtothremarkso"><?php echo $payment->remarks_otherso?></textarea></td>
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtothr_o" value="<?php echo $payment->others_amount_o?>" onchange="get_others(this.value)" style='width:80px;text-align:center;' />
				</td>
			  <td align="center" valign=top>
					<input type="text" name="txtamtothr_t" value="<?php echo $payment->others_amount_t?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtothfees" value="0" size="20" />
					<input type="hidden" name="txtdepfees" value="0" size="20" />
					</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtothr" value="<?php echo $payment->others_amount?>" style='width:80px;text-align:center;' />
				</td>
			</tr>

	<tr>
				<td height="30" align="center" valign=top><input type="text" name="txtchqothr3rd" value="<?php echo $payment->others_chq_no3rd?>" size="20" /></td>
				<td align="center" valign=top>OTHERS ( NO SST )</td>
				<td>
					<table width="100%" border="0" style="border-collapse: collapse;" cellpadding=2>
						<tr>
							<td width=50%>&nbsp;</td>					
							<td><input type="checkbox" name="txtothersfees2" onclick="getmship()" value="1" <?php if($payment->chk_others_fees2 == '1') echo "Checked"?> <?php echo $strothfee2 ?> />&nbsp;3rd Party Charges</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td><input type="checkbox" name="txtDeposit" value="1" <?php if($payment->chk_dep_fee == '1') echo "Checked"?> onclick="get_deposit()"<?php echo $strinsig ?>/>
&nbsp;GUARANTEE DEPOSIT</td>							
						</tr>
						<tr>
							<td colspan=2><textarea cols="30" rows="5" name="txtothremarks3rd"><?php echo $payment->remarks_others3rd?></textarea></td>
						</tr>
					</table>
				</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtothr_3rd" value="<?php echo $payment->others_amount_3rd?>" onchange="get_others3rd" style='width:80px;text-align:center;' />
				</td>
			  <td align="center" valign=top>
					<input type="text" name="txtamtothr_t" value="<?php echo $payment->others_amount_t?>" style='width:80px;text-align:center;' readonly />
					<input type="hidden" name="txtothfees" value="0" size="20" />
					<input type="hidden" name="txtdepfees" value="0" size="20" />
					</td>
				<td align="center" valign=top>
					<input type="text" name="txtamtothr" value="<?php echo $payment->others_amount?>" style='width:80px;text-align:center;' />
				</td>
			</tr>
	</table>	
	</td>
</tr>
<input type="hidden" name="txtvisa" value="<?php echo $payment->visa_ref ?>" />
<input type="hidden" name="txtfine" value="<?php echo $payment->fine_ref ?>"/>
<input type="hidden" name="txttransfees" value="<?php echo $payment->trans_cost_ref ?>"/>
<input type="hidden" name="txttranscost" value="<?php echo $payment->trans_fees_ref ?>"/>
<input type="hidden" name="id" value="<?php echo $payment->clab_no ?>"/>
</td></tr>
<tr>
   <td colspan="6" align="center"><input type="hidden" name="txtmodifieddate" value="<?php echo date("d-M-Y") ?>" size="20" />
   <input type="submit" value="Update" <?php if($payment->pmt_withdraw == '1') echo "DISABLED";?><?php if(strpos($accessibility, 'u') == false) echo "DISABLED";  ?>/>
   <!--input type="button" value="Print Receipt" onclick="printForm()"  /-->
     <!--input type="button" value="Print Invoice" onclick="printForm2()" /-->
     <input type="button" value="Print Receipt A4" onclick="printForm1()"  />
     <input type="button" value="Print Invoice A4 " onclick="printForm3()" />
	 <input type="button" value="Print Receipt/Tax Invoice" onclick="printForm4()" />
	 <input type="button" value="Print Payment Advice" onclick="printpaymentadvice()" /></td>
</tr>
</table>
</form>
</body>
</html>
