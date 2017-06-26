<?php
session_start();
session_name("MoldovaTruck");
$mosConfig_lang = LANG;


if (!defined('FORMS')) {$ANOTHER = 'forma'; $num=0;define('FORMS',$ANOTHER);}
else
{
	$FORMS = FORMS;
	if ($FORMS=='forma') {$ANOTHER='formc';$num=1;}
	else {$ANOTHER = 'formb';$num=2;}
}

if (empty($_SESSION['user'])and !defined('INSERTED')&&!empty($_POST)&&$_POST['form_name']==$ANOTHER)
{
 	if ($_POST['password']!==$_POST['confirm']) 
	{
		echo 'Пароли не совпадают';
		exit;
	}
	$getUser = mysqli_query($CONNECTION,"SELECT `userID`,`seconds` FROM `".DB_PREFIX."forgot` WHERE `code`='".htmlspecialchars($_GET['code'],ENT_QUOTES)."'");
	$user = mysqli_fetch_array($getUser);
	if (time()-$user['seconds']>7200) exit('Ссылке более 2-х часов. Изменение пароля не действительно. Пройдите заново <a href="'.HOME.LANG.'/forgot">процесс смены пароля</a>');
	
	if (isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] === $_POST['code'])
	{
		$code = explode('code=',$_SERVER['HTTP_REFERER']);
		$code = $code[1];
		$password = password_hash(mysqli_real_escape_string($CONNECTION,$_POST['password']),PASSWORD_DEFAULT);
		
				
		$update  = mysqli_query($CONNECTION,"UPDATE `".DB_PREFIX."users` SET `Password`='$password' WHERE `userID`='$user[userID]'");
		if($update)		
		{
			$_SESSION['user'] = $user['userID'];
			echo '<html><head><meta http-equiv="refresh" content="0;URL='.HOME.LANG.'/forum" /></head></html>';
		}
	}
	else $err_message = 'Символы не верны';
}

if ((empty($_SESSION['user']) and !$inserted)&&(!isset($succes_message) or $succes_message == "")) {
		
		$_GET['code'] = htmlspecialchars($_GET['code'],ENT_QUOTES);
		if (empty($_GET['code'])) $err_message = 'Код не указан';
		$getUser = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."forgot` WHERE `code`='$_GET[code]'");
		if(mysqli_num_rows($getUser)==0) $err_message = 'Неверный код';
		else $forgot = mysqli_fetch_array($getUser);
		if (time()-$forgot['seconds']>7200) $err_message = 'Ссылке более 2-х часов. Изменение пароля не действительно. Пройдите заново <a href="'.HOME.LANG.'/forgot" style="color:white;text-decoration:underline">процесс смены пароля</a>';
		
	?>
    <form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#'.$ANOTHER; ?>" method="POST" name="<?php echo $ANOTHER;?>" id="<?php echo $ANOTHER;?>" onsubmit=" return sendForm('<?php echo $ANOTHER;?>','password,confirm,code','<?php if($mosConfig_lang=='ru') echo 'Новый пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?>!<?php if($mosConfig_lang=='ru') echo 'Повоторите новый пароль';
											 elseif($mosConfig_lang=='ro') echo 'Repetati parola';
											 elseif($mosConfig_lang=='en') echo 'Repeat password'; ?>!<?php if($mosConfig_lang=='ru') echo 'Код';
											 elseif($mosConfig_lang=='ro') echo 'Introduceti code';
											 elseif($mosConfig_lang=='en') echo 'Enter captcha'; ?>');" style="text-align:center;">
    <p class="alert alert-dismissible alert-danger" id="err_message" style="text-align:center;<?php if(!isset($err_message)) echo 'display:none'; ?>"><?php echo $err_message; ?></p>
    <table class="bold" style="min-width:300px; max-width:80%;">
<tr>
<td align="left" style="padding-bottom:8px;">    <label><?php if($mosConfig_lang=='ru') echo 'Новый пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?></label></td>
<td align="left" style="padding-bottom:8px;"><input type="password" class="form-control" id="password" name="password" style="width:100%;padding: 3px 5px;font-size: 1em;" placeholder="Введите новый пароль" autocomplete="off"/></td></tr>
<td align="left" style="padding-bottom:8px;"><label><?php if($mosConfig_lang=='ru') echo 'Повторите новый пароль';
											 elseif($mosConfig_lang=='ro') echo 'Repetati parola';
											 elseif($mosConfig_lang=='en') echo 'Repeat password'; ?></label></td>
<td><input type="password" class="form-control" id="confirm" name="confirm" style="width:100%;padding: 3px 5px;font-size: 1em;" placeholder="Повторите новый пароль"  autocomplete="off"/></td>

</tr>
<td align="left" style="padding-bottom:8px;"><label><?php if($mosConfig_lang=='ru') echo 'Введите символы';
											 elseif($mosConfig_lang=='ro') echo 'Introduceti code';
											 elseif($mosConfig_lang=='en') echo 'Enter captcha'; ?></label>
                                             <br><img src="<?php echo HOME.'kcaptcha.php?'.session_name();?>=<?php echo md5(time())?>">
                                             </td>
<td>
<input type="text" class="form-control" id="code" name="code" style="width:100%;padding: 3px 5px;font-size: 1em;"/>
</td>

</tr>
<tr>
<td style="padding-bottom:10px"></td>
<td style="padding-bottom:10px;">
<input type="submit" name="cargo_sm" class="btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Смена пароля"; }
								elseif ($mosConfig_lang == 'ro') { echo "Schimbarea parolei"; }
								elseif ($mosConfig_lang == 'en') { echo "Change password"; }
								?>" id="submit" style="padding:5px;font-size:"/>
</td>
</tr>
</table>
<script>
formW = $('#<?php echo $ANOTHER; ?>').width();
tableW = $('#<?php echo $ANOTHER; ?> table').width();
calc = 0.5*(formW - tableW);
$('#<?php echo $ANOTHER; ?> table').css('margin-left',calc+'px');
</script>

<input type="hidden" value="<? echo $ANOTHER;?>" name="form_name" />
</form>
<?php
} else {
	if (empty($_SESSION['user']))
	{
		if (!empty($succes_message)) echo $succes_message;
		else echo 'Данная форма уже ноходится на странице';
	}else echo 'Вы уже авторизированы';
	}
	?>