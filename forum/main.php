<style>
select, input[type="text"], input[type="password"], textarea,input[type="email"], .form-control {border-color:#217dbb}
a {text-decoration:none;}
</style>

<?php

if (!empty($_COOKIE['user'])) {
	$_SESSION['user'] = $_COOKIE['user'];
	$_SESSION['group'] = $_COOKIE['group'];
}
$URL = URL;
$BROMS_ = array();
$way = array();
function GetTitleByCat($cat)
{
	global $CONNECTION;
	$URL = URL;
	$Text = array();
	if (isset($cat)&&!empty($cat))
	{
		$getTitleCategory = mysqli_query($CONNECTION,"SELECT `title`,`Parent` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$cat'");
		if (mysqli_num_rows($getTitleCategory)>0)
		{
			$TitleCategory = mysqli_fetch_array($getTitleCategory);
			if ($TitleCategory['Parent']>0) $Text = GetTitleByCat($TitleCategory['Parent']);
			array_push($Text,array($TitleCategory['title'],HOME.$URL.'?category='.$cat));			
		}
	}
	return $Text;
}



	if (isset($_GET['category'])&&!empty($_GET['category']))
	{
		$BROMS_= GetTitleByCat($_GET['category']);
	}
	
	if (isset($_GET['topic'])&&!empty($_GET['topic']))
	{
		$getTitleTopic = mysqli_query($CONNECTION,"SELECT `title`,`forumCatID` FROM `".DB_PREFIX."forum_topic` WHERE `forumID`='$_GET[topic]'");
		if (mysqli_num_rows($getTitleTopic)>0)
		{
			$TitleTopic = mysqli_fetch_array($getTitleTopic);
			$BROMS_= GetTitleByCat($TitleTopic['forumCatID']);
			array_push($BROMS_,array($TitleTopic['title'],HOME.$URL.'?topic='.$_GET['topic']));
			
		}
	}
	if (isset($_GET['action'])&&$_GET['action']=='addtopic')array_push($BROMS_,array('Новая тема',HOME.$URL.'?action='.$_GET['action']));
	if (isset($_GET['action'])&&$_GET['action']=='addcategory')array_push($BROMS_,array('Новый раздел',HOME.$URL.'?action='.$_GET['action']));
	
	if (isset($_GET['action'])&&$_GET['action']=='newtopics')array_push($BROMS_,array('Новые темы',HOME.$URL.'?action='.$_GET['action']));
	if (isset($_GET['action'])&&$_GET['action']=='newmessages')array_push($BROMS_,array('Новые сообщения',HOME.$URL.'?action='.$_GET['action']));
	if (isset($_GET['action'])&&$_GET['action']=='changepass')array_push($BROMS_,array('Смена пароля',HOME.$URL.'?action='.$_GET['action']));
	if (isset($_GET['user'])&&$_GET['user']>0){
		array_push($BROMS_,array('Пользователи',HOME.$URL.'?user=0'));
		$getAuthor = mysqli_query($CONNECTION,"SELECT `userName`,`userFullname` FROM `".DB_PREFIX."users` WHERE `userID`='$_GET[user]'");
		if (mysqli_num_rows($getAuthor)>0)
		{
			$Author = mysqli_fetch_array($getAuthor);
			array_push($BROMS_,array($Author['userName'].' '.$Author['userFullname'],HOME.LANG.'/forum?user='.$_GET['user']));
		}
	}else if (isset($_GET['user'])&&$_GET['user']==0&&empty($_GET['action'])&&empty($_GET['category'])&&empty($_GET['topic'])) array_push($BROMS_,array('Пользователи',HOME.$URL.'?user=0'));
	


	$getTitleForum = mysqli_query($CONNECTION,"SELECT `pageName` FROM `".DB_PREFIX."pages` WHERE `URL`='$URL'");
	if (mysqli_num_rows($getTitleForum)>0) $titleForum = mysqli_fetch_array($getTitleForum);
	
	
	echo '
	<div class="col-md-12 col-xs-12 col-sm-12"  style="margin-bottom:1em;padding-left:0px;    margin-top: -3em;"><h3>Форум для транспортных консалтинговых грузовладельческих компаний</h3></div>
	<div class="col-md-8 col-xs-12 col-sm-6"  style="padding-left:0px;float:left" id="lblock">';
	echo '<a href="'.HOME.$URL.'">'.$titleForum['pageName'].'</a>';
	if (count($BROMS_)>0)
	for($k=0;$k<count($BROMS_);$k++)
	{
		echo ' › <a href="'.$BROMS_[$k][1].'">'.$BROMS_[$k][0].'</a>';
	}
	echo'</div>';
	if (isset($_GET['action'])&&$_GET['action']=='addtopic') {
		$BROMS_ = array();
		$BROMS_= GetTitleByCat($_SESSION['category']);
	}

function getUserInfo($userID)
{
	global $CONNECTION;
	$getAuthor = mysqli_query($CONNECTION,"SELECT `userName`,`userFullname` FROM `".DB_PREFIX."users` WHERE `userID`='$userID'");
	if (mysqli_num_rows($getAuthor)>0)
	{
		$Author = mysqli_fetch_array($getAuthor);
		$userAuthor = '<a href="'.HOME.LANG.'/forum?user='.$userID.'">'.$Author['userName'].' '.$Author['userFullname'].'</a>';
		}
	else $userAuthor = 'Пользователь удален';
	return $userAuthor;
}
function Date_($date)
{
	$explode = explode('-',substr($date,0,10));
	$date_ = $explode[2].' ';
	if ($explode[1]==1) $date_.='января ';
	if ($explode[1]==2) $date_.='февраля ';
	if ($explode[1]==3) $date_.='марта ';
	if ($explode[1]==4) $date_.='апреля ';
	if ($explode[1]==5) $date_.='мая ';
	if ($explode[1]==6) $date_.='июня ';
	if ($explode[1]==7) $date_.='июля ';
	if ($explode[1]==8) $date_.='августа ';
	if ($explode[1]==9) $date_.='сентября ';
	if ($explode[1]==10) $date_.='октября ';
	if ($explode[1]==11) $date_.='ноября ';
	if ($explode[1]==12) $date_.='декабря ';
	$date_.=$explode[0];
	if ($explode[0]==date('Y') and $explode[1]==date('m') and $explode[2]==date('d')) $date_ = 'Сегодня';
	return $date_;
}

function Last($array)
{
	global $CONNECTION;
	$Last = '';
	
	$Last.='<br>Посл: '.getUserInfo($array['userID']);
	
	
	$Last.='<br>'.Date_($array['timestamp']).' &nbsp &nbsp &nbsp'.substr($array['timestamp'],11,5);
	return $Last;
}

if (!isset($_SESSION['user']) or empty($_SESSION['user'])) $rightBlock = '<a href="#" data-toggle="modal" data-target="#Autorize">Авторизируйтесь</a> или <a href="#" data-toggle="modal" data-target="#Register">зарегистрируйтесь</a>';
if (isset($_SESSION['user'])) $rightBlock = 'Здравствуйте '.getUserInfo($_SESSION['user']).' <a href="'.HOME.'forum/logout.php" style="color:#999;font-size:0.8em">Выход</a>';

if (!empty($_GET['category']))
{
					 
	 $getParent = mysqli_query($CONNECTION,"SELECT `Parent` FROM `".DB_PREFIX."forum_category` WHERE `forumCatID`='$_GET[category]'");
	 if (mysqli_num_rows($getParent)>0)
	{
		$Parent = mysqli_fetch_array($getParent);
		 if ($Parent['Parent']==0) $params = "`Parent`='0' AND `forumCatID`='{$_GET[category]}'";
		 else $params = '';
	 }
	 else exit('Не найдена категория');
					 
	}else $params = "`Parent`='0'";

echo '
<div class="col-md-4 col-xs-12 col-sm-6"  style="margin-top:1em;padding-left:0px;" id="rblock">'.$rightBlock.'</div>';

echo'<div style="margin-top:9em;    padding: 0.2em;">
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="';
				if (!isset($_GET['user'])) echo 'active';
				echo'"><a href="'.HOME.LANG.'/forum">Форум</a></li>
                <li class="';
				if (isset($_GET['user'])) echo 'active';
				echo'"><a href="'.HOME.LANG.'/forum?user=0">Пользователи</a></li>
				<li><a href="#" data-toggle="modal" data-target="#Contacts_">Обратная связь</a></li>
			    </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade ';
				if (!isset($_GET['user'])) echo 'active in';
				echo'" id="forum">
                
				 
				 <div class="col-md-12  col-xs-12 col-sm-12" style="margin-top:0em;padding-left:0px" id="forumContent">';
				 
					if (!empty($_SESSION['search'])&&isset($_GET['page']))
					include('searchforum.php');
					else
					{
					if (empty($_GET['action'])&&empty($_GET['topic'])&&!(empty($params))) include ("home.php");
										
					if (!empty($_GET['category'])&&empty($params)&&empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['topic'])) include('category.php');
					if (!empty($_GET['topic'])&&empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])) include('topic.php');
					if (empty($_GET['topic'])&&!empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])&&$_GET['action']=='addtopic') include('addtopic.php');
					if (empty($_GET['topic'])&&!empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])&&$_GET['action']=='addcategory') include('addcategory.php');
					if (empty($_GET['topic'])&&!empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])&&$_GET['action']=='newmessages') include('newmessages.php');
					if (empty($_GET['topic'])&&!empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])&&$_GET['action']=='newtopics') include('newtopic.php');
					if (empty($_GET['topic'])&&!empty($_GET['action'])&&empty($_GET['user'])&&empty($_GET['category'])&&$_GET['action']=='changepass') include(dirname(__FILE__)."/../changepass.php");
					
					}
				$diference = time()-(15*60);
				$getLastVisits = mysqli_query($CONNECTION,"SELECT DISTINCT `ip`,`userID` FROM `".DB_PREFIX."activity` WHERE `timeseconds`>='$diference' AND `page` LIKE '%forum%'");
				if (mysqli_num_rows($getLastVisits)>0)
				{
					$guests = 0;
					$users_visit = 0;
					$userArray = array();
					$visit_list = '';
					$visitArray = array();
					$LAST = mysqli_fetch_array($getLastVisits);
					do
					{
						if ($LAST['userID']==0 and !in_array($LAST['ip'],$visitArray)) {
							array_push($visitArray, $LAST['ip']);
							$guests++;
						}
						elseif (!in_array($LAST['userID'],$userArray))
						{
							array_push($userArray,$LAST['userID']);
							$visit_list.=', '.getUserInfo($LAST['userID']);
							$users_visit++;
						}
					}
					while($LAST = mysqli_fetch_array($getLastVisits));
				}

				$q2 = "SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m-d')."%' AND `page` LIKE '%forum%' AND `userID`='0'";
				$q22 = "SELECT DISTINCT `userID` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m-d')."%' AND `page` LIKE '%forum%' AND `userID`<>'0'";

				$getLastVisitsToday = mysqli_query($CONNECTION,$q2);
				$getLastUsersToday = mysqli_query($CONNECTION,$q22);

				$q1 = "SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m-d', strtotime("-1 DAY"))."%' AND `page` LIKE '%forum%' AND `userID`='0'";
				$q11 = "SELECT DISTINCT `userID` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m-d', strtotime("-1 DAY"))."%' AND `page` LIKE '%forum%' AND `userID`<>'0'";

				$getLastVisitsYesterday = mysqli_query($CONNECTION,$q1);
				$getLastUsersYesterday = mysqli_query($CONNECTION,$q11);

				$q3 = "SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `datetime`>='".date('Y-m-d', strtotime("Monday this week"))."' AND `page` LIKE '%forum%' AND `userID`='0'";
				$q31 = "SELECT DISTINCT `userID` FROM `".DB_PREFIX."activity` WHERE `datetime`>='".date('Y-m-d', strtotime("Monday this week"))."' AND `page` LIKE '%forum%' AND `userID`<>'0'";


				$getLastVisitsWeek = mysqli_query($CONNECTION,$q3);
				$getLastUsersWeek = mysqli_query($CONNECTION,$q31);

				$q4 = "SELECT DISTINCT `ip` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m')."%' AND `page` LIKE '%forum%' AND `userID`='0'";
				$q41 = "SELECT DISTINCT `userID` FROM `".DB_PREFIX."activity` WHERE `datetime` LIKE '%".date('Y-m')."%' AND `page` LIKE '%forum%' AND `userID`<>'0'";

				$getLastVisitsMonth = mysqli_query($CONNECTION,$q4);
				$getLastUsersMonth = mysqli_query($CONNECTION,$q41);


				$countUsers = mysqli_query($CONNECTION,"SELECT `userID` FROM `".DB_PREFIX."users` WHERE `isEnabled`='1' AND `activated`='1'");
				$countParticipate = mysqli_query($CONNECTION,"SELECT DISTINCT `userID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1'");
				$countTopics = mysqli_query($CONNECTION,"SELECT DISTINCT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1' AND `ParentTopic`='0'");
				$countComm = mysqli_query($CONNECTION,"SELECT DISTINCT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `isEnabled`='1' AND `ParentTopic`<>'0'");

				?>
                
                <div style="background-color: #F4F7F9;    color: #666;margin-top:2em;padding:1em">
					<div>За последние 15 минут на форуме: <?php echo $guests.' гостей, ';  echo $users_visit.' пользователей'; ?><br><?php  echo mb_substr($visit_list,2,mb_strlen($visit_list,"UTF-8")-2,"UTF-8"); ?></div>
					<font style="display:inline-block;width:49%;"> За сегодня: <?php echo mysqli_num_rows($getLastVisitsToday).' гостей, ';  echo mysqli_num_rows($getLastUsersToday).' пользователей'; ?></font>
					<font style="display:inline-block;width:49%; text-align:right"> За вчера: <?php echo mysqli_num_rows($getLastVisitsYesterday).' гостей, ';  echo mysqli_num_rows($getLastUsersYesterday).' пользователей'; ?></font>
					<font style="display:inline-block;width:49%;"> За неделю: <?php echo mysqli_num_rows($getLastVisitsWeek).' гостей, ';  echo mysqli_num_rows($getLastUsersWeek).' пользователей'; ?></font>
					<font style="display:inline-block;width:49%; text-align:right"> За месяц: <?php echo mysqli_num_rows($getLastVisitsMonth).' гостей, ';  echo mysqli_num_rows($getLastUsersMonth).' пользователей'; ?></font>
                </div>
                
                <div style="background-color: #F4F7F9;    color: #666;margin-top:2em;padding:1em"> 
                <font style="display:inline-block;width:49%;">Всего зарегистрированно пользователей: <?php  echo mysqli_num_rows($countUsers); ?></font>
                <font style="display:inline-block;width:49%; text-align:right">Всего тем: <?php  echo mysqli_num_rows($countTopics); ?></font>
                <font style="display:inline-block;width:49%;">Приняло участие в обсуждении: <?php  echo mysqli_num_rows($countParticipate); ?></font>
                <font style="display:inline-block;width:49%; text-align:right">Всего комментариев: <?php  echo mysqli_num_rows($countComm); ?></font>
                </div>
                
                <?php		
				 echo'</div>
                </div>
                <div class="tab-pane fade';
				if (isset($_GET['user'])) echo ' active in';
				echo'" id="users">';
				echo'<div class="col-md-6" style="margin-top:1em;padding-left:0px;"><form action="#" method="post" style="display:inline-block;    width: 50%;" onsubmit="userSearch();return false"><input type="text" value="" placeholder="Имя, фамилия или логин" id="finduser" class="form-control" id="username" style="width:100%"></form></div>';
