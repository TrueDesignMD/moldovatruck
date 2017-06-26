<?php

if (isset($_SESSION['user']))
{
echo'
<h1 style="width:100%">Добавление темы на форум</h1>';
if (count($BROMS_)>0){
							echo '<a href="'.HOME.$URL.'">Все форумы</a>';
							if (!empty($BROMS_[0])) echo ' › категория <a href="'.$BROMS_[0][1].'">'.$BROMS_[0][0].'</a>';
							if (!empty($BROMS_[1])) echo ' › форум <a href="'.$BROMS_[1][1].'">'.$BROMS_[1][0].'</a>';
						}echo '<br>';
echo'
<div class="col-md-6  col-xs-12 col-sm-12" style="margin-top:1em;padding:0px;margin-bottom:2em">
	<label>Тема форума: </label><br>
	<div class="col-md-12  col-xs-12 col-sm-12" style="margin-top:0em;padding:0px;padding-right:0.5em">
		<input type="text" id="title" class="form-control" placeholder="Напишите заголовок вашей темы для форума">
	</div>
</div>
<div class="col-md-6  col-xs-12 col-sm-12" style="margin-top:1em;padding:0px;">
<label>Название форума: </label><br>
<div class="col-md-12  col-xs-12 col-sm-12" style="margin-top:0em;padding:0px">
<select class="form-conrtol" id="category">
						<option>Выберите категорию</option>';
						

$getCategories = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='0' AND `isEnabled`='1'");
if (mysqli_num_rows($getCategories)>0)
{
	$Cats = array();
	$CategoriesForum = mysqli_fetch_array($getCategories);
	do
	{
		$getChilds = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='$CategoriesForum[forumCatID]' AND `isEnabled`='1'");
		echo '<optgroup label="'.$CategoriesForum['title'].'">';
		if(mysqli_num_rows($getChilds)>0)
		{
	 		$Childs = mysqli_fetch_array($getChilds);
			do
			if($_SESSION['category']==$Childs['forumCatID']) echo '<option value="'.$Childs['forumCatID'].'" selected="selected">'.$Childs['title'].'</option>';			
			else echo '<option value="'.$Childs['forumCatID'].'">'.$Childs['title'].'</option>';			
			while($Childs = mysqli_fetch_array($getChilds));
		}
		echo'</optgroup>';
	}
	while($CategoriesForum = mysqli_fetch_array($getCategories));
}
echo'</select>
</div>
</div>
<div class="col-md-12  col-xs-12 col-sm-12" style="margin-bottom:1em;padding:0px;">
<label>Опишите кратко суть темы: </label><br>
<input type="text" id="desc" class="form-control" placeholder="Опишите кратко суть темы">
</div>
';
?>
<h3 style="margin-top:5em">Текст сообщения:</h3>
<p id="err_message" class='alert alert-dismissible alert-danger' style="text-align:center;display:none">Длина текста должна быть не менее 15 символов</p>
    <textarea id="editor" placeholder="Here your text"></textarea>
    <div style="text-align:center;margin-top:1em"><input type="checkbox" id="send" name="send" /> Получать комментарии на почту</div>
    <div style="text-align:center;margin-top:1em"><button class="btn btn-info" onclick="AddComment()">Добавить тему</button></div>
   
    
    <script>
	function is_numeric( mixed_var ) {	
		return !isNaN( mixed_var );
	}

	function AddComment() {	
		text = CKEDITOR.instances.editor.getData();
		cat = $('#category').val();
		desc = $('#desc').val();
		title = $('#title').val();
		send = $('#send').prop('checked');
		alerts = '';
		
		if (text.length<15) alerts+='Длина текста должна быть не менее 15 символов<br>';
		if (title=='') alerts+='Тема не указана<br>';
		if (cat==''||cat==0) alerts+='Категория не выбрана<br>';
		
		if (text.length<15) 
		{
			
			$('#err_message').html(alerts.substr(0,alerts.length-4));
			$('#err_message').css('display','block');
			
		}
		else
		{
			
			$.post(home_url+'forum/atopic.php', {text:text,cat:cat,title:title,desc:desc,send:send},function(data){
				console.log(data);
				if(is_numeric(data)) location.replace(home_url+'<?php echo LANG.'/forum?topic='; ?>'+data);
				else {
					$('#err_message').css('display','block');
					$('#err_message').html(data);
				}
			});
		}
		
	}
	initSample();
	function fnc1()
	{
		return 0;
		
	}
	$(document).ready(function(){
		setTimeout(fnc1,1000);
	});
	
	</script>            
<?php
}else echo 'Вы не авторизированы';
						
?>