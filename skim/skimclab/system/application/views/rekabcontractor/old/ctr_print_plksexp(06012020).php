<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <title>SKIM - CLAB Registration Approval Letter</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
.style1 {
	font-size: 13px;
	font-weight: bold;
}

</style>
</head>
<body>
<?php 
function getYears( $p_strDate ) {
	list($Y,$m,$d) = explode("-",$p_strDate);
	return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
?>
<table style="text-align: left; width: 616px;" align="center" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="4" rowspan="1">&nbsp;</td>
    </tr>
    <tr>
      <td width="42%">&nbsp;</td>
      <td width="22%">&nbsp;</td>
      <td width="18%">&nbsp;</td>
      <td colspan="1" rowspan="10" valign="top" width="18%"><img src="<?php echo base_url();?>images/logoLetter.jpg"><br />
      <span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><br />
		CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD (634396-W) <br>
        <span style="text-align: justify">Level 2, Annexe Block,Menara Milenium 8, Jalan Damanlela, Bukit Damansara, 50490 Kuala Lumpur. </span><br>
Tel: 03-2095 9599 <br>
Fax: 03-2095 9566 <br>
E-mail: info@clab.com.my <br>
Website: www.clab.com.my </span></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br /><br />Ref: CLAB/CED/<?php echo date('y');?>/<?php echo substr($ctr->ctr_clab_no, -6);?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" rowspan="1"><br />Date: <?php echo date('j F Y');?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><br /><b><?php echo $ctr->ctr_comp_name;?> (<?php echo $ctr->ctr_comp_regno;?>)</b></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_addr1;?>&nbsp;<?php echo $ctr->ctr_addr2;?>
    	  <br />
		  <?php echo $ctr->ctr_addr3;?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><?php echo $ctr->ctr_pcode;?>&nbsp;<?php echo $ctr->state_name;?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><br />
      	Tel:<?php echo $ctr->ctr_telno;?> <br />
      	Fax:<?php echo $ctr->ctr_fax;?> </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
     <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold;" colspan="2" rowspan="1">(Attn:<?php echo $ctr->ctr_contact_name;?>)</td>
      <td style="text-align: right;" colspan="2" rowspan="1"><strong><?php echo $reminderType;?></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Dear Sir/Madam,</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><h3><u><?PHP echo $titleWord;?> EXPIRY DATE</u></h3></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><p align="justify">We wish to draw to your attention that the contract of the following Foreign Construction Labours (FCL's) will expire on the stipulated date.</p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
      	<table width="100%" border="1" align="left" cellpadding="1" cellspacing="0" style="border-collapse: collapse" bordercolor="#ccc">
      	<tr>
      		<th class="print" align="center">No.</th>
      		<th class="print" align="left">Name</th>
      		<th class="print" align="center">Passport No</th>
      		<th class="print" align="CENTER"><?php echo $fieldTitle;?></th>
      		<th class="print" align="CENTER"><?php echo $secondaryFieldTitle;?></th>
      		<th class="print" align="CENTER">Years in Malaysia</th>
      	    <th class="print" align="CENTER">Country</th>
      	</tr>
      	<?php 
		$i=1;
		$fcl_bd=0;$fcl_cb=0;$fcl_in=0;$fcl_id=0;$fcl_kz=0;$fcl_kg=0;$fcl_la=0;
		$fcl_bm=0;$fcl_np=0;$fcl_pk=0;$fcl_rp=0;$fcl_th=0;$fcl_uz=0;$fcl_vm=0;$fcl_sl=0;
		
		$plks_bd=0;$fees_bd=0;$visa_bd=0;$levi_bd=0;
		$plks_cb=0;$fees_cb=0;$visa_cb=0;$levi_cb=0;
		$plks_in=0;$fees_in=0;$visa_in=0;$levi_in=0;
		$plks_id=0;$fees_id=0;$visa_id=0;$levi_id=0;
		$plks_kz=0;$fees_kz=0;$visa_kz=0;$levi_kz=0;
		$plks_kg=0;$fees_kg=0;$visa_kg=0;$levi_kg=0;
		$plks_la=0;$fees_la=0;$visa_la=0;$levi_la=0;
		$plks_bm=0;$fees_bm=0;$visa_bm=0;$levi_bm=0;
		$plks_np=0;$fees_np=0;$visa_np=0;$levi_np=0;
		$plks_pk=0;$fees_pk=0;$visa_pk=0;$levi_pk=0;
		$plks_rp=0;$fees_rp=0;$visa_rp=0;$levi_rp=0;
		$plks_th=0;$fees_th=0;$visa_th=0;$levi_th=0;
		$plks_uz=0;$fees_uz=0;$visa_uz=0;$levi_uz=0;
		$plks_vm=0;$fees_vm=0;$visa_vm=0;$levi_vm=0;
		$plks_sl=0;$fees_sl=0;$visa_sl=0;$levi_sl=0;
		//$country = array("BD", "CB", "IN", "ID", "KZ", "KG", "LA", "BM", "NP", "PK", "RP", "TH", "UZ", "VM", "SL");
		//$tctry=count($country);
		foreach($expiredWorkersRecord->result() as $wkr){	
			$ctr=$wkr->wkr_country;
			/*$a='$plks_"'.$ctr.'"';
			$b='$fees_"'.$ctr.'"';
			$c='$visa_"'.$ctr.'"';
			$d='$levi_"'.$ctr.'"';*/
			if($ctr=='ID'){	
				$fcl_id++;
				$fine_id=$wkr->cty_fine;
				$plks_id=$plks_id + $wkr->cty_plks;	
				$fees_id=$fees_id + $wkr->cty_fees;
				$visa_id=$visa_id + $wkr->cty_visa;
				$levi_id=$levi_id + $wkr->cty_levi;
			}elseif($ctr=='NP'){
				$fcl_np++;
				$fine_np=$wkr->cty_fine;
				$plks_np=$plks_np + $wkr->cty_plks;	
				$fees_np=$fees_np + $wkr->cty_fees;
				$visa_np=$visa_np + $wkr->cty_visa;
				$levi_np=$levi_np + $wkr->cty_levi;			
			}elseif($ctr=='BM'){
				$fcl_bm++;
				$fine_bm=$wkr->cty_fine;
				$plks_bm=$plks_bm + $wkr->cty_plks;	
				$fees_bm=$fees_bm + $wkr->cty_fees;
				$visa_bm=$visa_bm + $wkr->cty_visa;
				$levi_bm=$levi_bm + $wkr->cty_levi;	
			}elseif($ctr=='BD'){
				$fcl_bd++;
				$fine_bd=$wkr->cty_fine;
				$plks_bd=$plks_bd + $wkr->cty_plks;	
				$fees_bd=$fees_bd + $wkr->cty_fees;
				$visa_bd=$visa_bd + $wkr->cty_visa;
				$levi_bd=$levi_bd + $wkr->cty_levi;	
			}elseif($ctr=='VM'){
				$fcl_vm++;
				$fine_vm=$wkr->cty_fine;
				$plks_vm=$plks_vm + $wkr->cty_plks;	
				$fees_vm=$fees_vm + $wkr->cty_fees;
				$visa_vm=$visa_vm + $wkr->cty_visa;
				$levi_vm=$levi_vm + $wkr->cty_levi;	
			}elseif($ctr=='IN'){
				$fcl_in++;
				$fine_in=$wkr->cty_fine;
				$plks_in=$plks_in + $wkr->cty_plks;	
				$fees_in=$fees_in + $wkr->cty_fees;
				$visa_in=$visa_in + $wkr->cty_visa;
				$levi_in=$levi_in + $wkr->cty_levi;	
			}elseif($ctr=='CB'){
				$fcl_cb++;
				$fine_cb=$wkr->cty_fine;
				$plks_cb=$plks_cb + $wkr->cty_plks;	
				$fees_cb=$fees_cb + $wkr->cty_fees;
				$visa_cb=$visa_cb + $wkr->cty_visa;
				$levi_cb=$levi_cb + $wkr->cty_levi;	
			}elseif($ctr=='KZ'){
				$fcl_kz++;
				$fine_kz=$wkr->cty_fine;
				$plks_kz=$plks_kz + $wkr->cty_plks;	
				$fees_kz=$fees_kz + $wkr->cty_fees;
				$visa_kz=$visa_kz + $wkr->cty_visa;
				$levi_kz=$levi_kz + $wkr->cty_levi;	
			}elseif($ctr=='KG'){
				$fcl_kg++;
				$fine_kg=$wkr->cty_fine;
				$plks_kg=$plks_kg + $wkr->cty_plks;	
				$fees_kg=$fees_kg + $wkr->cty_fees;
				$visa_kg=$visa_kg + $wkr->cty_visa;
				$levi_kg=$levi_kg + $wkr->cty_levi;	
			}elseif($ctr=='LA'){
				$fcl_la++;
				$fine_la=$wkr->cty_fine;
				$plks_la=$plks_la + $wkr->cty_plks;	
				$fees_la=$fees_la + $wkr->cty_fees;
				$visa_la=$visa_la + $wkr->cty_visa;
				$levi_la=$levi_la + $wkr->cty_levi;	
			}elseif($ctr=='PK'){
				$fcl_pk++;
				$fine_pk=$wkr->cty_fine;
				$plks_pk=$plks_pk + $wkr->cty_plks;	
				$fees_pk=$fees_pk + $wkr->cty_fees;
				$visa_pk=$visa_pk + $wkr->cty_visa;
				$levi_pk=$levi_pk + $wkr->cty_levi;	
			}elseif($ctr=='RP'){
				$fcl_rp++;
				$fine_rp=$wkr->cty_fine;
				$plks_rp=$plks_rp + $wkr->cty_plks;	
				$fees_rp=$fees_rp + $wkr->cty_fees;
				$visa_rp=$visa_rp + $wkr->cty_visa;
				$levi_rp=$levi_rp + $wkr->cty_levi;	
			}elseif($ctr=='TH'){
				$fcl_th++;
				$fine_th=$wkr->cty_fine;
				$plks_th=$plks_th + $wkr->cty_plks;	
				$fees_th=$fees_th + $wkr->cty_fees;
				$visa_th=$visa_th + $wkr->cty_visa;
				$levi_th=$levi_th + $wkr->cty_levi;	
			}elseif($ctr=='UZ'){
				$fcl_uz++;
				$fine_uz=$wkr->cty_fine;
				$plks_uz=$plks_uz + $wkr->cty_plks;	
				$fees_uz=$fees_uz + $wkr->cty_fees;
				$visa_uz=$visa_uz + $wkr->cty_visa;
				$levi_uz=$levi_uz + $wkr->cty_levi;	
			}elseif($ctr=='SL'){
				$fcl_sl++;
				$fine_sl=$wkr->cty_fine;
				$plks_sl=$plks_sl + $wkr->cty_plks;	
				$fees_sl=$fees_sl + $wkr->cty_fees;
				$visa_sl=$visa_sl + $wkr->cty_visa;
				$levi_sl=$levi_sl + $wkr->cty_levi;	
			}
	    ?>
	    <tr>
	    	<td class="print" align="center"><?php echo $i++;?>.</td>
	    	<td class="print" valign="top"><?php echo $wkr->wkr_name;?></td>
	    	<td class="print" align="CENTER"><?php echo $wkr->wkr_passno;?></td>
	    	<td class="print" align="CENTER"><?php if($fieldname == 'wkr_permitexp') echo date('j M Y', strtotime($wkr->wkr_permitexp)); else echo date('j M Y', strtotime($wkr->wkr_passexp));?></td>
	    	<td class="print" align="CENTER"><?php if($fieldname == 'wkr_permitexp') echo date('j M Y', strtotime($wkr->wkr_passexp)); else echo date('j M Y', strtotime($wkr->wkr_permitexp));?></td>
	    	<td align="CENTER" class="print"><?php if(strlen($wkr->wkr_entrydate) == 0 || $wkr->wkr_entrydate == '0000-00-00') echo "-can't be determined-"; else echo getYears($wkr->wkr_entrydate) + 1; ?></td>
	        <td align="CENTER" class="print"><?php echo $wkr->cty_desc;?></td>
	    </tr>
	    <?php }
		$sumjim=0;
		$sumjim_bd=0;$sumjim_cb=0;$sumjim_in=0;$sumjim_id=0;$sumjim_kz=0;$sumjim_kg=0;$sumjim_la=0;$sumjim_bm=0;
		$sumjim_np=0;$sumjim_pk=0;$sumjim_rp=0;$sumjim_th=0;$sumjim_uz=0;$sumjim_vm=0;$sumjim_skp=0;
		
		$gsumjim_bd=0;$gsumins_bd=0;$gsumcla_bd=0;$gsumfom_bd=0;$gsumgc_bd=0;
		$gsumjim_cb=0;$gsumins_cb=0;$gsumcla_cb=0;$gsumfom_cb=0;$gsumgc_cb=0;
		$gsumjim_in=0;$gsumins_in=0;$gsumcla_in=0;$gsumfom_in=0;$gsumgc_in=0;
		$gsumjim_id=0;$gsumins_id=0;$gsumcla_id=0;$gsumfom_id=0;$gsumgc_id=0;
		$gsumjim_kz=0;$gsumins_kz=0;$gsumcla_kz=0;$gsumfom_kz=0;$gsumgc_kz=0;
		$gsumjim_kg=0;$gsumins_kg=0;$gsumcla_kg=0;$gsumfom_kg=0;$gsumgc_kg=0;
		$gsumjim_la=0;$gsumins_la=0;$gsumcla_la=0;$gsumfom_la=0;$gsumgc_la=0;
		$gsumjim_bm=0;$gsumins_bm=0;$gsumcla_bm=0;$gsumfom_bm=0;$gsumgc_bm=0;
		$gsumjim_np=0;$gsumins_np=0;$gsumcla_np=0;$gsumfom_np=0;$gsumgc_np=0;
		$gsumjim_pk=0;$gsumins_pk=0;$gsumcla_pk=0;$gsumfom_pk=0;$gsumgc_pk=0;
		$gsumjim_rp=0;$gsumins_rp=0;$gsumcla_rp=0;$gsumfom_rp=0;$gsumgc_rp=0;
		$gsumjim_th=0;$gsumins_th=0;$gsumcla_th=0;$gsumfom_th=0;$gsumgc_th=0;
		$gsumjim_uz=0;$gsumins_uz=0;$gsumcla_uz=0;$gsumfom_uz=0;$gsumgc_uz=0;
		$gsumjim_vm=0;$gsumins_vm=0;$gsumcla_vm=0;$gsumfom_vm=0;$gsumgc_vm=0;
		$gsumjim_sl=0;$gsumins_sl=0;$gsumcla_sl=0;$gsumfom_sl=0;$gsumgc_sl=0;
		
		$sumjim_bd=$plks_bd + $fees_bd + $visa_bd + $levi_bd;
		$sumjim_cb=$plks_cb + $fees_cb + $visa_cb + $levi_cb;
		$sumjim_in=$plks_in + $fees_in + $visa_in + $levi_in;
		$sumjim_id=$plks_id + $fees_id + $visa_id + $levi_id;
		$sumjim_kz=$plks_kz + $fees_kz + $visa_kz + $levi_kz;
		$sumjim_kg=$plks_kg + $fees_kg + $visa_kg + $levi_kg;
		$sumjim_la=$plks_la + $fees_la + $visa_la + $levi_la;
		$sumjim_bm=$plks_bm + $fees_bm + $visa_bm + $levi_bm;
		$sumjim_np=$plks_np + $fees_np + $visa_np + $levi_np;
		$sumjim_pk=$plks_pk + $fees_pk + $visa_pk + $levi_pk;
		$sumjim_rp=$plks_rp + $fees_rp + $visa_rp + $levi_rp;
		$sumjim_th=$plks_th + $fees_th + $visa_th + $levi_th;
		$sumjim_uz=$plks_uz + $fees_uz + $visa_uz + $levi_uz;
		$sumjim_vm=$plks_vm + $fees_vm + $visa_vm + $levi_vm;
		$sumjim_sl=$plks_sl + $fees_sl + $visa_sl + $levi_sl;
		
	    ?>
      </table>
      </td>
    </tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr>
		<td colspan="4">
			<table width=100% border="1" cellpadding="3" style="border-collapse: collapse"bordercolor="#ccc" >				
			<?php
			if($sumjim_bd<>0) 
			{
				$negara='BANGLADESH';
				$gsumjim_bd = kpim($negara,$sumjim_bd,$fcl_bd);
				$gsumins_bd = lonpac($fcl_bd,$fine_bd);
				$gsumcla_bd = clab($fcl_bd);
				$gsumfom_bd = fomema($fcl_bd);
				$gsumgc_bd = greencard($fcl_bd);
			}
			if($sumjim_cb<>0) 
			{
				$negara='CAMBODIA';
				$gsumjim_cb = kpim($negara,$sumjim_cb,$fcl_cb);
				$gsumins_cb = lonpac($fcl_cb,$fine_cb);
				$gsumcla_cb = clab($fcl_cb);
				$gsumfom_cb = fomema($fcl_cb);
				$gsumgc_cb = greencard($fcl_cb);
			}
			if($sumjim_in<>0) 
			{
				$negara='INDIA';
				$gsumjim_in = kpim($negara,$sumjim_in,$fcl_in);
				$gsumins_in = lonpac($fcl_in,$fine_in);
				$gsumcla_in = clab($fcl_in);
				$gsumfom_in = fomema($fcl_in);
				$gsumgc_in = greencard($fcl_in);
			}
			if($sumjim_id<>0) 
			{
				$negara='INDONESIA';
				$gsumjim_id = kpim($negara,$sumjim_id,$fcl_id);
				$gsumins_id = lonpac($fcl_id,$fine_id);
				$gsumcla_id = clab($fcl_id);
				$gsumfom_id = fomema($fcl_id);
				$gsumgc_id = greencard($fcl_id);
			}
			if($sumjim_kz<>0) 
			{
				$negara='KAZAKHSTAN';
				$gsumjim_kz = kpim($negara,$sumjim_kz,$fcl_kz);
				$gsumins_kz = lonpac($fcl_kz,$fine_kz);
				$gsumcla_kz = clab($fcl_kz);
				$gsumfom_kz = fomema($fcl_kz);
				$gsumgc_kz = greencard($fcl_kz);
			}
			if($sumjim_kg<>0) 
			{
				$negara='KYRGYZSTAN';
				$gsumjim_kg = kpim($negara,$sumjim_kg,$fcl_kg);
				$gsumins_kg = lonpac($fcl_kg,$fine_kg);
				$gsumcla_kg = clab($fcl_kg);
				$gsumfom_kg = fomema($fcl_kg);
				$gsumgc_kg = greencard($fcl_kg);
			}
			if($sumjim_la<>0) 
			{
				$negara='LAOS';
				$gsumjim_la = kpim($negara,$sumjim_la,$fcl_la);
				$gsumins_la = lonpac($fcl_la,$fine_la);
				$gsumcla_la = clab($fcl_la);
				$gsumfom_la = fomema($fcl_la);
				$gsumgc_la = greencard($fcl_la);
			}
			if($sumjim_bm<>0) 
			{
				$negara='MYANMAR';
				$gsumjim_bm = kpim($negara,$sumjim_bm,$fcl_bm);
				$gsumins_bm = lonpac($fcl_bm,$fine_bm);
				$gsumcla_bm = clab($fcl_bm);
				$gsumfom_bm = fomema($fcl_bm);
				$gsumgc_bm = greencard($fcl_bm);
			}
			if($sumjim_vm<>0) 
			{
				$negara='VIETNAM';
				$gsumjim_vm = kpim($negara,$sumjim_vm,$fcl_vm);
				$gsumins_vm = lonpac($fcl_vm,$fine_vm);
				$gsumcla_vm = clab($fcl_vm);
				$gsumfom_vm = fomema($fcl_vm);
				$gsumgc_vm = greencard($fcl_vm);
			}
			if($sumjim_np<>0) 
			{
				$negara='NEPAL';
				$gsumjim_np = kpim($negara,$sumjim_np,$fcl_np);
				$gsumins_np = lonpac($fcl_np,$fine_np);
				$gsumcla_np = clab($fcl_np);
				$gsumfom_np = fomema($fcl_np);
				$gsumgc_np = greencard($fcl_np);
			}
			if($sumjim_pk<>0) 
			{
				$negara='PAKISTAN';
				$gsumjim_pk = kpim($negara,$sumjim_pk,$fcl_pk);
				$gsumins_pk = lonpac($fcl_pk,$fine_pk);
				$gsumcla_pk = clab($fcl_pk);
				$gsumfom_pk = fomema($fcl_pk);
				$gsumgc_pk = greencard($fcl_pk);
			}
			if($sumjim_rp<>0) 
			{
				$negara='PHILIPPINES';
				$gsumjim_rp = kpim($negara,$sumjim_rp,$fcl_rp);
				$gsumins_rp = lonpac($fcl_rp,$fine_rp);
				$gsumcla_rp = clab($fcl_rp);
				$gsumfom_rp = fomema($fcl_rp);
				$gsumgc_rp = greencard($fcl_rp);
			}
			if($sumjim_th<>0) 
			{
				$negara='THAILAND';
				$gsumjim_th = kpim($negara,$sumjim_th,$fcl_th);
				$gsumins_th = lonpac($fcl_th,$fine_th);
				$gsumcla_th = clab($fcl_th);
				$gsumfom_th = fomema($fcl_th);
				$gsumgc_th = greencard($fcl_th);
			}
			if($sumjim_uz<>0) 
			{
				$negara='UZBEKISTAN';
				$gsumjim_uz = kpim($negara,$sumjim_uz,$fcl_uz);
				$gsumins_uz = lonpac($fcl_uz,$fine_uz);
				$gsumcla_uz = clab($fcl_uz);
				$gsumfom_uz = fomema($fcl_uz);
				$gsumgc_uz = greencard($fcl_uz);
			}
			if($sumjim_sl<>0) 
			{
				$negara='SRI LANKA';
				$gsumjim_sl = kpim($negara,$sumjim_sl,$fcl_sl);
				$gsumins_sl = lonpac($fcl_sl,$fine_sl);
				$gsumcla_sl = clab($fcl_sl);
				$gsumfom_sl = fomema($fcl_sl);
				$gsumgc_sl = greencard($fcl_sl);
			}

			?>	
			</table>
		</td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	
	<?php
	function kpim($negara,$sumjim,$fcl){
		$nation=$negara.' ('.$fcl.')'; 
		echo '<tr><td colspan=3><b>'.$nation.'</b></td></tr>';				
		echo '<tr>';
		echo '<td width=500 height=20><b>Bank Draft to :</b></td>';
		echo '<td align=center><b>Description</b></td>';
		echo '<td align=center><b>Total(RM)</b></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td height=20>Construction Labour Exchange Centre Berhad</td>';
		echo '<td align=center>JIM</td>';
		echo '<td align=center>'.number_format($sumjim,2).'</td>';
		echo '</tr>';	

		return $sumjim;
	} 
	
	function lonpac($fcl,$fine){ 
		$amtfwcs=0;$amtfwhs=0;$amtjim=0;
		$fwcs=72;$fwhs=120;$stamp=20;
		$val = $fcl * $fine * 18 / 12 * 0.01;
		if($val <= 50.00) $ig = 50.00; else $ig = $val;
		$amtfwcs=0 * $fcl;
		$amtfwhs=$fwhs * $fcl;
		$amtjim=$ig+$amtfwcs+$amtfwhs;
		$sumins=($amtjim * 0.06) + $amtjim + $stamp;		
		echo '<tr>';
		echo '<td height=20>Construction Labour Exchange Centre Berhad</td>';
		echo '<td align=center>Insurance</td>';
		echo '<td align=center>'.number_format($sumins,2).'</td>';
		echo '</tr>'; 
		return $sumins;
	}
	
	function clab($fcl){ 
		$admfee=300;$amtclab=0;$sumclab=0;
		$amtclab=$admfee * $fcl;
		$sumclab=($amtclab * 0.06) + $amtclab;
		
		echo '<tr>';
		echo '<td height=20>Construction Labour Exchange Centre Berhad</td>';
		echo '<td align=center>Admin Fee</td>';
		echo '<td align=center>'.number_format($sumclab,2).'</td>';
		echo '</tr>';
		return $sumclab;
	}
	
	function fomema($fcl){ 
		$fomema=20;$amtfom=0;$sumfom=0;
		$amtfom=$fomema * $fcl;
		$amtmed=180 * $fcl;
		$sumfom=($amtfom * 0.06) + $amtfom + $amtmed;

		echo '<tr>';
		echo '<td height=20>Construction Labour Exchange Centre Berhad</td>';
		echo '<td align=center>Fomema Online</td>';
		echo '<td align=center>'.number_format($sumfom,2).'</td>';
		echo '</tr>';
		//echo '<tr><td colspan="4">&nbsp;</td></tr>';
		return $sumfom;
	}

	function greencard($fcl){ 
		$gc=50;$amtgc=0;$sumgc=0;
		$amtgc=$gc * $fcl;
		$sumgc=($amtgc * 0.06) + $amtgc;

		echo '<tr>';
			echo '<td height=20>Construction Labour Exchange Centre Berhad</td>';
			echo '<td align=center>Green Card</td>';
			echo '<td align=center>'.number_format($sumgc,2).'</td>';
		echo '</tr>';
		//echo '<tr><td colspan="4">&nbsp;</td></tr>';
		return $sumgc;
	}
	
	$gkpim=0;$glonpac=0;$gclab=0;$gfom=0;$ggc=0;
	
	$gkpim = $gsumjim_bd + $gsumjim_cb + $gsumjim_in + $gsumjim_id + $gsumjim_kz + $gsumjim_kg + $gsumjim_la + $gsumjim_bm +
	$gsumjim_np + $gsumjim_pk + $gsumjim_rp + $gsumjim_th + $gsumjim_uz + $gsumjim_vm + $gsumjim_sl;
	
	$glonpac = $gsumins_bd + $gsumins_cb + $gsumins_in + $gsumins_id + $gsumins_kz + $gsumins_kg + $gsumins_la + $gsumins_bm +
	$gsumins_np + $gsumins_pk + $gsumins_rp + $gsumins_th + $gsumins_uz + $gsumins_vm + $gsumins_sl;
	
	$gclab = $gsumcla_bd + $gsumcla_cb + $gsumcla_in + $gsumcla_id + $gsumcla_kz + $gsumcla_kg + $gsumcla_la + $gsumcla_bm +
	$gsumcla_np + $gsumcla_pk + $gsumcla_rp + $gsumcla_th + $gsumcla_uz + $gsumcla_vm + $gsumcla_sl;
	
	$gfom = $gsumfom_bd + $gsumfom_cb + $gsumfom_in + $gsumfom_id + $gsumfom_kz + $gsumfom_kg + $gsumfom_la + $gsumfom_bm +
	$gsumfom_np + $gsumfom_pk + $gsumfom_rp + $gsumfom_th + $gsumfom_uz + $gsumfom_vm + $gsumfom_sl;
	
	$ggc = $gsumgc_bd + $gsumgc_cb + $gsumgc_in + $gsumgc_id + $gsumgc_kz + $gsumgc_kg + $gsumgc_la + $gsumgc_bm +
	$gsumgc_np + $gsumgc_pk + $gsumgc_rp + $gsumgc_th + $gsumgc_uz + $gsumgc_vm + $gsumgc_sl;
	
	$gtotal = $gkpim + $glonpac + $gclab + $gfom + $ggc;
	
	?>
		
	<tr>
		<td colspan="4">
			<table width=100% border="1" cellpadding="3" style="border-collapse: collapse"bordercolor="#ccc" >
				<tr><td colspan=6 height=25 align=center><b>Grand Total (RM)</b></td></tr>
				<tr>
					<td height=25 align=center>Construction Labour Exchange Centre Berhad(JIM)</td>
					<td align=center>Construction Labour Exchange Centre Berhad(Ins)</td>
					<td align=center>Construction Labour Exchange Centre Berhad(Admin Fee)</td>
					<td align=center>Construction Labour Exchange Centre Berhad(Fomema Online)</td>
					<td align=center>Construction Labour Exchange Centre Berhad(GreenCard)</td>
					<td align=center>Total </td>
				</tr>
				<tr>
					<td align=center><b>RM<?php echo number_format($gkpim,2); ?></b></td>
					<td align=center><b>RM<?php echo number_format($glonpac,2); ?></b></td>
					<td align=center><b>RM<?php echo number_format($gclab,2); ?></b></td>
					<td align=center><b>RM<?php echo number_format($gfom,2); ?></b></td>
					<td align=center><b>RM<?php echo number_format($ggc,2); ?></b></td>
					<td align=center><b>RM<?php echo number_format($gtotal,2); ?></b></td>
				</td>
			</table>
		</td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
    <tr>
      <td colspan="4"><p align="justify">Please inform us immediately if you wish to extend their service, failing which we will re-distribute these FCLs to other company. <span class="style1">Kindly ignore this letter if you are already renew your workers permit.
      </span></p></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Thank you.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Yours Sincerely, <br />
      CONSTRUCTION LABOUR EXCHANGE CENTRE BERHAD
      </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">				  CHIEF EXECUTIVE OFFICER
	  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>This letter is computer generated. No signature required.</i>
      	</span></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
        <span style="font-size: 7pt; font-family: &quot;Arial&quot;;">
      	<i>/<?php echo $this->session->userdata('username');?></i>
      	</span></td>
    </tr>
  </tbody>
</table><p CLASS="pagebreakhere">
<table border="0" align="center" cellpadding="0" cellspacing="0" style="text-align: left; width: 616px;">
  <tbody>
    <tr>
      <td colspan="4"><div align="center"><strong><u>CHECKLIST FOR EXTENSION (PLKS) </u></strong></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">The document &amp; payment that need to be  prepared to complete this application:-</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox" value="checkbox"></td>
      <td width="516">Original Passport (date of expiry of the passport must be more than 12 months)</td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox2" value="checkbox"></td>
      <td>FOMEMA result <strong>(Renewal in the year 2,3,5,7 & 9 only)</strong></td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td>Employer's Application Letter (for Extension of PLKS)<td></td></td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td>Latest SOCSO Statement for 3 months (ACR / Receipt & Form 8A)<td></td></td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox3" value="checkbox"></td>
      <td>Latest EPF Statment (3 Months)<td></td></td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Details of worker's next of kin (PEWARIS) - Relationship & source country address of the next of kin </td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Director's IC and latest Form 49 <strong>or</strong> SSM documents (<strong>if submission made by Director</strong>)</td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Authorized letter (if the agent represents a company for document submission)</td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Valid Clab certificate & CIDB Certificate </td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox4" value="checkbox"></td>
      <td>Renewal Green Card Form </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><u>Required Payments</u><p><b>All Bank Draft payable to Construction Labour Exchange Centre Berhad: </td>
    </tr>
	
    <tr>
	
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="1"><input type="checkbox" name="checkbox42" value="checkbox"></td>
      <td><strong>Jabatan Imigresen - Ketua Pengarah Imigresen Malaysia </strong><br /> 
	      <em>(Processing Fees / Visa / Levi)</em></td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox42" value="checkbox"></td>
      <td><strong>CLAB - Construction Labour Exchange Centre Berhad</strong><br /> 
	  <em>(Admin Fees )</em></td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox43" value="checkbox"></td>
      <td><strong>CLAB - Construction Labour Exchange Centre Berhad</strong><br />
          <em>(Green Card Fees)</em></td>
    </tr>
    <tr>
      <td colspan="1"><input type="checkbox" name="checkbox44" value="checkbox"></td>
      <td>Insurance <strong> - QBE Asia Pacific-Malaysia </strong><br />
	  	  <em>(Insurance Guarantee / FWHS / Stamp Duty)</em></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">The guidelines by the Immigration Department stipulate that employers must take appropriate steps to renew the work permit of their workers <strong>3 months</strong> before their expiry.  </td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">We would advise employers to place importance on this annual medical examination to avoid unnecessary inconvenience due to last minute examination. We also wish to caution employers that they may be subject to <strong>COMPOUND/FINE</strong> by Immigration Department for late renewal.</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Kindly be reminded that we could not processed further should we do not received your complete application</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Thank You</div></td>
    </tr>
    <tr>
      <td colspan="4"><strong>CONSTRUCTION  LABOUR EXCHANGE CENTRE BERHAD</strong></div></td>
    </tr>
	<tr>
      <td colspan="4">&nbsp;</td>
    </tr>
<tr>
      <td colspan="4" align="left">
	  <table style="text-align: left; width: 600px; border:1px solid;" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<table border="0" width="100%">
						<td colspan="4">FOR CLAB USE ONLY</div></td>
						</tr>
						</table>
					</table>
    </tr>
	<tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4">CLAB registration status :  <input type="checkbox" name="" value="">ACTIVE   <input type="checkbox" name="" value="">IN-ACTIVE</td>
    </tr>
	<tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="5">&nbsp;</td>
    </tr>
	<tr>
      <td>Checked By       :</td>
	  <td>______________________</td>
    </tr>
		<tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td>Signature       :</td>
	  <td>______________________</td>
    </tr>
		<tr>
      <td colspan="4">&nbsp;</td>
    </tr>
	<tr>
      <td>Date            :</td>
	  <td>______________________</td>
    </tr>
	 
  </tbody>
</table>
</p>
</body>
</html>
