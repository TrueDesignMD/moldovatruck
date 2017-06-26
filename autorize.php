<?php
session_start();
session_name("MoldovaTruck");
require_once "system/configuration.php";
require_once "system/functions.php";
$mosConfig_lang = LANG;

if (!empty($_POST)&&empty($_SESSION['user']))
{
 		
		$login = mysqli_real_escape_string($CONNECTION,$_POST['login']);
		$password = mysqli_real_escape_string($CONNECTION,$_POST['password']);
	
		$getUSER = mysqli_query($CONNECTION,"SELECT `password`,`userID`,`Email`,`activated`,`userType` FROM `".DB_PREFIX."users` WHERE `Email`='$login'");
		if (mysqli_num_rows($getUSER)==0) echo 'Такой пользователь не найден';
		else
		{
			$user = mysqli_fetch_array($getUSER);
			if ($user['activated']==0) echo 'Вы не поддтвердили Email. Письмо выслано на почту <b>'.$user['Email'].'</b>';
			
			else
			{
				if (password_verify($password,$user['password']))
				{
					$_SESSION['user'] = $user['userID'];
					$_SESSION['group'] = $user['useType'];
					setcookie("user", $user['userID'],time()+60*60*24*365);
					setcookie("group", $user['userType'],time()+60*60*24*365);
					echo 'ok';
				}
				else echo 'Неверный пароль!';
			}
		
		}
			
		
	
}
?>