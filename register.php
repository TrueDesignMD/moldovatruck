<?php
session_start();
session_name("MoldovaTruck");
$mosConfig_lang = LANG;
require_once dirname(__FILE__)."/system/configuration.php";
require_once dirname(__FILE__)."/system/functions.php";


if (empty($_SESSION['user'])and !defined('INSERTED')&&!empty($_POST))
{
	if (!isset($_SESSION['captcha_keystring']) or $_SESSION['captcha_keystring'] !== $_POST['code']) {
		echo 'Код введен не верно <'.HOME.'kcaptcha.php?'.session_name().'='.session_id().'';
		exit();
	}
	if ($_POST['password']!==$_POST['conf']) {
		echo 'Пароли не совпадают';
		exit();
	}
 	if (isValidEmail($_POST['email'], false))
	{
		
		$email = strtolower(mysqli_real_escape_string($CONNECTION,$_POST['email']));
		$login = mysqli_real_escape_string($CONNECTION,$_POST['login']);
		$name = mysqli_real_escape_string($CONNECTION,$_POST['email']);
		$lastname = mysqli_real_escape_string($CONNECTION,$_POST['lastname']);		
		$name = mysqli_real_escape_string($CONNECTION,$_POST['name']);
		$password = password_hash(mysqli_real_escape_string($CONNECTION,$_POST['password']),PASSWORD_DEFAULT);
	
		$getUSER = mysqli_query($CONNECTION,"SELECT `userID` FROM `".DB_PREFIX."users` WHERE `Email`='$email' or `login`='$login'");
		if (mysqli_num_rows($getUSER)>0) echo 'Пользователь с таким Email или логином уже существует!';
		else
		{
			$code = md5(md5(time().'MOLDOVATRUCK','mTruck'));
					
			$insert = mysqli_query($CONNECTION,"INSERT INTO `".DB_PREFIX."users`(`userName`,`userIp`,`Email`,`Password`,`dateReg`,`userType`,`userFullName`,`langAbb`,`activationCode`,`login`,`isEnabled`)VALUES('$name','".$_SERVER['REMOTE_ADDR']."','$email','$password','".date('Y-m-d')."','user','$lastname','".LANG."','$code','$login','1')");
			
			if ($insert)
			{
				$body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="width:100%;text-align:center;padding:0px;margin:0px;">
	<div style="background:none;width:60%;margin-left:20%;">
	
	<div style="margin-top:15px;color:white;padding:10px;border:1px solid #ccc;padding-top:30px;padding-bottom:30px;background-color:#2c3e50;font-size:18px;text-align:center;">Регистрация на сайте MoldovaTruck.md</div>
	<div style="color:#999;font-size:15px;border:1px solid #ccc;padding:10px;padding-top:30px;padding-bottom:30px;text-align:left;">
	
	<b style="font-size:15px;color:#000">Данные для входа:</b>
	<p><font style="display:inline-block;width:120px;color:#333">Логин:</font> '.$login.'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Пароль:</font> '.$_POST['password'].'</p>
	<p><font style="display:inline-block;width:120px;color:#333">Ссылка для активации:</font> <a href="'.HOME.LANG.'/activation?code='.$code.'">'.HOME.LANG.'/activation?code='.$code.'</a></p>
	<p align=Center style="color:#000;margin-top:25px;">При возникновении вопросов пишите нам info@moldovatruck.md</p></div>
	</div>
</body>

</html>';
		$send = send_mail('s1.magicnet.md',465,'ssl',true,'Moldovatruck','registration@moldovatruck.md','Wg^psD{W;r8t',"{$name} {$lastname}",$email,'UTF-8','Регистрация на сайте',$body);
				
				if ($send)
				{ 
					echo "<p class='alert alert-dismissible alert-success' id='".$_POST['form_name']."' style='text-align:center;display:block;margin-bottom:2em;'>Письмо с активацией отправлено на вашу почту. Благодарим за регистрацию</a></p>";
					define('INSERTED',true);
					$inserted = true;
				}else echo $send;
			}
			else echo mysqli_error($CONNECTION);
		}
			
		
	}else echo 'Заполните пожалуйста обязательные поля!';
}
?>