<?php
session_start();
session_name("MoldovaTruck");
require_once "../system/configuration.php";
require_once "../system/functions.php";

$id = htmlspecialchars($_POST['id'],ENT_QUOTES);
$action = htmlspecialchars($_POST['action'],ENT_QUOTES);

if ($action=='category')
{
	$getCategory = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$id'");
	if (mysqli_num_rows($getCategory)>0)
	{
		$category = mysqli_fetch_array($getCategory);
		?>
        <p id="err_message" class="alert alert-dismissible alert-danger" style="display:none"></p>
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle"><?php if($category['Parent']==0) echo 'Название категории'; else echo 'Название форума';  ?></label>        
        <input type="text" class="form-control" id="title" placeholder="<?php if($category['Parent']==0) echo 'Название категории'; else echo 'Название форума';  ?>"  value="<?php echo htmlspecialchars_decode($category['title']); ?>"/>       
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta title</label>        
        <input type="text" class="form-control" id="metatitle" placeholder="Meta заголовок раздела" value="<?php echo htmlspecialchars_decode($category['MetaTitle']); ?>"/>       
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta description</label>       
        <input type="text" class="form-control" id="metadesc" placeholder="Meta описание раздела" value="<?php echo htmlspecialchars_decode($category['MetaDescription']); ?>"/>     
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta keywords</label>       
        <input type="text" class="form-control" id="metakeys" placeholder="Meta ключевые слова" value="<?php echo htmlspecialchars_decode($category['MetaTags']); ?>"/>
        
         <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle"><?php if($category['Parent']==0) echo 'Описание категории'; else echo 'Описание форума';  ?></label>       
        <input type="text" class="form-control" id="desc" placeholder="<?php if($category['Parent']==0) echo 'Описание категории'; else echo 'Описание форума';  ?>" value="<?php echo htmlspecialchars_decode($category['Description']); ?>"/>
        
        
        <?php
		$getCats = mysqli_query($CONNECTION,"SELECT `title`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='0' AND `isEnabled`='1'");
		if (mysqli_num_rows($getCats)>0)
			{
				$cats = mysqli_fetch_array($getCats);
				echo '<select id="parent" class="form-control" style="margin-top:1em"><option>Без родительской категории</option>';
				do
				{
					if ($cats['forumCatID']==$category['Parent']) echo '<option value="'.$cats['forumCatID'].'" selected="selected">'.$cats['title'].'</option>';
					else echo '<option value="'.$cats['forumCatID'].'">'.$cats['title'].'</option>';
				}
				while($cats = mysqli_fetch_array($getCats));
				echo '</select>';
			}
			
		?>
        <input type="hidden" value="<?php echo $id; ?>" id="id"/>
       <div style="margin-top:1em; text-align:center"> <button class="btn btn-success" onclick="editCategory()" style="margin-left:0.25em;margin-right:0.25em;"><?php if($category['Parent']==0) echo 'Изменить категорию'; else echo 'Изменить форум';  ?></button> <button class="btn btn-danger" onclick="dellCategory()" style="margin-left:0.25em;margin-right:0.25em;"><?php if($category['Parent']==0) echo 'Удалить категорию'; else echo 'Удалить форум';  ?></button></div>
       
       <script>
	   function dellCategory()
	   {
		   $('#err_message').css('display','none');
		   if (confirm("Вы точно хотите удалить данную категорию?") == true) {
			   $.post(home_url+'forum/dellcategory.php', {id:parseInt($('#id').val())},function(data){
			if (data=='ok') location.replace(home_url+'ru/forum');
			else {
				$('#err_message').css('display','block');
				$('#err_message').html(data);
			}
		});
		   }
	   }
	   function editCategory()
	   {
		    $('#err_message').css('display','none');
			title = $('#title').val();
			desc = $('#desc').val();
			metatitle = $('#metatitle').val();
			metadesc = $('#metadesc').val();
			metakeys = $('#metakeys').val();
			parent = $('#parent').val();
			alerts = '';
			
			if (title=='') alerts+='Название, ';
			if (metatitle=='') alerts+='Meta title, ';
			if (metadesc=='') alerts+='Meta description, ';
			if (metakeys=='') alerts+='Meta keywords, ';
			
			if(alerts!==''){
				 $('#err_message').css('display','block');
				 $('#err_message').html(alerts.substr(0,alerts.length-2)+' не заполнены');
			}
			else
			{
				$.post(home_url+'forum/editcategory.php', {id:parseInt($('#id').val()),title:title,metatitle:metatitle,metadesc:metadesc,desc:desc,metakey:metakeys,parent:parent},function(data){
					if (data=='ok') location.reload(true);
					else {
						$('#err_message').css('display','block');
						$('#err_message').html(data);
					}
				});
			}
	   }
	   </script>
        <?php
	}
	else echo 'Категория не найдена';
}
if ($action=='topic')
{
	$getTopic = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$id'");
	if (mysqli_num_rows($getTopic)>0)
	{
		$Topic = mysqli_fetch_array($getTopic);
		?>
        <p id="err_message" class="alert alert-dismissible alert-danger" style="display:none"></p>
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Название темы</label>        
        <input type="text" class="form-control" id="title" placeholder="Название темы"  value="<?php echo htmlspecialchars_decode($Topic['title']); ?>"/>       
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta title</label>        
        <input type="text" class="form-control" id="metatitle" placeholder="Meta заголовок темы" value="<?php echo htmlspecialchars_decode($Topic['MetaTitle']); ?>"/>       
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta description</label>       
        <input type="text" class="form-control" id="metadesc" placeholder="Meta описание темы" value="<?php echo htmlspecialchars_decode($Topic['MetaDescription']); ?>"/>     
        <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Meta keywords</label>       
        <input type="text" class="form-control" id="metakeys" placeholder="Meta ключевые слова" value="<?php echo htmlspecialchars_decode($Topic['MetaTags']); ?>"/>
        
         <?php
		$getCategories = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='0' AND `isEnabled`='1'");
					if (mysqli_num_rows($getCategories)>0)
					{
						echo'<select class="form-conrtol" id="parent" style="margin-top:1em">';
						$CategoriesForum = mysqli_fetch_array($getCategories);
						do
						{
							$getChilds = mysqli_query($CONNECTION,"SELECT `title`,`Parent`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='$CategoriesForum[forumCatID]' AND `isEnabled`='1'");
							echo '<optgroup label="'.$CategoriesForum['title'].'">';
							if(mysqli_num_rows($getChilds)>0)
							{
								$Childs = mysqli_fetch_array($getChilds);
								do
								{
									if ($Childs['forumCatID']==$Topic['forumCatID']) echo '<option value="'.$Childs['forumCatID'].'" selected="selected">'.$Childs['title'].'</option>';
									else	echo '<option value="'.$Childs['forumCatID'].'">'.$Childs['title'].'</option>';
								}
								while($Childs = mysqli_fetch_array($getChilds));
							}
							echo'</optgroup>';
						}
						while($CategoriesForum = mysqli_fetch_array($getCategories));
						echo '</select>';
					}
		?>
        <textarea id="hid" style="display:none"><?php echo htmlspecialchars_decode($Topic['text']); ?></textarea>
         <textarea id="Admin_editor" placeholder="Here your text"></textarea>
        <input type="hidden" value="<?php echo $id; ?>" id="id"/>
       <div style="margin-top:1em; text-align:center"> <button class="btn btn-success" onclick="editTopic()" style="margin-left:0.25em;margin-right:0.25em;">Изменить тему</button> <button class="btn btn-danger" onclick="dellTopic()" style="margin-left:0.25em;margin-right:0.25em;">Удалить тему</button></div>
       <script>
	   var initSample2 = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'Admin_editor' );

		// :(((
		if ( isBBCodeBuiltIn ) {
			editorElement.setHtml(
				'Hello world!\n\n' +
				'I\'m an instance of [url=http://ckeditor.com]CKEditor[/url].'
			);
		}

		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'Admin_editor' );
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'Admin_editor' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();
	   initSample2();
	   CKEDITOR.instances.Admin_editor.setData($('#hid').val());
		function fnc2()
		{
			return 0;
		}
		$(document).ready(function(){
			setTimeout(fnc2,1000);
		});
		function editTopic()
		{
			text = CKEDITOR.instances.Admin_editor.getData();
			title = $('#title').val();
			metatitle = $('#metatitle').val();
			metadesc = $('#metadesc').val();
			metakeys = $('#metakeys').val();
			parent = $('#parent').val();
			alerts = '';
			
			if (title=='') alerts+='Название, ';
			if (metatitle=='') alerts+='Meta title, ';
			if (metadesc=='') alerts+='Meta description, ';
			if (metakeys=='') alerts+='Meta keywords, ';
			if (parent=='') alerts+='Категория, ';
			if (text=='') alerts+='Текст, ';
			
			if(alerts!==''){
				 $('#err_message').css('display','block');
				 $('#err_message').html(alerts.substr(0,alerts.length-2)+' не заполнены')
			}
			else
			{
				$.post(home_url+'forum/edittopic.php', {id:parseInt($('#id').val()),title:title,metatitle:metatitle,metadesc:metadesc,text:text,metakey:metakeys,parent:parent},function(data){
					if (data=='ok') location.reload(true);
					else {
						$('#err_message').css('display','block');
						$('#err_message').html(data);
					}
				});
			}
		}
		function dellTopic()
	   {
		   $('#err_message').css('display','none');
		  if (confirm("Вы точно хотите удалить данную тему?") == true) {
			   $.post(home_url+'forum/delltopic.php', {id:parseInt($('#id').val())},function(data){
			if (data=='ok') location.replace(home_url+'ru/forum?category=<?php echo $Topic['forumCatID']; ?>');
			else {
				$('#err_message').css('display','block');
				$('#err_message').html(data);
			}
		});
		  }
	   }
		
	   </script>
        <?php
	}
	else echo 'не найдено';
}
if ($action=='user')
{
	if ($_SESSION['group']=='admin')
	{
		$getUser = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."users` WHERE `userID`='$id'");
		if (mysqli_num_rows($getUser)>0)
		{
			$user = mysqli_fetch_array($getUser);
			?>
            <p id="err_message" class="alert alert-dismissible alert-danger" style="display:none"></p>
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Имя</label>        
            <input type="text" class="form-control" id="name" placeholder="Имя"  value="<?php echo htmlspecialchars_decode($user['userName']); ?>"/>       
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Фамилия</label>        
            <input type="text" class="form-control" id="fullname" placeholder="Фамилия" value="<?php echo htmlspecialchars_decode($user['userFullname']); ?>"/>       
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Логин</label>       
            <input type="text" class="form-control" id="login" placeholder="Логин" value="<?php echo htmlspecialchars_decode($user['login']); ?>"/>     
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Email</label>       
            <input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo htmlspecialchars_decode($user['Email']); ?>"/>
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Сменить ваш пароль</label>       
            <input type="password" class="form-control" id="password" placeholder="Введите новый пароль" value=""/>
            <iframe style="width:100%;height:7em;border:none;margin-top:1em" src="<?php echo HOME.'forum/avatar.php?userID='.$id; ?>"></iframe>
        	<input type="hidden" value="<?php echo $id; ?>" id="id"/>
       <div style="margin-top:1em; text-align:center"> <button class="btn btn-success" onclick="editUser()" style="margin-left:0.25em;margin-right:0.25em;">Изменить профиль</button> <button class="btn btn-danger" onclick="dellUser()" style="margin-left:0.25em;margin-right:0.25em;">Удалить пользователя</button></div>
       <script>
	   
	   function editUser()
		{
			name = $('#name').val();
			fullname = $('#fullname').val();
			login = $('#login').val();
			email = $('#email').val();
			password = $('#password').val();
			alerts = '';
			
			if (name=='') alerts+='Имя, ';
			if (fullname=='') alerts+='Фамилия, ';
			if (login=='') alerts+='Логин, ';
			if (email=='') alerts+='Email, ';
			
			if(alerts!==''){
				 $('#err_message').css('display','block');
				 $('#err_message').html(alerts.substr(0,alerts.length-2)+' не заполнены')
			}
			else
			{
				$.post(home_url+'forum/edituser.php', {id:parseInt($('#id').val()),name:name,fullname:fullname,login:login,email:email,password:password},function(data){
					if (data=='ok') location.reload(true);
					else {
						$('#err_message').css('display','block');
						$('#err_message').html(data);
					}
				});
			}
		}
	   
	   function dellUser()
	   {
		   $('#err_message').css('display','none');
		   if (confirm("Вы точно хотите удалить данного пользователя?") == true) {
			   $.post(home_url+'forum/delluser.php', {id:parseInt($('#id').val())},function(data){
			if (data=='ok') location.replace(home_url+'ru/forum?user=0');
			else {
				$('#err_message').css('display','block');
				$('#err_message').html(data);
			}
		});
		   }
	   }
		
	   </script>
	   
            <?php
		}
		else echo 'не найдено пользователя';
	}
	if ($_SESSION['group']!=='admin'&&isset($_SESSION['user']))
	{
		$id = htmlspecialchars($_SESSION['user'],ENT_QUOTES);
		$getUser = mysqli_query($CONNECTION,"SELECT * FROM `".DB_PREFIX."users` WHERE `userID`='$id'");
		if (mysqli_num_rows($getUser)>0)
		{
			$user = mysqli_fetch_array($getUser);
			?>
            <p id="err_message" class="alert alert-dismissible alert-danger" style="display:none"></p>
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Имя</label>        
            <input type="text" class="form-control" id="name" placeholder="Имя"  value="<?php echo htmlspecialchars_decode($user['userName']); ?>"/>       
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Фамилия</label>        
            <input type="text" class="form-control" id="fullname" placeholder="Фамилия" value="<?php echo htmlspecialchars_decode($user['userFullname']); ?>"/>       
            <label style="padding-left:0px;margin-bottom:1em;" id="AdminTitle">Сменить ваш пароль</label>       
            <input type="password" class="form-control" id="password" placeholder="Введите новый пароль" value=""/>
            <iframe style="width:100%;height:7em;border:none;margin-top:1em" src="<?php echo HOME.'forum/avatar.php?userID='.$id; ?>"></iframe>
        	<input type="hidden" value="<?php echo $id; ?>" id="id"/>
       <div style="margin-top:1em; text-align:center"> <button class="btn btn-success" onclick="editUser()" style="margin-left:0.25em;margin-right:0.25em;">Изменить профиль</button>
       <script>
	   
	   function editUser()
		{
			name = $('#name').val();
			fullname = $('#fullname').val();
			password = $('#password').val();
			alerts = '';
			
			if (name=='') alerts+='Имя, ';
			if (fullname=='') alerts+='Фамилия, ';
			
			
			if(alerts!==''){
				 $('#err_message').css('display','block');
				 $('#err_message').html(alerts.substr(0,alerts.length-2)+' не заполнены')
			}
			else
			{
				$.post(home_url+'forum/edituser.php', {id:parseInt($('#id').val()),name:name,fullname:fullname,password:password},function(data){
					if (data=='ok') location.reload(true);
					else {
						$('#err_message').css('display','block');
						$('#err_message').html(data);
					}
				});
			}
		}
	   
	  
	 
		
	   </script>
	   
            <?php
		}
		else echo 'не найдено пользователя';
	}
}

?>