echo'<div class="col-md-4" style="margin-top:1em;padding-left:0px;"><select id="orderuser" class="form-control"><option value="topics_asc">Поиск пользователей по количеству тем по возрастанию</option><option value="topics_desc">Поиск пользователей по количеству тем по убыванию</option><option value="comments_asc">Поиск пользователей по количеству комментариев по возрастанию</option><option value="comments_desc">Поиск пользователей по количеству комментариев по убыванию</option></select></div>';
echo'<div class="col-md-2" style="margin-top:1em;padding-left:0px;padding-right:0px; text-align:right;"><button class="btn btn-info" onclick="userSearch2();">Поиск</button></div>
<div class="col-md-12" style="margin-top:1em;padding-left:0px;" id="userContent">';
                if ((int)$_GET['user']<1) include('users.php');
				if ((int)$_GET['user']>0) include('user.php');
				echo'</div></div>
               
               
              </div>
          </div>';

?>

<script>
loading= '<div class="cssload-loading" style="margin-top:3em"><div class="cssload-loading-circle cssload-loading-row1 cssload-loading-col3"></div><div class="cssload-loading-circle cssload-loading-row2 cssload-loading-col2"></div><div class="cssload-loading-circle cssload-loading-row2 cssload-loading-col3"></div><div class="cssload-loading-circle cssload-loading-row2 cssload-loading-col4"></div><div class="cssload-loading-circle cssload-loading-row3 cssload-loading-col1"></div><div class="cssload-loading-circle cssload-loading-row3 cssload-loading-col2"></div><div class="cssload-loading-circle cssload-loading-row3 cssload-loading-col3"></div><div class="cssload-loading-circle cssload-loading-row3 cssload-loading-col4"></div><div class="cssload-loading-circle cssload-loading-row3 cssload-loading-col5"></div><div class="cssload-loading-circle cssload-loading-row4 cssload-loading-col2"></div><div class="cssload-loading-circle cssload-loading-row4 cssload-loading-col3"></div><div class="cssload-loading-circle cssload-loading-row4 cssload-loading-col4"></div><div class="cssload-loading-circle cssload-loading-row5 cssload-loading-col3"></div></div>';
function EditAdmin(ID,Action)
{
	
	
	if (Action!=='user') $('#Edit .modal-title').html($('#lblock a:eq('+(count($('#lblock').html().split('</a>'))-2)+')').html());
	else $('#Edit .modal-title').html('Изменение профиля');
	$('#Edit .modal-body').html(loading);
	$.post(home_url+'forum/editadmin.php', {id:ID,action:Action},function(data){
			$('#Edit .modal-body').html(data);
		});
}
function forumSearch()
{
	title = $('#search').val();
	if (title==''){
		alert('Введите слово для поиска тем');
		return false;
	}
	$.post(home_url+'forum/searchforum.php', {title:title},function(data){
			$('#frm').html(data);
		});
}

