<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SKIM - SPIM</title>
<style type="text/css">
th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
}

td {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
}
.style4 {	font-size: 24px;
	font-weight: bold;
}
.style5 {	font-size: xx-small;
	font-style: italic;
}
.print {font-size: 12px;
}
</style>
</head>
<body>
<table width="67%" align="center"><tr>
    <td width="113"><span style="font-size: 6pt; font-family: &quot;Arial&quot;; color: navy;"><img src="<?php echo base_url();?>images/logoLetter.jpg" /></span></td>
    <td width="693"><p align="right">QMS Doc. Ref.: CLAB-SF-22<br />
      Revision no. : 0</p>
    <div align="right">Effective Date: 30/06/2014</div></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><div align="center"><span class="style4">HANDOVER ACKNOWLEDGEMENT</span></div></td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2">Type of document(s)/activities handover:</td>
</tr>
<tr>
  <td colspan="2"><table border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td width="73" valign="top"><p align="center">Please Tick<br />
        (whichever    applicable)</p></td>
      <td width="576" valign="top"><p align="center">Document(s) /    Activities</p></td>
    </tr>
    <tr>
      <td width="73" valign="top"><p align="center">
        <input type="checkbox" name="chktype3" id="chktype3" />
      </p></td>
      <td width="576" valign="top"><p>Passport</p></td>
    </tr>
    <tr>
      <td width="73" valign="top"><p align="center">
        <input type="checkbox" name="chktype4" id="chktype4" />
      </p></td>
      <td width="576" valign="top"><p>Visa Dengan Rujukan (VDR)</p></td>
    </tr>
    <tr>
      <td width="73" valign="top"><p align="center">
        <input name="chktype5" type="checkbox" id="chktype5" checked="checked" />
      </p></td>
      <td width="576" valign="top"><p>Arrival</p></td>
    </tr>
    <tr>
      <td width="73" valign="top"><p align="center"><strong>
        <input type="checkbox" name="chktype6" id="chktype6" />
        </strong></p></td>
      <td width="576" valign="top"><p>Demand Letter</p></td>
    </tr>
    <tr>
      <td width="73" valign="top"><p align="center">
        <input type="checkbox" name="chktype7" id="chktype7" />
      </p></td>
      <td width="576" valign="top"><p>Other. Please specify:</p></td>
    </tr>
  </table></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
    <td colspan="2"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="130" valign="top"><p>Handover method:</p></td>
        <td width="59" valign="top"><p align="center"><strong>&nbsp;</strong>
                <input type="checkbox" name="chktype2" id="chktype2" />
        </p></td>
        <td width="95" valign="top"><p align="center">Courier</p></td>
        <td width="16" valign="top"><p>&nbsp;</p></td>
        <td width="57" valign="top"><p align="center">
          <label>
                <input name="chktype" type="checkbox" id="chktype" checked="checked" />
                </label>
        </p></td>
        <td width="85" valign="top"><p align="center">By Hand</p></td>
      </tr>
    </table></td>
</tr>
<tr>
    <td colspan="2"><b><?php echo $woRow->ctr_comp_name;?></b></td>
</tr>
<tr>
    <td colspan="2"><?php echo $woRow->ctr_addr1; ?></td>
</tr>
<tr>
    <td colspan="2"><?php echo $woRow->ctr_addr2; ?></td>
</tr>
<tr>
  <td colspan="2"><?php echo $woRow->ctr_pcode; ?><?php echo $woRow->ctr_addr3; ?></td>
</tr>
<tr>
  <td colspan="2"><b><?php echo $woRow->state_name; ?></b></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr>
  <td colspan="2"><p>Dear Sir / Madam,</p></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>


<tr>
  <td colspan="2"><p>We are pleased to inform that above mention for  foreign construction workers are ready for collection.<br />
    The detail of the worker(s) are :</p>    </td>
</tr>

<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2">
  <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0">
  <?php 

if($allFCLFiles->num_rows() == 0){ 

?>
  <tr>
      <td width="5%"><?php echo $i++; ?></td>
	  <td width="60%">&nbsp;</td>
	  <td width="35%">&nbsp;</td>
  </tr>
<?php
}else{
$i = 1;
foreach($allFCLFiles->result() as $fcl){
?>
<?php 
}}
?>  
  </table>  </td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2"><p>Thank you.</p></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="4"><p>Yours sincerely,</p></td>
</tr>
<tr>
  <td colspan="2"><strong>CONSTRUCTION LABOUR  EXCHANGE CENTRE BERHAD</strong></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
</tr>

<tr>
  <td colspan="2"><strong>Nazatul Akmar Bt Abdul Halim</strong></td>
</tr>
<tr>
  <td colspan="2">Deputy Head Of Corporate Services</td>
</tr>
<tr>
  <td colspan="2">---------------------------------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr>
  <td colspan="2"><p>Acknowledgement By Sign</p>
    <p>I hereby acknowledge receipt as above mention.<br />
      Name:<br />
      Identity Card (I/C) No.:<br />
      Designation:<br />
      Date:<br />
    Signature:</p></td>
</tr>
<tr>
  <td colspan="2">---------------------------------------------------------------------------------------------------------------------------------------------------------</td>
</tr>
<tr>
  <td colspan="2"><span class="style5">This Letter Are Computer Generated , No Signature Required</span></td>
</tr>

<tr>
  <td colspan="2"><font size="-6">CLAB/VDR/<i><?php echo $this->session->userdata('username');?></i></font></td>
</tr>
</table>
</body>
</html>