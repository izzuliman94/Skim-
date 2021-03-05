<?php
# Define MySQL Settings
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "password");
define("MYSQL_DB", "test");
$conn = mysql_connect("".MYSQL_HOST."", "".MYSQL_USER."", "".MYSQL_PASS."") or
die(mysql_error());
mysql_select_db("".MYSQL_DB."",$conn) or die(mysql_error());
$sql = "SELECT * FROM test";
$res = mysql_query($sql);
while ($field = mysql_fetch_array($res))
{
$id = $field['id'];
$name = $field['name'];
echo 'ID: ' . $field['id'] . '<br />';
echo 'Name: ' . $field['name'] . '<br /><br />';
}
?>
6. Open up Internet Explorer and type in "http://localhost:81/mysql_test.php". If the
"mysql_test.php" page returns something similiar to:
ID: 1
Name: John
Then PHP & MySQL have been successfully configured to work together.