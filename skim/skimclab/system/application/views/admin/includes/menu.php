<script type="text/javascript">
<!--
function menuGoTo(locationHref)
{
	var x = (/\?/.test(locationHref) ? "&" : "?");
	location.href = locationHref + x + "menu_scrolltop=" + String(document.getElementById("menu").scrollTop);
}
//-->
</script>
	<div id="menu" style="height: 35em; overflow-y: scroll">
		<h2 class="hide">Menu:</h2>
		<ul>
			<li><a href="javascript:menuGoTo('admin_masters.php?t=countries')">Countries</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=airports')">Race/Ethnic</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=awb_agent_prefix')">Nationality</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=awb_status')">Category</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=cargo_arrival_status')">Departments</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=cargo_condition')">Registration Status</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=cargo_integrity')">Availability Status</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=cargo_types')">Labour Availability Status</a></li>
			<li><a href="javascript:menuGoTo('entities.php')">Grade</a></li>
			<li><a href="javascript:menuGoTo('index.php?t=freight_status')">Specialization</a></li>
		</ul>
	</div>
<script type="text/javascript">
<!--
<?php
if (isset($_GET["menu_scrolltop"]))
{
?>
document.getElementById("menu").scrollTop = <?php echo $_GET["menu_scrolltop"]; ?>;
<?php
}
?>
//-->
</script> 
