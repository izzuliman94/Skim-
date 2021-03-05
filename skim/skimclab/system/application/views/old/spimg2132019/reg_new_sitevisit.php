<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<link href="<?php echo base_url();?>/css/sippsstyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>js/scwdatepicker/scw.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url();?>js/scwdatepicker/scw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/js/switchcontent.js" ></script>
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
		
		function validate(){
			
			/*if(document.forms[0].txtpassno.value == "")      { alert("Please Insert Passport No !"); return false;}
			if(document.forms[0].txtname.value == "")        { alert("Please Insert Labour Name !"); return false;}
			if(document.forms[0].txtdob.value == "")         { alert("Please Insert Date Of Birth !"); return false;}
			if(document.forms[0].txtpof.value == "")         { alert("Please Insert Place Of Birth !"); return false;}
			if(document.forms[0].selnationality.value == "") { alert("Please Select Nationality !"); return false;}
			if(document.forms[0].selgender.value == "") { alert("Please Select Gender !"); return false;}
		    if(document.forms[0].txtpassissue.value == "") { alert("Please Insert Passport Issue !"); return false;}
			if(document.forms[0].txtpassexp.value == "") { alert("Please Insert Passport Expired !"); return false;}
			if(document.forms[0].txtsalary.value == "") { alert("Please Insert Salary !"); return false;}
			if(document.forms[0].txtworktrade.value == "") { alert("Please Select Worktrade !"); return false;}
			*/
		}
		
		function getcountry(){
		     var frm = "new";
		     var url = "<?php echo site_url('contSpim/getcountry');?>/" + frm
			window.open(url, 'Country list', 'height=350,width=700, toolbar=no, directories=no, status=no, location=no, menubar=no, scrollbars=yes') 
		}
		
			function addtotrade(){
		
		if(document.getElementById("selwt").value != '0'){
				
			var existingtrade = document.AddNewSiteVisit.txtworktrade.value;
			var newtradevalue = "";
				
			if(existingtrade.length ==0)
				newtradevalue = document.AddNewSiteVisit.selwt.value;
			else 
				newtradevalue = existingtrade + ',' + document.AddNewSiteVisit.selwt.value;				
				
				document.AddNewSiteVisit.txtworktrade.value = newtradevalue;
		}
	}
	
	function cleartrade(){
		document.AddNewSiteVisit.txtworktrade.value = "";
	}
		
</script>

</head>
<body>
<h4><a href="dashboard.php">SPIM (G1G3)</a>&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Update Workorder&nbsp;<img src="<?php echo base_url();?>/images/right_arrow.gif" width="13" height="14" />&nbsp;Register Site Visit</h4>


<?php if(isset($successMsg)) echo "<font color=\"red\"><strong> $successMsg</strong></font>";?>
<form action="<?php echo site_url();?>/contSpimG/AddNewSiteVisit" method="POST" name="AddNewSiteVisit" id="AddNewSiteVisit" onsubmit="return validate();">
<input type="hidden" name="txtwoid" value="<?php echo $workorderid; ?>"  />

<p><strong>Laporan Lawatan Tapak</strong></p>

<table width="100%" border="0" cellpadding=3 style='border-style:none'>
	<tr><td colspan=2>A. BUTIRAN MAJIKAN</td></tr>
	<tr>
		<td>CLAB ID</td>
		<td><input type="text" name="txtclabno" value="<?php echo $clabno; ?>" style='width:100px;' readonly /></td>
	</tr>
	<tr>
		<td>Nama Syarikat</td>
		<td><input type="text" name="txtcompname" value="<?php echo $contractor->ctr_comp_name ?>" style='width:590px;' readonly /></td>
	</tr>
	<tr>
		<td>Alamat Pejabat</td>
		<td><textarea name="txtalapej" style='width:590px;height:40;text-align:left' readonly ><?php echo $contractor->addr; ?></textarea></td>
	</tr>
	<tr>
		<td>Alamat Tapak Bina</td>
		<td><textarea name="txtalatap" value="" style='width:590px;height:40;text-align:left'></textarea></td>
	</tr>
</table>

