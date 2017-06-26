<?php
if (isset($_SESSION['user'])&&$_SESSION['group']=='admin')
{
echo'
<h1 style="width:100%">Добавление категории</h1>
<div class="col-md-6  col-xs-12 col-sm-12" style="margin-top:1em;padding:0px;margin-bottom:2em">
<label class="col-md-2  col-xs-4 col-sm-4" style="margin-top:0.5em;" id="title1">Название категории: </label>
<div class="col-md-10  col-xs-8 col-sm-8" style="margin-top:0em;padding:0px">
	<input type="text" id="title" class="form-control" placeholder="Заголовок категории">
</div>
</div>
<div class="col-md-6  col-xs-12 col-sm-12" style="margin-top:1em;padding:0px;">
<select class="form-conrtol" id="category" onchange="c()">
						<option value="0">Без категории</option>';
$getCategories = mysqli_query($CONNECTION,"SELECT `title`,`forumCatID` FROM `".DB_PREFIX."forum_category` WHERE `Parent`='0' AND `isEnabled`='1'");
if (mysqli_num_rows($getCategories)>0)
{
	$Cats = array();
	$CategoriesForum = mysqli_fetch_array($getCategories);
	do
	{
		echo '<option value="'.$CategoriesForum['forumCatID'].'">'.$CategoriesForum['title'].'</option>';			
				
	}
	while($CategoriesForum = mysqli_fetch_array($getCategories));
}
echo'</select>
</div>
<input type="text" id="desc" class="form-control" class="col-md-12  col-xs-12 col-sm-12" style="margin-top:1em;margin-bottom:2em;" placeholder="Описание форума(для категории не заполнять)" >
';
?>
<p id="err_message" class='alert alert-dismissible alert-danger' style="text-align:center;display:none">Длина текста должна быть не менее 15 символов</p>
    
    <div style="text-align:center;margin-top:1em;width:100%"><button class="btn btn-info" onclick="AddComment()">Добавить</button></div>
    <script>
	function is_numeric( mixed_var ) {	
		return !isNaN( mixed_var );
	}
	
	function c()
	{
		if ($('#category').val()==''||parseInt($('#category').val())==0) 
		{
			$('#title1').html('Название категории');
			$('h1').html('Добавление категории');
			$('#title').attr('placeholder','Заголовок категории');
					}
		else
		{
			$('#title1').html('Название форума');
			$('h1').html('Добавление форурма');
			$('#title').attr('placeholder','Заголовок форума');
		}
	}
	
	function AddComment() {	
		cat = $('#category').val();
		title = $('#title').val();
		if(cat!==0) desc = $('#desc').val(); else desc='';
		alerts = '';
		
		if (title=='') alerts+='Название не указано<br>';
		
		if (title=='') 
		{
			
			$('#err_message').html(alerts.substr(0,alerts.length-4));
			$('#err_message').css('display','block');
			
		}
		else
		{
			
			$.post(home_url+'forum/acat.php', {cat:cat,title:title,desc:desc},function(data){
				console.log(data);
				if(is_numeric(data)) location.replace(home_url+'<?php echo LANG.'/forum?category='; ?>'+data);
				else {
					$('#err_message').css('display','block');
					$('#err_message').html(data);
				}
			});
		}
		
	}
	
	</script>            
<?php
}else echo 'Нет доступа';
						
?>