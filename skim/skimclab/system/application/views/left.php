<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="<?php echo base_url();?>css/sippsstyle.css" rel="stylesheet" type="text/css" />

<script language="JavaScript">
var TREE_ITEMS = [
	['CLAB', '',
		['Contractor Online', '<?php echo site_url();?>/contContractor'
		],
			<?php echo $sitemapMenu;?>
		['Change Password', '<?php echo site_url();?>/contLogin/changePasswd',
		],
	],
];

</script>
	<script language="JavaScript" src="<?php echo base_url(); ?>js/tree_tpl.js"></script>
	<script language="JavaScript" src="<?php echo base_url(); ?>js/tree.js"></script>
<style type="text/css">
<!--
body {
	background-color:#A5BDFD;
}
-->
</style></head>

<body bottommargin="0" topmargin="0" leftmargin="0" rightmargin="0">
<p><a href="http://www.clab.com.my" target="_blank"><img src="<?php echo base_url();?>images/banner_left.jpg" width="260" height="30" border="0" /></a></p>


<p>
  <script language="JavaScript">

	new tree (TREE_ITEMS, TREE_TPL);

</script>

<img src="<?php echo base_url();?>/icons/join.gif"><a href="<?php echo site_url();?>/contLogin/logout" target="_parent"><strong>Logout</strong></a>

</p>
</body>
</html>
