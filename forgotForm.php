<?php
$mosConfig_lang = LANG;

if ((empty($_SESSION['user']) and !$inserted)&&(!isset($succes_message) or $succes_message == "")) {	
	?>
    <form action="<?php echo str_replace("&amp;","&",$_SERVER["REQUEST_URI"]).'#formb'; ?>" method="POST" name="formb" id="formb" onsubmit="forgot('formb','row','<?php if($mosConfig_lang=='ru') echo 'Поле';
											 elseif($mosConfig_lang=='ro') echo 'Cimpul';
											 elseif($mosConfig_lang=='en') echo 'Row'; ?>');return false;" style="text-align:center;">
<p class="alert alert-dismissible alert-danger" id="err_message" style="text-align:center;display:none"><?php echo $err_message; ?></p>


<?php
if ($mosConfig_lang=='ru') echo 'Для востановления пароля введите логин или Email указанный при регистрации';
if ($mosConfig_lang=='ro') echo 'Pentru a schimba parola introduceti login-ul sau Email ';
if ($mosConfig_lang=='en') echo 'To change password write login or Email ';
?><input type="text" class="form-control" id="row" name="row" style="width:100%;padding: 3px 5px;font-size: 1em;"/>

<input type="submit" name="cargo_sm" class="btn btn-success" value="<?php if($mosConfig_lang == 'ru') { echo "Отправить"; }
								elseif ($mosConfig_lang == 'ro') { echo "Tremite"; }
								elseif ($mosConfig_lang == 'en') { echo "Send"; }
								?>" id="submit" style="padding:5px;margin-top:1em"/>
<script>
formW = $('#<?php echo $ANOTHER; ?>').width();
tableW = $('#<?php echo $ANOTHER; ?> table').width();
calc = 0.5*(formW - tableW);
$('#<?php echo $ANOTHER; ?> table').css('margin-left',calc+'px');
function forgot(From,Rows,Title)
{
	if ($('#'+From+' #'+Rows).val()=='') {
		alert('Пусто');
	}else
	$.post(home_url+'forgot.php', {row:$('#'+From+' #'+Rows).val()},function(data){
		console.log(data);
		$('#'+From).html(data);
	});
}
</script>

<input type="hidden" value="formb" name="form_name" />
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