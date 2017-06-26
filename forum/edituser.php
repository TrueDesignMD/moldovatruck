<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
$name = htmlspecialchars($_POST['name'],ENT_QUOTES);
$fullname = htmlspecialchars($_POST['fullname'],ENT_QUOTES);
$login = htmlspecialchars($_POST['login'],ENT_QUOTES);
$email = htmlspecialchars($_POST['email'],ENT_QUOTES);
$password = password_hash(mysqli_real_escape_string($CONNECTION,$_POST['password']),PASSWORD_DEFAULT);


if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
	$query = "UPDATE `".DB_PREFIX."users` SET `userName`='{$name}', `userFullname`='{$fullname}', `login`='{$login}',`Email`='{$email}'";
	if (!empty($password)) $query.=", `Password`='$password'";
	$update = mysqli_query($CONNECTION,$query." WHERE `userID`='$id'");
	if ($update) echo 'ok'; else echo mysqli_error($CONNECTION);
}
elseif (isset($_SESSION['user']))
{
	$_SESSION['user'] = htmlspecialchars($_POST['id'],ENT_QUOTES);
	$query = "UPDATE `".DB_PREFIX."users` SET `userName`='{$name}', `userFullname`='{$fullname}'";
	if (!empty($password)) $query.=", `Password`='$password'";
	$update = mysqli_query($CONNECTION,$query." WHERE `userID`='$id'");
	if ($update) echo 'ok'; else echo mysqli_error($CONNECTION);
}else echo 'Сессия отсутсвует';

?>