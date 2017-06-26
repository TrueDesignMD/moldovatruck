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



if ((empty($_SESSION['user']) and !$inserted)&&(!isset($succes_message) or $succes_message == "")) {
		
	?>
    <form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#'.$ANOTHER; ?>" method="POST" name="<?php echo $ANOTHER;?>" id="<?php echo $ANOTHER;?>" onsubmit=" reg('<?php echo $ANOTHER;?>','login,name,lastname,password,confirm,code,email','<?php if($mosConfig_lang=='ru') echo 'Логин';
											 elseif($mosConfig_lang=='ro') echo 'Login';
											 elseif($mosConfig_lang=='en') echo 'Login'; ?>!<?php if($mosConfig_lang=='ru') echo 'Имя';
											 elseif($mosConfig_lang=='ro') echo 'Nume';
											 elseif($mosConfig_lang=='en') echo 'First name'; ?>!<?php if($mosConfig_lang=='ru') echo 'Фамилия';
											 elseif($mosConfig_lang=='ro') echo 'Preume';
											 elseif($mosConfig_lang=='en') echo 'Last name'; ?>!<?php if($mosConfig_lang=='ru') echo 'Пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?>!<?php if($mosConfig_lang=='ru') echo 'Повторный пароль';
											 elseif($mosConfig_lang=='ro') echo 'Repetati parola';
											 elseif($mosConfig_lang=='en') echo 'Repeat password'; ?>!<?php if($mosConfig_lang=='ru') echo 'Код';
											 elseif($mosConfig_lang=='ro') echo 'Introduceti code';
											 elseif($mosConfig_lang=='en') echo 'Enter captcha'; ?>!Email');return false" style="text-align:center;">
    <p class="alert alert-dismissible alert-danger" id="err_message" style="text-align:center;display:none"><?php echo $err_message; ?></p>
    <table class="bold" style="min-width:300px; max-width:80%;">
<tr>
<td align="left" style="padding-bottom:8px;min-width:180px;">
    <label><?php if($mosConfig_lang=='ru') echo 'Логин';
											 elseif($mosConfig_lang=='ro') echo 'Login';
											 elseif($mosConfig_lang=='en') echo 'Login'; ?></label>
</td>
<td><input type="text" class="form-control" id="login" name="login" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto" value="<?=$_POST['login']?>"/></td></tr>
<tr>
<td align="left" style="padding-bottom:8px;"><label>Email</label></td>
<td><input type="email" class="form-control" id="email" name="email" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto" value="<?=$_POST['email']?>"/></td></tr>
<tr>
<td align="left" style="padding-bottom:8px;"><label><?php if($mosConfig_lang=='ru') echo 'Имя';
											 elseif($mosConfig_lang=='ro') echo 'Nume';
											 elseif($mosConfig_lang=='en') echo 'First name'; ?></label></td>
<td align="left" style="padding-bottom:8px;"><input type="text" class="form-control" id="name" name="name" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto" <?=$_POST['name']?>/></td></tr><tr>
<td align="left" style="padding-bottom:8px;">    <label><?php if($mosConfig_lang=='ru') echo 'Фамилия';
											 elseif($mosConfig_lang=='ro') echo 'Preume';
											 elseif($mosConfig_lang=='en') echo 'Last name'; ?></label></td>
<td><input type="text" class="form-control" id="lastname" name="lastname" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto" <?=$_POST['lastname']?>/></td></tr><tr>

<td align="left" style="padding-bottom:8px;">    <label><?php if($mosConfig_lang=='ru') echo 'Пароль';
											 elseif($mosConfig_lang=='ro') echo 'Parola';
											 elseif($mosConfig_lang=='en') echo 'Password'; ?></label></td>
<td align="left" style="padding-bottom:8px;"><input type="password" class="form-control" id="password" name="password" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/></td></tr>
<td align="left" style="padding-bottom:8px;"><label><?php if($mosConfig_lang=='ru') echo 'Повторите пароль';
											 elseif($mosConfig_lang=='ro') echo 'Repetati parola';
											 elseif($mosConfig_lang=='en') echo 'Repeat password'; ?></label></td>
<td><input type="password" class="form-control" id="confirm" name="confirm" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/></td>

</tr>
<td align="left" style="padding-bottom:8px;"><label><?php if($mosConfig_lang=='ru') echo 'Введите символы';
											 elseif($mosConfig_lang=='ro') echo 'Introduceti code';
											 elseif($mosConfig_lang=='en') echo 'Enter captcha'; ?></label>
                                             <br><img src="<?php echo HOME.'kcaptcha.php?'.session_name()?>=<?php echo session_id()?>" id="k">
                                             </td>
<td>
<input type="text" class="form-control" id="code" name="code" style="width:100%;padding: 3px 5px;font-size: 1em;height:auto"/>
</td>

</tr>
<tr>
<td style="padding-bottom:10px"></td>
<td style="padding-bottom:10px;">
<input type="submit" name="cargo_sm" class="btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Регистрация"; }
								elseif ($mosConfig_lang == 'ro') { echo "Inregistrare"; }
								elseif ($mosConfig_lang == 'en') { echo "Registration"; }
								?>" id="submit" style="padding:5px;font-size:"/>
</td>
</tr>
</table>
Регистрируясь вы соглашаетесь с <a href="<?php echo HOME.LANG;?>/usloviyaispolyzovaniya">условиями пользования</a>.
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