<table width="100%" border="0" cellpadding=3 style='border-style:none'>
	<tr><td colspan=5>B. SENARAI SEMAK</td></tr>
	<tr><td></td><td colspan=4>1. <u>Jumlah pekerja yang ditempatkan</u></td></tr>
	<tr>
		<td width=10></td>
		<td width=30>No.</td>
		<td width=300>Warganegara</td>
		<td width=60>Bilangan</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Indonesia</td>
		<td><input type="text" name="txtwarga1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Myanmar</td>
		<td><input type="text" name="txtwarga2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>3.</td>
		<td>Bangladesh</td>
		<td><input type="text" name="txtwarga3" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>4.</td>
		<td>Pakistan</td>
		<td><input type="text" name="txtwarga4" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>5.</td>
		<td>Nepal</td>
		<td><input type="text" name="txtwarga5" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>6.</td>
		<td>Lain-lain (sila nyatakan) <input type="text" name="txtwargalain" value="" style='width:140px;text-align:left' /></td>
		<td><input type="text" name="txtwarga6" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>2. <u>Kemudahan tempat tinggal yang disediakan (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td>Jenis tempat tinggal</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Rumah Sewa</td>
		<td><input type="text" name="txtrumah1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Hostel</td>
		<td><input type="text" name="txtrumah2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>3.</td>
		<td>Rumah Kongsi</td>
		<td><input type="text" name="txtrumah3" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>4.</td>
		<td>Lain-lain (sila nyatakan) <input type="text" name="txtrumahlain" value="" style='width:140px;text-align:left' /></td>
		<td><input type="text" name="txtrumah4" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>3. <u>Bilik yang disediakan (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td>Jenis Bilik</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>1-2 orang sebilik</td>
		<td><input type="text" name="txtbilik1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>3-6 orang sebilik</td>
		<td><input type="text" name="txtbilik2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>3.</td>
		<td>7-10 orang sebilik</td>
		<td><input type="text" name="txtbilik3" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>4.</td>
		<td>Lain-lain (sila nyatakan) <input type="text" name="txtbiliklain" value="" style='width:140px;text-align:left' /></td>
		<td><input type="text" name="txtbilik4" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>4. <u>Kemudahan tempat makan dan tempat memasak (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Disediakan</td>
		<td><input type="text" name="txtmakan1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Tidak disediakan</td>
		<td><input type="text" name="txtmakan2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>5. <u>Kemudahan Kafetaria (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Disediakan</td>
		<td><input type="text" name="txtkafe1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Tidak disediakan</td>
		<td><input type="text" name="txtkafe2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>6. <u>Kemudahan tandas yang disediakan (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Tandas berserta dengan tempat mandi</td>
		<td><input type="text" name="txtmandi1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Tandas dan tempat mandi berasingan</td>
		<td><input type="text" name="txtmandi2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>7. <u>Kemudahan peralatan keselamatan yang disediakan (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td>Jenis peralatan keselamatan</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Kasut keselamatan</td>
		<td><input type="text" name="txtselamat1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Topi keledar keselamatan</td>
		<td><input type="text" name="txtselamat2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>3.</td>
		<td>Sarung tangan kerja</td>
		<td><input type="text" name="txtselamat3" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>4.</td>
		<td>Kacamata keselamatan</td>
		<td><input type="text" name="txtselamat4" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>5.</td>
		<td>Lain-lain (sila nyatakan) <input type="text" name="txtselamatlain" value="" style='width:140px;text-align:left' /></td>
		<td><input type="text" name="txtselamat5" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td>
		<td colspan=2>8. <u>Gaji pekerja asing binaan sehari</u></td>
		<td><input type="text" name="txtgaji" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>9. <u>Kerja lebihmasa (Sila tandakan X)</u></td></tr>
	<tr>
		<td></td>
		<td>No.</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>1.</td>
		<td>Disediakan</td>
		<td><input type="text" name="txtlebih1" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td>2.</td>
		<td>Tidak disediakan</td>
		<td><input type="text" name="txtlebih2" value="" style='width:50px;text-align:center' /></td>
		<td></td>
	</tr>
	<tr><td></td><td colspan=4>10. <u>Ulasan oleh majikan</u></td><tr>
	<tr><td></td><td colspan=4><textarea name="txtulasmaj" style='width:690px;height:40;text-align:left'></textarea></td></tr>
	<tr><td></td><td colspan=4>11. <u>Ulasan oleh pekerja binaan asing</u></td><tr>
	<tr><td></td><td colspan=4><textarea name="txtulaspek" style='width:690px;height:40;text-align:left'></textarea></td></tr>
	<tr><td></td><td colspan=4>12. <u>Ulasan oleh pegawai Naziran</u></td><tr>
	<tr><td></td><td colspan=4><textarea name="txtulasnaz" style='width:690px;height:40;text-align:left'></textarea></td></tr>
</table>
<table width="100%" border="0" cellpadding=5 style='border-style:none'>
	<tr>
		<td align="center">
		<input type="submit" name=" Save " value=" Save " onclick="return confirm('Are you sure you want to save?');"/>
		<input type="button" name="btnClose" value=" Close " onclick="closeAndRefresh();" />    </td>
	</tr>
</table>
<table width="100%" border="0">
	<tr><td>&nbsp;</td></tr>
</table>
</form>

</body>