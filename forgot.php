<?php
session_start();
session_name("MoldovaTruck");
require_once "system/configuration.php";
require_once "system/functions.php";
$mosConfig_lang = LANG;


if (!defined('FORMS')) {$ANOTHER = 'forma'; $num=0;define('FORMS',$ANOTHER);}
else
{
	$FORMS = FORMS;
	if ($FORMS=='forma') {$ANOTHER='formc';$num=1;}
	else {$ANOTHER = 'formb';$num=2;}
}

if (!empty($_POST)&&empty($_SESSION['user']))
{
 		
		$row = mysqli_real_escape_string($CONNECTION,$_POST['row']);
		
		
			
		$getUSER = mysqli_query($CONNECTION,"SELECT `userID`,`Email`,`activated`,`userName`,`userFullname`,`login` FROM `".DB_PREFIX."users` WHERE `login`='$row' or `Email`='$row'");
		if (mysqli_num_rows($getUSER)==0) echo '<p class="alert alert-dismissible alert-danger">Такой пользователь не найден</p>';
		else
		{
			$user = mysqli_fetch_array($getUSER);
			if ($user['activated']==0) echo '<p class="alert alert-dismissible alert-danger">Вы не поддтвердили Email. Письмо выслано на почту <b>'.$user['Email'].'</b></p>';
			
			else
			{
				$code = md5(md5(time().'MOLDOVATRUCK','mTruck'));
				$insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."forgot`(`userID`,`code`,`seconds`)VALUES('$user[userID]','$code','".time()."')");
				$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#2c3e50;font-size:18px;text-align:center;">Восстановление пароля на сайте MoldovaTruck.md</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	
	<p><font style="display:inline-block;width:120px;color:#333">Логин:</font> '.$user['login'].'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Ссылка для смены пароля:</font> <a href="'.HOME.LANG.'/forum?action=changepass&code='.$code.'">'.HOME.LANG.'/forum?action=changepass&code='.$code.'</a></p>
	<p align=Center style="color:#000;margin-top:25px;">При возникновении вопросов пишите нам info@moldovatruck.md</p></div>
	</div>
</body>

</html>';
		$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck','registration@moldovatruck.md','Wg^psD{W;r8t',$user['userName'].' '.$user['userFullname'],$user['Email'],'UTF-8','Восстановление пароля на сайте',$body);
		if (is_bool($send) and $send==true)
				{ 
					echo"<p class='alert alert-dismissible alert-success' id='".$_POST['form_name']."' style='text-align:center;display:block;margin-bottom:2em;'>Письмо с ссылкой для смены пароля отправлено на вашу почту</a></p>";
					define('INSERTED',true);
					$inserted = true;
				}else echo $send;
			}
		
		}
			
		
	
}

	?>