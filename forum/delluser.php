<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);

if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
	$update = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `isEnabled`='0' WHERE `userID`='$id'");
	if ($update) echo 'ok'; else echo mysqli_error($CONNECTION);
}
else echo 'Вы не администратор';

?>