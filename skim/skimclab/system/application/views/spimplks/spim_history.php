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
					this.disabled=true;
			        break;
		        case "visible":
			        scwHide();
	        }
        }
    </script>	
<script type="text/javascript">

    function checkreplacement(rep){
	
	if(document.updateWorkorderForm.chkisreplace.checked == true){
	   
	   document.updateWorkorderForm.dtsignedpay.value = "";
	   document.updateWorkorderForm.dtsupagree.value = "";
	   document.updateWorkorderForm.dtempletter.value = "";
	   document.updateWorkorderForm.dtcompletedoc.value = "";
	   document.updateWorkorderForm.dtaccopic.value = "";
	   document.updateWorkorderForm.dtawardletter.value = "";
	   document.updateWorkorderForm.dtreqform.value = "";
	   document.updateWorkorderForm.chksignedpay.checked = false;
	   document.updateWorkorderForm.chksupagree.checked = false;
	   document.updateWorkorderForm.chkempletter.checked = false;
	   document.updateWorkorderForm.chkaccopic.checked = false;
	   document.updateWorkorderForm.chkawardletter.checked = false;
	   document.updateWorkorderForm.chkreqform.checked = false;
	   document.updateWorkorderForm.chksupagree.disabled = true;
	   document.updateWorkorderForm.chkempletter.disabled = true;
	   document.updateWorkorderForm.chkaccopic.disabled = true;
	   document.updateWorkorderForm.chkawardletter.disabled = true;
	   document.updateWorkorderForm.chkreqform.disabled = true;
	   document.updateWorkorderForm.btnselall.disabled = true;
	   
	}else{
	   
	   document.updateWorkorderForm.dtsignedpay.value = "";
	   document.updateWorkorderForm.dtsupagree.value = "";
	   document.updateWorkorderForm.dtempletter.value = "";
	   document.updateWorkorderForm.dtcompletedoc.value = "";
	   document.updateWorkorderForm.dtaccopic.value = "";
	   document.updateWorkorderForm.dtawardletter.value = "";
	   document.updateWorkorderForm.dtreqform.value = "";
	   document.updateWorkorderForm.chksignedpay.checked = false;
	   document.updateWorkorderForm.chksupagree.checked = false;
	   document.updateWorkorderForm.chkempletter.checked = false;
	   document.updateWorkorderForm.chkaccopic.checked = false;
	   document.updateWorkorderForm.chkawardletter.checked = false;
	   document.updateWorkorderForm.chkreqform.checked = false;
	   document.updateWorkorderForm.chksupagree.disabled = false;
	   document.updateWorkorderForm.chkempletter.disabled = false;
	   document.updateWorkorderForm.chkaccopic.disabled = false;
	   document.updateWorkorderForm.chkawardletter.disabled = false;
	   document.updateWorkorderForm.chkreqform.disabled = false;
	   document.updateWorkorderForm.btnselall.disabled = false;
	
	}
	
	}

	function checktrigger(chkbox, txtbox, datebox){
		if(chkbox.checked == true){
			//get date
			today = new Date()
			tdate = today.getDate()
			tmonth = today.getMonth() + 1
			tyear = today.getFullYear()
			
			txtbox.value=document.updateWorkorderForm.currentuser.value
			datebox.value=tdate + "-" + tmonth + "-" + tyear
		}
		else {
			txtbox.value=""
			datebox.value=""
		}
	}
	
	function Inspchs(){
	 
	 var workorderid = document.updateWorkorderForm.workorderno.value
	 var url = "<?php echo site_url('contSpim/email_item');?>/" + workorderid 
	 window.open(url, 'Insurance Purchase', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')  
	}
	
	function handover(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpim/handoverletter');?>/" + wono + "/" + workorderid
	   window.open(url,'handover letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function pengesahan(wono){
       var workorderid = document.updateWorkorderForm.workorderno.value
	   var wono = document.updateWorkorderForm.txtwoid.value
	   var url = "<?php echo site_url('contSpim/confirmletter');?>/" + wono + "/" + workorderid
	   window.open(url,'confirm letter','height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openuploadwindow(){
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/uploadDocView');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Upload FCL list', 'height=350, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	function newphtracklog(){
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var url = "<?php echo site_url('contSpim/newPhoneTrackLog');?>/" + workorderid + "/" + companyname
		
		window.open(url, 'Workorder Reject History', 'height=400, width=480, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes')
	}
	
	/*function registerNewLabor(){
		var avlabrefno = document.updateWorkorderForm.workorderno.value
		window.open('<?php echo site_url();?>/contavailable/regisNewLabourPt1/' + avlabrefno, 'Register new labour', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}*/
	function registerNewLabor(){
		var workorderid = document.updateWorkorderForm.txtwoid.value;
		var companyname = document.updateWorkorderForm.txtclabno.value;
	
		var url = "<?php echo site_url('contSpim/regnewlabour');?>/" + workorderid + "/" + companyname
		window.open(url, 'Register new FCL', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
		function registerNewLegal(){
		//var wono = document.updateWorkorderForm.workorderno.value
		var workorderid = document.updateWorkorderForm.workorderno.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		var currentuser = document.updateWorkorderForm.currentuser.value;
		var wono = document.updateWorkorderForm.txtwoid.value;
		
		var url = "<?php echo site_url('contSpim/regnewlegal');?>/" + workorderid + "/" + companyname + "/" + currentuser + "/" + wono
		window.open(url, 'Register new legal', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	
	
	function EditFCL(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/EditFCL');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit FCL', 'height=500, width=650, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
		
	}
	
	function EditLegal(id){
		
		var id = id;
		var workorderid = document.updateWorkorderForm.txtwoid.value
		var companyname = document.updateWorkorderForm.txtclabno.value
		
		var url = "<?php echo site_url('contSpim/EditLegal');?>/" + workorderid + "/" + companyname + "/" + id
		window.open(url, 'Edit Legal', 'height=500, width=600, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
    function openBatch(clabid){
		var clabid = clabid;
		var clabno = document.updateWorkorderForm.txtclabno.value
		var companyname = document.updateWorkorderForm.txtcompname.value
		
		var url = "<?php echo site_url('contSpim/batchlistwo');?>/" + clabno + "/" + companyname
		window.open(url, 'Batch Application List', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	
	}
	
	function OpenLampiran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/lampiran_a');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
		function OpenLampiranExcel(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/lampiran_a_excel');?>/" + wono
		window.open(url, 'Lampiran A', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
		
	}
	
	function OpenSecondSchedule(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/second_schedule');?>/" + wono
		window.open(url, '2nd Schedule', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenIM12(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/im12');?>/" + wono
		window.open(url, 'IM12', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenAddendum(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/addendum');?>/" + wono
		window.open(url, 'Addendum', 'height=500, width=800, toolbar=yes, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function OpenBorangBayaran(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/borangbayaran');?>/" + wono
		window.open(url, 'Borang Bayaran', 'height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openack(wono){
		var wono = wono;
		var url = "<?php echo site_url('contSpim/acknowledge');?>/" + wono
		window.open(url,'Acknowledgement','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function openprintform(fclid){
	   var url = "<?php echo site_url('contSpim/openprintform');?>/" + fclid
	   window.open(url,'Print Form','height=500, width=800, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes');
	}
	
	function selectall(){
	    
	     document.updateWorkorderForm.chkreqform.checked = true;
		 document.updateWorkorderForm.chkawardletter.checked = true;
		 document.updateWorkorderForm.chkaccopic.checked = true;
		 document.updateWorkorderForm.chkempletter.checked = true;
		 document.updateWorkorderForm.chksupagree.checked = true;
		 document.updateWorkorderForm.chksignedpay.checked = true;
		 document.updateWorkorderForm.dtreqform.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtawardletter.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtaccopic.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtcompletedoc.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtempletter.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtsupagree.value = '<?php echo date('d-m-Y')?>';
		 document.updateWorkorderForm.dtsignedpay.value = '<?php echo date('d-m-Y')?>';
	
		 
	}
	
   function paymentlist(clabno){
	  var frm = "update";
	  var url = "<?php echo site_url('contSpim/openreceipt');?>/" + frm + "/" + clabno;
window.open(url, 'Payment list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
	
	}
</script>  
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
  <br />
  <table width="100%" border="0">
  	<tr>
  		<th colspan="6" align="LEFT">TRACKING LOG</th>
  		<th colspan="1" align="RIGHT">&nbsp;</th>
  	</tr>
  	<tr>
  	    <th>No.</th>
  		<th>Date & Time</th>
  		<th>Attend By</th>
  		<th>Remarks</th>
  		<th>Action</th>
  		<th>Action By</th>
  		<th>Completion Date</th>
  	</tr>
  	<?php if($allPhTrackLog->num_rows() == 0){
	    ?>
	<tr>
		<td colspan="7"><strong><font color="red">No phone tracking log.</font></strong></td>
	</tr>
	<?php }
	else{
		$i = 1;
		foreach($allPhTrackLog->result() as $log){
	?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d-m-Y g:i a', strtotime($log->track_datetime));?></td>
		<td><?php echo $log->track_attendby;?></td>
		<td><?php echo $log->track_remarks;?></td>
		<td><?php echo $log->track_action;?></td>
		<td><?php echo $log->track_actionby;?></td>
		<td><?php if($log->track_compdate!= "0000-00-00") echo date('d-m-Y', strtotime($log->track_compdate));?></td>
	</tr>
	<?php }
	}
	?>
  </table>
<!--javascript for form validation-->
    <script>
	// form fields description structure
	var a_fields = {
		'txtfcltotal': {
			'l': 'No. of FCL',  // label
			'r': true,    // required
			't': 't_fcl'// id of the element to highlight if input not validated
		},
		'payrefno':{'l':'Official Receipt No','r':true,'t':'t_payref'}
	},

	o_config = {
		'to_disable' : ['Submit', 'Reset'],
		'alert' : 1
	}

	// validator constructor call
	var v = new validator('updateWorkorderForm', a_fields, o_config);

	</script>
    <!--END OF FORM VALIDATION JAVASCRIPT-->

</body>
</html>