function Category()
{
	cat = $('#catsearch').val();
	if(cat==''||parseInt(cat)==0) location.replace(home_url+'ru/forum');
	else location.replace(home_url+'ru/forum?category='+cat);
}
function userSearch()
{
	title = $('#finduser').val();
	
	if (title==''){
		alert('Введите слово');
		return false;
	}
	$.post(home_url+'forum/users.php', {title:title},function(data){
			$('#userContent').html(data);
		});
}
function userSearch2()
{
	order = $('#orderuser').val();
	$.post(home_url+'forum/users.php', {order:order},function(data){
			$('#userContent').html(data);
		});
}
function enter(Form,MustRows,MustRowsTitle)
{
	
	Row = MustRows.split(',');
	RowTitle = MustRowsTitle.split('!');
	alertMessage = '';
	for(k=0;k<count(Row);k++)
	if($('.modal-body #'+Form+' #'+Row[k]).val()==''||parseInt($('.modal-body #'+Form+' #'+Row[k]).val())==0) alertMessage+=RowTitle[k]+' не заполнено<br>';
	
	if(alertMessage=='') 
	{
		$.post(home_url+'autorize.php', {login:$('.modal-body #'+Form+' #login').val(),password:$('.modal-body #'+Form+' #password').val()},function(data){
			if (data=='ok') location.reload();
			else {
				$('.modal-body #'+Form+' #err_message').css('display','block');
				$('.modal-body #'+Form+' #err_message').html(data);
			}
			return false;
		});
		
	}
	else {
		$('.modal-body #'+Form+' #err_message').css('display','block');
		$('.modal-body #'+Form+' #err_message').html(alertMessage.substr(0,alertMessage.length-4));
		return false;
	}
	
}
function forgot(Form,MustRows,MustRowsTitle)
{
	
	Row = MustRows.split(',');
	RowTitle = MustRowsTitle.split('!');
	alertMessage = '';
	for(k=0;k<count(Row);k++)
	if($('#'+Form+' #'+Row[k]).val()==''||parseInt($('#'+Form+' #'+Row[k]).val())==0) alertMessage+=RowTitle[k]+' не заполнено<br>';
	
	if(alertMessage=='') 
	{
		$.post(home_url+'forgot.php', {row:$('#'+Form+' #row').val()},function(data){
			$('#'+Form).html(data);
		});
		
	}
	else {
		$('#'+Form+' #err_message').css('display','block');
		$('#'+Form+' #err_message').html(alertMessage.substr(0,alertMessage.length-4));
		return false;
	}
	
}
function reg(Form,MustRows,MustRowsTitle)
{
	
	Row = MustRows.split(',');
	RowTitle = MustRowsTitle.split('!');
	alertMessage = '';
	for(k=0;k<count(Row);k++)
	if($('#Register #'+Form+' #'+Row[k]).val()==''||parseInt($('#Register #'+Form+' #'+Row[k]).val())==0) alertMessage+=RowTitle[k]+' не заполнено<br>';
	
	if(alertMessage=='') 
	{
		
		$.post(home_url+'register.php', {login:$('#Register #'+Form+' #login').val(),password:$('#Register #'+Form+' #password').val(),email:$('#Register #'+Form+' #email').val(),name:$('#Register #'+Form+' #name').val(),lastname:$('#Register #'+Form+' #lastname').val(),conf:$('#Register #'+Form+' #confirm').val(),code:$('#Register #'+Form+' #code').val()},function(data){
			dt =  data.split('<');
			$('#Register #'+Form+' #err_message').css('display','block');
			if(count(dt)==2) {
				$('#Register #'+Form+' #err_message').html(dt[0]); 
				$('#Register #'+Form+' #k').attr('src',dt[1]);
				}
			else if (count(dt)>2) $('#Register #'+Form).html('<'+dt[1]);
			else if (count(dt)<2) $('#Register #'+Form+' #err_message').html(data);
		});
		
	}
	else {
		$('#Register #'+Form+' #err_message').css('display','block');
		$('#Register  #'+Form+' #err_message').html(alertMessage.substr(0,alertMessage.length-4));
		return false;
	}
	
}
function Like(ID)
{
	
	$.post(home_url+'forum/like.php', {id:ID},function(data){
		if(data!=='') $('#Like'+ID).html(data);
	});
}
$('#myTabs2 a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
function forumSend()
{
	Email = $('#cmail').val();
	Name = $('#cname').val();
	Phone = $('#cphone').val();
	Message = $('#textf').val();
	text='';
	if (Email=='') text+=', Email';
	if (Phone=='') text+=', Телефон';
	if (Name=='') text+=', Имя';
	if (Message=='') text+=', Сообщение';

	if (text!=='') alert('Поля '+text.substr(2,text.length-2)+' не заполнено');
	else	{
		$.post(home_url+'forum/sendmessage.php', {email:Email,message:Message,name:Name,phone:Phone},function(data){
				alert(data)
			});
	}
}

</script>
<?php
echo '<div class="modal fade" id="Contacts_" role="dialog"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Обратная связь</h4>
			</div>
			<div class="modal-body">';
			include ("contactsForm.php");
			echo'</div>
			</div>
		  </div></div></div>';
if (!isset($_SESSION['user']))
{
	echo '<div class="modal fade" id="Autorize" role="dialog"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Авторизация</h4>
			</div>
			<div class="modal-body">';
			include (dirname(__FILE__)."/../autorizeForm.php");
			echo'</div>
			</div>
		  </div></div></div>';
		  
echo '<div class="modal fade" id="Forgot" role="dialog"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Восстановление пароля</h4>
			</div>
			<div class="modal-body">';
			include (dirname(__FILE__)."/../forgotForm.php");
			echo'</div>
			</div>
		  </div></div></div>';

echo '<div class="modal fade" id="Register" role="dialog"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Регистрация</h4>
			</div>
			<div class="modal-body">';
			include (dirname(__FILE__)."/../registerForm.php");
			echo'</div>
			</div>
		  </div></div></div>';
}

if (isset($_SESSION['user']))
{
	$getGroup = mysqli_query($CONNECTION,"SELECT `userType` FROM `".DB_PREFIX."users` WHERE `userID`='$_SESSION[user]'");
	if (mysqli_num_rows($getGroup)>0)
	{
		$Group = mysqli_fetch_array($getGroup);
		$_SESSION['group'] = $Group['userType'];
	}
}
if ($_SESSION['group']=='admin')
{
	echo '<div class="modal fade" id="Edit" role="dialog" style="text-align:left"><div class="modal-dialog">
	<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Редактирование</h4>
			</div>
			<div class="modal-body"></div>
			</div>
		  </div></div></div>';
	$new_messages = mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `seen`='0' AND `ParentTopic`<>'0'");
	$new_topics= mysqli_query($CONNECTION,"SELECT `forumID` FROM `".DB_PREFIX."forum_topic` WHERE `seen`='0' AND `ParentTopic`='0'");
	echo '<a href="'.HOME.LANG.'/forum?action=newmessages"><i class="fa fa-envelope fa-lg" aria-hidden="true" id="newMess" style="display: inline;"> '.mysqli_num_rows($new_messages).'</i></a>
	<a href="'.HOME.LANG.'/forum?action=newtopics"><i class="fa fa-pencil fa-lg" id="newTopics" aria-hidden="true" style="display: inline;"> '.mysqli_num_rows($new_topics).'</i></a>';
}
?>