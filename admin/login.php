<?php
session_start();
include(dirname(__FILE__)."/../system/configuration.php");

$user = htmlspecialchars($_POST['login'],ENT_QUOTES);

$sql_ = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."admin` WHERE user='$user'");
if (mysqli_num_rows($sql_)>0)
{
	$admin = mysqli_fetch_array($sql_);
	if (password_verify($_POST['pass'], $admin['password']))
	{
		$_SESSION['s'] = rand();
		echo 'ok';
	}
	else echo 'Не найден пользователь или пароль не верен';
}
else echo mysqli_error($CONNECTION);
?>