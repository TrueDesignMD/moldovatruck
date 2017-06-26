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

if (!defined('INSERTED')&&!empty($_POST)&&$_POST['form_name']==$ANOTHER&&empty($_SESSION['user']))
{
 		
		$login = mysqli_real_escape_string($CONNECTION,$_POST['login']);
		$password = mysqli_real_escape_string($CONNECTION,$_POST['password']);
	
		$getUSER = mysqli_query($CONNECTION,"SELECT `password`,`userID`,`Email`,`activated`,`userType` FROM `".DB_PREFIX."users` WHERE `login`='$login'");
		if (mysqli_num_rows($getUSER)==0) $err_message = '<p class="alert alert-dismissible alert-danger">Такой пользователь не найден</p>';
		else
		{
			$user = mysqli_fetch_array($getUSER);
			if ($user['activated']==0) $err_message = '<p class="alert alert-dismissible alert-danger">Вы не поддтвердили Email. Письмо выслано на почту <b>'.$user['Email'].'</b></p>';
			
			else
			{
				if (password_verify($password,$user['password']))
				{
					$_SESSION['user'] = $user['userID'];
					$_SESSION['group'] = $user['useType'];
					echo '<html><head><meta http-equiv="refresh" content="0;URL='.HOME.LANG.'/forum" /></head></html>';
				}
				else $err_message = '<p class="alert alert-dismissible alert-danger">Неверный пароль!</b></p>';
			}
		
		}
			
		
	
}

if ((empty($_SESSION['user']) and !$inserted)&&(!isset($succes_message) or $succes_message == "")) {	
	?>
    <form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#'.$ANOTHER; ?>" method="POST" name="<?php echo $ANOTHER;?>" id="<?php echo $ANOTHER;?>" onsubmit="enter('<?php echo $ANOTHER;?>','login,password','<?php if($mosConfig_lang=='ru') echo 'Email';
											 elseif($mosConfig_lang=='ro') echo 'Email';
											 elseif($mosConfig_lang=='en') echo 'Email'; ?>!<?php if($mosConfig_lang=='ru') echo 'Пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?>');return false;" style="text-align:center;">
    <p class="alert alert-dismissible alert-danger" id="err_message" style="text-align:center;display:none;color:white"><?php echo $err_message; ?></p>
    <table class="bold" style="min-width:300px; max-width:80%;">
<tr>
<td align="left" style="padding-bottom:8px;min-width:180px;">
    <label><?php if($mosConfig_lang=='ru') echo 'Email';
											 elseif($mosConfig_lang=='ro') echo 'Email';
											 elseif($mosConfig_lang=='en') echo 'Email'; ?></label>
</td>
<td><input type="text" class="form-control" id="login" name="login" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/></td></tr>
<tr>

<td align="left" style="padding-bottom:8px;">    <label><?php if($mosConfig_lang=='ru') echo 'Пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?></label></td>
<td align="left" style="padding-bottom:8px;"><input type="password" class="form-control" id="password" name="password" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/></td></tr>

<tr>
<td style="padding-bottom:10px"></td>
<td style="padding-bottom:10px;text-align:center">
<input type="submit" name="cargo_sm" class="btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Вход"; }
								elseif ($mosConfig_lang == 'ro') { echo "Intra"; }
								elseif ($mosConfig_lang == 'en') { echo "Enter"; }
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
<a href="#" onclick="$('#Autorize').modal('hide')" data-toggle="modal" data-target="#Forgot">Восстановить пароль</a><br>
<a href="#" onclick="$('#Autorize').modal('hide')" data-toggle="modal" data-target="#Register">Регистрация</a>
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